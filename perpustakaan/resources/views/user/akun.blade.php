@extends('user.layouts.app')
@section('title', 'Akun Saya')

@section('content')
<div class="bg-white rounded-2xl shadow-sm p-6">
    <h2 class="text-lg font-bold mb-6" style="font-family:'Playfair Display',serif; color:#5a4a35;">
        Profil Saya
    </h2>

    <div class="flex flex-col items-center mb-8">
        <div class="w-20 h-20 rounded-full bg-[#cbbba0] flex items-center justify-center text-4xl mb-3">👤</div>
        <span class="text-xs border border-[#cbbba0] px-4 py-1.5 rounded-full text-[#7a6748]">
            Ubah Foto Profil
        </span>
    </div>

    <form action="{{ url('/user/akun') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-5">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Nama</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}"
                    class="w-full border-0 border-b border-gray-300 bg-transparent py-2 text-sm focus:outline-none focus:border-[#a08c64]">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">No.Hp</label>
                <input type="text" name="telepon" value="{{ Auth::user()->telepon }}"
                    class="w-full border-0 border-b border-gray-300 bg-transparent py-2 text-sm focus:outline-none focus:border-[#a08c64]">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Email</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}"
                    class="w-full border-0 border-b border-gray-300 bg-transparent py-2 text-sm focus:outline-none focus:border-[#a08c64]">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Kata Sandi Baru <span class="text-gray-400">(kosongkan jika tidak diubah)</span></label>
                <input type="password" name="password"
                    class="w-full border-0 border-b border-gray-300 bg-transparent py-2 text-sm focus:outline-none focus:border-[#a08c64]">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation"
                    class="w-full border-0 border-b border-gray-300 bg-transparent py-2 text-sm focus:outline-none focus:border-[#a08c64]">
            </div>
        </div>
        <div class="mt-8 flex justify-end">
            <button type="submit"
                class="bg-[#a08c64] text-white px-8 py-2 rounded-full text-sm hover:bg-[#7a6748] transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection