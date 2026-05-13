<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>LorongBuku</title>

<script src="https://cdn.tailwindcss.com"></script>

<!-- FONT SERIF (biar mirip desain) -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Playfair Display', serif;
}
</style>

</head>

<body class="bg-[#f4f1ec]">

<!-- NAVBAR -->
 <body class="bg-gray-100"></body>
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
    <input type="text" placeholder="Cari"
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
<!-- HERO -->
<div class="max-w-6xl mx-auto mt-4 px-4">
    <img src="{{ asset('images/buku1.png') }}"
         class="w-full h-[300px] object-cover rounded-xl">
</div>

<!-- COLLECTION -->
<section class="max-w-6xl mx-auto py-10 text-center">

    <p class="text-xs text-gray-500 tracking-widest mb-1">
        OUR COLLECTION
    </p>

    <h2 class="text-2xl font-bold mb-8">
        Tiga Cerita Pilihan
    </h2>

    <div class="bg-[#cbbba0] py-10 rounded-md flex justify-center gap-20">

        <!-- CARD 1 -->
        <a href="/detail/0">
            <div class="hover:scale-105 transition">
                <img src="{{ asset('images/book1.png') }}" class="h-40 mx-auto mb-2">
                <p class="text-sm font-semibold leading-tight">
                    Sebuah Seni Untuk Bersikap Bodo Amat
                </p>
                <p class="text-xs text-gray-700">by Mark Manson</p>
                <p class="mt-1 text-sm font-semibold">Rp82.000</p>
            </div>
        </a>

        <!-- CARD 2 -->
        <a href="/detail/1">
            <div class="hover:scale-105 transition">
                <img src="{{ asset('images/book2.png') }}" class="h-40 mx-auto mb-2">
                <p class="text-sm font-semibold">
                    I Who Have Never Known Men
                </p>
                <p class="text-xs text-gray-700">by Ros Schwartz</p>
                <p class="mt-1 text-sm font-semibold">Rp86.000</p>
            </div>
        </a>

        <!-- CARD 3 -->
        <a href="/detail/2">
            <div class="hover:scale-105 transition">
                <img src="{{ asset('images/book3.png') }}" class="h-40 mx-auto mb-2">
                <p class="text-sm font-semibold">Janji</p>
                <p class="text-xs text-gray-700">by Tere Liye</p>
                <p class="mt-1 text-sm font-semibold">Rp85.900</p>
            </div>
        </a>

    </div>

</section>

<!-- HARRY POTTER -->
<section class="max-w-6xl mx-auto bg-[#a08c64] px-10 py-10 flex justify-between items-center rounded-md">

    <div class="text-white max-w-sm">
        <h2 class="text-lg font-bold mb-2">
            HARRY POTTER SERIES
        </h2>

        <p class="text-sm mb-4">
            Jelajahi keajaiban dan imajinasi dalam dunia sihir
        </p>

        <button class="bg-yellow-400 text-black px-4 py-2 rounded-full text-sm">
            Lihat Sekarang
        </button>
    </div>

    <div class="flex gap-6">
        <img src="{{ asset('images/hp1.png') }}" class="h-52 rotate-[-10deg]">
        <img src="{{ asset('images/hp2.png') }}" class="h-52 rotate-[10deg]">
    </div>

</section>

<!-- POPULAR -->
<section class="max-w-6xl mx-auto py-12">

    <h2 class="text-xl font-semibold mb-10 text-center">
        Buku Populer
    </h2>

    <div class="grid grid-cols-4 gap-10 px-4">

        <!-- CARD 1 -->
        <a href="/detail/3">
            <div class="text-center hover:scale-105 hover:shadow-lg transition">

                <div class="flex justify-center">
                    <img src="{{ asset('images/p1.png') }}"
                         class="h-44 w-[120px] object-contain mb-3">
                </div>

                <p class="text-sm font-semibold leading-tight">
                    Atomic Habits
                </p>

                <p class="text-xs text-gray-600 mt-1">
                    by James Clear
                </p>

                <p class="text-sm mt-1">
                    Rp77.756
                </p>

            </div>
        </a>

        <!-- CARD 2 -->
        <a href="/detail/4">
            <div class="text-center hover:scale-105 hover:shadow-lg transition">

                <div class="flex justify-center">
                    <img src="{{ asset('images/p2.png') }}"
                         class="h-44 w-[120px] object-contain mb-3">
                </div>

                <p class="text-sm font-semibold leading-tight">
                    Laut Bercerita
                </p>

                <p class="text-xs text-gray-600 mt-1">
                    by Leila
                </p>

                <p class="text-sm mt-1">
                    Rp87.749
                </p>

            </div>
        </a>

        <!-- CARD 3 -->
        <a href="/detail/5">
            <div class="text-center hover:scale-105 hover:shadow-lg transition">

                <div class="flex justify-center">
                    <img src="{{ asset('images/p3.png') }}"
                         class="h-44 w-[120px] object-contain mb-3">
                </div>

                <p class="text-sm font-semibold leading-tight">
                    Namiya
                </p>

                <p class="text-xs text-gray-600 mt-1">
                    by Keigo
                </p>

                <p class="text-sm mt-1">
                    Rp81.460
                </p>

            </div>
        </a>

        <!-- CARD 4 -->
        <a href="/detail/6">
            <div class="text-center hover:scale-105 hover:shadow-lg transition">

                <div class="flex justify-center">
                    <img src="{{ asset('images/p4.png') }}"
                         class="h-44 w-[120px] object-contain mb-3">
                </div>

                <p class="text-sm font-semibold leading-tight">
                    Le Petit Prince
                </p>

                <p class="text-xs text-gray-600 mt-1">
                    by Antoine
                </p>

                <p class="text-sm mt-1">
                    Rp45.000
                </p>

            </div>
        </a>

    </div>

</section>
<!-- FOOTER -->
<footer class="bg-[#a08c64] py-6 mt-10">
    <div class="max-w-6xl mx-auto flex items-center justify-center gap-3 text-black text-sm">

        <img src="{{ asset('images/logo.png') }}" class="w-20">

        <p>
            LorongBuku menyediakan berbagai buku pelajaran, novel dan komik dengan harga terjangkau.
        </p>

    </div>
</footer>

</body>
</html>