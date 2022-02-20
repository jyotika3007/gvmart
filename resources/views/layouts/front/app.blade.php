<?php

use App\Shop\CompanyDetail\CompanyDetail;
use App\Shop\ShopCategory\ShopCategory;
use App\Shop\Categories\Category;
use App\Shop\Wishlist\Wishlist;
use App\Shop\Cart\Cart;
use App\Shop\Pincodes\Pincode;

$all_pincodes = Pincode::where('status',1)->get();


$checkUser = Auth::user();

// if($checkUser && $checkUser->user_role != 'customer'){
// 	session()->flush();
// }

$new_arrivals = DB::table('products')->orderBy('created_at','DESC')->limit(5)->get();

$footer_top_categories = Category::where('is_top',1)->where('status','1')->get();

$company_detail = CompanyDetail::first();

$product_based = ShopCategory::where('category','Product Based')
->where('status',1)
->get();
$service_based = ShopCategory::where('category','Service Based')
->where('status',1)
->get();
$all_services = ShopCategory::where('status',1)->get();       

$cart_total = 0;
$wishlist_total = 0;
$user_cart = 0;
$user_cart_items = '';

if(auth()->check())
	$cart_total+=Cart::where('user_id',auth()->user()->id)->count();

if(!empty(session()->get('cart')))
	$cart_total+=count(session()->get('cart')) ?? '0';


if($cart_total==0)
	$cart_total = $user_cart;

if(auth()->check()){

	$user_cart_items = Cart::where('user_id',auth()->user()->id)->get();
	$wishlist_total = Wishlist::where('user_id',auth()->user()->id)->count();
}


$cart_session_items = "";

$cart_total_price = 0;


$parentCategories = Category::where('is_featured',1)->where('status',1)->get();

?>


<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.hasthemes.com/greenfarm-preview/greenfarm/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Aug 2020 14:54:30 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	
	@yield('title')

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="{{ asset('favicons/rsz_logo_small.png') }}">

	<!-- CSS
		============================================ -->
		<!-- Bootstrap CSS -->
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- FontAwesome CSS -->
		<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

		<!-- Elegent CSS -->
		<link href="{{ asset('assets/css/elegent.min.css') }}" rel="stylesheet">

		<!-- Plugins CSS -->
		<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">

		<!-- Helper CSS -->
		<link href="{{ asset('assets/css/helper.css') }}" rel="stylesheet">

		<!-- Main CSS -->
		<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

		<!-- Modernizer JS -->
		<script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

		<style type="text/css">
			#select_pincode{
				border-radius: 20px;
				margin-bottom: 25px;
			}
			#choose_pincode{
				border-radius: 30px;
				margin-bottom: 20px;
			}
		</style>

		<style type="text/css">
    .product-feature-details li::before {
  content: '▶';
  position: absolute;
  left: 0;
}

.modal-body ul,
.modal-body ul li::before{
	margin-left: 25px;

}
</style>




<style type="text/css">
	h3{
		margin-bottom: 0.05rem !important;
	}
</style>



<style type="text/css">
	.heading {
    text-align: center;
    color: #454343;
    font-size: 25px;
    font-weight: 500;
    position: relative;
    margin-bottom: 5px;
    color: #000;
    /* margin-bottom: 70px; */
    text-transform: uppercase;
    z-index: 999;
}
.white-heading{
    color: #ffffff;
}
.heading:after {
    content: ' ';
    position: absolute;
    top: 100%;
    left: 50%;
    height: 40px;
    width: 180px;
    border-radius: 4px;
    transform: translateX(-50%);
    background: url(#);
    background-repeat: no-repeat;
    background-position: center;
}
.white-heading:after {
    /*background: url(https://i.ibb.co/d7tSD1R/heading-line-white.png);*/
    background-repeat: no-repeat;
    background-position: center;
}

.heading span {
    font-size: 18px;
    display: block;
    font-weight: 500;
}
.white-heading span {
    color: #ffffff;
}
/*-----Testimonial-------*/

.testimonial:after {
    position: absolute;
    margin-top: 30px;
    top: -0 !important;
    left: 0;
    content: " ";
    /*background-color: #eee;*/
    /*background: url(img/testimonial.bg-top.png);*/
    background-size: 100% 100px;
    width: 100%;
    height: 100px;
    float: left;
    z-index: 99;
}

.testimonial {
    min-height: 375px;
    margin: 0 6% 25px;
    width: 88%;
    position: relative;
    /*background-image: linear-gradient(rgba(200,200,200,0.5),rgba(200,200,200,0.5)); */
        /*background-image: linear-gradient(rgba(37,182,82,0.5),rgba(37,182,82,0.5)); */
    background: url('/bg_img/b1.jpg');
    /*padding-top: 50px;*/
    padding-top: 35px;
    padding-bottom: 35px;
    background-position: center;
        background-size: cover;
}
#testimonial4 .carousel-inner:hover{
  cursor: -moz-grab;
  cursor: -webkit-grab;
}
#testimonial4 .carousel-inner:active{
  cursor: -moz-grabbing;
  cursor: -webkit-grabbing;
}
#testimonial4 .carousel-inner .item{
  overflow: hidden;
}

.testimonial4_indicators .carousel-indicators{
  left: 0;
  margin: 0;
  width: 100%;
  font-size: 0;
  height: 20px;
  bottom: 15px;
  padding: 0 5px;
  cursor: e-resize;
  overflow-x: auto;
  overflow-y: hidden;
  position: absolute;
  text-align: center;
  white-space: nowrap;
}
.testimonial4_indicators .carousel-indicators li{
  padding: 0;
  width: 14px;
  height: 14px;
  border: none;
  text-indent: 0;
  margin: 2px 3px;
  cursor: pointer;
  display: inline-block;
  background: #ffffff;
  -webkit-border-radius: 100%;
  border-radius: 100%;
}
.testimonial4_indicators .carousel-indicators .active{
  padding: 0;
  width: 14px;
  height: 14px;
  border: none;
  margin: 2px 3px;
  background-color: #9dd3af;
  -webkit-border-radius: 100%;
  border-radius: 100%;
}
.testimonial4_indicators .carousel-indicators::-webkit-scrollbar{
  height: 3px;
}
.testimonial4_indicators .carousel-indicators::-webkit-scrollbar-thumb{
  background: #eeeeee;
  -webkit-border-radius: 0;
  border-radius: 0;
}

.testimonial4_control_button .carousel-control{
  top: 175px;
  opacity: 1;
  width: 40px;
  bottom: auto;
  height: 40px;
  font-size: 10px;
  cursor: pointer;
  font-weight: 700;
  overflow: hidden;
  line-height: 38px;
  text-shadow: none;
  text-align: center;
  position: absolute;
  background: transparent;
  border: 2px solid #ffffff;
  text-transform: uppercase;
  -webkit-border-radius: 100%;
  border-radius: 100%;
  -webkit-box-shadow: none;
  box-shadow: none;
  -webkit-transition: all 0.6s cubic-bezier(0.3,1,0,1);
  transition: all 0.6s cubic-bezier(0.3,1,0,1);
}
.testimonial4_control_button .carousel-control.left{
  left: 7%;
  top: 50%;
  right: auto;
}
.testimonial4_control_button .carousel-control.right{
  right: 7%;
  top: 50%;
  left: auto;
}
.testimonial4_control_button .carousel-control.left:hover,
.testimonial4_control_button .carousel-control.right:hover{
  color: #000;
  background: #fff;
  border: 2px solid #fff;
}

.testimonial4_header{
  top: 0;
  left: 0;
  bottom: 0;
  width: 550px;
  display: block;
  margin: 30px auto;
  text-align: center;
  position: relative;
}
.testimonial4_header h4{
  color: #ffffff;
  font-size: 30px;
  font-weight: 600;
  position: relative;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.testimonial4_slide{
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 70%;
  margin: auto;
  padding: 20px;
  position: relative;
  text-align: center;
}
.testimonial4_slide img {
    top: 0;
    left: 0;
    right: 0;
    width: 110px;
    height: 110px;
    margin: auto;
    display: block;
    color: #f2f2f2;
    font-size: 18px;
    line-height: 46px;
    text-align: center;
    position: relative;
    border-radius: 50%;
    box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
    -moz-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
    -o-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
    -webkit-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
}
.testimonial4_slide p {
    color: #ffffff;
    font-size: 15px;
    line-height: 1.4;
    margin: 30px 0 20px 0;
}
.testimonial4_slide h4 {
  color: #ffffff;
  font-size: 22px;
}
.testimonial4_slide h5 {
  color: #ffffff;
  font-size: 18px;
}

.testimonial .carousel {
	padding-bottom:0px;
}
.testimonial .carousel-control-next-icon, .testimonial .carousel-control-prev-icon {
    width: 25px;
    height: 25px;
}
/* ------testimonial  close-------*/

#cart-floating-box img{
	max-width: 75px !important;
	max-height: 75px !important;
}
</style>




	</head>

	<body>

	<!--=============================================
	=            Header         =
	=============================================-->

	<header>
		<!--=======  header top  =======-->

		<div class="header-top pt-10 pb-10 pt-lg-10 pb-lg-10 pt-md-10 pb-md-10">
			<div class="container-fluid" style="margin: 0 5% !important; width: 90%;">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center text-sm-left text-lg-right">
						<!-- currncy language dropdown -->
						<div class="lang-currency-dropdown">
							<!-- <ul>
								<li> <a href="#">English <i class="fa fa-chevron-down"></i></a>
									<ul>
										<li><a href="#">French</a></li>
										<li><a href="#">Japanease</a></li>
									</ul>
								</li>
								<li><a href="#">Dollar <i class="fa fa-chevron-down"></i></a>
									<ul>
										<li><a href="#">Euro</a></li>
									</ul>
								</li>
							</ul> -->
						</div>
						<!-- end of currncy language dropdown -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  text-center text-sm-right">
						<!-- header top menu -->
						<div class="header-top-menu">
							<ul>
								<li><a href="{{ url('myWishlist') }}">Wishlist ({{ $wishlist_total ?? '0' }}) </a></li>
								@if(auth()->check())
								<li><a href="{{ url('dashboard') }}">{{ ucfirst(auth()->user()->name ?? 'User') }}</a></li>
								<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								@else
								<li><a href="{{ url('login') }}">Sign In</a></li>
								<li><a href="{{ url('register') }}">Sign Up</a></li>
								@endif
								<!-- <li><a href="#">Checkout</a></li> -->
							</ul>
						</div>
						<!-- end of header top menu -->
					</div>
				</div>
			</div>
		</div>

		<!--=======  End of header top  =======-->

		<!--=======  header bottom  =======-->

		<div class="header-bottom header-bottom-other header-sticky">
			<div class="container-fluid" style="margin: 0 3% !important; width: 94%;">
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12 text-lg-left text-md-center text-sm-center">
						<!-- logo -->
						<div class="logo">
							<a title="logo " href="{{ url('/') }}">
								<img src="{{ asset('storage/'.$company_detail->company_logo ?? '') }}" class="img-fluid" alt="" >
							</a>
						</div>
						<!-- end of logo -->
					</div>
					<div class="col-md-10 col-sm-12 col-xs-12">
						<div class="menubar-top d-flex justify-content-between align-items-center flex-sm-wrap flex-md-wrap flex-lg-nowrap mt-sm-15">
							<!-- header phone number -->
							
							<!-- <div class="header-contact d-flex">
								<div class="phone-icon">
									<img src="{{ asset('assets/images/icon-phone.png') }}" class="img-fluid" alt="">
								</div>
								<div class="phone-number">
									Phone: <span class="number"><a href="tel:{{ $company_detail->contact ?? '9810779462' }}">{{ $company_detail->contact ?? '9810779462' }}</a></span>
								</div>
							</div> -->

							<div class="header-contact d-flex">
								<div class="phone-icon">
									<i class="fa fa-envelope"></i>
								</div>
								<div class="phone-number">
									Email: <span class="number"><a href="mailto:{{ $company_detail->contact_email ?? 'support@gvmart.co.in' }}">{{ $company_detail->contact_email ?? 'support@gvmart.co.in' }}</a></span>
								</div>
							</div>

							<!-- end of header phone number -->
							<!-- search bar -->
						<section class="desktop_view"> 	<div class="header-advance-search">
								<form action="{{ url('search') }}" method="GET">
									<input type="text" name="keyword" placeholder="Search your product" required="required" value="@if(!empty($keyword)){{ $keyword }}@endif">
									<button type="submit"><span class="icon_search"></span></button>
								</form>
							</div>
							</section
							<!-- end of search bar -->
							<!-- shopping cart -->
							<div class="shopping-cart" id="shopping-cart">
								<a href="#">
									<div class="cart-icon d-inline-block">
										<span class="icon_bag_alt"></span>
									</div>
									<div class="cart-info d-inline-block">
										<p>Shopping Cart 
											<span>
												<span id="cartCount">{{ $cart_total }}</span> items 
											</span>
										</p>
									</div>
								</a>
								<!-- end of shopping cart -->

								<!-- cart floating box -->
								<div class="cart-floating-box" id="cart-floating-box">
									<div class="cart-items">
										@php $item_count=0 @endphp
				@if(!empty($user_cart_items))
				@foreach($user_cart_items as $cart)
				@php $item_count++ @endphp
				<?php
				$product = DB::table('products')->where('id',$cart->product_id)->first();
				?>
										<div class="cart-float-single-item d-flex" id="div-list{{$cart->product_id}}">
											<span class="remove-item"><a onclick="removeProduct({{ $product->id ?? '' }})"><i class="fa fa-times"></i></a></span>
											<div class="cart-float-single-item-image">
												<a href="{{ url('productDetail/'.$product->slug ?? '') }}">
													@if(!empty($product->cover))
                                                <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
                                                @else
                                                <img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
                                                @endif
												</a>
											</div>
											<div class="cart-float-single-item-desc">
												<p class="product-title"> <a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ substr(ucfirst($product->name ?? ''),0,25) }}...</a></p>
												<p class="price"><span class="count">{{ $cart->quantity }}x</span> {{ $cart->unit_price ?? '' }}</p>
											</div>
										</div>

<?php $cart_total_price = $cart_total_price+$cart->total_price; ?>
				@endforeach
				@endif

			
				@if(!empty(session()->get('cart')))
				@foreach(session()->get('cart') as $cart)
				@php $item_count++ @endphp
				<?php
				$product = DB::table('products')->where('id',$cart->product_id)->first();
				?>



										<div class="cart-float-single-item d-flex" id="div-list{{$cart->product_id}}">
											<span class="remove-item"><a onclick="removeProduct({{ $product->id ?? '' }})"><i class="fa fa-times"></i></a></span>
											<div class="cart-float-single-item-image">
												<a href="{{ url('productDetail/'.$product->slug ?? '') }}">
													@if(!empty($product->cover))
                                                <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
                                                @else
                                                <img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
                                                @endif
												</a>
											</div>
											<div class="cart-float-single-item-desc">
												<p class="product-title"> <a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ substr(ucfirst($product->name ?? ''),0,25) }}...</a></p>
												<p class="price"><span class="count">{{ $cart->quantity }}x</span> {{ $cart->unit_price ?? '' }}</p>
											</div>
										</div>

										<?php $cart_total_price = $cart_total_price+$cart->total_price; ?>
				@endforeach
				@endif
				

									</div>
									<div class="cart-calculation">
										<div class="calculation-details">
											<p class="total">Subtotal <span id="totalCart">Rs. {{$cart_total_price}}</span></p>
										</div> 
										<div class="floating-cart-btn text-center">
											<a onclick="window.location='/checkout'">Checkout</a>
											<a onclick="window.location='/cart'">View Cart</a>
										</div>
									</div>
								</div>
								<!-- end of cart floating box -->
							</div>
						</div>


						<!--=============================================
						=            navigation menu         =
						=============================================-->
						
						<!-- navigation section -->
						<div class="main-menu main-menu-other-homepage">
							<nav>
								<ul>
									<!-- <li class="active "><a href="{{ url('/') }}">HOME</a> -->

									</li>
									@if(!empty($parentCategories))
									@foreach($parentCategories as $mainCat)
									<?php
										$childCategories = Category::where('parent_id',$mainCat->id)->where('status',1)->get();
										$countChildCategories = Category::where('parent_id',$mainCat->id)->where('status',1)->count();
										?>
									<li class="@if($countChildCategories>0){{'menu-item-has-children'}}@endif"><a href="{{ url('products/'.$mainCat->slug ?? '') }}">{{ ucfirst($mainCat->name ?? '') }}</a>
										
										@if(!empty($childCategories) && count($childCategories)>0)
										<ul class="sub-menu">
											@foreach($childCategories as $childCat)
											<?php
										$subChildCategories = Category::where('parent_id',$childCat->id)->where('status',1)->get();
										$countChildCategories = Category::where('parent_id',$childCat->id)->where('status',1)->count();
										?>
											<li class="@if($countChildCategories>0){{'menu-item-has-children'}}@endif"><a href="{{ url('products/'.$childCat->slug ?? '') }}">{{ ucfirst($childCat->name ?? '') }}</a>
												@if(!empty($subChildCategories) && count($subChildCategories)>0)
										<ul class="sub-menu">
											@foreach($subChildCategories as $subChildCat)
													<li><a href="{{ url('product/'.$subChildCat->id) }}">{{ ucfirst($subChildCat->name ?? '') }}</a></li>
													@endforeach
													
												</ul>
												@endif
											</li>
											@endforeach
											
										</ul>
										@endif
									</li>
									@endforeach
									@endif
									
									<!-- <li><a href="{{ url('contact_us') }}">CONTACT</a></li> -->
								</ul>
							</nav>
						</div>
						<!-- end of navigation section -->

						<!--=====  End of navigation menu  ======-->

						
					</div>
					<div class="col-12">
						<!-- Mobile Menu -->
						<div class="mobile-menu d-block d-lg-none"></div>
						<section class="mobile_view">	<div class="header-advance-search">
								<form action="{{ url('search') }}" method="GET">
									<input type="text" name="keyword" placeholder="Search your product" required="required" value="@if(!empty($keyword)){{ $keyword }}@endif">
									<button type="submit"><span class="icon_search"></span></button>
								</form>
							</div></section>
					</div>
				</div>
			</div>








		<!--=============================================
		=            navigation menu         =
		=============================================-->
		
		<div class="home-other-navigation-menu">
			<div class="container-fluid" style="margin: 0 3% !important; width: 94%;">
				<div class="row">
					<div class="col-lg-12">
						<!-- navigation section -->
						<div class="main-menu">
							<nav>
								<ul>
									<!-- <li class="active"><a href="{{ url('/') }}">HOME</a> -->
										
									</li>
									@if(!empty($parentCategories))
									@foreach($parentCategories as $mainCat)
									<?php
										$childCategories = Category::where('parent_id',$mainCat->id)->where('status',1)->get();
										$countChildCategories = Category::where('parent_id',$mainCat->id)->where('status',1)->count();
										?>
									<li class="@if($countChildCategories>0){{'menu-item-has-children'}}@endif"><a href="{{ url('products/'.$mainCat->slug ?? '') }}">{{ ucfirst($mainCat->name ?? '') }}</a>
										
										@if(!empty($childCategories) && count($childCategories)>0)
										<ul class="sub-menu">
											@foreach($childCategories as $childCat)
											<?php
										$subChildCategories = Category::where('parent_id',$childCat->id)->where('status',1)->get();
										$countChildCategories = Category::where('parent_id',$childCat->id)->where('status',1)->count();
										?>
											<li class="@if($countChildCategories>0){{'menu-item-has-children'}}@endif"><a href="{{ url('products/'.$childCat->slug ?? '') }}">{{ ucfirst($childCat->name ?? '') }}</a>
												@if(!empty($subChildCategories) && count($subChildCategories)>0)
										<ul class="sub-menu">
											@foreach($subChildCategories as $subChildCat)
													<li><a href="{{ url('product/'.$subChildCat->id) }}">{{ ucfirst($subChildCat->name ?? '') }}</a></li>
													@endforeach
													
												</ul>
												@endif
											</li>
											@endforeach
											
										</ul>
										@endif
									</li>
									@endforeach
									@endif
									<!-- <li><a href="{{ url('contact_us') }}">CONTACT</a></li> -->
								</ul>
							</nav>
						</div>
						<!-- end of navigation section -->
					</div>
				</div>
			</div>
		</div>

		<!--=====  End of navigation menu  ======-->


	</div>

	<!--=======  End of header bottom  =======-->


</header>

<!--=====  End of Header  ======-->





@yield('content')







	<!--=============================================
	=            Footer         =
	=============================================-->
	
	<footer>
		<!--=======  newsletter section  =======-->
		
		<div class="newsletter-section pt-50 pb-50">
			<div class="container-fluid" style="margin: 0 5% !important; width: 90%;">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 mb-sm-20 mb-xs-20">
						<!--=======  newsletter title =======-->
						
						<div class="newsletter-title">
							<h1>
								<img src="{{ asset('assets/images/icon-newsletter.png') }}" alt="">
								Send Newsletter
							</h1>
						</div>
						
						<!--=======  End of newsletter title  =======-->
					</div>


					<div class="col-lg-8 col-md-12 col-sm-12">
						<!--=======  subscription-form wrapper  =======-->
						
						<div class="subscription-form-wrapper d-flex flex-wrap flex-sm-nowrap">
							<p class="mb-xs-20">Sign up for our newsletter to get up-to-date from us</p>
							<div class="subscription-form">
								<form  action="{{ url('submit-newsletter') }}" method="POST"  class="mc-form subscribe-form">
									@csrf
									<input type="email" id="mc-email" name="email" autocomplete="off" placeholder="Your email address" required="required">
									<button type="submit"> subscribe!</button>
								</form>

								<!-- mailchimp-alerts Start -->
								<div class="mailchimp-alerts">
									<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
									<div class="mailchimp-success"></div><!-- mailchimp-success end -->
									<div class="mailchimp-error"></div><!-- mailchimp-error end -->
								</div><!-- mailchimp-alerts end -->
							</div>
						</div>
						
						<!--=======  End of subscription-form wrapper  =======-->
					</div>
				</div>
			</div>
		</div>
		
		<!--=======  End of newsletter section  =======-->

		<!--=======  social contact section  =======-->
		
		<div class="social-contact-section pt-50 pb-50">
			<div class="container-fluid" style="margin: 0 5% !important; width: 90%;">
				<div class="row">
					<div class="col-lg-4 col-md-12 order-2 order-md-2 order-sm-2 order-lg-1">
						<!--=======  social media links  =======-->
						
						<div class="social-media-section">
							<h2>Follow us</h2>
							<div class="social-links">
								<a class="facebook" href="{{ $company_detail->google_url ?? '#' }}" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
								<a class="twitter" href="{{ $company_detail->twitter_url ?? '#' }}" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
								<a class="instagram" href="{{ $company_detail->instagram_url ?? '#' }}" data-tooltip="Instagram"><i class="fa fa-instagram"></i></a>
								<a class="linkedin" href="{{ $company_detail->linked_in_url ?? '#' }}" data-tooltip="Linkedin"><i class="fa fa-linkedin"></i></a>
								<a class="rss" href="{{ $company_detail->pinterest_url ?? '#' }}" data-tooltip="Pinterest"><i class="fa fa-pinterest"></i></a>
								<a class="rss" href="{{ $company_detail->youtube_url ?? '#' }}" data-tooltip="Youtube"><i class="fa fa-youtube"></i></a>
							</div>
						</div>
						
						<!--=======  End of social media links  =======-->
						
					</div>
					<div class="col-lg-8 col-md-12 order-1 order-md-1 order-sm-1 order-lg-2  mb-sm-50 mb-xs-50">
						<!--=======  contact summery  =======-->
						
						<div class="contact-summery">
							<h2>Contact us</h2>

							<!--=======  contact segments  =======-->
							
							<div class="contact-segments d-flex justify-content-between flex-wrap flex-lg-nowrap"> 
								<!--=======  single contact  =======-->

								<div class="single-contact d-flex mb-xs-20">
									<div class="icon">
										<span class="icon_pin_alt"></span>
									</div>
									<div class="contact-info">
										<p>Address: <span>{{ $company_detail->address ?? '' }}, {{ $company_detail->city ?? '' }}, {{ $company_detail->state ?? '' }}, {{ $company_detail->pincode ?? '' }}</span></p>
									</div>
								</div>
								
								<!--=======  End of single contact  =======-->
								<!--=======  single contact  =======-->

								<div class="single-contact d-flex mb-xs-20">
									<div class="icon">
										<span class="icon_mobile"></span>
									</div>
									<div class="contact-info">
										<p>Phone: <span><a href="tel:{{ $company_detail->contact ?? '9810779462' }}">{{ $company_detail->contact ?? '9810779462' }}</a></span></p>
									</div>
								</div>
								
								<!--=======  End of single contact  =======-->
								<!--=======  single contact  =======-->

								<div class="single-contact d-flex">
									<div class="icon">
										<span class="icon_mail_alt"></span>
									</div>
									<div class="contact-info">
										<p>Email: <span><a href="mailto:{{ $company_detail->contact_email ?? 'support@gvmart.co.in' }}">{{ $company_detail->contact_email ?? 'support@gvmart.co.in' }}</a></span></p>
									</div>
								</div>
								
								<!--=======  End of single contact  =======-->
							</div>
							
							<!--=======  End of contact segments  =======-->

							
							
						</div>
						
						<!--=======  End of contact summery  =======-->
						
					</div>
				</div>
			</div>
		</div>
		
		<!--=======  End of social contact section  =======-->

		<!--=======  footer navigation  =======-->
		
		<div class="footer-navigation-section pt-40 pb-40">
			<div class="container-fluid" style="margin: 0 5% !important; width: 90%;">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
						<!--=======  single navigation section  =======-->
						
						<div class="single-navigation-section">
							<h3 class="nav-section-title">INFORMATION</h3>
							<ul>
								<li> <a href="{{ url('about_us') }}">About Us</a></li>
								<li> <a href="{{ url('privacy_policy') }}">Privacy Policy</a></li>
								<li> <a href="{{ url('return_policy') }}">Return Policy</a></li>
								<li> <a href="{{ url('term_and_conditions') }}">Terms & Condition</a></li>
							</ul>
						</div>
						
						<!--=======  End of single navigation section  =======-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
						<!--=======  single navigation section  =======-->
						
						<div class="single-navigation-section">
							<h3 class="nav-section-title">MY ACCOUNT</h3>
							<ul>
								<li> <a href="{{ url('contact_us') }}">Contact Us</a></li>
								<!-- <li> <a href="#">OUR SERVICE</a></li> -->
								<li> <a href="{{ url('feedback') }}">FEEDBACK </a></li>
								<!--<li> <a href="{{ url('complaint') }}">COMPLAINT</a></li>-->
							</ul>
						</div>
						
						<!--=======  End of single navigation section  =======-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
						<!--=======  single navigation section  =======-->
						
						<div class="single-navigation-section">
							<h3 class="nav-section-title">TOP CATEGORIES</h3>
							<ul>
								@foreach($footer_top_categories as $cat)
								<li> <a href="{{ url('products/'.$cat->slug) }}">{{ ucfirst($cat->name ?? '') }}</a></li>
								@endforeach
								
							</ul>
						</div>
						
						<!--=======  End of single navigation section  =======-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<!--=======  single navigation section  =======-->
						
						<div class="single-navigation-section">
							<h3 class="nav-section-title">New Arrivals</h3>
							<ul>
								@foreach($new_arrivals as $product)
								<li> <a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ $product->name ?? '' }}</a></li>
								@endforeach
								
							</ul>
						</div>
						
						<!--=======  End of single navigation section  =======-->
					</div>
				</div>
			</div>
		</div>
		
		<!--=======  End of footer navigation  =======-->



		<!--=======  copyright section  =======-->
		
		<div class="copyright-section pt-35 pb-35">
			<div class="container-fluid" style="margin: 0 5% !important; width: 90%;">
				<div class="row align-items-md-center align-items-sm-center">
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center text-md-left">
						<!--=======  copyright text	  =======-->
						
						<div class="copyright-segment">
							<!-- <p>
								<a href="#">Privacy Policy</a>
								<span class="separator">|</span>
								<a href="#">Term and conditions</a>
							</p> -->
							<p class="copyright-text">&copy; 2020-21 <a href="#">GV Mart</a>. All Rights Reserved</p>
						</div>
						
						<!--=======  End of copyright text	  =======-->
						
					</div>
					<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
						<!--=======  payment info  =======-->
						
						<div class="payment-info text-center text-md-right">
							<!--<p>Allow payment base on <img src="{{ asset('assets/images/payment-icon.png') }}" class="img-fluid" alt=""></p>-->
						</div>
						
						<!--=======  End of payment info  =======-->
						
					</div>
				</div>
			</div>
		</div>
		
		<!--=======  End of copyright section  =======-->
	</footer>
	
	<!--=====  End of Footer  ======-->

	<!--=============================================
	=            Quick view modal         =
	=============================================-->
	@if(!auth()->user())
 <a href="#" style="display: none" data-tooltip="Quick view" data-myid="" data-toggle = "modal" data-target="#quick-pincode-modal"> <span class="icon_search" id="quick-pincode-modal-button"></span> </a>
@endif
	<div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-xs-12">
							<!-- product quickview image gallery -->
							<div class="product-image-slider">
								<!--Modal Tab Content Start-->
								<div class="tab-content product-large-image-list" id="myTabContent">
									<div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
										<!--Single Product Image Start-->
										<div class="single-product-img img-full">
											<img src="{{ asset('#') }}" class="img-fluid" alt="" id="mainCoverImage">
										</div>
										<!--Single Product Image End-->
									</div>
									
									<div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4" id="tapViewProductImage">
										<!--Single Product Image Start-->
										<!-- <div class="single-product-img img-full">
											<img src="{{ asset('assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
										</div> -->
										<!--Single Product Image End-->
									</div>
								</div>
								<!--Modal Content End-->
								<!--Modal Tab Menu Start-->
								<div class="product-small-image-list"> 
									<div class="nav small-image-slider" role="tablist" id="gridViewProductImage">
										
										<!-- <div class="single-small-image img-full">
											<a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="{{ asset('#') }}"
												class="img-fluid" alt=""></a>
											</div> -->
											
													</div>
												</div>
												<!--Modal Tab Menu End-->
											</div>
											<!-- end of product quickview image gallery -->
										</div>
										<div class="col-lg-7 col-md-6 col-xs-12">
											<!-- product quick view description -->
											<div class="product-feature-details">
												<h2 class="product-title mb-15" id="pdName"></h2>

												<h2 class="product-price mb-15"> 
													<span class="main-price" id="pdPrice"></span> 
													<span class="discounted-price" id="pdSalePrice"> </span>
												</h2>



												 <p class="pd-no"><b>SKU -</b> <span id="pdSku"></span></p>

                                        <p class="stock-qty"><b>Availability - </b><span id="pdAvailability"></span></p>

                            <p class="pd-no"><b>Return Period -</b> <span id="pdPeriod"></span></p>

												<p class="product-description mb-20" id="pdDescription"></p>


												<div class="cart-buttons mb-20">
													<div class="pro-qty mr-10">
														 <input type="text" class="quickViewProductQuantity" value="1"   readonly>
                                            <a href="#" class="inc qty-btn">+</a>
                                            <a href="#" class= "dec qty-btn">-</a>
                                    
													</div>
													<div class="add-to-cart-btn">
														<a id="pdAddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
													</div>
												</div>


												<div class="social-share-buttons">
													<h3>share this product</h3>
													<ul>
														<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
														<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
														<li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
														<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
													</ul>
												</div>
											</div>
											<!-- end of product quick view description -->
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!--=====  End of Quick view modal  ======-->








<!--=============================================
	=            Select Pincode         =
	=============================================-->
	
	<div class="modal   bd-example-modal-lg  fade quick-view-modal-container" id="quick-pincode-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCouponModal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-xs-12">
							<!-- product quickview image gallery -->
							<div class="product-image-slider">
								<!--Modal Tab Menu Start-->

											<a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="{{ asset('#') }}"
												class="img-fluid" alt="" style="height: auto; width: 70%; margin: 0% 10% 3%"></a>
											</div>
											
													
												
											<!-- end of product quickview image gallery -->
										</div>
										<div class="col-lg-8 col-md-6 col-xs-12">
											<!-- product quick view description -->
											<div class="product-feature-details">
												<h3>Where do you want a Delivery ? </h3>
												<br>
												<h4>CHOOSE YOUR PINCODE</h4>
												<form action="{{ url('selectPincode') }}" method="post">
													@csrf
												<select style="font-size:12px;" class="form-control" name="select_pincode" id="select_pincode">
													<option value="">Select Your Delivery Address Pincode</option>
													@if($all_pincodes)
													@foreach($all_pincodes as $pincode)
														<option value="{{ $pincode->pincode }}">{{ $pincode->pincode ?? '' }}</option>
													@endforeach
													@endif
												</select>

												<input type="submit" name="choose_pincode" id="choose_pincode" value="Choose Your Pincode" class="alert btn-success">
											</form>
												<a onclick="closeModal()" >No Thanks, I will choose at checkout time</a> 
												<br><br>

											</div>
											<!-- end of product quick view description -->
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!--=====  End of Pincode Model  ======-->













					<!-- scroll to top  -->
					<a href="#" class="scroll-top"></a>
					<!-- end of scroll to top -->

	<!-- JS
		============================================ -->
		<!-- jQuery JS -->
		<script src="{{ asset('assets/js/vendor/jquery.min.js') }}"></script>

		<!-- Popper JS -->
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>

		<!-- Bootstrap JS -->
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

		<!-- Plugins JS -->
		<script src="{{ asset('assets/js/plugins.js') }}"></script>

		<!-- Main JS -->
		<script src="{{ asset('assets/js/main.js') }}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>


		@yield('scripts')
<script type="text/javascript">
	function closeModal(){
		$('#closeCouponModal').click();
	}
</script>
		
		@include('front.scripts.script')
	</body>


	<!-- Mirrored from demo.hasthemes.com/greenfarm-preview/greenfarm/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Aug 2020 14:55:19 GMT -->
	</html>