<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Les champs qu'on autorise à remplir via un formulaire
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'capacity'
    ];

    //Les relations
    public function tickets()
    {
        return $this->hasMany(Ticket::class); // Un événement a plusieurs billets
    }

    public function media()
    {
        return $this->hasMany(Media::class); // Un événement a plusieurs photos/vidéos
    }
}