<?php

namespace App\Http\Controllers\Admin\Imports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Categories\Category;
use App\Imports\ImportDb\BrandsImport;
use App\Imports\ImportDb\ProductsImport;
use App\Imports\ImportDb\ProductDumpImport;
use App\Imports\ImportDb\CategoriesImport;
use App\Imports\ImportDb\MainCategoriesImport;
use Maatwebsite\Excel\Facades\Excel as MaatExcel;
use Excel;
use Auth;

class ImportController extends Controller
{
    
    public function getProductExcel(){
    	return view('admin.imports.products');
    }

	public function importProduct(Request $request){
		$data = $request->all();


		$File = $request->file('file');
$path = $request->file('file')->getRealPath();
$real_name = $File->getClientOriginalName();
// var_dump($real_name); die;
$datas = Excel::import(new ProductsImport, $path);

return redirect()->back()->with('message','Data imported successfully');

	}



	public function importCategory(Request $request){
		$data = $request->all();


		$File = $request->file('file');
$path = $request->file('file')->getRealPath();
$real_name = $File->getClientOriginalName();
// var_dump($real_name); die;
$datas = Excel::import(new CategoriesImport, $path);

return redirect()->back()->with('message','Data imported successfully');


	}


public function importProductCategory(Request $request){
		$data = $request->all();


		$File = $request->file('file');
$path = $request->file('file')->getRealPath();
$real_name = $File->getClientOriginalName();
// var_dump($real_name); die;
$datas = Excel::import(new MainCategoriesImport, $path);

return redirect()->back()->with('message','Data imported successfully');


	}

public function importBrand(Request $request){
		$data = $request->all();


		$File = $request->file('file');
$path = $request->file('file')->getRealPath();
$real_name = $File->getClientOriginalName();
// var_dump($real_name); die;
$datas = Excel::import(new BrandsImport, $path);

return redirect()->back()->with('message','Data imported successfully');


	}

	public function getProductDumpExcel(Request $request){
		$data = $request->all();


		$File = $request->file('file');
$path = $request->file('file')->getRealPath();
$real_name = $File->getClientOriginalName();
// var_dump($real_name); die;
$datas = Excel::import(new ProductDumpImport, $path);

return redirect()->back()->with('message','Data imported successfully');


	}

}
