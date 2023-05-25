@extends('layouts.admin.app')

@section('content')
<style type="text/css">
    .totalCustomers {
        width: 96%;
        margin: 2%;
        background-color: #8892d6;
        border-color: #8892d6;
        border-radius: 5px;
        color: #fff;
        min-height: 120px;
    }

    .totalVendors {
        width: 96%;
        margin: 2%;
        background-color: #fc544b;
        border-color: #fc544b;
        border-radius: 5px;
        color: #fff;
        min-height: 120px;
    }

    .totalProducts {
        width: 96%;
        margin: 2%;
        background-color: #45bbe0;
        border-color: #45bbe0;
        border-radius: 5px;
        color: #fff;
        min-height: 120px;
    }

    .totalOrders {
        width: 96%;
        margin: 2%;
        background-color: #78c350;
        border-color: #78c350;
        border-radius: 5px;
        color: #fff;
        min-height: 120px;
    }

    .col-sm-12 {
        overflow: auto;
    }

    h4 {
        font-weight: bold;
    }

    .dashboard__inner {
        /* margin: 5px; */
        border: 1px solid lightgray;
        border-radius: 8px;
        /* padding: 3%; */
        background-color: #fff;
        margin-top: 30px;

    }
</style>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="row">
        <div class="box-header with-border">
            <div class="cols-m-12">
            <h3 class="box-title" style="margin-left: 25px">
                <i class="fa fa-sign-out"></i> Visit site
            </h3>
            </div>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <div class="row">


                <div class="col-sm-4">
                    <div class="row cardDiv mg-10 adminDashboardCard">
                        <div class="col-sm-1"><i class="fa fa-money"></i></div>
                        <div class="col-sm-12">
                            <h4>Rs. 0</h4>
                            <h5>TOTAL SALES (LAST 30 DAYS)</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="row cardDiv mg-10 adminDashboardCard">
                        <div class="col-sm-1"><i class="fa fa-shopping-cart"></i></div>
                        <div class="col-sm-12">
                            <h4>0</h4>
                            <h5>TOTAL ORDERS (LAST 30 DAYS)</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="row cardDiv mg-10 adminDashboardCard">
                        <div class="col-sm-1"><i class="fa fa-refresh"></i></div>
                        <div class="col-sm-12">
                            <h4>0</h4>
                            <h5>REFUND REQUESTS</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="row cardDiv mg-10 adminDashboardCard">
                        <div class="col-sm-1"><i class="fa fa-cube"></i></div>
                        <div class="col-sm-12">
                            <h4>0</h4>
                            <h5>PRODUCTS (LAST 30 DAYS)</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="row cardDiv mg-10 adminDashboardCard">
                        <div class="col-sm-1"><i class="fa fa-users"></i></div>
                        <div class="col-sm-12">
                            <h4>0</h4>
                            <h5>USERS (LAST 30 DAYS)</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">

                    <div class="row dashboard__inner">

                        <div class="row">
                            <div class="form-title">
                                <h3>TOTAL AMOUNT OF SALE THIS MONTH ({{ date('M') }})</h3>
                            </div>
                        </div>
                        <br />


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
                            <br/>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <!-- Recent Orders -->
                    <div class="row dashboard__inner">

                        <div class="row">
                            <div class="form-title">
                                <h3>TOP 5 PROCESSING ORDERS</h3>
                            </div>
                        </div>
                        <br />

                        <!-- <div class="col-sm-4">
                            <a href="{{ url('admin/order_list/processing_orders') }}" class="btn btn-default">View All ...</a>
                        </div> -->

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
                                    $status = DB::table('order_statuses')->where('id', $order->order_status_id)->first();
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
                            <br/>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6">

                    <div class="row dashboard__inner">

                    <div class="row">
                            <div class="form-title">
                                <h3>TOP 5 SHIPPED ORDERS</h3>
                            </div>
                        </div>
                        <br />

                        <!-- <div class="col-sm-4">
                            <a href="{{ url('admin/order_list/shipped_orders') }}" class="btn btn-default">View All ...</a>
                        </div> -->

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
                                    $status = DB::table('order_statuses')->where('id', $order->order_status_id)->first();
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
                            <br/>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6">

                    <div class="row dashboard__inner">

                    <div class="row">
                            <div class="form-title">
                                <h3>TOP 5 DELIVERED ORDERS</h3>
                            </div>
                        </div>
                        <br />

                        <!-- <div class="col-sm-4">
                            <a href="{{ url('admin/order_list/delivered_orders') }}" class="btn btn-default">View All ...</a>
                        </div> -->

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
                                    $status = DB::table('order_statuses')->where('id', $order->order_status_id)->first();
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
                            <br/>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">

                    <div class="row dashboard__inner">

                    <div class="row">
                            <div class="form-title">
                                <h3>TOP 5 CANCELLED ORDERS</h3>
                            </div>
                        </div>
                        <br />

                        <!-- <div class="col-sm-4">
                            <a href="{{ url('admin/order_list/cancelled_orders') }}" class="btn btn-default">View All ...</a>
                        </div> -->

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
                                    $status = DB::table('order_statuses')->where('id', $order->order_status_id)->first();
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
                            <br/>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">

                    <div class="row dashboard__inner">

                    <div class="row">
                            <div class="form-title">
                                <h3>TOP 5 RETURNED ORDERS</h3>
                            </div>
                            <br />
                        </div>

                        <!-- <div class="col-sm-4">
                            <a href="{{ url('admin/order_list/returned_orders') }}" class="btn btn-default">View All ...</a>
                        </div> -->

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
                                    $status = DB::table('order_statuses')->where('id', $order->order_status_id)->first();
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
                            <br/>
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