<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index()
    {
        $SuratKeluar = OutgoingLetter::orderBy('tanggal', 'desc')->get();

        return view('surat-keluar.index', compact('SuratKeluar'));
    }

    // Menampilkan form tambah surat
    public function create()
    {
        return view('surat-keluar.create');
    }

    // Menyimpan surat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255|unique:outgoing_letters,nomor_surat',
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        OutgoingLetter::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $SuratShow = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.show', compact('SuratShow'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $SuratShow = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.edit', compact('SuratShow'));
    }

    // Memperbarui surat
    public function update(Request $request, $id)
    {
        $SuratShow = OutgoingLetter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => [
                'required',
                'string',
                'max:255',
                Rule::unique('outgoing_letters', 'nomor_surat')->ignore($SuratShow->id),
            ],
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $SuratShow->update($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $SuratShow = OutgoingLetter::findOrFail($id);

        $SuratShow->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}
