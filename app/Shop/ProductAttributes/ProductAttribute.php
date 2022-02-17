<?php

namespace App\Shop\ProductAttributes;

use App\Shop\AttributeValues\AttributeValue;
use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'quantity',
        'price',
        'sale_price',
        'default'
    ];

   
}
