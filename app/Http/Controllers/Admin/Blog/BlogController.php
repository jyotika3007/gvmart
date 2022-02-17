<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Blog\Blog;
use Auth;

class BlogController extends Controller
{
    
    public function index()
    {

            $list = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
        $list = Blog::where('user_id',$user->id)->paginate(10);
    }
        else{
        $list = Blog::paginate(10);
        } 

          $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);       

        return view('admin.blogs.list', [
            'blogs' => $list
        ]);
    }

public function searchList(Request $request)
    {

            $list = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
        $list = Blog::where('user_id',$user->id)->where('title','LIKE','%'.$request->keyword.'%')->orWhere('description','LIKE','%'.$request->keyword.'%')->orWhere('author','LIKE','%'.$request->keyword.'%')->paginate(10);
    }
        else{
        $list = Blog::where('title','LIKE','%'.$request->keyword.'%')->orWhere('description','LIKE','%'.$request->keyword.'%')->orWhere('author','LIKE','%'.$request->keyword.'%')->paginate(10);
        }        

          $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.blogs.search_list', [
            'blogs' => $list,
            'keyword' => $request->keyword
        ]);
    }

    
    public function create()
    {
       
        return view('admin.blogs.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = str_replace(' ','-',$request->input('title'));

        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('cover') ) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/blogs/', time().$file->getClientOriginalName());   
            $data['cover'] = 'blogs/'.time().$file->getClientOriginalName();
        }

        $blog =Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('message', 'Create successful');
    }

    
    public function show(int $id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.show', compact('blog'));
    }

    
    public function edit(int $id)
    {
        $blog = Blog::find($id);
        
        $previous = session()->get('previous_url');

        return view('admin.blogs.edit', [
            'blog' => $blog,
            'previous' => $previous
            
        ]);
    }

    
    public function update(Request $request, int $id)
    {
        $blog = Blog::find($id);

        
        $data = $request->except('_token','_method');
        
        $data['slug'] = str_replace(' ', '-', $request->input('title'));

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/blogs/', time().$file->getClientOriginalName());   
            $data['cover'] = 'blogs/'.time().$file->getClientOriginalName();
        }

        $blog = Blog::where('id',$id)->update($data);

        return redirect()->route('admin.blogs.index')
            ->with('message', 'Update successful');
    }

    
    public function destroy($id)
    {
        $blog = Blog::find($id);
        
    $blog->delete();
        return redirect()->route('admin.blogs.index')->with('message', 'Delete successful');
    }

    
    
}
