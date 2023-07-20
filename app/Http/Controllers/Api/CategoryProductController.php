<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Categories\Category;
use App\Shop\Products\Product;
use App\Shop\Attributes\Attribute;
use App\Shop\ProductImages\ProductImage;
use Dompdf\Css\Color;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
{

    // Get products based on categories
    public function index($cat_id)
    {
        $ids = [];
        $final_sales_products = [];
        $categories = Category::where('id', $cat_id)->where('status', 1)->get(['id']);

        foreach ($categories as $cat) {
            array_push($ids, $cat->id);
            $sub_categories = Category::where('parent_id', $cat->id)->where('status', 1)->get(['id']);

            foreach ($sub_categories as $sub_cat) {

                array_push($ids, $sub_cat->id);
                $child_categories = Category::where('parent_id', $sub_cat->id)->where('status', 1)->get(['id']);

                foreach ($child_categories as $child_cat) {
                    array_push($ids, $child_cat->id);
                }
            }
        }

        $products = Product::JOIN('category_product', 'category_product.product_id', 'products.id')->whereIn('category_product.category_id', $ids)->where('products.status',1)->get(['products.id', 'products.slug', 'products.name', 'products.cover', 'products.price', 'products.sale_price', 'products.discount', 'products.stock_quantity', 'products.is_prelaunched', 'products.prelaunch_price']);

        foreach ($products as $sp) {
            $attributes = DB::table('attribute_value_product_attribute')
                ->join('attribute_values', 'attribute_values.id', 'attribute_value_product_attribute.attribute_value_id')
                ->where('attribute_value_product_attribute.product_id', $sp->id)
                ->where('attribute_values.attribute_id', 3)
                ->where('attribute_value_product_attribute.status', 1)
                ->get(['attribute_value_product_attribute.*', 'attribute_values.value', 'attribute_values.id as value_id']);

            if (count($attributes) > 0) {
                foreach ($attributes as $attr) {

                    $prods = clone $sp;
                    $prods->storage = $attr->value;
                    $prods->storage_id = $attr->value_id;
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

                            array_push($final_sales_products, $color_products);
                        }
                    } else {
                        $prods->color = '';
                        $prods->color_code = '';
                        array_push($final_sales_products, $prods);
                    }
                }
            } else {
                array_push($final_sales_products, $sp);
            }
        }

        return response()->json([
            'status' => 1,
            'message' => 'Products fetched successfully',
            'data' => $final_sales_products
        ]);
    }

    public function getVariants()
    {
        
        $colors = Attribute::JOIN('attribute_values', 'attribute_values.attribute_id', 'attributes.id')->where('attributes.name', 'Color')->get(['attribute_values.id','attribute_values.value', 'attribute_values.code']);
        
        $storage = Attribute::JOIN('attribute_values', 'attribute_values.attribute_id', 'attributes.id')->where('attributes.name', 'Storage')->get(['attribute_values.id','attribute_values.value']);
        
        $min_price = Product::orderBy('price', 'ASC')->first(['price']);
        
        $max_price = Product::orderBy('price', 'DESC')->first('price');

        $data['min_price'] = $min_price->price ?? 0;
        $data['max_price'] = $max_price->price ?? 0;
        $data['colors'] = $colors;
        $data['storage'] = $storage;

        return response()->json([
            'status' => 1,
            'message' => 'Variants fetched successfully.',
            'data' => $data
        ]);
    }
}
