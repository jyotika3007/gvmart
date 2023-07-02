<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Shop\ProductImages\ProductImage;
use App\Shop\ProductReviews\ProductReview;
use Illuminate\Http\Request;
use App\Shop\Products\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $product = Product::find($product_id);
        $product_images = ProductImage::where('product_id', $product_id)->get();

        $related_accessories = DB::table('related_products')->JOIN('products','products.id','related_products.related_product_id')->where('type','accessory')->where('product_id',$product_id)->get(['products.id', 'slug', 'name', 'cover', 'price', 'sale_price', 'discount', 'stock_quantity','prelaunch_price','prelaunch_price']);
        $related_products = DB::table('related_products')->JOIN('products','products.id','related_products.related_product_id')->where('type','product')->where('product_id',$product_id)->get(['products.id', 'slug', 'name', 'cover', 'price', 'sale_price', 'discount', 'stock_quantity','prelaunch_price','prelaunch_price']);
        $data['related_services'] = DB::table('related_products')->JOIN('apple_services','apple_services.id','related_products.related_product_id')->where('type','apple_service')->where('product_id',$product_id)->get(['apple_services.id', 'service_name', 'service_cover', 'service_description', 'service_price','prelaunch_price','prelaunch_price']);

        $final_related_products = [];
        $final_related_accessories = [];

        $data['product_detail'] = $product;
        $data['product_images'] = $product_images;

        try {
            $storages = DB::table('attribute_value_product_attribute')
                ->JOIN('attribute_values', 'attribute_values.id', 'attribute_value_product_attribute.attribute_value_id')
                ->where('attribute_value_product_attribute.attribute_id', 3)
                ->where('attribute_value_product_attribute.product_id', $product_id)
                ->get(['attribute_value_product_attribute.*', 'attribute_values.value']);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        $storage_arr = [];
        if(count($storages)>0){

            $color_data = [];

            foreach($storages as $st){
                $ids = [];
                $colors_arr = [];
                
                $colors = DB::table('product_images')->where('storage_id',$st->id)->where('product_id',$product_id)->select('color_id')->distinct()->get();
                foreach($colors as $pro){
                    array_push($ids, $pro->color_id);
                }
                
                $colors_list = DB::table('attribute_values')
                ->whereIn('id', $ids)
                ->get();

                if(count($colors_list)>0){
                    foreach($colors_list as $col){
                        $images_arr = [];

                        try {
                            $color_images = DB::table('product_images')
                            ->JOIN('attribute_values', 'attribute_values.id', 'product_images.color_id')
                            ->where('product_images.storage_id', $st->id)
                            ->where('product_images.color_id', $col->id)
                            ->where('product_images.product_id', $product_id)
                            ->get(['attribute_values.code', 'attribute_values.value', 'product_images.src','product_images.id','product_images.status']);
                        } catch (\Throwable $e) {
                            dd($e->getMessage());
                        }

                        if(isset($color_images) && count($color_images)){
                            foreach($color_images as $col_img){
                                array_push($images_arr, $col_img->src);
                            }
                        }

                        $color_data = [
                            "color" => $col->value ?? '',
                            "color_code" => $col->code ?? '',
                            "images" => $images_arr
                        ];

                        array_push($colors_arr, $color_data);
                    }
                }
                

                
                $variants_data = [
                    'Storage_id' => $st->id ?? '',
                    'Storage' => $st->value ?? '',
                    "price" => $st->price ?? 0,
                    "stock_quantity" => $st->quantity ?? 0,
                    "offer_price" => $st->offer_price ?? 0,
                    'colors' => $colors_arr
                ];
              
                array_push($storage_arr, $variants_data);
            }
        }

        $data['product_variants'] = $storage_arr ?? [];

        // $data['product_variants'] = [
        //     [
        //         'Storage' => "32 GB",
        //         "price" => 78999,
        //         "stock_quantity" => 10,
        //         "offer_price" => 75999,
        //         "colors" => [
        //             [
        //                 "color" => '#abb9c8',
        //                 "images" => [
        //                     "default_products/b1.jpg",
        //                     "default_products/b2.jpg",
        //                 ]

        //             ],
        //             [

        //                 "color" => '#33383f',
        //                 "images" => [
        //                     "default_products/black1.jpg",
        //                     "default_products/black2.jpg",
        //                 ]
        //             ],
        //             [

        //                 "color" => '#e9373c',
        //                 "images" => [
        //                     "default_products/red1.jpg",
        //                     "default_products/red2.jpg",
        //                 ]
        //             ],
        //             [

        //                 "color" => 'fdf49f',
        //                 "images" => [
        //                     "default_products/yellow1.jpg",
        //                     "default_products/yellow2.jpg",
        //                 ]
        //             ]
        //         ],
        //     ],
        //     [
        //         'Storage' => "64 GB",
        //         "price" => 84999,
        //         "stock_quantity" => 10,
        //         "offer_price" => 75999,
        //         "colors" => [
        //             [
        //                 "color" => '#abb9c8',
        //                 "images" => [
        //                     "default_products/b1.jpg",
        //                     "default_products/b2.jpg",
        //                 ]

        //             ],
        //             [

        //                 "color" => '#33383f',
        //                 "images" => [
        //                     "default_products/black1.jpg",
        //                     "default_products/black2.jpg",
        //                 ]
        //             ],
        //             [

        //                 "color" => '#e9373c',
        //                 "images" => [
        //                     "default_products/red1.jpg",
        //                     "default_products/red2.jpg",
        //                 ]
        //             ],
        //             [

        //                 "color" => 'fdf49f',
        //                 "images" => [
        //                     "default_products/yellow1.jpg",
        //                     "default_products/yellow2.jpg",
        //                 ]
        //             ]
        //         ],

        //     ]
        // ];

        if ($related_products) {
               
            foreach($related_products as $sp){
                $attributes = DB::table('attribute_value_product_attribute')
                ->join('attribute_values','attribute_values.id','attribute_value_product_attribute.attribute_value_id')
                ->where('attribute_value_product_attribute.product_id',$sp->id)
                ->where('attribute_values.attribute_id', 3)
                ->get(['attribute_value_product_attribute.*', 'attribute_values.value']);
                if(count($attributes)>0){
                    foreach($attributes as $attr){
                        $prods = clone $sp;
                        $prods->storage = $attr->value;
                        $prods->storage_id = $attr->id;
                        $prods->price = $attr->price ?? 0;
                        $prods->offer_price = $attr->offer_price ?? 0;
                        $prods->stock_quantity = $attr->quantity ?? 0;
    
                        $color_ids = DB::table('product_images')->where('product_id', $prods->id)->where('storage_id', $attr->id)->distinct('color_id')->get(['color_id']);
    
                        if (count($color_ids) > 0) {
                            foreach ($color_ids as $col) {
                                $color_products = clone $prods;
                                $product_img = ProductImage::where('product_id', $prods->id)->where('color_id', $col->color_id)->first(['src']);
                                $color_code = DB::table('attribute_values')->where('id', $col->color_id)->first(['value', 'code']);
                                // dd($color_code);
                                if($product_img)
                                    $color_products->cover = $product_img->src ?? '';
                                else
                                    $color_products->cover = '';
    
                                if($color_code){
                                    $color_products->color = $color_code->value ?? '';
                                    $color_products->color_code = $color_code->code ?? '';
                                }
                                else{
                                    $color_products->color = '';
                                    $color_products->color_code = '';
                                }
    
                                array_push($final_related_products, $color_products);
                            }
                        } else {
                            $prods->color = '';
                            $prods->color_code = '';
                            array_push($final_related_products, $prods);
                        }
    
                        // array_push($final_related_products,$prods);
                    }
                }
                else{
                    array_push($final_related_products, $sp);
                }
            }
    }

    
    if ($related_accessories) {
               
        foreach($related_accessories as $sp){
            $attributes = DB::table('attribute_value_product_attribute')
            ->join('attribute_values','attribute_values.id','attribute_value_product_attribute.attribute_value_id')
            ->where('attribute_value_product_attribute.product_id',$sp->id)
            ->where('attribute_values.attribute_id', 3)
            ->get(['attribute_value_product_attribute.*', 'attribute_values.value']);
            if(count($attributes)>0){
                foreach($attributes as $attr){
                    $prods = clone $sp;
                    $prods->storage = $attr->value;
                    $prods->storage_id = $attr->id;
                    $prods->price = $attr->price ?? 0;
                    $prods->offer_price = $attr->offer_price ?? 0;
                    $prods->stock_quantity = $attr->quantity ?? 0;

                    $color_ids = DB::table('product_images')->where('product_id', $prods->id)->where('storage_id', $attr->id)->distinct('color_id')->get(['color_id']);

                    if (count($color_ids) > 0) {
                        foreach ($color_ids as $col) {
                            $color_products = clone $prods;
                            $product_img = ProductImage::where('product_id', $prods->id)->where('color_id', $col->color_id)->first(['src']);
                            $color_code = DB::table('attribute_values')->where('id', $col->color_id)->first(['value', 'code']);
                            // dd($color_code);
                            if($product_img)
                                $color_products->cover = $product_img->src ?? '';
                            else
                                $color_products->cover = '';

                            if($color_code){
                                $color_products->color = $color_code->value ?? '';
                                $color_products->color_code = $color_code->code ?? '';
                            }
                            else{
                                $color_products->color = '';
                                $color_products->color_code = '';
                            }

                            array_push($final_related_accessories, $color_products);
                        }
                    } else {
                        $prods->color = '';
                        $prods->color_code = '';
                        array_push($final_related_accessories, $prods);
                    }

                    // array_push($final_related_accessories,$prods);
                }
            }
            else{
                array_push($final_related_accessories, $sp);
            }
        }
}

    $data['related_products'] = $final_related_products ?? [];
    $data['related_accessories'] = $final_related_accessories ?? [];
        return response()->json([
            'status' => 1,
            'message' => 'Product detail fetched successfully.',
            'data' => $data
        ]);
    }

  public function getAllReviews($product_id){
    $reviews = ProductReview::where('product_id',$product_id)->get();

        return response()->json([
            'status' => 1,
            'message' => 'Product reviews fetched successfully.',
            'data' => $reviews
        ]);
  }

  public function storeProductReview(Request $request){
    $data = $request->all();

    $data['status'] = 1;

    try{
        $result = ProductReview::create($data);
    }
    catch (\Throwable $e) {
        dd($e->getMessage());
    }

    if($result){
        return response()->json([
            'status' => 1,
            'message' => 'Product review added successfully.'
        ]);
    }
    else{
        return response()->json([
            'status' => 0,
            'message' => 'Something went wrong.'
        ]);
    }

  }

}
