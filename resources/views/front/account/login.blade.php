@extends('layouts.app')

@section('title', 'Devotee Sign In - Mangalam')

@section('content')
<div class="min-h-[80vh] bg-[#FAF7F2] py-12 sm:py-16 flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-6">
        
        <!-- Top Sacred Icon & Brand Header -->
        <div class="text-center space-y-2">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white border border-[#EADBCC] shadow-sm mb-1 text-2xl text-[#D38928]">
                🪔
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight">
                Devotee Sign In
            </h1>
            <p class="text-xs sm:text-sm text-gray-600">
                Access your sacred orders, delivery addresses, and devotee rewards.
            </p>
        </div>

        <!-- Notification Alerts -->
        @if(session('success'))
            <div class="p-4 rounded-[12px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-medium flex items-center gap-2">
                <span>✓</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="p-4 rounded-[12px] bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm font-medium space-y-1">
                @foreach($errors->all() as $error)
                    <div class="flex items-center gap-1.5">
                        <span>⚠</span>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Main Card Container -->
        <div class="bg-white rounded-[20px] border border-[#EADBCC] shadow-lg p-6 sm:p-8 space-y-6">
            
            <!-- 1-Click Demo Login Banner (For Instant Access) -->
            <form action="{{ route('account.demo-login') }}" method="POST">
                @csrf
                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-gradient-to-r from-[#D38928] to-[#B8741E] hover:from-[#B8741E] hover:to-[#965A15] text-white text-xs sm:text-sm font-bold rounded-[10px] shadow-sm hover:shadow-md transition-all flex items-center justify-center gap-2 font-heading cursor-pointer"
                >
                    <span>⚡ Instant 1-Click Demo Devotee Login</span>
                    <span class="text-[10px] bg-white/20 px-1.5 py-0.5 rounded uppercase">Test Mode</span>
                </button>
            </form>

            <div class="relative flex py-1 items-center">
                <div class="flex-grow border-t border-[#EADBCC]"></div>
                <span class="flex-shrink mx-3 text-gray-400 text-xs uppercase tracking-wider font-medium">Or Sign In with Email</span>
                <div class="flex-grow border-t border-[#EADBCC]"></div>
            </div>

            <!-- Login Form -->
            <form action="{{ route('account.login.submit') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1.5 font-heading">
                        Email Address or Mobile
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            name="email" 
                            id="email" 
                            required 
                            value="{{ old('email', 'devotee@mangalam.co') }}" 
                            placeholder="Enter email or 10-digit mobile"
                            class="w-full px-4 py-3 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm text-[#121212] focus:outline-none focus:border-[#D38928] focus:bg-white transition-colors"
                        >
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-bold text-gray-800 uppercase tracking-wider font-heading">
                            Password
                        </label>
                        <span class="text-[11px] text-[#D38928] hover:underline cursor-pointer" onclick="alert('Password reset link will be sent to your registered email.')">Forgot?</span>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        value="password123"
                        placeholder="••••••••"
                        class="w-full px-4 py-3 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm text-[#121212] focus:outline-none focus:border-[#D38928] focus:bg-white transition-colors"
                    >
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                        <input type="checkbox" name="remember" checked class="rounded text-[#D38928] focus:ring-[#D38928] border-gray-300">
                        <span>Keep me signed in</span>
                    </label>
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3.5 px-4 bg-[#121212] hover:bg-[#D38928] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-sm hover:shadow-md transition-all duration-200 font-heading cursor-pointer"
                >
                    Sign In to My Account ➔
                </button>
            </form>

            <!-- Sign Up Link -->
            <div class="text-center pt-2 border-t border-[#EADBCC] text-xs text-gray-600">
                <span>New to Mangalam? </span>
                <a href="{{ route('account.register') }}" class="font-bold text-[#D38928] hover:underline font-heading">
                    Create Devotee Account
                </a>
            </div>

        </div>

        <!-- Trust Badges -->
        <div class="grid grid-cols-3 gap-2 text-center text-[10px] text-gray-500 font-medium">
            <div class="p-2 bg-white/70 rounded-[10px] border border-[#EADBCC]/70">
                <span class="block text-base">🌿</span>
                <span>100% Vedic Pure</span>
            </div>
            <div class="p-2 bg-white/70 rounded-[10px] border border-[#EADBCC]/70">
                <span class="block text-base">🔒</span>
                <span>Secure 256-Bit</span>
            </div>
            <div class="p-2 bg-white/70 rounded-[10px] border border-[#EADBCC]/70">
                <span class="block text-base">📦</span>
                <span>Fast Dispatch</span>
            </div>
        </div>

    </div>
</div>
@endsection
