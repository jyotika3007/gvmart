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
                            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
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
        <div class="container">
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
                                            class="img-fluid" alt=""></a>
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
                            <h2 class="product-title mb-15">{{ $product->name ?? '' }}</h2>

                            <p class="product-rating">
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star"></i>

                                <a href="#">(1 customer review)</a>
                            </p>
        
                            <h2 class="product-price mb-15"> 
                                <!-- <span class="main-price">$12.90</span>  -->
                                <span class="discounted-price"> Rs. {{ $product->price ?? '0' }}</span>
                            </h2>
        
                            <p class="product-description mb-20"><?php echo substr($product->description ?? '',0,150) ?></p>

                        
                            <div class="size mb-20">
                                Size: <br>
                                <select name="chooseSize" id="chooseSize">
                                    <option value="0">XXL</option>
                                    <option value="0">L</option>
                                    <option value="0">M</option>
                                    <option value="0">S</option>
                                </select>
                            </div>

                            <div class="color mb-20">
                                Color: <br>
                                <a href="#"><span class="color-block color-choice-1"></span></a>
                                <a href="#"><span class="color-block color-choice-2"></span></a>
                                <a href="#"><span class="color-block color-choice-3 active"></span></a>
                            </div>
                           
                            
        
                            <div class="cart-buttons mb-20">
                                <div class="pro-qty mr-20 mb-xs-20">
                                    <input type="text" value="1">
                                </div>
                                <div class="add-to-cart-btn">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>

                            <div class="single-product-action-btn mb-20">
                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> Add to wishlist</a>
                                <a href="#" data-tooltip="Add to compare"> <span class="arrow_left-right_alt"></span> Add to compare</a>
                            </div>


                            <div class="single-product-category mb-20">
                                <h3>Categories: <span><a href="shop-left-sidebar.html">Fast Foods</a>, <a href="shop-left-sidebar.html">Vegetables</a></span></h3>
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
        
        <!--=======  End of single product content container  =======-->
            
        </div>
        
    </div>
    
    <!--=====  End of single product content  ======-->

    <!--=============================================
    =            single product tab         =
    =============================================-->
    
    <div class="single-product-tab-section mb-35">
        <div class="container">
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
                                    aria-selected="false">Reviews (3)</a>
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
                                            <td>Kaoreet lobortis sagittis laoreet</td>
                                        </tr>
                                        <tr class="even">

                                            <td>Color</td>
                                            <td>Yellow</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="product-ratting-wrap">
                                    <div class="pro-avg-ratting">
                                        <h4>4.5 <span>(Overall)</span></h4>
                                        <span>Based on 9 Comments</span>
                                    </div>
                                    <div class="ratting-list">
                                        <div class="sin-list float-left">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                        <div class="sin-list float-left">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>(3)</span>
                                        </div>
                                        <div class="sin-list float-left">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>(1)</span>
                                        </div>
                                        <div class="sin-list float-left">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>(0)</span>
                                        </div>
                                        <div class="sin-list float-left">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>(0)</span>
                                        </div>
                                    </div>
                                    <div class="rattings-wrapper">

                                        <div class="sin-rattings">
                                            <div class="ratting-author">
                                                <h3>Cristopher Lee</h3>
                                                <div class="ratting-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </div>
                                            <p>enim ipsam voluptatem quia voluptas sit
                                                aspernatur aut odit aut fugit, sed quia res eos
                                                qui ratione voluptatem sequi Neque porro
                                                quisquam est, qui dolorem ipsum quia dolor sit
                                                amet, consectetur, adipisci veli</p>
                                        </div>

                                        <div class="sin-rattings">
                                            <div class="ratting-author">
                                                <h3>Nirob Khan</h3>
                                                <div class="ratting-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </div>
                                            <p>enim ipsam voluptatem quia voluptas sit
                                                aspernatur aut odit aut fugit, sed quia res eos
                                                qui ratione voluptatem sequi Neque porro
                                                quisquam est, qui dolorem ipsum quia dolor sit
                                                amet, consectetur, adipisci veli</p>
                                        </div>

                                        <div class="sin-rattings">
                                            <div class="ratting-author">
                                                <h3>MD.ZENAUL ISLAM</h3>
                                                <div class="ratting-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </div>
                                            <p>enim ipsam voluptatem quia voluptas sit
                                                aspernatur aut odit aut fugit, sed quia res eos
                                                qui ratione voluptatem sequi Neque porro
                                                quisquam est, qui dolorem ipsum quia dolor sit
                                                amet, consectetur, adipisci veli</p>
                                        </div>

                                    </div>
                                    <div class="ratting-form-wrapper fix">
                                        <h3>Add your Comments</h3>
                                        <form action="#">
                                            <div class="ratting-form row">
                                                <div class="col-12 mb-15">
                                                    <h5>Rating:</h5>
                                                    <div class="ratting-star fix">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="name">Name:</label>
                                                    <input id="name" placeholder="Name" type="text">
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="email">Email:</label>
                                                    <input id="email" placeholder="Email" type="text">
                                                </div>
                                                <div class="col-12 mb-15">
                                                    <label for="your-review">Your Review:</label>
                                                    <textarea name="review" id="your-review"
                                                        placeholder="Write a review"></textarea>
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
	
	<div class="slider related-product-slider mb-35">
        <div class="container">
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
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        
                    </div>
                    
                    <!--=======  End of related product slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
        
    <!--=====  End of Related product slider  ======-->	
    
    <!--=============================================
	=            Upsell Product slider         =
	=============================================-->
	
	<div class="slider related-product-slider mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  multisale  slider section title  =======-->
                    
                    <div class="section-title">
                        <h3>Upsell Product</h3>
                    </div>
                    
                    <!--=======  End of multisale slider section title  =======-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  related product slider wrapper  =======-->
                    
                    <div class="related-product-slider-wrapper">
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        <!--=======  single related slider product  =======-->
                        
                        <div class="gf-product related-slider-product">
                            <div class="image">
                                <a href="single-product.html">
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
                            <div class="product-content">
                                <div class="product-categories">
                                    <a href="shop-left-sidebar.html">Fast Foods</a>,
                                    <a href="shop-left-sidebar.html">Vegetables</a>
                                </div>
                                <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                <div class="price-box">
                                    <span class="main-price">$89.00</span>
                                    <span class="discounted-price">$80.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--=======  End of single related slider product  =======-->
                        
                    </div>
                    
                    <!--=======  End of related product slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
        
    <!--=====  End of Upsell product slider  ======-->	

	@endsection