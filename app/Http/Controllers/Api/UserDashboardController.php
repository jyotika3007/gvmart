<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Shop\Cart\Cart;
use App\Shop\Wishlist\Wishlist;
use Illuminate\Support\Facades\DB;
use App\Shop\Orders\Order;

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

        $orders = Order::where('customer_id', $userid)->orderBy('id', 'DESC')->get();

        return response()->json([
            "status" => 1,
            "message" => "Orders History fetched successfully.",
            "data" => $orders
        ]);

        // print_r($orders);
        // die;
        // $items = DB::table('order_product')->JOIN('products', 'products.id', 'order_product.product_id')->where('order_product.order_id', $orderId)->select('products.cover', 'products.description', 'order_product.*')->get();
    }


    public function getAllStates()
    {
        try {
            $states = DB::table('states')->where('countries_id', 101)->get(['id','name as state_name']);
        }
        catch (\Throwable $e) {
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
        }
        catch (\Throwable $e) {
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
                ->get(['addresses.id', 'addresses.alias','addresses.address_1', 'addresses.address_2', 'addresses.zip as pincode', 'addresses.phone as conatct_no', 'addresses.landmark', 'cities.name as city_name', 'states.name as state_name']);
            }
            catch (\Throwable $e) {
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


    public function postUserAddress(Request $request, $user_id){

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
            }
            catch (\Throwable $e) {
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

}