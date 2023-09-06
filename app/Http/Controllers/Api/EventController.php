<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventsResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index(){

        $events = Event::all();

        return EventsResource::collection($events);
    }

    public function show(Event $events){



        return new EventsResource($events);
    }
}
