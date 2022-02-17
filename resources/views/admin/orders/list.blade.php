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
                <div class="box-body">
                    <h3>{{ $order_type }}</h3>




                    <br>

                    <form action="" method="get">
                    <div class="row" style="border: 1px solid #ddd; width: 98%; margin: 1% 1%;padding: 15px; ">
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
                        @foreach ($orders as $order)
                        
                        <?php
                            $customer = DB::table('users')->where('id',$order->customer_id)->first();
                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                        ?>
                            <tr>
                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</a></td>
                                <td>{{ explode('/',$order->booking_date  ?? '')[0]}}</td>
                                <td>{{$customer->name ?? ''}}</td>
                                <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                <td>
                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order->total }}</span>
                                </td>
                                <td>{{ $order->delivery_date ?? '' }}</td>
                                <td><p class="text-center" style="color: #ffffff; background-color: {{ $status->color }}">{{ $status->name }}</p></td>
                                <td><p class="text-center" >{{ strtoupper($order->payment) }}</p></td>
                                @if($order->payment == 'cod' && $order->order_status_id == 5)
                                <td><p class="text-center Success">Success</p></td>
                                @else
                                @if($order->payment == 'cod')
                                <td><p class="text-center Pending">Pending</p></td>
                                @else
                                @if($order->payment_status == 'Success')
                                <td><p class="text-center Success">Success</p></td>
                                @else
                                <td>
                                    <!--<p class="text-center {{ $order->payment_status }}">{{ $order->payment_status }}</p>-->
                                    <form action="{{ url('admin/orders/update_payment_status') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                                    <select name="payment_status" id="payment_status" style="margin-bottom: 10px">
                                        <option value="Pending">Pending</option>
                                        <option value="Success">Success</option>
                                        <!--<option value="Cancel">Cancel</option>-->
                                    </select>
                                    
                                    <button type="submit" name="submit" class="btn btn-danger">Change</button>
                                    </form>
                                </td>
                                @endif
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