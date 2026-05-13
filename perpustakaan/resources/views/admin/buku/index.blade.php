@extends('admin.layouts.app')
@section('title', 'Kelola Buku')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-book-fill me-2"></i>Daftar Buku</h5>
        <a href="/admin/buku/create" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Buku
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bukus as $i => $buku)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
                            <img src="{{ asset($buku->gambar) }}" width="50" height="60"
                                style="object-fit:cover; border-radius:6px; border:1px solid #e8dece;">
                        </td>
                        <td><strong style="color:#5a4a35;">{{ $buku->judul }}</strong></td>
                        <td>{{ $buku->penulis }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ $buku->kategori->nama_kategori ?? '-' }}</span>
                        </td>
                        <td>Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $buku->stok > 5 ? 'bg-success' : 'bg-danger' }}">
                                {{ $buku->stok }}
                            </span>
                        </td>
                        <td>
                            <a href="/admin/buku/{{ $buku->id }}/edit" class="btn btn-warning btn-action me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="/admin/buku/{{ $buku->id }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5" style="color:#9a8870;">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>Belum ada buku.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
