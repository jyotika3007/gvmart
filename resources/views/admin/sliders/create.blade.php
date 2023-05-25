@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
        <div class="form-title">
            <h3>Add Slider</h3>
        </div>
            <form action="{{ route('admin.sliders.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <br>

                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ old('title') }}" >
                        </div>

                        <div class="form-group" style="display: none;">
                            <label for="description">Type </label>
                            <input type="text" name="type" id="type" placeholder="Type" class="form-control" value="slider" required="required">
                        </div> 

                        <div class="form-group">
                            <label for="priority">Display Priority </label>
                            <input type="number" name="priority" id="priority" class="form-control" required="required">
                        </div>
                      
                        <div class="form-group">
                            <label for="start_date">Start Date </label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required="required">
                        </div>
                      
                        <div class="form-group">
                            <label for="end_date">End Date </label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required="required">
                        </div>
                      
                     <div class="form-group">
                            <label for="cover">Image </label>
                            <input type="file" name="cover" id="cover" class="form-control" required="required">
                        </div>
                      
                    
                        @include('admin.shared.status-select', ['status' => 1])
                        
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
