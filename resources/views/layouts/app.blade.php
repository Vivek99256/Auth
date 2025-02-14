<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #E3FDFD, #FFE6FA);
            margin: 0;
            padding: 0;
        }
    </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-800">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <header class="bg-white shadow sticky top-0 z-50">
                @include('layouts.navigation')
            </header>

            <!-- Page Heading -->
            @isset($header)
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                    <header class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold">
                            {{ $header }}
                        </h1>
                    </header>
                </div>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer
            <footer class="bg-gray-800 text-white py-4">
                <div class="max-w-7xl mx-auto text-center">
                    <p class="text-sm">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                    </p>
                </div>
            </footer> -->
        </div>
    </body>
</html>
