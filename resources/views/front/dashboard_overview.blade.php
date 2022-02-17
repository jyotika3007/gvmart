@extends('layouts.front.app')
@section('content')
    <!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%;">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<!--=====  End of breadcrumb area  ======-->

	<!--=============================================
	=            My account page section         =
	=============================================-->
	<div class="my-account-section section position-relative mb-50 fix">
		<div class="container-fluid" style="margin: 0 5%; width: 90%;">
			<div class="row">
				<div class="col-12">
					@if(session()->get('accounts'))
	<div class="alert alert-success" style="text-align: center;">{{ session()->get('accounts') }}</div>
@endif
					<div class="row">

						<!-- My Account Tab Menu Start -->
						<div class="col-lg-3 col-12">
							<div class="myaccount-tab-menu nav" role="tablist">
								<a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
									Dashboard</a>

								<a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

								<!-- <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a> -->

								<!-- <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
									Method</a> -->

								<a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

								<a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

								<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

							</div>
						</div>
						<!-- My Account Tab Menu End -->

						<!-- My Account Tab Content Start -->
						<div class="col-lg-9 col-12">
							<div class="tab-content" id="myaccountContent">
								<!-- Single Tab Content Start -->
								<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
									<div class="myaccount-content">
										<h3>Dashboard</h3>

										<div class="welcome">
											<p>Hello, <strong>{{ ucfirst(Auth::user()->name ?? '') }}</strong> (If Not <strong>{{ ucfirst(Auth::user()->name ?? '') }} !</strong><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout)</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></p>
										</div>

										<p class="mb-0">From your account dashboard. you can easily check &amp; view your
											recent orders, manage your shipping and billing addresses and edit your
											password and account details.</p>
									</div>
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								<div class="tab-pane fade" id="orders" role="tabpanel">
									<div class="myaccount-content">
										<h3>Orders</h3>

										<div class="myaccount-table table-responsive text-center">
											<table class="table table-bordered">
												<thead class="thead-light">
												<tr>
													<th>Order ID</th>
													<th>Products</th>
													<th>Date</th>
													<th>Status</th>
													<th>Total</th>
													<th>Action</th>
												</tr>
												</thead>

												<tbody>
													@if(!empty($orders))
													@foreach($orders as $order)
												<tr>
													<td>GVM/{{ date('Y',strtotime($order['order']->created_at)) }}/#{{ str_pad($order['order']->id, 4, '0', STR_PAD_LEFT)}}</td>
													<td>
														
														@if(!empty($order['items']))
																@foreach($order['items'] as $item)
																{{ $item->product_name ?? '' }} <br>  
																@endforeach
																@endif

													</td>
													<td>{{ $order['order']->booking_date ?? '' }}</td>
													<td>
														@foreach($order_statuses as $status)

														@if($status->id == $order['order']->order_status_id) {{ $status->name ?? ''}} @endif

@endforeach
													</td>
													<td>Rs. {{ $order['order']->total_paid ?? '' }}</td>
													<td><a href="{{ url('orderDetail/'.$order['order']->id) }}" class="btn">View</a></td>
												</tr>
												@endforeach
												@endif
												
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->

								
								
								<!-- Single Tab Content Start -->
								<div class="tab-pane fade" id="address-edit" role="tabpanel">
									<div class="myaccount-content">
										<h3> Addresses  <span style="margin-left: 50%"><a href="{{ url('customer/'.Auth()->user()->id.'/add_address') }}" class="btn d-inline-block edit-address-btn"><i class="fa fa-plus"></i>Add New</a></span></h3>
<div class="row">
										@if(!empty($addresses))
											@foreach($addresses as $address)
											<div class="col-sm-4">
											<address>
											<p><strong>{{ $address->alias }}</strong></p>
											<p>{{ $address->address_1 }}, 
												{{ $address->landmark ?? '' }},
												<br>{{ $address->city ?? '' }}, {{ $address->state_code ?? '' }},
												<br> {{ $address->country ?? '' }} - {{ $address->zip }}</p>
													<p>Contact - {{ $address->phone ?? '' }}</p>
										</address>

										<a href="{{ url('customer/edit_address/'.$address->id) }}" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i></a>
										<a onclick="removeAddress({{ $address->id ?? '' }})" class="btn d-inline-block edit-address-btn"><i class="fa fa-trash"></i></a>
									</div>

											@endforeach
											@endif

										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								<div class="tab-pane fade" id="account-info" role="tabpanel">
									<div class="myaccount-content">
										<h3>Account Details</h3>

										<div class="account-details-form">
											<form action="" method="POST">
												@csrf
												<div class="row">
													<input type="hidden" name="id" value="{{ Auth::user()->id ?? '' }}">
													<div class="col-lg-6 col-12 mb-30">
														<input id="first-name" placeholder="First Name" type="text" value="{{ explode(' ',Auth::user()->name)[0] ?? ''}}" name="name1">
													</div>

													<div class="col-lg-6 col-12 mb-30">
														<input id="last-name" placeholder="Last Name" type="text" value="{{ explode(' ',Auth::user()->name)[1] ?? ''}}" name="name2" >
													</div>

													
													<div class="col-12 mb-30">
														<input id="email" placeholder="Email Address" type="email" name="email" value="{{ Auth::user()->email ?? '' }}" readonly="readonly">
													</div>

													<div class="col-12 mb-30">
														<input id="mobile" placeholder="Mobile Number" type="number" name="mobile" value="{{ Auth::user()->mobile ?? '' }}" >
													</div>

													<div class="col-12 mb-30"><h4>Password change</h4></div>

													

													<div class="col-lg-6 col-12 mb-30">
														<input id="new-pwd" placeholder="New Password" type="password" name="password">
													</div>

													<div class="col-lg-6 col-12 mb-30">
														<input id="confirm-pwd" placeholder="Confirm Password" type="password" name="confirm_password">
													</div>

													<div class="col-12">
														<button class="save-change-btn" type="submit">Save Changes</button>
													</div>

												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->
							</div>
						</div>
						<!-- My Account Tab Content End -->
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of My account page section  ======-->
	

	@endsection