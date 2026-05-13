<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(BukuSeeder::class);

        // Buat Super Admin
        User::create([
            'name'     => 'Super Admin',
            'email'    => 'superadmin@perpustakaan.com',
            'telepon'  => '08123456789',
            'alamat'   => 'Kantor Pusat',
            'role'     => 'superadmin',
            'password' => Hash::make('superadmin123'),
        ]);

        // Buat Admin
        User::create([
            'name'     => 'Admin Perpustakaan',
            'email'    => 'admin@perpustakaan.com',
            'telepon'  => '08111222333',
            'alamat'   => 'Perpustakaan Utama',
            'role'     => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Buat User biasa
        User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'user@perpustakaan.com',
            'telepon'  => '08999888777',
            'alamat'   => 'Jl. Merdeka No. 1',
            'role'     => 'user',
            'password' => Hash::make('user123'),
        ]);
    }
}