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

     public function getPaymentLink(Request $request){

$data = $request->all();
$req = $data['request'] ?? '';
$x_verify = $data['x_verify'] ?? '';

if($req != '' && $x_verify != ''){
    

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
        
        $resp['payment_link'] = $server_output;
        
        return response()->json([
        'status' => 1,
        'message' => 'Payemnt link generated successfully.',
        'data' => $resp
        ]);
        // return $server_output; 
}
else{
    return response()->json([
        'status' => 0,
        'message' => 'Parameters missing request & x-verify.'
        ]);
}
    }

    public function checkout(Request $request, $user_id)
    {
        $data = $request->all();
        // print_r($data); die;

            $shipping_address = 0;
            $billing_address = 0;

            $customer = $data['user_id'];

        // print_r(1); die;
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
            
            }

        //   $payemnt_link = $this->getPaymentLink($data['x_verify'], $data['request']);

            $resp['order_id'] = $order;
            // $resp['payment_link'] = $payemnt_link;
            
            return response()->json([
                'status' => 1,
                'message' => "Order details saved successfully",
                'data' => $resp
            ]);
        
    }
    
    public function getPaymentResponse(Request $request){
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
        //     "udf_field_4" => "orderId_43",
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
         
        $order_id = explode('_',$data['udf_field_4'])[1];
         
        $txn_id = $data['pine_pg_transaction_id'];
        $msg = $data['txn_response_msg'];
         
        DB::table('orders')->where('id',$order_id)->update([
            'order_status_id' => 2,
            'payment_status' => $msg,
            'transaction_id' => $txn_id
        ]);
         
        // dd($data);
        
        return redirect()->away('https://www.iadvance.in/ThankYou?transaction_id=TXN'.$txn_id.'&payment_status='.$msg);
    }
    
}
