<?php

namespace App\Shop\ProductImages;

use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'src'
    ];

    public $timestamps = false;

    
}

