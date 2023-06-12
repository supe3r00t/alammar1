<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $events = Event::search($request->search)->get();
        } else {
            $events = Event::get();
        }

        return view('search.index', compact('events'));
    }

    public function show(Event $search)
    {
        $now = now()->format('Y-m-d H:i:s');
        if ($search->start_date == $now
            && $search->end_date == $now
                  ) {
            return view('events', compact('search'));
        } else {
            return redirect()->route('events.index');
        }

    }
}
