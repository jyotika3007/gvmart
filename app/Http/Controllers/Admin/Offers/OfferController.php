<?php

namespace App\Http\Controllers\Admin\Offers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Offers\Offer;
use Auth;

class OfferController extends Controller
{
     public function index()
    {

            $list = '';

        $user = Auth::user();
        if($user->user_role == 'vendor'){
        $list = Offer::where('user_id',$user->id)->paginate(10);
    }
        else{
        $list = Offer::paginate(10);
        }

        

        return view('admin.offers.list', [
            'offers' => $list
        ]);
    }

    
    public function create()
    {
       
        return view('admin.offers.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = str_replace(' ','-',$request->input('title'));

        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('cover') ) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/offers/', time().$file->getClientOriginalName());   
            $data['cover'] = 'offers/'.time().$file->getClientOriginalName();
        }

        $blog =Offer::create($data);

        return redirect()->route('admin.offers.edit', $blog->id)->with('message', 'Create successful');
    }

    
    public function show(int $id)
    {
        $blog = Offer::find($id);
        return view('admin.offers.show', compact('blog'));
    }

    
    public function edit(int $id)
    {
        $blog = Offer::find($id);
        
        return view('admin.offers.edit', [
            'blog' => $blog,
            
        ]);
    }

    
    public function update(Request $request, int $id)
    {
        $blog = Offer::find($id);

        
        $data = $request->except('_token','_method');
        
        $data['slug'] = str_replace(' ', '-', $request->input('title'));

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/offers/', time().$file->getClientOriginalName());   
            $data['cover'] = 'offers/'.time().$file->getClientOriginalName();
        }

        $blog = Offer::where('id',$id)->update($data);

        return redirect()->route('admin.offers.edit', $id)
            ->with('message', 'Update successful');
    }

    
    public function destroy($id)
    {
        $blog = Offer::find($id);
        
    $blog->delete();
        return redirect()->route('admin.offers.index')->with('message', 'Delete successful');
    }

}
