<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Catalog</title>
<script src="https://cdn.tailwindcss.com"></script>

<!-- FONT SERIF -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Playfair Display', serif;
}
</style>
</head>

<body class="bg-[#f4f1ec]">

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-10 py-4 bg-[#cbbba0] shadow">

    <div class="flex items-center gap-2">
        <img src="{{ asset('images/logo.png') }}" class="w-20">
        <h1 class="font-semibold text-lg">LorongBuku</h1>
    </div>

    <div class="flex gap-6">
        <a href="/" class="font-semibold">Home</a>
        <a href="/catalog" class="font-semibold">Catalog</a>
    </div>

    <div class="flex items-center gap-0">

        <!-- SEARCH -->
        <input type="text"
               placeholder="Cari"
               class="border rounded-full px-4 py-1">

        <!-- ICON USER -->
        <a href="{{ url('/login') }}"
           class="text-xl hover:scale-110 transition">
            👤
        </a>

        <!-- ICON CART -->
        <a href="{{ url('/cart') }}"
           class="text-xl cursor-pointer hover:scale-110 transition">
            🛒
        </a>

    </div>

</nav>

<!-- BANNER -->
<div class="max-w-6xl mx-auto mt-4 px-4">
    <img src="{{ asset('images/buku2.png') }}"
         class="w-full h-[300px] object-cover rounded-xl">
</div>

<!-- TITLE -->
<div class="text-center mt-8">
    <p class="text-xs text-gray-500">OUR COLLECTION</p>
    <h2 class="text-2xl font-bold">Katalog Buku</h2>
</div>

<!-- ================= FICTION ================= -->
<section class="px-10 mt-10">

<div class="relative bg-[#cbbba0] p-6 rounded-xl">

<h3 class="text-center font-bold mb-6">FICTION</h3>

<button onclick="slideLeft('fiction')"
class="absolute left-2 top-1/2 -translate-y-1/2 bg-white rounded-full px-3 py-1 shadow hover:scale-110 transition">
◀
</button>

<div id="fiction" class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar">

@foreach($fiction as $book)

<a href="/detail/{{ $book->id }}">

<div class="min-w-[140px] text-center hover:scale-105 transition">

    <img src="{{ asset($book->gambar) }}"
         class="h-40 mx-auto mb-2">

    <p class="text-xs">FICTION</p>

    <h4 class="text-sm font-semibold">
        {{ $book->judul }}
    </h4>

    <p class="text-xs text-gray-500">
        {{ $book->penulis }}
    </p>

    <p class="font-bold text-sm">
        Rp{{ number_format($book->harga,0,',','.') }}
    </p>

</div>

</a>

@endforeach

</div>

<button onclick="slideRight('fiction')"
class="absolute right-2 top-1/2 -translate-y-1/2 bg-white rounded-full px-3 py-1 shadow hover:scale-110 transition">
▶
</button>

</div>

</section>

<!-- ================= NON FICTION ================= -->
<section class="px-10 mt-10">

<div class="relative bg-[#cbbba0] p-6 rounded-xl">

<h3 class="text-center font-bold mb-6">NON-FICTION</h3>

<button onclick="slideLeft('non')"
class="absolute left-2 top-1/2 -translate-y-1/2 bg-white rounded-full px-3 py-1 shadow hover:scale-110 transition">
◀
</button>

<div id="non" class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar">

@foreach($nonfiction as $book)

<a href="/detail/{{ $book->id }}">

<div class="min-w-[140px] text-center hover:scale-105 transition">

    <img src="{{ asset($book->gambar) }}"
         class="h-40 mx-auto mb-2">

    <h4 class="text-sm font-semibold">
        {{ $book->judul }}
    </h4>

    <p class="text-xs text-gray-500">
        {{ $book->penulis }}
    </p>

    <p class="font-bold text-sm">
        Rp{{ number_format($book->harga,0,',','.') }}
    </p>

</div>

</a>

@endforeach

</div>

<button onclick="slideRight('non')"
class="absolute right-2 top-1/2 -translate-y-1/2 bg-white rounded-full px-3 py-1 shadow hover:scale-110 transition">
▶
</button>

</div>

</section>

<!-- ================= HARRY POTTER ================= -->
<section class="px-10 mt-10 mb-10">

<div class="relative bg-[#cbbba0] p-6 rounded-xl">

<h3 class="text-center font-bold mb-6">
HARRY POTTER SPECIAL SERIES
</h3>

<button onclick="slideLeft('hp')"
class="absolute left-2 top-1/2 -translate-y-1/2 bg-white rounded-full px-3 py-1 shadow hover:scale-110 transition">
◀
</button>

<div id="hp" class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar">

@foreach($harry as $book)

<a href="/detail/{{ $book->id }}">

<div class="min-w-[140px] text-center hover:scale-105 transition">

    <img src="{{ asset($book->gambar) }}"
         class="h-40 mx-auto mb-2">

    <h4 class="text-sm font-semibold">
        {{ $book->judul }}
    </h4>

    <p class="text-xs text-gray-500">
        {{ $book->penulis }}
    </p>

    <p class="font-bold text-sm">
        Rp{{ number_format($book->harga,0,',','.') }}
    </p>

</div>

</a>

@endforeach

</div>

<button onclick="slideRight('hp')"
class="absolute right-2 top-1/2 -translate-y-1/2 bg-white rounded-full px-3 py-1 shadow hover:scale-110 transition">
▶
</button>

</div>

</section>

<!-- ================= DILAN SERIES ================= -->
<section class="px-10 mt-10 mb-10">

<div class="relative bg-[#cbbba0] p-6 rounded-xl">

<h3 class="text-center font-bold mb-6">DILAN SERIES</h3>

<button onclick="slideLeft('dilan')"
class="absolute left-2 top-1/2 -translate-y-1/2 bg-white rounded-full px-3 py-1 shadow hover:scale-110 transition">
◀
</button>

<div id="dilan" class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar">

@foreach($dilan as $book)

<a href="/detail/{{ $book->id }}">

<div class="min-w-[140px] text-center hover:scale-105 transition">

    <img src="{{ asset($book->gambar) }}"
         class="h-40 mx-auto mb-2 object-contain">

    <h4 class="text-sm font-semibold leading-tight">
        {{ $book->judul }}
    </h4>

    <p class="text-xs text-gray-600 mt-1">
        {{ $book->penulis }}
    </p>

    <p class="font-bold text-sm mt-1">
        Rp{{ number_format($book->harga,0,',','.') }}
    </p>

</div>

</a>

@endforeach

</div>

<button onclick="slideRight('dilan')"
class="absolute right-2 top-1/2 -translate-y-1/2 bg-white rounded-full px-3 py-1 shadow hover:scale-110 transition">
▶
</button>

</div>

</section>

<!-- SCRIPT -->
<script>
function slideLeft(id) {
    document.getElementById(id).scrollBy({
        left: -300,
        behavior: 'smooth'
    });
}

function slideRight(id) {
    document.getElementById(id).scrollBy({
        left: 300,
        behavior: 'smooth'
    });
}
</script>

<style>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
</style>

<!-- FOOTER -->
<footer class="bg-[#a08c64] py-6 mt-10">

<div class="max-w-6xl mx-auto flex items-center justify-center gap-3 text-black text-sm">

    <img src="{{ asset('images/logo.png') }}"
         class="w-20">

    <p>
        LorongBuku menyediakan berbagai buku pelajaran,
        novel dan komik dengan harga terjangkau.
    </p>

</div>

</footer>

</body>
</html>