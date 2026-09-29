@props([
    'categories' => [
        [
            'name' => 'Bambooless Incense Sticks',
            'subtitle' => 'Non-irritating. Pure fragrances.',
            'slug' => 'incense-sticks',
            'icon' => 'incense'
        ],
        [
            'name' => 'Havan Cups',
            'subtitle' => '100% Organic & Vedic',
            'slug' => 'organic-havan-cups',
            'icon' => 'havan'
        ],
        [
            'name' => 'Dhoop Cones',
            'subtitle' => 'Charcoal Free | Low Smoke',
            'slug' => 'charcoal-free-dhoop-cones',
            'icon' => 'cone'
        ],
        [
            'name' => 'Attar Sprays',
            'subtitle' => 'Alcohol Free Fragrances',
            'slug' => 'attar-spray',
            'icon' => 'spray'
        ],
        [
            'name' => 'Combos',
            'subtitle' => 'Curated Gift Sets',
            'slug' => 'combos',
            'icon' => 'combo'
        ]
    ],
    'packOptions' => [
        [
            'title' => 'Trial Packs',
            'description' => 'Discover fragrances before you commit.',
            'url' => route('products.show', 'trial-pack-combo')
        ],
        [
            'title' => 'Pack of 40 Sticks',
            'description' => 'Ideal for everyday pooja & sacred gifting.',
            'url' => route('collections.show', 'pack-of-40')
        ],
        [
            'title' => 'Pack of 100 Sticks',
            'description' => 'Continue your daily pooja, effortlessly.',
            'url' => route('collections.show', 'refill-packs')
        ]
    ]
])

<div 
    id="pooja-shop-mega-menu"
    class="mega-menu-dropdown invisible opacity-0 translate-y-2 pointer-events-none absolute left-0 top-full w-[780px] lg:w-[820px] bg-white rounded-[16px] shadow-2xl border border-gray-100 transition-all duration-200 ease-out z-50 p-6 font-body text-left"
    aria-label="Pooja Shop Mega Menu"
>
    <div class="grid grid-cols-12 gap-6 items-stretch">
        
        <!-- Left: Large Brass Thali Image (Column 1 - 4.5 cols) -->
        <div class="col-span-5 rounded-[12px] overflow-hidden bg-[#FBF9F5] border border-[#EAE3D9]/60 aspect-square flex items-center justify-center relative group shadow-xs">
            <img 
                src="{{ asset('assets/images/mega-menu-thali.jpg') }}" 
                alt="Sacred Brass Pooja Thali" 
                class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
            >
            <a href="{{ route('collections.show', 'all') }}" class="absolute inset-0 z-10" aria-label="Explore All Pooja Items"></a>
        </div>

        <!-- Middle: Category Links (Column 2 - 3.8 cols) -->
        <div class="col-span-4 border-r border-[#EFECE6] pr-3 space-y-1 flex flex-col justify-center">
            @foreach($categories as $index => $category)
                <a 
                    href="{{ route('collections.show', $category['slug']) }}"
                    class="flex items-center justify-between px-3 py-2 rounded-[8px] transition-all group {{ $index === 0 ? 'bg-[#F6F5F2]' : 'hover:bg-[#F9F8F6]' }}"
                >
                    <div class="flex items-center space-x-3">
                        <!-- Custom Minimal Outline SVG Icons matching screenshot -->
                        <div class="w-6 h-6 flex items-center justify-center text-[#2A2A2A] shrink-0">
                            @if($category['icon'] === 'incense')
                                <!-- Incense Pot with sticks -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                    <path d="M7 21h10a2 2 0 002-2v-4H5v4a2 2 0 002 2z"/>
                                    <path d="M12 15V3m-4 12L7 6m10 9l1-9"/>
                                </svg>
                            @elseif($category['icon'] === 'havan')
                                <!-- Stepped Havan Kund with Flame -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                    <path d="M4 17h16M6 21h12M12 3c-2 3-1 5 0 7 1-2 2-4 0-7z"/>
                                    <path d="M8 17l1.5-4h5l1.5 4"/>
                                </svg>
                            @elseif($category['icon'] === 'cone')
                                <!-- Dhoop Cone with Smoke -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                    <path d="M12 7L7 20h10L12 7z"/>
                                    <path d="M12 2c0 2-1 3 0 5"/>
                                </svg>
                            @elseif($category['icon'] === 'spray')
                                <!-- Attar Spray Bottle with Fine Mist -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                    <rect x="7" y="9" width="10" height="12" rx="2"/>
                                    <path d="M10 9V5h4v4M8 5h8M5 4l-2-1m0 3h2"/>
                                </svg>
                            @else
                                <!-- Gift Combo with Ribbon -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                    <rect x="4" y="8" width="16" height="13" rx="1"/>
                                    <path d="M12 8v13M4 12h16M12 8a3 3 0 00-3-3c-1.5 0-2 1.5-1 3M12 8a3 3 0 013-3c1.5 0 2 1.5 1 3"/>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h4 class="text-[13px] font-bold text-[#1F1F1F] group-hover:text-[#D38928] transition-colors leading-tight font-heading">
                                {{ $category['name'] }}
                            </h4>
                            <p class="text-[10px] text-[#7A7A7A] leading-tight mt-0.5">
                                {{ $category['subtitle'] }}
                            </p>
                        </div>
                    </div>
                    @if($index === 0)
                        <svg class="w-3.5 h-3.5 text-[#333]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    @endif
                </a>
            @endforeach
        </div>

        <!-- Right: Pack Options (Column 3 - 3.7 cols) -->
        <div class="col-span-3 space-y-4 flex flex-col justify-center pl-1">
            @foreach($packOptions as $pack)
                <a 
                    href="{{ $pack['url'] }}" 
                    class="flex items-start space-x-3 p-1.5 rounded-[8px] hover:bg-[#F9F8F6] transition-colors group"
                >
                    <div class="w-6 h-6 flex items-center justify-center text-[#2A2A2A] mt-0.5 shrink-0">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                            <path d="M7 21h10a2 2 0 002-2v-4H5v4a2 2 0 002 2z"/>
                            <path d="M12 15V3m-4 12L7 6m10 9l1-9"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-[13px] font-bold text-[#1F1F1F] group-hover:text-[#D38928] transition-colors leading-tight font-heading">
                            {{ $pack['title'] }}
                        </h4>
                        <p class="text-[10px] text-[#7A7A7A] leading-snug mt-0.5">
                            {{ $pack['description'] }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</div>
