<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Shop\Addresses\Address;
use App\Shop\Cart\Cart;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\Products\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout(Request $request, $user_id){
        $data = $request->all();
  
        // echo $data['payment_method']; die;
        
        $delivery_address = 0;
        $billing_address = 0;
        
        $customer = $data['customer_id'];
      
        if (!$customer) {

            $findUser = User::where('email', $data['customer_email'])->first();
            if ($findUser) {
                $customer = $findUser->id;
            } else {

                $newUser = new User;

                $newUser->name = $data['customer_name'];
                $newUser->email = $data['customer_email'];
                $newUser->password = Hash::make('password');
                $newUser->status = 0;
                $newUser->account_status = 'Active';
                $newUser->user_role = 'guest';

                $newUser->save();

                if ($newUser) {
                    $findUser = User::where('email', $data['customer_email'])->first();
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
        
        $customerAdd = Address::where('customer_id', $customer)->get()->last();
        
        $billing_address = $customerAdd->id;
        
       

        if (!empty($data['shiping_another_address']) && $data['shiping_another_address'] == 'on') {
            $shipAddress = new Address;

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

            $customerAdd = Address::where('customer_id', $customer)->get()->last();
            $delivery_address = $customerAdd->id;
        } else {
            $delivery_address =  $billing_address;
        }


        
        
        
        // var_dump($shop); die;
        
        $user_id = 0;
        
        print_r($data['products']); die;
        $products = json_decode($data['products']);
        print_r(1);die;
        $coupon_code = '';
        if (session()->get('coupon_code')) {
            $coupon_code = session()->get('coupon_code');
        }

        $payment_status = 'Success';
        if ($data['payment_method'] == 'online') {
            $payment_status = 'Pending';
        }

        // var_dump($data['products']); die;

        // echo $address; die;

        $order = DB::table('orders')
            ->insert([
                'reference' => '',
                'courier_id' => 0,
                'customer_id' => $customer,
                'address_id' => $billing_address,
                'delivery_address' => $delivery_address,
                'order_status_id' => '1',
                'payment' => $data['payment_method'],
                'total_products' => $data['total_products'] ?? 0,
                'total' => $data['total'],
                'total_paid' => $data['total'],
                'total_shipping' => $data['shipping_amount'],
                'coupon_code' => $coupon_code,
                'coupon_amount' => $data['coupon_amount'],
                'booking_date' => date('M d, Y / h:i A'),
                'created_at' => date('Y-m-d H:s:m'),
                'order_from_device' => 'website',
                'user_id' => $user_id,
                'delivery_date' => session()->get('delivery_date'),
                'payment_status' => $payment_status
            ]);



        $orderLast = DB::table('orders')->where('customer_id', $customer)->get()->last();

       


        foreach ($products as  $product) {
            
            $orderProducts = DB::table('order_product')
                ->insert([
                    'order_id' => $orderLast->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name ?? '',
                    'product_sku' => $product->sku ?? '',
                    'product_size' => $product->variants ? json_encode($product->variants): '',
                    'product_description' => '',
                    'quantity' => $product->quantity,
                    'product_price' => $product->sale_price!=0 ? $product->sales_price : $product->price

                ]);

            $productUpdate = DB::table('attribute_value_product_attribute')
            ->where('id', $product->storage_id)
            ->where('product_id', $product->id)
            ->first();

            if($productUpdate){
                $productUpdate->quantity = $productUpdate->quantity - $product->cart_quantity;
                $productUpdate->update();
            }
        }
        // }

        $items = DB::table('order_product')->where('order_id', $orderLast->id)->get();

        foreach ($items as $key => $item) {
            $pro = Product::find($item->product_id);
            $items[$key]->cover = $pro->cover;
            $items[$key]->description = $pro->description ?? '';
        }


        $order = $orderLast;

        // $items

        $billing_address = DB::table('addresses')->where('id', $billing_address)->first();
        $delivery_address = DB::table('addresses')->where('id', $delivery_address)->first();

        $customer = User::where('id', $customer)->first();

        // var_dump($customer); die;

        $currentStatus = OrderStatus::find('1');

        // $shop = RegisteredShop::find($user_id);

        if ($data['payment_method'] == 'cod') {
            $cart = Cart::where('user_id', $customer->id)->delete();





            $data['admin_email'] = 'jyotikasethi3007@gmail.com';
            $data['admin_name'] = 'GV Mart';




            Mail::send(
                'mails.orderInvoice',
                ['customer' => $customer, 'items' => $items, 'order' => $order, 'billing_address' => $billing_address, 'delivery_address' => $delivery_address, 'shop' => $shop, 'currentStatus' => $currentStatus, 'type' => 'admin'],
                function ($m) use ($data) {
                    $m->from(env('MAIL_USERNAME'), env('APP_NAME'));

                    $m->to($data['admin_email'], $data['admin_name'])->subject('Order booked successfully.');
                }
            );


            Mail::send(
                'mails.orderInvoice',
                ['customer' => $customer, 'items' => $items, 'order' => $order, 'billing_address' => $billing_address, 'delivery_address' => $delivery_address, 'shop' => $shop, 'currentStatus' => $currentStatus, 'type' => 'user'],
                function ($m) use ($customer) {
                    $m->from(env('MAIL_USERNAME'), env('APP_NAME'));

                    $m->to($customer->email, $customer->name)->subject('Order booked successfully.');
                }
            );

            if (!empty($shop)) {


                Mail::send(
                    'mails.orderInvoice',
                    ['customer' => $customer, 'items' => $items, 'order' => $order, 'billing_address' => $billing_address, 'delivery_address' => $delivery_address, 'shop' => $shop, 'currentStatus' => $currentStatus, 'type' => 'vendor'],
                    function ($m) use ($shop) {
                        $m->from(env('MAIL_USERNAME'), env('APP_NAME'));

                        $m->to($shop->email, $shop->shop_name)->subject('Order booked successfully.');
                    }
                );
            }

            return view('front.success', compact('customer', 'items', 'order', 'billing_address', 'delivery_address', 'shop', 'currentStatus'));
        } else {
            return view('front.qrcode', compact('customer', 'items', 'order', 'billing_address', 'delivery_address', 'shop', 'currentStatus'));
        }
    }
}
