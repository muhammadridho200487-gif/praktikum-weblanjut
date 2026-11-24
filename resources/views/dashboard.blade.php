@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- HEADER DASHBOARD --}}
    <div class="mb-10 animate-[fade-up_0.6s_ease-out]">

        <p class="text-sm font-medium text-blue-400 mb-2">
            OVERVIEW
        </p>

        <h1 class="text-3xl md:text-4xl font-bold text-white">
            Dashboard
        </h1>

        <p class="text-slate-400 mt-3">
            Selamat datang di Sistem Informasi Surat.
            Kelola administrasi surat dengan mudah dan efisien.
        </p>

    </div>

    {{-- KARTU NAVIGASI --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- SURAT MASUK --}}
        <a href="{{ route('surat-masuk.index') }}"
           class="glass-card rounded-2xl p-7 group transition-all duration-300 hover:-translate-y-1 hover:border-blue-400/40 animate-[fade-up_0.7s_ease-out]">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-slate-400 text-sm font-medium">
                        MANAJEMEN SURAT
                    </p>

                    <h2 class="text-2xl font-bold text-white mt-3">
                        Surat Masuk
                    </h2>

                    <p class="text-slate-400 text-sm mt-2">
                        Lihat dan kelola data surat masuk.
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-blue-500/15 border border-blue-400/20 flex items-center justify-center group-hover:bg-blue-500/25 transition-all">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7 text-blue-400"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.7">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M7 8h10M7 12h10M7 16h6M5 3h10l4 4v14H5V3z" />

                    </svg>

                </div>

            </div>

            <div class="mt-7 flex items-center justify-between border-t border-white/10 pt-5">

                <span class="text-sm text-blue-400 font-medium">
                    Buka halaman surat
                </span>

                <span class="text-blue-400 text-xl group-hover:translate-x-1 transition-transform">
                    →
                </span>

            </div>

        </a>

        {{-- SURAT KELUAR --}}
        <a href="{{ route('surat-keluar.index') }}"
           class="glass-card rounded-2xl p-7 group transition-all duration-300 hover:-translate-y-1 hover:border-violet-400/40 animate-[fade-up_0.8s_ease-out]">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-slate-400 text-sm font-medium">
                        MANAJEMEN SURAT
                    </p>

                    <h2 class="text-2xl font-bold text-white mt-3">
                        Surat Keluar
                    </h2>

                    <p class="text-slate-400 text-sm mt-2">
                        Lihat dan kelola data surat keluar.
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-violet-500/15 border border-violet-400/20 flex items-center justify-center group-hover:bg-violet-500/25 transition-all">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7 text-violet-400"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.7">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M7 8h10M7 12h10M7 16h6M5 3h10l4 4v14H5V3z" />

                    </svg>

                </div>

            </div>

            <div class="mt-7 flex items-center justify-between border-t border-white/10 pt-5">

                <span class="text-sm text-violet-400 font-medium">
                    Buka halaman surat
                </span>

                <span class="text-violet-400 text-xl group-hover:translate-x-1 transition-transform">
                    →
                </span>

            </div>

        </a>

    </div>

    {{-- INFORMASI SISTEM --}}
    <div class="glass-card rounded-2xl p-6 mt-8 animate-[fade-up_0.9s_ease-out]">

        <div class="flex items-center gap-3 mb-4">

            <div class="w-10 h-10 rounded-xl bg-blue-500/15 flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 text-blue-400"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.7">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 110-20 10 10 0 010 20z" />

                </svg>

            </div>

            <h3 class="font-semibold text-white">
                Informasi Sistem
            </h3>

        </div>

        <p class="text-sm text-slate-400 leading-relaxed">
            Sistem Informasi Surat merupakan aplikasi pengelolaan
            administrasi surat secara digital yang membantu proses
            pencatatan dan pengelolaan surat masuk maupun surat keluar
            agar lebih terstruktur dan efisien.
        </p>

    </div>

</div>

@endsection
