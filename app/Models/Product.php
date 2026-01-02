<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_custom',
        'produit',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

  



}
