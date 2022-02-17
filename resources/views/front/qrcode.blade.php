@extends('layouts.front.app')

@section('content')

<style>

#myslidersec h2 {
	color: #333;
	text-align: center;
	text-transform: uppercase;
	font-family: "Roboto", sans-serif;
	font-weight: bold;
	position: relative;
	margin: 30px 0 60px;
}
#myslidersec h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 3px;
	background: #8fbc54;
	left: 0;
	right: 0;
	bottom: -10px;
}
#myslidersec .col-center {
	margin: 0 auto;
	float: none !important;
}
#myslidersec .carousel {
	padding: 20px 70px;
}
#myslidersec .carousel .carousel-item {
	color: #999;
	font-size: 14px;
	text-align: center;
	overflow: hidden;
	min-height: 290px;
}
#myslidersec .carousel .carousel-item .img-box {
	width: 135px;
	height: 135px;
	margin: 0 auto;
	padding: 5px;
	border: 1px solid #ddd;
	border-radius: 50%;
}
#myslidersec .carousel .img-box img {
	width: 123px;
	height: 123px;
	display: block;
	object-fit: cover;
    object-position: top;
	border-radius: 50%;
}
#myslidersec .carousel .testimonial2 {
	padding: 30px 0 10px;
}
#myslidersec .carousel .overview {	
	font-style: italic;
}
#myslidersec .carousel .overview b {
	text-transform: uppercase;
	color: #7AA641;
}
#myslidersec .carousel-control-prev, .carousel-control-next {
	width: 40px;
	height: 40px;
	margin-top: -20px;
	top: 50%;
	background: none;
}
#myslidersec .carousel-control-prev i, .carousel-control-next i {
	font-size: 68px;
	line-height: 42px;
	position: absolute;
	display: inline-block;
	color: rgba(0, 0, 0, 0.8);
	text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
}
#myslidersec .carousel-indicators {
	bottom: -40px;
}
#myslidersec .carousel-indicators li, .carousel-indicators li.active {
	width: 12px;
	height: 12px;
	margin: 1px 3px;
	border-radius: 50%;
	border: none;
}
#myslidersec .carousel-indicators li {	
	background: #999;
	border-color: transparent;
	box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}
#myslidersec .carousel-indicators li.active {	
	background: #555;		
	box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
}

#myCarousel {background-color: #ffffff;
    -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
    margin: 50px 0; padding:30px 10px; }
</style>

	<!-- Body Start -->
    <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Online Payment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
		<div class="life-gambo">
			<div class="containerifluid" style="margin: 0 5%; width: 90%">
				<div class="row"  style="margin: 0 5%; width: 90%">
					<div class="col-lg-2">
						
					</div>
					
					
					<div class="col-lg-8 card" style="min-height: 475px">
					    <center>
					        <br>
					    <h3>Scan To Pay</h3>
					    <br>
					    <h5><b>Total Amount : {{ $order->total_paid }}</b></h5>
						    <img src="{{ asset('images/qrcode.jpeg') }}" alt="GV Solutions QrCode For Online Payment" style="width: auto; height: 300px;">
						    <br><br>
						    <!--<p><b>Order Id - {{ $order->id }}</b></p>-->
						    <!--<p><b>Booking Date - {{ $order->booking_date }}</b></p>-->
						    
						    <span class="alert alert-success" onclick="getNotification()" style="cursor: pointer">Click To Continue</span>
						    </center>
					</div>	
					
					
					<div class="col-lg-2">
						
					</div>
				</div>
			</div>
		</div>

		<br><br><br><br><br>
		
		

	
	<!-- Body End -->
	
	@endsection
	@section('scripts')

<script>
    function getNotification(){
        
       
    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
    
    jQuery.ajax({
     url: '/removeSession',
     type: 'POST',
     data: { _token:CSRF_TOKEN },
     success: function (data) {
     Swal('Thank You. You will receive a order booking confirmation once we receive your payment.')
        
        setTimeout(function(){
        window.location.href = '/';       
      }, 3000);
      
   }
 });
       
    }
</script>

@endsection