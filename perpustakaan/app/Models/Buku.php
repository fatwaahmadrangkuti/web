<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'judul',
        'penulis',
        'harga',
        'stok',
        'gambar',
        'deskripsi',
        'publisher',
        'release',
        'format',
        'page',
        'isbn',
        'kategori_id',
    ];

    // ✅ TAMBAHKAN INI — relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}