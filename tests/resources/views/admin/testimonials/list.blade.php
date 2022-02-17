@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(!$testimonials->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>Testimonials</h2>
                    @include('layouts.search', ['route' => route('admin.testimonials.index')])
                    @include('admin.shared.testimonials')
                    {{ $testimonials->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
