<?php

namespace App\Http\Controllers\Admin\AppleService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AppleService;
use App\Shop\Categories\Category;
use Auth;


class AppleServiceController extends Controller
{

    public function index()
    {
        $data = '';

        $data = AppleService::join('categories','categories.id','apple_Services.category_id','left outer')->paginate(50);


        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);
        // print_r(1); die;

        return view('admin.apple_services.list', ['services' => $data]);
    }


    public function search_services(Request $request)
    {
        $data = '';

        $user = Auth::user();
        if (!empty($user) && $user->user_role == 'vendor') {
            $data = AppleService::where('user_id', $user->id)->where('name', 'LIKE', '%' . $request->keyword . '%')->paginate(50);
        } else {
            $data = AppleService::where('name', 'LIKE', '%' . $request->keyword . '%')->paginate(50);
        }

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

        return view('admin.apple_services.list', ['services' => $data, 'keyword' => $request->keyword]);
    }


    public function create()
    {
        // print_r(1); die;
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        return view('admin.apple_services.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $data = $request->except('_token', '_mthod');

        // print_r($data); die;

        // $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('service_cover')) {
            $file = $request->service_cover;
            $file->move(public_path() . '/storage/apple_services/', time() . $file->getClientOriginalName());
            $data['service_cover'] = 'apple_services/' . time() . $file->getClientOriginalName();
        }
        // print_r($data); die;
        $brand = AppleService::create($data);
        return redirect()->route('admin.apple_services.index')->with('message', 'Create service successful!');
    }


    public function edit($id)
    {
        $service = AppleService::find($id);
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        $previous = session()->get('previous_url');

        return view('admin.apple_services.edit', ['service' => $service, 'categories' =>  $categories, 'previous' => $previous]);
    }


    public function update(Request $request, $id)
    {
        // $brand = AppleService::find($id);

        // print_r($request->all()); die;

        $data = $request->except('_token', '_method');
        if ($request->hasFile('service_cover')) {
            $file = $request->service_cover;
            $file->move(public_path() . '/storage/apple_services/', time() . $file->getClientOriginalName());
            $data['service_cover'] = 'apple_services/' . time() . $file->getClientOriginalName();
        }

        $brand = AppleService::where('id', $id)->update($data);

        return redirect()->route('admin.apple_services.index')->with('message', 'Update successful!');
    }


    public function destroy($id)
    {
        $brand = AppleService::find($id);
        $brand->delete();

        return redirect()->route('admin.apple_services.index')->with('message', 'Delete successful!');
    }
}
