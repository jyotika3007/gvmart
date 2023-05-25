@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
    <div class="form-title">
            <h3>Daily Product Sales Report (Booked) @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>               
            <!-- <button type="submit" class="btn btn-warning" style="margin-top: 25px;">Export</button> -->
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-sm-9">    
                </div>
                <div class="col-sm-3">
                    <form action="{{ url('admin/export_products') }}" method="GET">
                        <input type="hidden" name="start_time" id="start_time" value="@if(!empty($start_time)){{$start_time}}@endif" class="form-control" hidden>
                        <input type="hidden" name="end_time" id="end_time" value="@if(!empty($end_time)){{$end_time}}@endif" class="form-control" hidden>
                    </form>
                </div>
            </div>       

            <br>

            <form action="" method="get">
                <div class="row"  >
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-4">
                                <label style="margin-top: 6px; float: right;">Time (From)</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="time" name="start_time" id="start_time" value="@if(!empty($start_time)){{$start_time}}@endif" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-4">
                                <label style="margin-top: 6px; float: right;">Time (To)</label>
                            </div>
                            <div class="col-sm-8">
                               <input type="time" name="end_time" id="end_time" value="@if(!empty($end_time)){{$end_time}}@endif" class="form-control">
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
                   <!-- <td>{{ $product->created_at }}</td> -->
                   <td>{{ date('M d, Y / H:s a',strtotime($product->created_at ?? '')) }}</td>

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