@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <h3>Pending Orders</h3>
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($orders)
            <div class="box">
                <div class="box-body">
                    <h2>Pending Orders</h2>
                    
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




    </section>
    <!-- /.content -->
@endsection