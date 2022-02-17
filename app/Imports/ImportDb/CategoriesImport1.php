<?php

namespace App\Imports\ImportDb;

use App\Shop\Products\Product;
use App\Shop\Categories\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;

class ProductsImport implements ToModel
{
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

        if(!empty($row[0])){


            $category = DB::table('categories')->where('id',$row[0])->first();

            // var_dump($category); die;

            $sku =  strtoupper(substr($category->name, 0,3)).$row[0];

            $countProduct = Product::where('sku','LIKE',$sku.'%')->count();

            $countProduct = $countProduct+1;

            $countProduct = str_pad($countProduct, 5, '0', STR_PAD_LEFT);


            $sku = $sku.$countProduct;

            $data[] = array(
                'name' => $row[2],
                'quantity' => 1,
                'stock_quantity' => 100,
                'slug' => str_replace(' ','-',$row[2]),
                'price' => $row[5],
                'sale_price' => $row[6],
                'status' => 1,
                'gst' => $row[7],
                'sku' => $sku,
                'user_id' => 2
            );


        }


        DB::table('products')->insert($data);

    }




}
