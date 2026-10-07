@extends('layouts.app')

@section('title', "{$title} — ISHANAA™")
@section('meta_description', "Official {$title} of ISHANAA™ — 100% Pure Vedic Pooja Essentials.")

@section('content')
<div class="bg-[#FAF7F2] min-h-screen font-body select-none py-10 sm:py-16">
    <div class="w-full max-w-4xl mx-auto px-4 sm:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center text-xs text-gray-500 mb-6 space-x-2 font-medium" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-[#D38928] transition-colors">Home</a>
            <span>/</span>
            <span class="text-[#121212] font-semibold">{{ $title }}</span>
        </nav>

        <div class="bg-white border border-[#EADBCC] rounded-[24px] p-6 sm:p-12 shadow-sm space-y-6">
            
            <div class="border-b border-[#EADBCC] pb-6 space-y-2">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ ISHANAA SACRED POLICIES ✦</span>
                <h1 class="text-2xl sm:text-4xl font-bold text-[#121212] font-heading tracking-tight">
                    {{ $title }}
                </h1>
                <p class="text-xs text-gray-500">Effective Date: {{ date('F Y') }} • ISHANAA™ Pure Vedic Living</p>
            </div>

            <div class="prose prose-stone max-w-none text-xs sm:text-[14px] text-gray-700 leading-relaxed space-y-6">
                
                @if(in_array($slug, ['refund-policy', 'return-refund-policy']))
                    <!-- Return & Refund Policy -->
                    <p class="text-gray-800 font-medium">
                        At ISHANAA™, every sacred item is crafted with devotion, purity, and uncompromising quality. We strive to provide you with the most divine experience for your daily pooja and rituals. However, if you experience any issues with your order, our return and refund policy is outlined below.
                    </p>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">1. Return &amp; Replacement Eligibility</h3>
                        <p>We accept return and replacement requests under the following circumstances within <strong>7 days</strong> of delivery:</p>
                        <ul class="list-disc pl-5 space-y-1.5 text-gray-600">
                            <li>Item arrived in a damaged or broken condition during transit.</li>
                            <li>Defective product or missing items from the package.</li>
                            <li>Incorrect item delivered differing from your confirmed order.</li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">2. Conditions for Returns</h3>
                        <p>Due to the sacred and personal nature of pooja samagri, items must meet the following criteria to be eligible for replacement or refund:</p>
                        <ul class="list-disc pl-5 space-y-1.5 text-gray-600">
                            <li>The product must be unused, in its original packaging, and with all seals/tags intact.</li>
                            <li>Proof of purchase (Order ID or invoice) must be provided.</li>
                            <li>Unboxing photo or short video demonstrating damage or discrepancy must be shared with our support team.</li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">3. Return Process</h3>
                        <p>To initiate a return or replacement, please reach out to our Customer Seva desk via:</p>
                        <ul class="list-disc pl-5 space-y-1.5 text-gray-600">
                            <li><strong>Email:</strong> <a href="mailto:support@manglam.co" class="text-[#D38928] underline">support@manglam.co</a></li>
                            <li><strong>WhatsApp / Phone:</strong> +91 98765 43210 (Mon–Sat, 10 AM to 7 PM IST)</li>
                        </ul>
                        <p>Once verified, our team will arrange a reverse pickup or provide an instant replacement dispatched via priority courier.</p>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">4. Refund Processing</h3>
                        <p>Approved refunds are processed back to the original mode of payment within <strong>3 to 5 business days</strong> from the receipt/verification of the returned package. For Cash on Delivery (COD) orders, refunds will be transferred via direct UPI or Bank NEFT transfer upon obtaining customer details.</p>
                    </div>

                @elseif($slug === 'shipping-policy')
                    <!-- Shipping Policy -->
                    <p class="text-gray-800 font-medium">
                        ISHANAA™ partners with leading courier networks (BlueDart, Delhivery, DTDC, XpressBees) to deliver pure Vedic fragrance and pooja samagri safely across all pin codes in India.
                    </p>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">1. Order Processing &amp; Dispatch</h3>
                        <p>All orders are consecrated, packaged, and dispatched from our primary fulfillment facility within <strong>24 to 48 business hours</strong> of receiving your order confirmation.</p>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">2. Shipping Charges &amp; Free Delivery</h3>
                        <ul class="list-disc pl-5 space-y-1.5 text-gray-600">
                            <li><strong>Free Standard Delivery:</strong> Valid on all prepaid and COD orders with cart subtotal above <strong>₹499</strong>.</li>
                            <li><strong>Standard Shipping Fee:</strong> A nominal flat charge of <strong>₹49</strong> is applicable for orders below ₹499.</li>
                            <li><strong>Cash on Delivery (COD):</strong> Available on orders up to ₹2,500 across eligible service pin codes.</li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">3. Delivery Timelines</h3>
                        <ul class="list-disc pl-5 space-y-1.5 text-gray-600">
                            <li><strong>Metro Cities (Delhi NCR, Mumbai, Bengaluru, Chennai, Kolkata, Hyderabad):</strong> 2 to 4 business days.</li>
                            <li><strong>Rest of Bharat / Tier 2 &amp; Tier 3 Cities:</strong> 4 to 6 business days.</li>
                            <li><strong>Remote / Northeast / Island Regions:</strong> 6 to 9 business days.</li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">4. Shipment Tracking</h3>
                        <p>As soon as your parcel is shipped, you will receive an automated notification via WhatsApp and Email containing the Tracking AWB Number and live tracking URL to monitor your delivery in real time.</p>
                    </div>

                @elseif(in_array($slug, ['terms-of-service', 'terms-and-conditions']))
                    <!-- Terms & Conditions -->
                    <p class="text-gray-800 font-medium">
                        Welcome to ISHANAA™. These Terms and Conditions govern your use of our website and the purchase of any products offered on this platform. By browsing or purchasing from ISHANAA™, you agree to abide by these terms.
                    </p>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">1. Product Authenticity &amp; Ingredients</h3>
                        <p>ISHANAA™ guarantees that all incense products, dhoop sticks, sambrani cups, and havan materials are 100% bamboo-free, zero-charcoal, and created with dried botanical flowers, natural resins, and essential oils adhering strictly to Vedic scriptures.</p>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">2. Pricing &amp; Payment</h3>
                        <p>All prices listed on the site are in Indian Rupees (INR) inclusive of all applicable statutory GST taxes. We reserve the right to revise product prices, promotional discounts, and bundle offers without prior notice.</p>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">3. Intellectual Property</h3>
                        <p>All trademarks, logos, texts, photographs, and sacred branding assets displayed on ISHANAA™ are the exclusive property of ISHANAA. Any unauthorized reproduction or duplication is strictly prohibited under Indian copyright law.</p>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">4. Governing Law &amp; Jurisdiction</h3>
                        <p>These terms are governed in accordance with the laws of the Republic of India. Any disputes arising out of the use of this website shall be subject to the exclusive jurisdiction of the competent courts in New Delhi, India.</p>
                    </div>

                @elseif($slug === 'privacy-policy')
                    <!-- Privacy Policy -->
                    <p class="text-gray-800 font-medium">
                        ISHANAA™ respects your privacy and is committed to protecting your personal data. This Privacy Policy informs you about how we handle and protect your personal information when you visit our website.
                    </p>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">1. Information We Collect</h3>
                        <p>We may collect and process the following information when you place an order or interact with our platform:</p>
                        <ul class="list-disc pl-5 space-y-1.5 text-gray-600">
                            <li>Identity and Contact Data: Full name, delivery address, phone number, and email address.</li>
                            <li>Transaction Details: Order history, items purchased, payment receipt confirmation (we do not store your credit/debit card numbers or UPI PIN).</li>
                            <li>Technical Data: IP address, device browser type, and cookie identifiers to enhance your shopping experience.</li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">2. How We Use Your Data</h3>
                        <p>Your data is used strictly for:</p>
                        <ul class="list-disc pl-5 space-y-1.5 text-gray-600">
                            <li>Fulfilling and delivering your sacred orders.</li>
                            <li>Sending dispatch updates, tracking details, and pooja reminders.</li>
                            <li>Customer assistance and grievance resolution.</li>
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">3. Data Protection &amp; SSL Security</h3>
                        <p>Our platform uses 256-bit SSL (Secure Sockets Layer) encryption for all transactions. We never sell, rent, or trade your personal information with any third-party marketing companies.</p>
                    </div>

                @else
                    <p class="text-gray-800">
                        Welcome to ISHANAA™. For specific inquiries or information regarding our policies, kindly contact our customer desk.
                    </p>
                @endif

            </div>

            <div class="pt-8 border-t border-[#EADBCC] flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('home') }}" class="text-xs font-bold text-[#D38928] hover:text-[#b8741e] font-heading">
                    ← Back to ISHANAA Home
                </a>
                <a href="{{ route('pages.contact') }}" class="text-xs font-bold text-gray-700 hover:text-[#D38928]">
                    Need assistance? Contact Devotee Seva Desk →
                </a>
            </div>

        </div>

    </div>
</div>
@endsection
