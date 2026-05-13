<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Detail Buku</title>

<script src="https://cdn.tailwindcss.com"></script>

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

        <!-- USER -->
        <a href="{{ url('/login') }}"
           class="text-xl hover:scale-110 transition">
            👤
        </a>

        <!-- CART -->
        <a href="{{ url('/cart') }}"
           class="text-xl cursor-pointer hover:scale-110 transition">
            🛒
        </a>

    </div>

</nav>

<!-- CONTENT -->
<section class="max-w-6xl mx-auto py-16">

<div class="grid grid-cols-2 gap-20 items-start">

    <!-- LEFT -->
    <div class="flex flex-col items-center">

        <!-- BULAT -->
        <div class="relative flex items-center justify-center">

            <div class="absolute w-[300px] h-[300px] bg-gray-200 rounded-full opacity-40"></div>

            <img src="{{ asset($book->gambar) }}"
                 class="h-[320px] relative z-10 object-contain">

        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-4 mt-6">

            <!-- CART -->
            <form action="{{ url('/add-to-cart/'.$book->id) }}"
                  method="POST">

                @csrf

                <button type="submit"
                    class="bg-yellow-300 hover:bg-yellow-400
                           transition duration-300
                           text-black px-5 py-3 rounded-xl shadow
                           hover:scale-105 active:scale-95">

                    🛒

                </button>

            </form>

            <!-- BUY NOW -->
            <form action="{{ url('/buy-now/'.$book->id) }}"
                  method="POST">

                @csrf

                <button type="submit"
                    class="bg-yellow-300 hover:bg-yellow-400
                           transition duration-300
                           text-black px-5 py-3 rounded-xl shadow
                           hover:scale-105 active:scale-95">

                    Beli Sekarang

                </button>

            </form>

        </div>

        <!-- PRICE -->
        <div class="mt-3 bg-gray-200 px-6 py-2 rounded-lg font-semibold">

            Rp{{ number_format($book->harga,0,',','.') }}

        </div>

    </div>

    <!-- RIGHT -->
    <div>

        <!-- TITLE -->
        <h1 class="text-5xl font-serif font-bold mb-2">

            {{ $book->judul }}

        </h1>

        <!-- AUTHOR -->
        <p class="mb-6 text-lg">

            by <span class="font-semibold">
                {{ $book->penulis }}
            </span>

        </p>

        <!-- DESCRIPTION -->
        <p class="text-gray-700 leading-relaxed mb-10 max-w-xl">

            {{ $book->deskripsi }}

        </p>

        <!-- INFO -->
        <div class="flex justify-between items-start">

            <div class="grid grid-cols-2 gap-y-3 text-sm">

                <p class="font-semibold">PUBLISHER</p>
                <p>{{ $book->publisher ?? '-' }}</p>

                <p class="font-semibold">RELEASE</p>
                <p>{{ $book->release ?? '-' }}</p>

                <p class="font-semibold">FORMAT</p>
                <p>{{ $book->format ?? '-' }}</p>

                <p class="font-semibold">PAGE</p>
                <p>{{ $book->page ?? '-' }}</p>

                <p class="font-semibold">ISBN</p>
                <p>{{ $book->isbn ?? '-' }}</p>

            </div>

        </div>

    </div>

</div>

</section>

<!-- SUCCESS -->
@if(session('success'))

<div class="max-w-6xl mx-auto mb-10">

    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl shadow">

        {{ session('success') }}

    </div>

</div>

@endif

</body>
</html>