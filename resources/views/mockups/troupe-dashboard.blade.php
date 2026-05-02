@extends('layouts.dashboard')

@section('title', 'Tableau de bord - Les Passeurs')
@section('header_title', 'Vue d\'ensemble')

@section('content')
<div class="max-w-7xl mx-auto" x-data="{ showEventModal: false, showMediaModal: false, mediaType: 'photo' }">
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    <!-- Welcome banner -->
    <div class="bg-gradient-to-r from-zinc-900 to-zinc-800 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="text-2xl font-bold font-serif mb-2">Bonjour, {{ auth()->user()->name }} ! 👋</h2>
            <p class="text-zinc-300 max-w-2xl">Votre compte est actif. Utilisez ce tableau de bord pour piloter vos représentations et votre visibilité sur la plateforme.</p>
        </div>
        <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-1/4 translate-y-1/4">
            <span class="text-9xl">🎭</span>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-zinc-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">📅</div>
            <div>
                <div class="text-2xl font-bold text-zinc-900">{{ $upcomingShowsCount }}</div>
                <div class="text-sm text-zinc-500 font-medium">Spectacles à venir</div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-zinc-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">🎟️</div>
            <div>
                <div class="text-2xl font-bold text-zinc-900">{{ $ticketsSold }}</div>
                <div class="text-sm text-zinc-500 font-medium">Billets vendus</div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-zinc-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-xl">💶</div>
            <div>
                <div class="text-2xl font-bold text-zinc-900">{{ number_format($revenue, 0, ',', ' ') }} €</div>
                <div class="text-sm text-zinc-500 font-medium">Revenus générés</div>
            </div>
        </div>
    </div>

    <!-- Quick actions & Recent events -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left col: Events -->
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-zinc-900">Vos spectacles récents</h3>
                <a href="{{ route('events.index') }}" class="text-sm font-bold text-theatre-red hover:text-red-800 transition-colors">Voir l'agenda public</a>
            </div>

            <div class="space-y-4">
                @forelse($myEvents as $event)
                <div class="bg-white rounded-2xl shadow-sm border border-zinc-100 overflow-hidden">
                    <div class="p-6 flex gap-6">
                        <div class="w-24 h-32 bg-zinc-100 rounded-xl flex items-center justify-center text-zinc-300 text-3xl font-bold">
                            @if($event->image_path)
                                <img src="{{ asset('storage/' . $event->image_path) }}" alt="Affiche" class="w-full h-full object-cover rounded-xl shadow-sm">
                            @else
                                🎭
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <span class="inline-block px-2.5 py-1 text-[10px] font-black uppercase tracking-widest rounded-md mb-2 
                                        {{ $event->status === 'published' ? 'bg-green-100 text-green-700' : ($event->status === 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-red-100 text-red-700') }}">
                                        {{ $event->status }}
                                    </span>
                                    <h4 class="text-lg font-bold text-zinc-900">{{ $event->title }}</h4>
                                </div>
                            </div>
                            <p class="text-sm text-zinc-500 mb-4 line-clamp-2 italic">{{ $event->description }}</p>
                            <div class="flex items-center gap-4 text-xs text-zinc-500 font-bold uppercase tracking-wider">
                                <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-theatre-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</span>
                                <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-theatre-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> {{ \App\Models\Ticket::where('event_id', $event->id)->count() }} Résas</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-2xl shadow-sm border border-zinc-100 p-12 text-center text-zinc-400 italic">
                    Vous n'avez pas encore créé de spectacle.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Right col: Actions -->
        <div class="space-y-6">
            <h3 class="text-lg font-bold text-zinc-900">Actions rapides</h3>
            
            <button @click="showEventModal = true" class="w-full bg-theatre-red hover:bg-red-800 text-white p-5 rounded-2xl shadow-md transition-all flex items-center justify-between group active:scale-[0.98]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="font-bold text-sm">Ajouter un spectacle</span>
                </div>
                <svg class="w-5 h-5 opacity-50 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
            
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5 text-blue-800 text-sm">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-medium">Besoin d'aide ? Contactez l'administrateur du théâtre pour toute question sur vos dates ou la billetterie.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ajouter un Spectacle -->
    <div x-show="showEventModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-zinc-900/60 backdrop-blur-sm" @click="showEventModal = false"></div>
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl relative z-10 overflow-hidden max-h-[90vh] flex flex-col">
            <div class="p-8 border-b border-zinc-100 flex justify-between items-center bg-zinc-50/50">
                <h3 class="text-2xl font-bold font-serif text-zinc-900">Soumettre un spectacle</h3>
                <button @click="showEventModal = false" class="text-zinc-400 hover:text-zinc-600 text-2xl">×</button>
            </div>
            
            <form action="{{ route('troupe.events.store') }}" method="POST" class="p-8 space-y-6 overflow-y-auto">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">Titre du spectacle</label>
                        <input type="text" name="title" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-theatre-red/20 focus:border-theatre-red transition-all">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">Catégorie</label>
                        <select name="category" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl outline-none">
                            <option value="Théâtre">Théâtre</option>
                            <option value="Résidence">Résidence</option>
                            <option value="Atelier">Atelier</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">Description</label>
                        <textarea name="description" required rows="3" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl outline-none focus:ring-2 focus:ring-theatre-red/20 focus:border-theatre-red transition-all"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">Date</label>
                        <input type="date" name="event_date" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">Heure (ex: 20h30)</label>
                        <input type="text" name="event_time" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">Lieu</label>
                        <input type="text" name="location" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">Places disponibles</label>
                        <input type="number" name="capacity" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl outline-none">
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="w-full bg-zinc-900 text-white py-4 rounded-2xl font-bold hover:bg-black transition-all shadow-xl">Envoyer pour validation</button>
                    <p class="text-[10px] text-center text-zinc-400 mt-4 font-bold uppercase tracking-widest">Un modérateur doit valider votre spectacle avant publication.</p>
                </div>
            </form>
        </div>
    </div>

    </div>
</div>
@endsection
