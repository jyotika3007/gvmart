

@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        
            <div class="box">
                <div class="box-body">
                    
                     <h3>Newsletter Subscribers @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{url('admin/newsletters/search_complaints')}}" method="get">
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
                            <a href="{{ url('admin/newsletters/index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        
                    </div>
                </form>
                    <br>
        @if($newsletters)
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <!-- <th>Category Type</th> -->
                                <th>Email</th>
                                <th>Status</th>
                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp 
                        @foreach ($newsletters as $news)
                        
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $news->email ?? '' }}</td>
                                
                                <td>@include('layouts.status', ['status' => $news->status])</td>
                                <td>
                                    @if($news->status == 1)
                                    <a href="{{ url('admin/newsleter/status/'.$news->id.'/0') }}" class="btn btn-danger">Deactive</a>
                                        @else
                                    <a href="{{ url('admin/newsleter/status/'.$news->id.'/1') }}" class="btn btn-success">Active</a>
                                    @endif
                                </td> 
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {{ $newsletters->links() }}
            @else
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif
    </section>
    <!-- /.content -->
@endsection
