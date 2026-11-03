@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Surat Keluar</h2>

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

    <form action="{{ route('surat-keluar.store') }}" method="POST">
        @csrf

        <div>
            <label>Nomor Surat</label><br>
            <input type="text" name="nomor_surat"
                value="{{ old('nomor_surat') }}" required>
        </div>

        <div>
            <label>Tanggal Surat</label><br>
            <input type="date" name="tanggal"
                value="{{ old('tanggal') }}" required>
        </div>

        <div>
            <label>Tujuan</label><br>
            <input type="text" name="tujuan"
                value="{{ old('tujuan') }}" required>
        </div>

        <div>
            <label>Perihal</label><br>
            <input type="text" name="perihal"
                value="{{ old('perihal') }}" required>
        </div>

        <div>
            <label>Keterangan</label><br>
            <textarea name="keterangan">{{ old('keterangan') }}</textarea>
        </div>

        <br>
        <button type="submit">Simpan Surat</button>
    </form>
</div>
@endsection