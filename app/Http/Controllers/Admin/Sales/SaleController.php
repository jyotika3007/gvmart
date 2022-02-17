<?php

namespace App\Http\Controllers\Admin\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Orders\Order;
use StdClass;

class SaleController extends Controller
{
    public function dailyProductSale(Request $request){
    	$start_time = date('Y-m-d')." 00:00:00";
    	$end_time = date('Y-m-d')." 23:59:59";

        $from_date = '';
        $to_date = '';

        if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                $start_time = $_GET['from_date'].' 00:00:00';
                $end_time = $_GET['to_date'].' 23:59:59';

                $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];
        }
    	// echo $start_time; die;
    	$products_sales = Order::JOIN('order_product','order_product.order_id','orders.id')->where('orders.created_at','>=',$start_time)->where('orders.created_at','<=',$end_time)->where('orders.order_status_id',5)->select('order_product.*','orders.booking_date')->paginate(10);

    	// var_dump($products_sales); die;

    	return view('admin.reports.daily_products_sales_report',[
    		'products_sales' => $products_sales,
            'from_date' => $from_date,
            'to_date' => $to_date
    	]);
    }

    public function monthlyProductSale(Request $request){
    	$start_time = date('Y-m')."-01 00:00:00";
    	$end_time = date('Y-m')."-30 23:59:59";

        $from_date = '';
        $to_date = '';

        if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                $start_time = $_GET['from_date'].' 00:00:00';
                $end_time = $_GET['to_date'].' 23:59:59';

                $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];
        }

    	// echo $start_time; die;
    	$products_sales = Order::JOIN('order_product','order_product.order_id','orders.id')->where('orders.created_at','>=',$start_time)->where('orders.created_at','<=',$end_time)->where('orders.order_status_id',5)->select('order_product.*','orders.booking_date')->paginate(50);

    	// var_dump($products_sales); die;

    	return view('admin.reports.monthly_products_sales_report',[
    		'products_sales' => $products_sales,
            'from_date' => $from_date,
            'to_date' => $to_date
    	]);
    } 
    
    
 public function bookedProductSale(Request $request){
     

     $start_time = "";
     $st = '';
     $end_time = "";
     $et = '';
     if(isset($_GET['start_time'])){
        $start_time = date('Y-m-d ').$_GET['start_time'].":00";
        $st = $_GET['start_time'];
        $end_time = date('Y-m-d ').$_GET['end_time'].":00";
        $et = $_GET['end_time'];
        // echo $start_time; die;
     }
     
    //  echo $start_time." ".$end_time; die;
    	$date = date('Y-m-d')." 00:00:00";
        $products_sales = "";

        if($start_time!="" && $end_time!=""){
            $products_sales = Order::JOIN('order_product','order_product.order_id','orders.id')->where('orders.created_at','>=',$start_time)->where('orders.created_at','<=',$end_time)->where('orders.order_status_id',1)->select('order_product.*','orders.created_at')->paginate(50);
        }
        else{
            $products_sales = Order::JOIN('order_product','order_product.order_id','orders.id')->where('orders.created_at','>=',$date)->where('orders.order_status_id',1)->select('order_product.*','orders.created_at')->paginate(50);
        }
    	
    	

    	// var_dump($products_sales); die;

    	return view('admin.reports.booked_products_sales_report',[
    		'products_sales' => $products_sales,
            'start_time' => $st,
            'end_time' => $et
    	]);
    } 

    public function salesReport(Request $request){
    	
    	// $products_sales = new StdClass;
        $date = date('Y-m-d ')."00:00:00";
    	$products_sales = Order::JOIN('order_product','order_product.order_id','orders.id')->where('orders.order_status_id',7)->where('orders.created_at','>=',$date)->select('order_product.*','orders.booking_date')->paginate(50);



    	return view('admin.reports.sales_report',[
    		'products_sales' => $products_sales
    	]);
    }
}
