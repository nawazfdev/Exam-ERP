@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Booking List') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- Add any additional buttons or links for booking actions -->
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Bookings</h3>
                        </div>
                        <div class="card-body">
                            @if ($bookings !== null && count($bookings) > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                           <th>SNO#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Time Slot</th>
                                            <th>Total Charges</th>
                                            <th>Confirmation Status </th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $key => $booking)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $booking->name }}</td>
                                                <td>{{ $booking->phone }}</td>
                                                <td>{{ $booking->date }}</td>
                                                <td>{{ $booking->timeSlot->start_time }}</td>
                                                <td>{{ $booking->total_charges }}</td>
                                                <td>
                                                @if ($booking->confirmation_status == 0)
                                                    <form action="{{ route('bookings.mark-as-confirmed', ['booking' => $booking->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="confirmation_status" value="1">
                                                        <button type="submit" class="btn btn-success">Mark as Confirmed</button>
                                                    </form>
                                                @else
                                                    Confirmed
                                                @endif
                                            </td>


                                                <td>
                                                 @if ($booking->payment_status == 0)
                                                        <form action="{{ route('bookings.mark-as-paid', ['booking' => $booking->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="payment_status" value="1">
                                                            <button type="submit" class="btn btn-success">Mark as Paid</button>
                                                        </form>
                                                    @else
                                                        Paid
                                                    @endif
                                                </td>


                                                <td>
                                                    <!-- Add action buttons for editing and deleting bookings -->
                                                    <form action="{{ route('Bookings.destroy', $booking->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    {{ $bookings->links() }}
                                </div>
                            @else
                                <p>No bookings found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
