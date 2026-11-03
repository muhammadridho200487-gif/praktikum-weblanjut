
@extends('layouts.app')

@section('content')
    <h1>Tambah Surat Masuk</h1>

    <form action="{{ route('surat-masuk.store') }}" method="POST">
        @csrf

        <div>
            <label>Nomor Surat</label><br>
            <input type="text" name="nomor_surat"
                value="{{ old('nomor_surat') }}" required>
            @error('nomor_surat')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Tanggal</label><br>
            <input type="date" name="tanggal"
                value="{{ old('tanggal') }}" required>
            @error('tanggal')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Pengirim</label><br>
            <input type="text" name="pengirim"
                value="{{ old('pengirim') }}" required>
            @error('pengirim')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Perihal</label><br>
            <input type="text" name="perihal"
                value="{{ old('perihal') }}" required>
            @error('perihal')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Keterangan</label><br>
            <textarea name="keterangan">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('surat-masuk.index') }}">Kembali</a>
    </form>
@endsection
