@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- HEADER HALAMAN --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8">

        <div>
            <p class="text-sm font-medium text-blue-400 mb-2">
                MANAJEMEN SURAT
            </p>

            <h1 class="text-3xl font-bold text-white">
                Surat Masuk
            </h1>

            <p class="text-slate-400 text-sm mt-2">
                Daftar dan pengelolaan surat yang diterima.
            </p>
        </div>

        @can('manage-letters')
            <a href="{{ route('surat-masuk.create') }}"
               class="btn-primary rounded-xl px-5 py-3 text-sm font-semibold flex items-center justify-center gap-2">
                <span class="text-xl">+</span>
                Tambah Surat Masuk
            </a>
        @endcan

    </div>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="mb-6 rounded-xl border border-emerald-400/30 bg-emerald-400/10 px-5 py-4 text-sm text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    {{-- PENCARIAN DAN FILTER --}}
    <div class="glass-card rounded-2xl p-6 mb-6">

        <form action="{{ route('surat-masuk.index') }}"
              method="GET"
              class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            <div class="space-y-2 lg:col-span-2">
                <label for="q" class="text-sm font-medium text-slate-200">
                    Cari Surat
                </label>

                <input type="text"
                       id="q"
                       name="q"
                       value="{{ request('q') }}"
                       placeholder="Cari nomor surat, pengirim, atau perihal..."
                       class="form-input w-full rounded-xl px-4 py-3 text-sm">
            </div>

            <div class="space-y-2">
                <label for="category_id" class="text-sm font-medium text-slate-200">
                    Filter Kategori
                </label>

                <select id="category_id"
                        name="category_id"
                        class="form-input w-full rounded-xl px-4 py-3 text-sm">
                    <option value="">Semua Kategori</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end gap-2">
                <button type="submit"
                        class="btn-primary rounded-xl px-5 py-3 text-sm font-semibold flex-1">
                    Cari
                </button>

                <a href="{{ route('surat-masuk.index') }}"
                   class="btn-secondary rounded-xl px-5 py-3 text-sm font-medium">
                    Reset
                </a>
            </div>

        </form>

    </div>

    {{-- TABEL SURAT --}}
    <div class="glass-card rounded-2xl overflow-hidden">

        <div class="p-6 border-b border-white/10 flex items-center justify-between">

            <div>
                <h2 class="text-lg font-semibold text-white">
                    Daftar Surat Masuk
                </h2>

                <p class="text-sm text-slate-400 mt-1">
                    Informasi surat yang tersimpan dalam sistem.
                </p>
            </div>

            <div class="hidden sm:flex w-11 h-11 rounded-xl bg-blue-500/15 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 text-blue-400"
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

        <div class="overflow-x-auto">

            <table class="table-modern w-full text-left text-sm">

                <thead>
                    <tr class="text-slate-400 bg-white/[0.03]">
                        <th class="px-6 py-4 font-medium">No.</th>
                        <th class="px-6 py-4 font-medium">Nomor Surat</th>
                        <th class="px-6 py-4 font-medium">Tanggal</th>
                        <th class="px-6 py-4 font-medium">Pengirim</th>
                        <th class="px-6 py-4 font-medium">Perihal</th>
                        <th class="px-6 py-4 font-medium">Kategori</th>
                        <th class="px-6 py-4 font-medium text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/5">

                    @forelse ($SuratMasuk as $surat)

                        <tr class="hover:bg-white/[0.03] transition-colors">

                            <td class="px-6 py-4 text-slate-400">
                                {{ $SuratMasuk->firstItem() + $loop->index }}
                            </td>

                            <td class="px-6 py-4 text-white font-medium whitespace-nowrap">
                                {{ $surat->nomor_surat }}
                            </td>

                            <td class="px-6 py-4 text-slate-300 whitespace-nowrap">
                                {{ $surat->tanggal }}
                            </td>

                            <td class="px-6 py-4 text-slate-300">
                                {{ $surat->pengirim }}
                            </td>

                            <td class="px-6 py-4 text-slate-300">
                                {{ $surat->perihal }}
                            </td>

                            <td class="px-6 py-4 text-slate-300">
                                @if ($surat->category)
                                    <span class="rounded-lg bg-blue-500/10 border border-blue-400/20 px-3 py-1 text-xs text-blue-300">
                                        {{ $surat->category->nama }}
                                    </span>
                                @else
                                    <span class="text-slate-500 text-xs">
                                        Belum dikategorikan
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <a href="{{ route('surat-masuk.show', $surat->id) }}"
                                       class="rounded-lg bg-blue-500/10 border border-blue-400/20 px-3 py-2 text-xs font-medium text-blue-400 hover:bg-blue-500/20 transition-colors">
                                        Detail
                                    </a>

                                    @can('manage-letters')

                                        <a href="{{ route('surat-masuk.edit', $surat->id) }}"
                                           class="rounded-lg bg-amber-500/10 border border-amber-400/20 px-3 py-2 text-xs font-medium text-amber-400 hover:bg-amber-500/20 transition-colors">
                                            Edit
                                        </a>

                                        <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus surat ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-lg bg-red-500/10 border border-red-400/20 px-3 py-2 text-xs font-medium text-red-400 hover:bg-red-500/20 transition-colors">
                                                Hapus
                                            </button>

                                        </form>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-14 h-14 rounded-2xl bg-white/5 flex items-center justify-center mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-7 h-7 text-slate-500"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.5">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M7 8h10M7 12h10M7 16h6M5 3h10l4 4v14H5V3z" />
                                        </svg>
                                    </div>

                                    <p class="text-slate-300 font-medium">
                                        Data surat tidak ditemukan
                                    </p>

                                    <p class="text-slate-500 text-xs mt-2">
                                        Coba ubah kata kunci pencarian atau filter kategori.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="px-6 py-5 border-t border-white/10">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <p class="text-xs text-slate-400">
                    Menampilkan
                    {{ $SuratMasuk->firstItem() ?? 0 }}
                    sampai
                    {{ $SuratMasuk->lastItem() ?? 0 }}
                    dari
                    {{ $SuratMasuk->total() }}
                    surat
                </p>

                <div class="text-sm">
                    {{ $SuratMasuk->links() }}
                </div>

            </div>

        </div>

        <div class="px-6 py-4 border-t border-white/10">
            <p class="text-xs text-slate-500">
                Sistem Informasi Surat &bull; Data Surat Masuk
            </p>
        </div>

    </div>

</div>

@endsection
