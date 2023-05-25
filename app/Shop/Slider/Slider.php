<?php

namespace App\Shop\Slider;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'type',
        'cover',
        'status',
        'user_id',
        'start_date',
        'priority',
        'end_date'
    ];

}
