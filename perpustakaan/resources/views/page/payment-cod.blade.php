<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>COD Payment</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
<style>body{ font-family: 'Playfair Display', serif; }</style>
</head>
<body class="bg-[#f4f1ec] flex justify-center py-10">

<div class="w-[380px] bg-[#f4f1ec] min-h-screen p-6">

    <!-- HEADER -->
    <div class="flex items-center gap-4 mb-10">
        <a href="/checkout" class="text-2xl">←</a>
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" class="w-10">
            <h1 class="text-2xl">LorongBuku</h1>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="text-center mt-16">
        <div class="text-6xl mb-6">🚚</div>
        <h2 class="text-xl mb-4">Pesanan Kamu Lagi Kami Siapkan!</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            Silakan lakukan pembayaran langsung kepada kurir saat barang diterima.
        </p>
        <p class="font-semibold text-lg mb-8">
            Total Pembayaran:<br>
            Rp{{ number_format($total + 5000, 0, ',', '.') }}
        </p>

        <!-- TOMBOL KONFIRMASI — menyimpan order ke database -->
        <form action="/confirm-order" method="POST">
            @csrf
            <input type="hidden" name="payment_method" value="cod">
            <button type="submit"
                class="bg-yellow-400 px-8 py-3 rounded-full hover:scale-105 transition font-semibold w-full">
                Konfirmasi Pesanan
            </button>
        </form>
    </div>

</div>
</body>
</html>