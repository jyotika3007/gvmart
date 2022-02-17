<?php

namespace App\Http\Controllers\Admin\CompanyDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\CompanyDetail\CompanyDetail;
use Auth;

class CompanyDetailController extends Controller
{
    
    
    public function index()
    {
        $data = Company::all();

        return view('admin.company.list', ['company' => $data]);
    }

    public function show(Request $request,$id){
        $company_detail = CompanyDetail::find($id);
        return view('admin.company.edit', ['company_detail' => $company_detail]);
    }

    
    public function create()
    {
        return view('admin.company.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = Auth::user()->id;
        // var_dump($data); die;
        $company = CompanyDetail::create($data);

        redirect()->route('admin.company.edit', $company->id)->with('message', 'Create company successful!');
    }

    
    public function edit($id)
    {
        $company_detail = CompanyDetail::find($id);
        return view('admin.company.edit', ['company_detail' => $company_detail]);
    }


    public function update(Request $request, $id)
    {
        // $data = $request->all();


         $data = $request->except('_token');
        // var_dump($data); die;

         if ($request->hasFile('company_logo')) {
            $file=$request->company_logo;
            $file->move(public_path(). '/storage/logos/', time().$file->getClientOriginalName());   
            $data['company_logo'] = 'logos/'.time().$file->getClientOriginalName();
        }

        $company = CompanyDetail::where('id',$id)->update($data);       

        return redirect()->back()->with('message', 'Update successful!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
   
}
