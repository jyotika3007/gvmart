<?php


namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Categories\Category;
use Auth;

class CategoryController extends Controller
{

    public function index()
    {

        $list = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
            $list = Category::where('user_id',$user->id)->where('parent_id',NULL)->orderBy('id', 'asc')->paginate(50);
        }
        else{
            $list = Category::where('parent_id',NULL)->orderBy('id', 'asc')->paginate(50);        
        }


        $cat1 = Category::where('parent_id',NULL)->orderBy('id', 'asc')->get();

        foreach($cat1 as $c1){
            
        }

          $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.categories.list', [
            'categories' => $list]);
    }


    public function searchList(Request $request)
    {

        $list = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
            $list = Category::where('user_id',$user->id)->where('name','LIKE','%'.$request->keyword.'%')->orderBy('id', 'asc')->paginate(50);
        }
        else{
            $list = Category::where('name','LIKE','%'.$request->keyword.'%')->orderBy('id', 'asc')->paginate(50);        
        }

          $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.categories.list', [
            'categories' => $list,
            'keyword' => $request->keyword]);
    }


 public function getSubCategories(Request $request,$id)
    {

        $list = '';

        $mainCat = Category::find($id);

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
            $list = Category::where('user_id',$user->id)->where('parent_id',$id)->orderBy('id', 'asc')->paginate(50);
        }
        else{
            $list = Category::where('parent_id',$id)->orderBy('id', 'asc')->paginate(50);        
        }

        return view('admin.categories.subcat_list', [
            'categories' => $list, 
            'keyword' => $request->keyword,
            'mainCat' => $mainCat
        ]);
    }

    
    public function create()
    {
        $parent_id = 0;
        $parent_category = '';

        if(!empty($_GET['parent_id'])){
            $parent_id = $_GET['parent_id'];
            $parent_category = Category::find($parent_id);
        }
        $categories = '';

        $user = Auth::user();

        if(!empty($user) && $user->user_role == 'vendor'){
            $categories = Category::where('user_id',$user->id)->orderBy('parent_id','ASC')->get();
        }
        else{
            $categories = Category::orderBy('parent_id','ASC')->get();
        }
        return view('admin.categories.create' , [
            'categories' => $categories,
            'parent_id' => $parent_id,
            'parent_category' => $parent_category
        ]);
    }


    public function store(Request $request)
    {

        $data = $request->except('_token', '_method');
        $data['user_id'] = Auth::user()->id;

        $data['slug'] = str_replace(' ', '-', $data['name']);

        if ($request->hasFile('cover') ) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/categories/', time().$file->getClientOriginalName());   
            $data['cover'] = 'categories/'.time().$file->getClientOriginalName();
        }
        
        $category = Category::create($data);
        return redirect()->route('admin.categories.index')->with('message', 'Category created');
    }


    public function show($id)
    {
        $category = Category::find($id);

        $children = $this->findChildren($id);

        $products = $this->findProducts($id);

        return view('admin.categories.show', [
            'category' => $category,
            'categories' => $category->children,
            'products' => $products
        ]);
    }

    
    public function edit($id)
    {
        $categories = Category::where('id','!=',$id)->orderBy('name','ASC')->get();
        $category = Category::find($id);

        $previous = session()->get('previous_url');

        return view('admin.categories.edit', [
            'categories' => $categories,
            'category' => $category,
            'previous' => $previous
        ]);
    }

    
    public function update(Request $request, $id)
    {

        $data = $request->except('_token', '_method');

        $data['slug'] = str_replace(' ', '-', $data['name']);

        if ($request->hasFile('cover') ) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/categories/', time().$file->getClientOriginalName());   
            $data['cover'] = 'categories/'.time().$file->getClientOriginalName();
        }

        $category = Category::where('id',$id)->update($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.categories.index');
    }

    
    public function destroy(int $id)
    {
        $category = Category::find($id);
        
        $sub = Category::where('parent_id',$id)->get();
        if($sub){
            Category::where('parent_id',$id)->delete();
        }
        
        Category::where('id',$id)->delete();

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.categories.index');
    }

}
