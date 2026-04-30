@extends('layouts.app')

@section('title', 'Validation en attente - Scène&Co')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-zinc-100 p-8 text-center">
        <div class="w-24 h-24 bg-amber-50 text-amber-500 rounded-3xl flex items-center justify-center text-5xl mx-auto mb-6">
            ⏳
        </div>
        <h2 class="text-3xl font-bold text-slate-900 font-serif mb-4">Compte en attente</h2>
        <p class="text-zinc-500 mb-8 leading-relaxed text-sm">
            Bonjour ! Votre compte troupe a bien été créé, mais il doit maintenant être **validé par un modérateur**. 
            <br><br>
            Vous recevrez un e-mail dès que votre accès sera activé. Merci de votre patience !
        </p>
        <a href="{{ route('home') }}" class="inline-block bg-zinc-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-black transition-all">
            Retour à l'accueil
        </a>
    </div>
</div>
@endsection
