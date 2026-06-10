<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

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
        return view('pages.contact');
    }

    public function lieu()
    {
        return view('pages.lieu');
    }

    public function historique()
    {
        return view('pages.historique');
    }

    public function processContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Envoi de l'email à l'admin
        try {
            Mail::to('ca.respire.encore@orange.fr')->send(new ContactMessageMail($data));
        } catch (\Exception $exception) {
            report($exception);
            return back()->with('error', 'Impossible d\'envoyer votre message pour le moment. Veuillez réessayer plus tard.');
        }

        return back()->with('success', 'Votre message a bien été envoyé ! Nous vous répondrons dans les plus brefs délais.');
    }
}
