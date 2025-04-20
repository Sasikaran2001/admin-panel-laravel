<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class EventController extends Controller

    {
        public function index()
        {
            // Fetch events with pagination (10 events per page)
            $events = Event::paginate(10); // This enables pagination
    
            // Return the view with the paginated events
            return view('admin.events.index', compact('events'));
        }
    
        public function create()
        {
            return view('admin.events.create');
        }
    
        public function store(Request $request)
        {
            // Validate the incoming data
            $validated = $request->validate([
                'event_name' => 'required|string|max:255',
                'short_description' => 'required|string',
                'event_date' => 'required|date',
                'venue' => 'required|string|max:255',
                'ticket_cost' => 'required|numeric',
                'event_image' => 'nullable|image|max:2048',
                'detailed_description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string|max:255',
            ]);
        
    
            $imagePath = null;
            if ($request->hasFile('event_image')) {
                $imagePath = $request->file('event_image')->store('public/events');
            }
        
            Event::create([
                'event_name' => $validated['event_name'],
                'short_description' => $validated['short_description'],
                'detailed_description' => $validated['detailed_description'] ?? null,
                'event_date' => $validated['event_date'],
                'venue' => $validated['venue'],
                'ticket_cost' => $validated['ticket_cost'],
                'event_image' => $imagePath,
                'meta_title' => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
                'meta_keywords' => $validated['meta_keywords'] ?? null,
                'slug' => Str::slug($validated['event_name']),
            ]);
        
            return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
        
        }
    
        public function edit($id)
        {
            $event = Event::findOrFail($id);
            return view('admin.events.edit', compact('event'));
        }
        public function update(Request $request, $id)
        {
            $validated = $request->validate([
                'event_name' => 'required|string|max:255',
                'short_description' => 'required|string',
                'event_date' => 'required|date',
                'venue' => 'required|string',
                'ticket_cost' => 'required|numeric',
                'detailed_description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
            ]);
        
            $event = Event::findOrFail($id);
        
            $event->event_name = $validated['event_name'];
            $event->short_description = $validated['short_description'];
            $event->event_date = $validated['event_date'];
            $event->venue = $validated['venue'];
            $event->ticket_cost = $validated['ticket_cost'];
            $event->detailed_description = $validated['detailed_description'] ?? null;
            $event->meta_title = $validated['meta_title'] ?? null;
            $event->meta_description = $validated['meta_description'] ?? null;
            $event->meta_keywords = $validated['meta_keywords'] ?? null;
        
            if ($request->hasFile('event_image')) {
                $image = $request->file('event_image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->storeAs('events', $imageName, 'public');
                $event->event_image = $imageName;
            }
        
            $event->save();
        
            return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
        }
        
                
}
