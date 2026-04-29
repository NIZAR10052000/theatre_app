@extends('layouts.app')

@section('title', 'Accueil - Théâtre Ça Respire Encore')

@section('content')
<!-- Hero Section -->
<section class="relative pt-24 pb-32 md:pt-36 md:pb-48 overflow-hidden bg-zinc-950 border-b border-zinc-900">
    <!-- Effets de lumière dramatiques (Spotlight) -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-theatre-red/20 via-zinc-950 to-zinc-950"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-theatre-red/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-16">
            <div class="flex-1 text-center lg:text-left max-w-2xl">
                <!-- Badge Classe -->
                <div class="inline-flex items-center gap-3 px-6 py-2 mb-8 border border-white/10 rounded-full bg-white/5 backdrop-blur-md">
                    <span class="w-2.5 h-2.5 rounded-full bg-theatre-red shadow-[0_0_12px_rgba(198,40,40,0.8)] animate-pulse"></span>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-300">Compagnie de théâtre</span>
                </div>
                
                <h1 class="text-6xl md:text-[6.5rem] font-black font-serif mb-8 tracking-tighter leading-[1.05] text-white">
                    Ça Respire <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-theatre-red to-red-400 italic pr-4">Encore.</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-zinc-400 mb-12 font-medium leading-relaxed max-w-xl">
                    Un espace de liberté artistique au cœur de Reillon. Création, diffusion et formation.
                </p>
                
                <div class="flex flex-wrap gap-6 justify-center lg:justify-start">
                    <a href="{{ route('events.index') }}" class="group relative px-10 py-4 font-bold text-lg rounded-full overflow-hidden bg-theatre-red text-white shadow-[0_0_40px_rgba(198,40,40,0.3)] hover:shadow-[0_0_60px_rgba(198,40,40,0.5)] transition-all duration-300">
                        <span class="relative z-10">Découvrir l'Agenda</span>
                        <div class="absolute inset-0 h-full w-0 bg-white/20 group-hover:w-full transition-all duration-300 ease-out"></div>
                    </a>
                    <a href="#about" class="px-10 py-4 font-bold text-lg rounded-full border border-zinc-700 text-zinc-300 hover:text-white hover:border-zinc-500 hover:bg-white/5 transition-all duration-300">
                        Notre Histoire
                    </a>
                </div>
            </div>
            
            <div class="flex-1 relative flex justify-center lg:justify-end w-full perspective-1000">
                <!-- Conteneur d'image avec style théâtre -->
                <div class="relative w-full max-w-lg">
                    <!-- Douce lueur derrière l'image -->
                    <div class="absolute -inset-4 bg-gradient-to-tr from-theatre-red/40 to-transparent blur-2xl rounded-[3rem] z-0 opacity-70"></div>
                    
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl border border-white/10 z-10 bg-zinc-900 transform transition-transform duration-700 hover:scale-[1.02] group">
                        <img src="{{ asset('images/photo1.jpg') }}" alt="Théâtre Ça Respire Encore" class="w-full h-auto object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                        
                        <!-- Effet de vignette sombre sur les bords -->
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/80 via-transparent to-transparent pointer-events-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Bar -->
<section class="container mx-auto px-4 -mt-24 relative z-20 mb-12">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-5xl mx-auto">
        <a href="{{ route('events.index', ['category' => 'Spectacles']) }}" class="flex flex-col items-center justify-center p-6 rounded-[2rem] bg-white/90 backdrop-blur-md shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group border border-white/40">
            <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-sm border border-red-100">
                <span class="text-3xl">🎭</span>
            </div>
            <span class="font-bold text-zinc-800">Spectacles</span>
        </a>
        <a href="{{ route('events.index', ['category' => 'Résidences']) }}" class="flex flex-col items-center justify-center p-6 rounded-[2rem] bg-white/90 backdrop-blur-md shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group border border-white/40">
            <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-sm border border-red-100">
                <span class="text-3xl">👥</span>
            </div>
            <span class="font-bold text-zinc-800">Résidences</span>
        </a>
        <a href="{{ route('events.index', ['category' => 'Amuse-gueules']) }}" class="flex flex-col items-center justify-center p-6 rounded-[2rem] bg-white/90 backdrop-blur-md shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group border border-white/40">
            <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-sm border border-red-100">
                <span class="text-3xl">🍷</span>
            </div>
            <span class="font-bold text-zinc-800">Amuse-gueules</span>
        </a>
        <a href="{{ route('ateliers') }}" class="flex flex-col items-center justify-center p-6 rounded-[2rem] bg-white/90 backdrop-blur-md shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group border border-white/40">
            <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-sm border border-red-100">
                <span class="text-3xl">🎓</span>
            </div>
            <span class="font-bold text-zinc-800">Ateliers</span>
        </a>
    </div>
</section>

<!-- Présentation Section -->
<section id="about" class="container mx-auto px-4 py-20">
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
                        <p class="text-zinc-400 leading-relaxed">
                            Fondée en 1991 par <strong>Daniel Pierson</strong> et <strong>Kiki Paquier</strong>, la compagnie s'est installée en 2002 rue Saint-Dizier à Nancy avant de trouver son nouveau souffle à Reillon. 
                            Ici, même si l'on vient de la plus pure tradition théâtrale, on prend soin de prendre le spectateur par la main pour un moment de convivialité naturelle.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <span class="px-4 py-1 bg-theatre-red rounded-full text-[10px] font-bold uppercase tracking-wider">1991 : Création</span>
                            <span class="px-4 py-1 bg-white/10 rounded-full text-[10px] font-bold uppercase tracking-wider">2002 : Nancy St-Dizier</span>
                            <span class="px-4 py-1 bg-white/10 rounded-full text-[10px] font-bold uppercase tracking-wider">Aujourd'hui : Reillon</span>
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

<!-- Combined Section: Amuse-Gueules & Presse -->
<section class="py-24 bg-white/30 backdrop-blur-sm border-y border-zinc-100 relative overflow-hidden">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-start">
            
            <!-- Column 1: Amuse-Gueules -->
            <div class="space-y-10">
                <div class="inline-flex items-center gap-3 px-4 py-1.5 bg-theatre-red/5 rounded-full border border-theatre-red/10">
                    <span class="w-2 h-2 rounded-full bg-theatre-red"></span>
                    <span class="text-xs font-black uppercase tracking-widest text-theatre-red">Le Concept</span>
                </div>
                
                <div class="relative group max-w-xs">
                    <div class="absolute -inset-4 bg-theatre-red/5 rounded-[3rem] blur-2xl group-hover:bg-theatre-red/10 transition-colors duration-500"></div>
                    <div class="relative bg-theatre-red text-white p-8 rounded-[2rem] shadow-2xl transform -rotate-2 hover:rotate-0 transition-all duration-700 overflow-hidden">
                        <div class="absolute -left-5 top-1/2 -translate-y-1/2 w-10 h-10 bg-[#FDFDFC]/10 rounded-full border border-white/20"></div>
                        <div class="absolute -right-5 top-1/2 -translate-y-1/2 w-10 h-10 bg-[#FDFDFC]/10 rounded-full border border-white/20"></div>
                        <div class="border-2 border-white/20 rounded-2xl p-6 text-center space-y-4">
                            <span class="text-5xl font-black italic">3€</span>
                            <div class="h-px bg-white/20 w-full"></div>
                            <div class="font-serif italic text-base text-red-100 leading-relaxed">
                                <p>Spectacle • Tartine • Vin</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h2 class="text-4xl font-serif font-black text-zinc-900 leading-tight">Les Amuse-gueules</h2>
                    <p class="text-zinc-600 text-lg leading-relaxed italic border-l-4 border-theatre-red/20 pl-4">
                        "Lecture de texte, un verre de vin dans une main et une tartine dans l'autre..."
                    </p>
                    <p class="text-zinc-500 text-sm leading-relaxed">
                        Une ambiance guinguette sans prétention, pétrie de convivialité naturelle. 
                        <strong>Les trois coups. Rideau !</strong>
                    </p>
                </div>
            </div>

            <!-- Column 2: Presse -->
            <div class="space-y-10">
                <div class="inline-flex items-center gap-3 px-4 py-1.5 bg-zinc-100 rounded-full border border-zinc-200">
                    <span class="w-2 h-2 rounded-full bg-zinc-400"></span>
                    <span class="text-xs font-black uppercase tracking-widest text-zinc-500">Ils en parlent</span>
                </div>

                <div class="bg-white p-3 rounded-[2rem] shadow-2xl rotate-1 hover:rotate-0 transition-transform duration-500 max-w-xs border border-zinc-100">
                    <img src="{{ asset('images/photo3.jpg') }}" alt="Article de Presse" class="w-full h-auto rounded-[1.5rem]">
                </div>

                <div class="space-y-4">
                    <h2 class="text-4xl font-black text-zinc-900 leading-tight tracking-tight">"Ouf, ça respire <span class="text-theatre-red">encore !</span>"</h2>
                    <p class="text-zinc-600 text-lg leading-relaxed italic border-l-4 border-zinc-200 pl-4">
                        Le goût du théâtre plus fort que tout. Une aventure qui vibre à travers les saisons.
                    </p>
                    <p class="text-zinc-500 text-sm leading-relaxed">
                        Retrouvez nos actualités et revues de presse régulières dans les journaux locaux.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Lieu & Details Section -->
<section id="lieu" class="bg-white/60 backdrop-blur-md py-24 relative z-20 border-y border-white/40 shadow-sm">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-serif font-black text-zinc-900 mb-4 tracking-tight">Le Lieu</h2>
            <p class="text-zinc-600 text-lg font-medium">Une salle intimiste équipée professionnellement</p>
        </div>

        <!-- Carte Localisation Reillon -->
        <div class="mb-16 bg-white border border-zinc-100 rounded-[2rem] p-8 md:p-12 shadow-sm flex flex-col lg:flex-row gap-12 items-center">
            <div class="flex-1 space-y-6">
                <h3 class="text-3xl font-bold text-zinc-900">Reillon (54)</h3>
                <p class="text-zinc-600 text-lg leading-relaxed">
                    Le théâtre est situé au cœur du village de Reillon, dans un cadre verdoyant et paisible, propice à la création.
                </p>
                <div class="space-y-6 pt-4">
                    <div class="flex items-start gap-4">
                        <span class="text-2xl mt-1">🚗</span>
                        <p class="text-zinc-600 text-base">
                            <strong class="text-zinc-900 font-bold block mb-1">Itinéraire :</strong>
                            À 15 min de Lunéville, accès facile par la N4 (sortie Blâmont).
                        </p>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="text-2xl mt-1">🗺️</span>
                        <p class="text-zinc-600 text-base">
                            <strong class="text-zinc-900 font-bold block mb-1">Adresse :</strong>
                            Reillon, Meurthe-et-Moselle.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex-1 w-full">
                <div class="bg-zinc-100 rounded-[1.5rem] overflow-hidden shadow-inner h-64 md:h-80 w-full relative flex items-center justify-center border border-zinc-200/50">
                    <img src="{{ asset('images/photo7.jpg') }}" alt="Carte de Reillon" class="absolute inset-0 w-full h-full object-cover z-20">
                    <span class="text-zinc-400 font-medium italic z-10 relative">Carte de Reillon</span>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-10">
            <div class="relative rounded-[2.5rem] overflow-hidden group h-80 shadow-xl border border-zinc-100">
                <img src="{{ asset('images/photo4.jpg') }}" alt="Salle principale" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 text-left">
                    <h3 class="text-2xl font-bold text-white mb-2 drop-shadow-md">Salle principale</h3>
                    <p class="text-zinc-200 text-sm font-medium drop-shadow-md">Capacité 50 places • Configuration modulable</p>
                </div>
            </div>
            <div class="relative rounded-[2.5rem] overflow-hidden group h-80 shadow-xl border border-zinc-100">
                <img src="{{ asset('images/photo6.jpg') }}" alt="Plateau professionnel" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 text-left">
                    <h3 class="text-2xl font-bold text-white mb-2 drop-shadow-md">Plateau professionnel</h3>
                    <p class="text-zinc-200 text-sm font-medium drop-shadow-md">Éclairage scénique • Acoustique optimale</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white border border-zinc-100 rounded-[2rem] p-8 hover:shadow-xl transition-shadow shadow-sm">
                <div class="w-14 h-14 rounded-2xl bg-red-50 flex items-center justify-center mb-6 text-theatre-red shadow-inner border border-red-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-zinc-900 mb-2">Son</h4>
                <p class="text-zinc-500 text-sm leading-relaxed">Système professionnel • Micro HF</p>
            </div>
            
            <div class="bg-white border border-zinc-100 rounded-[2rem] p-8 hover:shadow-xl transition-shadow shadow-sm">
                <div class="w-14 h-14 rounded-2xl bg-red-50 flex items-center justify-center mb-6 text-theatre-red shadow-inner border border-red-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-zinc-900 mb-2">Lumière</h4>
                <p class="text-zinc-500 text-sm leading-relaxed">Console DMX • Projecteurs LED</p>
            </div>

            <div class="bg-white border border-zinc-100 rounded-[2rem] p-8 hover:shadow-xl transition-shadow shadow-sm">
                <div class="w-14 h-14 rounded-2xl bg-red-50 flex items-center justify-center mb-6 text-theatre-red shadow-inner border border-red-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-zinc-900 mb-2">Plateau</h4>
                <p class="text-zinc-500 text-sm leading-relaxed">8m × 6m • Configuration modulable</p>
            </div>
        </div>
    </div>
</section>




@endsection
