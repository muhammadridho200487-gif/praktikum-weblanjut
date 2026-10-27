<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $SuratKeluar = OutgoingLetter::orderBy('tanggal', 'desc')->get();

        return view('surat-keluar.index', compact('SuratKeluar'));
    }

    public function show($id)
    {
        $SuratShow = OutgoingLetter::find($id);

        if ($SuratShow === null) {
            abort(404, 'Surat keluar tidak ditemukan.');
        }

        return view('surat-keluar.show', compact('SuratShow'));
    }
}
