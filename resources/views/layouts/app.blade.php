<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts dari Themewagon jika ada -->
    <!-- Contoh: <link rel="stylesheet" href="{{ asset('Admin/fonts/style.css') }}"> -->

    <!-- Styles dari template -->
    <link rel="stylesheet" href="{{ asset('Admin/css/stylee.css') }}">

    <!-- Scripts Laravel Breeze -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Navbar dari template -->
    <header>
        {{-- Bisa salin dari template atau include partial --}}
        <nav>Navbar dari Themewagon</nav>
    </header>

    <!-- Section Utama -->
    <main>
        {{-- Slot dari Laravel untuk konten halaman --}}
        {{ $slot }}
    </main>

    <!-- Footer dari template -->
    <footer>
        <p>Footer dari template</p>
    </footer>

    <!-- JS dari template -->
    <script src="{{ asset('Admin/js/main.js') }}"></script>
</body>
</html>
