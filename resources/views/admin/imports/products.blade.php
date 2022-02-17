@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}

                     <h3>Upload Product Excel Sheet</h3>
                <br>
                    <div class="form-group">
                        <label for="file"> Upload Here <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="file" placeholder="Name" class="form-control" value="{{ old('file') }}" required="required">
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>










            <br><br>


            <form action="{{ url('admin/upload_categories') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}

                     <h3>Upload Category asigned to products Excel Sheet</h3>
                <br>
                    <div class="form-group">
                        <label for="file"> Upload Here <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="file" placeholder="Name" class="form-control" value="{{ old('file') }}" required="required">
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>

            <br><br>


            <form action="{{ url('admin/upload_main_categories') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}

                     <h3>Upload Categories Excel Sheet</h3>
                <br>
                    <div class="form-group">
                        <label for="file"> Upload Here <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="file" placeholder="Name" class="form-control" value="{{ old('file') }}" required="required">
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>

   <br><br>


            <form action="{{ url('admin/upload_brands') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}

                     <h3>Upload Brands Excel Sheet</h3>
                <br>
                    <div class="form-group">
                        <label for="file"> Upload Here <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="file" placeholder="Name" class="form-control" value="{{ old('file') }}" required="required">
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>





        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
