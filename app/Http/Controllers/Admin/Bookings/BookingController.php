<?php

namespace App\Http\Controllers\Admin\Bookings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\Booking\Booking;
use App\Shop\RegisteredShop\RegisteredShop;
use Auth;
use Mail;

class BookingController extends Controller
{
    public function index(){
    	$user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
        	$bookings = Booking::JOIN('registered_shops','registered_shops.id','bookings.shop_id')->where('registered_shops.user_id',$user->id)->select('bookings.*','registered_shops.owner_name','registered_shops.contact','registered_shops.shop_code','registered_shops.address','registered_shops.city')->paginate(20);
        	return view('admin.bookings.list',compact('bookings'));
        }
        
    else{
    	$bookings = Booking::JOIN('registered_shops','registered_shops.id','bookings.shop_id')->select('bookings.*','registered_shops.owner_name','registered_shops.contact','registered_shops.shop_code','registered_shops.address','registered_shops.city')->paginate(20);
        	return view('admin.bookings.list',compact('bookings'));
    }
    }


public function show($bookingId){
	$booking = Booking::find($bookingId);
	$shop = RegisteredShop::find($booking->shop_id);

	return view('admin.bookings.show',compact('booking','shop'));
}


public function edit($bookingId){
	$booking = Booking::find($bookingId);
	$shop = RegisteredShop::find($booking->shop_id);
	// var_dump($shop); die;

	return view('admin.bookings.edit',compact('booking','shop'));
}

public function updateBookingStatus(Request $request, $bookingId){
	$booking =  Booking::find($bookingId);

	$booking->booking_status = $request->booking_status;

	$booking->update();
	
	$shop = RegisteredShop::find($booking->shop_id);
	
	Mail::send('mails.booking_confirmation',['data' => $booking, 'shop' => $shop],
                 function ($m) use ($booking) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($booking->customer_email, $booking->customer_name)->subject('Booking Confirmation.');
                 }); 
       

	return redirect()->back()->with('message','Booking status updated successfully.');
}

}
