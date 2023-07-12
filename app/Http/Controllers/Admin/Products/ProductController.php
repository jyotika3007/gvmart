<?php

namespace App\Http\Controllers\Admin\Products;

use App\AppleService;
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
use Illuminate\Support\Facades\DB;
use Mail;


class ProductController extends Controller
{

    public function getCategories()
    {

        $all_categories = '';

        $user = Auth::user();
        if (!empty($user) && $user->user_role == 'vendor') {

            $getCategories = DB::table('registered_shops')->where('user_id', $user->id)->first();

            $cats = explode(',', $getCategories->category_ids);

            $all_categories = Category::whereIn('id', $cats)->get();
        } else {
            $all_categories = Category::where('parent_id', NULL)->get();
        }

        $i = 0;

        $categories = array();

        if (!empty($all_categories)) {

            foreach ($all_categories as $category) {
                $item = array();
                $cat = Category::where('parent_id', $category->id)->get();

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
        if (!empty($user) && $user->user_role == 'vendor') {
            $list = Product::where('user_id', $user->id)->paginate(50);
        } else {
            $list = Product::where('status', 1)->paginate(50);
        }
        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);
        
        return view('admin.products.list', [
            'products' => $list
        ]);
    }

    public function inactive_products()
    {

        $list = '';

        $title = 'Inactive';

        $user = Auth::user();
        if (!empty($user) && $user->user_role == 'vendor') {
            $list = Product::where('user_id', $user->id)->where('status', 0)->paginate(50);
        } else {
            $list = Product::where('status', 0)->paginate(50);
        }
        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);
       
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
        if (!empty($user) && $user->user_role == 'vendor') {
            $list = Product::where('user_id', $user->id)->where('stock_quantity', 0)->paginate(50);
        } else {
            $list = Product::where('stock_quantity', 0)->paginate(50);
        }
        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);
        
        return view('admin.products.out_stock_list', [
            'products' => $list,
            'title' => $title
        ]);
    }

    public function vendor_products()
    {

        $list = '';

        $title = "Vendor's New ";

        $list = Product::where('status', 0)->where('user_id', '>', 2)->paginate(50);

        $previous = $_SERVER['REQUEST_URI'];

        session()->put('previous_url', $previous);
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
        if (!empty($user) && $user->user_role == 'vendor') {
            $list = Product::where('user_id', $user->id)->where('name', 'LIKE', '%' . $request->keyword
                . '%')->orWhere('description', 'LIKE', '%' . $request->keyword
                . '%')->paginate(50);
        } else {
            $list = Product::where('name', 'LIKE', '%' . $request->keyword
                . '%')->orWhere('description', 'LIKE', '%' . $request->keyword
                . '%')->paginate(50);
        }

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

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

        if (!empty($user) && $user->user_role == 'vendor') {
            $brands = Brand::where('user_id', $user->id)->get();
        } else {
            $brands = Brand::all();
        }

        $categories = Category::orderBy('id', 'DESC')->get();
        $services = AppleService::all();
        
        $res_products = Product::where('status', 1)->get(['id', 'name']);
        $res_assessories = DB::table('products')->join('category_product', 'category_product.product_id', 'products.id')->where('category_product.category_id', 5)->where('products.status', 1)->get(['products.id', 'products.name']);
        $attributes = Attribute::whereNotIn('id',[1,3])->get();

        return view('admin.products.create', [
            'categories' => $categories,
            'brands' => $brands,
            'default_weight' => env('SHOP_WEIGHT'),
            'weight_units' => Product::MASS_UNIT,
            'product' => new Product,
            'attributes' => $attributes,
            'related_products' => $res_products,
            'related_accessories' => $res_assessories,
            'services' => $services
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
        $data = $request->except('_token', '_method', 'units', 'related_services', 'related_products', 'related_accessories');

        $data['slug'] = str_replace(' ', '-', $request->input('name'));

        if ($request->hasFile('cover')) {
            $file = $request->cover;
            $file_name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/storage/products/', $file_name);
            $data['cover'] = 'products/' . $file_name;
        }

        $data['user_id'] = Auth::user()->id;

        $data['status'] = 1;

        try {
            $lastProduct = Product::create($data);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        if ($request->hasFile('image')) {
            $images = $request->image ?? [];
            foreach ($images as $img) {
                $newImage = new ProductImage;

                $file = $img;

                $file_name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/storage/products/', $file_name);

                $newImage->src = 'products/' . $file_name;

                $newImage->product_id = $lastProduct->id;
                $newImage->priority = '1';

                $newImage->save();
            }
        }

        if ($request->has('related_products')) {
            foreach ($request->related_products as $pro) {
                $proCat = DB::table('related_products')->insert([
                    'product_id' => $lastProduct->id,
                    'related_product_id' => $pro,
                    'type' => 'product'
                ]);
            }
        }

        if ($request->has('related_services')) {
            foreach ($request->related_services as $pro) {
                $proCat = DB::table('related_products')->insert([
                    'product_id' => $lastProduct->id,
                    'related_product_id' => $pro,
                    'type' => 'apple_service'
                ]);
            }
        }

        if ($request->has('related_accessories')) {
            foreach ($request->related_accessories as $pro) {
                $proCat = DB::table('related_products')->insert([
                    'product_id' => $lastProduct->id,
                    'related_product_id' => $pro,
                    'type' => 'accessory'
                ]);
            }
        }

        if($request->has('attributeKey') && $request->has('attributeValue')){
            $attributeValues = $request->attributeValue;
              foreach($request->attributeKey as $k=>$v){

                try {
                    $arrtId = DB::table('attribute_values')->insertGetId([
                        'attribute_id' => $v,
                        'value'=> $attributeValues[$k]
                        ]);

                        DB::table('attribute_value_product_attribute')->insertGetId([
                            'product_id' => $lastProduct->id,
                            'attribute_id' => $v,
                            'attribute_value_id' => $arrtId,
                            'status' => 1
                        ]);
                } catch (\Throwable $e) {
                    dd($e->getMessage());
                }

            }
        }

        return redirect()->route('admin.products.index')->with('message', 'Create successful');
    }


    public function show(int $id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }


    public function edit(int $id)
    {
        
        $product = Product::find($id);
        
        $categories = Category::orderBy('id', 'DESC')->get();
        $product_category = DB::table('category_product')->where('product_id',$id)->first(['category_id']);
        $apple_services = AppleService::all();
        
        $res_products = Product::where('status', 1)->whereNotIn('id',[$id])->get(['id', 'name']);

        $res_assessories = DB::table('products')->join('category_product', 'category_product.product_id', 'products.id')->where('category_product.category_id', 5)->where('products.status', 1)->get(['products.id', 'products.name']);
        
        $attributes = Attribute::whereNotIn('id',[1,3])->get();

        $product_attributes = DB::table('attribute_value_product_attribute')
        ->join('attribute_values', 'attribute_values.id', 'attribute_value_product_attribute.attribute_value_id')
        ->join('attributes','attributes.id','attribute_values.attribute_id')
        ->where('attribute_value_product_attribute.product_id', $id)
        ->whereNotIn('attribute_values.attribute_id',[3])
        ->get(['attribute_value_product_attribute.id','attributes.name','attribute_values.value']);

        $accessories = DB::table('related_products')->join('products','products.id','related_products.related_product_id')->where('related_products.type','accessory')->where('related_products.product_id',$id)->get(['products.id']);
        $products = DB::table('related_products')->join('products','products.id','related_products.related_product_id')->where('related_products.type','product')->where('related_products.product_id',$id)->get(['products.id']);
        $services = DB::table('related_products')->join('products','products.id','related_products.related_product_id')->where('related_products.type','apple_service')->where('related_products.product_id',$id)->get(['products.id']);
   
        $related_accessories = [];
        if(count($accessories)>0){
            foreach($accessories as $as){
                array_push($related_accessories, $as->id);
            }
        }

        $related_products = [];
        if(count($products)>0){
            foreach($products as $as){
                array_push($related_products, $as->id);
            }
        }

        $related_services = [];
        if(count($services)>0){
            foreach($services as $as){
                array_push($related_services, $as->id);
            }
        }

        $brands = Brand::all();

        $previous = session()->get('previous_url');

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'attributes' => $attributes,
            'services' => $apple_services,
            'res_products' => $res_products,
            'res_assessories' => $res_assessories,
            'related_accessories' => $related_accessories,
            'related_products' => $related_products,
            'related_services' => $related_services,
            'brands' => $brands,
            'previous' => $previous,
            'product_cat' => $product_category->category_id,
            'product_attributes' => $product_attributes
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

        if (count($data['size']) > 0) {
            $data['size'] = implode(',', $data['size']);
        }

        $data['slug'] = str_replace(' ', '-', $request->input('name'));

        if ($request->hasFile('cover')) {
            $file = $request->cover;

            $file_name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/storage/products/', $file_name);

            // $file->move(public_path(). '/storage/products/', time().$file->getClientOriginalName());   
            $data['cover'] = 'products/' . $file_name;
        }

        // $data['user_id'] = Auth::user()->id;

        Product::where('id', $id)->update($data);

        if ($request->hasFile('image')) {
            $images = $request->image;
            foreach ($images as $img) {
                $newImage = new ProductImage;

                $file = $img;

                $file_name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/storage/products/', $file_name);

                // $file->move(public_path(). '/storage/products/', time().$file->getClientOriginalName());   
                $newImage->src = 'products/' . $file_name;

                $newImage->product_id = $product->id;
                $newImage->priority = '1';

                $newImage->save();
            }
        }

        if ($request->has('categories')) {
            DB::table('category_product')->where('product_id', $id)->delete();
            foreach ($request->categories as $cat) {

                $proCat = DB::table('category_product')->insert([
                    'product_id' => $product->id,
                    'category_id' => $cat
                ]);
            }
        }

        if (!empty($data['size']) and count($sizes) > 0) {

            foreach ($sizes as $key => $value) {

                $newData = new ProductSize;

                $newData->product_id = $product->id;
                $newData->product_size = $value;
                $newData->product_price = $prices[$key];

                $newData->save();
            }
        }

        if (!empty($request->weights[0])) {

            foreach ($weights as $key => $value) {

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

        ProductImage::where('product_id', $id)->delete();

        DB::table('category_product')->where('product_id', $id)->delete();

        $product->delete();

        return redirect()->route('admin.products.index')->with('message', 'Delete successful');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function getMoreFields(Request $request)
    {

        $id = $request->id;

        return view('admin.products.sizes', compact('id'));
    }


    public function deleteSize($id)
    {
        ProductSize::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Size removed successfully');
    }

    public function getMoreWeightFields(Request $request)
    {

        $id = $request->id;

        return view('admin.products.weights', compact('id'));
    }


    public function deleteWeight($id)
    {
        ProductWeight::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Size removed successfully');
    }




    public function removeThumbnail($id)
    {
        ProductImage::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Image removed successfully');
    }


    public function getDetail(Request $request)
    {
        $product = Product::find($id);

        $sku = $product->sku;

        return response()->json(['sku' => $sku]);
    }

    public function updateProductBrand()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $brand = Brand::where('name', $product->brand_id)->first();
            if (!empty($brand)) {
                $product->update([
                    'brand_id' => $brand->id
                ]);
            }
        }
    }


    public function getDump()
    {
        return view('admin.products.dump');
    }

    public function getSkuCode(Request $request)
    {
        // $data = $request->all();

        $cat = Category::find($request->cat_id);
        $datas = str_replace(' ', ',', $cat->name);

        $code = '';

        // var_dump($data); die;
        $data = explode(',', $datas);

        // var_dump($data); die;

        $len = count($data);
        // echo $len;

        if ($len == 1) {
            $code = strtoupper(substr($datas, 0, 3));
        } else {
            for ($i = 0; $i < $len; $i++) {
                $code .= strtoupper(substr($data[$i], 0, 1));
            }
        }

        //  echo $code;

        $check = Product::where('sku', 'LIKE', $code . '%')->count();
        //  echo $check; die;
        $check = $check + 1;
        $code = $code . "000" . $check;
        echo $code;
    }





    public function getReviews()
    {
        $products = ProductReview::distinct('product_id')->select('product_id')->paginate('50');

        // var_dump($products); die;

        return view('admin.products.review_list', compact('products'));
    }


    public function getReviewsDetail($id)
    {
        $reviews = ProductReview::where('product_id', $id)->get();


        $product = Product::find($id);

        // var_dump($products); die;

        return view('admin.products.review_detail', compact('reviews', 'product'));
    }

    public function updateReviewsStatus($id)
    {


        $product = ProductReview::find($id);

        $status = 1;
        if ($product->status == 1) {
            $status = 0;
        }

        $product->status = $status;

        $product->update();

        // var_dump($products); die;

        return redirect()->back()->with('message', 'Status updated successfully');
    }


    public function variantsList(Request $request, $product_id)
    {

        $product = Product::find($product_id);
        if (isset($_GET['type']) && $_GET['type'] == 'Storage') {
            try {

                $list = DB::table('attribute_value_product_attribute')
                    ->JOIN('attribute_values', 'attribute_values.id', 'attribute_value_product_attribute.attribute_value_id')
                    ->where('attribute_value_product_attribute.attribute_id', 3)
                    ->where('attribute_value_product_attribute.product_id', $product_id)
                    ->get(['attribute_value_product_attribute.*', 'attribute_values.value']);
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }
        }

        return view('admin.products.attributes-list', [
            'attributes' => $list,
            'product_id' => $product_id,
            'type' => 'Storage',
            'product' => $product
        ]);
    }

    public function colorsList(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        try {
            $ids = [];

            $products = DB::table('product_images')->where('storage_id',$_GET['type_id'])->where('product_id',$product_id)->select('color_id')->distinct()->get();

            foreach($products as $pro){
                array_push($ids, $pro->color_id);
            }

            $list = DB::table('attribute_values')
            ->whereIn('id', $ids)
            ->get();

        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        return view('admin.products.colors-list', [
            'colors' => $list,
            'product_id' => $product_id,
            'type' => $_GET['type'],
            'type_id' => $_GET['type_id'],
            'product' => $product
        ]);

    }

    
    public function addColorImages(Request $request, $product_id, $color_id)
    {
        $product = Product::find($product_id);
        
        try {
            $images = DB::table('product_images')
            ->JOIN('attribute_values', 'attribute_values.id', 'product_images.color_id')
            ->where('product_images.storage_id', $_GET['type_id'])
            ->where('product_images.color_id', $color_id)
            ->where('product_images.product_id', $product_id)
            ->get(['attribute_values.code', 'attribute_values.value', 'product_images.src','product_images.id','product_images.status']);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
        // dd($images);
        
        return view('admin.products.product-images', [
            'images' => $images,
            'product_id' => $product_id,
            'color_id' => $color_id,
            'type_id' => $_GET['type_id'],
            'product' => $product
        ]);
    }


    public function addVariants(Request $request, $product_id)
    {
        // print_r(1); die;
        $product = Product::find($product_id);
        if (isset($_GET['type']) && $_GET['type'] != '') {
            try {
                $storage = DB::table('attribute_values')
                    ->JOIN('attributes', 'attributes.id', 'attribute_values.attribute_id')
                    ->where('attributes.name', $_GET['type'])
                    ->get(['attribute_values.id', 'attribute_values.value']);
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }
        }

        return view('admin.products.create-attributes', [
            'attributes' => $storage,
            'product_id' => $product_id,
            'type' => $_GET['type'],
            'product' => $product
        ]);
    }

    public function addColorVariants(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        if (isset($_GET['type']) && $_GET['type'] != '') {
            try {
                $storage = DB::table('attribute_values')
                ->JOIN('attributes', 'attributes.id', 'attribute_values.attribute_id')
                ->where('attributes.name', $_GET['type'])
                ->get(['attribute_values.id', 'attribute_values.value']);
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }
        }

        return view('admin.products.create-attributes-color', [
            'attributes' => $storage,
            'product_id' => $product_id,
            'type' => $_GET['type'],
            'product' => $product,
            'type_id' => $_GET['type_id']
        ]);
    }

    public function storeVariants(Request $request, $product_id)
    {

        $data = $request->except('_method', '_token', 'type');

        if (isset($_GET['type']) && $_GET['type'] == 'Storage') {
            $data['attribute_id'] = 3;
            $data['product_id'] = $product_id;
            try {
                DB::table('attribute_value_product_attribute')->insert($data);
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }
            return redirect('admin/variants/' . $product_id . '?type=' . $_GET['type'])->with('message', 'Variant added successfully');
        } else if (isset($_GET['type']) && $_GET['type'] == 'Color') {
            $data['attribute_id'] = $_GET['type_id'];
            $data['product_id'] = $product_id;
            try {
                DB::table('attribute_value_product_attribute')->insert($data);
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }
            return redirect('admin/variants/' . $product_id . '?type=' . $_GET['type'])->with('message', 'Variant added successfully');
        }
    }

    public function storeColorVariants(Request $request, $product_id)
    {
        
        $data = $request->except('_method', '_token', 'type', 'type_id');
        $images = $request->images;
        
        if ($request->hasFile('images')) {
            foreach ($images as $img) {
                $newImage = new ProductImage;
                
                $file = $img;

                $file_name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/storage/products/', $file_name);

                // $file->move(public_path(). '/storage/products/', time().$file->getClientOriginalName());   
                $newImage->src = 'products/' . $file_name;

                $newImage->product_id = $product_id;
                $newImage->priority = 1;
                $newImage->status = 1;
                $newImage->storage_id = $_GET['type_id'];
                $newImage->color_id = $data['attribute_value_id'];

                // dd($newImage);
                try {
                    $newImage->save();
                } catch (\Throwable $e) {
                    dd($e->getMessage());
                }

            }
        }
            return redirect('admin/colors/' . $product_id . '?type=' . $_GET['type'] . '&type_id=' . $_GET['type_id'])->with('message', 'Variant added successfully');
        
    }

    public function storeColorImages(Request $request, $product_id, $color_id)
    {
        
        $data = $request->except('_method', '_token', 'type', 'type_id');
        $images = $request->images;
        
        if ($request->hasFile('images')) {
            foreach ($images as $img) {
                $newImage = new ProductImage;
                
                $file = $img;

                $file_name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/storage/products/', $file_name);

                // $file->move(public_path(). '/storage/products/', time().$file->getClientOriginalName());   
                $newImage->src = 'products/' . $file_name;

                $newImage->product_id = $product_id;
                $newImage->priority = 1;
                $newImage->status = 1;
                $newImage->storage_id = $_GET['type_id'];
                $newImage->color_id = $color_id;

                // dd($newImage);
                try {
                    $newImage->save();
                } catch (\Throwable $e) {
                    dd($e->getMessage());
                }

            }
        }
            return redirect('admin/colors/' . $product_id . '/add-images/' . $color_id . '?type=' . $_GET['type'] . '&type_id=' . $_GET['type_id'])->with('message', 'Image added successfully');
        
    }

    public function getAttributes()
    {
        $attributes = Attribute::get(['id', 'name']);
        return response()->json($attributes);
    }
    public function getPrelaunchProducts()
    {
        $preLaunchProducts = Product::where('is_prelaunched',1)->select(['id','name','cover','sku','prelaunch_price','status'])->paginate(20);
        return view('admin.products.prelaunchlist', [
            'preLaunchProducts' => $preLaunchProducts
        ]);
    }
    public function removeFromPrelaunchProductList($product_id)
    {   
    Product::where('id',$product_id)->update(['is_prelaunched'=>0]);
    $preBookedOrders=DB::table("order_product")->where('product_id',$product_id)->get();
    foreach( $preBookedOrders as $bookedOrder){
        $customerDetail = DB::table('orders')
                ->JOIN('users', 'users.id', 'orders.customer_id')
                ->where('orders.id',$bookedOrder->order_id)
                ->first(['users.email','users.name','users.id']);
                try {
                    $productDetail= Product::join('attribute_value_product_attribute', 'product_id', 'products.id')
                    ->join('attribute_values', 'attribute_value_product_attribute.attribute_value_id', 'attribute_values.id')
                    ->where('attribute_values.value',$bookedOrder->storage)
                    ->where('products.id',$bookedOrder->product_id)
                    ->first(['products.id','products.name as product_name','attribute_value_product_attribute.price']);
                       } catch (\Throwable $e) {
                    dd($e->getMessage());
                }
      
        $data=[
                'name' =>  $customerDetail->name,
                'payment1'=>$bookedOrder->prebooking_amount,
                'payment2' => $productDetail->price - $bookedOrder->prebooking_amount,
                'product_name'=> $productDetail->product_name
        ];

            $order = DB::table('orders')->where('id',$bookedOrder->order_id)->first();
            // $order= json_encode($order);

            $paymentVariable = [
                "merchant_data" => [
                    "merchant_id" => env('MID'),
                    "merchant_access_code" => env('ACCESS_CODE'),
                    "merchant_return_url" => env('RETURN_URL'),
                    "unique_merchant_txn_id" => "PineLabs". uniqid()
                ],
                "customer_data" => [
                    "customer_id" => $customerDetail->id,
                    "email_id" => $customerDetail->email ?? '',
                    "first_name" =>  $customerDetail->name ?? '',
                ],
                "payment_data" => [
                    "amount_in_paisa" => $data['payment2'] * 100 ?? 0
                ],
                "txn_data" => [
                    "navigation_mode" => 2,
                    "payment_mode" => "1,3",
                    "transaction_type" => 1
                ],
                "udf_data" => [
                    "udf_field_1" => "prebooked_".$bookedOrder->id,
                    "udf_field_2" => $order->id . " Test txn " . rand('1000000', '999999999'),
                    "udf_field_3" => rand('1000000', '999999999') . $order->id,
                    "udf_field_4" => "orderId_" . $order->id
                ]
            ];
        $baseData = base64_encode(json_encode($paymentVariable));
        $hmac_digest = hash_hmac("sha256",  $baseData, pack("H*", env('SECRET_CODE')), false);

        $vars = http_build_query(array('REQUEST' => $baseData));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://uat.pinepg.in/api/v2/accept/payment");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);  //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $headers = [
                'X-VERIFY: ' .  strtoupper($hmac_digest),
                'Content-Type: application/x-www-form-urlencoded'
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $server_output = curl_exec($ch);

            if (curl_errno($ch)) {
                print "Error: " . curl_error($ch);
                exit();
            }

            curl_close($ch);

            $resp_server = json_decode($server_output);

            $resp_server = json_decode($server_output);

            if($resp_server->response_message == 'SUCCESS')
                $data['payment_link']=$resp_server->redirect_url;
            

            Mail::send(
                'mails.prelaunch_paymentlink',
                ['data'=>$data],
                function ($m) use ($customerDetail) {
                    $m->from(env('MAIL_USERNAME'), env('APP_NAME'));
    
                    $m->to($customerDetail->email,$customerDetail->name)->subject('Order Payment link');
                }
            );               
    };
   return redirect('admin/prelaunchProducts')->with('message','Product launched successfully');
    }
}
