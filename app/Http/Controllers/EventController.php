<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with('media')
                     ->where('status', 'published')
                     ->orderBy('event_date', 'asc');

        if ($request->has('period') && $request->period != 'Toutes les périodes') {
            $query->where('period', $request->period);
        }

        if ($request->has('category') && $request->category != 'Tous') {
            $query->where('category', $request->category);
        }

        $events = $query->get();
        
        $periods = Event::where('status', 'published')->select('period')->distinct()->pluck('period');
        $categories = Event::where('status', 'published')->select('category')->distinct()->pluck('category');

        return view('events.index', compact('events', 'periods', 'categories'));
    }
}