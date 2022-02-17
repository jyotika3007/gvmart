@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                   

<h3>Brands @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{route('admin.brands.search_brands')}}" method="get">
                    <div class="row" style="border: 1px solid #ddd; width: 98%; margin: 1% 1%;padding: 15px; ">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by brand name ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.brands.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.brands.create') }}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>




        @if($brands)
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Created At</th>
                                <th>Name</th>
                                <th>Cover</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                 <td>{{ date('M d, Y', strtotime(explode(' ',$brand->created_at)[0])) }}</td>
                                <td>
                                    <a href="{{ route('admin.brands.show', $brand->id) }}">{{ $brand->name }}</a>
                                </td>
                                <td>
                                    @if(!empty($brand->cover))
                                    <img src="{{ asset('storage/'.$brand->cover ?? '') }}" style="height: 75px;">
                                    @ENDIF
                                </td>
                                 <td>@include('layouts.status', ['status' => $brand->status])</td>
                                <td>
                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $brands->links() }}
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