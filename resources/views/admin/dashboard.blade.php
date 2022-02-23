@extends('layouts.admin.app')

@section('content')
<style type="text/css">


    .totalCustomers{
        width: 96%; 
        margin: 2%;
        background-color: #8892d6;
        border-color: #8892d6;
        border-radius: 5px;
        color: #fff;
        min-height: 120px;
    }

    .totalVendors{
        width: 96%; 
        margin: 2%;
        background-color: #fc544b;
        border-color: #fc544b;
        border-radius: 5px;
        color: #fff;
        min-height: 120px;
    }

    .totalProducts{
        width: 96%; 
        margin: 2%;
        background-color: #45bbe0;
        border-color: #45bbe0;
        border-radius: 5px;
        color: #fff;
        min-height: 120px;
    }

    .totalOrders{
        width: 96%; 
        margin: 2%;
        background-color: #78c350;
        border-color: #78c350;
        border-radius: 5px;
        color: #fff;
        min-height: 120px;
    }
    .col-sm-12{
        overflow: auto;
    }

    h4{
        font-weight: bold;
    }

    .dashboard__inner{
        margin: 5px;
        border: 1px solid lightgray;
        border-radius: 3px;
        padding: 3%;
    }
</style>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div class="row">

                        <div class="col-sm-6">

                            <div class="row dashboard__inner">

                                <div class="col-sm-12">
                                    <h4>TOTAL AMOUNT OF SALE THIS MONTH ({{ date('M') }})</h4>
                                </div>


                                <div class="col-sm-12">

                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Order Amount</th>
                                                <th>GST Amount</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Rs. {{ $monthly_sale }}</td>
                                                <td>Rs. {{ $monthly_gst }}</td>
                                                <td><a href="{{ url('admin/report/monthly_product_sale') }}">View</a></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>






                        <div class="col-sm-6">
                            <!-- Recent Orders -->
                            <div class="row dashboard__inner">

                                <div class="col-sm-8">
                                    <h4>TOP 5 PROCESSING ORDERS</h4>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('admin/order_list/processing_orders') }}" class="btn btn-default">View All ...</a>
                                </div>

                                <div class="col-sm-12">



                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <td>Order Number</td>
                                                <td>Order Date</td>
                                                <!-- <td>Courier</td> -->
                                                <td>Total Amount</td>
                                                <!-- <td>Order Status</td> -->
                                                <td style="text-align: center;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($processing_orders))
                                            @foreach ($processing_orders as $order)

                                            <?php
                                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                                            ?>
                                            <tr>
                                                
                                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</a></td>
                                                <td>{{$order->created_at ?? ''}}</td>
                                                <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                                <td>
                                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order->total }}</span>
                                                </td>

                                                <td style="text-align: center;"><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}" title="View Order Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-6">

                            <div class="row dashboard__inner">

                                <div class="col-sm-8">
                                    <h4>TOP 5 SHIPPED ORDERS</h4>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('admin/order_list/shipped_orders') }}" class="btn btn-default">View All ...</a>
                                </div>

                                <div class="col-sm-12">



                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <td>Order Number</td>
                                                <td>Order Date</td>
                                                <!-- <td>Courier</td> -->
                                                <td>Total Amount</td>
                                                <!-- <td>Order Status</td> -->
                                                <td style="text-align: center;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($shipped_orders))
                                            @foreach ($shipped_orders as $order)

                                            <?php
                                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                                            ?>
                                            <tr>
                                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</a></td>
                                                <td>{{$order->created_at ?? ''}}</td>
                                                <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                                <td>
                                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order->total }}</span>
                                                </td>
                                                <!-- <td><p class="text-center" style="color: #ffffff; background-color: {{ $status->color }}">{{ $status->name }}</p></td> -->
                                                <td style="text-align: center;"><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}" title="View Order Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>




                        <div class="col-sm-6">

                            <div class="row dashboard__inner" >

                                <div class="col-sm-8">
                                    <h4>TOP 5 DELIVERED ORDERS</h4>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('admin/order_list/delivered_orders') }}" class="btn btn-default">View All ...</a>
                                </div>

                                <div class="col-sm-12">



                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <td>Order Number</td>
                                                <td>Order Date</td>
                                                <!-- <td>Courier</td> -->
                                                <td>Total Amount</td>
                                                <!-- <td>Order Status</td> -->
                                                <td style="text-align: center;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($delivered_orders))
                                            @foreach ($delivered_orders as $order)

                                            <?php
                                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                                            ?>
                                            <tr>
                                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</a></td>
                                                <td>{{$order->created_at ?? ''}}</td>
                                                <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                                <td>
                                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order->total }}</span>
                                                </td>
                                                <!-- <td><p class="text-center" style="color: #ffffff; background-color: {{ $status->color }}">{{ $status->name }}</p></td> -->
                                                <td style="text-align: center;"><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}" title="View Order Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <div class="row dashboard__inner" >

                                <div class="col-sm-8">
                                    <h4>TOP 5 CANCELLED ORDERS</h4>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('admin/order_list/cancelled_orders') }}" class="btn btn-default">View All ...</a>
                                </div>

                                <div class="col-sm-12">



                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <td>Order Number</td>
                                                <td>Order Date</td>
                                                <!-- <td>Courier</td> -->
                                                <td>Total Amount</td>
                                                <!-- <td>Order Status</td> -->
                                                <td style="text-align: center;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($cancelled_orders))
                                            @foreach ($cancelled_orders as $order)

                                            <?php
                                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                                            ?>
                                            <tr>
                                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</a></td>
                                                <td>{{$order->created_at ?? ''}}</td>
                                                <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                                <td>
                                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order->total }}</span>
                                                </td>
                                                <!-- <td><p class="text-center" style="color: #ffffff; background-color: {{ $status->color }}">{{ $status->name }}</p></td> -->
                                                <td style="text-align: center;"><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}" title="View Order Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

 <div class="col-sm-6">

                            <div class="row dashboard__inner" >

                                <div class="col-sm-8">
                                    <h4>TOP 5 RETURNED ORDERS</h4>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('admin/order_list/returned_orders') }}" class="btn btn-default">View All ...</a>
                                </div>

                                <div class="col-sm-12">



                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <td>Order Number</td>
                                                <td>Order Date</td>
                                                <!-- <td>Courier</td> -->
                                                <td>Total Amount</td>
                                                <!-- <td>Order Status</td> -->
                                                <td style="text-align: center;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($returned_orders))
                                            @foreach ($returned_orders as $order)

                                            <?php
                                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                                            ?>
                                            <tr>
                                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</a></td>
                                                <td>{{$order->created_at ?? ''}}</td>
                                                <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                                <td>
                                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order->total }}</span>
                                                </td>
                                                <!-- <td><p class="text-center" style="color: #ffffff; background-color: {{ $status->color }}">{{ $status->name }}</p></td> -->
                                                <td style="text-align: center;"><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}" title="View Order Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>





                </div>
                <!-- /.box-body -->
                
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

            <style type="text/css">
                .card
            </style>

        </section>
        <!-- /.content -->
        @endsection
