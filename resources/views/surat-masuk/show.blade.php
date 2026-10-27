@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
    <h1>Halaman Detail Surat Masuk</h1>

    @if ($SuratShow)
        <p>
            <strong>Nomor Surat:</strong> {{ $SuratShow->nomor_surat }}<br>
            <strong>Tanggal:</strong> {{ $SuratShow->tanggal }}<br>
            <strong>Pengirim:</strong> {{ $SuratShow->pengirim }}<br>
            <strong>Perihal:</strong> {{ $SuratShow->perihal }}<br>
            <strong>Keterangan:</strong> {{ $SuratShow->keterangan ?? '-' }}<br>
        </p>
    @else
        <p>Data tidak ditemukan.</p>
    @endif

    <a href="{{ route('surat-masuk.index') }}">Kembali ke Surat Masuk</a>
@endsection
