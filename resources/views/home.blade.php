@extends('layouts.app')

@section('title', 'Accueil - Théâtre Ça Respire Encore')

@section('content')
<!-- Hero Section -->
<section class="bg-theatre-red pt-12 pb-24 md:py-20 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-center text-center text-white">
            <!-- Collage Image -->
            <div class="relative w-full max-w-lg mb-12">
                <div class="bg-theatre-cream p-4 rounded-xl shadow-2xl transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                    <img src="{{ asset('images/hero.png') }}" alt="Théâtre Ça Respire Encore" class="w-full h-auto rounded-lg">
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-red-400/20 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
            </div>

            <h1 class="text-4xl md:text-6xl font-bold font-serif mb-4 tracking-tight">
                Théâtre Ça Respire Encore
            </h1>
            <p class="text-xl md:text-2xl text-white/80 mb-10 font-medium">
                Reillon - Grand Est
            </p>
            <a href="{{ route('events.index') }}" class="bg-white text-theatre-red px-10 py-4 rounded-full font-bold text-lg shadow-xl hover:bg-zinc-100 transition-all hover:scale-105 active:scale-95">
                Voir le programme
            </a>
        </div>
    </div>
</section>

<!-- Categories Bar -->
<section class="container mx-auto px-4 -mt-12 relative z-10">
    <div class="bg-white rounded-2xl shadow-xl p-4 md:p-6 flex flex-wrap justify-center gap-4 border border-zinc-100">
        <button class="flex items-center gap-2 px-6 py-3 rounded-xl hover:bg-zinc-50 transition-colors border border-zinc-100 group">
            <span class="text-2xl group-hover:scale-110 transition-transform">🎭</span>
            <span class="font-bold">Spectacles</span>
        </button>
        <button class="flex items-center gap-2 px-6 py-3 rounded-xl hover:bg-zinc-50 transition-colors border border-zinc-100 group">
            <span class="text-2xl group-hover:scale-110 transition-transform">👥</span>
            <span class="font-bold">Résidences</span>
        </button>
        <button class="flex items-center gap-2 px-6 py-3 rounded-xl hover:bg-zinc-50 transition-colors border border-zinc-100 group">
            <span class="text-2xl group-hover:scale-110 transition-transform">📖</span>
            <span class="font-bold">Amuse-gueules</span>
        </button>
        <button class="flex items-center gap-2 px-6 py-3 rounded-xl hover:bg-zinc-50 transition-colors border border-zinc-100 group">
            <span class="text-2xl group-hover:scale-110 transition-transform">🎓</span>
            <span class="font-bold">Ateliers</span>
        </button>
    </div>
</section>

<!-- Upcoming Section -->
<section class="container mx-auto px-4 py-20">
    <h2 class="text-3xl font-bold mb-12 flex items-center gap-4">
        Prochainement
        <div class="h-1 flex-1 bg-zinc-100 rounded-full"></div>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Card 1 -->
        <div class="card-premium group">
            <div class="relative h-64 overflow-hidden">
                <div class="absolute top-4 left-4 bg-theatre-red text-white text-xs font-bold px-3 py-1 rounded-full z-10">Spectacle</div>
                <img src="https://images.unsplash.com/photo-1507676184212-d03ab07a01bf?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Spectacle" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                    <button class="w-full bg-white text-theatre-red font-bold py-2 rounded-lg">En savoir plus</button>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2 group-hover:text-theatre-red transition-colors">"Il faut être satisfait"</h3>
                <p class="text-zinc-500 text-sm mb-4">Cie le Joli Collectif</p>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-1 text-zinc-600">
                        <span>📅</span> 31 mars > 1er avril
                    </div>
                    <a href="#" class="btn-red text-xs px-4">Réserver</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card-premium group">
            <div class="relative h-64 overflow-hidden">
                <div class="absolute top-4 left-4 bg-theatre-red text-white text-xs font-bold px-3 py-1 rounded-full z-10">Spectacle</div>
                <img src="https://images.unsplash.com/photo-1470229722913-d7bdba59cdf8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Spectacle" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                    <button class="w-full bg-white text-theatre-red font-bold py-2 rounded-lg">En savoir plus</button>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2 group-hover:text-theatre-red transition-colors">"Tout va bien, merci !"</h3>
                <p class="text-zinc-500 text-sm mb-4">Cie Ça respire encore</p>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-1 text-zinc-600">
                        <span>📅</span> 11 au 15 avril
                    </div>
                    <a href="#" class="btn-red text-xs px-4">Réserver</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card-premium group">
            <div class="relative h-64 overflow-hidden">
                <div class="absolute top-4 left-4 bg-theatre-red text-white text-xs font-bold px-3 py-1 rounded-full z-10">Spectacle</div>
                <img src="https://images.unsplash.com/photo-1514525253344-9914f25af2d9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Spectacle" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                    <button class="w-full bg-white text-theatre-red font-bold py-2 rounded-lg">En savoir plus</button>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2 group-hover:text-theatre-red transition-colors">"Un soir avec Samuel Beckett"</h3>
                <p class="text-zinc-500 text-sm mb-4">Cie Ça respire encore</p>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-1 text-zinc-600">
                        <span>📅</span> 13 avril
                    </div>
                    <a href="#" class="btn-red text-xs px-4">Réserver</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
