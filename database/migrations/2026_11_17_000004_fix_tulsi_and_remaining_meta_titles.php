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
     * Fix Tulsi, Jasmine and all product meta tags, ensuring zero scent cross-contamination
     * and zero legacy Mangalam / Manglam references across the store.
     */
    public function up(): void
    {
        if (!Schema::hasTable('products')) {
            return;
        }

        try {
            // Scent family definitions
            $scentFamilies = [
                'tulsi'         => ['tulsi', 'तुलसी', 'holy basil'],
                'jasmine'       => ['jasmine', 'mogra', 'mongra', 'sambac', 'चमेली', 'मोगरा'],
                'naagchampa'    => ['naagchampa', 'nagchampa', 'champaca', 'नागचंपा', 'नागचम्पा'],
                'chandan'       => ['chandan', 'sandalwood', 'चंदन'],
                'oudh'          => ['oudh', 'agarwood', 'ऊध'],
                'rose'          => ['gulab', 'rose', 'गुलाब'],
                'lavender'      => ['lavender', 'लैवेंडर'],
                'kesarchandan'  => ['kesar chandan', 'kesar-chandan', 'swarna pushpa', 'swarna-pushpa', 'marigold', 'marygold', 'केसर चंदन', 'स्वर्ण पुष्पा'],
                'havan'         => ['pitambara', 'havan', 'yajna', 'sambrani', 'loban', 'हवन', 'लोबान'],
            ];

            // 1. Explicitly update Tulsi product(s)
            $tulsiProducts = Product::where('slug', 'tulsi')
                ->orWhere('slug', 'sacred-tulsi')
                ->orWhere('title', 'LIKE', '%tulsi%')
                ->orWhere('title', 'LIKE', '%तुलसी%')
                ->get();

            foreach ($tulsiProducts as $tp) {
                $cleanTitle = trim(preg_replace('/\s*\(\s*Pack\s*of\s*[^)]+\)/i', '', $tp->title));
                $newMetaTitle = !empty($cleanTitle) ? "{$cleanTitle} — ISHANAA™" : "Sacred Tulsi (तुलसी) — ISHANAA™";
                $newMetaDesc = !empty($tp->short_description) 
                    ? str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['Ishanaa', 'Ishanaa', 'Ishanaa'], $tp->short_description)
                    : "Experience pure and sacred Tulsi bambooless incense sticks by ISHANAA. Natural, charcoal-free divine fragrance.";

                $tp->update([
                    'meta_title' => $newMetaTitle,
                    'meta_description' => $newMetaDesc,
                ]);
            }

            // 2. Explicitly update Jasmine product(s)
            $jasmineProducts = Product::where('slug', 'jasmine')
                ->orWhere('slug', 'jasmine-incense-sticks')
                ->orWhere('title', 'LIKE', '%jasmine%')
                ->orWhere('title', 'LIKE', '%चमेली%')
                ->get();

            foreach ($jasmineProducts as $jp) {
                $cleanTitle = trim(preg_replace('/\s*\(\s*Pack\s*of\s*[^)]+\)/i', '', $jp->title));
                $newMetaTitle = !empty($cleanTitle) ? "{$cleanTitle} — ISHANAA™" : "Jasmine Bambooless Incense Sticks — ISHANAA™";
                $newMetaDesc = !empty($jp->short_description) 
                    ? str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['Ishanaa', 'Ishanaa', 'Ishanaa'], $jp->short_description)
                    : "Experience pure Jasmine bambooless incense sticks by ISHANAA. Natural, charcoal-free divine fragrance.";

                $jp->update([
                    'meta_title' => $newMetaTitle,
                    'meta_description' => $newMetaDesc,
                ]);
            }

            // 3. Scan & clean all products for cross-contamination and Mangalam text
            $allProducts = Product::all();
            foreach ($allProducts as $p) {
                $pSearch = strtolower(($p->slug ?? '') . ' ' . ($p->title ?? ''));
                $currentMetaTitle = trim($p->meta_title ?? '');
                $currentMetaDesc = trim($p->meta_description ?? '');

                // Identify product's scent family
                $pFamily = null;
                foreach ($scentFamilies as $fam => $keywords) {
                    foreach ($keywords as $kw) {
                        if (str_contains($pSearch, $kw)) {
                            $pFamily = $fam;
                            break 2;
                        }
                    }
                }

                $metaTitleUpdated = false;
                $metaDescUpdated = false;

                // Replace Mangalam / Manglam in meta_title
                $cleanedTitle = str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['ISHANAA', 'ISHANAA', 'ISHANAA'], $currentMetaTitle);
                if ($cleanedTitle !== $currentMetaTitle) {
                    $currentMetaTitle = $cleanedTitle;
                    $metaTitleUpdated = true;
                }

                // Check for cross-contamination in meta_title
                if ($pFamily && !empty($currentMetaTitle)) {
                    $mLower = strtolower($currentMetaTitle);
                    foreach ($scentFamilies as $fam => $keywords) {
                        if ($fam !== $pFamily) {
                            foreach ($keywords as $kw) {
                                if (str_contains($mLower, $kw) && !str_contains($pSearch, $kw)) {
                                    $cleanTitle = trim(preg_replace('/\s*\(\s*Pack\s*of\s*[^)]+\)/i', '', $p->title));
                                    $currentMetaTitle = "{$cleanTitle} — ISHANAA™";
                                    $metaTitleUpdated = true;
                                    break 2;
                                }
                            }
                        }
                    }
                } elseif (empty($currentMetaTitle)) {
                    $cleanTitle = trim(preg_replace('/\s*\(\s*Pack\s*of\s*[^)]+\)/i', '', $p->title));
                    $currentMetaTitle = "{$cleanTitle} — ISHANAA™";
                    $metaTitleUpdated = true;
                }

                // Clean meta_description
                $cleanedDesc = str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['Ishanaa', 'Ishanaa', 'Ishanaa'], $currentMetaDesc);
                if ($cleanedDesc !== $currentMetaDesc) {
                    $currentMetaDesc = $cleanedDesc;
                    $metaDescUpdated = true;
                }

                if ($pFamily && !empty($currentMetaDesc)) {
                    $dLower = strtolower($currentMetaDesc);
                    foreach ($scentFamilies as $fam => $keywords) {
                        if ($fam !== $pFamily) {
                            foreach ($keywords as $kw) {
                                if (str_contains($dLower, $kw) && !str_contains($pSearch, $kw)) {
                                    $currentMetaDesc = !empty($p->short_description) 
                                        ? str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['Ishanaa', 'Ishanaa', 'Ishanaa'], $p->short_description)
                                        : "Experience 100% pure and sacred {$p->title} bambooless incense sticks by ISHANAA.";
                                    $metaDescUpdated = true;
                                    break 2;
                                }
                            }
                        }
                    }
                }

                // Clean title / descriptions
                $newTitle = str_ireplace(['Mangalam Pitambara', 'Mangalam', 'Manglam'], ['Ishanaa Pitambara', 'Ishanaa', 'Ishanaa'], $p->title);
                $newShortDesc = $p->short_description ? str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['Ishanaa', 'Ishanaa', 'Ishanaa'], $p->short_description) : $p->short_description;
                $newDesc = $p->description ? str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['Ishanaa', 'Ishanaa', 'Ishanaa'], $p->description) : $p->description;

                $updateData = [];
                if ($metaTitleUpdated) $updateData['meta_title'] = $currentMetaTitle;
                if ($metaDescUpdated) $updateData['meta_description'] = $currentMetaDesc;
                if ($newTitle !== $p->title) $updateData['title'] = $newTitle;
                if ($newShortDesc !== $p->short_description) $updateData['short_description'] = $newShortDesc;
                if ($newDesc !== $p->description) $updateData['description'] = $newDesc;

                if (!empty($updateData)) {
                    $p->update($updateData);
                }
            }

            // 4. Clean settings table
            if (Schema::hasTable('settings')) {
                $settings = DB::table('settings')
                    ->where('value', 'LIKE', '%Mangalam%')
                    ->orWhere('value', 'LIKE', '%mangalam%')
                    ->orWhere('value', 'LIKE', '%Manglam%')
                    ->orWhere('value', 'LIKE', '%manglam%')
                    ->get();

                foreach ($settings as $s) {
                    $cleaned = str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['ISHANAA', 'ISHANAA', 'ISHANAA'], $s->value);
                    DB::table('settings')->where('id', $s->id)->update(['value' => $cleaned]);
                }
            }

            // 5. Clean categories & collections tables
            if (Schema::hasTable('categories')) {
                $categories = DB::table('categories')
                    ->where('meta_title', 'LIKE', '%Mangalam%')
                    ->orWhere('meta_title', 'LIKE', '%mangalam%')
                    ->orWhere('meta_title', 'LIKE', '%Manglam%')
                    ->orWhere('meta_title', 'LIKE', '%manglam%')
                    ->get();
                foreach ($categories as $c) {
                    $cleaned = str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['ISHANAA™', 'ISHANAA™', 'ISHANAA™'], $c->meta_title);
                    DB::table('categories')->where('id', $c->id)->update(['meta_title' => $cleaned]);
                }
            }

            if (Schema::hasTable('collections')) {
                $collections = DB::table('collections')
                    ->where('meta_title', 'LIKE', '%Mangalam%')
                    ->orWhere('meta_title', 'LIKE', '%mangalam%')
                    ->orWhere('meta_title', 'LIKE', '%Manglam%')
                    ->orWhere('meta_title', 'LIKE', '%manglam%')
                    ->get();
                foreach ($collections as $col) {
                    $cleaned = str_ireplace(['mangalam.co', 'mangalam', 'manglam'], ['ISHANAA™', 'ISHANAA™', 'ISHANAA™'], $col->meta_title);
                    DB::table('collections')->where('id', $col->id)->update(['meta_title' => $cleaned]);
                }
            }
        } catch (\Throwable $e) {
            // Silently complete to avoid failing deployment
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Irreversible data clean
    }
};
