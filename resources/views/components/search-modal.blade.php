<div 
    id="search-modal"
    class="fixed inset-0 z-50 overflow-y-auto opacity-0 pointer-events-none transition-all duration-300 ease-out"
    role="dialog" 
    aria-modal="true"
    aria-labelledby="search-modal-title"
>
    <!-- Backdrop Overlay -->
    <div id="search-modal-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>

    <div class="min-h-screen px-4 text-center flex items-start justify-center pt-16 sm:pt-24">
        
        <!-- Modal Content Container -->
        <div class="relative bg-white w-full max-w-3xl rounded-[8px] shadow-2xl p-6 sm:p-8 text-left z-10 border border-sadhna-border">
            
            <!-- Search Header & Input -->
            <div class="flex items-center justify-between pb-4 border-b border-sadhna-border">
                <div class="flex items-center flex-1 mr-4">
                    <svg class="w-6 h-6 text-sadhna-muted mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input 
                        type="search" 
                        id="predictive-search-input"
                        placeholder="Search pure pooja samagri, camphor, havan cups, attar..."
                        class="w-full text-base sm:text-lg text-sadhna-primary placeholder-sadhna-muted focus:outline-none border-none bg-transparent"
                        autocomplete="off"
                    >
                </div>
                <button 
                    type="button" 
                    id="search-modal-close"
                    class="p-2 text-sadhna-muted hover:text-sadhna-primary rounded-full hover:bg-gray-100 transition-colors focus:outline-none"
                    aria-label="Close search"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Quick Suggestions & Predictive Results Area -->
            <div class="mt-6 space-y-6">
                
                <!-- Quick Search Tags -->
                <div>
                    <h5 class="text-xs font-bold text-sadhna-muted uppercase tracking-widest mb-3">
                        Popular Searches
                    </h5>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" class="search-tag px-3 py-1 bg-sadhna-warm-bg text-xs font-medium text-sadhna-primary rounded-full border border-sadhna-border hover:border-sadhna-gold transition-colors">
                            Camphor (कपूर)
                        </button>
                        <button type="button" class="search-tag px-3 py-1 bg-sadhna-warm-bg text-xs font-medium text-sadhna-primary rounded-full border border-sadhna-border hover:border-sadhna-gold transition-colors">
                            Sandalwood Havan Cup
                        </button>
                        <button type="button" class="search-tag px-3 py-1 bg-sadhna-warm-bg text-xs font-medium text-sadhna-primary rounded-full border border-sadhna-border hover:border-sadhna-gold transition-colors">
                            Trial Pack Combo
                        </button>
                        <button type="button" class="search-tag px-3 py-1 bg-sadhna-warm-bg text-xs font-medium text-sadhna-primary rounded-full border border-sadhna-border hover:border-sadhna-gold transition-colors">
                            Bambooless Incense
                        </button>
                        <button type="button" class="search-tag px-3 py-1 bg-sadhna-warm-bg text-xs font-medium text-sadhna-primary rounded-full border border-sadhna-border hover:border-sadhna-gold transition-colors">
                            Devi Refill Pack
                        </button>
                    </div>
                </div>

                <!-- Visual Predictive Results Preview (UI Placeholder for Visual Verification) -->
                <div>
                    <h5 class="text-xs font-bold text-sadhna-muted uppercase tracking-widest mb-3">
                        Featured Products
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="predictive-results-container">
                        
                        <!-- Sample Result Card 1 -->
                        <a href="{{ route('products.show', 'camphor-bambooless-incense-sticks') }}" class="flex items-center p-2.5 rounded-md border border-sadhna-border hover:border-sadhna-gold hover:bg-sadhna-warm-bg/40 transition-all group">
                            <div class="w-14 h-14 bg-sadhna-warm-bg rounded border border-sadhna-border/60 flex items-center justify-center flex-shrink-0 text-sadhna-gold">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="8"/><path d="M12 6v12M6 12h12"/></svg>
                            </div>
                            <div class="ml-3 flex-1 min-w-0">
                                <h6 class="text-sm font-semibold text-sadhna-primary group-hover:text-sadhna-gold truncate">
                                    Camphor (कपूर) Bambooless Incense
                                </h6>
                                <div class="flex items-center space-x-2 mt-0.5">
                                    <span class="text-xs font-bold text-sadhna-primary">₹289.00</span>
                                    <span class="text-xs text-sadhna-muted line-through">₹375.00</span>
                                </div>
                            </div>
                        </a>

                        <!-- Sample Result Card 2 -->
                        <a href="{{ route('products.show', 'trial-pack-combo') }}" class="flex items-center p-2.5 rounded-md border border-sadhna-border hover:border-sadhna-gold hover:bg-sadhna-warm-bg/40 transition-all group">
                            <div class="w-14 h-14 bg-sadhna-warm-bg rounded border border-sadhna-border/60 flex items-center justify-center flex-shrink-0 text-sadhna-gold">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18"/></svg>
                            </div>
                            <div class="ml-3 flex-1 min-w-0">
                                <h6 class="text-sm font-semibold text-sadhna-primary group-hover:text-sadhna-gold truncate">
                                    Trial Pack Combo (5 Fragrances)
                                </h6>
                                <div class="flex items-center space-x-2 mt-0.5">
                                    <span class="text-xs font-bold text-sadhna-primary">₹799.00</span>
                                    <span class="text-xs text-sadhna-muted line-through">₹999.00</span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>

            <!-- Modal Bottom Help -->
            <div class="mt-6 pt-4 border-t border-sadhna-border flex items-center justify-between text-xs text-sadhna-muted">
                <span>Press <kbd class="px-1.5 py-0.5 bg-gray-100 border border-gray-300 rounded text-[11px] font-mono">ESC</kbd> to close</span>
                <a href="{{ route('collections.show', 'all') }}" class="text-sadhna-primary font-semibold hover:text-sadhna-gold">View all products &rarr;</a>
            </div>

        </div>

    </div>
</div>
