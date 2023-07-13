@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h2>Blogs</h2>
                    @include('layouts.search', ['route' => route('admin.blogs.search_blogs'), 'placeholder' => 'Search by title, description, author ...', 'keyword' => $keyword])
        @if(!$blogs->isEmpty())
                    @include('admin.shared.blogs')
                    {{ $blogs->links() }}
        @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
