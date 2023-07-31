<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Banners\Banner;
use App\Shop\Categories\Category;
use App\Shop\Products\Product;

class BannerController extends Controller
{
    public function index()
    {
        $lists = Banner::paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

        return view('admin.banners.list', [
            'banners' => $lists
        ]);
    }

    public function searchList(Request $request)
    {
        $lists = Banner::where('title', 'LIKE', '%' . $request->keyword . '%')->paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

        return view('admin.banners.list', [
            'banners' => $lists,
            'keyword' => $request->keyword
        ]);
    }


    public function create()
    {
        $categories = Category::where('status', '1')->get();
        return view('admin.banners.create', [
            'categories' => $categories
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

        if (!empty($data['category_id'])) {

            $category = Category::where('id', $data['category_id'])->first();
            $data['category_slug'] = $category->slug;
        }

        if ($request->hasFile('cover')) {
            $file = $request->cover;
            $file_ext = explode('.', $file->getClientOriginalName());
            $random = rand(10000, 999999);
            $file->move(public_path() . '/storage/banners/', $random . time() . '.' . $file_ext[count($file_ext) - 1]);
            $data['cover'] = 'banners/' . $random . time() . '.' . $file_ext[count($file_ext) - 1];
        }

        // var_dump($data); die;

        $banner = Banner::create($data);

        return redirect()->route('admin.banners.index')->with('message', 'Create successful');
    }


    public function show(int $id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.show', compact('banner'));
    }


    public function edit(int $id)
    {
        $banner = Banner::find($id);
        $categories = Category::where('status', '1')->get();
        if($banner->category_id != ''){
            $ids = [];
        
            $categories1 = Category::where('id', $banner->category_id)->where('status', 1)->get(['id']);
    
            foreach ($categories1 as $cat) {
                array_push($ids, $cat->id);
                $sub_categories = Category::where('parent_id', $cat->id)->where('status', 1)->get(['id']);
    
                foreach ($sub_categories as $sub_cat) {
    
                    array_push($ids, $sub_cat->id);
                    $child_categories = Category::where('parent_id', $sub_cat->id)->where('status', 1)->get(['id']);
    
                    foreach ($child_categories as $child_cat) {
                        array_push($ids, $child_cat->id);
                    }
                }
            }
    
            $products = Product::JOIN('category_product', 'category_product.product_id', 'products.id')->whereIn('category_product.category_id', $ids)->where('products.status',1)->get(['products.id', 'products.name']);
    }
        else{
            $products = [];
        }

        $previous = session()->get('previous_url');

        return view('admin.banners.edit', [
            'banner' => $banner,
            'categories' => $categories,
            'previous' => $previous,
            'products' => $products
        ]);
    }


    public function update(Request $request, int $id)
    {

        $data = $request->except('_token', '_method');

        if (!empty($data['category_id'])) {

            $category = Category::where('id', $data['category_id'])->first();
        } else {
            $data['category_slug'] = NULL;
        }

        if ($request->hasFile('cover')) {
            $file = $request->cover;
            $file_ext = explode('.', $file->getClientOriginalName());
            $random = rand(10000, 999999);
            $file->move(public_path() . '/storage/banners/', $random . time() . '.' . $file_ext[count($file_ext) - 1]);
            $data['cover'] = 'banners/' . $random . time() . '.' . $file_ext[count($file_ext) - 1];
        }

        $banner = Banner::where('id', $id)->update($data);

        return redirect()->back()->with('message', 'Update successful');
    }


    public function destroy($id)
    {
        $banner = Banner::find($id);

        $banner->delete();

        return redirect()->back()->with('message', 'Delete successful');
    }


    public function removeImage(Request $request)
    {
        return redirect()->back()->with('message', 'Image delete successful');
    }


    public function removeThumbnail(Request $request)
    {
        return redirect()->back()->with('message', 'Image delete successful');
    }

    public function getCategoryProducts(Request $request){
        $data = $request->all();
        $ids = [];
        
        $categories = Category::where('id', $data['category_id'])->where('status', 1)->get(['id']);

        foreach ($categories as $cat) {
            array_push($ids, $cat->id);
            $sub_categories = Category::where('parent_id', $cat->id)->where('status', 1)->get(['id']);

            foreach ($sub_categories as $sub_cat) {

                array_push($ids, $sub_cat->id);
                $child_categories = Category::where('parent_id', $sub_cat->id)->where('status', 1)->get(['id']);

                foreach ($child_categories as $child_cat) {
                    array_push($ids, $child_cat->id);
                }
            }
        }

        $products = Product::JOIN('category_product', 'category_product.product_id', 'products.id')->whereIn('category_product.category_id', $ids)->where('products.status',1)->get(['products.id', 'products.name']);

        return $products;
    }
}
