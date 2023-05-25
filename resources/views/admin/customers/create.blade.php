@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <div class="form-title">
            <h3>Customers >> Create Customer</h3>
        </div>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <form action="{{ route('admin.customers.store') }}" method="post" class="form">
                    <div class="box-body">
                        {{ csrf_field() }}
                        <br>
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" class="form-control" required="required" onkeypress="return isNumberKey(event)" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Role <span class="text-danger">*</span></label>
                            <select name="user_role" id="user_role" class="form-control" required>
                                <option value="admin">Admin</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status </label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="btn-group">
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection