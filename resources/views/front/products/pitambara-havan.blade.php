@extends('layouts.app')

@section('title', 'Mangalam Pitambara Havan — Sacred Blend for a Calmer, Lighter & More Positive Life')
@section('meta_description', '100% Natural, Cow Dung based Pitambara Havan with fresh mango wood sticks. Inspired by Maa Baglamukhi as your sacred shield against negativity. VIP Pre-Booking Open.')

@push('styles')
<style>
    .font-cinzel {
        font-family: 'Cinzel', 'Libre Baskerville', serif;
    }
    .pitambara-gold-gradient {
        background: linear-gradient(135deg, #FAD961 0%, #F7C04A 25%, #FFF6CC 45%, #E5A93C 70%, #C47A1B 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .pitambara-hero-bg {
        background-color: #0E0906;
        background-image: 
            radial-gradient(ellipse at 50% 30%, rgba(211, 137, 40, 0.28) 0%, transparent 65%),
            linear-gradient(180deg, rgba(14, 9, 6, 0.75) 0%, rgba(14, 9, 6, 0.40) 40%, rgba(14, 9, 6, 0.95) 100%),
            url("{{ asset('assets/images/pitambara/hero-full-banner.jpg') }}");
        background-size: cover;
        background-position: center top;
        background-repeat: no-repeat;
    }
    .pitambara-dark-bg {
        background-color: #0C0805;
        background-image: 
            radial-gradient(circle at 50% 0%, rgba(211, 137, 40, 0.22) 0%, transparent 70%),
            radial-gradient(circle at 100% 100%, rgba(184, 116, 30, 0.15) 0%, transparent 60%);
    }
    .gold-box-border {
        border: 1px solid rgba(211, 137, 40, 0.35);
    }
    .gold-glow {
        box-shadow: 0 0 45px rgba(211, 137, 40, 0.32);
    }
    .gold-card-hover {
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .gold-card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(211, 137, 40, 0.18);
        border-color: #D38928;
    }
</style>
@endpush

@section('content')
<div class="bg-[#FCFAF7] min-h-screen font-body selection:bg-[#F6DAA8] selection:text-[#2B1810]">

    <!-- ========================================================================= -->
    <!-- 1. FULL-WIDTH ULTRA-PREMIUM HERO BANNER (Edge-to-Edge with Overlay Text)   -->
    <!-- ========================================================================= -->
    <section class="relative w-full pitambara-hero-bg text-white overflow-hidden pt-12 pb-20 sm:pt-20 sm:pb-28 border-b border-[#D38928]/30">
        
        <!-- Subtle Ambient Floating Gold Sparks Glow -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,rgba(211,137,40,0.35),transparent_70%)] pointer-events-none"></div>

        <!-- Breadcrumb / Consecration Bar within Hero -->
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-20 mb-8 sm:mb-12">
            <div class="flex flex-wrap items-center justify-between gap-3 text-xs">
                <nav class="flex items-center space-x-2 text-white/70 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-[#FAD961] transition-colors">Home</a>
                    <span>/</span>
                    <span class="text-[#FAD961] font-semibold">Mangalam Pitambara Havan</span>
                </nav>

                <div class="inline-flex items-center space-x-2 text-[11px] font-bold text-[#FAD961] bg-black/50 backdrop-blur-md px-4 py-1.5 rounded-full border border-[#D38928]/40 font-heading">
                    <span class="animate-pulse text-[#FAD961]">✦</span>
                    <span class="tracking-widest uppercase">CONSECRATED VEDIC EDITION • PRE-BOOKING ACTIVE</span>
                    <span class="animate-pulse text-[#FAD961]">✦</span>
                </div>
            </div>
        </div>

        <!-- Flash message for Pre-booking -->
        @if(session('prebooking_success'))
            <div class="max-w-4xl mx-auto px-4 mb-8 relative z-30">
                <div class="p-4 rounded-[16px] bg-emerald-950/90 border border-emerald-400 text-emerald-100 shadow-xl backdrop-blur-md flex items-center space-x-3">
                    <span class="text-2xl">🙏</span>
                    <div class="text-xs sm:text-sm font-semibold leading-relaxed">
                        {{ session('prebooking_success') }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Banner Centerpiece Content -->
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-20 space-y-10 sm:space-y-14">
            
            <div class="text-center max-w-4xl mx-auto space-y-5">
                
                <!-- Sacred Vedic Shloka Header Pill -->
                <div class="inline-flex items-center space-x-2.5 text-xs sm:text-sm uppercase tracking-[0.25em] text-[#FAD961] font-black font-heading bg-black/60 backdrop-blur-md px-6 py-2 rounded-full border border-[#D38928]/50 shadow-lg">
                    <span>🕉️</span>
                    <span>॥ ॐ ह्लीं बगलामुखी नमः ॥</span>
                    <span>🕉️</span>
                </div>

                <!-- Brand Title -->
                <div class="space-y-2 pt-1">
                    <p class="text-xs sm:text-sm uppercase tracking-[0.35em] text-[#F5CE7A] font-bold font-heading">
                        MANGALAM PRESENTS
                    </p>
                    
                    <h1 class="text-5xl sm:text-7xl lg:text-8xl font-normal text-white font-heading tracking-tight leading-[1.02] drop-shadow-2xl">
                        <span class="block">Pitambara</span>
                        <span class="pitambara-gold-gradient text-3xl sm:text-5xl lg:text-6xl font-black tracking-[0.22em] uppercase block mt-2 font-cinzel">
                            H A V A N
                        </span>
                    </h1>
                </div>

                <!-- Poster Tagline -->
                <p class="text-lg sm:text-2xl lg:text-3xl text-amber-100/90 font-serif italic max-w-3xl mx-auto leading-relaxed drop-shadow-md">
                    “A Sacred Blend for a Calmer, Lighter &amp; More Positive Life”
                </p>

                <!-- Action Button in Hero -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a 
                        href="#pre-booking-section" 
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-3 px-10 py-4 rounded-[14px] bg-gradient-to-r from-[#D38928] via-[#E6A740] to-[#B8741E] hover:from-[#B8741E] hover:to-[#965A15] text-white font-black text-sm sm:text-base font-heading shadow-xl gold-glow hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 cursor-pointer border border-amber-300/40"
                    >
                        <span>✦ PRE-BOOK YOUR SACRED BOX (VIP ACCESS)</span>
                        <span class="text-amber-200">➔</span>
                    </a>
                    
                    <a 
                        href="#sacred-process" 
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-6 py-4 rounded-[14px] bg-white/10 hover:bg-white/15 backdrop-blur-md text-white/90 hover:text-white font-bold text-sm font-heading border border-white/20 transition-all cursor-pointer"
                    >
                        <span>Explore Sacred Process</span>
                        <span>↓</span>
                    </a>
                </div>

                <!-- Trust Micro-Notice -->
                <p class="text-xs text-amber-200/70 font-medium tracking-wide">
                    ✓ 100% Zero Advance Fee • Free Brass / Terracotta Stand with Pre-Order • Consecrated in Vrindavan
                </p>

            </div>

            <!-- 4 Signature Vedic Badges (Docked in Glassmorphic Bar) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-5 max-w-5xl mx-auto">
                
                <!-- Badge 1: 100% Natural -->
                <div class="bg-black/45 backdrop-blur-md p-4 sm:p-5 rounded-[20px] border border-[#D38928]/35 shadow-lg flex items-center space-x-3.5 group hover:border-[#FAD961] hover:bg-black/60 transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/25 text-[#FAD961] flex items-center justify-center shrink-0 border border-[#D38928]/50 group-hover:scale-110 group-hover:bg-[#D38928] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C8 18.5 11 16 12 12c1 4 4 6.5 5.4 8.4C20.2 18.6 22 15.5 22 12c0-5.5-4.5-10-10-10z"/><path d="M12 2v20"/></svg>
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-white font-heading block leading-tight tracking-wide">100% NATURAL</strong>
                        <span class="text-[11px] text-amber-100/70 font-medium">Pure botanical herbs</span>
                    </div>
                </div>

                <!-- Badge 2: Cow Dung Based -->
                <div class="bg-black/45 backdrop-blur-md p-4 sm:p-5 rounded-[20px] border border-[#D38928]/35 shadow-lg flex items-center space-x-3.5 group hover:border-[#FAD961] hover:bg-black/60 transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/25 text-[#FAD961] flex items-center justify-center shrink-0 border border-[#D38928]/50 group-hover:scale-110 group-hover:bg-[#D38928] group-hover:text-white transition-all text-2xl">
                        🐄
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-white font-heading block leading-tight tracking-wide">COW DUNG BASED</strong>
                        <span class="text-[11px] text-amber-100/70 font-medium">Desi Gomaya cups</span>
                    </div>
                </div>

                <!-- Badge 3: Fresh Mango Wood Sticks -->
                <div class="bg-black/45 backdrop-blur-md p-4 sm:p-5 rounded-[20px] border border-[#D38928]/35 shadow-lg flex items-center space-x-3.5 group hover:border-[#FAD961] hover:bg-black/60 transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/25 text-[#FAD961] flex items-center justify-center shrink-0 border border-[#D38928]/50 group-hover:scale-110 group-hover:bg-[#D38928] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-white font-heading block leading-tight tracking-wide">MANGO WOOD</strong>
                        <span class="text-[11px] text-amber-100/70 font-medium">Fresh Aam samidha</span>
                    </div>
                </div>

                <!-- Badge 4: Inspired by Maa Baglamukhi -->
                <div class="bg-black/45 backdrop-blur-md p-4 sm:p-5 rounded-[20px] border border-[#D38928]/35 shadow-lg flex items-center space-x-3.5 group hover:border-[#FAD961] hover:bg-black/60 transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/25 text-[#FAD961] flex items-center justify-center shrink-0 border border-[#D38928]/50 group-hover:scale-110 group-hover:bg-[#D38928] group-hover:text-white transition-all text-2xl">
                        🪷
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-white font-heading block leading-tight tracking-wide">MAA BAGLAMUKHI</strong>
                        <span class="text-[11px] text-amber-100/70 font-medium">Devi Pitambara Grace</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 2. "THE SACRED PROCESS — PURITY IN EVERY STEP" (Ultra-Premium Step Cards)   -->
    <!-- ========================================================================= -->
    <section id="sacred-process" class="py-20 sm:py-28 bg-gradient-to-b from-[#FAF6EE] via-[#FCFAF7] to-[#FAF6EE] border-b border-[#EEDBCA] relative overflow-hidden">
        
        <!-- Decorative Ambient Background Watermark -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[300px] font-cinzel font-black text-[#D38928]/[0.03] select-none pointer-events-none">
            MANGALAM
        </div>

        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] space-y-16 sm:space-y-20 relative z-10">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center space-x-3 bg-white px-5 py-2 rounded-full border border-[#EADBCC] shadow-xs">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#D38928]"></span>
                    <span class="text-xs font-black uppercase tracking-[0.25em] text-[#965A15] font-heading">
                        THE SACRED PROCESS
                    </span>
                    <span class="h-1.5 w-1.5 rounded-full bg-[#D38928]"></span>
                </div>

                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    Purity in Every Step
                </h2>

                <p class="text-base sm:text-lg text-gray-600 font-serif italic max-w-xl mx-auto">
                    Handcrafted with deep Vedic devotion to preserve 100% spiritual sanctity.
                </p>
            </div>

            <!-- 4 Sequential Process Step Cards (Interconnected Flow) -->
            <div class="relative">
                
                <!-- Desktop Connection Line -->
                <div class="hidden lg:block absolute top-[135px] left-[10%] right-[10%] h-[2px] bg-gradient-to-r from-[#EADBCC] via-[#D38928]/40 to-[#EADBCC] -z-0"></div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 relative z-10">
                    
                    <!-- STEP 1: PREPARE WITH CARE -->
                    <div class="bg-white rounded-[26px] border-2 border-[#EADBCC] p-6 shadow-sm flex flex-col justify-between gold-card-hover group relative">
                        
                        <!-- Floating Step Number Ring -->
                        <div class="absolute -top-5 left-1/2 -translate-x-1/2 w-11 h-11 rounded-full bg-gradient-to-br from-[#E6A740] to-[#B8741E] text-white font-black text-sm flex items-center justify-center font-heading shadow-md ring-4 ring-white">
                            01
                        </div>

                        <div class="space-y-5 pt-4">
                            <!-- Image Frame -->
                            <div class="relative aspect-[4/3] rounded-[18px] overflow-hidden bg-[#FAF5EE] border border-[#EADBCC] group-hover:border-[#D38928] transition-colors">
                                <img 
                                    src="{{ asset('assets/images/pitambara/step-1-hq.jpg') }}" 
                                    alt="Prepare with Care" 
                                    class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                    <span class="text-[11px] font-bold text-white tracking-wide">Desi Gomaya Base</span>
                                </div>
                            </div>

                            <div class="space-y-2.5">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-[#965A15] font-heading">
                                    चरण १ • गोमय संस्कार
                                </div>
                                <h3 class="text-lg sm:text-xl font-black font-heading text-[#1A1A1A] uppercase tracking-wide leading-snug">
                                    PREPARE WITH CARE
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                                    We collect and purify natural cow dung and shape it into sacred havan cups, sun-dried for purity.
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-[11px] font-bold font-heading">
                            <span class="text-[#965A15]">Purity Phase 01</span>
                            <span class="px-2.5 py-0.5 rounded-full bg-[#FAF0DE] text-[#965A15] border border-[#E8CBA3]">100% Desi Cow Dung</span>
                        </div>
                    </div>

                    <!-- STEP 2: ADD THE SACRED BLEND -->
                    <div class="bg-white rounded-[26px] border-2 border-[#EADBCC] p-6 shadow-sm flex flex-col justify-between gold-card-hover group relative">
                        
                        <!-- Floating Step Number Ring -->
                        <div class="absolute -top-5 left-1/2 -translate-x-1/2 w-11 h-11 rounded-full bg-gradient-to-br from-[#E6A740] to-[#B8741E] text-white font-black text-sm flex items-center justify-center font-heading shadow-md ring-4 ring-white">
                            02
                        </div>

                        <div class="space-y-5 pt-4">
                            <!-- Image Frame -->
                            <div class="relative aspect-[4/3] rounded-[18px] overflow-hidden bg-[#FAF5EE] border border-[#EADBCC] group-hover:border-[#D38928] transition-colors">
                                <img 
                                    src="{{ asset('assets/images/pitambara/step-2-hq.jpg') }}" 
                                    alt="Add the Sacred Blend" 
                                    class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                    <span class="text-[11px] font-bold text-white tracking-wide">16+ Vedic Herbs</span>
                                </div>
                            </div>

                            <div class="space-y-2.5">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-[#965A15] font-heading">
                                    चरण २ • जड़ी-बूटी समावेश
                                </div>
                                <h3 class="text-lg sm:text-xl font-black font-heading text-[#1A1A1A] uppercase tracking-wide leading-snug">
                                    ADD THE SACRED BLEND
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                                    Our special havan blend with traditional herbs and Maa Baglamukhi's essence is carefully added.
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-[11px] font-bold font-heading">
                            <span class="text-[#965A15]">Purity Phase 02</span>
                            <span class="px-2.5 py-0.5 rounded-full bg-[#FAF0DE] text-[#965A15] border border-[#E8CBA3]">Sacred Samagri</span>
                        </div>
                    </div>

                    <!-- STEP 3: INFUSE WITH MANGO WOOD -->
                    <div class="bg-white rounded-[26px] border-2 border-[#EADBCC] p-6 shadow-sm flex flex-col justify-between gold-card-hover group relative">
                        
                        <!-- Floating Step Number Ring -->
                        <div class="absolute -top-5 left-1/2 -translate-x-1/2 w-11 h-11 rounded-full bg-gradient-to-br from-[#E6A740] to-[#B8741E] text-white font-black text-sm flex items-center justify-center font-heading shadow-md ring-4 ring-white">
                            03
                        </div>

                        <div class="space-y-5 pt-4">
                            <!-- Image Frame -->
                            <div class="relative aspect-[4/3] rounded-[18px] overflow-hidden bg-[#FAF5EE] border border-[#EADBCC] group-hover:border-[#D38928] transition-colors">
                                <img 
                                    src="{{ asset('assets/images/pitambara/step-3-hq.jpg') }}" 
                                    alt="Infuse with Mango Wood" 
                                    class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                    <span class="text-[11px] font-bold text-white tracking-wide">Aam Samidha</span>
                                </div>
                            </div>

                            <div class="space-y-2.5">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-[#965A15] font-heading">
                                    चरण ३ • आम्र समिधा
                                </div>
                                <h3 class="text-lg sm:text-xl font-black font-heading text-[#1A1A1A] uppercase tracking-wide leading-snug">
                                    INFUSE WITH MANGO WOOD
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                                    We use fresh, naturally sourced mango wood sticks for a clean and long-lasting fragrance.
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-[11px] font-bold font-heading">
                            <span class="text-[#965A15]">Purity Phase 03</span>
                            <span class="px-2.5 py-0.5 rounded-full bg-[#FAF0DE] text-[#965A15] border border-[#E8CBA3]">Fresh Mango Wood</span>
                        </div>
                    </div>

                    <!-- STEP 4: LIGHT, BLOW & RELEASE -->
                    <div class="bg-white rounded-[26px] border-2 border-[#EADBCC] p-6 shadow-sm flex flex-col justify-between gold-card-hover group relative">
                        
                        <!-- Floating Step Number Ring -->
                        <div class="absolute -top-5 left-1/2 -translate-x-1/2 w-11 h-11 rounded-full bg-gradient-to-br from-[#E6A740] to-[#B8741E] text-white font-black text-sm flex items-center justify-center font-heading shadow-md ring-4 ring-white">
                            04
                        </div>

                        <div class="space-y-5 pt-4">
                            <!-- Image Frame -->
                            <div class="relative aspect-[4/3] rounded-[18px] overflow-hidden bg-[#FAF5EE] border border-[#EADBCC] group-hover:border-[#D38928] transition-colors">
                                <img 
                                    src="{{ asset('assets/images/pitambara/step-4-hq.jpg') }}" 
                                    alt="Light, Blow & Release" 
                                    class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                    <span class="text-[11px] font-bold text-white tracking-wide">Negative Shield</span>
                                </div>
                            </div>

                            <div class="space-y-2.5">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-emerald-800 font-heading">
                                    चरण ४ • पवित्र प्रज्वलन
                                </div>
                                <h3 class="text-lg sm:text-xl font-black font-heading text-[#1A1A1A] uppercase tracking-wide leading-snug">
                                    LIGHT, BLOW &amp; RELEASE
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                                    Light the stick, blow gently and let the sacred smoke remove negativity and bring peace &amp; positivity into your space.
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-[11px] font-bold font-heading">
                            <span class="text-emerald-700">Purity Phase 04</span>
                            <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">Aura Cleansing</span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 3. VIP PRE-BOOKING & EARLY ACCESS RESERVATION (Zero Upfront Payment)       -->
    <!-- ========================================================================= -->
    <section id="pre-booking-section" class="py-20 sm:py-28 bg-white relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 space-y-10">
            
            <div class="text-center space-y-3">
                <div class="inline-flex items-center space-x-2 text-xs uppercase tracking-[0.25em] text-[#965A15] font-black font-heading bg-[#FAF0DE] px-5 py-2 rounded-full border border-[#E8CBA3] shadow-xs">
                    <span>✦</span>
                    <span>VIP CONSECRATION BATCH RESERVATION</span>
                    <span>✦</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    Pre-Book Your Sacred Box
                </h2>

                <p class="text-sm sm:text-base text-gray-600 font-serif italic max-w-xl mx-auto">
                    Limited initial batch consecrated under Vedic rituals. Reserve your priority box with <strong>zero upfront payment</strong> to receive early launch access.
                </p>
            </div>

            <!-- Reservation Form Card -->
            <div class="bg-[#FFFDF9] rounded-[28px] border-2 border-[#EADBCC] p-6 sm:p-10 shadow-xl space-y-6 relative overflow-hidden">
                
                <div class="absolute top-0 right-0 transform translate-x-8 -translate-y-8 w-32 h-32 bg-[#D38928]/10 rounded-full blur-2xl pointer-events-none"></div>

                <form method="POST" action="{{ route('pitambara.prebook') }}" class="space-y-5 relative z-10">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                                Devotee Full Name *
                            </label>
                            <input 
                                type="text" 
                                name="name" 
                                required 
                                placeholder="e.g. Rameshwar Sharma"
                                class="w-full px-4 py-3.5 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                                WhatsApp / Mobile Number *
                            </label>
                            <input 
                                type="tel" 
                                name="phone" 
                                required 
                                placeholder="e.g. +91 98765 43210"
                                class="w-full px-4 py-3.5 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                                City / State
                            </label>
                            <input 
                                type="text" 
                                name="city" 
                                placeholder="e.g. Varanasi, UP"
                                class="w-full px-4 py-3.5 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                                Preferred Box Quantity
                            </label>
                            <select 
                                name="pack_preference" 
                                class="w-full px-4 py-3.5 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                            >
                                <option value="Pack of 12 Sacred Cups">Standard Pack (12 Cups)</option>
                                <option value="Pack of 24 Cups (Mandir Pack)">Devotee Mandir Pack (24 Cups)</option>
                                <option value="Family Mandir Pack (36 Cups + Brass Stand)">Grand Family Pack (36 Cups + Brass Stand)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                            Special Prayer Intent / Message (Optional)
                        </label>
                        <textarea 
                            name="notes" 
                            rows="2" 
                            placeholder="Any specific pooja intent, sankalpa, or queries..."
                            class="w-full px-4 py-3 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                        ></textarea>
                    </div>

                    <!-- Submit Pre-Booking Button -->
                    <button 
                        type="submit" 
                        class="w-full py-4 px-8 rounded-[14px] bg-gradient-to-r from-[#D38928] via-[#E6A740] to-[#B8741E] hover:from-[#B8741E] hover:to-[#965A15] text-white font-black text-sm sm:text-base tracking-wider uppercase font-heading shadow-lg hover:shadow-xl transition-all cursor-pointer flex items-center justify-center space-x-2 border border-amber-300/40"
                    >
                        <span>✦ CONFIRM MY VIP PRE-BOOKING ✦</span>
                    </button>

                    <!-- Trust Points & Zero Fee Notice -->
                    <div class="pt-3 text-center text-xs text-gray-500 space-y-1">
                        <p class="font-semibold text-[#965A15]">
                            ✓ Zero Advance Payment Needed • Direct WhatsApp Notification Before Public Dispatch
                        </p>
                        <p class="text-[11px] text-gray-400">
                            Includes a complimentary handcrafted terracotta stand with every reserved order.
                        </p>
                    </div>

                </form>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 4. "YOUR SHIELD AGAINST NEGATIVITY" (The 4 Spiritual Protection Pillars)   -->
    <!-- ========================================================================= -->
    <section class="py-20 sm:py-28 pitambara-dark-bg text-white relative overflow-hidden">
        
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-10 space-y-14">
            
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center space-x-2 text-xs uppercase tracking-[0.25em] text-[#F5CE7A] font-bold font-heading bg-white/10 px-5 py-2 rounded-full border border-white/15">
                    <span>🛡️</span>
                    <span>DIVINE ENERGETIC PROTECTION</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight text-white">
                    <span class="pitambara-gold-gradient block">PITAMBARA HAVAN</span>
                    <span class="text-xl sm:text-2xl lg:text-3xl font-normal text-white/90 block mt-1 font-cinzel">
                        YOUR SHIELD AGAINST NEGATIVITY
                    </span>
                </h2>

                <p class="text-sm sm:text-base text-white/70 font-serif italic max-w-xl mx-auto">
                    When consecrated cow dung, mango wood samidha, and Vedic herbs burn, their sacred frequencies shield your dwelling against negative vibrations.
                </p>
            </div>

            <!-- 4 Spiritual Pillars (Exact matching cards from poster) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                
                <!-- 1. Spiritual Protection -->
                <div class="p-6 rounded-[24px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 hover:border-[#D38928]/50 transition-all group">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-xl border border-[#D38928]/40 group-hover:scale-110 transition-transform">
                        🪷
                    </div>
                    <h3 class="text-base font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                        SPIRITUAL PROTECTION
                    </h3>
                    <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                        Maa Baglamukhi's divine shield guarding your home against buri nazar and unseen energetic obstacles.
                    </p>
                </div>

                <!-- 2. Positivity at Home -->
                <div class="p-6 rounded-[24px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 hover:border-[#D38928]/50 transition-all group">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-xl border border-[#D38928]/40 group-hover:scale-110 transition-transform">
                        ☀️
                    </div>
                    <h3 class="text-base font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                        POSITIVITY AT HOME
                    </h3>
                    <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                        Neutralizes stagnant domestic tension, lifting the mood of all family members with peaceful vibrancy.
                    </p>
                </div>

                <!-- 3. Calm Mind -->
                <div class="p-6 rounded-[24px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 hover:border-[#D38928]/50 transition-all group">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-xl border border-[#D38928]/40 group-hover:scale-110 transition-transform">
                        🧘
                    </div>
                    <h3 class="text-base font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                        CALM MIND
                    </h3>
                    <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                        Aromatherapeutic herbs (Jatamansi, Guggal, Camphor) soothe anxiety and deepen dhyana &amp; evening rest.
                    </p>
                </div>

                <!-- 4. Divine Atmosphere -->
                <div class="p-6 rounded-[24px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 hover:border-[#D38928]/50 transition-all group">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-xl border border-[#D38928]/40 group-hover:scale-110 transition-transform">
                        🏛️
                    </div>
                    <h3 class="text-base font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                        DIVINE ATMOSPHERE
                    </h3>
                    <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                        Fills every corner of your living sanctuary with the authentic fragrance of ancient Varanasi temple aartis.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 5. WHAT GOES INSIDE — 100% SCRIPTURAL INGREDIENTS                          -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 bg-white border-b border-[#EADBCC]">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-[11px] font-black uppercase tracking-[0.25em] text-[#D38928] font-heading">✦ VEDIC CONSECRATION ✦</span>
                <h2 class="text-3xl sm:text-4xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    What Goes Inside Pitambara Havan
                </h2>
                <p class="text-sm text-gray-500 font-serif italic">
                    Pure, non-toxic, and natural elements blended by hereditary Vedic artisans.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 text-center">
                
                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🐄</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Desi Gir Cow Dung</h4>
                    <p class="text-[11px] text-gray-500">Purifies atmosphere</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🪵</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Mango Wood Samidha</h4>
                    <p class="text-[11px] text-gray-500">Clean fragrant smoke</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🧈</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Pure Desi Ghee</h4>
                    <p class="text-[11px] text-gray-500">Sattvic oblations</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🌿</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Bhimseni Camphor</h4>
                    <p class="text-[11px] text-gray-500">Kills negative bacteria</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🪔</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Guggal &amp; Loban</h4>
                    <p class="text-[11px] text-gray-500">Ancient temple resins</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🌱</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Jatamansi Roots</h4>
                    <p class="text-[11px] text-gray-500">Mental calm &amp; focus</p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 6. FREQUENTLY ASKED QUESTIONS (Accordion)                                 -->
    <!-- ========================================================================= -->
    <section class="py-20 sm:py-28 bg-[#FAF7F2]">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 space-y-8">
            
            <div class="text-center space-y-2">
                <span class="text-[11px] font-black uppercase tracking-[0.25em] text-[#D38928] font-heading">✦ CLARIFICATIONS ✦</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#1A1A1A] font-heading tracking-tight">
                    Frequently Asked Questions
                </h2>
            </div>

            <div class="bg-white rounded-[24px] border border-[#EADBCC] divide-y divide-[#EADBCC] shadow-xs overflow-hidden">
                
                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading cursor-pointer">
                        <span>When should I light Mangalam Pitambara Havan in my home?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        You can light Pitambara Havan every morning during your daily puja or in the evening during Sandhya Aarti (sunset). It is especially auspicious on Tuesdays, Saturdays, Amavasya, Purnima, and during Navratri for total household energetic cleansing.
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading cursor-pointer">
                        <span>How does Pitambara Havan shield against negativity and buri nazar?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        Maa Baglamukhi (Pitambara) is the eighth Mahavidya, representing supreme victory over negative vibrations, mental distress, and domestic conflicts. When pure cow dung and consecrated mango wood burn together with sacred resins, their aromatic smoke cleanses energetic stagnation.
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading cursor-pointer">
                        <span>How does Pre-Booking work and is there any upfront fee?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        Pre-Booking is completely free with zero advance payment! Simply fill the form above with your name and WhatsApp number. When the consecrated batch is prepared, you will receive an exclusive priority invitation to confirm your order before public release.
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading cursor-pointer">
                        <span>Do I get a holder or terracotta stand with my pre-booking?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        Yes! Every reserved box comes with a complimentary handcrafted artisanal terracotta/ceramic stand (worth ₹150/-) included free.
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 7. COMING SOON GRAND FINALE BANNER                                        -->
    <!-- ========================================================================= -->
    <section class="py-20 sm:py-24 bg-gradient-to-b from-[#140E08] to-[#080503] text-white border-t border-[#D38928]/30">
        <div class="max-w-4xl mx-auto px-4 text-center space-y-6">
            
            <div class="inline-block px-5 py-1.5 rounded-full border border-[#F5CE7A]/30 bg-[#D38928]/15 text-[#F5CE7A] text-xs font-black tracking-[0.25em] font-cinzel">
                COMING SOON • SACRED VEDIC LAUNCH
            </div>

            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight pitambara-gold-gradient">
                Mangalam Pitambara Havan
            </h3>

            <p class="text-sm sm:text-base text-white/80 max-w-xl mx-auto font-serif italic">
                Get ready to experience the purest negative energy cleansing ritual in your living sanctuary.
            </p>

            <div class="pt-4">
                <a 
                    href="#pre-booking-section" 
                    class="inline-flex items-center space-x-2 px-8 py-3.5 rounded-[12px] bg-[#D38928] hover:bg-[#B8741E] text-white font-bold text-sm sm:text-base shadow-xl transition-all cursor-pointer font-heading"
                >
                    <span>Pre-Book Your Box Now</span>
                    <span>➔</span>
                </a>
            </div>

        </div>
    </section>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // FAQ Accordion
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
