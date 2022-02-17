@extends('layouts.front.app')
@section('content')

<style type="text/css">
	
	body{
		background-color: #ffffff;
	}

	.red {
	    color: red;
 	}

	.green {
	    color: green;
	}

	#passwordError, #cpasswordError {
		font-weight: normal;
		padding-left: 10px;
	}

	strong {
		color : red;
		font-weight: normal;
		padding-left: 10px;
	}

	#eyed1, #eyed2 {
		display: none;
	}

</style>

  <!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%;">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('login') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Sign Up</li>
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
		<div class="container-fluid" style="margin: 0 5%; width: 90%;">
			<div class="row">
				 <div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30"></div> 
			



				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
					<form method="post" action="{{ url('register') }}" id="registerCustomer">
						{{ csrf_field() }}


						<div class="login-form">
							<h4 class="login-title">Sign Up</h4>

							<div class="row">
								<div id="register1" style="width: 100%;">
									<div class="col-md-12 col-12 mb-20">
										<label>Full Name</label>
										<input class="mb-0" type="text" placeholder="First Name" id="name" name="name">
										<span class="help-block">
											<strong id="nameError"></strong>
										</span>
									</div>
									<div class="col-md-12 col-12 mb-20">
										<label>Mobile</label>
										<input class="mb-0" id="CreateMobileNo" name="mobile_no" pattern="[1-9]{1}[0-9]{9}"  type="text" placeholder="Mobile No." onkeypress="return isNumberKey(event)" maxlength="10">
										<span class="help-block">
											<strong id="mobileError"></strong>
										</span>
									</div>
									<div class="col-md-12 mb-20">
										<label>Email Address*</label>
										<input class="mb-0" type="email" id="customerEmail" name="email" placeholder="Email Address">
										<span class="help-block">
											<strong id="emailError"></strong>
										</span>
									</div>
									<div class="col-md-12 mb-20">
										<label>Password</label>
										<input class="mb-0" type="password" placeholder="Password" id="CreatePassword" name="password">
										<p id="passwordError">Password length should be between 6 and  20 characters</p>
										<i class="fa fa-eye" style="position: absolute;
										right: 30px;
										top: 50px;
										cursor: pointer;" onclick="getPassword()" id="eye1" title="Show Password"></i>

										<i class="fa fa-eye-slash" style="position: absolute;
										right: 30px;
										top: 50px;
										cursor: pointer;" onclick="getPassword()" id="eyed1" title="Hide Password"></i>
									</div>
									<div class="col-md-12 mb-20">
										<label>Confirm Password</label>
										<input class="mb-0" type="password" placeholder="Confirm Password"  id="ConfirmPassword" name="password_confirmation">
										<p id="cpasswordError"></p>
										<i class="fa fa-eye" style="position: absolute;
										right: 30px;
										top: 50px;
										cursor: pointer;" onclick="getConfirmPassword()" id="eye2"  title="Show Password"></i>

										<i class="fa fa-eye-slash" style="position: absolute;
										right: 30px;
										top: 50px;
										cursor: pointer;" onclick="getConfirmPassword()" id="eyed2" title="Hide Password"></i>
									</div>
									<div class="col-12">
										<button class="login-btn hover-btn" type="button" onclick="postRegister()" style="display: none;">Sign Up Now</button>
										<button class="register-button mt-0"  id="checkRegistration" >Continue</button>
									</div>
								</div>


								<div id="register2" style="display: none; width: 100%">
									<div class="form-title"><h6>Enter OTP</h6></div>
									<p>Otp is send to your Email ID</p>

									<div class="col-md-12 mb-20">
										<input class="mb-0" type="text" placeholder="Enter OTP"  id="email_otp" name="otp"  onkeypress="return isNumberKey(event)" maxlength="10">

									</div>
									<div class="col-md-12 mb-20">
										<button class="register-button mt-0" type="button" onclick="checkOtp()" >Sign Up Now</button>
									</div>

								</div>




								<!--<div class="col-sm-12">-->
								<!--	<div class="registration-social-login-options">-->
								<!--		<h6>Sign in with one of your social accounts</h6>-->

								<!--		<a href="{{ url('redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> <span>Facebook</span></a>-->

								<!--		<a href="{{ url('redirect/google') }}" class="btn btn-danger"><i class="fa fa-google"></i> <span>Gmail</span></a>-->

								<!--	</div>-->
								<!--</div>-->



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
						<!-- <p>Already have an account? - <a href="{{ url('login') }}">Login Now</a></p> -->
					</div>
				</div>







				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30"></div>

			</div>
		</div>
	</div>
	
	<!--=====  End of Login  page content  ======-->
	

@endsection

@section('scripts')

<script>
    

 $('#name').keydown(function (e) {
 	$('#nameError').text('');
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });


    $('#customerEmail').on('keyup',function(){
    	$('#emailError').text('');
    	
    });


    $('#CreatePassword').on('keyup',function(){
        var count = $('#CreatePassword').val().length;
        // alert(count);
        
        if(count>=8 && count<=20){
            $('#passwordError').removeClass('red');
            $('#passwordError').addClass('green');
            $('#passwordError').text('Valid password');
            $('#checkRegistration').attr('disabled',false)
        }
        else{
            $('#passwordError').removeClass('green');
            $('#passwordError').addClass('red');
            $('#passwordError').text('Password length should be between 8 and 20 characters');
            $('#checkRegistration').attr('disabled',true)
        }
    })
    
</script>

<script>
   $('#ConfirmPassword').on('keyup',function compare_input(){
  var f_input=document.getElementById('CreatePassword').value;
  var s_input=document.getElementById('ConfirmPassword').value;
  if(f_input===s_input){
       $('#cpasswordError').addClass('green');
       $('#cpasswordError').removeClass('red');
       $('#cpasswordError').text('');
     $('#checkRegistration').attr('disabled',false)
  }
  else{
      $('#cpasswordError').addClass('red');
      $('#cpasswordError').removeClass('green');
      $('#cpasswordError').text('Password did not match');
      $('#checkRegistration').attr('disabled',true)
  }
});


</script>


@endsection