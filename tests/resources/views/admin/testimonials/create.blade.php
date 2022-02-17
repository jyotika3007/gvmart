@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.testimonials.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Testimonial</h2>
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required="required">
                        </div>

                        <div class="form-group">
                            <label for="profession">Profession <span class="text-danger">*</span></label>
                            <input type="text" name="profession" id="profession" placeholder="Profession" class="form-control" value="{{ old('profession') }}" required="required">
                        </div>

                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description" required="required">{{ old('description') }}</textarea>
                        </div> 

                        <div class="form-group">
                            <label for="cover">Cover </label>
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>
                      
                    
                        @include('admin.shared.status-select', ['status' => 0])
                        
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
