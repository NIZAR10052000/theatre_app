@extends('layouts.app')

@section('title', 'Médiathèque - Scène&Co')

@section('content')
<section class="relative bg-zinc-900 py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-40">
        <img src="https://images.unsplash.com/photo-1507676184212-d03ab07a01bf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Theatre Stage" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 bg-theatre-red text-white text-[10px] font-black uppercase tracking-[0.3em] rounded-lg mb-6">Archives & Créations</span>
            <h1 class="text-6xl md:text-8xl font-bold text-white mb-8 font-serif leading-none">Médiathèque</h1>
            <p class="text-xl text-zinc-300 leading-relaxed italic">
                Découvrez les coulisses, les captations de spectacles et les tutoriels de nos troupes résidentes.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-zinc-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($medias as $media)
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-zinc-100 overflow-hidden group hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                    <!-- Media Preview -->
                    <div class="aspect-video relative overflow-hidden bg-zinc-100">
                        @if($media->type === 'video')
                            <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition-colors z-10">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-theatre-red fill-current" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
                                </div>
                            </div>
                            <img src="https://img.youtube.com/vi/{{ Str::afterLast($media->file_path, 'v=') }}/maxresdefault.jpg" alt="Thumbnail" class="w-full h-full object-cover">
                        @elseif($media->type === 'photo')
                            <img src="{{ asset('storage/' . $media->file_path) }}" alt="{{ $media->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center flex-col gap-3">
                                <span class="text-5xl">📄</span>
                                <span class="text-xs font-bold text-zinc-400 uppercase">Document PDF</span>
                            </div>
                        @endif
                        
                        <div class="absolute top-4 left-4 z-20">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[9px] font-black uppercase tracking-widest text-zinc-800 shadow-sm border border-white/50">
                                {{ $media->category }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8">
                        <h3 class="text-2xl font-serif font-bold text-zinc-900 mb-3 group-hover:text-theatre-red transition-colors">{{ $media->title }}</h3>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-6 line-clamp-2">
                            {{ $media->description ?? 'Aucune description disponible pour ce média.' }}
                        </p>
                        
                        <div class="flex items-center justify-between pt-6 border-t border-zinc-50">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-sm">🎭</div>
                                <div class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest">
                                    {{ $media->user ? $media->user->name : 'Théâtre Pas Fleuri' }}
                                </div>
                            </div>
                            
                            @if($media->type === 'video')
                                <a href="{{ $media->file_path }}" target="_blank" class="w-10 h-10 rounded-full border border-zinc-100 flex items-center justify-center hover:bg-theatre-red hover:text-white transition-all shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            @else
                                <a href="{{ asset('storage/' . $media->file_path) }}" download class="w-10 h-10 rounded-full border border-zinc-100 flex items-center justify-center hover:bg-theatre-red hover:text-white transition-all shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M7 10l5 5m0 0l5-5m-5 5V3"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 text-center">
                    <div class="text-8xl mb-8 grayscale opacity-20">🎞️</div>
                    <h2 class="text-3xl font-serif font-bold text-zinc-400 mb-2">La pellicule est vide...</h2>
                    <p class="text-zinc-400">Revenez bientôt pour découvrir de nouveaux contenus !</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
