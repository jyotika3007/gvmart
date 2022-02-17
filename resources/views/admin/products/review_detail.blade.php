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



   @if($reviews)
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>Created At</td>
                        <td>User Name</td>
                        <td>Email</td>
                        <td>Ratings</td>
                        <td>Reviews</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                   
                    @php $i=1 @endphp
                    @foreach ($reviews as $review)
                    
                   
                    
                    <tr>
                        <td>{{ date('M d, Y',strtotime(explode(' ',$review->created_at)[0])) }}</td>
                        <td>
                            {{ $review->name ?? '' }}
                        </td>
                        
                        <td>
                            {{ $review->email ?? '' }}
                        </td>
                        
                            <td>
                                {{ $review->product_rating ?? '0' }}
                            </td>
                            
                            <td>
                                {{ $review->product_review ?? '0' }}
                            </td>
                               
                                <td>
                                    
                                    <a href="{{ url('admin/product_review/update_status/'.$review->id) }}">@include('layouts.status', ['status' => $review->status])</a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    
            @endif</div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection