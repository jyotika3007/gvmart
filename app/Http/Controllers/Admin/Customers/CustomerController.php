<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Customers\Customer;
use App\Shop\Addresses\Address;
use App\Shop\Orders\Order;
use App\User;
use Auth;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;


class CustomerController extends Controller
{

    public function index()
    {

        $customers = '';

        $user = Auth::user();

        if (!empty($user) && $user->user_role == 'vendor') {
            $customers = Order::JOIN('users', 'users.id', 'orders.customer_id')->where('orders.user_id', $user->id)->where('user_role', 'customer')->orderBy('id','DESC')->select('users.*')->paginate(50);
        } else {
            $customers = User::where('user_role', 'customer')->orderBy('id','DESC')->select('users.*')->paginate(50);
        }

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

        // var_dump($customers); die;

        return view('admin.customers.list', [
            'customers' => $customers
        ]);
    }


    public function searchList(Request $request)
    {

        $customers = '';

        $user = Auth::user();

        if ($user->user_role == 'vendor') {
            $customers = Order::JOIN('users', 'users.id', 'orders.customer_id')->where('orders.user_id', $user->id)->where('user_role', 'customer')->where('users.name', 'LIKE', '%' . $request->keyword . '%')->orWhere('users.email', 'LIKE', '%' . $request->keyword . '%')->select('users.*')->paginate(50);
        } else {
            $customers = User::where('user_role', 'customer')->where('name', 'LIKE', '%' . $request->keyword . '%')->orWhere('email', 'LIKE', '%' . $request->keyword . '%')->select('users.*')->paginate(50);
        }


        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);


        return view('admin.customers.list', [
            'customers' => $customers,
            'keyword' => $request->keyword
        ]);
    }


    public function create()
    {
        return view('admin.customers.create');
    }


    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $data['status'] = '1';
        $data['account_status'] = 'Active';
        // $data['user_role'] = 'customer';
        $data['password'] = bcrypt($request->input('password'));
        $customer = User::create($data);

        $request->session()->flash('message', 'Customer created successful');
        return redirect()->route('admin.customers.index');
    }


    public function show(int $id)
    {
        $customer = User::find($id);
        $addresses = Address::where('customer_id', $customer->id)->first();

        return view('admin.customers.show', [
            'customer' => $customer,
            'addresses' => $addresses
        ]);
    }


    public function edit($id)
    {
        $customer = User::find($id);

        $previous = session()->get('previous_url');

        return view('admin.customers.edit', ['customer' => $customer, 'previous' => $previous]);
    }


    public function update(Request $request, $id)
    {
        $customer = User::find($id);


        $data = $request->except('_method', '_token', 'password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $update_customer = User::where('id', $id)->update($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.customers.index');
    }


    public function destroy($id)
    {
        $customer = User::find($id);

        $customer->delete();

        return redirect()->route('admin.customers.index')->with('message', 'Delete successful');
    }

    public function getCustomersData(){
        return Excel::download(new UserExport, 'customers.xlsx');
    }
}
