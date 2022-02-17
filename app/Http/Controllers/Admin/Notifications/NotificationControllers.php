<?php

namespace App\Http\Controllers\Admin\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Orders\Order;
use App\Shop\RegisteredShop\RegisteredShop;
use App\User;
use Auth;

class NotificationControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $user = Auth::user();

        $orders = '';
        $shops = '';

        if($user->user_role == 'vendor'){
            $orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.vendor_click',0)->orderBy('orders.id','DESC')->select('orders.*')->get();        

        }
        else{
            if($type == 'all'){
                $orders = Order::JOIN('users','users.id','orders.customer_id')->where('orders.admin_click',0)->orderBy('orders.id','DESC')->select('orders.*','users.name')->get();
                $shops = RegisteredShop::where('admin_click',0)->orderBy('id','DESC')->get();
            }
            else{
                    if($type == 'orders'){
                $orders = Order::JOIN('users','users.id','orders.customer_id')->where('orders.admin_click',0)->orderBy('orders.id','DESC')->select('orders.*','users.name')->get();
                    }
                    else{
                $shops = RegisteredShop::where('admin_click',0)->orderBy('id','DESC')->get();
                    }
            }
        }

        return view('admin.notifications.list',compact('orders','shops'));
        
    }



    public function pendingOrders(){
        $user = Auth::user();
        $orders = '';
        if($user->user_role == 'vendor'){
           $orders =  Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.order_status_id',1)->orderBy('orders.id','DESC')->get();
        }
        else{
            $orders = Order::where('order_status_id',1)->orderBy('id','DESC')->get();
        }

        return view('admin.notifications.pending_orders',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
