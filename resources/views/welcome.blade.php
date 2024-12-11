<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- logo --}}
    <link rel="icon" type="png" href="{{ asset('img/logoSTMIK.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-green-100 to-blue-100 font-sans">

    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-6 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between px-6">
            <h1 class="text-3xl font-extrabold">Sistem KRS</h1>
            <nav class="space-x-6 text-lg">
                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="hover:text-yellow-300 transition">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="px-3 py-2 hover:text-yellow-300 transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-3 py-2 hover:text-yellow-300 transition">
                        Register
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative flex flex-col items-center justify-center text-center py-20">
        <img src="{{ asset('img/logoSTMIK.png') }}" alt="Logo STMIK" class="w-60 h-40 mx-auto mb-8 opacity-90">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            Selamat Datang di <span class="text-blue-600">Sistem KRS</span>
        </h1>
        <p class="text-lg text-gray-700 mb-8">
            Kelola rencana studi Anda dengan mudah dan cepat menggunakan sistem ini
        </p>
        <div class="flex space-x-4">
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="bg-green-500 text-white px-6 py-3 rounded-md shadow-lg hover:bg-green-600 transform hover:scale-105">
                    Dashboard
                </a>
                @else

                <a href="{{ route('login') }}"
                    class="bg-green-500 text-white px-6 py-3 rounded-md shadow-lg hover:bg-green-600 transform hover:scale-105">
                    Mulai Sekarang
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="border border-gray-300 text-gray-800 px-6 py-3 rounded-md shadow-lg hover:bg-gray-200 transform hover:scale-105 ml-4">
                    Belum Punya Akun?
                </a>
                @endif

                @endauth
            </nav>
            @endif
        </div>
        <div class="absolute -bottom-10 transform rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,256L1440,320L1440,0L0,0Z"></path>
            </svg>
        </div>
    </section>

    <!-- Informasi -->
    <section class="px-6 py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Mengapa Menggunakan Sistem KRS?</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <!-- Kartu 1: Kelola Studi -->
                <div
                    class="w-64 p-6 bg-gradient-to-br from-green-400 to-blue-500 rounded-2xl shadow-lg transform hover:scale-105 hover:shadow-2xl">
                    <div class="flex justify-center mb-6">
                        <div
                            class="w-20 h-20 rounded-full bg-gradient-to-t from-yellow-400 to-red-500 p-2 shadow-xl transform hover:scale-105 transition duration-200">
                            <div
                                class="bg-white w-full h-full rounded-full flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('img/jadwal2.avif') }}" alt="jadwal" class="object-cover w-20 h-20">
                            </div>
                        </div>
                    </div>
                    <h3 class="font-bold text-white text-center text-lg mb-2">Kelola Studi</h3>
                    <p class="text-white text-center text-sm">Buat jadwal dengan mudah dan tetap terorganisir</p>
                </div>

                <!-- Kartu 2: Efisiensi Waktu -->
                <div
                    class="w-64 p-6 bg-gradient-to-r from-pink-400 to-orange-500 rounded-xl shadow-xl transform hover:scale-105 hover:shadow-2xl transition duration-300 ease-in-out hover:rotate-2">
                    <div class="w-full flex justify-center mb-4">
                        <div
                            class="w-20 h-20 rounded-full bg-gradient-to-t from-yellow-500 to-orange-400 p-2 shadow-xl transform hover:scale-105 transition duration-200">
                            <div
                                class="bg-white w-full h-full rounded-full flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('img/time.avif') }}" alt="Time" class="object-cover w-20 h-20">
                            </div>
                        </div>
                    </div>
                    <h3 class="font-semibold text-white text-center text-lg mb-2 tracking-wide">Efisiensi Waktu</h3>
                    <p class="text-white text-sm text-center mt-2">Hemat waktu dengan akses cepat ke informasi penting
                    </p>
                </div>

                <!-- Kartu 3: Capaian Akademik -->
                <div
                    class="w-64 p-6 bg-gradient-to-br from-blue-500 to-teal-400 rounded-xl shadow-xl transform hover:scale-105 hover:shadow-2xl transition duration-300 ease-in-out hover:rotate-2">
                    <div class="w-full flex justify-center mb-4">
                        <div
                            class="w-20 h-20 rounded-full bg-gradient-to-r from-yellow-400 to-red-400 p-2 shadow-xl transform hover:scale-105 transition duration-200">
                            <div
                                class="bg-white w-full h-full rounded-full flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('img/succes.png') }}" alt="Succes" class="object-cover w-18 h-18">
                            </div>
                        </div>
                    </div>
                    <h3 class="font-semibold text-white text-center text-lg mb-2">Capaian Akademik</h3>
                    <p class="text-white text-sm text-center">Capai tujuan akademik Anda dengan dukungan kami</p>
                </div>
            </div>
        </div>
    </section>
    </section>
    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-6">
        <p>&copy; 2024 Sistem KRS </p>
    </footer>

</body>

</html>