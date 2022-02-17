<?php

namespace App\Http\Controllers\Admin\Promocodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Promocodes\Promocode;

class PromocodeController extends Controller
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

        $lists = Promocode::where('promocode_start_date','>=',$from_date)->whereOr('promocode_expiry_date','<=',$to_date)->orderby('id','DESC')->paginate(50);

        $from_date = explode(' ',$from_date)[0];
        $to_date = explode(' ',$to_date)[0];

    }
    else{
       $lists = Promocode::paginate(50);
   }

    $previous = $_SERVER['REQUEST_URI'];
    session()->put('previous_url',$previous);

   return view('admin.promocodes.list', [
    'promocodes' => $lists,
    'from_date' => $from_date,
    'to_date' => $to_date
]);
}

public function searchList(Request $request)
{
    $lists = Promocode::where('title','LIKE','%'.$request->keyword.'%')->paginate(50);

    return view('admin.promocodes.list', [
        'promocodes' => $lists,
        'keyword' => $request->keyword
    ]);
}


public function create()
{

    return view('admin.promocodes.create');
}


public function store(Request $request)
{
    $data = $request->except('_token', '_method');



        // var_dump($data); die;

    $promocode = Promocode::create($data);

    return redirect()->route('admin.promocodes.index')->with('message', 'Create successful');
}


public function show(int $id)
{
    $promocode = Promocode::find($id);
    return view('admin.promocodes.show', compact('promocode'));
}


public function edit(int $id)
{
    $promocode = Promocode::find($id);

        $previous = session()->get('previous_url');

    return view('admin.promocodes.edit', [
        'promocode' => $promocode,
        'previous' => $previous

    ]);
}


public function update(Request $request, int $id)
{

    $data = $request->except('_token','_method');

    $promocode = Promocode::where('id',$id)->update($data);

    return redirect()->route('admin.promocodes.index')->with('message', 'Update successful');
}


public function destroy($id)
{
    $promocode = Promocode::find($id);

    $promocode->delete();

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
