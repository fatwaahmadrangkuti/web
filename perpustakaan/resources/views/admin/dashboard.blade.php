@extends('admin.layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #a08c64, #7a6748);">
            <div class="stat-number">{{ $totalBuku }}</div>
            <div class="stat-label"><i class="bi bi-book me-2"></i>Total Buku</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #cbbba0, #a08c64);">
            <div class="stat-number">{{ $totalKategori }}</div>
            <div class="stat-label"><i class="bi bi-tags me-2"></i>Total Kategori</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #d4a853, #b88a30);">
            <div class="stat-number">{{ $totalUser }}</div>
            <div class="stat-label"><i class="bi bi-people me-2"></i>Total User</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body p-4">
        <h5 style="font-family:'Playfair Display',serif; color:#5a4a35;">
            Selamat datang, <strong>{{ Auth::user()->name }}</strong>!
        </h5>
        <p class="text-muted mb-1">Anda login sebagai
            <span class="badge bg-warning">{{ ucfirst(Auth::user()->role) }}</span>
        </p>
        <hr style="border-color:#e8dece;">
        <p style="color:#7a6748;">Gunakan menu di sebelah kiri untuk mengelola data perpustakaan.</p>
        <div class="d-flex gap-2 flex-wrap">
            <a href="/admin/buku/create" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Buku Baru
            </a>
            <a href="/admin/kategori/create" class="btn btn-outline-secondary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
            </a>
        </div>
    </div>
</div>
@endsection
