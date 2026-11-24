@extends('layouts.app')

@section('content')
<div class="min-h-[75vh] flex items-center justify-center px-4 py-12">

    <div class="w-full max-w-md animate-[fade-up_0.7s_ease-out]">

        {{-- Logo dan identitas --}}
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-blue-500 to-violet-600 flex items-center justify-center shadow-lg shadow-blue-500/30">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-9 h-9 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.7">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M7 8h10M7 12h10M7 16h6M5 3h10l4 4v14H5V3z" />
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-white tracking-tight">
                Sistem Informasi Surat
            </h1>

            <p class="text-slate-400 mt-2 text-sm">
                Kelola surat dengan lebih mudah dan efisien
            </p>
        </div>

        {{-- Login Card --}}
        <div class="glass-card rounded-3xl p-8 sm:p-10">

            <div class="mb-7">
                <h2 class="text-2xl font-bold text-white">
                    Selamat Datang
                </h2>

                <p class="text-slate-400 text-sm mt-2">
                    Silakan masuk menggunakan akun Anda.
                </p>
            </div>

            {{-- Notifikasi berhasil --}}
            @if (session('success'))
                <div class="mb-5 rounded-xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Notifikasi error --}}
            @if ($errors->any())
                <div class="mb-5 rounded-xl border border-red-400/30 bg-red-400/10 px-4 py-3 text-sm text-red-300">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-200 mb-2">
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="email"
                        required
                        class="form-input w-full rounded-xl px-4 py-3 text-white placeholder-slate-500 outline-none transition-all"
                    >
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-200 mb-2">
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                        class="form-input w-full rounded-xl px-4 py-3 text-white placeholder-slate-500 outline-none transition-all"
                    >
                </div>

                {{-- Tombol Login --}}
                <button
                    type="submit"
                    class="btn-primary w-full rounded-xl py-3.5 font-semibold text-white flex items-center justify-center gap-2 transition-all duration-300 hover:scale-[1.02]"
                >
                    Masuk ke Sistem

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>

            <div class="mt-7 pt-6 border-t border-white/10 text-center">
                <p class="text-xs text-slate-500">
                    Sistem Informasi Surat
                </p>
                <p class="text-xs text-slate-600 mt-1">
                    Secure Access • Digital Administration
                </p>
            </div>

        </div>

        <p class="text-center text-xs text-slate-500 mt-6">
            &copy; {{ date('Y') }} Sistem Informasi Surat
        </p>

    </div>
</div>
@endsection
