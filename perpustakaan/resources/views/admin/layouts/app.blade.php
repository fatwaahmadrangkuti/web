<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Lorong Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        /* Palet warna selaras web LorongBuku
           #f4f1ec  = background krem
           #cbbba0  = sandy / navbar web
           #a08c64  = coklat golden / footer web
           #7a6748  = coklat tua / hover
        */
        body { background: #f4f1ec; font-family: 'Lato', sans-serif; }

        /* SIDEBAR */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #6b5a3e 0%, #a08c64 55%, #cbbba0 100%);
            width: 250px;
            position: fixed;
            top: 0; left: 0;
            padding-top: 0;
            z-index: 100;
            box-shadow: 3px 0 20px rgba(122,103,72,0.3);
        }
        .sidebar .brand {
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 700;
            padding: 20px 20px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            background: rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .sidebar .brand span { color: #f4e4c1; }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.88);
            padding: 11px 20px;
            border-radius: 8px;
            margin: 2px 10px;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            display: block;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: #fff;
            transform: translateX(3px);
        }
        .sidebar .nav-link i { margin-right: 10px; width: 16px; }
        .sidebar .role-badge {
            background: #f4e4c1;
            color: #7a6748;
            font-size: 0.62rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
            margin-left: 4px;
            vertical-align: middle;
        }
        .sidebar hr { border-color: rgba(255,255,255,0.2); margin: 12px 20px; }

        /* MAIN */
        .main-content { margin-left: 250px; padding: 28px 32px; }

        /* TOPBAR */
        .topbar {
            background: #fff8f0;
            padding: 14px 24px;
            border-radius: 12px;
            margin-bottom: 24px;
            box-shadow: 0 2px 12px rgba(160,140,100,0.13);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 4px solid #a08c64;
        }
        .topbar h5 { font-family: 'Playfair Display', serif; color: #5a4a35; margin: 0; }
        .topbar-user { color: #7a6748; font-weight: 600; font-size: 0.92rem; }

        /* CARD */
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(160,140,100,0.1); background: #fff8f0; }
        .card-header { border-radius: 12px 12px 0 0 !important; border: none; }

        /* Card header overrides */
        .card-header.bg-primary  { background: linear-gradient(135deg, #a08c64, #7a6748) !important; }
        .card-header.bg-success  { background: linear-gradient(135deg, #8aab78, #5a8a4a) !important; }
        .card-header.bg-warning  { background: linear-gradient(135deg, #d4a853, #b88a30) !important; color: #fff !important; }
        .card-header.bg-info     { background: linear-gradient(135deg, #cbbba0, #a08c64) !important; color: #fff !important; }
        .card-header.bg-danger   { background: linear-gradient(135deg, #c0704a, #9a4a2a) !important; }

        /* STAT CARDS */
        .stat-card { border-radius: 12px; padding: 24px; color: #fff; }
        .stat-card .stat-number { font-size: 2.4rem; font-weight: 700; font-family: 'Playfair Display', serif; line-height: 1; }
        .stat-card .stat-label  { opacity: 0.92; font-size: 0.88rem; margin-top: 6px; }

        /* BUTTONS */
        .btn-primary   { background-color: #a08c64 !important; border-color: #a08c64 !important; color: #fff !important; }
        .btn-primary:hover { background-color: #7a6748 !important; border-color: #7a6748 !important; }
        .btn-success   { background-color: #6a9a5a !important; border-color: #6a9a5a !important; color: #fff !important; }
        .btn-success:hover { background-color: #4a7a3a !important; border-color: #4a7a3a !important; }
        .btn-warning   { background-color: #d4a853 !important; border-color: #d4a853 !important; color: #5a4a35 !important; }
        .btn-warning:hover { background-color: #b88a30 !important; border-color: #b88a30 !important; color: #fff !important; }
        .btn-danger    { background-color: #c0604a !important; border-color: #c0604a !important; color: #fff !important; }
        .btn-danger:hover { background-color: #9a4030 !important; border-color: #9a4030 !important; }
        .btn-info      { background-color: #cbbba0 !important; border-color: #cbbba0 !important; color: #5a4a35 !important; }
        .btn-info:hover { background-color: #a08c64 !important; border-color: #a08c64 !important; color: #fff !important; }
        .btn-light     { background-color: #fff8f0 !important; border-color: #e8dece !important; color: #7a6748 !important; }
        .btn-light:hover { background-color: #f0e8da !important; }
        .btn-outline-secondary { color: #7a6748 !important; border-color: #cbbba0 !important; }
        .btn-outline-secondary:hover { background-color: #cbbba0 !important; color: #5a4a35 !important; border-color: #cbbba0 !important; }
        .btn-outline-primary { color: #a08c64 !important; border-color: #a08c64 !important; }
        .btn-outline-primary:hover { background-color: #a08c64 !important; color: #fff !important; }

        /* BADGES */
        .badge.bg-primary   { background-color: #a08c64 !important; }
        .badge.bg-success   { background-color: #6a9a5a !important; }
        .badge.bg-warning   { background-color: #d4a853 !important; color: #5a4a35 !important; }
        .badge.bg-danger    { background-color: #c0604a !important; }
        .badge.bg-info      { background-color: #cbbba0 !important; color: #5a4a35 !important; }
        .badge.bg-secondary { background-color: #9a8870 !important; }

        /* TABLE */
        .table-light th { background-color: #f0e8da !important; color: #5a4a35; font-weight: 700; border-color: #e0d4c0; }
        .table-hover tbody tr:hover { background-color: #faf4ec; }
        .table td, .table th { border-color: #e8dece; vertical-align: middle; }

        /* FORM */
        .form-label { color: #5a4a35; font-size: 0.88rem; }
        .form-control, .form-select {
            border-color: #d8c8b0;
            background-color: #fffdf9;
        }
        .form-control:focus, .form-select:focus {
            border-color: #a08c64;
            box-shadow: 0 0 0 0.2rem rgba(160,140,100,0.2);
            background-color: #fff;
        }

        /* ALERT */
        .alert { border-radius: 10px; }
        .alert-success { background-color: #eaf5e6; border-color: #8aab78; color: #3a6a2a; }
        .alert-danger  { background-color: #fce8e0; border-color: #c0604a; color: #8a3a1a; }

        /* MISC */
        .btn-action { padding: 4px 10px; font-size: 0.8rem; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f4f1ec; }
        ::-webkit-scrollbar-thumb { background: #cbbba0; border-radius: 4px; }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="brand">Lorong <span>Buku</span></div>
    <nav class="mt-3">
        @if(Auth::user()->isSuperAdmin())
            <a href="/superadmin/dashboard" class="nav-link {{ request()->is('superadmin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
                <span class="role-badge">SuperAdmin</span>
            </a>
            <a href="/superadmin/users" class="nav-link {{ request()->is('superadmin/users*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Kelola User
            </a>
            <a href="/admin/buku" class="nav-link {{ request()->is('admin/buku*') ? 'active' : '' }}">
                <i class="bi bi-book-fill"></i> Kelola Buku
            </a>
            <a href="/admin/kategori" class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">
                <i class="bi bi-tags-fill"></i> Kategori
            </a>
        @else
            <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="/admin/buku" class="nav-link {{ request()->is('admin/buku*') ? 'active' : '' }}">
                <i class="bi bi-book-fill"></i> Kelola Buku
            </a>
            <a href="/admin/kategori" class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">
                <i class="bi bi-tags-fill"></i> Kategori
            </a>
        @endif

        <hr>
        <a href="/" class="nav-link">
            <i class="bi bi-house-fill"></i> Ke Website
        </a>
        <form action="/logout" method="POST" style="margin: 2px 10px;">
            @csrf
            <button type="submit" class="nav-link btn w-100 text-start"
                style="background:none; border:none; color:rgba(255,255,255,0.82); padding:11px 10px;">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
        </form>
    </nav>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="topbar">
        <h5 class="fw-bold">@yield('title', 'Dashboard')</h5>
        <div class="d-flex align-items-center gap-3">
            <span class="badge bg-warning">{{ ucfirst(Auth::user()->role) }}</span>
            <span class="topbar-user">👤 {{ Auth::user()->name }}</span>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
