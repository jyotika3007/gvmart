@extends('layouts.admin.app')
@section('content')
<!-- Main content -->

<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($colors)
    <div class="box">

        <div class="form-title">
            <h3>Products >> Storage >> Colors @if(!empty($keyword)) - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>
        </div>

        <div class="box-body">

            <br>

            <form action="{{route('admin.products.search_products')}}" method="get">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <label style="margin-top: 6px; float: right;">Search Here</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by name ...">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.products.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('admin/variants/'.$product_id.'/add?type='.$type) }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
            </form>
            <br>
            <table class="table  table-bordered table-responsive">
                <thead>
                    <tr>
                        <!-- <th>#</th> -->
                        <th>Color</th>
                        <th>Color Code</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($colors)>0)
                    @foreach($colors as $attr)
                    <tr>
                        <td>{{ $attr->value ?? '' }}</td>

                        <td>{{ $attr->offer_price ?? 0.00 }}</td>

                        <td>
                            <a href="{{ url('admin/variants/'.$attr->product_id.'/add?type=Color&type_id='.$attr->id ) }}" class="btn btn-success btn">Add</a>
                        </td>
                        <td>

                            <a href="" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>

                        </td>

                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

            @endif

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection