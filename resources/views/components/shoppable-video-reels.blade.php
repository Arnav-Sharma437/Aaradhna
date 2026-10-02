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
        ]
    ];
@endphp

<!-- ========================================================================= -->
<!-- 3D COVERFLOW VIDEO REELS SECTION (1 Center Crisp + Left/Right Blurred)    -->
<!-- ========================================================================= -->
<section class="py-12 sm:py-18 bg-white border-b border-[#EAE3D9] overflow-hidden font-body select-none relative" id="shoppable-reels-section">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header (Clean Heading, No Paragraph) -->
        <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-12 space-y-1.5">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#831F2E] font-heading">✦ SACRED UNBOXING &amp; RITUALS ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
                Experience Divine Fragrance
            </h2>
        </div>

        <!-- 3D Coverflow Carousel Stage (Pure Clean Videos, No Exterior Arrows or Products) -->
        <div class="relative w-full max-w-4xl mx-auto flex items-center justify-center min-h-[380px] sm:min-h-[460px] md:min-h-[500px]" id="coverflow-reels-container">
            
            <!-- Left Flanking Video Card (Blurred & Scaled Down) -->
            <div 
                id="coverflow-left-card" 
                class="absolute left-2 sm:left-8 md:left-12 z-10 w-[170px] sm:w-[220px] md:w-[240px] aspect-[9/16] rounded-[20px] overflow-hidden bg-black shadow-xl opacity-60 filter blur-[1.5px] scale-85 transition-all duration-500 transform -translate-x-4 cursor-pointer hover:opacity-85"
                title="Tap to switch"
            >
                <video class="w-full h-full object-cover pointer-events-none" id="coverflow-left-video" src="{{ asset($reels[count($reels)-1]['video_url']) }}" poster="{{ asset($reels[count($reels)-1]['poster']) }}" autoplay loop muted playsinline></video>
                <div class="absolute inset-0 bg-black/30 pointer-events-none"></div>
            </div>

            <!-- Center Active Video Card (Prominent, Crisp, Click to Open Full Reel) -->
            <div 
                id="coverflow-center-card" 
                class="relative z-30 w-[230px] sm:w-[280px] md:w-[310px] aspect-[9/16] rounded-[24px] overflow-hidden bg-black shadow-2xl border-2 border-[#D38928]/40 hover:border-[#D38928] scale-100 transition-all duration-500 transform cursor-pointer group"
                title="Tap to watch in full view"
            >
                <video class="w-full h-full object-cover pointer-events-none" id="coverflow-center-video" src="{{ asset($reels[0]['video_url']) }}" poster="{{ asset($reels[0]['poster']) }}" autoplay loop muted playsinline></video>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/20 pointer-events-none"></div>

                <!-- Center Play Button Icon Overlay -->
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-13 h-13 rounded-full bg-black/40 backdrop-blur-md border border-white/30 text-white flex items-center justify-center transform group-hover:scale-110 transition-transform shadow-xl">
                        <svg class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                </div>

                <!-- Bottom Floating Tag -->
                <div class="absolute bottom-4 inset-x-4 text-center pointer-events-none">
                    <span class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-white text-xs font-semibold border border-white/20">
                        <span>Tap to Watch Full Reel</span>
                        <span>✨</span>
                    </span>
                </div>
            </div>

            <!-- Right Flanking Video Card (Blurred & Scaled Down) -->
            <div 
                id="coverflow-right-card" 
                class="absolute right-2 sm:right-8 md:right-12 z-10 w-[170px] sm:w-[220px] md:w-[240px] aspect-[9/16] rounded-[20px] overflow-hidden bg-black shadow-xl opacity-60 filter blur-[1.5px] scale-85 transition-all duration-500 transform translate-x-4 cursor-pointer hover:opacity-85"
                title="Tap to switch"
            >
                <video class="w-full h-full object-cover pointer-events-none" id="coverflow-right-video" src="{{ asset($reels[1]['video_url']) }}" poster="{{ asset($reels[1]['poster']) }}" autoplay loop muted playsinline></video>
                <div class="absolute inset-0 bg-black/30 pointer-events-none"></div>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- FULL REEL LIGHTBOX MODAL (With Inside Shoppable Add-To-Cart Details)     -->
<!-- ========================================================================= -->
<div 
    id="reel-video-modal" 
    class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden items-center justify-center opacity-0 pointer-events-none transition-all duration-300 font-body select-none overflow-hidden"
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
    <div class="relative z-20 w-full max-w-md h-full max-h-[92vh] flex items-center justify-center px-3 sm:px-6">
        
        <!-- Left Nav Arrow in Modal -->
        <button 
            type="button" 
            id="modal-prev-arrow"
            class="absolute -left-3 sm:-left-12 top-1/2 -translate-y-1/2 z-40 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/90 text-[#121212] hover:bg-[#831F2E] hover:text-white flex items-center justify-center shadow-xl transition-all cursor-pointer focus:outline-none"
            aria-label="Previous Reel"
        >
            <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <!-- Main Playing Reel Card (Shoppable UI Inside) -->
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

            <!-- Gradient Shadow for Bottom Text Legibility -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent pointer-events-none z-10"></div>

            <!-- Top Header in Reel -->
            <div class="relative z-20 p-4 flex items-center justify-between">
                <div class="flex items-center space-x-2 bg-black/40 backdrop-blur-md px-3 py-1 rounded-full border border-white/20 text-white text-xs font-bold font-serif">
                    <span>✦ Manglam Vedic Rituals</span>
                </div>
            </div>

            <!-- Right Social Actions (Like & Audio) -->
            <div class="absolute right-3 bottom-32 sm:bottom-36 z-20 flex flex-col items-center space-y-3">
                <!-- Like Button -->
                <button 
                    type="button" 
                    id="modal-like-btn"
                    class="w-10 h-10 rounded-full bg-black/40 backdrop-blur-md border border-white/25 flex items-center justify-center text-white cursor-pointer"
                    aria-label="Like Video"
                >
                    <svg id="modal-heart-icon" class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </button>

                <!-- Mute Button -->
                <button 
                    type="button" 
                    id="modal-mute-btn"
                    class="w-10 h-10 rounded-full bg-black/40 backdrop-blur-md border border-white/25 flex items-center justify-center text-white cursor-pointer"
                    aria-label="Mute/Unmute"
                >
                    <svg id="modal-volume-icon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                    </svg>
                </button>
            </div>

            <!-- Bottom Shoppable Product Details Card (Inside Reel) -->
            <div class="relative z-20 p-3.5 sm:p-4 mt-auto">
                <div class="bg-black/65 backdrop-blur-md border border-white/20 p-3 rounded-[16px] shadow-2xl space-y-2.5">
                    
                    <!-- Product Info Row -->
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded-[10px] bg-white p-0.5 border border-white/30 shrink-0 overflow-hidden">
                            <img id="modal-product-img" src="" alt="Product Thumbnail" class="w-full h-full object-cover rounded-[8px]">
                        </div>

                        <div class="min-w-0 flex-1 text-left">
                            <h4 id="modal-product-title" class="text-xs sm:text-sm font-bold text-white truncate font-body">
                                Product Title
                            </h4>
                            <div class="flex items-baseline space-x-1.5 pt-0.5">
                                <span id="modal-product-price" class="text-xs sm:text-sm font-black text-white font-heading">₹399</span>
                                <span id="modal-product-mrp" class="text-[11px] text-white/60 line-through">₹499</span>
                                <span id="modal-product-discount" class="text-[11px] font-bold text-[#4ADE80]">20% OFF</span>
                            </div>
                        </div>
                    </div>

                    <!-- Add-To-Cart Action Button -->
                    <button 
                        type="button" 
                        id="modal-add-to-cart-btn"
                        class="quick-add-to-cart-btn w-full py-2.5 px-4 bg-white hover:bg-[#FAF5EE] text-[#121212] font-black text-xs sm:text-sm rounded-[10px] shadow-lg transition-all transform active:scale-95 flex items-center justify-center space-x-1.5 font-heading cursor-pointer focus:outline-none"
                        data-product-id="1"
                        data-product-title=""
                        data-product-slug=""
                        data-product-price=""
                        data-product-image=""
                    >
                        <span>Add to Cart</span>
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

<!-- Script for 3D Coverflow Navigation & Modal -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const reelsData = @json($reels);
        let currentIndex = 0;
        const totalReels = reelsData.length;

        const leftCard = document.getElementById('coverflow-left-card');
        const centerCard = document.getElementById('coverflow-center-card');
        const rightCard = document.getElementById('coverflow-right-card');

        const leftVideo = document.getElementById('coverflow-left-video');
        const centerVideo = document.getElementById('coverflow-center-video');
        const rightVideo = document.getElementById('coverflow-right-video');

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
        const modalCartBtn = document.getElementById('modal-add-to-cart-btn');
        const modalMuteBtn = document.getElementById('modal-mute-btn');
        const modalLikeBtn = document.getElementById('modal-like-btn');
        const modalHeartIcon = document.getElementById('modal-heart-icon');
        const modalPrevArrow = document.getElementById('modal-prev-arrow');
        const modalNextArrow = document.getElementById('modal-next-arrow');

        let isMuted = false;
        let isLiked = false;

        function updateCoverflow(index) {
            currentIndex = (index + totalReels) % totalReels;
            const prevIndex = (currentIndex - 1 + totalReels) % totalReels;
            const nextIndex = (currentIndex + 1) % totalReels;

            if (leftVideo) {
                leftVideo.src = '/' + reelsData[prevIndex].video_url;
                leftVideo.poster = '/' + reelsData[prevIndex].poster;
                leftVideo.play().catch(() => {});
            }
            if (centerVideo) {
                centerVideo.src = '/' + reelsData[currentIndex].video_url;
                centerVideo.poster = '/' + reelsData[currentIndex].poster;
                centerVideo.play().catch(() => {});
            }
            if (rightVideo) {
                rightVideo.src = '/' + reelsData[nextIndex].video_url;
                rightVideo.poster = '/' + reelsData[nextIndex].poster;
                rightVideo.play().catch(() => {});
            }
        }

        if (leftCard) leftCard.addEventListener('click', () => updateCoverflow(currentIndex - 1));
        if (rightCard) rightCard.addEventListener('click', () => updateCoverflow(currentIndex + 1));

        // Center card opens full reel modal
        if (centerCard) {
            centerCard.addEventListener('click', () => openModal(currentIndex));
        }

        function openModal(index) {
            currentIndex = (index + totalReels) % totalReels;
            const item = reelsData[currentIndex];
            if (!item) return;

            if (modalVideo) {
                modalVideo.src = '/' + item.video_url;
                modalVideo.poster = '/' + item.poster;
                modalVideo.muted = isMuted;
                modalVideo.currentTime = 0;
                modalVideo.play().catch(() => {
                    modalVideo.muted = true;
                    isMuted = true;
                    modalVideo.play().catch(() => {});
                });
            }

            if (modalImg) modalImg.src = '/' + item.thumbnail;
            if (modalTitle) modalTitle.textContent = item.title;
            if (modalPrice) modalPrice.textContent = '₹' + item.price;
            if (modalMrp) modalMrp.textContent = '₹' + item.mrp;
            if (modalDiscount) modalDiscount.textContent = item.discount;

            if (modalCartBtn) {
                modalCartBtn.setAttribute('data-product-id', item.id);
                modalCartBtn.setAttribute('data-product-title', item.title);
                modalCartBtn.setAttribute('data-product-slug', item.slug);
                modalCartBtn.setAttribute('data-product-price', item.price);
                modalCartBtn.setAttribute('data-product-image', '/' + item.thumbnail);
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

        if (modalMuteBtn && modalVideo) {
            modalMuteBtn.addEventListener('click', () => {
                isMuted = !isMuted;
                modalVideo.muted = isMuted;
            });
        }

        if (modalLikeBtn && modalHeartIcon) {
            modalLikeBtn.addEventListener('click', () => {
                isLiked = !isLiked;
                if (isLiked) {
                    modalHeartIcon.setAttribute('fill', '#EF4444');
                    modalHeartIcon.classList.add('text-red-500');
                } else {
                    modalHeartIcon.setAttribute('fill', 'none');
                    modalHeartIcon.classList.remove('text-red-500');
                }
            });
        }

        // Swipe Gestures on Coverflow
        const container = document.getElementById('coverflow-reels-container');
        if (container) {
            let touchStartX = 0;
            container.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            }, { passive: true });

            container.addEventListener('touchend', (e) => {
                const diff = touchStartX - e.changedTouches[0].clientX;
                if (Math.abs(diff) > 40) {
                    if (diff > 0) updateCoverflow(currentIndex + 1);
                    else updateCoverflow(currentIndex - 1);
                }
            }, { passive: true });
        }
    });
</script>
