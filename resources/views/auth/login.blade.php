<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-cover bg-center relative" style="background-image: url('/images/background.jpg');">
    
    <!-- Dark Overlay for Better Readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Glassmorphism Login Box -->
    <div class="relative bg-white bg-opacity-20 backdrop-blur-md shadow-lg rounded-2xl p-8 w-full max-w-md">
        
        <!-- Session Status -->
        @if (session('status'))
            <p class="mb-4 text-center text-green-500">{{ session('status') }}</p>
        @endif

        <h2 class="text-2xl font-bold text-center text-white mb-6">Welcome </h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="text-white block font-semibold">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-90">
                @error('email')
                    <p class="mt-2 text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="text-white block font-semibold">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-90">
                @error('password')
                    <p class="mt-2 text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-white">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-500 focus:ring-indigo-400" name="remember">
                    <span class="ml-2 text-sm">Remember me</span>
                </label>
            </div>

            <!-- Login Button, Forgot Password & Register -->
            <div class="flex items-center justify-between mt-6">
                <div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-300 hover:text-white hover:underline transition">
                            Forgot password?
                        </a>
                    @endif

                    <span class="text-white mx-2">|</span> 

                    <a href="{{ route('register') }}" class="text-sm text-indigo-300 hover:text-white hover:underline transition">
                        Register
                    </a>
                </div>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white font-semibold py-2 px-5 rounded-xl shadow-md transition duration-300">
                    Log in
                </button>
            </div>
        </form>
    </div>

</body>
</html>
