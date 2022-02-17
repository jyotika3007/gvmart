<?php

namespace App\Shop\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover',
        'status',
        'author',
        'user_id'
    ];

}
