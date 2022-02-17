<?php

namespace App\Shop\ShopCategory;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    protected $fillable = [
    	'category_name',
    	'category',
    	'status',
    	'cover',
    	'icons',
    	'slug',
    	'featured'
	];
}
