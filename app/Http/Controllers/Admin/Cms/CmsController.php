<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Cms\Cms;

class CmsController extends Controller
{
    
    public function index()
    {
        $data = Cms::paginate(20);
        return view('admin.cms.list', ['cms' => $data]);
    }

    
    public function create()
    {
        return view('admin.cms.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth()::user()->id;
        $cms = Cms::create($data);

        return redirect()->route('admin.cms.index')->with('message', 'Create cms successful!');
    }

    
    public function edit($id)
    {
        $cms = Cms::find($id);
        return view('admin.cms.edit', ['cms' => $cms]);
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->except('_token','_method');
        $cms = Cms::where('id',$id)->update($data);

        return redirect()->route('admin.cms.edit', $id)->with('message', 'Update successful!');
    }

    
    public function destroy($id)
    {
        $cms =Cms::find($id);

        $cms->delete();

        return redirect()->route('admin.cms.index')->with('message', 'Delete successful!');
    }
}
