@extends('layouts.app')

@section('content')
    <h1>Surat Keluar</h1>
    <p>Halaman ini menampilkan data surat keluar.</p>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($SuratKeluar as $surat)
                <tr>
                    <td>{{ $surat['id'] }}</td>
                    <td>{{ $surat['nomor_surat'] }}</td>
                    <td>{{ $surat['tanggal'] }}</td>
                    <td>{{ $surat['pengirim'] }}</td>
                    <td>{{ $surat['perihal'] }}</td>
                    <td>
                        <a href="{{ route('surat-keluar.show', $surat['id']) }}">Detail</a>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
