<?php

namespace App\Http\Controllers;

class SuratKeluarController extends Controller
{
    private function dataSurat()
    {
        return [
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
    }

    public function index()
    {
        $SuratKeluar = $this->dataSurat();

        return view('surat-keluar.index', compact('SuratKeluar'));
    }

    public function show($id)
    {
        $dataSurat = $this->dataSurat();

        $SuratShow = collect($dataSurat)->firstWhere('id', (int) $id);

        if ($SuratShow === null) {
            abort(404, 'Surat Keluar tidak ditemukan.');
        }

        return view('surat-keluar.show', compact('SuratShow'));
    }
}
