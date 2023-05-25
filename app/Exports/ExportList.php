<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Shop\Orders\Order;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB, StdClass;
use Auth;

class ExportList implements FromCollection
{


    private $start_time;
    private $end_time;
    private $date;

    public function __construct($start_time, $end_time, $date)
    {
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->date = $date;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        // echo $this->start_time; die;
        // $data = $request()->all();
        // var_dump($data); die;

        // $products = DB::table('order_product')->JOIN('orders','orders.id','order_product.order_id')->where('orders.order_status_id',1)->select('id','product_name','product_sku','quantity','product_size','product_price')->get();

        $products_sales = '';

        if ($this->start_time != "" && $this->end_time != "") {
            $products_sales = Order::JOIN('order_product', 'order_product.order_id', 'orders.id')->where('orders.created_at', '>=', $this->start_time)->where('orders.created_at', '<=', $this->end_time)->where('orders.order_status_id', 1)->select('order_product.id', 'order_product.product_name', 'order_product.product_sku', 'order_product.quantity', 'order_product.product_price')->paginate(50);
        } else {
            $products_sales = Order::JOIN('order_product', 'order_product.order_id', 'orders.id')->where('orders.created_at', '>=', $date)->where('orders.order_status_id', 1)->select('order_product.id', 'order_product.product_name', 'order_product.product_sku', 'order_product.quantity', 'order_product.product_price')->paginate(50);
        }


        // foreach($products as $key => $product){
        // 	$data[] = $product;
        // }

        return $products_sales;
    }
}
