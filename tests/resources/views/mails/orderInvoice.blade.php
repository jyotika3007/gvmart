<?php
   $companyInfor = DB::table('company_details')->first();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Invoice - config('app.name')</title>
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
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">



<div class="container">
   <div class="col-md-12">
      <div class="invoice"  >
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <!--<a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>-->
            <!--<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>-->
            </span>
           <img src="{{ asset('storage/'.$companyInfor->company_logo ?? '') }}" width="20%">
         </div>
         <!-- end invoice-company -->
         
         <!-- begin invoice-header -->  
         <div class="invoice-header">
            <div class="invoice-from">
               <small>Billing Address</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{ $billing_address->address_1 }}</strong><br>
                  {{'India'}} - ({{ $billing_address->zip }})<br>
                  Phone: {{ $billing_address->phone }}<br>
                  <!-- Fax: (123) 456-7890 -->
               </address>
            </div>
            <div class="invoice-to">
               <small>Shipping Address</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{ $delivery_address->address_1 }}</strong><br>
                  {{'India'}} - ({{ $delivery_address->zip }})<br>
                  Phone: {{ $delivery_address->phone }}<br>
                  <!-- Fax: (123) 456-7890 -->
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice / July period</small>
               {{ $order->booking_date }}
               <div class="date text-inverse m-t-5">{{ date('M d, Y',strtotime($order->booking_date)) }}</div>
               <div class="invoice-detail">
                  #00{{ $order->id }}<br>
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
                        <td><b>Payment :</b> {{ $order->payment=='cod'?'Cash On Delivery':$order->payment }}</td>
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
                        <th class="text-center" width="10%">Price</th>
                        <th class="text-center" width="10%">Quantity</th>
                        <th class="text-right" width="20%"> TOTAL</th>
                     </tr>
                  </thead>
                  <tbody>
                    
                    @if(!empty($items))
                    @foreach($items as $item)
                     <tr>
                        <td><img src="{{ asset('storage/'.$item->cover ?? '') }}" style="height: 75px;"></td>
                        <td>
                           <span class="text-inverse">{{ $item->product_name ?? '' }}</span><br>
                           <small><?php echo substr($item->description ?? '',0,100) ?>...</small>
                        </td>
                        <td class="text-center">Rs. {{ $item->product_price ?? '0' }}</td>
                        <td class="text-center">{{ $item->quantity ?? '1' }}</td>
                        <td class="text-right">Rs. {{ $item->quantity*$item->product_price }}</td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->

            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>SUBTOTAL</small>
                        <span class="text-inverse">Rs. {{ $order->total }}</span>
                     </div>
                     <div class="sub-price">
                        <!-- <i class="fa fa-plus text-muted"></i> -->
                     </div>
                     <div class="sub-price">
                        <!-- <small>PAYPAL FEE (5.4%)</small> -->
                        <!-- <span class="text-inverse">$108.00</span> -->
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
                  <small>TOTAL</small> <span class="f-w-600">Rs. {{ $order->total }}</span>
               </div>
            </div>
            
            
              <table class="table table-invoice">
                <tbody>
                    <tr>
                        <td><b>Shop :</b> {{ $shop->shop_name ?? '' }}</td>
                        <td><b>Email :</b> {{ $shop->email ?? '' }}</td>
                        <td><b>Address :</b> {{ $shop->address ?? '' }}, {{ $shop->city ?? '' }}, {{ $shop->state ?? '' }} - ({{ $shop->pincode ?? '' }}) </td>
                        <!--<td><b>Status :</b> {{ $currentStatus->name ?? '' }}</td>-->
                    </tr>
                </tbody>    
            </table>
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
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i>inhandcityofficials@gmail.com</span>
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
	
</script>
</body>
</html>