<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Event;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingTroupes = User::where('role', 'troupe')->where('is_verified', false)->get();
        $pendingEvents = Event::where('status', 'pending')->get();
        
        return view('admin.dashboard', compact('pendingTroupes', 'pendingEvents'));
    }

    public function validateTroupe($id)
    {
        $user = User::findOrFail($id);
        $user->is_verified = true;
        $user->save();
        
        // Simuler l'envoi d'un email
        // Mail::to($user->email)->send(new AccountVerified($user));

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
