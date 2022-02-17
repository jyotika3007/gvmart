<?php

namespace App\Http\Controllers\Admin\Addresses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Addresses\Address;
use App\Shop\Countries\Country;
use App\Shop\Cities\City;
use App\Shop\Customers\Customer;
use App\User;
use Auth;


class AddressController extends Controller
{
    
    public function index(Request $request)
    {
        $list = Address::JOIN('countries','countries.id','addresses.country_id')->select('addresses.*','countries.name')->orderBy('created_at', 'desc')->paginate(20);

       
        return view('admin.addresses.list', ['addresses' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        $customers = User::where('user_role','customer')->get();
        $cities = City::all();

        return view('admin.addresses.create', [
            'customers' => $customers,
            'countries' => $countries,
            'cities' => $cities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAddressRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $address = Address::create($data);

        $request->session()->flash('message', 'Creation successful');
        return redirect()->route('admin.addresses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $address = Address::JOIN('countries','countries.id','addresses.country_id')->where('addresses.id',$id)->select('addresses.*','countries.name')->first();
        // var_dump($address); die;
        return view('admin.addresses.show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $address = Address::find($id);
        $countries = Country::all();

        $customers = User::where('user_role','customer')->get();
        $cities = City::all();

        $customer = User::where('id',$address->customer_id)->first();
        $country = Country::find($address->country_id);


        return view('admin.addresses.edit', [
            'address' => $address,
            'countries' => $countries,
            'countryId' => $country->id,
            'cities' => $cities,
            'cityId' => $address->city_id,
            'customers' => $customers,
            'customerId' => $customer->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAddressRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        $address= Address::where('id',$id)->update($data);
        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.addresses.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        
        $address->delete();

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.addresses.index');
    }
}
