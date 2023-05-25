@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">

        <div class="form-title">
            <h3>Banners >> Add Banner</h3>
        </div>

            <form action="{{ route('admin.banners.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                      
                        <div class="form-group">
                            <label for="category_id">Select Category <span class="text-danger">*</span></label>
                            <select  name="category_id" id="category_id" placeholder="category_id" class="form-control" >
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ ucfirst($cat->name ?? '') }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="banner_title">Title </label>
                            <input type="text" name="banner_title" id="banner_title" placeholder="Title" class="form-control" value="" required="required">
                        </div> 

                        <div class="form-group">
                            <label for="priority">Display Priority </label>
                            <input type="number" name="priority" id="priority" class="form-control" required="required">
                        </div>
                      
                        
                      
                     <div class="form-group">
                            <label for="cover">Image </label>
                            <input type="file" name="cover" id="cover" class="form-control" required="required">
                        </div>
                      
                    
                        @include('admin.shared.status-select', ['status' => 1])
                        
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
