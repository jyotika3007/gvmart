@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">

        <div class="form-title">
            <h3>Blogs >> Add Blog</h3>
        </div>

            <form action="{{ route('admin.blogs.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                      
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ old('title') }}" required="required">
                        </div>

                        <div class="form-group">
                            <label for="author">Author <span class="text-danger">*</span></label>
                            <input type="text" name="author" id="author" placeholder="Author" class="form-control" value="{{ old('author') }}" required="required">
                        </div>

                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description"  required="required">{{ old('description') }}</textarea>
                        </div> 

                        <div class="form-group">
                            <label for="cover">Cover </label>
                            <input type="file" name="cover" id="cover" class="form-control" required="required">
                        </div>
                      
                    
                        @include('admin.shared.status-select', ['status' => 1])
                        
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
