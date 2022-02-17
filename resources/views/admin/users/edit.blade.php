@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ url('admin/user/'.$user->id.'/update') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                <div class="row">
                    {{ csrf_field() }}
                    <!-- <input type="hidden" name="_method" value="put"> -->
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
                                        <h2>Admin Info</h2>

                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $user->name ?? '' }}" required="required">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ $user->email ?? '' }}" required="required" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control" required="required">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="confirm_password" id="confirm_password" placeholder="xxxxx" class="form-control" required="required">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="box-footer">
                                        <div class="btn-group">
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
