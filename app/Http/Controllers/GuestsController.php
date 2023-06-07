<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(Event $event)
    {
        $validatedData = request()->validate([
            'name' => 'required|min:5|max:40',
            'phone' => 'required|min:10|max:10',
            'title' => 'required'
        ]);

        //
        $now = now()->format('Y-m-d');
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

            return back()->with('error','الرجاء التحقق من أنك لم تقم بالتسجيل مسبقا وان هذا الحدث متاح التسجيل به!');


        }



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
