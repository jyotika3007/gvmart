<?php

namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Locations\Location;

class LocationController extends Controller
{
    public function index(Request $request)
    {



    	 $data = $request->all();


    $from_date = '';
    $to_date = '';

if(!empty($data['from_date']) && !empty($data['to_date'])){
        $from_date = date('Y-m-d H:s:m', strtotime($data['from_date']));
        $to_date = date('Y-m-d', strtotime($data['to_date']));
        $to_date = $to_date.' 23:59:59';

        // echo $from_date." ".$to_date; die;

        $lists = Location::where('promocode_start_date','>=',$from_date)->whereOr('promocode_expiry_date','<=',$to_date)->orderby('id','DESC')->paginate(10);

         $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

}
else{
	    $lists = Location::paginate(10);
}

$previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.locations.list', [
            'locations' => $lists,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function searchList(Request $request)
    {
        $lists = Location::where('title','LIKE','%'.$request->keyword.'%')->paginate(10);

$previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.locations.list', [
            'locations' => $lists,
            'keyword' => $request->keyword
        ]);
    }

    
    public function create()
    {
        
        return view('admin.locations.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        
       

        // var_dump($data); die;

        $location = Location::create($data);
        
        return redirect()->route('admin.locations.index')->with('message', 'Create successful');
    }

    
    public function show(int $id)
    {
        $location = Location::find($id);
        return view('admin.locations.show', compact('location'));
    }

    
    public function edit(int $id)
    {
        $location = Location::find($id);
        
        $previous = session()->get('previous_url');

        return view('admin.locations.edit', [
            'location' => $location,
            'previous' => $previous
            
        ]);
    }


    public function update(Request $request, int $id)
    {
     
        $data = $request->except('_token','_method');
        
        $location = Location::where('id',$id)->update($data);

        return redirect()->route('admin.locations.index')->with('message', 'Update successful');
    }

    
    public function destroy($id)
    {
        $location = Location::find($id);

        $location->delete();

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
