<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SuratMasukController extends Controller
{
    // Menampilkan daftar surat masuk
    public function index(Request $request)
    {
        $SuratMasuk = IncomingLetter::with('category')
            ->when($request->filled('q'), function ($query) use ($request) {
                $search = $request->q;

                $query->where(function ($query) use ($search) {
                    $query->where('nomor_surat', 'like', "%{$search}%")
                        ->orWhere('pengirim', 'like', "%{$search}%")
                        ->orWhere('perihal', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(5)
            ->withQueryString();

        $categories = Category::all();

        return view('surat-masuk.index', compact('SuratMasuk', 'categories'));
    }

    // Menampilkan form tambah surat
    public function create()
    {
        $categories = Category::all();

        return view('surat-masuk.create', compact('categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat', 'public');
        }

        IncomingLetter::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $SuratShow = IncomingLetter::with('category')->findOrFail($id);

        return view('surat-masuk.show', compact('SuratShow'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $SuratShow = IncomingLetter::findOrFail($id);
        $categories = Category::all();

        return view('surat-masuk.edit', compact('SuratShow', 'categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $newFile = $request->file('lampiran')
                ->store('lampiran-surat', 'public');

            if ($SuratShow->lampiran) {
                Storage::disk('public')->delete($SuratShow->lampiran);
            }

            $validated['lampiran'] = $newFile;
        }

        $SuratShow->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $SuratShow = IncomingLetter::findOrFail($id);

        if ($SuratShow->lampiran) {
            Storage::disk('public')->delete($SuratShow->lampiran);
        }

        $SuratShow->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
