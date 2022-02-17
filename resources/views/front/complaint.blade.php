@extends('layouts.front.app')

@section('content')

@include('front.include.breadcrumb')
   
<div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%;">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Complaint</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!--=============================================
	=            Contact page content         =
	=============================================-->
	
	<div class="page-content mb-50">

		<!--=============================================
		=            google map container         =
		=============================================-->
		
	
		
		<!--=====  End of google map container  ======-->

		<div class="container-fluid" style="margin: 0 5%; width: 90%;">
			<div class="row">
			
				<div class="col-lg-9 col-md-8 mb-xs-35">
					<!--=======  contact form content  =======-->
					
					<div class="contact-form-content" style="background-color: #ffffff;
    padding: 30px 20px;
    -webkit-box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 4px 0px rgba(0, 0, 0, 0.1);">
						<h3 class="contact-page-title">Tell Us Your Complaint</h3>

						<div class="contact-form">
							<form  action="{{ url('contact-form-submit') }}" method="POST">
                                @csrf
								<div class="form-group">
									<label>Your Name <span class="required">*</span></label>
									<input type="text" name="name" id="name" required>
								</div>
								<div class="form-group">
									<label>Your Email <span class="required">*</span></label>
									<input type="email" name="email" id="email" required>
								</div>
								<div class="form-group">
									<label>Subject</label>
									<input type="text" name="subject" id="subject" required="required">
								</div>
								<div class="form-group">
									<label>Your Message</label>
									<textarea name="message" id="message" required="required"></textarea>
								</div>
								<div class="form-group">
									<button type="submit" value="submit"  class="contact-form-btn" name="submit">send</button>
								</div>
							</form>
						</div>
						<p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
					</div>
					
					<!--=======  End of contact form content =======-->
				</div>
					<div class="col-lg-3 col-md-4  pl-100 pl-xs-15">
					<!--=======  contact page side content  =======-->
					
					<div class="contact-page-side-content">
						<h3 class="contact-page-title">Contact Us</h3>

						<!--=======  single contact block  =======-->
						
						<div class="single-contact-block">
							<h4><img src="{{ asset('assets/images/icons/contact-icon1.png') }}" alt=""> Address</h4>
							<p>{{ $companyInfo->address ?? '' }}, {{ $companyInfo->city ?? '' }}, {{ $companyInfo->state ?? '' }} - {{ $companyInfo->pincode ?? '' }}</p>
						</div>
						
						<!--=======  End of single contact block  =======-->

						<!--=======  single contact block  =======-->
						
						<div class="single-contact-block">
							<h4><img src="{{ asset('assets/images/icons/contact-icon2.png') }}" alt=""> Phone</h4>
							<p>Mobile: (+91) {{ $companyInfo->contact ?? '9810779462' }}</p>
							<!-- <p>Hotline: 1009 678 456</p> -->
						</div>
						
						<!--=======  End of single contact block  =======-->

						<!--=======  single contact block  =======-->
						
						<div class="single-contact-block">
							<h4><img src="{{ asset('assets/images/icons/contact-icon3.png') }}" alt=""> Email</h4>
							<!-- <p>yourmail@domain.com</p> -->
							<p>{{ $companyInfo->contact_email ?? 'support@gvmart.co.in' }}</p>
						</div>
						
						<!--=======  End of single contact block  =======-->
					</div>
					
					<!--=======  End of contact page side content  =======-->

				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Contact page content  ======-->
	

@endsection


@section('scripts')


    <!-- Google Map -->
	<script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
	
    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.740610, -73.935242), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on

                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('google-map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.740610, -73.935242),
                map: map,
                title: 'GV Mart',
                icon: "/assets/images/icons/map-marker.png",
                animation: google.maps.Animation.BOUNCE
            });
        }
    </script>

@endsection