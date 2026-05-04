<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Event;
use App\Models\Media;
use Illuminate\Support\Facades\Mail;
use App\Mail\TroupeValidatedMail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingTroupes = User::where('role', 'troupe')->where('is_verified', false)->get();
        $pendingEvents = Event::where('status', 'pending')->get();
        $pendingMedia = Media::where('status', 'pending')->get();
        $allEvents = Event::latest()->get(); // Pour la gestion complète
        
        return view('admin.dashboard', compact('pendingTroupes', 'pendingEvents', 'pendingMedia', 'allEvents'));
    }

    public function storeEvent(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable|string',
            'location' => 'required|string',
            'capacity' => 'required|integer',
        ]);

        $data['status'] = auth()->user()->isAdmin() ? 'published' : 'pending';
        $data['user_id'] = auth()->id();

        Event::create($data);

        $message = auth()->user()->isAdmin() ? 'Événement créé et publié !' : 'Votre spectacle a été soumis pour validation par le modérateur.';
        return back()->with('success', $message);
    }

    public function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable|string',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'status' => 'required|in:pending,published,rejected',
        ]);

        $event->update($data);

        return back()->with('success', 'Événement mis à jour !');
    }

    public function destroyEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return back()->with('success', 'Événement supprimé.');
    }

    public function validateTroupe($id)
    {
        $user = User::findOrFail($id);
        $user->is_verified = true;
        $user->save();
        
        // Envoi de l'email de confirmation à la troupe
        Mail::to($user->email)->send(new TroupeValidatedMail($user));

        return back()->with('success', 'Troupe validée avec succès !');
    }

    public function rejectTroupe($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Ou mettre un statut rejeté
        
        return back()->with('info', 'Compte troupe refusé et supprimé.');
    }

    public function approveEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->status = 'published';
        $event->save();

        return back()->with('success', 'Événement publié !');
    }
}
