<?php

use App\Shop\ShopCategory\ShopCategory;
$product_based = ShopCategory::where('category','Product Based')->where('status','1')->get();

$service_based = ShopCategory::where('category','Service Based')->get();
?>

@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.registered_shops.store') }}" method="post" class="form" enctype="multipart/form-data" id='ShopRegistrationForm'>
            <div class="box-body">
                {{ csrf_field() }}

                <!-- @include('admin.shared.shop-category', ['category' => 'Product Based']) -->
                <h3>Add New Shop</h3>
                <br>

                <div class="row">



                    <div class="col-sm-6">

                        <input type="hidden" name="category" id="get_category" class="form-control select2" required="required" value="Product Based">

                        <div class="form-group" id="product">
                            @if(!empty($product_based))
                            <input id="ShopCategory" for="shop_name" placeholder="Select Category" class="form-control" onclick="showProductDiv()">
                            <br>

                            <div id="shopCategory" style="display: none;">
                                @foreach($product_based as $pro)
                                <div class="col-sm-6">
                                    <input type="checkbox" name="category_ids[]" value="{{$pro->id}}"> &nbsp; {{ $pro->category_name ?? '' }}
                                </div>
                                @endforeach
                                <br><br>
                                <br><br>
                            </div>

                           <!--  <select name="category_ids" id="category_ids" class="form-control select2">
                                @foreach($product_based as $pro)

                                <option  value="{{ $pro->id }}" >{{ $pro->category_name }}</option>

                                @endforeach
                            </select> -->






                            @endif
                        </div>

                        <div class="form-group">
                            <label for="shop_name">Shop Name <span class="text-danger">*</span></label>
                            <input type="text" name="shop_name" id="shopName" placeholder="Shop Name" class="form-control" required="required">
                            <p style="color: red" id="shopNameError"></p>
                        </div>

                        <div class="form-group">
                            <label for="owner_name">Owner Name <span class="text-danger">*</span></label>
                            <input type="text" name="owner_name" id="shopOwnerName" placeholder="Owner Name" class="form-control" required="required">
                            <p style="color: red" id="shopOwnerNameError"></p>
                        </div>

                        <div class="form-group">
                            <label for="cover">Banner Image </label>
                            <input type="file" name="cover" id="shopCover" class="form-control" >
                            <p style="color: red" id="shopCoverError"></p>
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" name="email" id="shopEmail" placeholder="Email" class="form-control" required="required">
                                <p style="color: red" id="shopEmailError"></p>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="contact">Contact No. <span class="text-danger">*</span></label>
                            <input type="text" name="contact" id="shopContact" placeholder="Shop Contact Number" class="form-control" required="required" onkeypress="return isNumberKey(event)" maxlength="10">
                            <p style="color: red" id="shopContactError"></p>
                        </div> 

                        <div class="form-group">
                            <label for="alternate_contact">Alternate Contact No. 
                                <!-- <span class="text-danger">*</span> -->
                            </label>
                            <input type="text" name="alternate_contact" id="shopAlternateContact" placeholder="Alternate Contact Number" class="form-control" onkeypress="return isNumberKey(event)">
                        </div> 


                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="shopPassword" placeholder="xxxxx" class="form-control" required="required">
                            <p style="color: red" id="shopPasswordError"></p>
                        </div>

                        @include('admin.shared.status-select', ['status' => 1])


                    </div>


                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="address">Shop Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" id="shopAddress" placeholder="Shop Address" class="form-control" required="required">
                        <p style="color: red" id="shopAddressError"></p>
                    </div>

                    <div class="form-group">
                        <label for="city">Shop City <span class="text-danger">*</span></label>
                        <input type="text" name="city" id="shopCity" placeholder="Shop City" class="form-control" required="required">
                        <p style="color: red" id="shopCityError"></p>
                    </div>
                    <div class="form-group">
                        <label for="state">Shop State <span class="text-danger">*</span></label>
                        <input type="text" name="state" id="shopState" placeholder="Shop State" class="form-control" required="required">
                        <p style="color: red" id="shopStateError"></p>
                    </div>

                    <div class="form-group">
                        <label for="country">Shop Country <span class="text-danger">*</span></label>
                        <input type="text" name="country" id="shopCountry" placeholder="Shop Country" class="form-control" value="India" required="required">
                        <p style="color: red" id="shopCountryError"></p>
                    </div>

                    <div class="form-group">
                        <label for="pincode">Shop PIN Code <span class="text-danger">*</span></label>
                        <input type="number" name="pincode" id="shopPincode" placeholder="Shop Pincode" class="form-control" required="required" >
                        <p style="color: red" id="shopPincodeError"></p>
                    </div>

                </div>
            </div>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <div class="btn-group">
                    <a href="{{ route('admin.registered_shops.index') }}" class="btn btn-default">Back</a>
                    <button type="button" id="registerShopButton" class="btn btn-primary" >Create</button>
                    <button type="submit" id="sumitShopForm" class="btn btn-primary" style="display: none;">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.box -->

</section>
<!-- /.content -->
@endsection
