<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\Controller;
use App\Shop\Permissions\\Permission;

class PermissionController extends Controller
{
    
    public function index()
    {
        $permissions = Permission::paginate(20);


        // var_dump($permissions); die;

        return view('admin.permissions.list', compact('permissions'));
    }
}
