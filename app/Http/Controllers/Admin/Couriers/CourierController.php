<?php

namespace App\Http\Controllers\Admin\Couriers;

use App\Shop\Couriers\Courier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        return view('admin.couriers.list', ['couriers' => $this->courierRepo->listCouriers('name', 'asc')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.couriers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCourierRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $courier = Courier::create($data);

        $request->session()->flash('message', 'Create successful');
        return redirect()->route('admin.couriers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $courier = Courier::find($id);
        return view('admin.couriers.edit', ['courier' => $courier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCourierRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $courier = Courier::find($id);

       $data = $request->all();

        $courier->update($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.couriers.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $courier = Courier::find($id);
        
        $courier->delete();

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.couriers.index');
    }
}
