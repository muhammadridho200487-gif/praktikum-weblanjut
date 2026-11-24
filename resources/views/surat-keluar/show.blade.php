@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
    <div class="mx-auto max-w-4xl space-y-6">

        <div class="flex flex-col gap-2">
            <p class="text-sm font-medium uppercase tracking-[0.2em] text-blue-300">
                Digital Document Detail
            </p>
            <h1 class="text-3xl font-bold text-white">
                Detail Surat Keluar
            </h1>
            <p class="text-sm text-slate-400">
                Informasi lengkap mengenai surat keluar.
            </p>
        </div>

        @if ($SuratShow)

            <div class="glass-card overflow-hidden rounded-2xl">

                <div class="border-b border-white/10 bg-white/[0.03] p-6">
                    <div class="flex items-center gap-4">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-8 w-8"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.5">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M7 3.75h7.5L19 8.25v12A.75.75 0 0 1 18.25 21h-11.5a.75.75 0 0 1-.75-.75v-16.5A.75.75 0 0 1 6.75 3h.25Z" />
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M14 3.75v4.5h4.5M8.5 13h7M8.5 16.5h7" />
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-lg font-semibold text-white">
                                Informasi Surat Keluar
                            </h2>
                            <p class="text-sm text-slate-400">
                                Nomor: {{ $SuratShow->nomor_surat }}
                            </p>
                        </div>

                    </div>
                </div>

                <div class="grid gap-5 p-6 sm:grid-cols-2">

                    <div class="rounded-xl border border-white/10 bg-white/[0.03] p-4">
                        <p class="mb-2 text-xs font-medium uppercase tracking-wider text-slate-400">
                            Nomor Surat
                        </p>
                        <p class="font-semibold text-white">
                            {{ $SuratShow->nomor_surat }}
                        </p>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/[0.03] p-4">
                        <p class="mb-2 text-xs font-medium uppercase tracking-wider text-slate-400">
                            Tanggal Surat
                        </p>
                        <p class="font-semibold text-white">
                            {{ $SuratShow->tanggal->format('d-m-Y') }}
                        </p>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/[0.03] p-4">
                        <p class="mb-2 text-xs font-medium uppercase tracking-wider text-slate-400">
                            Tujuan
                        </p>
                        <p class="font-semibold text-white">
                            {{ $SuratShow->tujuan }}
                        </p>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/[0.03] p-4">
                        <p class="mb-2 text-xs font-medium uppercase tracking-wider text-slate-400">
                            Perihal
                        </p>
                        <p class="font-semibold text-white">
                            {{ $SuratShow->perihal }}
                        </p>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/[0.03] p-4 sm:col-span-2">
                        <p class="mb-2 text-xs font-medium uppercase tracking-wider text-slate-400">
                            Keterangan
                        </p>
                        <p class="leading-relaxed text-slate-200">
                            {{ $SuratShow->keterangan ?? '-' }}
                        </p>
                    </div>

                </div>

                <div class="flex flex-wrap items-center justify-between gap-3 border-t border-white/10 p-6">

                    <a href="{{ route('surat-keluar.index') }}"
                       class="btn-secondary inline-flex items-center gap-2 rounded-xl px-5 py-3 text-sm font-medium">

                        <span>&larr;</span>
                        Kembali ke Surat Keluar
                    </a>

                    @can('manage-letters')
                        <a href="{{ route('surat-keluar.edit', $SuratShow->id) }}"
                           class="btn-primary inline-flex items-center gap-2 rounded-xl px-5 py-3 text-sm font-medium">
                            Edit Surat
                            <span>&rarr;</span>
                        </a>
                    @endcan

                </div>

            </div>

        @else

            <div class="glass-card rounded-2xl p-8 text-center">
                <p class="text-lg font-semibold text-white">
                    Data surat keluar tidak ditemukan.
                </p>
                <a href="{{ route('surat-keluar.index') }}"
                   class="btn-secondary mt-5 inline-flex rounded-xl px-5 py-3 text-sm">
                    Kembali ke Surat Keluar
                </a>
            </div>

        @endif

    </div>
@endsection
