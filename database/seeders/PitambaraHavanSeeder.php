<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Review;

class PitambaraHavanSeeder extends Seeder
{
    /**
     * Run the database seeds for Mangalam Pitambara Havan.
     */
    public function run(): void
    {
        $category = Category::where('slug', 'havan-cups')->first();

        $product = Product::updateOrCreate(
            ['slug' => 'pitambara-havan'],
            [
                'category_id' => $category ? $category->id : null,
                'title' => 'Mangalam Pitambara Havan',
                'hindi_title' => 'पीताम्बरा हवन — माँ बगलामुखी कृपा',
                'slug' => 'pitambara-havan',
                'sku' => 'MNG-PITAMBARA-HVN',
                'short_description' => 'A Sacred Blend for a Calmer, Lighter & More Positive Life. 100% Natural, Cow Dung Based with Fresh Mango Wood Sticks & Inspired by Maa Baglamukhi.',
                'description' => 'Experience the sacred power of Mangalam Pitambara Havan. Handcrafted with devotion using time-honoured Vedic traditions, this pure cow dung and mango wood havan cup is your spiritual shield against negativity, bringing profound peace and divine atmosphere into your sanctuary.',
                'ingredients' => 'Desi Gir Cow Dung, Aam ki Samidha (Fresh Mango Wood), Pure Desi Ghee, Bhimseni Camphor, Vedic Guggal, Loban, Jatamansi, Nagarmotha, Shatavari & 16 Sacred Herbs.',
                'benefits' => 'Spiritual Protection against negative energies, Removes household vastu doshas, Calms racing mind and anxiety, Creates a pure divine temple atmosphere.',
                'how_to_use' => 'Hold the havan cup, light the mango wood stick and cup rim with a diya/match, blow gently after 15 seconds, place on the complimentary ceramic stand and let the sacred smoke purify every corner.',
                'burn_time' => '30 - 35 Minutes',
                'base_price' => 499.00,
                'sale_price' => 299.00,
                'stock_quantity' => 150,
                'track_inventory' => true,
                'is_featured' => true,
                'is_bestseller' => true,
                'status' => 'active',
                'meta_title' => 'Mangalam Pitambara Havan — Pure Vedic Negative Energy Cleanser',
                'meta_description' => 'Mangalam Pitambara Havan: 100% Natural, Cow dung based with fresh mango wood sticks. Inspired by Maa Baglamukhi for spiritual protection and peace.',
            ]
        );

        // Clear and add images
        $product->images()->delete();

        $images = [
            ['path' => 'assets/images/pitambara/hero-altar.jpg', 'alt' => 'Mangalam Pitambara Havan Altar', 'is_primary' => true, 'order' => 0],
            ['path' => 'assets/images/pitambara/step4-light.jpg', 'alt' => 'Burning Pitambara Havan Cup with Sacred Smoke', 'is_primary' => false, 'order' => 1],
            ['path' => 'assets/images/pitambara/step2-blend.jpg', 'alt' => 'Sacred Herbs and Maa Baglamukhi Blend', 'is_primary' => false, 'order' => 2],
            ['path' => 'assets/images/pitambara/step3-mangowood.jpg', 'alt' => 'Fresh Mango Wood Sticks Infusion', 'is_primary' => false, 'order' => 3],
            ['path' => 'assets/images/pitambara/devotee-praying.jpg', 'alt' => 'Devotee in Prayer with Pitambara Smoke', 'is_primary' => false, 'order' => 4],
            ['path' => 'assets/images/pitambara-havan-full.jpg', 'alt' => 'Pitambara Havan Complete Visual Experience', 'is_primary' => false, 'order' => 5],
        ];

        foreach ($images as $img) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $img['path'],
                'alt_text' => $img['alt'],
                'sort_order' => $img['order'],
                'is_primary' => $img['is_primary'],
            ]);
        }

        // Clear and create variants
        $product->variants()->delete();

        $variants = [
            [
                'title' => 'Pack of 12 Sacred Cups',
                'sku' => 'MNG-PIT-12',
                'price' => 299.00,
                'compare_at_price' => 499.00,
                'stock_quantity' => 100,
                'is_default' => true,
                'sort_order' => 0,
            ],
            [
                'title' => 'Pack of 24 Cups (Save ₹450)',
                'sku' => 'MNG-PIT-24',
                'price' => 549.00,
                'compare_at_price' => 999.00,
                'stock_quantity' => 50,
                'is_default' => false,
                'sort_order' => 1,
            ],
            [
                'title' => 'Family Mandir Pack (36 Cups + Brass Stand)',
                'sku' => 'MNG-PIT-36',
                'price' => 799.00,
                'compare_at_price' => 1499.00,
                'stock_quantity' => 30,
                'is_default' => false,
                'sort_order' => 2,
            ],
        ];

        foreach ($variants as $v) {
            ProductVariant::create(array_merge($v, ['product_id' => $product->id]));
        }

        // Add 5-star verified devotee reviews for Pitambara Havan
        $product->reviews()->delete();
        $sampleReviews = [
            [
                'reviewer_name' => 'Pandit Radheshyam Shastri',
                'reviewer_email' => 'shastri.radheshyam@gmail.com',
                'rating' => 5,
                'title' => 'Authentic Vedic Fragrance & High Spiritual Energy',
                'review_text' => 'Maa Baglamukhi ki kripa se is havan cup ki sugandh aur urja adbhut hai. Pure ghar me ek alag hi shanti aur pavitrata mehsoos hoti hai. Cow dung aur mango wood ka blend bilkul traditional havan jaisa hai.',
                'is_verified_buyer' => true,
                'status' => 'approved',
            ],
            [
                'reviewer_name' => 'Dr. Sunita Aggarwal',
                'reviewer_email' => 'dr.sunita@gmail.com',
                'rating' => 5,
                'title' => 'Zero smoke irritation, instant positivity!',
                'review_text' => 'Regular commercial dhoop used to give me headaches and eye stinging. Pitambara Havan produces clean white herbal smoke that instantly calms the mind after a stressful day. Highly recommended!',
                'is_verified_buyer' => true,
                'status' => 'approved',
            ],
            [
                'reviewer_name' => 'Vikas Malhotra',
                'reviewer_email' => 'vikas.m@yahoo.com',
                'rating' => 5,
                'title' => 'Shield against negative vibes — must buy!',
                'review_text' => 'Every evening we light one cup during Sandhya aarti. The fragrance of pure camphor, loban, and mango wood lingers for hours. Our home feels like a temple altar.',
                'is_verified_buyer' => true,
                'status' => 'approved',
            ],
        ];

        foreach ($sampleReviews as $rev) {
            Review::create(array_merge($rev, ['product_id' => $product->id]));
        }
    }
}
