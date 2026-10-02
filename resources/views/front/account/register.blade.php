@extends('layouts.app')

@section('title', 'Create Devotee Account - Manglam')

@section('content')
<div class="min-h-[85vh] bg-[#FAF7F2] py-12 sm:py-16 flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full space-y-6">
        
        <!-- Top Sacred Header -->
        <div class="text-center space-y-2">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white border border-[#EADBCC] shadow-sm mb-1 text-2xl text-[#D38928]">
                🪷
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight">
                Join Manglam Parivar
            </h1>
            <p class="text-xs sm:text-sm text-gray-600">
                Create your devotee profile for personalized pooja recommendations and express checkout.
            </p>
        </div>

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

        <!-- Card Container -->
        <div class="bg-white rounded-[20px] border border-[#EADBCC] shadow-lg p-6 sm:p-8 space-y-6">
            
            <form action="{{ route('account.register.submit') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="name" class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1.5 font-heading">
                        Full Name / Devotee Name *
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        required 
                        value="{{ old('name') }}" 
                        placeholder="e.g. Rameshwar Sharma"
                        class="w-full px-4 py-3 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm text-[#121212] focus:outline-none focus:border-[#D38928] focus:bg-white transition-colors"
                    >
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1.5 font-heading">
                            Email Address *
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            required 
                            value="{{ old('email') }}" 
                            placeholder="name@example.com"
                            class="w-full px-4 py-3 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm text-[#121212] focus:outline-none focus:border-[#D38928] focus:bg-white transition-colors"
                        >
                    </div>

                    <div>
                        <label for="phone" class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1.5 font-heading">
                            Mobile Number *
                        </label>
                        <input 
                            type="tel" 
                            name="phone" 
                            id="phone" 
                            required 
                            value="{{ old('phone') }}" 
                            placeholder="10-digit mobile"
                            class="w-full px-4 py-3 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm text-[#121212] focus:outline-none focus:border-[#D38928] focus:bg-white transition-colors"
                        >
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1.5 font-heading">
                            Password *
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            required 
                            placeholder="Min. 6 characters"
                            class="w-full px-4 py-3 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm text-[#121212] focus:outline-none focus:border-[#D38928] focus:bg-white transition-colors"
                        >
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1.5 font-heading">
                            Confirm Password *
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            required 
                            placeholder="Re-enter password"
                            class="w-full px-4 py-3 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm text-[#121212] focus:outline-none focus:border-[#D38928] focus:bg-white transition-colors"
                        >
                    </div>
                </div>

                <div class="p-3 bg-[#FAF7F2] rounded-[10px] border border-[#EADBCC] text-[11px] text-gray-600 leading-relaxed">
                    By registering, you agree to receive sacred delivery updates, aarti vidhi tips, and auspicious festival offers via Email and WhatsApp.
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3.5 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-sm hover:shadow-md transition-all duration-200 font-heading cursor-pointer"
                >
                    Create Devotee Account ➔
                </button>
            </form>

            <div class="text-center pt-2 border-t border-[#EADBCC] text-xs text-gray-600">
                <span>Already have a devotee account? </span>
                <a href="{{ route('account.login') }}" class="font-bold text-[#D38928] hover:underline font-heading">
                    Sign In
                </a>
            </div>

        </div>

    </div>
</div>
@endsection
