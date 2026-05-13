@extends('user.layouts.app')
@section('title', 'Riwayat Pesanan')

@section('content')
<div class="bg-white rounded-2xl shadow-sm p-6">
    <h2 class="text-xl font-bold mb-6 text-center" style="font-family:'Playfair Display',serif; color:#5a4a35;">
        Riwayat Pesanan
    </h2>

    @forelse($orders as $order)
    <div class="border border-gray-100 rounded-xl p-4 mb-4 hover:shadow-md transition">

        <div class="flex justify-between items-center mb-3">
            <div>
                <p class="text-xs text-gray-400">Tanggal Pesan</p>
                <p class="text-xs font-semibold text-gray-600">
                    {{ \Carbon\Carbon::parse($order->created_at)->isoFormat('D MMMM YYYY') }}
                </p>
            </div>
            <span class="text-xs px-3 py-1 rounded-full font-semibold
                @if($order->status == 'selesai')      bg-green-100 text-green-700
                @elseif($order->status == 'dibatalkan') bg-red-100 text-red-700
                @else bg-gray-100 text-gray-600 @endif">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        @foreach($order->items as $item)
        <div class="flex items-center gap-3 py-2 border-t border-gray-50">
            @if($item->buku && $item->buku->gambar)
            <img src="{{ asset($item->buku->gambar) }}" class="w-12 h-16 object-cover rounded">
            @else
            <div class="w-12 h-16 bg-[#f4f1ec] rounded flex items-center justify-center text-xl">📖</div>
            @endif
            <div class="flex-1">
                <p class="text-sm font-semibold leading-tight">{{ $item->buku->judul ?? 'Buku' }}</p>
                <p class="text-xs text-gray-500">{{ $item->buku->penulis ?? '' }}</p>
            </div>
            <div class="text-right">
                <p class="text-sm font-semibold text-[#7a6748]">
                    Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                </p>
                @if($order->status == 'selesai')
                <a href="/add-to-cart/{{ $item->buku_id }}"
                   class="inline-block mt-1 bg-[#d4a853] text-white text-xs px-3 py-1 rounded-full hover:bg-[#b88a30] transition">
                    Beli Lagi
                </a>
                @endif
            </div>
        </div>
        @endforeach

        <div class="flex justify-between items-center mt-3 pt-3 border-t border-gray-100">
            <p class="text-xs text-gray-500">Total</p>
            <p class="text-sm font-bold text-[#5a4a35]">Rp{{ number_format($order->total,0,',','.') }}</p>
        </div>

    </div>
    @empty
    <div class="text-center py-16 text-gray-400">
        <div class="text-5xl mb-4">🕐</div>
        <p class="text-sm">Belum ada riwayat pesanan</p>
        <a href="/catalog" class="mt-4 inline-block bg-[#a08c64] text-white px-6 py-2 rounded-full text-sm hover:bg-[#7a6748] transition">
            Mulai Belanja
        </a>
    </div>
    @endforelse
</div>
@endsection