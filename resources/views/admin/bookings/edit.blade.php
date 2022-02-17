

@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">



        <div class="row">


            <div class="col-sm-7">
                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="post" class="form">
                    <div class="box-body">
                        <h3>Booking Detail</h3>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">

                        <p style="margin: 20px 0"><b> Booking Date - </b>{{ date('d M, Y',strtotime($booking->booking_date)) }}</p>

                        <h5><b>Customer's Detail</b></h5>
                        <div class="form-group">
                            <label for="customer_name">Name</label>
                            <input type="" name="customer_name" id="customer_name" class="form-control" value="{{ $booking->customer_name ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="customer_email">Email</label>
                            <input type="" name="customer_email" id="customer_email" required="required" class="form-control" value="{{ $booking->customer_email ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="customer_email">Contact No.</label>
                            <input type="" name="customer_contact" id="customer_contact" required="required" class="form-control" value="{{ $booking->customer_contact ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <label for="customer_house_no">House No.</label>
                            <input type="" name="customer_house_no" id="customer_house_no" class="form-control" value="{{ $booking->customer_house_no ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="customer_mohalla">Mohalla</label>
                            <input type="" name="customer_mohalla" id="customer_mohalla" class="form-control" value="{{ $booking->customer_mohalla ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="customer_near_by">LandMark (Nearby)</label>
                            <input type="" name="customer_near_by" id="customer_near_by" class="form-control" value="{{ $booking->customer_near_by ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="customer_city">City</label>
                            <input type="" name="customer_city" id="customer_city" required="required" class="form-control" value="{{ $booking->customer_city ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="customer_state">State</label>
                            <input type="" name="customer_state" id="customer_state" required="required" class="form-control" value="{{ $booking->customer_state ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="customer_pincode">PIN Code</label>
                            <input type="" name="customer_pincode" id="customer_pincode" required="required" class="form-control" value="{{ $booking->customer_pincode ?? '' }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="customer_service_query">Query</label>
                            <textarea name="customer_service_query" id="customer_service_query" required="required" class="form-control" readonly="readonly">{{ $booking->customer_service_query ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Requirement</label>
                            <input type="radio" name="requirement" value="Urgent" required="required" @if($booking->requirement == 'Urgent'){{'checked'}}@endif  >Urgent
                            <input type="radio" name="requirement" value="With in a day" required="required"  @if($booking->requirement == 'With in a day'){{'checked'}}@endif>With in a day
                            <input type="radio" name="requirement" value="Next Day" required="required"  @if($booking->requirement == 'Next Day'){{'checked'}}@endif>Next Day

                        </div>


                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="btn-group">
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-default btn-sm">Back</a>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </form>


            </div>


            <div class="col-sm-5">

<div class="status" style="margin-top: 65px;">

                <p class="text-center"><b>Booking Status -</b> <span style="color: #fff; padding: 5px 15px; background-color:  @if($booking->booking_status == 'Pending'){{'orange'}}@else @if($booking->booking_status == 'Cancelled'){{'red'}}@else{{'green'}} @endif @endif">{{ $booking->booking_status }}</span></p>



                <br>

                <form action="{{ route('admin.bookings.status-update',$booking->id) }}" method='POST'>
                    {{ csrf_field() }}
                    <label>Update Status</label>
                    <select name="booking_status" id="booking_status" class="form-control">
                        <option value="Pending" @if($booking->status == 'Pending'){{'selected'}}@endif >Pending</option>
                        <option value="Confirm" @if($booking->status == 'Confirm'){{'selected'}}@endif >Confirm</option>
                        <option value="Cancelled" @if($booking->status == 'Cancelled'){{'selected'}}@endif >Cancelled</option>
                    </select>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Update</button>
                </form>

</div>



                <div class="form-group">
                    <br><br>
                    <table class="table table-bordered">
                        <tr>
                            <th colspan=2>Shop Detail</th>
                        </tr>      
                        <tr>
                            <th>Shop Name</th>
                            <td>{{ $shop->shop_name ?? '' }}
                                <p><b>Shop Code -</b> {{ $shop->shop_code ?? '' }}</p></td>
                            </tr>
                            <tr>
                                <th>Shop Address</th>
                                <td>{{ $shop->address ?? '' }}, {{ $shop->city ?? '' }}, {{ $shop->state ?? '' }} - ({{ $shop->pincode ?? '' }})</td>
                            </tr>
                            <tr>
                                <th>Owner Name</th>
                                <td>{{ $shop->owner_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Contact</th>
                                <td>{{ $shop->contact ?? '' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>






            
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    @endsection
