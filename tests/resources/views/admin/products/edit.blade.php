@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.products.update', $product->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                <div class="row">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="col-md-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="tablist">
                            <li role="presentation" @if(!request()->has('combination')) class="active" @endif><a href="#info" aria-controls="home" role="tab" data-toggle="tab">Info</a></li>
                            <li role="presentation" @if(request()->has('combination')) class="active" @endif><a href="#combinations" aria-controls="profile" role="tab" data-toggle="tab">Combinations</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" id="tabcontent">
                            <div role="tabpanel" class="tab-pane @if(!request()->has('combination')) active @endif" id="info">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2>{{ ucfirst($product->name) }}</h2>
                                        <div class="form-group">
                                            <label for="sku">SKU <span class="text-danger">*</span></label>
                                            <input type="text" name="sku" id="sku" placeholder="xxxxx" class="form-control" value="{!! $product->sku !!}" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $product->name !!}" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Full Description </label>
                                            <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description" required="required">{!! $product->description  !!}</textarea>
                                        </div>

                                         <div class="form-group">
                        <label for="key_features">Key Features </label>
                        <textarea class="form-control ckeditor" name="key_features" id="key_features" rows="5" placeholder="key_features"  required="required">{{ $product->key_features ?? '' }}</textarea>
                    </div>

                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <img src="{{ asset('storage/'.$product->cover) }}" alt="" class="img-responsive img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"></div>
                                        <div class="form-group">
                                            <label for="cover">Cover </label>
                                            <input type="file" name="cover" id="cover" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            @foreach($images as $image)
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <img src="{{ asset("storage/$image->src") }}" alt="" class="img-responsive img-thumbnail"  style="height: 150px; width: auto"> <br /> <br>
                                                    <a onclick="return confirm('Are you sure?')" href="{{ url('admin/remove-image-thumb/'.$image->id) }}" class="btn btn-danger btn-sm btn-block">Remove?</a><br />
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row"></div>
                                        <div class="form-group">
                                            <label for="image">Images </label>
                                            <input type="file" name="image[]" id="image" class="form-control" multiple>
                                            <span class="text-warning">You can use ctr (cmd) to select multiple images</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">Quantity <span class="text-danger">*</span></label>
                                            
                                            <input type="hidden" name="quantity" value="{{ $product->quantity }}" required="required">
                                            <input type="text" value="{{ $product->quantity }}" class="form-control" disabled required="required">
                                            
                                            <!--  -->
                                        </div>
                                        <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="price">Price</label>
                                            
                                            <input type="hidden" name="price" value="{!! $product->price !!}" required="required">
                                            <div class="input-group col-sm-6">
                                                <span class="input-group-addon">{{ config('cart.currency') }}</span>
                                                <input type="text" id="price" placeholder="Price" class="form-control" value="{!! $product->price !!}" required="required">
                                            </div>
                                           
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="sale_price">Sale Price</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">{{ config('cart.currency') }}</span>
                                                <input type="text" name="sale_price" id="sale_price" placeholder="Sale Price" class="form-control" value="{{ $product->sale_price }}">
                                            </div>
                                        </div>
                                        @if(!$brands->isEmpty())
                                        <div class="form-group col-sm-6">
                                            <label for="brand_id">Brand </label>
                                            <select name="brand_id" id="brand_id" class="form-control select2">
                                                <option value=""></option>
                                                @foreach($brands as $brand)
                                                <option @if($brand->id == $product->brand_id) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif

                                        <div class="form-group col-sm-6">
                                            <label for="color">Color </label>
                                            <input type="color" name="color" id="color" placeholder="Color" class="form-control" value="{{ $product->color ?? '' }}">
                                            <p>Use comma(,) as a separator</p>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="product_type">Product Type </label>
                                            <input type="text" name="product_type" id="product_type" placeholder="Product type" class="form-control" value="{{ $product->product_type ?? '' }}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="material">Material </label>
                                            <input type="text" name="material" id="material" placeholder="Product Material" class="form-control" value="{{ $product->material ?? '' }}">
                                        </div>
                                        </div>


                                        <br><br>
                                        @if(!empty($product_sizes))

                                        <div class="form-group">
                                            @foreach($product_sizes as $pro_size)
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <label for="size">Size </label>
                                                    <input type="text" id="size" placeholder="Size" class="form-control" value="{{ $pro_size->product_size ?? '' }}">
                                                </div>
                                                <div class="col-sm-5">
                                                    <label for="size">Price </label>
                                                    <input type="text" id="product_price" placeholder="Size" class="form-control" value="{{ $pro_size->product_price ?? '' }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <!-- <label for="size">Add More Sizes</label> -->
                                                    <br>
                                                    <button type="button" class="btn btn-danger" onclick="deleteSize({{$pro_size->id ?? ''}})">Delete </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        @endif

                                        <div class="form-group" id="dynamic-size">
                                            <h5><b>Added Sizes</b></h5>
                                            <div class="row sizes">
                                                <div class="col-sm-5">
                                                    <label for="size">Size </label>
                                                    <input type="text" name="size[]" id="size" placeholder="Size" class="form-control" value="{{ old('size') }}">
                                                </div>
                                                <div class="col-sm-5">
                                                    <label for="size">Price </label>
                                                    <input type="text" name="product_prices[]" id="product_price" placeholder="Price" class="form-control" value="{{ old('size') }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <!-- <label for="size">Add More Sizes</label> -->
                                                    <br>
                                                    <button type="button" class="btn btn-success" onclick="getSizeDiv()">Add </button>
                                                </div>
                                            </div>

                                        </div>




@if(!empty($product_weights) && count($product_weights)>0)

<div class="form-group">
                        <br><br>
                        <h5><b>Weights</b></h5>
                        @foreach($product_weights as $weight)
                        <div class="row sizes">
                        <div class="col-sm-2">
                        <label for="size">Unit </label>
                            <select type="text" id="units" class="form-control">
                                <option value="Grams" @if($weight->weight_unit=='Grams'){{'selected'}}@endif>Grams</option>
                                <option value="Kg" @if($weight->weight_unit=='Kg'){{'selected'}}@endif>KiloGrams</option>
                                <option value="ML" @if($weight->weight_unit=='ML'){{'selected'}}@endif>ML</option>
                                <option value="L" @if($weight->weight_unit=='L'){{'selected'}}@endif>L</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                        <label for="size">Weight </label>
                            <input type="text"  id="weights" placeholder="Weight" class="form-control" value="{{ $weight->product_weight ?? '' }}">
                        </div>
                        <div class="col-sm-4">
                            <label for="size">Price </label>
                            <input type="text" id="weight_price" placeholder="Price" class="form-control" value="{{ $weight->product_price ?? '' }}">
                        </div>
                        <div class="col-sm-2">
                            <!-- <label for="size">Add More Sizes</label> -->
                            <br>
                            <button type="button" class="btn btn-danger" onclick="deleteWeight({{$weight->id ?? ''}})">Delete </button>
                        </div>
                    </div>
                    @endforeach

                    </div>

@endif


<div class="form-group" id="dynamic-weight">
                        <br><br>
                        <h5><b>Add Weights</b></h5>
                        <div class="row sizes">
                        <div class="col-sm-2">
                        <label for="size">Unit </label>
                            <select type="text" name="units[]" id="units" class="form-control">
                                <option value="Grams">Grams</option>
                                <option value="Kg">KiloGrams</option>
                                <option value="ML">ML</option>
                                <option value="L">L</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                        <label for="size">Weight </label>
                            <input type="text" name="weights[]" id="weights" placeholder="Weight" class="form-control" value="">
                        </div>
                        <div class="col-sm-4">
                            <label for="size">Price </label>
                            <input type="text" name="weight_prices[]" id="weight_price" placeholder="Price" class="form-control" value="">
                        </div>
                        <div class="col-sm-2">
                            <!-- <label for="size">Add More Sizes</label> -->
                            <br>
                            <button type="button" onclick="getWeightDiv()" class="btn btn-success">Add </button>
                        </div>
                    </div>

                    </div>

                                        <br><br>


                                        
                                        <div class="row">
                                        <div class="form-group col-sm-6">
                                            @include('admin.shared.featured', ['featured' => $product->is_featured])
                                        </div>

                                        <div class="form-group col-sm-6">
                                            @include('admin.shared.status-select', ['status' => $product->status])
                                        </div>
                                        </div>
                                        <!-- @include('admin.shared.attribute-select', [compact('default_weight')]) -->
                                        <!-- /.box-body -->


                    <br>
                    <h4>SEO Parameters</h4>
                    <div class="row">

                     <div class="form-group col-sm-6">
                        <label for="meta_title"> Meta Title</label>
                        <textarea rows="3" name="meta_title" id="meta_title" placeholder="Meta Title" class="form-control">{{ $product->meta_title ?? '' }}</textarea>
                    </div>

                    
                    <div class="form-group col-sm-6">
                        <label for="meta_description"> Meta Description</label>
                        <textarea rows="3" name="meta_description" id="meta_description" placeholder="Meta Description" class="form-control">{{ $product->meta_description ?? '' }}</textarea>
                    </div>

                    
                    <div class="form-group col-sm-6">
                        <label for="search_keywords">Search Keywords</label>
                        <textarea rows="3" name="search_keywords" id="search_keywords" placeholder="Search Keywords" class="form-control">{{ $product->search_keywords ?? '' }}</textarea>
                        <p>Use comma (,) as a separator for multiple keywords.</p>
                    </div>
                </div>

                <br><br>

                <h4>Shipping Info</h4>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="gst"> GST Percentage</label>
                        <select name="gst" id="gst" placeholder="GST" class="form-control">
                            <option value="0" @if($product->gst == '0'){{'selected'}}@endif>0</option>
                            <option value="3" @if($product->gst == '3'){{'selected'}}@endif>3</option>
                            <option value="5" @if($product->gst == '5'){{'selected'}}@endif>5</option>
                            <option value="12" @if($product->gst == '12'){{'selected'}}@endif>12</option>
                            <option value="18" @if($product->gst == '18'){{'selected'}}@endif>18</option>
                            <option value="28" @if($product->gst == '28'){{'selected'}}@endif>28</option>
                        </select>
                    </div>


                    <div class="form-group col-sm-6">
                        <label for="preffered_payment_method">Preferred Payment Method</label>
                        <select name="preffered_payment_method" id="preffered_payment_method" placeholder="GST" class="form-control">
                            <option value="Both" @if($product->preffered_payment_method == 'Both'){{'selected'}}@endif>Both</option>
                            <option value="COD" @if($product->preffered_payment_method == 'COD'){{'selected'}}@endif>COD</option>
                            <option value="Prepaid" @if($product->preffered_payment_method == 'Prepaid'){{'selected'}}@endif>Prepaid</option>
                        </select>   
                    </div>


                    <div class="form-group col-sm-6">
                        <label for="shipping_amount"> Shipping Amount</label>
                        <input type="text" name="shipping_amount" id="shipping_amount" placeholder="Meta Title" class="form-control" value="{{ $product->shipping_amount ?? '' }}">
                    </div>


                    <div class="form-group col-sm-6">
                        <label for="return_period">Return Period</label>
                        <select name="return_period" id="return_period" placeholder="GST" class="form-control">
                            <option value="Non Refundable" @if($product->return_period == 'Non Refundable'){{'selected'}}@endif>Non Refundable</option>
                            <option value="7 Days" @if($product->return_period == '7 Days'){{'selected'}}@endif>7 Days</option>
                            <option value="15 Days" @if($product->return_period == '15 Days'){{'selected'}}@endif>15 Days</option>
                            <option value="30 Days" @if($product->return_period == '30 Days'){{'selected'}}@endif>30 Days</option>
                        </select>   
                    </div>


                </div>



                                    </div>
                                    <div class="col-md-4">
                                        <h2>Categories</h2>
                                        @include('admin.shared.categories', ['categories' => $categories, 'ids' => $selectedIds])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="box-footer">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.products.index') }}" class="btn btn-default btn-sm">Back</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane @if(request()->has('combination')) active @endif" id="combinations">
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-8">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection
@section('css')
<style type="text/css">
    label.checkbox-inline {
        padding: 10px 5px;
        display: block;
        margin-bottom: 5px;
    }
    label.checkbox-inline > input[type="checkbox"] {
        margin-left: 10px;
    }
    ul.attribute-lists > li > label:hover {
        background: #3c8dbc;
        color: #fff;
    }
    ul.attribute-lists > li {
        background: #eee;
    }
    ul.attribute-lists > li:hover {
        background: #ccc;
    }
    ul.attribute-lists > li {
        margin-bottom: 15px;
        padding: 15px;
    }
</style>
@endsection
@section('js')
<script type="text/javascript">
    function backToInfoTab() {
        $('#tablist > li:first-child').addClass('active');
        $('#tablist > li:last-child').removeClass('active');

        $('#tabcontent > div:first-child').addClass('active');
        $('#tabcontent > div:last-child').removeClass('active');
    }
    $(document).ready(function () {
        const checkbox = $('input.attribute');
        $(checkbox).on('change', function () {
            const attributeId = $(this).val();
            if ($(this).is(':checked')) {
                $('#attributeValue' + attributeId).attr('disabled', false);
            } else {
                $('#attributeValue' + attributeId).attr('disabled', true);
            }
            const count = checkbox.filter(':checked').length;
            if (count > 0) {
                $('#productAttributeQuantity').attr('disabled', false);
                $('#productAttributePrice').attr('disabled', false);
                $('#salePrice').attr('disabled', false);
                $('#default').attr('disabled', false);
                $('#createCombinationBtn').attr('disabled', false);
                $('#combination').attr('disabled', false);
            } else {
                $('#productAttributeQuantity').attr('disabled', true);
                $('#productAttributePrice').attr('disabled', true);
                $('#salePrice').attr('disabled', true);
                $('#default').attr('disabled', true);
                $('#createCombinationBtn').attr('disabled', true);
                $('#combination').attr('disabled', true);
            }
        });
    });
</script>
@endsection