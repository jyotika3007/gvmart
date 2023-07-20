<?php

namespace App\Http\Controllers\Admin\ShopCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\ShopCategory\ShopCategory;
use Image;

class ShopCategoryController extends Controller
{

    public function index(Request $request)
    {
        $datas = $request->all();

        $keyword = '';

        if(!empty($datas['keyword'])){
        $data = ShopCategory::where('category_name','LIKE','%'.$datas['keyword'].'%')->orderBy('id','DESC')->paginate(10);
        $keyword = $datas['keyword'];
        }
        else{
        $data = ShopCategory::orderBy('id','DESC')->paginate(10);
        }

        $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.shop_categories.list', [
            'shop_categories' => $data,
            'keyword' => $keyword
        ]);
    }

    
    public function create()
    {
        return view('admin.shop_categories.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        $slug = $request->input('category_name');
        $data['slug'] = str_replace(' ', '-', $slug);

        if ($request->hasFile('cover')) {

            $file=$request->cover;
            $file_ext = explode('.',$file->getClientOriginalName());
            $file->move(public_path(). '/storage/shop_categories/', time().'.'.$file_ext[count($file_ext)-1]);   
            $data['cover'] = 'shop_categories/'.time().'.'.$file_ext[count($file_ext)-1];

            $this->resizeCoverImage(time().'.'.$file_ext[count($file_ext)-1]);
        }

        if ($request->hasFile('icons')) {
            $file=$request->icons;
            $file_ext = explode('.',$file->getClientOriginalName());
            $file->move(public_path(). '/storage/shop_categories/', time().'.'.$file_ext[count($file_ext)-1]);   
            $data['icons'] = 'shop_categories/'.time().'.'.$file_ext[count($file_ext)-1];

            $this->resizeIconImage(time().'.'.$file_ext[count($file_ext)-1]);

        }

        ShopCategory::create($data);

        return redirect()->route('admin.shop_categories.index')->with('message', 'Create ShopCategory successful!');
    }

    
    public function edit($id)
    {
        $shop = ShopCategory::find($id);

        $previous = session()->get('previous_url');
        
        return view('admin.shop_categories.edit', ['shop_category' => $shop, 'previous' => $previous ]);
    }

    
    public function update(Request $request, $id)
    {
        

        $data = $request->except('_token','_method');

        $slug = $request->input('category_name');
        $data['slug'] = str_replace(' ', '-', $slug);

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file_ext = explode('.',$file->getClientOriginalName());
            $file->move(public_path(). '/storage/shop_categories/', time().'.'.$file_ext[count($file_ext)-1]);   
            $data['cover'] = 'shop_categories/'.time().'.'.$file_ext[count($file_ext)-1];
        }
        if ($request->hasFile('icons')) {
            $file=$request->icons;
            $file_ext = explode('.',$file->getClientOriginalName());
            $file->move(public_path(). '/storage/shop_categories/', time().'.'.$file_ext[count($file_ext)-1]);   
            $data['icons'] = 'shop_categories/'.time().'.'.$file_ext[count($file_ext)-1];
        }

        $shop_category = ShopCategory::where('id',$id)->update($data);

         return redirect()->route('admin.shop_categories.index')->with('message', 'Update successful!');
    }

    
    public function destroy($id)
    {
       $shop_category = ShopCategory::find($id);
       $shop_category->delete();
        return redirect()->back()->with('message', 'Delete successful!');
    }


    public function resizeCoverImage($filename)
    {
        $img = '';      
        
        try 
        {
            if (file_exists(public_path('/storage/shop_categories/'.$filename))){
                $img = Image::make(public_path('/storage/shop_categories/'.$filename));
            }
        }
        catch(NotReadableException $e)
        {
            
        }
        
        if($img) {
            $res = $img->resize(750, 500);
            $img->save(public_path('/storage/shop_categories/' .$filename));

        }
    }

    public function resizeIconImage($filename)
    {
        $img = 0;
       
        
        try 
        {
            if (file_exists(public_path('/storage/shop_categories/'.$filename))){
                $img = Image::make(public_path('/storage/shop_categories/'.$filename));
            }
        }
        catch(NotReadableException $e)
        {
            
        }
        
        if($img) {
            $res = $img->resize(240, 240);
            $img->save(public_path('/storage/shop_categories/' .$filename));

        }
    }
}
