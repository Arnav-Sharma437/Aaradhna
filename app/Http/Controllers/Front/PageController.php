<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the About Us Page
     */
    public function about()
    {
        return view('front.pages.about');
    }

    /**
     * Display the Contact Us Page
     */
    public function contact()
    {
        return view('front.pages.contact');
    }

    /**
     * Handle Contact Form Submission
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'inquiry_type' => 'required|string|max:50',
            'message' => 'required|string|max:2000',
        ]);

        return back()->with('success_message', 'ॐ नमः शिवाय। Your sacred message has been received at Mangalam Seva Kendra. Our team will get in touch with you shortly.');
    }

    /**
     * Display Policy Pages (Privacy, Terms, Shipping, Refund)
     */
    public function policy(string $slug)
    {
        $titles = [
            'privacy-policy' => 'Privacy Policy',
            'terms-of-service' => 'Terms of Service',
            'shipping-policy' => 'Shipping & Delivery Policy',
            'refund-policy' => 'Refund & Cancellation Policy',
        ];

        $title = $titles[$slug] ?? ucwords(str_replace('-', ' ', $slug));

        return view('front.pages.policy', compact('slug', 'title'));
    }
}
