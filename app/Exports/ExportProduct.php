<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Shop\Products\Product;
use Auth;

class ExportProduct implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = '';
        
         $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
            $products = Product::where('user_id',$user->id)->select('id','name','price','sale_price','discount')->get();
        }
        else{
            $products = Product::select('id','name','price','sale_price','discount')->get();        
        }

        
        
        

        return $products;
    }
}
