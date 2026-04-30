@extends('layouts.app')

@section('title', 'Agenda - Théâtre Ça Respire Encore')

@section('content')
<!-- Header Section -->
<section class="relative bg-zinc-900 py-16 overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <img src="https://images.unsplash.com/photo-1485846234645-a62644f84728?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Artistic Background" class="w-full h-full object-cover grayscale transition-transform duration-1000">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-4 font-serif">Agenda</h1>
        <p class="text-xl text-zinc-300 max-w-2xl mx-auto italic">
            "Ça respire encore... la vie, le théâtre, la rencontre."
        </p>
    </div>
</section>

<section class="container mx-auto px-4 py-16" x-data="{ 
    showReservationModal: false, 
    selectedEventTitle: '', 
    step: 1, 
    quantity: 1, 
    price: 15,
    get total() { return this.quantity * this.price; }
}">
    <!-- Filters Row -->
    <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-16 border-b border-zinc-100 pb-10">
        <div class="w-full md:w-72">
            <label class="block text-sm font-bold text-zinc-500 mb-2">Filtrer par période</label>
            <form action="{{ route('events.index') }}" method="GET" id="filterForm">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="relative">
                    <select name="period" onchange="this.form.submit()" class="w-full appearance-none bg-white border-2 border-theatre-red rounded-2xl px-6 py-3 font-bold text-zinc-700 cursor-pointer focus:outline-none focus:ring-4 focus:ring-red-100 transition-all">
                        <option value="Toutes les périodes">Toutes les périodes</option>
                        @foreach($periods as $p)
                            <option value="{{ $p }}" {{ request('period') == $p ? 'selected' : '' }}>{{ $p }}</option>
                        @endforeach
                    </select>
                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-theatre-red">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('events.index', ['period' => request('period')]) }}" 
               class="px-6 py-2 rounded-full text-sm font-bold transition-all {{ !request('category') || request('category') == 'Tous' ? 'bg-theatre-red text-white' : 'bg-zinc-100 text-zinc-600 hover:bg-zinc-200' }}">
               Tous
            </a>
            @foreach($categories as $cat)
                @if($cat != 'Pistes Amuse-gueules')
                    <a href="{{ route('events.index', ['category' => $cat, 'period' => request('period')]) }}" 
                       class="px-6 py-2 rounded-full text-sm font-bold transition-all {{ request('category') == $cat ? 'bg-theatre-red text-white' : 'bg-zinc-100 text-zinc-600 hover:bg-zinc-200' }}">
                       {{ $cat }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>

    @php
        $eventsByYear = $events->filter(fn($e) => $e->category != 'Pistes Amuse-gueules')
                               ->groupBy(fn($e) => \Carbon\Carbon::parse($e->event_date)->format('Y'));
        $pistes = $events->filter(fn($e) => $e->category == 'Pistes Amuse-gueules');
    @endphp

    <div class="max-w-5xl mx-auto space-y-32">
        @forelse($eventsByYear as $year => $yearEvents)
            <div>
                <div class="flex items-center gap-6 mb-16">
                    <h2 class="text-6xl font-black text-zinc-100 tracking-tighter">{{ $year }}</h2>
                    <div class="h-px bg-zinc-100 flex-1"></div>
                </div>

                @php
                    $eventsByPeriod = $yearEvents->groupBy('period');
                @endphp

                @foreach($eventsByPeriod as $periodName => $periodEvents)
                    <div class="mb-20 last:mb-0">
                        <h3 class="text-3xl font-bold mb-10 flex items-center gap-4 text-zinc-800">
                            <span class="bg-theatre-red w-2 h-8 rounded-full"></span>
                            {{ $periodName }}
                        </h3>

                        <div class="grid gap-8">
                            @php
                                $eventsByMonth = $periodEvents->groupBy(function($event) {
                                    return \Carbon\Carbon::parse($event->event_date)->translatedFormat('F');
                                });
                            @endphp

                            @foreach($eventsByMonth as $month => $monthEvents)
                                <div class="space-y-4">
                                    <h4 class="text-xs font-black text-zinc-400 uppercase tracking-[0.3em] ml-2">{{ $month }}</h4>
                                    
                                    @foreach($monthEvents as $event)
                                        <div class="bg-white rounded-[2rem] shadow-sm border border-zinc-100 overflow-hidden flex flex-col md:flex-row group hover:shadow-xl transition-all duration-500">
                                            <!-- Date Side -->
                                            <div class="bg-zinc-50 p-8 flex flex-col items-center justify-center min-w-[160px] border-r border-zinc-50 group-hover:bg-red-50 transition-colors duration-500">
                                                <span class="text-4xl font-black text-theatre-red leading-none">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                                                <span class="text-xs font-black uppercase tracking-[0.2em] text-zinc-400 mt-2">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M') }}</span>
                                                @if($event->event_time)
                                                    <span class="mt-4 px-4 py-1 bg-white border border-zinc-100 rounded-full text-[10px] font-black text-zinc-600 tracking-wider">{{ $event->event_time }}</span>
                                                @endif
                                            </div>

                                            <div class="p-8 flex-1 flex flex-col justify-center">
                                                <div class="flex items-center gap-3 mb-4">
                                                    <span class="px-2.5 py-0.5 bg-zinc-100 text-zinc-500 rounded text-[9px] font-black uppercase tracking-[0.2em]">
                                                        {{ $event->category }}
                                                    </span>
                                                    @if($event->is_reported)
                                                        <span class="px-2.5 py-0.5 bg-orange-50 text-orange-600 rounded text-[9px] font-black uppercase tracking-[0.2em] border border-orange-100">
                                                            ⚠️ REPORTÉ
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                <h5 class="text-2xl font-serif font-black mb-3 group-hover:text-theatre-red transition-colors duration-300 leading-tight">
                                                    {{ $event->title }}
                                                </h5>
                                                
                                                <p class="text-zinc-500 text-sm leading-relaxed mb-4 italic">
                                                    {{ $event->description }}
                                                </p>
                                                
                                                <div class="flex items-center justify-between mt-auto pt-4 border-t border-zinc-50">
                                                    <div class="flex items-center gap-2 text-zinc-400 text-xs font-bold">
                                                        <span class="text-theatre-red">📍</span>
                                                        {{ $event->location }}
                                                    </div>
                                                    <button @click="showReservationModal = true; selectedEventTitle = '{{ addslashes($event->title) }}'; step = 1; quantity = 1;" class="text-theatre-red font-black text-xs hover:underline active:scale-95 transition-transform uppercase tracking-widest">Réserver →</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="py-32 text-center bg-zinc-50 rounded-[40px] border-2 border-dashed border-zinc-200">
                <div class="text-6xl mb-6 opacity-20 grayscale">🎭</div>
                <p class="text-zinc-400 font-bold text-xl uppercase tracking-widest">Aucun événement trouvé</p>
                <a href="{{ route('events.index') }}" class="mt-6 inline-block text-theatre-red font-bold hover:underline">Voir tout le programme</a>
            </div>
        @endforelse
    </div>
    </div>

    <!-- Modale de Réservation -->
    <div x-show="showReservationModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Fond gris -->
            <div x-show="showReservationModal" x-transition.opacity class="fixed inset-0 bg-zinc-900/50 backdrop-blur-sm transition-opacity" @click="showReservationModal = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Contenu de la modale -->
            <div x-show="showReservationModal" x-transition.scale.origin.bottom class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                
                <!-- En-tête de la modale -->
                <div class="px-6 py-6 border-b border-zinc-100 flex justify-between items-start">
                    <div>
                        <h3 class="text-3xl font-bold font-serif text-slate-900" id="modal-title">Réserver</h3>
                        <p class="text-zinc-500 mt-1" x-text="'&quot;' + selectedEventTitle + '&quot;'"></p>
                    </div>
                    <button @click="showReservationModal = false" class="text-zinc-400 hover:text-zinc-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Indicateur d'étape -->
                <div class="px-8 pt-6 pb-2">
                    <div class="flex items-center justify-between relative">
                        <div class="absolute left-0 top-1/2 w-full h-0.5 bg-zinc-200 -z-10"></div>
                        <div class="absolute left-0 top-1/2 h-0.5 bg-theatre-red -z-10 transition-all duration-300" :style="'width: ' + (step === 1 ? '50%' : '100%')"></div>
                        
                        <div class="flex flex-col items-center gap-2 bg-white px-2">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm transition-colors" :class="step >= 1 ? 'bg-theatre-red text-white' : 'bg-zinc-200 text-zinc-500'">1</div>
                            <span class="text-xs font-bold" :class="step >= 1 ? 'text-theatre-red' : 'text-zinc-400'">Informations</span>
                        </div>
                        
                        <div class="flex flex-col items-center gap-2 bg-white px-2">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm transition-colors" :class="step === 2 ? 'bg-theatre-red text-white' : 'bg-zinc-200 text-zinc-500'">2</div>
                            <span class="text-xs font-bold" :class="step === 2 ? 'text-theatre-red' : 'text-zinc-400'">Paiement</span>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-6">
                    <!-- Étape 1 : Informations -->
                    <div x-show="step === 1" x-transition.opacity>
                        <form class="space-y-4" @submit.prevent="step = 2">
                            <div>
                                <label class="block text-sm font-semibold text-zinc-700 mb-1">Nom complet</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <input type="text" required class="w-full pl-10 pr-3 py-3 border border-zinc-200 rounded-xl bg-zinc-50 focus:bg-white focus:ring-2 focus:ring-theatre-red outline-none transition-all" placeholder="Jean Dupont">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-zinc-700 mb-1">Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <input type="email" required class="w-full pl-10 pr-3 py-3 border border-zinc-200 rounded-xl bg-zinc-50 focus:bg-white focus:ring-2 focus:ring-theatre-red outline-none transition-all" placeholder="jean@exemple.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-zinc-700 mb-1">Téléphone</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </div>
                                    <input type="tel" class="w-full pl-10 pr-3 py-3 border border-zinc-200 rounded-xl bg-zinc-50 focus:bg-white focus:ring-2 focus:ring-theatre-red outline-none transition-all" placeholder="06 12 34 56 78">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-zinc-700 mb-2">Nombre de billets</label>
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center border border-zinc-200 rounded-xl overflow-hidden bg-white">
                                        <button type="button" @click="if(quantity > 1) quantity--" class="px-4 py-2 text-zinc-500 hover:bg-zinc-50 hover:text-zinc-800 transition-colors">-</button>
                                        <div class="px-4 py-2 font-bold text-zinc-900 border-x border-zinc-200" x-text="quantity"></div>
                                        <button type="button" @click="quantity++" class="px-4 py-2 text-zinc-500 hover:bg-zinc-50 hover:text-zinc-800 transition-colors">+</button>
                                    </div>
                                    <div class="text-zinc-500 font-medium">
                                        × <span x-text="price"></span>€ = <strong class="text-zinc-900 text-lg ml-1"><span x-text="total"></span>€</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="w-full bg-zinc-200 hover:bg-zinc-300 text-zinc-800 font-bold py-3.5 px-4 rounded-xl transition-colors">
                                    Continuer
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Étape 2 : Paiement -->
                    <div x-show="step === 2" x-transition.opacity style="display: none;">
                        <div class="bg-zinc-50 rounded-xl p-4 mb-6 flex justify-between items-center border border-zinc-100">
                            <div>
                                <div class="text-zinc-500 text-sm">Billets (<span x-text="quantity"></span>)</div>
                                <div class="font-bold text-lg mt-1">Total</div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-sm"><span x-text="total"></span>€</div>
                                <div class="font-black text-xl text-theatre-red mt-1"><span x-text="total"></span>€</div>
                            </div>
                        </div>

                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-zinc-700 mb-1">Numéro de carte</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                    </div>
                                    <input type="text" class="w-full pl-10 pr-3 py-3 border border-zinc-200 rounded-xl bg-white focus:ring-2 focus:ring-theatre-red outline-none transition-all" placeholder="1234 5678 9012 3456">
                                </div>
                            </div>
                            
                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <label class="block text-sm font-semibold text-zinc-700 mb-1">Expiration</label>
                                    <input type="text" class="w-full px-3 py-3 border border-zinc-200 rounded-xl bg-white focus:ring-2 focus:ring-theatre-red outline-none transition-all" placeholder="MM/AA">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-sm font-semibold text-zinc-700 mb-1">CVC</label>
                                    <input type="text" class="w-full px-3 py-3 border border-zinc-200 rounded-xl bg-white focus:ring-2 focus:ring-theatre-red outline-none transition-all" placeholder="123">
                                </div>
                            </div>

                            <div class="bg-blue-50 border border-blue-100 rounded-xl p-3 flex items-center gap-3 text-sm text-blue-800">
                                <span>🔒</span>
                                Paiement sécurisé. Vos informations sont cryptées.
                            </div>

                            <div class="flex gap-3 pt-4">
                                <button type="button" @click="step = 1" class="flex-1 bg-zinc-100 hover:bg-zinc-200 text-zinc-800 font-bold py-3.5 px-4 rounded-xl transition-colors">
                                    Retour
                                </button>
                                <button type="button" class="flex-1 bg-zinc-300 text-white font-bold py-3.5 px-4 rounded-xl cursor-not-allowed">
                                    Payer <span x-text="total"></span>€
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection