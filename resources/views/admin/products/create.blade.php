@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.products.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="col-md-8">
                    <h2>Product</h2>
                    <div class="form-group">
                        <label for="sku">SKU <span class="text-danger">*</span></label>
                        <input type="text" name="sku" id="sku" placeholder="xxxxxxxxx" class="form-control product_slug_insert" value="" readonly required="required" >
                        <!-- <input type="text" name="sku" id="sku" placeholder="xxxxx" class="form-control" value="<?php echo 'INC'.rand(000,999999) ?>" required="required" readonly> -->
                    </div>
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required="required">
                    </div>

                    <div class="form-group">
                        <label for="description">Full Description </label>
                        <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description"  required="required">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="key_features">Key Features </label>
                        <textarea class="form-control ckeditor" name="key_features" id="key_features" rows="5" placeholder="key_features"  required="required">{{ old('key_features') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="cover">Cover </label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Images</label>
                        <input type="file" name="image[]" id="image" class="form-control" multiple>
                        <small class="text-warning">You can use ctr (cmd) to select multiple images</small>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="1"  required="required">
                    </div> 
                    
                    <div class="form-group">
                        <label for="stock_quantity">Stock Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="stock_quantity" id="stock_quantity" placeholder="Quantity" class="form-control" value="1"  required="required">
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="price">MRP <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('cart.currency') }}</span>
                                <input type="number" name="price" id="price" placeholder="Price" class="form-control" value="{{ old('price') }}"  required="required" onkeyup="getPrice(this)">
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label for="price">Discount (in %) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('cart.currency') }}</span>
                                <input type="number" name="discount" id="discount" placeholder="Discount" class="form-control" value="" min='0' max='100' required="required" onkeyup="handleDiscount(this)" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-12">
                            <label for="sale_price">Sale Price</label>
                            <div class="input-group">
                                <span class="input-group-addon">{{ config('cart.currency') }}</span>
                                <input type="text" name="sale_price" id="sale_price" placeholder="Sale Price" class="form-control" value="{{ $product->sale_price }}" disabled>
                            </div>
                        </div>

                         @if(!$brands->isEmpty())
                    <div class="form-group col-sm-6">
                        <label for="brand_id">Brand </label>
                        <select name="brand_id" id="brand_id" class="form-control select2">
                            <option value=""></option>
                            @foreach($brands as $brand)
                            <option @if(old('brand_id') == $brand->id) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                        <div class="form-group col-sm-6">
                            <label for="color">Color </label>
                            <input type="text" name="color" id="color" placeholder="Color" class="form-control" value="{{ old('color') }}">
                            <p>Use comma(,) as a separator</p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="product_type">Product Type </label>
                            <input type="text" name="product_type" id="product_type" placeholder="Product type" class="form-control" value="{{ old('product_type') }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="material">Material</label>
                            <input type="text" name="material" id="material" placeholder="Product Material" class="form-control" value="{{ old('material') }}">
                        </div>
                    
                   
                </div>

                    <div class="form-group" id="dynamic-size">
                        <br><br>
                        <h5><b>Add Different Sizes</b></h5>
                        <div class="row sizes">
                            <div class="col-sm-5">
                                <label for="size">Size </label>
                                <input type="text" name="size[]" id="size" placeholder="Size" class="form-control" value="{{ old('size') }}">
                            </div>
                            <div class="col-sm-5">
                                <label for="size">Price </label>
                                <input type="number" name="product_prices[]" id="product_price" placeholder="Size" class="form-control" value="{{ old('size') }}">
                            </div>
                            <div class="col-sm-2">
                                <!-- <label for="size">Add More Sizes</label> -->
                                <br>
                                <button type="button" onclick="getSizeDiv()" class="btn btn-success">Add </button>
                            </div>
                        </div>

                    </div>


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
                                <input type="number" name="weight_prices[]" id="weight_price" placeholder="Price" class="form-control" value="">
                            </div>
                            <div class="col-sm-2">
                                <!-- <label for="size">Add More Sizes</label> -->
                                <br>
                                <button type="button" onclick="getWeightDiv()" class="btn btn-success">Add </button>
                            </div>
                        </div>

                    </div>

                    <br><br>


                  <!--   <div class="form-group">
                        <label for="size">Size </label>
                        <input type="text" name="size" id="size" placeholder="Size" class="form-control" value="{{ old('size') }}">
                        <p>Use comma(,) as a separator</p>
                    </div> -->
                  
                    <!-- @include('admin.shared.attribute-select', [compact('default_weight')]) -->

                    <br>
                    <h4>SEO Parameters</h4>
                    <div class="row">

                     <div class="form-group col-sm-6">
                        <label for="meta_title"> Meta Title</label>
                        <textarea rows="3" name="meta_title" id="meta_title" placeholder="Meta Title" class="form-control"></textarea>
                    </div>

                    
                    <div class="form-group col-sm-6">
                        <label for="meta_description"> Meta Description</label>
                        <textarea rows="3" name="meta_description" id="meta_description" placeholder="Meta Description" class="form-control"></textarea>
                    </div>

                    
                    <div class="form-group col-sm-6">
                        <label for="search_keywords">Search Keywords</label>
                        <textarea rows="3" name="search_keywords" id="search_keywords" placeholder="Search Keywords" class="form-control"></textarea>
                        <p>Use comma (,) as a separator for multiple keywords.</p>
                    </div>
                </div>

                <br><br>

                <h4>Shipping Info</h4>
                <div class="row">
                    <div class="form-group col-sm-6">
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


                    <div class="form-group col-sm-6">
                        <label for="preffered_payment_method">Preferred Payment Method</label>
                        <select name="preffered_payment_method" id="preffered_payment_method" placeholder="GST" class="form-control">
                            <option value="both">Both</option>
                            <option value="COD">COD</option>
                            <option value="Prepaid">Prepaid</option>
                        </select>   
                    </div>


                    <div class="form-group col-sm-6">
                        <label for="shipping_amount"> Shipping Amount</label>
                        <input type="text" name="shipping_amount" id="shipping_amount" placeholder="Meta Title" class="form-control"></textarea>
                    </div>


                    <div class="form-group col-sm-6">
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

                  <div class="row">

                        <div class="form-group col-sm-12">
                            @include('admin.shared.featured', ['featured' => 0])
                        </div> <div class="form-group col-sm-12">
                            @include('admin.shared.trending', ['trending' => 0])
                        </div> <div class="form-group col-sm-12">
                            @include('admin.shared.best_seller', ['is_best_seller' => 0])
                        </div> <div class="form-group col-sm-12">
                            @include('admin.shared.top_rated', ['is_top_rated' => 0])
                        </div>

                        <div class="form-group col-sm-12">
                            @include('admin.shared.status-select', ['status' => 0])
                        </div>
                    </div>


            </div>
            <div class="col-md-4">
                <h2>Categories</h2>
                @include('admin.shared.categories', ['categories' => $categories, 'selectedIds' => []])
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
</div>
<!-- /.box -->

</section>
<!-- /.content -->
@endsection

@section('js')

<script>
    $('#discount').on('keyup',function(){
        var dis = $('#discount').val();
        var price = $('#price').val();
        // alert(dis);
        var sale_price = parseInt(price)-(parseInt(price*dis)/100);
        $('#sale_price').val(sale_price);
        // alert(sale_price);
        
    })
</script>

@endsection
