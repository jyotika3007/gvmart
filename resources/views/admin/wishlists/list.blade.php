

@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        
            <div class="box">
                <div class="box-body">
                    
                     <h3>Customers WishList @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{url('admin/wishlist/index')}}" method="get">
                    <div class="row"  >
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by  name, email ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ url('admin/wishlist/index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        
                    </div>
                </form>
                    <br>
        @if($wishlists)
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <!-- <th>Category Type</th> -->
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Mobile</th>
                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp 
                        @foreach ($wishlists as $list)
                        
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $list->name ?? '' }}</td>
                                <td>{{ $list->email ?? '' }}</td>
                                <td>{{ $list->mobile ?? '' }}</td>
                                
                                <td><a href="{{ url('admin/wishlist/'.$list->id.'/show') }}">View Products</a></td>
                                
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {{ $wishlists->links() }}
            @else
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif
    </section>
    <!-- /.content -->
@endsection
