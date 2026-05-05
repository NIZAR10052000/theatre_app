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
        'images',
        'event_date',
        'event_time',
        'location',
        'capacity',
        'image_path',
        'is_reported',
        'status',
        'user_id'
    ];

    protected $casts = [
        'images' => 'array',
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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($event) {
            if ($event->event_date) {
                $year = (int) substr($event->event_date, 0, 4);
                $month = (int) substr($event->event_date, 5, 2);
                
                if ($year === 2026 && $month <= 7) {
                    $event->period = '1er semestre 2026';
                } elseif ($year === 2026 && $month > 7) {
                    $event->period = '2è semestre 2026';
                } elseif ($year === 2027) {
                    $event->period = 'Année 2027';
                } else {
                    $seasonYear = $month >= 8 ? $year : $year - 1;
                    $event->period = 'Saison ' . $seasonYear . '/' . ($seasonYear + 1);
                }
            }
        });
    }
}