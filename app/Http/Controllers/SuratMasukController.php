<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;

class SuratMasukController extends Controller
{
    public function index()
    {
        $SuratMasuk = IncomingLetter::orderBy('tanggal', 'desc')->get();

        return view('surat-masuk.index', compact('SuratMasuk'));
    }

    public function show($id)
    {
        $SuratShow = IncomingLetter::find($id);

        if ($SuratShow === null) {
            abort(404, 'Surat masuk tidak ditemukan.');
        }

        return view('surat-masuk.show', compact('SuratShow'));
    }
}
