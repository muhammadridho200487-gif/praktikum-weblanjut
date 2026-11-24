@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-10">

    {{-- HEADER --}}
    <div class="mb-8">

        <a href="{{ route('surat-masuk.index') }}"
           class="inline-flex items-center gap-2 text-sm text-blue-400 hover:text-blue-300 transition-colors mb-6">

            <span>←</span>
            Kembali ke Surat Masuk

        </a>

        <p class="text-sm font-medium text-blue-400 mb-2">
            MANAJEMEN SURAT
        </p>

        <h1 class="text-3xl font-bold text-white">
            Detail Surat Masuk
        </h1>

        <p class="text-slate-400 text-sm mt-2">
            Informasi lengkap surat yang diterima.
        </p>

    </div>

    @if ($SuratShow)

        {{-- KARTU DETAIL --}}
        <div class="glass-card rounded-3xl overflow-hidden">

            {{-- BAGIAN ATAS --}}
            <div class="p-7 sm:p-9 border-b border-white/10">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-violet-600 flex items-center justify-center shadow-lg shadow-blue-500/20">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-7 h-7 text-white"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.7">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M7 8h10M7 12h10M7 16h6M5 3h10l4 4v14H5V3z" />

                        </svg>

                    </div>

                    <div>
                        <p class="text-sm text-slate-400">
                            Dokumen Surat Masuk
                        </p>

                        <h2 class="text-xl font-bold text-white mt-1">
                            {{ $SuratShow->nomor_surat }}
                        </h2>
                    </div>

                </div>

            </div>

            {{-- INFORMASI SURAT --}}
            <div class="p-7 sm:p-9">

                <h3 class="text-lg font-semibold text-white mb-6">
                    Informasi Dokumen
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    {{-- Nomor Surat --}}
                    <div class="rounded-xl bg-white/[0.03] border border-white/5 p-5">
                        <p class="text-xs text-slate-400 mb-2">
                            NOMOR SURAT
                        </p>

                        <p class="text-sm font-semibold text-white">
                            {{ $SuratShow->nomor_surat }}
                        </p>
                    </div>

                    {{-- Tanggal --}}
                    <div class="rounded-xl bg-white/[0.03] border border-white/5 p-5">
                        <p class="text-xs text-slate-400 mb-2">
                            TANGGAL SURAT
                        </p>

                        <p class="text-sm font-semibold text-white">
                            {{ $SuratShow->tanggal }}
                        </p>
                    </div>

                    {{-- Pengirim --}}
                    <div class="rounded-xl bg-white/[0.03] border border-white/5 p-5">
                        <p class="text-xs text-slate-400 mb-2">
                            PENGIRIM
                        </p>

                        <p class="text-sm font-semibold text-white">
                            {{ $SuratShow->pengirim }}
                        </p>
                    </div>

                    {{-- Perihal --}}
                    <div class="rounded-xl bg-white/[0.03] border border-white/5 p-5">
                        <p class="text-xs text-slate-400 mb-2">
                            PERIHAL
                        </p>

                        <p class="text-sm font-semibold text-white">
                            {{ $SuratShow->perihal }}
                        </p>
                    </div>

                    {{-- Keterangan --}}
                    <div class="sm:col-span-2 rounded-xl bg-white/[0.03] border border-white/5 p-5">

                        <p class="text-xs text-slate-400 mb-2">
                            KETERANGAN
                        </p>

                        <p class="text-sm text-slate-200 leading-relaxed">
                            {{ $SuratShow->keterangan ?? '-' }}
                        </p>

                    </div>

                </div>

                {{-- FOOTER KARTU --}}
                <div class="mt-8 pt-6 border-t border-white/10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <p class="text-xs text-slate-500">
                        Sistem Informasi Surat • Dokumen Surat Masuk
                    </p>

                    <a href="{{ route('surat-masuk.index') }}"
                       class="btn-secondary rounded-xl px-5 py-3 text-sm font-medium text-center">

                        ← Kembali ke Daftar

                    </a>

                </div>

            </div>

        </div>

    @else

        <div class="glass-card rounded-2xl p-10 text-center">

            <h2 class="text-xl font-semibold text-white">
                Data Tidak Ditemukan
            </h2>

            <p class="text-slate-400 text-sm mt-2">
                Data surat masuk yang diminta tidak tersedia.
            </p>

            <a href="{{ route('surat-masuk.index') }}"
               class="btn-primary inline-block rounded-xl px-5 py-3 mt-6 text-sm font-medium">

                Kembali ke Surat Masuk

            </a>

        </div>

    @endif

</div>

@endsection
