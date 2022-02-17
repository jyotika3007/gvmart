@extends('layouts.front.app')

@section('content')

<style type="text/css">
	@if(!empty($banners))
	@foreach($banners as $key => $banner)
	.slider-bg-{{$key}} {
    background-image: url(/storage/{{$banner->cover ?? ''}});
}
    @endforeach
    @endif
</style>

	<!--=============================================
	=            Hero slider Area         =
	=============================================-->
	
	@if(!empty($banners))

	<div class="hero-slider-container mb-35">
		<!--=======  Slider area  =======-->
		
		<div class="hero-slider-one">
				
	@foreach($banners as $key => $banner)
			<!--=======  hero slider item  =======-->
			<div class="hero-slider-item slider-bg-{{$key}}">
					<div class="slider-content d-flex flex-column justify-content-center align-items-center">
						<h1>{{ $banner->title ?? '' }}</h1>
						<!-- <p>get fresh food from our firm to your table</p> -->
						<a href="#" class="slider-btn">SHOP NOW</a>
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
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="policy-titles d-flex align-items-center flex-wrap">
						<!--=======  single policy  =======-->
						
						<div class="single-policy">
							<span><img src="{{ asset('assets/images/policy-icon1.png') }}" class="img-fluid" alt=""></span>
							<p> FREE SHIPPING ON ORDERS OVER $200</p>
						</div>
						
						<!--=======  End of single policy  =======-->


						<!--=======  single policy  =======-->
						
						<div class="single-policy">
							<span><img src="{{ asset('assets/images/policy-icon2.png') }}" class="img-fluid" alt=""></span>
							<p>30 -DAY RETURNS MONEY BACK</p>
						</div>
						
						<!--=======  End of single policy  =======-->
						
						<!--=============================================
						=            single policy         =
						=============================================-->
						
						<div class="single-policy">
							<span><img src="{{ asset('assets/images/policy-icon3.png') }}" class="img-fluid" alt=""></span>
							<p> 24/7 SUPPORT</p>
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
		<div class="container">
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
									<img src="{{ asset('storage/'.$category->cover ?? '') }}" class="img-fluid" alt="">
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
	
	<div class="slider slider-with-banner mb-35">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  blog slider section title  =======-->
					
					<div class="section-title red-title">
						<h3>fist & meals</h3>
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
									<a href="#">
										<img src="{{ asset('assets/images/banners/home4-category2-sidebar.jpg') }}" class="img-fluid" alt="">
									</a>
								</div>
								
								<!--=======  End of slider side banner  =======-->
							</div>
							<div class="col-lg-8 col-md-8 col-sm-12">
								<!--=======  banner slider container  =======-->
								
								<div class="banner-slider-container">
									<!--=======  single banner slider product  =======-->
						
													
									<div class="gf-product banner-slider-product">
										<div class="image">
											<a href="#">
												<span class="onsale">Sale!</span>
												<img src="{{ asset('assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
											</a>
											<div class="product-hover-icons">
												<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
											</div>
										</div>
										<div class="product-content">
											<div class="product-categories">
												<a href="#">Fast Foods</a>,
												<a href="#">Vegetables</a>
											</div>
											<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
											<div class="price-box">
												<span class="main-price">$89.00</span>
												<span class="discounted-price">$80.00</span>
											</div>
										</div>
										
									</div>
										
									<!--=======  End of single banner slider product =======-->
									<!--=======  single banner slider product  =======-->
									
													
									<div class="gf-product banner-slider-product">
										<div class="image">
											<a href="#">
												<span class="onsale">Sale!</span>
												<img src="{{ asset('assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
											</a>
											<div class="product-hover-icons">
												<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
											</div>
										</div>
										<div class="product-content">
											<div class="product-categories">
												<a href="#">Fast Foods</a>,
												<a href="#">Vegetables</a>
											</div>
											<h3 class="product-title"><a href="#">Sed tempor ehicula non commodo</a></h3>
											<div class="price-box">
												<span class="main-price">$89.00</span>
												<span class="discounted-price">$80.00</span>
											</div>
										</div>
										
									</div>
									
									<!--=======  End of single banner slider product =======-->
									<!--=======  single banner slider product  =======-->
									
													
									<div class="gf-product  banner-slider-product">
										<div class="image">
											<a href="#">
												<span class="onsale">Sale!</span>
												<img src="{{ asset('assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
											</a>
											<div class="product-hover-icons">
												<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
											</div>
										</div>
										<div class="product-content">
											<div class="product-categories">
												<a href="#">Fast Foods</a>,
												<a href="#">Vegetables</a>
											</div>
											<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
											<div class="price-box">
												<span class="main-price">$89.00</span>
												<span class="discounted-price">$80.00</span>
											</div>
										</div>
										
									</div>
									
									<!--=======  End of single banner slider product =======-->
									<!--=======  single banner slider product  =======-->
									
													
									<div class="gf-product  banner-slider-product">
										<div class="image">
											<a href="#">
												<span class="onsale">Sale!</span>
												<img src="{{ asset('assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
											</a>
											<div class="product-hover-icons">
												<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
											</div>
										</div>
										<div class="product-content">
											<div class="product-categories">
												<a href="#">Fast Foods</a>,
												<a href="#">Vegetables</a>
											</div>
											<h3 class="product-title"><a href="#">Sed tempor ehicula non commodo</a></h3>
											<div class="price-box">
												<span class="main-price">$89.00</span>
												<span class="discounted-price">$80.00</span>
											</div>
										</div>
										
									</div>
								
									<!--=======  End of single banner slider product =======-->
									<!--=======  single banner slider product  =======-->
									
													
									<div class="gf-product  banner-slider-product">
										<div class="image">
											<a href="#">
												<span class="onsale">Sale!</span>
												<img src="{{ asset('assets/images/products/product05.jpg') }}" class="img-fluid" alt="">
											</a>
											<div class="product-hover-icons">
												<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
											</div>
										</div>
										<div class="product-content">
											<div class="product-categories">
												<a href="#">Fast Foods</a>,
												<a href="#">Vegetables</a>
											</div>
											<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
											<div class="price-box">
												<span class="main-price">$89.00</span>
												<span class="discounted-price">$80.00</span>
											</div>
										</div>
										
									</div>
									
									<!--=======  End of single banner slider product =======-->
								</div>
								
								<!--=======  End of banner slider container  =======-->

								<div class="row no-gutters">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<!--=======  slider banner  =======-->
										
										<div class="slider-banner">
											<a href="#">
												<img src="{{ asset('assets/images/banners/home4-category2-banner1.jpg') }}" class="img-fluid" alt="">
											</a>
										</div>
										
										<!--=======  End of slider banner  =======-->
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<!--=======  slider banner  =======-->
										
										<div class="slider-banner">
											<a href="#">
												<img src="{{ asset('assets/images/banners/home4-category2-banner2.jpg') }}" class="img-fluid" alt="">
											</a>
										</div>
										
										<!--=======  End of slider banner  =======-->
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--=======  End of banner slider wrapper =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Slider with banner ======-->

	<!--=============================================
	=            Multi sale slider         =
	=============================================-->
	
	<div class="slider multisale-slider mb-35">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multisale  slider section title  =======-->
					
					<div class="section-title">
						<h3>gv mart deal of the day</h3>
					</div>
					
					<!--=======  End of multisale slider section title  =======-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!--=======  multi sale slider wrapper  =======-->
					
					<div class="multisale-slider-wrapper">
						<!--=======  single multisale slider product  =======-->
						
						<div class="gf-product multisale-slider-product">
							<div class="image">
								<a href="#">
									<span class="onsale">Sale!</span>
									<img src="{{ asset('assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
								</a>
								<div class="product-hover-icons">
									<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
									<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
									<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
									<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<div class="product-countdown" data-countdown="2021/05/01"></div>
							<div class="product-content">
								<div class="product-categories">
									<a href="#">Fast Foods</a>,
									<a href="#">Vegetables</a>
								</div>
								<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
								<div class="price-box">
									<span class="main-price">$89.00</span>
									<span class="discounted-price">$80.00</span>
								</div>
							</div>
							
						</div>
						
						<!--=======  End of single multisale slider product  =======-->
						<!--=======  single multisale slider product  =======-->
						
						<div class="gf-product multisale-slider-product">
							<div class="image">
								<a href="#">
									<span class="onsale">Sale!</span>
									<img src="{{ asset('assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
								</a>
								<div class="product-hover-icons">
									<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
									<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
									<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
									<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<div class="product-countdown" data-countdown="2020/02/01"></div>
							<div class="product-content">
								<div class="product-categories">
									<a href="#">Fast Foods</a>,
									<a href="#">Vegetables</a>
								</div>
								<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
								<div class="price-box">
									<span class="main-price">$89.00</span>
									<span class="discounted-price">$80.00</span>
								</div>
							</div>
							
						</div>
						
						<!--=======  End of single multisale slider product  =======-->
						<!--=======  single multisale slider product  =======-->
						
						<div class="gf-product multisale-slider-product">
							<div class="image">
								<a href="#">
									<span class="onsale">Sale!</span>
									<img src="{{ asset('assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
								</a>
								<div class="product-hover-icons">
									<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
									<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
									<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
									<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<div class="product-countdown" data-countdown="2020/06/01"></div>
							<div class="product-content">
								<div class="product-categories">
									<a href="#">Fast Foods</a>,
									<a href="#">Vegetables</a>
								</div>
								<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
								<div class="price-box">
									<span class="main-price">$89.00</span>
									<span class="discounted-price">$80.00</span>
								</div>
							</div>
							
						</div>
						
						<!--=======  End of single multisale slider product  =======-->
						<!--=======  single multisale slider product  =======-->
						
						<div class="gf-product multisale-slider-product">
							<div class="image">
								<a href="#">
									<span class="onsale">Sale!</span>
									<img src="{{ asset('assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
								</a>
								<div class="product-hover-icons">
									<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
									<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
									<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
									<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<div class="product-countdown" data-countdown="2020/05/21"></div>
							<div class="product-content">
								<div class="product-categories">
									<a href="#">Fast Foods</a>,
									<a href="#">Vegetables</a>
								</div>
								<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
								<div class="price-box">
									<span class="main-price">$89.00</span>
									<span class="discounted-price">$80.00</span>
								</div>
							</div>
							
						</div>
						
						<!--=======  End of single multisale slider product  =======-->
						<!--=======  single multisale slider product  =======-->
						
						<div class="gf-product multisale-slider-product">
							<div class="image">
								<a href="#">
									<span class="onsale">Sale!</span>
									<img src="{{ asset('assets/images/products/product05.jpg') }}" class="img-fluid" alt="">
								</a>
								<div class="product-hover-icons">
									<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
									<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
									<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
									<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<div class="product-countdown" data-countdown="2022/01/10"></div>
							<div class="product-content">
								<div class="product-categories">
									<a href="#">Fast Foods</a>,
									<a href="#">Vegetables</a>
								</div>
								<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
								<div class="price-box">
									<span class="main-price">$89.00</span>
									<span class="discounted-price">$80.00</span>
								</div>
							</div>
							
						</div>
						
						<!--=======  End of single multisale slider product  =======-->
					</div>
					
					<!--=======  End of multi sale slider wrapper  =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Multi sale slider  ======-->



		<!--=============================================
	=           Featured Products Slider         =
	=============================================-->
	@if(!empty($featured_products))
	<div class="slider multisale-slider mb-35">
		<div class="container">
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
							<div class="image">
								<a href="#">
									<span class="onsale">Sale!</span>
									<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
								</a>
								<div class="product-hover-icons">
									<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
									<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
									<!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
									<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<!-- <div class="product-countdown" data-countdown="2021/05/01"></div> -->
							<div class="product-content">
								<div class="product-categories">
									<a href="{{ url('products/'.$product->category_slug ?? 'all') }}">{{ ucfirst($product->category_name ?? '') }}</a>
									<!-- <a href="#">Vegetables</a> -->
								</div>
								<h3 class="product-title"><a href="#">{{ ucfirst($product->name ?? '') }}</a></h3>
								<div class="price-box">
									<!-- <span class="main-price">$89.00</span> -->
									<span class="discounted-price">Rs. {{ $product->price ?? '0.00' }}</span>
								</div>
							</div>
							
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
		<div class="container">
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
						@foreach($trending_products as $product)
						<div class="gf-product multisale-slider-product">
							<div class="image">
								<a href="#">
									<span class="onsale">Sale!</span>
									<img src="{{ asset('assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
								</a>
								<div class="product-hover-icons">
									<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
									<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
									<!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
									<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
								</div>
							</div>
							<!-- <div class="product-countdown" data-countdown="2021/05/01"></div> -->
							<div class="product-content">
								<div class="product-categories">
									<a href="#">Fast Foods</a>,
									<a href="#">Vegetables</a>
								</div>
								<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
								<div class="price-box">
									<!-- <span class="main-price">$89.00</span> -->
									<span class="discounted-price">$80.00</span>
								</div>
							</div>
							
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
	=            Best seller slider         =
	=============================================-->
	
	<div class="slider best-seller-slider mb-35">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  category slider section title  =======-->

					<div class="section-title">
						<h3>best seller</h3>
					</div>
					
					<!--=======  End of category slider section title  =======-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!--=======  best seller slider container  =======-->
					
					<div class="best-seller-slider-container pt-15 pb-15">

						<!--=======  single best seller product  =======-->
						<div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="#">
													<img src="{{ asset('assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="#">Fast Foods</a>,
													<a href="#">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="#">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
										<div class="row">
											<div class="col-lg-4 pl-0 pr-0">
												<div class="image">
													<a href="#">
														<img src="{{ asset('assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
													</a>
												</div>
											</div>
											<div class="col-lg-8 pl-0 pr-0">
												<div class="product-content">
													<div class="product-categories">
														<a href="#">Fast Foods</a>,
														<a href="#">Vegetables</a>
													</div>
													<h3 class="product-title"><a href="#">Officiis debitis varius risus</a></h3>
													<div class="price-box">
														<span class="main-price">$89.00</span>
														<span class="discounted-price">$80.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="#">
													<img src="{{ asset('assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="#">Fast Foods</a>,
													<a href="#">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="#">Phasellus vel hendrerit eget</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
										<div class="row">
											<div class="col-lg-4 pl-0 pr-0">
												<div class="image">
													<a href="#">
														<img src="{{ asset('assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
													</a>
												</div>
											</div>
											<div class="col-lg-8 pl-0 pr-0">
												<div class="product-content">
													<div class="product-categories">
														<a href="#">Fast Foods</a>,
														<a href="#">Vegetables</a>
													</div>
													<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
													<div class="price-box">
														<span class="main-price">$89.00</span>
														<span class="discounted-price">$80.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="#">
													<img src="{{ asset('assets/images/products/product05.jpg') }}" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="#">Fast Foods</a>,
													<a href="#">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="#">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
										<div class="row">
											<div class="col-lg-4 pl-0 pr-0">
												<div class="image">
													<a href="#">
														<img src="{{ asset('assets/images/products/product06.jpg') }}" class="img-fluid" alt="">
													</a>
												</div>
											</div>
											<div class="col-lg-8 pl-0 pr-0">
												<div class="product-content">
													<div class="product-categories">
														<a href="#">Fast Foods</a>,
														<a href="#">Vegetables</a>
													</div>
													<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
													<div class="price-box">
														<span class="main-price">$89.00</span>
														<span class="discounted-price">$80.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="#">
													<img src="{{ asset('assets/images/products/product07.jpg') }}" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="#">Fast Foods</a>,
													<a href="#">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="#">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
										<div class="row">
											<div class="col-lg-4 pl-0 pr-0">
												<div class="image">
													<a href="#">
														<img src="{{ asset('assets/images/products/product08.jpg') }}" class="img-fluid" alt="">
													</a>
												</div>
											</div>
											<div class="col-lg-8 pl-0 pr-0">
												<div class="product-content">
													<div class="product-categories">
														<a href="#">Fast Foods</a>,
														<a href="#">Vegetables</a>
													</div>
													<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
													<div class="price-box">
														<span class="main-price">$89.00</span>
														<span class="discounted-price">$80.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="#">
													<img src="{{ asset('assets/images/products/product09.jpg') }}" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="#">Fast Foods</a>,
													<a href="#">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="#">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
										<div class="row">
											<div class="col-lg-4 pl-0 pr-0">
												<div class="image">
													<a href="#">
														<img src="{{ asset('assets/images/products/product10.jpg') }}" class="img-fluid" alt="">
													</a>
												</div>
											</div>
											<div class="col-lg-8 pl-0 pr-0">
												<div class="product-content">
													<div class="product-categories">
														<a href="#">Fast Foods</a>,
														<a href="#">Vegetables</a>
													</div>
													<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
													<div class="price-box">
														<span class="main-price">$89.00</span>
														<span class="discounted-price">$80.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="#">
													<img src="{{ asset('assets/images/products/product11.jpg') }}" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="#">Fast Foods</a>,
													<a href="#">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="#">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
										<div class="row">
											<div class="col-lg-4 pl-0 pr-0">
												<div class="image">
													<a href="#">
														<img src="{{ asset('assets/images/products/product12.jpg') }}" class="img-fluid" alt="">
													</a>
												</div>
											</div>
											<div class="col-lg-8 pl-0 pr-0">
												<div class="product-content">
													<div class="product-categories">
														<a href="#">Fast Foods</a>,
														<a href="#">Vegetables</a>
													</div>
													<h3 class="product-title"><a href="#">Ornare sed consequat nisl eget</a></h3>
													<div class="price-box">
														<span class="main-price">$89.00</span>
														<span class="discounted-price">$80.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						<!--=======  End of single best seller product  =======-->

					</div>
					
					<!--=======  End of best seller slider container  =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Best seller slider  ======-->




	<!--=============================================
	=            Blog post slider container         =
	=============================================-->
	
	<div class="slider blog-slider mb-35">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  blog slider section title  =======-->
					
					<div class="section-title">
						<h3>gv mart news</h3>
					</div>
					
					<!--=======  End of blog slider section title  =======-->
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<!--=======  blog slide container  =======-->
					
					<div class="blog-slider-container pt-30 pb-30 pr-30 pl-30">

							<!--=======  single blog post  =======-->
							<div class="col">
								<div class="single-post-wrapper">
									<div class="post-thumb">
										<a href="#">
											<img src="{{ asset('assets/images/blog-image/blog01.jpg') }}" class="img-fluid" alt="">
										</a>
									</div>
									<div class="post-info">
										<div class="post-meta">
											<div class="post-date">29.09.2019</div>
										</div>
										<h3 class="post-title"><a href="#">Blog image post</a></h3>
										<a href="#" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
							
							<!--=======  End of single blog post  =======-->

							<!--=======  single blog post  =======-->
							<div class="col">
								<div class="single-post-wrapper">
									<div class="post-thumb">
										<a href="#">
											<img src="{{ asset('assets/images/blog-image/blog02.jpg') }}" class="img-fluid" alt="">
										</a>
									</div>
									<div class="post-info">
										<div class="post-meta">
											<div class="post-date">29.09.2019</div>
										</div>
										<h3 class="post-title"><a href="#">Post with gallery</a></h3>
										<a href="#" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
							
							<!--=======  End of single blog post  =======-->

							<!--=======  single blog post  =======-->
							<div class="col">
								<div class="single-post-wrapper">
									<div class="post-thumb">
										<a href="#">
											<img src="{{ asset('assets/images/blog-image/blog03.jpg') }}" class="img-fluid" alt="">
										</a>
									</div>
									<div class="post-info">
										<div class="post-meta">
											<div class="post-date">29.09.2019</div>
										</div>
										<h3 class="post-title"><a href="#">Blog with audio</a></h3>
										<a href="#" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
							
							<!--=======  End of single blog post  =======-->

							<!--=======  single blog post  =======-->
							<div class="col">
								<div class="single-post-wrapper">
									<div class="post-thumb">
										<a href="#">
											<img src="{{ asset('assets/images/blog-image/blog04.jpg') }}" class="img-fluid" alt="">
										</a>
									</div>
									<div class="post-info">
										<div class="post-meta">
											<div class="post-date">29.09.2019</div>
										</div>
										<h3 class="post-title"><a href="#">Blog with video</a></h3>
										<a href="#" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
							
							<!--=======  End of single blog post  =======-->

					</div>
					
					<!--=======  End of blog slide container  =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Blog post slider  ======-->



	@if(!empty($brands))
	<!--=============================================
	=            Brand logo slider         =
	=============================================-->
	
	<div class="slider brand-logo-slider mb-35">
		<div class="container">
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
								<a href="#">
									<img src="{{ asset('storage/'.$brand->cover ?? '') }}" class="img-fluid" alt="{{ ucfirst($brand->name ?? '') }}">
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