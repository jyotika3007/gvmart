@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-2">Shop Name</td>
                            <td class="col-md-2">Owner</td>
                            <td class="col-md-2">Contact No</td>
                            <td class="col-md-2">Email</td>
                            <td class="col-md-2">Address</td>
                            <td class="col-md-1">Status</td>
                        </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>{{ $registered_shop->id }}</td>
                            <td>{{ $registered_shop->shop_name ?? ''}}</td>
                            <td>{{ $registered_shop->owner_name ?? ''}}</td>
                            <td>{{ $registered_shop->contact ?? ''}}</td>
                            <td>{{ $registered_shop->email ?? ''}}</td>
                            <td>{{ $registered_shop->address ?? ''}}, {{ $registered_shop->city ?? ''}}, {{ $registered_shop->state ?? ''}}, {{ $registered_shop->country ?? ''}} - ({{ $registered_shop->pincode ?? ''}})</td>
                            <td>@include('layouts.status', ['status' => $registered_shop->status])</td>
                            
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.registered_shops.index') }}" class="btn btn-default btn-sm">Back</a>
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
