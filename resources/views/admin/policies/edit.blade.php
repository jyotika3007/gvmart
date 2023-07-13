@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

        <div class="form-title">
            <h3>Policies >> Edit Policy</h3>
        </div>

        <form action="{{ route('admin.policies.update',$policy->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT" />
                <div class="col-md-8">

                    <div class="form-group">
                        <label for="request_type">Request type </label>
                        <select name="request_type" id="request_type" class="form-control select2" required>
                            <option value="">- Selct Request Type -</option>
                            <option value="cancel" @if($policy->request_type == 'cancel') {{'selected'}} @endif >Cancel</option>
                            <option value="return" @if($policy->request_type == 'return') {{'selected'}} @endif >Reason</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="reason">Reason <span class="text-danger">*</span></label>
                        <input type="text" name="reason" id="reason" placeholder="Reason" class="form-control" value="{{$policy->reason ?? ''}}" required="required">
                    </div>

                    @include('admin.shared.status-select', ['status' => $policy->status])

                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.policies.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection