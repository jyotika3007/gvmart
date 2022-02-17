<?php

namespace App\Http\Controllers\Front;

use App\Shop\Customers\Customer;
use App\Shop\Addresses\Address;
use App\Shop\Products\Product;
use App\Shop\Locations\Location;
use App\Shop\Promocodes\Promocode;
use App\Shop\Pincodes\Pincode;
use App\Shop\Orders\Order;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\RegisteredShop\RegisteredShop;
use App\Shop\Cart\Cart;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,StdClass;
use App\User;
use Mail,Hash;

class CheckoutController extends Controller
{
    

    public function index(Request $request){

        // echo 'Yes'; die;

        if(empty(session()->get('cart'))){
            // if(auth()->user()){
            //     $userCount = Cart::where('user_id',auth()->user()->id)->count();
            //     if($userCount==0){
            //         return redirect()->route('home');
            //     }
            // }
            
             return redirect()->route('home');
        }
        
        $carts = session()->get('cart');

        $products = array();
        $pros = array();
        $totalBill = 0;
        $customer = auth()->user();

        $userCart = '';

$addresses = '';

        $last_address = '';

        if($customer){        

        $addresses = Address::where('customer_id',$customer->id)->get();

        $userCart = Cart::where('user_id',$customer->id)->get();
        
        $last_address = DB::table('addresses')->where('customer_id',$customer->id)->get()->last();
        
        }
        

        // var_dump($last_address); die;
        
        $shop_id = 0;
        $shippingTotal = 0;
        $grandTotal = 0;

        $totalProducts = 0;

        $shipping_charges = 0;

    $session_pincode = 0;
    $coupon_amount = 0;
    $finalBill = 0;

    if(session()->get('store_pincode')){
        $session_pincode = session()->get('store_pincode');
        $location = Location::where('pincode',$session_pincode)->first();

        if($location){
            $shipping_charges = $location->shipping_amount;
        }
    }

 if(session()->get('coupon_amount')){
           $coupon_amount = session()->get('coupon_amount');

        }


$delivery_dates = array();

        $today = date('M d, Y');

        $current = strtotime(date('Y-m-d H:s:m'));
        // echo "<br>";
        $match = strtotime($today.' 00:00:00');
        
        if ($current > $match) {
            // echo 'G';
       $delivery_dates[0] = date('M d, Y', strtotime(' +2 day'));
       session()->put('delivery_date',$delivery_dates[0]);
        $delivery_dates[1] = date('M d, Y', strtotime(' +3 day'));
        $delivery_dates[2] = date('M d, Y', strtotime(' +4 day'));
       // var_dump($delivery_dates); die;
    }
    else{
            // echo 'S';
        $delivery_dates[0] = date('M d, Y', strtotime(' +2 day'));
       session()->put('delivery_date',$delivery_dates[0]);
        $delivery_dates[1] = date('M d, Y', strtotime(' +3 day'));
        $delivery_dates[2] = date('M d, Y', strtotime(' +4 day'));
       // var_dump($delivery_dates); die;
    }
    // die;


        $shipping_charges = 0;

        $current_date = date('Y-m-d');


        $promocodes = Promocode::where('promocode_start_date','<=',$current_date)->where('promocode_expiry_date','>=',$current_date)->where('promocode_status',1)->get();

        $all_pincodes = Pincode::where('status',1)->get();
        
        $session_pincode = 0;
        $coupon_amount = 0;
        $coupon_code = '';
        if(session()->get('store_pincode')){
            $session_pincode = session()->get('store_pincode');
            $location = Location::where('pincode',$session_pincode)->first();

            if($location){
                $shipping_charges = $location->shipping_amount;
            }
        }

 if(session()->get('coupon_amount')){
           $coupon_amount = session()->get('coupon_amount');
        }
if(session()->get('coupon_code')){
           $coupon_code = session()->get('coupon_code');
        }


    if($carts){
        
        foreach($carts as $cart){
            $product = Product::where('id',$cart->product_id)->first();
            $product->cart_quantity = $cart->quantity;
            $product->total_price = $cart->total_price;
            $product->price = $cart->unit_price;
            $product->product_size = $cart->size;
            $pros[] = $product;
            $totalBill = $totalBill + $cart->total_price;
            $shippingTotal = $shippingTotal + $product->shipping_amount ?? 0;
            $shop_id = $product->user_id;
        $totalProducts++ ;
        }
}

        if(!empty($userCart)){
            foreach($userCart as $cart){
            $product = Product::where('id',$cart->product_id)->first();
            $product->cart_quantity = $cart->quantity;
            $product->total_price = $cart->total_price;
            $product->price = $cart->unit_price;
            $product->product_size = $cart->size;
            $pros[] = $product;
            $totalBill = $totalBill + $cart->total_price;
            $shippingTotal = $shippingTotal + $product->shipping_amount ?? 0;
            $shop_id = $product->user_id;
        $totalProducts++ ;
        }
        }

        $products = $pros;

        $rates = '';
        $shipment_object_id = array();
        $rates = [];

// var_dump($products); die;
        
// echo $shop_id ; die;
          // Get payment gateways
        $payments = '';
        $total = $totalBill;

        $grandTotal = $totalBill + $shippingTotal + $shipping_charges;
        $finalBill = $grandTotal -$coupon_amount;
        $finalBill = floor($finalBill);

        $shippingTotal = $shippingTotal + $shipping_charges;

        $billingAddress = '';

        // var_dump($products); die;

        $totalCartProduct = json_encode($products);

        // var_dump($shop_id); die;


        return view('front.checkout',compact('last_address','products','totalBill','shop_id','customer','addresses','rates','shipment_object_id','totalProducts','payments','total','billingAddress','totalCartProduct','grandTotal','shippingTotal','session_pincode','coupon_amount','finalBill','all_pincodes','session_pincode','promocodes','coupon_amount','coupon_code','delivery_dates'));
    }

    public function postCheckout(Request $request){
        $data = $request->all();
        // var_dump($data);die;
        
        // echo $data['payment_method']; die;

        $delivery_address = 0;
        $billing_address = 0;

        $customer = $data['customer_id'];

        if(!$customer){

            $findUser = User::where('email',$data['customer_email'])->first();
            if($findUser){
                $customer = $findUser->id;
            }
            else{

            $newUser = new User;

            $newUser->name = $data['customer_name'];
            $newUser->email = $data['customer_email'];
            $newUser->password = Hash::make('password');
            $newUser->status = 0;
            $newUser->account_status = 'Active';
            $newUser->user_role = 'guest';

            $newUser->save();

            if($newUser){
            $findUser = User::where('email',$data['customer_email'])->first();
            $customer = $findUser->id;
            }



            }
        }

        $newAddress = new Address;
         $newAddress->customer_id = $customer;
        $newAddress->alias = 'Home';
        $newAddress->address_1 = $data['address_1'] ?? '';
        $newAddress->address_2 = $data['address_2'] ?? '';
        $newAddress->country_id = 99;
        $newAddress->city = $data['city'] ?? '';
        $newAddress->landmark = $data['landmark'] ?? '';
        $newAddress->state_code = $data['state_code'] ?? '';
        $newAddress->zip = $data['zip'] ?? '';
        $newAddress->phone = $data['phone'] ?? '';
        $newAddress->delivery_address = 0;
        $newAddress->save();

        $customerAdd = Address::where('customer_id',$customer)->get()->last();

        $billing_address = $customerAdd->id; 


        if(!empty($data['shiping_another_address']) && $data['shiping_another_address'] == 'on' ){
            $shipAddress = new Address ;

            $shipAddress->customer_id = $customer;
        $shipAddress->alias = 'Home';
        $shipAddress->address_1 = $data['address_11'] ?? '';
        $shipAddress->address_2 = $data['address_21'] ?? '';
        $shipAddress->country_id = 99;
        $shipAddress->city = $data['city1'] ?? '';
        $shipAddress->landmark = $data['landmark1'] ?? '';
        $shipAddress->state_code = $data['state_code1'] ?? '';
        $shipAddress->zip = $data['zip1'] ?? '';
        $shipAddress->phone = $data['phone1'] ?? '';
        $shipAddress->delivery_address = 0;
        $shipAddress->save();
        
        $customerAdd = Address::where('customer_id',$customer)->get()->last();
        $delivery_address = $customerAdd->id; 
        }
        else{
            $delivery_address =  $billing_address;
        }







        $shop = RegisteredShop::where('user_id',$data['shop_id'])->first();

        // var_dump($shop); die;

        $user_id = $shop->id ?? '0';

    $products = json_decode($data['products']);
    $coupon_code = '';
    if(session()->get('coupon_code')){
        $coupon_code = session()->get('coupon_code');
    }
    
        $payment_status = 'Success';
        if($data['payment_method'] == 'online'){
            $payment_status = 'Pending';
        }
        
        // var_dump($data['products']); die;
        
        // echo $address; die;

        $order = DB::table('orders')
        ->insert([
            'reference' => ' ',
            'courier_id' => 0,
            'customer_id' => $customer,
            'address_id' => $billing_address,
            'delivery_address' => $delivery_address,
            'order_status_id' => '1',
            'payment' => $data['payment_method'],
            'total_products' => count(session()->get('cart')),
            'total' => $data['total'],
            'total_paid' => $data['total'],
            'total_shipping' => $data['shipping_amount'],
            'coupon_code' => $coupon_code,
            'coupon_amount' => $data['coupon_amount'],
            'booking_date' => date('M d, Y / h:i A' ),
            'created_at' => date('Y-m-d H:s:m'),
            'order_from_device' => 'website',
            'user_id' => $user_id,
            'delivery_date' =>session()->get('delivery_date'),
            'payment_status' => $payment_status
        ]);



        $orderLast = DB::table('orders')->where('customer_id',$customer)->get()->last();

    // echo $data['totalProducts']; die;

        // var_dump($products); die;

//     if($data['totalProducts'] == 1){
//         $orderProducts = DB::table('order_product')
//         ->insert([
//             'order_id' => $orderLast->id,
//             'product_id' => $products->id,
//             'product_name' => $products->name?? '', 
//             'product_sku' => $products->sku?? '', 
//             'product_size' => $products->product_size ?? '', 
//             'product_description' => $products->description?? '', 
//             'quantity' => $products->cart_quantity,
//             'product_price' => $products->price
//         ]);
//     }

// else{


        foreach($products as  $product){
            // $product = Product::find($pro);
            // var_dump($product); die;
        $orderProducts = DB::table('order_product')
        ->insert([
            'order_id' => $orderLast->id,
            'product_id' => $product->id,
            'product_name' => $product->name?? '', 
            'product_sku' => $product->sku?? '', 
            'product_size' => $product->product_size ?? '', 
            'product_description' => $product->description?? '', 
            'quantity' => $product->cart_quantity,
            'product_price' => $product->price

        ]);

        $productUpdate = Product::where('id',$product->id)->first();

            $productUpdate->stock_quantity = $productUpdate->stock_quantity-$product->cart_quantity;
                        $productUpdate->purchase_quantity = $productUpdate->purchase_quantity+$product->cart_quantity;
        $productUpdate->update();
        
        }
// }
        
        $items = DB::table('order_product')->where('order_id',$orderLast->id)->get();
    
    foreach($items as $key => $item){
        $pro = Product::find($item->product_id);
        $items[$key]->cover = $pro->cover;
        $items[$key]->description = $pro->description ?? '';
    }
    
        
        $order = $orderLast;
        
        // $items

        $billing_address = DB::table('addresses')->where('id',$billing_address)->first();
        $delivery_address = DB::table('addresses')->where('id',$delivery_address)->first();
        
        $customer = User::where('id',$customer)->first();
        
        // var_dump($customer); die;
        
        $currentStatus = OrderStatus::find('1');
        
        // $shop = RegisteredShop::find($user_id);

        if($data['payment_method'] == 'cod'){
            $cart = Cart::where('user_id',$customer->id)->delete();
           
            
            
            
            
            $data['admin_email'] = 'Riddhi.lic@gmail.com';
        $data['admin_name'] = 'GV Mart';
        
        
            
            
             session()->forget('cart');
            session()->forget('store_pincode');
            session()->forget('coupon_code');
            session()->forget('coupon_amount');
            
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
            
                return view('front.success',compact('customer','items','order','billing_address','delivery_address','shop','currentStatus'));
       
           
         
        }
        else{
            return view('front.qrcode',compact('customer','items','order','billing_address','delivery_address','shop','currentStatus'));
        }

    }


  



public function orderInvoice($orderId){


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

        return view('mails.orderInvoice', [
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

public function removeSession(){
    session()->forget('cart');
            session()->forget('store_pincode');
            session()->forget('coupon_code');
            session()->forget('coupon_amount');
}



}
