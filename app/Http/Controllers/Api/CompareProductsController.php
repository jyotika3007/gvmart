<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Shop\Products\Product;
use App\Shop\ProductImages\ProductImage;
use App\Shop\Attributes\Attribute;
use App\Shop\Categories\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompareProductsController extends Controller
{

    public function getCompareProductsList(Request $request)
    {
      
        $categories = Category::where('parent_id', NULL)->where('id', $request->category_id)->get(['id']);
        $products = [];

        foreach ($categories as $cat) {            
            $prods1 = DB::table('category_product')->JOIN('products','products.id','category_product.product_id')->where('category_product.category_id', $cat->id)->get(['products.id','products.name']);

            foreach($prods1 as $p1){
                array_push($products, $p1);
            }

            $sub_categories = Category::where('parent_id', $cat->id)->where('status', 1)->get(['id']);

            foreach ($sub_categories as $sub_cat) {
                $prods2 = DB::table('category_product')->JOIN('products','products.id','category_product.product_id')->where('category_product.category_id', $sub_cat->id)->get(['products.id','products.name']);

                foreach($prods2 as $p2){
                    array_push($products, $p2);
                }

                $child_categories = Category::where('parent_id', $sub_cat->id)->where('status', 1)->get(['id', 'name', 'slug', 'is_prelaunched']);

                foreach ($child_categories as $child_cat) {
                    $prods3 = DB::table('category_product')->JOIN('products','products.id','category_product.product_id')->where('category_product.category_id', $child_cat->id)->get(['products.id','products.name']);
                    
                    foreach($prods3 as $p3){
                        array_push($products, $p3);
                    }
                }
            }
        }

        $attributes = Attribute::get(['name']);

        $data['products'] = $products;
        $data['attributes'] = $attributes;

        $pro_array = [];

        if(count($products)>0){
            $count=0;
            foreach($products as $pro){
                if($count<3){

                    $product_detail = $this->getProductDetail($pro->id);
                    $product_detail['product_id'] = $pro->id;
                    array_push($pro_array, $product_detail);
                    $count++;
                }
                else{
                    exit(0);
                }
            }
        }
        $data['product_details'] = $pro_array;

        return response()->json([
            "status" => 1,
            "message" => "Categories fetched successfully.",
            "data" => $data
        ]);
    }

    public function getcomparedProductDetail($product_id)
    {
        $data = $this->getProductDetail($product_id);

        return response()->json([
            "status" => 1,
            "message" => "Product Detail fetched successfully",
            "data" => $data
        ]);
    }

    public function getProductDetail($product_id){
        $product = Product::find($product_id);

        $data['cover'] = $product->cover ?? '';

        $product_colors = ProductImage::where('product_id', $product_id)->distinct('color_id')->get(['color_id']);
        $data['storage'] = DB::table('attribute_value_product_attribute')
                ->join('attribute_values', 'attribute_values.id', 'attribute_value_product_attribute.attribute_value_id')
                ->where('attribute_value_product_attribute.product_id', $product_id)
                ->where('attribute_values.attribute_id',3)
                ->get(['attribute_values.value']);

        $color_array = [];

        if(isset($product_colors) && count($product_colors)>0){
            foreach($product_colors as $col){
                $color_code = DB::table('attribute_values')->where('id', $col->color_id)->first(['value', 'code']);
                if($color_code){
                    array_push($color_array, $color_code);
                }
            }
        }

        $data['colors'] = $color_array;
        $data['attributes'] = DB::table('attribute_value_product_attribute')
                ->join('attribute_values', 'attribute_values.id', 'attribute_value_product_attribute.attribute_value_id')
                ->join('attributes','attributes.id','attribute_values.attribute_id')
                ->where('attribute_value_product_attribute.product_id', $product_id)
                ->whereNotIn('attribute_values.attribute_id',[3])
                ->get(['attributes.name','attribute_values.value']);

                return $data;
    }

}