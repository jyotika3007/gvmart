@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
    <div class="form-title">
        <h3>Inventory >> Inventory List @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>
        </div>
        <div class="box-body">
           

              
                    <form action="{{route('admin.inventories.search_inventory')}}" method="get">
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
                            <a href="{{ route('admin.inventories.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.inventories.create') }}"  class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>



   @if($inventories)
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>Created At</td>
                        <td>Vendor</td>
                        <td>Bill No</td>
                        <td>Billing Amount</td>
                        <td>Billing Date</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                   
                    @php $i=1 @endphp
                    @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ date('M d, Y',strtotime(explode(' ',$inventory->created_at)[0])) }}</td>
                        <td>{{ $inventory->name ?? '' }}</td>
                        <td>{{ $inventory->bill_no ?? '' }}</td>
                        <td>{{ $inventory->billing_amount ?? '' }}</td>
                        <td>{{ $inventory->billing_date ?? '' }}</td>
                            
                                <td>
                                    <form action="{{ route('admin.inventories.destroy', $inventory->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.inventories.show', $inventory->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                            <!--<a href="{{ route('admin.inventories.edit', $inventory->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>-->
                                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    {{ $inventories->links() }}
            @endif</div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection