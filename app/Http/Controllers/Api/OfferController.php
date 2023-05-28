<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Banners\Banner;

class OfferController extends Controller
{
    public function getAllOffers(){
        $offers = Banner::where('status',1)->orderBy('priority','ASC')->get();
        return response()->json([
            'status' => 1,
            'message' => 'Offers List fetched successfully',
            'date' => $offers
        ]);
    }
}
