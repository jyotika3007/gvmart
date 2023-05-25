@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <style type="text/css">
        .row{
            margin: 0 !important;
        }
    </style>
    <div class="box">

    
    <div class="form-title">
            <h3>Employees >> Add Employee</h3>
        </div>

        <form action="{{ route('admin.employees.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}

                <h3>Add Employee Details</h3>

                

                <div class="row"></div>
                <div class="row">
                    <div class="col-sm-6">

                        <h4>Personal Info</h4>
                        <div class="row" style="border: 1px solid #ddd">
                            <br>
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="user_role">Role </label>
                                    <select name="user_role" id="user_role" class="form-control select2">
                                        <option></option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="pan_number">Pan Card Number <span class="text-danger">*</span></label>
                                    <input type="text" name="pan_number" id="pan_number" placeholder="Pan Card Number" class="form-control" value="{{ old('pan_number') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="adhaar_number">Adhaar Number <span class="text-danger">*</span></label>
                                    <input type="text" name="adhaar_number" id="adhaar_number" placeholder="Adhaar Number" class="form-control" value="{{ old('adhaar_number') }}"  onkeypress="return isNumberKey(event)" maxlength="16">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="date_of_birth">D.O.B. <span class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" placeholder="D.O.B." class="form-control" value="{{ old('date_of_birth') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="mobile">Mobile No <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" id="mobile" placeholder="Mobile No" class="form-control" value="{{ old('mobile') }}"  onkeypress="return isNumberKey(event)" maxlength="10">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" placeholder="Address" class="form-control" value="{{ old('address') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="city">City <span class="text-danger">*</span></label>
                                    <input type="text" name="city" id="city" placeholder="City" class="form-control" value="{{ old('city') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="state">State <span class="text-danger">*</span></label>
                                    <input type="text" name="state" id="state" placeholder="State" class="form-control" value="{{ old('state') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="country">Country <span class="text-danger">*</span></label>
                                    <input type="text" name="country" id="country" placeholder="Country" class="form-control" value="{{ old('country') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="pincode">Pincode <span class="text-danger">*</span></label>
                                    <input type="number" name="pincode" id="pincode" placeholder="Pincode" class="form-control" value="{{ old('pincode') }}"  onkeypress="return isNumberKey(event)" maxlength="6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                     

                        <h4>Bank Details</h4>
                        <div class="row"  style="border: 1px solid #ddd">
                            <br>
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name <span class="text-danger">*</span></label>
                                    <input type="text" name="bank_name" id="bank_name" placeholder="Bank Name" class="form-control" value="{{ old('bank_name') }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="bank_branch">Bank Branch <span class="text-danger">*</span></label>
                                    <input type="text" name="bank_branch" id="bank_branch" placeholder="Banck Branch" class="form-control" value="{{ old('bank_branch') }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="bank_account_holder">Account Holder Name<span class="text-danger">*</span></label>
                                    <input type="text" name="bank_account_holder" id="bank_account_holder" placeholder="Account Holder Name" class="form-control" value="{{ old('bank_account_holder') }}">
                                </div>
                            </div>




                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="bank_account_number">Account Number <span class="text-danger">*</span></label>
                                    <input type="number" name="bank_account_number" id="bank_account_number" placeholder="Bank Account Number" class="form-control" value="{{ old('bank_account_number') }}" maxlength="18" onkeypress="return isNumberKey(event)">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="bank_ifsc_code">IFSC Code <span class="text-danger">*</span></label>
                                    <input type="text" name="bank_ifsc_code" id="bank_ifsc_code" placeholder="IFSC Code" class="form-control" value="{{ old('bank_ifsc_code') }}">
                                </div>
                            </div>


                        </div>

                        <br><br>


                        <h4>Documents Upload</h4>

                        <div class="row" style="border: 1px solid #ddd">
                            <br>



                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="passport_size_photo">Passport Size Photo<span class="text-danger">*</span></label>
                                    <input type="file" name="passport_size_photo" id="passport_size_photo" placeholder="Passport Size"Photo class="form-control" value="{{ old('passport_size_photo') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="voter_id">Voter ID <span class="text-danger">*</span></label>
                                    <input type="file" name="voter_id" id="voter_id" placeholder="Voter ID" class="form-control" value="{{ old('voter_id') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="pan_card">Pan Card <span class="text-danger">*</span></label>
                                    <input type="file" name="pan_card" id="pan_card" placeholder="Pan Card" class="form-control" value="{{ old('pan_card') }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="adhaar_front">Adhaar (Front) <span class="text-danger">*</span></label>
                                    <input type="file" name="adhaar_front" id="adhaar_front" placeholder="adhaar_front" class="form-control" value="{{ old('adhaar_front') }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="adhaar_back">Adhaar (Back) <span class="text-danger">*</span></label>
                                    <input type="file" name="adhaar_back" id="adhaar_back" placeholder="adhaar_back" class="form-control" value="{{ old('adhaar_back') }}">
                                </div>
                            </div>


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="driving_licence">Driving Licence <span class="text-danger">*</span></label>
                                    <input type="file" name="driving_licence" id="driving_licence" placeholder="Driving Licence" class="form-control" value="{{ old('driving_licence') }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="others">Other Document <span class="text-danger">*</span></label>
                                    <input type="file" name="others" id="others" placeholder="IFSC Code" class="form-control" value="{{ old('others') }}">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-xs-12"><br></div>


                    </div>         
                    

<!-- <div class="col-sm-6 col-xs-12">
                    
                    @include('admin.shared.status-select', ['status' => 1])
                </div> -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <div class="btn-group">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
