<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;

class ProductController extends Controller
{
    // صفحة عرض المنتجات
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products', compact('products'));
    }

    // إضافة منتج جديد
    public function store(Request $request)
    {
        $request->validate([
            'produit' => 'required|string',
            'quantity' => 'required|integer',
            'time' => 'required|date'
        ]);

        $produitName = $request->produit;

        // إزالة Accents وتحويل إلى ASCII
        $normalized = iconv('UTF-8', 'ASCII//TRANSLIT', $produitName);

        // أخذ أول 3 أحرف وتحويلها إلى uppercase
        $code = strtoupper(substr($normalized, 0, 3));

        // آخر ID لهذا النوع
        $last = Product::where('produit', $produitName)->orderBy('id', 'desc')->first();
        $num = $last ? intval(substr($last->id_custom, 4)) + 1 : 1;

        $productId = $code . '-' . str_pad($num, 2, '0', STR_PAD_LEFT);

        // إنشاء المنتج
        Product::create([
            'id_custom' => $productId,
            'produit' => $produitName,
            'quantity' => $request->quantity,
            'created_at' => $request->time,
            'updated_at' => $request->time
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    // تعديل منتج
    public function edit(Product $product)
    {
        return view('admin.edit-product', compact('product'));
    }

    // تحديث بيانات المنتج
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'produit' => 'required|string',
            'quantity' => 'required|integer',
            'time' => 'required|date'
        ]);

        $product->update([
            'produit' => $request->produit,
            'quantity' => $request->quantity,
            'created_at' => $request->time,
            'updated_at' => $request->time
        ]);

        return redirect()->route('products.index')->with('success', 'Produit modifié avec succès.');
    }

    // حذف المنتج
    public function destroy(Product $product)
    {
        $product->delete();

        if(request()->ajax()){
            return response()->json(['success' => true]);
        }

        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }

    // صفحة عرض كل المنتجات على شكل مربعات
    public function items()
    {
        $products = Product::all();
        return view('admin.items', compact('products'));
    }

    // صفحة تفاصيل المنتج وعناصره
    public function showItemDetails($id)
    {
        $product = Product::findOrFail($id);
        $firstChar = strtoupper(substr($product->produit, 0, 1));
        $quantity = $product->quantity;

        // إنشاء العناصر إذا لم تكن موجودة
        for ($i = 1; $i <= $quantity; $i++) {
    $seq = str_pad($i, 3, '0', STR_PAD_LEFT);
    $customId = $product->id_custom . $firstChar . $seq;

    Item::updateOrCreate(
        ['id_custom' => $customId], // شرط البحث
        [
            'item_id' => $customId,   // تعيين قيمة لكل NOT NULL
            'product_id' => $product->id,
            'etat' => 'good',
            'location' => null
        ]
    );
}


        $items = Item::where('product_id', $product->id)->get();

        return view('admin.item-details', compact('product', 'items'));
    }

    // طباعة الباركود لكل العناصر
    
  public function printBarcodes($productId)
{
    $product = Product::findOrFail($productId);

    // جلب العناصر بشكل صحيح حسب ما خزنت
    $items = Item::where('product_id', $product->id_custom)->get();

    return view('admin.items.print', compact('product', 'items'));
}

public function scanPage()
{
    return view('admin.scan'); // هذا الملف Blade
}


   public function scanItem($code)
{
    $item = Item::with('product')
        ->where('item_id', $code)
        ->orWhere('product_id', $code)
        ->first();

    if (!$item) {
        return response()->json([
            'status' => 'not_found'
        ]);
    }

    return response()->json([
        'status' => 'success',
        'item' => [
            'id_custom'  => $item->item_id, // استخدم item_id بدل id_custom
            'produit'    => $item->product->produit ?? $item->product_id,
            'etat'       => $item->etat,
            'location'   => $item->location,
            'created_at' => $item->created_at->format('Y-m-d'),
        ]
    ]);
}

}
