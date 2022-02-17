<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\Addresses\Address;
use App\Shop\Countries\Country;
use App\Shop\Cities\City;
use Auth;

class CustomerAddressController extends Controller
{
   
    public function index()
    {
        $customer = auth()->user();

        return view('front.customers.addresses.list', [
            'customer' => $customer,
            'addresses' => $customer->addresses
        ]);
    }

    /**
     * @param  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $customer = Auth::user();

        $countries = Country::all();
        $cities = City::all();

        return view('front1.customers.addresses.create', [
            'customer' => $customer,
            'countries' => $countries,
            'cities' => $cities,
            
        ]);
    }

    
    public function addAddress($id){
        return view('front.add_address');
    }

    public function editAddress($id){
        $address = Address::find($id);
        return view('front.edit_address',compact('address'));
    }

    public function store(Request $request)
    {
        $request['customer_id'] = Auth::user()->id;

        $data = $request->all();

        $newAddress = new Address;

        $newAddress->customer_id = $data['customer_id'];
        $newAddress->alias = $data['alias'] ?? '';
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

        return redirect()->route('dashboard')
            ->with('message', 'Address creation successful');
    }

    public function update(Request $request,$id)
    {
        $newAddress = Address::find($id);

        $data = $request->all();

        $newAddress->alias = $data['alias'] ?? '';
        $newAddress->address_1 = $data['address_1'] ?? '';
        $newAddress->address_2 = $data['address_2'] ?? '';
        $newAddress->country_id = 99;
        $newAddress->city = $data['city'] ?? '';
        $newAddress->landmark = $data['landmark'] ?? '';
        $newAddress->state_code = $data['state_code'] ?? '';
        $newAddress->zip = $data['zip'] ?? '';
        $newAddress->phone = $data['phone'] ?? '';
        $newAddress->delivery_address = 0;
        $newAddress->update();

        return redirect()->route('dashboard')
            ->with('message', 'Address creation successful');
    }



 

    

}
