@extends('layouts.app')

@section('title', 'Rejoignez-nous - Ça Respire Encore')

@section('content')
<div class="min-h-screen bg-zinc-50 flex" x-data="{ tab: 'spectateur' }">
    <!-- Colonne gauche: Formulaire -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-4 sm:px-12 lg:px-24 py-12">
        <div class="max-w-md w-full mx-auto">
            <div class="text-center lg:text-left mb-10">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-8 text-zinc-500 hover:text-zinc-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Retour
                </a>
                <h1 class="text-4xl font-bold text-slate-900 font-serif mb-2">Rejoignez Scène&Co</h1>
                <p class="text-zinc-500">Créez votre compte en quelques instants</p>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-zinc-100 p-8">
                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-2xl text-sm">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Tabs -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-zinc-700 mb-3">Type de compte</label>
                    <div class="flex p-1 bg-zinc-100 rounded-xl">
                        <button @click="tab = 'spectateur'" :class="{ 'bg-theatre-red text-white shadow-sm': tab === 'spectateur', 'text-zinc-500 hover:text-zinc-700': tab !== 'spectateur' }" class="flex-1 py-2.5 rounded-lg text-sm font-bold transition-all flex items-center justify-center gap-2">
                            🎟️ Spectateur
                        </button>
                        <button @click="tab = 'troupe'" :class="{ 'bg-zinc-800 text-white shadow-sm': tab === 'troupe', 'text-zinc-500 hover:text-zinc-700': tab !== 'troupe' }" class="flex-1 py-2.5 rounded-lg text-sm font-bold transition-all flex items-center justify-center gap-2">
                            🎭 Troupe
                        </button>
                    </div>
                </div>

                <form class="space-y-5" action="{{ route('mockups.register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" :value="tab">
                    
                    <!-- Champ spécifique Troupe -->
                    <div x-show="tab === 'troupe'" x-collapse>
                        <label class="block text-sm font-semibold text-zinc-700 mb-2">Nom de la compagnie</label>
                        <input type="text" name="company_name" class="appearance-none block w-full px-4 py-3 border border-zinc-200 rounded-xl text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinc-800 focus:border-transparent transition-all sm:text-sm bg-zinc-50 focus:bg-white" placeholder="Les Passeurs de masques">
                        <p class="text-xs text-amber-600 mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Votre compte devra être validé par un modérateur.
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-zinc-700 mb-2" x-text="tab === 'spectateur' ? 'Nom complet' : 'Nom du responsable'"></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input type="text" name="name" required class="appearance-none block w-full pl-10 pr-3 py-3 border border-zinc-200 rounded-xl text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-theatre-red focus:border-transparent transition-all sm:text-sm bg-zinc-50 focus:bg-white" placeholder="Jean Dupont">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-zinc-700 mb-2">Adresse e-mail</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type="email" name="email" required class="appearance-none block w-full pl-10 pr-3 py-3 border border-zinc-200 rounded-xl text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-theatre-red focus:border-transparent transition-all sm:text-sm bg-zinc-50 focus:bg-white" placeholder="votre@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-zinc-700 mb-2">Mot de passe</label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input :type="show ? 'text' : 'password'" name="password" required class="appearance-none block w-full pl-10 pr-10 py-3 border border-zinc-200 rounded-xl text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-theatre-red focus:border-transparent transition-all sm:text-sm bg-zinc-50 focus:bg-white" placeholder="••••••••">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center text-zinc-400 hover:text-zinc-600">
                                <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <svg x-show="show" style="display:none;" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                            </button>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" :class="tab === 'spectateur' ? 'bg-theatre-red hover:bg-red-800 focus:ring-theatre-red' : 'bg-zinc-900 hover:bg-black focus:ring-zinc-900'" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all active:scale-[0.98]">
                            Créer mon compte
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Colonne droite: Illustration (visible sur lg et +) -->
    <div class="hidden lg:flex w-1/2 bg-[#C99E35] relative overflow-hidden items-center justify-center p-12" style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%);">
        <!-- Motif de fond -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M10 0v20M0 10h20\' stroke=\'%23ffffff\' stroke-width=\'1\' fill=\'none\' opacity=\'0.5\'/%3E%3C/svg%3E'); background-size: 40px 40px;"></div>
        
        <div class="relative z-10 text-center max-w-lg text-white">
            <div class="mb-8 inline-block bg-white/20 p-6 rounded-3xl backdrop-blur-sm border border-white/30 shadow-2xl">
                <span class="text-6xl" x-text="tab === 'spectateur' ? '🎫' : '🎪'">🎪</span>
            </div>
            <h2 class="text-4xl font-bold font-serif mb-6 leading-tight">Faites partie de notre communauté</h2>
            <p class="text-lg text-white/90 mb-10 leading-relaxed">
                Que vous soyez spectateur passionné ou troupe professionnelle, Scène&Co vous offre tous les outils pour vivre et partager votre amour du théâtre.
            </p>

            <div class="space-y-6 text-left">
                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-white rounded-xl flex items-center justify-center text-2xl shadow-lg">🎟️</div>
                    <div>
                        <h4 class="font-bold text-lg">Pour les spectateurs</h4>
                        <p class="text-white/80 text-sm">Réservez vos places, suivez vos spectacles favoris et découvrez de nouvelles créations.</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-white rounded-xl flex items-center justify-center text-2xl shadow-lg">🎭</div>
                    <div>
                        <h4 class="font-bold text-lg">Pour les troupes</h4>
                        <p class="text-white/80 text-sm">Gérez vos représentations, vendez vos billets et développez votre audience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
