<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
           'رقم الزائر'=>$this->id,
           'Event id'=>$this->event_id,
           'Name Guest'=>$this->name,
           'Phone'=>$this->phone

       ];
    }
}
