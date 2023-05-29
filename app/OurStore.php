<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurStore extends Model
{
    protected $fillable = [
        'main_area',
        'address',
        'email',
        'contact',
        'show_to_footer',
        'slug',
        'status'
    ];
}
