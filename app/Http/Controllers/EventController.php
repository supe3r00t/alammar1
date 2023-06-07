<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Workshop;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        //data team
        $now = now()->format('Y-m-d H:i:s');
        //filter Events
        $events = Event::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->where('type', 'event')->get();
        //filter Workshop
        $workshops = Event::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)->where('type', 'workshop')->get();

        return view('events.index', compact('events', 'workshops'));
    }

    public function signup(Event $event)
    {

        $validatedData = request()->validate([
            'name' => 'required|min:5|max:40',
            'phone' => 'required|min:10|max:10',
            'title' => 'required'
        ]);

        //
        $now = now()->format('Y-m-d H:i:s');
        // how many registration
        $guestsCount = $event->guests->count();
        //filter phone count guests
        $phoneExist = $event->guests()->where('phone', request('phone'))->count();

        if (
            //count guests =
            $guestsCount < $event->max_guests
            // !phone ==
            && $phoneExist === 0
            && $event->start_date <= $now
            && $event->end_date >= $now
        ) {
            $event->guests()->create(request()->all());
            return back()->with('success','تم تسجيلك!');

        } else {
            return back()->withErrors(['msg' =>
                "الرجاء التحقق من أنك لم تقم بالتسجيل مسبقا وان هذا الحدث متاح التسجيل به"]);

        }





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
