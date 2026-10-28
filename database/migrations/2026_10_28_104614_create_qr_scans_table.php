<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qr_scans', function (Blueprint $table) {
            $table->id();
            
            // Privacy-compliant anonymized visitor fingerprint (SHA-256)
            $table->string('visitor_hash', 64)->index();
            
            // Marketing / Attribution metadata
            $table->string('source', 100)->default('packaging')->index();
            $table->string('campaign', 100)->nullable()->index();
            $table->string('medium', 100)->nullable();
            
            // Client device intelligence
            $table->string('device_type', 50)->nullable()->index(); // mobile, tablet, desktop, bot
            $table->string('platform', 50)->nullable();    // iOS, Android, Windows, macOS, etc.
            $table->string('browser', 50)->nullable();     // Safari, Chrome, Firefox, etc.
            $table->text('user_agent')->nullable();
            $table->string('referrer', 500)->nullable();
            
            // Timestamp of the physical scan event
            $table->timestamp('scanned_at')->useCurrent()->index();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_scans');
    }
};
