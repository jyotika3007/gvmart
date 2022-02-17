@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}
                <h3>Edit Category</h3>
                <br>
                <div class="form-group">
                    <label for="parent">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control select2">
                        <option value="">None</option>
                        @foreach($categories as $cat)
                        <option @if($cat->id == $category->parent_id) selected="selected" @endif value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $category->name ?: old('name')  !!}" required="required">
                </div>
                <div class="form-group">
                    <label for="description">Description </label>
                    <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{!! $category->description ?: old('description')  !!}</textarea>
                </div>
                @if(isset($category->cover))
                <div class="form-group">
                    <img src="{{ asset('storage/'.$category->cover) }}" alt="" class="img-responsive" style="height: 150px;"> <br/>
                    <!-- <a onclick="return confirm('Are you sure?')" href="{{ route('admin.category.remove.image', ['category' => $category->id]) }}" class="btn btn-danger">Remove image?</a> -->
                </div>
                @endif
                <div class="form-group">
                    <label for="cover">Cover </label>
                    <input type="file" name="cover" id="cover" class="form-control">
                </div>

                <div class="form-group ">
                    @include('admin.shared.featured', ['featured' => $category->is_featured])
                    <p>If yes, then will show in menu</p>
                </div>

                
                <div class="form-group ">
                    @include('admin.shared.top', ['top' => $category->is_top])
                </div>

                

                <div class="form-group">
                    <label for="status">Status </label>

                    <input type="radio" name="status" id="status" value="1" @if($category->status == 1) checked="checked" @endif /> Enable
                    <input type="radio" name="status" id="status" value="0"  @if($category->status == 0) checked="checked" @endif /> Disable

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ $previous }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
