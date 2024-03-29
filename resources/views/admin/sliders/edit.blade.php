@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                <div class="row">
                    {{ csrf_field() }}
                    <br>
                    <!-- <input type="hidden" name="_method" value="put"> -->
                    <div class="col-md-12">
                        <!-- Nav tabs -->

                        <!-- Tab panes -->
                        <div class="tab-content" id="tabcontent">
                            <div role="tabpanel" class="tab-pane @if(!request()->has('combination')) active @endif" id="info">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3> Edit Slider Detail - {{ ucfirst($slider->title) }}</h3>
                                        <br>
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" id="title" placeholder="xxxxx" class="form-control" value="{!! $slider->title ?? '' !!}">
                                        </div>

                                        <div class="form-group" style="display: none;">
                                            <label for="description">Type </label>
                                            <input type="text" name="type" id="type" placeholder="xxxxx" class="form-control" value="slider" required="required">
                                        </div>

                                        <div class="form-group">
                                            <label for="priority">Display Priority </label>
                                            <input type="number" name="priority" id="priority" class="form-control" required="required" value="{!! $slider->priority ?? '' !!}">
                                        </div>

                                        <div class="form-group">
                                            <label for="start_date">Start Date </label>
                                            <input type="date" name="start_date" id="start_date" class="form-control" value="{!! $slider->start_date ?? '' !!}">
                                        </div>

                                        <div class="form-group">
                                            <label for="end_date">End Date </label>
                                            <input type="date" name="end_date" id="end_date" class="form-control" value="{!! $slider->end_date ?? '' !!}">
                                        </div>

                                        @if(isset($slider->cover) && $slider->cover!='')
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('storage/'.$slider->cover) }}" alt="" class="img-responsive img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        <div class="form-group">
                                            <label for="cover">Desktop Image </label>
                                            <input type="file" name="cover" id="cover" class="form-control">
                                        </div>

                                        @if(isset($slider->mobile_cover) && $slider->mobile_cover!='')
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('storage/'.$slider->mobile_cover) }}" alt="" class="img-responsive img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        <div class="form-group">
                                            <label for="mobile_cover">Mobile Image </label>
                                            <input type="file" name="mobile_cover" id="mobile_cover" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            @include('admin.shared.status-select', ['status' => $slider->status])
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="box-footer">
                                        <div class="btn-group">
                                            <a href="{{ $previous }}" class="btn btn-default btn-sm">Back</a>
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

    label.checkbox-inline>input[type="checkbox"] {
        margin-left: 10px;
    }

    ul.attribute-lists>li>label:hover {
        background: #3c8dbc;
        color: #fff;
    }

    ul.attribute-lists>li {
        background: #eee;
    }

    ul.attribute-lists>li:hover {
        background: #ccc;
    }

    ul.attribute-lists>li {
        margin-bottom: 15px;
        padding: 15px;
    }
</style>
@endsection