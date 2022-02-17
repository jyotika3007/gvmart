<?php

namespace App\Imports\ImportDb;

use App\Brands;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;

class BrandsImport implements ToModel
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


        if(!empty($row[0])){

            $data[] = array(
                'name' => $row[0],
                'status' => $row[1],
                'user_id' => 2,
                'priority' => 1
            );


        }


        DB::table('brands')->insert($data);

    }

}
