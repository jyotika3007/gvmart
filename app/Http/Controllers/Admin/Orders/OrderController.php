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

    public function refundPaymentRequest($order){

        $uniqueId = 'PineLab'.uniqid();
        $req = array(
            'ppc_Amount'=>$order["total"]*100,
            'ppc_CurrencyCode'=>356,
            'ppc_MerchantAccessCode'=>env('ACCESS_CODE'),
            'ppc_MerchantID'=>env('MID'),
            'ppc_PinePGTransactionID'=>$order["transaction_id"],
            'ppc_TransactionType'=>10,
            'ppc_UniqueMerchantTxnID'=> $uniqueId
        );
 
        $vars = http_build_query($req);

        // $baseData = base64_encode(json_encode($vars));
        $hmac_digest = hash_hmac("sha256",  $vars, pack("H*", env('SECRET_CODE')), false);
        $resultOfKeys = strtoupper($hmac_digest);

        // echo $resultOfKeys . ' / ' . $uniqueId; die;
        // print_r($resultOfKeys);
        // return $resultOfKeys;
        // $options['name'] = $new_input['name'];

        $req['ppc_DIA_SECRET'] =$resultOfKeys;
        $req['ppc_DIA_SECRET_TYPE']='SHA256';
        // (array(
        //     'ppc_Amount'=>$order["total"]*100,
        //     'ppc_CurrencyCode'=>356,
        //     'ppc_MerchantAccessCode'=>env('ACCESS_CODE'),
        //     'ppc_MerchantID'=>env('MID'),
        //     'ppc_DIA_SECRET' => $resultOfKeys,
        //     'ppc_DIA_SECRET_TYPE' => 'SHA256',
        //     'ppc_PinePGTransactionID'=>$order["transaction_id"],
        //     'ppc_TransactionType'=>10,
        //     'ppc_UniqueMerchantTxnID'=>'PineLab'.uniqid()
        // ));

        // 'unique_merchant_txn_id'=>$unique_merchant_txn_id

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://uat.pinepg.in/api/PG/V2");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($req));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Content-Type: application/x-www-form-urlencoded'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec($ch);

        if (curl_errno($ch)) {
            print "Error: " . curl_error($ch);
            exit();
        }

        curl_close($ch);
        $ppc_resp=json_decode($server_output);
        if(in_array($ppc_resp->ppc_TxnResponseMessage, ["SUCCESS","INITIATED"] )){
            DB::table('orders')->where('id', $order['id'])->update([
                'unique_merchant_txn_id'=>$uniqueId
            ]);
        }
    
        // {"ppc_MerchantID":"106598","ppc_MerchantAccessCode":"4a39a6d4-46b7-474d-929d-21bf0e9ed607",
            // "ppc_PinePGTxnStatus":"6","ppc_TransactionCompletionDateTime":"06/07/2023 06:54:30 PM",
            // "ppc_UniqueMerchantTxnID":"PineLab64a6c07088eae","ppc_Amount":"9499905",
            // "ppc_TxnResponseCode":"1","ppc_TxnResponseMessage":"SUCCESS","ppc_PinePGTransactionID":"8084016",
            // "ppc_CapturedAmount":"0","ppc_RefundedAmount":"9499905","ppc_AcquirerName":"HDFC",
            // "ppc_DIA_SECRET":"CDEB44169A274C3730EC875DEC31E2B33BD5ED13099E5522EB5F770CFEBEBF29",
            // "ppc_DIA_SECRET_TYPE":"SHA256","ppc_PaymentMode":"1","ppc_RRN":"428779754742"}
        return $ppc_resp->ppc_TxnResponseMessage;
    }


    public function updateOrderStatus(Request $request,$orderId){
        $data = $request->all();

        $order = Order::find($orderId);

        $order->order_status_id = $data['order_status'];
        
        $customer = User::where('id',$order->customer_id)->first();
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
            $msg = 'Order delivered';

        }
        elseif($data['order_status'] == 7 ){           
           $refundResponce=$this->refundPaymentRequest($order);
           if($refundResponce){
            $msg = 'Refund initiated';
           }

        }
        elseif($data['order_status'] == 8 ){
            $msg = 'Order request rejected';

        }
        $order->update();
        
        if(!in_array($data['order_status'],[7,8])){
            Mail::send('mails.orderUpdate',['customer' => $customer, 'order' => $order, 'type' => 'admin', 'order_status' => $data['order_status'], 'msg' => $msg],
            function ($m) use ($customer) {
                $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                $m->to(env('MAIL_ADMIN'), env('APP_NAME'))->subject('Order status update.');
            });
            
        }

        Mail::send('mails.orderUpdate',['customer' => $customer, 'order' => $order, 'type' => 'customer', 'order_status' => $data['order_status'], 'msg' => $msg],
        function ($m) use ($customer) {
            $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

            $m->to($customer->email, $customer->name)->subject($msg);
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
     
       
        //     $data['admin_email'] = 'Riddhi.lic@gmail.com';
        // $data['admin_name'] = 'IAdvance Apple Store';
        

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


public function getOrdersRequest($type){
    $from_date = '';
    $to_date = '';
    if($type == 'cancel'){
        $order_type = 'Cancel Request';
        $orders = Order::where('order_status_id',6)->paginate(30);
    }
    else if($type == 'return'){
        $order_type = 'Return Request';
        $orders = Order::where('order_status_id',9)->paginate(30);
        
    }
    else if($type == 'approved'){
        $order_type = 'Approved Request';
        $orders = Order::where('order_status_id',7)->paginate(30);
        
    }
    else if($type == 'rejected'){
        $order_type = 'Rejected Request';
        $orders = Order::where('order_status_id',8)->paginate(30);
        
    }
    // dd($order_type);
    return view('admin.requests.list', [
        'orders' => $orders,
        'order_type' => $order_type,
        'from_date' => $from_date,
        'to_date' => $to_date
    ]);
}


}
