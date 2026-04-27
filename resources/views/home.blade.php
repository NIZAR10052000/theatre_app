@extends('layouts.app')

@section('title', 'Accueil - Théâtre Ça Respire Encore')

@section('content')
<!-- Hero Section -->
<section class="bg-theatre-red pt-12 pb-32 md:py-28 overflow-hidden relative">
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="flex-1 text-center lg:text-left text-white">
                <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-bold uppercase tracking-widest mb-6">Compagnie de théâtre</span>
                <h1 class="text-5xl md:text-8xl font-black font-serif mb-6 tracking-tighter leading-none">
                    Ça Respire <br><span class="text-red-200">Encore</span>
                </h1>
                <p class="text-xl md:text-2xl text-white/80 mb-10 font-medium max-w-xl">
                    Un espace de liberté artistique au cœur de Reillon. Création, diffusion et formation.
                </p>
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                    <a href="{{ route('events.index') }}" class="bg-white text-theatre-red px-10 py-4 rounded-full font-bold text-lg shadow-xl hover:bg-zinc-100 transition-all hover:scale-105 active:scale-95">
                        Agenda 2026
                    </a>
                    <a href="#about" class="bg-red-800/40 backdrop-blur-md text-white border border-white/20 px-10 py-4 rounded-full font-bold text-lg hover:bg-red-800 transition-all">
                        Notre Histoire
                    </a>
                </div>
            </div>
            <div class="flex-1 relative">
                <div class="bg-white p-4 rounded-[3rem] shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-700">
                    <img src="{{ asset('images/photo1.jpg') }}" alt="Théâtre Ça Respire Encore - Collage" class="w-full h-auto rounded-[2.5rem]">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Bar -->
<section class="container mx-auto px-4 -mt-16 relative z-20">
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-4 md:p-8 flex flex-wrap justify-center gap-6 border border-white/20">
        <a href="{{ route('events.index', ['category' => 'Spectacles']) }}" class="flex items-center gap-3 px-8 py-4 rounded-2xl bg-zinc-50 hover:bg-theatre-red hover:text-white transition-all group border border-zinc-100">
            <span class="text-3xl group-hover:scale-110 transition-transform">🎭</span>
            <span class="font-bold">Spectacles</span>
        </a>
        <a href="{{ route('events.index', ['category' => 'Résidences']) }}" class="flex items-center gap-3 px-8 py-4 rounded-2xl bg-zinc-50 hover:bg-theatre-red hover:text-white transition-all group border border-zinc-100">
            <span class="text-3xl group-hover:scale-110 transition-transform">👥</span>
            <span class="font-bold">Résidences</span>
        </a>
        <a href="{{ route('events.index', ['category' => 'Amuse-gueules']) }}" class="flex items-center gap-3 px-8 py-4 rounded-2xl bg-zinc-50 hover:bg-theatre-red hover:text-white transition-all group border border-zinc-100">
            <span class="text-3xl group-hover:scale-110 transition-transform">🍷</span>
            <span class="font-bold">Amuse-gueules</span>
        </a>
        <a href="{{ route('ateliers') }}" class="flex items-center gap-3 px-8 py-4 rounded-2xl bg-zinc-50 hover:bg-theatre-red hover:text-white transition-all group border border-zinc-100">
            <span class="text-3xl group-hover:scale-110 transition-transform">🎓</span>
            <span class="font-bold">Ateliers</span>
        </a>
    </div>
</section>

<!-- Présentation Section -->
<section id="about" class="container mx-auto px-4 py-32">
    <div class="flex flex-col lg:flex-row items-center gap-20">
        <div class="flex-1 space-y-8">
            <h2 class="text-4xl md:text-5xl font-bold flex items-center gap-4 text-zinc-800">
                <span class="bg-theatre-red w-3 h-12 rounded-full"></span>
                🌿 Présentation
            </h2>
            <p class="text-zinc-600 leading-relaxed text-xl">
                Le <strong>Théâtre Ça Respire Encore</strong> est un lieu de création, de diffusion et de formation artistique situé aujourd'hui à Reillon. 
            </p>
            <div class="bg-zinc-900 text-white p-10 rounded-[3rem] shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold mb-4">🎬 Notre Histoire</h3>
                    <div class="space-y-6">
                        <p class="text-zinc-400">Fondée en 1991 par Daniel Pierson, la compagnie a tracé son chemin de Nancy à Reillon, portant haut les valeurs d'une culture exigeante et populaire.</p>
                        <div class="flex gap-4">
                            <span class="px-4 py-1 bg-theatre-red rounded-full text-xs font-bold">1991 : Création</span>
                            <span class="px-4 py-1 bg-white/10 rounded-full text-xs font-bold">2006 : Ouverture du lieu</span>
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-theatre-red/20 rounded-full blur-3xl"></div>
            </div>
        </div>
        <div class="flex-1">
            <div class="relative">
                <img src="{{ asset('images/photo2.jpg') }}" alt="Daniel Pierson" class="w-full h-auto rounded-[3rem] shadow-2xl">
                <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl border border-zinc-100">
                    <p class="text-zinc-400 text-[10px] font-black uppercase tracking-widest mb-1">Directeur Artistique</p>
                    <p class="text-xl font-black text-zinc-900">Daniel Pierson</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Presse Section -->
<section class="bg-zinc-100 py-32 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-20 items-center">
            <div class="flex-1 order-2 lg:order-1">
                <div class="bg-white p-4 rounded-2xl shadow-2xl rotate-1 hover:rotate-0 transition-transform duration-500">
                    <img src="{{ asset('images/photo3.jpg') }}" alt="Article de Presse" class="w-full h-auto rounded-xl">
                </div>
            </div>
            <div class="flex-1 order-1 lg:order-2 space-y-8">
                <h2 class="text-4xl md:text-6xl font-black text-zinc-900 leading-tight">
                    "Ouf, ça respire <span class="text-theatre-red">encore !</span>"
                </h2>
                <p class="text-zinc-600 text-xl leading-relaxed italic">
                    La presse en parle : le goût du théâtre plus fort que tout. Une aventure qui continue de vibrer à travers les saisons.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Lieu & Details Section -->
<section id="lieu" class="container mx-auto px-4 py-32">
    <div class="grid lg:grid-cols-2 gap-20 mb-20">
        <div class="space-y-12">
            <div>
                <h2 class="text-4xl font-bold flex items-center gap-4 text-zinc-800 mb-8">
                    <span class="bg-theatre-red w-3 h-12 rounded-full"></span>
                    🎭 Le Lieu
                </h2>
                <p class="text-zinc-600 text-lg mb-8 leading-relaxed">
                    Situé à Reillon, notre théâtre est un écrin chaleureux conçu pour la rencontre entre l'œuvre et son public.
                </p>
                <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-zinc-100 overflow-hidden mb-8">
                    <h3 class="text-xl font-bold mb-6 flex items-center gap-2">📍 Localisation & Accès</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3 text-zinc-700">
                            <span class="text-xl">🚗</span>
                            <p class="text-sm"><strong>Itinéraire :</strong> À 15 min de Lunéville, accès facile par la N4 (sortie Blâmont).</p>
                        </div>
                        <div class="flex items-start gap-3 text-zinc-700">
                            <span class="text-xl">🗺️</span>
                            <p class="text-sm"><strong>Adresse :</strong> Reillon, Meurthe-et-Moselle.</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-[3rem] overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/photo4.jpg') }}" alt="La Salle" class="w-full h-64 object-cover">
                </div>
            </div>
        </div>
        <div class="space-y-12">
            <h2 class="text-4xl font-bold flex items-center gap-4 text-zinc-800 mb-8">
                <span class="bg-theatre-red w-3 h-12 rounded-full"></span>
                🛠️ Détails Techniques
            </h2>
            <div class="grid grid-cols-1 gap-6">
                <div class="bg-zinc-900 text-white p-10 rounded-[3rem] shadow-xl relative overflow-hidden group hover:scale-[1.02] transition-transform">
                    <div class="relative z-10 grid grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-bold mb-4 text-theatre-red">🔊 Son</h3>
                            <ul class="text-zinc-400 space-y-2 text-xs">
                                <li>Console 12 voies</li>
                                <li>Système 4 enceintes</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-4 text-theatre-red">💡 Lumière</h3>
                            <ul class="text-zinc-400 space-y-2 text-xs">
                                <li>Console 24 circuits</li>
                                <li>Par 56, PC 650W</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-4 text-theatre-red">📐 Plateau</h3>
                            <ul class="text-zinc-400 space-y-2 text-xs">
                                <li>6m x 4m</li>
                                <li>H: 3.5m</li>
                            </ul>
                        </div>
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-theatre-red/10 rounded-full blur-3xl"></div>
                </div>
                
                <div class="bg-theatre-cream p-12 rounded-[3rem] border-2 border-dashed border-theatre-red/20 relative">
                    <h3 class="text-2xl font-bold mb-6">🍷 Les "Amuse-gueules"</h3>
                    <p class="text-zinc-500 mb-8">Un rendez-vous incontournable : apéro-lectures, convivialité et partage de textes.</p>
                    <div class="bg-white p-4 rounded-3xl shadow-xl transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/photo5.jpg') }}" alt="Archives Poster" class="w-full h-auto rounded-2xl">
                    </div>
                    <div class="absolute -top-6 -right-6 bg-theatre-red text-white px-6 py-2 rounded-full font-bold shadow-lg">
                        Archives
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Upcoming Section -->
<section class="bg-theatre-cream py-32">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-black mb-16 flex items-center gap-6">
            Prochainement
            <div class="h-1 flex-1 bg-zinc-200 rounded-full"></div>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @forelse($upcomingEvents as $event)
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-zinc-100 overflow-hidden group hover:shadow-2xl transition-all duration-700">
                    <div class="relative h-72 overflow-hidden">
                        <div class="absolute top-6 left-6 bg-theatre-red text-white text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-full z-10 shadow-lg">
                            {{ $event->category }}
                        </div>
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-zinc-100 flex items-center justify-center text-6xl group-hover:scale-110 transition-transform duration-1000">🎭</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                            <a href="{{ route('events.index') }}" class="w-full bg-white text-theatre-red font-bold py-3 rounded-xl text-center text-sm shadow-xl transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">Voir l'agenda complet</a>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-3 group-hover:text-theatre-red transition-colors line-clamp-1">
                            {{ $event->title }}
                        </h3>
                        <p class="text-zinc-400 text-sm mb-6 flex items-center gap-2">
                            <span class="text-theatre-red text-lg">📍</span> {{ $event->location }}
                        </p>
                        <div class="flex items-center justify-between pt-6 border-t border-zinc-50">
                            <div class="flex items-center gap-2 text-zinc-900 font-black uppercase tracking-tighter text-lg">
                                <span class="text-theatre-red">📅</span> {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d M') }}
                            </div>
                            <button class="bg-zinc-900 text-white text-[10px] px-6 py-2 rounded-full uppercase tracking-widest font-black hover:bg-theatre-red transition-colors">Réserver</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 py-32 text-center bg-white rounded-[3rem] border-4 border-dashed border-zinc-100">
                    <p class="text-zinc-400 font-bold text-2xl">Aucun événement à venir pour le moment.</p>
                    <a href="{{ route('events.index') }}" class="text-theatre-red font-black hover:underline mt-4 inline-block uppercase tracking-widest text-sm">Découvrir le programme →</a>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
