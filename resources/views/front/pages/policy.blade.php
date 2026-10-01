@extends('layouts.app')

@section('title', "{$title} — Mangalam.co™")
@section('meta_description', "Official {$title} of Mangalam.co™ — 100% Pure Vedic Pooja Essentials.")

@section('content')
<div class="bg-white min-h-screen font-body select-none py-12 sm:py-16">
    <div class="w-full max-w-4xl mx-auto px-5 sm:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center text-xs text-gray-500 mb-6 space-x-2 font-medium" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-[#D38928] transition-colors">Home</a>
            <span>/</span>
            <span class="text-[#121212] font-semibold">{{ $title }}</span>
        </nav>

        <div class="bg-white border border-[#EADBCC] rounded-[24px] p-6 sm:p-12 shadow-sm space-y-6">
            
            <div class="border-b border-[#EADBCC] pb-6 space-y-2">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ MANGALAM POLICIES ✦</span>
                <h1 class="text-2xl sm:text-4xl font-normal text-[#121212] font-heading tracking-tight">
                    {{ $title }}
                </h1>
                <p class="text-xs text-gray-500">Last updated: {{ date('F Y') }} • Mangalam.co™ Vedic Samagri</p>
            </div>

            <div class="prose prose-stone max-w-none text-xs sm:text-sm text-gray-700 leading-relaxed space-y-5">
                @if($slug === 'privacy-policy')
                    <p>At Mangalam.co™, we hold the trust of our devotees with paramount sanctity. This Privacy Policy outlines how your personal information is gathered, protected, and honored across our platform.</p>
                    <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">1. Information We Collect</h3>
                    <p>When you place an order for pooja samagri or subscribe to our newsletter, we securely collect your name, shipping address, contact phone number, and email address solely to fulfill your delivery and provide customer assistance.</p>
                    <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">2. Data Security &amp; Encryption</h3>
                    <p>All online payment transactions are encrypted using industry-standard 256-bit SSL encryption. We do not store full credit/debit card numbers or UPI PINs on our servers.</p>
                @elseif($slug === 'terms-of-service')
                    <p>Welcome to Mangalam.co™. By accessing or ordering from our website, you agree to be bound by these Terms of Service.</p>
                    <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">1. Authentic Vedic Ingredients</h3>
                    <p>All products listed on Mangalam.co™ are guaranteed to be 100% bamboo-free, zero-charcoal, and crafted using dried temple flowers and pure natural resins.</p>
                    <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">2. Orders &amp; Delivery</h3>
                    <p>Orders are dispatched from our Vrindavan and partner logistics hubs within 24 to 48 working hours. Expected delivery timelines range between 3 to 6 business days across Bharat.</p>
                @elseif($slug === 'shipping-policy')
                    <p>We take deep care in securely packaging every sacred incense box to reach your altar in divine condition.</p>
                    <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">1. Free Shipping Threshold</h3>
                    <p>We offer Free Shipping on all orders above ₹499 across all postal pin codes in India. A nominal delivery fee of ₹49 applies for orders below ₹499.</p>
                    <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">2. Real-Time Tracking</h3>
                    <p>As soon as your shipment is dispatched, an automated tracking link will be sent to your WhatsApp and email address.</p>
                @elseif($slug === 'refund-policy')
                    <p>We are dedicated to ensuring 100% satisfaction for all devotees. In the rare event of damaged transit or incorrect item receipt, we offer a hassle-free replacement or refund.</p>
                    <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">1. 7-Day Replacement Guarantee</h3>
                    <p>If your package arrives damaged or broken during transit, simply share an image with our WhatsApp Seva desk within 7 days of delivery for an immediate free replacement.</p>
                    <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">2. Refund Processing</h3>
                    <p>Approved refunds are credited directly back to the original payment method within 3 to 5 business days.</p>
                @else
                    <p>Welcome to Mangalam.co™. For any specific inquiries regarding this section, please contact our Seva desk at <a href="{{ route('pages.contact') }}" class="text-[#D38928] underline">seva@mangalam.co</a>.</p>
                @endif
            </div>

            <div class="pt-6 border-t border-[#EADBCC] flex items-center justify-between">
                <a href="{{ route('home') }}" class="text-xs font-bold text-[#D38928] hover:text-[#b8741e] font-heading">← Back to Home</a>
                <a href="{{ route('pages.contact') }}" class="text-xs font-bold text-gray-700 hover:text-[#D38928]">Need help? Contact Seva Desk →</a>
            </div>

        </div>

    </div>
</div>
@endsection
