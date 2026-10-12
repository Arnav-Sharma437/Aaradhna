<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title')
@yield('title') - ISHANAA
@else
{{ $storeSettings['store_name'] ?? 'ISHANAA' }}
@endif</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/Ishana-fav-icon.jpeg') }}?v={{ filemtime(public_path('assets/images/Ishana-fav-icon.jpeg')) }}">
    <link rel="shortcut icon" type="image/jpeg" href="{{ asset('assets/images/Ishana-fav-icon.jpeg') }}?v={{ filemtime(public_path('assets/images/Ishana-fav-icon.jpeg')) }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="antialiased text-[#2B1810] bg-white min-h-screen flex items-center justify-center p-4 font-body">
    <div class="w-full max-w-md">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
