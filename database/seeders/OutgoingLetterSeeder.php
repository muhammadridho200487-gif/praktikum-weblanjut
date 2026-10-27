<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutgoingLetterSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nomor_surat' => '001/DPMD/X/2026',
                'tanggal' => '2026-10-05',
                'tujuan' => 'Kantor Kecamatan',
                'perihal' => 'Undangan Koordinasi',
                'keterangan' => 'Undangan koordinasi kegiatan desa',
            ],
            [
                'nomor_surat' => '002/DPMD/X/2026',
                'tanggal' => '2026-10-10',
                'tujuan' => 'Pemerintah Desa',
                'perihal' => 'Permintaan Data Desa',
                'keterangan' => 'Permintaan pembaruan data administrasi desa',
            ],
            [
                'nomor_surat' => '003/DPMD/X/2026',
                'tanggal' => '2026-10-15',
                'tujuan' => 'Dinas Komunikasi dan Informatika',
                'perihal' => 'Koordinasi Sistem Informasi',
                'keterangan' => 'Koordinasi pengelolaan sistem informasi',
            ],
        ];

        foreach ($data as $surat) {
            DB::table('outgoing_letters')->updateOrInsert(
                ['nomor_surat' => $surat['nomor_surat']],
                $surat + [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
