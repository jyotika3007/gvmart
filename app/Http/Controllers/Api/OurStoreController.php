<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\OurStore;
use Illuminate\Http\Request;

class OurStoreController extends Controller
{
    public function getOurStoresList(){
        $stores = OurStore::where('status',1)->orderBy('id','ASC')->get();
        return response()->json([
            'status' => 1,
            'message' => 'Stores List fetched successfully.',
            'data' => $stores
        ]);
    }
}
