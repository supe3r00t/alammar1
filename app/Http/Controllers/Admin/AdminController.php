<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Work;
use App\Models\Workshop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function edit($id){

        $event = Event::findorfail($id);
        return  view('admin.events.edit',compact('event'));

    }
    public function update(Event $event){
        $event->update(request()->all());
        return redirect()->route('admin.events.index');

    }
    public function create(){

        return view('admin.events.create');
    }

    public function store(Request $request )
    {

        Event::create([

            'title' => $request->title,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'max_guests' => $request->max_guests,


        ]);


        return back()->with('success','تم ارسال الفعالية بنجاح!');

    }

    public function show(Event $event){



        return view('admin.events.guest', compact('event'));
    }


    public function delete($id)
    {


        $event = Event::find($id);
        $event->delete();
        return back();
    }




}
