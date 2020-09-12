<?php

namespace App\Http\Controllers;

use Event;
use Response;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function loadEvents()
    {
        $events = Event::get();

        return response()->json($events);
    }
}