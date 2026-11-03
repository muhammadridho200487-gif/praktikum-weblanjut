<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SuratMasukController extends Controller
{
    // Menampilkan daftar surat masuk
    public function index()
    {
        $SuratMasuk = IncomingLetter::orderBy('tanggal', 'desc')->get();

        return view('surat-masuk.index', compact('SuratMasuk'));
    }

    // Menampilkan form tambah surat
    public function create()
{
    return view('surat-masuk.create');
}

    // Menyimpan surat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255|unique:incoming_letters,nomor_surat',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        IncomingLetter::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $SuratShow = IncomingLetter::findOrFail($id);

        return view('surat-masuk.show', compact('SuratShow'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $SuratShow = IncomingLetter::findOrFail($id);

        return view('surat-masuk.edit', compact('SuratShow'));
    }

    // Memperbarui surat
    public function update(Request $request, $id)
    {
        $SuratShow = IncomingLetter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => [
                'required',
                'string',
                'max:255',
                Rule::unique('incoming_letters', 'nomor_surat')->ignore($SuratShow->id),
            ],
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $SuratShow->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $SuratShow = IncomingLetter::findOrFail($id);

        $SuratShow->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}