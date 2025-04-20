@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit Event</h1>
    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Back to Events</a>
</div>

<form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Event Name</label>
        <input type="text" name="event_name" class="form-control" value="{{ old('event_name', $event->event_name) }}" required>
    </div>

    <div class="mb-3">
        <label>Short Description</label>
        <textarea name="short_description" class="form-control" required>{{ old('short_description', $event->short_description) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Event Date & Time</label>
        <input type="datetime-local" name="event_date" class="form-control" value="{{ old('event_date', \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i')) }}" required>
    </div>

    <div class="mb-3">
        <label>Venue</label>
        <input type="text" name="venue" class="form-control" value="{{ old('venue', $event->venue) }}" required>
    </div>

    <div class="mb-3">
        <label>Ticket Cost</label>
        <input type="number" name="ticket_cost" class="form-control" value="{{ old('ticket_cost', $event->ticket_cost) }}" required>
    </div>
    <div class="mb-3">
    <label>Event Image</label>
    @if ($event->event_image)
        <div class="mb-2">
            <img src="{{ asset('storage/events/' . $event->event_image) }}" alt="Event Image" width="150">
        </div>
    @endif
    <input type="file" name="event_image" class="form-control">
</div>

    <div class="mb-3">
        <label>Detail Description</label>
        <textarea name="detailed_description" class="form-control" rows="5">{{ old('detailed_description', $event->detailed_description) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Meta Title</label>
        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $event->meta_title) }}">
    </div>

    <div class="mb-3">
        <label>Meta Description</label>
        <textarea name="meta_description" class="form-control">{{ old('meta_description', $event->meta_description) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Meta Keywords</label>
        <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $event->meta_keywords) }}">
    </div>

    <button type="submit" class="btn btn-success">Update Event</button>
</form>
@endsection
