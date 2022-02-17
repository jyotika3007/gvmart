<?php

namespace App\Shop\Orders;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
    /**
     * Searchable rules.
     *
     * Columns and their priority in search results.
     * Columns with higher values are more important.
     * Columns with equal values have equal importance.
     *
     * @var array
     */
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'courier_id', // @deprecated
        'courier',
        'customer_id',
        'address_id',
        'order_status_id',
        'payment',
        'discounts',
        'total_products',
        'total',
        'tax',
        'total_paid',
        'invoice',
        'label_url',
        'tracking_number',
        'total_shipping',
        'user_id',
        'delivery_address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    
}
