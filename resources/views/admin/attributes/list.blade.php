@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
        
    <div class="form-title">
            <h3>Attributes >> Attributes List</h3>
        </div>

        <div class="box-body">
            
        <form action="{{route('admin.brands.search_brands')}}" method="get">
                    <div class="row"  >
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by brand name ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.brands.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.attributes.create') }}"  class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </form>
                    <br>

            <table class="table">
                <thead>
                    <tr>
                        <td>Attribute name</td>
                        <td></td>
                    </tr>
                </thead>
                @if(count($attributes) > 0)
                <tbody>
                    
                @foreach ($attributes as $attribute)
                    <tr>
                        <td>
                            <a href="{{ route('admin.attributes.show', $attribute->id) }}">{{ $attribute->name }}</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ url('admin/attribute-values/add/'.$attribute->id) }}" class="btn btn-success btn-sm textWhite"><i class="fa fa-plus textWhite"></i> &nbsp;Add Value</a>
                                </div>
                                </form>
                        </td>
                    </tr>
                @endforeach
                
            @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">{{ $attributes->links() }}</div>
                </div>
            </div>
            
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection