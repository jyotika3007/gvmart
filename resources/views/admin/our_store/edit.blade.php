@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

        <div class="form-title">
            <h3>Our Stores >> Edit Our Store</h3>
        </div>

        <form action="{{ route('admin.our_store.update',$store->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
            <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}

                <br>

                <div class="form-group">
                    <label for="main_area">Main Area <span class="text-danger">*</span></label>
                    <input type="text" name="main_area" id="main_area" placeholder="Main Area" class="form-control" value="{{ $store->main_area ?? '' }}" required="required">
                </div>

                <div class="form-group">
                    <label for="address">Full Address </label>
                    <textarea class="form-control" name="address" id="address" rows="2" placeholder="Full Address" required="required">{{$store->address ?? ''}}</textarea>
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ $store->email ?? '' }}" required="required">
                </div>

                <div class="form-group">
                    <label for="contact">Contact <span class="text-danger">*</span></label>
                    <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control" value="{{ $store->contact ?? '' }}" required="required">
                </div>

                @include('admin.shared.show-to-footer', ['status' => $store->show_to_footer])

                @include('admin.shared.status-select', ['status' => $store->status])

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.our_store.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection