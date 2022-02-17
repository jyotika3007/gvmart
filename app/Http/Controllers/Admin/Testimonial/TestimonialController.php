<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Testimonial\Testimonial;
use Auth;

class TestimonialController extends Controller
{
   
    public function index()
    {
        $testimonials = Testimonial::paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url',$previous);

        return view('admin.testimonials.list', [
            'testimonials' => $testimonials
        ]);
    }


public function searchList(Request $request)
    {
        $testimonials = Testimonial::where('name','LIKE','%'.$request->keyword.'%')->orWhere('description','LIKE','%'.$request->keyword.'%')->orWhere('profession','LIKE','%'.$request->keyword.'%')->paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.testimonials.list', [
            'testimonials' => $testimonials,
            'keyword' => $request->keyword
        ]);
    }

    
    public function create()
    {
       return view('admin.testimonials.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = str_replace(' ', '-', $request->input('name'));

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/testimonials/', time().$file->getClientOriginalName());   
            $data['cover'] = 'testimonials/'.time().$file->getClientOriginalName();
        }
        $data['user_id'] = Auth::user()->id;
        $testimonial = Testimonial::create($data);
        
        return redirect()->route('admin.testimonials.edit', $testimonial->id)->with('message', 'Create successful');
    }

    
    public function show(int $id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonials.show', compact('testimonial'));
    }

    
    public function edit(int $id)
    {
        $testimonial = Testimonial::find($id);       
        
        $previous = session()->get('previous_url');

        return view('admin.testimonials.edit', [
            'testimonial' => $testimonial,      
            'previous' => $previous      
        ]);
    }

    
    public function update(Request $request, int $id)
    {
        $testimonial = Testimonial::find($id);
       
        $data = $request->except('_token','_method');        

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/testimonials/', time().$file->getClientOriginalName());   
            $data['cover'] = 'testimonials/'.time().$file->getClientOriginalName();
        }

        Testimonial::where('id',$id)->update($data);

        return redirect()->route('admin.testimonials.edit', $id)
            ->with('message', 'Update successful');
    }

    
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('message', 'Delete successful');
    }

    
}
