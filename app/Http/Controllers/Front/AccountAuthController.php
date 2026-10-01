<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AccountAuthController extends Controller
{
    /**
     * Show Customer Login Form
     */
    public function showLogin(): View
    {
        if (Auth::check()) {
            return redirect()->route('account.index');
        }

        return view('front.account.login');
    }

    /**
     * Handle Customer Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginInput = $request->input('email');
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $fieldType => $loginInput,
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('account.index'))
                ->with('success', 'ॐ Welcome back to your Mangalam Devotee Portal.');
        }

        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'The provided credentials do not match our sacred devotee records.']);
    }

    /**
     * Instant 1-Click Demo Login for Testing / Quick Access
     */
    public function demoLogin(Request $request)
    {
        // Find or create test customer devotee
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

        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()->route('account.index')
            ->with('success', 'ॐ Logged in successfully as Demo Devotee (Pandit Rameshwar Mishra).');
    }

    /**
     * Show Customer Registration Form
     */
    public function showRegister(): View
    {
        if (Auth::check()) {
            return redirect()->route('account.index');
        }

        return view('front.account.register');
    }

    /**
     * Handle Customer Registration
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
            'is_active' => true,
        ]);

        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()->route('account.index')
            ->with('success', 'ॐ Pranam! Your Mangalam Devotee Account has been created successfully.');
    }

    /**
     * Handle Customer Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'You have been safely signed out. May your day be filled with peace.');
    }
}
