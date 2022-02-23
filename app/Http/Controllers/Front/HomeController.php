<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Shop\Wishlist\Wishlist;
use App\Shop\Blog\Blog;
use App\Shop\Slider\Slider;
use App\Shop\Products\Product;
use App\Shop\Categories\Category;
use App\Shop\Testimonial\Testimonial;
use App\Shop\Brands\Brand;
use App\Shop\Banners\Banner;
use App\Shop\ShopCategory\ShopCategory;
use DB;

class HomeController
{
        public function old()
    {


        // echo "YEs"; die;

       $sliders = Slider::where('status','1')->where('start_date','<=',date('Y-m-d'))->where('end_date','>=',date('Y-m-d'))->orderBy('priority','ASC')->get();

       $bannerHorizontal = Banner::where('priority','1')->where('status',1)->first();

       $bannerVertical1 = Banner::where('priority','>',1)->orderBy('priority','ASC')->limit(2)->get();

       $bannerVertical2 = Banner::where('priority','>',3)->orderBy('priority','ASC')->limit(3)->get();

       // print_r($bannerVertical2); die;
       // die;

       $brands = Brand::where('status','1')->orderBy('priority','ASC')->get();
       $testimonials = Testimonial::where('status','1')->orderBy('id','DESC')->get();

       $top_categories = Category::where('is_top',1)->where('status','1')->get();

       $featured_products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.is_featured',1)->where('products.status',1)->select('products.*','categories.name as category_name','categories.slug as category_slug')->distinct('category_product.product_id')->limit(20)->get();

       $trending_products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.is_trending',1)->orderBy('products.id','DESC')->select('products.*','categories.name as category_name','categories.slug as category_slug')->distinct('category_product.product_id')->limit(20)->get();

       $top_rated_products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.is_top_rated',1)->where('products.status',1)->select('products.*','categories.name as category_name','categories.slug as category_slug')->distinct('category_product.product_id')->limit(20)->get();

       // var_dump($featured_products); die;

       $sale_products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.sale_price','!=',NULL)->where('products.status',1)->orderBy('products.id','ASC')->select('products.*','categories.name as category_name','categories.slug as category_slug')->distinct('category_product.product_id')->limit(20)->get();

       $best_seller_products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.is_best_seller',1)->orderBy('products.id','DESC')->select('products.*','categories.name as category_name','categories.slug as category_slug')->distinct('category_product.product_id')->limit(20)->get();

        $recent_viewed_products = Product::where('status','1')->orderBy('click_count','DESC')->limit(20)->get();

        $count_recent_viewed_products = Product::where('status','1')->orderBy('click_count','DESC')->count();

        $product_based_services = ShopCategory::where('category','Product Based')
                            ->where('status',1)
                            ->get();
        $service_based_services = ShopCategory::where('category','Service Based')
                            ->where('status',1)
                            ->get();
        $services = ShopCategory::where('status',1)->where('featured',1)->get();       

        return view('front.index',compact(
            'product_based_services',
            'service_based_services',
            'services',
            'recent_viewed_products',
            'count_recent_viewed_products',
            'sliders',
            'top_categories',
            'brands',
            'featured_products',
            'sale_products',
            'best_seller_products',
            'trending_products',
            'top_rated_products',
            'bannerVertical2',
            'bannerVertical1',
            'bannerHorizontal',
            'testimonials'
        ));
    }

    

    public function getBlogs(){

        $recent_articles = Blog::orderBy('created_at','DESC')->where('status','1')->limit('3')->get();
        $blogs = Blog::orderBy('created_at','DESC')->where('status','1')->paginate(10);

$comments = array();
if(count($blogs)>0){

foreach($blogs as $blog){
    $comments[] = DB::table('blog_reviews')->where('blog_id',$blog->id)->count();
}
}


        $bestDeals = Product::where('status','1')->orderBy('created_at','DESC')->limit(5)->get();
        return view('front.blogs',compact('recent_articles','blogs','bestDeals','comments'));
    }

    public function getTaggedBlogs($tag){

        $recent_articles = Blog::orderBy('created_at','DESC')->where('status','1')->limit('3')->get();
        $blogs = Blog::orderBy('created_at','DESC')->where('status','1')->where('tags','LIKE','%'.$tag.'%')->paginate(10);

        $comments = array();
if(count($blogs)>0){

foreach($blogs as $blog){
    $comments[] = DB::table('blog_reviews')->where('blog_id',$blog->id)->count();
}
}

        $bestDeals = Product::where('status','1')->where('name','LIKE','%'.$tag.'%')->orderBy('created_at','DESC')->limit(5)->get();
        return view('front.blogs',compact('recent_articles','blogs','tag','bestDeals','comments'));
    }

    public function getBlogDetail($slug){

        $blog = Blog::where('slug',$slug)->first();
        $tags = array();
        if(!empty($blog->tags))
        $tags = explode(',',$blog->tags);


        $comments = DB::table('blog_reviews')->where('blog_id',$blog->id)->count();

        $reviews = DB::table('blog_reviews')->where('blog_id',$blog->id)->get();
        return view('front.blog-detail',compact('blog','comments','reviews','tags'));
    }

    public function submitReview(Request $request){
        $check = DB::table('blog_reviews')->where('email',$request->email)->first();
            $message = 'Something went wrong';

        if(!empty($check)){
            $message = 'A review is already posted from this email.';
        }
        else{


        $newData = DB::table('blog_reviews')->insert([
            'name' => $request->name ?? '',
            'email' => $request->email ?? '',
            'blog_review' => $request->blog_review ?? '',
            'blog_id' => $request->blog_id ?? '',
        ]);

        $message = 'Your review submitted successfully. Thank you.';
        }
        return redirect()->back()->with('successReview',$message);
            }
            

            public function getWishlist(){
                if(!auth()->check()){
                    redirect()->back()->with('wishlistLogin','Please First Login');
                }
                    $products = Wishlist::join('products','products.id','wishlists.product_id')->where('wishlists.user_id',auth()->user()->id)->select('products.*')->get();

                    return view('front.wishlist',compact('products'));
            }

}
