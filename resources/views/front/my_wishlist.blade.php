@extends('layouts.front.app')

@section('content')

@include('front.include.breadcrumb')

    <!--=============================================
    =            Cart page content         =
    =============================================-->
    
  
    <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%;">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section section mb-50">
        <div class="container-fluid" style="width: 90%; margin: 0 5%">
            <div class="row">
                <div class="col-12">
                    <form action="#">				
                        <!--=======  cart table  =======-->
                        
                        <div class="cart-table table-responsive mb-40">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Availability</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($products))
                                    @foreach($products as $product)

                                    <tr id="cartTr{{$product->id ?? ''}}">
                                        <td class="pro-thumbnail"><a href="{{ url('productDetail/'.$product->slug ?? '') }}"><img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="{{ $product->name ?? '' }}"></a></td>
                                        <td class="pro-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ $product->name ?? '' }}</a></td>
                                        <td class="pro-price"><span>Rs. {{ $product->price ?? '' }}</span></td>
                                        <td class="pro-quantity">
                                            @if($product->quantity>0){{ 'In Stock' }}@else{{ 'Out of Stock' }}@endif
                                            <input type="hidden" id="stock{{$product->id}}" value="@if($product->quantity>0){{ 'yes' }}@else{{ 'no' }}@endif">        
                                        </td> 
                                        <td class="pro-remove">
                                            <style type="text/css">
                                                .pro-remove ul {
                                                    margin-left: 40%
                                                }

                                                .pro-remove ul li {
                                                    float: left; margin-right: 10px;
                                                }
                                            </style>
                                            <ul>
                                                <li>
                                                    <a onclick="addToCartWishlist({{ $product->id }})" ><i class="fa fa-shopping-cart"></i></a>
                                                </li>
                                                <li>
                                                    <a  onclick="confirmDelete({{ $product->id ?? '' }})"><i class="fa fa-trash-o"></i></a>                               
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                    @endforeach
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        <!--=======  End of cart table  =======-->
                        
                        
                    </form>	

                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <!--=======  Calculate Shipping  =======-->
                            
                            
                            <!--=======  End of Discount Coupon  =======-->
                            
                        </div>


                        <div class="col-lg-6 col-12 d-flex">
                            <!--=======  Cart summery  =======-->

                            <div class="cart-summary">

                                <div class="cart-summary-button">
                                    <a onclick="window.location='/'" class="btn text-dark btn-success checkout-btn">Continue Shopping </a>
                                    
                                </div>
                            </div>

                            <!--=======  End of Cart summery  =======-->
                            
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of Cart page content  ======-->


    @endsection