<?php

namespace App\Shop\Inventory;

use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
    	'bill_no',
    	'billing_date',
    	'billing_amount',
    	

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
}
