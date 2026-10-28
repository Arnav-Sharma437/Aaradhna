@extends('layouts.admin')

@section('title', 'QR Scan Tracking & Packaging Analytics')

@section('content')
<div class="space-y-6 pb-12 font-body">
    
    <!-- ========================================================================= -->
    <!-- 1. TOP HEADER & QUICK ACTIONS                                             -->
    <!-- ========================================================================= -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <div class="flex items-center space-x-2.5">
                <div class="w-10 h-10 rounded-[10px] bg-[#A86911]/15 text-[#A86911] flex items-center justify-center font-bold text-xl shadow-2xs">
                    📱
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-black font-heading text-[#121212] tracking-tight">
                        QR Scan Tracking &amp; Analytics
                    </h1>
                    <p class="text-xs text-gray-500 mt-0.5">
                        Permanent product packaging QR code (<code class="text-[#A86911] font-mono font-semibold">{{ $targetUrl }}</code>) • Customer scan analytics
                    </p>
                </div>
            </div>
        </div>

        <!-- Header Actions: Copy URL & Quick Downloads -->
        <div class="flex flex-wrap items-center gap-2">
            <button 
                type="button" 
                onclick="copyQrLink('{{ $targetUrl }}')" 
                id="copy-link-btn"
                class="inline-flex items-center space-x-1.5 px-3.5 py-2 bg-white hover:bg-gray-50 border border-[#E5E7EB] text-gray-700 text-xs font-semibold rounded-[8px] shadow-2xs transition-colors cursor-pointer"
                title="Copy the public tracking URL to clipboard"
            >
                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                <span id="copy-btn-text">Copy URL</span>
            </button>

            <a 
                href="{{ route('admin.qr-analytics.download', 'png') }}" 
                class="inline-flex items-center space-x-1.5 px-3.5 py-2 bg-white hover:bg-gray-50 border border-[#E5E7EB] text-gray-700 text-xs font-semibold rounded-[8px] shadow-2xs transition-colors"
                title="Download Print-Ready PNG (300 DPI)"
            >
                <svg class="w-3.5 h-3.5 text-[#A86911]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                <span>Download QR (.PNG)</span>
            </a>

            <a 
                href="{{ route('admin.qr-analytics.download', 'svg') }}" 
                class="inline-flex items-center space-x-1.5 px-3.5 py-2 bg-white hover:bg-gray-50 border border-[#E5E7EB] text-gray-700 text-xs font-semibold rounded-[8px] shadow-2xs transition-colors"
                title="Download Vector SVG (Infinite Scale)"
            >
                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                <span>Vector (.SVG)</span>
            </a>

            <form method="POST" action="{{ route('admin.qr-analytics.regenerate') }}" class="m-0">
                @csrf
                <button 
                    type="submit" 
                    class="inline-flex items-center space-x-1.5 px-3.5 py-2 bg-[#A86911] hover:bg-[#8D540A] text-white text-xs font-bold rounded-[8px] shadow-xs transition-colors font-heading cursor-pointer"
                    title="Regenerate all QR images and vector labels"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    <span>Regenerate Assets</span>
                </button>
            </form>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 2. FOUR HIGH-LEVEL POLARIS KPI SUMMARY CARDS                              -->
    <!-- ========================================================================= -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- 1. Total All-Time Scans -->
        <div class="bg-white rounded-[14px] p-4 sm:p-5 border border-[#E5E7EB] shadow-2xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">All-Time Scans</span>
                <div class="w-8 h-8 rounded-full bg-amber-50 text-[#A86911] flex items-center justify-center font-bold text-sm">
                    📦
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-[#121212] font-heading">
                {{ number_format($totalAllTime) }}
            </div>
            <p class="text-[11px] text-gray-400">Total customer scans recorded</p>
        </div>

        <!-- 2. Today's Scans -->
        <div class="bg-white rounded-[14px] p-4 sm:p-5 border border-[#E5E7EB] shadow-2xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Scans Today</span>
                <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm">
                    ⚡
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-emerald-700 font-heading">
                {{ number_format($todayScans) }}
            </div>
            <p class="text-[11px] text-gray-400">Since 12:00 AM today</p>
        </div>

        <!-- 3. Unique Visitors in Filter Range -->
        <div class="bg-white rounded-[14px] p-4 sm:p-5 border border-[#E5E7EB] shadow-2xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Approx. Unique Visitors</span>
                <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-sm">
                    👤
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-blue-700 font-heading">
                {{ number_format($rangeUniqueVisitors) }}
            </div>
            <p class="text-[11px] text-gray-400">{{ $rangeLabel }} ({{ number_format($allTimeUniques) }} all-time)</p>
        </div>

        <!-- 4. Selected Range Total Scans -->
        <div class="bg-white rounded-[14px] p-4 sm:p-5 border border-[#E5E7EB] shadow-2xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Range Scans</span>
                <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-sm">
                    📊
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-purple-700 font-heading">
                {{ number_format($rangeTotalScans) }}
            </div>
            <p class="text-[11px] text-gray-400">{{ $rangeLabel }} total activity</p>
        </div>

    </div>

    <!-- ========================================================================= -->
    <!-- 3. DATE RANGE & SOURCE FILTERS BAR                                        -->
    <!-- ========================================================================= -->
    <div class="bg-white rounded-[14px] p-4 border border-[#E5E7EB] shadow-2xs">
        <form method="GET" action="{{ route('admin.qr-analytics.index') }}" class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 m-0" id="filter-form">
            
            <!-- Quick Preset Pills -->
            <div class="flex flex-wrap items-center gap-1.5">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mr-1">Timeframe:</span>
                
                @foreach([
                    '7d'         => 'Last 7 Days',
                    'today'      => 'Today',
                    'yesterday'  => 'Yesterday',
                    '30d'        => 'Last 30 Days',
                    'this_month' => 'This Month',
                    'all'        => 'All Time',
                ] as $val => $label)
                    <a 
                        href="{{ route('admin.qr-analytics.index', array_merge(request()->except(['range', 'from', 'to', 'page']), ['range' => $val])) }}"
                        class="px-3 py-1.5 rounded-[8px] text-xs font-semibold transition-all {{ $range === $val ? 'bg-[#1A1A1A] text-white shadow-xs' : 'bg-[#F6F6F7] text-gray-600 hover:bg-gray-200' }}"
                    >
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <!-- Custom Date Range Inputs -->
            <div class="flex flex-wrap items-center gap-2">
                <input type="hidden" name="range" value="custom">
                
                <div class="flex items-center space-x-1.5 bg-[#F6F6F7] px-2.5 py-1.5 rounded-[8px] border border-gray-200 text-xs">
                    <span class="text-gray-400">From:</span>
                    <input 
                        type="date" 
                        name="from" 
                        value="{{ $customFrom ?? '' }}" 
                        class="bg-transparent text-xs font-medium text-gray-700 focus:outline-none border-none p-0 cursor-pointer"
                    >
                </div>

                <div class="flex items-center space-x-1.5 bg-[#F6F6F7] px-2.5 py-1.5 rounded-[8px] border border-gray-200 text-xs">
                    <span class="text-gray-400">To:</span>
                    <input 
                        type="date" 
                        name="to" 
                        value="{{ $customTo ?? '' }}" 
                        class="bg-transparent text-xs font-medium text-gray-700 focus:outline-none border-none p-0 cursor-pointer"
                    >
                </div>

                <button 
                    type="submit" 
                    class="px-3.5 py-1.5 bg-[#1A1A1A] hover:bg-[#333333] text-white text-xs font-bold rounded-[8px] shadow-2xs transition-colors cursor-pointer"
                >
                    Apply
                </button>

                @if($range === 'custom')
                    <a 
                        href="{{ route('admin.qr-analytics.index') }}" 
                        class="text-xs text-gray-500 hover:text-red-600 underline font-medium"
                    >
                        Reset
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- ========================================================================= -->
    <!-- 4. DAILY SCAN TREND CHART CARD                                            -->
    <!-- ========================================================================= -->
    <div class="bg-white rounded-[16px] p-5 sm:p-6 border border-[#E5E7EB] shadow-2xs space-y-4">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-gray-100">
            <div>
                <h3 class="text-base font-bold text-[#121212] font-heading">
                    Daily Scan Activity Trend
                </h3>
                <p class="text-xs text-gray-500">
                    Showing daily total scans and approximate unique visitors for <strong class="text-[#121212]">{{ $rangeLabel }}</strong>
                </p>
            </div>
            
            <div class="flex items-center space-x-4 text-xs font-semibold">
                <span class="flex items-center space-x-1.5 text-gray-700">
                    <span class="w-3 h-3 rounded-full bg-[#A86911]"></span>
                    <span>Total Scans</span>
                </span>
                <span class="flex items-center space-x-1.5 text-gray-700">
                    <span class="w-3 h-3 rounded-full bg-[#059669]"></span>
                    <span>Unique Visitors</span>
                </span>
            </div>
        </div>

        <!-- Chart.js Container -->
        <div class="relative w-full h-[280px] sm:h-[320px]">
            <canvas id="qrDailyChart"></canvas>
        </div>

        @if(array_sum($chartTotalData) === 0)
            <div class="py-4 text-center text-xs text-gray-400 bg-gray-50 rounded-[10px] border border-dashed border-gray-200">
                No scan activity recorded in this selected period yet. Scan the QR code below on your phone to see live tracking!
            </div>
        @endif
    </div>

    <!-- ========================================================================= -->
    <!-- 5. BREAKDOWN INTELLIGENCE (Devices & Acquisition Channels)                 -->
    <!-- ========================================================================= -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Left: Device & Platform Breakdown -->
        <div class="bg-white rounded-[16px] p-5 sm:p-6 border border-[#E5E7EB] shadow-2xs space-y-5">
            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                <div>
                    <h3 class="text-sm font-bold text-[#121212] font-heading">
                        Device &amp; Operating System
                    </h3>
                    <p class="text-xs text-gray-400">Mobile cameras, tablets &amp; desktop scanners</p>
                </div>
                <span class="text-xs font-bold text-gray-400 font-mono">CLIENT TYPE</span>
            </div>

            <!-- Device Distribution Bars -->
            <div class="space-y-3">
                @php
                    $deviceTotal = $deviceBreakdown->sum('count') ?: 1;
                @endphp
                @forelse($deviceBreakdown as $dev)
                    @php
                        $pct = round(($dev->count / $deviceTotal) * 100, 1);
                        $icon = match(strtolower($dev->device_type ?? '')) {
                            'mobile' => '📱 Mobile',
                            'tablet' => '📟 Tablet',
                            'bot' => '🤖 Web Crawler / Bot',
                            default => '💻 Desktop / Laptop',
                        };
                    @endphp
                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-xs font-semibold text-gray-700">
                            <span>{{ $icon }}</span>
                            <span class="font-mono text-gray-900">{{ number_format($dev->count) }} ({{ $pct }}%)</span>
                        </div>
                        <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-[#D38928] to-[#A86911] rounded-full" style="width: {{ $pct }}%;"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-gray-400 py-3 text-center">No device data available yet.</p>
                @endforelse
            </div>

            <!-- OS & Browser Badges Grid -->
            <div class="pt-2 border-t border-gray-100 grid grid-cols-2 gap-3 text-xs">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-2">Operating Systems</span>
                    <ul class="space-y-1 text-gray-600">
                        @forelse($platformBreakdown as $p)
                            <li class="flex items-center justify-between">
                                <span class="truncate">{{ $p->platform ?: 'Unknown' }}</span>
                                <span class="font-bold text-gray-900 font-mono">{{ $p->count }}</span>
                            </li>
                        @empty
                            <li class="text-gray-400">—</li>
                        @endforelse
                    </ul>
                </div>

                <div>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-2">Top Browsers</span>
                    <ul class="space-y-1 text-gray-600">
                        @forelse($browserBreakdown as $b)
                            <li class="flex items-center justify-between">
                                <span class="truncate">{{ $b->browser ?: 'Standard Browser' }}</span>
                                <span class="font-bold text-gray-900 font-mono">{{ $b->count }}</span>
                            </li>
                        @empty
                            <li class="text-gray-400">—</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>

        <!-- Right: Source & Campaign Breakdown -->
        <div class="bg-white rounded-[16px] p-5 sm:p-6 border border-[#E5E7EB] shadow-2xs space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                <div>
                    <h3 class="text-sm font-bold text-[#121212] font-heading">
                        Acquisition Source &amp; Attribution
                    </h3>
                    <p class="text-xs text-gray-400">Packaging, flyers, in-box cards &amp; campaigns</p>
                </div>
                <span class="text-xs font-bold text-gray-400 font-mono">CHANNELS</span>
            </div>

            <!-- Source Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-gray-100 text-[10px] font-bold uppercase tracking-wider text-gray-400">
                            <th class="pb-2">Source Channel</th>
                            <th class="pb-2 text-right">Total Scans</th>
                            <th class="pb-2 text-right">Unique Visitors</th>
                            <th class="pb-2 text-right">Share</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @php
                            $sourceTotal = $sourceBreakdown->sum('count') ?: 1;
                        @endphp
                        @forelse($sourceBreakdown as $s)
                            @php
                                $share = round(($s->count / $sourceTotal) * 100, 1);
                            @endphp
                            <tr class="hover:bg-gray-50/50">
                                <td class="py-2.5 font-bold text-gray-800 flex items-center space-x-1.5">
                                    <span class="w-2 h-2 rounded-full bg-[#A86911]"></span>
                                    <span>{{ ucfirst($s->source) }}</span>
                                </td>
                                <td class="py-2.5 text-right font-mono font-bold text-gray-900">{{ number_format($s->count) }}</td>
                                <td class="py-2.5 text-right font-mono text-gray-600">{{ number_format($s->unique_count) }}</td>
                                <td class="py-2.5 text-right font-mono text-[#A86911] font-semibold">{{ $share }}%</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-gray-400">No acquisition sources recorded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Campaign Tip -->
            <div class="p-3 bg-amber-50/70 border border-amber-200/60 rounded-[10px] text-[11px] text-amber-900 leading-relaxed">
                💡 <strong>Tip for Marketing &amp; Influencers:</strong> You can create custom campaign tracking links by appending <code class="font-mono font-bold bg-white px-1 py-0.5 rounded border border-amber-300">?source=flyer&amp;campaign=diwali</code> to <code class="font-mono font-bold bg-white px-1 py-0.5 rounded border border-amber-300">{{ $targetUrl }}</code>. All parameters are tracked and automatically forwarded to the homepage!
            </div>
        </div>

    </div>

    <!-- ========================================================================= -->
    <!-- 6. PRINT-READY QR ASSETS & COMMERCIAL PACKAGING LABELS                     -->
    <!-- ========================================================================= -->
    <div class="bg-white rounded-[16px] p-5 sm:p-7 border border-[#E5E7EB] shadow-2xs space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 border-b border-gray-100">
            <div>
                <h3 class="text-base font-bold text-[#121212] font-heading flex items-center space-x-2">
                    <span>🖨️</span>
                    <span>Print-Ready QR Assets for Packaging &amp; Labels</span>
                </h3>
                <p class="text-xs text-gray-500">
                    High-contrast black-and-white QR code with High Error Correction (Level H ~30%) and generous quiet zone margin.
                </p>
            </div>

            <!-- Verification Status Badge -->
            <div>
                @if($verification['success'] ?? false)
                    <span class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold font-mono">
                        <span>✓ Decodes to: {{ $targetUrl }}</span>
                    </span>
                @else
                    <span class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full bg-rose-50 text-rose-700 border border-rose-200 text-xs font-bold font-mono">
                        <span>⚠️ Decoding Status Unverified</span>
                    </span>
                @endif
            </div>
        </div>

        <!-- 4 Grid Asset Download Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            
            <!-- Asset 1: Raw High-Res PNG -->
            <div class="p-4 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC] flex flex-col justify-between space-y-3">
                <div class="space-y-2">
                    <div class="w-full aspect-square bg-white rounded-[8px] p-3 flex items-center justify-center border border-[#EADBCC]/60 shadow-2xs">
                        <img src="{{ $qrFiles['raw_png']['url'] }}" alt="Raw QR Code PNG" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#121212] font-heading">High-Res Raw QR (.PNG)</h4>
                        <p class="text-[11px] text-gray-500">300 DPI master raster for box flaps, stickers &amp; bottle labels</p>
                    </div>
                </div>
                <div class="pt-2 border-t border-[#EADBCC]/60 flex items-center justify-between">
                    <span class="text-[10px] text-gray-400 font-mono">{{ $qrFiles['raw_png']['size'] }} KB</span>
                    <a href="{{ route('admin.qr-analytics.download', 'png') }}" class="px-3 py-1.5 bg-[#A86911] hover:bg-[#8D540A] text-white text-xs font-bold rounded-[6px] shadow-2xs font-heading">
                        Download PNG
                    </a>
                </div>
            </div>

            <!-- Asset 2: Raw Infinite Vector SVG -->
            <div class="p-4 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC] flex flex-col justify-between space-y-3">
                <div class="space-y-2">
                    <div class="w-full aspect-square bg-white rounded-[8px] p-3 flex items-center justify-center border border-[#EADBCC]/60 shadow-2xs">
                        <img src="{{ $qrFiles['raw_svg']['url'] }}" alt="Raw QR Code SVG" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#121212] font-heading">Vector Master QR (.SVG)</h4>
                        <p class="text-[11px] text-gray-500">Infinite scalable vector for die-cut packaging &amp; flexo printing</p>
                    </div>
                </div>
                <div class="pt-2 border-t border-[#EADBCC]/60 flex items-center justify-between">
                    <span class="text-[10px] text-gray-400 font-mono">{{ $qrFiles['raw_svg']['size'] }} KB</span>
                    <a href="{{ route('admin.qr-analytics.download', 'svg') }}" class="px-3 py-1.5 bg-[#1A1A1A] hover:bg-[#333333] text-white text-xs font-bold rounded-[6px] shadow-2xs font-heading">
                        Download SVG
                    </a>
                </div>
            </div>

            <!-- Asset 3: Premium Branded Packaging Label (PNG) -->
            <div class="p-4 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC] flex flex-col justify-between space-y-3">
                <div class="space-y-2">
                    <div class="w-full aspect-square bg-white rounded-[8px] p-2 flex items-center justify-center border border-[#EADBCC]/60 shadow-2xs overflow-hidden">
                        <img src="{{ $qrFiles['branded_png']['url'] }}" alt="Branded Packaging Label PNG" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#121212] font-heading">Branded Label Card (.PNG)</h4>
                        <p class="text-[11px] text-gray-500">Complete artwork with “SCAN TO VISIT” &amp; “ISHANAA.IN” typography</p>
                    </div>
                </div>
                <div class="pt-2 border-t border-[#EADBCC]/60 flex items-center justify-between">
                    <span class="text-[10px] text-gray-400 font-mono">{{ $qrFiles['branded_png']['size'] }} KB</span>
                    <a href="{{ route('admin.qr-analytics.download', 'label-png') }}" class="px-3 py-1.5 bg-[#A86911] hover:bg-[#8D540A] text-white text-xs font-bold rounded-[6px] shadow-2xs font-heading">
                        Download Label
                    </a>
                </div>
            </div>

            <!-- Asset 4: Premium Branded Packaging Label (SVG) -->
            <div class="p-4 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC] flex flex-col justify-between space-y-3">
                <div class="space-y-2">
                    <div class="w-full aspect-square bg-white rounded-[8px] p-2 flex items-center justify-center border border-[#EADBCC]/60 shadow-2xs overflow-hidden">
                        <img src="{{ $qrFiles['branded_svg']['url'] }}" alt="Branded Packaging Label SVG" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#121212] font-heading">Branded Vector Label (.SVG)</h4>
                        <p class="text-[11px] text-gray-500">Full vector card artwork for offset print designers &amp; pre-press</p>
                    </div>
                </div>
                <div class="pt-2 border-t border-[#EADBCC]/60 flex items-center justify-between">
                    <span class="text-[10px] text-gray-400 font-mono">{{ $qrFiles['branded_svg']['size'] }} KB</span>
                    <a href="{{ route('admin.qr-analytics.download', 'label-svg') }}" class="px-3 py-1.5 bg-[#1A1A1A] hover:bg-[#333333] text-white text-xs font-bold rounded-[6px] shadow-2xs font-heading">
                        Download SVG
                    </a>
                </div>
            </div>

        </div>

    </div>

    <!-- ========================================================================= -->
    <!-- 7. RECENT SCAN ACTIVITY TABLE                                             -->
    <!-- ========================================================================= -->
    <div class="bg-white rounded-[16px] border border-[#E5E7EB] shadow-2xs overflow-hidden">
        
        <div class="p-5 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <div>
                <h3 class="text-base font-bold text-[#121212] font-heading">
                    Live Scan Activity Log
                </h3>
                <p class="text-xs text-gray-500">
                    Real-time chronological log of customer QR scans (Showing {{ $recentScans->count() }} of {{ $recentScans->total() }} records)
                </p>
            </div>
            <span class="text-xs text-gray-400 font-mono">PAGINATED RECORD</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F9FAFB] border-b border-gray-100 text-[10px] font-bold uppercase tracking-wider text-gray-500">
                    <tr>
                        <th class="py-3 px-4">Scanned At</th>
                        <th class="py-3 px-4">Channel / Source</th>
                        <th class="py-3 px-4">Device</th>
                        <th class="py-3 px-4">Platform &amp; Browser</th>
                        <th class="py-3 px-4">Visitor Fingerprint</th>
                        <th class="py-3 px-4">Referrer</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-body">
                    @forelse($recentScans as $scan)
                        @php
                            $deviceIcon = match(strtolower($scan->device_type ?? '')) {
                                'mobile' => '📱',
                                'tablet' => '📟',
                                'bot' => '🤖',
                                default => '💻',
                            };
                        @endphp
                        <tr class="hover:bg-amber-50/30 transition-colors">
                            <td class="py-3 px-4 whitespace-nowrap">
                                <span class="font-bold text-gray-900 block">{{ $scan->scanned_at ? $scan->scanned_at->format('M d, Y • h:i A') : '—' }}</span>
                                <span class="text-[10px] text-gray-400">{{ $scan->scanned_at ? $scan->scanned_at->diffForHumans() : '' }}</span>
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center space-x-1 px-2.5 py-0.5 rounded-full bg-amber-50 text-[#A86911] font-bold text-[11px] border border-amber-200">
                                    <span>🏷️</span>
                                    <span>{{ $scan->source }}</span>
                                </span>
                                @if($scan->campaign)
                                    <span class="text-[10px] text-gray-500 block mt-0.5 font-mono">Campaign: {{ $scan->campaign }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <span class="font-bold text-gray-800 flex items-center space-x-1">
                                    <span>{{ $deviceIcon }}</span>
                                    <span>{{ ucfirst($scan->device_type ?? 'Desktop') }}</span>
                                </span>
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <span class="text-gray-900 font-medium block">{{ $scan->platform ?: '—' }}</span>
                                <span class="text-[10px] text-gray-500">{{ $scan->browser ?: 'Browser' }}</span>
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <code class="text-[11px] text-gray-600 bg-gray-100 px-2 py-0.5 rounded border border-gray-200 font-mono" title="{{ $scan->visitor_hash }}">
                                    {{ $scan->short_hash }}
                                </code>
                            </td>
                            <td class="py-3 px-4 text-gray-500 truncate max-w-[200px]" title="{{ $scan->referrer }}">
                                {{ $scan->referrer ? parse_url($scan->referrer, PHP_URL_HOST) ?? $scan->referrer : 'Direct Camera / Packaging' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center space-y-2">
                                <div class="text-3xl">📭</div>
                                <h4 class="text-sm font-bold text-gray-800">No QR Scans Found</h4>
                                <p class="text-xs text-gray-400 max-w-sm mx-auto">
                                    There are no scans matching the selected timeframe. Try switching to "All Time" or test-scan your QR code.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($recentScans->hasPages())
            <div class="p-4 border-t border-gray-100 bg-[#F9FAFB]">
                {{ $recentScans->links() }}
            </div>
        @endif

    </div>

    <!-- ========================================================================= -->
    <!-- 8. PRIVACY COMPLIANCE & METHODOLOGY DOCUMENTATION NOTE                   -->
    <!-- ========================================================================= -->
    <div class="bg-gray-50 rounded-[14px] p-4 sm:p-5 border border-gray-200 text-xs text-gray-600 space-y-2 leading-relaxed">
        <div class="flex items-center space-x-2 font-bold text-gray-800">
            <span>🔒</span>
            <span>Privacy-Compliant Tracking &amp; Unique Visitor Methodology</span>
        </div>
        <p>
            <strong>Zero Raw IP Storage:</strong> In accordance with global privacy principles (GDPR / Indian DPDP Act), raw IP addresses are never persisted in plaintext. Each visitor is identified using an irreversible SHA-256 one-way cryptographic hash of their IP address, browser User-Agent, and the application secret key.
        </p>
        <p>
            <strong>Technical Limitations of Unique Visitor Estimation:</strong> Unique visitor figures are approximations. Due to mobile cellular network carrier-grade NAT (CGNAT) IP rotation, Apple iCloud Private Relay, VPN usage, and dynamic wireless IPs, a single physical devotee scanning multiple times on different networks may occasionally be recorded as more than one unique hash. Conversely, multiple devotees on the same office/home Wi-Fi network with identical browser versions may share a hash. Repeat scans are always tracked accurately in Total Scans.
        </p>
    </div>

</div>

<!-- Chart.js CDN for Interactive Visualizations -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('qrDailyChart');
        if (!ctx) return;

        const labels = @json($chartLabels);
        const totalData = @json($chartTotalData);
        const uniqueData = @json($chartUniqueData);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Total Scans',
                        data: totalData,
                        borderColor: '#A86911',
                        backgroundColor: 'rgba(168, 105, 17, 0.12)',
                        borderWidth: 2.5,
                        fill: true,
                        tension: 0.35,
                        pointBackgroundColor: '#A86911',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    },
                    {
                        label: 'Unique Visitors',
                        data: uniqueData,
                        borderColor: '#059669',
                        backgroundColor: 'rgba(5, 150, 105, 0.08)',
                        borderWidth: 2,
                        borderDash: [4, 4],
                        fill: false,
                        tension: 0.35,
                        pointBackgroundColor: '#059669',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 3.5,
                        pointHoverRadius: 5.5,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1A1A1A',
                        titleColor: '#ffffff',
                        bodyColor: '#E3E3E3',
                        padding: 10,
                        cornerRadius: 8,
                        boxPadding: 4,
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 11,
                                family: 'Instrument Sans, sans-serif'
                            },
                            color: '#6B7280'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            font: {
                                size: 11,
                                family: 'Instrument Sans, sans-serif'
                            },
                            color: '#6B7280'
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.04)'
                        }
                    }
                }
            }
        });
    });

    function copyQrLink(url) {
        navigator.clipboard.writeText(url).then(function() {
            const btnText = document.getElementById('copy-btn-text');
            if (btnText) {
                btnText.textContent = 'Copied!';
                setTimeout(() => {
                    btnText.textContent = 'Copy URL';
                }, 2000);
            }
        }).catch(function(err) {
            prompt('Copy this link:', url);
        });
    }
</script>
@endsection
