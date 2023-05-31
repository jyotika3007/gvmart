@extends('layouts.admin.app')

@section('content')


<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- <div class="box"> -->

    <form action="{{ route('admin.products.store') }}" method="post" class="form" enctype="multipart/form-data">
        <div class="box-body">
            {{ csrf_field() }}
            <div class="col-md-8">


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Products >> Add Product </h3>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required="required">
                    </div>

                    <div class="form-group">
                        <label for="name">Category <span class="text-danger">*</span></label>
                        @if(isset($categories) && count($categories)>0)
                   
                        <select name="category_id" id="category_id" class="form-control select2" required>
                            <option value=""></option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id ?? ''}}">{{ $cat->name ?? '' }}</option>
                            @endforeach
                        </select>
                    
                    @endif
                    </div>

                </div>


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Add Product Detail </h3>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="description">Full Description </label>
                        <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description" required="required">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="key_features">Summary </label>
                        <textarea class="form-control " name="key_features" id="key_features" rows="5" placeholder="Summary" required="required">{{ old('key_features') }}</textarea>
                    </div>
                </div>


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Product Inventory </h3>
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="sku">SKU <span class="text-danger">*</span></label>
                        <input type="text" name="sku" id="sku" placeholder="xxxxxxxxx" class="form-control product_slug_insert" value="" required="required">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Min Purchase Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="1" required="required">
                    </div>

                    <div class="form-group">
                        <label for="stock_quantity">Stock Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="stock_quantity" id="stock_quantity" placeholder="Quantity" class="form-control" value="1" required="required">
                    </div>
                </div>


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Product Price </h3>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="price">
                            <h4>Prelaunch ? &nbsp; &nbsp;<input type="checkbox" name="is_prelaunched" id="is_prelaunched" value="1" style="width: 15px; height: 15px" >    </h4> 
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="prelaunch_price">Prelaunch amount <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">{{ config('cart.currency') }}</span>
                            <input type="number" name="prelaunch_price" id="prelaunch_price" placeholder="Price" class="form-control" value="{{ old('prelaunch_price') }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">MRP <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">{{ config('cart.currency') }}</span>
                            <input type="number" name="price" id="price" placeholder="Price" class="form-control" value="{{ old('price') }}"  onkeyup="getPrice(this)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Discount (in %) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">{{ config('cart.currency') }}</span>
                            <input type="number" name="discount" id="discount" placeholder="Discount" class="form-control" value="" min='0' max='100' onkeyup="handleDiscount(this)" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <div class="input-group">
                            <span class="input-group-addon">{{ config('cart.currency') }}</span>
                            <input type="text" name="sale_price" id="sale_price" placeholder="Sale Price" class="form-control" value="{{ $product->sale_price }}" disabled>
                        </div>
                    </div>
                </div>



                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Related Apple Service </h3>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="cover">
                            Select Service
                        </label>
                        <select name="related_services[]" id="related_services" class="form-control" multiple>
                                @foreach($services as $service)
                            <option value="{{ $service->id ?? ''}}">{{ $service->service_name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Related Accessories </h3>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="cover">
                            Select Accessories
                        </label>
                        <select name="related_accessories[]" id="related_accessories" class="form-control" multiple>
                            @foreach($related_accessories as $access)
                            <option value="{{ $access->id ?? ''}}">{{ $access->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Related Products </h3>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="cover">
                            Select Products
                        </label>
                        <select name="related_products[]" id="related_products" class="form-control" multiple>
                            @foreach($related_products as $prod)
                            <option value="{{ $prod->id ?? ''}}">{{ $prod->name ?? '' }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>

                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Product Photos </h3>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="cover">Cover Image</label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image">Images</label>
                        <input type="file" name="image[]" id="image" class="form-control" multiple>
                        <small class="text-warning">You can use ctr (cmd) to select multiple images</small>
                    </div>
                </div>


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Search Engine Optimization (SEO) </h3>
                    </div>

                    <br />
                    <div class="form-group">
                        <label for="meta_title"> Meta Title</label>
                        <textarea rows="3" name="meta_title" id="meta_title" placeholder="Meta Title" class="form-control"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="meta_description"> Meta Description</label>
                        <textarea rows="3" name="meta_description" id="meta_description" placeholder="Meta Description" class="form-control"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="search_keywords">Search Keywords</label>
                        <textarea rows="3" name="search_keywords" id="search_keywords" placeholder="Search Keywords" class="form-control"></textarea>
                        <p>Use comma (,) as a separator for multiple keywords.</p>
                    </div>
                </div>


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Shipping Info </h3>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="gst"> GST Percentage</label>
                        <select name="gst" id="gst" placeholder="GST" class="form-control">
                            <option value="0">0</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="12">12</option>
                            <option value="18">18</option>
                            <option value="28">28</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="preffered_payment_method">Preferred Payment Method</label>
                        <select name="preffered_payment_method" id="preffered_payment_method" placeholder="GST" class="form-control">
                            <option value="both">Both</option>
                            <option value="COD">COD</option>
                            <option value="Prepaid">Prepaid</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="shipping_amount">Shipping Amount</label>
                        <input type="text" name="shipping_amount" id="shipping_amount" placeholder="Shipping Amount" class="form-control"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="delivery_days">Expected Delivery Days</label>
                        <input type="text" name="delivery_days" id="delivery_days" placeholder="Expected Delivery Days" class="form-control" value="{{ old('delivery_days') }}">
                    </div>


                    <div class="form-group">
                        <label for="return_period">Return Period</label>
                        <select name="return_period" id="return_period" placeholder="GST" class="form-control">
                            <option value="At a time of delivery">At a time of delivery</option>
                            <option value="Non Refundable">Non Refundable</option>
                            <option value="7 Days">7 Days</option>
                            <option value="15 Days">15 Days</option>
                            <option value="30 Days">30 Days</option>
                        </select>
                    </div>

                </div>


                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Other Info </h3>
                    </div>
                    <br />

                    <div class="form-group">
                        @include('admin.shared.trending', ['trending' => 0])
                    </div>
                    <div class="form-group">
                        @include('admin.shared.best_seller', ['is_best_seller' => 0])
                    </div>
                    <div class="form-group">
                        @include('admin.shared.top_rated', ['is_top_rated' => 0])
                    </div>

                    <div class="form-group">
                        @include('admin.shared.status-select', ['status' => 1])
                    </div>
                </div>


            </div>
            <div class="col-md-4">
              
                <div class="cardDiv">
                    <div class="form-title">
                        <h3>Additional Info Info </h3>
                    </div>
                    <br />
                    @if(!$brands->isEmpty())
                    <div class="form-group">
                        <label for="brand_id">Brand </label>
                        <select name="brand_id" id="brand_id" class="form-control select2">
                            <option value=""></option>
                            @foreach($brands as $brand)
                            <option @if(old('brand_id')==$brand->id) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
    </form>
    <!-- </div> -->
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection

@section('js')

<script src="{{ asset('js/multiple-select.js') }}" ></script>

<script>
    $('#discount').on('keyup', function() {
        var dis = $('#discount').val();
        var price = $('#price').val();
        // alert(dis);
        var sale_price = parseInt(price) - (parseInt(price * dis) / 100);
        $('#sale_price').val(sale_price);
        // alert(sale_price);

    });


    
</script>

@endsection