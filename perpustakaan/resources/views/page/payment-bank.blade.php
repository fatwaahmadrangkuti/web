<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bank Payment</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
body{
    font-family: 'Playfair Display', serif;
}
</style>

</head>

<body class="bg-[#f4f1ec] flex justify-center py-10 px-4">

<div class="w-full max-w-[430px] bg-[#f4f1ec] min-h-screen">

    <!-- HEADER -->
    <div class="flex items-center gap-4 mb-10">

        <a href="/checkout"
           class="text-2xl hover:opacity-70 transition">
            ←
        </a>

        <div class="flex items-center gap-3">

            <img src="{{ asset('images/logo.png') }}"
                 class="w-12">

            <h1 class="text-3xl font-semibold">
                LorongBuku
            </h1>

        </div>

    </div>

    <!-- TITLE -->
    <div class="mb-6">

        <h2 class="text-2xl font-semibold mb-2">
            Instruksi Pembayaran
        </h2>

        <p class="text-gray-600">
            Selesaikan pembayaran sesuai instruksi berikut
        </p>

    </div>

    <!-- PAYMENT CARD -->
    <div class="bg-white rounded-2xl p-6 shadow-lg">

        <!-- BANK -->
        <div class="flex items-center justify-between mb-6">

            <div>

                <p class="text-sm text-gray-500 mb-1">
                    Transfer Bank
                </p>

                <h1 class="text-4xl font-bold text-blue-700">
                    BCA
                </h1>

            </div>

            <div class="bg-blue-50 px-4 py-2 rounded-xl">

                <p class="text-sm text-blue-700 font-semibold">
                    Virtual Account
                </p>

            </div>

        </div>

        <!-- VA -->
        <div class="bg-[#f8f8f8] rounded-xl p-5 mb-6">

            <p class="text-sm text-gray-500 mb-2">
                Nomor Virtual Account
            </p>

            <div class="flex items-center justify-between gap-4">

                <h2 class="text-2xl font-bold text-red-500 tracking-wide">
                    8830123456789
                </h2>

                <button class="bg-yellow-400 px-4 py-2 rounded-lg text-sm font-semibold hover:scale-105 transition">

                    Salin

                </button>

            </div>

        </div>

        <!-- TOTAL -->
        <div class="space-y-4">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm">
                        Total Pembayaran
                    </p>

                    <h2 class="text-3xl font-bold">

                        Rp{{ number_format($total + 5000,0,',','.') }}

                    </h2>

                </div>

                <div class="text-right">

                    <p class="text-gray-500 text-sm">
                        Batas Waktu
                    </p>

                    <p class="font-semibold">
                        3 April 2026
                    </p>

                    <p class="text-red-500 font-semibold">
                        23:59 WIB
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- PANDUAN -->
    <div class="mt-10">

        <h3 class="text-xl font-semibold mb-5">
            Panduan Pembayaran
        </h3>

        <div class="bg-white rounded-2xl p-6 shadow space-y-4">

            <div class="flex gap-3">
                <span class="font-bold">1.</span>
                <p>Pilih menu <b>Transfer > BCA Virtual Account</b></p>
            </div>

            <div class="flex gap-3">
                <span class="font-bold">2.</span>
                <p>
                    Masukkan nomor Virtual Account
                    <span class="text-red-500 font-semibold">
                        8830123456789
                    </span>
                </p>
            </div>

            <div class="flex gap-3">
                <span class="font-bold">3.</span>
                <p>
                    Pastikan nama merchant adalah
                    <b>LorongBuku</b>
                </p>
            </div>

            <div class="flex gap-3">
                <span class="font-bold">4.</span>
                <p>
                    Masukkan PIN m-BCA lalu tekan OK
                </p>
            </div>

            <div class="flex gap-3">
                <span class="font-bold">5.</span>
                <p>
                    Simpan bukti pembayaran untuk berjaga-jaga
                </p>
            </div>

        </div>

    </div>

    <!-- BUTTON -->
    <a href="/">

        <button class="mt-10 w-full bg-yellow-400 py-4 rounded-full
                       text-lg font-semibold
                       hover:scale-105 transition duration-300 shadow">

            OK

        </button>

    </a>

</div>

</body>
</html>