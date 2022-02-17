

@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        
            <div class="box">
                <div class="box-body">
                    
                     <h3>Customers Feedbacks @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{route('admin.complaints.search_complaints')}}" method="get">
                    <div class="row" style="border: 1px solid #ddd; width: 98%; margin: 1% 1%;padding: 15px; ">
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
                            <a href="{{ route('admin.complaints.index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>
                        
                    </div>
                </form>
                    <br>
        @if($complaints)
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <!-- <th>Category Type</th> -->
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Subject</th>
                                <th>Complaint</th>
                                <th>Status</th>
                                <th>Replied</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($complaints as $complaint)
                        <?php
                        $replied = 0;
                        if(!empty($complaint->admin_reply))
                            $replied = 1;
                        ?>
                            <tr>
                                <td>{{ $complaint->id ?? '' }}</td>
                                <td>{{ $complaint->user_name ?? '' }}</td>
                                <td>{{ $complaint->user_email ?? '' }}</td>
                                <td>{{ $complaint->user_mobile ?? '' }}</td>
                                <td>{{ $complaint->subject ?? '' }}</td>
                                <td>{{ $complaint->complaint ?? '' }}</td>
                                <td>@include('layouts.complaint-status', ['status' => $complaint->status])</td>
                                <td>@include('layouts.status', ['status' => $replied])</td>
                                
                                
                                <td>
                                    <form action="{{ route('admin.complaints.destroy', $complaint->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="btn-group">
                                            <a href="{{ route('admin.complaints.edit', $complaint->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Reply</a>
                                            @if($complaint->status==1)
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Close</button>
                                            @endif
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $complaints->links() }}
            @else
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif
    </section>
    <!-- /.content -->
@endsection
