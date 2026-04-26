@extends('layouts.app')

@section('title', 'Agenda 2026 - Théâtre Ça Respire Encore')

@section('content')
<!-- Header Section -->
<section class="relative bg-zinc-900 py-24 overflow-hidden">
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
            <button class="px-6 py-2 rounded-full bg-zinc-100 text-zinc-600 text-sm font-bold hover:bg-theatre-red hover:text-white transition-all">Spectacles</button>
            <button class="px-6 py-2 rounded-full bg-zinc-100 text-zinc-600 text-sm font-bold hover:bg-theatre-red hover:text-white transition-all">Amuse-gueules</button>
            <button class="px-6 py-2 rounded-full bg-zinc-100 text-zinc-600 text-sm font-bold hover:bg-theatre-red hover:text-white transition-all">Résidences</button>
        </div>
    </div>

    @php
        $eventsByPeriod = $events->filter(fn($e) => $e->category != 'Pistes Amuse-gueules')->groupBy('period');
        $pistes = $events->filter(fn($e) => $e->category == 'Pistes Amuse-gueules');
    @endphp

    <div class="max-w-5xl mx-auto space-y-24">
        @forelse($eventsByPeriod as $periodName => $periodEvents)
            <div>
                <h2 class="text-4xl font-bold mb-12 flex items-center gap-4 text-zinc-800">
                    <span class="bg-theatre-red w-2 h-10 rounded-full"></span>
                    {{ $periodName }}
                </h2>

                <div class="grid gap-10">
                    @php
                        $eventsByMonth = $periodEvents->groupBy(function($event) {
                            return \Carbon\Carbon::parse($event->event_date)->translatedFormat('F');
                        });
                    @endphp

                    @foreach($eventsByMonth as $month => $monthEvents)
                        <div class="space-y-6">
                            <h3 class="text-xl font-bold text-zinc-400 uppercase tracking-widest ml-4">{{ $month }}</h3>
                            
                            @foreach($monthEvents as $event)
                                <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden flex flex-col md:flex-row group hover:shadow-2xl transition-all duration-700">
                                    <div class="bg-theatre-cream p-8 flex flex-col items-center justify-center min-w-[180px] border-r border-zinc-50 group-hover:bg-red-50 transition-colors duration-700">
                                        <span class="text-4xl font-bold text-theatre-red">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                                        <span class="text-zinc-500 font-bold uppercase tracking-widest text-xs mt-1">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M') }}</span>
                                        @if($event->event_time)
                                            <div class="mt-4 flex flex-col items-center gap-1">
                                                <span class="px-4 py-1 bg-white border border-zinc-100 rounded-full text-xs font-bold text-zinc-800 shadow-sm">{{ $event->event_time }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="p-8 flex-1 flex flex-col">
                                        <div class="flex items-center gap-3 mb-4">
                                            <span class="px-3 py-1 bg-zinc-100 text-zinc-500 rounded-full text-[10px] font-black uppercase tracking-widest">
                                                {{ $event->category }}
                                            </span>
                                            @if($event->is_reported)
                                                <span class="px-3 py-1 bg-orange-50 text-orange-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-orange-100">
                                                    ⚠️ REPORTÉ
                                                </span>
                                            @endif
                                        </div>
                                        <h4 class="text-2xl font-bold mb-4 group-hover:text-theatre-red transition-colors duration-500 leading-tight">
                                            {{ $event->title }}
                                        </h4>
                                        <p class="text-zinc-600 leading-relaxed mb-8 flex-1">
                                            {{ $event->description }}
                                        </p>
                                        <div class="flex items-center justify-between pt-6 border-t border-zinc-50">
                                            <div class="flex items-center gap-3 text-zinc-400 text-sm font-medium">
                                                <div class="w-8 h-8 rounded-full bg-zinc-50 flex items-center justify-center text-theatre-red">📍</div>
                                                {{ $event->location }}
                                            </div>
                                            <div class="flex gap-4">
                                                <button class="btn-red text-sm px-8 shadow-red-200 shadow-lg active:scale-95">Réserver</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="py-32 text-center bg-theatre-cream rounded-[40px] border-4 border-dashed border-zinc-200">
                <div class="text-6xl mb-6">🎭</div>
                <p class="text-zinc-500 font-bold text-xl">Aucun événement trouvé.</p>
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