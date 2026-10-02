@php
    $reels = [
        [
            'id' => 1,
            'title' => 'Chandan Saanjh Sticks',
            'slug' => 'chandan-saanjh',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '2.4k',
            'thumbnail' => 'assets/images/incense-pack.jpg',
            'poster' => 'assets/images/incense-pack.jpg',
            'video_url' => 'assets/videos/reel-video-1.mp4'
        ],
        [
            'id' => 2,
            'title' => 'Swarna Pushpa Sticks',
            'slug' => 'swarna-pushpa',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '3.1k',
            'thumbnail' => 'assets/images/havan-cup.jpg',
            'poster' => 'assets/images/havan-cup.jpg',
            'video_url' => 'assets/videos/reel-video-2.mp4'
        ],
        [
            'id' => 3,
            'title' => 'Divya Naagchampa',
            'slug' => 'divya-naagchampa',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '4.6k',
            'thumbnail' => 'assets/images/incense-pack.jpg',
            'poster' => 'assets/images/incense-pack.jpg',
            'video_url' => 'assets/videos/reel-video-3.mp4'
        ],
        [
            'id' => 4,
            'title' => 'Royal Oudh Sticks',
            'slug' => 'royal-oudh',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '2.8k',
            'thumbnail' => 'assets/images/oudh-pack-card.jpg',
            'poster' => 'assets/images/oudh-pack-card.jpg',
            'video_url' => 'assets/videos/reel-video-1.mp4'
        ],
        [
            'id' => 5,
            'title' => 'Mogra Noor Sticks',
            'slug' => 'mogra-noor',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '5.2k',
            'thumbnail' => 'assets/images/incense-pack.jpg',
            'poster' => 'assets/images/incense-pack.jpg',
            'video_url' => 'assets/videos/reel-video-2.mp4'
        ],
        [
            'id' => 6,
            'title' => 'Gulab Rooh Sticks',
            'slug' => 'gulab-rooh',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '4.9k',
            'thumbnail' => 'assets/images/havan-cup.jpg',
            'poster' => 'assets/images/havan-cup.jpg',
            'video_url' => 'assets/videos/reel-video-3.mp4'
        ],
        [
            'id' => 7,
            'title' => 'Swarna Pushpa 100 Refill',
            'slug' => 'swarna-pushpa',
            'price' => 499,
            'mrp' => 999,
            'discount' => '50% OFF',
            'views' => '6.8k',
            'thumbnail' => 'assets/images/devi-refill-pack-card.jpg',
            'poster' => 'assets/images/devi-refill-pack-card.jpg',
            'video_url' => 'assets/videos/reel-video-1.mp4'
        ],
        [
            'id' => 8,
            'title' => 'Pack of Six Combo (240)',
            'slug' => 'pack-of-six',
            'price' => 1199,
            'mrp' => 1799,
            'discount' => '33% OFF',
            'views' => '5.9k',
            'thumbnail' => 'assets/images/chandan-cones-card.jpg',
            'poster' => 'assets/images/chandan-cones-card.jpg',
            'video_url' => 'assets/videos/reel-video-2.mp4'
        ]
    ];
@endphp

<!-- ========================================================================= -->
<!-- SHOPPABLE VIDEO REELS SECTION (Infinite Loop Slider + Video Modal)        -->
<!-- ========================================================================= -->
<section class="py-12 sm:py-18 bg-white border-b border-[#EAE3D9] overflow-hidden font-body select-none relative" id="shoppable-reels-section">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#831F2E] font-heading">✦ SACRED UNBOXING &amp; RITUALS ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight">
                Experience Divine Fragrance
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Watch how our bamboo-free sacred samagri elevates every home pooja &amp; meditation.
            </p>
        </div>

        <!-- Video Reels Carousel Wrapper -->
        <div class="relative group/reel-container">
            
            <!-- Left Arrow Button -->
            <button 
                type="button" 
                id="reel-scroll-prev"
                class="absolute -left-2 sm:-left-4 top-[40%] -translate-y-1/2 z-30 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/95 hover:bg-[#831F2E] text-[#121212] hover:text-white border border-[#EADBCC] shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95 cursor-pointer"
                aria-label="Previous Videos"
            >
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Right Arrow Button -->
            <button 
                type="button" 
                id="reel-scroll-next"
                class="absolute -right-2 sm:-right-4 top-[40%] -translate-y-1/2 z-30 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/95 hover:bg-[#831F2E] text-[#121212] hover:text-white border border-[#EADBCC] shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95 cursor-pointer"
                aria-label="Next Videos"
            >
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Horizontal Scrollable Rail (Infinite Loop Compatible) -->
            <div 
                id="reels-track"
                class="flex space-x-3.5 sm:space-x-5 overflow-x-auto scrollbar-none pb-4 pt-1 px-1 cursor-grab active:cursor-grabbing select-none scroll-smooth"
                style="-webkit-overflow-scrolling: touch;"
            >
                @foreach($reels as $index => $reel)
                    <div 
                        class="reel-card shrink-0 w-[220px] sm:w-[250px] md:w-[265px] lg:w-[280px] flex flex-col justify-between group cursor-pointer"
                        data-index="{{ $index }}"
                        data-video="{{ asset($reel['video_url']) }}"
                        data-poster="{{ asset($reel['poster']) }}"
                        data-title="{{ $reel['title'] }}"
                        data-price="{{ $reel['price'] }}"
                        data-mrp="{{ $reel['mrp'] }}"
                        data-discount="{{ $reel['discount'] }}"
                        data-thumbnail="{{ asset($reel['thumbnail']) }}"
                        data-slug="{{ $reel['slug'] }}"
                        data-id="{{ $reel['id'] }}"
                    >
                        
                        <!-- 9:16 Video Preview Container -->
                        <div class="relative w-full aspect-[9/16] rounded-[16px] overflow-hidden bg-neutral-900 border border-[#EADBCC] shadow-xs group-hover:shadow-xl group-hover:border-[#D38928] transition-all duration-300 transform group-hover:-translate-y-1">
                            
                            <!-- Video Element (Autoplay Muted Loop Continuous Preview) -->
                            <video 
                                class="reel-preview-video w-full h-full object-cover pointer-events-none"
                                src="{{ asset($reel['video_url']) }}"
                                poster="{{ asset($reel['poster']) }}"
                                autoplay
                                loop
                                muted
                                playsinline
                                preload="auto"
                            ></video>

                            <!-- Subtle Vignette -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-black/30 pointer-events-none"></div>

                            <!-- Top Right View Counter Pill -->
                            <div class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-black/45 backdrop-blur-md border border-white/20 text-white text-[11px] font-bold tracking-wide flex items-center space-x-1.5 pointer-events-none select-none">
                                <svg class="w-3.5 h-3.5 text-white/90" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span>{{ $reel['views'] }}</span>
                            </div>

                            <!-- Bottom Watch Video Text -->
                            <div class="absolute bottom-3 inset-x-3 text-center pointer-events-none">
                                <span class="inline-block bg-black/50 backdrop-blur-xs px-3 py-1 rounded-full text-white text-[11px] font-semibold border border-white/15">
                                    ▶ Tap to Watch
                                </span>
                            </div>

                        </div>

                        <!-- Bottom Product Card Row -->
                        <div class="mt-3 bg-white p-2.5 sm:p-3 rounded-[12px] border border-[#EADBCC] shadow-xs space-y-2">
                            
                            <!-- Product Mini Info Row -->
                            <div class="flex items-center space-x-2.5">
                                <!-- Square Thumbnail -->
                                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-[8px] border border-[#EADBCC] p-0.5 bg-[#FAF7F2] shrink-0 overflow-hidden flex items-center justify-center">
                                    <img 
                                        src="{{ asset($reel['thumbnail']) }}" 
                                        alt="{{ $reel['title'] }}" 
                                        class="w-full h-full object-cover rounded-[6px]"
                                    >
                                </div>

                                <!-- Title and Pricing -->
                                <div class="min-w-0 flex-1">
                                    <h4 class="text-xs sm:text-[13px] font-bold font-serif text-[#1F1F1F] truncate leading-tight">
                                        {{ $reel['title'] }}
                                    </h4>
                                    <div class="flex items-baseline space-x-1.5 pt-0.5">
                                        <span class="text-xs sm:text-sm font-black font-heading text-[#1F1F1F]">
                                            ₹{{ $reel['price'] }}
                                        </span>
                                        <span class="text-[11px] text-gray-400 line-through">
                                            ₹{{ $reel['mrp'] }}
                                        </span>
                                        <span class="text-[11px] font-bold text-[#15803D]">
                                            {{ $reel['discount'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Add to Cart Full Width Dark Button (Direct to Cart Drawer without redirecting to inner page) -->
                            <button 
                                type="button" 
                                class="quick-add-to-cart-btn w-full py-2.5 px-3 bg-[#831F2E] hover:bg-[#6E1724] active:bg-[#57121C] text-white text-xs sm:text-sm font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 flex items-center justify-center space-x-1.5 font-heading cursor-pointer focus:outline-none"
                                data-product-id="{{ $reel['id'] }}"
                                data-product-title="{{ $reel['title'] }}"
                                data-product-slug="{{ $reel['slug'] }}"
                                data-product-price="{{ $reel['price'] }}"
                                data-product-image="{{ asset($reel['thumbnail']) }}"
                                onclick="event.stopPropagation();"
                            >
                                <span>Add to Cart</span>
                            </button>

                        </div>

                    </div>
                @endforeach
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- EXACT 3D COVERFLOW REELS LIGHTBOX MODAL (Matches Reference Screenshot)    -->
<!-- ========================================================================= -->
<div 
    id="reel-video-modal" 
    class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center opacity-0 pointer-events-none transition-all duration-300 font-body select-none overflow-hidden"
>
    <!-- Modal Backdrop Click Area -->
    <div class="absolute inset-0" id="reel-modal-backdrop"></div>

    <!-- Top Right Floating Close Button -->
    <button 
        type="button" 
        id="reel-modal-close"
        class="absolute top-4 right-4 sm:top-6 sm:right-8 z-40 w-11 h-11 rounded-full bg-white/20 hover:bg-white text-white hover:text-black flex items-center justify-center backdrop-blur-md border border-white/30 transition-all duration-200 cursor-pointer shadow-2xl focus:outline-none"
        aria-label="Close Reel"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>

    <!-- 3D Carousel Stage Container -->
    <div class="relative z-20 w-full max-w-5xl h-full max-h-[90vh] flex items-center justify-center px-4 sm:px-12">
        
        <!-- Left Flanking Card (Previous Reel Preview) -->
        <div 
            id="modal-card-prev"
            class="hidden md:flex flex-col w-[260px] aspect-[9/16] rounded-[22px] overflow-hidden bg-neutral-900 border border-white/10 shadow-2xl opacity-40 scale-85 -mr-16 cursor-pointer hover:opacity-75 transition-all duration-300 z-10 shrink-0 select-none"
            title="Previous Reel"
        >
            <img id="modal-prev-poster" src="" alt="Prev Reel" class="w-full h-full object-cover">
        </div>

        <!-- Center Active Reel Card (Main Playing Reel with Shoppable UI) -->
        <div 
            id="modal-card-active"
            class="relative z-30 w-full max-w-[340px] sm:max-w-[370px] md:max-w-[385px] aspect-[9/16] bg-black rounded-[24px] overflow-hidden border border-white/20 shadow-2xl flex flex-col justify-between shrink-0 transition-transform duration-300"
        >
            <!-- Top Drag Handle Pill -->
            <div class="absolute top-2.5 inset-x-0 z-30 flex justify-center pointer-events-none">
                <div class="w-12 h-1 bg-white/70 rounded-full shadow-xs"></div>
            </div>

            <!-- Video Player -->
            <video 
                id="modal-reel-video"
                class="absolute inset-0 w-full h-full object-cover cursor-pointer"
                autoplay
                playsinline
                loop
            ></video>

            <!-- Gradient Shadow for Bottom Text Legibility -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent pointer-events-none z-10"></div>

            <!-- Right Vertical Social Actions Rail -->
            <div class="absolute right-3 bottom-28 sm:bottom-32 z-20 flex flex-col items-center space-y-3.5">
                <!-- Like Button -->
                <button 
                    type="button" 
                    id="modal-like-btn"
                    class="flex flex-col items-center text-white group cursor-pointer focus:outline-none"
                    aria-label="Like Video"
                >
                    <div class="w-10 h-10 rounded-full bg-black/40 backdrop-blur-md border border-white/25 flex items-center justify-center text-white group-hover:scale-110 group-active:scale-95 transition-all duration-200">
                        <svg id="modal-heart-icon" class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <span id="modal-like-count" class="text-[11px] font-bold text-white/90 drop-shadow-md mt-1">299 Likes</span>
                </button>

                <!-- More Options (Three Dots) -->
                <button 
                    type="button" 
                    class="w-8 h-8 rounded-full bg-black/30 backdrop-blur-xs flex items-center justify-center text-white/80 hover:text-white cursor-pointer"
                    aria-label="More Options"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>

            <!-- Bottom Left Mute Toggle Button -->
            <div class="absolute left-3 bottom-28 sm:bottom-32 z-20">
                <button 
                    type="button" 
                    id="modal-mute-btn"
                    class="px-3 py-1 rounded-full bg-black/50 backdrop-blur-md border border-white/20 text-white text-xs font-semibold flex items-center space-x-1.5 hover:bg-black/70 cursor-pointer shadow-lg transition-all"
                >
                    <svg id="modal-volume-icon" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                    </svg>
                    <span id="modal-mute-label">Mute</span>
                </button>
            </div>

            <!-- Bottom Shoppable Product Overlay Card (Exact Match to Screenshot) -->
            <div class="relative z-20 p-3 sm:p-3.5 mt-auto">
                <div class="bg-black/55 backdrop-blur-md border border-white/20 p-2.5 rounded-[16px] shadow-2xl space-y-2.5">
                    
                    <!-- Product Info Row -->
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center space-x-2.5 min-w-0 flex-1">
                            <!-- Thumbnail -->
                            <div class="w-11 h-11 rounded-[8px] bg-white p-0.5 border border-white/30 shrink-0 overflow-hidden">
                                <img id="modal-product-img" src="" alt="Product Thumbnail" class="w-full h-full object-cover rounded-[6px]">
                            </div>

                            <!-- Title & Pricing -->
                            <div class="min-w-0 flex-1 text-left">
                                <h4 id="modal-product-title" class="text-xs sm:text-[13px] font-bold text-white truncate drop-shadow-xs font-serif leading-tight">
                                    Nagchampa Refill Pack
                                </h4>
                                <div class="flex items-baseline space-x-1.5 pt-0.5">
                                    <span id="modal-product-price" class="text-xs sm:text-sm font-black text-white font-heading">₹489</span>
                                    <span id="modal-product-mrp" class="text-[11px] text-white/60 line-through">₹700</span>
                                    <span id="modal-product-discount" class="text-[11px] font-bold text-[#4ADE80]">30% OFF</span>
                                </div>
                            </div>
                        </div>

                        <!-- Mini Peek Box on the right (Next item preview) -->
                        <div class="w-10 h-10 rounded-[8px] bg-white/20 backdrop-blur-md border border-white/30 shrink-0 overflow-hidden hidden sm:flex items-center justify-center p-0.5 opacity-80 hover:opacity-100 transition-opacity">
                            <img id="modal-peek-img" src="" alt="Peek" class="w-full h-full object-cover rounded-[6px]">
                        </div>
                    </div>

                    <!-- Action Row: Full Width White Add-To-Cart Button -->
                    <div class="flex items-center space-x-2">
                        <button 
                            type="button" 
                            id="modal-add-to-cart-btn"
                            class="quick-add-to-cart-btn flex-1 py-2.5 px-4 bg-white hover:bg-amber-50 active:bg-amber-100 text-[#121212] font-black text-xs sm:text-sm rounded-[10px] shadow-lg transition-all duration-200 transform active:scale-95 flex items-center justify-center space-x-1.5 font-heading cursor-pointer focus:outline-none"
                            data-product-id="1"
                            data-product-title=""
                            data-product-slug=""
                            data-product-price=""
                            data-product-image=""
                        >
                            <span>Add to Cart</span>
                        </button>
                        
                        <!-- Mini Quick Buy Icon Button -->
                        <button 
                            type="button"
                            id="modal-quick-bag-btn"
                            class="w-9 h-9 rounded-[10px] bg-white/20 hover:bg-white/30 backdrop-blur-md border border-white/30 text-white flex items-center justify-center transition-all cursor-pointer shrink-0"
                            aria-label="Direct Bag"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </button>
                    </div>

                </div>

                <!-- Powered by text -->
                <div class="text-center pt-2">
                    <span class="text-[10px] tracking-wider text-white/50 font-medium">✦ powered by ReelCart</span>
                </div>
            </div>

        </div>

        <!-- Right Flanking Card (Next Reel Preview) -->
        <div 
            id="modal-card-next"
            class="hidden md:flex flex-col w-[260px] aspect-[9/16] rounded-[22px] overflow-hidden bg-neutral-900 border border-white/10 shadow-2xl opacity-40 scale-85 -ml-16 cursor-pointer hover:opacity-75 transition-all duration-300 z-10 shrink-0 select-none"
            title="Next Reel"
        >
            <img id="modal-next-poster" src="" alt="Next Reel" class="w-full h-full object-cover">
        </div>

        <!-- Right Navigation Arrow Button (Prominent Circular Button like in screenshot) -->
        <button 
            type="button" 
            id="modal-next-arrow"
            class="absolute right-2 sm:right-0 top-1/2 -translate-y-1/2 z-40 w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-white text-[#121212] hover:bg-[#831F2E] hover:text-white flex items-center justify-center shadow-2xl transition-all duration-200 transform hover:scale-110 active:scale-95 cursor-pointer border border-black/10 focus:outline-none"
            aria-label="Next Reel"
        >
            <svg class="w-6 h-6 sm:w-7 sm:h-7 ml-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

    </div>
</div>

<!-- ========================================================================= -->
<!-- SCRIPT: INFINITE LOOP SLIDER & MODAL INTERACTION                          -->
<!-- ========================================================================= -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const track = document.getElementById('reels-track');
        const prevBtn = document.getElementById('reel-scroll-prev');
        const nextBtn = document.getElementById('reel-scroll-next');
        const cards = document.querySelectorAll('.reel-card');

        // Modal Elements
        const modal = document.getElementById('reel-video-modal');
        const modalBackdrop = document.getElementById('reel-modal-backdrop');
        const modalClose = document.getElementById('reel-modal-close');
        const modalVideo = document.getElementById('modal-reel-video');
        const modalImg = document.getElementById('modal-product-img');
        const modalPeekImg = document.getElementById('modal-peek-img');
        const modalTitle = document.getElementById('modal-product-title');
        const modalPrice = document.getElementById('modal-product-price');
        const modalMrp = document.getElementById('modal-product-mrp');
        const modalDiscount = document.getElementById('modal-product-discount');
        const modalCartBtn = document.getElementById('modal-add-to-cart-btn');
        const modalQuickBagBtn = document.getElementById('modal-quick-bag-btn');
        const modalMuteBtn = document.getElementById('modal-mute-btn');
        const modalMuteLabel = document.getElementById('modal-mute-label');
        const modalLikeBtn = document.getElementById('modal-like-btn');
        const modalHeartIcon = document.getElementById('modal-heart-icon');
        const modalLikeCount = document.getElementById('modal-like-count');
        const modalNextArrow = document.getElementById('modal-next-arrow');
        const modalCardPrev = document.getElementById('modal-card-prev');
        const modalCardNext = document.getElementById('modal-card-next');
        const modalPrevPoster = document.getElementById('modal-prev-poster');
        const modalNextPoster = document.getElementById('modal-next-poster');

        let currentReelIndex = 0;
        let isMuted = false;
        let isLiked = false;
        const totalCards = cards.length;

        // ---------------------------------------------------------------------
        // 1. INFINITE LOOP SCROLLER
        // ---------------------------------------------------------------------
        const getCardWidth = () => {
            if (!cards[0]) return 280;
            return cards[0].offsetWidth + 16; // width + gap
        };

        const scrollNext = () => {
            if (!track) return;
            const maxScroll = track.scrollWidth - track.clientWidth;
            if (track.scrollLeft >= maxScroll - 10) {
                track.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                track.scrollBy({ left: getCardWidth(), behavior: 'smooth' });
            }
        };

        const scrollPrev = () => {
            if (!track) return;
            if (track.scrollLeft <= 10) {
                track.scrollTo({ left: track.scrollWidth, behavior: 'smooth' });
            } else {
                track.scrollBy({ left: -getCardWidth(), behavior: 'smooth' });
            }
        };

        if (nextBtn) nextBtn.addEventListener('click', scrollNext);
        if (prevBtn) prevBtn.addEventListener('click', scrollPrev);

        // Auto Loop Interval (continuous smooth loop)
        let autoLoopTimer = setInterval(scrollNext, 4500);

        if (track) {
            track.addEventListener('mouseenter', () => clearInterval(autoLoopTimer));
            track.addEventListener('mouseleave', () => {
                clearInterval(autoLoopTimer);
                autoLoopTimer = setInterval(scrollNext, 4500);
            });
            track.addEventListener('touchstart', () => clearInterval(autoLoopTimer), { passive: true });
        }

        // Mouse Drag to Scroll
        let isDown = false;
        let startX;
        let scrollLeft;

        if (track) {
            track.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - track.offsetLeft;
                scrollLeft = track.scrollLeft;
            });
            track.addEventListener('mouseleave', () => { isDown = false; });
            track.addEventListener('mouseup', () => { isDown = false; });
            track.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - track.offsetLeft;
                const walk = (x - startX) * 1.5;
                track.scrollLeft = scrollLeft - walk;
            });
        }

        // ---------------------------------------------------------------------
        // 2. VIDEO POPUP MODAL (3D Coverflow Lightbox)
        // ---------------------------------------------------------------------
        const openReelModal = (index) => {
            if (index < 0) index = totalCards - 1;
            if (index >= totalCards) index = 0;
            currentReelIndex = index;

            const card = cards[currentReelIndex];
            if (!card) return;

            const prevIndex = (currentReelIndex - 1 + totalCards) % totalCards;
            const nextIndex = (currentReelIndex + 1) % totalCards;

            const videoSrc = card.getAttribute('data-video');
            const posterSrc = card.getAttribute('data-poster');
            const title = card.getAttribute('data-title');
            const price = card.getAttribute('data-price');
            const mrp = card.getAttribute('data-mrp');
            const discount = card.getAttribute('data-discount');
            const thumbnail = card.getAttribute('data-thumbnail');
            const slug = card.getAttribute('data-slug');
            const id = card.getAttribute('data-id');

            // Flanking card posters
            if (modalPrevPoster && cards[prevIndex]) {
                modalPrevPoster.src = cards[prevIndex].getAttribute('data-poster');
            }
            if (modalNextPoster && cards[nextIndex]) {
                modalNextPoster.src = cards[nextIndex].getAttribute('data-poster');
            }
            if (modalPeekImg && cards[nextIndex]) {
                modalPeekImg.src = cards[nextIndex].getAttribute('data-thumbnail');
            }

            // Populate Active Modal Video & Details
            if (modalVideo) {
                modalVideo.src = videoSrc;
                modalVideo.poster = posterSrc;
                modalVideo.muted = isMuted;
                modalVideo.currentTime = 0;
                modalVideo.play().catch(() => {
                    modalVideo.muted = true;
                    isMuted = true;
                    updateMuteUI();
                    modalVideo.play();
                });
            }

            if (modalImg) modalImg.src = thumbnail;
            if (modalTitle) modalTitle.textContent = title;
            if (modalPrice) modalPrice.textContent = '₹' + price;
            if (modalMrp) modalMrp.textContent = '₹' + mrp;
            if (modalDiscount) modalDiscount.textContent = discount;

            // Set cart dataset on modal cart buttons
            if (modalCartBtn) {
                modalCartBtn.setAttribute('data-product-id', id);
                modalCartBtn.setAttribute('data-product-title', title);
                modalCartBtn.setAttribute('data-product-slug', slug);
                modalCartBtn.setAttribute('data-product-price', price);
                modalCartBtn.setAttribute('data-product-image', thumbnail);
            }

            if (modalQuickBagBtn && modalCartBtn) {
                modalQuickBagBtn.onclick = (e) => {
                    e.stopPropagation();
                    modalCartBtn.click();
                };
            }

            // Reset like state
            isLiked = false;
            updateLikeUI();

            // Show Modal
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                requestAnimationFrame(() => {
                    modal.classList.remove('opacity-0', 'pointer-events-none');
                    modal.classList.add('opacity-100', 'pointer-events-auto');
                });
                document.body.style.overflow = 'hidden';
            }
        };

        const closeReelModal = () => {
            if (modal) {
                modal.classList.add('opacity-0', 'pointer-events-none');
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                setTimeout(() => {
                    if (modal.classList.contains('opacity-0')) {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                    }
                }, 300);
                document.body.style.overflow = '';
            }
            if (modalVideo) {
                modalVideo.pause();
                modalVideo.src = '';
            }
        };

        const updateMuteUI = () => {
            if (modalMuteLabel) {
                modalMuteLabel.textContent = isMuted ? 'Unmute' : 'Mute';
            }
        };

        if (modalVideo) {
            modalVideo.addEventListener('click', (e) => {
                e.stopPropagation();
                const indicator = document.getElementById('modal-play-indicator');
                const playIcon = document.getElementById('modal-play-icon');
                const pauseIcon = document.getElementById('modal-pause-icon');
                
                if (modalVideo.paused) {
                    modalVideo.play();
                    if (playIcon) playIcon.classList.remove('hidden');
                    if (pauseIcon) pauseIcon.classList.add('hidden');
                } else {
                    modalVideo.pause();
                    if (playIcon) playIcon.classList.add('hidden');
                    if (pauseIcon) pauseIcon.classList.remove('hidden');
                }

                if (indicator) {
                    indicator.classList.remove('opacity-0');
                    indicator.classList.add('opacity-100');
                    setTimeout(() => {
                        indicator.classList.remove('opacity-100');
                        indicator.classList.add('opacity-0');
                    }, 400);
                }
            });
        }

        if (modalMuteBtn) {
            modalMuteBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (!modalVideo) return;
                isMuted = !isMuted;
                modalVideo.muted = isMuted;
                updateMuteUI();
            });
        }

        const updateLikeUI = () => {
            if (modalHeartIcon) {
                if (isLiked) {
                    modalHeartIcon.setAttribute('fill', '#EF4444');
                    modalHeartIcon.classList.add('text-red-500');
                    if (modalLikeCount) modalLikeCount.textContent = '300 Likes';
                } else {
                    modalHeartIcon.setAttribute('fill', 'none');
                    modalHeartIcon.classList.remove('text-red-500');
                    if (modalLikeCount) modalLikeCount.textContent = '299 Likes';
                }
            }
        };

        if (modalLikeBtn) {
            modalLikeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                isLiked = !isLiked;
                updateLikeUI();
            });
        }

        // Flanking card clicks & Next Arrow
        if (modalCardPrev) {
            modalCardPrev.addEventListener('click', (e) => {
                e.stopPropagation();
                openReelModal(currentReelIndex - 1);
            });
        }

        if (modalCardNext) {
            modalCardNext.addEventListener('click', (e) => {
                e.stopPropagation();
                openReelModal(currentReelIndex + 1);
            });
        }

        if (modalNextArrow) {
            modalNextArrow.addEventListener('click', (e) => {
                e.stopPropagation();
                openReelModal(currentReelIndex + 1);
            });
        }

        // Attach click listeners to cards on main grid
        cards.forEach((card, index) => {
            card.addEventListener('click', (e) => {
                if (e.target.closest('button')) return;
                openReelModal(index);
            });
        });

        if (modalClose) modalClose.addEventListener('click', closeReelModal);
        if (modalBackdrop) modalBackdrop.addEventListener('click', closeReelModal);

        // Close on ESC key or Arrow Navigation
        document.addEventListener('keydown', (e) => {
            if (modal && !modal.classList.contains('pointer-events-none')) {
                if (e.key === 'Escape') closeReelModal();
                if (e.key === 'ArrowRight') openReelModal(currentReelIndex + 1);
                if (e.key === 'ArrowLeft') openReelModal(currentReelIndex - 1);
            }
        });

        // Continuous Autoplay Muted Previews in Card Grid
        const previewVideos = document.querySelectorAll('.reel-preview-video');
        const startAllPreviewVideos = () => {
            previewVideos.forEach(video => {
                video.muted = true;
                video.loop = true;
                const playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.catch(() => {
                        // If browser restricts unmuted/initial autoplay, retry on user interaction
                        const startOnInteract = () => {
                            video.play().catch(() => {});
                        };
                        window.addEventListener('scroll', startOnInteract, { once: true, passive: true });
                        window.addEventListener('touchstart', startOnInteract, { once: true, passive: true });
                        window.addEventListener('click', startOnInteract, { once: true, passive: true });
                    });
                }
            });
        };

        startAllPreviewVideos();
    });
</script>
