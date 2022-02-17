<?php

namespace App\Imports\ImportDb;

use App\Categories;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;

class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   // public function model(array $rows)
   //  {
   //      $row = $rows;
   //      // var_dump($row); 

   //      $data = array();
   //      $cats = array();

   //      $lastProductId = DB::table('products')->get()->last();

   //      if(!empty($row[0])){

   //          $data[] = array(
   //              'category_id' => $row[0],
   //              'product_id' => $row[1]
   //          );


   //      }


   //      DB::table('category_product')->insert($data);

   //  }

    public function model(array $rows)
    {
        $row = $rows;
        // var_dump($row); 

        $data = array();
        $cats = array();

        // $lastProductId = DB::table('products')->get()->last();

        if(!empty($row[0])){
            // echo $row[0]; die;
            $category = DB::table('categories')->where('name',$row[0])->first();
            $product = DB::table('products')->where('name',$row[1])->first();

            // var_dump($category); die;

            if($product && $category){


            $data[] = array(
                'category_id' => $category->id,
                'product_id' => $product->id
            );
            }


        }


        DB::table('category_product')->insert($data);

    }

}
