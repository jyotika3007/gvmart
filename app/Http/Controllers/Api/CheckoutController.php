<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Shop\Addresses\Address;
use App\Shop\Orders\Order;
use App\Shop\Cart\Cart;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\Products\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Throwable;


class CheckoutController extends Controller
{
    public function generateRequestKey($json_data)
    {

        // $ts = strtotime(Date('Y-m-d H:s:i'));
        // $addedValue = floor($ts / 1000);
        // $json_data=[
        //     "merchant_data" => [
        //       "merchant_id"=> env('MID'),
        //       "merchant_access_code"=> env('ACCESS_CODE'),
        //       "merchant_return_url"=> env('RETURN_URL'),
        //       "unique_merchant_txn_id"=> "PineLabs".$addedValue
        //     ],
        //     "customer_data"=> [
        //         "customer_id"=> 68,
        //         "email_id"=> "jyotikasethi3007@gmail.com",
        //         "first_name"=> "Jyotika",
        //         "last_name"=> "Sethi",
        //         "mobile_no"=> "9056522813"
        //     ],
        //     "payment_data"=> [
        //         "amount_in_paisa"=> 60000        ],
        //     "txn_data"=> [
        //         "navigation_mode"=> 2,
        //         "payment_mode"=> "1,3",
        //         "transaction_type"=> 1
        //     ],
        //     "udf_data"=> [
        //         "udf_field_1"=> "Xyz",
        //         "udf_field_2"=> "Test txn",
        //         "udf_field_3"=> "999999999",
        //         "udf_field_4"=> "orderId_28"
        //     ]
        //     ];

        $baseData = base64_encode(json_encode($json_data));
        $hmac_digest = hash_hmac("sha256",  $baseData, pack("H*", env('SECRET_CODE')), false);
        $resultOfKeys = ["request" => $baseData, "x_verify" => strtoupper($hmac_digest)];
// print_r($resultOfKeys);
        return $resultOfKeys;
    }

    public function getPaymentLink($linkObject)
    {

        // $header = $request->header('Authorization');

        // if ($header) {

        $req = $linkObject["request"] ?? '';
        $x_verify = $linkObject["x_verify"] ?? '';
        // $data = $request->all();
        // $req = $data["request"] ?? '';
        // $x_verify = $data["x_verify"] ?? '';
        // print_r($x_verify);die();
        if ($req != '' && $x_verify != '') {

            $vars = http_build_query(array('REQUEST' => $req));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://uat.pinepg.in/api/v2/accept/payment");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);  //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $headers = [
                'X-VERIFY: ' . $x_verify,
                'Content-Type: application/x-www-form-urlencoded'
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $server_output = curl_exec($ch);

            if (curl_errno($ch)) {
                print "Error: " . curl_error($ch);
                exit();
            }

            curl_close($ch);

            $resp_server = json_decode($server_output);

            if($resp_server->response_message == 'SUCCESS')
                $resp['payment_link']= $resp_server->redirect_url ?? '';

            return $resp;
            //    return  response()->json([
            //         'status' => 0,
            //         'message' => 'Parameters missing request & x-verify.',
            //         'data'=>$resp
            //     ]);
            // return $server_output; 
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Parameters missing request & x-verify.'
            ]);
        }
        // }
        // else{
        //     return response()->json([
        //         "status" => "400",
        //         "message" => "Bad Request. Access token required",
        //     ]);
        // }
    }

    public function checkout(Request $request, $user_id)
    {
        $data = $request->all();
        

        $header = $request->header('Authorization');

        if ($header) {

            $billing_address = 0;

            $customer = $data['user_id'];

            $customerAdd = Address::where('customer_id', $customer)->get()->last();

            if (isset($data['billing_address']) && $data['billing_address'] != '' && $data['billing_address'] != 0) {
                $billing_address = $data['billing_address'];
                $shipping_address = $data['billing_address'];
               
            } else {
                return response()-> json([
                    'status' => 0,
                    'message' => 'Address should not be empty'
                ]);
                
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
                    
                    if(isset($product['storage']) && $product['storage']!=''){
                        $pro_storage = $product['storage'];
                    }
                    else{
                        $pro_storage = '';
                    }
                     if(isset($product['color']) && $product['color']!=''){
                        $pro_color = $product['color'];
                    }
                    else{
                        $pro_color = '';
                    }
                    if(isset($product['is_prelaunch']) && $product['is_prelaunch'] == 1 ){
                        $pro_prelaunch=1;
                        $prebooking_amount=$product['price'];
                        $pro_price=0;
                    }else{
                        $pro_prelaunch=0;
                        $prebooking_amount=0;
                        $pro_price= $product['sale_price'] != 0 ? $product['sale_price'] : $product['price'];
                    }
                    DB::table('order_product')
                        ->insert([
                            'order_id' => $orderLast->id,
                            'product_id' => $product['product_id'],
                            'product_name' => $product['name'] ?? '',
                            'product_sku' => $product['sku'] ?? '',
                            'color' => $pro_color ?? '',
                            'storage' => $pro_storage ?? '',
                            'product_size' => '',
                            'product_description' => '',
                            'quantity' => $product['quantity'] ?? 1,
                            'product_price' =>$pro_price,
                            'is_prelaunch'=>$pro_prelaunch,
                            'prebooking_amount'=>$prebooking_amount,
                        ]);
                } catch (\Throwable $e) {
                    echo $e->getMessage();
                    die;
                }


// return $data; die;

if($pro_storage != ''){
    
                $productUpdate = DB::table('attribute_value_product_attribute')
                    ->where('id', $product['storage_id'])
                    ->where('product_id', $product['product_id'])
                    ->first();



                if ($productUpdate) {

                    try {
                        $product_quantity = $productUpdate->quantity - $product['quantity'];

                        DB::table('attribute_value_product_attribute')
                            ->where('id', $product['storage_id'])
                            ->where('product_id', $product['product_id'])
                            ->update([
                                "quantity" => $product_quantity
                            ]);
                    } catch (\Throwable $e) {
                        echo $e->getMessage();
                        die;
}
                    }
                }
            }

            $resp['order_id'] = $order;

            $userData = User::find($order_data["customer_id"]);
        
            $paymentVariable = [
                "merchant_data" => [
                    "merchant_id" => env('MID'),
                    "merchant_access_code" => env('ACCESS_CODE'),
                    "merchant_return_url" => env('RETURN_URL'),
                    "unique_merchant_txn_id" => "PineLabs". uniqid()
                ],
                "customer_data" => [
                    "customer_id" => $order_data["customer_id"],
                    "email_id" => $userData->email ?? '',
                    "first_name" =>  $userData->name ?? '',
                    "mobile_no" =>  $userData->mobile ?? ''
                ],
                "payment_data" => [
                    "amount_in_paisa" => $order_data['total'] * 100 ?? 0
                ],
                "txn_data" => [
                    "navigation_mode" => 2,
                    "payment_mode" => "1,3",
                    "transaction_type" => 1
                ],
                "udf_data" => [
                    "udf_field_1" => "Xyz",
                    "udf_field_2" => $order . " Test txn " . rand('1000000', '999999999'),
                    "udf_field_3" => rand('1000000', '999999999') . $order,
                    "udf_field_4" => "orderId_" . $order
                ]
            ];
            // print_r($paymentVariable);die();
            $paymentRequestKeys = $this->generateRequestKey($paymentVariable);
            $output = $this->getPaymentLink($paymentRequestKeys);

            return response()->json([
                'status' => 1,
                'message' => "Order details saved successfully",
                'data' => $output
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }

    public function getPaymentResponse(Request $request)
    {
        $data = $request->all();
        
        // $data = [
        //     "merchant_id" => "106598",
        //     "merchant_access_code" => "4a39a6d4-46b7-474d-929d-21bf0e9ed607",
        //     "unique_merchant_txn_id" => "PineLabs1687929878",
        //     "pine_pg_txn_status" => "4",
        //     "txn_completion_date_time" => "28/06/2023 10:56:26 AM",
        //     "amount_in_paisa" => "1000",
        //     "txn_response_code" => "1",
        //     "txn_response_msg" => "SUCCESS",
        //     "acquirer_name" => "HDFC",
        //     "pine_pg_transaction_id" => "8069656",
        //     "captured_amount_in_paisa" => "1000",
        //     "refund_amount_in_paisa" => "0",
        //     "payment_mode" => "1",
        //     "masked_card_number" => "********4242",
        //     "mobile_no" => "9056560413",
        //     "udf_field_1" => "Xyz",
        //     "udf_field_2" => "Test txn",
        //     "udf_field_3" => "999999999",
        //     "udf_field_4" => "orderId_28",
        //     "card_holder_name" => "test",
        //     "salted_card_hash" => "E54AC8365C2C8C7A54B13A54B5CFAA513E3ABF6FDF8C7CBF34AFCE6B735BE32D",
        //     "rrn" => "425847096720",
        //     "auth_code" => "999999",
        //     "parent_txn_status" => null,
        //     "parent_txn_response_code" => null,
        //     "parent_txn_response_message" => null,
        //     "dia_secret" => "5D4DEC5E2E43251AF0271C483B0672AA54D3D6D88FD9F39DE1F66127AEAE4FDC",
        //     "dia_secret_type" => "SHA256"
        // ];
        $order_id = explode('_', $data['udf_field_4'])[1];


        $txn_id = $data['pine_pg_transaction_id'] ?? '';
        $unique_merchant_txn_id = $data['unique_merchant_txn_id'] ?? '';
       

        $msg = $data['txn_response_msg'] ?? '';
       

         try{
            DB::table('orders')->where('id', $order_id)->update([
                'order_status_id' => 2,
                'payment_status' => $msg,
                'transaction_id' => $txn_id,
            ]);
        }catch(\Throwable $e){echo $e->getMessage();die();}

        $order = Order::find($order_id);
        $items = DB::table('order_product')->where('order_id', $order_id)->get();
        $customer = User::find($order->customer_id);

        // try{
        //     $customer=User::find($order->customer_id);
        // }catch(\Throwable $e){echo $e->getMessage();}

        // print_r(env('MAIL_USERNAME'));die();
        $billing_address = Address::find($order->address_id);
        $delivery_address = Address::find($order->delivery_address);
        $currentStatus = DB::table('order_statuses')->where('id', $order->order_status_id)->first();
        // dd($order);

        Mail::send(
            'mails.orderInvoice',
            ['customer' => $customer, 'items' => $items, 'order' => $order, 'billing_address' => $billing_address, 'delivery_address' => $delivery_address, 'currentStatus' => $currentStatus, 'type' => 'admin'],
            function ($m) use ($data) {
                $m->from(env('MAIL_USERNAME'), env('APP_NAME'));

                $m->to(env('MAIL_ADMIN'), env('APP_NAME'))->subject('Order booked successfully.');
            }
        );
        Mail::send(
            'mails.orderInvoice',
            ['customer' => $customer, 'items' => $items, 'order' => $order, 'billing_address' => $billing_address, 'delivery_address' => $delivery_address, 'currentStatus' => $currentStatus, 'type' => 'user'],
            function ($m) use ($customer) {
                $m->from(env('MAIL_USERNAME'), env('APP_NAME'));

                $m->to($customer->email, $customer->name)->subject('Order booked successfully.');
            }
        );
        
         $invoice = "iAD/".date('Y',strtotime($order->created_at))."/#".str_pad($order->id, 4, '0', STR_PAD_LEFT);
         
        return redirect()->away('https://www.iadvance.in/ThankYou?transaction_id=TXN' . $txn_id . '&payment_status=' . $msg . '&invoiceId=' . $invoice);
    }
}
