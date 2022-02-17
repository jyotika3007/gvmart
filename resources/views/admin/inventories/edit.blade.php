@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.inventories.update',$inventory->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}


                <h3>Edit Inventory</h3>
                <br>

                <div class="col-sm-4">

                    <div class="form-group">
                        <label for="bill_no">Bill Number <span class="text-danger">*</span></label>
                        <input type="text" name="bill_no" id="bill_no" placeholder="Bill No" class="form-control" value="{{ $inventory->bill_no ?? '' }}" required="required">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="billing_date">Billing Date </label>
                        <input type="date" name="billing_date" id="billing_date" placeholder="Billing Date" class="form-control" value="{{ $inventory->billing_date ?? '' }}" required="required">
                    </div>
                </div>

                <div class="col-sm-4">
                   <div class="form-group">
                    <label for="billing_amount">Total Amount </label>
                    <input type="text" name="billing_amount" id="billing_amount" placeholder="Total Amount" class="form-control" value="{{ $inventory->billing_amount ?? '' }}" required="required">
                </div>
            </div>


            <div class="col-sm-12"><br><br></div>

            <div class="form-group" id="dynamic-stock">
            <h4>Products List</h4>
            <br>

            @if($inventory_products)
            @foreach($inventory_products as $iv_product)
            <div class="row stocks">
                <div class="col-sm-4">
                 <div class="form-group">
                    <label for="product_ids">Select Product</label>
                    <select name="product_ids[]" id="product_ids" class="form-control select2">
                        <option value="">None</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}" @if($iv_product->product_id == $product->id){{ 'selected' }}@endif>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
                <!-- <div class="col-sm-3">
                 <div class="form-group">
                    <label for="product_sku">Product SKU</label>
                    <input type="text" name="product_sku[]" id="product_sku" placeholder="Product SKU" class="form-control" value="" required="required">
                </div>
            </div> -->
        
                <div class="col-sm-4">
                 <div class="form-group">
                    <label for="product_quantity">Product Quantity</label>
                    <input type="text" name="product_quantity[]" id="product_quantity" placeholder="Product Quantity" class="form-control" value="{{ $iv_product->product_quantity ?? '' }}" required="required">
                </div>
            </div>
        
                <div class="col-sm-4">
                 <div class="form-group">
                    <label for="product_price">Total Amount</label>
                    <input type="text" name="product_price[]" id="product_price" placeholder="Total Amount" class="form-control" value="{{ $iv_product->product_price ?? '' }}" required="required">
                </div>
            </div>

           <!--  <div class="col-sm-2">
                <div class="form-group">
                    <br>
                    <a onclick="getStockDiv()" class="btn btn-success">Add</a>
                </div>
            </div>
 -->
        </div>
        @endforeach
        @endif
        



    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="btn-group">
            <a href="{{ $previous }}" class="btn btn-default">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
</div>
<!-- /.box -->

</section>
<!-- /.content -->
@endsection
