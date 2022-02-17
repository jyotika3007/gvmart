<?php

namespace App\Shop\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Product extends Model 
{

    public const MASS_UNIT = [
        'OUNCES' => 'oz',
        'GRAMS' => 'gms',
        'POUNDS' => 'lbs'
    ];

    public const DISTANCE_UNIT = [
        'CENTIMETER' => 'cm',
        'METER' => 'mtr',
        'INCH' => 'in',
        'MILIMETER' => 'mm',
        'FOOT' => 'ft',
        'YARD' => 'yd'
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'products.name' => 10,
            'products.description' => 5
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'name',
        'description',
        'cover',
        'quantity',
        'price',
        'brand_id',
        'status',
        'weight',
        'mass_unit',
        'status',
        'sale_price',
        'length',
        'width',
        'height',
        'distance_unit',
        'slug',
        'size',
        'color',
        'material',
        'product_type',
        'user_id',
        'is_featured',
        'key_features',
        'meta_title',
        'meta_description',
        'search_keywords',
        'gst',
        'preffered_payment_method',
        'shipping_amount',
        'return_period',
        'preffered_payment_method',
        'is_trending',
        'is_best_seller',
        'is_top_rated',
        'stock_quantity',
        'purchase_quantity',
        'return_order',
        'cancel_order',
        'discount'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    
    
}
