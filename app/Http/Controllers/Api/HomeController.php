<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Products\Product;
use App\Shop\Slider\Slider;
use App\Shop\Categories\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function categories(){
        $categories = Category::where('parent_id',NULL)->where('status',1)->get(['id','name','slug']);
        $products = [];
       
        foreach($categories as $cat){
            $parent1 = [];
            $parent2 = [];
            $parent3 = [];
           
            $sub_categories = Category::where('parent_id',$cat->id)->where('status',1)->get(['id','name','slug']);
           
            foreach($sub_categories as $sub_cat){
              
                $child_categories = Category::where('parent_id',$sub_cat->id)->where('status',1)->get(['id','name','slug']);
                
                foreach($child_categories as $child_cat){
                    array_push($parent3,[
                        "category_id" => $child_cat->id,
                        "category_name" => $child_cat->name ?? '',
                        "category_slug" => $child_cat->slug ?? '',
                    ]);
                }
                $parent2 = [[
                    "category_id" => $sub_cat->id,
                    "category_name" => $sub_cat->name ?? '',
                    "category_slug" => $sub_cat->slug ?? '',
                    "child" => $parent3
                ]];
            }

            $parent1= [
                "category_id" => $cat->id,
                "category_name" => $cat->name ?? '',
                    "category_slug" => $cat->slug ?? '',
                    "child" => $parent2
            ];
          
            array_push($products,$parent1);
        }

        // print_r($products); die;

        return response()->json([
            "status" => 1,
            "message" => "Categories fetched successfully.",
            "data" => $products
        ]);
    }

    public function home_main()
    {
        $sliders = Slider::where('status',1)->where('type','slider')->get(['id','title','cover','priority']);
        // $offers = Product::where('is_trending',1)->get(['id','slug','name','cover','price','sale_price','discount']);
      
        $categories = Category::where('parent_id',NULL)->where('status',1)->get();
        $products = [];
        foreach($categories as $cat){
            $product_count=0;
            $cat_product = DB::table('category_product')->join('products','products.id','category_product.product_id')->where('products.status',1)->where('category_id',$cat->id)->count();
            $product_count+=$cat_product;
            $sub_categories = Category::where('parent_id',$cat->id)->where('status',1)->get();
           
            foreach($sub_categories as $sub_cat){
                $sub_cat_product = DB::table('category_product')->join('products','products.id','category_product.product_id')->where('products.status',1)->where('category_id',$sub_cat->id)->count();
                $product_count+=$sub_cat_product;

                $child_categories = Category::where('parent_id',$sub_cat->id)->where('status',1)->get();
           
                foreach($child_categories as $child_cat){
                    $child_cat_product = DB::table('category_product')->join('products','products.id','category_product.product_id')->where('products.status',1)->where('category_id',$child_cat->id)->count();
                    $product_count+=$child_cat_product;
                }
            }

            $result = [
                "category_id" => $cat->id,
                "category_name" => $cat->name ?? '',
                "category_slug" => $cat->slug ?? '',
                "category_cover" => $cat->cover ?? '',
                "product_count" => $product_count
            ];

        array_push($products,$result);
        
        }
            
        return response()->json([
            'status' => 1,
            'message' => 'Home page detail fetched successfully',
            'data' => [
                'sliders' => $sliders,
                // 'offers' => $offers,
                'explore_categories' => $products
            ]
        ]);
    }

    public function home_products()
    {
        $sale_products = Product::where('is_top_rated',1)->limit(15)->get(['id','slug','name','cover','price','sale_price','discount','stock_quantity']);
        $new_arrival_products = Product::where('is_trending',1)->limit(15)->get(['id','slug','name','cover','price','sale_price','discount','stock_quantity']);
        $best_seller_products = Product::where('is_best_seller',1)->limit(15)->get(['id','slug','name','cover','price','sale_price','discount','stock_quantity']);

        return response()->json([
            'status' => 1,
            'message' => 'Products fetched successfully',
            'data' => [
                'sale_products' => $sale_products,
                'new_arrival_products' => $new_arrival_products,
                'best_seller_products' => $best_seller_products
            ]
        ]);
    }

}
