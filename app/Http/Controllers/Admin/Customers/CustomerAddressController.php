<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Shop\Addresses\Address;
use App\Shop\Countries\Country;
use App\Shop\Cities\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    
    public function show(int $customerId, int $addressId)
    {
        $address = Address::find($addressId);

        return view('admin.addresses.customers.show', [
            'address' => $address,
            'customerId' => $customerId
        ]);
    }

   
    public function edit(int $customerId, int $addressId)
    {
       $countries = Country::all();

       $address = Address::find($addressId);

       $cities = City::all();

        return view('admin.addresses.customers.edit', [
            'address' => $address,
            'countries' => $countries,
            'cities' => $cities
            'customerId' => $customerId
        ]);
    }
}
