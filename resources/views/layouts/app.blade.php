<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Navbar -->
            <nav class="bg-white border-b border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <a href="{{ route('welcome') }}" class="text-lg font-bold text-gray-900">Laravel</a>
                        </div>
                        <div>
                            @guest
                                <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-700">Login</a>
                                <a href="{{ route('register') }}" class="ml-4 text-gray-900 hover:text-gray-700">Register</a>
                            @endguest
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-gray-900 hover:text-gray-700">Dashboard</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
