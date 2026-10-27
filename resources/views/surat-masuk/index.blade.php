@extends('layouts.app')

@section('content')
    <h1>Surat Masuk</h1>
    <p>Halaman ini menampilkan data surat masuk.</p>

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
            @forelse ($SuratMasuk as $surat)
                <tr>
                    <td>{{ $surat->id }}</td>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->tanggal }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ $surat->perihal }}</td>
                    <td>
                        <a href="{{ route('surat-masuk.show', $surat->id) }}">
                            Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data surat masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
