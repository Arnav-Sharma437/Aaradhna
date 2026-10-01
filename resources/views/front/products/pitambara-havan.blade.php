@extends('layouts.app')

@section('title', 'Mangalam Pitambara Havan — Sacred Blend for a Calmer, Lighter & More Positive Life')
@section('meta_description', '100% Natural, Cow Dung based Pitambara Havan with fresh mango wood sticks. Inspired by Maa Baglamukhi as your sacred shield against negativity. VIP Pre-Booking Open.')

@push('styles')
<style>
    .font-cinzel {
        font-family: 'Cinzel', 'Libre Baskerville', serif;
    }
    .pitambara-gold-gradient {
        background: linear-gradient(135deg, #E6A740 0%, #FFF1C5 30%, #D38928 60%, #9E5E10 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
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
</style>
@endpush

@section('content')
<div class="bg-[#FCFAF7] min-h-screen font-body selection:bg-[#F6DAA8] selection:text-[#2B1810]">

    <!-- ========================================================================= -->
    <!-- 1. TOP BREADCRUMB & CONSECRATION BANNER                                   -->
    <!-- ========================================================================= -->
    <div class="bg-[#FAF5EE] border-b border-[#EADBCC] py-3">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] flex flex-wrap items-center justify-between gap-3 text-xs">
            <nav class="flex items-center space-x-2 text-gray-500 font-medium">
                <a href="{{ route('home') }}" class="hover:text-[#D38928] transition-colors">Home</a>
                <span>/</span>
                <span class="text-[#1A1A1A] font-bold">Mangalam Pitambara Havan</span>
            </nav>

            <div class="flex items-center space-x-2 text-[11px] font-bold text-[#965A15] bg-[#FAF0DE] px-3.5 py-1 rounded-full border border-[#E8CBA3] font-heading">
                <span class="animate-pulse text-[#D38928]">✦</span>
                <span>MAA BAGLAMUKHI BLESSINGS • VIP PRE-BOOKING OPEN</span>
                <span class="animate-pulse text-[#D38928]">✦</span>
            </div>
        </div>
    </div>

    <!-- Flash message for Pre-booking -->
    @if(session('prebooking_success'))
        <div class="max-w-4xl mx-auto px-4 mt-6">
            <div class="p-4 rounded-[16px] bg-emerald-50 border border-emerald-300 text-emerald-900 shadow-md flex items-center space-x-3">
                <span class="text-2xl">🙏</span>
                <div class="text-xs sm:text-sm font-semibold leading-relaxed">
                    {{ session('prebooking_success') }}
                </div>
            </div>
        </div>
    @endif

    <!-- ========================================================================= -->
    <!-- 2. MAJESTIC HERO SHOWCASE BANNER (Exact Visual Match with Poster Top)      -->
    <!-- ========================================================================= -->
    <section class="relative pt-10 pb-16 sm:pt-16 sm:pb-24 overflow-hidden">
        
        <!-- Subtle Divine Amber Aura Glow -->
        <div class="absolute top-0 inset-x-0 h-96 bg-gradient-to-b from-[#F5E8D3]/70 via-[#FCFAF7] to-transparent pointer-events-none"></div>

        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-10 space-y-10 sm:space-y-12">
            
            <!-- Hero Title & Tagline -->
            <div class="text-center max-w-4xl mx-auto space-y-4">
                
                <div class="inline-flex items-center space-x-2.5 text-xs uppercase tracking-[0.3em] text-[#965A15] font-black font-heading bg-white px-5 py-2 rounded-full border border-[#E8CBA3] shadow-xs">
                    <span class="text-[#D38928]">🕉️</span>
                    <span>MANGALAM PRESENTS</span>
                    <span class="text-[#D38928]">🕉️</span>
                </div>

                <div class="space-y-2 pt-2">
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-normal text-[#1A1A1A] font-heading tracking-tight leading-[1.05]">
                        <span class="block">Pitambara</span>
                        <span class="pitambara-gold-gradient text-3xl sm:text-4xl lg:text-5xl font-black tracking-[0.16em] uppercase block mt-1 font-cinzel">
                            H A V A N
                        </span>
                    </h1>
                </div>

                <p class="text-lg sm:text-xl lg:text-2xl text-[#4A3B30] font-normal leading-relaxed font-serif italic max-w-2xl mx-auto">
                    “A Sacred Blend for a Calmer, Lighter &amp; More Positive Life”
                </p>

                <!-- CTA Action Button directly leading to Pre-Booking Form -->
                <div class="pt-2">
                    <a 
                        href="#pre-booking-section" 
                        class="inline-flex items-center space-x-2.5 px-8 py-3.5 rounded-[12px] bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white font-bold text-sm sm:text-base font-heading shadow-md hover:shadow-lg transition-all duration-200 cursor-pointer"
                    >
                        <span>Reserve Your Sacred Box (VIP Early Access)</span>
                        <span class="text-amber-200">➔</span>
                    </a>
                </div>

            </div>

            <!-- 4 Signature Vedic Badges (Exact 4 Icons from Poster Top) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-5 max-w-5xl mx-auto">
                
                <!-- Badge 1: 100% Natural -->
                <div class="bg-white/95 backdrop-blur-xs p-4 sm:p-5 rounded-[20px] border border-[#EADBCC] shadow-xs flex items-center space-x-3.5 group hover:border-[#D38928] transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#FAF5EE] text-[#D38928] flex items-center justify-center shrink-0 border border-[#EADBCC] group-hover:bg-[#D38928] group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C8 18.5 11 16 12 12c1 4 4 6.5 5.4 8.4C20.2 18.6 22 15.5 22 12c0-5.5-4.5-10-10-10z"/><path d="M12 2v20"/></svg>
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-[#1A1A1A] font-heading block leading-tight">100% NATURAL</strong>
                        <span class="text-[11px] text-gray-500 font-medium">Pure botanical herbs</span>
                    </div>
                </div>

                <!-- Badge 2: Cow Dung Based -->
                <div class="bg-white/95 backdrop-blur-xs p-4 sm:p-5 rounded-[20px] border border-[#EADBCC] shadow-xs flex items-center space-x-3.5 group hover:border-[#D38928] transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#FAF5EE] text-[#D38928] flex items-center justify-center shrink-0 border border-[#EADBCC] group-hover:bg-[#D38928] group-hover:text-white transition-colors text-2xl">
                        🐄
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-[#1A1A1A] font-heading block leading-tight">COW DUNG BASED</strong>
                        <span class="text-[11px] text-gray-500 font-medium">Desi Gomaya cups</span>
                    </div>
                </div>

                <!-- Badge 3: Fresh Mango Wood Sticks -->
                <div class="bg-white/95 backdrop-blur-xs p-4 sm:p-5 rounded-[20px] border border-[#EADBCC] shadow-xs flex items-center space-x-3.5 group hover:border-[#D38928] transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#FAF5EE] text-[#D38928] flex items-center justify-center shrink-0 border border-[#EADBCC] group-hover:bg-[#D38928] group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-[#1A1A1A] font-heading block leading-tight">MANGO WOOD</strong>
                        <span class="text-[11px] text-gray-500 font-medium">Fresh Aam samidha</span>
                    </div>
                </div>

                <!-- Badge 4: Inspired by Maa Baglamukhi -->
                <div class="bg-white/95 backdrop-blur-xs p-4 sm:p-5 rounded-[20px] border border-[#EADBCC] shadow-xs flex items-center space-x-3.5 group hover:border-[#D38928] transition-all">
                    <div class="w-12 h-12 rounded-full bg-[#FAF5EE] text-[#D38928] flex items-center justify-center shrink-0 border border-[#EADBCC] group-hover:bg-[#D38928] group-hover:text-white transition-colors text-2xl">
                        🪷
                    </div>
                    <div>
                        <strong class="text-xs sm:text-sm font-black text-[#1A1A1A] font-heading block leading-tight">MAA BAGLAMUKHI</strong>
                        <span class="text-[11px] text-gray-500 font-medium">Devi Pitambara Grace</span>
                    </div>
                </div>

            </div>

            <!-- Grand Altar Hero Banner Frame -->
            <div class="max-w-6xl mx-auto rounded-[28px] overflow-hidden border border-[#EADBCC] shadow-xl bg-[#FAF5EE] relative group">
                <img 
                    src="{{ asset('assets/images/pitambara/hero-altar.jpg') }}" 
                    alt="Mangalam Pitambara Havan Altar" 
                    class="w-full h-auto max-h-[560px] object-cover group-hover:scale-[1.02] transition-transform duration-700"
                >

                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent flex flex-col justify-end p-6 sm:p-10 text-white">
                    <div class="max-w-xl space-y-2">
                        <span class="px-3.5 py-1 rounded-full bg-[#D38928] text-white text-xs font-black font-heading uppercase tracking-wider inline-block">
                            Sacred Altar Showcase
                        </span>
                        <h3 class="text-2xl sm:text-3xl font-normal font-heading text-white">
                            Pure Bhimseni &amp; Mango Wood Samidha Infusion
                        </h3>
                        <p class="text-xs sm:text-sm text-white/80 leading-relaxed font-sans">
                            Handcrafted in sacred Vrindavan using organic desi cow dung cups, infused with consecrated herbs of Maa Baglamukhi.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 3. "THE SACRED PROCESS — PURITY IN EVERY STEP" (Exact match with poster)     -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 bg-[#FAF7F2] border-y border-[#EEDBCA] relative">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] space-y-12 sm:space-y-16">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="flex items-center justify-center space-x-3">
                    <span class="h-px w-12 bg-[#D38928]/50"></span>
                    <span class="text-xs font-black uppercase tracking-[0.25em] text-[#965A15] font-heading">
                        THE SACRED PROCESS
                    </span>
                    <span class="h-px w-12 bg-[#D38928]/50"></span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-normal text-[#1A1A1A] font-heading tracking-tight">
                    Purity in Every Step
                </h2>

                <p class="text-sm sm:text-base text-gray-600 font-serif italic">
                    Handcrafted with devotion using time-honoured Vedic traditions.
                </p>
            </div>

            <!-- 4 Sequential Process Step Cards (Exact Text and Photos from Screenshot) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 relative">
                
                <!-- STEP 1: PREPARE WITH CARE -->
                <div class="bg-white rounded-[22px] border border-[#EADBCC] p-5 sm:p-6 shadow-sm space-y-4 hover:border-[#D38928] hover:shadow-md transition-all flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="relative aspect-square rounded-[16px] overflow-hidden bg-[#FAF5EE]">
                            <img src="{{ asset('assets/images/pitambara/step1-prepare.jpg') }}" alt="Prepare with Care" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 w-9 h-9 rounded-full bg-[#D38928] text-white font-black text-xs flex items-center justify-center font-heading shadow-md ring-2 ring-white">
                                1
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base sm:text-lg font-black font-heading text-[#1A1A1A] uppercase tracking-wide">
                                PREPARE WITH CARE
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                                We collect and purify natural cow dung and shape it into sacred havan cups, sun-dried for purity.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3.5 border-t border-gray-100 flex items-center justify-between text-[11px] text-[#965A15] font-bold font-heading">
                        <span>Purity Step 1</span>
                        <span>100% Desi Gomaya</span>
                    </div>
                </div>

                <!-- STEP 2: ADD THE SACRED BLEND -->
                <div class="bg-white rounded-[22px] border border-[#EADBCC] p-5 sm:p-6 shadow-sm space-y-4 hover:border-[#D38928] hover:shadow-md transition-all flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="relative aspect-square rounded-[16px] overflow-hidden bg-[#FAF5EE]">
                            <img src="{{ asset('assets/images/pitambara/step2-blend.jpg') }}" alt="Add the Sacred Blend" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 w-9 h-9 rounded-full bg-[#D38928] text-white font-black text-xs flex items-center justify-center font-heading shadow-md ring-2 ring-white">
                                2
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base sm:text-lg font-black font-heading text-[#1A1A1A] uppercase tracking-wide">
                                ADD THE SACRED BLEND
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                                Our special havan blend with traditional herbs and Maa Baglamukhi's essence is carefully added.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3.5 border-t border-gray-100 flex items-center justify-between text-[11px] text-[#965A15] font-bold font-heading">
                        <span>Purity Step 2</span>
                        <span>16 Vedic Herbs</span>
                    </div>
                </div>

                <!-- STEP 3: INFUSE WITH MANGO WOOD -->
                <div class="bg-white rounded-[22px] border border-[#EADBCC] p-5 sm:p-6 shadow-sm space-y-4 hover:border-[#D38928] hover:shadow-md transition-all flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="relative aspect-square rounded-[16px] overflow-hidden bg-[#FAF5EE]">
                            <img src="{{ asset('assets/images/pitambara/step3-mangowood.jpg') }}" alt="Infuse with Mango Wood" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 w-9 h-9 rounded-full bg-[#D38928] text-white font-black text-xs flex items-center justify-center font-heading shadow-md ring-2 ring-white">
                                3
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base sm:text-lg font-black font-heading text-[#1A1A1A] uppercase tracking-wide">
                                INFUSE WITH MANGO WOOD
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                                We use fresh, naturally sourced mango wood sticks for a clean and long-lasting fragrance.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3.5 border-t border-gray-100 flex items-center justify-between text-[11px] text-[#965A15] font-bold font-heading">
                        <span>Purity Step 3</span>
                        <span>Aam ki Samidha</span>
                    </div>
                </div>

                <!-- STEP 4: LIGHT, BLOW & RELEASE -->
                <div class="bg-white rounded-[22px] border border-[#EADBCC] p-5 sm:p-6 shadow-sm space-y-4 hover:border-[#D38928] hover:shadow-md transition-all flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="relative aspect-square rounded-[16px] overflow-hidden bg-[#FAF5EE]">
                            <img src="{{ asset('assets/images/pitambara/step4-light.jpg') }}" alt="Light, Blow & Release" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 w-9 h-9 rounded-full bg-[#D38928] text-white font-black text-xs flex items-center justify-center font-heading shadow-md ring-2 ring-white">
                                4
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base sm:text-lg font-black font-heading text-[#1A1A1A] uppercase tracking-wide">
                                LIGHT, BLOW &amp; RELEASE
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-sans">
                                Light the stick, blow gently and let the sacred smoke remove negativity and bring peace &amp; positivity into your space.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3.5 border-t border-gray-100 flex items-center justify-between text-[11px] text-emerald-700 font-bold font-heading">
                        <span>Purity Step 4</span>
                        <span>Negative Energy Shield</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 4. VIP PRE-BOOKING & EARLY ACCESS RESERVATION (Zero Upfront Payment)       -->
    <!-- ========================================================================= -->
    <section id="pre-booking-section" class="py-16 sm:py-24 bg-white relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-8 space-y-10">
            
            <div class="text-center space-y-3">
                <div class="inline-flex items-center space-x-2 text-xs uppercase tracking-[0.25em] text-[#965A15] font-black font-heading bg-[#FAF0DE] px-4 py-1.5 rounded-full border border-[#E8CBA3]">
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
            <div class="bg-[#FFFDF9] rounded-[28px] border-2 border-[#EADBCC] p-6 sm:p-10 shadow-lg space-y-6">
                
                <form method="POST" action="{{ route('pitambara.prebook') }}" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1 font-heading">
                                Devotee Full Name *
                            </label>
                            <input 
                                type="text" 
                                name="name" 
                                required 
                                placeholder="e.g. Rameshwar Sharma"
                                class="w-full px-4 py-3 rounded-[10px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1 font-heading">
                                WhatsApp / Mobile Number *
                            </label>
                            <input 
                                type="tel" 
                                name="phone" 
                                required 
                                placeholder="e.g. +91 98765 43210"
                                class="w-full px-4 py-3 rounded-[10px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1 font-heading">
                                City / State
                            </label>
                            <input 
                                type="text" 
                                name="city" 
                                placeholder="e.g. Varanasi, UP"
                                class="w-full px-4 py-3 rounded-[10px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white"
                            >
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1 font-heading">
                                Preferred Box Quantity
                            </label>
                            <select 
                                name="pack_preference" 
                                class="w-full px-4 py-3 rounded-[10px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white"
                            >
                                <option value="Pack of 12 Sacred Cups">Standard Pack (12 Cups)</option>
                                <option value="Pack of 24 Cups (Mandir Pack)">Devotee Mandir Pack (24 Cups)</option>
                                <option value="Family Mandir Pack (36 Cups + Brass Stand)">Grand Family Pack (36 Cups + Brass Stand)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1 font-heading">
                            Special Prayer Intent / Message (Optional)
                        </label>
                        <textarea 
                            name="notes" 
                            rows="2" 
                            placeholder="Any specific pooja intent, sankalpa, or queries..."
                            class="w-full px-4 py-2.5 rounded-[10px] border border-gray-300 text-sm focus:ring-[#D38928] focus:border-[#D38928] bg-white"
                        ></textarea>
                    </div>

                    <!-- Submit Pre-Booking Button -->
                    <button 
                        type="submit" 
                        class="w-full py-4 px-8 rounded-[12px] bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white font-black text-sm sm:text-base tracking-wider uppercase font-heading shadow-md hover:shadow-lg transition-all cursor-pointer flex items-center justify-center space-x-2"
                    >
                        <span>✦ CONFIRM MY VIP PRE-BOOKING ✦</span>
                    </button>

                    <!-- Trust Points & Zero Fee Notice -->
                    <div class="pt-2 text-center text-xs text-gray-500 space-y-1">
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
    <!-- 5. "YOUR SHIELD AGAINST NEGATIVITY" (The 4 Spiritual Protection Pillars)   -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 pitambara-dark-bg text-white relative overflow-hidden">
        
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-10 space-y-12">
            
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center space-x-2 text-xs uppercase tracking-[0.25em] text-[#F5CE7A] font-bold font-heading bg-white/10 px-4 py-1.5 rounded-full border border-white/15">
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
                <div class="p-6 rounded-[22px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 transition-all group">
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
                <div class="p-6 rounded-[22px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 transition-all group">
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
                <div class="p-6 rounded-[22px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 transition-all group">
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
                <div class="p-6 rounded-[22px] bg-white/5 border border-white/10 backdrop-blur-xs space-y-3 hover:bg-white/10 transition-all group">
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
    <!-- 6. WHAT GOES INSIDE — 100% SCRIPTURAL INGREDIENTS                          -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-20 bg-white border-b border-[#EADBCC]">
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
                
                <div class="p-5 rounded-[18px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🐄</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Desi Gir Cow Dung</h4>
                    <p class="text-[11px] text-gray-500">Purifies atmosphere</p>
                </div>

                <div class="p-5 rounded-[18px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🪵</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Mango Wood Samidha</h4>
                    <p class="text-[11px] text-gray-500">Clean fragrant smoke</p>
                </div>

                <div class="p-5 rounded-[18px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🧈</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Pure Desi Ghee</h4>
                    <p class="text-[11px] text-gray-500">Sattvic oblations</p>
                </div>

                <div class="p-5 rounded-[18px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🌿</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Bhimseni Camphor</h4>
                    <p class="text-[11px] text-gray-500">Kills negative bacteria</p>
                </div>

                <div class="p-5 rounded-[18px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🪔</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Guggal &amp; Loban</h4>
                    <p class="text-[11px] text-gray-500">Ancient temple resins</p>
                </div>

                <div class="p-5 rounded-[18px] bg-[#FCFAF7] border border-[#EADBCC] space-y-2 hover:border-[#D38928] transition-all">
                    <div class="text-3xl">🌱</div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#1A1A1A] font-heading">Jatamansi Roots</h4>
                    <p class="text-[11px] text-gray-500">Mental calm &amp; focus</p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 7. FREQUENTLY ASKED QUESTIONS (Accordion)                                 -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 bg-[#FAF7F2]">
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
    <!-- 8. COMING SOON GRAND FINALE BANNER                                        -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-20 bg-gradient-to-b from-[#140E08] to-[#080503] text-white border-t border-[#D38928]/30">
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
