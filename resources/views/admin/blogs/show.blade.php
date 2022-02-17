@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($blog)
            <div class="box">
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-2">#</td>
                            <td class="col-md-3">Title</td>
                            <td class="col-md-3">Description</td>
                            <td class="col-md-3">Cover</td>
                            <td class="col-md-2">Status</td>
                            <!-- <td class="col-md-2">Action</td> -->
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ substr($blog->description,0,100) }}...</td>
                                <td>
                                   
                                        <img src="{{ asset('storage/'.$blog->cover) }}" class="img-responsive" alt="">
                                
                                </td>
                                <td>{{ $blog->status }}</td>
                               
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
