<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f1ec]">

<div class="flex min-h-screen">

    <!-- LEFT IMAGE -->
    <div class="w-1/3">
        <img src="{{ asset('images/buku.png') }}" 
             class="w-full h-full object-cover">
    </div>

    <!-- FORM -->
    <div class="flex-1 flex items-center justify-center">

        <div class="w-[350px]">

            <h2 class="text-2xl font-bold text-center mb-8">Sign Up</h2>

            <form method="POST" action="{{ url('/register') }}">
                @csrf

               <input type="text" name="nama" placeholder="Nama Lengkap"
                    class="w-full border-b border-gray-400 mb-4 p-2 bg-transparent outline-none">

                <input type="email" name="email" placeholder="Email"
                    class="w-full border-b border-gray-400 mb-4 p-2 bg-transparent outline-none">

                <input type="password" name="password" placeholder="Password"
                    class="w-full border-b border-gray-400 mb-4 p-2 bg-transparent outline-none">

                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                    class="w-full border-b border-gray-400 mb-4 p-2 bg-transparent outline-none">

                <input type="text" name="telepon" placeholder="No Telepon"
                    class="w-full border-b border-gray-400 mb-4 p-2 bg-transparent outline-none">

                <input type="text" name="alamat" placeholder="Alamat"
                    class="w-full border-b border-gray-400 mb-6 p-2 bg-transparent outline-none">

                <button class="w-full bg-[#cbbba0] text-white py-2 rounded-lg">
                    Sign Up
                </button>

                <p class="text-center text-sm mt-4">
                    Already have an account?
                    <a href="{{ url('/login') }}" class="text-blue-500">Login</a>
                </p>

            </form>

        </div>

    </div>

    <!-- RIGHT IMAGE -->
    <div class="w-1/3">
        <img src="{{ asset('images/buku.png') }}" 
             class="w-full h-full object-cover">
    </div>

</div>

</body>
</html>