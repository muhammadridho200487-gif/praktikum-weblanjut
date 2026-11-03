@extends('layouts.app')

@section('content')
    <h1>Edit Surat Masuk</h1>

    <form action="{{ route('surat-masuk.update', $SuratShow->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nomor Surat</label><br>
            <input type="text" name="nomor_surat"
                value="{{ old('nomor_surat', $SuratShow->nomor_surat) }}">
            @error('nomor_surat')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Tanggal</label><br>
            <input type="date" name="tanggal"
                value="{{ old('tanggal', $SuratShow->tanggal) }}">
            @error('tanggal')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Pengirim</label><br>
            <input type="text" name="pengirim"
                value="{{ old('pengirim', $SuratShow->pengirim) }}">
            @error('pengirim')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Perihal</label><br>
            <input type="text" name="perihal"
                value="{{ old('perihal', $SuratShow->perihal) }}">
            @error('perihal')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Keterangan</label><br>
            <textarea name="keterangan">{{ old('keterangan', $SuratShow->keterangan) }}</textarea>
            @error('keterangan')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Perbarui</button>
        <a href="{{ route('surat-masuk.index') }}">Kembali</a>
    </form>
@endsection