<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\DiscountSignup;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class DiscountSignupController extends Controller
{
    /**
     * Ensure table exists before querying
     */
    protected function ensureTableExists(): void
    {
        try {
            if (!Schema::hasTable('discount_signups')) {
                Schema::create('discount_signups', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
                    $table->string('phone', 20);
                    $table->string('email')->index();
                    $table->string('product_interest');
                    $table->string('ordering_blocker');
                    $table->string('discovery_source');
                    $table->string('product_priority');
                    $table->string('generated_coupon_code')->index();
                    $table->unsignedBigInteger('coupon_id')->nullable();
                    $table->string('coupon_status')->default('issued')->index();
                    $table->string('ip_address', 45)->nullable();
                    $table->timestamps();
                });
            }
        } catch (\Throwable $e) {
            // Ignore
        }
    }

    /**
     * Display a listing of discount signups with search, filters, and summary metrics.
     */
    public function index(Request $request): View
    {
        $this->ensureTableExists();
        $query = DiscountSignup::with('coupon')->latest();

        // 1. Search Query
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhere('generated_coupon_code', 'LIKE', "%{$search}%");
            });
        }

        // 2. Status Filter ('all', 'issued', 'used')
        if ($status = $request->input('status')) {
            if (in_array($status, ['issued', 'used'])) {
                $query->where('coupon_status', $status);
            }
        }

        // 3. Product Interest Filter
        if ($interest = $request->input('product_interest')) {
            $query->where('product_interest', $interest);
        }

        // 4. Discovery Source Filter
        if ($source = $request->input('discovery_source')) {
            $query->where('discovery_source', $source);
        }

        $signups = $query->paginate(15)->withQueryString();

        // Metrics Summary
        $totalSignups = DiscountSignup::count();
        $couponsIssued = DiscountSignup::where('coupon_status', 'issued')->count();
        $couponsUsed = DiscountSignup::where('coupon_status', 'used')->count();
        $couponsAvailable = Coupon::where('code', 'LIKE', 'MANGLAM10%')
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('usage_limit')
                  ->orWhereColumn('used_count', '<', 'usage_limit');
            })->count();

        // Distinct options for filter dropdowns
        $interestsList = DiscountSignup::distinct()->pluck('product_interest')->filter();
        $sourcesList = DiscountSignup::distinct()->pluck('discovery_source')->filter();

        return view('admin.discount_signups.index', compact(
            'signups',
            'totalSignups',
            'couponsIssued',
            'couponsUsed',
            'couponsAvailable',
            'interestsList',
            'sourcesList'
        ));
    }

    /**
     * Delete a discount signup record.
     */
    public function destroy(DiscountSignup $discountSignup)
    {
        $email = $discountSignup->email;
        $discountSignup->delete();

        return redirect()->route('admin.discount-signups.index')
            ->with('success', "Signup record for '{$email}' has been deleted.");
    }
}
