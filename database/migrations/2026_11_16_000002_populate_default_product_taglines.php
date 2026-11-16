<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('products', 'tagline')) {
            $products = DB::table('products')->whereNull('tagline')->get();
            foreach ($products as $p) {
                $slug = strtolower($p->slug ?? '');
                $title = strtolower($p->title ?? '');

                // If this is the 'swah' product that the admin explicitly deleted
                if (str_contains($slug, 'swah') || str_contains($title, 'swah')) {
                    DB::table('products')->where('id', $p->id)->update(['tagline' => '']);
                    continue;
                }

                if (str_contains($slug, 'cone')) {
                    $tagline = '30 Sticks. No Bamboo ~ One stick fills the room with clean, real fragrance.';
                } elseif (str_contains($slug, 'cup')) {
                    $tagline = '12 Sambrani Cups. 100% Charcoal Free ~ One cup fills your temple with clean, real fragrance.';
                } elseif (str_contains($slug, '100')) {
                    $tagline = '100 Sticks. No Bamboo ~ One stick fills the room with clean, real fragrance.';
                } elseif (str_contains($slug, '240') || str_contains($slug, 'six')) {
                    $tagline = '240 Sticks. No Bamboo ~ One stick fills the room with clean, real fragrance.';
                } else {
                    $tagline = '40 Sticks. No Bamboo ~ One stick fills the room with clean, real fragrance.';
                }

                DB::table('products')->where('id', $p->id)->update(['tagline' => $tagline]);
            }
        }
    }

    public function down(): void
    {
        // No need to reverse default values
    }
};
