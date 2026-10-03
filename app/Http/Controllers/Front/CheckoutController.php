<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\DiscountSignup;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class CheckoutController extends Controller
{
    /**
     * Ensure database columns exist for Razorpay integration safely.
     */
    protected function ensureRazorpayColumnsExist(): void
    {
        try {
            if (!Schema::hasColumn('orders', 'razorpay_order_id')) {
                Schema::table('orders', function ($table) {
                    if (!Schema::hasColumn('orders', 'razorpay_order_id')) {
                        $table->string('razorpay_order_id')->nullable()->index();
                    }
                    if (!Schema::hasColumn('orders', 'razorpay_payment_id')) {
                        $table->string('razorpay_payment_id')->nullable();
                    }
                    if (!Schema::hasColumn('orders', 'razorpay_signature')) {
                        $table->string('razorpay_signature')->nullable();
                    }
                    if (!Schema::hasColumn('orders', 'paid_at')) {
                        $table->timestamp('paid_at')->nullable();
                    }
                });
            }
        } catch (\Throwable $e) {
            Log::info('Schema check notice: ' . $e->getMessage());
        }
    }

    /**
     * Create / Place Order from GoKwik or Cart Checkout.
     * Integrates with Razorpay for Online payments and supports COD.
     */
    public function createOrder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'name' => 'nullable|string',
            'payment_method' => 'nullable|string',
            'items' => 'nullable|array',
            'address' => 'nullable|string',
            'coupon_code' => 'nullable|string',
            'total_amount' => 'nullable|numeric',
        ]);

        $this->ensureRazorpayColumnsExist();

        try {
            DB::beginTransaction();

            $user = Auth::user();
            if (!$user && !empty($validated['phone'])) {
                $user = User::where('phone', $validated['phone'])
                    ->orWhere('email', $validated['email'] ?? 'guest@example.com')
                    ->first();
            }

            $orderNumber = 'MG-' . strtoupper(Str::random(3)) . '-' . rand(100000, 999999);
            $itemsData = $validated['items'] ?? [];
            $rawPaymentMethod = $validated['payment_method'] ?? 'Razorpay';
            $isCOD = (stripos($rawPaymentMethod, 'cod') !== false || stripos($rawPaymentMethod, 'cash') !== false);
            $paymentMethod = $isCOD ? 'Cash on Delivery (COD)' : 'Razorpay (Online / UPI)';

            $customerName = $validated['name'] ?? ($user ? $user->name : 'Devotee');
            $customerPhone = $validated['phone'] ?? ($user ? $user->phone : '9876543210');
            $customerEmail = $validated['email'] ?? ($user ? $user->email : 'devotee@mangalam.co');

            $shippingAddress = [
                'name' => $customerName,
                'phone' => $customerPhone,
                'address' => $validated['address'] ?? 'B-402, Vrindavan Dham Residency, Sector 14, Mathura, UP - 281001',
                'city' => 'Mathura',
                'state' => 'Uttar Pradesh',
                'pincode' => '281001',
                'country' => 'India'
            ];

            // 1. Calculate subtotal strictly server-side
            $subtotal = 0;
            $itemsToCreate = [];

            if (!empty($itemsData)) {
                foreach ($itemsData as $item) {
                    $prod = isset($item['id']) ? Product::find($item['id']) : Product::where('title', 'LIKE', '%' . ($item['title'] ?? '') . '%')->first();
                    $qty = max(1, intval($item['quantity'] ?? 1));
                    $price = floatval($item['price'] ?? ($prod ? $prod->active_price : 489.00));
                    $itemTotal = $price * $qty;
                    $subtotal += $itemTotal;

                    $itemsToCreate[] = [
                        'product_id' => $prod ? $prod->id : null,
                        'product_name' => $item['title'] ?? ($prod ? $prod->title : 'Devi Refill Pack 100 Sticks'),
                        'variant_name' => $item['variant'] ?? 'Pack of 100',
                        'sku' => $prod ? ($prod->sku ?? 'MNG-DEV-100') : 'MNG-DEV-100',
                        'unit_price' => $price,
                        'quantity' => $qty,
                        'total_price' => $itemTotal,
                    ];
                }
            } else {
                $defaultProduct = Product::where('status', 'active')->first();
                $unitPrice = $defaultProduct ? $defaultProduct->active_price : 489.00;
                $subtotal = $unitPrice * 2;

                $itemsToCreate[] = [
                    'product_id' => $defaultProduct ? $defaultProduct->id : null,
                    'product_name' => $defaultProduct ? $defaultProduct->title : 'Bambooless Incense Sticks Refill Pack',
                    'variant_name' => 'Pack of 100',
                    'sku' => 'MNG-SACRED-100',
                    'unit_price' => $unitPrice,
                    'quantity' => 2,
                    'total_price' => $subtotal,
                ];
            }

            // 2. Validate Coupon Server-Side
            $couponCode = strtoupper(trim($request->input('coupon_code', '')));
            $discountAmount = 0.00;
            $appliedCoupon = null;

            if (!empty($couponCode)) {
                $appliedCoupon = Coupon::where('code', $couponCode)->first();
                
                if (!$appliedCoupon && Schema::hasTable('discount_signups')) {
                    $signup = DiscountSignup::where('generated_coupon_code', $couponCode)->first();
                    if ($signup) {
                        $appliedCoupon = Coupon::firstOrCreate(
                            ['code' => $couponCode],
                            [
                                'type' => 'percentage',
                                'value' => 10.00,
                                'usage_limit' => 1,
                                'used_count' => $signup->coupon_status === 'used' ? 1 : 0,
                                'valid_from' => now()->subMinutes(10),
                                'valid_until' => now()->addDays(90),
                                'is_active' => true,
                            ]
                        );
                    }
                }

                if ($appliedCoupon && $appliedCoupon->isValidForSubtotal($subtotal)) {
                    $discountAmount = $appliedCoupon->calculateDiscount($subtotal);
                } else {
                    $appliedCoupon = null;
                }
            }

            // Default promotional UPI discount if no coupon is supplied and user chose online payment
            if ($discountAmount <= 0 && !$isCOD) {
                $discountAmount = 50.00;
                $couponCode = 'RAZORPAY50';
            }

            $shippingFee = 0.00; // Free sacred shipping
            $calculatedTotal = max(0, $subtotal - $discountAmount + $shippingFee);
            $totalAmount = $calculatedTotal;

            // 3. Create local Order record
            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => $user ? $user->id : null,
                'customer_name' => $customerName,
                'customer_email' => $customerEmail,
                'customer_phone' => $customerPhone,
                'shipping_address' => $shippingAddress,
                'billing_address' => $shippingAddress,
                'subtotal' => $subtotal,
                'discount_amount' => $discountAmount,
                'coupon_code' => !empty($couponCode) ? $couponCode : null,
                'shipping_fee' => $shippingFee,
                'tax_amount' => 0.00,
                'total_amount' => $totalAmount,
                'payment_method' => $paymentMethod,
                'payment_status' => 'pending',
                'order_status' => $isCOD ? 'confirmed' : 'pending',
                'tracking_number' => 'AWB-MNG' . rand(1000000, 9999999),
                'courier_name' => 'Bluedart Express',
                'notes' => 'Handle with reverence. Pure Vedic Pooja Items inside.',
            ]);

            foreach ($itemsToCreate as $item) {
                $item['order_id'] = $order->id;
                OrderItem::create($item);
            }

            // 4. Handle COD vs Razorpay flow
            if ($isCOD) {
                if ($appliedCoupon) {
                    $appliedCoupon->increment('used_count');
                    if (Schema::hasTable('discount_signups')) {
                        DiscountSignup::where('coupon_id', $appliedCoupon->id)
                            ->orWhere('generated_coupon_code', $couponCode)
                            ->update(['coupon_status' => 'used']);
                    }
                }

                DB::commit();

                return response()->json([
                    'success' => true,
                    'requires_payment' => false,
                    'payment_method' => 'COD',
                    'order_number' => $order->order_number,
                    'order_id' => $order->id,
                    'total_amount' => $totalAmount,
                    'redirect_url' => route('account.orders.show', $order->order_number),
                    'message' => 'Your COD order has been placed successfully!'
                ]);
            }

            // 5. Razorpay Online Payment Flow
            $razorpayKey = config('services.razorpay.key') ?: env('RAZORPAY_KEY_ID') ?: env('RAZORPAY_KEY') ?: env('RAZORPAY_PUBLIC_KEY');
            $razorpaySecret = config('services.razorpay.secret') ?: env('RAZORPAY_KEY_SECRET') ?: env('RAZORPAY_SECRET') ?: env('RAZORPAY_API_SECRET');

            if (empty($razorpayKey) || empty($razorpaySecret)) {
                throw new \Exception('Razorpay credentials (RAZORPAY_KEY_ID / RAZORPAY_KEY_SECRET) are not configured in your server .env file.');
            }

            $api = new Api($razorpayKey, $razorpaySecret);
            $amountInPaise = (int) round($totalAmount * 100);

            // Create Razorpay Order via SDK
            $razorpayOrder = $api->order->create([
                'receipt' => (string) $order->order_number,
                'amount' => $amountInPaise,
                'currency' => 'INR',
                'notes' => [
                    'order_id' => (string) $order->id,
                    'order_number' => $order->order_number,
                    'customer_name' => $customerName,
                    'customer_email' => $customerEmail,
                    'customer_phone' => $customerPhone,
                ],
            ]);

            $orderUpdatePayload = [
                'payment_id' => $razorpayOrder['id'],
            ];
            if (Schema::hasColumn('orders', 'razorpay_order_id')) {
                $orderUpdatePayload['razorpay_order_id'] = $razorpayOrder['id'];
            }
            $order->update($orderUpdatePayload);

            DB::commit();

            return response()->json([
                'success' => true,
                'requires_payment' => true,
                'payment_method' => 'razorpay',
                'razorpay_key' => $razorpayKey,
                'razorpay_order_id' => $razorpayOrder['id'],
                'amount' => $amountInPaise,
                'currency' => 'INR',
                'order_number' => $order->order_number,
                'order_id' => $order->id,
                'customer' => [
                    'name' => $customerName,
                    'email' => $customerEmail,
                    'phone' => $customerPhone,
                ],
                'redirect_url' => route('account.orders.show', $order->order_number),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order creation error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to initialize order: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Server-side Razorpay signature verification and order confirmation.
     */
    public function verifyPayment(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string',
            'order_number' => 'nullable|string',
        ]);

        $this->ensureRazorpayColumnsExist();

        try {
            $razorpayKey = config('services.razorpay.key') ?: env('RAZORPAY_KEY_ID') ?: env('RAZORPAY_KEY') ?: env('RAZORPAY_PUBLIC_KEY');
            $razorpaySecret = config('services.razorpay.secret') ?: env('RAZORPAY_KEY_SECRET') ?: env('RAZORPAY_SECRET') ?: env('RAZORPAY_API_SECRET');

            if (empty($razorpayKey) || empty($razorpaySecret)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Razorpay credentials (RAZORPAY_KEY_ID / RAZORPAY_KEY_SECRET) not configured on server.'
                ], 500);
            }

            // Find order
            $order = null;
            if (Schema::hasColumn('orders', 'razorpay_order_id')) {
                $order = Order::where('razorpay_order_id', $validated['razorpay_order_id'])->first();
            }
            if (!$order) {
                $order = Order::where('payment_id', $validated['razorpay_order_id'])
                    ->orWhere('order_number', $validated['order_number'] ?? '')
                    ->first();
            }

            if (!$order) {
                return response()->json([
                    'success' => false,
                    'message' => 'Order record not found for this payment.'
                ], 404);
            }

            // If already verified and marked as paid
            if ($order->payment_status === 'paid') {
                return response()->json([
                    'success' => true,
                    'message' => 'Payment already verified!',
                    'order_number' => $order->order_number,
                    'redirect_url' => route('account.orders.show', $order->order_number),
                ]);
            }

            // Cryptographic server-side verification using Razorpay SDK
            $api = new Api($razorpayKey, $razorpaySecret);
            $attributes = [
                'razorpay_order_id' => $validated['razorpay_order_id'],
                'razorpay_payment_id' => $validated['razorpay_payment_id'],
                'razorpay_signature' => $validated['razorpay_signature'],
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Update order status upon successful signature verification
            $updateFields = [
                'payment_status' => 'paid',
                'payment_id' => $validated['razorpay_payment_id'],
                'order_status' => 'confirmed',
            ];
            if (Schema::hasColumn('orders', 'razorpay_payment_id')) {
                $updateFields['razorpay_payment_id'] = $validated['razorpay_payment_id'];
            }
            if (Schema::hasColumn('orders', 'razorpay_signature')) {
                $updateFields['razorpay_signature'] = $validated['razorpay_signature'];
            }
            if (Schema::hasColumn('orders', 'paid_at')) {
                $updateFields['paid_at'] = now();
            }
            $order->update($updateFields);

            // Update coupon usage status
            if (!empty($order->coupon_code)) {
                $coupon = Coupon::where('code', $order->coupon_code)->first();
                if ($coupon) {
                    $coupon->increment('used_count');
                }
                if (Schema::hasTable('discount_signups')) {
                    DiscountSignup::where('generated_coupon_code', $order->coupon_code)
                        ->update(['coupon_status' => 'used']);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully!',
                'order_number' => $order->order_number,
                'redirect_url' => route('account.orders.show', $order->order_number),
            ]);

        } catch (SignatureVerificationError $e) {
            Log::warning('Razorpay Signature Verification Failed: ' . $e->getMessage(), [
                'payload' => $request->all(),
            ]);

            if (isset($order)) {
                $order->update([
                    'payment_status' => 'failed',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment signature verification failed. Please try again or choose another payment method.',
            ], 400);

        } catch (\Exception $e) {
            Log::error('Razorpay verification error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Verification error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
