<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OldeventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $dates){

        $dates = DB::table('events')->where('end_date', '<=', now())->get();

//        $olds =Event::orderBy('end_date','desc')->get()->groupBy('start_date');

        $groupeddates = $dates->groupBy('end_date');

        return view('oldevents.index', compact('dates','groupeddates'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
