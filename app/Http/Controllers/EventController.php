<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function index()
    {
        //data team
        $now = now()->format('Y-m-d');
        //filter Events
        $events = Event::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->where('type', 'event')->get();
        //filter Workshop
        $workshops = Event::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)->where('type', 'workshop')->get();

        return view('events.events', compact('events', 'workshops'));
    }

    public function signup(Event $event)
    {




    }




    public function show(Event $event)
    {



        $now = now()->format('Y-m-d H:i:s');
        if ($event->start_date <= $now
            && $event->end_date >= $now) {
            return view('events.show', compact('event'));
        } else {
            return redirect()->route('events.index');
        }
    }













    public function events(Event $events)
    {

        $now = now()->format('Y-m-d H:i:s');

        $events = Event::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)->where('type', 'event')->get();

        return view('events.events', compact('events'));


    }


}

