@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(!$sliders->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>Sliders</h2>
                    @include('layouts.search', ['route' => route('admin.sliders.index')])
                    @include('admin.shared.sliders')
                    {{ $sliders->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
