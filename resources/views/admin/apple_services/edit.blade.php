@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

        <div class="form-title">
            <h3>Apple Service >> Edit Apple Service</h3>
        </div>

        <form action="{{ route('admin.apple_services.update',$service->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
            <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}

                <br>

                <div class="form-group" style="display: none">
                    <label for="category_id">Category <span class="text-danger">*</span></label>
                    @if(isset($categories) && count($categories)>0)

                    <select name="category_id" id="category_id" class="form-control select2" >
                        <option value=""></option>
                        @foreach($categories as $cat)
                        <option value="{{$cat->id ?? ''}}" @if($cat->id  == $service->category_id) selected @endif>{{ $cat->name ?? '' }}</option>
                        @endforeach
                    </select>

                    @endif
                </div>

                <div class="form-group">
                    <label for="service_name">Service Title <span class="text-danger">*</span></label>
                    <input type="text" name="service_name" id="service_name" placeholder="service_name" class="form-control" value="{{ $service->service_name ?? '' }}" required="required">
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <div class="row">
                            <img src="{{ asset('storage/'.$service->service_cover) }}" alt="" class="img-responsive img-thumbnail">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="service_cover">Cover </label>
                    <input type="file" name="service_cover" id="service_cover" class="form-control">
                </div>

                <div class="form-group">
                    <label for="service_description">Full Description </label>
                    <textarea class="form-control ckeditor" name="service_description" id="service_description" rows="5" placeholder="Description" required="required">{{ $service->service_description ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="service_price">Price <span class="text-danger">*</span></label>
                    <input type="text" name="service_price" id="service_price" placeholder="service_price" class="form-control" value="{{ $service->service_price ?? 0 }}" required="required">
                </div>

                @include('admin.shared.status-select', ['status' => $service->status])

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.apple_services.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection