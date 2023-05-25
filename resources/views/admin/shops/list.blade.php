@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        @include('layouts.errors-and-messages')
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                



<h3>Registered Shops @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{route('admin.shops.search_shops')}}" method="get">
                    <div class="row"  >
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
                            <a href="{{ route('admin.registered_shops.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.registered_shops.create') }}"  class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>






        @if($registered_shops)
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Created At</th>
                            <th>Shop Name</th>
                            <th>Owner</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($registered_shops as $shop)
                    <?php $status=DB::table('users')->where('id',$shop->user_id)->first(); ?>
                        <tr>
                            <td>{{ date('M d, Y', strtotime(explode(' ',$shop->created_at)[0])) }}</td>
                            <td>{{ $shop->shop_name ?? ''}}</td>
                            <td>{{ $shop->owner_name ?? ''}}</td>
                            <td>{{ $shop->contact ?? ''}}</td>
                            <td>{{ $shop->email ?? ''}}</td>
                            <td>{{ $shop->address ?? ''}}, {{ $shop->city ?? ''}}, {{ $shop->state ?? ''}}, {{ $shop->country ?? ''}} - ({{ $shop->pincode ?? ''}})</td>
                            <td>@include('layouts.status', ['status' => $status->status ?? '0'])</td>
                            <td><a href="{{ route('admin.registered_shops.status-ban', $shop->id) }}" class="btn btn-danger">Ban</a></td>
                            <td>
                                <form action="{{ route('admin.registered_shops.destroy', $shop->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.registered_shops.show', $shop->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('admin.registered_shops.edit', $shop->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                        <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $registered_shops->links() }}
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