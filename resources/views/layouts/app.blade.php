<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $siteTitle = $storeSettings['store_name'] ?? 'ISHANAA';
    @endphp
    <title>@hasSection('title')
@yield('title')
@else
{{ $siteTitle }} — Pure Vedic Living
@endif</title>
    <meta name="description" content="@yield('meta_description', 'Pooja Samagri & Vidhi — शुद्धं समर्पयामि. Non-irritating bambooless incense sticks, organic havan cups, charcoal-free dhoop cones & alcohol-free attar sprays.')">

    <!-- OpenGraph Meta -->
    <meta property="og:site_name" content="{{ $siteTitle }}™">
    <meta property="og:title" content="@yield('title', $siteTitle . ' - Pooja Samagri & Vidhi')">
    <meta property="og:description" content="@yield('meta_description', '100% pure Vedic pooja essentials.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Fonts: Instrument Sans & Instrument Serif (Agatho loaded locally) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/Ishana-fav-icon.jpeg') }}?v={{ filemtime(public_path('assets/images/Ishana-fav-icon.jpeg')) }}">
    <link rel="shortcut icon" type="image/jpeg" href="{{ asset('assets/images/Ishana-fav-icon.jpeg') }}?v={{ filemtime(public_path('assets/images/Ishana-fav-icon.jpeg')) }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/Ishana-fav-icon.jpeg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="antialiased text-[#2B1810] bg-white min-h-screen flex flex-col font-body selection:bg-[#F6DAA8] selection:text-[#2B1810]">

    <!-- 1. Announcement Bar -->
    <x-announcement-bar />

    <!-- 2. Sticky Desktop / Mobile Header -->
    <x-header />

    <!-- 3. Mobile Drawer Navigation -->
    <x-mobile-menu />

    <!-- 4. Predictive Search Modal -->
    <x-search-modal />

    <!-- 5. Slide-over Luxury Cart Drawer -->
    <x-cart-drawer />

    <!-- 5.1 GoKwik 1-Click Express Checkout Modal -->
    <x-gokwik-checkout />

    <!-- 5.2 10% Discount Multi-Step Signup Modal -->
    <x-discount-signup-modal />

    <!-- 6. Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- 7. Comprehensive Footer -->
    <x-footer />

    @stack('scripts')
</body>
</html>
