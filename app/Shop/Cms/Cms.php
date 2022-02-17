<?php

namespace App\Shop\Cms;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = [
    	'page',
    	'title',
    	'description',
    	'search_keywords',
    	'meta_title',
    	'meta_description'
    ];

    
}
