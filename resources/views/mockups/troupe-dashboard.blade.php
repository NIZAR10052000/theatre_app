@extends('layouts.dashboard')

@section('title', 'Tableau de bord - Les Passeurs')
@section('header_title', 'Vue d\'ensemble')

@section('content')
<div class="max-w-7xl mx-auto">
    
    <!-- Welcome banner -->
    <div class="bg-gradient-to-r from-zinc-900 to-zinc-800 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="text-2xl font-bold font-serif mb-2">Bonjour, Cie Les Passeurs ! 👋</h2>
            <p class="text-zinc-300 max-w-2xl">Votre compte a été validé par un modérateur. Vous pouvez désormais ajouter vos spectacles au programme et gérer vos réservations.</p>
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
                <div class="text-2xl font-bold text-zinc-900">2</div>
                <div class="text-sm text-zinc-500 font-medium">Spectacles à venir</div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-zinc-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">🎟️</div>
            <div>
                <div class="text-2xl font-bold text-zinc-900">48</div>
                <div class="text-sm text-zinc-500 font-medium">Billets vendus</div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-zinc-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-xl">💶</div>
            <div>
                <div class="text-2xl font-bold text-zinc-900">540 €</div>
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
                <a href="#" class="text-sm font-bold text-theatre-red hover:text-red-800 transition-colors">Voir tout</a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-zinc-100 overflow-hidden">
                <div class="p-6 border-b border-zinc-100 flex gap-6">
                    <img src="{{ asset('images/CIE Les Passeurs.jpeg') }}" alt="Affiche" class="w-24 h-32 object-cover rounded-xl shadow-sm bg-zinc-100">
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <span class="inline-block px-2.5 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-md mb-2">Publié</span>
                                <h4 class="text-lg font-bold text-zinc-900">Les Passeurs de masques</h4>
                            </div>
                            <button class="text-zinc-400 hover:text-zinc-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                            </button>
                        </div>
                        <p class="text-sm text-zinc-500 mb-4 line-clamp-2">Deux comédiens passionnés revisitent l’art du masque en proposant un spectacle interactif où ils dévoilent la naissance et l’évolution des personnages, mêlant improvisation, fragilité et modernité.</p>
                        <div class="flex items-center gap-4 text-sm text-zinc-500 font-medium">
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 6 Juin 2026</span>
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 60 min</span>
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> 32 réservations</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right col: Actions -->
        <div class="space-y-6">
            <h3 class="text-lg font-bold text-zinc-900">Actions rapides</h3>
            
            <button class="w-full bg-theatre-red hover:bg-red-800 text-white p-4 rounded-2xl shadow-md transition-all flex items-center justify-between group active:scale-[0.98]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="font-bold">Ajouter un spectacle</span>
                </div>
                <svg class="w-5 h-5 opacity-50 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <button class="w-full bg-white hover:bg-zinc-50 border border-zinc-200 text-zinc-800 p-4 rounded-2xl shadow-sm transition-all flex items-center justify-between group active:scale-[0.98]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-zinc-100 rounded-xl flex items-center justify-center text-zinc-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="font-bold">Ajouter des médias</span>
                </div>
                <svg class="w-5 h-5 opacity-50 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
            
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 text-blue-800 text-sm">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p>Vos médias (photos/vidéos) ajoutés seront visibles sur la page publique de vos spectacles.</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
