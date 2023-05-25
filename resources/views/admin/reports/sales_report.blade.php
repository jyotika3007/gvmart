@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
            <div class="form-title">
            <h3>Sales Report @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>
        </div>
                <div class="box-body">
                   


                    <br>

                   <!-- <form action="" method="get">
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
                            <a href="" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>

                        <div class="col-sm-2">
                            <a href="{{ url('admin/report/monthly_product_sale') }}" class="btn btn-default">Monthly Sales Report</a>
                        </div>
                    </div>
                </form>
                    <br> -->




        @if($products_sales)
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Sales (Month/Year)</th>
                                <th>Order Status</th>
                                <th>Android Orders</th>
                                <th>Desktop Orders</th>
                                <th>IOS Orders</th>
                                <th>Total Orders</th>
                                <th>Amount From Android</th>
                                <th>Amount From Desktop</th>
                                <th>Amount From IOS</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products_sales as $product)
                            <tr>
                                 <td>{{ $product->date ?? '' }}</td>
                                 <td>{{ $product->order_status ?? '' }}</td>
                                 <td>{{ $product->android_orders ?? '' }}</td>
                                 <td>{{ $product->desktop_orders ?? '' }}</td>
                                 <td>{{ $product->ios_orders ?? '' }}</td>
                                 <td>{{ $product->total_orders ?? '' }}</td>
                                 <td>{{ $product->order_from_android ?? '' }}</td>
                                 <td>{{ $product->order_from_desktop ?? '' }}</td>
                                 <td>{{ $product->order_from_ios ?? '' }}</td>
                                 <td>{{ $product->total_amount ?? '' }}</td>
                            
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