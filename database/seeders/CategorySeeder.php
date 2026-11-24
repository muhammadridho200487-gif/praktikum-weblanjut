<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Undangan',
            'Pemberitahuan',
            'Permohonan',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['nama' => $category],
                ['nama' => $category]
            );
        }
    }
}
