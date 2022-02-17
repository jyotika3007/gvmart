@extends('layouts.front.app')
@section('content')


<!--=============================================
	=            Login register page content         =
	=============================================-->
	
	<div class="page-content mb-50">
		<div class="container">
			<div class="row">
				
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-3"></div>
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
					<form method="post" action="{{ url('register') }}" id="registerCustomer">
						{{ csrf_field() }}


						<div class="login-form">
							<h4 class="login-title">Register</h4>

							<div class="row">
								<div class="col-md-6 col-12 mb-20">
									<label>Full Name</label>
									<input class="mb-0" type="text" placeholder="First Name" id="name" name="name">
									@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
								<div class="col-md-6 col-12 mb-20">
									<label>Mobile</label>
									<input class="mb-0" id="CreateMobileNo" name="mobile_no" type="number" placeholder="Mobile No.">
									@if ($errors->has('mobile_no'))
											<span class="help-block">
												<strong>{{ $errors->first('mobile_no') }}</strong>
											</span>
											@endif
								</div>
								<div class="col-md-12 mb-20">
									<label>Email Address*</label>
									<input class="mb-0" type="email" placeholder="Email Address">
									<span class="help-block">
												<strong id="emailError"></strong>
											</span>
								</div>
								<div class="col-md-6 mb-20">
									<label>Password</label>
									<input class="mb-0" type="password" placeholder="Password" id="CreatePassword" name="password">
								</div>
								<div class="col-md-6 mb-20">
									<label>Confirm Password</label>
									<input class="mb-0" type="password" placeholder="Confirm Password"  id="ConfirmPassword" name="password_confirmation">
									<i class="fa fa-eye" style="position: absolute;
									right: 10px;
									top: 9px;
									cursor: pointer;" onclick="getConfirmPassword()"></i>
								</div>
								<div class="col-12">
									<button class="login-btn hover-btn" type="button" onclick="postRegister()" style="display: none;">Sign Up Now</button>
									<button class="register-button mt-0"  id="checkRegistration">Continue</button>
								</div>



								<div class="col-sm-12">
									<div class="registration-social-login-options">
										<h6>Sign in with one of your social accounts</h6>

										<a href="{{ url('redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> <span>Facebook</span></a>

										<a href="{{ url('redirect/google') }}" class="btn btn-danger"><i class="fa fa-google-plus"></i> <span>Google</span></a>

									</div><!-- close .registration-social-login-options -->
								</div>



							</div>

							<div id="register2" style="display: none;">
								<div class="form-title"><h6>Enter OTP</h6></div>
								<p>Otp is send to your Email ID</p>
								<div class="form-group pos_rel {{ $errors->has('name') ? ' has-error' : '' }}">
									<input id="email_otp" name="otp" type="text" placeholder="Enter OTP Here" class="form-control lgn_input" autocapitalize="words" autofocus="" required="required" value="">
									<i class="uil uil-user-circle lgn_icon"></i>

								</div>
								<button class="login-btn hover-btn" type="button" onclick="checkOtp()" >Sign Up Now</button>
							</div>

						</div>

					</form>


					<div class="signup-link">
						<br>
								<p>Already have an account? - <a href="{{ url('login') }}">Login Now</a></p>
							</div>
				</div>
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-3"></div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Login register page content  ======-->
	


	@endsection


