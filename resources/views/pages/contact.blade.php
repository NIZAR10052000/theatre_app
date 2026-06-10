@extends('layouts.app')

@section('title', 'Contact - Théâtre Ça Respire Encore')

@section('content')
<section class="relative bg-zinc-900 py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1534536281715-e28d76689b4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Contact" class="w-full h-full object-cover grayscale">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 bg-theatre-red text-white text-[10px] font-black uppercase tracking-[0.4em] rounded-lg mb-8">Nous contacter</span>
        <h1 class="text-6xl md:text-8xl font-bold text-white mb-8 font-serif leading-none tracking-tighter">
            Parlons de <br>
            <span class="text-theatre-red italic">Théâtre.</span>
        </h1>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        @if(session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-12 animate-bounce">
                ✅ {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-200 text-red-700 px-6 py-4 rounded-2xl mb-12 animate-bounce">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        <div class="grid lg:grid-cols-2 gap-20">
            <!-- Form Side -->
            <div class="space-y-12">
                <div class="space-y-4">
                    <h2 class="text-4xl font-serif font-bold text-zinc-900">Envoyez-nous un message</h2>
                    <p class="text-zinc-500">Une question sur un spectacle, une demande de résidence ou d'atelier ? Nous vous répondons au plus vite.</p>
                </div>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-zinc-400">Nom complet</label>
                            <input type="text" name="name" required class="w-full px-6 py-4 bg-zinc-50 border border-zinc-100 rounded-2xl outline-none focus:ring-2 focus:ring-theatre-red/20 focus:border-theatre-red transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-zinc-400">Email</label>
                            <input type="email" name="email" required class="w-full px-6 py-4 bg-zinc-50 border border-zinc-100 rounded-2xl outline-none focus:ring-2 focus:ring-theatre-red/20 focus:border-theatre-red transition-all">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-widest text-zinc-400">Sujet</label>
                        <select name="subject" class="w-full px-6 py-4 bg-zinc-50 border border-zinc-100 rounded-2xl outline-none focus:ring-2 focus:ring-theatre-red/20 focus:border-theatre-red transition-all">
                            <option value="reservation">Réservation</option>
                            <option value="atelier">Ateliers / Formations</option>
                            <option value="residence">Compagnies / Résidences</option>
                            <option value="autre">Autre demande</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-widest text-zinc-400">Votre message</label>
                        <textarea name="message" rows="6" required class="w-full px-6 py-4 bg-zinc-50 border border-zinc-100 rounded-2xl outline-none focus:ring-2 focus:ring-theatre-red/20 focus:border-theatre-red transition-all"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-zinc-900 text-white py-5 rounded-2xl font-black uppercase tracking-[0.2em] text-xs hover:bg-theatre-red transition-all shadow-xl shadow-zinc-200">
                        Envoyer le message
                    </button>
                </form>
            </div>

            <!-- Info Side -->
            <div class="lg:pl-20 space-y-16">
                <div class="space-y-12">
                    <h3 class="text-2xl font-serif font-bold text-zinc-900 italic">Coordonnées</h3>
                    
                    <div class="flex gap-6 items-start">
                        <div class="w-14 h-14 bg-zinc-50 rounded-2xl flex items-center justify-center text-2xl shrink-0">📞</div>
                        <div class="space-y-1">
                            <p class="text-xs font-black uppercase tracking-widest text-zinc-400">Téléphone</p>
                            <p class="text-xl font-bold text-zinc-900">06 80 40 04 61</p>
                        </div>
                    </div>

                    <div class="flex gap-6 items-start">
                        <div class="w-14 h-14 bg-zinc-50 rounded-2xl flex items-center justify-center text-2xl shrink-0">📧</div>
                        <div class="space-y-1">
                            <p class="text-xs font-black uppercase tracking-widest text-zinc-400">Email</p>
                            <p class="text-xl font-bold text-zinc-900">ca.respire.encore@orange.fr</p>
                        </div>
                    </div>

                    <div class="flex gap-6 items-start">
                        <div class="w-14 h-14 bg-zinc-50 rounded-2xl flex items-center justify-center text-2xl shrink-0">📍</div>
                        <div class="space-y-1">
                            <p class="text-xs font-black uppercase tracking-widest text-zinc-400">Adresse</p>
                            <p class="text-xl font-bold text-zinc-900">Village de Reillon<br>54450 Meurthe-et-Moselle</p>
                        </div>
                    </div>
                </div>

                <div class="bg-zinc-950 p-10 rounded-[3rem] text-white space-y-6">
                    <h4 class="text-xl font-serif italic text-theatre-red">"Un client a toujours raison"</h4>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Comme nous le rappelons souvent, nous sommes à votre écoute pour faire accoucher vos projets artistiques. N'hésitez pas à nous solliciter pour toute collaboration.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
