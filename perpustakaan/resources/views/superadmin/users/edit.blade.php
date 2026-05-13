@extends('admin.layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header bg-warning text-white py-3">
        <h5 class="mb-0"><i class="bi bi-person-gear me-2"></i>Edit User: {{ $user->name }}</h5>
    </div>
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif
        <form action="/superadmin/users/{{ $user->id }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Email *</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $user->telepon) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Role *</label>
                    <select name="role" class="form-select" required>
                        <option value="user"       {{ $user->role == 'user'       ? 'selected' : '' }}>User (Member)</option>
                        <option value="admin"      {{ $user->role == 'admin'      ? 'selected' : '' }}>Admin</option>
                        <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $user->alamat) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Password Baru</label>
                    <input type="password" name="password" class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save me-1"></i> Update
                </button>
                <a href="/superadmin/users" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
