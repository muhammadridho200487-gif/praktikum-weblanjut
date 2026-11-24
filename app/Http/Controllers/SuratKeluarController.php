<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OutgoingLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index(Request $request)
    {
        $query = OutgoingLetter::with('category');

        // Pencarian surat
        $query->when($request->filled('q'), function ($q) use ($request) {
            $search = $request->q;

            $q->where(function ($subQuery) use ($search) {
                $subQuery->where('nomor_surat', 'like', "%{$search}%")
                    ->orWhere('tujuan', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        });

        // Filter kategori
        $query->when($request->filled('category_id'), function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        });

        $SuratKeluar = $query->orderBy('tanggal', 'desc')
            ->paginate(5)
            ->withQueryString();

        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.index', compact('SuratKeluar', 'categories'));
    }

    // Menampilkan form tambah surat
    public function create()
    {
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.create', compact('categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat', 'public');
        }

        OutgoingLetter::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $SuratShow = OutgoingLetter::with('category')->findOrFail($id);

        return view('surat-keluar.show', compact('SuratShow'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $SuratShow = OutgoingLetter::findOrFail($id);
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.edit', compact('SuratShow', 'categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Mengganti lampiran jika ada file baru
        if ($request->hasFile('lampiran')) {
            if ($SuratShow->lampiran) {
                Storage::disk('public')->delete($SuratShow->lampiran);
            }

            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat', 'public');
        } else {
            unset($validated['lampiran']);
        }

        $SuratShow->update($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $SuratShow = OutgoingLetter::findOrFail($id);

        // Menghapus file lampiran
        if ($SuratShow->lampiran) {
            Storage::disk('public')->delete($SuratShow->lampiran);
        }

        $SuratShow->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}
