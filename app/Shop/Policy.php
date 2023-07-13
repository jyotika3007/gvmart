<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_type',
        'reason',
        'status'
    ];
}
