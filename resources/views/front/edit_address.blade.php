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
						<li class="active">Edit Address</li>
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

		
		<div class="container-fluid" style="margin: 0 5%; width: 90%;">
			<div class="row">
				
				<div class="col-lg-9 col-md-8 pl-100 pl-xs-15">
					<!--=======  contact form content  =======-->
					
					<div class="contact-form-content">
						<h3 class="contact-page-title">Edit Address</h3>

						<div class="contact-form">
							<form  id="contact-form" action="" method="post">
								@csrf
								<div class="form-group">
									<label>Alias<span class="required">*</span></label>
									<input type="text" name="alias" value="{{ $address->alias ?? '' }}" placeholder="Like Home or Office" id="alias" required>
								</div>
								<div class="form-group">
									<label>Address 1 <span class="required">*</span></label>
									<textarea  placeholder="Address1" name="address_1" id="address_1" required>{{ $address->address_1 ?? '' }}</textarea>
								</div>
								<div class="form-group">
									<label>Address 2</label>
									<textarea  placeholder="Address1" name="address_2" id="address_2">{{ $address->address_2 ?? '' }}</textarea>
								</div>
								<div class="form-group">
									<label>Landmark<span class="required">*</span></label>
									<input type="text" name="landmark" id="landmark" required="required" value="{{ $address->landmark ?? '' }}">
								</div>
								<div class="form-group">
									<label>City<span class="required">*</span></label>
									<input type="text" name="city" id="city" required="required" value="{{ $address->city ?? '' }}">
								</div>
								<div class="form-group">
									<label>State<span class="required">*</span></label>
									<input type="text" name="state_code" id="state_code" required="required" value="{{ $address->state_code ?? '' }}">
								</div>
								<div class="form-group">
									<label>Country<span class="required">*</span></label>
									<input type="text" name="country_id" value="India" readonly="readonly" id="country_id" required="required">
								</div>
								<div class="form-group">
									<label>Pincode<span class="required">*</span></label>
									<input type="number" name="zip" id="zip" required="required" value="{{ $address->zip ?? '' }}">
								</div><div class="form-group">
									<label>Contact Number<span class="required">*</span></label>
									<input type="number" name="phone" id="phone" required="required" value="{{ $address->phone ?? '' }}">
								</div>
								<div class="form-group">
									<button type="submit" value="submit" id="submit" class="contact-form-btn" name="submit">Update</button>
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


	@endsection