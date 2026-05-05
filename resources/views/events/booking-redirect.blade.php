@extends('layouts.app')

@section('title', 'Redirection vers BilletRéduc - ' . $event->title)

@section('content')
<div class="min-h-[80vh] flex items-center justify-center bg-zinc-50" x-data="{ countdown: 8 }">
    <div class="max-w-2xl w-full mx-4" x-init="
        const timer = setInterval(() => {
            countdown--;
            if (countdown <= 0) {
                clearInterval(timer);
                window.location.href = '{{ $event->booking_url ?: 'https://www.billetreduc.com' }}';
            }
        }, 1000);
    ">
        <div class="bg-white rounded-[3rem] shadow-2xl border border-zinc-100 p-12 text-center space-y-10 relative overflow-hidden">
            <!-- Decorative circle -->
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-theatre-red/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-zinc-900/5 rounded-full blur-3xl"></div>

            <!-- Icon/Logo -->
            <div class="relative inline-flex flex-col items-center">
                <div class="w-32 h-32 bg-zinc-900 rounded-[2.5rem] flex items-center justify-center text-5xl shadow-xl relative z-10">
                    🎟️
                </div>
                <!-- Pulse animation -->
                <div class="absolute inset-0 bg-theatre-red/20 rounded-[2.5rem] animate-ping"></div>
            </div>

            <div class="space-y-4">
                <h1 class="text-4xl font-serif font-black text-zinc-900">Préparation de votre réservation</h1>
                <p class="text-zinc-500 text-lg leading-relaxed italic">
                    Vous allez être redirigé vers notre partenaire <strong class="text-zinc-900">BilletRéduc</strong> pour finaliser l'achat de vos places pour :
                </p>
                <div class="bg-zinc-50 p-6 rounded-3xl border border-zinc-100 inline-block">
                    <h2 class="text-2xl font-bold text-theatre-red">{{ $event->title }}</h2>
                </div>
            </div>

            <!-- Instructions -->
            <div class="bg-amber-50 border border-amber-100 p-8 rounded-[2rem] text-left flex gap-6 items-start">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-2xl shadow-sm shrink-0">💡</div>
                <div class="space-y-2">
                    <p class="text-amber-900 font-bold">Conseil pratique :</p>
                    <p class="text-amber-800 text-sm leading-relaxed">
                        Une fois sur le site BilletRéduc, utilisez leur barre de recherche pour taper <strong class="underline decoration-2">"{{ $event->title }}"</strong> si vous n'arrivez pas directement sur la fiche du spectacle.
                    </p>
                </div>
            </div>

            <!-- Timer & Action -->
            <div class="pt-6 space-y-6">
                <div class="text-zinc-400 font-black uppercase tracking-[0.3em] text-[10px]">
                    Redirection automatique dans <span class="text-theatre-red text-xl" x-text="countdown"></span> secondes
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ $event->booking_url ?: 'https://www.billetreduc.com' }}" class="bg-zinc-900 text-white px-10 py-5 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-black transition-all shadow-xl shadow-zinc-900/20 flex items-center justify-center gap-3">
                        Accéder maintenant
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="{{ route('events.show', $event->id) }}" class="px-10 py-5 rounded-2xl font-black text-xs uppercase tracking-widest text-zinc-400 hover:text-zinc-900 transition-colors">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
