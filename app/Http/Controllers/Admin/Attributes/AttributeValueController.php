<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shop\Attributes\Attribute;


class AttributeValueController extends Controller
{
    
    public function create($id)
    {
        $attribute = Attribute::find($id);
        // print_r($attribute); die;

        $values = DB::table('attribute_values')->where('attribute_id',$id)->get();

        return view('admin.attribute-values.create', [
            'attribute' => $attribute,
            'values' => $values
        ]);
    }

    public function store(Request $request, $id)
    {

        $data = $request->all();
        
        $values = DB::table('attribute_values')->insert([
            'attribute_id'=>$id,
            'value' => $data['value']?? '',
            'code' => $data['code'] ?? ''
        ]);

        return redirect()->back()->with('message','Attribute value added successfully');
    }

}
