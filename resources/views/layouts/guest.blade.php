<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>SIANAS | Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
        style="background-image: url('{{ asset('flexstart/assets/img/hero-bg.png') }}');">
        <div>
            <div style="text-align: center">
                <img src="{{ asset('images/logo.png') }}" alt=""
                    style="width: 30%; height: 30%; margin-left: 120px">
                <h1 style="font-size:300%; font-weight: 400">SIANAS</h1>
                <h2 class="mb-6">(Sistem Informasi Aset Nasional)</h2>
            </div>
        </div>

        <div class="w-full sm:max-w-md mb-10 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
