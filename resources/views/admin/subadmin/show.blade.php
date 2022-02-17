@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <h2>Sub Admin</h2>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="col-md-4">ID</td>
                        <td class="col-md-4">Name</td>
                        <td class="col-md-4">Email</td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>{{ $subadmin->id }}</td>
                        <td>{{ $subadmin->name }}</td>
                        <td>{{ $subadmin->email }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-body">
                <h2>Addresses</h2>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="col-md-2">Alias</td>
                        <td class="col-md-2">Address 1</td>
                        <td class="col-md-2">Country</td>
                        <td class="col-md-2">Status</td>
                        <td class="col-md-4">Actions</td>
                    </tr>
                    </tbody>
                    <tbody>
                        @if(!empty($addresses))
                    @foreach ($addresses as $address)
                        <tr>
                            <td>{{ $address->alias }}</td>
                            <td>{{ $address->address_1 }}</td>
                            <td>{{ $address->country->name }}</td>
                            <td>@include('layouts.status', ['status' => $address->status])</td>
                            <td>
                                <form action="{{ route('admin.addresses.destroy', $address->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.customers.addresses.show', [$subadmin->id, $address->id]) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('admin.customers.addresses.edit', [$subadmin->id, $address->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-default btn-sm">Back</a>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
