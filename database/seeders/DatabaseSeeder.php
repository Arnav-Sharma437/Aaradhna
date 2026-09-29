<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Collection;
use App\Models\CustomerAddress;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Admin & Test User
        $user = User::firstOrCreate(
            ['email' => 'admin@aaradhna.co'],
            [
                'name' => 'Aaradhna Admin',
                'phone' => '9999999999',
                'role' => 'admin',
                'is_active' => true,
                'password' => bcrypt('password'),
            ]
        );

        $user->addresses()->firstOrCreate(
            ['address_type' => 'shipping'],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'phone' => '9999999999',
                'address_line1' => 'Plot 1, Spiritual Enclave',
                'city' => 'New Delhi',
                'state' => 'Delhi',
                'postal_code' => '110001',
                'country' => 'India',
                'is_default' => true,
            ]
        );

        // 2. Categories (Exactly 3)
        $categoriesData = [
            'bambooless' => [
                'name' => 'Bambooless',
                'subtitle' => 'Non-irritating, 100% Charcoal-Free Bamboo-less Agarbatti',
                'description' => 'Pure Vedic bambooless incense sticks made without toxic charcoal or chemical binders for clean, sacred burning.',
                'sort_order' => 1,
            ],
            'havan-cups' => [
                'name' => 'Havan Cups',
                'subtitle' => '100% Organic Vedic Samagri & Desi Ghee Cups',
                'description' => 'Pure cow dung and guggal havan cups designed for quick and auspicious home yajnas and daily energy purification.',
                'sort_order' => 2,
            ],
            'dhoop-cones' => [
                'name' => 'Dhoop Cones',
                'subtitle' => 'Charcoal-Free, Low-Smoke Sacred Dhoop Cones',
                'description' => 'Prepared from sacred temple flowers, natural resins, and pure essential oils for soothing spiritual vibes.',
                'sort_order' => 3,
            ],
        ];

        Category::whereNotIn('slug', array_keys($categoriesData))->delete();

        $categories = [];
        foreach ($categoriesData as $slug => $data) {
            $categories[$slug] = Category::updateOrCreate(['slug' => $slug], array_merge($data, ['is_active' => true]));
        }

        // 3. Collections
        $collectionsData = [
            'all' => [
                'title' => 'All Sacred Products',
                'description' => 'Explore our full range of 100% pure Vedic pooja essentials, bambooless agarbatti, havan cups, and dhoop cones.',
            ],
            'bambooless' => [
                'title' => 'Bambooless Incense',
                'description' => 'Non-irritating sacred sticks that burn completely with minimal soothing white smoke and divine natural aroma.',
            ],
            'havan-cups' => [
                'title' => 'Organic Havan Cups',
                'description' => 'Pure cow dung and guggal samagri cups that cleanse the home atmosphere and invite positive vibrations.',
            ],
            'dhoop-cones' => [
                'title' => 'Dhoop Cones',
                'description' => 'Slow-burning dhoop cones with zero chemical binders and authentic temple-grade fragrance.',
            ],
            'super-save-offers' => [
                'title' => 'Super Save Offers',
                'description' => 'Best value sacred combos and multi-packs with exceptional savings for your daily sadhna.',
            ],
            'best-seller-combo' => [
                'title' => 'Best Seller Combo',
                'description' => 'Our most celebrated and widely loved spiritual creation combos by devotees.',
            ],
        ];

        Collection::whereNotIn('slug', array_keys($collectionsData))->delete();

        $collections = [];
        foreach ($collectionsData as $slug => $data) {
            $collections[$slug] = Collection::updateOrCreate(['slug' => $slug], array_merge($data, ['is_active' => true]));
        }

        // 4. Products List (22 Products)
        $productsData = [
            // Bambooless (9 Products)
            [
                'category_slug' => 'bambooless',
                'title' => 'Kesar Chandan',
                'hindi_title' => 'केसर चंदन',
                'slug' => 'kesar-chandan',
                'sku' => 'AAR-BL-KC-40',
                'short_description' => 'Exquisite blend of Kashmiri Kesar (Saffron) and Pure Mysore Sandalwood for sacred pooja rituals.',
                'description' => 'Immerse your prayer sanctuary in the heavenly fragrance of pure saffron and golden sandalwood. 100% bambooless, charcoal-free, and hand-rolled with sacred botanicals.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 120,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Kesar Chandan Bambooless Incense Sticks | Aaradhna',
                'meta_description' => 'Buy pure Kesar Chandan bambooless agarbatti online. 100% charcoal-free, non-irritating temple fragrance.',
                'image' => 'assets/images/oudh-pack-card.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'AAR-BL-KC-40', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 90, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'AAR-BL-KC-100', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 30, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Gulab',
                'hindi_title' => 'गुलाब',
                'slug' => 'gulab',
                'sku' => 'AAR-BL-GL-40',
                'short_description' => 'Sacred desi Damask Rose flower extract infused bambooless sticks for sweet, devotional tranquility.',
                'description' => 'Handcrafted with petals of Indian Damask roses and rare essential oils. Emits a gentle, non-irritating floral breeze reminiscent of grand temple sanctums.',
                'base_price' => 350.00,
                'sale_price' => 279.00,
                'stock_quantity' => 100,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Gulab (Rose) Bambooless Agarbatti | Aaradhna',
                'meta_description' => 'Pure Desi Gulab bambooless incense sticks for daily pooja and meditation. Charcoal free.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'AAR-BL-GL-40', 'price' => 279.00, 'compare_at_price' => 350.00, 'stock' => 75, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'AAR-BL-GL-100', 'price' => 549.00, 'compare_at_price' => 700.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Naagchampa',
                'hindi_title' => 'नागचंपा',
                'slug' => 'naagchampa',
                'sku' => 'AAR-BL-NC-40',
                'short_description' => 'Traditional temple Naagchampa with rich floral and earthy resin notes for deep meditation.',
                'description' => 'Authentic Naagchampa formulated using sacred Champaca flowers and halmaddi resin. Grounding, calming, and spiritually awakening.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 110,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Naagchampa Bambooless Incense Sticks | Aaradhna',
                'meta_description' => 'Authentic Naagchampa bambooless sticks for meditation, yoga, and pooja.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'AAR-BL-NC-40', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 80, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'AAR-BL-NC-100', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 30, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Chandan',
                'hindi_title' => 'चंदन',
                'slug' => 'chandan',
                'sku' => 'AAR-BL-CH-40',
                'short_description' => 'Pure Mysore Chandan (Sandalwood) infused with soothing ayurvedic herbs for peaceful rituals.',
                'description' => 'Experience the cool, divine grace of sacred sandalwood. Cleanses negative energies and promotes mental clarity and peace during sadhna.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 95,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Chandan (Sandalwood) Bambooless Sticks | Aaradhna',
                'meta_description' => 'Pure Chandan bambooless agarbatti without charcoal. 100% natural and non-toxic.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'AAR-BL-CH-40', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 70, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'AAR-BL-CH-100', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Havan',
                'hindi_title' => 'हवन',
                'slug' => 'havan-bambooless',
                'sku' => 'AAR-BL-HV-40',
                'short_description' => 'Sacred Havan samagri herbs condensed into convenient bambooless sticks for daily home yajna.',
                'description' => 'Bring the auspicious power of Vedic havan into your living room with zero charcoal smoke. Infused with pure guggal, camphor, and 30+ rare herbs.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 85,
                'burn_time' => '45 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Havan Bambooless Incense Sticks | Aaradhna',
                'meta_description' => 'Pure havan samagri infused bambooless incense sticks for daily home purification.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'AAR-BL-HV-40', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 60, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'AAR-BL-HV-100', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Oudh',
                'hindi_title' => 'ऊद',
                'slug' => 'oudh',
                'sku' => 'AAR-BL-OD-40',
                'short_description' => 'Deep, opulent Assam agarwood resin notes creating an immersive and royal meditative aura.',
                'description' => 'Finest natural Assam Oudh blended into organic stick formulation. Rich, woody, and mesmerizingly serene.',
                'base_price' => 425.00,
                'sale_price' => 349.00,
                'stock_quantity' => 90,
                'burn_time' => '50 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Royal Oudh Bambooless Incense Sticks | Aaradhna',
                'meta_description' => 'Luxury Assam Oudh bambooless agarbatti. Pure, resinous, and charcoal-free.',
                'image' => 'assets/images/oudh-pack-card.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'AAR-BL-OD-40', 'price' => 349.00, 'compare_at_price' => 425.00, 'stock' => 65, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'AAR-BL-OD-100', 'price' => 699.00, 'compare_at_price' => 850.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Mongra',
                'hindi_title' => 'मोगरा',
                'slug' => 'mongra',
                'sku' => 'AAR-BL-MG-40',
                'short_description' => 'Fresh Jasmine Sambac (Mongra) blooms hand-blended for a fresh, uplifting dawn pooja.',
                'description' => 'Awaken your mornings with the pure nectar scent of Indian Mogra. Calms the mind and fills your altar with heavenly fresh floral notes.',
                'base_price' => 350.00,
                'sale_price' => 279.00,
                'stock_quantity' => 80,
                'burn_time' => '45 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Mongra (Mogra) Bambooless Incense Sticks | Aaradhna',
                'meta_description' => 'Pure Jasmine Sambac (Mongra) bambooless agarbatti for daily morning prayer.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'AAR-BL-MG-40', 'price' => 279.00, 'compare_at_price' => 350.00, 'stock' => 60, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'AAR-BL-MG-100', 'price' => 549.00, 'compare_at_price' => 700.00, 'stock' => 20, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Bambooless 2 Combo Pack',
                'hindi_title' => 'बैम्बूलेस २ कॉम्बो पैक',
                'slug' => 'bambooless-2-combo-pack',
                'sku' => 'AAR-BL-CB2',
                'short_description' => 'Super saver duo pack of our top favorite Bambooless Incense sticks (Kesar Chandan + Oudh).',
                'description' => 'Experience the dual bliss of royal Kesar Chandan and opulent Oudh. Save more with this best-selling pair packed with 80 sticks total.',
                'base_price' => 699.00,
                'sale_price' => 529.00,
                'stock_quantity' => 65,
                'burn_time' => '45 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Bambooless 2 Combo Pack | Aaradhna Super Save Offers',
                'meta_description' => 'Save on the best-selling Bambooless 2 Combo Pack. 100% natural, charcoal free.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Combo Pack of 2 (80 Sticks Total)', 'sku' => 'AAR-BL-CB2', 'price' => 529.00, 'compare_at_price' => 699.00, 'stock' => 65, 'is_default' => true],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Bambooless 3 Combo Pack',
                'hindi_title' => 'बैम्बूलेस ३ कॉम्बो पैक',
                'slug' => 'bambooless-3-combo-pack',
                'sku' => 'AAR-BL-CB3',
                'short_description' => 'Complete tri-scent luxury set: Kesar Chandan + Gulab + Oudh bambooless packs with 25% savings.',
                'description' => 'Our most popular bambooless collection box featuring 3 sacred fragrances. Perfect for gifting and festive rituals.',
                'base_price' => 999.00,
                'sale_price' => 749.00,
                'stock_quantity' => 50,
                'burn_time' => '45 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Bambooless 3 Combo Pack | Aaradhna Best Seller Combo',
                'meta_description' => 'Tri-fragrance bambooless incense set with special discount. Pure Vedic aroma.',
                'image' => 'assets/images/oudh-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Combo Pack of 3 (120 Sticks Total)', 'sku' => 'AAR-BL-CB3', 'price' => 749.00, 'compare_at_price' => 999.00, 'stock' => 50, 'is_default' => true],
                ],
            ],

            // Havan Cups (5 Products)
            [
                'category_slug' => 'havan-cups',
                'title' => 'Google Dhoop',
                'hindi_title' => 'गुग्गल धूप',
                'slug' => 'google-dhoop',
                'sku' => 'AAR-HC-GD-12',
                'short_description' => 'Pure organic Cow Dung Havan Cups infused with sacred Guggal resin and desi cow ghee.',
                'description' => 'Ready to light in just 5 seconds. Emits the purifying energy of a traditional yajna, dispelling negativity and filling the room with auspicious vibes.',
                'base_price' => 450.00,
                'sale_price' => 349.00,
                'stock_quantity' => 100,
                'burn_time' => '25 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Google Dhoop Organic Havan Cups | Aaradhna',
                'meta_description' => 'Buy pure Guggal cow dung havan cups online. Quick, smokeless, authentic home yajna.',
                'image' => 'assets/images/havan-cup.jpg',
                'collections' => ['all', 'havan-cups'],
                'variants' => [
                    ['title' => 'Box of 12 Cups + Fiber Stand', 'sku' => 'AAR-HC-GD-12', 'price' => 349.00, 'compare_at_price' => 450.00, 'stock' => 75, 'is_default' => true],
                    ['title' => 'Refill Box of 30 Cups', 'sku' => 'AAR-HC-GD-30', 'price' => 799.00, 'compare_at_price' => 999.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'havan-cups',
                'title' => 'Loban',
                'hindi_title' => 'लोबान',
                'slug' => 'loban',
                'sku' => 'AAR-HC-LB-12',
                'short_description' => 'Sacred Benzoin (Loban) havan cups for powerful space purification and stress alleviation.',
                'description' => 'Harnessing the age-old power of pure crystal Loban. Cleanses atmospheric bacteria, relieves anxiety, and creates an aura of sanctity.',
                'base_price' => 450.00,
                'sale_price' => 349.00,
                'stock_quantity' => 90,
                'burn_time' => '25 mins',
                'is_featured' => true,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Loban Havan Cups | Aaradhna Vedic Samagri',
                'meta_description' => 'Pure natural Loban cups with cow ghee and desi cow dung base for home cleansing.',
                'image' => 'assets/images/havan-cup.jpg',
                'collections' => ['all', 'havan-cups'],
                'variants' => [
                    ['title' => 'Box of 12 Cups + Fiber Stand', 'sku' => 'AAR-HC-LB-12', 'price' => 349.00, 'compare_at_price' => 450.00, 'stock' => 65, 'is_default' => true],
                    ['title' => 'Refill Box of 30 Cups', 'sku' => 'AAR-HC-LB-30', 'price' => 799.00, 'compare_at_price' => 999.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'havan-cups',
                'title' => 'Havan',
                'hindi_title' => 'हवन कप',
                'slug' => 'havan-cup',
                'sku' => 'AAR-HC-HV-12',
                'short_description' => 'Traditional Ayurvedic Samagri blend with 30+ auspicious yajna herbs in an easy-to-use cup.',
                'description' => 'Complete miniature yajna in a cup. Formulated with camphor, nagarmotha, jatamansi, sandalwood, and pure cow ghee.',
                'base_price' => 450.00,
                'sale_price' => 349.00,
                'stock_quantity' => 95,
                'burn_time' => '25 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Vedic Havan Cups | Aaradhna',
                'meta_description' => 'Authentic Ayurvedic havan samagri cups for daily home yajna and puja rituals.',
                'image' => 'assets/images/havan-cup.jpg',
                'collections' => ['all', 'havan-cups'],
                'variants' => [
                    ['title' => 'Box of 12 Cups + Fiber Stand', 'sku' => 'AAR-HC-HV-12', 'price' => 349.00, 'compare_at_price' => 450.00, 'stock' => 70, 'is_default' => true],
                    ['title' => 'Refill Box of 30 Cups', 'sku' => 'AAR-HC-HV-30', 'price' => 799.00, 'compare_at_price' => 999.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'havan-cups',
                'title' => 'Havan Cups 2 Combo Pack',
                'hindi_title' => 'हवन कप २ कॉम्बो पैक',
                'slug' => 'havan-cups-2-combo-pack',
                'sku' => 'AAR-HC-CB2',
                'short_description' => 'Double purification power: Google Dhoop + Loban Havan Cups duo (24 Cups total).',
                'description' => 'Keep your mandir and home environment pure every single day. Includes 24 organic havan cups with matching sacred holders.',
                'base_price' => 899.00,
                'sale_price' => 649.00,
                'stock_quantity' => 60,
                'burn_time' => '25 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Havan Cups 2 Combo Pack | Aaradhna Super Save',
                'meta_description' => 'Combo of Guggal and Loban havan cups for divine home atmosphere.',
                'image' => 'assets/images/havan-cup.jpg',
                'collections' => ['all', 'havan-cups', 'super-save-offers', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Combo Pack of 2 Boxes (24 Cups Total)', 'sku' => 'AAR-HC-CB2', 'price' => 649.00, 'compare_at_price' => 899.00, 'stock' => 60, 'is_default' => true],
                ],
            ],
            [
                'category_slug' => 'havan-cups',
                'title' => 'Havan Cups 3 Combo Pack',
                'hindi_title' => 'हवन कप ३ कॉम्बो पैक',
                'slug' => 'havan-cups-3-combo-pack',
                'sku' => 'AAR-HC-CB3',
                'short_description' => 'Complete purification collection: Google Dhoop + Loban + Vedic Havan Cups (36 Cups total).',
                'description' => 'The ultimate Vedic cleansing bundle at our best discounted price. 36 premium cups prepared with pure herbs and cow ghee.',
                'base_price' => 1299.00,
                'sale_price' => 899.00,
                'stock_quantity' => 45,
                'burn_time' => '25 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Havan Cups 3 Combo Pack | Aaradhna Best Seller Combo',
                'meta_description' => 'Ultimate 36 Havan Cups bundle featuring Guggal, Loban, and Vedic Samagri.',
                'image' => 'assets/images/havan-cup.jpg',
                'collections' => ['all', 'havan-cups', 'super-save-offers', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Combo Pack of 3 Boxes (36 Cups Total)', 'sku' => 'AAR-HC-CB3', 'price' => 899.00, 'compare_at_price' => 1299.00, 'stock' => 45, 'is_default' => true],
                ],
            ],

            // Dhoop Cones (8 Products)
            [
                'category_slug' => 'dhoop-cones',
                'title' => 'Rooh Rose',
                'hindi_title' => 'रूह रोज़',
                'slug' => 'rooh-rose',
                'sku' => 'AAR-DC-RR-30',
                'short_description' => 'Charcoal-free dhoop cones crafted with sacred Indian roses and soothing herbal gums.',
                'description' => 'Slow-burning, low-smoke dhoop cones releasing the quintessential fragrance of freshly plucked rose petals. 100% natural and non-toxic.',
                'base_price' => 350.00,
                'sale_price' => 279.00,
                'stock_quantity' => 110,
                'burn_time' => '35 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Rooh Rose Charcoal-Free Dhoop Cones | Aaradhna',
                'meta_description' => 'Pure rose scented natural dhoop cones for prayer and meditation.',
                'image' => 'assets/images/dhoop-cones.jpg',
                'collections' => ['all', 'dhoop-cones'],
                'variants' => [
                    ['title' => 'Pack of 30 Cones + Ceramic Holder', 'sku' => 'AAR-DC-RR-30', 'price' => 279.00, 'compare_at_price' => 350.00, 'stock' => 80, 'is_default' => true],
                    ['title' => 'Refill Box of 80 Cones', 'sku' => 'AAR-DC-RR-80', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 30, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'dhoop-cones',
                'title' => 'Jasmine',
                'hindi_title' => 'चमेली',
                'slug' => 'jasmine',
                'sku' => 'AAR-DC-JM-30',
                'short_description' => 'Enchanting Jasmine bloom extracts prepared without toxic chemicals for elevated sadhna.',
                'description' => 'Rich floral jasmine dhoop cones that uplift the senses and welcome positive divine energies into any prayer space.',
                'base_price' => 350.00,
                'sale_price' => 279.00,
                'stock_quantity' => 95,
                'burn_time' => '35 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Jasmine Dhoop Cones | Aaradhna',
                'meta_description' => 'Pure Jasmine charcoal-free dhoop cones for daily pooja and positive vibrations.',
                'image' => 'assets/images/dhoop-cones.jpg',
                'collections' => ['all', 'dhoop-cones'],
                'variants' => [
                    ['title' => 'Pack of 30 Cones + Ceramic Holder', 'sku' => 'AAR-DC-JM-30', 'price' => 279.00, 'compare_at_price' => 350.00, 'stock' => 70, 'is_default' => true],
                    ['title' => 'Refill Box of 80 Cones', 'sku' => 'AAR-DC-JM-80', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'dhoop-cones',
                'title' => 'Sandalwood',
                'hindi_title' => 'चंदन धूप कोन',
                'slug' => 'sandalwood-dhoop-cones',
                'sku' => 'AAR-DC-SD-30',
                'short_description' => 'Pure Chandan wood bark powder shaped into soothing slow-burning cones.',
                'description' => 'Infused with cooling sandalwood paste and aromatic tree resins. Ideal for evening aartis and silent meditation sessions.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 120,
                'burn_time' => '35 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Sandalwood (Chandan) Dhoop Cones | Aaradhna',
                'meta_description' => 'Charcoal-free Sandalwood dhoop cones made from sacred botanicals.',
                'image' => 'assets/images/chandan-cones-card.jpg',
                'collections' => ['all', 'dhoop-cones'],
                'variants' => [
                    ['title' => 'Pack of 30 Cones + Ceramic Holder', 'sku' => 'AAR-DC-SD-30', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 90, 'is_default' => true],
                    ['title' => 'Refill Box of 80 Cones', 'sku' => 'AAR-DC-SD-80', 'price' => 649.00, 'compare_at_price' => 799.00, 'stock' => 30, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'dhoop-cones',
                'title' => 'Forest Wood',
                'hindi_title' => 'फॉरेस्ट वुड',
                'slug' => 'forest-wood',
                'sku' => 'AAR-DC-FW-30',
                'short_description' => 'Earthy cedarwood, pine resin, and sacred forest bark notes for grounded mindfulness.',
                'description' => 'Transport yourself to ancient Himalayan pine groves. A serene, deeply calming earthy aroma made entirely without charcoal.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 80,
                'burn_time' => '35 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Forest Wood Dhoop Cones | Aaradhna',
                'meta_description' => 'Earthy forest wood charcoal-free dhoop cones for grounding energy.',
                'image' => 'assets/images/dhoop-cones.jpg',
                'collections' => ['all', 'dhoop-cones'],
                'variants' => [
                    ['title' => 'Pack of 30 Cones + Ceramic Holder', 'sku' => 'AAR-DC-FW-30', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 60, 'is_default' => true],
                    ['title' => 'Refill Box of 80 Cones', 'sku' => 'AAR-DC-FW-80', 'price' => 649.00, 'compare_at_price' => 799.00, 'stock' => 20, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'dhoop-cones',
                'title' => 'Lavender',
                'hindi_title' => 'लैवेंडर',
                'slug' => 'lavender',
                'sku' => 'AAR-DC-LV-30',
                'short_description' => 'Soothing French Lavender buds distilled with natural resins for restful calm and relaxation.',
                'description' => 'Gentle floral relaxation for evening wind-down, stress relief, and serene bedtime prayers.',
                'base_price' => 350.00,
                'sale_price' => 279.00,
                'stock_quantity' => 85,
                'burn_time' => '35 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Lavender Dhoop Cones | Aaradhna',
                'meta_description' => 'Natural Lavender charcoal-free dhoop cones for soothing relaxation.',
                'image' => 'assets/images/dhoop-cones.jpg',
                'collections' => ['all', 'dhoop-cones'],
                'variants' => [
                    ['title' => 'Pack of 30 Cones + Ceramic Holder', 'sku' => 'AAR-DC-LV-30', 'price' => 279.00, 'compare_at_price' => 350.00, 'stock' => 65, 'is_default' => true],
                    ['title' => 'Refill Box of 80 Cones', 'sku' => 'AAR-DC-LV-80', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 20, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'dhoop-cones',
                'title' => 'Patchouli',
                'hindi_title' => 'पचौली',
                'slug' => 'patchouli',
                'sku' => 'AAR-DC-PC-30',
                'short_description' => 'Warm, mystical Indonesian Patchouli leaves for deep spiritual contemplation and focus.',
                'description' => 'Rich musky-sweet herbaceous aroma known for clearing mental fog and inducing deep meditative states.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 75,
                'burn_time' => '35 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Patchouli Dhoop Cones | Aaradhna',
                'meta_description' => 'Pure organic Patchouli charcoal-free dhoop cones for intense focus and meditation.',
                'image' => 'assets/images/dhoop-cones.jpg',
                'collections' => ['all', 'dhoop-cones'],
                'variants' => [
                    ['title' => 'Pack of 30 Cones + Ceramic Holder', 'sku' => 'AAR-DC-PC-30', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 55, 'is_default' => true],
                    ['title' => 'Refill Box of 80 Cones', 'sku' => 'AAR-DC-PC-80', 'price' => 649.00, 'compare_at_price' => 799.00, 'stock' => 20, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'dhoop-cones',
                'title' => 'Dhoop Cones 2 Combo Pack',
                'hindi_title' => 'धूप कोन २ कॉम्बो पैक',
                'slug' => 'dhoop-cones-2-combo-pack',
                'sku' => 'AAR-DC-CB2',
                'short_description' => 'Charcoal-free duo combo: Rooh Rose + Sandalwood Dhoop Cones (60 Cones total).',
                'description' => 'Pairing our most loved rose and sandalwood cones with two ceramic holders included. Save more with this convenient combo.',
                'base_price' => 699.00,
                'sale_price' => 529.00,
                'stock_quantity' => 70,
                'burn_time' => '35 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Dhoop Cones 2 Combo Pack | Aaradhna Super Save Offers',
                'meta_description' => 'Combo of Rose and Sandalwood charcoal-free dhoop cones with ceramic holders.',
                'image' => 'assets/images/dhoop-cones.jpg',
                'collections' => ['all', 'dhoop-cones', 'super-save-offers', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Combo Pack of 2 (60 Cones Total)', 'sku' => 'AAR-DC-CB2', 'price' => 529.00, 'compare_at_price' => 699.00, 'stock' => 70, 'is_default' => true],
                ],
            ],
            [
                'category_slug' => 'dhoop-cones',
                'title' => 'Dhoop Cones 3 Combo Pack',
                'hindi_title' => 'धूप कोन ३ कॉम्बो पैक',
                'slug' => 'dhoop-cones-3-combo-pack',
                'sku' => 'AAR-DC-CB3',
                'short_description' => 'Fragrance trio: Rooh Rose + Sandalwood + Lavender Cones (90 Cones total) with 25% savings.',
                'description' => 'Three pure fragrances in one divine box. Complete low-smoke charcoal-free experience for your daily sadhna.',
                'base_price' => 999.00,
                'sale_price' => 749.00,
                'stock_quantity' => 55,
                'burn_time' => '35 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Dhoop Cones 3 Combo Pack | Aaradhna Best Seller Combo',
                'meta_description' => 'Best value triple dhoop cones bundle with rose, chandan, and lavender.',
                'image' => 'assets/images/chandan-cones-card.jpg',
                'collections' => ['all', 'dhoop-cones', 'super-save-offers', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Combo Pack of 3 (90 Cones Total)', 'sku' => 'AAR-DC-CB3', 'price' => 749.00, 'compare_at_price' => 999.00, 'stock' => 55, 'is_default' => true],
                ],
            ],
        ];

        foreach ($productsData as $pData) {
            $category = $categories[$pData['category_slug']] ?? null;
            if (!$category) continue;

            $product = Product::updateOrCreate(
                ['slug' => $pData['slug']],
                [
                    'category_id' => $category->id,
                    'title' => $pData['title'],
                    'hindi_title' => $pData['hindi_title'],
                    'sku' => $pData['sku'],
                    'short_description' => $pData['short_description'],
                    'description' => $pData['description'],
                    'base_price' => $pData['base_price'],
                    'sale_price' => $pData['sale_price'],
                    'stock_quantity' => $pData['stock_quantity'],
                    'track_inventory' => true,
                    'burn_time' => $pData['burn_time'],
                    'is_featured' => $pData['is_featured'],
                    'is_bestseller' => $pData['is_bestseller'],
                    'status' => $pData['status'],
                    'meta_title' => $pData['meta_title'],
                    'meta_description' => $pData['meta_description'],
                ]
            );

            // Images
            ProductImage::firstOrCreate(
                ['product_id' => $product->id, 'is_primary' => true],
                [
                    'image_path' => $pData['image'],
                    'sort_order' => 1,
                ]
            );

            // Variants
            foreach ($pData['variants'] as $v) {
                ProductVariant::updateOrCreate(
                    ['product_id' => $product->id, 'sku' => $v['sku']],
                    [
                        'title' => $v['title'],
                        'price' => $v['price'],
                        'compare_at_price' => $v['compare_at_price'],
                        'stock_quantity' => $v['stock'],
                        'is_default' => $v['is_default'],
                    ]
                );
            }

            // Collections
            $colIds = [];
            foreach ($pData['collections'] as $cSlug) {
                if (isset($collections[$cSlug])) {
                    $colIds[] = $collections[$cSlug]->id;
                }
            }
            $product->collections()->sync($colIds);

            // Test reviews
            $product->reviews()->firstOrCreate(
                ['reviewer_email' => 'devotee.' . $pData['slug'] . '@example.com'],
                [
                    'user_id' => $user->id,
                    'reviewer_name' => 'Verified Devotee',
                    'rating' => 5,
                    'title' => 'Pure and Divine Fragrance',
                    'review_text' => 'The purest fragrance for daily morning pooja and meditation.',
                    'is_verified_buyer' => true,
                    'status' => 'approved',
                ]
            );
        }

        // Settings
        Setting::set('store_name', 'Aaradhna.co');
        Setting::set('free_shipping_threshold', '499');
        Setting::set('announcement_text', 'शुद्धं समर्पयामि — I offer only what is pure. 100% Bambooless & Charcoal-free.');
    }
}