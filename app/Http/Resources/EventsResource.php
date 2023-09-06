<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'رقم الحدث'=>$this->id,
            'عنوان الحدث'=>$this->title,
            'نوع الحدث'=>$this->type,
           ' تاريخ الحدث'=>$this->start_date,
            'نهاية الحدث'=>$this->end_date,
            'عدد الزوار'=>$this->max_guests,
            'الزائر'=>$this->guests
        ];
    }
}
