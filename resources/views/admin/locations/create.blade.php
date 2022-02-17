@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.locations.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="col-md-8">
                    <h3>Add New Location</h3>
                    <br>

                    <div class="form-group">
                        <label for="location">Location Name <span class="text-danger">*</span></label>
                        <input type="text" name="location" id="location" placeholder="location" class="form-control" value="{{ old('location') }}" required="required">
                    </div>


                    <div class="form-group">
                        <label for="pincode">Pincode Number <span class="text-danger">*</span></label>
                        <input type="text" name="pincode" id="pincode" placeholder="pincode" class="form-control" value="{{ old('pincode') }}" required="required" onkeypress="return isNumberKey(event)" maxlength="6">
                    </div>


                    <div class="form-group">
                        <label for="shipping_amount">Shipping Amount <span class="text-danger">*</span></label>
                        <input type="text" name="shipping_amount" id="shipping_amount" placeholder="shipping_amount" class="form-control" value="{{ old('shipping_amount') }}" required="required" onkeypress="return isNumberKey(event)">
                    </div>

                    
                    <div class="form-group">
                        <label for="status"> Status </label>
                        <select name="status" id="status" class="form-control select2">
                            <option value="0" >Disable</option>
                            <option value="1" >Enable</option>
                        </select>
                    </div>

                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.locations.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
