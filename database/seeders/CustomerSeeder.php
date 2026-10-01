<?php

namespace Database\Seeders;

use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'devotee@mangalam.co'],
            [
                'name' => 'Pandit Rameshwar Mishra',
                'phone' => '9876543210',
                'role' => 'customer',
                'is_active' => true,
                'password' => Hash::make('password123'),
            ]
        );

        if ($user->addresses()->count() === 0) {
            $user->addresses()->create([
                'address_type' => 'home',
                'first_name' => 'Rameshwar',
                'last_name' => 'Mishra',
                'phone' => '9876543210',
                'address_line1' => 'B-402, Vrindavan Dham Residency',
                'address_line2' => 'Near ISKCON Temple Road, Sector 14',
                'landmark' => 'Behind Shri Radha Krishna Mandir',
                'city' => 'Mathura',
                'state' => 'Uttar Pradesh',
                'postal_code' => '281001',
                'country' => 'India',
                'is_default' => true,
            ]);

            $user->addresses()->create([
                'address_type' => 'temple',
                'first_name' => 'Rameshwar',
                'last_name' => 'Mishra',
                'phone' => '9876543210',
                'address_line1' => 'Seva Kendra, Bankey Bihari Marg',
                'address_line2' => 'Gate No. 3',
                'landmark' => 'Opposite Dharamshala',
                'city' => 'Vrindavan',
                'state' => 'Uttar Pradesh',
                'postal_code' => '281121',
                'country' => 'India',
                'is_default' => false,
            ]);
        }

        if ($user->orders()->count() === 0) {
            $p1 = Product::where('slug', 'kesar-chandan')->first() ?? Product::first();
            $p2 = Product::where('slug', 'oudh')->first() ?? Product::skip(1)->first();
            $p3 = Product::where('slug', 'sandalwood-dhoop-cones')->first() ?? Product::skip(2)->first();

            // Order 1: Delivered
            $o1 = Order::create([
                'order_number' => 'MG-SAC-847291',
                'user_id' => $user->id,
                'customer_name' => $user->name,
                'customer_email' => $user->email,
                'customer_phone' => $user->phone,
                'shipping_address' => [
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'address' => 'B-402, Vrindavan Dham Residency, Sector 14, Mathura, UP - 281001',
                    'city' => 'Mathura',
                    'state' => 'Uttar Pradesh',
                    'pincode' => '281001',
                    'country' => 'India'
                ],
                'billing_address' => [
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'address' => 'B-402, Vrindavan Dham Residency, Sector 14, Mathura, UP - 281001',
                    'city' => 'Mathura',
                    'state' => 'Uttar Pradesh',
                    'pincode' => '281001',
                    'country' => 'India'
                ],
                'subtotal' => 978.00,
                'discount_amount' => 50.00,
                'coupon_code' => 'GOKWIK50',
                'shipping_fee' => 0.00,
                'tax_amount' => 0.00,
                'total_amount' => 928.00,
                'payment_method' => 'UPI (GoKwik Fast Checkout)',
                'payment_status' => 'paid',
                'payment_id' => 'PAY_GK99382104',
                'order_status' => 'delivered',
                'tracking_number' => 'AWB-BLD8492019',
                'courier_name' => 'Bluedart Express',
                'notes' => 'Delivered sacred package safely to devotee residence.',
                'created_at' => now()->subDays(5),
            ]);

            if ($p1) {
                $o1->items()->create([
                    'product_id' => $p1->id,
                    'product_name' => $p1->title,
                    'variant_name' => 'Pack of 100 Sticks + Free Stand',
                    'sku' => $p1->sku ?? 'MNG-KS-100',
                    'unit_price' => 489.00,
                    'quantity' => 2,
                    'total_price' => 978.00,
                ]);
            }

            // Order 2: In Transit / Shipped
            $o2 = Order::create([
                'order_number' => 'MG-SAC-912048',
                'user_id' => $user->id,
                'customer_name' => $user->name,
                'customer_email' => $user->email,
                'customer_phone' => $user->phone,
                'shipping_address' => [
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'address' => 'B-402, Vrindavan Dham Residency, Sector 14, Mathura, UP - 281001',
                    'city' => 'Mathura',
                    'state' => 'Uttar Pradesh',
                    'pincode' => '281001',
                    'country' => 'India'
                ],
                'billing_address' => [
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'address' => 'B-402, Vrindavan Dham Residency, Sector 14, Mathura, UP - 281001',
                    'city' => 'Mathura',
                    'state' => 'Uttar Pradesh',
                    'pincode' => '281001',
                    'country' => 'India'
                ],
                'subtotal' => 528.00,
                'discount_amount' => 50.00,
                'coupon_code' => 'AARADHNA50',
                'shipping_fee' => 0.00,
                'tax_amount' => 0.00,
                'total_amount' => 478.00,
                'payment_method' => 'UPI (Google Pay)',
                'payment_status' => 'paid',
                'payment_id' => 'PAY_UPI8402914',
                'order_status' => 'shipped',
                'tracking_number' => 'AWB-DELHIVERY48102',
                'courier_name' => 'Delhivery Express',
                'notes' => 'Out for delivery to Mathura hub.',
                'created_at' => now()->subDay(),
            ]);

            if ($p2) {
                $o2->items()->create([
                    'product_id' => $p2->id,
                    'product_name' => $p2->title,
                    'variant_name' => 'Pack of 40 Sticks',
                    'sku' => $p2->sku ?? 'MNG-OUD-40',
                    'unit_price' => 279.00,
                    'quantity' => 1,
                    'total_price' => 279.00,
                ]);
            }
            if ($p3) {
                $o2->items()->create([
                    'product_id' => $p3->id,
                    'product_name' => $p3->title,
                    'variant_name' => 'Pack of 40 Cones',
                    'sku' => $p3->sku ?? 'MNG-SDC-40',
                    'unit_price' => 249.00,
                    'quantity' => 1,
                    'total_price' => 249.00,
                ]);
            }
        }
    }
}
