<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shop\Products\Product;
use App\Shop\Brands\Brand;
use App\Shop\Orders\Order;
use App\Shop\Customers\Customer;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->guard('employee')->user();

        if($user->user_role =='vendor'){
        $brands = Brand::where('user_id',$user->id)->orderBy('id','DESC')->limit(5)->get();
        $orders = Order::join('customers','customers.id','orders.customer_id')->where('orders.user_id',$user->id)->orderBy('id','DESC')->select('orders.*','customers.name')->limit(5)->get();
        $products = Product::where('user_id',$user->id)->orderBy('id','DESC')->limit(5)->get();

        $totalCustomers = 0;
        $totalBrands = Brand::where('user_id',$user->id)->count();
        $totalProducts = Product::where('user_id',$user->id)->count();
        $totalOrders = Order::where('user_id',$user->id)->count();
        }
        else{
            // $customers = Customer::orderBy('id','DESC')->limit(5)->get();
        $brands = Brand::orderBy('id','DESC')->limit(5)->get();
        $orders = Order::join('customers','customers.id','orders.customer_id')->orderBy('id','DESC')->select('orders.*','customers.name')->limit(5)->get();
        $products = Product::orderBy('id','DESC')->limit(5)->get();

        $totalCustomers = Customer::count();
        $totalBrands = Brand::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        }

    	
        return view('admin.dashboard',compact(	
        	// 'customers',
        	
        ));
    }
}
