@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.pincodes.update',$pincode->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h3>Edit Pincode</h3>
                        <br>

                        <div class="form-group">
                            <label for="pincode">Pincode Numbar <span class="text-danger">*</span></label>
                            <input type="text" name="pincode" id="pincode" placeholder="pincode" class="form-control" value="{{ $pincode->pincode ?? '' }}" required="required" onkeypress="return isNumberKey(event)" maxlength="6">
                        </div>

                       
                    
                        <div class="form-group">
                        <label for="status"> Status </label>
<select name="status" id="status" class="form-control select2">
    <option value="0" @if($pincode->status == 0){{'selected'}}@endif>Disable</option>
    <option value="1" @if($pincode->status == 1){{'selected'}}@endif>Enable</option>
</select>
</div>
                        
                    </div>
                    
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
