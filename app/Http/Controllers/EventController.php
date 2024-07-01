<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('event', compact('user'));
    }

    public function listEvent(Request $request)
    {
        $user = User::find($request->user_id);

        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $events = Event::where('start_date', '>=', $start)
            ->where('end_date', '<=', $end)
            ->where('user_id', $user->id)
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'user_id' => $item->user_id,
                'title' => $item->title,
                'start' => $item->start_date,
                'end' => date('Y-m-d', strtotime($item->end_date . '+1 days')),
                'category' => $item->category,
                'className' => ['bg-' . $item->category]
            ]);

        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        //
        return view('event-form', ['data' => $event, 'action' => route('events.store')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request, Event $event)
    {
        //
        return $this->update($request, $event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        $user = User::find($event->id);
        return view('event', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        return view('event-form', ['data' => $event, 'action' => route('events.update', $event->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        //
        if ($request->has('delete')) {
            return $this->destroy($event);
        }
        $event->user_id = auth()->id();
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->title = $request->title;
        $event->category = $request->category;

        $event->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Save data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
