<?php

namespace App\Imports\ImportDb;

use App\Shop\Products\Product;
use App\Shop\Categories\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;

class MainCategoriesImport implements ToModel
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
        

        if(!empty($row[0])){

            $data[] = array(
                'name' => $row[0],
                'slug' => $row[1],
                'parent_id' => $row[2],
                'status' => $row[3],
                'user_id' => 2,
                'description' => $row[0]
            );


        }


        DB::table('categories')->insert($data);

    }




}
