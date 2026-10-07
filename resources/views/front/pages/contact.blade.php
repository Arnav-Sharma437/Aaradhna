@extends('layouts.app')

@section('title', 'Contact Us — ISHANAA Seva Kendra™')
@section('meta_description', 'Get in touch with ISHANAA Seva Kendra. Inquiries for daily pooja samagri, temple bulk orders, and devotee assistance in Vrindavan Dham.')

@section('content')
<div class="bg-white min-h-screen font-body select-none">

    <!-- ========================================================================= -->
    <!-- 1. SPIRITUAL CONTACT HERO BANNER                                          -->
    <!-- ========================================================================= -->
    <section class="relative bg-gradient-to-b from-[#2B1810] via-[#3E2314] to-[#1F120A] text-white py-16 sm:py-24 overflow-hidden border-b border-[#D38928]/30">
        
        <!-- Sacred Glow & Grid Texture -->
        <div class="absolute inset-0 opacity-15 pointer-events-none bg-[radial-gradient(#F6DAA8_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full bg-[#D38928]/15 blur-[100px] pointer-events-none"></div>

        <div class="relative w-full max-w-4xl mx-auto px-5 sm:px-8 text-center space-y-4 z-10">
            
            <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-[#D38928]/20 border border-[#F6DAA8]/40 text-[#F6DAA8] text-xs font-semibold tracking-widest uppercase shadow-sm">
                <span>🪔</span>
                <span>सेवा परमो धर्मः • ISHANAA SEVA KENDRA</span>
                <span>🪔</span>
            </div>

            <h1 class="text-3xl sm:text-5xl font-normal font-heading text-white tracking-tight leading-tight">
                Connect With Our Devotee Care Desk
            </h1>

            <p class="text-sm sm:text-base text-stone-300 max-w-xl mx-auto leading-relaxed">
                Whether you have questions regarding our sacred ingredients, wish to place bulk orders for your mandir, or need assistance with your shipment, our sevaks are here to assist you.
            </p>

            <div class="flex items-center justify-center space-x-2 text-xs text-stone-400 pt-2">
                <a href="{{ route('home') }}" class="hover:text-[#F6DAA8] transition-colors">Home</a>
                <span>/</span>
                <span class="text-[#F6DAA8] font-semibold">Contact Seva Kendra</span>
            </div>

        </div>

    </section>

    <!-- ========================================================================= -->
    <!-- 2. CONTACT CHANNELS & INTERACTIVE SPIRITUAL FORM                          -->
    <!-- ========================================================================= -->
    <section class="py-16 sm:py-24 bg-white border-b border-[#EAE3D9]">
        <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
                
                <!-- LEFT COLUMN: Devotional Seva Cards (5 Cols) -->
                <div class="lg:col-span-5 space-y-6">
                    
                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ DEVOTEE ASSISTANCE ✦</span>
                        <h2 class="text-2xl sm:text-3xl font-normal text-[#121212] font-heading tracking-tight">
                            ISHANAA Seva Kendra
                        </h2>
                        <p class="text-xs sm:text-sm text-gray-600">
                            Available 7 days a week from morning Mangala Aarti to evening Sandhya Aarti.
                        </p>
                    </div>

                    <!-- Seva Card 1: WhatsApp Direct Helpdesk -->
                    <div class="bg-[#FAF7F2] border border-[#EADBCC] rounded-[18px] p-5 shadow-xs flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-sm text-xl">
                            💬
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-sm font-bold text-[#121212] font-heading">Instant WhatsApp Seva</h4>
                            <p class="text-xs text-gray-600">Instant answers for orders, product queries &amp; custom requests.</p>
                            <div class="pt-1.5">
                                <a 
                                    href="https://wa.me/919999999999" 
                                    target="_blank" 
                                    class="inline-flex items-center text-xs font-bold text-emerald-700 hover:text-emerald-800 transition-colors"
                                >
                                    <span>Chat on WhatsApp (+91 99999 99999)</span>
                                    <span class="ml-1">→</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Seva Card 2: Email Devotee Care -->
                    <div class="bg-[#FAF7F2] border border-[#EADBCC] rounded-[18px] p-5 shadow-xs flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-full bg-[#D38928] text-white flex items-center justify-center shrink-0 shadow-sm text-xl">
                            ✉️
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-sm font-bold text-[#121212] font-heading">Email Devotee Care</h4>
                            <p class="text-xs text-gray-600">Write to us for any detailed requirement or temple donations.</p>
                            <div class="pt-1.5 space-y-0.5 text-xs font-semibold text-[#8B4513]">
                                <div>seva@manglam.co</div>
                                <div>support@manglam.co</div>
                            </div>
                        </div>
                    </div>

                    <!-- Seva Card 3: Ashram Kendra Address -->
                    <div class="bg-[#FAF7F2] border border-[#EADBCC] rounded-[18px] p-5 shadow-xs flex items-start space-x-4">
                        <div class="w-12 h-12 rounded-full bg-[#9B1C31] text-white flex items-center justify-center shrink-0 shadow-sm text-xl">
                            🛕
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-sm font-bold text-[#121212] font-heading">Sacred Seva Kendra</h4>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                ISHANAA Vedic Samagri Kendra,<br>
                                Mathura Road, Vrindavan Dham,<br>
                                Uttar Pradesh — 281121, Bharat 🇮🇳
                            </p>
                        </div>
                    </div>

                    <!-- Seva Card 4: Mandir Bulk & Uphaar Desk -->
                    <div class="bg-gradient-to-r from-[#2A1810] to-[#1F120A] text-white rounded-[18px] p-6 shadow-md border border-[#D38928]/40 space-y-2">
                        <div class="flex items-center space-x-2 text-[#F6DAA8] text-xs font-bold font-heading">
                            <span>✨</span>
                            <span>TEMPLE &amp; WEDDING BULK ORDERS</span>
                        </div>
                        <p class="text-xs text-stone-300 leading-relaxed">
                            Looking for pure bambooless samagri in bulk for temple trusts, ashrams, or wedding return gifts? Contact our dedicated Mandir desk for sacred wholesale pricing.
                        </p>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Interactive Contact Form (7 Cols) -->
                <div class="lg:col-span-7 bg-white border border-[#EADBCC] rounded-[24px] p-6 sm:p-10 shadow-md space-y-6">
                    
                    <div class="space-y-1">
                        <h3 class="text-xl sm:text-2xl font-normal text-[#121212] font-heading tracking-tight">
                            Send Us a Sacred Message
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-600">
                            Fill out the form below and our team will get back to you within 24 hours.
                        </p>
                    </div>

                    <!-- Flash Message -->
                    @if(session('success_message'))
                        <div class="p-4 rounded-[12px] bg-emerald-50 border border-emerald-300 text-emerald-800 text-xs sm:text-sm flex items-start space-x-3 shadow-xs">
                            <span class="text-xl">🪔</span>
                            <div>
                                <strong class="font-bold block font-heading">Jai Shri Ram!</strong>
                                <span>{{ session('success_message') }}</span>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="p-4 rounded-[12px] bg-red-50 border border-red-300 text-red-800 text-xs sm:text-sm space-y-1">
                            <strong class="font-bold block">Please resolve the following errors:</strong>
                            <ul class="list-disc list-inside space-y-0.5">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Contact Form -->
                    <form action="{{ route('pages.contact.submit') }}" method="POST" class="space-y-5">
                        @csrf

                        <!-- Row 1: Name & Phone -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label for="name" class="block text-xs font-semibold text-gray-700">
                                    Your Full Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name') }}"
                                    required 
                                    placeholder="e.g. Ramesh Sharma"
                                    class="w-full px-4 py-3 bg-white border border-[#EADBCC] rounded-[10px] text-xs sm:text-sm text-gray-800 focus:outline-none focus:border-[#D38928] focus:ring-1 focus:ring-[#D38928] transition-all"
                                >
                            </div>

                            <div class="space-y-1.5">
                                <label for="phone" class="block text-xs font-semibold text-gray-700">
                                    Phone / WhatsApp Number
                                </label>
                                <input 
                                    type="tel" 
                                    name="phone" 
                                    id="phone" 
                                    value="{{ old('phone') }}"
                                    placeholder="+91 98765 43210"
                                    class="w-full px-4 py-3 bg-white border border-[#EADBCC] rounded-[10px] text-xs sm:text-sm text-gray-800 focus:outline-none focus:border-[#D38928] focus:ring-1 focus:ring-[#D38928] transition-all"
                                >
                            </div>
                        </div>

                        <!-- Row 2: Email & Inquiry Type -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label for="email" class="block text-xs font-semibold text-gray-700">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    value="{{ old('email') }}"
                                    required 
                                    placeholder="you@example.com"
                                    class="w-full px-4 py-3 bg-white border border-[#EADBCC] rounded-[10px] text-xs sm:text-sm text-gray-800 focus:outline-none focus:border-[#D38928] focus:ring-1 focus:ring-[#D38928] transition-all"
                                >
                            </div>

                            <div class="space-y-1.5">
                                <label for="inquiry_type" class="block text-xs font-semibold text-gray-700">
                                    Purpose of Inquiry <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    name="inquiry_type" 
                                    id="inquiry_type" 
                                    required
                                    class="w-full px-4 py-3 bg-white border border-[#EADBCC] rounded-[10px] text-xs sm:text-sm text-gray-800 focus:outline-none focus:border-[#D38928] focus:ring-1 focus:ring-[#D38928] transition-all"
                                >
                                    <option value="Daily Pooja Samagri Inquiries">Daily Pooja Samagri Inquiries</option>
                                    <option value="Temple / Mandir Bulk Order">Temple / Mandir Bulk Order</option>
                                    <option value="Wedding & Corporate Gifting">Wedding &amp; Corporate Gifting</option>
                                    <option value="Order Tracking & Shipment">Order Tracking &amp; Shipment</option>
                                    <option value="Other Spiritual Assistance">Other Spiritual Assistance</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 3: Message -->
                        <div class="space-y-1.5">
                            <label for="message" class="block text-xs font-semibold text-gray-700">
                                Your Message or Inquiry <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                name="message" 
                                id="message" 
                                rows="5" 
                                required 
                                placeholder="Please write your questions, required quantity, or delivery requirements here..."
                                class="w-full px-4 py-3 bg-white border border-[#EADBCC] rounded-[10px] text-xs sm:text-sm text-gray-800 focus:outline-none focus:border-[#D38928] focus:ring-1 focus:ring-[#D38928] transition-all resize-y"
                            >{{ old('message') }}</textarea>
                        </div>

                        <!-- Submit CTA -->
                        <div class="pt-2">
                            <button 
                                type="submit" 
                                class="w-full py-4 px-8 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer"
                            >
                                <span>Send Sacred Message</span>
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </section>

</div>
@endsection
