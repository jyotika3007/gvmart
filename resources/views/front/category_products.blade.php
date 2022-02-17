@extends('layouts.front.app')

@section('content')

<style>
    
    .onsale{
        background-color: orange;
        font-size: 14px;
    }
    
</style>

@php $proCount = 0 @endphp
	<!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-50">
		<div class="container-fluid" style="margin: 0 1%; width: 98%;">
			<div class="row">
				<div class="col">
					<div class="breadcrumb-container">
						<ul>
							<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
							<li class="active">{{ ucfirst($productCategory->name ?? '') }} @if(!empty($brand)){{ $brand->name ?? '' }}@endif</li>
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
		<div class="container-fluid" style="margin: 0 1%; width: 98%;">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<!--=======  sidebar area  =======-->
					
					<div class="sidebar-area">
						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">PRODUCT CATEGORIES</h3>
							<ul class="product-categories">
								@foreach($allCategories as $key => $category)
								<li><a class="proCat @if($slug==$category->slug){{ 'active' }}@endif" href="{{ url('products/'.$category->slug ?? '') }}">{{ ucfirst($category->name ?? '') }}</a></li>
								@endforeach
							</ul>
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						@if(!empty($colors) && count($colors)>0)
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Filter By Color</h3>
							<ul class="product-categories">
								@foreach($colors as $clr)
								<li><a class="proColor" onclick="getColor('{{$clr}}')"><div style="height: 25px; width: 25px; background-color: {{ 
								$clr ?? 'black'  }}"></div></a></li>
								@endforeach
							</ul>
						</div>
						@endif
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Filter By Price</h3>
							<div class="sidebar-price">
								<div id="price-range"></div>
								<input type="text" id="price-amount" readonly >
							</div>
							<button type="button" onclick="getPriceFilter()" id="priceFilter" class="btn btn-success" style="margin-top: 15px;">Filter</button>
						</div>
						
						<!--=======  End of single sidebar  =======-->




						<!--=======  single sidebar  =======-->
						@if(!empty($brands) && count($brands)>0)
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Filter By Brand</h3>
							<ul class="product-categories" style="max-height: 300px; overflow: auto">
								@foreach($brands as $brnd) 
								<?php
								$brn = DB::table('brands')->where('id',$brnd)->first();
								?>
								@if(!empty($brn))
								<!--<li><a class="proBrand  @if($slug==$brn->id){{ 'active' }}@endif" onclick="getBrand('{{$brn->name}}')">-->
								<li><a class="proBrand  @if($slug==$brn->id){{ 'active' }}@endif" href="{{ url('brand/products/'.$brn->name.'@'.$brn->id) }}">
									{{ $brn->name ?? '' }}</a></li>
									@endif
								@endforeach
							</ul>
						</div>
						@endif
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						@if(!empty($materials) && count($materials)>0)
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Filter By Material</h3>
							<ul class="product-categories">
								@foreach($materials as $material)
								@if(!empty($material))
								<li><a class="proMaterial" onclick="getMaterial('{{$material}}')">
									{{ $material ?? '' }}</a></li>
									@endif
								@endforeach
							</ul>
						</div>
						@endif
						
						<!--=======  End of single sidebar  =======-->




						<!--=======  single sidebar  =======-->
						
						<!-- <div class="sidebar mb-35">
							<h3 class="sidebar-title">Compare</h3>

							
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

							
						</div> -->
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						@if(!empty($top_rated_products) && count($top_rated_products))
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Top rated products</h3>
							
							<!--=======  top rated product container  =======-->
							
							<div class="top-rated-product-container">
								<!--=======  single top rated product  =======-->
								@foreach($top_rated_products as $product)
								<div class="single-top-rated-product d-flex align-content-center">
									<div class="image">
										<a href="{{ url('productDetail/'.$product->slug ?? '') }}">
											<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="{{ ucfirst(substr($product->name ?? '',0,30)) }}..">
										</a>
									</div>
									<div class="content">
										<p><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst($product->name ?? '') }}</a></p>
										<p class="product-rating">
											@for($i=1;$i<=5;$i++)
											@if($product->products_rating>=$i)
											<i class="fa fa-star active"></i>
											@else
											<i class="fa fa-star"></i>
											@endif
											@endfor
										</p>

										<p class="product-price"> 
											@if(!empty($product->sale_price))
											<span class="discounted-price"> Rs. {{ $product->sale_price }}</span>
											@endif
											<span class="main-price">Rs. {{ $product->price ?? '0' }}</span> 
											
										</p>
									</div>
								</div>
								@endforeach
								
								<!--=======  End of single top rated product  =======-->
								
							</div>
							
							<!--=======  End of top rated product container  =======-->
						</div>
						@endif
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<!-- <div class="sidebar">
							<h3 class="sidebar-title">Product Tags</h3>
							
							<ul class="tag-container">
								<li><a href="#">new</a> </li>
								<li><a href="#">bags</a> </li>
								<li><a href="#">new</a> </li>
								<li><a href="#">kids</a> </li>
								<li><a href="#">fashion</a> </li>
								<li><a href="#">Accessories</a> </li>
							</ul>
							
						</div> -->
						
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
						@if(!empty($keyword))
						<h4>Search result for <b><i>"{{ $keyword }}"</i></b></h4>
						@endif 
						<div class="row">
							<div class="col-lg-6 col-md-4 col-sm-12 d-flex align-items-center">
								<!--=======  view mode  =======-->
								
								<div class="view-mode-icons mb-xs-10">
									<a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
									<a href="#" data-target="list"><i class="fa fa-list"></i></a>
								</div>
								
								<!--=======  End of view mode  =======-->
								
							</div>
							<div class="col-lg-6 col-md-8 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
								<!--=======  Sort by dropdown  =======-->
								
								
								
								<!--=======  End of Sort by dropdown  =======-->

								<p class="result-show-message">

									<div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
									<p class="mr-10">Sort By: </p>
									<select name="sort-by" id="sortBy" class="nice-select">
										<option value=""> Select  Sort By</option>
										<option value="price-lh">Sort By Price: Low to High</option>
										<option value="price-hl">Sort By Price: High to Low</option>
									</select>
								</div>

								</p>
							</div>
						</div>
					</div>
					
					<!--=======  End of Shop header  =======-->

					<!--=======  Grid list view  =======-->
					
					<div class="shop-product-wrap grid row no-gutters mb-35" id="dynamic-products">
						
						@if(!empty($searched_products))
								@foreach($searched_products as $product)
								@php $proCount++ @endphp
						<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
								    <button  onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist" class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt"></i></button>

									<div class="image">
                                <a href="{{ url('productDetail/'.$product->slug ?? '') }}" style="height: 175px;">
                                    @if($product->sale_price>0 && $product->sale_price<$product->price)
                                    <span class="onsale">Rs. {{$product->price-$product->sale_price}} OFF!</span>
                                    @endif
                                    <!-- <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt=""> -->
                                    @if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="" style="display: flex; max-height: 175px; width: auto; margin: auto">
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="" style="display: flex; max-height: 175px; width: auto; margin: auto">
												@endif
                                </a>
                                <div class="product-hover-icons">
                                    <!--<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>-->
                                    <!--<a onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>-->
                                    <!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
                                    <a href="#" data-tooltip="Quick view" data-myid="{{$product->id}}" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst(substr($product->name ?? '',0,30)) }}..</a></h3>
                                <div class="product-categories">
                                    <a href="{{ url('products/'.$product->category_slug ?? '') }}">{{ $product->category_name ?? '' }}</a>
                                    <!-- <a href="">Vegetables</a> -->
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
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="{{ url('productDetail/'.$product->slug ?? '') }}" style="height: 250px;">
											@if($product->sale_price>0 && $product->sale_price<$product->price)
                                    <span class="onsale">Rs. {{$product->price-$product->sale_price}} OFF!</span>
                                    @endif
											<!-- <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt=""> -->
											@if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="" style="display: flex; max-height: 250px; width: auto; margin: auto">
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
												@endif
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-myid="{{$product->id}}" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst(substr($product->name ?? '',0,30)) }}..</a></h3>
										<div class="product-categories">
											<a href="{{ url('products/'.$product->category_slug ?? '') }}">{{ $product->category_name ?? '' }}</a>
										</div>
										<div class="price-box mb-20">
											@if(!empty($product->sale_price) && $product->sale_price<$product->price && $product->sale_price>0)
												<span class="main-price">Rs. {{ $product->price ?? '0' }}</span>
												<span class="discounted-price">Rs. {{ $product->sale_price ?? '0' }}</span>
												@else
												<span class="discounted-price">Rs. {{ $product->price ?? '0' }}</span>
												@endif
										</div>
										<p class="product-description"><?php echo $product->key_features ?? '' ?></p>
										<div class="list-product-icons">

                                              <button onclick="addToCart({{$product->id}})"  class="btn btn-info btn-sm mt-3"><span class="icon_cart_alt mr-2"></span>Add to cart</button>
							  
							  <button  onclick="addToWishlist({{$product->id}})" class="btn btn-success btn-sm  mt-3" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt"></i></button>


											<!--<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>-->
											<!--<a onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>-->
											<!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>

							@endforeach
								@endif

								@if($proCount == 0)
								<div class="row" style="text-align: center; margin-top: 45px; width: 100%">
									<h4 style="text-align: center; margin-left: 40%;">No products available<h4>
								</div>
								@endif
								
	
							
	
							
	
							
	
							

	
							
							
					</div>
					
					<!--=======  End of Grid list view  =======-->

					<!--=======  Pagination container  =======-->
					
				<!-- 	<div class="pagination-container">
						<div class="container-fluid" style="margin: 0 1%; width: 98%;">
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

<input  type="hidden" id="filterCategory" value="@if(!empty($productCategory)){{$productCategory->slug ?? ''}}@endif">
<input type="hidden" id="filterBrand" value="@if(!empty($brand)){{ $brand->name ?? '' }}@endif">
<input type="hidden" id="filterPrice">
<input type="hidden" id="filterColor">
 <input type="hidden" id="filterSort"> 
 <input type="hidden" id="filterKeyword" value="@if(!empty($keyword)){{ $keyword }}@endif"> 
<input type="hidden" id="filterMaterial">

	
	<!--=====  End of Shop page container  ======-->


@endsection

@section('scripts')
<script>
$('#sortBy').on('change',function(){
   getSearch(); 
});
    
    
function getPriceFilter(){
    getSearch(); 
}


function getSearch(){
    
    var sort = $('#sortBy').val();
    
    var brand = $('#filterBrand').val();
    
    var category = $('#filterCategory').val();
    
    var price = $('#price-amount').val();
    
    // alert(price);
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
    var keyword = $('#filterKeyword').val();
    
    $.ajax({

     url: '/sortBy',
     type: 'POST',
     data: {_token: CSRF_TOKEN, sort: sort, keyword: keyword, brand: brand, category: category, price: price },
     success: function (data) {
      $('#dynamic-products').html(data);

     },
     failure: function (data) {
      alert('Something went wrong');
     }
  });

}
</script>
@endsection