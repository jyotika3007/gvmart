<?php

namespace App\Shop\Countries;

use App\Shop\Provinces\Province;
use App\Shop\States\State;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'iso',
        'iso3',
        'numcode',
        'phonecode',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

   
}
