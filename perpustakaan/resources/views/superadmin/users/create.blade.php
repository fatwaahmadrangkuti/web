@extends('admin.layouts.app')
@section('title', 'Tambah User')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header bg-success text-white py-3">
        <h5 class="mb-0"><i class="bi bi-person-plus me-2"></i>Tambah User Baru</h5>
    </div>
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif
        <form action="/superadmin/users" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Email *</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Role *</label>
                    <select name="role" class="form-select" required>
                        <option value="user"       {{ old('role') == 'user'       ? 'selected' : '' }}>User (Member)</option>
                        <option value="admin"      {{ old('role') == 'admin'      ? 'selected' : '' }}>Admin</option>
                        <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ old('alamat') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Password *</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
                <a href="/superadmin/users" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
