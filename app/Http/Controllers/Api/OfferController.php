<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Banners\Banner;

class OfferController extends Controller
{
    public function getAllOffers(){
        $offers = Banner::join('products','products.id','banners.product_id')->where('banners.status',1)->orderBy('banners.priority','ASC')->get(['banners.*','products.name as product_name','products.slug as product_slug']);
        return response()->json([
            'status' => 1,
            'message' => 'Offers List fetched successfully',
            'data' => $offers
        ]);
    }
}
