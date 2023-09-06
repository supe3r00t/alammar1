<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuestsResource;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    public function index(Guest $guests){

        $gusts= Guest::all();

        return GuestsResource::collection($gusts);

    }
}
