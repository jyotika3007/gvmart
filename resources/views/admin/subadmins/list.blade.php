@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
          

                    

<h3>Sub Admins Shops @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{route('admin.subadmins.search_subadmins')}}" method="get">
                    <div class="row" style="border: 1px solid #ddd; width: 98%; margin: 1% 1%;padding: 15px; ">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by subadmin's name, email ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.subadmins.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.subadmins.create') }}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>


        @if($subadmins)
        
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($subadmins as $customer)
                            <tr>
                                <td>{{ $customer['id'] }}</td>
                                <td>{{ $customer['name'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>@include('layouts.status', ['status' => $customer['status']])</td>
                                <td>
                                    <form action="{{ route('admin.subadmins.destroy', $customer['id']) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.subadmins.show', $customer['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                            <a href="{{ route('admin.subadmins.edit', $customer['id']) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $subadmins->links() }}
        @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection