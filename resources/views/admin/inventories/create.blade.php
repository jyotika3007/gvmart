@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    <style>
        .red{
            padding: 5px;
            color: red;
        }
    </style>
    @include('layouts.errors-and-messages')
    <div class="box">

    <div class="form-title">
        <h3>Inventory >> Add Inventory</h3>
        </div>

        <form action="{{ route('admin.inventories.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}


                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="bill_no">Select Vendor <span class="text-danger">*</span></label>
                        <select type="text" name="user_id" id="user_id" placeholder="Bill No" class="form-control" required="required">
                            <option value="">Select Vendor</option>
                            @if($users)
                            @foreach($users as $user)
                            <option value="{{ $user->user_id ?? '' }}">{{ $user->shop_name ?? '' }}</option>
                            @endforeach
                            @endif
                        </select>
                        <p id="userError" style="color: red"></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="bill_no">Bill Number <span class="text-danger">*</span></label>
                        <input type="text" name="bill_no" id="bill_no" placeholder="Bill No" class="form-control" value="{{ old('name') }}" required="required">
                        <p id="bill_no_error" style="color: red"></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="billing_date">Billing Date </label>
                        <input type="date" name="billing_date" id="billing_date" placeholder="Billing Date" class="form-control" value="{{ old('name') }}" required="required">
                        <p id="bill_date_error" style="color: red"></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="billing_amount">Total Amount </label>
                        <input type="text" name="billing_amount" id="billing_amount" placeholder="Total Amount" class="form-control" value="{{ old('name') }}" required="required">
                        <p id="bill_amount_error" style="color: red"></p>
                    </div>
                </div>


                <div class="col-sm-12"><br><br></div>

                <div class="form-group" id="dynamic-stock">
                    <h4>Products List</h4>
                    <br>


                    <div class="row stocks">
                        <div class="col-sm-4">
                           <div class="form-group">
                            <label for="product_ids">Select Product</label>
                            <select name="product_ids[]" id="product_ids" class="form-control select2">
                                <option value="">None</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <p id="productError" class="red"></p>
                        </div>
                    </div>

                <!-- <div class="col-sm-3">
                 <div class="form-group">
                    <label for="product_sku">Product SKU</label>
                    <input type="text" name="product_sku[]" id="product_sku" placeholder="Product SKU" class="form-control" value="" required="required">
                </div>
            </div> -->

            <div class="col-sm-3">
               <div class="form-group">
                <label for="product_quantity">Product Quantity</label>
                <input type="text" name="product_quantity[]" id="product_quantity" placeholder="Product Quantity" class="form-control" value="" required="required">
                <p id="productQuantityError" class="red"></p>
            </div>
        </div>
        
        <div class="col-sm-3">
           <div class="form-group">
            <label for="product_price">Total Amount</label>
            <input type="text" name="product_price[]" id="product_price" placeholder="Total Amount" class="form-control" value="" required="required">
            <p id="productPriceError" class="red"></p>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <br>

            <a onclick="getStockDiv()" class="btn btn-success add_stock_ok">+</a>
        </div>
    </div>
</div>


</div>

<p id="errorMain" style="color: red"></p>


<!-- /.box-body -->
<div class="box-footer">
    <div class="btn-group">
        <a href="{{ route('admin.inventories.index') }}" class="btn btn-default">Back</a>
        <span id="create_inventory" class="btn btn-primary" onclick="submitInventory()">Create</span>
        <button type="submit" style="display: none; " id="create">Create</button>
    </div>
</div>
</form>
</div>
<!-- /.box -->

</section>
<!-- /.content -->
@endsection


@section('js')

<script type="text/javascript">

    $('#product_ids').on('change', function(){
        var pid = $('#product_ids').val();
        if(pid ==''){
            $('#productError').text('Select product first');
        }
        else{
            $('#productError').text('');
        }
    });

    $('#product_quantity').on('keyup', function(){
        var pid = $('#product_quantity').val();
        if(pid ==''){
            $('#productQuantityError').text('Entry quantity first');
        }
        else{
            $('#productQuantityError').text('');
        }
    });

    $('#product_price').on('keyup', function(){
        var pid = $('#product_price').val();
        if(pid ==''){
            $('#productPriceError').text('Enter price first');
        }
        else{
            $('#productPriceError').text('');
        }
    });

</script>

<script type="text/javascript">

    function submitInventory(){

        var bill_no = $('#bill_no').val();
        var billing_date = $('#billing_date').val();
        var billing_amount = $('#billing_amount').val();
        var product_ids = $('#product_ids').val();
        var product_quantity = $('#product_quantity').val();
        var product_price = $('#product_price').val();
        var user_id = $('#user_id').val();

        var ele = document.getElementsByName('product_price[]'); 
        console.log(ele)

        var countError = 0

        var totalBill = 0

        for(i = 0; i < ele.length; i++) { 

            totalBill = totalBill+parseInt(ele[i].value) 

        } 

        if(totalBill > billing_amount || totalBill < billing_amount){
            $('#errorMain').text('Wrong calculation for amount. Please check again');
            countError = countError+1;
        }
        else{
            $('#errorMain').text('');
        }

        if(bill_no == ''){
            $('#bill_no_error').text('Bill number is required');
            countError = countError+1;
        }
        else{
            $('#bill_no_error').text('');
        }

        if(billing_date == ''){
            $('#bill_date_error').text('Billing Date is required');
            countError = countError+1;
        }
        else{
            $('#bill_date_error').text('');
        }

        if(billing_amount == ''){
            $('#bill_amount_error').text('Billing amount is required');
            countError = countError+1;
        }
        else{
            $('#bill_amount_error').text('');
        }


        if(product_ids == ''){
            $('#productError').text('Select product first');
            countError = countError+1;
        }
        else{
            $('#productError').text('');
        }


        if(product_quantity == ''){
            $('#productQuantityError').text('Enter quantity first');
            countError = countError+1;
        }
        else{
            $('#productQuantityError').text('');
        }


        if(product_price == ''){
            $('#productPriceError').text('Enter price first');
            countError = countError+1;
        }
        else{
            $('#productPriceError').text('');
        }

if(user_id == ''){
            $('#userError').text('Select vendor first');
            countError = countError+1;
        }
        else{
            $('#userError').text('');
        }


        if(countError==0){
            $('#create').click();
        }

    }

</script>

@endsection