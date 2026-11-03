<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Petugas
        User::updateOrCreate(
            ['email' => 'petugas@gmail.com'],
            [
                'name' => 'Petugas',
                'password' => Hash::make('petugas123'),
                'role' => 'petugas',
            ]
        );

        // Akun Pembaca
        User::updateOrCreate(
            ['email' => 'pembaca@gmail.com'],
            [
                'name' => 'Pembaca',
                'password' => Hash::make('pembaca123'),
                'role' => 'pembaca',
            ]
        );
    }
}