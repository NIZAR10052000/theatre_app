<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Théâtre Ça Respire Encore')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    <!-- Tailwind CSS CDN (Temporary fix since npm is missing) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'theatre-red': '#C62828',
                        'theatre-cream': '#FDFDFC',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Outfit', 'serif'],
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .btn-red {
                @apply bg-theatre-red text-white px-6 py-2 rounded-full font-medium transition-all hover:bg-red-800 active:scale-95 shadow-md;
            }
            
            .nav-link {
                @apply text-zinc-600 hover:text-theatre-red transition-colors font-medium;
            }

            .card-premium {
                @apply bg-white rounded-2xl shadow-lg overflow-hidden border border-zinc-100 transition-transform hover:scale-[1.02];
            }
        }
    </style>
</head>
<body class="antialiased">
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-zinc-100">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-10 h-10 bg-theatre-red rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-sm">
                    🎭
                </div>
                <span class="font-bold text-xl tracking-tight hidden md:block">Ça Respire Encore</span>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-theatre-red' : '' }}">Accueil</a>
                <a href="{{ route('events.index') }}" class="nav-link {{ request()->routeIs('events.index') ? 'text-theatre-red' : '' }}">Programme</a>
                <a href="{{ route('ateliers') }}" class="nav-link {{ request()->routeIs('ateliers') ? 'text-theatre-red' : '' }}">Ateliers</a>
                <a href="{{ route('home') }}#about" class="nav-link">Le Lieu</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-theatre-red' : '' }}">Contact</a>
            </nav>

            <div class="flex items-center gap-4">
                <div class="hidden lg:flex items-center border-r border-zinc-200 pr-4 mr-2 gap-3">
                    <a href="#" class="text-sm font-bold text-zinc-500 hover:text-theatre-red transition-colors">Connexion</a>
                    <a href="#" class="text-sm font-bold text-white bg-zinc-800 px-4 py-1.5 rounded-lg hover:bg-black transition-all">Troupes</a>
                </div>
                <a href="#" class="btn-red">Réserver</a>
                <button class="md:hidden text-zinc-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-white border-t border-zinc-100 mt-20 py-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
            <div>
                <h3 class="font-bold text-lg mb-4 flex items-center justify-center md:justify-start gap-2">
                    <span class="text-theatre-red">📍</span> Le Lieu
                </h3>
                <p class="text-zinc-600">3, Grande Rue<br>54450 Reillon</p>
                <a href="{{ route('home') }}#about" class="text-theatre-red font-medium text-sm mt-2 inline-block">En savoir plus →</a>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4 flex items-center justify-center md:justify-start gap-2">
                    <span class="text-theatre-red">🕒</span> Horaires
                </h3>
                <p class="text-zinc-600">Lun - Ven : 14h - 18h<br>Spectacles selon programmation</p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4 flex items-center justify-center md:justify-start gap-2">
                    <span class="text-theatre-red">📞</span> Contact
                </h3>
                <p class="text-zinc-600">06 80 40 04 61<br>ca.respire.encore@orange.fr</p>
                <a href="{{ route('contact') }}" class="text-theatre-red font-medium text-sm mt-2 inline-block">Nous écrire →</a>
            </div>
        </div>
        <div class="container mx-auto px-4 mt-12 pt-8 border-t border-zinc-50 text-center text-zinc-400 text-sm">
            &copy; {{ date('Y') }} Théâtre Ça Respire Encore. Tous droits réservés.
        </div>
    </footer>
</body>
</html>
