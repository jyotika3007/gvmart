@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">


        <div class="form-title">
            <h3>Our Stores >> Our Store List @if(isset($keyqord) && !empty($keyword)) - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>
        </div>

        <div class="box-body">

            <form action="{{url('admin.our_store.search_services')}}" method="get">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <label style="margin-top: 6px; float: right;">Search Here</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by service name ...">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.our_store.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('admin.our_store.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
            </form>
            <br>

            @if($stores)
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Created At</th>
                        <th>Main Area</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                    <tr>
                        <td>{{ date('M d, Y', strtotime(explode(' ',$store->created_at)[0])) }}</td>
                        <td>
                            <a href="{{ route('admin.our_store.show', $store->id) }}">{{ $store->main_area ?? '' }}</a>
                        </td>
                        <td>{{ $store->address ?? '' }}</td>
                        <td>{{ $store->email ?? 0 }}</td>                        
                        <td>{{ $store->contact ?? 0 }}</td>                        
                        <td>@include('layouts.status', ['status' => $store->status])</td>
                        <td>
                            <form action="{{ route('admin.our_store.destroy', $store->id) }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ route('admin.our_store.edit', $store->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                    <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $stores->links() }}
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