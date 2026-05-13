<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
body{
    font-family: 'Playfair Display', serif;
}
</style>

</head>

<body class="bg-[#f4f1ec] text-[#2b2b2b]">

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-10 py-4 bg-[#cbbba0] shadow">

    <!-- LOGO -->
    <div class="flex items-center gap-2">
        <img src="{{ asset('images/logo.png') }}" class="w-14">
        <h1 class="text-xl font-semibold">LorongBuku</h1>
    </div>

    <!-- MENU -->
    <div class="flex gap-8">

        <a href="/"
           class="font-semibold hover:text-white transition">
            Home
        </a>

        <a href="/catalog"
           class="font-semibold hover:text-white transition">
            Catalog
        </a>

    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-4">

        <!-- SEARCH -->
        <input type="text"
               placeholder="Cari"
               class="border rounded-full px-4 py-1 bg-white outline-none w-36">

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
<section class="max-w-6xl mx-auto py-10 px-6">

    <!-- TITLE -->
    <div class="mb-10">

        <a href="/cart"
           class="text-2xl font-semibold hover:opacity-70 transition">

            ← CHECKOUT

        </a>

    </div>

    <div class="grid md:grid-cols-2 gap-12 items-start">

        <!-- LEFT -->
        <div>

            <!-- SHIPPING -->
            <h2 class="text-3xl mb-8 font-semibold">

                Informasi Pengiriman

            </h2>

            <div class="space-y-5">

                <div>

                    <label class="block mb-2">
                        Nama Penerima
                    </label>

                    <input type="text"
                           placeholder="Nama Penerima"
                           class="w-full bg-white p-4 rounded-xl outline-none shadow-sm">

                </div>

                <div>

                    <label class="block mb-2">
                        Alamat Lengkap
                    </label>

                    <textarea
                        placeholder="Alamat lengkap"
                        class="w-full bg-white p-4 rounded-xl outline-none shadow-sm h-28 resize-none"></textarea>

                </div>

                <div class="grid grid-cols-2 gap-4">

                    <div>

                        <label class="block mb-2">
                            Kode Pos
                        </label>

                        <input type="text"
                               placeholder="20231"
                               class="w-full bg-white p-4 rounded-xl outline-none shadow-sm">

                    </div>

                    <div>

                        <label class="block mb-2">
                            No. Hp
                        </label>

                        <input type="text"
                               placeholder="08xxxxxxxxxx"
                               class="w-full bg-white p-4 rounded-xl outline-none shadow-sm">

                    </div>

                </div>

            </div>

            <!-- PAYMENT -->
            <form action="{{ url('/process-payment') }}"
                  method="POST">

                @csrf

                <h2 class="text-3xl mt-12 mb-8 font-semibold">

                    Metode Pembayaran

                </h2>

                <div class="space-y-4">

                    <!-- BANK -->
                    <label class="block">

                        <input type="radio"
                               name="payment_method"
                               value="bank"
                               class="hidden peer"
                               required>

                        <div class="bg-white p-5 rounded-xl shadow-sm cursor-pointer
                                    border-2 border-transparent
                                    peer-checked:border-yellow-400
                                    hover:scale-[1.02]
                                    transition duration-300">

                            <p class="font-semibold text-lg mb-3">
                                Transfer Bank
                            </p>

                            <div class="flex gap-4 text-sm font-semibold">

                                <span class="text-blue-700">
                                    BCA
                                </span>

                                <span class="text-blue-500">
                                    Mandiri
                                </span>

                                <span class="text-blue-900">
                                    BRI
                                </span>

                                <span class="text-orange-500">
                                    BNI
                                </span>

                            </div>

                        </div>

                    </label>

                    <!-- COD -->
                    <label class="block">

                        <input type="radio"
                               name="payment_method"
                               value="cod"
                               class="hidden peer">

                        <div class="bg-white p-5 rounded-xl shadow-sm cursor-pointer
                                    border-2 border-transparent
                                    peer-checked:border-yellow-400
                                    hover:scale-[1.02]
                                    transition duration-300">

                            <p class="font-semibold text-lg">

                                Bayar di Tempat (COD)

                            </p>

                        </div>

                    </label>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="mt-10 w-full bg-yellow-400 py-4 rounded-xl
                               text-lg font-semibold
                               hover:scale-105 transition">

                    Selesaikan Pembelian

                </button>

            </form>

        </div>

        <!-- RIGHT -->
        <div>

            <div class="bg-white p-8 rounded-2xl shadow-lg sticky top-10">

                <h2 class="text-center text-2xl font-semibold mb-6">

                    Ringkasan Pemesanan

                </h2>

                <hr class="mb-6">

                <!-- ITEMS -->
                <div class="space-y-6">

                    @foreach($cart as $item)

                    <div class="flex items-center justify-between gap-4">

                        <div class="flex items-center gap-4">

                            <img src="{{ asset($item['gambar']) }}"
                                 class="h-24 rounded-lg shadow object-contain">

                            <div>

                                <p class="font-semibold">

                                    {{ $item['judul'] }}

                                </p>

                                <p class="text-sm text-gray-500">

                                    Qty: {{ $item['quantity'] }}

                                </p>

                            </div>

                        </div>

                        <p class="font-semibold">

                            Rp{{ number_format($item['harga'],0,',','.') }}

                        </p>

                    </div>

                    @endforeach

                </div>

                <hr class="my-8">

                <!-- TOTAL -->
                <div class="space-y-4">

                    <div class="flex justify-between">

                        <p>Subtotal</p>

                        <p>

                            Rp{{ number_format($total,0,',','.') }}

                        </p>

                    </div>

                    <div class="flex justify-between">

                        <p>Pengiriman</p>

                        <p>Rp5.000</p>

                    </div>

                    <hr>

                    <div class="flex justify-between text-xl font-semibold">

                        <p>Total</p>

                        <p>

                            Rp{{ number_format($total + 5000,0,',','.') }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-[#a08c64] text-white mt-16 py-6">

    <div class="max-w-6xl mx-auto flex items-center justify-center gap-4 px-6">

        <img src="{{ asset('images/logo.png') }}"
             class="w-12">

        <p class="text-center">

            LorongBuku menyediakan berbagai buku pelajaran,
            novel dan komik dengan harga terjangkau.

        </p>

    </div>

</footer>

</body>
</html>