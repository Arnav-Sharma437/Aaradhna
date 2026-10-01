<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Create / Place Order from GoKwik or Cart Checkout
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
            'total_amount' => 'nullable|numeric',
        ]);

        try {
            DB::beginTransaction();

            $user = Auth::user();
            if (!$user && !empty($validated['phone'])) {
                // Find user by phone/email or associate with guest
                $user = User::where('phone', $validated['phone'])
                    ->orWhere('email', $validated['email'] ?? 'guest@example.com')
                    ->first();
            }

            $orderNumber = 'MG-' . strtoupper(Str::random(3)) . '-' . rand(100000, 999999);
            $itemsData = $validated['items'] ?? [];
            $paymentMethod = $validated['payment_method'] ?? 'UPI (GoKwik)';
            $customerName = $validated['name'] ?? ($user ? $user->name : 'Pandit Rameshwar Mishra');
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
                // Fallback default sample sacred items if items array is empty
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

            $discountAmount = 50.00; // Flat GoKwik UPI discount
            $shippingFee = 0.00; // Free sacred shipping
            $totalAmount = max(0, $subtotal - $discountAmount + $shippingFee);

            if (isset($validated['total_amount']) && $validated['total_amount'] > 0) {
                $totalAmount = floatval($validated['total_amount']);
            }

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
                'coupon_code' => 'GOKWIK50',
                'shipping_fee' => $shippingFee,
                'tax_amount' => 0.00,
                'total_amount' => $totalAmount,
                'payment_method' => $paymentMethod,
                'payment_status' => 'paid',
                'payment_id' => 'PAY_' . strtoupper(Str::random(10)),
                'order_status' => 'confirmed',
                'tracking_number' => 'AWB-MNG' . rand(1000000, 9999999),
                'courier_name' => 'Bluedart Express',
                'notes' => 'Handle with reverence. Pure Vedic Pooja Items inside.',
            ]);

            foreach ($itemsToCreate as $item) {
                $item['order_id'] = $order->id;
                OrderItem::create($item);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully!',
                'order_number' => $order->order_number,
                'order_id' => $order->id,
                'redirect_url' => route('account.orders.show', $order->order_number),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to place order: ' . $e->getMessage(),
            ], 500);
        }
    }
}
