@extends('layouts.app')

@section('title', 'मंगलम् पीताम्बरा हवन — शांति, सकारात्मकता एवं सुरक्षा का दिव्य कवच')
@section('meta_description', '100% प्राकृतिक, देशी गोमय एवं आम्र समिधा युक्त पीताम्बरा हवन। माँ बगलामुखी की कृपा से नकारात्मक ऊर्जा का नाश। VIP प्री-बुकिंग शुरू।')

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
            radial-gradient(ellipse at 50% 40%, rgba(211, 137, 40, 0.25) 0%, transparent 70%),
            linear-gradient(180deg, rgba(14, 9, 6, 0.82) 0%, rgba(14, 9, 6, 0.45) 45%, rgba(14, 9, 6, 0.95) 100%),
            url("{{ asset('assets/images/pitambara/hero-bg-clean.jpg') }}");
        background-size: cover;
        background-position: center center;
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
        box-shadow: 0 0 45px rgba(211, 137, 40, 0.35);
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
    <!-- 1. FULL-WIDTH CLEAN HERO BANNER (Hindi Overlay & Clean Altar Backdrop)    -->
    <!-- ========================================================================= -->
    <section class="relative w-full pitambara-hero-bg text-white overflow-hidden pt-10 pb-20 sm:pt-16 sm:pb-28 border-b border-[#D38928]/30">
        
        <!-- Ambient Golden Sparkle Filter -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,rgba(211,137,40,0.3),transparent_70%)] pointer-events-none"></div>

        <!-- Breadcrumb / Consecration Bar within Hero -->
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-20 mb-8 sm:mb-12">
            <div class="flex flex-wrap items-center justify-between gap-3 text-xs">
                <nav class="flex items-center space-x-2 text-white/70 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-[#FAD961] transition-colors">होम</a>
                    <span>/</span>
                    <span class="text-[#FAD961] font-semibold">मंगलम् पीताम्बरा हवन</span>
                </nav>

                <div class="inline-flex items-center space-x-2 text-[11px] font-bold text-[#FAD961] bg-black/60 backdrop-blur-md px-4 py-1.5 rounded-full border border-[#D38928]/40 font-heading">
                    <span class="animate-pulse text-[#FAD961]">✦</span>
                    <span class="tracking-wider uppercase">पवित्र वैदिक संस्करण • वीआईपी प्री-बुकिंग सक्रिय</span>
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

        <!-- Main Banner Centerpiece Content in Hindi & Vedic Style -->
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-20 space-y-10 sm:space-y-14">
            
            <div class="text-center max-w-4xl mx-auto space-y-5">
                
                <!-- Sacred Vedic Shloka Header Pill -->
                <div class="inline-flex items-center space-x-2.5 text-xs sm:text-sm tracking-[0.2em] text-[#FAD961] font-bold font-heading bg-black/65 backdrop-blur-md px-6 py-2 rounded-full border border-[#D38928]/50 shadow-lg">
                    <span>🕉️</span>
                    <span>॥ ॐ ह्लीं बगलामुखी नमः ॥</span>
                    <span>🕉️</span>
                </div>

                <!-- Brand & Product Title in Hindi -->
                <div class="space-y-2 pt-1">
                    <p class="text-xs sm:text-sm uppercase tracking-[0.35em] text-[#F5CE7A] font-bold font-heading">
                        मंगलम् प्रस्तुत करता है
                    </p>
                    
                    <h1 class="text-5xl sm:text-7xl lg:text-8xl font-black text-white font-heading tracking-tight leading-[1.08] drop-shadow-2xl">
                        <span class="block text-white drop-shadow-md">पीताम्बरा</span>
                        <span class="pitambara-gold-gradient text-3xl sm:text-5xl lg:text-6xl font-black tracking-[0.18em] block mt-1 font-cinzel">
                            ह व न
                        </span>
                    </h1>
                </div>

                <!-- Poster Tagline in Hindi -->
                <p class="text-lg sm:text-2xl lg:text-3xl text-amber-100/95 font-serif italic max-w-3xl mx-auto leading-relaxed drop-shadow-md">
                    “घर में शांति, सकारात्मक ऊर्जा एवं नकारात्मकता से रक्षा का दिव्य वैदिक कवच”
                </p>

                <!-- Action Button in Hero -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a 
                        href="#pre-booking-section" 
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-3 px-10 py-4 rounded-[14px] bg-gradient-to-r from-[#D38928] via-[#E6A740] to-[#B8741E] hover:from-[#B8741E] hover:to-[#965A15] text-white font-black text-sm sm:text-base font-heading shadow-xl gold-glow hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 cursor-pointer border border-amber-300/40"
                    >
                        <span>✦ अपनी पवित्र किट प्री-बुक करें (VIP अर्ली एक्सेस)</span>
                        <span class="text-amber-200">➔</span>
                    </a>
                    
                    <a 
                        href="#sacred-process" 
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-6 py-4 rounded-[14px] bg-white/10 hover:bg-white/15 backdrop-blur-md text-white/90 hover:text-white font-bold text-sm font-heading border border-white/20 transition-all cursor-pointer"
                    >
                        <span>पवित्र निर्माण विधि देखें</span>
                        <span>↓</span>
                    </a>
                </div>

                <!-- Trust Micro-Notice in Hindi -->
                <p class="text-xs text-amber-200/80 font-medium tracking-wide">
                    ✓ कोई अग्रिम शुल्क नहीं • प्री-बुकिंग पर निःशुल्क स्टैंड • माँ बगलामुखी के मंत्रों द्वारा अभिमंत्रित
                </p>

            </div>

            <!-- 4 Signature Vedic Badges (In Hindi, Docked in Glassmorphic Bar) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-5 max-w-5xl mx-auto">
                
                <!-- Badge 1: 100% Natural -->
                <div class="bg-black/50 backdrop-blur-md p-4 sm:p-5 rounded-[20px] border border-[#D38928]/35 shadow-lg flex items-center space-x-3.5 group hover:border-[#FAD961] hover:bg-black/65 transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/25 text-[#FAD961] flex items-center justify-center shrink-0 border border-[#D38928]/50 group-hover:scale-110 group-hover:bg-[#D38928] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C8 18.5 11 16 12 12c1 4 4 6.5 5.4 8.4C20.2 18.6 22 15.5 22 12c0-5.5-4.5-10-10-10z"/><path d="M12 2v20"/></svg>
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-white font-heading block leading-tight tracking-wide">१००% प्राकृतिक</strong>
                        <span class="text-[11px] text-amber-100/75 font-medium">शुद्ध वनौषधि व जड़ी-बूटी</span>
                    </div>
                </div>

                <!-- Badge 2: Cow Dung Based -->
                <div class="bg-black/50 backdrop-blur-md p-4 sm:p-5 rounded-[20px] border border-[#D38928]/35 shadow-lg flex items-center space-x-3.5 group hover:border-[#FAD961] hover:bg-black/65 transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/25 text-[#FAD961] flex items-center justify-center shrink-0 border border-[#D38928]/50 group-hover:scale-110 group-hover:bg-[#D38928] group-hover:text-white transition-all text-2xl">
                        🐄
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-white font-heading block leading-tight tracking-wide">देशी गोमय आधारित</strong>
                        <span class="text-[11px] text-amber-100/75 font-medium">पवित्र गाय के गोबर से निर्मित</span>
                    </div>
                </div>

                <!-- Badge 3: Fresh Mango Wood Sticks -->
                <div class="bg-black/50 backdrop-blur-md p-4 sm:p-5 rounded-[20px] border border-[#D38928]/35 shadow-lg flex items-center space-x-3.5 group hover:border-[#FAD961] hover:bg-black/65 transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/25 text-[#FAD961] flex items-center justify-center shrink-0 border border-[#D38928]/50 group-hover:scale-110 group-hover:bg-[#D38928] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-white font-heading block leading-tight tracking-wide">आम्र समिधा युक्त</strong>
                        <span class="text-[11px] text-amber-100/75 font-medium">ताज़ा आम की पवित्र लकड़ी</span>
                    </div>
                </div>

                <!-- Badge 4: Inspired by Maa Baglamukhi -->
                <div class="bg-black/50 backdrop-blur-md p-4 sm:p-5 rounded-[20px] border border-[#D38928]/35 shadow-lg flex items-center space-x-3.5 group hover:border-[#FAD961] hover:bg-black/65 transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/25 text-[#FAD961] flex items-center justify-center shrink-0 border border-[#D38928]/50 group-hover:scale-110 group-hover:bg-[#D38928] group-hover:text-white transition-all text-2xl">
                        🪷
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-white font-heading block leading-tight tracking-wide">माँ बगलामुखी कृपा</strong>
                        <span class="text-[11px] text-amber-100/75 font-medium">नकारात्मक ऊर्जा का नाश</span>
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
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[260px] font-cinzel font-black text-[#D38928]/[0.03] select-none pointer-events-none">
            MANGALAM
        </div>

        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] space-y-16 sm:space-y-20 relative z-10">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center space-x-3 bg-white px-5 py-2 rounded-full border border-[#EADBCC] shadow-xs">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#D38928]"></span>
                    <span class="text-xs font-black uppercase tracking-[0.25em] text-[#965A15] font-heading">
                        पवित्र निर्माण विधि • THE SACRED PROCESS
                    </span>
                    <span class="h-1.5 w-1.5 rounded-full bg-[#D38928]"></span>
                </div>

                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    हर चरण में पूर्ण पवित्रता
                </h2>

                <p class="text-base sm:text-lg text-gray-600 font-serif italic max-w-xl mx-auto">
                    प्राचीन वैदिक परंपरा व पूर्ण भक्ति भाव से निर्मित दिव्य हवन कप।
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
                                    <span class="text-[11px] font-bold text-white tracking-wide">शुद्ध देशी गोमय</span>
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
                            <span class="text-[#965A15]">पवित्रता चरण ०१</span>
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
                                    <span class="text-[11px] font-bold text-white tracking-wide">१६+ दिव्य जड़ी-बूटियाँ</span>
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
                            <span class="text-[#965A15]">पवित्रता चरण ०२</span>
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
                                    <span class="text-[11px] font-bold text-white tracking-wide">पवित्र आम्र समिधा</span>
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
                            <span class="text-[#965A15]">पवित्रता चरण ०३</span>
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
                                    <span class="text-[11px] font-bold text-white tracking-wide">ऊर्जा व वातावरण शुद्धि</span>
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
                            <span class="text-emerald-700">पवित्रता चरण ०४</span>
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
                    <span>वीआईपी प्रारंभिक संस्करण आरक्षण</span>
                    <span>✦</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    अपनी पवित्र किट प्री-बुक करें
                </h2>

                <p class="text-sm sm:text-base text-gray-600 font-serif italic max-w-xl mx-auto">
                    वैदिक अनुष्ठानों द्वारा अभिमंत्रित सीमित प्रथम संस्करण। <strong>शून्य अग्रिम शुल्क (Zero Payment)</strong> के साथ अपनी प्राथमिकता सुरक्षित करें।
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
                                भक्त का पूरा नाम * (Full Name)
                            </label>
                            <input 
                                type="text" 
                                name="name" 
                                required 
                                placeholder="उदा. रामेश्वर शर्मा"
                                class="w-full px-4 py-3.5 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                                व्हाट्सएप / मोबाइल नंबर * (WhatsApp No.)
                            </label>
                            <input 
                                type="tel" 
                                name="phone" 
                                required 
                                placeholder="उदा. +91 98765 43210"
                                class="w-full px-4 py-3.5 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                                शहर / राज्य (City / State)
                            </label>
                            <input 
                                type="text" 
                                name="city" 
                                placeholder="उदा. वाराणसी, उत्तर प्रदेश"
                                class="w-full px-4 py-3.5 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                                पसंदीदा पैक (Preferred Pack)
                            </label>
                            <select 
                                name="pack_preference" 
                                class="w-full px-4 py-3.5 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                            >
                                <option value="Pack of 12 Sacred Cups">मानक पैक (12 पवित्र हवन कप)</option>
                                <option value="Pack of 24 Cups (Mandir Pack)">मंदिर पैक (24 हवन कप + स्टैंड)</option>
                                <option value="Family Mandir Pack (36 Cups + Brass Stand)">महा-परिवार पैक (36 कप + पीतल स्टैंड)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5 font-heading">
                            पूजा संकल्प या विशेष संदेश (वैकल्पिक)
                        </label>
                        <textarea 
                            name="notes" 
                            rows="2" 
                            placeholder="कोई विशेष पूजा संकल्प, संदेश या प्रश्न..."
                            class="w-full px-4 py-3 rounded-[12px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white transition-all"
                        ></textarea>
                    </div>

                    <!-- Submit Pre-Booking Button -->
                    <button 
                        type="submit" 
                        class="w-full py-4 px-8 rounded-[14px] bg-gradient-to-r from-[#D38928] via-[#E6A740] to-[#B8741E] hover:from-[#B8741E] hover:to-[#965A15] text-white font-black text-sm sm:text-base tracking-wider uppercase font-heading shadow-lg hover:shadow-xl transition-all cursor-pointer flex items-center justify-center space-x-2 border border-amber-300/40"
                    >
                        <span>✦ मेरी वीआईपी प्री-बुकिंग सुरक्षित करें ✦</span>
                    </button>

                    <!-- Trust Points & Zero Fee Notice -->
                    <div class="pt-3 text-center text-xs text-gray-500 space-y-1">
                        <p class="font-semibold text-[#965A15]">
                            ✓ कोई अग्रिम भुगतान नहीं • सार्वजनिक प्रेषण से पहले व्हाट्सएप पर सीधी सूचना
                        </p>
                        <p class="text-[11px] text-gray-400">
                            प्रत्येक आरक्षित ऑर्डर के साथ एक हस्तनिर्मित स्टैंड निःशुल्क सम्मिलित है।
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
                    <span>दिव्य आध्यात्मिक सुरक्षा</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight text-white">
                    <span class="pitambara-gold-gradient block">पीताम्बरा हवन</span>
                    <span class="text-xl sm:text-2xl lg:text-3xl font-normal text-white/90 block mt-1 font-cinzel">
                        नकारात्मकता के विरुद्ध आपका दिव्य सुरक्षा कवच
                    </span>
                </h2>

                <p class="text-sm sm:text-base text-white/70 font-serif italic max-w-xl mx-auto">
                    जब शुद्ध गोमय, आम की लकड़ी और वैदिक जड़ी-बूटियाँ प्रज्वलित होती हैं, तो उनकी पवित्र तरंगें आपके घर को सभी प्रकार की नकारात्मक ऊर्जाओं से मुक्त करती हैं।
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
                        आध्यात्मिक सुरक्षा
                    </h3>
                    <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                        माँ बगलामुखी का दिव्य रक्षा-कवच जो आपके घर को बुरी नज़र और अदृश्य नकारात्मक बाधाओं से सुरक्षित रखता है।
                    </p>
                </div>

                <!-- 2. Positivity at Home -->
                <div class="p-6 rounded-[24px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 hover:border-[#D38928]/50 transition-all group">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-xl border border-[#D38928]/40 group-hover:scale-110 transition-transform">
                        ☀️
                    </div>
                    <h3 class="text-base font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                        घर में सकारात्मकता
                    </h3>
                    <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                        गृह-क्लेश और तनाव को समाप्त कर परिवार के सभी सदस्यों के मन में शांति और आनंद का संचार करता है।
                    </p>
                </div>

                <!-- 3. Calm Mind -->
                <div class="p-6 rounded-[24px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 hover:border-[#D38928]/50 transition-all group">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-xl border border-[#D38928]/40 group-hover:scale-110 transition-transform">
                        🧘
                    </div>
                    <h3 class="text-base font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                        शांत व एकाग्र मन
                    </h3>
                    <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                        जटामांसी, गुग्गल और भीमसेनी कपूर की प्राकृतिक सुगंध चिंता को दूर कर ध्यान व गहरी निद्रा में सहायक होती है।
                    </p>
                </div>

                <!-- 4. Divine Atmosphere -->
                <div class="p-6 rounded-[24px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 hover:border-[#D38928]/50 transition-all group">
                    <div class="w-12 h-12 rounded-full bg-[#D38928]/20 text-[#F5CE7A] flex items-center justify-center text-xl border border-[#D38928]/40 group-hover:scale-110 transition-transform">
                        🏛️
                    </div>
                    <h3 class="text-base font-black font-heading text-[#F5CE7A] tracking-wider uppercase">
                        मंदिर जैसा वातावरण
                    </h3>
                    <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                        आपके पूरे घर को प्राचीन काशी व वृन्दावन के भव्य मंदिरों की संध्या आरती जैसी पवित्र सुगंध से महका देता है।
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
                <span class="text-[11px] font-black uppercase tracking-[0.25em] text-[#D38928] font-heading">✦ वैदिक घटक ✦</span>
                <h2 class="text-3xl sm:text-4xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    पीताम्बरा हवन में क्या-क्या सम्मिलित है
                </h2>
                <p class="text-sm text-gray-500 font-serif italic">
                    पूर्णतः विष-रहित, शास्त्रोक्त एवं १००% प्राकृतिक जड़ी-बूटियाँ।
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 text-center">
                
                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🐄</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">देशी गिर गोमय</h4>
                    <p class="text-[11px] text-gray-500">वातावरण शुद्धि</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🪵</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">आम्र समिधा</h4>
                    <p class="text-[11px] text-gray-500">पवित्र सुगंधित धुआं</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🧈</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">शुद्ध देशी घी</h4>
                    <p class="text-[11px] text-gray-500">सात्त्विक आहुति</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🌿</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">भीमसेनी कपूर</h4>
                    <p class="text-[11px] text-gray-500">कीटाणुनाशक गुण</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🪔</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">गुग्गल व लोबान</h4>
                    <p class="text-[11px] text-gray-500">प्राचीन मंदिर रेजिन</p>
                </div>

                <div class="p-5 rounded-[20px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] hover:shadow-sm transition-all">
                    <div class="text-3xl">🌱</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">जटामांसी जड़</h4>
                    <p class="text-[11px] text-gray-500">मानसिक शांति</p>
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
                <span class="text-[11px] font-black uppercase tracking-[0.25em] text-[#D38928] font-heading">✦ अक्सर पूछे जाने वाले प्रश्न ✦</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#1A1A1A] font-heading tracking-tight">
                    प्रायः पूछे जाने वाले सवाल (FAQs)
                </h2>
            </div>

            <div class="bg-white rounded-[24px] border border-[#EADBCC] divide-y divide-[#EADBCC] shadow-xs overflow-hidden">
                
                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading cursor-pointer">
                        <span>घर में मंगलम् पीताम्बरा हवन कब प्रज्वलित करना चाहिए?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        आप पीताम्बरा हवन को प्रतिदिन प्रातःकालीन पूजा के समय या सायंकालीन संध्या आरती (सूर्यास्त के समय) जला सकते हैं। मंगलवार, शनिवार, अमावस्या, पूर्णिमा एवं नवरात्र के दिनों में इसका प्रज्वलन घर की संपूर्ण ऊर्जा शुद्धि के लिए विशेष फलदायी माना जाता है।
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading cursor-pointer">
                        <span>पीताम्बरा हवन नकारात्मक ऊर्जा व बुरी नज़र से कैसे रक्षा करता है?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        माँ बगलामुखी (पीताम्बरा) अष्टम महाविद्या हैं, जो नकारात्मक शक्तियों, मानसिक क्लेश और शत्रुओं के दुष्प्रभाव को शांत करने वाली हैं। जब शुद्ध गोमय, आम्र समिधा और गुग्गल-लोबान का पवित्र धुआं घर में फैलता है, तो यह सूक्ष्म नकारात्मक तरंगों को निष्प्रभावी कर देता है।
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading cursor-pointer">
                        <span>प्री-बुकिंग कैसे काम करती है और क्या कोई अग्रिम शुल्क है?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        प्री-बुकिंग पूर्णतः निःशुल्क है (शून्य अग्रिम भुगतान)। बस ऊपर दिए गए फॉर्म में अपना नाम और व्हाट्सएप नंबर दर्ज करें। जैसे ही अभिमंत्रित पहला बैच तैयार होगा, आपको सार्वजनिक लॉन्च से पहले प्राथमिकता से सूचना और ऑर्डर कन्फर्मेशन लिंक भेजा जाएगा।
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading cursor-pointer">
                        <span>क्या प्री-बुकिंग के साथ हवन कप स्टैंड भी मिलेगा?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                        हाँ! प्रत्येक आरक्षित बॉक्स के साथ एक सुंदर हस्तनिर्मित स्टैंड बिल्कुल मुफ्त प्रदान किया जाएगा ताकि आप सुरक्षित रूप से हवन कप स्थापित कर सकें।
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
                शीघ्र आ रहा है • COMING SOON
            </div>

            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight pitambara-gold-gradient">
                मंगलम् पीताम्बरा हवन
            </h3>

            <p class="text-sm sm:text-base text-white/80 max-w-xl mx-auto font-serif italic">
                अपने घर-आँगन में माँ बगलामुखी की कृपा और सनातन हवन की पावन सुगंध का अनुभव करने हेतु आज ही प्री-बुक करें।
            </p>

            <div class="pt-4">
                <a 
                    href="#pre-booking-section" 
                    class="inline-flex items-center space-x-2 px-8 py-3.5 rounded-[12px] bg-[#D38928] hover:bg-[#B8741E] text-white font-bold text-sm sm:text-base shadow-xl transition-all cursor-pointer font-heading"
                >
                    <span>अभी प्री-बुक करें</span>
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
