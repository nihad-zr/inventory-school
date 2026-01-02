<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'product_id', // هنا سنخزن id_custom للمنتج
        'item_id',    // هذا هو الـ ID الفريد لكل عنصر
        'etat',
        'location',
    ];

    public $timestamps = true;

    // علاقة مع المنتج
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_custom'); 
        // ملاحظة: الربط بـ id_custom بدل id الرقمي
    }
}
