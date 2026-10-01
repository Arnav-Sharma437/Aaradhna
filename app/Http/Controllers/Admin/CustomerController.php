<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of registered customers.
     */
    public function index(Request $request): View
    {
        $query = User::where('role', 'customer')
            ->withCount('orders')
            ->withSum(['orders' => fn($q) => $q->where('payment_status', 'paid')], 'total_amount')
            ->latest();

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%");
            });
        }

        $customers = $query->paginate(15)->withQueryString();
        $totalCustomers = User::where('role', 'customer')->count();
        $activeCustomers = User::where('role', 'customer')->where('is_active', true)->count();

        return view('admin.customers.index', compact('customers', 'totalCustomers', 'activeCustomers'));
    }

    /**
     * Display customer 360 profile view.
     */
    public function show(User $customer): View
    {
        $customer->load(['orders.items', 'addresses']);
        $totalSpent = $customer->orders->where('payment_status', 'paid')->sum('total_amount');

        return view('admin.customers.show', compact('customer', 'totalSpent'));
    }

    /**
     * Toggle customer active/inactive status.
     */
    public function toggleStatus(User $customer)
    {
        $customer->update([
            'is_active' => !$customer->is_active,
        ]);

        $statusText = $customer->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "Customer {$customer->name} has been {$statusText}.");
    }
}
