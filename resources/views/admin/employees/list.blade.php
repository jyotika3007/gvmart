@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        @include('layouts.errors-and-messages')
        <!-- Default box -->
        @if($employees)
        <div class="box">

        <div class="form-title">
            <h3>Employees >> Employees List</h3>
        </div>

            <div class="box-body">
                

                    <form action="" method="get">
                    <div class="row"  >
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by employee name, email ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.employees.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.employees.create') }}"  class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>



                <table class="table">
                    <thead>
                        <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-3">Name</td>
                            <td class="col-md-3">Email</td>
                            <td class="col-md-3">Mobile</td>
                            <td class="col-md-3">Role</td>
                            <td class="col-md-1">Status</td>
                            <td class="col-md-4">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ ucfirst($employee->name ?? '') }}</td>
                            <td>{{ $employee->email ?? '' }}</td>
                            <td>{{ $employee->mobile ?? '' }}</td>
                            <td>{{ ucfirst($employee->role ?? '') }}</td>
                            <td>@include('layouts.status', ['status' => $employee->status])</td>
                            <td>
                                <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <!-- <a href="{{ route('admin.employees.show', $employee->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a> -->
                                        <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                        <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
