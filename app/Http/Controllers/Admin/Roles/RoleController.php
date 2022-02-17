<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Roles\Role;
use App\Shop\Permissions\Permission;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->paginate(30);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url',$previous);

        return view('admin.roles.list', compact('roles'));
    }

   
    public function create()
    {
        return view('admin.roles.create');
    }

   
    public function store(Request $request)
    {
        $data = $request->except('_method', '_token');

        $data['display_name'] = $data['name'];

        $role = Role::create($data);

        return redirect()->route('admin.roles.index')
            ->with('message', 'Create role successful!');
    }

    
    public function edit($id)
    {
        $role = Role::find($id);

        return view('admin.roles.edit', compact(
            'role'           
        ));
    }

    
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $data = $request->except('_method', '_token');
        
        $data['display_name'] = $data['name'];

        $role = Role::where('id',$id)->update($data);

      
        return redirect()->route('admin.roles.edit', $id)
            ->with('message', 'Update role successful!');
    }

  

}
