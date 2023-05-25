

@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        
            <div class="box">
                <div class="box-body">
                    <h3>Shop Categories</h3>


                    <br>

                    <form action="" method="get">
                    <div class="row"  >
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by category name ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.shop_categories.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.shop_categories.create') }}"  class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>





        @if($shop_categories)
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <td>Created At</td>
                                <!-- <td>Category Type</td> -->
                                <td>Category Name</td>
                                <!-- <td>Cover</td> -->
                                <!-- <td>Featured</td> -->
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($shop_categories as $shop_category)
                            <tr>
                                <td>{{date('M d, Y', strtotime($shop_category->created_at ?? '')) }}</td>
                                <!-- <td>
                                    <a href="{{ route('admin.shop_categories.show', $shop_category->id) }}">{{ $shop_category->category ?? '' }}</a>
                                </td> -->
                                <td>{{ $shop_category->category_name ?? '' }}</td>
                                <!-- <td><img src="{{ asset('storage/'.$shop_category->cover ?? '') }}" height='100px'></td> -->
                                <!-- <td>@include('layouts.status', ['status' => $shop_category->featured])</td> -->
                                <td>@include('layouts.status', ['status' => $shop_category->status])</td>
                
                                <td>
                                    <form action="{{ route('admin.shop_categories.destroy', $shop_category->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.shop_categories.edit', $shop_category->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $shop_categories->links() }}

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