@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Surat Keluar</h2>

    <a href="{{ route('surat-keluar.index') }}">Kembali</a>

    @if ($errors->any())
        <div style="color: red; margin: 10px 0;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat-keluar.update', $SuratShow->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nomor Surat</label><br>
            <input type="text" name="nomor_surat"
                value="{{ old('nomor_surat', $SuratShow->nomor_surat) }}" required>
        </div>

        <div>
            <label>Tanggal Surat</label><br>
            <input type="date" name="tanggal"
                value="{{ old('tanggal', $SuratShow->tanggal->format('Y-m-d')) }}" required>
        </div>

        <div>
            <label>Tujuan</label><br>
            <input type="text" name="tujuan"
                value="{{ old('tujuan', $SuratShow->tujuan) }}" required>
        </div>

        <div>
            <label>Perihal</label><br>
            <input type="text" name="perihal"
                value="{{ old('perihal', $SuratShow->perihal) }}" required>
        </div>

        <div>
            <label>Keterangan</label><br>
            <textarea name="keterangan">{{ old('keterangan', $SuratShow->keterangan) }}</textarea>
        </div>

        <br>
        <button type="submit">Perbarui Surat</button>
    </form>
</div>
@endsection
