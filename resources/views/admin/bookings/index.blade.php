@extends('layouts.admin')

@section('title', 'Manage Bookings')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Booking Details</h1>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Event Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Ticket Quantity</th>
            <th>Payment Status</th>
            <th>Booking Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($bookings as $booking)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $booking->event->event_name ?? '-' }}</td>
            <td>{{ $booking->user_name }}</td>
            <td>{{ $booking->user_email }}</td>
            <td>{{ $booking->user_phone }}</td>
            <td>{{ $booking->user_city }}</td>
            <td>{{ $booking->user_state }}</td>
            <td>{{ $booking->user_country }}</td>
            <td>{{ $booking->ticket_quantity }}</td>
            <td>{{ ucfirst($booking->payment_status) }}</td>
            <td>{{ $booking->created_at->format('d M Y, h:i A') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="11" class="text-center">No bookings found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $bookings->links() }}
</div>
@endsection
