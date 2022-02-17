@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ url('admin/newsletter_posts/'.$post->id.'/update') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    
                    
                <h3>Edit Post  Details</h3>
                <br>
                   
                    <div class="form-group">
                        <label for="name">Title  <span class="text-danger">*</span></label>
                        <input type="text" name="post_title" id="post_title" placeholder="Post Title" class="form-control" value="{{ $post->post_title ?? '' }}" required="required">
                    </div>
                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea class="form-control ckeditor" name="post_description" id="post_description" rows="5" placeholder="Post Description">{{ $post->post_title ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover </label>
                        <input type="file" name="cover" id="cover" class="form-control">
                        
                        @if($post->cover != '')
                            <img src="{{ asset('storage/'.$post->cover) }}" style="height: 100px">
                        @endif
                    </div>


                       
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ url('admin/newsletter_posts/index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
