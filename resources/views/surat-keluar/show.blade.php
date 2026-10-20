@extends('layouts.app')

@section('content')
    <h1>Detail Surat Keluar</h1>

    <p>
        <strong>Nomor Surat:</strong>
        {{ $SuratShow['nomor_surat'] }}
    </p>

    <p>
        <strong>Tanggal:</strong>
        {{ $SuratShow['tanggal'] }}
    </p>

    <p>
        <strong>Pengirim:</strong>
        {{ $SuratShow['pengirim'] }}
    </p>

    <p>
        <strong>Perihal:</strong>
        {{ $SuratShow['perihal'] }}
    </p>

    <a href="{{ route('surat-keluar.index') }}">Kembali</a>
@endsection
