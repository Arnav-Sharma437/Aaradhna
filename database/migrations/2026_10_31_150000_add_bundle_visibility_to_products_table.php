<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'show_in_trial_bundle')) {
                $table->boolean('show_in_trial_bundle')->default(false)->after('is_bestseller')->index();
            }
            if (!Schema::hasColumn('products', 'show_in_buy2get1_bundle')) {
                $table->boolean('show_in_buy2get1_bundle')->default(false)->after('show_in_trial_bundle')->index();
            }
        });

        // Ensure collections for both bundles exist
        try {
            \App\Models\Collection::firstOrCreate(
                ['slug' => 'trial-packs'],
                [
                    'title' => 'Buy 5 Trial Packs @ ₹799',
                    'description' => 'Festive custom box: pick any 5 sacred trial packs at just ₹799.',
                    'is_active' => true,
                ]
            );
            \App\Models\Collection::firstOrCreate(
                ['slug' => 'buy2get1'],
                [
                    'title' => 'Buy 2 Get 1 FREE',
                    'description' => 'Select any 3 refill packs: buy 2 get 1 100% free + free gift.',
                    'is_active' => true,
                ]
            );
        } catch (\Throwable $e) {
            // Ignore if collections table not ready
        }
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'show_in_trial_bundle')) {
                $table->dropColumn('show_in_trial_bundle');
            }
            if (Schema::hasColumn('products', 'show_in_buy2get1_bundle')) {
                $table->dropColumn('show_in_buy2get1_bundle');
            }
        });
    }
};
