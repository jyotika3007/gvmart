@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
           
<h3>Sub Categories of <i><b>'{{ $mainCat->name ?? '' }}'</b></i> @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{route('admin.categories.search_categories')}}" method="get">
                    <div class="row" style="border: 1px solid #ddd; width: 98%; margin: 1% 1%;padding: 15px; ">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by shop name, owner ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-3">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.categories.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-3">
                            @if($mainCat->parent_id>0)
                            <a href="{{ url('admin/sub_categories/'.$mainCat->parent_id) }}" class="btn btn-danger">Back</a>
                            @else
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">Back</a>

                            @endif
                            <a href="{{ route('admin.categories.create') }}?parent_id={{ $mainCat->id }}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>



   @if($categories)
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>Created At</td>
                        <td>Category Name</td>
                        <td>Sub Categories</td>
                        <td>Cover</td>
                        <td>Status</td>
                        <td>Is Featured</td>
                        <td>Top Categories</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                   
                    @php $i=1 @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ date('M d, Y',strtotime(explode(' ',$category->created_at)[0])) }}</td>
                        <td>
                            <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
                        </td>
                            <td>
                                <a href="{{ url('admin/sub_categories',$category->id) }}" class="btn btn-default">View Sub Categories</a>
                            </td>
                                <td>
                                    @if(isset($category->cover))
                                    <img src="{{ asset("storage/$category->cover") }}" alt="" class="img-responsive" style="100px;">
                                    @endif
                                </td>
                                <td>@include('layouts.status', ['status' => $category->status])</td>
                                <td>@include('layouts.status', ['status' => $category->is_featured])</td>
                                <td>@include('layouts.status', ['status' => $category->is_top])</td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    {{ $categories->links() }}
            @endif</div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection