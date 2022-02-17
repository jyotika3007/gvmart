@extends('layouts.admin.app')
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.cms.update', $cms->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <h4>{{$cms->page ?? ''}} </h4>
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="name">Page <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" placeholder="Name" class="form-control" value="{{ $cms->title ?? ''}}">
                    </div>

 

                     <div class="form-group">
                        <label for="description">Description </label>
                         <textarea name="description" class="form-control" id="description">{{ $cms->description ?? '' }}</textarea><br>  
                                <script>
                                    CKEDITOR.replace( 'description' );
                                </script>
                        <!-- <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description"></textarea> -->
                    </div>



                    <br>
                    <h4>SEO Parameters</h4>

                     <div class="form-group col-sm-6">
                        <label for="meta_title"> Meta Title</label>
                        <textarea rows="3" name="meta_title" id="meta_title" placeholder="Meta Title" class="form-control">{{$cms->meta_title ?? ''}}</textarea>
                    </div>

                    
                     <div class="form-group col-sm-6">
                        <label for="meta_description"> Meta Description</label>
                        <textarea rows="3" name="meta_description" id="meta_description" placeholder="Meta Description" class="form-control">{{$cms->meta_description ?? ''}}</textarea>
                    </div>

                    
                     <div class="form-group col-sm-6">
                        <label for="search_keywords">Search Keywords</label>
                        <textarea rows="3" name="search_keywords" id="search_keywords" placeholder="Search Keywords" class="form-control">{{$cms->search_keywords ?? ''}}</textarea>
                        <p>Use comma (,) as a separator for multiple keywords.</p>
                    </div>

                    

                    
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.cms.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
