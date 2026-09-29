@props([
    'products' => null
])

@php
    // Default curated showcase items if not passed dynamically
    $items = $products ?? collect([
        (object)[
            'id' => 1,
            'title' => 'Devi Refill Pack (100 Sticks)',
            'slug' => 'devi-refill-pack',
            'subtitle' => 'Pure Bhimseni Camphor & Divine Tulsi',
            'active_price' => 489.00,
            'base_price' => 999.00,
            'tag' => '✨ FESTIVE FAVORITE',
            'large_image' => 'assets/images/devi-refill-pack-card.jpg',
            'lifestyle_image' => 'assets/images/devi-refill-pack-card.jpg',
            'description' => 'Infused with organic camphor, Vrindavan chandan, and sacred flora to elevate your temple atmosphere.',
            'pack_info' => '100 Bambooless Sticks • Free Stand',
            'rating' => 4.9,
            'reviews_count' => 277
        ],
        (object)[
            'id' => 2,
            'title' => 'Camphor (कपूर) Bambooless Agarbatti',
            'slug' => 'camphor-bambooless-incense-sticks',
            'subtitle' => 'Pure Bhimseni Crystal Aromatic Smoke',
            'active_price' => 489.00,
            'base_price' => 999.00,
            'tag' => '🌿 100% CHARCOAL-FREE',
            'large_image' => 'assets/images/camphor-refill-pack-card.jpg',
            'lifestyle_image' => 'assets/images/camphor-refill-pack-card.jpg',
            'description' => 'Zero black soot, non-irritating soothing fragrance that purifies negative vastu energies.',
            'pack_info' => '100 Sticks • Hand-Rolled Purity',
            'rating' => 4.9,
            'reviews_count' => 219
        ],
        (object)[
            'id' => 3,
            'title' => 'Oudh Bambooless Incense Sticks',
            'slug' => 'oudh-bambooless-incense-sticks',
            'subtitle' => 'Ancient Assam Agarwood & Golden Amber',
            'active_price' => 279.00,
            'base_price' => 499.00,
            'tag' => "👑 FOUNDER'S FAVORITE",
            'large_image' => 'assets/images/oudh-pack-card.jpg',
            'lifestyle_image' => 'assets/images/oudh-pack-card.jpg',
            'description' => 'Rich, resinous oudh scent that creates deep meditative stillness during evening Sandhya.',
            'pack_info' => '40 Sticks • 50 Mins Burn Time',
            'rating' => 5.0,
            'reviews_count' => 184
        ],
        (object)[
            'id' => 4,
            'title' => 'Kesar Chandan Dhoop Cones',
            'slug' => 'kesar-chandan-dhoop-cones',
            'subtitle' => 'Kashmiri Saffron & Pure White Sandalwood',
            'active_price' => 249.00,
            'base_price' => 449.00,
            'tag' => '🪔 DAILY HAVAN ESSENTIAL',
            'large_image' => 'assets/images/chandan-cones-card.jpg',
            'lifestyle_image' => 'assets/images/chandan-cones-card.jpg',
            'description' => 'Charcoal-free sacred dhoop cones creating traditional temple fragrance for auspicious occasions.',
            'pack_info' => '40 Cones • Ceramic Holder Included',
            'rating' => 4.8,
            'reviews_count' => 162
        ],
    ]);

    $totalSlides = count($items);
@endphp

<!-- ========================================================================= -->
<!-- PREMIUM SCROLL-DRIVEN PRODUCT SHOWCASE SECTION                           -->
<!-- Pinned Sticky Container with Left Scaled Visuals & Right Rising Rail     -->
<!-- ========================================================================= -->
<section 
    id="scroll-showcase-container" 
    class="relative w-full bg-[#FAF7F2] border-b border-[#EADBCC] select-none"
    style="height: {{ max(300, $totalSlides * 100) }}vh;"
    data-total-slides="{{ $totalSlides }}"
>
    <!-- Sticky Screen Wrapper (Fixed viewport while scrolling through timeline) -->
    <div class="sticky top-0 h-screen w-full flex flex-col justify-center overflow-hidden py-4 sm:py-6 lg:py-8 font-body">
        
        <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px] h-full flex flex-col justify-between">
            
            <!-- Top Section Header & Progression Indicator -->
            <div class="flex items-center justify-between py-2 border-b border-[#EADBCC]/80 shrink-0">
                <div class="flex items-center space-x-3">
                    <span class="w-2 h-2 rounded-full bg-[#D38928] animate-pulse"></span>
                    <span class="text-[11px] sm:text-xs font-bold uppercase tracking-[0.25em] text-[#965A15] font-heading">
                        ✦ VEDIC SAMAGRI SHOWCASE • SCROLL TO EXPLORE ✦
                    </span>
                </div>
                
                <!-- Slide Index Counter & Visual Progress Pill -->
                <div class="flex items-center space-x-3">
                    <div class="text-xs font-bold text-[#121212] font-mono">
                        <span id="showcase-current-num" class="text-[#D38928] text-sm sm:text-base">01</span>
                        <span class="text-gray-400">/</span>
                        <span class="text-gray-400">0{{ $totalSlides }}</span>
                    </div>
                    <!-- Minimal Progress Bar -->
                    <div class="w-20 sm:w-28 h-1.5 bg-[#EADBCC] rounded-full overflow-hidden">
                        <div id="showcase-progress-fill" class="h-full bg-gradient-to-r from-[#D38928] to-[#965A15] rounded-full transition-all duration-150 ease-out" style="width: 25%;"></div>
                    </div>
                </div>
            </div>

            <!-- Main Interactive Split Showcase Stage -->
            <div class="flex-1 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-10 items-center py-4 lg:py-6 min-h-0 overflow-hidden">
                
                <!-- ========================================================= -->
                <!-- LEFT SIDE (65-70% / 8 Cols): LARGE SCALED VISUAL STAGE     -->
                <!-- ========================================================= -->
                <div class="lg:col-span-8 h-full min-h-[300px] sm:min-h-[420px] lg:min-h-[520px] relative rounded-[24px] sm:rounded-[32px] overflow-hidden bg-[#FFFDF9] border border-[#EADBCC] shadow-lg flex items-center justify-center p-4 sm:p-8">
                    
                    <!-- Ambient Backdrop Glow -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#FAF3EA] via-transparent to-[#FDF8F0] pointer-events-none"></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 h-3/4 bg-[#D38928]/10 rounded-full blur-[90px] pointer-events-none"></div>

                    <!-- Slide Images Stack -->
                    <div class="relative w-full h-full flex items-center justify-center">
                        @foreach($items as $index => $item)
                            <div 
                                class="showcase-left-slide absolute inset-0 flex flex-col md:flex-row items-center justify-between p-4 sm:p-8 gap-6 will-change-transform"
                                data-slide-index="{{ $index }}"
                                style="
                                    opacity: {{ $index === 0 ? '1' : '0' }};
                                    transform: {{ $index === 0 ? 'scale(1) translateY(0)' : 'scale(0.85) translateY(40px)' }};
                                    filter: {{ $index === 0 ? 'blur(0px)' : 'blur(10px)' }};
                                    pointer-events: {{ $index === 0 ? 'auto' : 'none' }};
                                "
                            >
                                <!-- Left Text Info Overlay within Visual Frame -->
                                <div class="w-full md:w-5/12 space-y-3 sm:space-y-4 text-left z-10">
                                    <div class="inline-block px-3 py-1 rounded-full bg-[#D38928]/15 border border-[#D38928]/40 text-[#965A15] text-[10px] sm:text-[11px] font-bold uppercase tracking-wider font-heading">
                                        {{ $item->tag }}
                                    </div>
                                    
                                    <h3 class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-[#121212] tracking-tight leading-tight">
                                        {{ $item->title }}
                                    </h3>
                                    
                                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-light line-clamp-3">
                                        {{ $item->description }}
                                    </p>

                                    <div class="flex items-center space-x-3 pt-2">
                                        <div class="text-xl sm:text-2xl font-black font-heading text-[#C87A1E]">
                                            ₹{{ number_format($item->active_price, 2) }}
                                        </div>
                                        <div class="text-xs sm:text-sm text-gray-400 line-through">
                                            ₹{{ number_format($item->base_price, 2) }}
                                        </div>
                                    </div>

                                    <div class="pt-2">
                                        <a 
                                            href="{{ route('products.show', $item->slug) }}" 
                                            class="inline-flex items-center space-x-2 px-6 py-3 bg-[#121212] hover:bg-[#D38928] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading"
                                        >
                                            <span>Experience Purity</span>
                                            <span>➔</span>
                                        </a>
                                    </div>
                                </div>

                                <!-- Right Large Packshot / Lifestyle Display -->
                                <div class="w-full md:w-7/12 h-[220px] sm:h-[300px] lg:h-[400px] relative rounded-[20px] overflow-hidden bg-white border border-[#EADBCC] shadow-md">
                                    <img 
                                        src="{{ asset($item->large_image) }}" 
                                        alt="{{ $item->title }}" 
                                        class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700"
                                    >
                                    <div class="absolute bottom-3 right-3 px-3 py-1 rounded-[6px] bg-black/50 backdrop-blur-xs text-white text-[10px] sm:text-[11px] font-bold font-heading">
                                        {{ $item->pack_info }}
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>

                <!-- ========================================================= -->
                <!-- RIGHT SIDE (30-35% / 4 Cols): VERTICAL PRODUCT RAIL       -->
                <!-- Synchronously translating upward on scroll                 -->
                <!-- ========================================================= -->
                <div class="lg:col-span-4 h-full relative overflow-hidden flex flex-col justify-center">
                    
                    <!-- Top & Bottom Soft Fading Masks for Smooth In/Out View -->
                    <div class="absolute top-0 inset-x-0 h-12 bg-gradient-to-b from-[#FAF7F2] to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute bottom-0 inset-x-0 h-12 bg-gradient-to-t from-[#FAF7F2] to-transparent z-10 pointer-events-none"></div>

                    <!-- Scroll Rail Inner Track (Calculated dynamically with transform translateY) -->
                    <div id="showcase-vertical-rail" class="flex flex-col space-y-4 will-change-transform transition-transform duration-75 ease-out py-6">
                        @foreach($items as $index => $item)
                            <div 
                                class="showcase-rail-card p-3.5 sm:p-4 rounded-[18px] bg-white border transition-all duration-300 shadow-xs flex items-center space-x-3.5 cursor-pointer"
                                data-rail-index="{{ $index }}"
                                data-slug="{{ $item->slug }}"
                            >
                                <!-- Thumbnail Box -->
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC] overflow-hidden shrink-0">
                                    <img src="{{ asset($item->large_image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                </div>

                                <!-- Card Metadata -->
                                <div class="flex-1 min-w-0 space-y-1">
                                    <span class="text-[9px] font-bold uppercase tracking-wider text-[#965A15] block font-heading">
                                        0{{ $index + 1 }} • {{ $item->tag }}
                                    </span>
                                    <h4 class="text-xs sm:text-sm font-bold font-serif text-[#121212] truncate">
                                        {{ $item->title }}
                                    </h4>
                                    <p class="text-[11px] text-gray-500 truncate font-light">
                                        {{ $item->subtitle }}
                                    </p>
                                    <div class="flex items-center space-x-2 pt-0.5">
                                        <span class="text-xs sm:text-sm font-black font-heading text-[#C87A1E]">
                                            ₹{{ number_format($item->active_price, 2) }}
                                        </span>
                                        <span class="text-[10px] text-gray-400 line-through">
                                            ₹{{ number_format($item->base_price, 2) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Active Pin Indicator -->
                                <div class="showcase-rail-indicator w-7 h-7 rounded-full bg-[#FAF7F2] border border-[#EADBCC] flex items-center justify-center text-gray-400 shrink-0 text-xs transition-colors">
                                    ➔
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

            <!-- Bottom Devotional Tagline -->
            <div class="py-2 flex items-center justify-between text-[11px] text-gray-500 border-t border-[#EADBCC]/80 shrink-0">
                <span class="font-serif italic">« शुद्धं समर्पयामि — 100% Bamboo-Free &amp; Pure Temple Herbs »</span>
                <span class="font-heading font-semibold text-[#D38928]">Interactive Scroll Sequence</span>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- JAVASCRIPT SCROLL ENGINE (RequestAnimationFrame + Smooth Transformations) -->
<!-- ========================================================================= -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('scroll-showcase-container');
        if (!container) return;

        const leftSlides = document.querySelectorAll('.showcase-left-slide');
        const railTrack = document.getElementById('showcase-vertical-rail');
        const railCards = document.querySelectorAll('.showcase-rail-card');
        const progressFill = document.getElementById('showcase-progress-fill');
        const currentNumEl = document.getElementById('showcase-current-num');

        const totalSlides = parseInt(container.dataset.totalSlides) || leftSlides.length;
        let ticking = false;

        const updateShowcaseState = () => {
            const rect = container.getBoundingClientRect();
            const containerHeight = container.offsetHeight;
            const windowHeight = window.innerHeight;

            // Compute total scrollable distance within pinned section
            const totalScrollableDistance = containerHeight - windowHeight;
            if (totalScrollableDistance <= 0) return;

            // Calculate progress (0.0 to 1.0)
            const currentScrolled = -rect.top;
            const rawProgress = currentScrolled / totalScrollableDistance;
            const progress = Math.min(Math.max(rawProgress, 0), 1);

            // Determine active slide index and continuous fractional progress
            const slideSegment = 1 / (totalSlides - 1 || 1);
            const activeSlideIndex = Math.min(Math.floor(progress * totalSlides), totalSlides - 1);
            const continuousIndex = progress * (totalSlides - 1);

            // 1. Update Progress Pill & Number Indicator
            if (progressFill) {
                progressFill.style.width = `${Math.round(progress * 100)}%`;
            }
            if (currentNumEl) {
                currentNumEl.textContent = `0${activeSlideIndex + 1}`;
            }

            // 2. Animate Left Side Visuals (Scale, Opacity, Blur Transitions)
            leftSlides.forEach((slide, i) => {
                const distance = continuousIndex - i; // 0 when directly active, positive when passed, negative when upcoming
                
                if (Math.abs(distance) < 1.0) {
                    // Transitioning into or out of active view
                    const normalized = 1 - Math.abs(distance);
                    const opacity = Math.max(0, Math.min(1, normalized));
                    const scale = 0.85 + (0.15 * normalized);
                    const translateY = distance * -30; // Physical movement into place
                    const blur = (1 - normalized) * 10;

                    slide.style.opacity = opacity.toFixed(3);
                    slide.style.transform = `scale(${scale.toFixed(3)}) translateY(${translateY.toFixed(1)}px)`;
                    slide.style.filter = `blur(${blur.toFixed(1)}px)`;
                    slide.style.pointerEvents = opacity > 0.6 ? 'auto' : 'none';
                    slide.style.zIndex = Math.round(opacity * 10);
                } else if (distance >= 1.0) {
                    // Past slide (scaled down and faded up)
                    slide.style.opacity = '0';
                    slide.style.transform = 'scale(0.85) translateY(-40px)';
                    slide.style.filter = 'blur(10px)';
                    slide.style.pointerEvents = 'none';
                    slide.style.zIndex = '0';
                } else {
                    // Upcoming slide (scaled down and faded down)
                    slide.style.opacity = '0';
                    slide.style.transform = 'scale(0.85) translateY(40px)';
                    slide.style.filter = 'blur(10px)';
                    slide.style.pointerEvents = 'none';
                    slide.style.zIndex = '0';
                }
            });

            // 3. Animate Right Side Vertical Product Rail (Moving upward smoothly)
            if (railTrack && railCards.length > 0) {
                const cardHeight = railCards[0].offsetHeight + 16; // including gap/margin
                const maxTranslate = (totalSlides - 1) * cardHeight;
                const currentTranslateY = -(progress * maxTranslate);

                railTrack.style.transform = `translateY(${currentTranslateY.toFixed(1)}px)`;

                // Emphasize active card in rail
                railCards.forEach((card, idx) => {
                    const indicator = card.querySelector('.showcase-rail-indicator');
                    if (idx === activeSlideIndex) {
                        card.classList.add('border-[#D38928]', 'bg-[#FFFDF9]', 'shadow-md', 'scale-[1.02]');
                        card.classList.remove('border-transparent', 'border-[#EADBCC]/60', 'bg-white', 'opacity-70');
                        if (indicator) {
                            indicator.classList.add('bg-[#D38928]', 'text-white', 'border-[#D38928]');
                            indicator.classList.remove('bg-[#FAF7F2]', 'text-gray-400');
                        }
                    } else {
                        card.classList.remove('border-[#D38928]', 'bg-[#FFFDF9]', 'shadow-md', 'scale-[1.02]');
                        card.classList.add('border-[#EADBCC]/60', 'bg-white', 'opacity-70');
                        if (indicator) {
                            indicator.classList.remove('bg-[#D38928]', 'text-white', 'border-[#D38928]');
                            indicator.classList.add('bg-[#FAF7F2]', 'text-gray-400');
                        }
                    }
                });
            }

            ticking = false;
        };

        const onScroll = () => {
            if (!ticking) {
                window.requestAnimationFrame(updateShowcaseState);
                ticking = true;
            }
        };

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', updateShowcaseState);

        // Click on right rail card to smoothly scroll to that slide position
        railCards.forEach((card, idx) => {
            card.addEventListener('click', () => {
                const containerTop = container.offsetTop;
                const containerHeight = container.offsetHeight;
                const windowHeight = window.innerHeight;
                const totalScrollableDistance = containerHeight - windowHeight;
                
                const targetProgress = idx / (totalSlides - 1 || 1);
                const targetScrollY = containerTop + (targetProgress * totalScrollableDistance);

                window.scrollTo({
                    top: targetScrollY,
                    behavior: 'smooth'
                });
            });
        });

        // Initialize state on page load
        updateShowcaseState();
    });
</script>
@endpush
