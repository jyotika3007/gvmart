@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.brands.update', $brand->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}

                     <h3>Edit Brand</h3>
                <br>
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $brand->name }}"  required="required">
                    </div>

                     <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <img src="{{ asset('storage/'.$brand->cover) }}" alt="" class="img-responsive img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"></div>
                                            <div class="form-group">
                                                <label for="cover">Cover </label>
                                                <input type="file" name="cover" id="cover" class="form-control">
                                            </div>

                                            @include('admin.shared.status-select', ['status' => $brand->status])

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
