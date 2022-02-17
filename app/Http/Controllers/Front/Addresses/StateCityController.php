<?php

namespace App\Http\Controllers\Front\Addresses;

use App\Http\Controllers\Controller;
use App\Shop\States\State;
use App\Shop\Cities\City;

class StateCityController extends Controller
{
    public function index($state_code)
    {
        
        $data = City::all();

        return response()->json(compact('data'));
    }
}