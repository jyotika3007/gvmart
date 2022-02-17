<?php

namespace App\Http\Controllers\Admin\Exports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\ExportList;
use App\Exports\ExportProduct;
use App\Shop\Orders\Order;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class ExportController extends Controller
{
    public function export(Request $request) 
    {
    	$start_time = "";
     $end_time = "";
     if(isset($_GET['start_time'])){
        $start_time = date('Y-m-d ').$_GET['start_time'].":00";
        $end_time = date('Y-m-d ').$_GET['end_time'].":00";
        // echo $start_time; die;
     }
    	$date = date('Y-m-d ')."00:00:00";
        
        // var_dump($products_sales); die;

        // return Excel::download(new ExportList($products_sales), 'products.xlsx');
        return Excel::download(new ExportList($start_time,$end_time,$date), 'products.xlsx');
    }

    public function exportProductDump(){
         return Excel::download(new ExportProduct(), 'products_dump.xlsx');
    }
}
