<?php

namespace App\Shop\Locations;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
    	'location',
    	'pincode',
    	'status',
    	'payment_mode',
    	'shipping_amount'
    ];
}
