@extends('layouts.admin.app')

@section('content')

<!-- Main content -->
<section class="content">
    <style>
        .Pending{
            background-color: orange;
        color: #fff;
    }
    .Success{
        background-color: green;
        color: #fff;
    }
    </style>
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
        
        <div class="form-title">
            <h3>{{ $order_type ?? '' }}</h3>
        </div>
        
        <div class="box-body">
            <br>
            
            <form action="" method="get">
                <div class="row"  >
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-4">
                                <label style="margin-top: 6px; float: right;">Date (From)</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" name="from_date" id="from_date" value="@if(!empty($from_date)){{$from_date}}@endif" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-4">
                                <label style="margin-top: 6px; float: right;">Date (To)</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" name="to_date" id="to_date" value="@if(!empty($to_date)){{$to_date}}@endif" class="form-control">
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.orders.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                    </div>
                    <div class="col-sm-2">
                        <select name="order_type" id="order_type" class="form-control">
                            <option selected value="all_orders">All Orders</option>
                            <option  value="processing_orders">Processing Orders</option>
                            <option  value="shipped_orders">Shipped Orders</option>
                            <option  value="delivered_orders">Delivered Orders</option>
                            <option  value="cancelled_orders">Cancelled Orders</option>
                            <option  value="returned_orders">Returned Orders</option>
                        </select>
                    </div>
                </div>
            </form>
            <br>
            
            
            
            
            
            
            @if($orders)
            <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th class="col-md-3">Order Id</th>
                                <th class="col-md-3">Booking Date</th>
                                <th class="col-md-3">Customer</th>
                                <!-- <th class="col-md-2">Courier</th> -->
                                <th class="col-md-2">Total</th>
                                <th class="col-md-2">Customer's Delivery Date</th>
                                <th class="col-md-2">Order Status</th>
                                <th class="col-md-2">Payment Method</th>
                                <th class="col-md-2">Payment Status</th>
                                <th class="col-md-2" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            
                            <?php
                            $customer = DB::table('users')->where('id',$order->customer_id)->first();
                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                            $partial_product_price=DB::table('order_product')->where('order_id',$order->id)->where('is_partial_cancel',1)->get(['product_price']);
                            $total_price=0;

                            foreach($partial_product_price as $partial_product){
                                $total_price+=$partial_product->product_price;
                            };
                            ?>
                            <tr>
                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</a></td>
                                <td>{{ explode('/',$order->booking_date  ?? '')[0]}}</td>
                                <td>{{$customer->name ?? ''}}</td>
                                <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                <td>
                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $total_price ? $total_price:$order->total}}</span>
                                </td>
                                <td>{{ $order->delivery_date ?? '' }}</td>
                                <td><p class="text-center" style="color: #ffffff; background-color: {{ $status->color }}">{{ $order->request_type }}</p></td>
                                <td><p class="text-center" >{{ strtoupper($order->payment) }}</p></td>
                                @if($order->order_status_id == 7)
                                <td><p class="text-center Success">Approved (Refunded)</p></td>
                                @else
                                @if($order->order_status_id == 8)
                                <td><p class="text-center">Rejected</p></td>
                                @else
                                <td>
                                    <!--<p class="text-center {{ $order->payment_status }}">{{ $order->payment_status }}</p>-->
                                    <form action="{{ url('admin/orders/status-update',$order->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                                        <select name="order_status" id="order_status" style="margin-bottom: 10px">
                                        @if($order->payment=='online')
                                            <option value="7">Approve</option>
                                            <option value="8">Reject</option>
                                        @else
                                        @if($order->payment=='store')
                                            <option value="10">Approve</option>
                                            <option value="11">Reject</option>
                                        @endif
                                        @endif
                                            <!--<option value="Cancel">Cancel</option>-->
                                        </select>
                                        
                                        <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                                    </form>
                                </td>
                                @endif
                                @endif
                                <td style="text-align: center;"><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}" title="View Order Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                    @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    </div>
                </div>
                <!-- /.box -->
                            </section>
            <!-- /.content -->
            @endsection