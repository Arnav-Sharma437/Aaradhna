<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aaradhna Admin - @yield('title', 'Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="antialiased bg-gray-50 text-sadhna-primary min-h-screen flex font-body">
    <!-- Admin Sidebar Placeholder -->
    <aside class="w-64 bg-sadhna-primary text-white flex-shrink-0 hidden md:block">
        <div class="p-6 border-b border-gray-800">
            <h1 class="text-xl font-bold tracking-wider font-heading">AARADHNA ADMIN</h1>
        </div>
        <nav class="p-4 space-y-1">
            @yield('admin-nav')
        </nav>
    </aside>

    <!-- Admin Main Body -->
    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-white border-b border-sadhna-border px-6 py-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold font-heading">@yield('page-title', 'Dashboard')</h2>
            <div class="flex items-center space-x-4">
                @yield('admin-user-menu')
            </div>
        </header>

        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
