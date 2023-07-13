<?php

namespace App\Http\Controllers\Admin\Policy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Policies\Policy;
use Illuminate\Support\Facades\DB;

class PolicyController extends Controller
{
    public function index()
    {
        try{
            $policies = DB::table('policies')->orderBy('id','ASC')->paginate(30);
        }
        catch (\Throwable $e) {
            echo $e->getMessage();
            die;
        }
        
        $keyword = '';
        
        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url',$previous);
        
        // dd(1);


        return view('admin.policies.list', compact('policies', 'keyword'));
    }

    public function create()
    {
        return view('admin.policies.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_method', '_token');

        DB::table('policies')->insert($data);

        return redirect()->route('admin.policies.index')
            ->with('message', 'Create policy successful!');
    }

    public function edit($id)
    {
        $policy = DB::table('policies')->find($id);
// dd(1);
        return view('admin.policies.edit', compact(
            'policy'           
        ));
    }

    public function update(Request $request, $id)
    {

        $data = $request->except('_method', '_token');

        DB::table('policies')->where('id',$id)->update($data);

        return redirect()->route('admin.policies.edit', $id)
            ->with('message', 'Update policy successful!');
    }
    
   

}
