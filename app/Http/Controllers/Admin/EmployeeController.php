<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Shop\Employees\Employee;
use App\Shop\Roles\Role;
use Auth;
use Hash;
use DB;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $list = Employee::JOIN('roles','roles.id','employees.user_role')->select('employees.*','roles.name as role')->paginate(20);

        // var_dump($list); die;

        $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.employees.list', [
            'employees' => $list
        ]);
    }


public function searchList()
    {
        $list = Employee::paginate(20);

        // var_dump($list); die;

        $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        return view('admin.employees.list', [
            'employees' => $list
        ]);
    }

    
    public function create()
    {
        $roles = DB::table('roles')->get();

        return view('admin.employees.create', compact('roles'));
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token','_method');

        if ($request->hasFile('driving_licence') ) {
            $file=$request->driving_licence;            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['driving_licence'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('adhaar_front') ) {
            $file=$request->adhaar_front;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['adhaar_front'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('adhaar_back') ) {
            $file=$request->adhaar_back;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['adhaar_back'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('pan_card') ) {
            $file=$request->pan_card;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['pan_card'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('voter_id') ) {
            $file=$request->voter_id;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['voter_id'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('passport_size_photo') ) {
            $file=$request->passport_size_photo;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['passport_size_photo'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('others') ) {
            $file=$request->others;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['others'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }
        

        $newData = Employee::create($data);

        return redirect()->route('admin.employees.index')->with('message','Data inserted successfully');
    }

    
    public function show(int $id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.show', ['employee' => $employee]);
    }

    
    public function edit(int $id)
    {
        $employee = Employee::find($id);
        $roles = DB::table('roles')->get();
        
        $previous = session()->get('previous_url');

        return view(
            'admin.employees.edit',
            [
                'employee' => $employee,
                'roles' => $roles,
                'previous' => $previous
            ]
        );
    }

    
    public function update(Request $request, $id)
    {

        $data = $request->except('_token','_method');


          if ($request->hasFile('driving_licence') ) {
            $file=$request->driving_licence;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['driving_licence'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('adhaar_front') ) {
            $file=$request->adhaar_front;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['adhaar_front'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('adhaar_back') ) {
            $file=$request->adhaar_back;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['adhaar_back'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('pan_card') ) {
            $file=$request->pan_card;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['pan_card'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('voter_id') ) {
            $file=$request->voter_id;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['voter_id'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }

        if ($request->hasFile('passport_size_photo') ) {
            $file=$request->passport_size_photo;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['passport_size_photo'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }
        
        if ($request->hasFile('others') ) {
            $file=$request->others;
            
            $file_ext = explode('.',$file->getClientOriginalName());
$random = rand(10000,999999);
            $file->move(public_path(). '/storage/employees_doc/', $random.time().'.'.$file_ext[count($file_ext)-1]);   
            $data['others'] = 'employees_doc/'.$random.time().'.'.$file_ext[count($file_ext)-1];
        }
        

        

        $user = Employee::where('id',$id)->update($data);
        
        return redirect()->route('admin.employees.edit', $id)
            ->with('message', 'Update successful');
    }

    
    public function destroy(int $id)
    {
        
        return redirect()->route('admin.employees.index')->with('message', 'Delete successful');
    }

    
    public function getProfile($id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.profile', ['employee' => $employee]);
    }

    
    public function updateProfile(UpdateEmployeeRequest $request, $id)
    {
        
        return redirect()->route('admin.employee.profile', $id)
            ->with('message', 'Update successful');
    }

  
  
    public function getEmployeesList($role,$id){
        $employees = Employee::where('user_role',$id)->paginate(20);

        return view('admin.employees.roleEmployees',[
            'role' => $role,
            'employees' => $employees
        ]);
    }

}
