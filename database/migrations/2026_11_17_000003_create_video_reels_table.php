<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('video_reels')) {
            Schema::create('video_reels', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();
                $table->string('title');
                $table->string('subtitle')->nullable();
                $table->string('slug')->nullable();
                $table->decimal('price', 10, 2)->nullable();
                $table->decimal('mrp', 10, 2)->nullable();
                $table->string('discount', 50)->nullable();
                $table->string('views', 50)->default('2.5k');
                $table->string('likes', 50)->default('350 Likes');
                $table->string('rating', 100)->default('4.9 (1,200 Reviews)');
                $table->string('thumbnail', 500)->nullable();
                $table->string('poster', 500)->nullable();
                $table->string('video_url', 500);
                $table->text('why_choose')->nullable();
                $table->text('perfect_for')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true)->index();
                $table->timestamps();
            });
        }

        // Seed the initial 8 reels from existing setup so admin has ready-to-edit records
        try {
            if (DB::table('video_reels')->count() === 0) {
                $initialReels = [
                    [
                        'title' => 'Sandalwood (चंदन)',
                        'subtitle' => 'Sacred Mysore Sandalwood Dhoop',
                        'slug' => 'chandan-saanjh',
                        'price' => 289,
                        'mrp' => 375,
                        'discount' => '23% OFF',
                        'views' => '2.6k',
                        'likes' => '380 Likes',
                        'rating' => '4.9 (1,240 Reviews)',
                        'thumbnail' => 'assets/images/products/ishanaa-oudh-incense-sticks-100.png',
                        'poster' => 'assets/images/products/ishanaa-oudh-incense-sticks-100.png',
                        'video_url' => 'assets/videos/reel-video-1.mp4',
                        'why_choose' => json_encode([
                            '100% Charcoal-Free & Bamboo-Less',
                            'Pure Mysore Sandalwood & Natural Herbs',
                            '45+ Mins Long Burning Time per Stick',
                            'Zero Toxic Smoke, 100% Organic'
                        ]),
                        'perfect_for' => json_encode([
                            'Daily Morning & Evening Puja',
                            'Meditation, Yoga & Stress Relief',
                            'Purifying Home Energy & Aura'
                        ]),
                        'sort_order' => 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'title' => 'Nagchampa Refill Pack',
                        'subtitle' => 'Authentic Sacred Floral Woods',
                        'slug' => 'divya-naagchampa',
                        'price' => 489,
                        'mrp' => 700,
                        'discount' => '30% OFF',
                        'views' => '2.6k',
                        'likes' => '492 Likes',
                        'rating' => '4.8 (980 Reviews)',
                        'thumbnail' => 'assets/images/products/ishanaa-incense-sticks-trio.jpg',
                        'poster' => 'assets/images/products/ishanaa-incense-sticks-trio.jpg',
                        'video_url' => 'assets/videos/reel-video-2.mp4',
                        'why_choose' => json_encode([
                            'Original Naagchampa Resin & Essential Oils',
                            'Deep, Grounding Earthy Fragrance',
                            'Non-Irritant & Smoke-Free Formulation',
                            'Hand-rolled by Traditional Vedic Artisans'
                        ]),
                        'perfect_for' => json_encode([
                            'Deep Spiritual Dhyan & Sadhana',
                            'Spiritual Gatherings & Satsang',
                            'Relaxation after a Long Day'
                        ]),
                        'sort_order' => 2,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'title' => 'Oudh Refill Pack',
                        'subtitle' => 'Pure Assam Agarwood Essence',
                        'slug' => 'royal-oudh',
                        'price' => 489,
                        'mrp' => 700,
                        'discount' => '30% OFF',
                        'views' => '1.8k',
                        'likes' => '204 Likes',
                        'rating' => '5.0 (1,450 Reviews)',
                        'thumbnail' => 'assets/images/products/ishanaa-oudh-incense-sticks-100.png',
                        'poster' => 'assets/images/products/ishanaa-oudh-incense-sticks-100.png',
                        'video_url' => 'assets/videos/reel-video-3.mp4',
                        'why_choose' => json_encode([
                            'Pure Rich Assam Agarwood Extract',
                            'Opulent Long-lasting Royalty Aroma',
                            'Zero Bamboo or Carbon Fillers',
                            'Soothes the Nervous System'
                        ]),
                        'perfect_for' => json_encode([
                            'Evening Sandhya Aarti & Reflection',
                            'Welcoming Honored Guests & Festivities',
                            'Creating a Sacred Sanctuary at Home'
                        ]),
                        'sort_order' => 3,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'title' => 'Mogra Refill Pack',
                        'subtitle' => 'Pure Jasmine & Floral Herbs',
                        'slug' => 'mogra-noor',
                        'price' => 489,
                        'mrp' => 700,
                        'discount' => '30% OFF',
                        'views' => '3.2k',
                        'likes' => '610 Likes',
                        'rating' => '4.9 (780 Reviews)',
                        'thumbnail' => 'assets/images/products/ishanaa-incense-sticks-trio.jpg',
                        'poster' => 'assets/images/products/ishanaa-incense-sticks-trio.jpg',
                        'video_url' => 'assets/videos/reel-video-1.mp4',
                        'why_choose' => json_encode([
                            'Fresh White Mogra Essential Oils',
                            'Sweet Uplifting Floral Scent',
                            'Charcoal-Free Safe Burning',
                            'Cleanses Negative Air'
                        ]),
                        'perfect_for' => json_encode([
                            'Morning Prayers & Pooja',
                            'Calming Anxiety & Uplifting Mood',
                            'Home Freshening naturally'
                        ]),
                        'sort_order' => 4,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'title' => 'Loban Havan Cup',
                        'subtitle' => '100% Organic Sacred Cow Dung Cups',
                        'slug' => 'havan-cups',
                        'price' => 499,
                        'mrp' => 649,
                        'discount' => '23% OFF',
                        'views' => '2.8k',
                        'likes' => '725 Likes',
                        'rating' => '5.0 (1,890 Reviews)',
                        'thumbnail' => 'assets/images/products/ishanaa-oudh-incense-sticks-100.png',
                        'poster' => 'assets/images/products/ishanaa-oudh-incense-sticks-100.png',
                        'video_url' => 'assets/videos/reel-video-2.mp4',
                        'why_choose' => json_encode([
                            'Purifying Sambrani & Guggul Resin',
                            'Natural Desi Cow Dung Cup Base',
                            'Eliminates Vastu Dosha & Negativity',
                            'Complete Mini Havan in 15 Minutes'
                        ]),
                        'perfect_for' => json_encode([
                            'Daily Home Havan & Purification',
                            'Tuesday & Saturday Hanuman Puja',
                            'Festivals, Navratri & Diwali'
                        ]),
                        'sort_order' => 5,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'title' => 'Swarna Pushpa Sticks',
                        'subtitle' => 'Divine Marigold & Rose Fusion',
                        'slug' => 'swarna-pushpa',
                        'price' => 399,
                        'mrp' => 499,
                        'discount' => '20% OFF',
                        'views' => '3.1k',
                        'likes' => '492 Likes',
                        'rating' => '4.9 (980 Reviews)',
                        'thumbnail' => 'assets/images/products/ishanaa-incense-sticks-trio.jpg',
                        'poster' => 'assets/images/products/ishanaa-incense-sticks-trio.jpg',
                        'video_url' => 'assets/videos/reel-video-3.mp4',
                        'why_choose' => json_encode([
                            'Crafted with Sacred Temple Flowers',
                            'No Synthetic Charcoal or Chemicals',
                            'Calming Floral Vedic Aroma',
                            'Long-lasting Fragrance Residue'
                        ]),
                        'perfect_for' => json_encode([
                            'Daily Temple & Home Deity Worship',
                            'Festive Havans & Ceremonies',
                            'Elevating Peace and Positive Vibes'
                        ]),
                        'sort_order' => 6,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'title' => 'Gulab Rooh Sticks',
                        'subtitle' => 'Kannauj Rose Flower Essence',
                        'slug' => 'gulab-rooh',
                        'price' => 399,
                        'mrp' => 499,
                        'discount' => '20% OFF',
                        'views' => '4.9k',
                        'likes' => '430 Likes',
                        'rating' => '4.8 (690 Reviews)',
                        'thumbnail' => 'assets/images/products/ishanaa-oudh-incense-sticks-100.png',
                        'poster' => 'assets/images/products/ishanaa-oudh-incense-sticks-100.png',
                        'video_url' => 'assets/videos/reel-video-1.mp4',
                        'why_choose' => json_encode([
                            'Authentic Desi Gulab Petals',
                            'Sweet Devotional Aroma',
                            '100% Bamboo-Free Core',
                            'Pure Vedic Formulation'
                        ]),
                        'perfect_for' => json_encode([
                            'Devi Lakshmi Worship & Aarti',
                            'Creating Sacred Romance & Serenity',
                            'Meditation & Gratitude'
                        ]),
                        'sort_order' => 7,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'title' => 'Pack of Six Combo (240)',
                        'subtitle' => 'The Grand 6-Fragrance Assortment',
                        'slug' => 'pack-of-six',
                        'price' => 1199,
                        'mrp' => 1799,
                        'discount' => '33% OFF',
                        'views' => '5.9k',
                        'likes' => '940 Likes',
                        'rating' => '5.0 (3,400 Reviews)',
                        'thumbnail' => 'assets/images/products/ishanaa-incense-sticks-trio.jpg',
                        'poster' => 'assets/images/products/ishanaa-incense-sticks-trio.jpg',
                        'video_url' => 'assets/videos/reel-video-2.mp4',
                        'why_choose' => json_encode([
                            'Includes All 6 Master Blends',
                            '240 High Grade Dhoop Sticks',
                            'Brass Holder Stand Included',
                            'Luxury Gift Box Presentation'
                        ]),
                        'perfect_for' => json_encode([
                            'Exploring Every Sacred Scent',
                            'Housewarming & Spiritual Gifting',
                            'Year-Round Devotion'
                        ]),
                        'sort_order' => 8,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];

                // Link products by slug if they exist in DB
                foreach ($initialReels as &$reel) {
                    $prod = Product::where('slug', $reel['slug'])->first();
                    if ($prod) {
                        $reel['product_id'] = $prod->id;
                    }
                }

                DB::table('video_reels')->insert($initialReels);
            }
        } catch (\Throwable $e) {}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_reels');
    }
};
