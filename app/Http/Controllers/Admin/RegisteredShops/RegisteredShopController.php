<?php

namespace App\Http\Controllers\Admin\RegisteredShops;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\RegisteredShop\RegisteredShop;
use App\User;
use DB;
use Mail;
use Auth;

class RegisteredShopController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->all();



        $list = RegisteredShop::JOIN('users','users.id','registered_shops.user_id')->where('users.status','1')->where('users.account_status','Active')->orderBy('registered_shops.id','DESC')->select('registered_shops.*','users.status')->paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.shops.list', [
            'registered_shops' => $list
        ]);
    }


 public function searchList(Request $request)
    {
        $list = RegisteredShop::JOIN('users','users.id','registered_shops.user_id')->where('users.status','1')->where('users.account_status','Active')->where('shop_name','LIKE','%'.$request->keyword.'%')->orWhere('owner_name','LIKE','%'.$request->keyword.'%')->orderBy('registered_shops.id','DESC')->select('registered_shops.*','users.status')->paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.shops.list', [
            'registered_shops' => $list,
        'keyword' => $request->keyword
        ]);
    }

    
    public function create()
    {
        return view('admin.shops.create');
    }


    public function store(Request $request)
    {
        $data = $request->except('_token', '_method','password');
        $slug = $request->input('shop_name')." ".$request->input('city');
        $data['slug'] = str_replace(' ', '-', $slug);

        $shop_arr = explode(' ',$data['shop_name']);
        $shop_code = 'BA/';

        $data['category_ids'] = implode(',',$data['category_ids']);

        foreach($shop_arr as $s){
            $shop_code = $shop_code.substr($s,0,1);
        }

        $data['registration_date'] = date('d-m-Y');
        $data['activation_date'] = date('d-m-Y');

        $data['shop_code'] = str_replace(' ','',$shop_code).'-'.rand(999, 100000);

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/registered_shops/', time().$file->getClientOriginalName());   
            $data['cover'] = 'registered_shops/'.time().$file->getClientOriginalName();
        }

        $employee = new User;

        $employee->name = $data['shop_name'];
        $employee->email = $data['email'];
        $employee->password = \Hash::make($request->input('password'));
        $employee->status = '1';
        $employee->account_status = 'Active';
        $employee->user_role = 'vendor';

        $employee->save();

        $last_uid = User::get()->last();
        
         $data['slug'] =  $data['slug'].'-'.$last_uid->id;

        $data['user_id'] = $last_uid->id;

        $registered_shop = RegisteredShop::create($data);
        
        $newRole = DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => $data['user_id'],
            'user_type' => 'App\Shop\Employees\Employee'
        ]);

        
        $data['password'] = $request->input('password');
        
        
        //   $data['admin_email'] = 'Riddhi.lic@gmail.com';
        // $data['admin_name'] = 'GV Mart';

         Mail::send('mails.registeration_shop',['data' => $data , 'type' => 'admin' ],
                 function ($m) use ($data) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($data['email'], $data['shop_name'])->subject('Business registered successfully.');
                 });
        
        
        return redirect()->route('admin.registered_shops.index')->with('message', 'Create successful');
    }

    
    public function show(int $id)
    {
        $registered_shop = RegisteredShop::find($id);
        return view('admin.shops.show', compact('registered_shop'));
    }

    
    public function edit(int $id)
    {
        $registered_shop = RegisteredShop::find($id);


        $user_role = Auth::user()->user_role;

        if($user_role=='admin'){
        $registered_shop->admin_click = 1;
        $registered_shop->update();
        }
        

        $user = User::where('id',$registered_shop->user_id)->first();
        
        $previous = session()->get('previous_url');
        
        return view('admin.shops.edit', [
            'registered_shop' => $registered_shop,
            'user' => $user,
            'previous' => $previous
            
        ]);
    }

    
    public function update(Request $request, int $id)
    {
        $registered_shop = RegisteredShop::find($id);

        $data = $request->except('_token', '_method','password');

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/registered_shops/', time().$file->getClientOriginalName());   
            $data['cover'] = 'registered_shops/'.time().$file->getClientOriginalName();
        }

        // var_dump($data['category_ids']); die;

        $data['category_ids'] = implode(',',$data['category_ids']);
        $shop = RegisteredShop::where('id',$id)->update($data);


        $entry = array();

        if(!empty($request->status))
            $entry['status'] = $request->status;

        if(!empty($request->password))
            $entry['password'] = \Hash::make($request->password);

        $update_status = User::where('id',$registered_shop->user_id)->update($entry);

        return redirect()->route('admin.registered_shops.index')
        ->with('message', 'Update successful');
    }

    
    public function destroy($id)
    {
     $shop = RegisteredShop::find($id);
     $user = User::where('id',$shop->user_id)->update([
        'status' => 0,
        'account_status' => 'Ban'
    ]);

     return redirect()->route('admin.registered_shops.index')->with('message', 'Delete successful');
 }


 public function getRequestedShops(){
    $requested_shops = RegisteredShop::JOIN('users','users.id','registered_shops.user_id')->where('registered_shops.registered_by','vendor')->where('users.status','0')->where('users.account_status','Ban')->select('registered_shops.*','users.status')->get();

    return view('admin.shops.requested_shops',compact('requested_shops'));
}

public function getBannedShops(){
    $requested_shops = RegisteredShop::JOIN('users','users.id','registered_shops.user_id')->where('users.status','1')->where('users.account_status','Ban')->select('registered_shops.*','users.status')->get();

    return view('admin.shops.banned_shops',compact('requested_shops'));
}

public function updateShopStatus($id){
    $shop = Registeredshop::find($id);
    $user = User::where('id',$shop->user_id)->update([
            'status' => 1,
            'account_status' => 'Active'
        ]);
        
        
        $shop->activation_date = date('d-m-Y');
        $shop->update();
        
        $shop->admin_email = 'inhandcityofficials@gmail.com';
        $shop->admin_name = 'In Hand City';
        
        Mail::send('mails.shop_activation',['shop' => $shop],
                 function ($m) use ($shop) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($shop->email, $shop->owner_name)->subject('Connect with In Hand city');
                 });
        
        return redirect()->back()->with('message', 'Shop Account activated successfully');
}

public function banShopStatus($id){
    $shop = Registeredshop::find($id);
    $user = User::where('id',$shop->user_id)->update([
            // 'status' => 1,
            'account_status' => 'Ban'
        ]);
        
        return redirect()->back()->with('message', 'Shop Account ban successfully');
}

}
