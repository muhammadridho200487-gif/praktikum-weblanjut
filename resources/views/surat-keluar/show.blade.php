@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
    <h1>Halaman Detail Surat Keluar</h1>

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
    @else
        <p>Data surat keluar tidak ditemukan.</p>
    @endif

    <a href="{{ route('surat-keluar.index') }}">
        Kembali ke Surat Keluar
    </a>
@endsection
