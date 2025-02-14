<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-cover bg-center relative" style="background-image: url('/images/background.jpg');">
    
    <!-- Dark Overlay for Better Readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Glassmorphism Registration Box -->
    <div class="relative bg-white bg-opacity-20 backdrop-blur-md shadow-lg rounded-2xl p-8 w-full max-w-md">
        
        <h2 class="text-2xl font-bold text-center text-white mb-6">Create an Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="text-white block font-semibold">Name</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-90">
                @error('name')
                    <p class="mt-2 text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="text-white block font-semibold">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                    class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-90">
                @error('email')
                    <p class="mt-2 text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="text-white block font-semibold">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-90">
                @error('password')
                    <p class="mt-2 text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="text-white block font-semibold">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-90">
                @error('password_confirmation')
                    <p class="mt-2 text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Register Button & Login Link -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-indigo-300 hover:text-white hover:underline transition">
                    Already registered?
                </a>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white font-semibold py-2 px-5 rounded-xl shadow-md transition duration-300">
                    Register
                </button>
            </div>
        </form>
    </div>

</body>
</html>
