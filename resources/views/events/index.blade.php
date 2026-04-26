@extends('layouts.app')

@section('title', 'Programme - Théâtre Ça Respire Encore')

@section('content')
<section class="container mx-auto px-4 py-12">
    <h1 class="text-5xl font-bold mb-2">Notre Programme</h1>
    <p class="text-zinc-500 mb-10">1er semestre 2026</p>

    <!-- Tabs -->
    <div class="flex flex-wrap gap-4 mb-12 border-b border-zinc-100 pb-6">
        <button class="px-6 py-2 rounded-full bg-theatre-red text-white font-bold shadow-md">Spectacles</button>
        <button class="px-6 py-2 rounded-full hover:bg-zinc-100 text-zinc-600 font-bold transition-colors">Résidences</button>
        <button class="px-6 py-2 rounded-full hover:bg-zinc-100 text-zinc-600 font-bold transition-colors">Amuse-gueules</button>
        <button class="px-6 py-2 rounded-full hover:bg-zinc-100 text-zinc-600 font-bold transition-colors">Ateliers</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($events as $event)
            <div class="card-premium">
                <div class="relative h-48 bg-zinc-100">
                    <img src="https://images.unsplash.com/photo-1503095396549-80705a509c61?auto=format&fit=crop&w=800" alt="{{ $event->title }}" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $event->title }}</h3>
                    <p class="text-zinc-600 text-sm mb-4 line-clamp-2">{{ $event->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-zinc-500">📅 {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</span>
                        <a href="#" class="btn-red text-xs px-4">Réserver</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center bg-white rounded-2xl border border-dashed border-zinc-200">
                <p class="text-zinc-400">Aucun événement prévu pour le moment.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection