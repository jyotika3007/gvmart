@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.shop_categories.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}

                <!-- @include('admin.shared.shop-category', ['category' => 'Product Based']) -->

                 <input type="hidden" name="category" id="get_category" class="form-control select2" required="required" value="Product Based">


                <div class="form-group">
                    <label for="name">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="category_name" id="category_name" placeholder="Category Name" class="form-control" value="{{ old('category_name') }}" required="required">
                </div>

                <!-- <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" name="cover" id="cover" class="form-control">
                </div> -->
                
               <!--  <div class="form-group">
                    <label for="icons">Icon</label>
                    <input type="file" name="icons" id="icons" class="form-control">
                </div>
 -->
                @include('admin.shared.status-select', ['status' => 0])
                <!-- @include('admin.shared.featured', ['featured' => 0]) -->

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.shop_categories.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
