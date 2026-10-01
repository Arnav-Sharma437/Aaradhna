<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of orders with search & status filters.
     */
    public function index(Request $request): View
    {
        $query = Order::with(['items', 'user'])->latest();

        // Search by order number, customer name, phone, or email
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'LIKE', "%{$search}%")
                  ->orWhere('customer_name', 'LIKE', "%{$search}%")
                  ->orWhere('customer_phone', 'LIKE', "%{$search}%")
                  ->orWhere('customer_email', 'LIKE', "%{$search}%");
            });
        }

        // Status Filter
        if ($status = $request->get('status')) {
            if ($status !== 'all') {
                $query->where('order_status', $status);
            }
        }

        // Payment Status Filter
        if ($paymentStatus = $request->get('payment_status')) {
            if ($paymentStatus !== 'all') {
                $query->where('payment_status', $paymentStatus);
            }
        }

        $orders = $query->paginate(15)->withQueryString();

        // Stats
        $totalOrders = Order::count();
        $deliveredOrders = Order::where('order_status', 'delivered')->count();
        $inTransitOrders = Order::where('order_status', 'shipped')->count();
        $confirmedOrders = Order::where('order_status', 'confirmed')->count();
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total_amount');

        return view('admin.orders.index', compact(
            'orders',
            'totalOrders',
            'deliveredOrders',
            'inTransitOrders',
            'confirmedOrders',
            'totalRevenue'
        ));
    }

    /**
     * Display detailed single order view.
     */
    public function show(Order $order): View
    {
        $order->load(['items.product.primaryImage', 'user']);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order status, tracking number & payment status.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'order_status' => 'required|in:confirmed,processing,shipped,delivered,cancelled',
            'payment_status' => 'required|in:paid,pending,failed,refunded',
            'tracking_number' => 'nullable|string|max:100',
            'courier_name' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:500',
        ]);

        $order->update($validated);

        return back()->with('success', "Order #{$order->order_number} updated successfully.");
    }

    /**
     * Delete an order.
     */
    public function destroy(Order $order)
    {
        $orderNumber = $order->order_number;
        $order->items()->delete();
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', "Order #{$orderNumber} has been removed.");
    }
}
