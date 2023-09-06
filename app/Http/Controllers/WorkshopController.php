<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{

    public function workshops(Event $workshops)
    {
        $now = now()->format('Y-m-d');
        $workshops = Event::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)->where('type', 'workshop')->get();

        return view('events.workshop', compact('workshops'));
    }


    public function show(Event $workshop)
    {


        $now = now()->format('Y-m-d');
        if ($workshop->start_date <= $now
            && $workshop->end_date >= $now) {
            return view('events.show', compact('workshop'));
        } else {
            return back();
        }
    }







}
