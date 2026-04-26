<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::orderBy('event_date', 'asc');

        if ($request->has('period') && $request->period != 'Toutes les périodes') {
            $query->where('period', $request->period);
        }

        $events = $query->get();
        
        $periods = Event::select('period')->distinct()->pluck('period');

        return view('events.index', compact('events', 'periods'));
    }
}