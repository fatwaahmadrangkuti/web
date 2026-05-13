<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cart</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{
    font-family: 'Playfair Display', serif;
}
.no-scrollbar::-webkit-scrollbar{
    display:none;
}
</style>

</head>

<body class="bg-[#f4f1ec]">

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-10 py-4 bg-[#cbbba0] shadow">

    <!-- LOGO -->
    <div class="flex items-center gap-2">
        <img src="{{ asset('images/logo.png') }}" class="w-20">
        <h1 class="font-semibold text-lg">LorongBuku</h1>
    </div>

    <!-- MENU -->
    <div class="flex gap-6">
        <a href="/" class="font-semibold">
            Home
        </a>

        <a href="/catalog" class="font-semibold">
            Catalog
        </a>
    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-3">

        <!-- SEARCH -->
        <input type="text"
               placeholder="Cari"
               class="border rounded-full px-4 py-1 outline-none">

        <!-- USER -->
        <a href="{{ url('/login') }}"
           class="text-xl hover:scale-110 transition">
            👤
        </a>

        <!-- CART -->
        <a href="{{ url('/cart') }}"
           class="text-xl hover:scale-110 transition">
            🛒
        </a>

    </div>

</nav>

<!-- CONTENT -->
<section class="max-w-5xl mx-auto py-12">

<h1 class="text-3xl mb-8 font-bold">
    Shopping Bag
</h1>

<!-- SUCCESS -->
@if(session('success'))

<div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 shadow">
    {{ session('success') }}
</div>

@endif

<!-- EMPTY -->
@if(session('cart') && count(session('cart')) > 0)

<!-- HEADER -->
<div class="grid grid-cols-5 border-b pb-3 text-gray-600 font-semibold">

    <p class="col-span-2">Produk</p>

    <p class="text-center">Jumlah</p>

    <p class="text-center">Harga</p>

    <p class="text-center">Total</p>

</div>

@php
$total = 0;
@endphp

<!-- LOOP -->
@foreach(session('cart') as $id => $item)

@php
$itemTotal = $item['harga'] * $item['quantity'];
$total += $itemTotal;
@endphp

<!-- ITEM -->
<div class="grid grid-cols-5 items-center py-6 border-b">

    <!-- PRODUCT -->
    <div class="col-span-2 flex items-center gap-4">

        <img src="{{ asset($item['gambar']) }}"
             class="h-24 object-contain">

        <div>

            <p class="font-semibold">
                {{ $item['judul'] }}
            </p>

        </div>

    </div>

    <!-- QUANTITY -->
    <div class="text-center">

        <div class="inline-flex items-center border rounded-full px-3 py-1">

            <span class="mx-2">
                {{ $item['quantity'] }}
            </span>

        </div>

    </div>

    <!-- PRICE -->
    <p class="text-center">

        Rp{{ number_format($item['harga'],0,',','.') }}

    </p>

    <!-- TOTAL -->
    <div class="flex items-center justify-center gap-3">

        <p>

            Rp{{ number_format($itemTotal,0,',','.') }}

        </p>

        <!-- REMOVE -->
        <form action="{{ url('/remove-cart/'.$id) }}"
              method="POST">

            @csrf

            <button class="text-red-500 hover:scale-110 transition">
                ✕
            </button>

        </form>

    </div>

</div>

@endforeach

<!-- SUMMARY -->
<div class="flex justify-end mt-10">

    <div class="w-[320px] bg-white p-6 rounded-2xl shadow">

        <div class="flex justify-between border-b pb-3">

            <p>Subtotal</p>

            <p>
                Rp{{ number_format($total,0,',','.') }}
            </p>

        </div>

        <div class="flex justify-between border-b py-3">

            <p>Pengiriman</p>

            <p>Rp5.000</p>

        </div>

        <div class="flex justify-between pt-3 font-bold text-lg">

            <p>Total</p>

            <p>
                Rp{{ number_format($total + 5000,0,',','.') }}
            </p>

        </div>

        <!-- CHECKOUT -->
        <a href="{{ url('/checkout') }}">

            <button class="mt-6 w-full bg-yellow-400 py-3 rounded-xl hover:scale-105 transition">

                Checkout

            </button>

        </a>

    </div>

</div>

@else

<!-- EMPTY CART -->
<div class="text-center py-20">

    <h2 class="text-2xl font-semibold mb-3">
        Cart masih kosong
    </h2>

    <p class="text-gray-500 mb-6">
        Yuk tambahkan buku favoritmu
    </p>

    <a href="/catalog">

        <button class="bg-yellow-400 px-6 py-3 rounded-xl hover:scale-105 transition">

            Belanja Sekarang

        </button>

    </a>

</div>

@endif

</section>

<!-- FOOTER -->
<footer class="bg-[#a08c64] py-6 mt-10">

    <div class="max-w-6xl mx-auto flex items-center justify-center gap-3 text-black text-sm">

        <img src="{{ asset('images/logo.png') }}"
             class="w-20">

        <p>
            "LorongBuku menyediakan berbagai buku pelajaran,
            novel dan komik dengan harga terjangkau."
        </p>

    </div>

</footer>

</body>
</html>