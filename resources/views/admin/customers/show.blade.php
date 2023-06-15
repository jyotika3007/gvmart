@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="form-title">
            <h3>Customers >> Customer Detail</h3>
        </div>

        <div class="box-body">

            <table class="table">
                <tbody>
                    <tr>
                        <td class="col-md-2">ID</td>
                        <td class="col-md-2">Name</td>
                        <td class="col-md-2">Email</td>
                        <td class="col-md-2">Mobile</td>
                        <td class="col-md-2">Status</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->mobile }}</td>
                        <td>@if($customer->status==1) Active @else Inactive @endif</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="box-body">
            <div class="form-title">
                <h3>Saved Addresses</h3>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="col-md-2">Alias</td>
                        <td class="col-md-2">Address 1</td>
                        <td class="col-md-2">Address 2</td>
                        <td class="col-md-2">State</td>
                        <td class="col-md-2">City</td>
                        <td class="col-md-2">Pin Code</td>
                        <td class="col-md-2">Landmark</td>
                        <td class="col-md-2">Status</td>
                        <!-- <td class="col-md-4">Actions</td> -->
                    </tr>
                </tbody>
                <tbody>
                    @foreach($addresses as $add)
                    <tr>
                        <td>{{ $add->alias ?? '' }}</td>
                        <td>{{ $add->address_1 ?? '' }}</td>
                        <td>{{ $add->address_2 ?? '' }}</td>
                        <td>{{ $add->state_name ?? '' }}</td>
                        <td>{{ $add->city_name ?? '' }}</td>
                        <td>{{ $add->zip ?? '' }}</td>
                        <td>{{ $add->landmark ?? '' }}</td>
                        <td>
                            @if($add->status == 1)
                            Active
                            @else
                            Inactive
                            @endif
                        </td>
                    </tr>
                    @endforeach
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