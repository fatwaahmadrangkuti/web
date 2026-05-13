@extends('admin.layouts.app')
@section('title', 'Kelola Kategori')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-tags-fill me-2"></i>Daftar Kategori</h5>
        <a href="/admin/kategori/create" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $i => $k)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td><strong style="color:#5a4a35;">{{ $k->nama_kategori }}</strong></td>
                    <td><span class="badge bg-primary">{{ $k->bukus_count }} buku</span></td>
                    <td>
                        <a href="/admin/kategori/{{ $k->id }}/edit" class="btn btn-warning btn-action me-1">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="/admin/kategori/{{ $k->id }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin? Menghapus kategori akan menghapus semua buku di dalamnya!')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-action">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5" style="color:#9a8870;">
                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>Belum ada kategori.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
