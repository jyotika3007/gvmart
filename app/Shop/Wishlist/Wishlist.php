<?php

namespace App\Shop\Wishlist;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
    	'user_id',
    	'product_id',
    ];
}
