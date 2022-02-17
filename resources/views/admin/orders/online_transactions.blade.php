@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h3>Online Transactions</h3>
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
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.online_transactions') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                    </div>
                </form>
                    <br>
        @if($orders)
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Order Number</th>
                                <th>Payumoney Status</th>
                                <th>Payment Mode</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                        
                        <?php
                            $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                        ?>
                            <tr>
                                <td>{{ $order->transaction_id ?? '' }}</td>
                                <td>{{ $order->id ?? '' }}</td>
                                <td>{{ $order->payumoney_status ?? '' }}</td>
                                <td>{{ $order->payment_mode ?? '' }}</td>
                                <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                
                                <td><p class="text-center" style="color: #ffffff; background-color: {{ $status->color }}">{{ $status->name }}</p></td>
                                <td>
                                    <span >Rs. {{ $order->total }}</span>
                                </td>
                                <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">{{ explode('/',$order->booking_date  ?? '')[0]}}</a></td>
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