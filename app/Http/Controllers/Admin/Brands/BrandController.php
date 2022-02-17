<?php

namespace App\Http\Controllers\Admin\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Brands\Brand;
use Auth;

class BrandController extends Controller
{
    
    public function index()
    {
            $data = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
        $data = Brand::where('user_id',$user->id)->paginate(50);

        }
        else{
        $data = Brand::paginate(50);
        }

          $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.brands.list', ['brands' => $data]);
    } 


    public function searchList(Request $request)
    {
            $data = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
        $data = Brand::where('user_id',$user->id)->where('name','LIKE','%'.$request->keyword.'%')->paginate(50);

        }
        else{
        $data = Brand::where('name','LIKE','%'.$request->keyword.'%')->paginate(50);
        }

          $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.brands.list', ['brands' => $data, 'keyword' => $request->keyword]);
    }

    
    public function create()
    {
        return view('admin.brands.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token','_mthod');

        $data['user_id'] = Auth::user()->id;

       if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/brands/', time().$file->getClientOriginalName());   
            $data['cover'] = 'brands/'.time().$file->getClientOriginalName();
        }
        $brand = Brand::create($data);
        return redirect()->route('admin.brands.index')->with('message', 'Create brand successful!');
    }

    
    public function edit($id)
    {
        $brand = Brand::find($id);

        $previous = session()->get('previous_url');
        
        return view('admin.brands.edit', ['brand' => $brand, 'previous' => $previous]);
    }

    
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        $data = $request->except('_token','_method');
        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/brands/', time().$file->getClientOriginalName());   
            $data['cover'] = 'brands/'.time().$file->getClientOriginalName();
        }

        $brand = Brand::where('id',$id)->update($data);
        
        return redirect()->route('admin.brands.index')->with('message', 'Update successful!');
    }


    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('message', 'Delete successful!');
    }
}
