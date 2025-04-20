<h1>{{ $event->event_name }}</h1>
<img src="{{ asset('images/' . $event->event_image) }}" alt="{{ $event->event_name }}">
<p>{{ $event->detailed_description }}</p>
<p><strong>Event Date:</strong> {{ $event->event_date }}</p>
<p><strong>Venue:</strong> {{ $event->venue }}</p>

<form method="POST" action="{{ route('user.bookings.store', $event->id) }}">
    @csrf
    <input type="text" name="user_name" placeholder="Your Name" required>
    <input type="email" name="user_email" placeholder="Your Email" required>
    <input type="text" name="user_phone" placeholder="Your Phone" required>
    <input type="number" name="ticket_quantity" placeholder="Ticket Quantity" required>
    <button type="submit">Book Now</button>
</form>
