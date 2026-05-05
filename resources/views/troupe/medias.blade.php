@extends('layouts.dashboard')

@section('title', 'Atelier Médias - Scène&Co')
@section('header_title', 'Gestion de mes Médias')

@section('content')
<div class="max-w-7xl mx-auto space-y-10" x-data="{ showUploadModal: false, mediaType: 'photo', videoUrls: [''] }">
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3 animate-bounce">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    <!-- Actions Row -->
    <div class="flex justify-between items-center bg-white p-6 rounded-3xl shadow-sm border border-zinc-100">
        <div>
            <h3 class="text-2xl font-bold font-serif">Mes contenus</h3>
            <p class="text-zinc-500 text-sm">Photos, vidéos et documents liés à vos spectacles ou ateliers.</p>
        </div>
        <button @click="showUploadModal = true" class="bg-zinc-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-black transition-all shadow-lg flex items-center gap-2">
            <span>➕</span> Ajouter un média
        </button>
    </div>

    <!-- Media Table -->
    <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-zinc-50 text-zinc-500 text-xs font-black uppercase tracking-widest">
                <tr>
                    <th class="px-6 py-4">Média</th>
                    <th class="px-6 py-4">Type / Catégorie</th>
                    <th class="px-6 py-4">Lien Spectacle</th>
                    <th class="px-6 py-4">Statut</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100">
                @forelse($medias as $media)
                <tr class="hover:bg-zinc-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-bold text-zinc-900">{{ $media->title }}</div>
                        <div class="text-[10px] text-zinc-400 font-bold uppercase tracking-tighter">{{ $media->file_path }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $media->type === 'video' ? 'bg-blue-50 text-blue-600' : ($media->type === 'photo' ? 'bg-amber-50 text-amber-600' : 'bg-zinc-100 text-zinc-600') }}">
                            {{ $media->type }}
                        </span>
                        <span class="text-[10px] text-zinc-400 ml-2">({{ $media->category }})</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-zinc-600">
                        {{ $media->event ? $media->event->title : 'Aucun' }}
                    </td>
                    <td class="px-6 py-4">
                        @if($media->status === 'published')
                            <span class="text-green-600 font-bold text-xs flex items-center gap-1">🟢 Publié</span>
                        @else
                            <span class="text-amber-500 font-bold text-xs flex items-center gap-1">⏳ En attente</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right text-zinc-300">...</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-zinc-400 italic">Vous n'avez pas encore ajouté de média.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Upload Modal -->
    <div x-show="showUploadModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-zinc-900/60 backdrop-blur-sm" @click="showUploadModal = false"></div>
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-xl relative z-10 overflow-hidden">
            <div class="p-8 border-b border-zinc-100 flex justify-between items-center">
                <h3 class="text-2xl font-bold font-serif">Ajouter un Média</h3>
                <button @click="showUploadModal = false" class="text-zinc-400 hover:text-zinc-600">✖️</button>
            </div>
            
            <form action="{{ route('troupe.medias.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-zinc-700 mb-2">Titre du média</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 border border-zinc-200 rounded-xl focus:ring-2 focus:ring-zinc-800 outline-none" placeholder="Ex: Trailer de Hamlet">
                </div>

                <div>
                    <label class="block text-sm font-bold text-zinc-700 mb-2">Description détaillée</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 border border-zinc-200 rounded-xl focus:ring-2 focus:ring-zinc-800 outline-none" placeholder="Décrivez ce que représente ce média..."></textarea>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-zinc-700 mb-2">Type</label>
                        <select name="type" x-model="mediaType" class="w-full px-4 py-3 border border-zinc-200 rounded-xl focus:ring-2 focus:ring-zinc-800 outline-none">
                            <option value="photo">Photo</option>
                            <option value="video">Vidéo (URL)</option>
                            <option value="document">Document (PDF)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-zinc-700 mb-2">Catégorie</label>
                        <select name="category" class="w-full px-4 py-3 border border-zinc-200 rounded-xl focus:ring-2 focus:ring-zinc-800 outline-none">
                            <option value="spectacle">Spectacle</option>
                            <option value="tuto">Tutoriel</option>
                            <option value="formation">Atelier / Formation</option>
                        </select>
                    </div>
                </div>

                <div x-show="mediaType !== 'video'">
                    <label class="block text-sm font-bold text-zinc-700 mb-2">Fichiers (Sélectionnez plusieurs si besoin)</label>
                    <input type="file" name="files[]" multiple class="w-full p-2 border border-zinc-200 rounded-xl bg-zinc-50">
                    <p class="text-[10px] text-zinc-400 mt-1">Images ou PDF uniquement. Max 10Mo par fichier.</p>
                </div>

                <div x-show="mediaType === 'video'" class="space-y-4">
                    <label class="block text-sm font-bold text-zinc-700 mb-2">URL de la vidéo (YouTube/Vimeo)</label>
                    <template x-for="(url, index) in videoUrls" :key="index">
                        <div class="flex gap-2">
                            <input type="url" name="video_urls[]" x-model="videoUrls[index]" class="w-full px-4 py-3 border border-zinc-200 rounded-xl focus:ring-2 focus:ring-zinc-800 outline-none" placeholder="https://www.youtube.com/watch?v=...">
                            <button type="button" @click="videoUrls.splice(index, 1)" x-show="videoUrls.length > 1" class="text-red-500 px-2">✕</button>
                        </div>
                    </template>
                    <button type="button" @click="videoUrls.push('')" class="text-xs font-bold text-zinc-500 hover:text-zinc-900">+ Ajouter une autre vidéo</button>
                </div>

                <div>
                    <label class="block text-sm font-bold text-zinc-700 mb-2">Lier à un de mes spectacles (optionnel)</label>
                    <select name="event_id" class="w-full px-4 py-3 border border-zinc-200 rounded-xl focus:ring-2 focus:ring-zinc-800 outline-none">
                        <option value="">-- Aucun lien --</option>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-zinc-900 text-white py-4 rounded-2xl font-bold hover:bg-black transition-all shadow-xl">
                        Soumettre pour validation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
