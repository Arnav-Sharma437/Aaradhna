<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#121212]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Manglam.co™</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-body text-[#1E1E1E] antialiased bg-[#121212] flex items-center justify-center p-4 selection:bg-[#D38928] selection:text-white">
    
    <div class="w-full max-w-md">
        
        <!-- Brand Header / Logo -->
        <div class="text-center mb-8 space-y-3">
            <div class="inline-flex items-center justify-center p-3.5 rounded-[16px] bg-white shadow-2xl border border-white/20 mb-2">
                <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="Manglam Logo" class="h-10 w-auto object-contain">
            </div>
            <h1 class="text-2xl sm:text-3xl font-black font-heading tracking-tight text-white">
                Manglam Admin
            </h1>
            <p class="text-xs sm:text-sm text-white/60">
                Authorized administrative portal &amp; store controls
            </p>
        </div>

        <!-- Login Card -->
        <div class="bg-[#1C1C1C] border border-white/10 rounded-[24px] p-6 sm:p-8 shadow-2xl space-y-6">
            
            <!-- Error Flash -->
            @if(session('error'))
                <div class="p-3.5 rounded-[12px] bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs font-semibold flex items-center space-x-2">
                    <span>⚠️</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if(session('success'))
                <div class="p-3.5 rounded-[12px] bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-semibold flex items-center space-x-2">
                    <span>✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
                @csrf

                <!-- Email Input -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-white/80 font-heading">
                        Admin Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', 'admin@manglam.co') }}" 
                        required 
                        autofocus
                        class="w-full px-4 py-3 bg-black/50 border {{ $errors->has('email') ? 'border-rose-500' : 'border-white/15' }} focus:border-[#D38928] rounded-[12px] text-sm text-white placeholder-white/30 focus:outline-none transition-colors"
                        placeholder="admin@manglam.co"
                    >
                    @error('email')
                        <p class="text-[11px] font-bold text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-white/80 font-heading">
                        Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 bg-black/50 border {{ $errors->has('password') ? 'border-rose-500' : 'border-white/15' }} focus:border-[#D38928] rounded-[12px] text-sm text-white placeholder-white/30 focus:outline-none transition-colors pr-10"
                            placeholder="••••••••"
                        >
                    </div>
                    @error('password')
                        <p class="text-[11px] font-bold text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Security notice -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center space-x-2 text-xs text-white/70 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            id="remember" 
                            class="w-4 h-4 rounded-[4px] bg-black/50 border-white/20 text-[#D38928] focus:ring-0 focus:ring-offset-0 cursor-pointer"
                        >
                        <span>Remember session</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button 
                        type="submit" 
                        class="w-full py-3.5 px-4 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white font-bold text-xs sm:text-sm uppercase tracking-widest rounded-[12px] shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 font-heading cursor-pointer focus:outline-none"
                    >
                        Sign In to Console
                    </button>
                </div>

            </form>

        </div>

        <!-- Back to Storefront Link -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-xs text-white/50 hover:text-[#D38928] transition-colors">
                ← Return to Manglam Storefront
            </a>
        </div>

    </div>

</body>
</html>
