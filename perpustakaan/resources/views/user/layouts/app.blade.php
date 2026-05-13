<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LorongBuku — @yield('title')</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
<style>body { font-family: 'Lato', sans-serif; }</style>
</head>
<body class="bg-[#f4f1ec] min-h-screen flex flex-col">

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-10 py-4 bg-[#cbbba0] shadow">
    <div class="flex items-center gap-2">
        <img src="{{ asset('images/logo.png') }}" class="w-20">
        <h1 class="font-semibold text-lg" style="font-family:'Playfair Display',serif">LorongBuku</h1>
    </div>
    <div class="flex gap-6">
        <a href="/" class="font-semibold text-sm">Home</a>
        <a href="/catalog" class="font-semibold text-sm">Catalog</a>
    </div>
    <div class="flex items-center gap-2">
        <a href="{{ url('/user/akun') }}" class="text-xl hover:scale-110 transition">👤</a>
        <a href="{{ url('/cart') }}" class="text-xl cursor-pointer hover:scale-110 transition">🛒</a>
    </div>
</nav>

<!-- MAIN -->
<div class="max-w-4xl mx-auto w-full mt-8 px-4 flex gap-6 pb-16 flex-1">

    <!-- SIDEBAR -->
    <div class="w-52 flex-shrink-0">
        <div class="flex flex-col items-center mb-6">
            <div class="w-16 h-16 rounded-full bg-[#cbbba0] flex items-center justify-center text-3xl mb-2">👤</div>
            <p class="text-xs text-gray-400 uppercase tracking-widest">Nama</p>
            <p class="text-sm font-semibold mt-1 text-center">{{ Auth::user()->name }}</p>
        </div>
        <nav class="flex flex-col gap-1">
            <a href="{{ url('/user/akun') }}"
               class="flex items-center justify-between px-4 py-3 rounded-lg text-sm
               {{ request()->is('user/akun') ? 'bg-[#cbbba0] font-semibold' : 'hover:bg-[#e8dece]' }}">
                <span class="flex items-center gap-2"><span>👤</span> Akun</span>
                <span class="text-gray-400">›</span>
            </a>
            <a href="{{ url('/user/pesanan') }}"
               class="flex items-center justify-between px-4 py-3 rounded-lg text-sm
               {{ request()->is('user/pesanan*') ? 'bg-[#cbbba0] font-semibold' : 'hover:bg-[#e8dece]' }}">
                <span class="flex items-center gap-2"><span>📋</span> Pesanan Saya</span>
                <span class="text-gray-400">›</span>
            </a>
            <a href="{{ url('/user/riwayat') }}"
               class="flex items-center justify-between px-4 py-3 rounded-lg text-sm
               {{ request()->is('user/riwayat*') ? 'bg-[#cbbba0] font-semibold' : 'hover:bg-[#e8dece]' }}">
                <span class="flex items-center gap-2"><span>🕐</span> Riwayat Pesanan</span>
                <span class="text-gray-400">›</span>
            </a>
            <form action="/logout" method="POST" class="mt-2">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-4 py-3 rounded-lg text-sm text-red-500 hover:bg-red-50 text-left">
                    <span>↩</span> Keluar
                </button>
            </form>
        </nav>
    </div>

    <!-- KONTEN -->
    <div class="flex-1">
        @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
            {{ session('error') }}
        </div>
        @endif
        @yield('content')
    </div>

</div>

<!-- FOOTER -->
<footer class="bg-[#a08c64] py-5 mt-auto">
    <div class="max-w-6xl mx-auto flex items-center justify-center gap-3 text-black text-sm">
        <img src="{{ asset('images/logo.png') }}" class="w-16">
        <p>LorongBuku menyediakan berbagai buku pelajaran, novel dan komik dengan harga terjangkau.</p>
    </div>
</footer>

</body>
</html>