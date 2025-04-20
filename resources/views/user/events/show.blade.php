@extends('layouts.user')

@section('title', $event->meta_title ?? $event->event_name)

@section('meta')
    <meta name="description" content="{{ $event->meta_description }}">
    <meta name="keywords" content="{{ $event->meta_keywords }}">
@endsection

@section('content')
<div class="container py-5">
    <h1>{{ $event->event_name }}</h1>

    @if ($event->event_image)
        <img src="{{ asset('storage/events/'.$event->event_image) }}" class="col-6 my-4" alt="{{ $event->event_name }}">
    @endif

    <p><strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, h:i A') }}</p>
    <p><strong>Venue:</strong> {{ $event->venue }}</p>

    <h4>About Event</h4>
    <p>{{ $event->detail_description }}</p>

    <h4>Ticket Cost: ₹{{ number_format($event->ticket_cost, 2) }}</h4>

    <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#bookNowModal">Book Now</button>

    <!-- Book Now Modal -->
    <div class="modal fade" id="bookNowModal" tabindex="-1" aria-labelledby="bookNowModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" action="{{ route('user.bookings.store', $event->id) }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookNowModalLabel">Book Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Booking Form -->
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>State</label>
                        <input type="text" name="state" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" required>
                    </div>
                    <!-- End Booking Form -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                </div>
            </div>
        </form>
      </div>
    </div>

</div>
@endsection
