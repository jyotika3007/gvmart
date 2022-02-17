
<?php
   $companyInfor = DB::table('company_details')->first();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Invoice - {{ config('app.name') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
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

.totalBill h2{
  font-size: 24px;
}

.totalBill span {
  float: right;
}
    </style>
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>


<div class="section">
   <div class="col-md-12">
      <div class="invoice"  >
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <!--<a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>-->
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
           <img src="{{ asset('storage/'.$companyInfor->company_logo ?? '') }}" height="80px">
         </div>
         <!-- end invoice-company -->
         
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
                  GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}<br>
                  <!-- Services Product -->
               </div>
               <div class="invoice-detail">
                  <b>GST No - AA091020056142V</b><br>
                  <!-- Services Product -->
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
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
                         
                         <td colspan="3" class="totalBill">
                             	
											<p>MRP  Total <span id="subTotal">RS. {{ $mrp_total }} </span></p>
											<p>Sub Total <span>Rs. {{ $sub_total }}</span></p>
											<p>Shipping Fee <span>Rs. {{ $order->total_shipping ?? '0' }}</span></p>
											
											@if($order->coupon_amount>0)
                                    <p>Coupon Discount <span id="couponDiscount">-Rs. {{ $order->coupon_amount ?? ''  }}</span></p>
                                    <h2>Grand Total <span id="totalBill">Rs. {{$order->total}}</span></h2>
                                    @else
                                    <h2>Grand Total <span id="totalBill">Rs. {{$order->total}} </span></h2>
                                    @endif
                                    
                                     @if($order->coupon_amount>0)
                                    <h2>Total Bachat <span id="couponDiscount">Rs. {{ number_format($mrp_total-($sub_total)+$order->coupon_amount ,2,'.',' ') }} </span></h2>
                                    @else
                                    <h2>Total Bachat <span id="couponDiscount">Rs. {{ number_format($mrp_total-($sub_total) ,2,'.',' ') }} </span></h2>
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
         <!-- end invoice-content -->
         <!-- begin invoice-note -->

         <!-- <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
         </div> -->

         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR ORDER
            </p>
            <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i>support@gvmart.co.in</span>
               <!-- <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span> -->
               <!-- <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span> -->
            </p>
         </div>
         <!-- end invoice-footer -->
         
      </div>
   </div>
</div>



<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
 
history.pushState(null, document.title, location.href); 
history.back(); 
history.forward(); 
window.onpopstate = function () { 
    history.go(1); 
};

</script>
</body>
</html>