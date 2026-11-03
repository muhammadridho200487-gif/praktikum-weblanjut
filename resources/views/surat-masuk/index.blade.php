@extends('layouts.app')

@section('content')
    <h1>Surat Masuk</h1>
    <p>Halaman ini menampilkan data surat masuk.</p>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @can('manage-letters')
        <a href="{{ route('surat-masuk.create') }}">
            + Tambah Surat Masuk
        </a>
    @endcan

    <br><br>

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

                        @can('manage-letters')
                            |
                            <a href="{{ route('surat-masuk.edit', $surat->id) }}">
                                Edit
                            </a>

                            |

                            <form
                                action="{{ route('surat-masuk.destroy', $surat->id) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin ingin menghapus surat ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        @endcan
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