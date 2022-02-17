<?php

namespace App\Shop\Categories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'cover',
        'status',
        'parent_id',
        'user_id',
        'is_featured',
        'is_top'
    ];

    
}
