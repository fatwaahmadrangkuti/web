<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
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

            <h2 class="text-2xl font-bold text-center mb-8">Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" placeholder="Email"
                    class="w-full border-b border-gray-400 mb-6 p-2 bg-transparent outline-none">

                <div class="relative">
                    <input type="password" name="password" placeholder="Password"
                        class="w-full border-b border-gray-400 mb-2 p-2 bg-transparent outline-none">

                    <a href="#" class="absolute right-0 top-0 text-sm text-blue-500">
                        Forget Password?
                    </a>
                </div>

                <button class="w-full mt-6 bg-[#cbbba0] text-white py-2 rounded-lg">
                    Login
                </button>

                <p class="text-center text-sm mt-4">
                    Don't have an account?
                    <a href="{{ url('/register') }}" class="text-blue-500">Sign Up</a>
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