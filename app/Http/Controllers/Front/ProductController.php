<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Shop\Products\Product;
use App\Shop\ProductReviews\ProductReview;
use App\Shop\Categories\Category;
use App\Shop\Brands\Brand;
use App\Shop\ProductSize;
use App\Http\Controllers\Controller;
use StdClass,DB;

class ProductController extends Controller
{
    
    public function submitReview(Request $request){
        $data = $request->all();
        // var_dump($data); die;
        
        $check = ProductReview::where('email',$data['email'])->where('product_id',$data['product_id'])->first();
        
        if($check){
            $check->name = $data['name'];
            $check->email = $data['email'];
            $check->product_id = $data['product_id'];
            $check->product_rating = $data['rating'];
            $check->product_review = $data['review'];
            $check->status = 0;
            
            $cehck->update();
            
            
                return redirect()->back()->with('message','Review submitted successfully');
        }
        else{
            $newData = new ProductReview;
            
            $newData->name = $data['name'];
            $newData->email = $data['email'];
            $newData->product_id = $data['product_id'];
            $newData->product_rating = $data['rating'];
            $newData->product_review = $data['review'];
            $newData->status = 0;
            
            $newData->save();
            
            return redirect()->back()->with('message','Review submitted successfully');
        }
        
    }

}
