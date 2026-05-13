@extends('admin.layouts.app')
@section('title', 'Edit Buku')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-white py-3">
        <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Buku: {{ $buku->judul }}</h5>
    </div>
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="/admin/buku/{{ $buku->id }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Judul Buku *</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Penulis *</label>
                    <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Harga (Rp) *</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga', $buku->harga) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Stok *</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $buku->stok) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Kategori *</label>
                    <select name="kategori_id" class="form-select" required>
                        @foreach($kategoris as $k)
                        <option value="{{ $k->id }}" {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Publisher</label>
                    <input type="text" name="publisher" class="form-control" value="{{ old('publisher', $buku->publisher) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Tahun Terbit</label>
                    <input type="text" name="release" class="form-control" value="{{ old('release', $buku->release) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Jumlah Halaman</label>
                    <input type="text" name="page" class="form-control" value="{{ old('page', $buku->page) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">ISBN</label>
                    <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $buku->isbn) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Format</label>
                    <select name="format" class="form-select">
                        <option value="">-- Pilih Format --</option>
                        <option value="Hardcover" {{ $buku->format == 'Hardcover' ? 'selected' : '' }}>Hardcover</option>
                        <option value="Paperback" {{ $buku->format == 'Paperback' ? 'selected' : '' }}>Paperback</option>
                        <option value="Ebook"     {{ $buku->format == 'Ebook'     ? 'selected' : '' }}>Ebook</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Gambar Buku</label>
                    @if($buku->gambar)
                        <div class="mb-2">
                            <img src="{{ asset($buku->gambar) }}" height="80"
                                style="border-radius:8px; border:2px solid #e8dece;">
                            <small class="text-muted d-block mt-1">Gambar saat ini</small>
                        </div>
                    @endif
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save me-1"></i> Update Buku
                </button>
                <a href="/admin/buku" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
