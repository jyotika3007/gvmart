@extends('layouts.admin.app')

@section('content')

<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

        <div class="form-title">
            @if(!empty($parent_category))
            <h3>Categories >> Add Sub Category @if(!empty($parent_category)) {{ ' Under' }} <i><b>'{{ $parent_category->name ?? '' }}' </b>@endif</i></h3>
            @else
            <h3>Categories >> Add Category</i></h3>
            @endif
        </div>
            
        
        <form action="{{ route('admin.categories.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                
                <br>
                <div class="form-group" style="display:none;">
                <!-- <div class="form-group" @if($parent_id>0){{ 'style=display:none;' }}@endif> -->
                    <label for="parent">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control select2">
                        <option value="">None</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @if($parent_id==$cat->id){{'selected'}}@endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required="required">
                </div>
                <!--<div class="form-group">-->
                <!--    <label for="description">Description </label>-->
                <!--    <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>-->
                <!--</div>-->
                <div class="form-group">
                    @if(!empty($parent_category))
                    <label for="cover">Icon </label>
                    @else
                    <label for="cover">Cover </label>
                    @endif
                    <input type="file" name="cover" id="cover" class="form-control">
                </div>
                
                <!--<div class="form-group ">-->
                <!--    @include('admin.shared.prelaunched', ['is_prelaunched' => 0])-->
                <!--</div>-->
                
                <!--<div class="form-group ">-->
                <!--    @include('admin.shared.featured', ['featured' => 0])-->
                <!--    <p>If yes, then will show in menu</p>-->
                <!--</div>-->
                
                @if(!empty($parent_category))
                    <div class="form-group" style="display: none">
                    @include('admin.shared.top', ['top' => 0])
                    </div>
                @else
                    <div class="form-group ">
                    @include('admin.shared.top', ['top' => 1])
                    </div>
                @endif
                
                @include('admin.shared.status-select', ['status' => 1])
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection