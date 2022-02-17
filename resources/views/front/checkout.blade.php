@extends('layouts.front.app')

@section('content')
<style type="text/css">
	/*#addNewAddress{*/
	/*	display: none;*/
	/*}*/
</style>

@php $mrp_total =0; @endphp

	<!--=============================================
	=            Checkout page content         =
	=============================================-->

	<div class="breadcrumb-area mb-50">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<div class="breadcrumb-container">
						<ul>
							<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
							<li class="active">Checkout</li>
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
					
					<!-- Checkout Form s-->
					<form action="{{ url('postCheckout') }}" class="checkout-form" method="POST">
						@csrf
						<div class="row row-40">
							
							<div class="col-lg-7 mb-20">
								
								<!-- Billing Address -->
								<div id="billing-form" class="mb-40">
									<h4 class="checkout-title">Billing Address</h4>


									<!--@if($addresses)-->
									<!--<table class="table">-->
									<!--	<thead>-->
											
									<!--		<thead>-->
									<!--			<tr>-->
									<!--				<th>Addresses</th>-->
									<!--				<th>Belling Address</th>-->
									<!--				<th>Shipping Address</th>-->
									<!--			</tr>-->
									<!--		</thead>-->

									<!--		<tbody>-->
									<!--			@foreach($addresses as $addr)-->
									<!--			<tr>-->
									<!--				<td>-->
														
									<!--				</td>-->
									<!--				<td>-->
									<!--					<input type="radio" name="saved_billing_address" id="saved_billing_address" value="{{ $addr->id }}">-->
									<!--				</td>-->
									<!--				<td>-->
									<!--					<input type="radio" name="saved_delivery_address" id="saved_delivery_address" value="{{ $addr->id }}">-->
									<!--				</td>-->
									<!--			</tr>-->
									<!--			@endforeach-->
									<!--		</tbody>-->

									<!--	</thead>-->
									<!--</table>-->

									<!--<a onclick> Add New Address </a>-->
									<!--@endif-->


									<div class="row" id="addNewAddress">

										<div class="col-md-12 col-12 mb-20">
											<label>Full Name*</label>
											<input type="text" placeholder="Full Name" name="customer_name" value="{{ Auth::user()->name ?? '' }}" id="customer_name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Email Address*</label>
											<input type="email" name="customer_email" id="custEmail" value="{{ Auth::user()->email ?? '' }}" placeholder="Email Address" @if(Auth::user()) readonly="readonly" @endif>
											<p id="emailError"></p>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input type="text" placeholder="Phone number" name="phone" required="required" value="@if(!empty($last_address)){{$last_address->phone ?? ''}}@endif" onkeypress="return isNumberKey(event)" maxlength="10">
										</div>

										

										<div class="col-12 mb-20">
											<label>Address*</label>
											<input type="text" placeholder="Address line 1" name="address_1" required="required" value="@if(!empty($last_address)){{$last_address->address_1 ?? ''}}@endif">
											<input type="text" placeholder="Address line 2" name="address_2" value="@if(!empty($last_address)){{$last_address->address_2 ?? ''}}@endif">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Country*</label>
											<select class="nice-select">
												<!-- <option>Bangladesh</option>
												<option>China</option>
												<option>country</option> -->
												<option>India</option>
												<!-- <option>Japan</option> -->
											</select>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Landmark*</label>
											<input type="text" name="landmark" required="required" placeholder="Landmark" value="@if(!empty($last_address)){{$last_address->landmark ?? ''}}@endif">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>City*</label>
											<input type="text" placeholder="Town/City" name="city" required="required" value="@if(!empty($last_address)){{$last_address->city ?? ''}}@endif">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>State*</label>
											<input type="text" name="state_code" required="required" placeholder="State" value="@if(!empty($last_address)){{$last_address->state_code ?? ''}}@endif">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Zip Code*</label>
											<input type="text" placeholder="Zip Code" name="zip" required="required" value="@if($session_pincode!=0){{$session_pincode}}@else @if(!empty($last_address)){{$last_address->zip ?? ''}}@endif @endif" onkeypress="return isNumberKey(event)" maxlength="8">
										</div>

										<div class="col-12 mb-20">
											
											<div class="check-box">
												<input type="checkbox" id="shiping_address" name="shiping_another_address" data-shipping>
												<label for="shiping_address">Ship to Different Address</label>
											</div>
										</div>

									</div>

								</div>
								
								<!-- Shipping Address -->
								<div id="shipping-form" class="mb-40">
									<h4 class="checkout-title">Shipping Address</h4>

									<div class="row">


										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input type="text" placeholder="Phone number" name="phone1" onkeypress="return isNumberKey(event)" maxlength="10">
										</div>

										

										<div class="col-12 mb-20">
											<label>Address*</label>
											<input type="text" placeholder="Address line 1" name="address_11">
											<input type="text" placeholder="Address line 2" name="address_21">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Country*</label>
											<select class="nice-select">
												<!-- <option>Bangladesh</option>
												<option>China</option>
												<option>country</option> -->
												<option>India</option>
												<!-- <option>Japan</option> -->
											</select>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Landmark*</label>
											<input type="text" name="landmark1"  placeholder="Landmark">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>City*</label>
											<input type="text" placeholder="Town/City" name="city1">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>State*</label>
											<input type="text" name="state_code1" placeholder="State">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Zip Code*</label>
											<input type="text" placeholder="Zip Code" name="zip1" value="@if($session_pincode!=0){{$session_pincode}}@endif" onkeypress="return isNumberKey(event)" maxlength="6">
										</div>

										
									</div>

								</div>

								 <!--=======  Select Delivery Slot  =======-->
                            
                            <div class="calculate-shipping">
                                <h4>Delivery Date </h4>
                                <form action="{{ url('selectPincode') }}" method="post">

                                    <div class="row">


                                        <div class="col-md-6 col-12 mb-25">
                                            @csrf
                                            	<p id="deliveryDateError" style="color:red; padding: 0px 10px;"></p>
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

                                            
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="submit" value="Estimate">
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
                                        <input type="hidden" value="{{$grandTotal ?? ''}}" name="grand_total" id="grand_total">
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
                                            <input type="hidden" name="total_bill" id="total_bill" value="{{$grandTotal ?? ''}}">

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
                            
                        <!--End of Discount Coupon  `-->
								
							</div>
							
							<div class="col-lg-5">
								<div class="row">
									
									<!-- Cart Total -->
									<div class="col-12 mb-60">

										<h4 class="checkout-title">Cart Total</h4>

										<div class="checkout-cart-total">

											<h4>Product <span>Total</span></h4>
											
											<ul>
											    @php $gst=0; @endphp
												@foreach($products as $product)
												
												<?php $pro = DB::table('products')->where('id',$product->id)->first();  $mrp_total+=($pro->price*$product->cart_quantity);
												$gst+=($pro->gst*$product->cart_quantity*$product->price)/100;
												?>
												
												<li>{{ $product->name }} X {{ $product->cart_quantity }} <span>Rs. {{ number_format($product->price*$product->cart_quantity, 2) }}</span></li>
												@endforeach
												
											</ul>
											
											
											<style>
											    .totalBill span{ float: right; text-align: right; }
											</style>
                                  <div class="totalBill">
											
											
											
											<p>MRP  Total <span id="subTotal">RS. {{ $mrp_total }}.00 </span></p>
											<p>Sub Total <span>Rs. {{ number_format($totalBill, 2, '.', ',') }}</span></p>
											<p>Shipping Fee <span>Rs. {{ number_format($shippingTotal, 2, '.', ',') }}</span></p>
											
											@if($coupon_amount>0)
                                    <p>Coupon Discount <span id="couponDiscount">-Rs. {{ $coupon_amount  }}</span></p>
                                    <h2>Grand Total <span id="totalBill">Rs. {{$grandTotal-$coupon_amount}}</span></h2>
                                    @else
                                    <h3>Grand Total <span id="totalBill">Rs. {{$grandTotal}}</span></h3>
                                    <h3>Total Bachat <span id="couponDiscount">Rs. {{ number_format($mrp_total-$totalBill ,2,'.',' ') }} </span></h3>
                                    @endif
                                    
                                     @if($coupon_amount>0)
                                    <h3>Total Bachat <span id="couponDiscount">Rs. {{ number_format($mrp_total-$totalBill+$coupon_amount,2,'.',' ') }} </span></h3>
                                    @endif
                                    <h5>GST (Included) <span id="couponDiscount">Rs. {{ $gst  }}</span></h5>
                                    </div>
                                    
                                    
										</div>
										
									</div>

									<!-- Payment Method -->
									<div class="col-12">

									
										<h4 class="checkout-title">Payment Method</h4>

										<div class="checkout-payment-method">
											
											<!-- <div class="single-method">
												<input type="radio" id="payment_check" name="payment-method" value="check">
												<label for="payment_check">Check Payment</label>
												<p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div>
											
											<div class="single-method">
												<input type="radio" id="payment_bank" name="payment-method" value="bank">
												<label for="payment_bank">Direct Bank Transfer</label>
												<p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div>
										-->
										<div class="single-method">
										    <h6 id="paymentError" style="color:red; padding: 10px 25px;"></h6>
											<input type="radio" id="payment_cash" name="p_method" value="cod" required="required">
											<label for="payment_cash">Cash on Delivery</label>
											
											<p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
										</div>
										
										

											 <div class="single-method">
												<input type="radio" id="payment_paypal" name="p_method" value="online" >
												<label for="payment_paypal">Online</label>
												<p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div>
										
											<!--<div class="single-method">-->
											<!--	<input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">-->
											<!--	<label for="payment_payoneer">Payoneer</label>-->
											<!--	<p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>-->
											<!--</div>-->
									
										<!-- <div class="single-method">
											<input type="checkbox" id="accept_terms">
											<label for="accept_terms">I’ve read and accept the terms & conditions</label>
										</div> -->

									</div>

									<input type="hidden" name="billing_add" id="billing_add" value="">
									<input type="hidden" name="delivery_add" id="delivery_add" value="">
									<input type="hidden" name="products" value="{{$totalCartProduct}}">
									<input type="hidden" name="customer_id" value="@if($customer){{$customer->id}}@endif">
									<input type="hidden" name="total" value="{{$finalBill}}">
									<input type="hidden" name="shipping_amount" value="{{$shippingTotal}}">
									<input type="hidden" name="totalProducts" value="{{$totalProducts}}">
									<input type="hidden" name="shop_id" value="{{$shop_id}}">
									<input type="hidden" name="coupon_amount" value="{{$coupon_amount}}">
									<!-- <input type="hidden" name="finalBill" value="{{$finalBill}}"> -->
									<input type="hidden" name="payment_method" id="payment_method" value="cod">

									<button class="place-order" id="place_order">Place order</button>
									<button class="place-order" id="click_place_order" type="submit" hidden>Place order</button>

								</div>

							</div>
						</div>

					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<!--=====  End of Checkout page content  ======-->

@endsection

@section('scripts')

<script>

countCheck = 0;
    
    
    $('#place_order').on('click',function(){
        var cash = $('#payment_cash').val();
        var pal = $('#payment_paypal').val();
        var checkRadio = 0;

        if($('#payment_cash').is(':checked')) { 
            // alert('checked')
           $('#payment_method').val($('#payment_cash').val());
            $('#paymentError').text('');
            
        }
        else{
            if($('#payment_paypal').is(':checked')) { 
                $('#payment_method').val($('#payment_paypal').val());
            $('#paymentError').text('');   
            }
            else{
            // alert('unchecked')
            $('#paymentError').text('Select payment method first');
            checkRadio = checkRadio+1;
        }
        }
        

        if($("input[name='delivery_date']").is(':checked')){
        	// alert('DD');
        	$('#deliveryDateError').text('');
        }
        else{
        	checkRadio = checkRadio+1;
        	// alert('DDN');
        	$('#deliveryDateError').text('Select delivery date first');
        }
        
        var email = $('#custEmail').val();
           var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var res = emailReg.test( email );
//   alert(email)
  if(!res){
    //   alert(0)
      checkRadio = checkRadio+1;
      $('#emailError').text('Invalid Email');
       }
  else{
    //   alert('1')
      $('#emailEmail').text('');
  }
        
     

        if(checkRadio == 0){
        	 $('#click_place_order').click();
        }
        
    })
</script>


<script type="text/javascript">
	

 $('#customer_name').keydown(function (e) {
 	
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
      
      
     


</script>

@endsection