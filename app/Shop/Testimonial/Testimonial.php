<?php

namespace App\Shop\Testimonial;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'profession',
        'description',
        'cover',
        'status',
        'user_id'
    ];
}
