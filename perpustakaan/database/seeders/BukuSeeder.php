<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    

    public function run(): void
    {

     // ✅ TAMBAHKAN INI DULU — isi tabel kategori
    DB::table('kategoris')->insert([
        ['id' => 1, 'nama_kategori' => 'Fiksi',        'created_at' => now(), 'updated_at' => now()],
        ['id' => 2, 'nama_kategori' => 'Non-Fiksi',    'created_at' => now(), 'updated_at' => now()],
        ['id' => 3, 'nama_kategori' => 'Harry Potter', 'created_at' => now(), 'updated_at' => now()],
        ['id' => 4, 'nama_kategori' => 'Dilan',        'created_at' => now(), 'updated_at' => now()],
    ]);

    // (sisanya biarkan sama, jangan ubah bagian buku di bawah ini)
    DB::table('bukus')->insert([
        // ... (kode yang sudah ada, jangan dihapus)
    ]);

        DB::table('bukus')->insert([

            [
                'judul' => 'Le Petit Prince',
                'penulis' => 'Antoine de Saint-Exupéry',
                'harga' => 75000,
                'stok' => 20,
                'gambar' => 'images/p4.png',
                'deskripsi' => 'Cerita perjalanan seorang anak dari planet lain.',
                'publisher' => 'Reynal & Hitchcock',
                'release' => '1943',
                'format' => 'Hardcover',
                'page' => '96',
                'isbn' => '9781949998641',
                'kategori_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'harga' => 95000,
                'stok' => 15,
                'gambar' => 'images/p1.png',
                'deskripsi' => 'Panduan membangun kebiasaan baik.',
                'publisher' => 'Avery',
                'release' => '2018',
                'format' => 'Hardcover',
                'page' => '320',
                'isbn' => '9780735211292',
                'kategori_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Laut Bercerita',
                'penulis' => 'Leila S. Chudori',
                'harga' => 88000,
                'stok' => 12,
                'gambar' => 'images/p2.png',
                'deskripsi' => 'Kisah perjuangan mahasiswa.',
                'publisher' => 'KPG',
                'release' => '2017',
                'format' => 'Paperback',
                'page' => '379',
                'isbn' => '9786024246948',
                'kategori_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Namiya',
                'penulis' => 'Keigo Higashino',
                'harga' => 90000,
                'stok' => 18,
                'gambar' => 'images/p3.png',
                'deskripsi' => 'Cerita lintas waktu yang unik.',
                'publisher' => 'Gramedia',
                'release' => '2012',
                'format' => 'Paperback',
                'page' => '400',
                'isbn' => '9786020331587',
                'kategori_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Harry Potter and the Philosopher Stone',
                'penulis' => 'J.K Rowling',
                'harga' => 100000,
                'stok' => 30,
                'gambar' => 'images/hp1.png',
                'deskripsi' => 'Petualangan Harry Potter dimulai.',
                'publisher' => 'Bloomsbury',
                'release' => '1997',
                'format' => 'Hardcover',
                'page' => '223',
                'isbn' => '9780747532699',
                'kategori_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Dilan 1990',
                'penulis' => 'Pidi Baiq',
                'harga' => 75000,
                'stok' => 25,
                'gambar' => 'images/dilan1.png',
                'deskripsi' => 'Kisah cinta Dilan dan Milea.',
                'publisher' => 'Pastel Books',
                'release' => '2014',
                'format' => 'Paperback',
                'page' => '348',
                'isbn' => '9786027870867',
                'kategori_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    }
}
