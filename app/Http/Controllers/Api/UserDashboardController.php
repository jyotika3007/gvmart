<?php

namespace App\Http\Controllers\Api;

use App\AppleService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Shop\Cart\Cart;
use App\Shop\Wishlist\Wishlist;
use Illuminate\Support\Facades\DB;
use App\Shop\Orders\Order;
use App\Shop\Addresses\Address;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\Products\Product;
use App\Shop\ProductImages\ProductImage;

class UserDashboardController extends Controller
{

    public function __construct(Request $request)
    {
    }


    public function userProfile(Request $request, $userid)
    {
        $header = $request->header('Authorization');

        if ($header) {
            $user = User::where('remember_token', $header)->where('id', $userid)->first(['id', 'name', 'email', 'mobile']);
            if ($user) {
                return response()->json([
                    "status" => "1",
                    "message" => "User detail fetched successfully.",
                    "data" => $user
                ]);
            } else {
                return response()->json([
                    "status" => "0",
                    "message" => "Invalid request. User id not matched"
                ]);
            }
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }

    public function productAddToCart(Request $request)
    {
        $header = $request->header('Authorization');

        if ($header) {
            $data = $request->all();

            if (count($data) > 0) {
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['user_id'] == '' || $data[$i]['product_id'] == '' || $data[$i]['quantity'] == '' || $data[$i]['unit_price'] == '' || $data[$i]['total_price'] == '') {

                        return response()->json([
                            "status" => "0",
                            "message" => "Missing Parameters. User ID, Product Id, Product Quantity, Unit Price & Total Price are mendatory"

                        ]);
                    } else {

                        $last_id = Cart::insertGetId($data[$i]);
                        if ($last_id) {
                            return response()->json([
                                "status" => "1",
                                "message" => "Product add to cart successfully.",

                            ]);
                        } else {
                            return response()->json([
                                "status" => "0",
                                "message" => "Something went wrong."
                            ]);
                        }
                    }
                }
            }
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }

    public function userCartProducts(Request $request, $userid)
    {
        $header = $request->header('Authorization');

        if ($header) {

            $cartProducts = Cart::JOIN('products', 'products.id', 'carts.product_id')->where('carts.user_id', $userid)->get(['carts.*', 'products.name as product_name', 'products.slug as product_slug', 'products.cover']);
            // print_r('123'); die;

            if ($cartProducts) {
                return response()->json([
                    "status" => "1",
                    "message" => "Cart products fetched successfully.",
                    "data" => $cartProducts

                ]);
            } else {
                return response()->json([
                    "status" => "0",
                    "message" => "Something went wrong."
                ]);
            }
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }

    public function productAddToWishlist(Request $request)
    {

        $header = $request->header('Authorization');

        if ($header) {
            $data = $request->all();

            if ($data['user_id'] == '' || $data['product_id'] == '') {

                return response()->json([
                    "status" => "0",
                    "message" => "Missing Parameters. User ID, Product ID are mendatory"
                ]);
            } else {

                $data['user_shop_id'] = 1;

                $checWishlist = Wishlist::where('product_id', $data['product_id'])->where('user_id', $data['user_id'])->first();

                if ($checWishlist) {
                    return response()->json([
                        "status" => "0",
                        "message" => "Product already in your wishlist."
                    ]);
                } else {

                    $last_id = Wishlist::insertGetId($data);
                    if ($last_id) {
                        return response()->json([
                            "status" => "1",
                            "message" => "Product add to wishlist successfully.",
                        ]);
                    } else {
                        return response()->json([
                            "status" => "0",
                            "message" => "Something went wrong."
                        ]);
                    }
                }
            }
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }


    public function userWishlistProducts(Request $request, $userid)
    {
        $header = $request->header('Authorization');

        if ($header) {

            $cartProducts = Wishlist::JOIN('products', 'products.id', 'wishlists.product_id')->where('wishlists.user_id', $userid)->get(['wishlists.*', 'products.name as product_name', 'products.slug as product_slug', 'products.cover', 'products.price', 'products.stock_quantity']);

            if ($cartProducts) {
                return response()->json([
                    "status" => "1",
                    "message" => "Wishlist products fetched successfully.",
                    "data" => $cartProducts
                ]);
            } else {
                return response()->json([
                    "status" => "0",
                    "message" => "Something went wrong."
                ]);
            }
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }


    public function removeFromCart(Request $request)
    {
        $header = $request->header('Authorization');

        if ($header) {
            $data = $request->all();

            $cart = Cart::find($data['cart_id']);
            // print_r($cart); die;

            $cart->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Product removed from cart successfully.'
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }


    public function removeFromWishlist(Request $request)
    {
        $header = $request->header('Authorization');

        if ($header) {
            $data = $request->all();
            $wishlist = Wishlist::find($data['wishlist_id']);
            $wishlist->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Product removed from wishlist successfully.'
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }


    public function updateUserProfile(Request $request, $user_id)
    {
        $header = $request->header('Authorization');

        if ($header) {
            $data = $request->all();
            $cart = User::where('id', $user_id)->update($data);

            return response()->json([
                'status' => 1,
                'message' => 'Profile detail updated successfully.'
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }


    public function getUserOrdersList(Request $request, $userid)
    {

        $header = $request->header('Authorization');

        if ($header) {
            $orders = Order::where('customer_id', $userid)->orderBy('id', 'DESC')->get();

            return response()->json([
                "status" => 1,
                "message" => "Orders History fetched successfully.",
                "data" => $orders
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }

        // print_r($orders);
        // die;
        // $items = DB::table('order_product')->JOIN('products', 'products.id', 'order_product.product_id')->where('order_product.order_id', $orderId)->select('products.cover', 'products.description', 'order_product.*')->get();
    }


    public function getAllStates()
    {
        try {
            $states = DB::table('states')->where('countries_id', 101)->get(['id', 'name as state_name']);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        return response()->json([
            'status' => 1,
            'message' => 'States fetched successfully',
            'data' => $states
        ]);
    }

    public function getAllCities($state_id)
    {
        try {
            $cities = DB::table('cities')->where('state_id', $state_id)->get(['id', 'name as city_name']);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        return response()->json([
            'status' => 1,
            'message' => 'Cities fetched successfully',
            'data' => $cities
        ]);
    }


    public function getUsersSavedAddresses(Request $request, $user_id)
    {
        $header = $request->header('Authorization');

        if ($header) {

            try {
                $addresses = DB::table('addresses')
                    ->join('states', 'states.id', 'addresses.state_code', 'left')
                    ->join('cities', 'cities.id', 'addresses.city', 'left')
                    ->where('customer_id', $user_id)
                    ->get(['addresses.id', 'addresses.alias', 'addresses.address_1', 'addresses.address_2', 'addresses.zip as pincode', 'addresses.phone as conatct_no', 'addresses.landmark', 'cities.name as city_name', 'states.name as state_name']);
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }

            return response()->json([
                'status' => 1,
                'message' => 'User saved addresses fetched successfully',
                'data' => $addresses
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }


    public function postUserAddress(Request $request, $user_id)
    {

        $header = $request->header('Authorization');
        if ($header) {

            $data = $request->all();

            $saveData = array(
                'alias' => $data['alias'] ?? '',
                'address_1' => $data['address_1'] ?? '',
                'address_2' => $data['address_2'] ?? '',
                'landmark' => $data['landmark'] ?? '',
                'zip' => $data['pincode'] ?? '',
                'state_code' => $data['state_id'] ?? '',
                'city' => $data['city_id'] ?? '',
                'country_id' => 101,
                'status' => 1,
                'delivery_address' => 0,
                'customer_id' => $user_id,
                'phone' => $data['contact_no'] ?? '',
            );
            // print_r($saveData); die;

            try {
                DB::table('addresses')->insert($saveData);
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }

            return response()->json([
                'status' => 1,
                'message' => "User's address saved successfully"
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }

    public function getOrderDetail(Request $request, $orderId)
    {
        $header = $request->header('Authorization');

        if ($header) {

            $data = [];
            $order = Order::where('id', $orderId)->first();

            $status = DB::table('order_statuses')->where('id', $order->order_status_id)->first(['name', 'color']);

            $order->order_status = $status->name ?? '';
            $order->order_status_color = $status->color ?? '';

            $data['order'] = $order;
            $data['billing_address'] = Address::where('id', $data['order']->address_id)->first();

            $data['items'] = DB::table('order_product')->JOIN('products', 'products.id', 'order_product.product_id')->where('order_product.order_id', $orderId)->get(['order_product.*', 'products.cover']);

            return response()->json([
                'status' => 1,
                'message' => 'Order detail fetched successfully',
                'data' => $data
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }


    public function getOrdersList(Request $request, $user_id)
    {

        $header = $request->header('Authorization');

        if ($header) {

            $orders = [];
            $data = [];
            $orders_list = Order::where('customer_id', $user_id)->where('order_status_id', '<=', 5)->orderBy('id', 'DESC')->get();
            $i = 0;

            $order_statuses = OrderStatus::limit(5)->get();

            if ($orders_list) {
                foreach ($orders_list as $order) {
                    $orders[$i]['order'] = $order;

                    $items = DB::table('order_product')->JOIN('products', 'products.id', 'order_product.product_id')->where('order_product.order_id', $order->id)->get(['order_product.*', 'products.cover', 'products.slug']);

                    $orders[$i]['items'] = $items;

                    $billing_address = Address::where('id', $order->address_id)->first();
                    $orders[$i]['billing_address'] = $billing_address;

                    $delivery_address = Address::where('id', $order->delivery_address)->first();
                    $orders[$i]['delivery_address'] = $delivery_address;


                    $i++;
                }
            }
            // dd(1);

            $data['orders'] = $orders;
            $data['order_statuses'] = $order_statuses;

            return response()->json([
                'status' => 1,
                'message' => 'Orders List fetched successfully',
                'data' => $data
            ]);
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }

    public function getCartRelatedItems(Request $request)
    {

        $data = $request->all();

        $related_products = [];
        $related_services = [];

        for ($i = 0; $i < count($data); $i++) {

            $products = DB::table('related_products')->where('product_id', $data['product_ids'][$i])->where('type', 'product')->get(['related_products.related_product_id as id']);
            $services = DB::table('related_products')->where('product_id', $data['product_ids'][$i])->where('type', 'apple_service')->get(['related_products.related_product_id as id']);

            $ids = [];
            $service_id = [];

            for ($j = 0; $j < count($products); $j++) {
                array_push($ids, $products[$j]->id);
            }

            for ($j = 0; $j < count($services); $j++) {
                array_push($service_id, $services[$j]->id);
            }

            $products_array = Product::whereIn('id', $ids)->where('status', 1)->get(['id', 'slug', 'name', 'cover', 'price', 'sale_price', 'discount', 'stock_quantity', 'prelaunch_price', 'prelaunch_price']);
            $apple_services = AppleService::whereIn('id', $service_id)->get();

            if ($products_array) {

                foreach ($products_array as $sp) {
                    $attributes = DB::table('attribute_value_product_attribute')
                        ->join('attribute_values', 'attribute_values.id', 'attribute_value_product_attribute.attribute_value_id')
                        ->where('attribute_value_product_attribute.product_id', $sp->id)
                        ->where('attribute_values.attribute_id', 3)
                        ->where('attribute_value_product_attribute.status', 1)
                        ->get(['attribute_value_product_attribute.*', 'attribute_values.value', 'attribute_values.id as value_id']);
                    if (count($attributes) > 0) {
                        foreach ($attributes as $attr) {
                            $prods = clone $sp;
                            $prods->storage = $attr->value;
                            $prods->storage_id = $attr->value_id;
                            $prods->price = $attr->price ?? 0;
                            $prods->offer_price = $attr->offer_price ?? 0;
                            $prods->stock_quantity = $attr->quantity ?? 0;

                            $color_ids = DB::table('product_images')->where('product_id', $prods->id)->where('storage_id', $attr->id)->distinct('color_id')->get(['color_id']);

                            if (count($color_ids) > 0) {
                                foreach ($color_ids as $col) {
                                    $color_products = clone $prods;
                                    $product_img = ProductImage::where('product_id', $prods->id)->where('color_id', $col->color_id)->first(['src']);
                                    $color_code = DB::table('attribute_values')->where('id', $col->color_id)->first(['value', 'code']);
                                    // dd($color_code);
                                    if ($product_img)
                                        $color_products->cover = $product_img->src ?? '';
                                    else
                                        $color_products->cover = '';

                                    if ($color_code) {
                                        $color_products->color = $color_code->value ?? '';
                                        $color_products->color_code = $color_code->code ?? '';
                                    } else {
                                        $color_products->color = '';
                                        $color_products->color_code = '';
                                    }

                                    array_push($related_products, $color_products);
                                }
                            } else {
                                $prods->color = '';
                                $prods->color_code = '';
                                array_push($related_products, $prods);
                            }

                            // array_push($related_products,$prods);
                        }
                    } else {
                        array_push($related_products, $sp);
                    }
                }
            }

            if ($apple_services) {
                foreach ($apple_services as $app){
                    $app->stock_quantity = 1;
                    array_push($related_services, $app);
                }
            }
        }

        $data_new['related_products'] = $related_products;
        $data_new['related_services'] = $related_services;

        return response()->json([
            'status' => 1,
            'message' => 'Related items fetched successfully.',
            'data' => $data_new
        ]);
    }

    public function updateOrderStatus(Request $request)
    {
        $header = $request->header('Authorization');
        // echo $header;
        // die;
        if ($header) {

            $data = $request->all();
            if ($data['requestStatus'] == "Cancel") {
                $orderStatus = Order::where('id', $data['orderId'])->where('order_status_id', 2)->first(['order_status_id']);
                if ($orderStatus) {
                    // print_r($data);die();
                    $updatedOrderCancelStatus = Order::where('id', $data['orderId'])->update(['order_status_id' => 6, "request_type" => $data['requestStatus'], "request_reason_id" => $data["reason"]]);
                    $orderDetail = Order::find($data['orderId']);
                    $user = User::find($data["userId"]);
                    Mail::send(
                        'mails.orderUpdate',
                        ['order' => $orderDetail, 'type' => 'admin', 'order_status' => $orderDetail->order_status_id],
                        function ($m) use ($orderDetail) {
                            $m->from(env('MAIL_USERNAME'), env('APP_NAME'));
                            $m->to(env('MAIL_ADMIN'), env('APP_NAME'))->subject('Order Cancel Request');
                        }
                    );

                    Mail::send(
                        'mails.orderUpdate',
                        ['order' => $orderDetail, 'type' => 'user', 'order_status' => $orderDetail->order_status_id],
                        function ($m) use ($user) {
                            $m->from(env('MAIL_USERNAME'), env('APP_NAME'));
                            $m->to($user->email, $user->name)->subject('Order Cancel Request');
                        }
                    );
                    return response()->json([
                        "status" => "1",
                        "message" => "cancel order request submitted successfully",
                    ]);
                } else {
                    return response()->json([
                        "status" => "0",
                        "message" => "You can not cancel this order",
                    ]);
                }
            } else if ($data['requestStatus'] == "Return") {
                $orderStatus = Order::where('id', $data['orderId'])->where('order_status_id', 5)->first(['order_status_id']);
                if ($orderStatus) {
                    $updatedOrderCancelStatus = Order::where('id', $data['orderId'])->update(['order_status_id' => 9, "request_type" => $data['requestStatus'], "request_reason_id" => $data["reason"]]);
                    $orderDetail = Order::find($data['orderId']);
                    $user = User::find($data["userId"]);
                    Mail::send(
                        'mails.orderUpdate',
                        ['order' => $orderDetail, 'type' => 'admin', 'order_status' => $orderDetail->order_status_id],
                        function ($m) use ($orderDetail) {
                            $m->from(env('MAIL_USERNAME'), env('APP_NAME'));
                            $m->to(env('MAIL_ADMIN'), env('APP_NAME'))->subject('Order Return Request');
                        }
                    );

                    Mail::send(
                        'mails.orderUpdate',
                        ['order' => $orderDetail, 'type' => 'user', 'order_status' => $orderDetail->order_status_id],
                        function ($m) use ($user) {
                            $m->from(env('MAIL_USERNAME'), env('APP_NAME'));
                            $m->to($user->email, $user->name)->subject('Order Return Request');
                        }
                    );
                    return response()->json([
                        "status" => "1",
                        "message" => "order return request submitted successfully",
                    ]);
                } else {
                    return response()->json([
                        "status" => "0",
                        "message" => "You can not return this order",
                    ]);
                }
            } else {
                return response()->json([
                    "status" => "0",
                    "message" => "Request status is not allowed. Invalid request status",
                ]);
            }
        } else {
            return response()->json([
                "status" => "0",
                "message" => "Request status is not allowed. Auth Required.",
            ]);
        }
    }


    public function getPaymentStatus(Request $request)
    {
        $header = $request->header('Authorization');
        if ($header) {
            $data = $request->all();
            $order = Order::find($data['order_id']);
            if ($order) {
                $req = array(
                    'ppc_MerchantAccessCode' => env('ACCESS_CODE'),
                    'ppc_MerchantID' => env('MID'),
                    'ppc_TransactionType' => 3,
                    'ppc_UniqueMerchantTxnID' => $order->unique_merchant_txn_id
                );

                $vars = http_build_query($req);
                $hmac_digest = hash_hmac("sha256",  $vars, pack("H*", env('SECRET_CODE')), false);
                $resultOfKeys = strtoupper($hmac_digest);
                $req['ppc_DIA_SECRET'] = $resultOfKeys;
                $req['ppc_DIA_SECRET_TYPE'] = 'SHA256';

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
                $ppc_resp = json_decode($server_output);
                if ($ppc_resp->ppc_TxnResponseMessage == "SUCCESS") {
                    return response()->json([
                        "status" => "1",
                        "message" => 'Payment has been credited to your account successfully.'
                    ]);
                } elseif ($ppc_resp->ppc_TxnResponseMessage == "INITIATED") {
                    return response()->json([
                        "status" => "1",
                        "message" => 'Refund has been initiated and will credited to your account within 7 working days.'
                    ]);
                } else {
                    return response()->json([
                        "status" => "0",
                        "message" => 'Technical issue, Try again later.'
                    ]);
                }
            } else {
                return response()->json([
                    "status" => "0",
                    "message" => "Order not found.",
                ]);
            }
        } else {
            return response()->json([
                "status" => "0",
                "message" => "Request status is not allowed. Auth required",
            ]);
        }
    }
}
