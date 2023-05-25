@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($bookings)
            <div class="box">
                
            <div class="form-title">
            <h3>Bookings >> Bookings List </h3>
        </div>

                <div class="box-body">
                 
                    @include('layouts.search', ['route' => route('admin.bookings.index')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Booking Date/Time</td>
                                <td>Customer</td>
                                <td>Customer's Contact</td>
                                <td>Shop</td>
                                <td>Shop Contact</td>
                                <td>Requirement</td>
                                <td>Status</td>
                                <td style="text-align: center;">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td><a title="Show order" href="{{ route('admin.bookings.show', $booking->id) }}">{{ $booking->booking_date ?? ''}}</a></td>
                                <td>{{$booking->customer_name ?? ''}}</td>
                                <td>{{$booking->customer_contact ?? ''}}</td>
                                <td>{{$booking->shop_name ?? ''}}</td>
                                <td>{{$booking->contact ?? ''}}</td>
                                <td>{{$booking->requirement ?? ''}}</td>
                                <td><p class="text-center" style="color: #fff; background-color:  @if($booking->booking_status == 'Pending'){{'orange'}}@else @if($booking->booking_status == 'Cancelled'){{'red'}}@else{{'green'}} @endif @endif">{{ $booking->booking_status }}</p></td>
                                <td style="text-align: center;">
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}" title="View Booking Detail"><i class="fa fa-eye" style="font-size: 20px;"></i></a>&nbsp;
                                    <a href="{{ route('admin.bookings.edit', $booking->id) }}" title="Edit Booking Detail"><i class="fa fa-edit" style="font-size: 20px;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{ $bookings->links() }}
                </div>
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection