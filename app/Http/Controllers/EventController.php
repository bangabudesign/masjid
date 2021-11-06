<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latestFirst()->activeEvent()->get();
        $page_title = 'Agenda Terdekat';

        return view('event_index', [
            'page_title' => $page_title,
            'events' => $events,
        ]);
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $page_title = $event->name;

        return view('event_show', [
            'page_title' => $page_title,
            'event' => $event,
        ]);
    }
}
