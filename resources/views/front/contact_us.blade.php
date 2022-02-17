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
                            <li class="active">Contact Us</li>
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
		
		<div class="google-map-container mb-70">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14007.98595712095!2d77.42470552065265!3d28.629867318698917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cee307ecc7e91%3A0x16613eec68653aa4!2sCrossings%20Republik%2C%20Ghaziabad%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1603247346449!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

			<!--<div id="google-map"></div>-->
		</div>
		
		<!--=====  End of google map container  ======-->

		<div class="container-fluid" style="margin: 0 5%; width: 90%;">
			<div class="row">
				<div class="col-lg-3 col-md-4 mb-xs-35">
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
				<div class="col-lg-9 col-md-8 pl-100 pl-xs-15">
					<!--=======  contact form content  =======-->
					
					<div class="contact-form-content">
						<h3 class="contact-page-title">Tell Us Your Message</h3>

						<div class="contact-form">
							<form  action="{{ url('contact-form-submit') }}" method="POST">
                                @csrf
								<div class="form-group">
									<label>Your Name <span class="required">*</span></label>
									<input type="text" name="name" id="name" required placeholder="Name Here">
                                    <p id="errorName"></p>
								</div>
								<div class="form-group">
									<label>Your Email <span class="required">*</span></label>
									<input type="email" name="email" id="custEmail" required placeholder="Email Here">
									<p id="emailError"></p>
								</div>
								<div class="form-group">
									<label>Subject <span class="required">*</span></label>
									<select name="subject" id="subject" required="required" placeholder="Subject Here">
                                        <option value=""> -- Select Subject --</option>
                                        <option value="Order">Order</option>                           
                                        <option value="Cancellations & Returns">Cancellations & Returns</option>                           
                                        <option value="Payment">Payment</option>                           
                                        <option value="Shopping">Shopping</option>                           
                                        <option value="Wallet">Wallet</option>                           
                                        <option value="Others">Others</option>                           
                                    </select>
								</div>
								<div class="form-group">
									<label>Your Message <span class="required">*</span></label>
									<textarea name="message" id="message" required="required" placeholder="Message Here"></textarea>
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
			</div>
		</div>
	</div>
	
	<!--=====  End of Contact page content  ======-->
	

@endsection


@section('scripts')

<script type="text/javascript">
    
      $('#name').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
  
  
      
      $('#custEmail').on('keyup',function(){
           
         var email = $('#custEmail').val();
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