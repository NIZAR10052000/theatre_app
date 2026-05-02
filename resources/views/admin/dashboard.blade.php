@extends('layouts.dashboard')

@section('title', 'Panel Modérateur - Scène&Co')
@section('header_title', 'Administration & Modération')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    <!-- Section Validation Troupes -->
    <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden">
        <div class="p-6 border-b border-zinc-100">
            <h3 class="text-xl font-bold font-serif">Troupes en attente de validation</h3>
            <p class="text-zinc-500 text-sm">Ces compagnies ne peuvent pas encore accéder à leur dashboard.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-zinc-50 text-zinc-500 text-xs font-black uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Nom / Compagnie</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Date d'inscription</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse($pendingTroupes as $troupe)
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-zinc-900">{{ $troupe->name }}</div>
                            <div class="text-xs text-zinc-400 italic">Troupe de théâtre</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-600">{{ $troupe->email }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-500">{{ $troupe->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('admin.validate-troupe', $troupe->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition-all">Valider</button>
                                </form>
                                <form action="{{ route('admin.reject-troupe', $troupe->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-600 px-4 py-2 rounded-xl text-xs font-bold transition-all">Refuser</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-zinc-400 italic font-medium">Aucune troupe en attente.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section Modération Événements -->
    <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden">
        <div class="p-6 border-b border-zinc-100">
            <h3 class="text-xl font-bold font-serif">Spectacles en attente de publication</h3>
            <p class="text-zinc-500 text-sm">Événements créés par les troupes nécessitant votre accord.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-zinc-50 text-zinc-500 text-xs font-black uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Spectacle</th>
                        <th class="px-6 py-4">Par la troupe</th>
                        <th class="px-6 py-4">Date prévue</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse($pendingEvents as $event)
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-zinc-900">{{ $event->title }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-600">{{ $event->user ? $event->user->name : 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-500">{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('admin.approve-event', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-theatre-red hover:bg-red-800 text-white px-4 py-2 rounded-xl text-xs font-bold transition-all">Publier</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-zinc-400 italic font-medium">Aucun événement à modérer.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section Modération Médias -->
    <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden" x-data="{ showMediaModal: false, mediaType: 'photo' }">
        <div class="p-6 border-b border-zinc-100 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-bold font-serif">Gestion des Médias</h3>
                <p class="text-zinc-500 text-sm">Modérez les envois ou ajoutez vos propres contenus.</p>
            </div>
            <button @click="showMediaModal = true" class="bg-zinc-900 text-white px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-black transition-all">
                ➕ Ajouter un média
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-zinc-50 text-zinc-500 text-xs font-black uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Média</th>
                        <th class="px-6 py-4">Par la troupe</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse($pendingMedia as $media)
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-zinc-900">{{ $media->title }}</div>
                            <div class="text-xs text-zinc-400 italic">{{ $media->category }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-600">{{ $media->user ? $media->user->name : 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-500 uppercase tracking-widest text-[10px] font-black">{{ $media->type }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                @if($media->file_path)
                                    <a href="{{ $media->type === 'video' ? $media->file_path : asset('storage/' . $media->file_path) }}" target="_blank" class="text-zinc-400 hover:text-zinc-600 px-3 py-2" title="Voir le média">👁️</a>
                                @endif
                                <form action="{{ route('admin.approve-media', $media->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition-all">Approuver</button>
                                </form>
                                <form action="{{ route('admin.delete-media', $media->id) }}" method="POST" onsubmit="return confirm('Supprimer ce média ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-zinc-300 hover:text-red-600 px-3 py-2">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-zinc-400 italic font-medium">Aucun média à modérer.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section Gestion Complète Agenda -->
    <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden" x-data="{ 
        showEventModal: false, 
        isEditing: false,
        eventData: { id: '', title: '', category: '', period: '', description: '', event_date: '', event_time: '', location: '', capacity: '', status: 'published' }
    }">
        <div class="p-6 border-b border-zinc-100 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-bold font-serif">Gestion de l'Agenda</h3>
                <p class="text-zinc-500 text-sm">Gérez l'ensemble des spectacles publiés sur le site.</p>
            </div>
            <button @click="isEditing = false; eventData = { id: '', title: '', category: '', period: '', description: '', event_date: '', event_time: '', location: '', capacity: '', status: 'published' }; showEventModal = true" class="bg-zinc-900 text-white px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-black transition-all">
                ➕ Créer un événement
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-zinc-50 text-zinc-500 text-xs font-black uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Spectacle</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Statut</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse($allEvents as $event)
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-zinc-900">{{ $event->title }}</div>
                            <div class="text-[10px] text-zinc-400 font-bold uppercase tracking-widest">{{ $event->category }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-600">
                            {{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-0.5 rounded text-[9px] font-black uppercase tracking-widest {{ $event->status === 'published' ? 'bg-green-50 text-green-600' : 'bg-amber-50 text-amber-600' }}">
                                {{ $event->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button @click="isEditing = true; eventData = { id: '{{ $event->id }}', title: '{{ addslashes($event->title) }}', category: '{{ $event->category }}', period: '{{ $event->period }}', description: '{{ addslashes($event->description) }}', event_date: '{{ $event->event_date }}', event_time: '{{ $event->event_time }}', location: '{{ addslashes($event->location) }}', capacity: '{{ $event->capacity }}', status: '{{ $event->status }}' }; showEventModal = true" class="text-zinc-400 hover:text-zinc-800 px-2">✏️</button>
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Supprimer cet événement ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-zinc-400 hover:text-red-600 px-2">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-zinc-400 italic">Aucun événement dans la base.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Modal Création / Édition -->
        <div x-show="showEventModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-zinc-900/60 backdrop-blur-sm" @click="showEventModal = false"></div>
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl relative z-10 overflow-hidden max-h-[90vh] flex flex-col">
                <div class="p-8 border-b border-zinc-100 flex justify-between items-center">
                    <h3 class="text-2xl font-bold font-serif" x-text="isEditing ? 'Modifier l\'événement' : 'Créer un événement'"></h3>
                    <button @click="showEventModal = false" class="text-zinc-400 hover:text-zinc-600 text-2xl">×</button>
                </div>
                
                <form :action="isEditing ? '{{ url('admin/events') }}/' + eventData.id : '{{ route('admin.events.store') }}'" method="POST" class="p-8 space-y-6 overflow-y-auto">
                    @csrf
                    <template x-if="isEditing">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-zinc-700 mb-2">Titre du spectacle</label>
                            <input type="text" name="title" x-model="eventData.title" required class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-zinc-700 mb-2">Catégorie</label>
                            <select name="category" x-model="eventData.category" required class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900">
                                <option value="Théâtre">Théâtre</option>
                                <option value="Résidence">Résidence</option>
                                <option value="Pistes Amuse-gueules">Amuse-gueules</option>
                                <option value="Atelier / Formation">Atelier / Formation</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-zinc-700 mb-2">Période</label>
                            <select name="period" x-model="eventData.period" required class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900">
                                <option value="Printemps / Été">Printemps / Été</option>
                                <option value="Automne / Hiver">Automne / Hiver</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-zinc-700 mb-2">Description</label>
                            <textarea name="description" x-model="eventData.description" required rows="3" class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-zinc-700 mb-2">Date</label>
                            <input type="date" name="event_date" x-model="eventData.event_date" required class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-zinc-700 mb-2">Heure (ex: 20h30)</label>
                            <input type="text" name="event_time" x-model="eventData.event_time" class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-zinc-700 mb-2">Lieu</label>
                            <input type="text" name="location" x-model="eventData.location" required class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-zinc-700 mb-2">Capacité (places)</label>
                            <input type="number" name="capacity" x-model="eventData.capacity" required class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900">
                        </div>
                        <template x-if="isEditing">
                            <div class="col-span-2">
                                <label class="block text-sm font-bold text-zinc-700 mb-2">Statut de publication</label>
                                <select name="status" x-model="eventData.status" class="w-full px-4 py-3 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-zinc-900">
                                    <option value="pending">En attente</option>
                                    <option value="published">Publié</option>
                                    <option value="rejected">Rejeté</option>
                                </select>
                            </div>
                        </template>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-zinc-900 text-white py-4 rounded-2xl font-bold hover:bg-black transition-all shadow-xl" x-text="isEditing ? 'Enregistrer les modifications' : 'Créer l\'événement'"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ajout Média Admin -->
    <div x-show="showMediaModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-zinc-900/60 backdrop-blur-sm" @click="showMediaModal = false"></div>
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-xl relative z-10 overflow-hidden">
            <div class="p-8 border-b border-zinc-100 flex justify-between items-center">
                <h3 class="text-2xl font-bold font-serif">Ajouter un Média (Admin)</h3>
                <button @click="showMediaModal = false" class="text-zinc-400 hover:text-zinc-600">×</button>
            </div>
            
            <form action="{{ route('troupe.medias.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-zinc-700 mb-2">Titre du média</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 border border-zinc-200 rounded-xl focus:ring-2 focus:ring-zinc-800 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-zinc-700 mb-2">Description détaillée</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 border border-zinc-200 rounded-xl focus:ring-2 focus:ring-zinc-800 outline-none" placeholder="Décrivez le contenu..."></textarea>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-zinc-700 mb-2">Type</label>
                        <select name="type" x-model="mediaType" class="w-full px-4 py-3 border border-zinc-200 rounded-xl">
                            <option value="photo">Photo</option>
                            <option value="video">Vidéo (URL)</option>
                            <option value="document">Document (PDF)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-zinc-700 mb-2">Catégorie</label>
                        <select name="category" class="w-full px-4 py-3 border border-zinc-200 rounded-xl">
                            <option value="spectacle">Spectacle</option>
                            <option value="tuto">Tutoriel</option>
                            <option value="formation">Atelier / Formation</option>
                        </select>
                    </div>
                </div>

                <div x-show="mediaType !== 'video'">
                    <label class="block text-sm font-bold text-zinc-700 mb-2">Fichier</label>
                    <input type="file" name="file" class="w-full p-2 border border-zinc-200 rounded-xl bg-zinc-50">
                </div>

                <div x-show="mediaType === 'video'">
                    <label class="block text-sm font-bold text-zinc-700 mb-2">URL de la vidéo (YouTube/Vimeo)</label>
                    <input type="url" name="video_url" class="w-full px-4 py-3 border border-zinc-200 rounded-xl" placeholder="https://...">
                </div>

                <div>
                    <label class="block text-sm font-bold text-zinc-700 mb-2">Lier à un spectacle</label>
                    <select name="event_id" class="w-full px-4 py-3 border border-zinc-200 rounded-xl">
                        <option value="">-- Aucun lien --</option>
                        @foreach($allEvents as $event)
                            <option value="{{ $event->id }}">{{ $event->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="w-full bg-zinc-900 text-white py-4 rounded-2xl font-bold hover:bg-black transition-all">Publier immédiatement</button>
            </form>
        </div>
    </div>
</div>
@endsection
