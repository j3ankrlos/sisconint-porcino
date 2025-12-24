<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <style>
            @keyframes gradient-shift {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(5deg); }
            }
            @keyframes slide-in-up {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .gradient-bg {
                background: linear-gradient(-45deg, #ffffff, #ffe4e6, #fca5a5, #ef4444);
                background-size: 400% 400%;
                animation: gradient-shift 15s ease infinite;
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(30px) saturate(180%);
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            }
            .particle {
                position: absolute;
                border-radius: 50%;
                pointer-events: none;
            }
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            .animate-slide-in-up {
                animation: slide-in-up 0.6s ease-out forwards;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased gradient-bg min-h-screen relative overflow-x-hidden selection:bg-purple-200 selection:text-purple-900 flex items-center justify-center">
        
        <!-- Floating Particles Background -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="particle w-2 h-2 bg-white/30 top-[10%] left-[5%] animate-float" style="animation-delay: 0s;"></div>
            <div class="particle w-3 h-3 bg-white/20 top-[20%] left-[15%] animate-float" style="animation-delay: 2s;"></div>
            <div class="particle w-1.5 h-1.5 bg-white/40 top-[60%] left-[10%] animate-float" style="animation-delay: 4s;"></div>
            <div class="particle w-2.5 h-2.5 bg-white/25 top-[80%] left-[20%] animate-float" style="animation-delay: 1s;"></div>
            <div class="particle w-2 h-2 bg-white/30 top-[15%] right-[10%] animate-float" style="animation-delay: 3s;"></div>
            <div class="particle w-3 h-3 bg-white/20 top-[40%] right-[5%] animate-float" style="animation-delay: 5s;"></div>
            <div class="particle w-1.5 h-1.5 bg-white/35 top-[70%] right-[15%] animate-float" style="animation-delay: 2.5s;"></div>
        </div>

        <div class="w-full max-w-md px-6 py-4 relative z-10 animate-slide-in-up">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
