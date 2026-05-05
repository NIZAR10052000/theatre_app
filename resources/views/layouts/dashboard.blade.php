<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tableau de bord - Troupe')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { 'theatre-red': '#C62828', 'theatre-cream': '#FDFDFC' },
                    fontFamily: { sans: ['Inter', 'sans-serif'], serif: ['Outfit', 'serif'] }
                }
            }
        }
    </script>
</head>
<body class="bg-zinc-50 antialiased text-zinc-900 flex h-screen overflow-hidden" x-data="{ sidebarOpen: true }">

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-zinc-900 text-white transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0 flex flex-col">
        <div class="flex items-center justify-between p-4 border-b border-zinc-800">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="font-serif font-bold text-lg tracking-tight">Scène&Co</span>
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden text-zinc-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <div class="p-4">
            <div class="flex items-center gap-3 p-3 bg-zinc-800 rounded-xl mb-6">
                <div class="w-10 h-10 rounded-lg {{ auth()->user()->isAdmin() ? 'bg-theatre-red text-white' : 'bg-zinc-700' }} flex items-center justify-center text-xl">
                    {{ auth()->user()->isAdmin() ? '👑' : '🎭' }}
                </div>
                <div class="overflow-hidden">
                    <div class="font-bold text-sm truncate" title="{{ auth()->user()->name }}">{{ auth()->user()->name }}</div>
                    @if(auth()->user()->isAdmin())
                        <div class="text-xs text-zinc-400">Direction / Admin</div>
                    @else
                        <div class="text-xs {{ auth()->user()->is_verified ? 'text-green-400' : 'text-orange-400' }}">
                            {{ auth()->user()->is_verified ? 'Compagnie Validée' : 'En attente de validation' }}
                        </div>
                    @endif
                </div>
            </div>

            <nav class="space-y-1">
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->routeIs('admin.dashboard') ? 'bg-theatre-red text-white' : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }} rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Administration
                    </a>
                    <a href="{{ route('troupe.medias') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->routeIs('troupe.medias') ? 'bg-theatre-red text-white' : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }} rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Atelier Médias
                    </a>
                @endif

                @if(auth()->user()->isTroupe())
                    <a href="{{ route('mockups.troupe-dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->routeIs('mockups.troupe-dashboard') ? 'bg-theatre-red text-white' : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }} rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Vue d'ensemble
                    </a>
                    <a href="{{ route('troupe.medias') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->routeIs('troupe.medias') ? 'bg-theatre-red text-white' : 'text-zinc-400 hover:text-white hover:bg-zinc-800' }} rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Atelier Médias
                    </a>
                @endif

                <a href="{{ route('events.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-zinc-400 hover:text-white hover:bg-zinc-800 rounded-lg font-medium text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    L'Agenda
                </a>
            </nav>
        </div>
        
        <div class="mt-auto p-4 border-t border-zinc-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-zinc-400 hover:text-white transition-colors text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Se déconnecter
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <!-- Topbar -->
        <header class="bg-white border-b border-zinc-200 py-3 px-6 flex items-center justify-between z-10">
            <button @click="sidebarOpen = true" class="lg:hidden text-zinc-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <h1 class="text-xl font-bold font-serif hidden lg:block">@yield('header_title', 'Dashboard')</h1>
            <div class="flex items-center gap-4 ml-auto">
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div x-data="{ showNotifications: false }" class="relative">
                        <button @click="showNotifications = !showNotifications" @click.away="showNotifications = false" class="relative text-zinc-400 hover:text-zinc-600 focus:outline-none transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="absolute -top-1 -right-1 w-4 h-4 bg-theatre-red text-white text-[9px] font-bold rounded-full flex items-center justify-center">{{ auth()->user()->unreadNotifications->count() }}</span>
                            @endif
                        </button>
                        
                        <!-- Notifications Dropdown -->
                        <div x-show="showNotifications" style="display: none;" class="absolute right-0 mt-3 w-80 bg-white rounded-2xl shadow-xl border border-zinc-100 overflow-hidden z-50 origin-top-right transition-all">
                            <div class="bg-zinc-50 px-4 py-3 border-b border-zinc-100 flex justify-between items-center">
                                <h4 class="font-bold text-zinc-800 text-sm">Notifications</h4>
                                <span class="text-xs text-zinc-500 font-medium">{{ auth()->user()->unreadNotifications->count() }} non lue(s)</span>
                            </div>
                            <div class="max-h-80 overflow-y-auto">
                                @forelse(auth()->user()->unreadNotifications as $notification)
                                    <a href="{{ route('admin.notifications.read', $notification->id) }}" class="block px-4 py-3 hover:bg-zinc-50 border-b border-zinc-50 transition-colors">
                                        <div class="flex items-start gap-3">
                                            <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 mt-0.5 {{ $notification->data['type'] === 'troupe' ? 'bg-blue-100 text-blue-600' : ($notification->data['type'] === 'event' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600') }}">
                                                @if($notification->data['type'] === 'troupe') 👥 
                                                @elseif($notification->data['type'] === 'event') 🎭 
                                                @else 🖼️ @endif
                                            </div>
                                            <div>
                                                <p class="text-sm text-zinc-800 font-medium leading-tight">{{ $notification->data['message'] }}</p>
                                                <span class="text-xs text-zinc-400 mt-1 block">{{ $notification->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="px-4 py-6 text-center text-zinc-400 text-sm">
                                        Aucune nouvelle notification.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endif
                
            </div>
        </header>

        <!-- Content scrollable -->
        <div class="flex-1 overflow-auto p-6">
            @yield('content')
        </div>
    </main>

    <!-- Overlay for mobile sidebar -->
    <div x-show="sidebarOpen" class="fixed inset-0 bg-zinc-900/50 z-40 lg:hidden" @click="sidebarOpen = false" x-transition.opacity></div>
</body>
</html>
