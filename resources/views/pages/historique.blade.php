@extends('layouts.app')

@section('title', 'Notre Histoire - Théâtre Ça Respire Encore')

@section('content')
<section class="relative bg-zinc-950 py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1516307362428-3e4360dc3a95?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" class="w-full h-full object-cover grayscale">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 bg-white/10 text-white text-[10px] font-black uppercase tracking-[0.4em] rounded-lg mb-8 border border-white/20">Depuis 1991</span>
        <h1 class="text-6xl md:text-9xl font-bold text-white mb-8 font-serif leading-none tracking-tighter">
            L'Âme du <br>
            <span class="text-theatre-red italic">Théâtre.</span>
        </h1>
    </div>
</section>

<section class="py-24 bg-[#FDFDFC]">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="space-y-16">
            <!-- Episode 1 -->
            <div class="flex flex-col md:flex-row gap-12 items-start">
                <div class="md:w-1/3 pt-2">
                    <span class="text-4xl font-serif italic text-theatre-red">1991</span>
                    <h3 class="text-xl font-black text-zinc-900 uppercase tracking-widest mt-2">La Naissance</h3>
                </div>
                <div class="md:w-2/3 space-y-6">
                    <p class="text-xl text-zinc-800 leading-relaxed font-medium">
                        Tout commence dans la grange de Daniel Pierson à Reillon. Avec Kiki Paquier, ils transforment cet espace de travail en un lieu d'expérimentation théâtrale.
                    </p>
                    <p class="text-zinc-500 leading-relaxed">
                        Le nom "Ça Respire Encore" s'impose comme un manifeste : malgré les difficultés, malgré le temps qui passe, l'art doit continuer de respirer, de vibrer et de déranger.
                    </p>
                </div>
            </div>

            <div class="h-px bg-zinc-100 w-full"></div>

            <!-- Episode 2 -->
            <div class="flex flex-col md:flex-row gap-12 items-start">
                <div class="md:w-1/3 pt-2">
                    <span class="text-4xl font-serif italic text-theatre-red">2002</span>
                    <h3 class="text-xl font-black text-zinc-900 uppercase tracking-widest mt-2">Nancy</h3>
                </div>
                <div class="md:w-2/3 space-y-6">
                    <p class="text-xl text-zinc-800 leading-relaxed font-medium">
                        La compagnie s'installe au 110 rue Saint-Dizier à Nancy.
                    </p>
                    <p class="text-zinc-500 leading-relaxed">
                        Pendant plus de 10 ans, le théâtre devient une halte incontournable. On y croise des textes contemporains, des auteurs engagés et un public fidèle qui apprécie la proximité charnelle avec le texte. C'est ici que l'esprit des "Amuse-gueules" se fortifie.
                    </p>
                </div>
            </div>

            <div class="h-px bg-zinc-100 w-full"></div>

            <!-- Episode 3 -->
            <div class="flex flex-col md:flex-row gap-12 items-start">
                <div class="md:w-1/3 pt-2">
                    <span class="text-4xl font-serif italic text-theatre-red">Aujourd'hui</span>
                    <h3 class="text-xl font-black text-zinc-900 uppercase tracking-widest mt-2">Retour aux sources</h3>
                </div>
                <div class="md:w-2/3 space-y-6">
                    <p class="text-xl text-zinc-800 leading-relaxed font-medium">
                        Le théâtre retrouve son écrin originel à Reillon.
                    </p>
                    <p class="text-zinc-500 leading-relaxed">
                        Plus qu'un repli, c'est un épanouissement. Dans ce village lorrain, "Ça Respire Encore" propose désormais des résidences d'artistes, des créations originales et continue de transmettre sa passion à travers des ateliers pour tous les âges.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-zinc-100 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
            <h2 class="text-5xl font-serif font-black text-zinc-900 italic">La Presse en parle</h2>
            <p class="text-zinc-500 max-w-md">Quelques morceaux choisis de la critique locale au fil des décennies.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <div class="bg-white p-12 rounded-[3rem] shadow-xl transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                <p class="text-[10px] font-black uppercase tracking-widest text-theatre-red mb-6 italic">L'Est Républicain</p>
                <blockquote class="text-2xl font-serif font-bold text-zinc-800 leading-tight mb-8">
                    "Un théâtre de proximité où l'on sent le souffle des comédiens. Daniel Pierson réussit le pari de l'intimité sans compromis."
                </blockquote>
                <div class="h-px bg-zinc-100 w-16 mb-6"></div>
                <p class="text-zinc-400 text-sm italic">Édition du 14 Juin 2012</p>
            </div>

            <div class="bg-white p-12 rounded-[3rem] shadow-xl transform rotate-1 hover:rotate-0 transition-transform duration-500">
                <p class="text-[10px] font-black uppercase tracking-widest text-theatre-red mb-6 italic">Critique Culturelle</p>
                <blockquote class="text-2xl font-serif font-bold text-zinc-800 leading-tight mb-8">
                    "Ouf, ça respire encore ! Un lieu rare qui privilégie le sens à l'esbroufe."
                </blockquote>
                <div class="h-px bg-zinc-100 w-16 mb-6"></div>
                <p class="text-zinc-400 text-sm italic">Le Républicain Lorrain</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-serif font-bold text-zinc-900 mb-12 italic">Ils ont fait battre ce cœur...</h2>
        <div class="flex flex-wrap justify-center gap-x-12 gap-y-6 text-zinc-400 font-bold uppercase tracking-widest text-xs">
            <span>Daniel Pierson</span>
            <span>Kiki Paquier</span>
            <span>Hajar</span>
            <span>Et tant d'autres...</span>
        </div>
    </div>
</section>
@endsection
