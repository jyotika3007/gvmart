<?php
   $companyInfo = DB::table('company_details')->first();
   
?>


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
                            <li class="active">Feedback</li>
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
						<h3 class="contact-page-title">Tell Us Your Feedback</h3>

						<div class="contact-form">
							<form  action="" method="POST">
                                @csrf
								<div class="form-group">
									<label>Your Name <span class="required">*</span> </label>
									<input type="text" name="user_name" id="user_name" required placeholder="Name Here">
								</div>
								<div class="form-group">
									<label>Your Email <span class="required">*</span> </label>
									<input type="email" name="user_email" id="user_email" required placeholder="Email Here">
									<p id="emailError" style="color: red"></p>
								</div>
								<div class="form-group">
									<label>Your Mobile  <span class="required">*</span> </label>
									<input name="user_mobile" id="user_mobile"  type="text" placeholder="Mobile No. Here" onkeypress="return isNumberKey(event)" maxlength="10" required>
                                    <p id="mobileError"></p>
								</div>
								<div class="form-group">
									<label>Subject  <span class="required">*</span> </label>
									<input type="text" name="subject" id="subject" required="required" placeholder="Subject Here">
								</div>
								<div class="form-group">
									<label>Your Message  <span class="required">*</span> </label>
									<textarea name="conplaint" id="complaint" required="required" placeholder="Message Here"></textarea>
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

<script type="text/javascript">
    

    
 $('#user_name').keydown(function (e) {
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
      
      
      $('#user_email').on('keyup',function(){
           
         var email = $('#user_email').val();
           var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var res = emailReg.test( email );
//   alert(email)
  if(!res){
    //   alert(0)
      
      $('#emailError').text('Invalid Email');
      
  }
  else{
    //   alert('1')
      $('#emailEmail').text('');
  }
        
      })

</script>

@endsection