@extends('layouts.app')

@section('title', 'Surat Keluar')

@section('content')
    <h1>Surat Keluar</h1>
    <p>Halaman ini menampilkan data surat keluar.</p>

    @if (session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol tambah hanya untuk Petugas --}}
    @can('manage-letters')
        <a href="{{ route('surat-keluar.create') }}">
            + Tambah Surat Keluar
        </a>
    @endcan

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Tujuan</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($SuratKeluar as $surat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->tanggal->format('d-m-Y') }}</td>
                    <td>{{ $surat->tujuan }}</td>
                    <td>{{ $surat->perihal }}</td>

                    <td>
                        <a href="{{ route('surat-keluar.show', $surat->id) }}">
                            Detail
                        </a>

                        {{-- Edit dan hapus hanya untuk Petugas --}}
                        @can('manage-letters')
                            |
                            <a href="{{ route('surat-keluar.edit', $surat->id) }}">
                                Edit
                            </a>

                            |

                            <form action="{{ route('surat-keluar.destroy', $surat->id) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus surat ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit">Hapus</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data surat keluar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
