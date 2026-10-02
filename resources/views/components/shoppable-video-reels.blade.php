@php
    $reels = [
        [
            'id' => 1,
            'title' => 'Chandan Saanjh Sticks',
            'subtitle' => 'Sacred Mysore Sandalwood Dhoop',
            'slug' => 'chandan-saanjh',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '1.2k',
            'likes' => '380 Likes',
            'rating' => '4.9 (1,240 Reviews)',
            'thumbnail' => 'assets/images/incense-pack.jpg',
            'poster' => 'assets/images/incense-pack.jpg',
            'video_url' => 'assets/videos/reel-video-1.mp4',
            'why_choose' => [
                '100% Charcoal-Free & Bamboo-Less',
                'Pure Mysore Sandalwood & Natural Herbs',
                '45+ Mins Long Burning Time per Stick',
                'Zero Toxic Smoke, 100% Organic'
            ],
            'perfect_for' => [
                'Daily Morning & Evening Puja',
                'Meditation, Yoga & Stress Relief',
                'Purifying Home Energy & Aura'
            ]
        ],
        [
            'id' => 2,
            'title' => 'Swarna Pushpa Sticks',
            'subtitle' => 'Divine Marigold & Rose Fusion',
            'slug' => 'swarna-pushpa',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '2.4k',
            'likes' => '492 Likes',
            'rating' => '4.9 (980 Reviews)',
            'thumbnail' => 'assets/images/devi-refill-pack-card.jpg',
            'poster' => 'assets/images/devi-refill-pack-card.jpg',
            'video_url' => 'assets/videos/reel-video-2.mp4',
            'why_choose' => [
                'Crafted with Sacred Temple Flowers',
                'No Synthetic Charcoal or Chemicals',
                'Calming Floral Vedic Aroma',
                'Long-lasting Fragrance Residue'
            ],
            'perfect_for' => [
                'Daily Temple & Home Deity Worship',
                'Festive Havans & Ceremonies',
                'Elevating Peace and Positive Vibes'
            ]
        ],
        [
            'id' => 3,
            'title' => 'Divya Naagchampa',
            'subtitle' => 'Authentic Sacred Floral Woods',
            'slug' => 'divya-naagchampa',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '3.8k',
            'likes' => '610 Likes',
            'rating' => '4.8 (850 Reviews)',
            'thumbnail' => 'assets/images/single-bambooless-stick.jpg',
            'poster' => 'assets/images/single-bambooless-stick.jpg',
            'video_url' => 'assets/videos/reel-video-3.mp4',
            'why_choose' => [
                'Original Naagchampa Resin & Essential Oils',
                'Deep, Grounding Earthy Fragrance',
                'Non-Irritant & Smoke-Free Formulation',
                'Hand-rolled by Traditional Vedic Artisans'
            ],
            'perfect_for' => [
                'Deep Spiritual Dhyan & Sadhana',
                'Spiritual Gatherings & Satsang',
                'Relaxation after a Long Day'
            ]
        ],
        [
            'id' => 4,
            'title' => 'Royal Oudh Sticks',
            'subtitle' => 'Pure Assam Agarwood Essence',
            'slug' => 'royal-oudh',
            'price' => 399,
            'mrp' => 499,
            'discount' => '20% OFF',
            'views' => '4.1k',
            'likes' => '725 Likes',
            'rating' => '5.0 (1,450 Reviews)',
            'thumbnail' => 'assets/images/oudh-pack-card.jpg',
            'poster' => 'assets/images/oudh-pack-card.jpg',
            'video_url' => 'assets/videos/reel-video-1.mp4',
            'why_choose' => [
                'Pure Rich Assam Agarwood Extract',
                'Opulent Long-lasting Royalty Aroma',
                'Zero Bamboo or Carbon Fillers',
                'Soothes the Nervous System'
            ],
            'perfect_for' => [
                'Evening Sandhya Aarti & Reflection',
                'Welcoming Honored Guests & Festivities',
                'Creating a Sacred Sanctuary at Home'
            ]
        ]
    ];
@endphp

<!-- ========================================================================= -->
<!-- SHOPPABLE VIDEO REELS SECTION (Responsive Desktop Grid & Mobile Coverflow) -->
<!-- ========================================================================= -->
<section class="py-12 sm:py-20 bg-white border-b border-[#EAE3D9] overflow-hidden font-body select-none relative" id="shoppable-reels-section">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header (Clean Heading, No Paragraph) -->
        <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-14 space-y-1.5">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#831F2E] font-heading">✦ SACRED UNBOXING &amp; RITUALS ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
                Experience Divine Fragrance
            </h2>
        </div>

        <!-- ================================================================= -->
        <!-- 1. MOBILE ONLY: 3D COVERFLOW (Matches Reference Screenshot)        -->
        <!-- ================================================================= -->
        <div class="sm:hidden relative w-full flex items-center justify-center min-h-[380px] py-4" id="coverflow-mobile-stage">
            
            <!-- Left Flanking Card (Blurred & Scaled Down) -->
            <div 
                id="coverflow-left-card" 
                class="absolute left-1 z-10 w-[145px] aspect-[9/16] rounded-[20px] overflow-hidden bg-black shadow-lg opacity-50 filter blur-[2px] scale-85 transition-all duration-500 transform -translate-x-2 cursor-pointer"
            >
                <video class="w-full h-full object-cover pointer-events-none" id="coverflow-left-video" src="{{ asset($reels[count($reels)-1]['video_url']) }}" poster="{{ asset($reels[count($reels)-1]['poster']) }}" autoplay loop muted playsinline></video>
                <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
            </div>

            <!-- Center Active Video Card (Crisp, Eye Badge at Top, Product Thumbnail Badge at Bottom Center) -->
            <div 
                id="coverflow-center-card" 
                class="relative z-30 w-[230px] aspect-[9/16] rounded-[24px] overflow-hidden bg-black shadow-2xl border-2 border-[#D38928]/50 scale-100 transition-all duration-500 transform cursor-pointer group"
                title="Tap to watch full reel"
            >
                <!-- Video Player -->
                <video class="w-full h-full object-cover pointer-events-none" id="coverflow-center-video" src="{{ asset($reels[0]['video_url']) }}" poster="{{ asset($reels[0]['poster']) }}" autoplay loop muted playsinline></video>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30 pointer-events-none"></div>

                <!-- Top Left Views Badge (👁 1.2k) -->
                <div class="absolute top-3 left-3 pointer-events-none z-10">
                    <span class="inline-flex items-center space-x-1.5 px-2.5 py-1 rounded-full bg-black/60 backdrop-blur-md text-white text-[11px] font-bold border border-white/20">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        <span id="coverflow-views-badge">1.2k</span>
                    </span>
                </div>

                <!-- Center Play Indicator -->
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-12 h-12 rounded-full bg-black/45 backdrop-blur-md border border-white/30 text-white flex items-center justify-center transform group-hover:scale-110 transition-transform shadow-xl">
                        <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                </div>

                <!-- Bottom Product Thumbnail Badge (Overlapping Bottom Center) -->
                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <div class="w-13 h-13 rounded-full bg-white p-1 shadow-2xl border-2 border-[#D38928] overflow-hidden flex items-center justify-center">
                        <img id="coverflow-center-thumb" src="{{ asset($reels[0]['thumbnail']) }}" alt="Product Badge" class="w-full h-full object-cover rounded-full">
                    </div>
                </div>
            </div>

            <!-- Right Flanking Card (Blurred & Scaled Down) -->
            <div 
                id="coverflow-right-card" 
                class="absolute right-1 z-10 w-[145px] aspect-[9/16] rounded-[20px] overflow-hidden bg-black shadow-lg opacity-50 filter blur-[2px] scale-85 transition-all duration-500 transform translate-x-2 cursor-pointer"
            >
                <video class="w-full h-full object-cover pointer-events-none" id="coverflow-right-video" src="{{ asset($reels[1]['video_url']) }}" poster="{{ asset($reels[1]['poster']) }}" autoplay loop muted playsinline></video>
                <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
            </div>

        </div>

        <!-- ================================================================= -->
        <!-- 2. DESKTOP ONLY: 4-CARD REEL GRID / CAROUSEL                      -->
        <!-- ================================================================= -->
        <div class="hidden sm:grid sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
            @foreach($reels as $idx => $reel)
                <div 
                    class="desktop-reel-card group relative aspect-[9/16] rounded-[24px] overflow-hidden bg-black shadow-xl border border-[#EADBCC] hover:border-[#D38928] hover:shadow-2xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1"
                    data-reel-index="{{ $idx }}"
                >
                    <!-- Background Video -->
                    <video class="w-full h-full object-cover pointer-events-none" src="{{ asset($reel['video_url']) }}" poster="{{ asset($reel['poster']) }}" autoplay loop muted playsinline></video>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-black/30 pointer-events-none"></div>

                    <!-- Top Left Views -->
                    <div class="absolute top-3.5 left-3.5 z-10 pointer-events-none">
                        <span class="inline-flex items-center space-x-1.5 px-2.5 py-1 rounded-full bg-black/50 backdrop-blur-md text-white text-xs font-bold border border-white/20">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <span>{{ $reel['views'] }}</span>
                        </span>
                    </div>

                    <!-- Center Play Button Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-13 h-13 rounded-full bg-black/40 backdrop-blur-md border border-white/30 text-white flex items-center justify-center transform group-hover:scale-110 transition-transform shadow-xl">
                            <svg class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>

                    <!-- Bottom Shoppable Peek Bar -->
                    <div class="absolute bottom-3.5 inset-x-3.5 z-10 pointer-events-none">
                        <div class="bg-black/60 backdrop-blur-md p-2.5 rounded-[16px] border border-white/20 flex items-center justify-between">
                            <div class="flex items-center space-x-2.5 min-w-0">
                                <div class="w-9 h-9 rounded-[8px] bg-white overflow-hidden shrink-0 border border-white/40">
                                    <img src="{{ asset($reel['thumbnail']) }}" alt="{{ $reel['title'] }}" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0">
                                    <h4 class="text-xs font-bold text-white truncate">{{ $reel['title'] }}</h4>
                                    <span class="text-xs font-bold text-[#F6DAA8]">₹{{ $reel['price'] }}</span>
                                </div>
                            </div>
                            <span class="text-[10px] font-bold uppercase bg-white/20 text-white px-2 py-1 rounded-full shrink-0">Watch</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- FULL REEL LIGHTBOX MODAL (Full 9:16 Video + Inside Bottom Shoppable Bar)   -->
<!-- ========================================================================= -->
<div 
    id="reel-video-modal" 
    class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center opacity-0 pointer-events-none transition-all duration-300 font-body select-none overflow-hidden"
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

    <!-- Modal Reel Stage Container -->
    <div class="relative z-20 w-full max-w-md h-full max-h-[92vh] flex items-center justify-center px-2 sm:px-4">
        
        <!-- Left Nav Arrow in Modal -->
        <button 
            type="button" 
            id="modal-prev-arrow"
            class="absolute -left-3 sm:-left-12 top-1/2 -translate-y-1/2 z-40 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/90 text-[#121212] hover:bg-[#831F2E] hover:text-white flex items-center justify-center shadow-xl transition-all cursor-pointer focus:outline-none"
            aria-label="Previous Reel"
        >
            <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <!-- Main Playing Reel Card (9:16 aspect ratio) -->
        <div 
            id="modal-card-active"
            class="relative z-30 w-full aspect-[9/16] bg-black rounded-[24px] overflow-hidden border border-white/20 shadow-2xl flex flex-col justify-between"
        >
            <!-- Video Player -->
            <video 
                id="modal-reel-video"
                class="absolute inset-0 w-full h-full object-cover cursor-pointer"
                autoplay
                playsinline
                loop
            ></video>

            <!-- Gradient Shadow for Text Legibility -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-black/40 pointer-events-none z-10"></div>

            <!-- Top Header & Mute Button -->
            <div class="relative z-20 p-4 flex items-center justify-between">
                <button 
                    type="button" 
                    id="modal-mute-btn"
                    class="px-3.5 py-1.5 rounded-full bg-black/50 backdrop-blur-md border border-white/25 text-white text-xs font-bold flex items-center space-x-1.5 cursor-pointer shadow-lg hover:bg-black/70 transition-colors"
                >
                    <svg id="modal-volume-icon" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                    </svg>
                    <span id="modal-mute-label">Mute</span>
                </button>
            </div>

            <!-- Right Social Column (Like & Menu) -->
            <div class="absolute right-3.5 bottom-28 z-20 flex flex-col items-center space-y-3.5">
                <!-- Like Button -->
                <button 
                    type="button" 
                    id="modal-like-btn"
                    class="flex flex-col items-center space-y-1 text-white cursor-pointer group"
                    aria-label="Like Video"
                >
                    <div class="w-10 h-10 rounded-full bg-black/50 backdrop-blur-md border border-white/25 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg id="modal-heart-icon" class="w-5 h-5 text-white transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <span id="modal-likes-count" class="text-[10px] font-bold drop-shadow">380 Likes</span>
                </button>

                <!-- Options / Share Button -->
                <button 
                    type="button" 
                    id="modal-more-btn"
                    class="w-10 h-10 rounded-full bg-black/50 backdrop-blur-md border border-white/25 flex items-center justify-center text-white cursor-pointer hover:scale-110 transition-transform"
                    aria-label="Options"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="19" r="1.5"/>
                    </svg>
                </button>
            </div>

            <!-- Bottom Floating Product Preview Bar (Tapping opens Slide-Up Drawer) -->
            <div class="relative z-20 p-3.5 pb-4 mt-auto">
                <div 
                    id="modal-open-drawer-trigger"
                    class="bg-white/95 backdrop-blur-md rounded-[16px] p-2.5 shadow-2xl border border-white flex items-center justify-between cursor-pointer hover:bg-white transition-all transform active:scale-[0.99] group"
                    title="Tap to see full product details"
                >
                    <!-- Left Product Info -->
                    <div class="flex items-center space-x-2.5 min-w-0 flex-1">
                        <div class="w-11 h-11 rounded-[10px] bg-stone-100 overflow-hidden shrink-0 border border-stone-200">
                            <img id="modal-product-img" src="" alt="Product Thumbnail" class="w-full h-full object-cover">
                        </div>
                        <div class="min-w-0 flex-1 text-left">
                            <div class="flex items-center space-x-1.5">
                                <h4 id="modal-product-title" class="text-xs sm:text-[13px] font-bold text-[#121212] truncate font-heading">
                                    Product Title
                                </h4>
                                <span class="text-[10px] text-[#831F2E] font-bold">▲ Details</span>
                            </div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5">
                                <span id="modal-product-price" class="text-xs sm:text-sm font-black text-[#121212] font-heading">₹399</span>
                                <span id="modal-product-mrp" class="text-[10px] text-gray-400 line-through">₹499</span>
                                <span id="modal-product-discount" class="text-[10px] font-bold text-[#16A34A]">20% OFF</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Add To Cart Button on Bar -->
                    <button 
                        type="button" 
                        id="modal-quick-add-cart"
                        class="quick-add-to-cart-btn shrink-0 ml-2 py-2 px-3 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold text-xs rounded-[10px] shadow-sm transition-all flex items-center space-x-1 font-heading cursor-pointer focus:outline-none"
                        data-product-id="1"
                        data-product-title=""
                        data-product-slug=""
                        data-product-price=""
                        data-product-image=""
                    >
                        <span>Add</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    </button>
                </div>
            </div>

            <!-- ============================================================= -->
            <!-- SLIDE-UP PRODUCT DETAILS DRAWER (Matches media_1790947252216) -->
            <!-- ============================================================= -->
            <div 
                id="modal-product-drawer"
                class="absolute inset-x-0 bottom-0 z-40 bg-[#FFFDF9] rounded-t-[24px] shadow-2xl border-t border-[#EADBCC] max-h-[82%] flex flex-col transform translate-y-full transition-transform duration-300 ease-out font-body text-left overflow-hidden"
            >
                <!-- Drag Handle Bar & Close Icon -->
                <div class="p-3 pb-1 flex items-center justify-between border-b border-[#F0EBE4] shrink-0 bg-white">
                    <div class="w-10 h-1 bg-stone-300 rounded-full mx-auto -mr-6"></div>
                    <button 
                        type="button" 
                        id="modal-drawer-close"
                        class="p-1 rounded-full text-gray-400 hover:text-black transition-colors cursor-pointer"
                        aria-label="Close Details"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Scrollable Product Content -->
                <div class="p-4 overflow-y-auto space-y-4 flex-1">
                    
                    <!-- Product Header Row -->
                    <div class="flex items-start space-x-3.5">
                        <div class="w-16 h-16 rounded-[12px] bg-white border border-[#EADBCC] p-1 shrink-0 overflow-hidden shadow-xs">
                            <img id="drawer-product-img" src="" alt="Product" class="w-full h-full object-cover rounded-[8px]">
                        </div>
                        <div class="min-w-0 flex-1">
                            <h3 id="drawer-product-title" class="text-sm sm:text-base font-bold text-[#121212] font-heading leading-snug">
                                Chandan Saanjh - Bamboo-less Dhoop Sticks
                            </h3>
                            <div class="flex items-center space-x-1.5 pt-1 text-xs">
                                <div class="text-[#D38928] text-xs">★★★★★</div>
                                <span id="drawer-product-rating" class="text-gray-500 font-medium">4.9 (1,240 Reviews)</span>
                            </div>
                            <div class="flex items-baseline space-x-2 pt-1">
                                <span id="drawer-product-price" class="text-base sm:text-lg font-black text-[#831F2E] font-heading">₹399.00</span>
                                <span id="drawer-product-mrp" class="text-xs text-gray-400 line-through">₹499</span>
                                <span id="drawer-product-discount" class="text-xs font-bold text-[#16A34A]">20% OFF</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bullet Section 1: Why Choose -->
                    <div class="bg-white rounded-[14px] p-3 border border-[#EADBCC]/70 space-y-2">
                        <h4 class="text-xs font-bold text-[#831F2E] font-heading uppercase tracking-wide flex items-center space-x-1.5">
                            <span>🌿</span>
                            <span>Why Choose this Sacred Blend?</span>
                        </h4>
                        <ul id="drawer-why-choose" class="space-y-1.5 text-xs text-[#444444]">
                            <!-- Injected dynamically -->
                        </ul>
                    </div>

                    <!-- Bullet Section 2: Perfect For -->
                    <div class="bg-white rounded-[14px] p-3 border border-[#EADBCC]/70 space-y-2">
                        <h4 class="text-xs font-bold text-[#D38928] font-heading uppercase tracking-wide flex items-center space-x-1.5">
                            <span>🧘</span>
                            <span>Perfect For:</span>
                        </h4>
                        <ul id="drawer-perfect-for" class="space-y-1.5 text-xs text-[#444444]">
                            <!-- Injected dynamically -->
                        </ul>
                    </div>

                </div>

                <!-- Sticky Bottom Add to Cart Button -->
                <div class="p-3 bg-white border-t border-[#F0EBE4] shrink-0">
                    <button 
                        type="button" 
                        id="drawer-add-to-cart-btn"
                        class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white font-black text-sm rounded-[12px] shadow-md hover:shadow-lg transition-all transform active:scale-95 flex items-center justify-center space-x-2 font-heading cursor-pointer focus:outline-none"
                        data-product-id="1"
                        data-product-title=""
                        data-product-slug=""
                        data-product-price=""
                        data-product-image=""
                    >
                        <span>Add to Cart • </span>
                        <span id="drawer-btn-price">₹399.00</span>
                    </button>
                </div>
            </div>

        </div>

        <!-- Right Nav Arrow in Modal -->
        <button 
            type="button" 
            id="modal-next-arrow"
            class="absolute -right-3 sm:-right-12 top-1/2 -translate-y-1/2 z-40 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/90 text-[#121212] hover:bg-[#831F2E] hover:text-white flex items-center justify-center shadow-xl transition-all cursor-pointer focus:outline-none"
            aria-label="Next Reel"
        >
            <svg class="w-5 h-5 sm:w-6 sm:h-6 ml-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </button>

    </div>
</div>

<!-- ========================================================================= -->
<!-- JAVASCRIPT LOGIC (Coverflow, Modal Player & Bottom Details Drawer)          -->
<!-- ========================================================================= -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const reelsData = @json($reels);
        let currentIndex = 0;
        const totalReels = reelsData.length;

        // Mobile Coverflow Elements
        const leftCard = document.getElementById('coverflow-left-card');
        const centerCard = document.getElementById('coverflow-center-card');
        const rightCard = document.getElementById('coverflow-right-card');
        const leftVideo = document.getElementById('coverflow-left-video');
        const centerVideo = document.getElementById('coverflow-center-video');
        const rightVideo = document.getElementById('coverflow-right-video');
        const centerThumb = document.getElementById('coverflow-center-thumb');
        const viewsBadge = document.getElementById('coverflow-views-badge');

        // Modal Elements
        const modal = document.getElementById('reel-video-modal');
        const modalBackdrop = document.getElementById('reel-modal-backdrop');
        const modalClose = document.getElementById('reel-modal-close');
        const modalVideo = document.getElementById('modal-reel-video');
        const modalImg = document.getElementById('modal-product-img');
        const modalTitle = document.getElementById('modal-product-title');
        const modalPrice = document.getElementById('modal-product-price');
        const modalMrp = document.getElementById('modal-product-mrp');
        const modalDiscount = document.getElementById('modal-product-discount');
        const modalQuickAddBtn = document.getElementById('modal-quick-add-cart');
        const modalMuteBtn = document.getElementById('modal-mute-btn');
        const modalMuteLabel = document.getElementById('modal-mute-label');
        const modalLikeBtn = document.getElementById('modal-like-btn');
        const modalHeartIcon = document.getElementById('modal-heart-icon');
        const modalLikesCount = document.getElementById('modal-likes-count');
        const modalPrevArrow = document.getElementById('modal-prev-arrow');
        const modalNextArrow = document.getElementById('modal-next-arrow');

        // Drawer Elements inside Modal
        const drawerTrigger = document.getElementById('modal-open-drawer-trigger');
        const drawer = document.getElementById('modal-product-drawer');
        const drawerClose = document.getElementById('modal-drawer-close');
        const drawerImg = document.getElementById('drawer-product-img');
        const drawerTitle = document.getElementById('drawer-product-title');
        const drawerPrice = document.getElementById('drawer-product-price');
        const drawerMrp = document.getElementById('drawer-product-mrp');
        const drawerDiscount = document.getElementById('drawer-product-discount');
        const drawerRating = document.getElementById('drawer-product-rating');
        const drawerWhyChoose = document.getElementById('drawer-why-choose');
        const drawerPerfectFor = document.getElementById('drawer-perfect-for');
        const drawerAddCartBtn = document.getElementById('drawer-add-to-cart-btn');
        const drawerBtnPrice = document.getElementById('drawer-btn-price');

        let isMuted = false;
        let isLiked = false;

        function updateCoverflow(index) {
            currentIndex = (index + totalReels) % totalReels;
            const prevIndex = (currentIndex - 1 + totalReels) % totalReels;
            const nextIndex = (currentIndex + 1) % totalReels;

            const curr = reelsData[currentIndex];
            const prev = reelsData[prevIndex];
            const next = reelsData[nextIndex];

            if (leftVideo && prev) {
                leftVideo.src = '/' + prev.video_url;
                leftVideo.poster = '/' + prev.poster;
                leftVideo.play().catch(() => {});
            }
            if (centerVideo && curr) {
                centerVideo.src = '/' + curr.video_url;
                centerVideo.poster = '/' + curr.poster;
                centerVideo.play().catch(() => {});
            }
            if (rightVideo && next) {
                rightVideo.src = '/' + next.video_url;
                rightVideo.poster = '/' + next.poster;
                rightVideo.play().catch(() => {});
            }

            if (centerThumb && curr) centerThumb.src = '/' + curr.thumbnail;
            if (viewsBadge && curr) viewsBadge.textContent = curr.views;
        }

        if (leftCard) leftCard.addEventListener('click', () => updateCoverflow(currentIndex - 1));
        if (rightCard) rightCard.addEventListener('click', () => updateCoverflow(currentIndex + 1));
        if (centerCard) centerCard.addEventListener('click', () => openModal(currentIndex));

        // Desktop Cards Click
        document.querySelectorAll('.desktop-reel-card').forEach(card => {
            card.addEventListener('click', () => {
                const idx = parseInt(card.getAttribute('data-reel-index') || '0', 10);
                openModal(idx);
            });
        });

        function openModal(index) {
            currentIndex = (index + totalReels) % totalReels;
            const item = reelsData[currentIndex];
            if (!item) return;

            // Close Drawer if open
            if (drawer) drawer.classList.add('translate-y-full');

            if (modalVideo) {
                modalVideo.src = '/' + item.video_url;
                modalVideo.poster = '/' + item.poster;
                modalVideo.muted = isMuted;
                modalVideo.currentTime = 0;
                modalVideo.play().catch(() => {
                    modalVideo.muted = true;
                    isMuted = true;
                    if (modalMuteLabel) modalMuteLabel.textContent = 'Unmute';
                    modalVideo.play().catch(() => {});
                });
            }

            // Populate Modal Bar
            if (modalImg) modalImg.src = '/' + item.thumbnail;
            if (modalTitle) modalTitle.textContent = item.title;
            if (modalPrice) modalPrice.textContent = '₹' + item.price;
            if (modalMrp) modalMrp.textContent = '₹' + item.mrp;
            if (modalDiscount) modalDiscount.textContent = item.discount;
            if (modalLikesCount) modalLikesCount.textContent = item.likes;

            if (modalQuickAddBtn) {
                modalQuickAddBtn.setAttribute('data-product-id', item.id);
                modalQuickAddBtn.setAttribute('data-product-title', item.title);
                modalQuickAddBtn.setAttribute('data-product-slug', item.slug);
                modalQuickAddBtn.setAttribute('data-product-price', item.price);
                modalQuickAddBtn.setAttribute('data-product-image', '/' + item.thumbnail);
            }

            // Populate Drawer Sheet
            if (drawerImg) drawerImg.src = '/' + item.thumbnail;
            if (drawerTitle) drawerTitle.textContent = item.title + ' - ' + (item.subtitle || 'Vedic Dhoop');
            if (drawerPrice) drawerPrice.textContent = '₹' + item.price + '.00';
            if (drawerMrp) drawerMrp.textContent = '₹' + item.mrp;
            if (drawerDiscount) drawerDiscount.textContent = item.discount;
            if (drawerRating) drawerRating.textContent = item.rating || '4.9 (1,240 Reviews)';
            if (drawerBtnPrice) drawerBtnPrice.textContent = '₹' + item.price + '.00';

            if (drawerWhyChoose && item.why_choose) {
                drawerWhyChoose.innerHTML = item.why_choose.map(point => `
                    <li class="flex items-center space-x-2">
                        <span class="text-[#D38928] text-xs">✓</span>
                        <span>${point}</span>
                    </li>
                `).join('');
            }

            if (drawerPerfectFor && item.perfect_for) {
                drawerPerfectFor.innerHTML = item.perfect_for.map(point => `
                    <li class="flex items-center space-x-2">
                        <span class="text-[#831F2E] text-xs">✦</span>
                        <span>${point}</span>
                    </li>
                `).join('');
            }

            if (drawerAddCartBtn) {
                drawerAddCartBtn.setAttribute('data-product-id', item.id);
                drawerAddCartBtn.setAttribute('data-product-title', item.title);
                drawerAddCartBtn.setAttribute('data-product-slug', item.slug);
                drawerAddCartBtn.setAttribute('data-product-price', item.price);
                drawerAddCartBtn.setAttribute('data-product-image', '/' + item.thumbnail);
            }

            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                requestAnimationFrame(() => {
                    modal.classList.remove('opacity-0', 'pointer-events-none');
                    modal.classList.add('opacity-100', 'pointer-events-auto');
                });
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal() {
            if (modal) {
                modal.classList.add('opacity-0', 'pointer-events-none');
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                if (drawer) drawer.classList.add('translate-y-full');
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
        }

        if (modalClose) modalClose.addEventListener('click', closeModal);
        if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);

        if (modalPrevArrow) modalPrevArrow.addEventListener('click', () => openModal(currentIndex - 1));
        if (modalNextArrow) modalNextArrow.addEventListener('click', () => openModal(currentIndex + 1));

        // Toggle Drawer
        if (drawerTrigger && drawer) {
            drawerTrigger.addEventListener('click', (e) => {
                // If quick add button was clicked, don't toggle drawer
                if (e.target.closest('#modal-quick-add-cart')) return;
                drawer.classList.remove('translate-y-full');
            });
        }

        if (drawerClose && drawer) {
            drawerClose.addEventListener('click', () => {
                drawer.classList.add('translate-y-full');
            });
        }

        // Mute / Unmute
        if (modalMuteBtn && modalVideo) {
            modalMuteBtn.addEventListener('click', () => {
                isMuted = !isMuted;
                modalVideo.muted = isMuted;
                if (modalMuteLabel) modalMuteLabel.textContent = isMuted ? 'Unmute' : 'Mute';
            });
        }

        // Like Button Toggle
        if (modalLikeBtn && modalHeartIcon) {
            modalLikeBtn.addEventListener('click', () => {
                isLiked = !isLiked;
                if (isLiked) {
                    modalHeartIcon.setAttribute('fill', '#EF4444');
                    modalHeartIcon.classList.add('text-red-500');
                    if (modalLikesCount) modalLikesCount.textContent = 'Liked ♥';
                } else {
                    modalHeartIcon.setAttribute('fill', 'none');
                    modalHeartIcon.classList.remove('text-red-500');
                    if (modalLikesCount) modalLikesCount.textContent = reelsData[currentIndex].likes;
                }
            });
        }

        // Mobile Coverflow Swipe Support
        const mobileStage = document.getElementById('coverflow-mobile-stage');
        if (mobileStage) {
            let touchStartX = 0;
            mobileStage.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            }, { passive: true });

            mobileStage.addEventListener('touchend', (e) => {
                const diff = touchStartX - e.changedTouches[0].clientX;
                if (Math.abs(diff) > 40) {
                    if (diff > 0) updateCoverflow(currentIndex + 1);
                    else updateCoverflow(currentIndex - 1);
                }
            }, { passive: true });
        }
    });
</script>
