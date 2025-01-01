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
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('dashboard') }}">
                                    <img class="block h-9 w-auto" src="{{ asset('logo.png') }}" alt="Laravel Logo">
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <a href="{{ route('map') }}" class="text-gray-900 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    Outlet Location
                                </a>
                                @auth
                                    <a href="{{ route('outlets.index') }}" class="text-gray-900 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        Outlet List
                                    </a>
                                @endauth
                            </div>
                        </div>

                        <!-- User Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            @auth
                                <div class="ml-3 relative">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                <div>{{ Auth::user()->name }}</div>

                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            @endauth

                            @guest
                                <div class="ml-3 flex items-center">
                                    <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        Login
                                    </a>
                                    <a href="{{ route('register') }}" class="ml-4 text-gray-900 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        Register
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}

                <!-- Map Example -->
                <div id="map" style="height: 500px; width: 100%;"></div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Inisialisasi Peta
                        var map = L.map('map').setView([-8.4095, 115.1889], 10); // Koordinat default Bali

                        // Tambahkan Tile Layer
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        // Marker Data
                        var outlets = {!! json_encode($outlets ?? []) !!}; // Data dari backend
                        outlets.forEach(function(outlet) {
                            L.marker([outlet.latitude, outlet.longitude])
                                .addTo(map)
                                .bindPopup(<b>${outlet.name}</b><br>${outlet.address});
                        });
                    });
                </script>
            </main>
        </div>
    </body>
</html>
