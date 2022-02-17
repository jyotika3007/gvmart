<?php

namespace App\Http\Controllers\Admin\Products;

use App\Shop\Attributes\Attribute;
use App\Shop\ProductAttributes\ProductAttribute;
use App\Shop\Products\Product;
use App\Shop\ProductReviews\ProductReview;
use App\Shop\Brands\Brand;
use App\Shop\Categories\Category;
use App\Shop\ProductImages\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\ProductSize;
use App\Shop\ProductWeight;
use Auth;
use DB;

class ProductController extends Controller
{

    public function getCategories(){

        $all_categories = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){

            $getCategories = DB::table('registered_shops')->where('user_id',$user->id)->first();

            $cats = explode(',',$getCategories->category_ids);

            $all_categories = Category::whereIn('id',$cats)->get();

        }
        else{
            $all_categories = Category::where('parent_id',NULL)->get();        
        }

        $i=0;

        $categories = array();

        if(!empty($all_categories)){

            foreach($all_categories as $category){
                // $i=0;

                $item = array();
                $cat = Category::where('parent_id',$category->id)->get();
                
                $categories[$i]['main'] = $category;
                $categories[$i]['main']['main'] = $cat;
                $i++;
            }
        }

        return $categories;
    }

    public function index()
    {

        $list = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
            $list = Product::where('user_id',$user->id)->paginate(50);
        }
        else{
            $list = Product::where('status',1)->paginate(50);

        }
         $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);
        //  echo $previous; die;
        return view('admin.products.list', [
            'products' => $list
        ]);
    }
    
    public function inactive_products()
    {

        $list = '';

        $title = 'Inactive';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
            $list = Product::where('user_id',$user->id)->where('status',0)->paginate(50);
        }
        else{
            $list = Product::where('status',0)->paginate(50);

        }
         $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);
        //  echo $previous; die;
        return view('admin.products.list', [
            'products' => $list,
            'title' => $title
        ]);
    }
  
    public function out_stock_products()
    {

        $list = '';

        $title = 'Out Of  Stock';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
            $list = Product::where('user_id',$user->id)->where('stock_quantity',0)->paginate(50);
        }
        else{
            $list = Product::where('stock_quantity',0)->paginate(50);

        }
         $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);
        //  echo $previous; die;
        return view('admin.products.out_stock_list', [
            'products' => $list,
            'title' => $title
        ]);
    }

public function vendor_products()
    {

        $list = '';

        $user = Auth::user();

        $title = "Vendor's New ";
        
        $list = Product::where('status',0)->where('user_id','>',2)->paginate(50);
       
        $previous = $_SERVER['REQUEST_URI'];

        session()->put('previous_url',$previous);
        //  echo $previous; die;
        return view('admin.products.list', [
            'products' => $list,
            'title' => $title
        ]);
    }

    public function searchList(Request $request)
    {

        $list = '';

        $user = Auth::user();
        if(!empty($user) && $user->user_role == 'vendor'){
            $list = Product::where('user_id',$user->id)->where('name','LIKE','%'.$request->keyword
                .'%')->orWhere('description','LIKE','%'.$request->keyword
                .'%')->paginate(50);
        }
        else{
            $list = Product::where('name','LIKE','%'.$request->keyword
                .'%')->orWhere('description','LIKE','%'.$request->keyword
                .'%')->paginate(50);

        }

        $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);
         
        return view('admin.products.list', [
            'products' => $list,
            'keyword' => $request->keyword
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $brands = '';

        $categories = '';

        $user = Auth::user();

        if(!empty($user) && $user->user_role == 'vendor'){
            $brands = Brand::where('user_id',$user->id)->get();         
        }
        else{
            $brands = Brand::all();        
        }

            $categories = $this->getCategories();

        return view('admin.products.create', [
            'categories' => $categories,
            'brands' => $brands,
            'default_weight' => env('SHOP_WEIGHT'),
            'weight_units' => Product::MASS_UNIT,
            'product' => new Product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method','units');

        $units = $request->units ?? '';
        $weights = $request->weights ?? '';
        $weight_prices = $request->weight_prices ?? '';

        $sizes = $data['size'];
        $prices = $data['product_prices'];

        if(count($data['size'])>0){
            $data['size'] = implode(',',$data['size']);
        }

        $data['slug'] = str_replace(' ', '-', $request->input('name'));

        if ($request->hasFile('cover')){
            $file=$request->cover;
            $file_name = time().$file->getClientOriginalName();
            $file->move(public_path(). '/storage/products/', $file_name);   
            $data['cover'] = 'products/'.$file_name;
        }
        
        $data['user_id'] = Auth::user()->id;

        if($data['user_id']>2){
            $data['status'] = 0;
        }

        $data['sku'] = "SKU".rand(10,999999999);

        $lastProduct = Product::create($data);

        if ($request->hasFile('image')) {
            $images = $request->image;
            foreach($images as $img){
                $newImage = new ProductImage;

                $file=$img;
                
                $file_name = time().$file->getClientOriginalName();
                $file->move(public_path(). '/storage/products/', $file_name);

                $newImage->src = 'products/'.$file_name;

                $newImage->product_id = $lastProduct->id;
                $newImage->priority = '1';

                $newImage->save();
            }
        }

        if ($request->has('categories')) {
            foreach($request->categories as $cat)
                $proCat = DB::table('category_product')->insert([
                    'product_id' => $lastProduct->id,
                    'category_id' => $cat
                ]);

        }        

        if(!empty($data['size']) and count($sizes)>0){

            foreach($sizes as $key => $value){

                $newData = new ProductSize;

                $newData->product_id = $lastProduct->id;
                $newData->product_size = $value;
                $newData->product_price = $prices[$key];

                $newData->save();

            } 
        } 

        if(!empty($request->weights[0])){

            foreach($weights as $key => $value){

                $newData = new ProductWeight;

                $newData->product_id = $lastProduct->id;
                $newData->product_weight = $value;
                $newData->product_price = $weight_prices[$key];
                $newData->weight_unit = $units[$key];

                $newData->save();
            } 

        }

        return redirect()->route('admin.products.index', $lastProduct->id)->with('message', 'Create successful');
    }

    
    public function show(int $id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }

    
    public function edit(int $id)
    {
        $product_sizes = ProductSize::where('product_id',$id)->get();
        $product_weights = ProductWeight::where('product_id',$id)->get();
        $product = Product::find($id);
        $productAttributes = "";

        $brands = '';
        $user = Auth::user();

        if($user->user_role == 'vendor'){
            $brands = Brand::where('user_id',$user->id)->get();
        }
        else{
            $brands = Brand::all();        
        }

        // $qty = $productAttributes->map(function ($item) {
        //     return $item->quantity;
        // })->sum();

        $qty = 0;        

        $categories = $this->getCategories();

        $category_products = DB::table('category_product')->where('product_id',$id)->get();
        $selectedIds = array();
        if($category_products){
            foreach($category_products as $cat)
                $selectedIds[] = $cat->category_id;
        }

        // var_dump($selectedIds); die;

        $attributes = '';

        $images = ProductImage::where('product_id',$id)->orderBy('priority','ASC')->get();
        
       
        $previous = session()->get('previous_url');
        // var_dump($previous); die;

        return view('admin.products.edit', [
            'product' => $product,
            'images' => $images,
            'categories' => $categories,
            'selectedIds' => $selectedIds,
            'attributes' => $attributes,
            'productAttributes' => $product->quantity,
            'qty' => $qty,
            'brands' => $brands,
            'weight' => $product->weight,
            'default_weight' => $product->mass_unit,
            'size' => $product->size ?? '',
            'color' => $product->color ?? '',
            'product_type' => $product->product_type ?? '',
            'material' => $product->material ?? '',
            'weight_units' => Product::MASS_UNIT,
            'product_sizes' => $product_sizes ?? '',
            'product_weights' => $product_weights ?? '',
            'previous' => $previous,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \App\Shop\Products\Exceptions\ProductUpdateErrorException
     */
    public function update(Request $request, int $id)
    {
        $product = Product::find($id);

        $data = $request->except(
            'categories',
            '_token',
            '_method',
            'default',
            'image',
            'productAttributeQuantity',
            'productAttributePrice',
            'attributeValue',
            'combination',
            'product_prices',
            'priorities',
            'units',
            'weights',
            'weight_prices'
            
        );

        $units = $request->units ?? '';
        $weights = $request->weights ?? '';
        $weight_prices = $request->weight_prices ?? '';

        $sizes = $data['size'];
        $prices = $request->product_prices;

        if(count($data['size'])>0){
            $data['size'] = implode(',',$data['size']);
        }

        $data['slug'] = str_replace(' ', '-', $request->input('name'));

        if ($request->hasFile('cover')){
            $file=$request->cover;
            
            $file_name = time().$file->getClientOriginalName();
            $file->move(public_path(). '/storage/products/', $file_name);
            
            // $file->move(public_path(). '/storage/products/', time().$file->getClientOriginalName());   
            $data['cover'] = 'products/'.$file_name;
        }
        
        // $data['user_id'] = Auth::user()->id;

        Product::where('id',$id)->update($data);

        if ($request->hasFile('image')) {
            $images = $request->image;
            foreach($images as $img){
                $newImage = new ProductImage;

                $file=$img;
                
                $file_name = time().$file->getClientOriginalName();
                $file->move(public_path(). '/storage/products/', $file_name);
                
                // $file->move(public_path(). '/storage/products/', time().$file->getClientOriginalName());   
                $newImage->src = 'products/'.$file_name;

                $newImage->product_id = $product->id;
                $newImage->priority = '1';

                $newImage->save();
            }
        }

        if ($request->has('categories')) {
            DB::table('category_product')->where('product_id',$id)->delete();
            foreach($request->categories as $cat){

                $proCat = DB::table('category_product')->insert([
                    'product_id' => $product->id,
                    'category_id' => $cat
                ]);

            }

        }        

        if(!empty($data['size']) and count($sizes)>0){

            foreach($sizes as $key => $value){

                $newData = new ProductSize;

                $newData->product_id = $product->id;
                $newData->product_size = $value;
                $newData->product_price = $prices[$key];

                $newData->save();
            } 
        } 

        if(!empty($request->weights[0])){

            foreach($weights as $key => $value){

                $newData = new ProductWeight;

                $newData->product_id = $product->id;
                $newData->product_weight = $value;
                $newData->product_price = $weight_prices[$key];
                $newData->weight_unit = $units[$key];

                $newData->save();
            } 

        }


        


        // return redirect()->route('admin.products.index')
        return redirect()->back()
        ->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        ProductImage::where('product_id',$id)->delete();

        DB::table('category_product')->where('product_id',$id)->delete();

        $product->delete();

        return redirect()->route('admin.products.index')->with('message', 'Delete successful');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function getMoreFields(Request $request){

        $id=$request->id;
        
        return view('admin.products.sizes',compact('id'));
    }


    public function deleteSize($id){
        ProductSize::where('id',$id)->delete();

        return redirect()->back()->with('message','Size removed successfully');
    }

    public function getMoreWeightFields(Request $request){

        $id=$request->id;
        
        return view('admin.products.weights',compact('id'));
    }


    public function deleteWeight($id){
        ProductWeight::where('id',$id)->delete();

        return redirect()->back()->with('message','Size removed successfully');
    }




    public function removeThumbnail ($id){
        ProductImage::where('id',$id)->delete();

        return redirect()->back()->with('message','Image removed successfully');
    }


public function getDetail(Request $request){
    $product = Product::find($id);

    $sku = $product->sku;

    return response()->json(['sku' => $sku]);
}

public function updateProductBrand(){
    $products = Product::all();

    foreach($products as $product){
        $brand = Brand::where('name',$product->brand_id)->first();
        if(!empty($brand)){
            $product->update([
            'brand_id' => $brand->id
        ]);
        }
    }
}


public function getDump(){
    return view('admin.products.dump');
}

public function getSkuCode(Request $request){
    // $data = $request->all();
    
    $cat = Category::find($request->cat_id);
    $datas = str_replace(' ',',',$cat->name);
    
    $code = '';
    
// var_dump($data); die;
$data = explode(',',$datas);

// var_dump($data); die;

$len = count($data);
// echo $len;

if($len==1){
    $code = strtoupper(substr($datas,0,3));
    
   
}
else{
    for($i=0;$i<$len;$i++){
        $code.=strtoupper(substr($data[$i],0,1));
    }
}

    //  echo $code;
     
     $check = Product::where('sku','LIKE',$code.'%')->count();
    //  echo $check; die;
     $check = $check+1;
    $code = $code."000".$check;
    echo $code;
}





public function getReviews(){
    $products = ProductReview::distinct('product_id')->select('product_id')->paginate('50');
    
    // var_dump($products); die;
    
    return view('admin.products.review_list',compact('products'));
}


public function getReviewsDetail($id){
    $reviews = ProductReview::where('product_id',$id)->get();
    
    
    $product = Product::find($id);
    
    // var_dump($products); die;
    
    return view('admin.products.review_detail',compact('reviews','product'));
}

public function updateReviewsStatus($id){
   
    
    $product = ProductReview::find($id);
    
    $status = 1;
    if($product->status == 1){
        $status = 0;
    }
    
    $product->status = $status;
    
    $product->update();
    
    // var_dump($products); die;
    
    return redirect()->back()->with('message','Status updated successfully');
}





}
