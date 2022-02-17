@extends('layouts.front.app')

@section('content')

	<!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-50">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumb-container">
						<ul>
							<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
							<li class="active">{{ ucfirst($productCategory->name ?? '') }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of breadcrumb area  ======-->

  
	<!--=============================================
	=            Shop page container         =
	=============================================-->
	
	<div class="shop-page-container mb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<!--=======  sidebar area  =======-->
					
					<div class="sidebar-area">
						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">PRODUCT CATEGORIES</h3>
							<ul class="product-categories">
								<li><a class="active" href="#">Beans</a></li>
								<li><a href="#">Bread</a></li>
								<li><a href="#">Eggs</a></li>
								<li><a href="#">Fruits</a></li>
								<li><a href="#">Salads</a></li>
								<li><a href="#">Fast Foods</a></li>
								<li><a href="#">Fish & Meats</a></li>
								<li><a href="#">Uncategorized</a></li>
							</ul>
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Filter By</h3>
							<ul class="product-categories">
								<li><a class="active" href="#">Gold</a></li>
								<li><a href="#">Green</a></li>
								<li><a href="#">White</a></li>
							</ul>
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Filter By Price</h3>
							<div class="sidebar-price">
								<div id="price-range"></div>
								<input type="text" id="price-amount" readonly>
							</div>
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Compare</h3>

							<!--=======  compare product container  =======-->
							
							<ul class="product-list">
								<li>
									<a href="#" class="remove" title="Remove">x</a>
									<a class="title" href="#">Cillum dolore tortor nisl fermentum</a>
								</li>
								<li>
									<a href="#" class="remove" title="Remove">x</a>
									<a class="title" href="#">Condimentum posuere consectetur</a>
								</li>
							</ul>
							<div class="compare-btns">
								<a href="#" class="clear-all">Clear all</a>
								<a href="#" class="compare">Compare</a>
							</div>

							<!--=======  End of compare product container  =======-->
							
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Top rated products</h3>
							
							<!--=======  top rated product container  =======-->
							
							<div class="top-rated-product-container">
								<!--=======  single top rated product  =======-->
								
								<div class="single-top-rated-product d-flex align-content-center">
									<div class="image">
										<a href="#">
											<img src="{{ asset('assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
										</a>
									</div>
									<div class="content">
										<p><a href="#">Eodem modo vel mattis</a></p>
										<p class="product-rating">
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
										</p>

										<p class="product-price"> 
											<span class="discounted-price"> $10.00</span>
											<span class="main-price">$12.90</span> 
											
										</p>
									</div>
								</div>
								
								<!--=======  End of single top rated product  =======-->
								<!--=======  single top rated product  =======-->
								
								<div class="single-top-rated-product d-flex align-content-center">
									<div class="image">
										<a href="#">
											<img src="{{ asset('assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
										</a>
									</div>
									<div class="content">
										<p><a href="#">Mirum est notare tellus</a></p>
										<p class="product-rating">
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
										</p>

										<p class="product-price"> 
											<span class="discounted-price"> $10.00</span>
											<span class="main-price">$12.90</span> 
											
										</p>
									</div>
								</div>
								
								<!--=======  End of single top rated product  =======-->
								<!--=======  single top rated product  =======-->
								
								<div class="single-top-rated-product d-flex align-content-center">
									<div class="image">
										<a href="#">
											<img src="{{ asset('assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
										</a>
									</div>
									<div class="content">
										<p><a href="#">Aliquam lobortis est turpis</a></p>
										<p class="product-rating">
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
										</p>

										<p class="product-price"> 
											<span class="discounted-price"> $10.00</span>
											<span class="main-price">$12.90</span> 
											
										</p>
									</div>
								</div>
								
								<!--=======  End of single top rated product  =======-->
								
							</div>
							
							<!--=======  End of top rated product container  =======-->
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar">
							<h3 class="sidebar-title">Product Tags</h3>
							<!--=======  tag container  =======-->
							
							<ul class="tag-container">
								<li><a href="#">new</a> </li>
								<li><a href="#">bags</a> </li>
								<li><a href="#">new</a> </li>
								<li><a href="#">kids</a> </li>
								<li><a href="#">fashion</a> </li>
								<li><a href="#">Accessories</a> </li>
							</ul>
							
							<!--=======  End of tag container  =======-->
						</div>
						
						<!--=======  End of single sidebar  =======-->
					</div>
					
					<!--=======  End of sidebar area  =======-->
				</div>
				<div class="col-lg-9 order-1 order-lg-2 mb-sm-35 mb-xs-35">

					<!--=======  shop page banner  =======-->
					
					<!-- <div class="shop-page-banner mb-35">
						<a href="#">
							<img src="{{ asset('assets/images/banners/shop-banner.jpg') }}" class="img-fluid" alt="">
						</a>
					</div> -->
					
					<!--=======  End of shop page banner  =======-->

					<!--=======  Shop header  =======-->
					
					<div class="shop-header mb-35">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center">
								<!--=======  view mode  =======-->
								
								<div class="view-mode-icons mb-xs-10">
									<a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
									<a href="#" data-target="list"><i class="fa fa-list"></i></a>
								</div>
								
								<!--=======  End of view mode  =======-->
								
							</div>
							<div class="col-lg-8 col-md-8 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
								<!--=======  Sort by dropdown  =======-->
								
								<div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
									<p class="mr-10">Sort By: </p>
									<select name="sort-by" id="sort-by" class="nice-select">
										<option value="0">Sort By Popularity</option>
										<option value="0">Sort By Average Rating</option>
										<option value="0">Sort By Newness</option>
										<option value="0">Sort By Price: Low to High</option>
										<option value="0">Sort By Price: High to Low</option>
									</select>
								</div>
								
								<!--=======  End of Sort by dropdown  =======-->

								<p class="result-show-message">Showing 1–12 of 41 results</p>
							</div>
						</div>
					</div>
					
					<!--=======  End of Shop header  =======-->

					<!--=======  Grid list view  =======-->
					
					<div class="shop-product-wrap grid row no-gutters mb-35">
						@if(!empty($searched_products))
								@foreach($searched_products as $product)
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="#">
											@if($product->sell_price != NULL)
											<span class="onsale">Sale!</span>
											@endif
											<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="{{ url('products/'.$product->category_slug ?? '') }}">{{ $product->category_name ?? '' }}</a>
											<!-- <a href="#">Vegetables</a> -->
										</div>
										<h3 class="product-title"><a href="#">{{ ucfirst($product->name ?? '') }}</a></h3>
										<div class="price-box">
											@if($product->sell_price != NULL)
											<span class="main-price">Rs. {{ $product->sell_price }}</span>
											@endif
											<span class="discounted-price">Rs. {{ $product->price }}</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="#">
											@if($product->sell_price != NULL)
											<span class="onsale">Sale!</span>
											@endif
											<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="{{ url('products/'.$product->category_slug ?? '') }}">{{ $product->category_name ?? '' }}</a>
										</div>
										<h3 class="product-title"><a href="#">{{ ucfirst($product->name ?? '') }}</a></h3>
										<div class="price-box mb-20">
											@if($product->sell_price != NULL)
											<span class="main-price">Rs. {{ $product->sell_price }}</span>
											@endif
											<span class="discounted-price">Rs. {{ $product->price }}</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>

							@endforeach
								@endif
								
	
							
	
							
	
							
	
							

	
							
							
					</div>
					
					<!--=======  End of Grid list view  =======-->

					<!--=======  Pagination container  =======-->
					
				<!-- 	<div class="pagination-container">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
								
									
									<div class="pagination-content text-center">
										<ul>
											<li><a class="active" href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
										</ul>
									</div>
									
								
								</div>
							</div>
						</div>
					</div>
					 -->
					<!--=======  End of Pagination container  =======-->

				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Shop page container  ======-->


@endsection