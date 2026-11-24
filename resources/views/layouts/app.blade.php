<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Informasi Surat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col text-white">

    {{-- HEADER --}}
    <header class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/50 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            {{-- Logo dan Nama Aplikasi --}}
            <a href="{{ auth()->check() ? route('dashboard') : route('login') }}"
               class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-violet-600 flex items-center justify-center shadow-lg shadow-blue-500/20">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M7 8h10M7 12h10M7 16h6M5 3h10l4 4v14H5V3z" />
                    </svg>

                </div>

                <div>
                    <h1 class="font-bold text-white text-base">
                        Sistem Informasi Surat
                    </h1>

                    <p class="text-xs text-slate-400">
                        Digital Administration
                    </p>
                </div>

            </a>

            {{-- NAVIGASI --}}
            <nav class="flex items-center gap-2">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="nav-link rounded-lg px-3 py-2 text-sm {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-slate-400' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('surat-masuk.index') }}"
                       class="nav-link rounded-lg px-3 py-2 text-sm {{ request()->routeIs('surat-masuk.*') ? 'bg-white/10 text-white' : 'text-slate-400' }}">
                        Surat Masuk
                    </a>

                    <a href="{{ route('surat-keluar.index') }}"
                       class="nav-link rounded-lg px-3 py-2 text-sm {{ request()->routeIs('surat-keluar.*') ? 'bg-white/10 text-white' : 'text-slate-400' }}">
                        Surat Keluar
                    </a>

                    <div class="hidden md:block h-8 w-px bg-white/10 mx-2"></div>

                    <div class="hidden md:block text-right mr-2">
                        <p class="text-sm font-medium text-white">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ Auth::user()->role }}
                        </p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="btn-secondary rounded-lg px-4 py-2 text-sm">
                            Logout
                        </button>
                    </form>

                @else

                    <a href="{{ route('login') }}"
                       class="btn-primary rounded-lg px-5 py-2 text-sm font-semibold">
                        Login
                    </a>

                @endauth

            </nav>

        </div>
    </header>

    {{-- KONTEN UTAMA --}}
    <main class="flex-grow w-full">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-white/10 bg-slate-950/30">
        <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-2">

            <p class="text-xs text-slate-500">
                &copy; {{ date('Y') }} Sistem Informasi Surat
            </p>

            <p class="text-xs text-slate-500">
                Digital Administration System
            </p>

        </div>
    </footer>

</body>
</html>
