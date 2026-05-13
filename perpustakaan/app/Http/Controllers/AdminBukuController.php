<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminBukuController extends Controller
{
    // Tampilkan semua buku
    public function index()
    {
        $bukus = Buku::with('kategori')->orderBy('created_at', 'desc')->get();
        return view('admin.buku.index', compact('bukus'));
    }

    // Form tambah buku
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.buku.create', compact('kategoris'));
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required',
            'penulis'    => 'required',
            'harga'      => 'required|numeric',
            'stok'       => 'required|numeric',
            'kategori_id'=> 'required',
            'gambar'     => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['gambar'] = 'images/' . $filename;
        } else {
            $data['gambar'] = 'images/buku.png'; // default image
        }

        Buku::create($data);

        return redirect('/admin/buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.buku.edit', compact('buku', 'kategoris'));
    }

    // Update buku
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'judul'      => 'required',
            'penulis'    => 'required',
            'harga'      => 'required|numeric',
            'stok'       => 'required|numeric',
            'kategori_id'=> 'required',
            'gambar'     => 'nullable|image|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['gambar'] = 'images/' . $filename;
        }

        $buku->update($data);

        return redirect('/admin/buku')->with('success', 'Buku berhasil diperbarui!');
    }

    // Hapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect('/admin/buku')->with('success', 'Buku berhasil dihapus!');
    }
}