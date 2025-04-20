<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth

class BookingController extends Controller
{
    public function store(Request $request, $eventId)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
        ]);
    
        // Find the event
        $event = Event::findOrFail($eventId);
    
        // Get the currently authenticated user (if logged in)
        $user = Auth::user(); // This gets the user if they are logged in
    
        // Store the booking
        $booking = Booking::create([
            'event_id' => $event->id,
            'user_id' => $user ? $user->id : null, // If user is logged in, use their ID
            'user_name' => $validated['name'],
            'user_email' => $validated['email'],
            'user_phone' => $validated['phone'],
            'user_city' => $validated['city'],
            'user_state' => $validated['state'],
            'user_country' => $validated['country'],
            'ticket_quantity' => 1, // You can change this if you want to include quantity
            'payment_status' => 'pending', // Assuming the payment is pending for now
        ]);
    
        // Send confirmation email (optional, depending on your setup)
        // Mail::to($validated['email'])->send(new BookingConfirmation($booking));
    
        return redirect()->route('user.events.index')->with('success', 'Booking was successful! Your ticket is reserved.');
    }
}
