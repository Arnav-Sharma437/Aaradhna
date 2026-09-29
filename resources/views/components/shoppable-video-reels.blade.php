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
        ]
    ];
@endphp

<!-- ========================================================================= -->
<!-- SHOPPABLE VIDEO REELS SECTION (Exact Match to User Reference Screenshot) -->
<!-- ========================================================================= -->
<section class="py-14 sm:py-20 bg-[#FDFBF7] border-b border-[#EAE3D9] overflow-hidden font-body select-none" id="shoppable-reels-section">
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
                class="absolute left-0 sm:-left-3 top-1/3 -translate-y-1/2 z-30 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/95 hover:bg-[#D38928] text-[#121212] hover:text-white border border-[#EADBCC] shadow-xl flex items-center justify-center transition-all duration-200 transform hover:scale-105 active:scale-95 cursor-pointer opacity-0 group-hover/reel-container:opacity-100 focus:opacity-100"
                aria-label="Previous Videos"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Right Arrow Button -->
            <button 
                type="button" 
                id="reel-scroll-next"
                class="absolute right-0 sm:-right-3 top-1/3 -translate-y-1/2 z-30 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/95 hover:bg-[#D38928] text-[#121212] hover:text-white border border-[#EADBCC] shadow-xl flex items-center justify-center transition-all duration-200 transform hover:scale-105 active:scale-95 cursor-pointer shadow-lg"
                aria-label="Next Videos"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Horizontal Scrollable Rail -->
            <div 
                id="reels-track"
                class="flex space-x-3.5 sm:space-x-5 overflow-x-auto snap-x snap-mandatory scrollbar-none pb-4 pt-1 px-1 scroll-smooth"
            >
                @foreach($reels as $reel)
                    <div class="reel-card shrink-0 w-[240px] sm:w-[260px] md:w-[275px] snap-start flex flex-col justify-between group">
                        
                        <!-- 9:16 Video Container -->
                        <div class="relative w-full aspect-[9/16] rounded-[16px] overflow-hidden bg-neutral-900 border border-[#EADBCC] shadow-sm group-hover:shadow-xl transition-all duration-300">
                            
                            <!-- Video Element -->
                            <video 
                                class="reel-video w-full h-full object-cover cursor-pointer"
                                src="{{ $reel['video_url'] }}"
                                poster="{{ asset($reel['poster']) }}"
                                loop
                                muted
                                playsinline
                                preload="metadata"
                            ></video>

                            <!-- Subtle Vignette -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/30 pointer-events-none"></div>

                            <!-- Top Right View Counter Pill -->
                            <div class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-black/40 backdrop-blur-md border border-white/20 text-white text-[11px] font-bold tracking-wide flex items-center space-x-1.5 pointer-events-none select-none">
                                <svg class="w-3.5 h-3.5 text-white/90" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span>{{ $reel['views'] }}</span>
                            </div>

                            <!-- Play/Pause & Sound Floating Overlay -->
                            <button 
                                type="button" 
                                class="reel-play-toggle absolute bottom-3 right-3 w-8 h-8 rounded-full bg-black/50 hover:bg-[#D38928] text-white flex items-center justify-center backdrop-blur-xs transition-transform duration-200 active:scale-95 focus:outline-none cursor-pointer"
                                aria-label="Toggle Play"
                            >
                                <svg class="reel-play-icon w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                <svg class="reel-pause-icon w-4 h-4 hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                </svg>
                            </button>

                            <!-- Volume Toggle Button -->
                            <button 
                                type="button" 
                                class="reel-mute-toggle absolute bottom-3 left-3 w-8 h-8 rounded-full bg-black/50 hover:bg-[#D38928] text-white flex items-center justify-center backdrop-blur-xs transition-transform duration-200 active:scale-95 focus:outline-none cursor-pointer"
                                aria-label="Toggle Mute"
                            >
                                <svg class="reel-mute-icon w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>
                                </svg>
                                <svg class="reel-unmute-icon w-4 h-4 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                </svg>
                            </button>

                        </div>

                        <!-- Bottom Product Card Row -->
                        <div class="mt-3 bg-white p-2.5 rounded-[12px] border border-[#EADBCC] shadow-xs space-y-2">
                            
                            <!-- Product Mini Info Row -->
                            <div class="flex items-center space-x-2.5">
                                <!-- Square Thumbnail -->
                                <div class="w-11 h-11 rounded-[8px] border border-[#EADBCC] p-0.5 bg-[#FAF7F2] shrink-0 overflow-hidden flex items-center justify-center">
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
                                class="quick-add-to-cart-btn w-full py-2 sm:py-2.5 px-3 bg-[#1E1E1E] hover:bg-[#D38928] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 flex items-center justify-center space-x-1.5 font-heading cursor-pointer focus:outline-none"
                                data-product-id="{{ $reel['id'] }}"
                                data-product-title="{{ $reel['title'] }}"
                                data-product-slug="{{ $reel['slug'] }}"
                                data-product-price="{{ $reel['price'] }}"
                                data-product-image="{{ asset($reel['thumbnail']) }}"
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

<!-- Shoppable Reels Autoplay on Viewport & Arrow Scroll Logic -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const reelsTrack = document.getElementById('reels-track');
        const prevBtn = document.getElementById('reel-scroll-prev');
        const nextBtn = document.getElementById('reel-scroll-next');
        const videoCards = document.querySelectorAll('.reel-card');

        // 1. Arrow Scroll Controls
        if (reelsTrack && prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                reelsTrack.scrollBy({ left: -280, behavior: 'smooth' });
            });
            nextBtn.addEventListener('click', () => {
                reelsTrack.scrollBy({ left: 280, behavior: 'smooth' });
            });
        }

        // 2. Video Playback & Mute Interactions
        videoCards.forEach(card => {
            const video = card.querySelector('.reel-video');
            const playToggle = card.querySelector('.reel-play-toggle');
            const muteToggle = card.querySelector('.reel-mute-toggle');
            const playIcon = card.querySelector('.reel-play-icon');
            const pauseIcon = card.querySelector('.reel-pause-icon');
            const muteIcon = card.querySelector('.reel-mute-icon');
            const unmuteIcon = card.querySelector('.reel-unmute-icon');

            if (!video) return;

            const togglePlay = () => {
                if (video.paused) {
                    // Pause other playing reels first
                    document.querySelectorAll('.reel-video').forEach(v => {
                        if (v !== video && !v.paused) v.pause();
                    });
                    video.play().then(() => {
                        if (playIcon) playIcon.classList.add('hidden');
                        if (pauseIcon) pauseIcon.classList.remove('hidden');
                    }).catch(() => {});
                } else {
                    video.pause();
                    if (playIcon) playIcon.classList.remove('hidden');
                    if (pauseIcon) pauseIcon.classList.add('hidden');
                }
            };

            const toggleMute = (e) => {
                e.stopPropagation();
                video.muted = !video.muted;
                if (video.muted) {
                    if (muteIcon) muteIcon.classList.remove('hidden');
                    if (unmuteIcon) unmuteIcon.classList.add('hidden');
                } else {
                    if (muteIcon) muteIcon.classList.add('hidden');
                    if (unmuteIcon) unmuteIcon.classList.remove('hidden');
                }
            };

            if (playToggle) playToggle.addEventListener('click', (e) => { e.stopPropagation(); togglePlay(); });
            if (muteToggle) muteToggle.addEventListener('click', toggleMute);
            video.addEventListener('click', togglePlay);

            // Hover to play on desktop
            card.addEventListener('mouseenter', () => {
                if (window.innerWidth >= 1024 && video.paused) {
                    video.play().then(() => {
                        if (playIcon) playIcon.classList.add('hidden');
                        if (pauseIcon) pauseIcon.classList.remove('hidden');
                    }).catch(() => {});
                }
            });
        });

        // 3. Intersection Observer for Autoplay in viewport (Mobile & Desktop)
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const video = entry.target.querySelector('.reel-video');
                    const playIcon = entry.target.querySelector('.reel-play-icon');
                    const pauseIcon = entry.target.querySelector('.reel-pause-icon');
                    if (!video) return;

                    if (entry.isIntersecting && entry.intersectionRatio >= 0.7) {
                        video.play().then(() => {
                            if (playIcon) playIcon.classList.add('hidden');
                            if (pauseIcon) pauseIcon.classList.remove('hidden');
                        }).catch(() => {});
                    } else {
                        video.pause();
                        if (playIcon) playIcon.classList.remove('hidden');
                        if (pauseIcon) pauseIcon.classList.add('hidden');
                    }
                });
            }, { threshold: [0.7] });

            videoCards.forEach(card => observer.observe(card));
        }
    });
</script>
