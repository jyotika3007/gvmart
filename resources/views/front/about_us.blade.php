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
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
		<div class="life-gambo">
			<div class="containerifluid" style="margin: 0 5%; width: 90%">
				<div class="row"  style="margin: 0 5%; width: 90%">
					<div class="col-lg-8">
						<div class="default-title left-text">
							<h2>About GV MART</h2>
							<!-- <p>Customers Deserve Better</p> -->
							<img src="{{ asset('front/images/line.svg') }}" alt="">
						</div>
						<div class="about-content">
							<?php echo $content->description ?? ''; ?>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="about-img">
							<img src="{{ asset('front/images/about.svg') }}" alt="" style="margin-left: 5%; height: 300px; width: auto">
						</div>
					</div>
				</div>
			</div>
		</div>

		<br><br><br><br><br>
		
		
		
<!--=============================================
	=           Testimonial slider container         =
	=============================================-->
	@if($testimonials)
<div class="container-fluid" style="margin: 0 5%; width: 90%" id="myslidersec">
	<div class="row">
	 <div class="col-lg-12 mx-auto" >
			<h2>testimonial</h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					@foreach($testimonials as $key => $test)
					<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="@if($key==0){{'active'}}@endif"></li>
				@endforeach
				</ol>   
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
					@foreach($testimonials as $key => $test)
					<div class="carousel-item @if($key==0){{'active'}}@endif">
						<div class="img-box">
						    <img alt="" src="{{ asset('storage/'.$test->cover ?? '') }}"></div>
						<p class="testimonial2"><?php echo $test->description ?> </p>
						<p class="overview"><b> {{ ucfirst($test->name ?? '') }},</b> {{ ucfirst($test->profession ?? '') }}</p>
					</div>
				@endforeach
					
				</div>
				<!-- Carousel controls -->
				<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="carousel-control-next" href="#myCarousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
</div>

@endif
	
	<!--=====  End of Testimonial Slider  ======-->
	
	<!-- Body End -->
	
	@endsection