<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AppleService;

class AppleServiceController extends Controller
{
    public function getAppleServices(){
        $services = AppleService::join('categories','categories.id','apple_services.category_id')
        ->where('apple_services.status',1)
        ->orderBy('apple_services.id','DESC')
        ->get(['apple_services.id','apple_services.service_name','apple_services.service_cover','apple_services.service_price','categories.name as category_name']);

        return response()->json([
            "status" => 1,
            "message" => "Apple services fetched successfully.",
            "data" => $services
        ]);
    }

    public function getAppleServiceDetail(Request $request , $id){
        $services = AppleService::join('categories','categories.id','apple_services.category_id')->where('apple_services.id',$id)->first(['apple_services.*','categories.name as category_name']);

        return response()->json([
            "status" => 1,
            "message" => "Apple services fetched successfully.",
            "data" => $services
        ]);
    }
}
