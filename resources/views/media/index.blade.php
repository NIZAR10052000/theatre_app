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

<section class="py-20 bg-zinc-50" x-data="{ showModal: false, activeMedia: null }">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($medias as $media)
                <div @click="activeMedia = {{ json_encode($media) }}; showModal = true" class="bg-white rounded-[2.5rem] shadow-sm border border-zinc-100 overflow-hidden group hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <!-- Media Preview -->
                    <div class="aspect-video relative overflow-hidden bg-zinc-100">
                        @if($media->type === 'video')
                            <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition-colors z-10">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-theatre-red fill-current" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
                                </div>
                            </div>
                            @php
                                $videoId = Str::contains($media->file_path, 'v=') ? Str::afterLast($media->file_path, 'v=') : Str::afterLast($media->file_path, '/');
                            @endphp
                            <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" alt="Thumbnail" class="w-full h-full object-cover">
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
                            
                            <div class="flex items-center gap-2">
                                <button class="w-10 h-10 rounded-full border border-zinc-100 flex items-center justify-center hover:bg-zinc-900 hover:text-white transition-all shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                @if($media->type !== 'video')
                                    <a @click.stop href="{{ asset('storage/' . $media->file_path) }}" download class="w-10 h-10 rounded-full border border-zinc-100 flex items-center justify-center hover:bg-theatre-red hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M7 10l5 5m0 0l5-5m-5 5V3"/></svg>
                                    </a>
                                @endif

                                @if(auth()->user() && auth()->user()->isAdmin())
                                    <form action="{{ route('admin.delete-media', $media->id) }}" method="POST" @click.stop onsubmit="return confirm('Supprimer ce média ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-10 h-10 rounded-full border border-red-100 flex items-center justify-center text-red-400 hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
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

    <!-- Modal Visionneuse -->
    <div x-show="showModal" 
         x-transition.opacity 
         style="display: none;" 
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-zinc-900/95 backdrop-blur-xl"
         x-data="{ activeIndex: 0 }">
        
        <button @click="showModal = false; activeIndex = 0" class="absolute top-8 right-8 text-white/50 hover:text-white transition-colors z-[110]">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <div class="w-full max-w-6xl max-h-full flex flex-col items-center" @click.away="showModal = false; activeIndex = 0">
            <template x-if="activeMedia">
                <div class="w-full flex flex-col lg:flex-row gap-10 items-center">
                    <!-- Media Content -->
                    <div class="w-full lg:w-3/4 aspect-video bg-black rounded-3xl overflow-hidden shadow-2xl border border-white/10 relative group">
                        
                        <!-- Files Loop -->
                        <template x-for="(file, index) in (activeMedia.files || [activeMedia.file_path])" :key="index">
                            <div x-show="activeIndex === index" class="w-full h-full">
                                <template x-if="activeMedia.type === 'photo'">
                                    <img :src="'/storage/' + file" class="w-full h-full object-contain">
                                </template>
                                <template x-if="activeMedia.type === 'video'">
                                    <iframe :src="'https://www.youtube.com/embed/' + (file.includes('v=') ? file.split('v=')[1].split('&')[0] : file.split('/').pop())" 
                                            class="w-full h-full" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                    </iframe>
                                </template>
                                <template x-if="activeMedia.type === 'document'">
                                    <iframe :src="'/storage/' + file" class="w-full h-full"></iframe>
                                </template>
                            </div>
                        </template>

                        <!-- Carousel Controls -->
                        <template x-if="(activeMedia.files || []).length > 1">
                            <div class="absolute inset-0 flex items-center justify-between px-4 pointer-events-none">
                                <button @click="activeIndex = activeIndex === 0 ? activeMedia.files.length - 1 : activeIndex - 1" class="w-12 h-12 bg-black/50 hover:bg-theatre-red text-white rounded-full flex items-center justify-center backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 pointer-events-auto">
                                    &#10094;
                                </button>
                                <button @click="activeIndex = activeIndex === activeMedia.files.length - 1 ? 0 : activeIndex + 1" class="w-12 h-12 bg-black/50 hover:bg-theatre-red text-white rounded-full flex items-center justify-center backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 pointer-events-auto">
                                    &#10095;
                                </button>
                            </div>
                        </template>

                        <!-- Counter -->
                        <template x-if="(activeMedia.files || []).length > 1">
                            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 px-3 py-1 bg-black/50 backdrop-blur-md rounded-full text-[10px] text-white font-bold">
                                <span x-text="activeIndex + 1"></span> / <span x-text="activeMedia.files.length"></span>
                            </div>
                        </template>
                    </div>

                    <!-- Info Sidebar -->
                    <div class="w-full lg:w-1/4 text-white">
                        <span class="inline-block px-3 py-1 bg-theatre-red text-[9px] font-black uppercase tracking-[0.2em] rounded-full mb-4" x-text="activeMedia.category"></span>
                        <h2 class="text-4xl font-serif font-bold mb-6" x-text="activeMedia.title"></h2>
                        <p class="text-zinc-400 leading-relaxed italic mb-8" x-text="activeMedia.description || 'Pas de description.'"></p>
                        
                        <div class="flex items-center gap-3 p-4 bg-white/5 rounded-2xl border border-white/10">
                            <div class="w-10 h-10 rounded-full bg-zinc-800 flex items-center justify-center">🎭</div>
                            <div>
                                <div class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest">Proposé par</div>
                                <div class="font-bold text-sm" x-text="activeMedia.user ? activeMedia.user.name : 'Théâtre Pas Fleuri'"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>
@endsection
