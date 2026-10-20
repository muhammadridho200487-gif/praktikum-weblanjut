@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('content')

    <h1>Halaman Detail Surat Masuk</h1>
@if($SuratShow)
    <p>
        <strong>Nomor Surat : </strong>{{ $SuratShow['nomor_surat']}}<br>
        <strong>Tanggal : </strong>{{ $SuratShow['tanggal']}}<br>
        <strong>Pengirim : </strong>{{ $SuratShow['pengirim']}}<br>
        <strong>Perihal : </strong>{{ $SuratShow['perihal']}}<br>
    </p>
@else
    <p>Data tidak ditemukan</p>
@endif

<a href="{{ route('surat-keluar.index') }}">Kembali</a>
@endsection
