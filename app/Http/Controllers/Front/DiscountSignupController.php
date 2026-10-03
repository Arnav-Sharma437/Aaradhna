<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\DiscountSignup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiscountSignupController extends Controller
{
    /**
     * Store discount signup multi-step survey response and generate a unique 10% coupon.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^[6-9]\d{9}$/'],
            'email' => 'required|email|max:255',
            'product_interest' => 'required|string|max:255',
            'ordering_blocker' => 'required|string|max:255',
            'discovery_source' => 'required|string|max:255',
            'product_priority' => 'required|string|max:255',
        ], [
            'name.required' => 'Please enter your full name.',
            'phone.required' => 'Please enter your mobile phone number.',
            'phone.regex' => 'Please enter a valid 10-digit Indian mobile number (e.g. 9876543210).',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'product_interest.required' => 'Please select what you are looking to buy.',
            'ordering_blocker.required' => 'Please select what is stopping you from ordering today.',
            'discovery_source.required' => 'Please select how you found us.',
            'product_priority.required' => 'Please select what matters most to you in pooja products.',
        ]);

        $normalizedEmail = strtolower(trim($validated['email']));

        try {
            DB::beginTransaction();

            // Check if this email has already registered
            $existingSignup = DiscountSignup::where('email', $normalizedEmail)->first();

            if ($existingSignup) {
                // If a coupon was already created for this email
                $existingCoupon = $existingSignup->coupon ?? Coupon::where('code', $existingSignup->generated_coupon_code)->first();

                if ($existingCoupon && $existingCoupon->is_active && ($existingCoupon->usage_limit === null || $existingCoupon->used_count < $existingCoupon->usage_limit)) {
                    DB::commit();
                    return response()->json([
                        'success' => true,
                        'is_existing' => true,
                        'message' => 'Welcome back! Your 10% OFF coupon is active and ready to use.',
                        'coupon_code' => $existingCoupon->code,
                        'discount_percent' => 10,
                    ]);
                }

                DB::commit();
                return response()->json([
                    'success' => true,
                    'is_existing' => true,
                    'is_used' => true,
                    'message' => 'You have already claimed your one-time 10% discount coupon with this email.',
                    'coupon_code' => $existingSignup->generated_coupon_code,
                    'discount_percent' => 10,
                ]);
            }

            // Generate unique 10% coupon code: MANGLAM10 + 4 random uppercase alphanumeric characters
            do {
                $uniqueSuffix = strtoupper(Str::random(4));
                $generatedCode = 'MANGLAM10' . $uniqueSuffix;
            } while (Coupon::where('code', $generatedCode)->exists());

            // Create single-use 10% percentage discount coupon in coupons table
            $coupon = Coupon::create([
                'code' => $generatedCode,
                'type' => 'percentage',
                'value' => 10.00,
                'min_order_amount' => null,
                'max_discount_amount' => null,
                'usage_limit' => 1,
                'used_count' => 0,
                'valid_from' => now(),
                'valid_until' => now()->addDays(90),
                'is_active' => true,
            ]);

            // Save signup response in discount_signups table
            $signup = DiscountSignup::create([
                'name' => trim($validated['name']),
                'phone' => trim($validated['phone']),
                'email' => $normalizedEmail,
                'product_interest' => $validated['product_interest'],
                'ordering_blocker' => $validated['ordering_blocker'],
                'discovery_source' => $validated['discovery_source'],
                'product_priority' => $validated['product_priority'],
                'generated_coupon_code' => $coupon->code,
                'coupon_id' => $coupon->id,
                'coupon_status' => 'issued',
                'ip_address' => $request->ip(),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'is_existing' => false,
                'message' => 'Thank you for joining the Manglam family! Your 10% OFF coupon is ready.',
                'coupon_code' => $coupon->code,
                'discount_percent' => 10,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while generating your discount: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Validate coupon code server-side for cart / checkout.
     */
    public function validateCoupon(Request $request): JsonResponse
    {
        $code = strtoupper(trim($request->input('code', '')));
        $subtotal = floatval($request->input('subtotal', 0));

        if (empty($code)) {
            return response()->json([
                'valid' => false,
                'message' => 'Please enter a coupon code.',
            ], 422);
        }

        $coupon = Coupon::where('code', $code)->first();

        if (!$coupon) {
            return response()->json([
                'valid' => false,
                'message' => 'Invalid or unknown coupon code.',
            ], 404);
        }

        if (!$coupon->is_active) {
            return response()->json([
                'valid' => false,
                'message' => 'This coupon has been deactivated or expired.',
            ], 422);
        }

        if ($coupon->valid_from && now()->lt($coupon->valid_from)) {
            return response()->json([
                'valid' => false,
                'message' => 'This coupon is not active yet.',
            ], 422);
        }

        if ($coupon->valid_until && now()->gt($coupon->valid_until)) {
            return response()->json([
                'valid' => false,
                'message' => 'This coupon has expired.',
            ], 422);
        }

        if ($coupon->usage_limit !== null && $coupon->used_count >= $coupon->usage_limit) {
            return response()->json([
                'valid' => false,
                'message' => 'This single-use coupon has already been redeemed.',
            ], 422);
        }

        if ($coupon->min_order_amount !== null && $subtotal > 0 && $subtotal < $coupon->min_order_amount) {
            return response()->json([
                'valid' => false,
                'message' => "Minimum order amount for this coupon is ₹{$coupon->min_order_amount}.",
            ], 422);
        }

        // Calculate discount preview
        $discountAmount = 0;
        if ($coupon->type === 'percentage') {
            $discountAmount = $subtotal > 0 ? round(($subtotal * $coupon->value) / 100, 2) : 0;
            if ($coupon->max_discount_amount !== null && $discountAmount > $coupon->max_discount_amount) {
                $discountAmount = $coupon->max_discount_amount;
            }
        } elseif ($coupon->type === 'fixed_amount') {
            $discountAmount = min($subtotal, $coupon->value);
        }

        return response()->json([
            'valid' => true,
            'message' => "Coupon '{$coupon->code}' applied successfully!",
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => floatval($coupon->value),
            'discount_amount' => $discountAmount,
            'discount_text' => $coupon->type === 'percentage' ? "{$coupon->value}% OFF" : "₹{$coupon->value} OFF",
        ]);
    }
}
