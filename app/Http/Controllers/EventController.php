<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 

class EventController extends Controller
{
    public function index()
    {
        // On récupère tous les événements, triés par date de la plus proche à la plus lointaine
        $events = Event::orderBy('event_date', 'asc')->get();

        // On envoie ces données à une vue  events.index
        return view('events.index', compact('events'));
    }
}