@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">

            <div class="form-title">
            <h3>Users >> Users List @if(!empty($keyword)) - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif</h3>
        </div>

                <div class="box-body">

                    <form action="{{route('admin.customers.search_customers')}}" method="get">
                    <div class="row" >
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; ">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by customer's name, email ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-2">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.customers.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2" style="float: right">
                            <a id="export" href="{{ route('admin.customers.export') }}" class="btn btn-default">Export</a>
                            <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>

        @if($customers)
        
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <td>Created At</td>
                                <td>Name</td>
                                <td>Role</td>
                                <td>Email</td>
                                <td>Mobile</td>
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ date('M d, Y',strtotime(explode(' ',$customer['created_at'])[0])) }}</td>
                                <td>{{ $customer['name'] }}</td>
                                <td>{{ $customer['user_role'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{ $customer['mobile'] ?? ''}}</td>
                                <td>@include('layouts.status', ['status' => $customer['status']])</td>
                                <td>
                                    <form action="{{ route('admin.customers.destroy', $customer['id']) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            @if($customer['status']==1)
                                            <a href="#" onclick="updateStatus('disable',0,{{$customer['id']}})" class="btn btn-danger btn-sm">Disable</a>
                                            @else
                                            <a href="#" onclick="updateStatus('enable',1,{{$customer['id']}})" class="btn btn-success btn-sm">Enable</a>
                                            @endif
                                             <a href="{{ route('admin.customers.show', $customer['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.customers.edit', $customer['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
        @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

@section('js')
<script>

    function updateStatus(status,sts, uid){
        let res = confirm(`Do you want to ${status} this user ?`);

        if(res){
            window.location.href = `/admin/customer/updateStatus/${sts}/${uid}`;
        }
    }

    </script>

@endsection

