<?php

namespace App\Shop\Promocodes;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $fillable = [
    	'promocode_name',
    	'promocode_amount',
    	'promocode_percent',
    	'promocode_start_date',
    	'promocode_expiry_date',
    	'promocode_status',
    	'min_order_amount',
    	'max_order_amount'
    ];
}
