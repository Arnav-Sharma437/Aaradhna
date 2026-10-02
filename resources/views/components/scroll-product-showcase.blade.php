@props([
    'products' => null
])

@php
    // Curated high-end spiritual products matching the editorial reference layout
    $items = $products ?? collect([
        (object)[
            'id' => 1,
            'title' => 'Swarna Pushpa Bambooless',
            'slug' => 'swarna-pushpa',
            'subtitle' => '40 Bambooless Sticks • Sacred Marigold & Saffron',
            'active_price' => 399.00,
            'image' => 'assets/images/oudh-pack-card.jpg',
            'lifestyle' => 'assets/images/oudh-pack-card.jpg',
        ],
        (object)[
            'id' => 2,
            'title' => 'Chandan Saanjh Sticks',
            'slug' => 'chandan-saanjh',
            'subtitle' => '40 Sticks • 0% Charcoal Purity',
            'active_price' => 399.00,
            'image' => 'assets/images/incense-pack.jpg',
            'lifestyle' => 'assets/images/incense-pack.jpg',
        ],
        (object)[
            'id' => 3,
            'title' => 'Royal Oudh Incense',
            'slug' => 'royal-oudh',
            'subtitle' => '40 Sticks • Ancient Assam Agarwood',
            'active_price' => 399.00,
            'image' => 'assets/images/oudh-pack-card.jpg',
            'lifestyle' => 'assets/images/oudh-pack-card.jpg',
        ],
        (object)[
            'id' => 4,
            'title' => 'Divya Naagchampa Sticks',
            'slug' => 'divya-naagchampa',
            'subtitle' => '40 Sticks • Temple Blend & Vedic Herbs',
            'active_price' => 399.00,
            'image' => 'assets/images/chandan-cones-card.jpg',
            'lifestyle' => 'assets/images/chandan-cones-card.jpg',
        ],
        (object)[
            'id' => 5,
            'title' => 'Manglam Pack of Six (240)',
            'slug' => 'pack-of-six',
            'subtitle' => '6 Luxury Fragrances Combo Pack',
            'active_price' => 1199.00,
            'image' => 'assets/images/havan-cup.jpg',
            'lifestyle' => 'assets/images/havan-cup.jpg',
        ],
    ]);

    $totalItems = count($items);
@endphp

<!-- ========================================================================= -->
<!-- EXACT REFERENCE REPLICA: STICKY HORIZONTAL VISUAL CANVAS + VERTICAL RAIL  -->
<!-- ========================================================================= -->
<section 
    id="exact-scroll-showcase" 
    class="relative w-full bg-[#E5ECEF] border-b border-[#D0DCE1] select-none"
    style="height: {{ max(350, $totalItems * 100) }}vh;"
    data-total="{{ $totalItems }}"
>
    <!-- Sticky Full-Screen Viewport Stage -->
    <div class="sticky top-0 h-screen w-full flex items-stretch overflow-hidden font-body">
        
        <!-- ===================================================================== -->
        <!-- 1. LEFT MAIN VISUAL CANVAS (~75-80% Width)                            -->
        <!-- Wide panoramic runway showing MULTIPLE products across the stage      -->
        <!-- ===================================================================== -->
        <div class="w-full lg:w-[78%] h-full relative overflow-hidden bg-[#E5ECEF] flex flex-col justify-between p-6 sm:p-10 lg:p-14">
            
            <!-- Top Editorial Header (Exact match to reference "Spring Summer 2026") -->
            <div class="max-w-md z-20 space-y-2">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading text-[#121212] tracking-tight leading-none">
                    Pavitra Collection 2026
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 font-light leading-relaxed">
                    Every sacred samagri is handcrafted with ancient Vedic vidhi to bring effortless serenity, purity, and divine blessings into your home temple.
                </p>
            </div>

            <!-- Horizontal Visual Stage for Floating Figures / Products -->
            <div class="relative flex-1 w-full flex items-center justify-center min-h-0 my-auto overflow-visible">
                
                <!-- Track that translates horizontally based on scroll progress -->
                <div id="showcase-horizontal-track" class="relative w-full h-full flex items-center justify-center will-change-transform">
                    
                    @foreach($items as $index => $item)
                        <!-- Each Visual Pack Item placed along the horizontal axis -->
                        <div 
                            class="showcase-visual-item absolute top-1/2 left-1/2 -translate-y-1/2 flex flex-col items-center justify-center will-change-transform transition-all duration-75"
                            data-index="{{ $index }}"
                        >
                            <!-- Elegant Frameless Clean Visual -->
                            <div class="visual-img-container relative flex items-center justify-center p-2">
                                <img 
                                    src="{{ asset($item->image) }}" 
                                    alt="{{ $item->title }}"
                                    class="max-h-[340px] sm:max-h-[440px] lg:max-h-[520px] w-auto object-contain drop-shadow-2xl rounded-[24px]"
                                >
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            <!-- Bottom Progress & Vedic Signature -->
            <div class="flex items-center justify-between text-xs text-gray-500 z-20 pt-4">
                <span class="font-serif italic text-gray-600">« शुद्धं समर्पयामि • 100% Bamboo-Free &amp; 0% Charcoal »</span>
                <div class="flex items-center space-x-2">
                    <span class="text-[10px] uppercase tracking-widest font-heading font-bold text-[#965A15]">Scroll to explore</span>
                    <span class="animate-bounce">↓</span>
                </div>
            </div>

        </div>

        <!-- ===================================================================== -->
        <!-- 2. RIGHT VERTICAL PRODUCT RAIL (~20-22% Width)                        -->
        <!-- Narrow column with stacked rounded cards moving UPWARD continuously    -->
        <!-- ===================================================================== -->
        <div class="hidden lg:flex w-[22%] h-full relative bg-[#E5ECEF] border-l border-[#D0DCE1] flex-col justify-center px-4 py-8 overflow-hidden">
            
            <!-- Soft Gradient Fade Top & Bottom -->
            <div class="absolute top-0 inset-x-0 h-16 bg-gradient-to-b from-[#E5ECEF] to-transparent z-10 pointer-events-none"></div>
            <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-[#E5ECEF] to-transparent z-10 pointer-events-none"></div>

            <!-- Vertical Rail Container (Translates Upward) -->
            <div id="showcase-rail-track" class="flex flex-col space-y-4 will-change-transform">
                
                @foreach($items as $index => $item)
                    <!-- Single Product Card (Exact match to Reference: Square Image on Top, Title + Price below) -->
                    <div 
                        class="showcase-rail-card bg-white rounded-[22px] p-4 shadow-sm border border-transparent hover:border-[#D38928]/40 transition-all duration-300 cursor-pointer group flex flex-col justify-between"
                        data-rail-index="{{ $index }}"
                    >
                        <!-- Square Product Image Container -->
                        <div class="w-full aspect-square rounded-[16px] bg-[#F7FAFA] overflow-hidden flex items-center justify-center p-3 mb-3 border border-gray-100 group-hover:scale-[1.03] transition-transform duration-300">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-contain">
                        </div>

                        <!-- Product Title & Price -->
                        <div class="space-y-1 text-left">
                            <h4 class="text-xs sm:text-[13px] font-normal font-body text-[#1F1F1F] group-hover:text-[#D38928] transition-colors truncate">
                                {{ $item->title }}
                            </h4>
                            <div class="text-xs sm:text-sm font-bold font-body text-[#C87A1E]">
                                ₹{{ number_format($item->active_price, 2) }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Floating Back-to-Top Button (from reference) -->
            <button 
                type="button" 
                id="showcase-scroll-top-btn"
                class="absolute bottom-6 right-6 z-20 w-10 h-10 rounded-full bg-white text-[#121212] hover:bg-[#D38928] hover:text-white flex items-center justify-center shadow-md border border-gray-200 transition-all duration-200 focus:outline-none cursor-pointer"
                aria-label="Scroll Top"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/></svg>
            </button>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- MATHEMATICAL SCROLL-DRIVEN CONTINUOUS ENGINE                              -->
<!-- ========================================================================= -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const showcaseSection = document.getElementById('exact-scroll-showcase');
        if (!showcaseSection) return;

        const visualItems = showcaseSection.querySelectorAll('.showcase-visual-item');
        const railTrack = document.getElementById('showcase-rail-track');
        const railCards = showcaseSection.querySelectorAll('.showcase-rail-card');
        const scrollTopBtn = document.getElementById('showcase-scroll-top-btn');

        const total = parseInt(showcaseSection.dataset.total) || visualItems.length;
        let ticking = false;

        // Base horizontal spacing between items in viewport units / pixels
        const getItemSpacing = () => {
            const width = window.innerWidth;
            if (width >= 1280) return 420;
            if (width >= 1024) return 340;
            if (width >= 640) return 260;
            return 200;
        };

        const updateExactShowcase = () => {
            const rect = showcaseSection.getBoundingClientRect();
            const sectionHeight = showcaseSection.offsetHeight;
            const windowHeight = window.innerHeight;

            const totalScrollable = sectionHeight - windowHeight;
            if (totalScrollable <= 0) return;

            // Compute normalized progress [0.0 ... 1.0]
            const scrolledDistance = -rect.top;
            const progress = Math.min(Math.max(scrolledDistance / totalScrollable, 0), 1);

            // Fractional active index from 0 to total - 1
            const continuousIndex = progress * (total - 1);
            const activeIndex = Math.round(continuousIndex);
            const spacing = getItemSpacing();

            // 1. HORIZONTAL PHYSICAL MOVEMENT & PERSPECTIVE SCALING ACROSS LEFT CANVAS
            visualItems.forEach((item, i) => {
                // Offset from the continuous virtual center
                const offset = i - continuousIndex;
                
                // Horizontal coordinate relative to center of visual stage
                const xPos = offset * spacing;
                
                // Distance to absolute center (0 = perfectly centered)
                const distToCenter = Math.abs(offset);

                // Scale formula: 1.0 at center, scaling down to 0.70 at sides
                const scale = Math.max(0.68, 1.0 - (distToCenter * 0.28));
                
                // Opacity formula: 1.0 at center, fading down to 0.25 at sides
                const opacity = Math.max(0.20, 1.0 - (distToCenter * 0.55));
                
                // Blur formula: 0px at center, increasing to 8px blur at sides
                const blur = Math.min(8, distToCenter * 4.5);

                // Z-index: centered element always stays on top
                const zIndex = Math.round((1 - Math.min(distToCenter, 1)) * 30);

                item.style.transform = `translate(-50%, -50%) translateX(${xPos.toFixed(1)}px) scale(${scale.toFixed(3)})`;
                item.style.opacity = opacity.toFixed(3);
                item.style.filter = `blur(${blur.toFixed(1)}px)`;
                item.style.zIndex = zIndex;
            });

            // 2. VERTICAL RAIL SYNCHRONIZED CONTINUOUS UPWARD MOVEMENT
            if (railTrack && railCards.length > 0) {
                const cardHeight = railCards[0].offsetHeight + 16; // height + gap
                const totalRailDistance = (total - 1) * cardHeight;
                const railTranslateY = -(progress * totalRailDistance);

                railTrack.style.transform = `translateY(${railTranslateY.toFixed(1)}px)`;

                // Highlight active card
                railCards.forEach((card, idx) => {
                    if (idx === activeIndex) {
                        card.classList.add('ring-2', 'ring-[#D38928]', 'shadow-lg');
                        card.classList.remove('opacity-60');
                    } else {
                        card.classList.remove('ring-2', 'ring-[#D38928]', 'shadow-lg');
                        card.classList.add('opacity-60');
                    }
                });
            }

            ticking = false;
        };

        const onScroll = () => {
            if (!ticking) {
                window.requestAnimationFrame(updateExactShowcase);
                ticking = true;
            }
        };

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', updateExactShowcase);

        // Click on right rail card smoothly scrolls directly to that item
        railCards.forEach((card, idx) => {
            card.addEventListener('click', () => {
                const sectionTop = showcaseSection.offsetTop;
                const sectionHeight = showcaseSection.offsetHeight;
                const windowHeight = window.innerHeight;
                const totalScrollable = sectionHeight - windowHeight;
                
                const targetProgress = idx / (total - 1);
                const targetScrollY = sectionTop + (targetProgress * totalScrollable);

                window.scrollTo({
                    top: targetScrollY,
                    behavior: 'smooth'
                });
            });
        });

        if (scrollTopBtn) {
            scrollTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: showcaseSection.offsetTop,
                    behavior: 'smooth'
                });
            });
        }

        // Initialize state on page load
        updateExactShowcase();
    });
</script>
@endpush
