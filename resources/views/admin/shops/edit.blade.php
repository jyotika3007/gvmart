<?php

use App\Shop\ShopCategory\ShopCategory;
$product_based = ShopCategory::where('category','Product Based')->where('status',1)->get();

$service_based = ShopCategory::where('category','Service Based')->get();

$categories = explode(',',$registered_shop->category_ids);

// var_dump($categories); die;
// var_dump($registered_shop); die;
?>

@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.registered_shops.update', $registered_shop->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">

                <!-- @include('admin.shared.shop-category', ['category' => $registered_shop->category]) -->
 <h3>Edit Shop</h3>
                <br>

                <div class="row">
                    <div class="col-sm-6">
                        
                        <input type="hidden" name="category" id="get_category" class="form-control select2" required="required" value="Product Based">



                           <div class="form-group" id="product">
                            @if(!empty($product_based))
                            <input id="ShopCategory" for="shop_name" placeholder="Select Category" class="form-control" readonly="readonly">
                            <br>

                            <div id="shopCategory" >
                                @foreach($product_based as $pro)
                                <div class="col-sm-6">
                                    <input type="checkbox" name="category_ids[]" value="{{$pro->id}}" @if(in_array($pro->id, $categories)){{'checked'}}@endif> &nbsp; {{ $pro->category_name ?? '' }}
                                </div>
                                @endforeach
                                <br><br>
                                <br><br>
                            </div>

                            @endif
                        </div>


                       
                        
                        <div class="form-group">
                            <label for="shop_name">Shop Name <span class="text-danger">*</span></label>
                            <input type="text" name="shop_name" id="shop_name" placeholder="Shop Name" class="form-control" value="{{ $registered_shop->shop_name ?? old('shop_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="owner_name">Owner Name <span class="text-danger">*</span></label>
                            <input type="text" name="owner_name" id="owner_name" placeholder="Owner Name" class="form-control" value="{{ $registered_shop->owner_name ?? old('owner_name') }}">
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <div class="row">
                                    <img src="{{ asset('storage/'.$registered_shop->cover) }}" alt="" class="img-responsive img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>


                        <div class="form-group">
                            <label for="cover">Banner Image </label>
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ $registered_shop->email ?? old('email') }}" readonly="readonly">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="contact">Contact No. <span class="text-danger">*</span></label>
                            <input type="text" name="contact" id="contact" placeholder="Contact Number" class="form-control" value="{{ $registered_shop->contact ?? old('contact') }}" onkeypress="return isNumberKey(event)" required="required">
                        </div> 

                        <div class="form-group">
                            <label for="alternate_contact">Alternate Contact No. 
                                <!-- <span class="text-danger">*</span> -->
                            </label>
                            <input type="text" name="alternate_contact" id="alternate_contact" placeholder="Alternate Contact Number" class="form-control" value="{{ $registered_shop->alternate_contact ?? old('alternate_contact') }}" onkeypress="return isNumberKey(event)">
                        </div> 

                        

                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                        </div>
                        


                    </div>


                    <div class="col-sm-6">
                        
                       <div class="form-group">
                        <label for="address">Shop Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" id="address" placeholder="Shop Address" class="form-control" value="{{ $registered_shop->address ?? old('address') }}">
                    </div>

                    <div class="form-group">
                        <label for="city">Shop City <span class="text-danger">*</span></label>
                        <input type="text" name="city" id="city" placeholder="Shop City" class="form-control" value="{{ $registered_shop->city ?? old('city') }}">
                    </div>
                    <div class="form-group">
                        <label for="state">Shop State <span class="text-danger">*</span></label>
                        <input type="text" name="state" id="state" placeholder="Shop State" class="form-control" value="{{ $registered_shop->state ?? old('state') }}">
                    </div>

                    <div class="form-group">
                        <label for="country">Shop Country <span class="text-danger">*</span></label>
                        <input type="text" name="country" id="country" placeholder="Shop Country" class="form-control" value="{{ $registered_shop->country ?? old('country') }}">
                    </div>

                    <div class="form-group">
                        <label for="pincode">Shop PIN Code <span class="text-danger">*</span></label>
                        <input type="text" name="pincode" id="pincode" placeholder="Shop Pincode" class="form-control" value="{{ $registered_shop->pincode ?? old('pincode') }}">
                    </div>

                </div>


            </div>


        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ $previous }}" class="btn btn-default btn-sm">Back</a>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </form>
</div>
<!-- /.box -->

</section>
<!-- /.content -->
@endsection
