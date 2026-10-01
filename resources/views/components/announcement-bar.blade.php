<div class="w-full bg-[#831F2E] text-white border-b border-[#6E1724] text-xs py-2 shadow-xs font-body select-none relative overflow-hidden" id="announcement-bar">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 flex items-center justify-between">
        
        <!-- Left Navigation Arrow -->
        <button 
            type="button" 
            id="announcement-prev-btn" 
            class="p-1 text-white/80 hover:text-white transition-all transform hover:scale-110 active:scale-95 cursor-pointer focus:outline-none shrink-0" 
            aria-label="Previous Announcement"
        >
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Center Rotating Announcement Text (75% width centered) -->
        <div class="w-[75%] sm:w-[80%] mx-auto overflow-hidden relative h-5 flex items-center justify-center text-center" id="announcement-slider">
            
            <!-- Slide 1 -->
            <div class="announcement-slide absolute inset-0 flex items-center justify-center text-center transition-all duration-500 ease-in-out opacity-100 translate-x-0">
                <p class="text-[11px] sm:text-xs font-medium tracking-wide text-white truncate px-1">
                    Free Shipping on Orders Above ₹499 <span class="text-[#F6DAA8] mx-1.5 font-bold">•</span> COD Available Above ₹699
                </p>
            </div>

            <!-- Slide 2 -->
            <div class="announcement-slide absolute inset-0 flex items-center justify-center text-center transition-all duration-500 ease-in-out opacity-0 translate-x-8 pointer-events-none">
                <p class="text-[11px] sm:text-xs font-medium tracking-wide text-white truncate px-1">
                    <span class="font-bold text-[#F6DAA8]">100% Charcoal Free</span> <span class="text-[#F6DAA8] mx-1.5 font-bold">•</span> Pure Bamboo-Less Incense
                </p>
            </div>

            <!-- Slide 3 -->
            <div class="announcement-slide absolute inset-0 flex items-center justify-center text-center transition-all duration-500 ease-in-out opacity-0 translate-x-8 pointer-events-none">
                <p class="text-[11px] sm:text-xs font-medium tracking-wide text-white truncate px-1">
                    Handcrafted From Sacred Temple Flowers <span class="text-[#F6DAA8] mx-1.5 font-bold">•</span> <span class="font-bold tracking-wider uppercase text-[#F6DAA8]">शुद्धं समर्पयामि</span>
                </p>
            </div>

            <!-- Slide 4 -->
            <div class="announcement-slide absolute inset-0 flex items-center justify-center text-center transition-all duration-500 ease-in-out opacity-0 translate-x-8 pointer-events-none">
                <p class="text-[11px] sm:text-xs font-medium tracking-wide text-white truncate px-1">
                    Super Save Offer: <span class="font-bold text-[#F6DAA8]">Buy 2 Get 1 Free</span> on Sacred Combos
                </p>
            </div>

            <!-- Slide 5 -->
            <div class="announcement-slide absolute inset-0 flex items-center justify-center text-center transition-all duration-500 ease-in-out opacity-0 translate-x-8 pointer-events-none">
                <p class="text-[11px] sm:text-xs font-medium tracking-wide text-white truncate px-1">
                    Guaranteed Purity & Devotional Bliss <span class="text-[#F6DAA8] mx-1.5 font-bold">•</span> Hand-Rolled with Natural Herbs
                </p>
            </div>

        </div>

        <!-- Right Navigation Arrow -->
        <button 
            type="button" 
            id="announcement-next-btn" 
            class="p-1 text-white/80 hover:text-white transition-all transform hover:scale-110 active:scale-95 cursor-pointer focus:outline-none shrink-0" 
            aria-label="Next Announcement"
        >
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>

    </div>
</div>

<script>
    (function() {
        function initAnnouncementSlider() {
            const bar = document.getElementById('announcement-bar');
            if (!bar) return;

            const slides = bar.querySelectorAll('.announcement-slide');
            const prevBtn = document.getElementById('announcement-prev-btn');
            const nextBtn = document.getElementById('announcement-next-btn');
            if (slides.length <= 1) return;

            let currentIndex = 0;
            let timer = null;
            const INTERVAL_MS = 4000;

            function goToSlide(newIndex, direction = 'next') {
                if (newIndex === currentIndex) return;

                const currentSlide = slides[currentIndex];
                const nextSlide = slides[newIndex];

                // Remove active classes from current
                currentSlide.classList.remove('opacity-100', 'translate-x-0');
                currentSlide.classList.add('opacity-0', 'pointer-events-none');
                if (direction === 'next') {
                    currentSlide.classList.add('-translate-x-8');
                    currentSlide.classList.remove('translate-x-8');
                } else {
                    currentSlide.classList.add('translate-x-8');
                    currentSlide.classList.remove('-translate-x-8');
                }

                // Prepare next slide position before transition
                nextSlide.classList.remove('opacity-100', '-translate-x-8', 'translate-x-8');
                if (direction === 'next') {
                    nextSlide.classList.add('translate-x-8');
                } else {
                    nextSlide.classList.add('-translate-x-8');
                }

                // Force reflow
                void nextSlide.offsetWidth;

                // Animate next slide into place
                nextSlide.classList.remove('opacity-0', 'pointer-events-none', '-translate-x-8', 'translate-x-8');
                nextSlide.classList.add('opacity-100', 'translate-x-0');

                currentIndex = newIndex;
            }

            function nextSlide() {
                const newIndex = (currentIndex + 1) % slides.length;
                goToSlide(newIndex, 'next');
            }

            function prevSlide() {
                const newIndex = (currentIndex - 1 + slides.length) % slides.length;
                goToSlide(newIndex, 'prev');
            }

            function startTimer() {
                stopTimer();
                timer = setInterval(nextSlide, INTERVAL_MS);
            }

            function stopTimer() {
                if (timer) {
                    clearInterval(timer);
                    timer = null;
                }
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    startTimer();
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    startTimer();
                });
            }

            bar.addEventListener('mouseenter', stopTimer);
            bar.addEventListener('mouseleave', startTimer);

            startTimer();
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initAnnouncementSlider);
        } else {
            initAnnouncementSlider();
        }
    })();
</script>
