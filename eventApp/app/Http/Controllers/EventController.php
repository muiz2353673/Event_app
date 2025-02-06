<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a dashboard with all events.
     */
    public function dashboard()
    {
        // Fetch all events with the user relationship
        $events = Event::with('user')->paginate(3);
        return view('dashboard', compact('events'));
    }

    /**
     * Display a listing of the events.
     */
    public function index()
    {
        // Fetch all events with the user who created them
        $events = Event::with('user')->paginate(10);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        // Return the view for the event creation form
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'event_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Create the event
        Event::create([
            'event_name' => $request->event_name,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'user_id' => auth()->id(), // Associate the event with the logged-in user
        ]);

        // Redirect to the events index page with a success message
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(Event $event)
    {
        // Only the event owner can edit
        if ($event->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Ensure only the owner can update
        if ($event->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'event_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event)
    {
        // Ensure only the owner can delete
        if ($event->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
