@extends('layouts.app')

@section('title', 'Le Lieu - Théâtre Ça Respire Encore')

@section('content')
<section class="relative bg-zinc-900 py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-40">
        <img src="https://images.unsplash.com/photo-1507676184212-d03ab07a01bf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Theatre Interior" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 bg-theatre-red text-white text-[10px] font-black uppercase tracking-[0.3em] rounded-lg mb-6 shadow-lg">Espace de Création</span>
            <h1 class="text-6xl md:text-8xl font-bold text-white mb-8 font-serif leading-none">Le Lieu</h1>
            <p class="text-xl text-zinc-300 leading-relaxed italic max-w-xl">
                Une ancienne grange devenue théâtre, où chaque pierre raconte une histoire de passion et de partage.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div class="space-y-8">
                <div class="space-y-4">
                    <h2 class="text-4xl font-serif font-bold text-zinc-900">Une salle intimiste à Reillon</h2>
                    <p class="text-zinc-600 leading-relaxed text-lg">
                        Situé au cœur du village de Reillon en Meurthe-et-Moselle, notre théâtre offre une proximité rare entre l'artiste et son public. Avec une jauge de 50 places, chaque représentation devient un moment privilégié.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="p-6 bg-zinc-50 rounded-3xl border border-zinc-100 space-y-3">
                        <div class="text-2xl">📏</div>
                        <h4 class="font-bold text-zinc-900">Dimensions</h4>
                        <p class="text-zinc-500 text-sm">Plateau de 6m x 5m. Hauteur sous plafond de 4m.</p>
                    </div>
                    <div class="p-6 bg-zinc-50 rounded-3xl border border-zinc-100 space-y-3">
                        <div class="text-2xl">👥</div>
                        <h4 class="font-bold text-zinc-900">Capacité</h4>
                        <p class="text-zinc-500 text-sm">50 places assises en configuration gradins.</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-square rounded-[3rem] overflow-hidden shadow-2xl rotate-3">
                    <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Salle" class="w-full h-full object-cover">
                </div>
                <div class="absolute -bottom-10 -left-10 bg-theatre-red text-white p-8 rounded-[2rem] shadow-xl -rotate-6 hidden md:block">
                    <p class="text-4xl font-black italic">50</p>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-80">Places</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-zinc-950 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-4xl font-serif font-bold mb-6 italic">Détails Techniques</h2>
            <p class="text-zinc-400">Pour les compagnies en résidence ou en tournée, voici nos équipements professionnels.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-zinc-900 p-10 rounded-[3rem] border border-white/5 space-y-6">
                <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-3xl">💡</div>
                <h3 class="text-2xl font-bold">Lumières</h3>
                <ul class="text-zinc-400 space-y-3 text-sm">
                    <li class="flex items-center gap-2"><span>•</span> Console DMX 24 circuits</li>
                    <li class="flex items-center gap-2"><span>•</span> 12 Projecteurs PC 650W</li>
                    <li class="flex items-center gap-2"><span>•</span> 4 Découpes</li>
                    <li class="flex items-center gap-2"><span>•</span> Gradateurs numériques</li>
                </ul>
            </div>
            <div class="bg-zinc-900 p-10 rounded-[3rem] border border-white/5 space-y-6">
                <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-3xl">🔊</div>
                <h3 class="text-2xl font-bold">Son</h3>
                <ul class="text-zinc-400 space-y-3 text-sm">
                    <li class="flex items-center gap-2"><span>•</span> Table de mixage Yamaha 12 voies</li>
                    <li class="flex items-center gap-2"><span>•</span> Système de diffusion actif 2.1</li>
                    <li class="flex items-center gap-2"><span>•</span> 2 Micros HF</li>
                    <li class="flex items-center gap-2"><span>•</span> Lecteurs multi-supports</li>
                </ul>
            </div>
            <div class="bg-zinc-900 p-10 rounded-[3rem] border border-white/5 space-y-6">
                <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-3xl">🎭</div>
                <h3 class="text-2xl font-bold">Scène</h3>
                <ul class="text-zinc-400 space-y-3 text-sm">
                    <li class="flex items-center gap-2"><span>•</span> Pendillages noirs</li>
                    <li class="flex items-center gap-2"><span>•</span> Sol bois (sapin)</li>
                    <li class="flex items-center gap-2"><span>•</span> Loges équipées (douche, miroir)</li>
                    <li class="flex items-center gap-2"><span>•</span> Accès décor facile</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="bg-zinc-50 rounded-[4rem] p-12 lg:p-20 flex flex-col lg:flex-row gap-16 items-center shadow-inner">
            <div class="lg:w-1/2 space-y-8">
                <h2 class="text-4xl font-serif font-bold text-zinc-900">Venir à Reillon</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-white rounded-2xl shadow-sm flex items-center justify-center text-xl shrink-0">🚗</div>
                        <div>
                            <h4 class="font-bold text-zinc-900">En voiture</h4>
                            <p class="text-zinc-500 text-sm">À 15 minutes de Lunéville via la N4. À 45 minutes de Nancy.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-white rounded-2xl shadow-sm flex items-center justify-center text-xl shrink-0">📍</div>
                        <div>
                            <h4 class="font-bold text-zinc-900">Coordonnées</h4>
                            <p class="text-zinc-500 text-sm">Théâtre Ça Respire Encore, 54450 Reillon.</p>
                        </div>
                    </div>
                </div>
                <a href="https://www.google.com/maps/dir/?api=1&destination=Reillon+54450" target="_blank" class="inline-block bg-zinc-900 text-white px-10 py-4 rounded-full font-bold hover:bg-theatre-red transition-all shadow-xl">
                    Ouvrir l'itinéraire GPS
                </a>
            </div>
            <div class="lg:w-1/2 w-full h-[400px] rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2639.680327341818!2d6.745423!3d48.599186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4793836d50f878f1%3A0x40a820464c23ba0!2s54450%20Reillon!5e0!3m2!1sfr!2sfr!4v1714488000000!5m2!1sfr!2sfr" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection
