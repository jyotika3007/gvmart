@extends('layouts.front.app')

@section('content')

@include('front.include.breadcrumb')

    <!--=============================================
    =            Cart page content         =
    =============================================-->

<?php $mrp_total = 0; $gst = 0;?>

<style>
    .main-price {
    color: #999;
    font-size: 15px;
    /* font-size: 17px; */
    text-decoration: line-through;
    margin-right: 8px;
}

</style>

    <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="width: 90%; margin: 0 5%">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Cart</li>
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
                                        <th class="pro-price">MRP</th>
                                        <th class="pro-price">Sale Price</th>
                                        <th class="pro-price">Features</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($cartProducts)>0)
                                    @foreach($cartProducts as $product)

<?php $pro = DB::table('products')->where('id',$product->id)->first();  $mrp_total+=($pro->price*$product->product_quantity);
    $gst+=($pro->gst*$product->price*$product->product_quantity)/100;
?>

                                    <tr id="cartTr{{$product->id ?? ''}}">
                                        <td class="pro-thumbnail">
                                            <a href="{{ url('productDetail/'.$product->slug ?? '') }}">
                                                @if(!empty($product->cover))
                                                <img src="{{ asset('storage/'.$product->cover ?? '') }}" class="img-fluid" alt="">
                                                @else
                                                <img src="{{ asset('images/product-default.png') }}" class="img-fluid" alt="">
                                                @endif
                                            </a>
                                        </td>
                                        <td class="pro-title"><a href="{{ url('productDetail/'.$product->slug ?? '') }}">{{ $product->name ?? '' }}</a></td>
                                        <td class="pro-price main-price" ><span>Rs. {{ $pro->price ?? '' }}</span></td>
                                        <td class="pro-price"><span>Rs. {{ $product->price ?? '' }}</span></td>
                                        <td>{{ $product->size ?? '' }}</td>
                                        <td class="pro-quantity"><div class="pro-qty2">
                                            <input type="text" value="{{ $product->product_quantity ?? '1'}}"  id="productQuantity{{$product->id ?? ''}}" min="1" readonly>
                                            <a href="#" class="inc qty-btn" onclick="plus({{ $product->id }})">+</a>
                                            <a href="#" class= "dec qty-btn" onclick="minus({{ $product->id }})">-</a>
                                        </div></td> 
                                        <td class="pro-subtotal"><span  id="total{{$product->id}}">Rs. {{ $product->total_price ?? '' }}.00</span></td>
                                        <td class="pro-remove"><a  onclick="deleteCartProduct({{ $product->id ?? '' }})"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        
                        <div class="row" style="text-align: right; margin-bottom: 30px; ">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3">
                                <a href="{{ url('destroy-session') }}" class="btn text-dark btn-danger checkout-btn" style="color: #fff!important">Empty Cart</a>
                            </div>
                        </div>
                        
                        <!--=======  End of cart table  =======-->
                        
                        
                    </form>	

                    <div class="row">

                        <div class="col-lg-6 col-12">
                            
                            <!--=======  Select Delivery Slot  =======-->
                            
                            <div class="calculate-shipping">
                                <h4>Delivery Date </h4>
                                <form action="{{ url('selectPincode') }}" method="post">

                                    <div class="row">


                                        <div class="col-md-6 col-12 mb-25">
                                            @csrf
                                            
                                                @if($delivery_dates)
                                                @foreach($delivery_dates as $key => $date)
                                                <input type="radio" name="delivery_date" value="{{ $date }}" style="width: auto; height: auto;" onclick="getDeliveryDate('{{ $date }}')">&nbsp;&nbsp; <span style="font-size:  16px;">{{ $date ?? '' }}</span><br>
                                                @endforeach
                                                @endif
                                           
                                        </div>


                                        <!-- <div class="col-md-6 col-12 mb-25">
                                            <input type="submit" value="Estimate">
                                        </div> -->


                                    </div>
                                </form>
                            </div>
                            
                            <!--=======  End of Calculate Shipping  =======-->
                            
                            <!--=======  Calculate Shipping  =======-->
                            
                            <div class="calculate-shipping">
                                <h4>Calculate Shipping</h4>
                                <form action="{{ url('selectPincode') }}" method="post">
                                    
                                    <div class="row">


                                        <div class="col-md-6 col-12 mb-25">
                                            @csrf
                                            <select class="form-control" name="select_pincode" id="select_pincode" required="required">
                                                <option value="">Select Pincode</option>
                                                @if($all_pincodes)
                                                @foreach($all_pincodes as $pincode)
                                                <option value="{{ $pincode->pincode }}" @if($session_pincode == $pincode->pincode){{ 'selected' }} @endif>{{ $pincode->pincode ?? '' }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if($session_pincode)
                                            <?php
                                            $total_shipp = 0;
                                                $checkPincode = DB::table('locations')->where('pincode',$session_pincode)->first();
                                                if($checkPincode){
                                                    $total_shipp = $checkPoint->shipping_amount;
                                                }
                                            ?>
                                            <p>&nbsp; &nbsp;Shipping Cost :  Rs. {{$total_shipp}} </p>
                                            @endif

                                            
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <!--<input type="submit" value="Estimate">-->
                                            <input type="submit" value="Select">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!--=======  End of Calculate Shipping  =======-->
                            
                            <!--=======  Discount Coupon  =======-->
                            
                            <div class="discount-coupon">
                                <h4>Discount Coupon Code</h4>
                                <form action="{{ url('applyCoupon') }}" method="post">
                                    <div class="row">
                                        <input type="hidden" value="{{$grandTotal}}" name="grand_total" id="grand_total">
                                        @csrf
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="form-control select_coupon" name="select_coupon" id="select_pincode" required="required">
                                                <option value="">Select Coupon</option>
                                                @if($promocodes)
                                                @foreach($promocodes as $promocode)
                                                <option value="{{ $promocode->id ?? '' }}" @if($coupon_code==$promocode->promocode_name){{'selected'}}@endif>{{ $promocode->promocode_name ?? '' }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <input type="hidden" name="total_bill" id="total_bill" value="{{$grandTotal}}">

                                            <p id="couponDescription"></p>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="submit" value="Apply Coupon" disabled id="apply_coupon">
                                            @if($coupon_code!='')
                                            <a href="remove_coupon" value="" class="btn btn-danger" id="apply_coupon" >Remove Code</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!--=======  End of Discount Coupon  =======-->
                            
                        </div>


                        <div class="col-lg-6 col-12 d-flex">
                            <!--=======  Cart summery  =======-->

                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    
                                    <h4>Cart Summary</h4>
                                    <p>MRP  Total <span id="subTotal">RS. {{ $mrp_total }}.00 </span></p>
                                    <p>Sub Total <span id="subTotal">RS. {{ $subTotal }} </span></p>
                                    <p>Shipping Cost <span id="totalShippingCharge">Rs. {{ $shippingTotal ?? '0' }}</span></p>
                                    <input type='hidden' id="shippingTotal" value="{{ $shippingTotal }}">
                                    @if($coupon_amount>0)
                                    <p>Coupon Discount <span id="couponDiscount">-Rs. {{ $coupon_amount  }}</span></p>
                                    <h2>Grand Total <span id="totalBill">Rs. {{$grandTotal-$coupon_amount}}</span></h2>
                                    @else
                                    <h2>Grand Total <span id="totalBill">Rs. {{$grandTotal}}</span></h2>
                                    <h2>Total Bachat <span id="couponDiscount">Rs. {{ number_format( $mrp_total-$subTotal ,2,'.',' ') }} </span></h2>
                                    
                                    @endif
                                    
                                     @if($coupon_amount>0)
                                    <h2>Total Bachat <span id="couponDiscount">Rs. {{ number_format( $mrp_total-$subTotal+$coupon_amount ,2,'.',' ') }} </span></h2>
                                    @endif
                                    
                                    <p>GST (Included) <span id="bill">Rs. {{ number_format($gst,2,'.',' ') }} </span></p>
                                </div>
                                <div class="cart-summary-button">
                                    <a onclick="window.location='/checkout'" class="btn text-dark btn-success checkout-btn" style="color: #fff !important;">Checkout</a>
                                    <a href="{{ url('/') }}" class="btn btn-warning update-btn" style="color: #fff;">Continue Shopping</a>
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