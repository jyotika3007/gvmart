<?php

namespace App\Shop\RegisteredShop;

use Illuminate\Database\Eloquent\Model;

class RegisteredShop extends Model
{
    protected $fillable = [
        'owner_name',
        'shop_name',
        'category',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'email',
        'contact',
        'alternate_contact',
        'shop_code',
        'registration_date',
        'activation_date',
        'user_id',
        'cover',
        'slug',
        'category_ids',
        'registered_by'
    ];
}