@extends('layouts.front.app')


@section('title')

<meta name="description" content="<?php echo $product->description ?? $product->key_features; ?>">
<meta name="title" content="{{ $product->name }}">
  <meta name="keywords" content="{{ $product->search_keyword ?? $product->name }}">
  
  <meta name="image" content="{{ asset('storage/'.$product->cover ?? '') }}">

<title>{{ $product->name ?? '' }} - GV Mart</title>


@endsection

@section('content')

@php $pro_price=$product->sale_price @endphp
@php $pro_id=$product->id @endphp


 @if(!empty($weights) && count($weights)>0)
 @php $pro_price = $weights[0]->product_price ?? $product->sale_price @endphp
 @endif
    
    <!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="{{ url('products/'.$category->slug ?? '') }}">{{ ucfirst($category->name ?? '') }}</a></li>
                            <!-- <li><a href="#">Fast Foods</a></li> -->
                            <li class="active">{{ $product->name ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of breadcrumb area  ======-->

    <!--=============================================
    =            single product content         =
    =============================================-->
    
    <div class="single-product-content ">
        <div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
            <!--=======  single product content container  =======-->
            <div class="single-product-content-container mb-35">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-xs-12"> 

                        <!-- product image gallery -->
                        <div class="product-image-slider d-flex flex-custom-xs-wrap flex-sm-nowrap mb-sm-35">
                                <!--Modal Tab Menu Start-->
                                <div class="product-small-image-list"> 
                                    <div class="nav small-image-slider-single-product" role="tablist">
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-main" href="#single-slidemain"><img src="{{ asset('storage/'.$product->cover ?? '') }}"
                                        class="img-fluid" alt=""></a>
                                    </div>
                                    @if(!empty($images))
                                    @foreach($images as $image)
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-{{$image->id}}" href="#single-slide{{$image->id ?? ''}}"><img src="{{ asset('storage/'.$image->src ?? '') }}"
                                            class="img-fluid" alt="{{ $product->name ?? '' }}"></a>
                                        </div>
                                        @endforeach
                                        @endif
                                   
                                    </div>
                                   </div>
                                   <!--Modal Tab Menu End-->

                                <!--Modal Tab Content Start-->
                                <div class="tab-content product-large-image-list">

                                    <div class="tab-pane fade show active" id="single-slidemain" role="tabpanel" aria-labelledby="single-slide-tab-main">
                                        <!--Single Product Image Start-->
                                        <div class="single-product-img easyzoom img-full">
                                            <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
                                            <a href="{{ asset('storage/'.$product->cover ?? '') }}" class="big-image-popup"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                        <!--Single Product Image End-->
                                    </div>

                                    @if(!empty($images))
                                    @foreach($images as $image)
                                    <div class="tab-pane fade" id="single-slide{{ $image->id ?? '' }}" role="tabpanel" aria-labelledby="single-slide-tab-{{ $image->id ?? '' }}">
                                        <!--Single Product Image Start-->
                                        <div class="single-product-img easyzoom img-full">
                                            <img src="{{ asset('storage/'.$image->src ?? '') }}" class="img-fluid" alt="">
                                            <a href="{{ asset('storage/'.$image->src ?? '') }}" class="big-image-popup"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                        <!--Single Product Image End-->
                                    </div>
                                    @endforeach
                                        @endif

                                </div>
                                <!--Modal Content End-->

                            </div>
                            <!-- end of product image gallery -->
                    </div>



                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <!-- product quick view description -->
                        <div class="product-feature-details">
                            <h2 class="product-title mb-15" style="font-size: 30px;">{{ $product->name ?? '' }}</h2>

                            <p class="product-rating">
                                @for($i=1;$i<=5;$i++)
                                @if($productReview>=$i)
                                <i class="fa fa-star active"></i>
                                @else
                                <i class="fa fa-star"></i>
                                @endif
                                @endfor

                                <a href="#">({{ $totalReviews }} @if($totalReviews>1){{'reviews'}}@else{{'review'}}@endif)</a>
                            </p>
        
                            @if(!empty($weights) && count($weights)>0)
                            <h2 class="product-price mb-15"> 
                                <span class="discounted-price" style="font-size: 24px;" id="sale_price1"> Rs. {{ $pro_price ?? '0' }}</span>
                            </h2>
                            @else
                            <h2 class="product-price mb-15"> 
                                 <span class="main-price" style="font-size: 24px;" id="main_price1">Rs. {{ $product->price ?? '0' }}</span>  
                                <span class="discounted-price" style="font-size: 24px;" id="sale_price2"> Rs. {{ $pro_price ?? '0' }}</span>
                            </h2>
                            @endif
        
                            <p class="pd-no"><b>SKU -</b> <span>{{ $product->sku ?? '' }}</span></p>
                            
                                        <p class="stock-qty"><b>Availability - </b><span>@if($product->stock_quantity>0)(Instock)@else{{'(Out Of Stock)'}}@endif</span></p>

                            <p class="pd-no"><b>Return Period -</b> <span>{{ $product->return_period ?? '' }}</span></p>

                            <p class="product-description mb-20"><?php echo $product->key_features ?? ''; ?></p>

                            @if(!empty($sizes) && count($sizes)>0)
                            <div class="size mb-20">
                                Size: <br>
                                <select name="chooseSize" id="chooseSize">
                                    @foreach($sizes as $size)
                                    <option value="{{ $size->product_size ?? '' }}">{{ $size->product_size ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

 @if(!empty($weights) && count($weights)>0)
                            <div class="size mb-20">
                                Weight: <br>
                                <select name="chooseSize" id="chooseWeight">
                                    @foreach($weights as $weight)
                                    <option value="{{ $weight->id ?? '' }}">{{ $weight->product_weight ?? '' }} {{ $weight->weight_unit ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif



                                    <input type="radio" name="product_size" value="" id="productSize{{$product['id']}}" hidden="">

                                    <input type="radio" name="product_price" value="{{ $product->sale_price ?? $product->price }}" id="productPrice{{$product['id']}}" hidden="">

                                    <input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">

                           <!--  <div class="color mb-20">
                                Color: <br>
                                <a href="#"><span class="color-block color-choice-1"></span></a>
                                <a href="#"><span class="color-block color-choice-2"></span></a>
                                <a href="#"><span class="color-block color-choice-3 active"></span></a>
                            </div>
                           
                            
         -->
                            <div class="cart-buttons mb-20">
                                <div class="pro-qty mr-20 mb-xs-20">



                                            <input type="text" value="{{ $product->product_quantity ?? '1'}}"  id="quantityPd{{$product->id ?? ''}}" readonly>
                                            <a href="#" class="inc qty-btn">+</a>
                                            <a href="#" class= "dec qty-btn">-</a>
                                    



                                   
                                </div>
                                <button onclick="addToCart({{$product->id}})"  class="btn btn-info btn-sm mt-3"><span class="icon_cart_alt mr-2"></span>Add to cart</button>
                                
                                 <button onclick="buyNow({{ $product['id'] }})"  class="btn btn-success btn-sm mt-3"><span class="fa fa-shopping-cart mr-2"></span>Buy Now</button>
                                 
                                <button  onclick="addToWishlist({{$product->id}})" class="btn btn-success btn-sm  mt-3" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt mr-2 "></i> Add to wishlist</button>

                                
                                
                                <!--<div class="add-to-cart-btn">-->
                                <!--    <a  onclick="addToCart({{$product->id}})"><i class="fa fa-shopping-cart"></i> Add to Cart</a>-->
                                <!--</div>-->

                                <!--<div class="add-to-cart-btn">-->
                                <!--    <a  onclick="buyNow({{ $product['id'] }})"><i class="fa fa-shopping-cart"></i> Buy Now</a>-->
                                <!--</div>-->
                            </div>

                            <!--<div class="single-product-action-btn mb-20">-->
                            <!--    <a  onclick="addToWishlist({{$product->id}})" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> Add to wishlist</a>-->
                               
                            <!--</div>-->

                            @if(!empty($tagCategories) && count($tagCategories)>0)
                            <div class="single-product-category mb-20">
                                <h3>Categories:
                                 <span>
                                    @foreach($tagCategories as $key => $cat)
                                    <a href="{{ url('products/'.$cat->slug ?? '') }}">{{ ucfirst($cat->name ?? '') }}</a>@if($key>0),@endif 
                                @endforeach
                            </span>
                        </h3>
                            </div>
                            @endif
        
                    
                            <div class="social-share-buttons">
                                <h3>share this product</h3>
                                <ul>
                                    <li>
                                        <!--<a >Share on Twitter</a>-->
                                        <a class="twitter" href="http://www.twitter.com/intent/tweet?url=http://gvmart.co.in/productDetail/{{$product->slug}}&via=TWITTER_HANDLE_HERE&text={{ $product->name ?? '' }}" target="_blank" class="share-popup"><i class="fa fa-twitter"></i></a>
                                        
                                        </li>
                                    <!--<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>-->
                                    
                                    <li>
                                        
                                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=http://gvmart.co.in/productDetail/{{$product->slug}}" target="_blank" rel="noopener">
    <i class="fa fa-facebook"></i>
</a>

                                        
                                    </li>
                                    
                                    <!--<li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>-->
                                    <li><a class="google-plus" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of product quick view description -->
                    </div>
                </div>
            </div>
        
        <!--=======  End of single product content container  =======-->
            
        </div>
        
    </div>
    
    <!--=====  End of single product content  ======-->

    <!--=============================================
    =            single product tab         =
    =============================================-->
    
    <div class="single-product-tab-section mb-35">
        <div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-slider-wrapper">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                                    aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab"
                                    aria-selected="false">Features</a>
                                <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                    aria-selected="false">Reviews ({{ $totalReviews }})</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <p class="product-desc"><?php echo $product->description ?? '' ?></p>
                            </div>
                            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                                <table class="table-data-sheet">
                                    <tbody>
                                        <tr class="odd">

                                            <td>Name</td>
                                            <td>{{ ucfirst($product->name ?? '') }}</td>
                                        </tr>

                                        @if(!empty($product->brand_id))
                                        <tr class="even">
                                            <?php
                                            $brand = DB::table('brands')->where('id',$product->brand_id)->first();
                                            ?>
                                            <td>Brand</td>
                                            <td>{{ ucfirst($brand->name ?? '') }}</td>
                                        </tr>
                                        @endif

                                        @if(!empty($product->color))
<tr class="odd">

                                            <td>Color</td>
                                            <td><div style="height: 25px; width: 25px; background-color: {{ $product->color ?? ''  }}"></div></td>
                                        </tr>
                                        @endif

                                        @if(!empty($sizes) && count($sizes)>0)
                                        <tr class="even">

                                            <td>Size</td>
                                            <td>
                                                @foreach($sizes as $size){{ $size->product_size ?? '' }},@endforeach
                                            </td>
                                        </tr>
                                        @endif

                                        @if(!empty($weights) && count($weights)>0)
                                        <tr class="odd">

                                            <td>Weight</td>
                                            <td>
                                                @foreach($weights as $weight){{ $weight->product_weight ?? '' }} {{ $weight->weight_unit ?? '' }},@endforeach
                                            </td>
                                        </tr>
                                        @endif

                                        @if(!empty($product->material))
                                        <tr class="even">

                                            <td>Material</td>
                                            <td>{{ $product->material ?? '' }}</td>
                                        </tr>
                                        @endif

                                        @if(!empty($product->product_type))
                                        <tr class="odd">

                                            <td>Product Type</td>
                                            <td>{{ $product->product_type ?? '' }}</td>
                                        </tr>
                                       @endif

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="product-ratting-wrap">
                                    <div class="pro-avg-ratting">
                                        <h4>{{$productReview ?? '0'}} <span>(Overall)</span></h4>
                                        <span>Based on {{ $totalReviews }} Comments</span>
                                    </div>
                                
                                    <div class="rattings-wrapper">
                                        @if(!empty($reviews))
                                        @foreach($reviews as $review)
                                        <div class="sin-rattings">
                                            <div class="ratting-author">
                                                <h3>{{ $review->name ?? '' }} ( {{ $review->email ?? '' }} )</h3>
                                                <div class="ratting-star">
                                                    @for($i=1;$i<=5;$i++)
                                                    @if($review->product_rating<=$i)
                                                    <i class="fa fa-star-o"></i>
                                                    @else
                                                    <i class="fa fa-star"></i>
                                                    @endif
                                                    @endfor
                                                    <span>({{ $product->product_rating }})</span>
                                                </div>
                                            </div>
                                            <p>{{ $review->product_review ?? '' }}</p>
                                        </div>
                                        @endforeach
                                        @endif

                                    </div>
                                    <div class="ratting-form-wrapper fix">
                                        <h3>Add your Comments</h3>
                                        <form action="{{ url('submit-product-review') }}" method="POST">
                                            @csrf
                                            <input name="product_id" value="{{ $product->id }}" type="hidden">
                                            <div class="ratting-form row">
                                                <div class="col-12 mb-15">
                                                     <label for="name">Rating:</label>
                                                   
                                                   
                                                     <!--<label for="input-3" class="control-label">Give a rating for PHP:</label>-->
                                                      <input id="input-3" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="0">
                                                    <!--<div class="ratting-star fix">-->
                                                    <!--    <i class="fa fa-star-o"></i>-->
                                                    <!--    <i class="fa fa-star-o"></i>-->
                                                    <!--    <i class="fa fa-star-o"></i>-->
                                                    <!--    <i class="fa fa-star-o"></i>-->
                                                    <!--    <i class="fa fa-star-o"></i>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="name">Name:</label>
                                                    <input id="name" placeholder="Name" name="name" type="text" required>
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="email">Email:</label>
                                                    <input id="email" placeholder="Email" name="email" type="email" required>
                                                </div>
                                                <div class="col-12 mb-15">
                                                    <label for="your-review">Your Review:</label>
                                                    <textarea name="review" id="your-review" placeholder="Write a review" required></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <input value="add review" type="submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of single product tab  ======-->
    
    <!--=============================================
	=            Related Product slider         =
	=============================================-->
	@if(!empty($more_liked) && count($more_liked)>0)
	<div class="slider related-product-slider mb-35">
        <div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  multisale  slider section title  =======-->
                    
                    <div class="section-title">
                        <h3>Related Product</h3>
                    </div>
                    
                    <!--=======  End of multisale slider section title  =======-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  related product slider wrapper  =======-->
                    
                    <div class="related-product-slider-wrapper">
                        <!--=======  single related slider product  =======-->
                        @foreach($more_liked as $product)
                        <div class="gf-product related-slider-product">
                            <button  onclick="addToWishlist({{$product->id}})" class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt"></i></button>

                            <div class="image">
                                <a href="{{ url('productDetail/'.$product->slug ?? '') }}">
                                    @if($product->sale_price != NULL)
                                            <span class="onsale">Sale!</span>
                                            @endif
                                    @if(!empty($product->cover))
                                                <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
                                                @else
                                                <img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
                                                @endif
                                </a>
                                <div class="product-hover-icons">
                                    <!--<a onclick="addToCart({{$product->id}})" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>-->
                                    <!--<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>-->
                                    <!-- <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a> -->
                                    <a href="#" data-tooltip="Quick view"  data-myid="{{$product->id}}" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst(substr($product->name ?? '',0,50)) }}..</a></h3>
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
                                <button onclick="addToCart({{$product->id}})"  class="btn btn-info add-btn btn-sm mt-3"><span class="icon_cart_alt mr-2"></span>Add to cart</button>

                            </div>

                            <input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">
                            
                        </div>
                        @endforeach
                        <!--=======  End of single related slider product  =======-->
                        
                    </div>
                    
                    <!--=======  End of related product slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
    @endif 
    <!--=====  End of Related product slider  ======-->	
    
    <!--=============================================
    =            Related Product slider         =
    =============================================-->
    @if(!empty($recent_viewed_products) && count($recent_viewed_products)>0)
    <div class="slider related-product-slider mb-35">
        <div class="container-fluid" style="margin: 0 1% !important; width: 98%;">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  multisale  slider section title  =======-->
                    
                    <div class="section-title">
                        <h3>Recent Viewed Product</h3>
                    </div>
                    
                    <!--=======  End of multisale slider section title  =======-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  related product slider wrapper  =======-->
                    
                    <div class="related-product-slider-wrapper">
                        <!--=======  single related slider product  =======-->
                        @foreach($recent_viewed_products as $product)
                        <div class="gf-product related-slider-product">
                           <button  onclick="addToWishlist({{$product->id}})" class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="add to wishlist" data-original-title="Add to wishlist" aria-describedby="tooltip1809"><i class="icon_heart_alt"></i></button>

                            <div class="image">
                                <a href="{{ url('productDetail/'.$product->slug ?? '') }}">
                                    @if($product->sale_price != NULL)
                                            <span class="onsale">Sale!</span>
                                            @endif
                                    @if(!empty($product->cover))
                                                <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
                                                @else
                                                <img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
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
                                <h3 class="product-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ ucfirst(substr($product->name ?? '',0,50)) }}..</a></h3>
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
                                  <button onclick="addToCart({{$product->id}})"  class="btn btn-info add-btn btn-sm mt-3"><span class="icon_cart_alt mr-2"></span>Add to cart</button>
                            </div>
                            
                            <input type="hidden" id="stock{{$product->id}}" value="@if($product->stock_quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">

                        </div>
                        @endforeach
                        <!--=======  End of single related slider product  =======-->
                        
                    </div>
                    
                    <!--=======  End of related product slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
    @endif 
    <!--=====  End of Related product slider  ======--> 
   
	@endsection
	
	@section('scripts')
	<script>
	$('#chooseWeight').on('change',function(){
	    var weight_id = $('#chooseWeight').val();
	   // alert('Hii')
	    var pid = <?php echo $pro_id; ?> ; 
	    
	     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
     url: '/getProductPrice',
     type: 'POST',
     data: {_token: CSRF_TOKEN, weight_id: weight_id },
     success: function (data) {
       $('#sale_price1').html('Rs. '+data.product_price);
       $('#sale_price2').html('Rs. '+data.product_price);
       
       $('#productPrice'+pid).val(data.product_price);
       $('#productSize'+pid).val(data.product_weight);

     },
     failure: function (data) {
       alert('Something went wrong');
     }
   });
	});
	</script>
	
	<style>
	/*!
 * bootstrap-star-rating v4.0.2
 * http://plugins.krajee.com/star-rating
 *
 * Author: Kartik Visweswaran
 * Copyright: 2013 - 2017, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD 3-Clause
 * https://github.com/kartik-v/bootstrap-star-rating/blob/master/LICENSE.md
 */

.rating-loading {
	width: 25px;
	height: 25px;
	font-size: 0;
	color: #fff;
	background: url(../img/loading.gif) top left no-repeat;
	border: none
}

.rating-container .rating-stars {
	position: relative;
	cursor: pointer;
	vertical-align: middle;
	display: inline-block;
	overflow: hidden;
	white-space: nowrap
}

.rating-container .rating-input {
	position: absolute;
	cursor: pointer;
	width: 100%;
	height: 1px;
	bottom: 0;
	left: 0;
	font-size: 0px!important;
	border: none;
	background: 0 0;
	padding: 0;
	margin: 0;
	border:none!important;
}

.rating-disabled .rating-input,
.rating-disabled .rating-stars {
	cursor: not-allowed
}

.rating-container .star {
	display: inline-block;
	margin: 0 3px;
	text-align: center
}

.rating-container .empty-stars {
	color: #aaa
}

.rating-container .filled-stars {
	position: absolute;
	left: 0;
	top: 0;
	margin: auto;
	color: #fde16d;
	white-space: nowrap;
	overflow: hidden;
	-webkit-text-stroke: 1px #777;
	text-shadow: 1px 1px #999
}

.rating-rtl {
	float: right
}

.rating-animate .filled-stars {
	transition: width .25s ease;
	-o-transition: width .25s ease;
	-moz-transition: width .25s ease;
	-webkit-transition: width .25s ease
}

.rating-rtl .filled-stars {
	left: auto;
	right: 0;
	-moz-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
	-webkit-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
	-o-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
	transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0)
}

.rating-rtl.is-star .filled-stars {
	right: .06em
}

.rating-rtl.is-heart .empty-stars {
	margin-right: .07em
}

.rating-lg {
	font-size: 3.91em
}

.rating-md {
	font-size: 3.13em
}

.rating-sm {
	font-size: 2.5em
}

.rating-xs {
	font-size: 2em
}

.rating-xl {
	font-size: 4.89em
}

.rating-container .clear-rating {
	color: #aaa;
	cursor: not-allowed;
	display: none;
	vertical-align: middle;
	font-size: 60%;
	padding-right: 5px
}

.clear-rating-active {
	cursor: pointer!important
}

.clear-rating-active:hover {
	color: #843534
}

.rating-container .caption {
	color: #999;
	display: inline-block;
	vertical-align: middle;
	font-size: 60%;
	margin-top: -.6em;
	margin-left: 5px;
	margin-right: 0
}

.rating-rtl .caption {
	margin-right: 5px;
	margin-left: 0
}

@media print {
	.rating-container .clear-rating {
		display: none
	}
}

@media screen and (max-width:450px){
    
    .rating-container .caption{ font-size:12px;}
    
    .rating-container .rating-stars {
    font-size: 35px;
}
}

</style>
	
	<script>
	    /*!
 * bootstrap-star-rating v4.0.2
 * http://plugins.krajee.com/star-rating
 *
 * Author: Kartik Visweswaran
 * Copyright: 2013 - 2017, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD 3-Clause
 * https://github.com/kartik-v/bootstrap-star-rating/blob/master/LICENSE.md
 */!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof module&&module.exports?module.exports=e(require("jquery")):e(window.jQuery)}(function(e){"use strict";e.fn.ratingLocales={},e.fn.ratingThemes={};var t,a;t={NAMESPACE:".rating",DEFAULT_MIN:0,DEFAULT_MAX:5,DEFAULT_STEP:.5,isEmpty:function(t,a){return null===t||void 0===t||0===t.length||a&&""===e.trim(t)},getCss:function(e,t){return e?" "+t:""},addCss:function(e,t){e.removeClass(t).addClass(t)},getDecimalPlaces:function(e){var t=(""+e).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);return t?Math.max(0,(t[1]?t[1].length:0)-(t[2]?+t[2]:0)):0},applyPrecision:function(e,t){return parseFloat(e.toFixed(t))},handler:function(e,a,n,r,i){var l=i?a:a.split(" ").join(t.NAMESPACE+" ")+t.NAMESPACE;r||e.off(l),e.on(l,n)}},a=function(t,a){var n=this;n.$element=e(t),n._init(a)},a.prototype={constructor:a,_parseAttr:function(e,a){var n,r,i,l,s=this,o=s.$element,c=o.attr("type");if("range"===c||"number"===c){switch(r=a[e]||o.data(e)||o.attr(e),e){case"min":i=t.DEFAULT_MIN;break;case"max":i=t.DEFAULT_MAX;break;default:i=t.DEFAULT_STEP}n=t.isEmpty(r)?i:r,l=parseFloat(n)}else l=parseFloat(a[e]);return isNaN(l)?i:l},_parseValue:function(e){var t=this,a=parseFloat(e);return isNaN(a)&&(a=t.clearValue),!t.zeroAsNull||0!==a&&"0"!==a?a:null},_setDefault:function(e,a){var n=this;t.isEmpty(n[e])&&(n[e]=a)},_initSlider:function(e){var a=this,n=a.$element.val();a.initialValue=t.isEmpty(n)?0:n,a._setDefault("min",a._parseAttr("min",e)),a._setDefault("max",a._parseAttr("max",e)),a._setDefault("step",a._parseAttr("step",e)),(isNaN(a.min)||t.isEmpty(a.min))&&(a.min=t.DEFAULT_MIN),(isNaN(a.max)||t.isEmpty(a.max))&&(a.max=t.DEFAULT_MAX),(isNaN(a.step)||t.isEmpty(a.step)||0===a.step)&&(a.step=t.DEFAULT_STEP),a.diff=a.max-a.min},_initHighlight:function(e){var t,a=this,n=a._getCaption();e||(e=a.$element.val()),t=a.getWidthFromValue(e)+"%",a.$filledStars.width(t),a.cache={caption:n,width:t,val:e}},_getContainerCss:function(){var e=this;return"rating-container"+t.getCss(e.theme,"theme-"+e.theme)+t.getCss(e.rtl,"rating-rtl")+t.getCss(e.size,"rating-"+e.size)+t.getCss(e.animate,"rating-animate")+t.getCss(e.disabled||e.readonly,"rating-disabled")+t.getCss(e.containerClass,e.containerClass)},_checkDisabled:function(){var e=this,t=e.$element,a=e.options;e.disabled=void 0===a.disabled?t.attr("disabled")||!1:a.disabled,e.readonly=void 0===a.readonly?t.attr("readonly")||!1:a.readonly,e.inactive=e.disabled||e.readonly,t.attr({disabled:e.disabled,readonly:e.readonly})},_addContent:function(e,t){var a=this,n=a.$container,r="clear"===e;return a.rtl?r?n.append(t):n.prepend(t):r?n.prepend(t):n.append(t)},_generateRating:function(){var a,n,r,i=this,l=i.$element;n=i.$container=e(document.createElement("div")).insertBefore(l),t.addCss(n,i._getContainerCss()),i.$rating=a=e(document.createElement("div")).attr("class","rating-stars").appendTo(n).append(i._getStars("empty")).append(i._getStars("filled")),i.$emptyStars=a.find(".empty-stars"),i.$filledStars=a.find(".filled-stars"),i._renderCaption(),i._renderClear(),i._initHighlight(),n.append(l),i.rtl&&(r=Math.max(i.$emptyStars.outerWidth(),i.$filledStars.outerWidth()),i.$emptyStars.width(r)),l.appendTo(a)},_getCaption:function(){var e=this;return e.$caption&&e.$caption.length?e.$caption.html():e.defaultCaption},_setCaption:function(e){var t=this;t.$caption&&t.$caption.length&&t.$caption.html(e)},_renderCaption:function(){var a,n=this,r=n.$element.val(),i=n.captionElement?e(n.captionElement):"";if(n.showCaption){if(a=n.fetchCaption(r),i&&i.length)return t.addCss(i,"caption"),i.html(a),void(n.$caption=i);n._addContent("caption",'<div class="caption">'+a+"</div>"),n.$caption=n.$container.find(".caption")}},_renderClear:function(){var a,n=this,r=n.clearElement?e(n.clearElement):"";if(n.showClear){if(a=n._getClearClass(),r.length)return t.addCss(r,a),r.attr({title:n.clearButtonTitle}).html(n.clearButton),void(n.$clear=r);n._addContent("clear",'<div class="'+a+'" title="'+n.clearButtonTitle+'">'+n.clearButton+"</div>"),n.$clear=n.$container.find("."+n.clearButtonBaseClass)}},_getClearClass:function(){var e=this;return e.clearButtonBaseClass+" "+(e.inactive?"":e.clearButtonActiveClass)},_toggleHover:function(e){var t,a,n,r=this;e&&(r.hoverChangeStars&&(t=r.getWidthFromValue(r.clearValue),a=e.val<=r.clearValue?t+"%":e.width,r.$filledStars.css("width",a)),r.hoverChangeCaption&&(n=e.val<=r.clearValue?r.fetchCaption(r.clearValue):e.caption,n&&r._setCaption(n+"")))},_init:function(t){var a,n=this,r=n.$element.addClass("rating-input");return n.options=t,e.each(t,function(e,t){n[e]=t}),(n.rtl||"rtl"===r.attr("dir"))&&(n.rtl=!0,r.attr("dir","rtl")),n.starClicked=!1,n.clearClicked=!1,n._initSlider(t),n._checkDisabled(),n.displayOnly&&(n.inactive=!0,n.showClear=!1,n.showCaption=!1),n._generateRating(),n._initEvents(),n._listen(),a=n._parseValue(r.val()),r.val(a),r.removeClass("rating-loading")},_initEvents:function(){var e=this;e.events={_getTouchPosition:function(a){var n=t.isEmpty(a.pageX)?a.originalEvent.touches[0].pageX:a.pageX;return n-e.$rating.offset().left},_listenClick:function(e,t){return e.stopPropagation(),e.preventDefault(),e.handled===!0?!1:(t(e),void(e.handled=!0))},_noMouseAction:function(t){return!e.hoverEnabled||e.inactive||t&&t.isDefaultPrevented()},initTouch:function(a){var n,r,i,l,s,o,c,u,d=e.clearValue||0,p="ontouchstart"in window||window.DocumentTouch&&document instanceof window.DocumentTouch;p&&!e.inactive&&(n=a.originalEvent,r=t.isEmpty(n.touches)?n.changedTouches:n.touches,i=e.events._getTouchPosition(r[0]),"touchend"===a.type?(e._setStars(i),u=[e.$element.val(),e._getCaption()],e.$element.trigger("change").trigger("rating.change",u),e.starClicked=!0):(l=e.calculate(i),s=l.val<=d?e.fetchCaption(d):l.caption,o=e.getWidthFromValue(d),c=l.val<=d?o+"%":l.width,e._setCaption(s),e.$filledStars.css("width",c)))},starClick:function(t){var a,n;e.events._listenClick(t,function(t){return e.inactive?!1:(a=e.events._getTouchPosition(t),e._setStars(a),n=[e.$element.val(),e._getCaption()],e.$element.trigger("change").trigger("rating.change",n),void(e.starClicked=!0))})},clearClick:function(t){e.events._listenClick(t,function(){e.inactive||(e.clear(),e.clearClicked=!0)})},starMouseMove:function(t){var a,n;e.events._noMouseAction(t)||(e.starClicked=!1,a=e.events._getTouchPosition(t),n=e.calculate(a),e._toggleHover(n),e.$element.trigger("rating.hover",[n.val,n.caption,"stars"]))},starMouseLeave:function(t){var a;e.events._noMouseAction(t)||e.starClicked||(a=e.cache,e._toggleHover(a),e.$element.trigger("rating.hoverleave",["stars"]))},clearMouseMove:function(t){var a,n,r,i;!e.events._noMouseAction(t)&&e.hoverOnClear&&(e.clearClicked=!1,a='<span class="'+e.clearCaptionClass+'">'+e.clearCaption+"</span>",n=e.clearValue,r=e.getWidthFromValue(n)||0,i={caption:a,width:r,val:n},e._toggleHover(i),e.$element.trigger("rating.hover",[n,a,"clear"]))},clearMouseLeave:function(t){var a;e.events._noMouseAction(t)||e.clearClicked||!e.hoverOnClear||(a=e.cache,e._toggleHover(a),e.$element.trigger("rating.hoverleave",["clear"]))},resetForm:function(t){t&&t.isDefaultPrevented()||e.inactive||e.reset()}}},_listen:function(){var a=this,n=a.$element,r=n.closest("form"),i=a.$rating,l=a.$clear,s=a.events;return t.handler(i,"touchstart touchmove touchend",e.proxy(s.initTouch,a)),t.handler(i,"click touchstart",e.proxy(s.starClick,a)),t.handler(i,"mousemove",e.proxy(s.starMouseMove,a)),t.handler(i,"mouseleave",e.proxy(s.starMouseLeave,a)),a.showClear&&l.length&&(t.handler(l,"click touchstart",e.proxy(s.clearClick,a)),t.handler(l,"mousemove",e.proxy(s.clearMouseMove,a)),t.handler(l,"mouseleave",e.proxy(s.clearMouseLeave,a))),r.length&&t.handler(r,"reset",e.proxy(s.resetForm,a),!0),n},_getStars:function(e){var t,a=this,n='<span class="'+e+'-stars">';for(t=1;t<=a.stars;t++)n+='<span class="star">'+a[e+"Star"]+"</span>";return n+"</span>"},_setStars:function(e){var t=this,a=arguments.length?t.calculate(e):t.calculate(),n=t.$element,r=t._parseValue(a.val);return n.val(r),t.$filledStars.css("width",a.width),t._setCaption(a.caption),t.cache=a,n},showStars:function(e){var t=this,a=t._parseValue(e);return t.$element.val(a),t._setStars()},calculate:function(e){var a=this,n=t.isEmpty(a.$element.val())?0:a.$element.val(),r=arguments.length?a.getValueFromPosition(e):n,i=a.fetchCaption(r),l=a.getWidthFromValue(r);return l+="%",{caption:i,width:l,val:r}},getValueFromPosition:function(e){var a,n,r=this,i=t.getDecimalPlaces(r.step),l=r.$rating.width();return n=r.diff*e/(l*r.step),n=r.rtl?Math.floor(n):Math.ceil(n),a=t.applyPrecision(parseFloat(r.min+n*r.step),i),a=Math.max(Math.min(a,r.max),r.min),r.rtl?r.max-a:a},getWidthFromValue:function(e){var t,a,n=this,r=n.min,i=n.max,l=n.$emptyStars;return!e||r>=e||r===i?0:(a=l.outerWidth(),t=a?l.width()/a:1,e>=i?100:(e-r)*t*100/(i-r))},fetchCaption:function(e){var a,n,r,i,l,s=this,o=parseFloat(e)||s.clearValue,c=s.starCaptions,u=s.starCaptionClasses;return o&&o!==s.clearValue&&(o=t.applyPrecision(o,t.getDecimalPlaces(s.step))),i="function"==typeof u?u(o):u[o],r="function"==typeof c?c(o):c[o],n=t.isEmpty(r)?s.defaultCaption.replace(/\{rating}/g,o):r,a=t.isEmpty(i)?s.clearCaptionClass:i,l=o===s.clearValue?s.clearCaption:n,'<span class="'+a+'">'+l+"</span>"},destroy:function(){var a=this,n=a.$element;return t.isEmpty(a.$container)||a.$container.before(n).remove(),e.removeData(n.get(0)),n.off("rating").removeClass("rating rating-input")},create:function(e){var t=this,a=e||t.options||{};return t.destroy().rating(a)},clear:function(){var e=this,t='<span class="'+e.clearCaptionClass+'">'+e.clearCaption+"</span>";return e.inactive||e._setCaption(t),e.showStars(e.clearValue).trigger("change").trigger("rating.clear")},reset:function(){var e=this;return e.showStars(e.initialValue).trigger("rating.reset")},update:function(e){var t=this;return arguments.length?t.showStars(e):t.$element},refresh:function(t){var a=this,n=a.$element;return t?a.destroy().rating(e.extend(!0,a.options,t)).trigger("rating.refresh"):n}},e.fn.rating=function(n){var r=Array.apply(null,arguments),i=[];switch(r.shift(),this.each(function(){var l,s=e(this),o=s.data("rating"),c="object"==typeof n&&n,u=c.theme||s.data("theme"),d=c.language||s.data("language")||"en",p={},h={};o||(u&&(p=e.fn.ratingThemes[u]||{}),"en"===d||t.isEmpty(e.fn.ratingLocales[d])||(h=e.fn.ratingLocales[d]),l=e.extend(!0,{},e.fn.rating.defaults,p,e.fn.ratingLocales.en,h,c,s.data()),o=new a(this,l),s.data("rating",o)),"string"==typeof n&&i.push(o[n].apply(o,r))}),i.length){case 0:return this;case 1:return void 0===i[0]?this:i[0];default:return i}},e.fn.rating.defaults={theme:"",language:"en",stars:5,filledStar:'<i class="fa fa-star"></i>',emptyStar:'<i class="fa fa-star-o"></i>',containerClass:"",size:"md",animate:!0,displayOnly:!1,rtl:!1,showClear:!0,showCaption:!0,starCaptionClasses:{.5:"label label-danger",1:"label label-danger",1.5:"label label-warning",2:"label label-warning",2.5:"label label-info",3:"label label-info",3.5:"label label-primary",4:"label label-primary",4.5:"label label-success",5:"label label-success"},clearButton:'<i class="glyphicon glyphicon-minus-sign"></i>',clearButtonBaseClass:"clear-rating",clearButtonActiveClass:"clear-rating-active",clearCaptionClass:"label label-default",clearValue:null,captionElement:null,clearElement:null,hoverEnabled:!0,hoverChangeCaption:!0,hoverChangeStars:!0,hoverOnClear:!0,zeroAsNull:!0},e.fn.ratingLocales.en={defaultCaption:"{rating} Stars",starCaptions:{.5:"Half Star",1:"One Star",1.5:"One & Half Star",2:"Two Stars",2.5:"Two & Half Stars",3:"Three Stars",3.5:"Three & Half Stars",4:"Four Stars",4.5:"Four & Half Stars",5:"Five Stars"},clearButtonTitle:"Clear",clearCaption:"Not Rated"},e.fn.rating.Constructor=a,e(document).ready(function(){var t=e("input.rating");t.length&&t.removeClass("rating-loading").addClass("rating-loading").rating()})});
	</script>
	
	@endsection