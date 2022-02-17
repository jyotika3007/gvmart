<?php

namespace App\Http\Controllers\Admin\Countries;

use App\Shop\Countries\Country
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
   
    public function index()
    {
        $list = Country::orderBy('created_at', 'desc')->paginate(25);

        return view('admin.countries.list', [
            'countries' => $countries
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $country = Country::find($id);
       

        return view('admin.countries.show', [
            'country' => $country,
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.countries.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCountryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, $id)
    {
        
        return redirect()->route('admin.countries.edit', $id);
    }
}
