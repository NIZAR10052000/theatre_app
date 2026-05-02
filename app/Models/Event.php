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
        'category',
        'period',
        'description',
        'event_date',
        'event_time',
        'location',
        'capacity',
        'image_path',
        'is_reported',
        'status',
        'user_id'
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