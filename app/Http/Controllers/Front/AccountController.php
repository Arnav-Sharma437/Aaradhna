<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Customer Account Dashboard / Overview
     */
    public function index(Request $request): View
    {
        $user = Auth::user();
        
        $orders = Order::where('user_id', $user->id)
            ->with(['items.product.primaryImage'])
            ->orderBy('created_at', 'desc')
            ->get();

        $recentOrders = $orders->take(3);
        $totalOrdersCount = $orders->count();
        $totalSpent = $orders->where('payment_status', 'paid')->sum('total_amount');

        $addresses = $user->addresses()->orderBy('is_default', 'desc')->get();
        $defaultAddress = $addresses->firstWhere('is_default', true) ?? $addresses->first();

        $activeTab = $request->query('tab', 'dashboard');

        // Recommended sacred products for reorder or explore
        $recommendedProducts = Product::where('status', 'active')
            ->with(['primaryImage', 'category'])
            ->take(4)
            ->get();

        return view('front.account.index', compact(
            'user',
            'orders',
            'recentOrders',
            'totalOrdersCount',
            'totalSpent',
            'addresses',
            'defaultAddress',
            'activeTab',
            'recommendedProducts'
        ));
    }

    /**
     * Update Customer Personal Information
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
        ]);

        $user->update($validated);

        return back()->with('success', 'Your devotee profile details have been updated successfully.');
    }

    /**
     * Update Customer Password
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Your password has been changed securely.');
    }

    /**
     * Display Single Order Detail Page
     */
    public function orderDetail(string $orderNumber): View
    {
        $user = Auth::user();

        $order = Order::where('order_number', $orderNumber)
            ->where(function ($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->orWhere('customer_email', $user->email);
            })
            ->with(['items.product.primaryImage'])
            ->firstOrFail();

        return view('front.account.orders.show', compact('order', 'user'));
    }

    /**
     * Store New Customer Address
     */
    public function storeAddress(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'address_type' => 'required|in:shipping,billing,home,temple,office',
            'first_name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'phone' => 'required|string|max:20',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'landmark' => 'nullable|string|max:100',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
            'country' => 'nullable|string|max:50',
            'is_default' => 'nullable|boolean',
        ]);

        $isDefault = $request->boolean('is_default');

        if ($isDefault || $user->addresses()->count() === 0) {
            $user->addresses()->update(['is_default' => false]);
            $isDefault = true;
        }

        $validated['country'] = $validated['country'] ?? 'India';
        $validated['is_default'] = $isDefault;

        $user->addresses()->create($validated);

        return redirect()->route('account.index', ['tab' => 'addresses'])
            ->with('success', 'Sacred delivery address added successfully.');
    }

    /**
     * Update Existing Customer Address
     */
    public function updateAddress(Request $request, int $id)
    {
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);

        $validated = $request->validate([
            'address_type' => 'required|in:shipping,billing,home,temple,office',
            'first_name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'phone' => 'required|string|max:20',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'landmark' => 'nullable|string|max:100',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
            'is_default' => 'nullable|boolean',
        ]);

        if ($request->boolean('is_default')) {
            $user->addresses()->where('id', '!=', $id)->update(['is_default' => false]);
            $validated['is_default'] = true;
        }

        $address->update($validated);

        return redirect()->route('account.index', ['tab' => 'addresses'])
            ->with('success', 'Address updated successfully.');
    }

    /**
     * Delete Customer Address
     */
    public function deleteAddress(int $id)
    {
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);

        $wasDefault = $address->is_default;
        $address->delete();

        if ($wasDefault) {
            $firstAddress = $user->addresses()->first();
            if ($firstAddress) {
                $firstAddress->update(['is_default' => true]);
            }
        }

        return redirect()->route('account.index', ['tab' => 'addresses'])
            ->with('success', 'Address removed successfully.');
    }

    /**
     * Set Address as Default
     */
    public function setDefaultAddress(int $id)
    {
        $user = Auth::user();
        $user->addresses()->update(['is_default' => false]);
        $user->addresses()->where('id', $id)->update(['is_default' => true]);

        return redirect()->route('account.index', ['tab' => 'addresses'])
            ->with('success', 'Primary default address updated.');
    }
}
