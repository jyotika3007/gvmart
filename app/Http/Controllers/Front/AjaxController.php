<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\Products\Product;
use App\Shop\ProductImages\ProductImage;
use App\Shop\ProductReviews\ProductReview;
use App\Shop\Brands\Brand;
use App\Shop\ProductSize;
use App\Shop\ProductWeight;
use App\Shop\Categories\Category;
use App\Shop\Wishlist\Wishlist;
use App\Shop\Contact\Contact;
use App\Complaint;
use App\Shop\Cart\Cart;
use App\Shop\RegisteredShop\RegisteredShop;
use App\Shop\Addresses\Address;
use App\User;
use App\Shop\EmailVerification;
use StdClass,DB;
use Mail;

class AjaxController extends Controller
{
    
    public function getUserInvoice($id){
        $order = DB::table('orders')->find($id);
        $billing_address = DB::table('addresses')->where('id',$order->address_id)->first();
        $delivery_address = DB::table('addresses')->where('id',$order->delivery_address)->first();
        
        $customer = User::where('id',$order->customer_id)->first();
        
        $items = DB::table('order_product')->JOIN('products','products.id','order_product.product_id')->where('order_product.order_id',$id)->select('products.cover','products.slug','products.price as mrp','order_product.*')->get();
        
        $shop = '';
        
        
        $currentStatus = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
        
        return view('front.invoice',compact('customer','items','order','billing_address','delivery_address','shop','currentStatus'));
        
    }
    
    public function addToCart(Request $request){
        $cart = new StdClass;

        $cartItem = 0;

        $product_id = $request->id;
        $quantity = $request->quantity ?? '1';
        $price = $request->product_price ?? '';
        $size = $request->product_size ?? '';

        $product = Product::where('id',$product_id)->first();

        $stock_quantity = $product->stock_quantity;

        if($quantity<=$stock_quantity){
            

            if(empty($price)){
                if(!empty($product->sale_price))
                    $price = $product->sale_price;
                else
                    $price = $product->price;
            }

        // echo $price; die;
            if (session()->get('cart') != null){
                $cart = session()->get('cart');
            }
            else {
                $cart = array();
            }

            if (isset($cart[$product_id]->quantity)){
                $cart[$product_id]->quantity = $cart[$product_id]->quantity + $quantity;
                if($cart[$product_id]->quantity>$stock_quantity){
                    return 'No';
                }
                $cart[$product_id]->total_price = $cart[$product_id]->quantity*$cart[$product_id]->unit_price;
                $cart[$product_id]->size = $size ?? $cart[$product_id]->size;
            }
            else{
                $item = new StdClass;
                $item->product_id = $product_id;
                $item->quantity = $quantity;
                $item->unit_price = $price;
                $item->size = $size ?? '';
                $item->total_price = $quantity*$price;
                $cart[$product_id] = $item;

            }

        // if(auth()->check()){
        //     $check = Cart::where('user_id',auth()->user()->id)->where('product_id',$product_id)->first();
        //     if(!$check){
        //         $newCart = new Cart;
        //         $newCart->user_id = auth()->user()->id;
        //         $newCart->product_id = $product->id;
        //         $newCart->quantity = $quantity;
        //         $newCart->unit_price = $price;
        //         $newCart->total_price = $quantity*$price;
        //         $newCart->size = $size ?? '';
        //         $newCart->status = 'Pending';

        //         $newCart->save();
        //     }
        //     else{
        //         $check = Cart::where('user_id',auth()->user()->id)->where('product_id',$product_id)->update([
        //             'quantity' => $cart[$product_id]->quantity,
        //             'total_price' => $cart[$product_id]->total_price,
        //             'size' => $cart[$product_id]->size
        //         ]);
        //     }
        // }

            $request->session()->put('cart',$cart);



            foreach(session()->get('cart') as $getCart){
                $cartItem++;
            }

            if(!$cart){
                echo "Something Went Worng";
            }

            return response()->json(['status' => 200, 'message' => 'data retrieved','cartItem' => $cartItem]);
        }
        else{
            return 'No';
        }
    }




//To show session data on Mini Cart
    public function getMinicart(){
        $cartproducts = array();
        
        $bill = 0;

        if(session()->get('cart') != null){
            foreach(session()->get('cart') as $cart){

                $product = Product::where('id',$cart->product_id)->first();
                $product->total_quantity = $cart->quantity;
                $product->price = $cart->unit_price;
                $cartproducts[] = $product;
                $bill+= $cart->total_price;
                
            }            
        }

        return view('front.minicart',compact('cartproducts','bill'))->render();
        
    }


    public function addToWishlist(Request $request){
        $product_id = $request->id;
        $user_id = $request->userId;
        $response = new StdCLass;
        $response->wishItem = 0;
        $check = Wishlist::where('user_id',$user_id)->where('product_id',$product_id)->first();
        if($check){
            $response->message= 'Product is already in your wishlist';
        }
        else{
            $product = Product::where('id',$product_id)->first();
            $new_user = new  Wishlist;
            $new_user->product_id = $product_id;
            $new_user->user_id = $user_id;
            $new_user->user_shop_id = $product->user_id;

            $new_user->save();
            $response->message= 'Product added in your wishlist';
        }

        $response->wishItem = Wishlist::where('user_id',$user_id)->count();

        return response()->json($response);

    }

    public function deleteWishlistItem(Request $request){
        $flag = 0;
        $response = new StdClass;
        $response->flag = 0;
        $response->wishItem=0;
        $wishlist = Wishlist::where('product_id',$request->id)
        ->where('user_id',$request->user_id)
        ->first();
        $wishlist->delete();
        $cartItem = 0;

        $response->wishItem = Wishlist::where('user_id',$request->user_id)->count();

        return response()->json($response);
    }

    public function deleteSessionData(Request $request)
    {
        $flag = 1 ;
        $bill = 0;
        $cart = session()->get('cart');
        $cartItem = 0;
        $cart[$request->id] = null;
        $cart = array_filter($cart);
        $request->session()->put('cart',$cart);

        if(auth()->check()){
            $check = Cart::where('user_id',auth()->user()->id)->where('product_id',$request->id)->first();
            if($check){
                Cart::where('user_id',auth()->user()->id)->where('product_id',$request->id)->delete();
            }
        }

        foreach(session()->get('cart') as $pro){
            $cartItem++;
            $product = Product::where('id',$pro->product_id)->first();
            $price = $pro->total_price;
            $bill = $bill + $price;
        }
        if($flag == 1)
            return response()->json(['status' => 200, 'message' => 'Data Deleted Successfully','bill' => $bill, 'cartItem' => $cartItem]);
        else
            return response()->json(['status' => 201, 'message' => 'Something Went Wrong']);
    }



    public function updateCart(Request $request)
    {
        $flag = 1 ;
        $bill = 0;
        $total = 0;
        $action = $request->action;
        $shippingTotal = $request->shippingTotal;
        $item = Product::where('id',$request->id)->first();
        $cart = session()->get('cart');

        if($action == 'plus'){
         $cart[$request->id]->quantity = $cart[$request->id]->quantity+1;
     }
     else{
         $cart[$request->id]->quantity = $cart[$request->id]->quantity-1;
     }

     $cart[$request->id]->total_price = $cart[$request->id]->quantity*$cart[$request->id]->unit_price;

     $total = $cart[$request->id]->total_price;
     $cart = array_filter($cart);
     $request->session()->put('cart',$cart);
     $cartItem = 0;
     foreach(session()->get('cart') as $pro){

      $bill = $bill + $pro->total_price;
      $cartItem++;

  }

  $subTotal = $bill;
  $bill = $bill + $shippingTotal;

  

  if($flag == 1)
    return response()->json(['status' => 200, 'message' => 'Data Deleted Successfully', 'bill' => $bill, 'total' => $total, 'cartItem' => $cartItem, 'subTotal' => $subTotal]);
else
    return response()->json(['status' => 201, 'message' => 'Something Went Wrong']);
}




public function submitNewsletter(Request $request){
    $check = DB::table('newsletters')->where('email',$request->email)->first();
    $message = 'Something went wrong';

    if(!empty($check)){
        $message = 'This email is already registered for newsletter';
    }
    else{
        $newData = DB::table('newsletters')->insert([
            'email' => $request->email ?? '',
            'status' => 1
        ]);
        $message = 'Email registered successfully for latest updates. Thank you.';
    }


$user = new StdClass;
        $user->email = $request->email;
        $user->name = $request->email;

 $user->admin_email = 'Riddhi.lic@gmail.com';
        $user->admin_name = 'GV Mart';


         Mail::send('mails.newsletter',['user' => $user, 'type' => 'admin' ],
                 function ($m) use ($user) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($user->email, $user->name)->subject('GV Mart - Newsletter subscription');
                 });


        Mail::send('mails.newsletter',['user' => $user, 'type' => 'user'],
                 function ($m) use ($user) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($user->admin_email, $user->admin_name)->subject('GV Mart - Newsletter subscription');
                 });


    return redirect()->back()->with('successNewsletter',$message);
}


public function submitContactForm(Request $request){

    $message = 'Something went wrong';

    $newData = Contact::insert([
        'name' => $request->name ?? '',
        'email' => $request->email ?? '',
        'subject' => $request->subject ?? '',
        'message' => $request->message ?? '',
        'user_id' => 0
    ]);

    $message = 'Message sent successfully. Thank You.';

    $data = $request->all();

    $data['admin_email'] = 'Riddhi.lic@gmail.com';
    $data['admin_name'] = 'GV Mart';

    Mail::send('mails.contact',['data' => $data , 'type' => 'admin' ],
       function ($m) use ($data) {
           $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

           $m->to($data['admin_email'], $data['admin_name'])->subject('Contact Query.');
       });
    
    Mail::send('mails.contact',['data' => $data , 'type' => 'user' ],
       function ($m) use ($data) {
           $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

           $m->to($data['email'], $data['name'])->subject('Contact Query.');
       }); 


    return redirect()->back()->with('successNewsletter',$message);
}


public function submitFeedbackForm(Request $request){
    $message = 'Something went wrong';

    $newData = Complaint::insert([
        'user_name' => $request->user_name ?? '',
        'user_email' => $request->user_email ?? '',
        'user_mobile' => $request->user_mobile ?? '',
        'subject' => $request->subject ?? '',
        'complaint' => $request->conplaint ?? '',
        'user_id' => 0,
        'status' => 0
    ]);

    $message = 'Feedback submitted successfully. Thank You.';

    $data = $request->all();
    $data['complaint'] =$data['conplaint'];
// var_dump($data); die;

    $data['admin_email'] = 'Riddhi.lic@gmail.com';
    $data['admin_name'] = 'GV Mart';

    Mail::send('mails.feedback',['data' => $data , 'type' => 'admin' ],
       function ($m) use ($data) {
           $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

           $m->to($data['admin_email'], $data['admin_name'])->subject('Feedback.');
       });
    
    Mail::send('mails.feedback',['data' => $data , 'type' => 'user' ],
       function ($m) use ($data) {
           $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

           $m->to($data['user_email'], $data['user_name'])->subject('Feedback.');
       }); 


    return redirect()->back()->with('successNewsletter',$message);
}

public function deleteAddress(Request $request){
    Address::where('id',$request->id)->delete();

    return 1;
}

public function getSearchResult(Request $request){
    $data = $request->all();

    $keyword = $data['keyword'];


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

$cid = 1;
$cnt_pro = 0;
$count_catpro = 0;



      // $products = Product::where('parent_id',$cat_ids[$j]->id)->where('status','1')->get();
$products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.name','LIKE','%'.$keyword.'%')->where('products.status','1')->orWhere('categories.name','LIKE','%'.$keyword.'%')->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->get();
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

    $all_brands = Brand::where('status',1)->get();
    
    foreach($all_brands as $br){
        $brands[]  = $br->id;
    }

    $brands = array_filter($brands);
    $brands = array_unique($brands);



    // var_dump($brands); die;

$materials = array_filter($material);
$materials = array_unique($materials);

shuffle($searched_products);

$brandSlug = '';

$brand = '';

$slug = '';


return view('front.category_products',compact('maincategory','searched_products','max_price','cartproducts','quantity','slug','colors','brands','materials','allCategories','top_rated_products','brandSlug','brand','keyword'));
}


public function sortBy(Request $request){
    $data = $request->all();

    $keyword = $data['keyword'] ?? '';
    $sort = $data['sort'];
    $filterbrand = $data['brand'];
    $filtercategory = $data['category'];
    
    $field = 'products.price';
    
    $order = 'DESC';
    if($sort == 'price-lh'){
        $order = 'ASC';
    }
    

    $filterPrice = explode(' - ',$data['price']);
    // var_dump($filterPrice); die;
    
    $price_min = explode('Rs. ',$filterPrice[0])[1];
    $price_max = explode('Rs. ',$filterPrice[1])[1];

    // echo $price_min." ".$price_max; die;

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

$cid = 1;
$cnt_pro = 0;
$count_catpro = 0;


if($keyword != ""){
    
    if($filtercategory != ""){
        
        
      // $products = Product::where('parent_id',$cat_ids[$j]->id)->where('status','1')->get();
      $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('categories.slug',$filtercategory)->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('products.name','LIKE','%'.$keyword.'%')->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->get();
      if($products != null){
        foreach($products as $pro){
          $searched_products[$cnt_pro] = $pro;
          $color[$cnt_pro] = $pro->color ?? '';
          $brand[$cnt_pro] = $pro->brand_id ?? '';
          $material[$cnt_pro] = $pro->material ?? '';
          $cnt_pro++;
      }
  }
  
  
  $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('categories.slug',$filtercategory)->where('categories.name','LIKE','%'.$keyword.'%')->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->get();
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

    else if($filterbrand != ""){
    
    
    
     $getBrandName = Brand::where('name',$filterbrand)->first();
    
                  // $products = Product::where('parent_id',$cat_ids[$j]->id)->where('status','1')->get();
  $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('products.brand_id',$getBrandName->id)->where('products.name','LIKE','%'.$keyword.'%')->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->get();
  if($products != null){
    foreach($products as $pro){
      $searched_products[$cnt_pro] = $pro;
      $color[$cnt_pro] = $pro->color ?? '';
      $brand[$cnt_pro] = $pro->brand_id ?? '';
      $material[$cnt_pro] = $pro->material ?? '';
      $cnt_pro++;
  }
}


$products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('products.brand_id',$getBrandName->id)->where('categories.name','LIKE','%'.$keyword.'%')->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->get();
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

else{
    
    // echo 'yes'; die;
            
      // $products = Product::where('parent_id',$cat_ids[$j]->id)->where('status','1')->get();
      $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.name','LIKE','%'.$keyword.'%')->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->get();
      if($products != null){
        foreach($products as $pro){
          $searched_products[$cnt_pro] = $pro;
          $color[$cnt_pro] = $pro->color ?? '';
          $brand[$cnt_pro] = $pro->brand_id ?? '';
          $material[$cnt_pro] = $pro->material ?? '';
          $cnt_pro++;
      }
  }
  
  
  $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('categories.name','LIKE','%'.$keyword.'%')->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->get();
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

}
else{
    
    
     if($filtercategory != ""){
        
        $filterCat = array();
        
        $main_cat = Category::where('slug',$filtercategory)->first();
        
        $filterCat[] = $main_cat->id;
        
        $sub_main_cat = Category::where('parent_id',$main_cat->id)->where('status',1)->get();
        
        foreach($sub_main_cat as $sc){
            $filterCat[] = $sc->id;
        }
        
        // var_dump($filterCat); die;
        
        foreach($filterCat as $fCat){
            // $products = Product::where('parent_id',$cat_ids[$j]->id)->where('status','1')->get();
      $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('categories.id',$fCat)->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('products.name','LIKE','%'.$keyword.'%')->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->get();
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
  
  
  $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('categories.slug',$filtercategory)->where('categories.name','LIKE','%'.$keyword.'%')->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->get();
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

    if($filterbrand != ""){
    
    
    $getBrandName = Brand::where('name',$filterbrand)->first();
    
    
                  // $products = Product::where('parent_id',$cat_ids[$j]->id)->where('status','1')->get();
  $products = Product::JOIN('category_product','category_product.product_id','products.id')->JOIN('categories','categories.id','category_product.category_id')->where('products.price','<=',$price_max)->where('products.price','>=',$price_min)->where('products.brand_id',$getBrandName->id)->where('products.status','1')->select('products.*','categories.name as category_name','categories.slug as category_slug')->orderBy($field,$order)->distinct('category_products.category_id')->get();
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
    
}


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

if($sort == 'price-lh'){
 
   $mrp = array_column($searched_products, 'sale_price');
   array_multisort($mrp, SORT_ASC, $searched_products);
}
else{
   $mrp = array_column($searched_products, 'sale_price');
   array_multisort($mrp, SORT_DESC, $searched_products);
}
$brandSlug = '';

$brand = '';

$slug = '';

return view('front.dynamic_products',compact('maincategory','searched_products','max_price','cartproducts','quantity','slug','colors','brands','materials','allCategories','top_rated_products','brandSlug','brand','keyword'));
}


public function checkCustomerEmail(Request $request){
    $data = $request->all();

    $check = User::where('email',$data['email'])->where('status',1)->where('user_role','customer')->first();

    if($check){
        return 1;
    }
    else{
        return 0;
    }
}


public function sendEmailOtp(Request $request){
    $data = $request->all();

    $newData = '';

    $checkUser = EmailVerification::where('email',$data['email'])->where('verified',0)->first();

    if($checkUser){
        $newData = $checkUser;
    }

    else{
        
    $newEntry = new EmailVerification;

    $newEntry->email = $request->email;
    $newEntry->otp = rand(100000,999999);
    // $newEntry->otp = '123456';

    $newEntry->save();    

    $newData = $newEntry;
    }
    
    $newData->name = 'User';
    
    Mail::send('mails.otp',['user' => $newData],
        function ($m) use ($newData) {
            $m->from( env('MAIL_USERNAME'), env('APP_NAME') );
            $m->to($newData->email, $newData->name)->subject('Email Verification');
        });    

}

public function verifyOtp(Request $request){
    $data = $request->all();

    $check = EmailVerification::where('email',$data['email'])->where('otp',$data['otp'])->where('verified',0)->first();

    if($check){
        $check->verified = 1;
        $check->update();
        return 1;
    }
    else{
        return 0;
    }
}


public function getProductDetailForQuickView($id){
    $product = Product::find($id);
    $product_images = ProductImage::where('product_id',$id)->get();
    return response()->json([
        'product' => $product,
        'images' => $product_images
    ]);

}

public function getProductPrice(Request $request){
    $data = $request->all();
    
    $weight = ProductWeight::find($data['weight_id']);
    
    // var_dump($weight); die;
    
    $product_weight = $weight->product_weight." ".$weight->weight_unit;
    $product_price = $weight->product_price;
    
    return response()->json([
        'product_weight' => $product_weight,
        'product_price' => $product_price
    ]);
    
}

public function destroyCartSession(){
    
    session()->forget('cart');
    
    return redirect()->route('home');
    
}

}