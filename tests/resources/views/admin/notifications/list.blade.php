@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <h3>Notifications</h3>
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($orders)
            <div class="box">
                <div class="box-body">
                    <h2>New Orders</h2>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-3">Booking Date/Time</td>
                                <td class="col-md-3">Customer</td>
                                <td class="col-md-2">Total</td>
                                <td class="col-md-2" style="text-align: center;">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                        
                        <?php
                            $customer = DB::table('users')->where('id',$order->customer_id)->first();
                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                        ?>
                            <tr>
                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">{{ $order->booking_date  ?? ''}}</a></td>
                                <td>{{$customer->name ?? ''}}</td>
                                
                                <td>
                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order->total }}</span>
                                </td>
                                
                                <td style="text-align: center;"><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}" title="View Order Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                
            </div>
            <!-- /.box -->
        @endif


@if($shops)
        <div class="box">
            <div class="box-body">
                <h2>Shops</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-2">Shop Name</td>
                            <td class="col-md-2">Owner</td>
                            <td class="col-md-2">Contact No</td>
                            <td class="col-md-2">Email</td>
                            <td class="col-md-2">Address</td>
                            <td class="col-md-4">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($shops as $shop)
                    <?php $status=DB::table('users')->where('id',$shop->user_id)->first(); ?>
                        <tr>
                            <td>{{ $shop->id }}</td>
                            <td>{{ $shop->shop_name ?? ''}}</td>
                            <td>{{ $shop->owner_name ?? ''}}</td>
                            <td>{{ $shop->contact ?? ''}}</td>
                            <td>{{ $shop->email ?? ''}}</td>
                            <td>{{ $shop->address ?? ''}}, {{ $shop->city ?? ''}}, {{ $shop->state ?? ''}}, {{ $shop->country ?? ''}} - ({{ $shop->pincode ?? ''}})</td>
                            
                            <td>
                                <form action="{{ route('admin.registered_shops.destroy', $shop->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        
                                        <a href="{{ route('admin.registered_shops.edit', $shop->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Go</a>
                                        
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
           
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        @endif


    </section>
    <!-- /.content -->
@endsection