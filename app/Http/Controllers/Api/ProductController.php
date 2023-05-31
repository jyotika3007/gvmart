<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Shop\ProductImages\ProductImage;
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

        $data['related_accessories'] = DB::table('related_products')->JOIN('products','products.id','related_products.related_product_id')->where('type','accessory')->where('product_id',$product_id)->get(['products.id', 'slug', 'name', 'cover', 'price', 'sale_price', 'discount', 'stock_quantity']);
        $data['related_products'] = DB::table('related_products')->JOIN('products','products.id','related_products.related_product_id')->where('type','product')->where('product_id',$product_id)->get(['products.id', 'slug', 'name', 'cover', 'price', 'sale_price', 'discount', 'stock_quantity']);
        $data['related_services'] = DB::table('related_products')->JOIN('apple_services','apple_services.id','related_products.related_product_id')->where('type','apple_service')->where('product_id',$product_id)->get(['apple_services.id', 'service_name', 'service_cover', 'service_description', 'service_price']);

        $data['product_detail'] = $product;
        $data['product_images'] = $product_images;
        $data['product_variants'] = [
            [
                'Storage' => "32 GB",
                "price" => 78999,
                "stock_quantity" => 10,
                "offer_price" => 75999,
                "colors" => [
                    [
                        "color" => '#abb9c8',
                        "images" => [
                            "default_products/b1.jpg",
                            "default_products/b2.jpg",
                        ]

                    ],
                    [

                        "color" => '#33383f',
                        "images" => [
                            "default_products/black1.jpg",
                            "default_products/black2.jpg",
                        ]
                    ],
                    [

                        "color" => '#e9373c',
                        "images" => [
                            "default_products/red1.jpg",
                            "default_products/red2.jpg",
                        ]
                    ],
                    [

                        "color" => 'fdf49f',
                        "images" => [
                            "default_products/yellow1.jpg",
                            "default_products/yellow2.jpg",
                        ]
                    ]
                ],
            ],
            [
                'Storage' => "64 GB",
                "price" => 84999,
                "stock_quantity" => 10,
                "offer_price" => 75999,
                "colors" => [
                    [
                        "color" => '#abb9c8',
                        "images" => [
                            "default_products/b1.jpg",
                            "default_products/b2.jpg",
                        ]

                    ],
                    [

                        "color" => '#33383f',
                        "images" => [
                            "default_products/black1.jpg",
                            "default_products/black2.jpg",
                        ]
                    ],
                    [

                        "color" => '#e9373c',
                        "images" => [
                            "default_products/red1.jpg",
                            "default_products/red2.jpg",
                        ]
                    ],
                    [

                        "color" => 'fdf49f',
                        "images" => [
                            "default_products/yellow1.jpg",
                            "default_products/yellow2.jpg",
                        ]
                    ]
                ],

            ]
        ];

        return response()->json([
            'status' => 1,
            'message' => 'Product detail fetched successfully.',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
