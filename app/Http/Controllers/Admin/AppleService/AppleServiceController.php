<?php

namespace App\Http\Controllers\Admin\AppleService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AppleService;
use App\Shop\Categories\Category;
use Illuminate\Support\Facades\Auth;


class AppleServiceController extends Controller
{

    public function index()
    {
        $data = '';

        try {
            $data = AppleService::join('categories', 'categories.id', 'apple_services.category_id')->select(['apple_services.*','categories.name'])->paginate(50);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

        return view('admin.apple_services.list', ['services' => $data]);
    }


    public function search_services(Request $request)
    {
        $data = '';

        $user = Auth::user();
        // if (!empty($user) && $user->user_role == 'vendor') {
        //     $data = AppleService::where('user_id', $user->id)->where('name', 'LIKE', '%' . $request->keyword . '%')->paginate(50);
        // } else {
        //    $data = AppleService::where('name', 'LIKE', '%' . $request->keyword . '%')->paginate(50);
        // }
        $data = AppleService::where('name', 'LIKE', '%' . $request->keyword . '%')->paginate(50);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

        return view('admin.apple_services.list', ['services' => $data, 'keyword' => $request->keyword]);
    }


    public function create()
    {
        // print_r(1); die;
        $categories = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('admin.apple_services.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $data = $request->except('_token', '_mthod');

        if ($request->hasFile('service_cover')) {
            $file = $request->service_cover;
            $file_ext = explode('.', $file->getClientOriginalName());
            $random = rand(10000, 999999);
            $file->move(public_path() . '/storage/apple_services/', $random . time() . '.' . $file_ext[count($file_ext) - 1]);
            $data['service_cover'] = 'apple_services/' . $random . time() . '.' . $file_ext[count($file_ext) - 1];
        }
        // print_r($data); die;
        $brand = AppleService::create($data);
        return redirect()->route('admin.apple_services.index')->with('message', 'Create service successful!');
    }


    public function edit($id)
    {
        $service = AppleService::find($id);
        $categories = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $previous = session()->get('previous_url');

        // dd($service);

        return view('admin.apple_services.edit', ['service' => $service, 'categories' =>  $categories, 'previous' => $previous]);
    }


    public function update(Request $request, $id)
    {
        // $brand = AppleService::find($id);

        // print_r($request->all()); die;

        $data = $request->except('_token', '_method');
        if ($request->hasFile('service_cover')) {
            $file = $request->service_cover;
            $file_ext = explode('.', $file->getClientOriginalName());
            $random = rand(10000, 999999);
            $file->move(public_path() . '/storage/apple_services/', $random . time() . '.' . $file_ext[count($file_ext) - 1]);
            $data['service_cover'] = 'apple_services/' . $random . time() . '.' . $file_ext[count($file_ext) - 1];
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
