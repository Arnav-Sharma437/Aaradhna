<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mangalam.co') }} - @yield('title', 'Pooja Samagri & Vidhi')</title>
    <meta name="description" content="@yield('meta_description', 'Pooja Samagri & Vidhi — शुद्धं समर्पयामि. Non-irritating bambooless incense sticks, organic havan cups, charcoal-free dhoop cones & alcohol-free attar sprays.')">

    <!-- OpenGraph Meta -->
    <meta property="og:site_name" content="Mangalam.co™">
    <meta property="og:title" content="@yield('title', 'Mangalam.co - Pooja Samagri & Vidhi')">
    <meta property="og:description" content="@yield('meta_description', '100% pure Vedic pooja essentials.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Fonts: Recoleta & Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/recoleta" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/fac-icon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/fac-icon.png') }}">

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

    <!-- 6. Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- 6. Sacred Gayatri Mantra Ribbon -->
    <x-gayatri-marquee />

    <!-- 7. Comprehensive Footer -->
    <x-footer />

    <!-- 8. Mobile App-Like Floating Bottom Bar -->
    <x-mobile-app-bar />

    @stack('scripts')
</body>
</html>
