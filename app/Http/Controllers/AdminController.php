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
        $allEvents = Event::latest()->get(); 
        $allMedia = Media::latest()->get();
        
        return view('admin.dashboard', compact('pendingTroupes', 'pendingEvents', 'pendingMedia', 'allEvents', 'allMedia'));
    }

    public function storeEvent(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'booking_url' => 'nullable|url|max:255',
            'credits' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable|string',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data['status'] = auth()->user()->isAdmin() ? 'published' : 'pending';
        $data['user_id'] = auth()->id();

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('events/images', 'public');
                $imagePaths[] = $path;
            }
        }
        $data['images'] = $imagePaths;

        $event = Event::create($data);

        if (!auth()->user()->isAdmin()) {
            $admins = User::where('role', 'admin')->get();
            \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\AdminAlert(
                'Nouveau spectacle à valider: ' . $event->title,
                'event',
                route('admin.dashboard')
            ));
        }

        $message = auth()->user()->isAdmin() ? 'Événement créé et publié !' : 'Votre spectacle a été soumis pour validation par le modérateur.';
        return back()->with('success', $message);
    }

    public function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'booking_url' => 'nullable|url|max:255',
            'credits' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable|string',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'status' => 'required|in:pending,published,rejected',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $imagePaths = $event->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('events/images', 'public');
                $imagePaths[] = $path;
            }
        }
        $data['images'] = $imagePaths;

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

    public function markNotificationAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        
        return redirect($notification->data['url'] ?? route('admin.dashboard'));
    }
}
