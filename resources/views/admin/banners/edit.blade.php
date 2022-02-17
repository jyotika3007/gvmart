@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.banners.update', $banner->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h3>Edit Banner's Detail</h3>
                        <br>

                        <div class="form-group">
                            <label for="category_id">Select Category <span class="text-danger">*</span></label>
                            <select  name="category_id" id="category_id" placeholder="category_id" class="form-control" >
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @if($banner->category_id == $cat->id){{'selected'}}@endif>{{ ucfirst($cat->name ?? '') }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="banner_title">Title </label>
                            <input type="text" name="banner_title" id="banner_title" placeholder="Title" class="form-control"  required="required" value="{{ $banner->banner_title ?? '' }}">
                        </div> 

                        <div class="form-group">
                            <label for="priority">Display Priority </label>
                            <input type="number" name="priority" id="priority" class="form-control" required="required" value="{{ $banner->priority ?? '' }}">
                        </div>
                      
                        <div class="form-group">
                            <img src="{{ asset('storage/'.$banner->cover ?? '') }}" style="height: 100px;">
                        </div>
                      
                     <div class="form-group">
                            <label for="cover">Image </label>
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>
                      
                    
                        @include('admin.shared.status-select', ['status' => $banner->status])
                        
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
