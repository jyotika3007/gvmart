@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <style type="text/css">
        .container{
            margin-top: 30px;
        }

        .col-sm-4{
            font-size: 18px;
        }
    </style>
       
                 <div class="box">
                <div class="box-body">
                    <h3>Inventory Details</h3>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4"><b> BILL NO : </b> {{ $inventory->bill_no }} </div>
                            <div class="col-sm-4"><b> BILLING AMOUNT  : </b> {{ $inventory->billing_amount ?? '' }} </div>
                            <div class="col-sm-4"><b> BILLING DATE : </b> {{ $inventory->billing_date ?? ''}} </div>
                            
                        </div>
                    </div>
                    <br><br>



                </div>
                @if($inventory_products)
                <hr>
                    <div class="box-body">
                        <h3> Products</h3>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th class="col-md-3">#</th>
                                <th class="col-md-3">PRODUCT NAME</th>
                                <th class="col-md-3">SKU</th>
                                <th class="col-md-3">QUANTITY</th>
                                <th class="col-md-3">TOTAL AMOUNT</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($inventory_products as $product)
                                    <tr>
                                        
                                        <td> <img src="{{ asset('storage/'.$product->cover) }}" style="height: 75px; width: auto"> </td>
                                        <td>{{ $product->product_name ?? '' }}</td>
                                        <td>{{ $product->product_sku ?? '' }}</td>
                                        <td>{{ $product->product_quantity ?? '' }}</td>
                                        <td>{{ $product->product_price ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
               
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.inventories.index') }}" class="btn btn-default btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        

    </section>
    <!-- /.content -->
@endsection
