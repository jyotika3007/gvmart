@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
           
<h3>Product Reviews  @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{url('admin/product_reviews/search_reviews')}}" method="get">
                    <div class="row" style="border: 1px solid #ddd; width: 98%; margin: 1% 1%;padding: 15px; ">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by shop name, owner ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ url('admin/product_reviews') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>



   @if($products)
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>Created At</td>
                        <td>Product Name</td>
                        <td>Total Reviews</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                   
                    @php $i=1 @endphp
                    @foreach ($products as $product)
                    
                    <?php
                    // echo $product->id; die;
                        $pro = DB::table('products')->where('id',$product->product_id)->select('name')->first();
                        $count_review = DB::table('product_reviews')->where('product_id',$product->product_id)->count();
                    ?>
                    
                    <tr>
                        <td>{{ date('M d, Y',strtotime(explode(' ',$product->created_at)[0])) }}</td>
                        <td>
                            {{ $pro->name ?? '' }}
                        </td>
                            <td>
                                {{ $count_review ?? '0' }}
                            </td>
                               
                                <td>
                                   <a href="{{ url('admin/product_reviews/'.$product->product_id) }}" class="btn btn-default">
                                       <i class="fa fa-eye"></i>
                                   </a>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    {{ $products->links() }}
            @endif</div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection