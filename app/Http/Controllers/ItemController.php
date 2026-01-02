<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * صفحة المربعات: عرض جميع المنتجات
     */
    public function products()
    {
        $products = Product::all();
        return view('admin.items', compact('products'));
    }

    /**
     * عرض عناصر منتج معيّن
     */
    public function index(Product $product)
    {
        // جلب العناصر الخاصة بالمنتج
        $items = Item::where('product_id', $product->id_custom)->get();

        // إذا لم تكن هناك عناصر → إنشاؤها تلقائيًا حسب الكمية
        if ($items->isEmpty()) {

            // أول حرف من اسم المنتج
            $letter = strtoupper(substr($product->produit, 0, 1));

            for ($i = 1; $i <= $product->quantity; $i++) {
                Item::create([
                    'product_id' => $product->id_custom, // الآن يأخذ id_custom
                    'item_id' => $product->id_custom . $letter . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'etat' => 'good',
                    'location' => 'قسم 1',
                ]);
            }

            // إعادة الجلب بعد الإنشاء
            $items = Item::where('product_id', $product->id_custom)->get();
        }

        return view('admin.items-product', compact('product', 'items'));
    }

    /**
     * تحديث الحالة والمكان
     */
    public function update(Request $request)
    {
        if (!$request->has('items')) {
            return back();
        }

        foreach ($request->items as $id => $data) {
            Item::where('id', $id)->update([
                'etat' => $data['etat'],
                'location' => $data['location'],
            ]);
        }

        return back()->with('success', 'تم حفظ التغييرات بنجاح');
    }

   
 
}
