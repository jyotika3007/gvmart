<?php

namespace App\Http\Controllers\Admin\Policy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::orderBy('id')->paginate(30);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url',$previous);

        return view('admin.policies.list', compact('policies'));
    }

    public function create()
    {
        return view('admin.policies.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_method', '_token');

        Policy::create($data);

        return redirect()->route('admin.policies.index')
            ->with('message', 'Create policy successful!');
    }

    public function edit($id)
    {
        $policy = Policy::find($id);

        return view('admin.policies.edit', compact(
            'policy'           
        ));
    }

    public function update(Request $request, $id)
    {
        $policy = Policy::find($id);

        $data = $request->except('_method', '_token');

        $policy = Policy::where('id',$id)->update($data);

      
        return redirect()->route('admin.policies.edit', $id)
            ->with('message', 'Update policy successful!');
    }
    
   

}
