<div 
    id="search-modal"
    class="fixed inset-0 z-50 overflow-y-auto opacity-0 pointer-events-none transition-all duration-300 ease-out font-body"
    role="dialog" 
    aria-modal="true"
    aria-labelledby="search-modal-title"
>
    <!-- Backdrop Overlay -->
    <div id="search-modal-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity cursor-pointer"></div>

    <div class="min-h-screen px-3 sm:px-4 text-center flex items-start justify-center pt-12 sm:pt-20">
        
        <!-- Modal Content Container -->
        <div class="relative bg-white w-full max-w-3xl rounded-[16px] shadow-2xl p-5 sm:p-7 text-left z-10 border border-[#EADBCC] space-y-5" onclick="event.stopPropagation()">
            
            <!-- Search Header & Input Form -->
            <form id="search-modal-form" action="{{ route('search.index') }}" method="GET" class="m-0">
                <div class="flex items-center justify-between pb-3.5 border-b border-[#EADBCC] gap-3">
                    <div class="flex items-center flex-1 min-w-0">
                        <svg class="w-5 h-5 text-[#D38928] mr-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input 
                            type="search" 
                            name="q"
                            id="predictive-search-input"
                            placeholder="Search pure pooja samagri, camphor, havan cups, attar..."
                            class="w-full text-sm sm:text-base text-[#121212] placeholder-gray-400 focus:outline-none border-none bg-transparent"
                            autocomplete="off"
                        >
                    </div>

                    <!-- Search Loader Spinner -->
                    <div id="search-spinner" class="hidden shrink-0">
                        <svg class="animate-spin h-5 w-5 text-[#D38928]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>

                    <button 
                        type="button" 
                        id="search-modal-close"
                        class="p-2 text-gray-400 hover:text-[#121212] rounded-full hover:bg-gray-100 transition-colors focus:outline-none shrink-0"
                        aria-label="Close search"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Matching Categories Pill Container (hidden when empty) -->
            <div id="search-categories-section" class="hidden space-y-2">
                <span class="text-[11px] font-bold uppercase tracking-wider text-gray-400 font-body">Matching Categories:</span>
                <div id="search-categories-container" class="flex flex-wrap gap-2"></div>
            </div>

            <!-- Quick Suggestions & Predictive Results Area -->
            <div class="space-y-4 max-h-[60vh] overflow-y-auto pr-1 shopify-scrollbar" id="search-scroll-area">
                
                <!-- Popular Searches Tags (Visible initially or when input empty) -->
                <div id="popular-searches-box">
                    <h5 class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2.5 font-body">
                        Popular Searches
                    </h5>
                    <div class="flex flex-wrap gap-2 font-body">
                        <button type="button" class="search-tag px-3 py-1.5 bg-[#FAF7F2] text-xs font-semibold text-[#121212] rounded-full border border-[#EADBCC] hover:border-[#D38928] hover:text-[#D38928] hover:bg-white transition-all font-body">
                            Camphor (कपूर)
                        </button>
                        <button type="button" class="search-tag px-3 py-1.5 bg-[#FAF7F2] text-xs font-semibold text-[#121212] rounded-full border border-[#EADBCC] hover:border-[#D38928] hover:text-[#D38928] hover:bg-white transition-all font-body">
                            Sandalwood Havan Cup
                        </button>
                        <button type="button" class="search-tag px-3 py-1.5 bg-[#FAF7F2] text-xs font-semibold text-[#121212] rounded-full border border-[#EADBCC] hover:border-[#D38928] hover:text-[#D38928] hover:bg-white transition-all font-body">
                            Trial Pack Combo
                        </button>
                        <button type="button" class="search-tag px-3 py-1.5 bg-[#FAF7F2] text-xs font-semibold text-[#121212] rounded-full border border-[#EADBCC] hover:border-[#D38928] hover:text-[#D38928] hover:bg-white transition-all font-body">
                            Bambooless Incense
                        </button>
                        <button type="button" class="search-tag px-3 py-1.5 bg-[#FAF7F2] text-xs font-semibold text-[#121212] rounded-full border border-[#EADBCC] hover:border-[#D38928] hover:text-[#D38928] hover:bg-white transition-all font-body">
                            Devi Refill Pack
                        </button>
                        <button type="button" class="search-tag px-3 py-1.5 bg-[#FAF7F2] text-xs font-semibold text-[#121212] rounded-full border border-[#EADBCC] hover:border-[#D38928] hover:text-[#D38928] hover:bg-white transition-all font-body">
                            Natural Attar Spray
                        </button>
                    </div>
                </div>

                <!-- Predictive Search Results Header & List -->
                <div>
                    <div class="flex items-center justify-between mb-2.5">
                        <h5 id="results-header-title" class="text-[11px] font-bold text-gray-400 uppercase tracking-widest font-body">
                            Featured Products
                        </h5>
                        <span id="results-count-label" class="text-[11px] font-bold text-[#D38928] font-body hidden"></span>
                    </div>

                    <!-- Products Grid / Results List -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="predictive-results-container">
                        <!-- Populated dynamically via JS -->
                    </div>

                    <!-- Empty State (When no results found) -->
                    <div id="search-empty-state" class="hidden py-10 text-center space-y-3 font-body">
                        <div class="w-12 h-12 mx-auto bg-[#FAF7F2] rounded-full flex items-center justify-center text-2xl">
                            🔍
                        </div>
                        <h4 class="text-sm font-bold text-[#121212] font-body">No sacred products found</h4>
                        <p class="text-xs text-gray-400 max-w-xs mx-auto font-body">
                            We couldn't find any products matching your search. Try checking for typos or searching by keyword.
                        </p>
                        <a href="{{ route('collections.show', 'all') }}" class="inline-block px-4 py-2 bg-[#D38928] text-white text-xs font-bold rounded-[8px] font-body">
                            Browse All Collections
                        </a>
                    </div>
                </div>

            </div>

            <!-- Modal Bottom Help & All Products Link -->
            <div class="pt-3 border-t border-[#EADBCC] flex items-center justify-between text-xs text-gray-400 font-body">
                <span class="hidden sm:inline">Press <kbd class="px-1.5 py-0.5 bg-gray-100 border border-gray-300 rounded text-[10px] font-mono text-gray-700">ESC</kbd> to close</span>
                <a href="{{ route('collections.show', 'all') }}" class="text-[#D38928] font-bold hover:underline font-body">View full collection &rarr;</a>
            </div>

        </div>

    </div>
</div>
