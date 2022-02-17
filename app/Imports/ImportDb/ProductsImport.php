<?php

namespace App\Imports\ImportDb;

use App\Shop\Products\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {
        $row = $rows;
        // var_dump($row); 

        $data = array();
        $cats = array();

        $lastProductId = DB::table('products')->get()->last();

        if(!empty($row[1])){

            // echo $row[14]; die;
            $category = DB::table('categories')->where('name',$row[14])->first();

            // var_dump($category); die;

            $sku =  strtoupper(substr($category->name, 0,3)).$row[14];

            $countProduct = Product::where('sku','LIKE',$sku.'%')->count();

            $countProduct = $countProduct+1;

            $countProduct = str_pad($countProduct, 5, '0', STR_PAD_LEFT);


            $sku = $sku.$countProduct;

            $data[] = array(

                 // 'brand_id' => $row[0] ?? '',
                'name' => $row[1] ?? '',
                'description' => $row[2] ?? '',
                'price' => $row[3] ?? '',
                'sale_price' => $row[4] ?? '',
                'gst' => $row[5] ?? '',
                'stock_quantity' => $row[6] ?? '',
                'status' => $row[7] ?? '',
                'search_keywords' => $row[8] ?? '',
                'is_featured' => $row[9] ?? '',
                'is_trending' => $row[10] ?? '',
                'is_best_seller' => $row[11] ?? '',
                'is_top_rated' => $row[12] ?? '',               
                'quantity' => 1,
                'slug' => str_replace(' ','-',$row[13]),
                'sku' => $sku,
                'user_id' => 2
            );


        }


        DB::table('products')->insert($data);

    }


    // To update products
 // public function model(array $rows)
 //    {
 //        $row = $rows; 

 //        $data = array();
 //        $cats = array();

 //        $product_name = '';


 //        if(!empty($row[0])){

 //            $product_name = $row[1];

 //        DB::table('products')->where('name',$product_name)->update(
 //            array(
 //                'brand_id' => $row[0] ?? '',
 //                'name' => $row[1] ?? '',
 //                'search_keywords' => $row[2] ?? '',
 //                'is_featured' => $row[3] ?? '',
 //                'is_trending' => $row[4] ?? '',
 //                'is_best_seller' => $row[5] ?? '',
 //                'is_top_rated' => $row[6] ?? ''
                
 //            )

 //        );

 //        }

 //    }




    
}
