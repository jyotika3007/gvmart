@extends('layouts.front.app')

@section('content')

@include('front.include.breadcrumb')

    <!--=============================================
    =            Cart page content         =
    =============================================-->
    <style type="text/css">
        
        .orderStatus ul{
            margin-left: 25px;
        }
        .orderStatus ul li{
            float: left;
            display: flex;
            padding: 5px 15px;
            margin-right: 7px;
        }

        .orderStatus{
            margin-bottom: 25px;
        }

       

        .btn-default{
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .table-below ul li{
            float: left;
            font-size: 16px !important;
            padding-right: 45px;
        }
        .table-below h3{
            text-align: right;
            font-size: 24px;
        }


.invoice {
    background: #fff;
    padding: 20px
}

.totalBill span{
    float: right;
    text-align: right;
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

 .main-price {
    color: #999;
    font-size: 15px;
    /* font-size: 17px; */
    text-decoration: line-through;
    margin-right: 8px;
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}

    </style>
  
    <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%;">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Order Summary</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section section mb-50">
        <div class="container-fluid" style="width: 90%; margin: 0 5%">
                <div class="row">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                        
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <form action="#">				
                        <!--=======  cart table  =======-->
    @if($order->order_status_id<=5)                    
<div class="row orderStatus">

    <ul>
        <li class="btn @if($order->order_status_id >= 1){{'btn-success'}}@else{{'btn-default'}}@endif">Booked</li> 
        <li class="btn @if($order->order_status_id >= 2){{'btn-success'}}@else{{'btn-default'}}@endif">Approved</li>
        <li class="btn @if($order->order_status_id >= 3){{'btn-success'}}@else{{'btn-default'}}@endif">Processing</li>
        <li class="btn @if($order->order_status_id >= 4){{'btn-success'}}@else{{'btn-default'}}@endif">Shipped</li>
        <li class="btn @if($order->order_status_id == 5){{'btn-success'}}@else{{'btn-default'}}@endif">Delivered</li>
    </ul>
</div>
@endif 

<div class="row">
    <div class="col-sm-9">
        <h3>&nbsp;&nbsp;&nbsp;<b>Order ID -</b> {{ $order->id ?? '' }}</h3>
        <h5>&nbsp;&nbsp;&nbsp;<b>Booking Date -</b> {{ $order->booking_date ?? '' }}</h5>
    </div>
 @if($order->order_status_id>5)                    
    <div class="col-sm-3" style="text-align: center;">
        <p class="alert alert-danger">Order @if($order->order_status_id == 6){{'Cancelled'}}@else{{ 'Returned' }}@endif</p>
    </div>
    @else
    @if($order->order_status_id<5 && $order->return_order == 0 && $order->cancel_order == 0)
    <div class="col-sm-3" style="text-align: center;">
        <a href="{{ url('order_status/cancel/'.$order->id) }}" class="btn btn-danger">Cancel Order</a>
    </div>

@endif
@if($order->order_status_id == 5 && $order->return_order == 0 && $order->cancel_order == 0)
 <div class="col-sm-3" style="text-align: center;">
        <a href="{{ url('order_status/return/'.$order->id) }}" class="btn btn-danger">Return Order</a>
    </div>
@endif

@if($order->order_status_id <= 5 && ($order->return_order == 1 || $order->cancel_order == 1))
 <div class="col-sm-3" style="text-align: center;">
        <p class="alert alert-danger">Your request to @if($order->cancel_order == 1){{' cancel'}} @else{{'return' }}  @endif order is under process.</p>
    </div>
@endif

@endif
    
</div>
<br>


  
         <!-- begin invoice-header -->  
         <div class="invoice-header">
            <div class="invoice-from">
               <small>Billing Address</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{ $billing_address->address_1 }}</strong><br>
                  {{ $billing_address->landmark ?? '' }},<br>
                  {{ $billing_address->state_code ?? '' }}, {{ $billing_address->city ?? '' }},<br>
                  {{'India'}} - ({{ $billing_address->zip }})<br>
                  Phone: {{ $billing_address->phone }}<br>
                  <!-- Fax: (123) 456-7890 -->
               </address>
            </div>
            <div class="invoice-to">
               <small>Shipping Address</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{ $delivery_address->address_1 }}</strong><br>
                  {{ $delivery_address->landmark ?? '' }},<br>
                  {{ $delivery_address->state_code ?? '' }}, {{ $delivery_address->city ?? '' }},<br>
                  {{'India'}} - ({{ $delivery_address->zip }})<br>
                  Phone: {{ $delivery_address->phone }}<br>
                  <!-- Fax: (123) 456-7890 -->
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice / {{ date('M') }} period</small>
               {{ $order->booking_date }}
               <div class="date text-inverse m-t-5">{{ $order->booking_date }}</div>
               <div class="invoice-detail">
                  GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}}<br>
                  <!-- Services Product -->
               </div>
               <div class="invoice-detail">
                  <b>GST No - AA091020056142V</b><br>
                  <!-- Services Product -->
               </div>
            </div>
         </div>

 <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">

               <table class="table table-invoice">
                <tbody>
                    <tr>
                        <td><b>Name :</b> {{ $customer->name ?? '' }}</td>
                        <td><b>Email :</b> {{ $customer->email ?? '' }}</td>
                        <td><b>Payment :</b> {{ $order->payment=='cod'?'Cash On Delivery':$order['payment'] }}</td>
                        <td><b>Status :</b> {{ $currentStatus->name ?? '' }}</td>
                    </tr>
                </tbody>    
               </table>
<hr>
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th></th>
                        <th>Product</th>
                        <th class="text-center" width="10%">MRP</th>
                        <th class="text-center" width="10%">Sale Price</th>
                        <th class="text-center" width="10%">Quantity</th>
                        <th class="text-center" width="10%">CGST</th>
                        <th class="text-center" width="10%">SGST</th>
                        <th class="text-right" width="20%"> TOTAL</th>
                     </tr>
                  </thead>
                  <tbody>
                    @php $mrp_total=0; $sub_total=0; $gst=0; @endphp
                    @if(!empty($items))
                    @foreach($items as $item)
                    @php $pro = DB::table('products')->where('id',$item->product_id)->first(); @endphp
                    @php $mrp_total+=($pro->price*$item->quantity); $sub_total+=($item->quantity*$item->product_price); @endphp
                    
                    @php $gst+=($pro->gst*$item->quantity*$item->product_price)/100; @endphp
                    
                     <tr >
                        <td><img src="{{ asset('storage/'.$item->cover ?? '') }}" style="height: 75px;"></td>
                        <td>
                           <span class="text-inverse">{{ $item->product_name ?? '' }}</span><br>>
                        </td>
                        <td class="text-center main-price">Rs. {{ $pro->price ?? '0' }}</td>
                        <td class="text-center">Rs. {{ $item->product_price ?? '0' }}</td>
                        <td class="text-center">{{ $item->quantity ?? '1' }}</td>
                        <td class="text-center">Rs. {{ $pro->gst/2*($item->quantity*$item->product_price)/100  }}</td>
                        <td class="text-center">Rs. {{ $pro->gst/2*($item->quantity*$item->product_price)/100 }}</td>
                        <td class="text-right">Rs. {{ $item->quantity*$item->product_price }}</td>
                     </tr>
                     @endforeach
                     @endif
                     
                     <tr>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td colspan="2" class="totalBill">
                                
                                            <p>MRP  Total <span id="subTotal">RS. {{ $mrp_total }} </span></p>
                                            <p>Sub Total <span>Rs. {{ $sub_total }}</span></p>
                                            <p>Shipping Fee <span>Rs. {{ $order->total_shipping ?? '0' }}</span></p>
                                            
                                            @if($order->coupon_amount>0)
                                    <p>Coupon Discount <span id="couponDiscount">-Rs. {{ $order->coupon_amount ?? ''  }}</span></p>
                                    <h3>Grand Total <span id="totalBill">Rs. {{$order->total}}</span></h3>
                                    @else
                                    <h3>Grand Total <span id="totalBill">Rs. {{$order->total}} </span></h3>
                                    @endif
                                    
                                     @if($order->coupon_amount>0)
                                    <h3>Total Bachat <span id="couponDiscount">Rs. {{ number_format($mrp_total-($sub_total)+$order->coupon_amount,2,'.','.')  }}</span></h3>
                                    @else
                                    <h3>Total Bachat <span id="couponDiscount">Rs. {{ number_format($mrp_total-($sub_total),2,'.','.')  }}</span></h3>
                                    @endif
                                    <h5>GST (Included) <span id="bill">Rs. {{$gst}}</span></h5>
                         </td>
                         
                     </tr>
                     
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            
              <!-- <table class="table table-invoice">
                <tbody>
                    <tr>
                        <td><b>Shop :</b> {{ $shop->shop_name ?? '' }}</td>
                        <td><b>Email :</b> {{ $shop->email ?? '' }}</td>
                        <td><b>Address :</b> {{ $shop->address ?? '' }}, {{ $shop->city ?? '' }}, {{ $shop->state ?? '' }} - ({{ $shop->pincode ?? '' }}) </td>
                        
                    </tr>
                </tbody>    
            </table> -->
<hr>

            
            <!-- end invoice-price -->
         </div>

                        
                    </form>	

                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of Cart page content  ======-->


    @endsection