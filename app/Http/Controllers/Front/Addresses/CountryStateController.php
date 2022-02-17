<?php

namespace App\Http\Controllers\Front\Addresses;

use App\Http\Controllers\Controller;
use App\Shop\Countries\Country;

class CountryStateController extends Controller
{
   
    public function index($countryId)
    {
        $data = Country::find($countryId);

       
        return response()->json(compact('data'));
    }
}