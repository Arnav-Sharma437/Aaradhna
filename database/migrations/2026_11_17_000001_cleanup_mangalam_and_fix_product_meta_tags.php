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
     * Clean all legacy 'Mangalam' branding and fix mismatched product meta titles & descriptions.
     */
    public function up(): void
    {
        // 1. Clean settings table
        if (Schema::hasTable('settings')) {
            try {
                DB::table('settings')
                    ->where('key', 'store_name')
                    ->update(['value' => 'ISHANAA™ — Sacred Vedic Living']);

                $settingsWithMangalam = DB::table('settings')
                    ->where('value', 'LIKE', '%Mangalam%')
                    ->orWhere('value', 'LIKE', '%mangalam%')
                    ->get();

                foreach ($settingsWithMangalam as $s) {
                    $cleaned = str_ireplace(['mangalam.co', 'mangalam'], ['ISHANAA', 'ISHANAA'], $s->value);
                    DB::table('settings')->where('id', $s->id)->update(['value' => $cleaned]);
                }
            } catch (\Throwable $e) {}
        }

        // 2. Clean & Fix products table
        if (Schema::hasTable('products')) {
            try {
                $scentMap = [
                    'jasmine'    => ['jasmine', 'mogra', 'mongra', 'sambac'],
                    'naagchampa' => ['naagchampa', 'nagchampa', 'champaca'],
                    'chandan'    => ['chandan', 'sandalwood'],
                    'oudh'       => ['oudh', 'agarwood'],
                    'rose'       => ['gulab', 'rose'],
                    'lavender'   => ['lavender'],
                    'marigold'   => ['swarna pushpa', 'swarna-pushpa', 'marigold', 'marygold', 'kesar chandan', 'kesar-chandan'],
                    'havan'      => ['pitambara', 'havan', 'yajna', 'sambrani', 'loban'],
                ];

                $products = Product::all();
                foreach ($products as $p) {
                    $pText = strtolower(($p->slug ?? '') . ' ' . ($p->title ?? ''));
                    $currentMetaTitle = trim($p->meta_title ?? '');
                    $currentMetaDesc = trim($p->meta_description ?? '');

                    // Determine which scent group this product belongs to
                    $productScent = null;
                    foreach ($scentMap as $group => $keywords) {
                        foreach ($keywords as $kw) {
                            if (str_contains($pText, $kw)) {
                                $productScent = $group;
                                break 2;
                            }
                        }
                    }

                    // Check if meta_title has mismatched scent
                    $isMismatched = false;
                    if ($productScent && !empty($currentMetaTitle)) {
                        $metaLower = strtolower($currentMetaTitle);
                        foreach ($scentMap as $group => $keywords) {
                            if ($group !== $productScent) {
                                foreach ($keywords as $kw) {
                                    if (str_contains($metaLower, $kw)) {
                                        // Mismatch detected: meta mentions a different scent
                                        $isMismatched = true;
                                        break 2;
                                    }
                                }
                            }
                        }
                    }

                    // Compute clean meta title
                    if (empty($currentMetaTitle) || $isMismatched) {
                        $cleanTitle = preg_replace('/\s*\(\s*Pack\s*of\s*[^)]+\)/i', '', $p->title);
                        $newMetaTitle = trim($cleanTitle) . ' — ISHANAA™';
                    } else {
                        $newMetaTitle = str_ireplace(['mangalam.co', 'mangalam'], ['ISHANAA', 'ISHANAA'], $currentMetaTitle);
                    }

                    // Compute clean meta description
                    if (empty($currentMetaDesc) || $isMismatched) {
                        $newMetaDesc = !empty($p->short_description) 
                            ? str_ireplace(['mangalam.co', 'mangalam'], ['Ishanaa', 'Ishanaa'], $p->short_description)
                            : "Experience 100% pure and sacred {$p->title} bambooless incense sticks by ISHANAA.";
                    } else {
                        $newMetaDesc = str_ireplace(['mangalam.co', 'mangalam'], ['Ishanaa', 'Ishanaa'], $currentMetaDesc);
                    }

                    // Also clean title, description, short_description if they have Mangalam
                    $newTitle = str_ireplace(['Mangalam Pitambara', 'Mangalam'], ['Ishanaa Pitambara', 'Ishanaa'], $p->title);
                    $newShortDesc = $p->short_description ? str_ireplace(['mangalam.co', 'mangalam'], ['Ishanaa', 'Ishanaa'], $p->short_description) : $p->short_description;
                    $newDesc = $p->description ? str_ireplace(['mangalam.co', 'mangalam'], ['Ishanaa', 'Ishanaa'], $p->description) : $p->description;

                    $p->update([
                        'title' => $newTitle,
                        'meta_title' => $newMetaTitle,
                        'meta_description' => $newMetaDesc,
                        'short_description' => $newShortDesc,
                        'description' => $newDesc,
                    ]);
                }
            } catch (\Throwable $e) {}
        }

        // 3. Clean categories
        if (Schema::hasTable('categories')) {
            try {
                DB::table('categories')
                    ->where('meta_title', 'LIKE', '%Mangalam%')
                    ->orWhere('meta_title', 'LIKE', '%mangalam%')
                    ->get()
                    ->each(function ($c) {
                        $cleaned = str_ireplace(['mangalam.co', 'mangalam'], ['ISHANAA™', 'ISHANAA™'], $c->meta_title);
                        DB::table('categories')->where('id', $c->id)->update(['meta_title' => $cleaned]);
                    });

                DB::table('categories')
                    ->where('meta_description', 'LIKE', '%Mangalam%')
                    ->orWhere('meta_description', 'LIKE', '%mangalam%')
                    ->get()
                    ->each(function ($c) {
                        $cleaned = str_ireplace(['mangalam.co', 'mangalam'], ['Ishanaa', 'Ishanaa'], $c->meta_description);
                        DB::table('categories')->where('id', $c->id)->update(['meta_description' => $cleaned]);
                    });
            } catch (\Throwable $e) {}
        }

        // 4. Clean collections
        if (Schema::hasTable('collections')) {
            try {
                DB::table('collections')
                    ->where('meta_title', 'LIKE', '%Mangalam%')
                    ->orWhere('meta_title', 'LIKE', '%mangalam%')
                    ->get()
                    ->each(function ($col) {
                        $cleaned = str_ireplace(['mangalam.co', 'mangalam'], ['ISHANAA™', 'ISHANAA™'], $col->meta_title);
                        DB::table('collections')->where('id', $col->id)->update(['meta_title' => $cleaned]);
                    });

                DB::table('collections')
                    ->where('meta_description', 'LIKE', '%Mangalam%')
                    ->orWhere('meta_description', 'LIKE', '%mangalam%')
                    ->get()
                    ->each(function ($col) {
                        $cleaned = str_ireplace(['mangalam.co', 'mangalam'], ['Ishanaa', 'Ishanaa'], $col->meta_description);
                        DB::table('collections')->where('id', $col->id)->update(['meta_description' => $cleaned]);
                    });
            } catch (\Throwable $e) {}
        }

        // 5. Clean coupons
        if (Schema::hasTable('coupons')) {
            try {
                DB::table('coupons')
                    ->where('code', 'MANGALAM10')
                    ->update(['code' => 'ISHANAA10']);
            } catch (\Throwable $e) {}
        }

        // 6. Clean FAQs
        if (Schema::hasTable('faqs')) {
            try {
                DB::table('faqs')
                    ->where('question', 'LIKE', '%Mangalam%')
                    ->orWhere('answer', 'LIKE', '%Mangalam%')
                    ->get()
                    ->each(function ($faq) {
                        DB::table('faqs')->where('id', $faq->id)->update([
                            'question' => str_ireplace('Mangalam', 'ISHANAA', $faq->question),
                            'answer' => str_ireplace('Mangalam', 'ISHANAA', $faq->answer),
                        ]);
                    });
            } catch (\Throwable $e) {}
        }

        // 7. Clean Testimonials
        if (Schema::hasTable('testimonials')) {
            try {
                DB::table('testimonials')
                    ->where('review_text', 'LIKE', '%Mangalam%')
                    ->get()
                    ->each(function ($t) {
                        DB::table('testimonials')->where('id', $t->id)->update([
                            'review_text' => str_ireplace('Mangalam', 'ISHANAA', $t->review_text),
                        ]);
                    });
            } catch (\Throwable $e) {}
        }

        // 8. Clean Blog Posts
        if (Schema::hasTable('blog_posts')) {
            try {
                DB::table('blog_posts')
                    ->where('meta_title', 'LIKE', '%Mangalam%')
                    ->orWhere('content', 'LIKE', '%Mangalam%')
                    ->orWhere('author_name', 'LIKE', '%Mangalam%')
                    ->get()
                    ->each(function ($b) {
                        DB::table('blog_posts')->where('id', $b->id)->update([
                            'meta_title' => str_ireplace(['mangalam.co', 'mangalam'], ['ISHANAA™', 'ISHANAA™'], $b->meta_title),
                            'author_name' => str_ireplace('Mangalam', 'ISHANAA', $b->author_name),
                            'content' => str_ireplace('Mangalam', 'ISHANAA', $b->content),
                        ]);
                    });
            } catch (\Throwable $e) {}
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Safe non-destructive down migration
    }
};
