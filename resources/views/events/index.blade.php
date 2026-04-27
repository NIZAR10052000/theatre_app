@extends('layouts.app')

@section('title', 'Agenda - Théâtre Ça Respire Encore')

@section('content')
<!-- Header Section -->
<section class="relative bg-zinc-900 py-16 overflow-hidden">
    <div class="absolute inset-0 opacity-40">
        <img src="{{ asset('images/hero.png') }}" alt="Artistic Background" class="w-full h-full object-cover grayscale">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-4 font-serif">Agenda</h1>
        <p class="text-xl text-zinc-300 max-w-2xl mx-auto italic">
            "Ça respire encore... la vie, le théâtre, la rencontre."
        </p>
    </div>
</section>

<section class="container mx-auto px-4 py-16">
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
                                        <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden flex flex-col md:flex-row group hover:shadow-xl transition-all duration-500">
                                            <div class="bg-zinc-50 p-6 flex flex-col items-center justify-center min-w-[140px] border-r border-zinc-50 group-hover:bg-red-50 transition-colors duration-500">
                                                <span class="text-3xl font-bold text-theatre-red">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                                                <span class="text-zinc-500 font-bold uppercase tracking-widest text-[10px] mt-1">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M') }}</span>
                                                @if($event->event_time)
                                                    <span class="mt-3 px-3 py-1 bg-white border border-zinc-100 rounded-full text-[10px] font-bold text-zinc-600">{{ $event->event_time }}</span>
                                                @endif
                                            </div>

                                            <div class="p-6 flex-1 flex flex-col">
                                                <div class="flex items-center gap-2 mb-3">
                                                    <span class="px-2 py-0.5 bg-zinc-100 text-zinc-500 rounded-md text-[9px] font-black uppercase tracking-widest">
                                                        {{ $event->category }}
                                                    </span>
                                                    @if($event->is_reported)
                                                        <span class="px-2 py-0.5 bg-orange-50 text-orange-600 rounded-md text-[9px] font-black uppercase tracking-widest border border-orange-100">
                                                            ⚠️ REPORTÉ
                                                        </span>
                                                    @endif
                                                </div>
                                                <h5 class="text-xl font-bold mb-2 group-hover:text-theatre-red transition-colors duration-300">
                                                    {{ $event->title }}
                                                </h5>
                                                <p class="text-zinc-500 text-sm leading-relaxed mb-4">
                                                    {{ $event->description }}
                                                </p>
                                                <div class="flex items-center justify-between mt-auto pt-4 border-t border-zinc-50">
                                                    <div class="flex items-center gap-2 text-zinc-400 text-xs font-medium">
                                                        <span class="text-theatre-red">📍</span>
                                                        {{ $event->location }}
                                                    </div>
                                                    <button class="text-theatre-red font-bold text-xs hover:underline active:scale-95 transition-transform">Réserver →</button>
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

    <!-- Pistes Amuse-Gueules Section -->
    @if($pistes->count() > 0)
        <div class="mt-32 max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold mb-12 text-center">Pistes pour les Amuse-gueules</h2>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($pistes as $piste)
                    <div class="bg-white p-8 rounded-[2rem] border border-zinc-100 shadow-sm hover:shadow-xl transition-all duration-500">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center text-theatre-red font-bold">
                                {{ $loop->iteration }}
                            </div>
                            <h3 class="text-xl font-bold leading-tight">{{ $piste->title }}</h3>
                        </div>
                        <p class="text-zinc-600 italic leading-relaxed line-clamp-4">
                            "{{ $piste->description }}"
                        </p>
                        <button class="mt-6 text-theatre-red font-bold text-sm hover:underline">Lire la suite →</button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection