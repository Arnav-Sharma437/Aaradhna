@extends('layouts.app')

@section('title', 'About Us — The Sacred Heritage of Mangalam.co™')
@section('meta_description', 'Discover the sacred story of Mangalam.co™ — 100% Bamboo-free, zero-charcoal pooja samagri handcrafted from temple flowers by Vedic artisans in Vrindavan.')

@section('content')
<div class="bg-[#FFFDF9] min-h-screen font-body select-none">

    <!-- ========================================================================= -->
    <!-- 1. SPIRITUAL HERITAGE HERO BANNER                                         -->
    <!-- ========================================================================= -->
    <section class="relative bg-gradient-to-b from-[#2B1810] via-[#3E2314] to-[#1F120A] text-white py-20 sm:py-28 overflow-hidden border-b border-[#D38928]/30">
        
        <!-- Mystical Background Glows & Sacred Watermark -->
        <div class="absolute inset-0 opacity-15 pointer-events-none bg-[radial-gradient(#F6DAA8_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full bg-[#D38928]/15 blur-[120px] pointer-events-none"></div>

        <!-- Floating Sanskrit Watermark -->
        <div class="absolute inset-0 flex items-center justify-center opacity-5 pointer-events-none text-8xl sm:text-[180px] font-serif font-black select-none">
            ॐ
        </div>

        <div class="relative w-full max-w-4xl mx-auto px-5 sm:px-8 text-center space-y-5 z-10">
            
            <!-- Sacred Gayatri Pill -->
            <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-[#D38928]/20 border border-[#F6DAA8]/40 text-[#F6DAA8] text-xs font-semibold tracking-widest uppercase shadow-sm">
                <span class="animate-pulse">🪔</span>
                <span>शुद्धं समर्पयामि • OUR SACRED GENESIS</span>
                <span class="animate-pulse">🪔</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-normal font-heading text-white tracking-tight leading-tight">
                Crafted in the Sacred Soil of Vrindavan,<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F6DAA8] via-[#D38928] to-[#F6DAA8] italic font-serif">Rooted in Eternal Vedic Dharma</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-sm sm:text-base lg:text-lg text-stone-300 max-w-2xl mx-auto leading-relaxed pt-2">
                Mangalam was founded with a single divine prayer: to restore the purity of daily Indian worship through 100% bamboo-free, zero-charcoal sacred samagri handcrafted from sacred temple flowers.
            </p>

            <!-- Breadcrumbs -->
            <div class="flex items-center justify-center space-x-2 text-xs text-stone-400 pt-4">
                <a href="{{ route('home') }}" class="hover:text-[#F6DAA8] transition-colors">Home</a>
                <span>/</span>
                <span class="text-[#F6DAA8] font-semibold">About Our Sacred Heritage</span>
            </div>

        </div>

    </section>

    <!-- ========================================================================= -->
    <!-- 2. THE SACRED VOW — WHY 100% BAMBOO-FREE                                   -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 border-b border-[#EAE3D9] bg-white">
        <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                
                <!-- Left Visual with Gold Framed Aura -->
                <div class="lg:col-span-6 relative">
                    <div class="relative aspect-[4/3] rounded-[24px] overflow-hidden border-2 border-[#D38928]/40 shadow-2xl bg-[#FAF7F2]">
                        <img 
                            src="{{ asset('assets/images/hero-incense-banner.jpg') }}" 
                            alt="Traditional Vedic Pooja with Mangalam Incense" 
                            class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white space-y-1">
                            <span class="text-xs uppercase font-bold tracking-widest text-[#F6DAA8] font-heading">VEDIC VIDHI COMPLIANT</span>
                            <h3 class="text-xl font-normal font-heading">No Bamboo. No Toxic Charcoal.</h3>
                        </div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -right-4 sm:right-6 bg-white border border-[#D38928] rounded-[16px] p-4 shadow-xl flex items-center space-x-3 max-w-xs">
                        <div class="w-12 h-12 rounded-full bg-[#FDF5EB] border border-[#D38928]/50 flex items-center justify-center text-2xl shrink-0">
                            🌿
                        </div>
                        <div>
                            <span class="text-xs font-bold text-[#121212] block font-heading">Vamsha Shastra Protection</span>
                            <span class="text-[11px] text-gray-500">Honoring traditional scriptures</span>
                        </div>
                    </div>
                </div>

                <!-- Right Narrative Block -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ SCRIPTURAL PURITY ✦</span>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-normal text-[#121212] font-heading tracking-tight leading-snug">
                            The Holy Vow: Why Burning Bamboo is Forbidden
                        </h2>
                    </div>

                    <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                        In ancient Sanatana Dharma and Ayurvedic texts, bamboo (called <em>Vamsha</em>) represents the lineage and sacred life force. Burning bamboo in sacred homas or daily household pooja is considered inauspicious. Moreover, burning chemical-dipped wooden sticks releases heavy metals and toxic fumes.
                    </p>

                    <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                        At <strong class="text-[#8B4513]">Mangalam</strong>, we took an unconditional pledge never to use bamboo or harmful black coal. Every single stick and havan cup is crafted strictly using <strong>pure dried temple flowers, Desi cow dung, organic Guggal, pure Loban, and rare essential oils</strong>.
                    </p>

                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <div class="p-4 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC]">
                            <div class="text-2xl mb-1">🪔</div>
                            <h4 class="text-sm font-bold text-[#121212] font-heading">White Sacred Smoke</h4>
                            <p class="text-xs text-gray-500 pt-0.5">Gentle on eyes, calming to mind and prana.</p>
                        </div>
                        <div class="p-4 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC]">
                            <div class="text-2xl mb-1">🌸</div>
                            <h4 class="text-sm font-bold text-[#121212] font-heading">Temple Flower Core</h4>
                            <p class="text-xs text-gray-500 pt-0.5">Infused with sacred mantras and prayers.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 3. THE 4 SACRED PILLARS OF MANGALAM                                       -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 bg-[#FAF7F2] border-b border-[#EAE3D9]">
        <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
            
            <div class="text-center max-w-2xl mx-auto mb-14 space-y-2">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ ETERNAL VALUES ✦</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-normal text-[#121212] font-heading tracking-tight">
                    Four Pillars of Our Vedic Dharma
                </h2>
                <p class="text-sm text-gray-600">
                    How every element of our craft upholds sanctity, sustainability, and spiritual purity.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Pillar 1 -->
                <div class="bg-white rounded-[20px] p-7 border border-[#EADBCC] shadow-xs hover:shadow-xl hover:border-[#D38928] transition-all duration-300 flex flex-col justify-between space-y-4">
                    <div class="w-14 h-14 rounded-full bg-[#FAF5EE] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center text-2xl shadow-xs">
                        🌺
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-[#121212] font-heading">Temple Flower Karma</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            We collect sacred offering flowers from temples across Vrindavan and Mathura ghats, preventing river pollution and giving them a second divine life.
                        </p>
                    </div>
                    <div class="pt-2 text-[11px] font-bold text-[#965A15] uppercase tracking-wider font-heading">
                        Zero River Waste ✦
                    </div>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-white rounded-[20px] p-7 border border-[#EADBCC] shadow-xs hover:shadow-xl hover:border-[#D38928] transition-all duration-300 flex flex-col justify-between space-y-4">
                    <div class="w-14 h-14 rounded-full bg-[#FAF5EE] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center text-2xl shadow-xs">
                        🪵
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-[#121212] font-heading">Zero Toxic Charcoal</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            No artificial burning agents, petroleum distillates, or coal powder. Pure natural herbs ensure soot-free, non-irritating atmosphere in your home temple.
                        </p>
                    </div>
                    <div class="pt-2 text-[11px] font-bold text-[#965A15] uppercase tracking-wider font-heading">
                        100% Clean Air ✦
                    </div>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-white rounded-[20px] p-7 border border-[#EADBCC] shadow-xs hover:shadow-xl hover:border-[#D38928] transition-all duration-300 flex flex-col justify-between space-y-4">
                    <div class="w-14 h-14 rounded-full bg-[#FAF5EE] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center text-2xl shadow-xs">
                        🪔
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-[#121212] font-heading">Desi Ghee &amp; Resins</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Every havan cup and dhoop is infused with pure organic Desi cow ghee, Bhimseni camphor, and authentic Himalayan Guggal resins for spiritual aura.
                        </p>
                    </div>
                    <div class="pt-2 text-[11px] font-bold text-[#965A15] uppercase tracking-wider font-heading">
                        Ayurvedic Formulation ✦
                    </div>
                </div>

                <!-- Pillar 4 -->
                <div class="bg-white rounded-[20px] p-7 border border-[#EADBCC] shadow-xs hover:shadow-xl hover:border-[#D38928] transition-all duration-300 flex flex-col justify-between space-y-4">
                    <div class="w-14 h-14 rounded-full bg-[#FAF5EE] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center text-2xl shadow-xs">
                        🙏
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-[#121212] font-heading">Matrishakti Seva</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Handcrafted with devotional love by 500+ rural women artisans in Braj Dham, providing dignified livelihood and sacred empowerment.
                        </p>
                    </div>
                    <div class="pt-2 text-[11px] font-bold text-[#965A15] uppercase tracking-wider font-heading">
                        Handmade in Bharat 🇮🇳
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 4. SACRED ARTISAN PROCESS TIMELINE                                        -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 bg-white border-b border-[#EAE3D9]">
        <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
            
            <div class="text-center max-w-2xl mx-auto mb-14 space-y-2">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ FROM GHAT TO MANDIR ✦</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-normal text-[#121212] font-heading tracking-tight">
                    How We Craft Sacred Samagri
                </h2>
                <p class="text-sm text-gray-600">
                    A holy cycle of prayer, sustainability, and authentic Ayurvedic preparation.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <!-- Step 1 -->
                <div class="text-center space-y-4">
                    <div class="relative w-20 h-20 mx-auto rounded-full bg-[#FDF5EB] border-2 border-[#D38928] flex items-center justify-center text-3xl shadow-md">
                        <span>1</span>
                        <span class="absolute -top-2 -right-2 bg-[#D38928] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Ghats</span>
                    </div>
                    <h4 class="text-base font-bold text-[#121212] font-heading">Temple Floral Collection</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Devotional marigolds, roses, and jasmine gathered at sunrise from sacred mandirs.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center space-y-4">
                    <div class="relative w-20 h-20 mx-auto rounded-full bg-[#FDF5EB] border-2 border-[#D38928] flex items-center justify-center text-3xl shadow-md">
                        <span>2</span>
                        <span class="absolute -top-2 -right-2 bg-[#D38928] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Surya</span>
                    </div>
                    <h4 class="text-base font-bold text-[#121212] font-heading">Vedic Sun-Drying</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Naturally sun-dried under sacred Braj skies without artificial dehydrators or sulfur.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center space-y-4">
                    <div class="relative w-20 h-20 mx-auto rounded-full bg-[#FDF5EB] border-2 border-[#D38928] flex items-center justify-center text-3xl shadow-md">
                        <span>3</span>
                        <span class="absolute -top-2 -right-2 bg-[#D38928] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Ayurveda</span>
                    </div>
                    <h4 class="text-base font-bold text-[#121212] font-heading">Herbal Blending</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Mixed with Desi cow ghee, pure herbs, Himalayan guggal resins, and essential oils.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="text-center space-y-4">
                    <div class="relative w-20 h-20 mx-auto rounded-full bg-[#FDF5EB] border-2 border-[#D38928] flex items-center justify-center text-3xl shadow-md">
                        <span>4</span>
                        <span class="absolute -top-2 -right-2 bg-[#D38928] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Blessing</span>
                    </div>
                    <h4 class="text-base font-bold text-[#121212] font-heading">Blessed in Your Home</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Hand-packaged and delivered to bring peaceful spiritual vibrations into your altar.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 5. DEVOTIONAL CTA BANNER                                                  -->
    <!-- ========================================================================= -->
    <section class="py-16 bg-gradient-to-r from-[#2A1810] via-[#3E2314] to-[#1F120A] text-white">
        <div class="w-full max-w-4xl mx-auto px-5 text-center space-y-6">
            <span class="text-xs uppercase font-bold tracking-widest text-[#F6DAA8] font-heading">✦ EXPERIENCE PURE WORSHIP ✦</span>
            <h2 class="text-2xl sm:text-4xl font-normal font-heading tracking-tight leading-tight">
                Invite the Sacred Aura of Vrindavan<br>
                Into Your Daily Pooja
            </h2>
            <p class="text-stone-300 text-xs sm:text-sm max-w-lg mx-auto">
                Explore our full collection of bambooless sticks, organic havan cups, and charcoal-free dhoop cones.
            </p>
            <div class="pt-2">
                <a 
                    href="{{ route('collections.show', 'bambooless') }}" 
                    class="inline-flex items-center space-x-2 px-8 py-3.5 bg-[#D38928] hover:bg-[#b8741e] text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 font-heading"
                >
                    <span>Shop Sacred Collection</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
