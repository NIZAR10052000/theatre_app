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
                    <a href="{{ route('pages.historique') }}" class="px-10 py-4 font-bold text-lg rounded-full border border-zinc-700 text-zinc-300 hover:text-white hover:border-zinc-500 hover:bg-white/5 transition-all duration-300">
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
                        <img src="{{ asset('images/photo1.JPG') }}" alt="Théâtre Ça Respire Encore - Le Pas Fleuri" class="w-full h-auto object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                        
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
        <a href="{{ route('media.ateliers') }}" class="flex flex-col items-center justify-center p-6 rounded-[2rem] bg-white/90 backdrop-blur-md shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group border border-white/40">
            <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-sm border border-red-100">
                <span class="text-3xl">🎓</span>
            </div>
            <span class="font-bold text-zinc-800">Ateliers</span>
        </a>
    </div>
</section>

<!-- Présentation Section -->
<section id="about" class="py-32 relative overflow-hidden bg-[#FDFDFC]">
    <!-- Background Decor -->
    <div class="absolute top-20 right-0 w-64 h-64 bg-theatre-red/5 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-20 left-0 w-96 h-96 bg-zinc-100 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="container mx-auto px-4 max-w-6xl relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
            
            <!-- Left Side: Narrative -->
            <div class="lg:w-1/2 space-y-12">
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="w-12 h-px bg-zinc-300"></span>
                        <span class="text-xs font-black uppercase tracking-[0.3em] text-zinc-400">Qui sommes-nous ?</span>
                    </div>
                    <h2 class="text-5xl md:text-6xl font-serif font-black text-zinc-900 leading-tight">
                        Une passion <br>
                        <span class="text-theatre-red italic italic">habitée.</span>
                    </h2>
                    <p class="text-zinc-600 leading-relaxed text-xl font-medium">
                        Le <span class="text-zinc-900 font-bold">Théâtre Ça Respire Encore</span> est bien plus qu'un lieu ; c'est un souffle créatif qui anime Reillon depuis ses racines lorraines.
                    </p>
                </div>

                <!-- History Timeline -->
                <div class="relative pl-8 border-l-2 border-zinc-100 space-y-10">
                    <div class="relative">
                        <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-white border-2 border-theatre-red shadow-sm"></div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-zinc-900 mb-2">1991 — La Naissance</h4>
                        <p class="text-zinc-500 text-sm leading-relaxed">
                            Daniel Pierson et Kiki Paquier posent les premières pierres d'une aventure humaine et artistique hors du commun.
                        </p>
                    </div>
                    <div class="relative">
                        <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-white border-2 border-zinc-200"></div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-zinc-900 mb-2">2002 — L'Étape Nancéienne</h4>
                        <p class="text-zinc-500 text-sm leading-relaxed">
                            Installation rue Saint-Dizier, le théâtre devient une halte incontournable du paysage culturel de Nancy.
                        </p>
                    </div>
                    <div class="relative">
                        <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-white border-2 border-zinc-200"></div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-zinc-900 mb-2">Aujourd'hui — Le Souffle de Reillon</h4>
                        <p class="text-zinc-500 text-sm leading-relaxed">
                            Un retour à l'essentiel, une salle intimiste où la proximité entre l'artiste et le spectateur est reine.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Side: The Portrait -->
            <div class="lg:w-1/2">
                <div class="relative group">
                    <!-- Photo Frame -->
                    <div class="bg-white p-6 pb-24 shadow-[0_30px_100px_rgba(0,0,0,0.1)] rounded-sm transform rotate-2 group-hover:rotate-0 transition-all duration-700 border border-zinc-50">
                        <div class="overflow-hidden bg-zinc-100">
                            <img src="{{ asset('images/photo2.jpg') }}" alt="Daniel Pierson" class="w-full h-auto opacity-95 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        
                        <!-- Signature Style Caption -->
                        <div class="absolute bottom-10 left-10 right-10">
                            <div class="flex justify-between items-end">
                                <div class="space-y-1">
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-zinc-400">Directeur Artistique</p>
                                    <h5 class="text-2xl font-serif italic text-zinc-900">Daniel Pierson</h5>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-zinc-300">Est. 1991</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative elements -->
                    <div class="absolute -top-10 -right-10 w-24 h-24 border-t-2 border-r-2 border-zinc-200 rounded-tr-3xl -z-10"></div>
                    <div class="absolute -bottom-10 -left-10 w-24 h-24 border-b-2 border-l-2 border-zinc-200 rounded-bl-3xl -z-10"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Combined Section: Amuse-Gueules & Presse -->
<section class="py-32 bg-zinc-950 text-white relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-theatre-red rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[30%] h-[30%] bg-zinc-800 rounded-full blur-[100px]"></div>
    </div>

    <div class="container mx-auto px-4 max-w-6xl relative z-10">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            
            <!-- Column 1: Editorial Content -->
            <div class="space-y-12">
                <div class="space-y-6">
                    <div class="inline-flex items-center gap-4">
                        <span class="h-px w-12 bg-theatre-red"></span>
                        <span class="text-xs font-black uppercase tracking-[0.4em] text-theatre-red">L'Esprit de la Compagnie</span>
                    </div>
                    <h2 class="text-5xl md:text-6xl font-serif font-black leading-[1.1] tracking-tight">
                        Une culture du <span class="italic text-theatre-red">partage</span> & de l'émotion.
                    </h2>
                </div>

                <div class="grid sm:grid-cols-2 gap-10">
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-zinc-100 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-sm">01</span>
                            Les Amuse-gueules
                        </h3>
                        <p class="text-zinc-400 text-sm leading-relaxed italic">
                            "Une lecture, une tartine et un verre de vin pour 3 euros... C'est la promesse d'une soirée où le texte respire avec vous."
                        </p>
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-zinc-100 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-sm">02</span>
                            La Presse
                        </h3>
                        <p class="text-zinc-400 text-sm leading-relaxed">
                            Plébiscité par le public et salué par la critique locale pour son audace et sa convivialité sans fard.
                        </p>
                    </div>
                </div>

                <div class="pt-6">
                    <a href="{{ route('events.index') }}" class="inline-flex items-center gap-4 px-8 py-4 bg-white text-zinc-950 rounded-full font-black text-sm hover:bg-theatre-red hover:text-white transition-all duration-500 shadow-xl shadow-white/5 group">
                        Découvrir le programme
                        <span class="transform group-hover:translate-x-2 transition-transform duration-300">→</span>
                    </a>
                </div>
            </div>

            <!-- Column 2: Visual Composition -->
            <div class="relative">
                <!-- Newspaper Clipping -->
                <div class="relative z-10 transform -rotate-3 hover:rotate-0 transition-transform duration-700">
                    <div class="absolute -inset-1 bg-gradient-to-tr from-white/20 to-transparent rounded-[2.5rem] blur-sm"></div>
                    <div class="relative bg-zinc-900 p-4 rounded-[2.5rem] shadow-2xl border border-white/5">
                        <img src="{{ asset('images/photo3.jpg') }}" alt="Presse" class="w-full h-auto rounded-[1.8rem] grayscale hover:grayscale-0 transition-all duration-1000">
                        <div class="absolute bottom-8 left-8 right-8 p-6 bg-black/60 backdrop-blur-xl border border-white/10 rounded-2xl">
                            <p class="text-[10px] font-black uppercase tracking-widest text-zinc-400 mb-2">Presse Locale</p>
                            <p class="text-lg font-serif italic text-white leading-tight">"Ouf, ça respire encore !"</p>
                        </div>
                    </div>
                </div>

                <!-- Floating Ticket -->
                <div class="absolute -bottom-12 -left-12 z-20 transform rotate-12 hover:rotate-0 transition-transform duration-700 cursor-pointer group">
                    <div class="bg-theatre-red text-white p-8 rounded-[2rem] shadow-[0_20px_50px_rgba(220,38,38,0.3)] border border-white/10 overflow-hidden relative">
                        <!-- Ticket Notches -->
                        <div class="absolute -left-4 top-1/2 -translate-y-1/2 w-8 h-8 bg-zinc-950 rounded-full border border-white/5"></div>
                        <div class="absolute -right-4 top-1/2 -translate-y-1/2 w-8 h-8 bg-zinc-950 rounded-full border border-white/5"></div>
                        
                        <div class="relative z-10 border-2 border-white/20 rounded-2xl p-6 text-center space-y-2">
                            <span class="block text-4xl font-black italic tracking-tighter">3€</span>
                            <div class="h-px bg-white/20 w-full"></div>
                            <span class="block text-[10px] font-black uppercase tracking-[0.2em] text-red-200">Tout Compris</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Lieu & Details Section -->
<section id="lieu" class="py-32 bg-white relative">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="flex flex-col lg:flex-row justify-between items-end mb-16 gap-8">
            <div class="max-w-2xl space-y-4">
                <div class="inline-flex items-center gap-3 px-4 py-1.5 bg-zinc-100 rounded-full border border-zinc-200">
                    <span class="w-2 h-2 rounded-full bg-zinc-400"></span>
                    <span class="text-xs font-black uppercase tracking-widest text-zinc-500">Localisation</span>
                </div>
                <h2 class="text-5xl font-serif font-black text-zinc-900 leading-tight">Le Lieu</h2>
                <p class="text-zinc-500 text-lg">Une salle intimiste équipée professionnellement au cœur de Reillon.</p>
            </div>
            <div class="hidden lg:block pb-2">
                <span class="text-xs font-black uppercase tracking-[0.4em] text-zinc-300">Scénographie • Acoustique • Convivialité</span>
            </div>
        </div>

        <!-- Main Location Card -->
        <div class="mb-12 bg-zinc-50 rounded-[3rem] overflow-hidden border border-zinc-100 shadow-sm flex flex-col lg:flex-row group">
            <div class="flex-1 p-12 lg:p-16 space-y-8">
                <div class="space-y-4">
                    <h3 class="text-3xl font-black text-zinc-900">Reillon (54)</h3>
                    <p class="text-zinc-500 text-lg leading-relaxed">
                        Le théâtre s'inscrit dans un cadre verdoyant et paisible, offrant une atmosphère propice à la concentration et à l'émotion partagée.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 gap-8 pt-4">
                    <div class="p-6 bg-white rounded-3xl shadow-sm border border-zinc-100 space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-xl">🚗</div>
                        <h4 class="font-bold text-zinc-900">Accès</h4>
                        <p class="text-zinc-500 text-sm">À 15 min de Lunéville, accès facile par la N4.</p>
                    </div>
                    <div class="p-6 bg-white rounded-3xl shadow-sm border border-zinc-100 space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-zinc-50 flex items-center justify-center text-xl">📍</div>
                        <h4 class="font-bold text-zinc-900">Adresse</h4>
                        <p class="text-zinc-500 text-sm">Village de Reillon, Meurthe-et-Moselle.</p>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Reillon+54450" target="_blank" class="inline-flex items-center gap-3 px-6 py-3 bg-zinc-900 text-white rounded-full font-black text-xs hover:bg-theatre-red transition-all duration-300 shadow-lg shadow-zinc-200 group">
                        <span>Calculer mon itinéraire</span>
                        <span class="transform group-hover:translate-x-1 transition-transform">↗</span>
                    </a>
                </div>
            </div>
            <div class="lg:w-1/2 relative min-h-[400px] overflow-hidden">
                <img src="{{ asset('images/photo7.jpg') }}" alt="Reillon" class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-1000">
                <div class="absolute inset-0 bg-gradient-to-l from-transparent via-transparent to-zinc-50/20"></div>
            </div>
        </div>

        <!-- Technical Spaces -->
        <div class="grid md:grid-cols-2 gap-10">
            <div class="relative group rounded-[3rem] overflow-hidden h-[500px] shadow-2xl">
                <img src="{{ asset('images/photo4.jpg') }}" alt="Salle principale" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/20 to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-12 space-y-4">
                    <div class="inline-block px-4 py-1 bg-white/10 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-white/20">50 Places</div>
                    <h3 class="text-4xl font-serif font-black text-white">Salle principale</h3>
                    <p class="text-zinc-300 text-base leading-relaxed">Une configuration modulable pour une expérience spectateur au plus proche du texte.</p>
                </div>
            </div>

            <div class="relative group rounded-[3rem] overflow-hidden h-[500px] shadow-2xl">
                <img src="{{ asset('images/photo6.jpg') }}" alt="Plateau professionnel" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/20 to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-12 space-y-4">
                    <div class="inline-block px-4 py-1 bg-theatre-red/20 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-theatre-red border border-theatre-red/30">Équipement Pro</div>
                    <h3 class="text-4xl font-serif font-black text-white">Plateau technique</h3>
                    <p class="text-zinc-300 text-base leading-relaxed">Éclairage scénique de pointe et acoustique optimisée pour une immersion totale.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="py-24 bg-zinc-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="space-y-6 group">
                <div class="w-16 h-16 rounded-2xl bg-white shadow-sm border border-zinc-100 flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-theatre-red group-hover:text-white transition-all duration-500">🔊</div>
                <h4 class="text-xl font-bold text-zinc-900">Acoustique</h4>
                <p class="text-zinc-500 text-sm leading-relaxed">Une isolation et une diffusion sonore pensées pour la pureté de la voix et du texte.</p>
            </div>
            <div class="space-y-6 group">
                <div class="w-16 h-16 rounded-2xl bg-white shadow-sm border border-zinc-100 flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-theatre-red group-hover:text-white transition-all duration-500">💡</div>
                <h4 class="text-xl font-bold text-zinc-900">Lumières</h4>
                <p class="text-zinc-500 text-sm leading-relaxed">Un parc technique professionnel permettant des ambiances scéniques riches et variées.</p>
            </div>
            <div class="space-y-6 group">
                <div class="w-16 h-16 rounded-2xl bg-white shadow-sm border border-zinc-100 flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-theatre-red group-hover:text-white transition-all duration-500">🎭</div>
                <h4 class="text-xl font-bold text-zinc-900">Modularité</h4>
                <p class="text-zinc-500 text-sm leading-relaxed">Un espace capable de s'adapter à toutes les formes de créations contemporaines.</p>
            </div>
        </div>
    </div>
</section>




@endsection
