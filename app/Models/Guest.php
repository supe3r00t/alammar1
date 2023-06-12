<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class Guest extends Model
{


    use HasApiTokens, HasFactory, Notifiable, Searchable;
    protected $fillable = ['title', 'name', 'phone'];


    public function event(){
        return $this->belongsTo(Event::class);
    }




public function toSearchableArray()
{
    return [
        'name' => $this->name,
        'phone' => $this->phone
    ];
}
}
