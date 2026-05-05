@extends('layouts.app')

@section('title', $event->title . ' - Théâtre Ça Respire Encore')

@section('content')
<div class="bg-zinc-50 min-h-screen pb-20">
    <!-- Hero Section with Large Carousel -->
    <div class="bg-zinc-900 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-24 lg:pt-20 lg:pb-32 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Text Info -->
                <div class="text-white space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-theatre-red/20 border border-theatre-red/30 rounded-full text-theatre-red text-xs font-black uppercase tracking-widest">
                        <span>🎭</span> {{ $event->category }}
                    </div>
                    
                    <div>
                        <h1 class="text-4xl lg:text-6xl font-serif font-black leading-tight">{{ $event->title }}</h1>
                        @if($event->subtitle)
                            <p class="text-xl lg:text-2xl text-zinc-400 mt-4 font-medium italic">{{ $event->subtitle }}</p>
                        @endif
                    </div>

                    <div class="flex flex-wrap gap-6 text-sm font-bold text-zinc-300">
                        <div class="flex items-center gap-2">
                            <span class="text-theatre-red">📅</span>
                            {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                        </div>
                        @if($event->event_time)
                        <div class="flex items-center gap-2">
                            <span class="text-theatre-red">⏰</span>
                            {{ $event->event_time }}
                        </div>
                        @endif
                        @if($event->duration)
                        <div class="flex items-center gap-2">
                            <span class="text-theatre-red">⏳</span>
                            {{ $event->duration }}
                        </div>
                        @endif
                        <div class="flex items-center gap-2">
                            <span class="text-theatre-red">📍</span>
                            {{ $event->location }}
                        </div>
                    </div>

                        @if($event->booking_url)
                            <div class="pt-6">
                                <a href="{{ route('events.booking', $event->id) }}" class="inline-block bg-theatre-red hover:bg-red-700 text-white px-10 py-4 rounded-full font-black text-sm uppercase tracking-widest transition-all shadow-xl shadow-red-900/20">
                                    Réserver sur BilletRéduc
                                </a>
                                @if($event->price)
                                    <span class="ml-6 text-lg font-serif italic text-zinc-400">Tarif: {{ $event->price }}</span>
                                @endif
                            </div>
                        @endif
                </div>

                <!-- Large Carousel -->
                <div class="relative group" x-data="{ activeIndex: 0, images: {{ json_encode($event->images ?? []) }} }">
                    @if($event->images && count($event->images) > 0)
                        <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white/5 bg-zinc-800">
                            <template x-for="(img, index) in images" :key="index">
                                <img x-show="activeIndex === index" x-transition.opacity.duration.700ms :src="'/storage/' + img" class="w-full h-full object-cover" alt="Photo du spectacle">
                            </template>
                        </div>

                        @if(count($event->images) > 1)
                            <button @click="activeIndex = activeIndex === 0 ? images.length - 1 : activeIndex - 1" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-black/50 hover:bg-theatre-red text-white rounded-full flex items-center justify-center backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 shadow-xl">
                                &#10094;
                            </button>
                            <button @click="activeIndex = activeIndex === images.length - 1 ? 0 : activeIndex + 1" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-black/50 hover:bg-theatre-red text-white rounded-full flex items-center justify-center backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 shadow-xl">
                                &#10095;
                            </button>
                            
                            <div class="absolute -bottom-6 left-0 right-0 flex justify-center gap-2">
                                <template x-for="(img, index) in images" :key="index">
                                    <button @click="activeIndex = index" class="w-2 h-2 rounded-full transition-all" :class="activeIndex === index ? 'bg-theatre-red w-8' : 'bg-zinc-700'"></button>
                                </template>
                            </div>
                        @endif
                    @else
                        <div class="aspect-[4/3] rounded-[2.5rem] bg-zinc-800 flex items-center justify-center border-4 border-white/5">
                            <span class="text-zinc-600 text-6xl">🎭</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Decorative background elements -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-theatre-red/10 to-transparent pointer-events-none"></div>
    </div>

    <!-- Detailed Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
        <div class="grid lg:grid-cols-3 gap-16">
            <!-- Left: Description & Credits -->
            <div class="lg:col-span-2 space-y-12">
                <section>
                    <h3 class="text-3xl font-serif font-black mb-6 flex items-center gap-3 text-zinc-900">
                        <span class="w-8 h-1 bg-theatre-red rounded-full"></span>
                        À propos du spectacle
                    </h3>
                    <div class="prose prose-zinc prose-lg max-w-none text-zinc-600 leading-relaxed">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                </section>

                @if($event->credits)
                <section class="bg-white p-10 rounded-[2rem] border border-zinc-100 shadow-sm">
                    <h3 class="text-2xl font-serif font-black mb-8 text-zinc-900">Équipe artistique</h3>
                    <div class="grid sm:grid-cols-2 gap-8 text-sm">
                        @php 
                            $lines = explode("\n", $event->credits);
                        @endphp
                        @foreach($lines as $line)
                            @if(trim($line))
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 w-2 h-2 bg-theatre-red rounded-full shrink-0"></div>
                                    <p class="text-zinc-500 font-medium italic">{{ $line }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
                @endif
            </div>

            <!-- Right: Practical Info & Suggestions -->
            <div class="space-y-12">
                <section class="bg-zinc-900 text-white p-8 rounded-[2rem] shadow-2xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <h3 class="text-xl font-serif font-bold mb-6">Infos Pratiques</h3>
                        <ul class="space-y-4">
                            <li class="flex items-center justify-between py-3 border-b border-zinc-800">
                                <span class="text-zinc-400 text-xs uppercase tracking-widest font-black">Date</span>
                                <span class="font-bold">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d.m.Y') }}</span>
                            </li>
                            <li class="flex items-center justify-between py-3 border-b border-zinc-800">
                                <span class="text-zinc-400 text-xs uppercase tracking-widest font-black">Horaire</span>
                                <span class="font-bold">{{ $event->event_time ?? 'À définir' }}</span>
                            </li>
                            <li class="flex items-center justify-between py-3 border-b border-zinc-800">
                                <span class="text-zinc-400 text-xs uppercase tracking-widest font-black">Lieu</span>
                                <span class="font-bold">{{ $event->location }}</span>
                            </li>
                            @if($event->price)
                            <li class="flex items-center justify-between py-3 border-b border-zinc-800">
                                <span class="text-zinc-400 text-xs uppercase tracking-widest font-black">Tarif</span>
                                <span class="font-bold text-theatre-red">{{ $event->price }}</span>
                            </li>
                            @endif
                            <li class="flex items-center justify-between py-3">
                                <span class="text-zinc-400 text-xs uppercase tracking-widest font-black">Disponibilité</span>
                                <span class="font-bold">{{ $event->capacity }} places</span>
                            </li>
                        </ul>
                        
                        @if($event->booking_url)
                            <a href="{{ route('events.booking', $event->id) }}" class="mt-8 w-full block text-center bg-white text-zinc-900 py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-theatre-red hover:text-white transition-all">
                                Réserver mon billet
                            </a>
                        @endif
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-theatre-red/20 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
                </section>

                <!-- Suggestions -->
                @if(count($suggestions) > 0)
                <section>
                    <h3 class="text-xl font-serif font-black mb-6 text-zinc-900">Vous aimerez aussi</h3>
                    <div class="space-y-6">
                        @foreach($suggestions as $suggest)
                        <a href="{{ route('events.show', $suggest->id) }}" class="group block bg-white p-4 rounded-2xl border border-zinc-100 hover:shadow-lg transition-all">
                            <div class="flex items-center gap-4">
                                <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0">
                                    @if($suggest->images && count($suggest->images) > 0)
                                        <img src="{{ asset('storage/' . $suggest->images[0]) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform" alt="">
                                    @else
                                        <div class="w-full h-full bg-zinc-100 flex items-center justify-center text-xl">🎭</div>
                                    @endif
                                </div>
                                <div class="overflow-hidden">
                                    <h4 class="font-bold text-sm truncate group-hover:text-theatre-red transition-colors">{{ $suggest->title }}</h4>
                                    <p class="text-[10px] text-zinc-400 font-bold uppercase tracking-widest mt-1">{{ $suggest->category }}</p>
                                    <p class="text-xs text-zinc-500 mt-2 line-clamp-1">{{ $suggest->description }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </section>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
