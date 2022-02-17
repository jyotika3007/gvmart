<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\RegisteredShop\RegisteredShop;
use App\Shop\ShopCategory\ShopCategory;
use App\Shop\Booking\Booking;
use App\Shop\Brands\Brand;
use App\Shop\Products\Product;
use App\Shop\Promocodes\ Promocode;
use App\Shop\ProductReviews\ProductReview;
use App\Shop\Categories\Category;
use App\Shop\Wishlist\Wishlist;
use App\Shop\SearchHistory\SearchHistory;
use App\Shop\Employees\Employee;
use App\Shop\Addresses\Address;
use App\Shop\ProductSize;
use App\Shop\ProductWeight;
use App\Shop\Orders\Order;
use App\Shop\OrderStatuses\OrderStatus;
use Illuminate\Http\UploadedFile;
use App\User;
use DB, Auth;
use Mail;
use StdClass;

class TestViewController extends Controller
{
    // public function getTestMail(){
    //     $user = new StdClass;
    //     $user->email = 'jyotikasethi3007@gmail.com';
    //     $user->name = 'Jyotika Sethi';
    //      Mail::send('mails.test',['user' => $user],
    //              function ($m) use ($user) {
    //                  $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

    //                  $m->to($user->email, $user->name)->subject('Test Mail');
    //              });
    // }
    
    public function blogDetail(){
    	return view('front.blog_detail');
    }

    public function bill(){
    	return view('front.bill');
    }

    public function faq(){
        return view('front.faq');
    }

    public function career(){
    	return view('front.career');
    }
    
    public function checkout(){
    	return view('front1.checkout');
    }
    
    public function dashboard(){

        $page = 'myOrders';
        $orders = array();
        // $orders_list = Order::where('customer_id',auth()->user()->id)->where('order_status_id','<=',5)->orderBy('id','DESC')->get();
        $orders_list = Order::where('customer_id',auth()->user()->id)->orderBy('id','DESC')->get();
        $i = 0;

        $order_statuses = OrderStatus::all() ;

        if($orders_list)
        {
            foreach($orders_list as $order){
                    $orders[$i]['order'] = $order;

                    $items = DB::table('order_product')->JOIN('products','products.id','order_product.product_id')->where('order_product.order_id',$order->id)->select('products.cover','products.description','products.slug','order_product.*')->get();

                    $orders[$i]['items'] = $items;

                    $billing_address = Address::where('id',$order->address_id)->first();
                    $orders[$i]['billing_address'] = $billing_address;

                    $delivery_address = Address::where('id',$order->delivery_address)->first();
                    $orders[$i]['delivery_address'] = $delivery_address;

                    $shop = RegisteredShop::where('id',$order->user_id)->first();


                    $orders[$i]['shop_detail'] = $shop ?? '';

                    // var_dump($orders[$i]['shop_detail']->cover); die;

$i++; 

            }
        }

       

        $addresses = Address::where('customer_id',auth()->user()->id)->get();

    	$page = 'dashboard';
    	return view('front.dashboard_overview',compact('page','addresses','orders','order_statuses'));
    }
    
    public function forgotPassword(){
    	return view('front.forgot_password');
    }

    public function connectWithUs(){
        $product_based = ShopCategory::where('category','Product Based')->get();
        $service_based = ShopCategory::where('category','Service Based')->get();
        return view('front.connect_with_us',compact('product_based','service_based'));
    }
    
    public function myAddress(){
        $page = 'myAddress';
        $addresses = Address::where('customer_id',auth()->user()->id)->get();

        // var_dump($addresses); die;
        return view('front.my_addresses',compact('page','addresses'));
    }
    
    public function myOrders(){
        $page = 'myOrders';
        $orders = array();
        $orders_list = Order::where('customer_id',auth()->user()->id)->where('order_status_id','<=',5)->orderBy('id','DESC')->get();
        $i = 0;

        $order_statuses = OrderStatus::limit(5)->get() ;

        if($orders_list)
        {
            foreach($orders_list as $order){
                    $orders[$i]['order'] = $order;

                    $items = DB::table('order_product')->JOIN('products','products.id','order_product.product_id')->where('order_product.order_id',$order->id)->select('products.cover','products.description','products.slug','order_product.*')->get();

                    $orders[$i]['items'] = $items;

                    $billing_address = Address::where('id',$order->address_id)->first();
                    $orders[$i]['billing_address'] = $billing_address;

                    $delivery_address = Address::where('id',$order->delivery_address)->first();
                    $orders[$i]['delivery_address'] = $delivery_address;

                    $shop = RegisteredShop::where('id',$order->user_id)->first();


                    $orders[$i]['shop_detail'] = $shop;

                    // var_dump($orders[$i]['shop_detail']->cover); die;

$i++; 

            }
        }

        // var_dump($orders); die;
        return view('front.my_orders',compact('page','orders','order_statuses'));
    }
    
    public function myBookings(){
        $page = 'myBookings';

        $bookings = Booking::where('customer_email',auth()->user()->email)->orderBy('created_at','DESC')->get();

        // var_dump($bookings); die;

        return view('front.my_bookings',compact('page','bookings'));
    }
    
    public function myRewards(){
        $page = 'myRewards';
        return view('front.my_rewards',compact('page'));
    }
    
    public function myWallet(){
        $page = 'myWallet';
        return view('front.my_wallet',compact('page'));
    }
    
    public function myWishlist(){
        $page = 'myWishlist';

        if(!Auth::user()){
            return redirect()->back()->with('wishlistLogin','Please First Login');
        }
        $products = Wishlist::join('products','products.id','wishlists.product_id')->where('wishlists.user_id',auth()->user()->id)->select('products.*')->get();

        return view('front.my_wishlist',compact('page','products'));
    }
    
    public function offers(){
    	return view('front.offers');
    }
    
    public function orderPlaced(){
    	return view('front.order_placed');
    }
    
    public function blogs(){
    	return view('front.our_blogs');
    }
    
    public function privacyPolicy(){
    	return view('front.policies');
    }

    public function returnPolicy(){
        return view('front.policies');
    }

    public function tnc(){
        return view('front.policies');
    }
    
    public function productDetail($slug){
        $product = Product::where('slug',$slug)->first();

        $product_sizes = ProductSize::where('product_id',$product->id)->get();
        $product_weights = ProductWeight::where('product_id',$product->id)->get();

        $shop = RegisteredShop::where('user_id',$product->user_id)->first();

        $product_update = Product::where('slug',$slug)->update([
            'click_count' => $product->click_count+1,
        ]);

        if(auth()->check()){
            $check = SearchHistory::where('product_id',$product->id)->where('user_id',auth()->user()->id)->first();

            if(!$check){
                $newData = new SearchHistory;
                $newData->user_id = auth()->user()->id;
                $newData->product_id = $product->id;
                $newData->max_click = 1;
                $newData->save();
            }
            else{
                SearchHistory::where('product_id',$product->id)->where('user_id',auth()->user()->id)->update([
                    'max_click' => $check->max_click+1
                ]);
            }

        }

       $recent_viewed_products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.is_featured',1)->where('products.status',1)->orderBy('products.click_count','DESC')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy('products.click_count','DESC')->distinct('category_product.id')->limit(12)->get();
       
        $tagCategories = Category::join('category_product','category_product.category_id','categories.id')->where('category_product.product_id',$product->id)->select('categories.*')->get();

        $category = DB::table('category_product')->JOIN('categories','categories.id','category_product.category_id')->where('category_product.product_id',$product->id)->select('categories.*')->first();
        // var_dump($category); die;
        $more_liked = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.is_featured',1)->where('products.status',1)->where('category_product.category_id',$category->id)->select('products.*','categories.name as category_name','categories.slug as category_slug')->distinct('category_product.id')->limit(12)->get();
        // $more_liked = Product::JOIN('category_product','category_product.product_id','products.id')->where('category_product.category_id',$category->id)->get();

       
        $productReview = ProductReview::where('product_id',$product->id)->where('status',1)->avg('product_rating');
        if(!$productReview)
            $productReview=0;

        $reviews = ProductReview::where('product_id',$product->id)->where('status',1)->get();
        $totalReviews = ProductReview::where('product_id',$product->id)->where('status',1)->count();

        $sizes = ProductSize::where('product_id',$product->id)->get();

        $weights = ProductWeight::where('product_id',$product->id)->get();

        $images = DB::table('product_images')->where('product_id',$product->id)->get();

        // var_dump($featured_products); die;

        return view('front.productDetail',compact('product','product_sizes','product_weights','more_liked','category','shop','images','tagCategories','sizes','weights','productReview','reviews','totalReviews','recent_viewed_products'));
    }
    
    public function requestProduct(){
    	return view('front.request_product');
    }


    public function shopbyBrand(Request $request, $slug){

               $brandId = explode('@',$slug)[1];
$checkId = Brand::where('id',$brandId)->first();
    $subcat = $checkId->id;

    $keyword = $request->product_keyword ?? '';
    $max_price = Product::where('status','1')->max("price");

    $cartproducts = array();
    $color = array();

    $brand = array();
    $material = array();
    $size = array();
    $quantity = array();
    $cnt = 0;
    if(session()->get('cart') != null){
      foreach(session()->get('cart') as $cart){
        $cartproducts[$cnt] = Product::where('id',$cart->product_id)->first();
        $quantity[$cnt] = $cart->quantity;
        $cnt++;
      }
    }
    else{
      $cartproducts = null;
      $quantity = 0;
    }

    $lastproduct = Product::where('status','1')->orderBy('created_at','desc')->first();


    $maincategory = Category::where('parent_id',NULL)->where('status','1')->get();

    foreach($maincategory as $row){
      $count=0;
      // $count=Product::where('parent_id',$row->id)->where('status','1')->count();
      $category = Category::where('parent_id',$row->id)->where('status','1')->get();
      if($category){
        foreach($category as $col){
          // $count+=Product::where('parent_id',$col->id)->where('status','1')->count();
          $subcategory = Category::where('parent_id',$col->id)->where('status','1')->get();
          if($subcategory){
            foreach($subcategory as $set){
              // $count+=Product::where('parent_id',$set->id)->where('status','1')->count();
            }
          }
        }

      }
    }

    $searched_products = array();
    $cat_ids = array();

    $total = array();
    $i=0;
    // $sec = Category::where('slug',$slug)->where('status','1')->first();
    // $productCategory = $sec ;
    // $cat_ids[0] = Category::where('id',$sec->id)->where('status','1')->first();

    $cid = 1;
    $cnt_pro = 0;
    $count_catpro = 0;
    // $idss = Category::where('parent_id',$sec->id)->where('status','1')->get();
    // if($idss != null){
    //   foreach($idss as $ids){
    //     $count_catpro = 0;
    //     $cat_ids[$cid++] = $ids;
    //     $idsss = Category::where('parent_id',$ids->id)->where('status','1')->get();
    //     // $count_catpro+=Product::where('parent_id',$ids->id)->where('status','1')->count();
    //     if($idsss != null){
    //       foreach($idsss as $ds){
    //         $cat_ids[$cid++] = $ds;
    //         // $count_catpro+=Product::where('parent_id',$ds->id)->where('status','1')->count();
    //       }
    //       if($count==0)
    //         $total[$i++] = 0;
    //       else
    //         $total[$i++] = $count_catpro;
    //     }
    //   }
    // }

    // foreach ($total as $t){
    //   echo $t." / ";
    // }

   
      // $products = Product::where('parent_id',$cat_ids[$j]->id)->where('status','1')->get();
      $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.brand_id',$brandId)->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->get();
      if($products != null){
        foreach($products as $pro){
          $searched_products[$cnt_pro] = $pro;
          $color[$cnt_pro] = $pro->color ?? '';
          $brand[$cnt_pro] = $pro->brand_id ?? '';
          $material[$cnt_pro] = $pro->material ?? '';
          $cnt_pro++;
        }
      }
   

    $top_rated_products = ProductReview::JOIN('products','products.id','product_reviews.product_id')->orderBy('created_at','DESC')->orderBy('product_rating','DESC')->select('products.*','product_reviews.product_rating')->limit(3)->get();

    $allCategories = Category::where('status',1)->where('parent_id',NULL)->get();

    $colors = array_filter($color);
    $colors= array_unique($colors);

    // var_dump($colors); die;
    
    $all_brands = Brand::where('status',1)->get();
    
    foreach($all_brands as $br){
        $brands[]  = $br->id;
    }

    $brands = array_filter($brands);
    $brands = array_unique($brands);

    // var_dump($brands); die;

    $materials = array_filter($material);
    $materials = array_unique($materials);

    // shuffle($searched_products);

    $brandSlug = $slug;

    $brand = $checkId;

    // var_dump($searched_products); die;
    
    $slug = explode('@',$slug)[1];

    return view('front.category_products',compact('maincategory','searched_products','max_price','cartproducts','quantity','slug','colors','brands','materials','allCategories','top_rated_products','brandSlug','brand','brands'));

    }


    public function shopbyCategory(Request $request, $slug){

        
$checkId = Category::where('slug',$slug)->first();
    $subcat = $checkId->id;

    $keyword = $request->product_keyword ?? '';
    $max_price = Product::where('status','1')->max("price");

    $cartproducts = array();
    $color = array();

    $brand = array();
    $material = array();
    $size = array();
    $quantity = array();
    $cnt = 0;
    if(session()->get('cart') != null){
      foreach(session()->get('cart') as $cart){
        $cartproducts[$cnt] = Product::where('id',$cart->product_id)->first();
        $quantity[$cnt] = $cart->quantity;
        $cnt++;
      }
    }
    else{
      $cartproducts = null;
      $quantity = 0;
    }

    $lastproduct = Product::where('status','1')->orderBy('created_at','desc')->first();


    $maincategory = Category::where('parent_id',NULL)->where('status','1')->get();

    foreach($maincategory as $row){
      $count=0;
      // $count=Product::where('parent_id',$row->id)->where('status','1')->count();
      $category = Category::where('parent_id',$row->id)->where('status','1')->get();
      if($category){
        foreach($category as $col){
          // $count+=Product::where('parent_id',$col->id)->where('status','1')->count();
          $subcategory = Category::where('parent_id',$col->id)->where('status','1')->get();
          if($subcategory){
            foreach($subcategory as $set){
              // $count+=Product::where('parent_id',$set->id)->where('status','1')->count();
            }
          }
        }

      }
    }

    $searched_products = array();
    $cat_ids = array();

    $total = array();
    $i=0;
    $sec = Category::where('slug',$slug)->where('status','1')->first();
    $productCategory = $sec ;
    $cat_ids[0] = Category::where('id',$sec->id)->where('status','1')->first();

    $cid = 1;
    $cnt_pro = 0;
    $count_catpro = 0;
    $idss = Category::where('parent_id',$sec->id)->where('status','1')->get();
    if($idss != null){
      foreach($idss as $ids){
        $count_catpro = 0;
        $cat_ids[$cid++] = $ids;
        $idsss = Category::where('parent_id',$ids->id)->where('status','1')->get();
        // $count_catpro+=Product::where('parent_id',$ids->id)->where('status','1')->count();
        if($idsss != null){
          foreach($idsss as $ds){
            $cat_ids[$cid++] = $ds;
            // $count_catpro+=Product::where('parent_id',$ds->id)->where('status','1')->count();
          }
          if($count==0)
            $total[$i++] = 0;
          else
            $total[$i++] = $count_catpro;
        }
      }
    }

    // var_dump($cat_ids); die;

    // foreach ($total as $t){
    //   echo $t." / ";
    // }

    for($j=0 ; $j<$cid ; $j++){
        // echo $cat_ids[$j]->id; die;
      // $products = Product::where('parent_id',$cat_ids[$j]->id)->where('status','1')->get();
      $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('category_product.category_id',$cat_ids[$j]->id)->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->get();
      if($products != null){
        foreach($products as $pro){
          $searched_products[$cnt_pro] = $pro;
          $color[$cnt_pro] = $pro->color ?? '';
          $brand[$cnt_pro] = $pro->brand_id ?? '';
          $material[$cnt_pro] = $pro->material ?? '';
          $cnt_pro++;
        }
      }
    }


    $searched_products = array_unique($searched_products);

    // var_dump($searched_products); die;

    $top_rated_products = ProductReview::JOIN('products','products.id','product_reviews.product_id')->orderBy('created_at','DESC')->orderBy('product_rating','DESC')->select('products.*','product_reviews.product_rating')->limit(3)->get();

    $allCategories = Category::where('status',1)->where('parent_id',NULL)->get();

    $colors = array_filter($color);
    $colors= array_unique($colors);

    // var_dump($colors); die;

    $brands = array_filter($brand);
    $brands = array_unique($brands);

    // var_dump($brands); die;

    $materials = array_filter($material);
    $materials = array_unique($materials);

    // shuffle($searched_products);

    $catSlug = $slug;

    // var_dump($searched_products); die;

    return view('front.category_products',compact('maincategory','searched_products','cat_ids','total','lastproduct','max_price','cartproducts','quantity','slug','colors','brands','materials','productCategory','allCategories','top_rated_products','catSlug'));

       
    }
    
    public function shopGrid($slug){


        $shop = RegisteredShop::where('slug',$slug)->first();

        // var_dump($shop); die; 

        $shop_category = ShopCategory::where('id',$shop->category_ids)->first();

        session(['shop_slug' => $slug ,'shop_name'=> $shop->shop_name ]);
   
// echo $shop->user_id; die;

        $allProducts = array();

        $topCategories = Category::where('parent_id',NULL)
        ->where('status','1')
        ->where('user_id',$shop->user_id)
        ->orderBy('id','DESC')
        ->limit(4)
        ->get();

        // var_dump($topCategories); die;


        if(!empty($topCategories)){

            foreach($topCategories as $category){
                $i=0;
                $cat = array();
                $cat[$i] = $category->id;
                $item = array();
                $cat2 = Category::where('parent_id',$category->id)->where('status',1)->get();
                if(!empty($cat2)){
                    foreach($cat2 as $cate2){
                        $cat[] = $cate2->id;
                        $cat3 = Category::where('parent_id',$cate2->id)->where('status',1)->get();
                        if(!empty($cat3)){
                            foreach($cat3 as $cate3){
                                $cat[] = $cate3->id;

                            }
                        }
                    }
                }
                $product = Product::join('category_product','category_product.product_id','products.id')
                ->where('products.status','1')->whereIn('category_product.category_id',$cat)->orderBy('created_at','DESC')->select('products.*')->distinct('products.id')->limit(8)->get();

                if(count($product)>0){
                    $item['products']= $product;
                    $item['category']= $category;
                    $allProducts[] = $item;
                    $i++;
                }
            }
        }



// var_dump($categoryProducts); die;







        // var_dump($shop); die;
        return view('front.shop_grid', compact(
            'shop',
            'shop_category',
            'topCategories',
            'allProducts'
        ));
    }

    public function shopService($slug){



        $shop = RegisteredShop::where('slug',$slug)->first();
        $shop_category = ShopCategory::where('id',$shop->category_ids)->first();

        $check = auth()->check();

        // var_dump($check); die;

        // var_dump($shop); die;
        return view('front.shop_service', compact(
            'shop',
            'shop_category',
            'check'
        ));
    }

    public function submitServiceQuery(Request $request){
        $data = $request->all();
        
        $newData = new Booking;

        $newData->shop_id = $data['shop_id'];
        $newData->shop_name = $data['shop_name'];
        $newData->customer_name = $data['customer_name'];
        $newData->customer_email = $data['customer_email'];
        $newData->customer_contact = $data['customer_contact'];
        $newData->customer_house_no = $data['customer_house_no'];
        $newData->customer_mohalla = $data['customer_mohalla'];
        $newData->customer_near_by = $data['customer_near_by'];
        $newData->customer_city = $data['customer_city'];
        $newData->customer_state = $data['customer_state'];
        $newData->customer_pincode = $data['customer_pincode'];
        $newData->customer_service_query = $data['customer_service_query'];
        $newData->requirement = $data['requirement'];
        $newData->booking_date = date('Y-m-d');

        $newData->save();
        
        $shop = RegisteredShop::find($data['shop_id']);
        
        $data['admin_email'] = 'Riddhi.lic@gmail.com';
        $data['admin_name'] = 'GV Mart';
        $data['booking_date'] = date('Y-m-d');
         Mail::send('mails.service_booking',['data' => $data , 'type' => 'admin', 'shop' => $shop],
                 function ($m) use ($data) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($data['admin_email'], $data['admin_name'])->subject('Service Booking Request.');
                 });
                 
                 
        Mail::send('mails.service_booking',['data' => $data , 'type' => 'user' , 'shop' => $shop],
                 function ($m) use ($data) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($data['customer_email'], $data['customer_name'])->subject('Service Booking Request.');
                 }); 
                 
                 
        Mail::send('mails.service_booking',['data' => $data , 'type' => 'vendor' , 'shop' => $shop],
                 function ($m) use ($shop) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($shop->email, $shop->shop_name)->subject('Service Booking Request.');
                 });
                 
        return redirect()->back()->with('serviceSuccess','Thank you. Your Query submitted successfully. We will contact you soon.');

    }



    public function postShopRegistration(Request $request){



       $data = $request->except('_token', '_method','password');
       $slug = $request->input('shop_name')." ".$request->input('city');
       $data['slug'] = str_replace(' ', '-', $slug);

       $shop_arr = explode(' ',$data['shop_name']);
       $shop_code = 'Ba/';
       foreach($shop_arr as $s)
       {
        $shop_code = $shop_code.substr($s,0,1);
    }

    $data['registration_date'] = date('d-m-Y');
    $data['activation_date'] = '';

    $data['shop_code'] = str_replace(' ','',$shop_code).'-'.rand(999, 100000);
    
    $category = ShopCategory::where('id',$data['category_ids'])->first();

$data['category_name'] = $category->category_name ?? '';

    
    // var_dump($data); die;

    if ($request->hasFile('cover')) 
    {
       $file=$request->cover;
       $file->move(public_path(). '/storage/registered_shops/', time().$file->getClientOriginalName());   
       $data['cover'] = 'registered_shops/'.time().$file->getClientOriginalName();
   }

   $employee = new User;

   $employee->name = $data['shop_name'];
   $employee->email = $data['email'];
   $employee->password = \Hash::make($request->input('password'));
   $employee->status = '0';
   $employee->account_status = 'Ban';
   $employee->user_role = 'vendor';

   $employee->save();
   
   $data['slug'] =  $data['slug'].'-'.$last_uid->id;

   $last_uid = User::get()->last();

   $data['user_id'] = $last_uid->id;
   $data['registered_by'] = 'vendor';

   $newData = RegisteredShop::create($data);

   $newRole = DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => $data['user_id'],
            'user_type' => 'App\Shop\Employees\Employee'
        ]);


 $data['admin_email'] = 'Riddhi.lic@gmail.com';
        $data['admin_name'] = 'GV Mart';
         Mail::send('mails.registeration_shop',['data' => $data , 'type' => 'admin'],
                 function ($m) use ($data) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($data['admin_email'], $data['admin_name'])->subject('Form sent successfully.');
                 });
                 
                
        Mail::send('mails.registeration_shop',['data' => $data , 'type' => 'vendor'],
                 function ($m) use ($data) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($data['email'], $data['shop_name'])->subject('Form sent successfully.');
                 });


   return redirect()->back()->with('shopSuccess', 'Request send successfully. Our team will contact you soon.');


}


public function updateAccount(Request $request){
    $data = $request->all();

    // var_dump($data); die;

    if($data['password'] == $data['confirm_password']){
        $user =User::find($data['id']);

        $user->name = $data['name1']." ".$data['name2'] ?? '';
        $user->mobile = $data['mobile'] ?? '';
        $user->password = \Hash::make($data['password']);

        $user->update();

        return redirect()->back()->with('accounts','Account Detail successfully updated');
    }
    else{
        return redirect()->back()->with('message','Password did not match');
    }
}

public function orderDetail($orderId){

        $user_role = \Auth::user()->user_role;
        $order = Order::find($orderId);

       

        $shop = RegisteredShop::where('id',$order->user_id)->first();
        
        $billing_address = Address::where('id',$order->address_id)->first();
        $delivery_address = Address::where('id',$order->delivery_address)->first();

    // var_dump($delivery_address); die;

       
        $items = DB::table('order_product')->JOIN('products','products.id','order_product.product_id')->where('order_product.order_id',$orderId)->select('products.cover','products.description','products.slug','order_product.*')->get();
        // $items = $orderRepo->listOrderedProducts();

        // var_dump($items); die;

$order_statuses = DB::table('order_statuses')->get();
$currentStatus = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
$customer = User::where('id',$order->customer_id)->first();

       

        return view('front.view_order_detail', [
            'order' => $order,
            'items' => $items,
            'customer' => $customer,
            'currentStatus' => $currentStatus,
            'shop' => $shop,
            'billing_address' => $billing_address,
            'delivery_address' => $delivery_address,
            'order_statuses' => $order_statuses
        ]);
}

public function selectPincode(Request $request){
    $data = $request->all();
    
    session()->put('store_pincode',$data['select_pincode']);

    return redirect()->back();
    // return redirect()->route('home');
}

public function applyCoupon(Request $request){
    $data = $request->all();
    $coupon_amount = 0;
    $coupon_code = 0;

    if(session()->get('coupon_amount')){
        $message = 'Only one coupon can apply at one order.';
    }

else{

    $coupon = Promocode::where('id',$data['select_coupon'])->first();
    if($coupon){
            $coupon_amount =  ($coupon->promocode_percent * $data['total_bill'])/100;

            $coupon_code = $coupon->promocode_name ?? '';

            if($coupon_amount > $coupon->promocode_amount){
                $coupon_amount = $coupon->promocode_amount;
                $coupon_amount = floor($coupon_amount);
            }
            $message = 'Coupon Applied Successfully';
    }
    session()->put('coupon_amount',$coupon_amount);
    session()->put('coupon_code',$coupon_code);
}



    return redirect()->back()->with('message',$message);
}


public function remove_coupon(){
    session()->forget('coupon_code');
    session()->forget('coupon_amount');
    return redirect()->back()->with('message' , 'Coupon removed successfully.');
}

public function getCouponDetail(Request $request){
    $data = $request->all();

    $success = 0;

     $coupon = Promocode::where('id',$data['coupon_id'])->first();

     $discount = 'Rs. '.$coupon->min_order_amount.' - '.$coupon->max_order_amount;

     if($data['grand_total']>$coupon->min_order_amount && $data['grand_total']<$coupon->max_order_amount){
        $discount = ($data['grand_total']*$coupon->promocode_percent)/100;
        $success = 1;
     }
     
     return response()->json([
        'success' => $success,
        'discount' => $discount
     ]);

}

public function setDeliveryDate(Request $request){
    $data = $request->all();

   session()->put('delivery_date',$data['del_date']);

   var_dump(session()->get('delivery_date'));

}

public function changeOrderStatus($status, $orderId){
    
    $order = Order::where('id',$orderId)->first();
    
    $customer = DB::table('users')->where('id',$order->customer_id)->first();
    //  var_dump($customer); die;
    
    $message = 'Something went wrong';
    if($status == 'cancel'){
        Order::where('id',$orderId)->update(array('cancel_order'=>1));

        $message = 'Your request to cancel this order has sent send to the admin';
    }
    if($status == 'return'){
        Order::where('id',$orderId)->update(array('return_order'=>1));

        $message = 'Your request to return this order has sent send to the admin';
    }


        $order_products = DB::table('order_product')->where('order_id',$orderId)->get();

        foreach($order_products as $pro)
        {
            $product = Product::where('id',$pro->product_id)->first();
            DB::table('products')->where('id',$pro->product_id)->update([

                'stock_quantity' => $product->stock_quantity+$pro->quantity,
                'purchase_quantity' => $product->purchase_quantity-$pro->quantity

            ]);
        }
        
    //   var_dump($order); die;
        
        Mail::send('mails.orderAction',['user' => $customer, 'order' => $order, 'action' => 'user' ,'msg' => $message],
                 function ($m) use ($customer) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($customer->email, $customer->name)->subject('Order Status');
                 });
                 
                 $customer->admin_email = 'Riddhi.lic@gmail.com';
                 $customer->admin_name = 'GV Mart';
                 
                //  var_dump($customer); die;
 
        Mail::send('mails.orderAction',['user' => $customer, 'order' => $order, 'action' => 'admin' ,'msg' => $message],
                 function ($m) use ($customer) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($customer->admin_email, $customer->admin_name)->subject('Order Status');
                 });

    return redirect()->back()->with('message',$message);


}




 public function getFeedback(){
    	return view('front.feedback');
    }
    
 public function getComplaint(){
    	return view('front.complaint');
    }
    
}



