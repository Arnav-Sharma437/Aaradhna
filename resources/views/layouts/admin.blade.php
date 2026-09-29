<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#F7F5F0]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') — Aaradhna.co™ Admin</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Styles / Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="h-full font-body text-[#1E1E1E] antialiased bg-[#FAF8F5] flex flex-col min-h-screen">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-[#121212] border-r border-white/10 text-white select-none">
                
                <!-- Brand Header -->
                <div class="flex items-center justify-between h-16 px-6 bg-black/40 border-b border-white/10">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2.5">
                        <div class="w-8 h-8 rounded-[8px] bg-[#D38928] text-white flex items-center justify-center font-heading font-black text-base shadow-md">
                            आ
                        </div>
                        <div class="leading-tight">
                            <span class="text-sm font-black tracking-wider uppercase font-heading text-white">Aaradhna</span>
                            <span class="block text-[10px] uppercase font-mono tracking-widest text-[#D38928]">Admin Console</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex-1 flex flex-col overflow-y-auto px-4 py-6 space-y-1.5 scrollbar-none">
                    
                    <div class="px-3 pb-2 text-[10px] font-extrabold uppercase tracking-widest text-white/40 font-mono">
                        Core Overview
                    </div>

                    <!-- Dashboard -->
                    <a 
                        href="{{ route('admin.dashboard') }}" 
                        class="flex items-center space-x-3 px-3.5 py-2.5 rounded-[10px] text-xs sm:text-sm font-semibold transition-all {{ request()->routeIs('admin.dashboard*') ? 'bg-[#D38928] text-white shadow-md' : 'text-white/75 hover:bg-white/10 hover:text-white' }}"
                    >
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <div class="pt-5 px-3 pb-2 text-[10px] font-extrabold uppercase tracking-widest text-white/40 font-mono">
                        Store Management
                    </div>

                    <!-- Products -->
                    <a 
                        href="{{ route('admin.dashboard') }}" 
                        class="flex items-center justify-between px-3.5 py-2.5 rounded-[10px] text-xs sm:text-sm font-medium text-white/75 hover:bg-white/10 hover:text-white transition-all"
                    >
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <span>Products</span>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/15 text-white">10</span>
                    </a>

                    <!-- Categories & Collections -->
                    <a 
                        href="{{ route('admin.dashboard') }}" 
                        class="flex items-center justify-between px-3.5 py-2.5 rounded-[10px] text-xs sm:text-sm font-medium text-white/75 hover:bg-white/10 hover:text-white transition-all"
                    >
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                            </svg>
                            <span>Collections</span>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/15 text-white">9</span>
                    </a>

                    <!-- Orders -->
                    <a 
                        href="{{ route('admin.dashboard') }}" 
                        class="flex items-center justify-between px-3.5 py-2.5 rounded-[10px] text-xs sm:text-sm font-medium text-white/75 hover:bg-white/10 hover:text-white transition-all"
                    >
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>Orders</span>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/15 text-white">0</span>
                    </a>

                    <!-- Reviews -->
                    <a 
                        href="{{ route('admin.dashboard') }}" 
                        class="flex items-center justify-between px-3.5 py-2.5 rounded-[10px] text-xs sm:text-sm font-medium text-white/75 hover:bg-white/10 hover:text-white transition-all"
                    >
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            <span>Reviews</span>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-emerald-500/20 text-emerald-300">10</span>
                    </a>

                </div>

                <!-- Footer Quick Actions & User -->
                <div class="p-4 border-t border-white/10 bg-black/30 space-y-3">
                    <a 
                        href="{{ route('home') }}" 
                        target="_blank"
                        class="w-full flex items-center justify-center space-x-2 px-3 py-2 rounded-[8px] bg-white/10 hover:bg-white/20 text-white/90 text-xs font-semibold transition-colors"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>View Live Store</span>
                    </a>

                    <div class="flex items-center justify-between pt-1">
                        <div class="flex items-center space-x-2.5 min-w-0">
                            <div class="w-8 h-8 rounded-full bg-[#D38928] text-white flex items-center justify-center font-bold text-xs shrink-0">
                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-bold text-white truncate block">{{ auth()->user()->name ?? 'Administrator' }}</span>
                                <span class="text-[10px] text-white/50 truncate block">{{ auth()->user()->email ?? 'admin@sadhna.co' }}</span>
                            </div>
                        </div>

                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                            @csrf
                            <button 
                                type="submit" 
                                class="p-1.5 text-white/60 hover:text-red-400 rounded-md hover:bg-white/10 transition-colors"
                                title="Sign Out"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden bg-[#FAF8F5]">
            
            <!-- Top Header Bar -->
            <header class="h-16 bg-white border-b border-[#EADBCC] flex items-center justify-between px-4 sm:px-8 z-10">
                
                <!-- Left Title & Breadcrumbs -->
                <div class="flex items-center space-x-3">
                    <h1 class="text-base sm:text-lg font-black font-heading text-[#121212]">
                        @yield('page-title', 'Dashboard')
                    </h1>
                </div>

                <!-- Right Header Actions -->
                <div class="flex items-center space-x-4">
                    <a 
                        href="{{ route('home') }}" 
                        target="_blank" 
                        class="hidden sm:inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-[8px] bg-[#FAF3EA] text-[#D38928] hover:bg-[#D38928] hover:text-white text-xs font-bold transition-all border border-[#EADBCC]"
                    >
                        <span>✦ Live Storefront</span>
                    </a>

                    <!-- Mobile Logout Trigger -->
                    <form method="POST" action="{{ route('admin.logout') }}" class="md:hidden m-0">
                        @csrf
                        <button type="submit" class="p-2 text-gray-500 hover:text-red-600 focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Main Page Scrollable Body -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-8">
                
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-[12px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-xs">
                        <div class="flex items-center space-x-2">
                            <span>✅</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-[12px] bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-xs">
                        <div class="flex items-center space-x-2">
                            <span>⚠️</span>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')
</body>
</html>
