@extends('layouts.admin.app')
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">

        
        <div class="form-title">
            <h3>CMS >> Add</h3>
        </div>

            <form action="{{ route('admin.cms.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="page">Page Name <span class="text-danger">*</span></label>
                        <input type="text" name="page" id="page" placeholder="Name" class="form-control" value="{{ old('page') }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" placeholder="Name" class="form-control" value="{{ old('title') }}">
                    </div>

                    

                     <div class="form-group">
                        <label for="description">Description </label>
                         <textarea name="description" class="form-control" id="description"></textarea><br>  
                                <script>
                                    CKEDITOR.replace( 'description' );
                                </script>
                        <!-- <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description"></textarea> -->
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.cms.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
