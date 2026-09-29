<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#F1F1F1]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Shopify-Style Admin') — Mangalam.co™</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Styles / Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Shopify Polaris Style Custom Scrollbars */
        .shopify-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .shopify-scrollbar::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
        }
        .shopify-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
        }
        .shopify-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.35);
        }
    </style>
    @stack('styles')
</head>
<body class="h-full font-body text-[#202223] antialiased bg-[#F6F6F7] flex flex-col min-h-screen selection:bg-[#D38928] selection:text-white">
    
    <div class="flex h-screen overflow-hidden">
        
        <!-- ================================================================= -->
        <!-- SHOPIFY-STYLE LEFT SIDEBAR NAVIGATION                             -->
        <!-- ================================================================= -->
        <aside class="hidden lg:flex lg:flex-shrink-0 z-30">
            <div class="flex flex-col w-[260px] bg-[#1A1A1A] border-r border-[#2C2C2C] text-[#E3E3E3] select-none justify-between h-full">
                
                <!-- 1. Store Header & Brand Identity -->
                <div>
                    <div class="h-14 px-4 bg-[#141414] border-b border-[#2C2C2C] flex items-center justify-between">
                        <div class="flex items-center space-x-2.5 min-w-0">
                            <div class="w-8 h-8 rounded-[8px] bg-gradient-to-br from-[#D38928] to-[#965A15] text-white flex items-center justify-center font-heading font-black text-sm shadow-md shrink-0">
                                आ
                            </div>
                            <div class="min-w-0">
                                <span class="text-xs font-bold text-white tracking-wide truncate block font-heading">Mangalam.co™</span>
                                <span class="flex items-center space-x-1 text-[10px] text-emerald-400 font-mono">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>Store Live</span>
                                </span>
                            </div>
                        </div>
                        <a 
                            href="{{ route('home') }}" 
                            target="_blank" 
                            class="p-1.5 text-white/50 hover:text-[#F6DAA8] hover:bg-white/10 rounded-md transition-colors"
                            title="Preview Storefront"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>

                    <!-- 2. Nav Links Scrollable Area -->
                    <div class="overflow-y-auto px-3 py-4 space-y-5 shopify-scrollbar max-h-[calc(100vh-140px)]">
                        
                        <!-- Core Navigation -->
                        <div class="space-y-0.5">
                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center space-x-3 px-3 py-2 rounded-[8px] text-xs font-semibold transition-all {{ request()->routeIs('admin.dashboard*') ? 'bg-[#2E2E2E] text-white font-bold' : 'text-[#CCCCCC] hover:bg-[#252525] hover:text-white' }}"
                            >
                                <svg class="w-4 h-4 shrink-0 text-[#D38928]" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                                <span>Home / Dashboard</span>
                            </a>
                        </div>

                        <!-- Section: Sales & Commerce -->
                        <div class="space-y-1">
                            <span class="px-3 text-[10px] font-extrabold uppercase tracking-wider text-white/40 font-mono block">
                                Sales &amp; Operations
                            </span>

                            <!-- Orders -->
                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                    <span>Orders</span>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/10 text-white/80">0</span>
                            </a>

                            <!-- Products -->
                            <a 
                                href="{{ route('admin.products.index') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium transition-all group {{ request()->routeIs('admin.products*') ? 'bg-[#2E2E2E] text-white font-bold' : 'text-[#CCCCCC] hover:bg-[#252525] hover:text-white' }}"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                    <span>Products</span>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-[#D38928]/25 text-[#F6DAA8]">10</span>
                            </a>

                            <!-- Inventory Tracking -->
                            <a 
                                href="{{ route('admin.inventory.index') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium transition-all group {{ request()->routeIs('admin.inventory*') ? 'bg-[#2E2E2E] text-white font-bold' : 'text-[#CCCCCC] hover:bg-[#252525] hover:text-white' }}"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    <span>Inventory</span>
                                </div>
                                <span class="px-1.5 py-0.5 text-[10px] font-bold rounded-full bg-amber-500/20 text-amber-300">Live</span>
                            </a>

                            <!-- Categories -->
                            <a 
                                href="{{ route('admin.categories.index') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium transition-all group {{ request()->routeIs('admin.categories*') ? 'bg-[#2E2E2E] text-white font-bold' : 'text-[#CCCCCC] hover:bg-[#252525] hover:text-white' }}"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                    <span>Categories</span>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/10 text-white/80">5</span>
                            </a>

                            <!-- Collections -->
                            <a 
                                href="{{ route('admin.collections.index') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium transition-all group {{ request()->routeIs('admin.collections*') ? 'bg-[#2E2E2E] text-white font-bold' : 'text-[#CCCCCC] hover:bg-[#252525] hover:text-white' }}"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                    <span>Collections</span>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/10 text-white/80">9</span>
                            </a>

                            <!-- Customers -->
                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    <span>Customers</span>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/10 text-white/80">1</span>
                            </a>

                            <!-- Discounts & Coupons -->
                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                    <span>Discounts</span>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/10 text-white/80">0</span>
                            </a>

                            <!-- Reviews -->
                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                    <span>Reviews</span>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-emerald-500/20 text-emerald-300">10</span>
                            </a>
                        </div>

                        <!-- Section: Online Store Channels -->
                        <div class="space-y-1">
                            <span class="px-3 text-[10px] font-extrabold uppercase tracking-wider text-white/40 font-mono block">
                                Online Storefront
                            </span>

                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Banners &amp; Slider</span>
                                </div>
                            </a>

                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/></svg>
                                    <span>Blog Posts</span>
                                </div>
                            </a>

                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>FAQs</span>
                                </div>
                            </a>

                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    <span>Testimonials</span>
                                </div>
                            </a>
                        </div>

                        <!-- Section: Config -->
                        <div class="space-y-1">
                            <span class="px-3 text-[10px] font-extrabold uppercase tracking-wider text-white/40 font-mono block">
                                Configuration
                            </span>

                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="flex items-center justify-between px-3 py-2 rounded-[8px] text-xs font-medium text-[#CCCCCC] hover:bg-[#252525] hover:text-white transition-all group"
                            >
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4 text-white/60 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>Store Settings</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- 3. Bottom Admin Profile & Sign Out -->
                <div class="p-3 border-t border-[#2C2C2C] bg-[#141414] flex items-center justify-between">
                    <div class="flex items-center space-x-2.5 min-w-0">
                        <div class="w-8 h-8 rounded-full bg-[#D38928] text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-xs">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <span class="text-xs font-bold text-white truncate block">{{ auth()->user()->name ?? 'Administrator' }}</span>
                            <span class="text-[10px] text-white/50 truncate block">Store Owner</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                        @csrf
                        <button 
                            type="submit" 
                            class="p-1.5 text-white/50 hover:text-red-400 hover:bg-white/10 rounded-md transition-colors"
                            title="Sign out of Admin"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>

            </div>
        </aside>

        <!-- ================================================================= -->
        <!-- MAIN CONTENT CONTAINER                                            -->
        <!-- ================================================================= -->
        <div class="flex-1 flex flex-col overflow-hidden bg-[#F6F6F7]">
            
            <!-- Shopify Polaris Top Header Bar -->
            <header class="h-14 bg-[#1A1A1A] text-white border-b border-[#2C2C2C] flex items-center justify-between px-4 sm:px-6 z-20 shrink-0">
                
                <!-- Left: Search Box (Shopify Global Search style) -->
                <div class="flex items-center space-x-3 flex-1 max-w-lg">
                    <button type="button" id="mobile-sidebar-toggle" class="lg:hidden p-1.5 text-white/70 hover:text-white focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>

                    <div class="relative w-full hidden sm:block">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-white/40">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </span>
                        <input 
                            type="text" 
                            id="admin-global-search" 
                            placeholder="Search orders, products, customers... (Ctrl + K)" 
                            class="w-full pl-9 pr-12 py-1.5 bg-[#2B2B2B] hover:bg-[#333333] focus:bg-[#333333] text-xs text-white placeholder-white/40 rounded-[8px] border border-transparent focus:border-[#D38928] focus:outline-none transition-all"
                        >
                        <span class="absolute inset-y-0 right-0 flex items-center pr-2.5 text-[10px] text-white/30 font-mono pointer-events-none">
                            ⌘K
                        </span>
                    </div>
                </div>

                <!-- Right: Header Controls & Storefront Quick Access -->
                <div class="flex items-center space-x-3">
                    <a 
                        href="{{ route('home') }}" 
                        target="_blank" 
                        class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-[8px] bg-[#2B2B2B] hover:bg-[#363636] text-white/90 text-xs font-medium border border-white/10 transition-colors"
                    >
                        <span>View store</span>
                        <svg class="w-3 h-3 text-[#D38928]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>

                    <!-- Notification Alert Icon -->
                    <button type="button" class="p-1.5 text-white/70 hover:text-white rounded-md hover:bg-white/10 relative transition-colors" title="Notifications">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-[#D38928]"></span>
                    </button>
                </div>

            </header>

            <!-- Main Page Scrollable Body -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 shopify-scrollbar">
                
                <!-- Toast Notification Container -->
                <div id="admin-toast-container" class="fixed top-16 right-6 z-50 space-y-2 pointer-events-none"></div>

                <!-- Server Flash Alerts -->
                @if(session('success'))
                    <div class="mb-5 p-3.5 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center justify-between shadow-xs">
                        <div class="flex items-center space-x-2">
                            <span>✅</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-5 p-3.5 rounded-[10px] bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center justify-between shadow-xs">
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

    <!-- Generic Confirmation Modal Dialog -->
    <div id="admin-confirm-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-200">
        <div class="bg-white rounded-[16px] max-w-sm w-full p-6 shadow-2xl space-y-4 transform transition-transform scale-95" id="confirm-modal-box">
            <h4 id="confirm-modal-title" class="text-sm font-bold text-[#121212] font-heading">Confirm Action</h4>
            <p id="confirm-modal-message" class="text-xs text-gray-600 leading-relaxed">Are you sure you want to proceed?</p>
            <div class="flex items-center justify-end space-x-3 pt-2">
                <button type="button" id="confirm-modal-cancel" class="px-3.5 py-2 rounded-[8px] bg-gray-100 hover:bg-gray-200 text-xs font-semibold text-gray-700 transition-colors">Cancel</button>
                <button type="button" id="confirm-modal-ok" class="px-4 py-2 rounded-[8px] bg-[#9B1C31] hover:bg-[#801627] text-xs font-bold text-white transition-colors">Proceed</button>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
