<?php

namespace App\Http\Controllers\Front;

use App\Shop\Cart\Cart;

use App\Shop\Products\Product;
use App\Shop\Customers\Customer;
use App\Shop\Locations\Location;
use App\Shop\Promocodes\Promocode;
use App\Shop\Pincodes\Pincode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use StdClass;
use Auth;

class CartController extends Controller
{


    public function getCart(){

    // $cartProducts = new StdClass;
        $cartProducts = array();
        $grandTotal = 0;
        $shippingTotal = 0;
        $subTotal;

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


        if(!empty(session()->get('cart'))){

            foreach(session()->get('cart') as $cart){
            // var_dump($cart); die;
                $product = Product::where('id',$cart->product_id)->first();
                $product->size = $cart->size;
                $product->price = $cart->unit_price;
                $product->total_price = $cart->total_price;
                $product->product_quantity = $cart->quantity;
                $product->product_size = $cart->size;
                $grandTotal = $grandTotal + $cart->total_price;
                $shippingTotal =  $shippingTotal + $product->shipping_amount ?? 0;
                $cartProducts[] = $product;
            }
        }
            if(Auth::user()){
                
            
            
            $checkCart = Cart::where('user_id',Auth::user()->id)->get();
            if(!empty($checkCart)){
                
                foreach($checkCart as $cart){
            // var_dump($cart); die;
                    $product = Product::where('id',$cart->product_id)->first();
                    $product->size = $cart->size;
                    $product->price = $cart->unit_price;
                    $product->total_price = $cart->total_price;
                    $product->product_quantity = $cart->quantity;
                    $product->product_size = $cart->size;
                    $grandTotal = $grandTotal + $cart->total_price;
                    $shippingTotal =  $shippingTotal + $product->shipping_amount ?? 0;
                    $cartProducts[] = $product;
                }
            }
            }
        
        $subTotal = $grandTotal;
        $grandTotal = $grandTotal + $shippingTotal + $shipping_charges;
        $finalBill = $grandTotal  - $coupon_amount;
        $finalBill = floor($finalBill);
        $shippingTotal = $shippingTotal+$shipping_charges;


        return view('front.cart',compact('cartProducts','grandTotal','shippingTotal','subTotal','all_pincodes','session_pincode','promocodes','coupon_amount','coupon_code','finalBill','delivery_dates'));
    }


}
