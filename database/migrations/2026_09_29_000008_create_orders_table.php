<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->json('shipping_address');
            $table->json('billing_address')->nullable();
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount_amount', 10, 2)->default(0.00);
            $table->string('coupon_code')->nullable();
            $table->decimal('shipping_fee', 10, 2)->default(0.00);
            $table->decimal('tax_amount', 10, 2)->default(0.00);
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_method')->default('cod'); // razorpay, phonepe, cod, upi
            $table->string('payment_status')->default('pending')->index(); // pending, paid, failed, refunded
            $table->string('payment_id')->nullable(); // Gateway transaction id
            $table->string('order_status')->default('pending')->index(); // pending, processing, shipped, delivered, cancelled
            $table->string('tracking_number')->nullable();
            $table->string('courier_name')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};