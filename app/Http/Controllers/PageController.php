<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $upcomingEvents = \App\Models\Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();
            
        return view('home', compact('upcomingEvents'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function ateliers()
    {
        return view('ateliers');
    }
}
