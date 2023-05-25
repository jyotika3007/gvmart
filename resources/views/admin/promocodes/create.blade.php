@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
    <div class="form-title">
        <h3>Add New Promocode</h3>
        </div>
        <form action="{{ route('admin.promocodes.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promocode_name">Promocode Name <span class="text-danger">*</span></label>
                                <input type="text" name="promocode_name" id="promocode_name" placeholder="promocode_name" class="form-control" value="{{ old('promocode_name') }}" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promocode_amount">Promocode Amount </label>
                                <input type="number" name="promocode_amount" id="promocode_amount" placeholder="promocode_amount" class="form-control" value="slider" required="required" value="0.00">
                            </div> 
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promocode_percent">Promocode Percent </label>
                                <input type="number" name="promocode_percent" id="promocode_percent" placeholder="promocode_percent" class="form-control" value="slider" required="required" value="0.00" onkeyup="handleDiscount(this)">
                            </div> 
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="min_order_amount">Minimum Order Amount </label>
                                <input type="number" name="min_order_amount" id="min_order_amount" placeholder="min_order_amount" class="form-control" value="slider" required="required" value="0.00">
                            </div> 
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_order_amount">Maximum Order Amount </label>
                                <input type="number" name="max_order_amount" id="max_order_amount" placeholder="max_order_amount" class="form-control" value="slider" required="required" value="0.00">
                            </div> 
                        </div> 


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promocode_start_date">Promocode Start Date </label>
                                <input type="date" name="promocode_start_date" id="promocode_start_date" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promocode_expiry_date">Promocode Expiry Date </label>
                                <input type="date" name="promocode_expiry_date" id="promocode_expiry_date" class="form-control" required="required">
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promocode_status">Promocode Status </label>
                                <select name="promocode_status" id="promocode_status" class="form-control select2">
                                    <option value="0" >Disable</option>
                                    <option value="1" >Enable</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.promocodes.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
