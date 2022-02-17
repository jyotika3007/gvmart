@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                   

<h3>Daily Product Sales Report (Delivered) @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

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
                            <a href="" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>

                        <div class="col-sm-2">
                            <a href="{{ url('admin/report/monthly_product_sale') }}" class="btn btn-default">Monthly Sales Report</a>
                        </div>
                    </div>
                </form>
                    <br>




        @if($products_sales)
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product SKU Code</th>
                                <th>Product Price(MRP)</th>
                                <th>Product Quantity</th>
                                <th>Producty Total Amount</th>
                                <th>Date Purchase</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products_sales as $product)
                            <tr>
                                 <td>{{ $product->product_name ?? '' }}</td>
                                 <td>{{ $product->product_sku ?? '' }}</td>
                                 <td>{{ $product->product_price ?? '' }}</td>
                                 <td>{{ $product->quantity ?? '' }}</td>
                                 <td>{{ $product->quantity * $product->product_price }}</td>
                                 <td>{{ $product->booking_date ?? '' }}</td>
                            
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products_sales->links() }}
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