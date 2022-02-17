@extends('layouts.admin.app')

@section('content')

    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.categories.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    
                    
                <h3>Add New Category @if(!empty($parent_category)) {{ ' Under' }} <i><b>'{{ $parent_category->name ?? '' }}' @endif</b></i></h3>
                <br>
                    <div class="form-group" @if($parent_id>0){{ 'style=display:none;' }}@endif>
                        <label for="parent">Parent Category</label>
                        <select name="parent_id" id="parent_id" class="form-control select2">
                            <option value="">None</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @if($parent_id == $cat->id){{'selected'}}@endif>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required="required">
                    </div>
                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover </label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>


                        <div class="form-group ">
                            @include('admin.shared.featured', ['featured' => 0])
                            <p>If yes, then will show in menu</p>
                        </div>

                        
 <div class="form-group ">
                            @include('admin.shared.top', ['top' => 0])
                        </div>

                        

                    <div class="form-group">
                        <label for="status">Status </label>


<input type="radio" name="status" id="status" value="1" checked /> Enable
<input type="radio" name="status" id="status" value="0" /> Disable
                       <!--  <select name="status" id="status" class="form-control">
                            <option value="0">Disable</option>
                            <option value="1">Enable</option>
                        </select> -->
                    </div>
                    
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
