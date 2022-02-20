@extends('layouts.front.app')

@section('content')

	<style>

			</style>
			
<style type="text/css">
	@if(!empty($sliders))
	@foreach($sliders as $key => $banner)
	.slider-bg-{{$key}} {
    background-image: url(/storage/{{$banner->cover ?? ''}});
}
    @endforeach
    @endif

    .single-post-wrapper{
    	text-align: center !important;

    }

    .test-image{
    	margin-left: 37%;
    	height: 120px; 
    	width: 120px !important;
    	border:2px solid #eee;
    	border-radius: 50%;
    }
</style>

	<!--=============================================
	=            Hero slider Area         =
	=============================================-->
	
	@if(!empty($sliders))

	<div class="hero-slider-container mb-35">
		<!--=======  Slider area  =======-->
		
		<div class="hero-slider-one">
				
	@foreach($sliders as $key => $banner)
			<!--=======  hero slider item  =======-->
			<div class="hero-slider-item slider-bg-{{$key}}">
					<div class="slider-content d-flex flex-column justify-content-center align-items-center">
						<!-- <h1>{{ $banner->title ?? '' }}</h1> -->
						<!-- <p>get fresh food from our firm to your table</p> -->
						<!-- <a href="#" class="slider-btn">SHOP NOW</a> -->
					</div>
				</div>
			<!--=======  End of hero slider item  =======-->			
	@endforeach


			
		</div>
		
		<!--=======  End of Slider area  =======-->

	</div>

    @endif
	
	<!--=====  End of Hero slider Area  ======-->



	<!--=============================================
	=            Policy area         =
	=============================================-->
	
	<div class="policy-section mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				<div class="col-lg-12">
					<div class="policy-titles d-flex align-items-center flex-wrap">
						<!--=======  single policy  =======-->
						
						<div class="single-policy">
							<span><img src="{{ asset('assets/images/policy-icon1.png') }}" class="img-fluid" alt=""></span>
							<p> FREE SHIPPING ON ORDERS OVER Rs. 299</p>
						</div>
						
						<!--=======  End of single policy  =======-->


						<!--=======  single policy  =======-->
						
						<div class="single-policy">
							<span><img src="{{ asset('assets/images/policy-icon2.png') }}" class="img-fluid" alt=""></span>
							<p>RETURN/REPLACEMENT AT DELIVERY TIME</p>
						</div>
						
						<!--=======  End of single policy  =======-->
						
						<!--=============================================
						=            single policy         =
						=============================================-->
						
						<div class="single-policy">
							<span><img src="{{ asset('assets/images/policy-icon3.png') }}" class="img-fluid" alt=""></span>
							<p>SUPPORT TIME : 8:00 AM TO 8:00 PM</p>
						</div>
						
						<!--=====  End of single policy  ======-->

					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Policy area  ======-->

	<!--=============================================
	=            category slider         =
	=============================================-->
	@if(!empty($top_categories))
	<div class="slider category-slider mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  category slider section title  =======-->
					
					<div class="section-title">
						<h3>top categories</h3>
					</div>
					
					<!--=======  End of category slider section title  =======-->
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!--=======  category container  =======-->
					
					<div class="category-slider-container">

						<!--=======  single category  =======-->
						

						@foreach($top_categories as $category)
						<div class="single-category">
							<div class="category-image">
								<a href="{{ url('products/'.$category->slug ?? '') }}" title="{{ $category->name ?? '' }}">
									<img src="{{ asset('storage/'.$category->cover ?? 'product-default.png') }}" class="img-fluid" alt="" style="height: 120px; width: 120px">
								</a>
							</div>
							<div class="category-title">
								<h3>
									<a href="{{ url('products/'.$category->slug ?? '') }}"> {{ ucfirst($category->name ?? '') }}</a>
								</h3>
							</div>
						</div>
						@endforeach

						<!--=======  End of single category  =======-->

						
			
						
					</div>
					
					<!--=======  End of category container  =======-->

				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of category slider  ======-->

	@endif

	<!--=============================================
	=            Slider with banner        =
	=============================================-->
	
	@if(!empty($sale_products) && count($sale_products)>0)
	<div class="slider slider-with-banner mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  blog slider section title  =======-->
					
					<div class="section-title red-title">
						<h3>GV Mart Sale</h3>
					</div>
					
					<!--=======  End of blog slider section title  =======-->
				</div>
			</div>

			<div class="row">
				
				<div class="col-lg-12">
					<!--=======  banner slider wrapper  =======-->
					
					<div class="banner-slider-wrapper">
						<div class="row no-gutters">
							<div class="col-lg-4 col-md-4 col-sm-12">
								<!--=======  slider side banner  =======-->
								
								<div class="slider-side-banner">
									@if(!empty($bannerHorizontal))
									@if(!empty($bannerHorizontal->category_slug))
									<a href="{{ url('products/'.$bannerHorizontal->category_slug) }}">
										@else
										<a href="#">
										@endif
										<img src="{{ asset('storage/'.$bannerHorizontal->cover ?? '') }}" class="img-fluid" alt="">
									</a>
									@endif
								</div>
								
								<!--=======  End of slider side banner  =======-->
							</div>
							<div class="col-lg-8 col-md-8 col-sm-12">
								<!--=======  banner slider container  =======-->
								
								<div class="banner-slider-container">
									<!--=======  single banner slider product  =======-->
						
							@foreach($sale_products as $product)
									<div class="gf-product banner-slider-product">
										<div class="image">
											<a href="{{ url('productDetail/'.$product->slug ?? '') }}" >
												@if($product->sale_price>0 && $product->sale_price<$product->price)
                                    <span class="onsale">Rs. {{$product->price-$product->sale_price}} OFF!</span>
                                    @endif
												@if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="" >
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
												@endif
											</a>
											<div class="product-hover-icons">
												<!--<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>-->
												<!-- <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a> -->
											</div>
										</div>
										<div class="product-content">
											<h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst(substr($product->name ?? '',0,50)) }}..</a></h3>
											<div class="product-categories">
												<a href="{{ url('products/'.$product->category_slug ?? '') }}">{{ ucfirst($product->category_name ?? '') }}</a>
												<!-- <a href="#">Vegetables</a> -->
											</div>
											<div class="price-box">
												@if(!empty($product->sale_price) && $product->sale_price<$product->price && $product->sale_price>0)
												<span class="main-price">Rs. {{ $product->price ?? '0' }}</span>
												<span class="discounted-price">Rs. {{ $product->sale_price ?? '0' }}</span>
												@else
												<span class="discounted-price">Rs. {{ $product->price ?? '0' }}</span>
												@endif
											</div>
											<button onclick="addToCart({{$product->id}})"  class="btn btn-info btn-sm mt-3 add-btn "><span class="icon_cart_alt mr-2"></span>Add to cart</button>

										</div>
										<input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">
									</div>
									@endforeach
										
									<!--=======  End of single banner slider product =======-->

								</div>
								
								<!--=======  End of banner slider container  =======-->

								<div class="row no-gutters">
									@if(!empty($bannerVertical1))
									@foreach($bannerVertical1 as $banner)
									<div class="col-lg-6 col-md-6 col-sm-6">
										<!--=======  slider banner  =======-->
										
										<div class="slider-banner">
											@if(!empty($banner->category_slug))
											<a href="{{ url('products/'.$banner->category_slug) }}">
										@else
										<a href="#">
										@endif
										<img src="{{ asset('storage/'.$banner->cover ?? '') }}" class="img-fluid" alt="">
									</a>
										</div>
										
										<!--=======  End of slider banner  =======-->
									</div>
									@endforeach
									@endif

								</div>
							</div>
						</div>
					</div>
					
					<!--=======  End of banner slider wrapper =======-->
				</div>
			</div>
		</div>
	</div>
	@endif
	




		<!--=============================================
	=           Featured Products Slider         =
	=============================================-->
	@if(!empty($featured_products))
	<div class="slider multisale-slider mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multisale  slider section title  =======-->
					
					<div class="section-title">
						<h3>Featured Products</h3>
					</div>
					
					<!--=======  End of multisale slider section title  =======-->
				</div>
			</div>
			
		
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multi sale slider wrapper  =======-->
					
					<div class="multisale-slider-wrapper">
						<!--=======  single multisale slider product  =======-->
						@foreach($featured_products as $product)
						<div class="gf-product multisale-slider-product">
						    <button  onclick="addToWishlist({{$product->id}})" class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt"></i></button>
							    
							<div class="image">
							    
							    
								<a href="{{ url('productDetail/'.$product->slug ?? '') }}" >
								@if($product->sale_price>0 && $product->sale_price<$product->price)
                                    <span class="onsale">Rs. {{$product->price-$product->sale_price}} OFF!</span>
                                    @endif
									@if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="" >
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
												@endif
								</a>
								<div class="product-hover-icons">
									<!--<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>-->
         <!--                           <a onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>-->
                                    <!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
                                    <a href="#" data-tooltip="Quick view" data-myid="{{$product->id}}" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<!-- <div class="product-countdown" data-countdown="2021/05/01"></div> -->
							<div class="product-content">
								<h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst(substr($product->name ?? '',0,50)) }}..</a></h3>
								<div class="product-categories">
									<a href="{{ url('products/'.$product->category_slug ?? 'all') }}">{{ ucfirst($product->category_name ?? '') }}</a>
									<!-- <a href="#">Vegetables</a> -->
								</div>
								<div class="price-box">
									<!-- <span class="main-price">$89.00</span> -->
									<span class="discounted-price">Rs. {{ $product->price ?? '0.00' }}</span>
								</div>
								<button onclick="addToCart({{$product->id}})"  class="btn btn-info btn-sm mt-3 add-btn "><span class="icon_cart_alt mr-2"></span>Add to cart</button>
							
							</div>
							<input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">
						</div>
						@endforeach
						
						
					</div>
					
					<!--=======  End of multi sale slider wrapper  =======-->
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--=====  End of Multi sale slider  ======-->







		<!--=============================================
	=           Featured Products Slider         =
	=============================================-->
	@if(!empty($trending_products))
	<div class="slider multisale-slider mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multisale  slider section title  =======-->
					
					<div class="section-title">
						<h3>Treding Products</h3>
					</div>
					
					<!--=======  End of multisale slider section title  =======-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multi sale slider wrapper  =======-->
					
					<div class="multisale-slider-wrapper">
						<!--=======  single multisale slider product  =======-->
						@foreach($trending_products as $product)
						<div class="gf-product multisale-slider-product">
						    <button  onclick="addToWishlist({{$product->id}})" class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt"></i></button>

							<div class="image">
								<a href="{{ url('productDetail/'.$product->slug ?? '') }}" >
									@if($product->sale_price>0 && $product->sale_price<$product->price)
                                    <span class="onsale">Rs. {{$product->price-$product->sale_price}} OFF!</span>
                                    @endif
									@if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="" >
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
												@endif
								</a>
								<div class="product-hover-icons">
									<!--<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>-->
                                    <!--   <a onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>-->
                                    <!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
                                    <a href="#" data-tooltip="Quick view" data-myid="{{$product->id}}" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<!-- <div class="product-countdown" data-countdown="2021/05/01"></div> -->
							<div class="product-content">
								<h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst(substr($product->name ?? '',0,50)) }}..</a></h3>
								<div class="product-categories">
									<a href="{{ url('products/'.$product->category_slug ?? '') }}">{{ ucfirst($product->category_name ?? '') }}</a>
									<!-- <a href="#">Vegetables</a> -->
								</div>
								<div class="price-box">
									@if(!empty($product->sale_price) && $product->sale_price<$product->price && $product->sale_price>0)
												<span class="main-price">Rs. {{ $product->price ?? '0' }}</span>
												<span class="discounted-price">Rs. {{ $product->sale_price ?? '0' }}</span>
												@else
												<span class="discounted-price">Rs. {{ $product->price ?? '0' }}</span>
												@endif
								</div>
								<button onclick="addToCart({{$product->id}})"  class="btn btn-info btn-sm mt-3 add-btn "><span class="icon_cart_alt mr-2"></span>Add to cart</button>

							</div>
							<input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">
						</div>
						@endforeach
						
						
					</div>
					
					<!--=======  End of multi sale slider wrapper  =======-->
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--=====  End of Multi sale slider  ======-->






		<!--=============================================
	=           Best Seller Slider         =
	=============================================-->
	@if(!empty($best_seller_products))
	<div class="slider multisale-slider mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multisale  slider section title  =======-->
					
					<div class="section-title">
						<h3>Best Seller Products</h3>
					</div>
					
					<!--=======  End of multisale slider section title  =======-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multi sale slider wrapper  =======-->
					
					<div class="multisale-slider-wrapper">
						<!--=======  single multisale slider product  =======-->
						@foreach($best_seller_products as $product)
						<div class="gf-product multisale-slider-product">
						    <button  onclick="addToWishlist({{$product->id}})" class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt"></i></button>

							<div class="image">
								<a href="{{ url('productDetail/'.$product->slug ?? '') }}" >
									@if($product->sale_price>0 && $product->sale_price<$product->price)
                                    <span class="onsale">Rs. {{$product->price-$product->sale_price}} OFF!</span>
                                    @endif
									@if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="" >
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
												@endif
								</a>
								<div class="product-hover-icons">
									<!--<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>-->
         <!--                           <a onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>-->
                                    <!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
                                    <a href="#" data-tooltip="Quick view" data-myid="{{$product->id}}" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<!-- <div class="product-countdown" data-countdown="2021/05/01"></div> -->
							<div class="product-content">
								<h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst(substr($product->name ?? '',0,50)) }}..</a></h3>
								<div class="product-categories">
									<a href="{{ url('products/'.$product->category_slug ?? '') }}">{{ ucfirst($product->category_name ?? '') }}</a>
									<!-- <a href="#">Vegetables</a> -->
								</div>
								<div class="price-box">
									@if(!empty($product->sale_price) && $product->sale_price<$product->price && $product->sale_price>0)
												<span class="main-price">Rs. {{ $product->price ?? '0' }}</span>
												<span class="discounted-price">Rs. {{ $product->sale_price ?? '0' }}</span>
												@else
												<span class="discounted-price">Rs. {{ $product->price ?? '0' }}</span>
												@endif
								</div>
								<button onclick="addToCart({{$product->id}})"  class="btn btn-info btn-sm mt-3 add-btn "><span class="icon_cart_alt mr-2"></span>Add to cart</button>

							</div>
							<input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">
						</div>
						@endforeach
						
						
					</div>
					
					<!--=======  End of multi sale slider wrapper  =======-->
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--=====  End of Multi sale slider  ======-->










	<div class="slider multisale-slider mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				@if(!empty($bannerVertical2))
				@foreach($bannerVertical2 as $banner)
				<div class="col-sm-4">
					@if(!empty($banner->category_slug))
											<a href="{{ url('products/'.$banner->category_slug) }}">
										@else
										<a href="#">
										@endif
					<img src="{{ asset('storage/'.$banner->cover) }}" style="width: 100%; height: auto; margin-bottom: 20px; ">
				</a>
				</div>
				@endforeach
				@endif
				
			</div>

</div>
</div>



		<!--=============================================
	=           Featured Products Slider         =
	=============================================-->
	@if(!empty($top_rated_products) && count($top_rated_products))
	<div class="slider multisale-slider mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multisale  slider section title  =======-->
					
					<div class="section-title">
						<h3>Top Rated Products</h3>
					</div>
					
					<!--=======  End of multisale slider section title  =======-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multi sale slider wrapper  =======-->
					
					<div class="multisale-slider-wrapper">
						<!--=======  single multisale slider product  =======-->
						@foreach($top_rated_products as $product)
						<div class="gf-product multisale-slider-product">
						    <button  onclick="addToWishlist({{$product->id}})" class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt"></i></button>

							<div class="image">
								<a href="#">
									@if($product->sale_price>0 && $product->sale_price<$product->price)
                                    <span class="onsale">Rs. {{$product->price-$product->sale_price}} OFF!</span>
                                    @endif
									@if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
												@endif
								</a>
								<div class="product-hover-icons">
									<!--<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>-->
         <!--                           <a onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>-->
                                    <!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
                                    <a href="#" data-tooltip="Quick view" data-myid="{{$product->id}}" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<!-- <div class="product-countdown" data-countdown="2021/05/01"></div> -->
							<div class="product-content">
								<h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug) }}">{{ ucfirst(substr($product->name ?? '',0,50)) }}..</a></h3>
								<div class="product-categories">
									<a href="{{ url('products/'.$product->category_slug ?? 'all') }}">{{ ucfirst($product->category_name ?? '') }}</a>
									<!-- <a href="#">Vegetables</a> -->
								</div>
								<div class="price-box">
									<!-- <span class="main-price">$89.00</span> -->
									<span class="discounted-price">Rs. {{ $product->price ?? '0.00' }}</span>
								</div>
								<button onclick="addToCart({{$product->id}})"  class="btn btn-info btn-sm mt-3 add-btn "><span class="icon_cart_alt mr-2"></span>Add to cart</button>

							</div>
							<input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">
						</div>
						@endforeach
						
						
					</div>
					
					<!--=======  End of multi sale slider wrapper  =======-->
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--=====  End of Multi sale slider  ======-->


<style>

#myslidersec h2 {
	color: #333;
	text-align: center;
	text-transform: uppercase;
	font-family: "Roboto", sans-serif;
	font-weight: bold;
	position: relative;
	margin: 30px 0 60px;
}
#myslidersec h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 3px;
	background: #8fbc54;
	left: 0;
	right: 0;
	bottom: -10px;
}
#myslidersec .col-center {
	margin: 0 auto;
	float: none !important;
}
#myslidersec .carousel {
	padding: 20px 70px;
}
#myslidersec .carousel .carousel-item {
	color: #999;
	font-size: 14px;
	text-align: center;
	overflow: hidden;
	min-height: 290px;
}
#myslidersec .carousel .carousel-item .img-box {
	width: 135px;
	height: 135px;
	margin: 0 auto;
	padding: 5px;
	border: 1px solid #ddd;
	border-radius: 50%;
}
#myslidersec .carousel .img-box img {
	width: 123px;
	height: 123px;
	display: block;
	object-fit: cover;
    object-position: top;
	border-radius: 50%;
}
#myslidersec .carousel .testimonial2 {
	padding: 30px 0 10px;
}
#myslidersec .carousel .overview {	
	font-style: italic;
}
#myslidersec .carousel .overview b {
	text-transform: uppercase;
	color: #7AA641;
}
#myslidersec .carousel-control-prev, .carousel-control-next {
	width: 40px;
	height: 40px;
	margin-top: -20px;
	top: 50%;
	background: none;
}
#myslidersec .carousel-control-prev i, .carousel-control-next i {
	font-size: 68px;
	line-height: 42px;
	position: absolute;
	display: inline-block;
	color: rgba(0, 0, 0, 0.8);
	text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
}
#myslidersec .carousel-indicators {
	bottom: -40px;
}
#myslidersec .carousel-indicators li, .carousel-indicators li.active {
	width: 12px;
	height: 12px;
	margin: 1px 3px;
	border-radius: 50%;
	border: none;
}
#myslidersec .carousel-indicators li {	
	background: #999;
	border-color: transparent;
	box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}
#myslidersec .carousel-indicators li.active {	
	background: #555;		
	box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}

#myCarousel {background-color: #ffffff;
    -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
    margin: 50px 0; padding:30px 10px; }
</style>
<!-- 
@if($testimonials)
<div class="container-fluid" style="margin: 0 5%; width: 90%" id="myslidersec">
	<div class="row">
	 <div class="col-lg-12 mx-auto" >
			<h2>testimonial</h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				
				<ol class="carousel-indicators">
					@foreach($testimonials as $key => $test)
					<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="@if($key==0){{'active'}}@endif"></li>
				@endforeach
				</ol>   
				
				<div class="carousel-inner">
					@foreach($testimonials as $key => $test)
					<div class="carousel-item @if($key==0){{'active'}}@endif">
						<div class="img-box">
						    <img alt="" src="{{ asset('storage/'.$test->cover ?? '') }}"></div>
						<p class="testimonial2"><?php echo $test->description ?> </p>
						<p class="overview"><b> {{ ucfirst($test->name ?? '') }},</b> {{ ucfirst($test->profession ?? '') }}</p>
					</div>
				@endforeach
					
				</div>
			
				<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="carousel-control-next" href="#myCarousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
</div>

@endif -->



<!--=============================================
	=           Testimonial slider container         =
	=============================================-->
	@if($testimonials)
	
 <section class="testimonial text-center slider blog-slider ">
        <div class="container-fluid" style="margin: 0 5%; width: 90%">

            <div class="heading white-heading">
                Testimonial
            </div>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">
                	@foreach($testimonials as $key => $test)
                    <div class="carousel-item @if($key == 0){{'active'}}@endif">
                        <div class="testimonial4_slide">
                            <img src="{{ asset('storage/'.$test->cover ?? '') }}" class="img-circle img-responsive" />
                           <p><?php echo $test->description ?></p>
                            <h4>{{ ucfirst($test->name ?? '') }}</h4>
                            <h5>{{ ucfirst($test->profession ?? '') }}</h5>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>

    @endif
	
	<!--=====  End of Testimonial Slider  ======-->



	@if(!empty($brands))
	<!--=============================================
	=            Brand logo slider         =
	=============================================-->
	
	<div class="slider brand-logo-slider mb-35">
		<div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  blog slider section title  =======-->
					
					<div class="section-title">
						<h3>brand logos</h3>
					</div>
					
					<!--=======  End of blog slider section title  =======-->
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<!--=======  brand logo wrapper  =======-->
					
					<div class="brand-logo-wrapper pt-20 pb-20">


						@foreach($brands as $brand)
						<!--=======  single-brand-logo  =======-->

						<div class="col">
							<div class="single-brand-logo">
								<a href="{{ url('brand/products/'.$brand->name.'@'.$brand->id) }}">
									<img src="{{ asset('storage/'.$brand->cover ?? 'product-default.png') }}" class="img-fluid" alt="{{ ucfirst($brand->name ?? '') }}">
								</a>
							</div>
						</div>
						
						<!--=======  End of single-brand-logo  =======-->
						<!--=======  single-brand-logo  =======-->
						@endforeach

						
					</div>
					
					<!--=======  End of brand logo wrapper  =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Brand logo slider  ======-->
	@endif


@endsection
