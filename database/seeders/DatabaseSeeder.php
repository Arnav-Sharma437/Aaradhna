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
            ['email' => 'admin@mangalam.co'],
            [
                'name' => 'Mangalam Admin',
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

        // 4. Products List (Official Manglam Products from Spreadsheet)
        $productsData = [
            // =========================================================================
            // 7 MANGLAM FRAGRANCES — PACK OF 40 STICKS (MRP: 499, SALE: 399)
            // =========================================================================
            [
                'category_slug' => 'bambooless',
                'title' => 'Swarna Pushpa (Pack of 40)',
                'hindi_title' => 'स्वर्ण पुष्प (40 स्टिक्स)',
                'slug' => 'swarna-pushpa',
                'sku' => 'MNG-BL-SP-40',
                'short_description' => 'Sacred Marygold temple flower petals hand-blended into charcoal-free bambooless sticks.',
                'description' => 'Infused with auspicious golden Marygold blossoms offered at holy shrines. 40 slender bambooless sticks crafted with zero bamboo core and zero toxic charcoal.',
                'base_price' => 499.00,
                'sale_price' => 399.00,
                'stock_quantity' => 120,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Swarna Pushpa 40 Sticks Bambooless Incense | Mangalam',
                'meta_description' => 'Pure Marygold temple flower bambooless agarbatti pack of 40 sticks. 100% natural and charcoal free.',
                'image' => 'assets/images/oudh-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-SP-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 90, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-SP-100', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 30, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Divya Naagchampa (Pack of 40)',
                'hindi_title' => 'दिव्य नागचंपा (40 स्टिक्स)',
                'slug' => 'divya-naagchampa',
                'sku' => 'MNG-BL-DN-40',
                'short_description' => 'Traditional temple Naagchampa with rich floral and earthy resin notes for deep meditation.',
                'description' => 'Authentic Naagchampa formulated using sacred Champaca flowers and halmaddi resin. 40 slender sticks for grounding and morning sadhna.',
                'base_price' => 499.00,
                'sale_price' => 399.00,
                'stock_quantity' => 110,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Divya Naagchampa 40 Sticks Bambooless Incense | Mangalam',
                'meta_description' => 'Authentic Divya Naagchampa bambooless sticks for meditation, yoga, and pooja.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-DN-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 80, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-DN-100', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 30, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Chandan Saanjh (Pack of 40)',
                'hindi_title' => 'चंदन सांझ (40 स्टिक्स)',
                'slug' => 'chandan-saanjh',
                'sku' => 'MNG-BL-CS-40',
                'short_description' => 'Pure Mysore Chandan (Sandalwood) infused with soothing ayurvedic herbs for peaceful rituals.',
                'description' => 'Experience the cool, divine grace of sacred sandalwood. Cleanses negative energies and promotes mental peace during evening prayers.',
                'base_price' => 499.00,
                'sale_price' => 399.00,
                'stock_quantity' => 95,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Chandan Saanjh 40 Sticks Bambooless Agarbatti | Mangalam',
                'meta_description' => 'Pure Chandan Saanjh bambooless agarbatti without charcoal. 100% natural and non-toxic.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-CS-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 70, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-CS-100', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Royal Oudh (Pack of 40)',
                'hindi_title' => 'रॉयल ऊद (40 स्टिक्स)',
                'slug' => 'royal-oudh',
                'sku' => 'MNG-BL-RO-40',
                'short_description' => 'Deep, opulent Assam agarwood resin notes creating an immersive and royal meditative aura.',
                'description' => 'Finest natural Assam Oudh blended into an organic stick formulation. Rich, woody, and mesmerizingly serene for evening contemplation.',
                'base_price' => 499.00,
                'sale_price' => 399.00,
                'stock_quantity' => 90,
                'burn_time' => '50 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Royal Oudh 40 Sticks Bambooless Incense | Mangalam',
                'meta_description' => 'Luxury Assam Royal Oudh bambooless agarbatti. Pure, resinous, and charcoal-free.',
                'image' => 'assets/images/oudh-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-RO-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 65, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-RO-100', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Mogra Noor (Pack of 40)',
                'hindi_title' => 'मोगरा नूर (40 स्टिक्स)',
                'slug' => 'mogra-noor',
                'sku' => 'MNG-BL-MN-40',
                'short_description' => 'Fresh Jasmine Sambac (Mongra) blooms hand-blended for a fresh, uplifting dawn pooja.',
                'description' => 'Awaken your mornings with the pure nectar scent of Indian Mogra. Calms the mind and fills your altar with heavenly fresh floral notes.',
                'base_price' => 499.00,
                'sale_price' => 399.00,
                'stock_quantity' => 80,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Mogra Noor 40 Sticks Bambooless Incense | Mangalam',
                'meta_description' => 'Pure Jasmine Sambac (Mogra Noor) bambooless agarbatti for daily morning prayer.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-MN-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 60, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-MN-100', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 20, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Gulab Rooh (Pack of 40)',
                'hindi_title' => 'गुलाब रूह (40 स्टिक्स)',
                'slug' => 'gulab-rooh',
                'sku' => 'MNG-BL-GR-40',
                'short_description' => 'Sacred desi Damask Rose flower extract infused bambooless sticks for sweet, devotional tranquility.',
                'description' => 'Handcrafted with petals of Indian Damask roses and rare essential oils. Emits a gentle, non-irritating floral breeze.',
                'base_price' => 499.00,
                'sale_price' => 399.00,
                'stock_quantity' => 100,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Gulab Rooh 40 Sticks Bambooless Agarbatti | Mangalam',
                'meta_description' => 'Pure Desi Gulab Rooh bambooless incense sticks for daily pooja and meditation.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-GR-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 75, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-GR-100', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Lavender Veda (Pack of 40)',
                'hindi_title' => 'लैवेंडर वेदा (40 स्टिक्स)',
                'slug' => 'lavender-veda',
                'sku' => 'MNG-BL-LV-40',
                'short_description' => 'Soothing Lavender extracts prepared with natural Vedic resins for calming meditation and peaceful rest.',
                'description' => 'Gentle floral lavender relaxation for evening wind-down, stress relief, and serene bedtime prayers.',
                'base_price' => 499.00,
                'sale_price' => 399.00,
                'stock_quantity' => 85,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Lavender Veda 40 Sticks Bambooless Incense | Mangalam',
                'meta_description' => 'Pure Lavender Veda charcoal-free bambooless incense sticks.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless'],
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-LV-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 65, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-LV-100', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 20, 'is_default' => false],
                ],
            ],

            // =========================================================================
            // 7 MANGLAM FRAGRANCES — PACK OF 100 REFILLS (MRP: 999, SALE: 499)
            // =========================================================================
            [
                'category_slug' => 'bambooless',
                'title' => 'Swarna Pushpa (Pack of 100 Refill)',
                'hindi_title' => 'स्वर्ण पुष्प (100 स्टिक्स रिफिल)',
                'slug' => 'swarna-pushpa-100',
                'sku' => 'MNG-BL-SP-100-REF',
                'short_description' => '100 sticks mega refill pack of pure Marygold temple flower bambooless incense.',
                'description' => 'Economic 100-stick refill box for daily uninterrupted devotion. Made with authentic Marigold blossoms and zero bamboo.',
                'base_price' => 999.00,
                'sale_price' => 499.00,
                'stock_quantity' => 150,
                'burn_time' => '45 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Swarna Pushpa 100 Sticks Refill Pack | Mangalam',
                'meta_description' => 'Mega refill pack of 100 Swarna Pushpa bambooless sticks at best price.',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers'],
                'variants' => [
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-SP-100-REF', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 150, 'is_default' => true],
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-SP-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 90, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Divya Naagchampa (Pack of 100 Refill)',
                'hindi_title' => 'दिव्य नागचंपा (100 स्टिक्स रिफिल)',
                'slug' => 'divya-naagchampa-100',
                'sku' => 'MNG-BL-DN-100-REF',
                'short_description' => '100 sticks mega refill pack of authentic temple Naagchampa bambooless sticks.',
                'description' => 'Continuous spiritual resonance for home temples. 100 hand-rolled sacred Naagchampa sticks at flat 50% discount.',
                'base_price' => 999.00,
                'sale_price' => 499.00,
                'stock_quantity' => 140,
                'burn_time' => '45 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Divya Naagchampa 100 Sticks Refill Pack | Mangalam',
                'meta_description' => 'Mega refill pack of 100 Divya Naagchampa bambooless sticks.',
                'image' => 'assets/images/camphor-refill-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers'],
                'variants' => [
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-DN-100-REF', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 140, 'is_default' => true],
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-DN-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 80, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Chandan Saanjh (Pack of 100 Refill)',
                'hindi_title' => 'चंदन सांझ (100 स्टिक्स रिफिल)',
                'slug' => 'chandan-saanjh-100',
                'sku' => 'MNG-BL-CS-100-REF',
                'short_description' => '100 sticks mega refill pack of pure Mysore Sandalwood (Chandan) bambooless sticks.',
                'description' => 'Pure cooling sandalwood aura for months of auspicious daily sadhna. 100 sticks with 0% charcoal.',
                'base_price' => 999.00,
                'sale_price' => 499.00,
                'stock_quantity' => 130,
                'burn_time' => '45 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Chandan Saanjh 100 Sticks Refill Pack | Mangalam',
                'meta_description' => '100 sticks pure Mysore Sandalwood bambooless refill pack.',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers'],
                'variants' => [
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-CS-100-REF', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 130, 'is_default' => true],
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-CS-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 70, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Royal Oudh (Pack of 100 Refill)',
                'hindi_title' => 'रॉयल ऊद (100 स्टिक्स रिफिल)',
                'slug' => 'royal-oudh-100',
                'sku' => 'MNG-BL-RO-100-REF',
                'short_description' => '100 sticks mega refill pack of luxury Assam Agarwood Royal Oudh.',
                'description' => 'Grand 100-stick refill box of royal resinous Oudh for long meditative evenings and peace.',
                'base_price' => 999.00,
                'sale_price' => 499.00,
                'stock_quantity' => 110,
                'burn_time' => '50 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Royal Oudh 100 Sticks Refill Pack | Mangalam',
                'meta_description' => '100 sticks Royal Oudh agarbatti refill box.',
                'image' => 'assets/images/oudh-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers'],
                'variants' => [
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-RO-100-REF', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 110, 'is_default' => true],
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-RO-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 65, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Mogra Noor (Pack of 100 Refill)',
                'hindi_title' => 'मोगरा नूर (100 स्टिक्स रिफिल)',
                'slug' => 'mogra-noor-100',
                'sku' => 'MNG-BL-MN-100-REF',
                'short_description' => '100 sticks mega refill pack of fresh Jasmine Sambac (Mogra) blooms.',
                'description' => 'Rich floral jasmine abundance for every dawn puja. 100 sticks packed in eco-friendly protective packaging.',
                'base_price' => 999.00,
                'sale_price' => 499.00,
                'stock_quantity' => 90,
                'burn_time' => '45 mins each',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Mogra Noor 100 Sticks Refill Pack | Mangalam',
                'meta_description' => '100 sticks pure Jasmine Mogra bambooless refill pack.',
                'image' => 'assets/images/incense-pack.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers'],
                'variants' => [
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-MN-100-REF', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 90, 'is_default' => true],
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-MN-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 60, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Gulab Rooh (Pack of 100 Refill)',
                'hindi_title' => 'गुलाब रूह (100 स्टिक्स रिफिल)',
                'slug' => 'gulab-rooh-100',
                'sku' => 'MNG-BL-GR-100-REF',
                'short_description' => '100 sticks mega refill pack of authentic Indian Damask Rose incense.',
                'description' => 'Sweet devotional rose aroma for temple-grade tranquility every day. 100 pure charcoal-free sticks.',
                'base_price' => 999.00,
                'sale_price' => 499.00,
                'stock_quantity' => 105,
                'burn_time' => '45 mins each',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Gulab Rooh 100 Sticks Refill Pack | Mangalam',
                'meta_description' => '100 sticks pure Desi Rose Gulab Rooh refill pack.',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers'],
                'variants' => [
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-GR-100-REF', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 105, 'is_default' => true],
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-GR-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 75, 'is_default' => false],
                ],
            ],
            [
                'category_slug' => 'bambooless',
                'title' => 'Lavender Veda (Pack of 100 Refill)',
                'hindi_title' => 'लैवेंडर वेदा (100 स्टिक्स रिफिल)',
                'slug' => 'lavender-veda-100',
                'sku' => 'MNG-BL-LV-100-REF',
                'short_description' => '100 sticks mega refill pack of calming Lavender Veda bambooless sticks.',
                'description' => 'Long-lasting peaceful ambiance for meditation rooms and bedtime prayers. 100 pure sticks at 50% off.',
                'base_price' => 999.00,
                'sale_price' => 499.00,
                'stock_quantity' => 95,
                'burn_time' => '45 mins each',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'meta_title' => 'Lavender Veda 100 Sticks Refill Pack | Mangalam',
                'meta_description' => '100 sticks pure Lavender Veda incense refill pack.',
                'image' => 'assets/images/camphor-refill-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers'],
                'variants' => [
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'MNG-BL-LV-100-REF', 'price' => 499.00, 'compare_at_price' => 999.00, 'stock' => 95, 'is_default' => true],
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'MNG-BL-LV-40', 'price' => 399.00, 'compare_at_price' => 499.00, 'stock' => 65, 'is_default' => false],
                ],
            ],

            // =========================================================================
            // PACK OF SIX GRAND COMBO (MRP: 1799, SALE: 1199)
            // =========================================================================
            [
                'category_slug' => 'bambooless',
                'title' => 'Pack of Six (6 Fragrance Grand Collection)',
                'hindi_title' => 'पैक ऑफ सिक्स (६ दिव्य सुगंध संग्रह)',
                'slug' => 'pack-of-six',
                'sku' => 'MNG-BL-PK6-240',
                'short_description' => 'Complete grand bundle of all 6 sacred Bambooless fragrances: Swarna Pushpa, Divya Naagchampa, Chandan Saanjh, Royal Oudh, Mogra Noor, and Gulab Rooh.',
                'description' => 'The ultimate Vedic incense experience at exceptional savings. 240 sticks total across 6 divine fragrances for complete spiritual harmony in your home temple.',
                'base_price' => 1799.00,
                'sale_price' => 1199.00,
                'stock_quantity' => 60,
                'burn_time' => '45 mins each',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Pack of Six Bambooless Incense Collection (240 Sticks) | Mangalam',
                'meta_description' => 'Buy Pack of Six Bambooless Incense Sticks collection (240 sticks). Flat ₹1199 special value price.',
                'image' => 'assets/images/oudh-pack-card.jpg',
                'collections' => ['all', 'bambooless', 'super-save-offers', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Pack of 6 Boxes (240 Sticks Total)', 'sku' => 'MNG-BL-PK6-240', 'price' => 1199.00, 'compare_at_price' => 1799.00, 'stock' => 60, 'is_default' => true],
                ],
            ],

            // =========================================================================
            // MANGALAM PITAMBARA HAVAN PACK (COMING SOON)
            // =========================================================================
            [
                'category_slug' => 'bambooless',
                'title' => 'Mangalam Pitambara Havan Pack',
                'hindi_title' => 'मंगलम पीताम्बरा हवन पैक',
                'slug' => 'pitambara-havan',
                'sku' => 'MNG-HV-PITAMBARA',
                'short_description' => '100% pure authentic Vedic Pitambara Havan Pack with fresh mango wood sticks, pure desi ghee, and 21 rare Himalayan yajna samagri.',
                'description' => 'Experience the profound protective power of Maa Baglamukhi and Lord Vishnu with our artisanal Pitambara Havan Pack.',
                'base_price' => 2499.00,
                'sale_price' => 1499.00,
                'stock_quantity' => 100,
                'burn_time' => '45 mins yajna',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Mangalam Pitambara Havan Pack | Authentic Vedic Yajna Kit',
                'meta_description' => 'Experience divine protection and peace with Mangalam Pitambara Havan Pack. Pre-book now.',
                'image' => 'assets/images/banner-pitambara-havan.jpg',
                'collections' => ['all', 'bambooless', 'best-seller-combo'],
                'variants' => [
                    ['title' => 'Complete Pitambara Havan Pack', 'sku' => 'MNG-HV-PITAMBARA', 'price' => 1499.00, 'compare_at_price' => 2499.00, 'stock' => 100, 'is_default' => true],
                ],
            ],
        ];

        // Clean up old products not in the new official list
        $newSlugs = array_column($productsData, 'slug');
        $oldProducts = Product::whereNotIn('slug', $newSlugs)->get();
        foreach ($oldProducts as $oldP) {
            $oldP->variants()->delete();
            $oldP->images()->delete();
            $oldP->reviews()->delete();
            $oldP->faqs()->delete();
            $oldP->collections()->detach();
            $oldP->delete();
        }

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
            ProductImage::updateOrCreate(
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

            // Devotee Test reviews
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
        Setting::set('store_name', 'Mangalam.co');
        Setting::set('free_shipping_threshold', '499');
        Setting::set('announcement_text', 'शुद्धं समर्पयामि — I offer only what is pure. 100% Bambooless & Charcoal-free.');
    }
}