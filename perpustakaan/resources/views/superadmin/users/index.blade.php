@extends('admin.layouts.app')
@section('title', 'Kelola User')

@section('content')
<div class="card">
    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-people-fill me-2"></i>Daftar Semua User</h5>
        <a href="/superadmin/users/create" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah User
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Role</th>
                        <th>Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $i => $user)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><strong style="color:#5a4a35;">{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telepon ?? '-' }}</td>
                        <td>
                            <span class="badge
                                {{ $user->role == 'superadmin' ? 'bg-danger' :
                                  ($user->role == 'admin'      ? 'bg-warning' : 'bg-secondary') }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="/superadmin/users/{{ $user->id }}/edit" class="btn btn-warning btn-action me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            @if(Auth::user()->id !== $user->id)
                            <form action="/superadmin/users/{{ $user->id }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-action">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5" style="color:#9a8870;">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>Belum ada user.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
