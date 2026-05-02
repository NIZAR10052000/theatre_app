@extends('layouts.app')

@section('title', 'Connexion - Ça Respire Encore')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-zinc-100 p-8">
        
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-slate-900 font-serif">Connexion</h2>
            <a href="{{ route('home') }}" class="text-zinc-400 hover:text-zinc-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </a>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-2xl text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form class="space-y-6" action="{{ route('mockups.login', request()->only('redirect')) }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-semibold text-zinc-700 mb-2">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full pl-10 pr-3 py-3 border border-zinc-200 rounded-xl text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-theatre-red focus:border-transparent transition-all sm:text-sm bg-zinc-50 focus:bg-white" placeholder="votre@email.com">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-zinc-700 mb-2">Mot de passe</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full pl-10 pr-3 py-3 border border-zinc-200 rounded-xl text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-theatre-red focus:border-transparent transition-all sm:text-sm bg-zinc-50 focus:bg-white" placeholder="••••••••">
                </div>
                <div class="flex justify-end mt-2">
                    <a href="#" class="text-xs font-medium text-zinc-500 hover:text-theatre-red transition-colors">Mot de passe oublié ?</a>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-theatre-red hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-theatre-red transition-all active:scale-[0.98]">
                    Se connecter
                </button>
            </div>
            
            <div class="text-center mt-6">
                <a href="{{ route('mockups.register') }}" class="text-sm font-medium text-theatre-red hover:text-red-800 transition-colors">
                    Pas encore de compte ? S'inscrire
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
