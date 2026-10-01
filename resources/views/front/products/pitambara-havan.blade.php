@extends('layouts.app')

@section('title', 'Mangalam Pitambara Havan — Sacred Blend for Positivity & Spiritual Protection')
@section('meta_description', '100% Natural, Cow dung based Pitambara Havan with fresh mango wood sticks. Inspired by Maa Baglamukhi as your sacred shield against negativity.')

@push('styles')
<style>
    /* Golden Shimmer & Vedic Divine Glow Effects */
    .pitambara-gold-text {
        background: linear-gradient(135deg, #D38928 0%, #F5CE7A 35%, #B8741E 70%, #F6DAA8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .pitambara-gold-border {
        border-color: #D38928;
    }
    .pitambara-gold-bg {
        background: linear-gradient(135deg, #D38928 0%, #B8741E 100%);
    }
    .pitambara-halo {
        box-shadow: 0 0 35px rgba(211, 137, 40, 0.25);
    }
    .dark-temple-mesh {
        background-color: #0E0A07;
        background-image: radial-gradient(circle at 50% 0%, rgba(211, 137, 40, 0.18) 0%, transparent 70%),
                          radial-gradient(circle at 90% 90%, rgba(184, 116, 30, 0.12) 0%, transparent 60%);
    }
</style>
@endpush

@section('content')
@php
    $mrpPrice = $product->base_price > 0 ? $product->base_price : 499.00;
    $salePrice = $product->active_price > 0 ? $product->active_price : 299.00;
    $discountPercent = round((($mrpPrice - $salePrice) / $mrpPrice) * 100);
@endphp

<div class="bg-[#FCFAF7] min-h-screen font-body selection:bg-[#F6DAA8] selection:text-[#2B1810]">

    <!-- ========================================================================= -->
    <!-- 1. TOP BREADCRUMBS & DIVINE LAUNCH RIBBON                                  -->
    <!-- ========================================================================= -->
    <div class="bg-[#FAF5EE] border-b border-[#EEDBCA] py-3">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] flex flex-wrap items-center justify-between gap-3 text-xs">
            <nav class="flex items-center space-x-2 text-gray-500 font-medium">
                <a href="{{ route('home') }}" class="hover:text-[#D38928] transition-colors">Home</a>
                <span>/</span>
                <a href="{{ route('collections.show', 'havan-cups') }}" class="hover:text-[#D38928] transition-colors">Havan Cups</a>
                <span>/</span>
                <span class="text-[#1A1A1A] font-bold">Mangalam Pitambara Havan</span>
            </nav>

            <div class="flex items-center space-x-2 text-[11px] font-bold text-[#965A15] bg-[#FAF0DE] px-3 py-1 rounded-full border border-[#E8CBA3] font-heading">
                <span class="animate-pulse text-[#D38928]">✦</span>
                <span>SACRED LAUNCH • INSPIRED BY MAA BAGLAMUKHI</span>
                <span class="animate-pulse text-[#D38928]">✦</span>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 2. MAIN HERO SECTION & POSTER HEADER (Exact Match with Image)              -->
    <!-- ========================================================================= -->
    <section class="relative pt-8 pb-12 sm:pt-12 sm:pb-16 overflow-hidden">
        
        <!-- Background Ambient Aura -->
        <div class="absolute top-0 inset-x-0 h-96 bg-gradient-to-b from-[#F5EBDD]/60 via-[#FCFAF7] to-transparent pointer-events-none"></div>

        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-10 space-y-8">
            
            <!-- Poster Top Banner Typography -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center space-x-2 text-xs uppercase tracking-[0.25em] text-[#965A15] font-black font-heading bg-white px-4 py-1.5 rounded-full border border-[#E8CBA3] shadow-2xs">
                    <span>🕉️</span>
                    <span>MANGALAM PRESENTS</span>
                    <span>🕉️</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-normal text-[#1A1A1A] font-heading tracking-tight leading-[1.08]">
                    <span class="block text-[#1A1A1A]">Pitambara</span>
                    <span class="pitambara-gold-text text-3xl sm:text-4xl lg:text-5xl font-black tracking-[0.12em] uppercase mt-1 block">
                        H A V A N
                    </span>
                </h1>

                <p class="text-base sm:text-lg lg:text-xl text-[#5C4D42] font-normal leading-relaxed font-serif italic pt-1">
                    “A Sacred Blend for a Calmer, Lighter &amp; More Positive Life”
                </p>
            </div>

            <!-- 4 Signature Vedic Badges (Exact match with poster icons) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 max-w-4xl mx-auto">
                
                <!-- Badge 1: 100% Natural -->
                <div class="bg-white/90 backdrop-blur-xs p-3.5 sm:p-4 rounded-[16px] border border-[#EADBCC] shadow-2xs flex items-center space-x-3 group hover:border-[#D38928] transition-all">
                    <div class="w-10 h-10 rounded-full bg-[#FAF5EE] text-[#D38928] flex items-center justify-center shrink-0 border border-[#EADBCC] group-hover:bg-[#D38928] group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C8 18.5 11 16 12 12c1 4 4 6.5 5.4 8.4C20.2 18.6 22 15.5 22 12c0-5.5-4.5-10-10-10z"/><path d="M12 2v20"/></svg>
                    </div>
                    <div>
                        <span class="text-xs sm:text-sm font-black text-[#1A1A1A] font-heading block leading-tight">100% NATURAL</span>
                        <span class="text-[10px] text-gray-500 font-medium">Pure botanical herbs</span>
                    </div>
                </div>

                <!-- Badge 2: Cow Dung Based -->
                <div class="bg-white/90 backdrop-blur-xs p-3.5 sm:p-4 rounded-[16px] border border-[#EADBCC] shadow-2xs flex items-center space-x-3 group hover:border-[#D38928] transition-all">
                    <div class="w-10 h-10 rounded-full bg-[#FAF5EE] text-[#D38928] flex items-center justify-center shrink-0 border border-[#EADBCC] group-hover:bg-[#D38928] group-hover:text-white transition-colors text-lg">
                        🐄
                    </div>
                    <div>
                        <span class="text-xs sm:text-sm font-black text-[#1A1A1A] font-heading block leading-tight">COW DUNG BASED</span>
                        <span class="text-[10px] text-gray-500 font-medium">Desi Gomaya cups</span>
                    </div>
                </div>

                <!-- Badge 3: Fresh Mango Wood Sticks -->
                <div class="bg-white/90 backdrop-blur-xs p-3.5 sm:p-4 rounded-[16px] border border-[#EADBCC] shadow-2xs flex items-center space-x-3 group hover:border-[#D38928] transition-all">
                    <div class="w-10 h-10 rounded-full bg-[#FAF5EE] text-[#D38928] flex items-center justify-center shrink-0 border border-[#EADBCC] group-hover:bg-[#D38928] group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <span class="text-xs sm:text-sm font-black text-[#1A1A1A] font-heading block leading-tight">MANGO WOOD</span>
                        <span class="text-[10px] text-gray-500 font-medium">Fresh Aam samidha</span>
                    </div>
                </div>

                <!-- Badge 4: Inspired by Maa Baglamukhi -->
                <div class="bg-white/90 backdrop-blur-xs p-3.5 sm:p-4 rounded-[16px] border border-[#EADBCC] shadow-2xs flex items-center space-x-3 group hover:border-[#D38928] transition-all">
                    <div class="w-10 h-10 rounded-full bg-[#FAF5EE] text-[#D38928] flex items-center justify-center shrink-0 border border-[#EADBCC] group-hover:bg-[#D38928] group-hover:text-white transition-colors text-lg">
                        🪷
                    </div>
                    <div>
                        <span class="text-xs sm:text-sm font-black text-[#1A1A1A] font-heading block leading-tight">MAA BAGLAMUKHI</span>
                        <span class="text-[10px] text-gray-500 font-medium">Devi Pitambara Blessings</span>
                    </div>
                </div>

            </div>

            <!-- Two-Column Product Experience Grid (Left: Visual Showcase | Right: Fast Checkout & Buy Panel) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start pt-4">
                
                <!-- Left Column: Sacred Gallery & Visuals (7 Cols) -->
                <div class="lg:col-span-7 space-y-5">
                    
                    <!-- Main Featured Visual Box (Altar View) -->
                    <div class="relative aspect-[4/3] rounded-[24px] overflow-hidden bg-[#FAF5EE] border border-[#EADBCC] shadow-md group">
                        <img 
                            id="pitambara-hero-image"
                            src="{{ asset('assets/images/pitambara/hero-altar.jpg') }}" 
                            alt="Mangalam Pitambara Havan Altar" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        >

                        <!-- Discount Pill Top-Left -->
                        <div class="absolute top-4 left-4 z-10">
                            <span class="px-3.5 py-1.5 rounded-[8px] bg-[#8B1E1E] text-white text-xs font-black font-heading shadow-md tracking-wide">
                                SAVE {{ $discountPercent }}% OFF
                            </span>
                        </div>

                        <!-- Divine Blessing Tag Top-Right -->
                        <div class="absolute top-4 right-4 z-10">
                            <span class="px-3 py-1.5 rounded-full bg-black/60 backdrop-blur-xs text-[#F6DAA8] text-[11px] font-bold border border-white/20 shadow-md">
                                ✨ 100% Bamboo-Free
                            </span>
                        </div>

                        <!-- Free Stand Highlight Bottom Banner -->
                        <div class="absolute bottom-4 inset-x-4 bg-black/75 backdrop-blur-md p-3 rounded-[14px] text-center text-white border border-white/10 shadow-lg flex items-center justify-between text-xs">
                            <div class="flex items-center space-x-2 text-left">
                                <span class="text-xl">🎁</span>
                                <div>
                                    <strong class="font-bold text-[#F6DAA8] block font-heading">FREE ARTISANAL TERRACOTTA STAND</strong>
                                    <span class="text-[11px] text-white/80">Worth ₹150/- included free with every pack</span>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 rounded bg-[#D38928] text-white font-black text-[10px] uppercase font-mono">
                                Included
                            </span>
                        </div>
                    </div>

                    <!-- 4 Interactive Thumbnail Previews -->
                    <div class="grid grid-cols-4 gap-3">
                        <button 
                            type="button" 
                            onclick="changePitambaraImg('{{ asset('assets/images/pitambara/hero-altar.jpg') }}')"
                            class="aspect-square rounded-[14px] overflow-hidden border-2 border-[#D38928] p-0.5 bg-white shadow-2xs hover:opacity-100 transition-all cursor-pointer"
                        >
                            <img src="{{ asset('assets/images/pitambara/hero-altar.jpg') }}" alt="Hero Altar" class="w-full h-full object-cover rounded-[10px]">
                        </button>
                        <button 
                            type="button" 
                            onclick="changePitambaraImg('{{ asset('assets/images/pitambara/step4-light.jpg') }}')"
                            class="aspect-square rounded-[14px] overflow-hidden border-2 border-transparent hover:border-[#D38928] p-0.5 bg-white shadow-2xs opacity-80 hover:opacity-100 transition-all cursor-pointer"
                        >
                            <img src="{{ asset('assets/images/pitambara/step4-light.jpg') }}" alt="Burning Havan Smoke" class="w-full h-full object-cover rounded-[10px]">
                        </button>
                        <button 
                            type="button" 
                            onclick="changePitambaraImg('{{ asset('assets/images/pitambara/step2-blend.jpg') }}')"
                            class="aspect-square rounded-[14px] overflow-hidden border-2 border-transparent hover:border-[#D38928] p-0.5 bg-white shadow-2xs opacity-80 hover:opacity-100 transition-all cursor-pointer"
                        >
                            <img src="{{ asset('assets/images/pitambara/step2-blend.jpg') }}" alt="Sacred Herbs Samagri" class="w-full h-full object-cover rounded-[10px]">
                        </button>
                        <button 
                            type="button" 
                            onclick="changePitambaraImg('{{ asset('assets/images/pitambara/devotee-praying.jpg') }}')"
                            class="aspect-square rounded-[14px] overflow-hidden border-2 border-transparent hover:border-[#D38928] p-0.5 bg-white shadow-2xs opacity-80 hover:opacity-100 transition-all cursor-pointer"
                        >
                            <img src="{{ asset('assets/images/pitambara/devotee-praying.jpg') }}" alt="Devotee in Prayer" class="w-full h-full object-cover rounded-[10px]">
                        </button>
                    </div>

                </div>

                <!-- Right Column: Interactive Purchase & Checkout Card (5 Cols) -->
                <div class="lg:col-span-5 bg-white rounded-[24px] border border-[#EADBCC] p-6 sm:p-8 shadow-sm space-y-6">
                    
                    <!-- Top Rating & Batch Info -->
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                        <div class="flex items-center space-x-1.5 text-amber-500 text-sm">
                            <span>★★★★★</span>
                            <span class="text-xs font-bold text-gray-800 font-heading">5.0 (219+ Devotees)</span>
                        </div>
                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                            ✓ Ready to Dispatch
                        </span>
                    </div>

                    <!-- Title & Slogan -->
                    <div class="space-y-1">
                        <h2 class="text-2xl sm:text-3xl font-black font-heading text-[#1A1A1A] tracking-tight">
                            Mangalam Pitambara Havan
                        </h2>
                        <p class="text-xs sm:text-sm text-[#8C6D46] font-medium font-serif italic">
                            पीताम्बरा हवन — नकारात्मक ऊर्जा नाशक एवं सुख-शांति दायक
                        </p>
                    </div>

                    <!-- Price Block -->
                    <div class="p-4 bg-[#FAF7F2] rounded-[16px] border border-[#EADBCC] space-y-2">
                        <div class="flex items-baseline space-x-3">
                            <span class="text-2xl sm:text-3xl font-black font-heading text-[#C87A1E]" id="pitambara-price-display">
                                ₹{{ number_format($salePrice, 2) }}
                            </span>
                            <span class="text-base text-gray-400 line-through font-mono">
                                ₹{{ number_format($mrpPrice, 2) }}
                            </span>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#8B1E1E] text-white">
                                Save ₹{{ number_format($mrpPrice - $salePrice, 2) }}
                            </span>
                        </div>
                        <div class="text-[11px] text-gray-500 flex items-center justify-between">
                            <span>Inclusive of all taxes</span>
                            <span class="text-emerald-700 font-bold">✨ Free Delivery on ₹499+</span>
                        </div>
                    </div>

                    <!-- Select Pack Size (Variants) -->
                    <div class="space-y-2.5">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                            Select Pack Size:
                        </label>
                        <div class="grid grid-cols-1 gap-2.5" id="variant-selector-group">
                            
                            <!-- Variant 1 -->
                            <label class="relative flex items-center justify-between p-3.5 rounded-[12px] border-2 border-[#D38928] bg-[#FFFDF9] cursor-pointer shadow-2xs">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" name="pitambara_variant" value="299" checked data-sku="MNG-PIT-12" data-title="Pack of 12 Sacred Cups" onchange="updateVariant(299, 499, 'Pack of 12 Sacred Cups')" class="text-[#D38928] focus:ring-[#D38928]">
                                    <div>
                                        <strong class="text-xs sm:text-sm font-bold text-gray-900 block font-heading">Pack of 12 Sacred Cups</strong>
                                        <span class="text-[11px] text-gray-500">Includes 1 Free Terracotta Stand</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-sm font-black font-heading text-[#1A1A1A]">₹299</span>
                                    <span class="text-[10px] text-gray-400 block line-through">₹499</span>
                                </div>
                            </label>

                            <!-- Variant 2 -->
                            <label class="relative flex items-center justify-between p-3.5 rounded-[12px] border border-gray-200 hover:border-[#D38928] bg-white cursor-pointer transition-all">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" name="pitambara_variant" value="549" data-sku="MNG-PIT-24" data-title="Pack of 24 Cups (Save Extra ₹50)" onchange="updateVariant(549, 999, 'Pack of 24 Cups')" class="text-[#D38928] focus:ring-[#D38928]">
                                    <div>
                                        <strong class="text-xs sm:text-sm font-bold text-gray-900 block font-heading">Pack of 24 Cups</strong>
                                        <span class="text-[11px] text-emerald-700 font-semibold">Save Extra ₹50 + Free Stand</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-sm font-black font-heading text-[#1A1A1A]">₹549</span>
                                    <span class="text-[10px] text-gray-400 block line-through">₹999</span>
                                </div>
                            </label>

                            <!-- Variant 3 -->
                            <label class="relative flex items-center justify-between p-3.5 rounded-[12px] border border-gray-200 hover:border-[#D38928] bg-white cursor-pointer transition-all">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" name="pitambara_variant" value="799" data-sku="MNG-PIT-36" data-title="Family Mandir Pack (36 Cups + Brass Stand)" onchange="updateVariant(799, 1499, 'Family Mandir Pack (36 Cups)')" class="text-[#D38928] focus:ring-[#D38928]">
                                    <div>
                                        <strong class="text-xs sm:text-sm font-bold text-gray-900 block font-heading">Family Mandir Pack (36 Cups)</strong>
                                        <span class="text-[11px] text-[#D38928] font-bold">Includes Brass Stand + Free Delivery</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-sm font-black font-heading text-[#1A1A1A]">₹799</span>
                                    <span class="text-[10px] text-gray-400 block line-through">₹1499</span>
                                </div>
                            </label>

                        </div>
                    </div>

                    <!-- Quantity Stepper & Cart Actions -->
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center space-x-3">
                            <!-- Stepper -->
                            <div class="flex items-center justify-between border border-gray-300 rounded-[10px] bg-white px-3 py-2.5 w-28 shrink-0">
                                <button type="button" onclick="adjustQty(-1)" class="text-gray-600 hover:text-[#1A1A1A] font-bold text-lg leading-none cursor-pointer">−</button>
                                <input type="number" id="pitambara-qty" value="1" min="1" max="50" class="w-10 text-center text-sm font-bold border-none focus:ring-0 p-0 text-[#1A1A1A]" readonly>
                                <button type="button" onclick="adjustQty(1)" class="text-gray-600 hover:text-[#1A1A1A] font-bold text-lg leading-none cursor-pointer">+</button>
                            </div>

                            <!-- Add to Cart CTA -->
                            <button 
                                type="button" 
                                id="pitambara-add-to-cart"
                                onclick="addPitambaraToCart()"
                                class="flex-1 py-3 px-6 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-sm sm:text-base font-bold rounded-[10px] shadow-xs hover:shadow-md transition-all text-center flex items-center justify-center space-x-2 font-heading cursor-pointer"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                <span>Add to Cart</span>
                            </button>
                        </div>

                        <!-- 1-Click GoKwik Express Checkout Button -->
                        <button 
                            type="button" 
                            onclick="triggerPitambaraGoKwik()"
                            class="w-full py-3.5 px-6 rounded-[10px] bg-[#118A44] hover:bg-[#0E7037] text-white font-bold text-sm sm:text-base shadow-md hover:shadow-lg transition-all flex items-center justify-center space-x-2.5 cursor-pointer font-heading"
                        >
                            <span class="bg-white/20 px-2 py-0.5 rounded text-[11px] font-mono tracking-wider">⚡ 1-CLICK</span>
                            <span>BUY NOW — FAST GOKWIK CHECKOUT</span>
                            <span class="text-xs text-emerald-200">➔</span>
                        </button>
                    </div>

                    <!-- Live Scarcity & Dispatch Guarantee -->
                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-500">
                        <span class="flex items-center space-x-1.5 text-amber-700 font-bold">
                            <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                            <span>Only 24 boxes left from today's batch</span>
                        </span>
                        <span>🚚 Dispatches in 24 Hrs</span>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 3. "THE SACRED PROCESS — PURITY IN EVERY STEP" (Exact match with poster)     -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-20 bg-[#FAF7F2] border-y border-[#EEDBCA] relative">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] space-y-12">
            
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <div class="flex items-center justify-center space-x-3">
                    <span class="h-px w-12 bg-[#D38928]/40"></span>
                    <span class="text-[11px] font-black uppercase tracking-[0.25em] text-[#965A15] font-heading">
                        THE SACRED PROCESS
                    </span>
                    <span class="h-px w-12 bg-[#D38928]/40"></span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    Purity in Every Step
                </h2>

                <p class="text-sm sm:text-base text-gray-600 font-serif italic">
                    Handcrafted with devotion using time-honoured Vedic traditions.
                </p>
            </div>

            <!-- 4 Step Cards in Sequence -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-6 relative">
                
                <!-- STEP 1: Prepare with Care -->
                <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 shadow-sm space-y-4 hover:border-[#D38928] hover:shadow-md transition-all flex flex-col justify-between group">
                    <div class="space-y-4">
                        <!-- Step Image with Badge -->
                        <div class="relative aspect-square rounded-[14px] overflow-hidden bg-[#FAF5EE]">
                            <img src="{{ asset('assets/images/pitambara/step1-prepare.jpg') }}" alt="Prepare with Care" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 w-8 h-8 rounded-full bg-[#D38928] text-white font-black text-xs flex items-center justify-center font-heading shadow-md ring-2 ring-white">
                                1
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base font-black font-heading text-[#1A1A1A] uppercase tracking-wide">
                                Prepare with Care
                            </h3>
                            <p class="text-xs text-gray-600 leading-relaxed font-sans">
                                We collect and purify natural cow dung and shape it into sacred havan cups, sun-dried for purity.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-[#965A15] font-bold font-heading">
                        <span>Purity Step 1</span>
                        <span>100% Desi Gomaya</span>
                    </div>
                </div>

                <!-- STEP 2: Add the Sacred Blend -->
                <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 shadow-sm space-y-4 hover:border-[#D38928] hover:shadow-md transition-all flex flex-col justify-between group">
                    <div class="space-y-4">
                        <!-- Step Image with Badge -->
                        <div class="relative aspect-square rounded-[14px] overflow-hidden bg-[#FAF5EE]">
                            <img src="{{ asset('assets/images/pitambara/step2-blend.jpg') }}" alt="Add the Sacred Blend" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 w-8 h-8 rounded-full bg-[#D38928] text-white font-black text-xs flex items-center justify-center font-heading shadow-md ring-2 ring-white">
                                2
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base font-black font-heading text-[#1A1A1A] uppercase tracking-wide">
                                Add the Sacred Blend
                            </h3>
                            <p class="text-xs text-gray-600 leading-relaxed font-sans">
                                Our special havan blend with traditional herbs and Maa Baglamukhi's essence is carefully added.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-[#965A15] font-bold font-heading">
                        <span>Purity Step 2</span>
                        <span>16 Vedic Herbs</span>
                    </div>
                </div>

                <!-- STEP 3: Infuse with Mango Wood -->
                <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 shadow-sm space-y-4 hover:border-[#D38928] hover:shadow-md transition-all flex flex-col justify-between group">
                    <div class="space-y-4">
                        <!-- Step Image with Badge -->
                        <div class="relative aspect-square rounded-[14px] overflow-hidden bg-[#FAF5EE]">
                            <img src="{{ asset('assets/images/pitambara/step3-mangowood.jpg') }}" alt="Infuse with Mango Wood" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 w-8 h-8 rounded-full bg-[#D38928] text-white font-black text-xs flex items-center justify-center font-heading shadow-md ring-2 ring-white">
                                3
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base font-black font-heading text-[#1A1A1A] uppercase tracking-wide">
                                Infuse with Mango Wood
                            </h3>
                            <p class="text-xs text-gray-600 leading-relaxed font-sans">
                                We use fresh, naturally sourced mango wood sticks for a clean and long-lasting fragrance.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-[#965A15] font-bold font-heading">
                        <span>Purity Step 3</span>
                        <span>Aam ki Samidha</span>
                    </div>
                </div>

                <!-- STEP 4: Light, Blow & Release -->
                <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 shadow-sm space-y-4 hover:border-[#D38928] hover:shadow-md transition-all flex flex-col justify-between group">
                    <div class="space-y-4">
                        <!-- Step Image with Badge -->
                        <div class="relative aspect-square rounded-[14px] overflow-hidden bg-[#FAF5EE]">
                            <img src="{{ asset('assets/images/pitambara/step4-light.jpg') }}" alt="Light, Blow & Release" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 w-8 h-8 rounded-full bg-[#D38928] text-white font-black text-xs flex items-center justify-center font-heading shadow-md ring-2 ring-white">
                                4
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base font-black font-heading text-[#1A1A1A] uppercase tracking-wide">
                                Light, Blow &amp; Release
                            </h3>
                            <p class="text-xs text-gray-600 leading-relaxed font-sans">
                                Light the stick, blow gently and let the sacred smoke remove negativity and bring peace &amp; positivity into your space.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-emerald-700 font-bold font-heading">
                        <span>Purity Step 4</span>
                        <span>Negative Energy Shield</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 4. "YOUR SHIELD AGAINST NEGATIVITY" (Bottom Dark Luxury Showcase)          -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 dark-temple-mesh text-white relative overflow-hidden">
        
        <!-- Sacred ambient particles -->
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-10">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left: 4 Spiritual Pillars & Headline (7 Cols) -->
                <div class="lg:col-span-7 space-y-8">
                    
                    <div class="space-y-3">
                        <div class="inline-flex items-center space-x-2 text-xs uppercase tracking-[0.25em] text-[#F5CE7A] font-bold font-heading bg-white/10 px-4 py-1.5 rounded-full border border-white/15">
                            <span>🛡️</span>
                            <span>DIVINE ENERGETIC PROTECTION</span>
                        </div>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight text-white">
                            <span class="pitambara-gold-text block">PITAMBARA HAVAN</span>
                            <span class="text-xl sm:text-2xl lg:text-3xl font-normal text-white/90 block mt-1">
                                YOUR SHIELD AGAINST NEGATIVITY
                            </span>
                        </h2>

                        <p class="text-sm sm:text-base text-white/70 font-serif italic max-w-xl">
                            When pure cow dung, consecrated mango wood samidha, and Vedic resins burn, they generate powerful sacred frequencies that neutralize evil vibrations and restore harmony.
                        </p>
                    </div>

                    <!-- 4 Benefits Grid (Exact match with poster icons) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <!-- 1. Spiritual Protection -->
                        <div class="p-4 rounded-[16px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-2 hover:bg-white/10 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-lg border border-[#D38928]/40">
                                🪷
                            </div>
                            <h4 class="text-sm font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                                SPIRITUAL PROTECTION
                            </h4>
                            <p class="text-xs text-white/80 leading-relaxed">
                                Consecrated with Maa Baglamukhi's essence to shield your sanctuary from buri nazar and unseen obstacles.
                            </p>
                        </div>

                        <!-- 2. Positivity at Home -->
                        <div class="p-4 rounded-[16px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-2 hover:bg-white/10 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-lg border border-[#D38928]/40">
                                ☀️
                            </div>
                            <h4 class="text-sm font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                                POSITIVITY AT HOME
                            </h4>
                            <p class="text-xs text-white/80 leading-relaxed">
                                Dissolves stagnant domestic stress, heavy energy, and harmonizes family conversations with warm bliss.
                            </p>
                        </div>

                        <!-- 3. Calm Mind -->
                        <div class="p-4 rounded-[16px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-2 hover:bg-white/10 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-lg border border-[#D38928]/40">
                                🧘
                            </div>
                            <h4 class="text-sm font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                                CALM MIND
                            </h4>
                            <p class="text-xs text-white/80 leading-relaxed">
                                Natural Jatamansi, Guggal, and Camphor aromatics soothe the nervous system for deep stress-free sleep and dhyana.
                            </p>
                        </div>

                        <!-- 4. Divine Atmosphere -->
                        <div class="p-4 rounded-[16px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-2 hover:bg-white/10 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-lg border border-[#D38928]/40">
                                🏛️
                            </div>
                            <h4 class="text-sm font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                                DIVINE ATMOSPHERE
                            </h4>
                            <p class="text-xs text-white/80 leading-relaxed">
                                Creates an authentic temple aura in your puja room that lingers richly for 4+ hours after lighting.
                            </p>
                        </div>

                    </div>

                </div>

                <!-- Right: Devotee & Altar Visual Showcase Card (5 Cols) -->
                <div class="lg:col-span-5 space-y-6">
                    
                    <div class="relative rounded-[24px] overflow-hidden border-2 border-[#D38928]/50 shadow-2xl bg-black/60 group">
                        <img 
                            src="{{ asset('assets/images/pitambara/bottom-shield-banner.jpg') }}" 
                            alt="Devotee with Pitambara Havan" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/30"></div>

                        <!-- Card Floating CTA Overlay -->
                        <div class="absolute bottom-6 inset-x-6 space-y-3">
                            <div class="flex items-baseline justify-between text-white">
                                <div>
                                    <span class="text-xs uppercase tracking-widest text-[#F5CE7A] font-heading font-bold block">LAUNCH OFFER</span>
                                    <span class="text-2xl font-black font-heading">₹299 <span class="text-xs text-white/60 line-through">₹499</span></span>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-emerald-500 text-white font-bold text-xs">
                                    40% OFF
                                </span>
                            </div>

                            <button 
                                type="button" 
                                onclick="triggerPitambaraGoKwik()"
                                class="w-full py-3 px-6 rounded-[12px] bg-[#D38928] hover:bg-[#B8741E] text-white font-bold text-sm shadow-xl transition-all flex items-center justify-center space-x-2 font-heading cursor-pointer"
                            >
                                <span>ORDER PITAMBARA HAVAN NOW</span>
                                <span>➔</span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 5. WHAT GOES INSIDE — VEDIC INGREDIENTS BREAKDOWN                          -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-20 bg-white border-b border-[#EADBCC]">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-[11px] font-black uppercase tracking-[0.25em] text-[#D38928] font-heading">✦ 100% SCRIPTURAL INGREDIENTS ✦</span>
                <h2 class="text-3xl sm:text-4xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    What Goes Inside Pitambara Havan
                </h2>
                <p class="text-sm text-gray-500 font-serif italic">
                    Pure, non-toxic, and natural elements blended by hereditary Vedic artisans.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 text-center">
                
                <div class="p-5 rounded-[16px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🐄</div>
                    <h4 class="text-xs font-bold text-[#1A1A1A] font-heading">Desi Gir Cow Dung</h4>
                    <p class="text-[11px] text-gray-500">Purifies atmosphere</p>
                </div>

                <div class="p-5 rounded-[16px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🪵</div>
                    <h4 class="text-xs font-bold text-[#1A1A1A] font-heading">Mango Wood Samidha</h4>
                    <p class="text-[11px] text-gray-500">Clean fragrant smoke</p>
                </div>

                <div class="p-5 rounded-[16px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🧈</div>
                    <h4 class="text-xs font-bold text-[#1A1A1A] font-heading">Pure Desi Ghee</h4>
                    <p class="text-[11px] text-gray-500">Sattvic oblations</p>
                </div>

                <div class="p-5 rounded-[16px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🌿</div>
                    <h4 class="text-xs font-bold text-[#1A1A1A] font-heading">Bhimseni Camphor</h4>
                    <p class="text-[11px] text-gray-500">Kills negative bacteria</p>
                </div>

                <div class="p-5 rounded-[16px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🪔</div>
                    <h4 class="text-xs font-bold text-[#1A1A1A] font-heading">Guggal &amp; Loban</h4>
                    <p class="text-[11px] text-gray-500">Ancient temple resins</p>
                </div>

                <div class="p-5 rounded-[16px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🌱</div>
                    <h4 class="text-xs font-bold text-[#1A1A1A] font-heading">Jatamansi Roots</h4>
                    <p class="text-[11px] text-gray-500">Mental calm &amp; focus</p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 6. FREQUENTLY ASKED QUESTIONS (Accordion)                                 -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-20 bg-[#FAF7F2]">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 space-y-8">
            
            <div class="text-center space-y-2">
                <span class="text-[11px] font-black uppercase tracking-[0.25em] text-[#D38928] font-heading">✦ CLARIFICATIONS ✦</span>
                <h2 class="text-2xl sm:text-3xl font-black text-[#1A1A1A] font-heading tracking-tight">
                    Frequently Asked Questions on Pitambara Havan
                </h2>
            </div>

            <div class="bg-white rounded-[20px] border border-[#EADBCC] divide-y divide-[#EADBCC] shadow-xs overflow-hidden">
                
                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>When should I light Mangalam Pitambara Havan in my home?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        You can light Pitambara Havan every morning during your daily puja or in the evening during Sandhya Aarti (sunset). It is especially powerful on Tuesdays, Saturdays, Amavasya, Purnima, and during Navratri for total household cleansing.
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>How does Pitambara Havan remove negativity and evil eye (buri nazar)?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        Maa Baglamukhi is the eighth Mahavidya, representing supreme victory over negative energies and mental distress. When the combination of cow dung, pure camphor, and consecrated herbs burns, its smoke carries heavy alkaline ions that neutralize negative energetic clutter and purify indoor air.
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>How long does one cup burn and how long does the aroma last?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        Each Pitambara Havan cup burns steadily for 30 to 35 minutes. Because we use concentrated natural resins and pure desi ghee, the soothing sacred temple fragrance continues to linger in your home for over 4 to 6 hours.
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>Do I need a separate havan kund or holder?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        No! Every pack includes a complimentary handcrafted artisanal terracotta/ceramic stand (worth ₹150/-) so you can immediately and safely place the cup anywhere in your mandir or living room.
                    </div>
                </div>

            </div>

        </div>
    </section>

</div>

@push('scripts')
<script>
    let selectedPrice = {{ $salePrice }};
    let selectedMrp = {{ $mrpPrice }};
    let selectedTitle = 'Pack of 12 Sacred Cups';
    let currentQty = 1;

    function changePitambaraImg(src) {
        const hero = document.getElementById('pitambara-hero-image');
        if (hero) {
            hero.style.opacity = '0.3';
            setTimeout(() => {
                hero.src = src;
                hero.style.opacity = '1';
            }, 150);
        }
    }

    function updateVariant(price, mrp, title) {
        selectedPrice = price;
        selectedMrp = mrp;
        selectedTitle = title;
        document.getElementById('pitambara-price-display').textContent = '₹' + price.toFixed(2);
    }

    function adjustQty(delta) {
        const input = document.getElementById('pitambara-qty');
        let val = parseInt(input.value) || 1;
        val = Math.max(1, Math.min(50, val + delta));
        input.value = val;
        currentQty = val;
    }

    function addPitambaraToCart() {
        const item = {
            id: {{ $product->id }},
            title: "{{ $product->title }} (" + selectedTitle + ")",
            slug: "{{ $product->slug }}",
            price: selectedPrice,
            image: "{{ asset('assets/images/pitambara/hero-altar.jpg') }}",
            quantity: currentQty
        };

        if (window.CartStore) {
            window.CartStore.addItem(item);
        } else {
            alert('Added ' + currentQty + ' × ' + item.title + ' to your sacred cart!');
        }
    }

    function triggerPitambaraGoKwik() {
        const directItem = {
            id: {{ $product->id }},
            title: "{{ $product->title }} (" + selectedTitle + ")",
            slug: "{{ $product->slug }}",
            price: selectedPrice,
            image: "{{ asset('assets/images/pitambara/hero-altar.jpg') }}",
            quantity: currentQty
        };

        if (window.CartStore) {
            window.CartStore.addItem(directItem);
        }

        if (typeof window.openGoKwikCheckout === 'function') {
            window.openGoKwikCheckout();
        } else {
            window.location.href = "{{ route('cart.index') }}";
        }
    }

    // FAQ Accordion Interaction
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.faq-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const answer = btn.nextElementSibling;
                const icon = btn.querySelector('.faq-icon');
                const isHidden = answer.classList.contains('hidden');
                
                document.querySelectorAll('.faq-answer').forEach(a => a.classList.add('hidden'));
                document.querySelectorAll('.faq-icon').forEach(i => i.textContent = '+');
                
                if (isHidden) {
                    answer.classList.remove('hidden');
                    icon.textContent = '−';
                }
            });
        });
    });
</script>
@endpush

@endsection
