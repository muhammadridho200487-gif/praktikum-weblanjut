@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
    <h1>Detail Surat Keluar</h1>

    @if ($SuratShow)
        <p>
            <strong>Nomor Surat:</strong>
            {{ $SuratShow->nomor_surat }}
        </p>

        <p>
            <strong>Tanggal:</strong>
            {{ $SuratShow->tanggal->format('d-m-Y') }}
        </p>

        <p>
            <strong>Tujuan:</strong>
            {{ $SuratShow->tujuan }}
        </p>

        <p>
            <strong>Perihal:</strong>
            {{ $SuratShow->perihal }}
        </p>

        <p>
            <strong>Keterangan:</strong>
            {{ $SuratShow->keterangan ?? '-' }}
        </p>

        {{-- Tombol edit hanya untuk Petugas --}}
        @can('manage-letters')
            <a href="{{ route('surat-keluar.edit', $SuratShow->id) }}">
                Edit Surat
            </a>
        @endcan

    @else
        <p>Data surat keluar tidak ditemukan.</p>
    @endif

    <br>

    <a href="{{ route('surat-keluar.index') }}">
        Kembali ke Surat Keluar
    </a>
@endsection
