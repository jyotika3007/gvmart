<?php

namespace App\Imports\ImportDb;

use App\Shop\Products\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;

class ProductDumpImport implements ToModel
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
	
	$data = array();
	
	if(!empty($row[0])){
		
		$product_name = $row[1];

		DB::table('products')->where('name',$product_name)->update(
			array(
				
				'price' => $row[2] ?? '',
				'sale_price' => $row[3] ?? '',
				'discount' => $row[4] ?? '0'
				
			)

		);

	}

}

}
