@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
            
                    <h3>Banners @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{route('admin.banners.search_banners')}}" method="get">
                    <div class="row" style="border: 1px solid #ddd; width: 98%; margin: 1% 1%;padding: 15px; ">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by title ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.banners.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.banners.create') }}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>


              @if($banners)
                    
                    @include('admin.shared.banners')
                    {{ $banners->links() }}
        @endif
                </div>
                <!-- /.box-body -->
            <div class="box-footer">
                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection