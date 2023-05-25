<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppleService extends Model
{
    protected $fillable = [
        'service_name',
        'service_cover',
        'service_description',
        'service_price',
        'category_id',
        'status'
    ];
}
