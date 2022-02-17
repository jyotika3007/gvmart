<?php

namespace App\Http\Controllers\Admin\Subadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Customers\Customer;
use App\Shop\Addresses\Address;
use App\Shop\Orders\Order;
use App\User;
use Auth;

class SubadminController extends Controller
{
    
    public function index()
    {

        
            $subadmins = User::where('user_role','subadmin')->select('users.*')->paginate(10);

            $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.subadmins.list', [
            'subadmins' => $subadmins
        ]);
    }

   
    public function searchList(Request $request)
    {

        $subadmins = '';

        $user = Auth::user();

        if($user->user_role == 'vendor'){
            $subadmins = Order::JOIN('users','users.id','orders.customer_id')->where('orders.user_id',$user->id)->where('users.user_role','subadmin')->where('users.name','LIKE','%'.$request->keyword.'%')->orWhere('users.email','LIKE','%'.$request->keyword.'%')->select('users.*')->paginate(10);
        }
            else{
            $subadmins = User::where('user_role','subadmin')->where('name','LIKE','%'.$request->keyword.'%')->orWhere('email','LIKE','%'.$request->keyword.'%')->select('users.*')->paginate(10);

            }

            $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.subadmins.search_list', [
            'subadmins' => $subadmins,
            'keyword' => $request->keyword
        ]);
    }

    
    public function create()
    {
        return view('admin.subadmins.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $data['status'] = '1';
        $data['account_status'] = 'Active';
        $data['user_role'] = 'subadmin';
        $data['password'] = bcrypt($request->input('password'));
        $subadmin = User::create($data);

        $request->session()->flash('message', 'Subadmin created successful');
        return redirect()->route('admin.subadmins.index');
    }

    
    public function show(int $id)
    {
        $subadmin = User::find($id);
        $addresses = Address::where('customer_id',$subadmin->id)->first();
        
        return view('admin.subadmins.show', [
            'subadmin' => $subadmin,
            'addresses' => $addresses
        ]);
    }

    
    public function edit($id)
    {
        $subadmin = User::find($id);

        $previous = session()->get('previous_url');

        return view('admin.subadmins.edit', ['subadmin' => $subadmin , 'previous' => $previous]);
    }

   
    public function update(Request $request, $id)
    {
        $subadmin = User::find($id);

        
        $data = $request->except('_method', '_token', 'password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $update_customer = User::where('id',$id)->update($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.subadmins.edit', $id);
    }

    
    public function destroy($id)
    {
        $subadmin = User::find($id);

        $subadmin->delete();

        return redirect()->route('admin.subadmins.index')->with('message', 'Delete successful');
    }

}