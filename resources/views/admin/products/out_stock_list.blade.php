@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($products)
            <div class="box">
                <div class="box-body">


<h3>@if(!empty($title)){{$title}}@endif Products @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{route('admin.products.search_products')}}" method="get">
                    <div class="row"  >
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by name ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.products.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        
                    </div>
                </form>
                    <br>


                    @if($products)
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <td>#</td>
            <td style="width: 300px;">Name</td>
            <td>Cover</td>
            <!--<td>Quantity</td>-->
            <td>Price</td>
            <td>Remaining Stock</td>
            <td>Status</td>
            
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <!--<td>{{ $product->id }}</td>-->
                <td></td>
                <td>
                    
                        <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a>
                    
                </td>
                <td>
                    @if(!empty($product->cover))
                    <img src="{{ asset('storage/'.$product->cover ?? '') }}" style="height: 50px; width: auto">
                @endif
            </td>
                <!--<td>{{ $product->quantity }}</td>-->
                <td>{{ config('cart.currency') }} {{ $product->price }}</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>@include('layouts.status', ['status' => $product->status])</td>
                
                <td>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                           <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
                    {{ $products->links() }}
        @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
