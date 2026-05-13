@extends('user.layouts.app')
@section('title', 'Pesanan Saya')

@section('content')
<div class="bg-white rounded-2xl shadow-sm p-6">
    <h2 class="text-xl font-bold mb-6 text-center" style="font-family:'Playfair Display',serif; color:#5a4a35;">
        Pesanan Saya
    </h2>

    @forelse($orders as $order)
    <div class="border border-gray-100 rounded-xl p-4 mb-4 hover:shadow-md transition">

        <!-- Header -->
        <div class="flex justify-between items-start mb-3">
            <div>
                <p class="text-xs text-gray-400">Estimasi Tiba</p>
                <p class="text-xs font-semibold text-gray-600">
                    {{ \Carbon\Carbon::parse($order->created_at)->addDays(3)->isoFormat('dddd, D MMMM YYYY') }}
                </p>
            </div>
            <span class="text-xs px-3 py-1 rounded-full font-semibold
                @if($order->status == 'pending')   bg-yellow-100 text-yellow-700
                @elseif($order->status == 'diproses') bg-blue-100 text-blue-700
                @elseif($order->status == 'dikirim')  bg-orange-100 text-orange-700
                @elseif($order->status == 'selesai')  bg-green-100 text-green-700
                @else bg-red-100 text-red-700 @endif">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <!-- Progress Steps -->
        @php
            $steps = ['diproses','dikirim','selesai'];
            $labels = ['Diproses','Dikirim','Selesai'];
            $icons  = ['⚙️','🚚','✅'];
            $cur = array_search($order->status, $steps);
        @endphp
        <div class="flex items-center mb-4 px-2">
            @foreach($steps as $i => $step)
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm
                    {{ ($cur !== false && $i <= $cur) ? 'bg-[#a08c64] text-white' : 'bg-gray-200 text-gray-400' }}">
                    {{ $icons[$i] }}
                </div>
                <p class="text-xs mt-1 {{ ($cur !== false && $i <= $cur) ? 'text-[#a08c64] font-semibold' : 'text-gray-400' }}">
                    {{ $labels[$i] }}
                </p>
            </div>
            @if($i < count($steps)-1)
            <div class="flex-1 h-0.5 mx-1 {{ ($cur !== false && $i < $cur) ? 'bg-[#a08c64]' : 'bg-gray-200' }}"></div>
            @endif
            @endforeach
        </div>

        <!-- Items -->
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
                <p class="text-xs text-gray-400">x{{ $item->quantity }}</p>
            </div>
            <p class="text-sm font-semibold text-[#7a6748]">Rp{{ number_format($item->price,0,',','.') }}</p>
        </div>
        @endforeach

        <!-- Total -->
        <div class="flex justify-between items-center mt-3 pt-3 border-t border-gray-100">
            <p class="text-xs text-gray-500">Total Pembayaran</p>
            <p class="text-sm font-bold text-[#5a4a35]">Rp{{ number_format($order->total,0,',','.') }}</p>
        </div>

    </div>
    @empty
    <div class="text-center py-16 text-gray-400">
        <div class="text-5xl mb-4">📦</div>
        <p class="text-sm">Belum ada pesanan aktif</p>
        <a href="/catalog" class="mt-4 inline-block bg-[#a08c64] text-white px-6 py-2 rounded-full text-sm hover:bg-[#7a6748] transition">
            Mulai Belanja
        </a>
    </div>
    @endforelse
</div>
@endsection