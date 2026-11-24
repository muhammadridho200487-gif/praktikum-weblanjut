@extends('layouts.app')

@section('title', 'Tambah Surat Keluar')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">

    {{-- Header --}}
    <div class="space-y-2">
        <p class="text-sm font-medium uppercase tracking-[0.2em] text-blue-300">
            Document Management
        </p>

        <h1 class="text-3xl font-bold text-white">
            Tambah Surat Keluar
        </h1>

        <p class="text-sm text-slate-400">
            Masukkan informasi surat keluar ke dalam sistem.
        </p>
    </div>

    {{-- Form Card --}}
    <div class="glass-card overflow-hidden rounded-2xl">

        <div class="border-b border-white/10 bg-white/[0.03] p-6">
            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500/15 text-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-7 w-7"
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
                    <h2 class="font-semibold text-white">
                        Formulir Surat Keluar
                    </h2>
                    <p class="text-sm text-slate-400">
                        Lengkapi seluruh informasi yang diperlukan.
                    </p>
                </div>

            </div>
        </div>

        <form action="{{ route('surat-keluar.store') }}"
              method="POST"
              class="space-y-5 p-6">

            @csrf

            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="rounded-xl border border-red-400/30 bg-red-500/10 p-4 text-sm text-red-300">
                    <p class="mb-2 font-semibold">
                        Terdapat kesalahan pada formulir:
                    </p>

                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid gap-5 sm:grid-cols-2">

                {{-- Nomor Surat --}}
                <div class="space-y-2">
                    <label for="nomor_surat" class="text-sm font-medium text-slate-200">
                        Nomor Surat
                    </label>

                    <input type="text"
                           id="nomor_surat"
                           name="nomor_surat"
                           value="{{ old('nomor_surat') }}"
                           required
                           class="form-input w-full rounded-xl px-4 py-3 text-sm"
                           placeholder="Masukkan nomor surat">
                </div>

                {{-- Tanggal --}}
                <div class="space-y-2">
                    <label for="tanggal" class="text-sm font-medium text-slate-200">
                        Tanggal Surat
                    </label>

                    <input type="date"
                           id="tanggal"
                           name="tanggal"
                           value="{{ old('tanggal') }}"
                           required
                           class="form-input w-full rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Tujuan --}}
                <div class="space-y-2">
                    <label for="tujuan" class="text-sm font-medium text-slate-200">
                        Tujuan
                    </label>

                    <input type="text"
                           id="tujuan"
                           name="tujuan"
                           value="{{ old('tujuan') }}"
                           required
                           class="form-input w-full rounded-xl px-4 py-3 text-sm"
                           placeholder="Masukkan tujuan surat">
                </div>

                {{-- Perihal --}}
                <div class="space-y-2">
                    <label for="perihal" class="text-sm font-medium text-slate-200">
                        Perihal
                    </label>

                    <input type="text"
                           id="perihal"
                           name="perihal"
                           value="{{ old('perihal') }}"
                           required
                           class="form-input w-full rounded-xl px-4 py-3 text-sm"
                           placeholder="Masukkan perihal surat">
                </div>

                {{-- Keterangan --}}
                <div class="space-y-2 sm:col-span-2">
                    <label for="keterangan" class="text-sm font-medium text-slate-200">
                        Keterangan
                    </label>

                    <textarea id="keterangan"
                              name="keterangan"
                              rows="4"
                              class="form-input w-full rounded-xl px-4 py-3 text-sm"
                              placeholder="Tambahkan keterangan jika diperlukan">{{ old('keterangan') }}</textarea>
                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-wrap items-center justify-between gap-3 border-t border-white/10 pt-5">

                <a href="{{ route('surat-keluar.index') }}"
                   class="btn-secondary inline-flex items-center gap-2 rounded-xl px-5 py-3 text-sm font-medium">
                    <span>&larr;</span>
                    Kembali
                </a>

                <button type="submit"
                        class="btn-primary inline-flex items-center gap-2 rounded-xl px-6 py-3 text-sm font-semibold">
                    Simpan Surat
                    <span>&rarr;</span>
                </button>

            </div>

        </form>
    </div>

</div>
@endsection
