<?php

namespace App\Shop\Banners;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
    	'banner_title',
    	'category_id',
		'product_id',
    	'category_slug',
    	'cover',
    	'status',
    	'priority',
		'store_offer',
		'store_offer_type'
    ];
}
