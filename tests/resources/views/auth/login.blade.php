@extends('layouts.front.app')
@section('content')


  <!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('login') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Login </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<!--=====  End of breadcrumb area  ======-->

	<!--=============================================
	=            Login  page content         =
	=============================================-->
	
	<div class="page-content mb-50">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30"></div>
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
					<!-- Login Form s-->
					<form method="post" action="{{ url('customerLogin') }}" id="customer_login">
									<input type="hidden" name="form_type" value="customer_login"><input type="hidden" name="utf8" value="✓">
									{{ csrf_field() }}

						<div class="login-form">
							<h4 class="login-title">Login</h4>

							@include('layouts.errors-and-messages')

							<div class="row">
								<div class="col-md-12 col-12 mb-20">
									<label>Email Address*</label>
									<input class="mb-0" type="email" name='email' placeholder="Email Address" id="CustomerEmail">
								</div>
								<div class="col-12 mb-20">
									<label>Password</label>
									<input class="mb-0" type="password" name="password" placeholder="Password" id="CustomerPassword">
								</div>
								<div class="col-md-8">
									
									<div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
										<input type="checkbox" id="remember_me">
										<label for="remember_me">Remember me</label>
									</div>
									
								</div>

								<div class="col-md-4 mt-10 mb-20 text-left text-md-right">
									<a href="{{ url('forgot_password') }}"> Forgotten pasward?</a>
								</div>

								<div class="col-md-12">
									<button class="register-button mt-0">Login</button>
								</div>




								

								<div class="col-sm-12">
									<div class="registration-social-login-options">
										<h6>Sign in with one of your social accounts</h6>

										<a href="{{ url('redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> <span>Facebook</span></a>

										<a href="{{ url('redirect/google') }}" class="btn btn-danger"><i class="fa fa-google-plus"></i> <span>Google</span></a>

									</div><!-- close .registration-social-login-options -->
								</div>







							</div>
						</div>

					</form>
				</div>
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30"></div>

			</div>
		</div>
	</div>
	
	<!--=====  End of Login  page content  ======-->
	

@endsection