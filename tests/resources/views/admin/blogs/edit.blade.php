@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" id="tablist">
                                <li role="presentation" @if(!request()->has('combination')) class="active" @endif><a href="#info" aria-controls="home" role="tab" data-toggle="tab">Info</a></li>
                                
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content" id="tabcontent">
                                <div role="tabpanel" class="tab-pane @if(!request()->has('combination')) active @endif" id="info">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h2>{{ ucfirst($blog->title) }}</h2>
                                            <div class="form-group">
                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" id="title" placeholder="xxxxx" class="form-control" value="{!! $blog->title ?? '' !!}">
                                            </div>

                                            <div class="form-group">
                                                <label for="author">Author <span class="text-danger">*</span></label>
                                                <input type="text" name="author" id="author" placeholder="xxxxx" class="form-control" value="{!! $blog->author ?? '' !!}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="description">Description </label>
                                                <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{!! $blog->description  !!}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <img src="{{ asset('storage/'.$blog->cover) }}" alt="" class="img-responsive img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"></div>
                                            <div class="form-group">
                                                <label for="cover">Cover </label>
                                                <input type="file" name="cover" id="cover" class="form-control">
                                            </div>
                                           
                                            <div class="form-group">
                                                @include('admin.shared.status-select', ['status' => $blog->status])
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="box-footer">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.blogs.index') }}" class="btn btn-default btn-sm">Back</a>
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
@section('css')
    <style type="text/css">
        label.checkbox-inline {
            padding: 10px 5px;
            display: block;
            margin-bottom: 5px;
        }
        label.checkbox-inline > input[type="checkbox"] {
            margin-left: 10px;
        }
        ul.attribute-lists > li > label:hover {
            background: #3c8dbc;
            color: #fff;
        }
        ul.attribute-lists > li {
            background: #eee;
        }
        ul.attribute-lists > li:hover {
            background: #ccc;
        }
        ul.attribute-lists > li {
            margin-bottom: 15px;
            padding: 15px;
        }
    </style>
@endsection
