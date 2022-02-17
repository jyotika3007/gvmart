<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Shop\OrderStatuses\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderStatusController extends Controller
{
    
    public function index()
    {

        $orderStatuses = OrderStatus::all();
        return view('admin.order-statuses.list', ['orderStatuses' => $orderStatuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order-statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token','_method');

        $orderStatus = OrderStatus::create($data);

        $request->session()->flash('message', 'Create successful');
        return redirect()->route('admin.order-statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $orderStatus = OrderStatus::find($id);
        return view('admin.order-statuses.edit', ['orderStatus' => $orderStatus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderStatusRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->except('_token','_method');
        $orderStatus = OrderStatus::find($id);

        $orderStatus->update($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.order-statuses.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(int $id)
    {
        OrderStatus::where('id',$id)->delete();
        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.order-statuses.index');
    }
}
