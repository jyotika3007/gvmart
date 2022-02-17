<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Shop\Customers\Customer;
use App\Shop\Addresses\Address;
use App\Shop\Orders\Order;
use App\Shop\RegisteredShop\RegisteredShop;
use App\Shop\OrderStatuses\OrderStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use Auth;
use PDF;
use App\User;
use Mail;


class OrderController extends Controller
{

    public function index(Request $request)
    {
         $data = $request->all();

        $order_type = 'All Orders';
        $user = Auth::user();

    $from_date = '';
    $to_date = '';

    if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

             if(!empty($user) && $user->user_role == 'vendor'){

            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$from_date)->where('orders.created_at','<=',$to_date)->where('orders.payment_status','Success')->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        
        else{
           $orders = Order::where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('payment_status','Success')->orderBy('id','DESC')->paginate(30);
        }

    $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

    }

    else{


        if(!empty($user) && $user->user_role == 'vendor'){
            // echo 'Yes'; die;
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.payment_status','Success')->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        
        else{
            // echo 'No'; die;
           $orders = Order::where('payment_status','Success')->orderBy('id','DESC')->paginate(30);
        }

    }

    $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);
        
        return view('admin.orders.list', [
            'orders' => $orders,
            'order_type' => $order_type,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }
    
    
    
    public function pendingPaymentOrders(Request $request)
    {
        $data = $request->all();

        $order_type = 'Pending Payment Orders';
        $user = Auth::user();

    $from_date = '';
    $to_date = '';

    if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

             if(!empty($user) && $user->user_role == 'vendor'){

            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$from_date)->where('orders.created_at','<=',$to_date)->where('orders.payment_status','Pending')->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        
        else{
           $orders = Order::where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('payment_status','Pending')->orderBy('id','DESC')->paginate(30);
        }

    $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

    }

    else{


        if(!empty($user) && $user->user_role == 'vendor'){
            // echo 'Yes'; die;
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.payment_status','Pending')->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        
        else{
            // echo 'No'; die;
           $orders = Order::where('payment_status','Pending')->orderBy('id','DESC')->paginate(30);
        }

    }

    $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);
        
        return view('admin.orders.list', [
            'orders' => $orders,
            'order_type' => $order_type,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int $orderId
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {

        $user_role = Auth::user()->user_role ?? '';
        $order = Order::find($orderId);

        if($user_role=='admin'){
            $order->admin_click = 1;
            $order->update();
        }
        else{
            $order->vendor_click = 1;
            $order->update();
        }

        $shop = RegisteredShop::where('id',$order->user_id)->first();
        
        $billing_address = Address::where('id',$order->address_id)->first();
        $delivery_address = Address::where('id',$order->delivery_address)->first();

    // var_dump($delivery_address); die;


        $items = DB::table('order_product')->JOIN('products','products.id','order_product.product_id')->where('order_product.order_id',$orderId)->select('products.cover','products.description','order_product.*')->get();
        // $items = $orderRepo->listOrderedProducts();

        // var_dump($items); die;

        $status = $order->order_status_id;

        $order_statuses = '';

        if($status == 1){
        $order_statuses = DB::table('order_statuses')->whereIn('id',[3,6])->get();
        }
        if($status == 2){
            $order_statuses = DB::table('order_statuses')->whereIn('id',[3,6])->get();
        }
        if($status == 3){
            $order_statuses = DB::table('order_statuses')->whereIn('id',[4,6])->get();
        }
        if($status == 4){
            $order_statuses = DB::table('order_statuses')->whereIn('id',[5,6])->get();
        }
        if($status == 5){
            $order_statuses = DB::table('order_statuses')->whereIn('id',[7])->get();
        }
        $currentStatus = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
        $customer = User::where('id',$order->customer_id)->first();



        return view('admin.orders.show', [
            'order' => $order,
            'items' => $items,
            'customer' => $customer,
            'currentStatus' => $currentStatus,
            'shop' => $shop,
            'billing_address' => $billing_address,
            'delivery_address' => $delivery_address,
            'order_statuses' => $order_statuses
        ]);
    }





    public function updateOrderStatus(Request $request,$orderId){
        $data = $request->all();

        $order = Order::find($orderId);

        $order->order_status_id = $data['order_status'];
        $order->update();
        
        
        
        
        $customer = User::where('id',$order->customer_id)->first();
        
        $customer->admin_email = 'Riddhi.lic@gmail.com';
        $customer->admin_name = 'GV Mart';
        
        $msg = '';

        if($data['order_status'] == 2 ){
            $msg = 'Order Approved';
        }
        elseif($data['order_status'] == 3 ){
            $msg = 'Order is under processing';

        }
        elseif($data['order_status'] == 4 ){
            $msg = 'Order is ready to ship';

        }
        elseif($data['order_status'] == 5 ){
            $msg = 'Order delivered successfully';

        }
        elseif($data['order_status'] == 6 ){
            $msg = 'Order cancelled successfully';

        }
        elseif($data['order_status'] == 7 ){
            $msg = 'Order returned successfully';

        }
        

            Mail::send('mails.orderUpdate',['customer' => $customer, 'order' => $order, 'type' => 'customer', 'order_status' => $data['order_status'], 'msg' => $msg],
               function ($m) use ($customer) {
                   $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                   $m->to($customer->email, $customer->name)->subject('Order status update.');
               });

            Mail::send('mails.orderUpdate',['customer' => $customer, 'order' => $order, 'type' => 'admin', 'order_status' => $data['order_status'], 'msg' => $msg],
               function ($m) use ($customer) {
                   $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                   $m->to($customer->admin_email, $customer->admin_name)->subject('Order status update.');
               });
        


        return redirect()->back()->with('message','Order status updated successfully.');
    }

    public function downloadInvoice($orderId){


       $order = Order::find($orderId);

    // var_dump($order); die;

       $shop = RegisteredShop::where('id',$order->user_id)->first();

       $billing_address = Address::where('id',$order->address_id)->first();
       $delivery_address = Address::where('id',$order->delivery_address)->first();


       
       $items = DB::table('order_product')->JOIN('products','products.id','order_product.product_id')->where('order_product.order_id',$orderId)->select('products.cover','products.description','order_product.*')->get();
        // $items = $orderRepo->listOrderedProducts();

        // var_dump($items); die;

       $order_statuses = DB::table('order_statuses')->get();
       $currentStatus = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
       $customer = User::where('id',$order->customer_id)->first();

       $data = [
        'order' => $order,
        'items' => $items,
        'customer' => $customer,
        'currentStatus' => $currentStatus,
        'shop' => $shop,
        'billing_address' => $billing_address,
        'delivery_address' => $delivery_address,
        'order_statuses' => $order_statuses

    ];

    $pdf = PDF::loadView('mails.orderInvoice', $data);

    return $pdf->download('invoice.pdf');
}


public function onlineTransactions(Request $request){

    $data = $request->all();

    // var_dump($data); die;

    $user = Auth::user();

    $from_date = '';
    $to_date = '';

    if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

        // var_dump($from_date);die;

        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$from_date)->where('orders.created_at','<=',$to_date)->whereNotNull('orders.transaction_id')->where()->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->whereNotNull('transaction_id')->orderBy('id','DESC')->paginate(30);
        }

    $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

    }

    else{
        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->whereNotNull('orders.transaction_id')->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::whereNotNull('orders.transaction_id')->orderBy('id','DESC')->paginate(30);
        }
    }


    return view('admin.orders.online_transactions', [
        'orders' => $orders,
        'from_date' => $from_date,
        'to_date' => $to_date
    ]);
}

public function getOrders(Request $request, $orderType){


         $data = $request->all();

    // var_dump($orderType); die;



    $user = Auth::user();

    $from_date = '';
    $to_date = '';

    $orders = '';


    $order_type = '';

    if($orderType == 'processing_orders'){
        $order_type = 'Processing Orders';


    if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

        // var_dump($from_date);die;

        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$from_date)->where('orders.created_at','<=',$to_date)->where('orders.order_status_id',3)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('order_status_id',3)->orderBy('id','DESC')->paginate(30);
        }

    $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

    }

    else{
        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.order_status_id',3)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('order_status_id',3)->orderBy('id','DESC')->paginate(30);
        }
    }

    }





    if($orderType == 'shipped_orders'){
        $order_type = 'Shipped Orders';


    if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

        // var_dump($from_date);die;

        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$from_date)->where('orders.created_at','<=',$to_date)->where('orders.order_status_id',4)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('order_status_id',4)->orderBy('id','DESC')->paginate(30);
        }

    $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

    }

    else{
        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.order_status_id',4)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('order_status_id',4)->orderBy('id','DESC')->paginate(30);
        }
    }


    }




    if($orderType == 'delivered_orders'){
        $order_type = 'Delivered Orders';


    if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

        // var_dump($from_date);die;

        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$from_date)->where('orders.created_at','<=',$to_date)->where('orders.order_status_id',5)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('order_status_id',5)->orderBy('id','DESC')->paginate(30);
        }

    $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

    }

    else{
        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.order_status_id',5)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('order_status_id',5)->orderBy('id','DESC')->paginate(30);
        }
    }


    }




    if($orderType == 'cancelled_orders'){
        $order_type = 'Cancelled Orders';


    if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

        // var_dump($from_date);die;

        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$from_date)->where('orders.created_at','<=',$to_date)->where('orders.order_status_id',6)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('order_status_id',6)->orderBy('id','DESC')->paginate(30);
        }

    $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

    }

    else{
        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.order_status_id',6)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('order_status_id',6)->orderBy('id','DESC')->paginate(30);
        }
    }


    }


if($orderType == 'returned_orders'){
        $order_type = 'Returned Orders';


    if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

        // var_dump($from_date);die;

        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.created_at','>=',$from_date)->where('orders.created_at','<=',$to_date)->where('orders.order_status_id',7)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('order_status_id',7)->orderBy('id','DESC')->paginate(30);
        }

    $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

    }

    else{
        if(!empty($users) && $user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.order_status_id',7)->orderBy('orders.id','DESC')->select('orders.*')->paginate(30);
        }
        else{
            $orders = Order::where('order_status_id',7)->orderBy('id','DESC')->paginate(30);
        }
    }


    }


    return view('admin.orders.list',[
        'orders' => $orders,
        'order_type' => $order_type,
        'orderType' => $orderType,
        'from_date' => $from_date,
        'to_date' => $to_date
    ]);

}


public function update_payment_status(Request $request){
    $data = $request->all();
    
    // var_dump($data);
    // die;
    
    $order_update = Order::where('id',$data['order_id'])->update(array('payment_status'=>$data['payment_status']));
    
     $order = Order::find($data['order_id']);
     
       
            $data['admin_email'] = 'Riddhi.lic@gmail.com';
        $data['admin_name'] = 'GV Mart';
        

    // var_dump($order); die;

        $shop = RegisteredShop::where('id',$order->user_id)->first();
        
        $billing_address = Address::where('id',$order->address_id)->first();
        $delivery_address = Address::where('id',$order->delivery_address)->first();


       
        $items = DB::table('order_product')->JOIN('products','products.id','order_product.product_id')->where('order_product.order_id',$order->id)->select('products.cover','products.description','order_product.*')->get();
        // $items = $orderRepo->listOrderedProducts();

        // var_dump($items); die;

$order_statuses = DB::table('order_statuses')->get();
$currentStatus = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
$customer = User::where('id',$order->customer_id)->first();

    
    if($order_update && $data['payment_status'] == 'Success'){
         Mail::send('mails.orderInvoice',['customer' => $customer, 'items' => $items, 'order' => $order, 'billing_address' => $billing_address, 'delivery_address' => $delivery_address, 'shop' => $shop, 'currentStatus' => $currentStatus , 'type' => 'admin' ],
                 function ($m) use ($data) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($data['admin_email'], $data['admin_name'])->subject('Order booked successfully.');
                 });
                 
                 
        Mail::send('mails.orderInvoice',['customer' => $customer, 'items' => $items, 'order' => $order, 'billing_address' => $billing_address, 'delivery_address' => $delivery_address, 'shop' => $shop, 'currentStatus' => $currentStatus , 'type' => 'user'],
                 function ($m) use ($customer) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($customer->email, $customer->name)->subject('Order booked successfully.');
                 }); 
                 
                 if(!empty($shop)){

                 
        Mail::send('mails.orderInvoice',['customer' => $customer, 'items' => $items, 'order' => $order, 'billing_address' => $billing_address, 'delivery_address' => $delivery_address, 'shop' => $shop, 'currentStatus' => $currentStatus , 'type' => 'vendor'],
                 function ($m) use ($shop) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($shop->email, $shop->shop_name)->subject('Order booked successfully.');
                 });
                 }
    
    
    }
    
    return redirect()->back()->with('message','Payment status updated successfully');
    
    
}


}
