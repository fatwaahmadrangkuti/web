@extends('admin.layouts.app')
@section('title', 'Edit Kategori')

@section('content')
<div class="card" style="max-width: 500px;">
    <div class="card-header bg-warning text-white py-3">
        <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Kategori</h5>
    </div>
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif
        <form action="/admin/kategori/{{ $kategori->id }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Kategori *</label>
                <input type="text" name="nama_kategori" class="form-control"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save me-1"></i> Update
                </button>
                <a href="/admin/kategori" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
