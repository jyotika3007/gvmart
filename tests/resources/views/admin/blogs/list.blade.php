@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(!$blogs->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>Blogs</h2>
                    @include('layouts.search', ['route' => route('admin.blogs.index')])
                    @include('admin.shared.blogs')
                    {{ $blogs->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
