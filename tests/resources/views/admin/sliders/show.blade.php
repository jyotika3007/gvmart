@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($slider)
            <div class="box">
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-2">#</td>
                            <td class="col-md-3">Title</td>
                            <td class="col-md-3">Cover</td>
                            <td class="col-md-2">Status</td>
                            <!-- <td class="col-md-2">Action</td> -->
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>{{ $slider->title }}</td>
                                <!-- <td>{{ substr($slider->,0,100) }}...</td> -->
                                <td>
                                    @if(isset($slider->cover))
                                        <img src="{{ asset("storage/$slider->cover") }}" class="img-responsive" alt="">
                                    @endif
                                </td>
                                <td>{{ $slider->status }}</td>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-default btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
