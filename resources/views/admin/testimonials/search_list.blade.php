@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h2>Testimonials</h2>
                    @include('layouts.search', ['route' => route('admin.testimonials.search_testimonials'), 'placeholder' => 'Search by name, description, profession ...', 'keyword' => $keyword])

        @if(!$testimonials->isEmpty())
        @include('admin.shared.testimonials')
                    {{ $testimonials->links() }}
        @endif

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
