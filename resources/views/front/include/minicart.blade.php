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
												<p class="product-title"> <a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst($product->name ?? '') }}</a></p>
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
												<p class="product-title"> <a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst($product->name ?? '') }}</a></p>
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