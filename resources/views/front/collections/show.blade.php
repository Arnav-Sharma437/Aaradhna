@extends('layouts.app')

@section('title', $collection->meta_title ?? "{$collection->title} — Mangalam.co™")
@section('meta_description', $collection->meta_description ?? $collection->description)

@section('content')
<div class="bg-[#FAF7F2] min-h-screen py-6 lg:py-10 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">

        <!-- Top Bar: Total Count & Sort Dropdown -->
        <div class="bg-white rounded-[18px] border border-[#EADBCC] p-4 sm:p-5 mb-8 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-4">
            
            <!-- Left: Total Items Count & Title -->
            <div class="flex items-center space-x-3">
                <h1 class="text-lg sm:text-xl font-black font-heading text-[#121212]">
                    {{ $collection->title }}
                </h1>
                <span class="text-xs font-semibold text-gray-400">
                    ({{ $products->total() }} {{ Str::plural('item', $products->total()) }})
                </span>
            </div>

            <!-- Right: Sort Dropdown -->
            <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                <label for="sort-select" class="text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap font-heading">
                    Sort by:
                </label>
                <form method="GET" action="{{ url()->current() }}" id="sort-form" class="m-0">
                    <div class="relative">
                        <select 
                            id="sort-select" 
                            name="sort_by" 
                            onchange="this.form.submit()"
                            class="px-4 py-2 pr-8 bg-[#FAF7F2] border border-[#EADBCC] text-xs sm:text-sm font-semibold text-[#121212] focus:outline-none focus:border-[#D38928] rounded-[10px] cursor-pointer shadow-2xs appearance-none"
                        >
                            <option value="featured" {{ $sortBy === 'featured' ? 'selected' : '' }}>Featured</option>
                            <option value="best_selling" {{ $sortBy === 'best_selling' ? 'selected' : '' }}>Best Selling</option>
                            <option value="price_low_high" {{ $sortBy === 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high_low" {{ $sortBy === 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="title_asc" {{ $sortBy === 'title_asc' ? 'selected' : '' }}>Alphabetically: A-Z</option>
                            <option value="title_desc" {{ $sortBy === 'title_desc' ? 'selected' : '' }}>Alphabetically: Z-A</option>
                            <option value="newest" {{ $sortBy === 'newest' ? 'selected' : '' }}>Newest</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-500">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <!-- Full-Width Clean Product Grid (4 Columns on Desktop, 2 Columns on Mobile) -->
        <div class="w-full">
            
            @if($products->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-7">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                <!-- Pagination Links -->
                <div class="mt-14 flex justify-center">
                    {{ $products->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-[24px] border border-[#EADBCC] p-12 sm:p-16 text-center space-y-4 shadow-xs">
                    <div class="w-16 h-16 mx-auto bg-[#FAF7F2] rounded-full flex items-center justify-center text-[#D38928] text-3xl">
                        🪔
                    </div>
                    <h3 class="text-xl font-bold font-heading text-[#121212]">No Sacred Items in this Category</h3>
                    <p class="text-xs sm:text-sm text-gray-500 max-w-sm mx-auto">
                        Please explore our complete range of pure bambooless incense and havan cups.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('collections.show', 'bambooless') }}" class="inline-block px-8 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                            Explore Bambooless
                        </a>
                    </div>
                </div>
            @endif

        </div>

        <!-- ========================================================================= -->
        <!-- BOTTOM EDITORIAL BRAND & COLLECTION NARRATIVE (Matching Screenshot)       -->
        <!-- ========================================================================= -->
        <div class="mt-16 sm:mt-24 pt-10 sm:pt-14 border-t border-[#EADBCC] max-w-4xl">
            
            <!-- Main Golden Serif Title -->
            <h2 class="text-xl sm:text-2xl lg:text-[26px] font-serif font-normal text-[#C87A1E] leading-snug mb-6">
                Buy {{ $collection->title }} – 100% Natural &amp; Low Smoke
            </h2>

            @if($collection->slug === 'havan-cups')
                <!-- 1. Pure Sambrani Cup -->
                <div class="space-y-2 mb-6">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Pure Sambrani Cup for Everyday Use
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        A Sambrani cup is a traditional incense made with sandalwood, herbs, cow dung and resins. When lit, it emits a soothing aroma that purifies your space and uplifts your mood.
                    </p>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Our low-smoke Sambrani cups are made with 100% natural ingredients available in three natural fragrances: <strong class="underline font-normal text-gray-900">Sandalwood Havan Cup</strong>, <strong class="underline font-normal text-gray-900">Guggal Havan Cup</strong> and <strong class="underline font-normal text-gray-900">Loban Havan Cup</strong>—safe for indoor use and perfect for daily rituals, meditation, and yoga.
                    </p>
                </div>

                <!-- 2. Easy-to-Use Dhoop Cup -->
                <div class="space-y-2 mb-6">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Easy-to-Use Dhoop Cup for Clean Burning
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        A dhoop cup is a mess-free incense solution. Pre-filled and easy to light, it offers consistent aroma and is ideal for homes and temples.
                    </p>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Made with herbal blends, our dhoop cups provide a pleasant scent without overwhelming smoke.
                    </p>
                </div>

                <!-- 3. Dhoop Sambrani -->
                <div class="space-y-2">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Dhoop Sambrani – Uplift Your Spiritual Routine
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Dhoop sambrani and sambrani dhoop are powerful purifiers, often used in pujas and spiritual ceremonies. They cleanse the environment and bring positive energy.
                    </p>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Each cup is handmade to ensure a rich, lasting fragrance—free from chemicals or synthetic scents.
                    </p>
                </div>

            @elseif($collection->slug === 'bambooless')
                <!-- Bambooless sticks narrative -->
                <div class="space-y-2 mb-6">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Sacred Bambooless Incense for Pure Puja
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        According to traditional Vedic Shastras, burning bamboo is considered inauspicious. Our Bamboo-less incense sticks are crafted strictly adhering to ancient rituals, preserving absolute purity.
                    </p>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Handcrafted with sacred temple flowers and enriched with botanical extracts like <strong class="underline font-normal text-gray-900">Chandan</strong>, <strong class="underline font-normal text-gray-900">Oudh</strong>, and <strong class="underline font-normal text-gray-900">Kesar Rose</strong> for long-lasting aroma.
                    </p>
                </div>

                <div class="space-y-2 mb-6">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        100% Charcoal-Free with Zero Harmful Chemicals
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Unlike conventional black incense sticks that release heavy soot and harmful toxins, our bambooless sticks emit clean, calming white smoke that is safe for children, elders, and indoor use.
                    </p>
                </div>

                <div class="space-y-2">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Elevate Daily Devotion &amp; Meditation
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Ideal for morning prayers, meditation, yoga, and creating an aura of serenity in your home or workspace throughout the day.
                    </p>
                </div>

            @elseif($collection->slug === 'dhoop-cones')
                <!-- Dhoop Cones narrative -->
                <div class="space-y-2 mb-6">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Natural Temple Flower Dhoop Cones
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Our Dhoop Cones are handcrafted by recycling sacred temple blossoms offered to deities, blended with natural herbs, essential oils, and therapeutic resins.
                    </p>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Designed with an optimized burning cone structure that produces a dense, purifying aroma without overpowering smoke.
                    </p>
                </div>

                <div class="space-y-2 mb-6">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Charcoal-Free &amp; Pure Ayurvedic Formulation
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Formulated without artificial petrochemical scents, synthetic dyes, or charcoal binders, ensuring clean air and uplifting wellness for your living spaces.
                    </p>
                </div>

                <div class="space-y-2">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Deep Relaxation &amp; Positive Energy
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Each cone burns steadily for 30–40 minutes, spreading a deep soothing aura that cleanses negativity and fills your environment with divine peace.
                    </p>
                </div>

            @else
                <!-- Default / All Collections narrative -->
                <div class="space-y-2 mb-6">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Pure Ayurvedic Formulations for Everyday Rituals
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        {{ $collection->description ?? 'Handcrafted with reverence in Vrindavan Dham using traditional Ayurvedic methods. Created exclusively for spiritual clarity, positive energy, and peace of mind.' }}
                    </p>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Made with 100% natural herbs, sacred temple flowers, and pure therapeutic resins, completely free from charcoal and toxic additives.
                    </p>
                </div>

                <div class="space-y-2 mb-6">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Clean &amp; Soot-Free Burning
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Experience gentle, purifying white smoke that carries the natural essence of Vedic botanicals without causing eye irritation or respiratory discomfort.
                    </p>
                </div>

                <div class="space-y-2">
                    <h3 class="text-[15px] sm:text-base font-serif font-medium text-[#1F1F1F]">
                        Handcrafted for Daily Puja, Yoga &amp; Meditation
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-700 leading-relaxed font-normal">
                        Perfect for creating a sanctified, tranquil atmosphere during your morning and evening rituals.
                    </p>
                </div>
            @endif

        </div>

    </div>
</div>
@endsection