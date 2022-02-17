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
                        <!-- Total Customers  -->
                        <div class="col-sm-3">
                            <a href="{{ route('admin.customers.index') }}">
                            <div class="row totalCustomers">
                                <div class="col-sm-3">
                                    <i class="fa fa-user" style="font-size: 45px; padding: 20px 10px"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h2>10</h2>
                                    <h4>Total Customers</h4>
                                </div>
                            </div>
                        </a>
                        </div>
                        <!-- Total Vendors -->
                        <div class="col-sm-3">
                            <a href="{{ route('admin.registered_shops.index') }}">
                            <div class="row totalVendors">
                                <div class="col-sm-3">
                                    <i class="fa fa-users" style="font-size: 45px; padding: 20px 10px"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h2>10</h2>
                                    <h4>Total Vendors</h4>
                                </div>
                            </div>
                        </a>
                        </div>
                        <!-- Total Products -->
                        <div class="col-sm-3">
                            <a href="{{ route('admin.products.index') }}">
                            <div class="row totalProducts">
                                <div class="col-sm-3">
                                    <i class="fa fa-paragraph" style="font-size: 45px; padding: 20px 10px"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h2>10</h2>
                                    <h4>Total Products</h4>
                                </div>
                            </div>
                        </a>
                        </div>  
                        <!-- Total Orders -->
                        <div class="col-sm-3">
                            <a href="{{ route('admin.orders.index') }}">
                            <div class="row totalOrders">
                                <div class="col-sm-3">
                                    <i class="fa fa-shopping-cart" style="font-size: 45px; padding: 20px 10px"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h2>10</h2>
                                    <h4>Total Orders</h4>
                                </div>
                            </div>
                        </a>
                        </div>
                        <!-- Completed Orders -->
                        <div class="col-sm-3">
                            <div class="row totalProducts">
                                <div class="col-sm-3">
                                    <i class="fa fa-check" style="font-size: 45px; padding: 20px 10px"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h2>10</h2>
                                    <h4>Completed Orders</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Processing Orders -->
                        <div class="col-sm-3">
                            <div class="row totalOrders">
                                <div class="col-sm-3">
                                    <i class="fa fa-repeat" style="font-size: 45px; padding: 20px 10px"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h2>10</h2>
                                    <h4>Orders In Processing</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Cancelled/Returned Orders -->
                        <div class="col-sm-3">
                            <div class="row totalCustomers">
                                <div class="col-sm-3">
                                    <i class="fa fa-times-circle-o" style="font-size: 45px; padding: 20px 10px"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h2>10</h2>
                                    <h4>Cancelled/Returned Orders</h4>
                                </div>
                            </div>
                        </div>

                    </div>

                    <br><br>
                    <!-- Recent Orders -->
                    <div class="container row" style="border-bottom: 1px solid #eee; margin-top: 35px;">

                        <div class="col-sm-10">
                            <h4>Rcent Orders</h4>
                        </div>
                        <div class="col-sm-2 pull-right" style="float: right;">
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">View All ...</a>
                        </div>

                        <div class="col-sm-12">



                            <table class="table">
                                <thead>
                                    <tr>
                                        <td class="col-md-3">Booking Date/Time</td>
                                        <td class="col-md-3">Customer</td>
                                        <!-- <td class="col-md-2">Courier</td> -->
                                        <td class="col-md-2">Total</td>
                                        <td class="col-md-2">Status</td>
                                        <td class="col-md-2" style="text-align: center;">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($orders))
                                    @foreach ($orders as $order)

                                    <?php
                                    $customer = DB::table('users')->where('id',$order->customer_id)->first();
                                    $status = DB::table('order_statuses')->where('id',$order->order_status_id)->first();
                                    ?>
                                    <tr>
                                        <td><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}">{{ $order->booking_date  ?? ''}}</a></td>
                                        <td>{{$customer->name ?? ''}}</td>
                                        <!-- <td>{{ $order->courier->name ?? '' }}</td> -->
                                        <td>
                                            <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order->total }}</span>
                                        </td>
                                        <td><p class="text-center" style="color: #ffffff; background-color: {{ $status->color }}">{{ $status->name }}</p></td>
                                        <td style="text-align: center;"><a title="Show order" href="{{ route('admin.orders.show', $order->id) }}" title="View Order Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><br>


                    <div class="container row" style="border-bottom: 1px solid #eee; margin-top: 35px;">

                        <!-- New Customers -->
                        <div class="col-sm-5">
                            <div class="row">
                               <div class="col-sm-8">
                                <h4>New Customers</h4>
                            </div>
                            <div class="col-sm-4 pull-right" style="float: right;">
                                <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">View All ...</a>
                            </div>
                            <div class="col-sm-12">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td class="col-md-2">ID</td>
                                            <td class="col-md-2">Name</td>
                                            <td class="col-md-2">Email</td>
                                            <td class="col-md-2">Status</td>
                                            <td class="col-md-4">Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($customers))
                                        @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer['id'] }}</td>
                                            <td>{{ $customer['name'] }}</td>
                                            <td>{{ $customer['email'] }}</td>
                                            <td>@include('layouts.status', ['status' => $customer['status']])</td>
                                            <td>
                                                <form action="{{ route('admin.customers.destroy', $customer['id']) }}" method="post" class="form-horizontal">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <div class="btn-group">
                                                        <!-- <a href="{{ route('admin.customers.show', $customer['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a> -->
                                                        <a href="{{ route('admin.customers.edit', $customer['id']) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                        <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>


<div class="col-sm-1"></div>
                    <!-- Latest Products -->
                    <div class="col-sm-5">
                        <div class="row">
                               <div class="col-sm-10">
                                <h4>Latest Products</h4>
                            </div>
                            <div class="col-sm-2 pull-right" style="float: right;">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">View All ...</a>
                            </div>
                            <div class="col-sm-12">

                        
                        @if(!$products->isEmpty())
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td style="width: 300px;">Name</td>
                                    <td>Cover</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Status</td>
                                    <td>Is Featured</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>

                                        <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a>

                                    </td>
                                    <td><img src="{{ asset('storage/'.$product->cover ?? '') }}" style="height: 50px; width: auto"></td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ config('cart.currency') }} {{ $product->price }}</td>
                                    <td>@include('layouts.status', ['status' => $product->status])</td>
                                    <td>@include('layouts.status', ['status' => $product->is_featured])</td>
                                    <td>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <div class="btn-group">
                                             <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                             <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                         </div>
                                     </form>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                     @endif
                 </div>
                            </div>
                        </div>
             </div>

             <div class="container row"  style="border-bottom: 1px solid #eee; margin-top: 35px;">


                <br><br>
                <!-- Latest Vendors -->
                <div class="col-sm-12">


                    <div class="row">
                               <div class="col-sm-10">
                                <h4>New Vendors</h4>
                            </div>
                            <div class="col-sm-2 pull-right" style="float: right;">
                                <a href="{{ route('admin.registered_shops.index') }}" class="btn btn-primary">View All ...</a>
                            </div>
                            <div class="col-sm-12">


                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-1">ID</td>
                                <td class="col-md-2">Shop Name</td>
                                <td class="col-md-2">Owner</td>
                                <td class="col-md-2">Contact No</td>
                                <td class="col-md-2">Email</td>
                                <td class="col-md-2">Address</td>
                                <td class="col-md-1">Status</td>
                                <!-- <td class="col-md-1"></td> -->
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($shops))
                            @foreach ($shops as $shop)
                            <?php $status=DB::table('users')->where('id',$shop->user_id)->first(); ?>
                            <tr>
                                <td>{{ $shop->id }}</td>
                                <td>{{ $shop->shop_name ?? ''}}</td>
                                <td>{{ $shop->owner_name ?? ''}}</td>
                                <td>{{ $shop->contact ?? ''}}</td>
                                <td>{{ $shop->email ?? ''}}</td>
                                <td>{{ $shop->address ?? ''}}, {{ $shop->city ?? ''}}, {{ $shop->state ?? ''}}, {{ $shop->country ?? ''}} - ({{ $shop->pincode ?? ''}})</td>
                                <td>@include('layouts.status', ['status' => $status->status ?? '0'])</td>
                                <!-- <td><a href="{{ route('admin.registered_shops.status-ban', $shop->id) }}" class="btn btn-danger">Ban</a></td> -->
                                <td>
                                    <form action="{{ route('admin.registered_shops.destroy', $shop->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <!-- <a href="{{ route('admin.registered_shops.show', $shop->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a> -->
                                            <a href="{{ route('admin.registered_shops.edit', $shop->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                        </div>
                                    </form>
                                </td>
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
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    <style type="text/css">
        .card
    </style>

</section>
<!-- /.content -->
@endsection
