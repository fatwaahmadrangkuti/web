<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('bukus')->orderBy('created_at', 'desc')->get();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori' => 'required|unique:kategoris']);
        Kategori::create($request->all());
        return redirect('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $request->validate(['nama_kategori' => 'required|unique:kategoris,nama_kategori,' . $id]);
        $kategori->update($request->all());
        return redirect('/admin/kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/admin/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}