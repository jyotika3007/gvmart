@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">


            <form action="upload_products_dump" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}

 <div class="row">
                <div class="col-sm-9">    
                    <h3>Upload Product Excel Sheet</h3>               
                </div>
                <div class="col-sm-3">
                    
                    <a a href="{{ url('admin/export_dump_data') }}" class="btn btn-warning" style="margin-top: 25px;">Export Dump</a>
                   
                </div>
            </div>

                <br>
                    <div class="form-group">
                        <label for="file"> Upload Here <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="file" placeholder="Name" class="form-control" value="{{ old('file') }}" required="required">
                    </div>

                </div>
               
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>










            <!-- <br><br>


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
                
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>

            <br><br>
 -->

<!-- 

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
                
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>

   <br><br> -->



           <!--  <form action="{{ url('admin/upload_brands') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}

                     <h3>Upload Brands Excel Sheet</h3>
                <br>
                    <div class="form-group">
                        <label for="file"> Upload Here <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="file" placeholder="Name" class="form-control" value="{{ old('file') }}" required="required">
                    </div>

                </div>
                
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
 -->




        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
