@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.shop_categories.update', $shop_category->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">

                <!-- @include('admin.shared.shop-category', ['category' => $shop_category->category]) -->

                <input type="hidden" name="category" id="get_category" class="form-control select2" required="required" value="Product Based">


                <div class="form-group">
                    <label for="category_name">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="category_name" id="category_name" placeholder="Name" class="form-control" value="{{ $shop_category->category_name }}" required="required">
                </div>
<!-- 
                <div class="form-group">
                    <div class="col-md-3">
                        <div class="row">
                            <img src="{{ asset('storage/'.$shop_category->cover ?? '') }}" alt="" class="img-responsive img-thumbnail">
                        </div>
                    </div>
                </div>
                <div class="row"></div>


                <div class="form-group">
                    <label for="cover">Cover </label>
                    <input type="file" name="cover" id="cover" class="form-control">
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <div class="row">
                            <img src="{{ asset('storage/'.$shop_category->icons ?? '') }}" alt="" class="img-responsive img-thumbnail">
                        </div>
                    </div>
                </div>
                <div class="row"></div>


                <div class="form-group">
                    <label for="icons">Icon </label>
                    <input type="file" name="icons" id="icons" class="form-control">
                </div>

 -->

                @include('admin.shared.status-select', ['status' => $shop_category->status])
                <!-- @include('admin.shared.featured', ['featured' => $shop_category->featured]) -->

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.shop_categories.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
