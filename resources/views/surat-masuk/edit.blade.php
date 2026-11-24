@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">

    {{-- Header --}}
    <div class="space-y-2">
        <p class="text-sm font-medium uppercase tracking-[0.2em] text-blue-300">
            Document Management
        </p>

        <h1 class="text-3xl font-bold text-white">
            Edit Surat Masuk
        </h1>

        <p class="text-sm text-slate-400">
            Perbarui informasi surat masuk melalui formulir berikut.
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
                        Formulir Surat Masuk
                    </h2>
                    <p class="text-sm text-slate-400">
                        Periksa dan perbarui data surat masuk.
                    </p>
                </div>

            </div>
        </div>

        <form action="{{ route('surat-masuk.update', $SuratShow->id) }}"
              method="POST"
              class="space-y-5 p-6">

            @csrf
            @method('PUT')

            <div class="grid gap-5 sm:grid-cols-2">

                {{-- Nomor Surat --}}
                <div class="space-y-2">
                    <label for="nomor_surat" class="text-sm font-medium text-slate-200">
                        Nomor Surat
                    </label>

                    <input type="text"
                           id="nomor_surat"
                           name="nomor_surat"
                           value="{{ old('nomor_surat', $SuratShow->nomor_surat) }}"
                           class="form-input w-full rounded-xl px-4 py-3 text-sm">

                    @error('nomor_surat')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="space-y-2">
                    <label for="tanggal" class="text-sm font-medium text-slate-200">
                        Tanggal Surat
                    </label>

                    <input type="date"
                           id="tanggal"
                           name="tanggal"
                           value="{{ old('tanggal', $SuratShow->tanggal) }}"
                           class="form-input w-full rounded-xl px-4 py-3 text-sm">

                    @error('tanggal')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Pengirim --}}
                <div class="space-y-2">
                    <label for="pengirim" class="text-sm font-medium text-slate-200">
                        Pengirim
                    </label>

                    <input type="text"
                           id="pengirim"
                           name="pengirim"
                           value="{{ old('pengirim', $SuratShow->pengirim) }}"
                           class="form-input w-full rounded-xl px-4 py-3 text-sm">

                    @error('pengirim')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Perihal --}}
                <div class="space-y-2">
                    <label for="perihal" class="text-sm font-medium text-slate-200">
                        Perihal
                    </label>

                    <input type="text"
                           id="perihal"
                           name="perihal"
                           value="{{ old('perihal', $SuratShow->perihal) }}"
                           class="form-input w-full rounded-xl px-4 py-3 text-sm">

                    @error('perihal')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
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
                              placeholder="Tambahkan keterangan jika diperlukan">{{ old('keterangan', $SuratShow->keterangan) }}</textarea>

                    @error('keterangan')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-wrap items-center justify-between gap-3 border-t border-white/10 pt-5">

                <a href="{{ route('surat-masuk.index') }}"
                   class="btn-secondary inline-flex items-center gap-2 rounded-xl px-5 py-3 text-sm font-medium">
                    <span>&larr;</span>
                    Kembali
                </a>

                <button type="submit"
                        class="btn-primary inline-flex items-center gap-2 rounded-xl px-6 py-3 text-sm font-semibold">
                    Perbarui Surat
                    <span>&rarr;</span>
                </button>

            </div>

        </form>
    </div>

</div>
@endsection
