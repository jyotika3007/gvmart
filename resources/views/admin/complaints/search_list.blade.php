

@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        
            <div class="box">
                <div class="box-body">
                    <h2>Complaints - Search result for <b><i>"{{ $keyword }}"</i></b></h2>
                     @include('layouts.search', ['route' => route('admin.complaints.search_complaints'), 'placeholder' => 'Search by user name, email, phone no ... '])
        @if(count($complaints)>0)
                    <table class="table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <!-- <td>Category Type</td> -->
                                <td>Name</td>
                                <td>Email</td>
                                <td>Mobile</td>
                                <td>Subject</td>
                                <td>Complaint</td>
                                <td>Status</td>
                                <td>Replied</td>
                                <td>Actions</td>
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
