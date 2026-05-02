<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Page publique de la médiathèque (Vidéos, Spectacles, Tutos)
     */
    public function index()
    {
        $query = Media::where('status', 'published')
                      ->whereIn('category', ['spectacle', 'tuto']);
        
        if (request()->has('event')) {
            $query->where('event_id', request()->event);
        }

        $medias = $query->latest()->get();
                      
        return view('media.index', compact('medias'));
    }

    /**
     * Page publique Ateliers & Formations
     */
    public function ateliers()
    {
        $medias = Media::where('status', 'published')
                      ->where('category', 'formation')
                      ->latest()
                      ->get();
                      
        return view('media.ateliers', compact('medias'));
    }

    /**
     * Espace personnel Troupe : Gestion des médias (Atelier)
     */
    public function manage()
    {
        $medias = Media::where('user_id', auth()->id())->latest()->get();
        $events = Event::where('user_id', auth()->id())->get();
        
        return view('troupe.medias', compact('medias', 'events'));
    }

    /**
     * Enregistrement d'un nouveau média
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:photo,video,document',
            'category' => 'required|in:spectacle,tuto,formation',
            'file' => 'required_if:type,photo,document|file|max:10240', // 10MB max
            'video_url' => 'required_if:type,video|url|nullable',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('medias', 'public');
        } elseif ($request->type === 'video') {
            $filePath = $request->video_url; // Pour les vidéos, on stocke souvent l'URL YouTube/Vimeo
        }

        Media::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'category' => $request->category,
            'file_path' => $filePath,
            'event_id' => $request->event_id,
            'user_id' => auth()->id(),
            'status' => 'pending', // Validation admin requise
        ]);

        return back()->with('success', 'Votre média a été soumis pour validation par le modérateur.');
    }

    /**
     * Approbation par l'admin
     */
    public function approve($id)
    {
        $media = Media::findOrFail($id);
        $media->update(['status' => 'published']);
        
        return back()->with('success', 'Le média a été publié.');
    }
}
