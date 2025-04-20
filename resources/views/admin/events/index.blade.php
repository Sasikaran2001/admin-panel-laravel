@extends('layouts.admin')

@section('title', 'Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Events</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Add New Event</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Event Name</th>
            <th>Event Date & Time</th>
            <th>Venue</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->event_name }}</td>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->venue }}</td>
                <td>
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No Events Found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
