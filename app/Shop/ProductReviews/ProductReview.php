<?php

namespace App\Shop\ProductReviews;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'name',
        'email',
        'product_id',
        'product_rating',
        'product_review'
    ];
}
