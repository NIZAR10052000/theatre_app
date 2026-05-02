@extends('layouts.app')

@section('title', 'Ateliers & Formations - Scène&Co')

@section('content')
<section class="relative bg-zinc-900 py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-40">
        <img src="https://images.unsplash.com/photo-1503091315242-cb8bb2321c8d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Training Session" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 bg-amber-500 text-white text-[10px] font-black uppercase tracking-[0.3em] rounded-lg mb-6">Apprentissage & Transmission</span>
            <h1 class="text-6xl md:text-8xl font-bold text-white mb-8 font-serif leading-none">Ateliers & Formations</h1>
            <p class="text-xl text-zinc-300 leading-relaxed italic">
                Découvrez nos ressources pédagogiques, documents techniques et tutoriels pour petits et grands.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-zinc-50">
    <div class="container mx-auto px-4" x-data="{ activeFilter: 'all' }">
        <!-- Intro text from Director -->
        <div class="max-w-3xl mx-auto text-center mb-24">
            <h2 class="text-4xl font-serif font-bold text-zinc-900 mb-6">"Ça respire encore... l'envie d'apprendre"</h2>
            <p class="text-zinc-600 leading-relaxed">
                Le théâtre est un lieu de vie et de partage. Nos ateliers s'adressent à tous : adultes, jeunes et même les curieux souhaitant découvrir les métiers de la scène (son, lumières, scénographie). Retrouvez ici les fiches techniques et supports de formation.
            </p>
        </div>

        <!-- Filter Bar -->
        <div class="flex flex-wrap justify-center gap-4 mb-20">
            <button @click="activeFilter = 'all'" :class="activeFilter === 'all' ? 'bg-zinc-900 text-white' : 'bg-white text-zinc-500 border border-zinc-100'" class="px-8 py-3 rounded-2xl text-xs font-black uppercase tracking-widest transition-all shadow-sm">
                Tout voir
            </button>
            <button @click="activeFilter = 'tuto'" :class="activeFilter === 'tuto' ? 'bg-zinc-900 text-white' : 'bg-white text-zinc-500 border border-zinc-100'" class="px-8 py-3 rounded-2xl text-xs font-black uppercase tracking-widest transition-all shadow-sm">
                Tutoriels
            </button>
            <button @click="activeFilter = 'formation'" :class="activeFilter === 'formation' ? 'bg-zinc-900 text-white' : 'bg-white text-zinc-500 border border-zinc-100'" class="px-8 py-3 rounded-2xl text-xs font-black uppercase tracking-widest transition-all shadow-sm">
                Formations
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($medias as $media)
                <div x-show="activeFilter === 'all' || activeFilter === '{{ $media->category }}'" 
                     class="bg-white rounded-[2.5rem] shadow-sm border border-zinc-100 overflow-hidden group hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                    <!-- Media Preview -->
                    <div class="aspect-[4/5] relative overflow-hidden bg-zinc-100">
                        @if($media->type === 'photo')
                            <img src="{{ asset('storage/' . $media->file_path) }}" alt="{{ $media->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @elseif($media->type === 'document')
                            <div class="absolute inset-0 flex items-center justify-center bg-zinc-50 flex-col gap-6">
                                <div class="w-24 h-24 bg-white rounded-3xl shadow-lg flex items-center justify-center text-4xl group-hover:rotate-12 transition-transform">📄</div>
                                <span class="px-4 py-1.5 bg-zinc-800 text-white text-[10px] font-black uppercase tracking-widest rounded-lg">Fiche PDF</span>
                            </div>
                        @else
                            <div class="absolute inset-0 flex items-center justify-center bg-black/40 z-10">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-theatre-red shadow-xl">▶️</div>
                            </div>
                            <img src="https://images.unsplash.com/photo-1460518451285-cd3bd43a3572?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover opacity-50">
                        @endif
                        
                        <div class="absolute top-4 left-4 z-20 flex gap-2">
                            <span class="px-3 py-1 {{ $media->category === 'tuto' ? 'bg-blue-500' : 'bg-amber-500' }} text-white rounded-full text-[9px] font-black uppercase tracking-widest shadow-sm">
                                {{ $media->category === 'tuto' ? 'Tutoriel' : 'Formation' }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8">
                        <h3 class="text-2xl font-serif font-bold text-zinc-900 mb-3 leading-tight">{{ $media->title }}</h3>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-8 h-12 line-clamp-2 italic">
                            {{ $media->description ?? 'Ressource pédagogique pour les ateliers théâtre.' }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest">
                                <span class="text-theatre-red">👤</span> {{ $media->user ? $media->user->name : 'Admin' }}
                            </div>
                            <a href="{{ $media->type === 'video' ? $media->file_path : asset('storage/' . $media->file_path) }}" 
                               target="_blank"
                               class="bg-zinc-900 text-white px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-black transition-all shadow-md">
                                {{ $media->type === 'document' ? 'Télécharger' : 'Consulter' }}
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 text-center">
                    <div class="text-8xl mb-8 grayscale opacity-20">📚</div>
                    <h2 class="text-3xl font-serif font-bold text-zinc-400 mb-2">Pas encore de ressources</h2>
                    <p class="text-zinc-400">Les fiches d'ateliers seront disponibles très bientôt !</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
