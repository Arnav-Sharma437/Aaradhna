@extends('layouts.app')

@section('title', 'Sacred Wishlist — Mangalam.co™')
@section('meta_description', 'Your saved sacred pooja essentials and devotional fragrances.')

@section('content')
<div class="bg-white min-h-screen py-10 sm:py-16 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Header -->
        <div class="text-center max-w-xl mx-auto mb-12 space-y-2">
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ SAVED DEVOTIONAL SAMAGRI ✦</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight">
                Your Sacred Wishlist
            </h1>
            <p class="text-xs sm:text-sm text-gray-500">
                Items saved for your upcoming auspicious festivals, havans, and daily morning Sandhya.
            </p>
        </div>

        <!-- Dynamic Wishlist Grid Container (Rendered purely from client state with zero static phantom items) -->
        <div id="wishlist-grid" class="min-h-[300px] flex items-center justify-center">
            <!-- Will be dynamically populated by app.js -->
        </div>

        <!-- Devotee Favorites / Suggestions Section -->
        @if(isset($featuredProducts) && $featuredProducts->count() > 0)
            <div class="mt-20 pt-10 border-t border-[#EADBCC]">
                <div class="text-center max-w-xl mx-auto mb-10 space-y-2">
                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ RECOMENDED FOR POOJA ✦</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight">
                        Sacred Vedic Essentials
                    </h2>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-8">
                    @foreach($featuredProducts as $fp)
                        <x-product-card :product="$fp" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Back to shop link -->
        <div class="text-center mt-14">
            <a href="{{ route('collections.show', 'all') }}" class="inline-flex items-center px-10 py-3.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                ← Explore More Sacred Samagri
            </a>
        </div>

    </div>
</div>
@endsection
