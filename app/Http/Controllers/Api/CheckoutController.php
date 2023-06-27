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

    public function getPaymentLink($x_verify, $req){

        // print_r(1); die;

        $vars = http_build_query(array('REQUEST' => $req));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://uat.pinepg.in/api/v2/accept/payment");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'X-VERIFY: '.$x_verify,
            'Content-Type: application/x-www-form-urlencoded'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec($ch);

        if (curl_errno($ch)) {
            print "Error: " . curl_error($ch);
            exit();
        }

        curl_close($ch);

        return $server_output; 

    }

    public function checkout(Request $request, $user_id)
    {
        $data = $request->all();

        if ($data['x_verify'] != '' && $data['request'] != '') {

            $shipping_address = 0;
            $billing_address = 0;

            $customer = $data['user_id'];

            if (isset($data['new_address'])) {
                $addr = $data['new_address'];
                $newAddress = new Address;
                $newAddress->customer_id = $customer;
                $newAddress->alias = $addr['alias'] ?? 'Other';
                $newAddress->address_1 = $addr['address_1'] ?? '';
                $newAddress->address_2 = $addr['address_2'] ?? '';
                $newAddress->country_id = 101;
                $newAddress->city = $addr['city'] ?? '';
                $newAddress->landmark = $addr['landmark'] ?? '';
                $newAddress->state_code = $addr['state_code'] ?? '';
                $newAddress->zip = $addr['zip'] ?? '';
                $newAddress->phone = $addr['phone'] ?? '';
                $newAddress->delivery_address = 0;
                $newAddress->save();
            }

            $customerAdd = Address::where('customer_id', $customer)->get()->last();

            if (isset($data['billing_address']) && $data['billing_address'] != '' && $data['billing_address'] != 0) {
                $billing_address = $data['billing_address'];
            } else {
                $billing_address = $customerAdd->id;
            }

            if (isset($data['shipping_address']) && $data['shipping_address'] != '' && $data['shipping_address'] != 0) {
                $shipping_address = $data['shipping_address'];
            } else {
                $shipping_address = $customerAdd->id;
            }

            $payment_status = 'Pending';

            $order_data = [
                'reference' => '',
                'courier_id' => 0,
                'customer_id' => $customer,
                'address_id' => $billing_address,
                'delivery_address' => $shipping_address,
                'order_status_id' => '1',
                'payment' => $data['payment_method'],
                'total_products' => $data['total_products'] ?? 0,
                'total' => $data['total'],
                'total_paid' => $data['total'],
                'total_shipping' => $data['shipping_amount'],
                'coupon_code' => $data['coupon_code'] ?? '',
                'coupon_amount' => $data['coupon_amount'],
                'booking_date' => date('M d, Y / h:i A'),
                'created_at' => date('Y-m-d H:s:m'),
                'order_from_device' => $data['order_from_device'],
                'user_id' => 0,
                'payment_status' => $payment_status
            ];

            try {
                $order = DB::table('orders')->insertGetId($order_data);
            } catch (\Throwable $e) {
                echo $e->getMessage();
                die;
            }

            $orderLast = DB::table('orders')->where('customer_id', $customer)->get()->last();
            $products = $data['products'];

            foreach ($products as  $product) {
                try {
                    DB::table('order_product')
                        ->insert([
                            'order_id' => $orderLast->id,
                            'product_id' => $product['product_id'],
                            'product_name' => $product['name'] ?? '',
                            'product_sku' => $product['sku'] ?? '',
                            'color' => $product['color'] ?? '',
                            'storage' => $product['storage'] ?? '',
                            'product_size' => '',
                            'product_description' => '',
                            'quantity' => $product['quantity'] ?? 1,
                            'product_price' => $product['sale_price'] != 0 ? $product['sale_price'] : $product['price']
                        ]);
                } catch (\Throwable $e) {
                    echo $e->getMessage();
                    die;
                }

                $productUpdate = DB::table('attribute_value_product_attribute')
                    ->where('id', $product['storage_id'])
                    ->where('product_id', $product['product_id'])
                    ->first();
                    
                    // print_r($productUpdate);

                if ($productUpdate) {
                    
                    try{
                         $product_quantity = $productUpdate->quantity - $product['quantity'];
                    // $productUpdate->update();
                    DB::table('attribute_value_product_attribute')
                    ->where('id', $product['storage_id'])
                    ->where('product_id', $product['product_id'])
                    ->update([
                        "quantity" => $product_quantity
                        ]);
                    }
                    catch (\Throwable $e) {
                    echo $e->getMessage();
                    die;
                }
                    
                   
                }
            // print_r(1); die;
            }

            
              $payemnt_link = $this->getPaymentLink($data['x_verify'], $data['request']);

            $resp['order_id'] = $order;
            $resp['payment_link'] = $payemnt_link;
            
            return response()->json([
                'status' => 1,
                'message' => "Payment link fetched successfully",
                'data' => $resp
            ]);
        } else {
            return response()->json([
                'status' => 0,
                "message" => "Invalid data for payment link"
            ]);
        }
    }
}
