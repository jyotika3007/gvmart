@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($testimonial)
            <div class="box">
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-2">#</td>
                            <td class="col-md-3">Name</td>
                            <td class="col-md-3">Profession</td>
                            <td class="col-md-3">Cover</td>
                            <td class="col-md-2">Status</td>
                            <!-- <td class="col-md-2">Action</td> -->
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>{{ ucfirst($testimonial->name) }}</td>
                                <td>{{ ucfirst($testimonial->profession) }}</td>
                                <td>
                                    @if(isset($testimonial->cover))
                                        <img src="{{ asset("storage/$testimonial->cover") }}" class="img-responsive" alt="">
                                    @endif
                                </td>
                                <td>{{ $testimonial->status }}</td>
                               
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
