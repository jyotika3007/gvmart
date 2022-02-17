<?php

namespace App\Shop\Pincodes;

use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    protected $fillable = [
    	'pincode',
    	'status'
    ];
}
