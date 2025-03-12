<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Login') }}</title>

    <!-- Tambahkan CSS dan script yang diperlukan -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Atau jika menggunakan asset -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    {{ $slot }}
</div>
</body>
</html>
