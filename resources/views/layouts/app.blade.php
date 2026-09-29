<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aaradhna.co') }} - @yield('title', 'Pooja Samagri & Vidhi')</title>
    <meta name="description" content="@yield('meta_description', 'Pooja Samagri & Vidhi — शुद्धं समर्पयामि. Non-irritating bambooless incense sticks, organic havan cups, charcoal-free dhoop cones & alcohol-free attar sprays.')">

    <!-- OpenGraph Meta -->
    <meta property="og:site_name" content="Aaradhna.co™">
    <meta property="og:title" content="@yield('title', 'Aaradhna.co - Pooja Samagri & Vidhi')">
    <meta property="og:description" content="@yield('meta_description', '100% pure Vedic pooja essentials.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Fonts: Maharlika (Headings) & Lato (Subheadings, Paragraphs, Buttons) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/maharlika" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="antialiased text-sadhna-primary bg-white min-h-screen flex flex-col font-body selection:bg-sadhna-light-gold selection:text-sadhna-primary">

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

    <!-- 6. Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- 6. Sacred Gayatri Mantra Ribbon -->
    <x-gayatri-marquee />

    <!-- 7. Comprehensive Footer -->
    <x-footer />

    @stack('scripts')
</body>
</html>
