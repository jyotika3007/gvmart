<?php

namespace App\Http\Controllers\Admin\Inventories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Inventory\Inventory;
use App\Shop\Products\Product;
use App\Shop\RegisteredShop\RegisteredShop;
use Auth;
use DB;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $inventories = '';

       $user = Auth::user();

       if(!empty($user) && $user->user_role == 'vendor'){
        $inventories = Inventory::JOIN('users','users.id','inventories.user_id')->where('inventories.user_id',$user->id)->select('inventories.*','users.name')->paginate(25);
    }
    else{
        $inventories = Inventory::JOIN('users','users.id','inventories.user_id')->select('inventories.*','users.name')->paginate(25);

    }

    $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

    return view('admin.inventories.list', [
        'inventories' => $inventories
    ]);
}

    public function searchList()
    {
       $inventories = '';

       $user = Auth::user();

       if(!empty($user) && $user->user_role == 'vendor'){
        $inventories = Inventory::where('user_id',$user->id)->paginate(10);
    }
    else{
        $inventories = Inventory::paginate(10);

    }

    $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

    return view('admin.inventories.list', [
        'inventories' => $inventories
    ]);
}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $products = '';
        $users = '';

       if(!empty($user) && $user->user_role == 'vendor'){
        $users = RegisteredShop::where('user_id',$user->id)->get();
        $products = Product::where('user_id',$user->id)->paginate(10);
    }
    else{
        $users = RegisteredShop::all();
         $products = Product::all();

    }

    return view('admin.inventories.create',compact('products','users'));

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // var_dump($data['product_ids']); die;

        $newBill = new Inventory;

        $newBill->bill_no = $data['bill_no'] ?? '';
        $newBill->billing_date = $data['billing_date'] ?? '';
        $newBill->billing_amount = $data['billing_amount'] ?? '';
        $newBill->user_id = $data['user_id'] ?? '2';

        $newBill->save();

        $getBill = Inventory::where('bill_no',$data['bill_no'])->first();

        $product_ids = $data['product_ids'];
        $product_quantity = $data['product_quantity'];
        $product_price = $data['product_price'];

        if(!empty($data['product_ids'])){
            foreach($data['product_ids'] as $key => $product_id){
                $product = Product::find($product_id);
                $newBillData = DB::table('inventory_products')->insert(array(
                    'product_id' => $product_id,
                    'product_name' => $product->name ?? '',
                    'product_sku' => $product->sku ?? '',
                    'product_quantity' => $product_quantity[$key],
                    'product_price' => $product_price[$key],
                    'inventory_id' => $getBill->id

                ));

                $product->stock_quantity = $product->stock_quantity+$product_quantity[$key];
                $product->update();

            }
        }

        return redirect()->route('admin.inventories.index')->with('message','Data inserted successfully');
        // var_dump($data); die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);

        $inventory_products =  DB::table('inventory_products')->JOIN('products','products.id','inventory_products.product_id')->where('inventory_products.inventory_id',$id)->select('inventory_products.*','products.cover')->get();

        return view('admin.inventories.show',[
            'inventory' => $inventory,
            'inventory_products' => $inventory_products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $previous = session()->get('previous_url');

         $inventory = Inventory::find($id);

         $products = Product::all();

        $inventory_products =  DB::table('inventory_products')->where('inventory_id',$id)->get();

        return view('admin.inventories.edit',[
            'inventory' => $inventory,
            'inventory_products' => $inventory_products,
            'products' => $products,
            'previous' => $previous
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



     public function checkBillNo(Request $request){

        $bill_no = $request->bill_no;
        
        $bill = Inventory::where('bill_no',$bill_no)->first();

        if($bill){
            return 1;
        }
        else{
            return 0;
        }
        
    }


public function getMoreStockFields(Request $request){

        $id=$request->id;
        
        $products = Product::all();

        return view('admin.inventories.stock_add',compact('id','products'));
    }


    public function deleteStock($id){
        ProductWeight::where('id',$id)->delete();

        return redirect()->back()->with('message','Size removed successfully');
    }

}
