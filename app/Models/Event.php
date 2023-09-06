<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class Event extends Model
{

    use HasApiTokens, HasFactory, Notifiable, Searchable;
    protected $fillable = ['title','start_date','end_date','max_guests','type'];
    public function guests(){

        return $this->hasMany(Guest::class);
    }



    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id, // <- Always include the primary key
            'title' => $this->title,
            'type' => $this->type,
        ];
    }

}
