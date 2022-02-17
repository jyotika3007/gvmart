@php $proCount=0; @endphp

	@if(!empty($searched_products))
								@foreach($searched_products as $product)
								@php $proCount++ @endphp
						<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
                                <a href="{{ url('productDetail/'.$product->slug ?? '') }}" style="height: 175px;">
                                    <span class="onsale">Sale!</span>
                                    <!-- <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt=""> -->
                                    @if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="" style="display: flex; max-height: 175px; width: auto; margin: auto">
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="" style="display: flex; max-height: 175px; width: auto; margin: auto">
												@endif
                                </a>
                                <div class="product-hover-icons">
                                    <a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                    <a onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
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
                            </div>
                            
                            <input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="{{ url('productDetail/'.$product->slug ?? '') }}" style="height: 250px;">
											@if($product->sale_price != NULL)
											<span class="onsale">Sale!</span>
											@endif
											<!-- <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt=""> -->
											@if(!empty($product->cover))
												<img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="" style="display: flex; max-height: 175px; width: auto; margin: auto">
												@else
												<img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="" style="display: flex; max-height: 175px; width: auto; margin: auto">
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
											<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
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