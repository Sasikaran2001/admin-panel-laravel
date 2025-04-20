@extends('layouts.user')

@section('title', 'Upcoming Events')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Upcoming Events</h1>
        <!-- Display Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($event->event_image)
                        <img src="{{ asset('storage/events/'.$event->event_image) }}" class="card-img-top" alt="{{ $event->event_name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->event_name }}</h5>
                        <p class="card-text">{{ Str::limit($event->short_description, 100) }}</p>
                        <p class="card-text"><small>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, h:i A') }}</small></p>
                        <a href="{{ route('user.events.show', $event->slug) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $events->links() }}
    </div>
</div>
@endsection
