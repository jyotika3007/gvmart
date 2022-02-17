@extends('layouts.front.app')

@section('hello')

<div class="wrapper">

	<div class="gambo-Breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Connect With Us</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="all-product-grid">
		<div class="container">
			
			
			<div class="product-list-view">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="product-item mb-30 p-45">
							<h3>Connect With Us</h3>

							<form action="{{ url('request_for_shop_registration') }}" method="POST" style="text-align: left;" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="box-body">
									@include('admin.shared.shop-category', ['category' => 'Product Based'])


									<div class="form-group" id="product">
										@if(!empty($product_based))
										<label for="shop_name">Select<span class="text-danger">*</span></label>
										<br>

										@foreach($product_based as $pro)
										<input type="radio" name="category_ids" id="category_ids" placeholder="Shop Name"  value="{{ $pro->id }}" required="required">&nbsp;{{ $pro->category_name }} &nbsp;&nbsp;
										@endforeach
										@endif
									</div>

									<div class="form-group" id="service" style="display: none;">
										@if(!empty($service_based))
										<label for="shop_name">Select<span class="text-danger">*</span></label><br>

										@foreach($service_based as $pro)
										<input type="radio" name="category_ids" id="category_ids" placeholder="Shop Name"  value="{{ $pro->id }}" required="required">&nbsp;{{ $pro->category_name }} &nbsp;&nbsp;
										@endforeach
										@endif
									</div>

									<div class="form-group">
										<label for="shop_name">Shop Name <span class="text-danger">*</span></label>
										<input type="text" name="shop_name" id="shop_name" placeholder="Shop Name" class="form-control" value="{{ old('shop_name') }}"
										required="required">
									</div>

									<div class="form-group">
										<label for="owner_name">Owner Name <span class="text-danger">*</span></label>
										<input type="text" name="owner_name" id="owner_name" placeholder="Owner Name" class="form-control" value="{{ old('owner_name') }}" required="required">
									</div>

									<div class="form-group">
										<label for="cover">Banner Image </label>
										<input type="file" name="cover" id="cover" class="form-control" required="required">
									</div>

									<div class="form-group">
										<label for="email">Email <span class="text-danger">*</span></label>
										<div class="input-group">
											<span class="input-group-addon">@</span>
											<input type="email" name="email" id="customerEmail" placeholder="Email" class="form-control" value="{{ old('email') }}" required="required">
										</div>

										<span class="help-block">
											<strong id="emailError"></strong>
										</span>
										
									</div> 

									<div class="form-group">
										<label for="contact">Contact No. <span class="text-danger">*</span></label>
										<input type="text" name="contact" id="contact" placeholder="Contact Number" class="form-control" value="{{ old('contact') }}" required="required">
									</div> 

									<div class="form-group">
										<label for="alternate_contact">Alternate Contact No. 
											<!-- <span class="text-danger">*</span> -->
										</label>
										<input type="text" name="alternate_contact" id="alternate_contact" placeholder="Alternate Contact Number" class="form-control" value="{{ old('alternate_contact') }}">
									</div> 

									<div class="form-group">
										<label for="address">Shop Address <span class="text-danger">*</span></label>
										<input type="text" name="address" id="address" placeholder="Shop Address" class="form-control" value="{{ old('address') }}" required="required">
									</div>

									<div class="form-group">
										<label for="city">Shop City <span class="text-danger">*</span></label>
										<input type="text" name="city" id="city" placeholder="Shop City" class="form-control" value="{{ old('city') }}" required="required">
									</div>
									<div class="form-group">
										<label for="state">Shop State <span class="text-danger">*</span></label>
										<input type="text" name="state" id="state" placeholder="Shop State" class="form-control" value="{{ old('state') }}" required="required">
									</div>

									<div class="form-group">
										<label for="country">Shop Country <span class="text-danger">*</span></label>
										<input type="text" name="country" id="country" placeholder="Shop Country" class="form-control" value="India" required="required">
									</div>

									<div class="form-group">
										<label for="pincode">Shop PIN Code <span class="text-danger">*</span></label>
										<input type="text" name="pincode" id="pincode" placeholder="Shop Pincode" class="form-control" required="required">
									</div>

									<div class="form-group">
										<label for="password">Password <span class="text-danger">*</span></label>
										<input type="password" name="password" id="password" placeholder="xxxxx" class="form-control" required="required">
									</div>


								</div>
								<br>
								<input type="submit" name="submit_query" id="checkRegistration" class="btn btn-primary" value="Submit">
							</form>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

@endsection