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

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Admin & Test User
        $user = User::firstOrCreate(
            ['email' => 'admin@sadhna.co'],
            [
                'name' => 'Sadhna Admin',
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

        // 2. Categories
        $categoriesData = [
            'incense-sticks' => [
                'name' => 'Bambooless Incense Sticks',
                'subtitle' => 'Non-irritating. Pure fragrances.',
                'description' => 'Experience ancient temple tranquility with 100% natural, bambooless incense sticks made without toxic charcoal.',
                'sort_order' => 1,
            ],
            'organic-havan-cups' => [
                'name' => 'Organic Havan Cups',
                'subtitle' => '100% Organic & Vedic',
                'description' => 'Pure cow dung and ayurvedic guggal havan cups designed for quick and auspicious home yajnas and daily purification.',
                'sort_order' => 2,
            ],
            'charcoal-free-dhoop-cones' => [
                'name' => 'Charcoal-Free Dhoop Cones',
                'subtitle' => 'Charcoal Free | Low Smoke',
                'description' => 'Low-smoke dhoop cones prepared from recycled sacred flowers, pure resins, and rare essential oils.',
                'sort_order' => 3,
            ],
            'attar-spray' => [
                'name' => 'Natural Attar Sprays',
                'subtitle' => 'Alcohol Free Fragrances',
                'description' => 'Pure water-based and alcohol-free aromatic room and puja sprays crafted from natural essential oils.',
                'sort_order' => 4,
            ],
            'combos' => [
                'name' => 'Combos & Gift Boxes',
                'subtitle' => 'Curated Sacred Bundles',
                'description' => 'Thoughtfully curated pooja bundles and festive gift hampers with exclusive volume discounts.',
                'sort_order' => 5,
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $slug => $data) {
            $categories[$slug] = Category::firstOrCreate(['slug' => $slug], array_merge($data, ['is_active' => true]));
        }

        // 3. Collections
        $collectionsData = [
            'all' => [
                'title' => 'All Sacred Products',
                'description' => 'Explore our full range of 100% pure Vedic pooja essentials, bambooless agarbatti, havan cups, and attars.',
            ],
            'incense-sticks' => [
                'title' => 'Bambooless Incense Sticks',
                'description' => 'Non-irritating sacred sticks that burn completely with minimal soothing white smoke and divine natural aroma.',
            ],
            'organic-havan-cups' => [
                'title' => 'Organic Havan Cups',
                'description' => 'Pure cow dung and guggal samagri cups that cleanse the home atmosphere and invite positive vibrations.',
            ],
            'charcoal-free-dhoop-cones' => [
                'title' => 'Charcoal-Free Dhoop Cones',
                'description' => 'Slow-burning dhoop cones with zero chemical binders and authentic temple-grade fragrance.',
            ],
            'attar-spray' => [
                'title' => 'Natural Attar Sprays',
                'description' => 'Alcohol-free spray fragrances ideal for mandir spaces, meditation corners, and daily rituals.',
            ],
            'combos' => [
                'title' => 'Super Save Offers & Combos',
                'description' => 'Best value sacred combos with up to 25% savings for your daily sadhna.',
            ],
            'pack-of-40' => [
                'title' => 'Pack of 40 Sticks',
                'description' => 'Compact 40-stick packs ideal for everyday home pooja and gifting.',
            ],
            'refill-packs' => [
                'title' => 'Pack of 100 Sticks / Refills',
                'description' => 'Value-packed 100-stick refill pouches to continue your daily pooja seamlessly.',
            ],
            'bestsellers' => [
                'title' => 'Bestseller of the Month',
                'description' => 'Most celebrated and widely loved spiritual creations by our devotee community.',
            ],
        ];

        $collections = [];
        foreach ($collectionsData as $slug => $data) {
            $collections[$slug] = Collection::firstOrCreate(['slug' => $slug], array_merge($data, ['is_active' => true]));
        }

        // 4. Products List
        $productsData = [
            [
                'slug' => 'camphor-bambooless-incense-sticks',
                'category' => 'incense-sticks',
                'collections' => ['all', 'incense-sticks', 'pack-of-40', 'bestsellers'],
                'title' => 'Camphor (कपूर)',
                'hindi_title' => 'कपूर',
                'sku' => 'SADHNA-CMP-40',
                'short_description' => 'Pure Bhimseni Camphor infused bambooless incense sticks for divine clarity and peaceful meditation.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 100,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'SADHNA-CMP-40', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 80, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'SADHNA-CMP-100', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 20, 'is_default' => false],
                ],
            ],
            [
                'slug' => 'sandalwood-bambooless-incense-sticks',
                'category' => 'incense-sticks',
                'collections' => ['all', 'incense-sticks', 'pack-of-40', 'bestsellers'],
                'title' => 'Sandalwood (चंदन)',
                'hindi_title' => 'चंदन',
                'sku' => 'SADHNA-SAN-40',
                'short_description' => 'Mysore Sandalwood powder blended with sacred herbs. Calming, cooling, and deeply grounding.',
                'base_price' => 375.00,
                'sale_price' => 289.00,
                'stock_quantity' => 85,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'SADHNA-SAN-40', 'price' => 289.00, 'compare_at_price' => 375.00, 'stock' => 60, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'SADHNA-SAN-100', 'price' => 599.00, 'compare_at_price' => 750.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'slug' => 'oudh-bambooless-incense-sticks',
                'category' => 'incense-sticks',
                'collections' => ['all', 'incense-sticks', 'pack-of-40'],
                'title' => 'Oudh (अवध)',
                'hindi_title' => 'अवध',
                'sku' => 'SADHNA-ODH-40',
                'short_description' => 'Rich, resinous Assam agarwood notes creating an opulent and meditative sacred space.',
                'base_price' => 425.00,
                'sale_price' => 349.00,
                'stock_quantity' => 50,
                'burn_time' => '50 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'SADHNA-ODH-40', 'price' => 349.00, 'compare_at_price' => 425.00, 'stock' => 35, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'SADHNA-ODH-100', 'price' => 699.00, 'compare_at_price' => 850.00, 'stock' => 15, 'is_default' => false],
                ],
            ],
            [
                'slug' => 'rose-bambooless-incense-sticks',
                'category' => 'incense-sticks',
                'collections' => ['all', 'incense-sticks', 'pack-of-40'],
                'title' => 'Rose (गुलाब)',
                'hindi_title' => 'गुलाब',
                'sku' => 'SADHNA-ROS-40',
                'short_description' => 'Desi Damask Rose petals distilled with natural gums for sweet, uplifting devotion.',
                'base_price' => 350.00,
                'sale_price' => 279.00,
                'stock_quantity' => 60,
                'burn_time' => '45 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'variants' => [
                    ['title' => 'Pack of 40 Sticks', 'sku' => 'SADHNA-ROS-40', 'price' => 279.00, 'compare_at_price' => 350.00, 'stock' => 40, 'is_default' => true],
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'SADHNA-ROS-100', 'price' => 549.00, 'compare_at_price' => 700.00, 'stock' => 20, 'is_default' => false],
                ],
            ],
            [
                'slug' => 'devi-refill-pack',
                'category' => 'incense-sticks',
                'collections' => ['all', 'incense-sticks', 'refill-packs', 'bestsellers'],
                'title' => 'Devi Refill Pack',
                'hindi_title' => 'देवी रिफिल पैक',
                'sku' => 'SADHNA-DEV-100',
                'short_description' => 'Dedicated to the Divine Mother. Blend of red flowers, turmeric, saffron, and sweet loban.',
                'base_price' => 699.00,
                'sale_price' => 549.00,
                'stock_quantity' => 45,
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'variants' => [
                    ['title' => 'Pack of 100 Sticks Refill', 'sku' => 'SADHNA-DEV-100', 'price' => 549.00, 'compare_at_price' => 699.00, 'stock' => 45, 'is_default' => true],
                ],
            ],
            [
                'slug' => 'sandalwood-havan-cup',
                'category' => 'organic-havan-cups',
                'collections' => ['all', 'organic-havan-cups', 'bestsellers'],
                'title' => 'Sandalwood Havan Cup',
                'hindi_title' => 'चंदन हवन कप',
                'sku' => 'SADHNA-HC-SAN-12',
                'short_description' => 'Ready-to-light organic havan cup packed with pure samagri, desi cow ghee, and sandalwood.',
                'base_price' => 450.00,
                'sale_price' => 349.00,
                'stock_quantity' => 90,
                'burn_time' => '25 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'variants' => [
                    ['title' => 'Pack of 12 Cups', 'sku' => 'SADHNA-HC-SAN-12', 'price' => 349.00, 'compare_at_price' => 450.00, 'stock' => 60, 'is_default' => true],
                    ['title' => 'Pack of 24 Cups', 'sku' => 'SADHNA-HC-SAN-24', 'price' => 649.00, 'compare_at_price' => 900.00, 'stock' => 30, 'is_default' => false],
                ],
            ],
            [
                'slug' => 'guggal-loban-havan-cup',
                'category' => 'organic-havan-cups',
                'collections' => ['all', 'organic-havan-cups'],
                'title' => 'Guggal & Loban Havan Cup',
                'hindi_title' => 'गुग्गल एवं लोबान हवन कप',
                'sku' => 'SADHNA-HC-GUG-12',
                'short_description' => 'Powerful negativity-dispelling samagri cups infused with natural desert Guggal and Frankincense.',
                'base_price' => 450.00,
                'sale_price' => 349.00,
                'stock_quantity' => 75,
                'burn_time' => '25 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'variants' => [
                    ['title' => 'Pack of 12 Cups', 'sku' => 'SADHNA-HC-GUG-12', 'price' => 349.00, 'compare_at_price' => 450.00, 'stock' => 50, 'is_default' => true],
                    ['title' => 'Pack of 24 Cups', 'sku' => 'SADHNA-HC-GUG-24', 'price' => 649.00, 'compare_at_price' => 900.00, 'stock' => 25, 'is_default' => false],
                ],
            ],
            [
                'slug' => 'kesar-chandan-dhoop-cones',
                'category' => 'charcoal-free-dhoop-cones',
                'collections' => ['all', 'charcoal-free-dhoop-cones'],
                'title' => 'Kesar Chandan Dhoop Cones',
                'hindi_title' => 'केसर चंदन धूप कोन',
                'sku' => 'SADHNA-DC-KSR-30',
                'short_description' => 'Charcoal-free sacred dhoop cones with saffron essence and chandan. Low smoke, divine spread.',
                'base_price' => 299.00,
                'sale_price' => 249.00,
                'stock_quantity' => 120,
                'burn_time' => '30 mins',
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'variants' => [
                    ['title' => 'Pack of 30 Cones', 'sku' => 'SADHNA-DC-KSR-30', 'price' => 249.00, 'compare_at_price' => 299.00, 'stock' => 80, 'is_default' => true],
                    ['title' => 'Pack of 60 Cones', 'sku' => 'SADHNA-DC-KSR-60', 'price' => 449.00, 'compare_at_price' => 598.00, 'stock' => 40, 'is_default' => false],
                ],
            ],
            [
                'slug' => 'chandan-attar-spray',
                'category' => 'attar-spray',
                'collections' => ['all', 'attar-spray'],
                'title' => 'Chandan Natural Attar Spray',
                'hindi_title' => 'चंदन अत्तर स्प्रे',
                'sku' => 'SADHNA-ATT-SAN-100',
                'short_description' => 'Alcohol-free pure Mysore sandalwood spray for puja room, deity vastra, and peaceful ambience.',
                'base_price' => 599.00,
                'sale_price' => 499.00,
                'stock_quantity' => 35,
                'burn_time' => null,
                'is_featured' => false,
                'is_bestseller' => false,
                'status' => 'active',
                'variants' => [
                    ['title' => '50 ml Spray', 'sku' => 'SADHNA-ATT-SAN-50', 'price' => 299.00, 'compare_at_price' => 349.00, 'stock' => 15, 'is_default' => false],
                    ['title' => '100 ml Spray', 'sku' => 'SADHNA-ATT-SAN-100', 'price' => 499.00, 'compare_at_price' => 599.00, 'stock' => 20, 'is_default' => true],
                ],
            ],
            [
                'slug' => 'trial-pack-combo',
                'category' => 'combos',
                'collections' => ['all', 'combos', 'bestsellers'],
                'title' => 'Trial Pack Combo (5 Fragrances)',
                'hindi_title' => 'ट्रायल पैक कॉम्बो',
                'sku' => 'SADHNA-TRL-CMB',
                'short_description' => 'Experience Camphor, Sandalwood, Oudh, Rose, and Devi before committing to full packs.',
                'base_price' => 999.00,
                'sale_price' => 799.00,
                'stock_quantity' => 0, // Intentionally 0 to test "Sold Out" state badge & disable button
                'burn_time' => '45 mins',
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'variants' => [
                    ['title' => '5 Fragrance Sampler Box', 'sku' => 'SADHNA-TRL-CMB', 'price' => 799.00, 'compare_at_price' => 999.00, 'stock' => 0, 'is_default' => true],
                ],
            ],
        ];

        foreach ($productsData as $pData) {
            $catId = isset($categories[$pData['category']]) ? $categories[$pData['category']]->id : null;
            
            $product = Product::firstOrCreate(
                ['slug' => $pData['slug']],
                [
                    'category_id' => $catId,
                    'title' => $pData['title'],
                    'hindi_title' => $pData['hindi_title'],
                    'sku' => $pData['sku'],
                    'short_description' => $pData['short_description'],
                    'base_price' => $pData['base_price'],
                    'sale_price' => $pData['sale_price'],
                    'stock_quantity' => $pData['stock_quantity'],
                    'burn_time' => $pData['burn_time'],
                    'is_featured' => $pData['is_featured'],
                    'is_bestseller' => $pData['is_bestseller'],
                    'status' => $pData['status'],
                ]
            );

            // Attach collections
            $collectionIds = [];
            foreach ($pData['collections'] as $cSlug) {
                if (isset($collections[$cSlug])) {
                    $collectionIds[$collections[$cSlug]->id] = ['sort_order' => 0];
                }
            }
            $product->collections()->syncWithoutDetaching($collectionIds);

            // Create variants
            foreach ($pData['variants'] as $idx => $v) {
                $product->variants()->firstOrCreate(
                    ['sku' => $v['sku']],
                    [
                        'title' => $v['title'],
                        'price' => $v['price'],
                        'compare_at_price' => $v['compare_at_price'],
                        'stock_quantity' => $v['stock'],
                        'is_default' => $v['is_default'],
                        'sort_order' => $idx,
                    ]
                );
            }

            // Primary Image & Hover Secondary Image
            $product->images()->firstOrCreate(
                ['image_path' => 'assets/images/products/' . $pData['slug'] . '-1.webp'],
                [
                    'alt_text' => $pData['title'] . ' Primary View',
                    'sort_order' => 1,
                    'is_primary' => true,
                ]
            );

            $product->images()->firstOrCreate(
                ['image_path' => 'assets/images/products/' . $pData['slug'] . '-2.webp'],
                [
                    'alt_text' => $pData['title'] . ' Ritual In-Use View',
                    'sort_order' => 2,
                    'is_primary' => false,
                ]
            );

            // Test reviews
            $product->reviews()->firstOrCreate(
                ['reviewer_email' => 'buyer.' . $pData['slug'] . '@example.com'],
                [
                    'user_id' => $user->id,
                    'reviewer_name' => 'Verified Devotee',
                    'rating' => 5,
                    'title' => 'Pure and Divine',
                    'review_text' => 'The purest fragrance for daily morning pooja.',
                    'is_verified_buyer' => true,
                    'status' => 'approved',
                ]
            );
        }

        // Settings
        Setting::set('store_name', 'Sadhna.co');
        Setting::set('free_shipping_threshold', '499');
        Setting::set('announcement_text', 'शुद्धं समर्पयामि — I offer only what is pure. Not your regular incense. Made the way it was made for centuries.');
    }
}
