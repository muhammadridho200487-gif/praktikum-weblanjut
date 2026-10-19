<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $SuratMasuk = [
            [
                'id' => 1,
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '13-10-2026',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat'
            ],
            [
                'id' => 2,
                'nomor_surat' => '002/FK/X/2026',
                'tanggal' => '20-10-2026',
                'pengirim' => 'Fakultas Kedokteran',
                'perihal' => 'Sosialisasi Imunisasi'
            ],
            [
                'id' => 3,
                'nomor_surat' => '003/LPM/X/2026',
                'tanggal' => '18-10-2026',
                'pengirim' => 'LPM',
                'perihal' => 'Sosialisasi Pedoman'
            ]
        ];

        return view('surat-masuk.index', compact('SuratMasuk'));
    }

    public function show($id)
    {
        $dataSurat = [
            1 => [
                'id' => 1,
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '13-10-2026',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat'
            ],
            2 => [
                'id' => 2,
                'nomor_surat' => '002/FK/X/2026',
                'tanggal' => '20-10-2026',
                'pengirim' => 'Fakultas Kedokteran',
                'perihal' => 'Sosialisasi Imunisasi'
            ],
            3 => [
                'id' => 3,
                'nomor_surat' => '003/LPM/X/2026',
                'tanggal' => '18-10-2026',
                'pengirim' => 'LPM',
                'perihal' => 'Sosialisasi Pedoman'
            ]
        ];

        $SuratShow = $dataSurat[$id] ?? null;

        if ($SuratShow === null) {
            abort(404, 'Surat masuk tidak ditemukan.');
        }

        return view('surat-masuk.show', compact('SuratShow'));
    }
}
