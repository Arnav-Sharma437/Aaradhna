<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\HomepageBanner;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminModulesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Coupons
        if (Coupon::count() === 0) {
            Coupon::create([
                'code' => 'MANGALAM10',
                'type' => 'percentage',
                'value' => 10.00,
                'min_order_amount' => 499.00,
                'max_discount_amount' => 150.00,
                'usage_limit' => 1000,
                'used_count' => 142,
                'valid_from' => now()->subDays(30),
                'valid_until' => now()->addDays(90),
                'is_active' => true,
            ]);

            Coupon::create([
                'code' => 'GOKWIK50',
                'type' => 'fixed_amount',
                'value' => 50.00,
                'min_order_amount' => 299.00,
                'max_discount_amount' => 50.00,
                'usage_limit' => 5000,
                'used_count' => 840,
                'valid_from' => now()->subDays(15),
                'valid_until' => now()->addDays(180),
                'is_active' => true,
            ]);

            Coupon::create([
                'code' => 'FESTIVE20',
                'type' => 'percentage',
                'value' => 20.00,
                'min_order_amount' => 999.00,
                'max_discount_amount' => 300.00,
                'usage_limit' => 500,
                'used_count' => 88,
                'valid_from' => now()->subDays(5),
                'valid_until' => now()->addDays(45),
                'is_active' => true,
            ]);

            Coupon::create([
                'code' => 'VEDIC100',
                'type' => 'fixed_amount',
                'value' => 100.00,
                'min_order_amount' => 1499.00,
                'max_discount_amount' => 100.00,
                'usage_limit' => 250,
                'used_count' => 31,
                'valid_from' => now()->subDays(10),
                'valid_until' => now()->addDays(60),
                'is_active' => true,
            ]);
        }

        // 2. Homepage Banners
        if (HomepageBanner::count() === 0) {
            HomepageBanner::create([
                'title' => 'Pure Vedic Agarbatti & Bambooless Dhoop',
                'subtitle' => '100% Charcoal-Free Temple Grade Fragrances for Morning Sadhna',
                'desktop_image_path' => 'assets/images/banner1.jpg',
                'mobile_image_path' => 'assets/images/banner1.jpg',
                'button_text' => 'Shop Sacred Collection',
                'button_link' => '/collections/all',
                'sort_order' => 1,
                'is_active' => true,
            ]);

            HomepageBanner::create([
                'title' => 'Organic Cow Dung & Guggal Havan Cups',
                'subtitle' => 'Quick 15-Minute Home Yajna with Authentic Desi Ghee & Herbs',
                'desktop_image_path' => 'assets/images/banner2.jpg',
                'mobile_image_path' => 'assets/images/banner2.jpg',
                'button_text' => 'Explore Havan Cups',
                'button_link' => '/collections/havan-cups',
                'sort_order' => 2,
                'is_active' => true,
            ]);

            HomepageBanner::create([
                'title' => 'Super Save Festival Combos',
                'subtitle' => 'Buy 2 Get 1 Free & Buy Any 5 Trial Packs at Special Devotee Pricing',
                'desktop_image_path' => 'assets/images/mangalam_combo_banner.jpg',
                'mobile_image_path' => 'assets/images/mangalam_combo_banner.jpg',
                'button_text' => 'View Super Savers',
                'button_link' => '/collections/super-save-offers',
                'sort_order' => 3,
                'is_active' => true,
            ]);
        }

        // 3. FAQs
        if (Faq::count() === 0) {
            $faqsData = [
                [
                    'category' => 'general',
                    'question' => 'Why are Mangalam incense sticks completely bambooless?',
                    'answer' => 'According to ancient Vedic scriptures (Agamas), burning bamboo releases toxic chemicals and heavy soot, and is traditionally considered inauspicious. Mangalam sticks use 100% pure flower resins, natural herbs, and zero bamboo cores for sacred, clean burning.',
                    'sort_order' => 1,
                ],
                [
                    'category' => 'general',
                    'question' => 'Are your products 100% charcoal-free?',
                    'answer' => 'Yes, absolutely. We use zero black charcoal and zero chemical fragrance boosters. Our sticks and havan cups produce only soothing, low-density white smoke with pure therapeutic aromas.',
                    'sort_order' => 2,
                ],
                [
                    'category' => 'rituals',
                    'question' => 'How do I light and use the Organic Havan Cups?',
                    'answer' => 'Simply hold the top rim of the havan cup over a diya flame or matchstick for 15-20 seconds until it catches an ember. Blow out the flame gently and place it on the provided earthen/metal plate. It will burn completely for 15-20 minutes.',
                    'sort_order' => 3,
                ],
                [
                    'category' => 'shipping',
                    'question' => 'What are the delivery timelines and shipping charges?',
                    'answer' => 'We offer FREE standard express shipping across India on all orders above ₹499. Orders are usually dispatched within 24 hours via Bluedart/Delhivery and delivered in 2-4 business days.',
                    'sort_order' => 4,
                ],
                [
                    'category' => 'returns',
                    'question' => 'What if a product arrives damaged in transit?',
                    'answer' => 'Every sacred package is packed with immense care. In the rare event of transit damage, share an unboxing photo on our WhatsApp support (+91 98765 43210) within 48 hours for an instant free replacement.',
                    'sort_order' => 5,
                ],
            ];

            foreach ($faqsData as $f) {
                Faq::create(array_merge($f, ['is_active' => true]));
            }
        }

        // 4. Testimonials
        if (Testimonial::count() === 0) {
            $testimonialsData = [
                [
                    'customer_name' => 'Pandit Radhe Shyam',
                    'location' => 'Vrindavan Dham',
                    'rating' => 5,
                    'review_text' => 'I am a regular devotee of Mangalam products since 2 years. Very pure havan cups and sambrani. In temples, we strictly avoid toxic bamboo, and Mangalam is 100% compliant with sacred Agamas.',
                    'product_tag' => 'Bambooless Agarbatti & Havan Cups',
                    'sort_order' => 1,
                ],
                [
                    'customer_name' => 'Ramesh Joshi',
                    'location' => 'Varanasi, UP',
                    'rating' => 5,
                    'review_text' => 'Thank you so much for this pure product. Everyone in my family loves the sacred fragrance of the camphor sticks. Zero smoke irritation in eyes during morning aarti!',
                    'product_tag' => 'Devi Refill Pack 100s',
                    'sort_order' => 2,
                ],
                [
                    'customer_name' => 'Pooja Mishra',
                    'location' => 'Haridwar, UK',
                    'rating' => 5,
                    'review_text' => 'The ceramic pooja stand included with the 100 sticks refill pack is very high quality. The sandalwood aroma lingers peacefully in our mandir all day long.',
                    'product_tag' => 'Sandalwood Dhoop Cones',
                    'sort_order' => 3,
                ],
                [
                    'customer_name' => 'Acharya Devavrata',
                    'location' => 'Rishikesh',
                    'rating' => 5,
                    'review_text' => 'Organic havan cups are a divine blessing for busy families. In 15 minutes, you experience the purity of a full yajna. Highly recommended.',
                    'product_tag' => 'Organic Havan Cups',
                    'sort_order' => 4,
                ],
            ];

            foreach ($testimonialsData as $t) {
                Testimonial::create(array_merge($t, ['is_active' => true]));
            }
        }

        // 5. Blog Posts
        if (BlogPost::count() === 0) {
            BlogPost::create([
                'category_slug' => 'hindu-rituals',
                'title' => 'The Sacred Vidhi of Morning Sandhya Aarti with Pure Bambooless Incense',
                'slug' => 'sacred-vidhi-morning-sandhya-aarti',
                'excerpt' => 'Discover the spiritual significance of conducting daily morning aarti with charcoal-free, bambooless incense as per ancient Vedic Agamas.',
                'body_content' => '<p>In Sanatana Dharma, the morning Sandhya represents the auspicious transition from darkness to divine light. Lighting natural herbal incense during this Brahma Muhurta hour clears negative energies and elevates the mind towards spiritual focus.</p><p>Traditional scriptures emphasize using zero bamboo and zero chemical smoke, ensuring that only pure prana-enhancing botanical essences reach the deities.</p>',
                'author_name' => 'Acharya Mangalam Team',
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'meta_title' => 'The Sacred Vidhi of Morning Aarti | Mangalam.co',
                'meta_description' => 'Learn how to perform sacred morning aarti with pure bambooless incense and havan cups.',
            ]);

            BlogPost::create([
                'category_slug' => 'fragrances',
                'title' => 'Why Bhimseni Camphor and Pure Guggal Are Essential for Home Energy Purification',
                'slug' => 'bhimseni-camphor-guggal-home-purification',
                'excerpt' => 'Learn how authentic Bhimseni camphor crystals and Vedic Guggal resin dispel airborne impurities and invite peaceful sattvic vibrations.',
                'body_content' => '<p>Bhimseni Camphor, unlike synthetic petroleum camphor, sublimates cleanly without leaving any black residue. When burned alongside sacred Guggal and Desi cow ghee, it creates an antimicrobial, soothing sacred shield in the household mandir.</p>',
                'author_name' => 'Vedic Wellness Kendra',
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'meta_title' => 'Bhimseni Camphor & Guggal Purification | Mangalam.co',
                'meta_description' => 'Benefits of Bhimseni camphor and pure guggal resin for daily pooja.',
            ]);
        }

        // 6. Store Settings
        $settingsData = [
            ['group' => 'general', 'key' => 'store_name', 'value' => 'Mangalam.co™ — Pooja Samagri & Vidhi'],
            ['group' => 'general', 'key' => 'store_tagline', 'value' => 'शुद्धं समर्पयामि — 100% Pure Vedic Essentials'],
            ['group' => 'general', 'key' => 'support_email', 'value' => 'care@mangalam.co'],
            ['group' => 'general', 'key' => 'support_phone', 'value' => '+91 98765 43210'],
            ['group' => 'general', 'key' => 'support_whatsapp', 'value' => '+91 98765 43210'],
            ['group' => 'general', 'key' => 'store_address', 'value' => 'Seva Kendra, Vrindavan Dham Residency, Mathura, UP - 281001'],
            ['group' => 'shipping', 'key' => 'free_shipping_threshold', 'value' => '499'],
            ['group' => 'shipping', 'key' => 'standard_shipping_fee', 'value' => '49'],
            ['group' => 'payment', 'key' => 'gokwik_enabled', 'value' => '1'],
            ['group' => 'payment', 'key' => 'cod_enabled', 'value' => '1'],
            ['group' => 'payment', 'key' => 'gokwik_upi_discount', 'value' => '50'],
            ['group' => 'social', 'key' => 'instagram_url', 'value' => 'https://instagram.com/mangalam.co'],
            ['group' => 'social', 'key' => 'facebook_url', 'value' => 'https://facebook.com/mangalam.co'],
        ];

        foreach ($settingsData as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
