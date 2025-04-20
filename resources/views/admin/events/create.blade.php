@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
<h1>Create Event</h1>

<form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Event Name</label>
        <input type="text" name="event_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Short Description</label>
        <textarea name="short_description" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>Event Date & Time</label>
        <input type="datetime-local" name="event_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Venue</label>
        <input type="text" name="venue" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Ticket Cost</label>
        <input type="number" name="ticket_cost" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Event Image</label>
        <input type="file" name="event_image" class="form-control">
    </div>

    <div class="mb-3">
        <label>Detail Description</label>
        <textarea name="detailed_description" class="form-control" rows="5"></textarea>
    </div>

    <div class="mb-3">
        <label>Meta Title</label>
        <input type="text" name="meta_title" class="form-control">
    </div>

    <div class="mb-3">
        <label>Meta Description</label>
        <textarea name="meta_description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Meta Keywords</label>
        <input type="text" name="meta_keywords" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Create Event</button>
</form>
@endsection
