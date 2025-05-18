<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('Admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/css/style.css') }}">
    
    <!-- Jika kamu pakai icon/font dari template -->
    <link rel="stylesheet" href="{{ asset('Admin/fonts/style.css') }}">

    <!-- Laravel Breeze -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- HEADER dari template -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">RentNGo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Mobil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        <div class="container py-5">
            <h1 class="text-center">Selamat Datang di RentNGo</h1>
            <p class="text-center">Platform penyewaan alat camping modern.</p>
        </div>
    </main>

    <!-- FOOTER dari template -->
    <footer class="bg-dark text-white py-4 text-center">
        <div class="container">
            &copy; 2025 RentNGo. All rights reserved.
        </div>
    </footer>

    <!-- JS dari template -->
    <script src="{{ asset('Admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Admin/js/main.js') }}"></script>
</body>
</html>
