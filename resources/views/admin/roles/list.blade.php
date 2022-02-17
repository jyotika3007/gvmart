@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($roles)
            <div class="box">
                <div class="box-body">
                    

                       <h3>Employee Roles</h3>


                    <br>

                    <form action="" method="get">
                    <div class="row" style="border: 1px solid #ddd; width: 98%; margin: 1% 1%;padding: 15px; ">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by role ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.roles.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>


                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Display Name</th>
                                <!-- <th>Description</th> -->
                                <th>Employees</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i=1;
                            ?>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    {{ $role->display_name }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/employees_list/'.$role->name.'/'.$role->id) }}">View Employees</a>
                                </td>
                                <!-- <td>
                                    {!! $role->description !!}
                                </td> -->
                                <td>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @else
            <p class="alert alert-warning">No role created yet. <a href="{{ route('admin.roles.create') }}">Create one!</a></p>
        @endif
    </section>
    <!-- /.content -->
@endsection
