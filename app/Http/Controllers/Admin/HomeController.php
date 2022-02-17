<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Products\Product;
use App\Shop\Orders\Order;
use App\Shop\Customers\Customer;
use App\Shop\RegisteredShop\RegisteredShop;
use Auth,Hash;
use App\User;

class HomeController extends Controller
{
  public function index(){

    $processing_orders = '';
    $shipped_orders = '';
    $delivered_orders = '';
    $cancelled_orders = '';
    $returned_orders = '';
    $monthly_sale = '';
    $monthly_gst = 0;

    $month = date('Y-m');

    $start_date = $month.'-01 00:00:00';
    $end_date = $month.'-30 00:00:00';

    $user = Auth::user();

    if(!empty($user)){     


      if($user->user_role == 'admin'){


        $processing_orders =  Order::where('order_status_id',3)->orderBy('id','DESC')->paginate(5);


        $shipped_orders = Order::where('order_status_id',4)->orderBy('id','DESC')->paginate(5);


        $delivered_orders = Order::where('order_status_id',5)->orderBy('id','DESC')->paginate(5);


        $cancelled_orders = Order::where('order_status_id',6)->orderBy('id','DESC')->paginate(5);


        $returned_orders = Order::where('order_status_id',7)->orderBy('id','DESC')->paginate(5);


        $monthly_sale = Order::where('created_at','>=',$start_date)->where('created_at','<=',$end_date)->where('order_status_id',5)->sum('total');

        $ordered_products = Order::JOIN('order_product','order_product.order_id','orders.id')->JOIN('products','products.id','order_product.product_id')->where('orders.order_status_id',5)->where('orders.created_at','>=',$start_date)->select('order_product.product_id','order_product.quantity','order_product.product_price')->get();

        if($ordered_products){
          foreach($ordered_products as $prod){
            $product = Product::where('id',$prod->product_id)->first();

            $gst = (($prod->quantity*$prod->product_price)*$product->gst)/100;

            $monthly_gst = $monthly_gst + $gst;
          }
        }

      
      }



      else{

       $processing_orders =  Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$start_date)->where('orders.created_at','<=',$end_date)->where('orders.order_status_id',3)->orderBy('orders.id','DESC')->select('orders.*')->paginate(5);


       $shipped_orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$start_date)->where('orders.created_at','<=',$end_date)->where('orders.order_status_id',4)->orderBy('orders.id','DESC')->select('orders.*')->paginate(5);


       $delivered_orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$start_date)->where('orders.created_at','<=',$end_date)->where('orders.order_status_id',5)->orderBy('orders.id','DESC')->select('orders.*')->paginate(5);


       $cancelled_orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$start_date)->where('orders.created_at','<=',$end_date)->where('orders.order_status_id',6)->orderBy('orders.id','DESC')->select('orders.*')->paginate(5);


       $returned_orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$start_date)->where('orders.created_at','<=',$end_date)->where('orders.order_status_id',7)->orderBy('orders.id','DESC')->select('orders.*')->paginate(5);

       $monthly_sale = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.order_status_id',5)->where('orders.created_at','>=',$start_date)->where('orders.created_at','<=',$end_date)->where('orders.order_status_id',5)->sum('orders.total');


       $ordered_products = Order::JOIN('order_product','order_product.order_id','orders.id')->JOIN('products','products.id','order_product.product_id')->where('products.user_id',$user->id)->where('orders.created_at','>=',$start_date)->select('order_product.product_id','order_product.quantity','order_product.product_price')->get();

       if($ordered_products){
        foreach($ordered_products as $prod){
          $product = Product::where('id',$prod->product_id)->first();

          $gst = (($prod->quantity*$prod->product_price)*$product->gst)/100;

          $monthly_gst = $monthly_gst + $gst;
        }
      }

      // var_dump($monthly_gst); die;


    }
  }
// echo $monthly_sale; die;


// var_dump($delivered_orders); die;


  return view('admin.dashboard',[
   'processing_orders' => $processing_orders,
   'shipped_orders' => $shipped_orders,
   'delivered_orders' => $delivered_orders,
   'monthly_sale' => $monthly_sale,
   'monthly_gst' => $monthly_gst,
   'cancelled_orders' => $cancelled_orders,
   'returned_orders' => $returned_orders
 ]);
}

public function edit(){
  $user = Auth::user();
  return view('admin.users.edit',compact('user'));
}

public function update(Request $request, $id){
  $user = User::find($id);

  $user->password = Hash::make($request->password);
  $user->update();

  return redirect()->back()->with('message','Data updated successfully'); 
}
}
