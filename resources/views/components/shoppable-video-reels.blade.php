@php
    $reels = [
        [
            'id' => 1,
            'title' => 'Sandalwood Refill Pack',
            'slug' => 'sandalwood-bambooless-incense-sticks',
            'price' => 489,
            'mrp' => 700,
            'discount' => '30% OFF',
            'views' => '1.2k',
            'thumbnail' => 'assets/images/devi-refill-pack-card.jpg',
            'poster' => 'assets/images/devi-refill-pack-card.jpg',
            'video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-smoke-coming-out-of-an-incense-stick-41473-large.mp4'
        ],
        [
            'id' => 2,
            'title' => 'Sandalwood (चंदन)',
            'slug' => 'sandalwood-havan-cup',
            'price' => 289,
            'mrp' => 375,
            'discount' => '23% OFF',
            'views' => '1.3k',
            'thumbnail' => 'assets/images/chandan-cones-card.jpg',
            'poster' => 'assets/images/chandan-cones-card.jpg',
            'video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-incense-stick-burning-in-a-dark-room-41474-large.mp4'
        ],
        [
            'id' => 3,
            'title' => 'Nagchampa Refill Pack',
            'slug' => 'camphor-bambooless-incense-sticks',
            'price' => 489,
            'mrp' => 700,
            'discount' => '30% OFF',
            'views' => '2.6k',
            'thumbnail' => 'assets/images/camphor-refill-pack-card.jpg',
            'poster' => 'assets/images/camphor-refill-pack-card.jpg',
            'video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-incense-smoke-rising-in-the-dark-41472-large.mp4'
        ],
        [
            'id' => 4,
            'title' => 'Oudh Refill Pack',
            'slug' => 'oudh-bambooless-incense-sticks',
            'price' => 489,
            'mrp' => 700,
            'discount' => '30% OFF',
            'views' => '1.8k',
            'thumbnail' => 'assets/images/oudh-pack-card.jpg',
            'poster' => 'assets/images/oudh-pack-card.jpg',
            'video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-burning-incense-with-white-smoke-41475-large.mp4'
        ],
        [
            'id' => 5,
            'title' => 'Mogra Refill Pack',
            'slug' => 'rose-bambooless-incense-sticks',
            'price' => 489,
            'mrp' => 700,
            'discount' => '30% OFF',
            'views' => '3.2k',
            'thumbnail' => 'assets/images/incense-pack.jpg',
            'poster' => 'assets/images/incense-pack.jpg',
            'video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-incense-stick-smoke-illuminated-by-warm-light-41471-large.mp4'
        ],
        [
            'id' => 6,
            'title' => 'Organic Havan Cups',
            'slug' => 'guggal-loban-havan-cup',
            'price' => 299,
            'mrp' => 399,
            'discount' => '25% OFF',
            'views' => '4.1k',
            'thumbnail' => 'assets/images/havan-cup.jpg',
            'poster' => 'assets/images/havan-cup.jpg',
            'video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-smoke-coming-out-of-an-incense-stick-41473-large.mp4'
        ],
        [
            'id' => 7,
            'title' => 'Devi Special Refill',
            'slug' => 'devi-refill-pack',
            'price' => 489,
            'mrp' => 999,
            'discount' => '51% OFF',
            'views' => '5.8k',
            'thumbnail' => 'assets/images/devi-refill-pack-card.jpg',
            'poster' => 'assets/images/devi-refill-pack-card.jpg',
            'video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-burning-incense-with-white-smoke-41475-large.mp4'
        ],
        [
            'id' => 8,
            'title' => 'Vedic Dhoop Cones',
            'slug' => 'kesar-chandan-dhoop-cones',
            'price' => 249,
            'mrp' => 449,
            'discount' => '45% OFF',
            'views' => '3.9k',
            'thumbnail' => 'assets/images/chandan-cones-card.jpg',
            'poster' => 'assets/images/chandan-cones-card.jpg',
            'video_url' => 'https://assets.mixkit.co/videos/preview/mixkit-incense-stick-burning-in-a-dark-room-41474-large.mp4'
        ]
    ];
@endphp

<!-- ========================================================================= -->
<!-- SHOPPABLE VIDEO REELS SECTION (Infinite Loop Slider + Video Modal)        -->
<!-- ========================================================================= -->
<section class="py-14 sm:py-20 bg-[#FDFBF7] border-b border-[#EAE3D9] overflow-hidden font-body select-none relative" id="shoppable-reels-section">
    <div class="w-full mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ SACRED UNBOXING &amp; RITUALS ✦</span>
            <h2 class="text-2xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight">
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
                class="absolute -left-2 sm:-left-4 top-[40%] -translate-y-1/2 z-30 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/95 hover:bg-[#D38928] text-[#121212] hover:text-white border border-[#EADBCC] shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95 cursor-pointer"
                aria-label="Previous Videos"
            >
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Right Arrow Button -->
            <button 
                type="button" 
                id="reel-scroll-next"
                class="absolute -right-2 sm:-right-4 top-[40%] -translate-y-1/2 z-30 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/95 hover:bg-[#D38928] text-[#121212] hover:text-white border border-[#EADBCC] shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95 cursor-pointer"
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
                        data-video="{{ $reel['video_url'] }}"
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
                            
                            <!-- Video Element (Autoplay Muted Preview) -->
                            <video 
                                class="reel-preview-video w-full h-full object-cover pointer-events-none"
                                src="{{ $reel['video_url'] }}"
                                poster="{{ asset($reel['poster']) }}"
                                loop
                                muted
                                playsinline
                                preload="metadata"
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

                            <!-- Centered Subtle Play Button Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="w-13 h-13 rounded-full bg-black/45 backdrop-blur-xs border border-white/30 text-white flex items-center justify-center group-hover:scale-110 group-hover:bg-[#D38928] transition-all duration-300 shadow-lg">
                                    <svg class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
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
                                class="quick-add-to-cart-btn w-full py-2.5 px-3 bg-[#1E1E1E] hover:bg-[#D38928] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 flex items-center justify-center space-x-1.5 font-heading cursor-pointer focus:outline-none"
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
<!-- FULLSCREEN REELS VIDEO MODAL LIGHTBOX (With Sound & Direct Checkout)      -->
<!-- ========================================================================= -->
<div 
    id="reel-video-modal" 
    class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md flex items-center justify-center p-3 sm:p-6 opacity-0 pointer-events-none transition-all duration-300 font-body"
>
    <!-- Modal Backdrop Click Area -->
    <div class="absolute inset-0" id="reel-modal-backdrop"></div>

    <!-- Modal Content Box (Tall 9:16 Reel Player with Product Card) -->
    <div class="relative z-10 w-full max-w-sm sm:max-w-md bg-neutral-950 rounded-[20px] overflow-hidden border border-white/20 shadow-2xl flex flex-col max-h-[92vh]">
        
        <!-- Top Bar: Close Button & Reel Title -->
        <div class="absolute top-3 inset-x-3 z-20 flex items-center justify-between text-white pointer-events-none">
            <span class="px-3 py-1 rounded-full bg-black/50 backdrop-blur-md text-xs font-bold font-heading border border-white/20 text-[#F6DAA8]">
                ✦ Aaradhna Vedic Reel
            </span>
            <button 
                type="button" 
                id="reel-modal-close"
                class="w-9 h-9 rounded-full bg-black/60 hover:bg-[#9B1C31] text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition-all duration-200 pointer-events-auto cursor-pointer focus:outline-none"
                aria-label="Close Video"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Main Video Container -->
        <div class="relative w-full aspect-[9/16] bg-black overflow-hidden flex items-center justify-center">
            <video 
                id="modal-reel-video"
                class="w-full h-full object-cover cursor-pointer"
                controls
                autoplay
                playsinline
                loop
            ></video>

            <!-- Video Navigation Arrows in Modal -->
            <button 
                type="button" 
                id="modal-prev-video" 
                class="absolute left-2 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-black/50 hover:bg-[#D38928] text-white flex items-center justify-center backdrop-blur-xs border border-white/20 transition-all cursor-pointer"
                aria-label="Previous Reel"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button 
                type="button" 
                id="modal-next-video" 
                class="absolute right-2 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-black/50 hover:bg-[#D38928] text-white flex items-center justify-center backdrop-blur-xs border border-white/20 transition-all cursor-pointer"
                aria-label="Next Reel"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

        <!-- Bottom Modal Product Bar with Direct Add to Cart -->
        <div class="bg-white p-3.5 border-t border-[#EADBCC] flex items-center justify-between gap-3 shadow-lg">
            <div class="flex items-center space-x-3 min-w-0">
                <img id="modal-product-img" src="" alt="Product" class="w-12 h-12 rounded-[8px] object-cover border border-[#EADBCC] p-0.5 bg-[#FAF7F2] shrink-0">
                <div class="min-w-0">
                    <h4 id="modal-product-title" class="text-xs sm:text-sm font-bold font-serif text-[#1F1F1F] truncate leading-tight">Product Title</h4>
                    <div class="flex items-baseline space-x-1.5 pt-0.5">
                        <span id="modal-product-price" class="text-xs sm:text-sm font-black font-heading text-[#1F1F1F]">₹489</span>
                        <span id="modal-product-mrp" class="text-[11px] text-gray-400 line-through">₹700</span>
                        <span id="modal-product-discount" class="text-[11px] font-bold text-[#15803D]">30% OFF</span>
                    </div>
                </div>
            </div>

            <button 
                type="button" 
                id="modal-add-to-cart-btn"
                class="quick-add-to-cart-btn px-5 py-2.5 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold rounded-[8px] shadow-xs shrink-0 font-heading cursor-pointer transition-all duration-200"
            >
                Add to Cart
            </button>
        </div>

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

        const modal = document.getElementById('reel-video-modal');
        const modalBackdrop = document.getElementById('reel-modal-backdrop');
        const modalClose = document.getElementById('reel-modal-close');
        const modalVideo = document.getElementById('modal-reel-video');
        const modalImg = document.getElementById('modal-product-img');
        const modalTitle = document.getElementById('modal-product-title');
        const modalPrice = document.getElementById('modal-product-price');
        const modalMrp = document.getElementById('modal-product-mrp');
        const modalDiscount = document.getElementById('modal-product-discount');
        const modalCartBtn = document.getElementById('modal-add-to-cart-btn');
        const modalPrevBtn = document.getElementById('modal-prev-video');
        const modalNextBtn = document.getElementById('modal-next-video');

        let currentReelIndex = 0;
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
                // Wrap to start for infinite loop
                track.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                track.scrollBy({ left: getCardWidth(), behavior: 'smooth' });
            }
        };

        const scrollPrev = () => {
            if (!track) return;
            if (track.scrollLeft <= 10) {
                // Wrap to end for infinite loop
                track.scrollTo({ left: track.scrollWidth, behavior: 'smooth' });
            } else {
                track.scrollBy({ left: -getCardWidth(), behavior: 'smooth' });
            }
        };

        if (nextBtn) nextBtn.addEventListener('click', scrollNext);
        if (prevBtn) prevBtn.addEventListener('click', scrollPrev);

        // Auto Loop Interval (continuous smooth loop)
        let autoLoopTimer = setInterval(scrollNext, 4000);

        // Pause auto loop on hover or touch
        if (track) {
            track.addEventListener('mouseenter', () => clearInterval(autoLoopTimer));
            track.addEventListener('mouseleave', () => {
                clearInterval(autoLoopTimer);
                autoLoopTimer = setInterval(scrollNext, 4000);
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
        // 2. VIDEO POPUP MODAL ON CARD CLICK
        // ---------------------------------------------------------------------
        const openReelModal = (index) => {
            if (index < 0) index = totalCards - 1;
            if (index >= totalCards) index = 0;
            currentReelIndex = index;

            const card = cards[currentReelIndex];
            if (!card) return;

            const videoSrc = card.getAttribute('data-video');
            const posterSrc = card.getAttribute('data-poster');
            const title = card.getAttribute('data-title');
            const price = card.getAttribute('data-price');
            const mrp = card.getAttribute('data-mrp');
            const discount = card.getAttribute('data-discount');
            const thumbnail = card.getAttribute('data-thumbnail');
            const slug = card.getAttribute('data-slug');
            const id = card.getAttribute('data-id');

            // Populate Modal
            if (modalVideo) {
                modalVideo.src = videoSrc;
                modalVideo.poster = posterSrc;
                modalVideo.muted = false; // with sound
                modalVideo.currentTime = 0;
                modalVideo.play().catch(() => {
                    modalVideo.muted = true;
                    modalVideo.play();
                });
            }

            if (modalImg) modalImg.src = thumbnail;
            if (modalTitle) modalTitle.textContent = title;
            if (modalPrice) modalPrice.textContent = '₹' + price;
            if (modalMrp) modalMrp.textContent = '₹' + mrp;
            if (modalDiscount) modalDiscount.textContent = discount;

            // Set cart dataset on modal cart button
            if (modalCartBtn) {
                modalCartBtn.setAttribute('data-product-id', id);
                modalCartBtn.setAttribute('data-product-title', title);
                modalCartBtn.setAttribute('data-product-slug', slug);
                modalCartBtn.setAttribute('data-product-price', price);
                modalCartBtn.setAttribute('data-product-image', thumbnail);
            }

            // Show Modal
            if (modal) {
                modal.classList.remove('opacity-0', 'pointer-events-none');
                modal.classList.add('opacity-100', 'pointer-events-auto');
                document.body.style.overflow = 'hidden'; // prevent page scroll
            }
        };

        const closeReelModal = () => {
            if (modal) {
                modal.classList.add('opacity-0', 'pointer-events-none');
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                document.body.style.overflow = '';
            }
            if (modalVideo) {
                modalVideo.pause();
                modalVideo.src = '';
            }
        };

        // Attach click listeners to cards
        cards.forEach((card, index) => {
            card.addEventListener('click', (e) => {
                // If clicked button inside card, don't open modal
                if (e.target.closest('button')) return;
                openReelModal(index);
            });
        });

        if (modalClose) modalClose.addEventListener('click', closeReelModal);
        if (modalBackdrop) modalBackdrop.addEventListener('click', closeReelModal);

        if (modalPrevBtn) modalPrevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            openReelModal(currentReelIndex - 1);
        });

        if (modalNextBtn) modalNextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            openReelModal(currentReelIndex + 1);
        });

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal && !modal.classList.contains('pointer-events-none')) {
                closeReelModal();
            }
        });

        // Autoplay muted previews in card grid
        cards.forEach(card => {
            const previewVideo = card.querySelector('.reel-preview-video');
            if (!previewVideo) return;

            card.addEventListener('mouseenter', () => {
                previewVideo.play().catch(() => {});
            });
            card.addEventListener('mouseleave', () => {
                previewVideo.pause();
            });
        });

        // Intersection Observer for auto-playing preview on mobile
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const video = entry.target.querySelector('.reel-preview-video');
                    if (!video) return;
                    if (entry.isIntersecting) {
                        video.play().catch(() => {});
                    } else {
                        video.pause();
                    }
                });
            }, { threshold: 0.6 });

            cards.forEach(card => observer.observe(card));
        }
    });
</script>
