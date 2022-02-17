<?php

namespace App\Http\Controllers\Admin\Pincodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Pincodes\Pincode;

class PincodeController extends Controller
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

        $lists = Pincode::where('promocode_start_date','>=',$from_date)->whereOr('promocode_expiry_date','<=',$to_date)->orderby('id','DESC')->paginate(10);

         $from_date = explode(' ',$from_date)[0];
    $to_date = explode(' ',$to_date)[0];

}
else{
	    $lists = Pincode::paginate(10);
}

    $previous = $_SERVER['REQUEST_URI'];
    session()->put('previous_url',$previous);

        return view('admin.pincodes.list', [
            'pincodes' => $lists,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function searchList(Request $request)
    {
        $lists = Pincode::where('pincode','LIKE','%'.$request->keyword.'%')->paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url',$previous);

        return view('admin.pincodes.list', [
            'pincodes' => $lists,
            'keyword' => $request->keyword
        ]);
    }

    
    public function create()
    {
        
        return view('admin.pincodes.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        
       

        // var_dump($data); die;

        $pincode = Pincode::create($data);
        
        return redirect()->route('admin.pincodes.index')->with('message', 'Create successful');
    }

    
    public function show(int $id)
    {
        $pincode = Pincode::find($id);
        return view('admin.pincodes.show', compact('pincode'));
    }

    
    public function edit(int $id)
    {
        $pincode = Pincode::find($id);
        
        $previous = session()->get('previous_url');

        return view('admin.pincodes.edit', [
            'pincode' => $pincode,
            'previous' => $previous
            
        ]);
    }


    public function update(Request $request, int $id)
    {
     
        $data = $request->except('_token','_method');
        
        $pincode = Pincode::where('id',$id)->update($data);

        return redirect()->route('admin.pincodes.index')->with('message', 'Update successful');
    }

    
    public function destroy($id)
    {
        $pincode = Pincode::find($id);

        $pincode->delete();

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
