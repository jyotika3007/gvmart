﻿@extends('layouts.front.app')

@section('hello')
	<!-- Body Start -->
	<div class="wrapper">
		<div class="default-dt">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="default_tabs">
							<nav>
								<div class="nav nav-tabs tab_default  justify-content-center">
									<a class="nav-item nav-link active" href="{{ url('about_us') }}">About</a>
									<a class="nav-item nav-link" href="{{ url('blogs') }}">Blog</a>
									<a class="nav-item nav-link" href="{{ url('career') }}">Careers</a>
									<!-- <a class="nav-item nav-link" href="press.html">Press</a> -->
								</div>
							</nav>						
						</div>
						<div class="title129">	
							<h2>About Us</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="life-gambo">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="default-title left-text">
							<h2>About In Hand City</h2>
							<!-- <p>Customers Deserve Better</p> -->
							<img src="{{ asset('front/images/line.svg') }}" alt="">
						</div>
						<div class="about-content">
							<?php echo $content->description ?? ''; ?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-img">
							<img src="{{ asset('front/images/about.svg') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="about-steps-group white-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="about-step">
							<div class="about-step-img">
								<img src="{{ asset('front/images/about/icon-1.svg') }}" alt="">
							</div>
							<h4>400+</h4>
							<p>People have joined the Gambo team in the past six months</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="about-step">
							<div class="about-step-img">
								<img src="{{ asset('front/images/about/icon-2.svg') }}" alt="">
							</div>
							<h4>2x</h4>
							<p>Rate of growth in our monthly user base</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="about-step">
							<div class="about-step-img">
								<img src="{{ asset('front/images/about/icon-3.svg') }}" alt="">
							</div>
							<h4>10 days</h4>
							<p>Time taken to launch in 8 cities across India</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="about-step">
							<div class="about-step-img">
								<img src="{{ asset('front/images/about/icon-4.svg') }}" alt="">
							</div>
							<h4>95k</h4>
							<p>App downloads on iOS and Android</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="life-gambo">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="default-title">
							<h2>Our Team</h2>
							<p>Teamwork Makes the Dream Work</p>
							<img src="{{ asset('front/images/line.svg') }}" alt="">
						</div>
						<div class="dd-content">
							<div class="owl-carousel team-slider owl-theme">
								<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="{{ asset('front/images/team/img-1.jpg') }}" alt="">
										</div>
										<h4>Joginder Singh</h4>
										<span>CEO & Co-Founder</span>
										<ul class="team-social">
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="{{ asset('front/images/team/img-2.jpg') }}" alt="">
										</div>
										<h4>John Doe</h4>
										<span>CTO & Senior Developer</span>
										<ul class="team-social">
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="{{ asset('front/images/team/img-3.jpg') }}" alt="">
										</div>
										<h4>Jassica William</h4>
										<span>HR Manager</span>
										<ul class="team-social">
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="item">
									<div class="team-item">
										<div class="team-img">
											<img src="{{ asset('front/images/team/img-4.jpg') }}" alt="">
										</div>
										<h4>Zoena Singh</h4>
										<span>Senior Sales Manager</span>
										<ul class="team-social">
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#" class="scl-btn hover-btn"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="how-order-gambo">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="default-title">
							<h2>How Do I Order?</h2>
							<p>How Do I order on Gambo</p>
							<img src="{{ asset('front/images/line.svg') }}" alt="">
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="uil uil-search"></i>
							</div>
							<h4>Browse gambo.com for products or use the search feature</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="uil uil-shopping-basket"></i>
							</div>
							<h4>Add item to your shopping Basket</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="uil uil-stopwatch"></i>
							</div>
							<h4>Choose a convenient delivery time from our 5 Slots* a day</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="uil uil-money-bill"></i>
							</div>
							<h4>Select suitable payment option(Cash, Master, Credit Card, Discover)</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="uil uil-truck"></i>
							</div>
							<h4>Your products will be home-delivered as per your order.</h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="how-order-steps">
							<div class="how-order-icon">
								<i class="uil uil-smile"></i>
							</div>
							<h4>Happy Curstomers</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Body End -->
	
	@endsection