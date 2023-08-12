@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">

                
                <div class="form-title">
                    <h3>Policies >> Policies List @if(!empty($keyword)) - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif</h3>
                </div>
                
                <div class="box-body">
                    
                    
                <!--    <form action="{{url('#')}}" method="get">-->
                <!--        <div class="row"  >-->
                <!--            <div class="col-sm-6">-->
                <!--                <div class="row">-->
                <!--                    <div class="col-sm-3">-->
                <!--                        <label style="margin-top: 6px; float: right;">Search Here</label>-->
                <!--                    </div>-->
                <!--                    <div class="col-sm-9">-->
                <!--                        <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by brand name ...">-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                            
                <!--        <div class="col-sm-4">-->
                <!--            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>-->
                <!--            <a href="{{ url('#') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>-->
                <!--        </div>-->
                <!--        <div class="col-sm-2">-->
                <!--            <a href="{{ route('admin.policies.create') }}"  class="btn btn-primary">Add New</a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->
                <br>
                @if($policies)
                    @include('admin.shared.policies')
                    {{ $policies->links() }}
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
