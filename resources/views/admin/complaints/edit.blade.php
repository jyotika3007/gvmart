@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

    
    <div class="form-title">
            <h3>Feedbacks >> Feedback Reply</h3>
        </div>

        <form action="{{ route('admin.complaints.update', $complaint->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}

                <input type="hidden" name="category" id="get_category" class="form-control select2" required="required" value="Product Based">

                <div class="form-group">
                    <label for="user_name">User Name <span class="text-danger">*</span></label>
                    <input type="text" name="user_name" id="user_name" placeholder="Name" class="form-control" value="{{ $complaint->user_name ?? '' }}" required="required" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="user_email">Email<span class="text-danger">*</span></label>
                    <input type="text" name="user_email" id="user_email" placeholder="Name" class="form-control" value="{{ $complaint->user_email ?? '' }}" required="required" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="user_mobile">Mobile <span class="text-danger">*</span></label>
                    <input type="text" name="user_mobile" id="user_mobile" placeholder="Name" class="form-control" value="{{ $complaint->user_mobile ?? '' }}" required="required" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="subject">Subject <span class="text-danger">*</span></label>
                    <input type="text" name="subject" id="subject" placeholder="Name" class="form-control" value="{{ $complaint->subject ?? '' }}" required="required" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="complaint">Complaint <span class="text-danger">*</span></label>
                    <textarea type="text" name="complaint" id="complaint" placeholder="Name" class="form-control" v required="required" readonly="readonly" rows="4">{{ $complaint->complaint ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="admin_reply">Reply <span class="text-danger">*</span></label>
                    <textarea type="text" name="admin_reply" id="admin_reply" placeholder="Name" class="form-control" v required="required" rows="4">{{ $complaint->admin_reply ?? '' }}</textarea>
                </div>


               
                @include('admin.shared.complaint-status-select', ['status' => $complaint->status])
  

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.complaints.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
