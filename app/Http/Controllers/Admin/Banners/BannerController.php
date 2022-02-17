<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Banners\Banner;
use App\Shop\Categories\Category;

class BannerController extends Controller
{
     public function index()
    {
        $lists = Banner::paginate(10);

          $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.banners.list', [
            'banners' => $lists
        ]);
    }

    public function searchList(Request $request)
    {
        $lists = Banner::where('title','LIKE','%'.$request->keyword.'%')->paginate(10);

          $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.banners.list', [
            'banners' => $lists,
            'keyword' => $request->keyword
        ]);
    }

    
    public function create()
    {
        $categories = Category::where('status','1')->get();
        return view('admin.banners.create',[
        	'categories' => $categories
        ]);
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
       

        if(!empty($data['category_id'])){

        $category = Category::where('id',$data['category_id'])->first();
        $data['category_slug'] = $category->slug;

        }

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/banners/', time().$file->getClientOriginalName());   
            $data['cover'] = 'banners/'.time().$file->getClientOriginalName();
        }

        // var_dump($data); die;

        $banner = Banner::create($data);
        
        return redirect()->route('admin.banners.index')->with('message', 'Create successful');
    }

    
    public function show(int $id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.show', compact('banner'));
    }

    
    public function edit(int $id)
    {
    	$categories = Category::where('status','1')->get();
        $banner = Banner::find($id);
        
        $previous = session()->get('previous_url');
        

        return view('admin.banners.edit', [
            'banner' => $banner,
            'categories' => $categories,
            'previous' => $previous
        ]);
    }


    public function update(Request $request, int $id)
    {
     
        $data = $request->except('_token','_method');
        
        if(!empty($data['category_id'])){

        $category = Category::where('id',$data['category_id'])->first();

        }
        else{
        $data['category_slug'] = NULL;

        }

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/banners/', time().$file->getClientOriginalName());   
            $data['cover'] = 'banners/'.time().$file->getClientOriginalName();
        }

        $banner = Banner::where('id',$id)->update($data);

        return redirect()->back()->with('message', 'Update successful');
    }

    
    public function destroy($id)
    {
        $banner = Banner::find($id);

        $banner->delete();

        return redirect()->back()->with('message', 'Delete successful');
    }

    
    public function removeImage(Request $request)
    {
        return redirect()->back()->with('message', 'Image delete successful');
    }

    
    public function removeThumbnail(Request $request)
    {
        return redirect()->back()->with('message', 'Image delete successful');
    }

}
