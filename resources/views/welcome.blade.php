<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SISCONINT-PORCINO - Sistema de Gestión Porcina</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            @keyframes gradient-shift {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(5deg); }
            }
            @keyframes pulse-ring {
                0% { transform: scale(0.95); opacity: 0.7; }
                50% { transform: scale(1); opacity: 1; }
                100% { transform: scale(0.95); opacity: 0.7; }
            }
            @keyframes slide-in-left {
                from { opacity: 0; transform: translateX(-50px); }
                to { opacity: 1; transform: translateX(0); }
            }
            @keyframes slide-in-right {
                from { opacity: 0; transform: translateX(50px); }
                to { opacity: 1; transform: translateX(0); }
            }
            @keyframes fade-in {
                from { opacity: 0; }
                to { opacity: 1; }
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
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            .animate-slide-in-left {
                animation: slide-in-left 0.8s ease-out forwards;
            }
            .animate-slide-in-right {
                animation: slide-in-right 0.8s ease-out forwards;
            }
            .animate-fade-in {
                animation: fade-in 1s ease-out forwards;
            }
            .text-gradient-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            .text-gradient-emerald {
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            .particle {
                position: absolute;
                border-radius: 50%;
                pointer-events: none;
            }
        </style>
    </head>
    <body class="antialiased font-sans gradient-bg text-gray-900 selection:bg-purple-200 selection:text-purple-900 min-h-screen overflow-x-hidden w-full relative">
        
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

        <main class="min-h-screen w-full flex flex-col lg:flex-row relative z-10">
            
            <!-- LEFT SIDE: LOGO & BRANDING -->
            <div class="w-full lg:w-1/2 h-auto min-h-[50vh] lg:h-full flex items-center justify-center p-8 lg:p-16 relative overflow-hidden">
                <!-- Decorative gradient orbs -->
                <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-purple-400/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
                
                <div class="relative z-10 flex flex-col items-center animate-slide-in-left">
                    <!-- Logo Container with Glass Effect -->
                    <div class="glass-card p-12 rounded-[3rem] transform hover:scale-105 transition-all duration-500 hover:rotate-3 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-blue-500/20 rounded-full blur-2xl group-hover:blur-3xl transition-all"></div>
                            <img src="{{ asset('images/LogoSisconint.png') }}" alt="SISCONINT Logo" class="relative h-40 md:h-56 w-auto drop-shadow-2xl">
                        </div>
                    </div>
                    
                    <!-- Brand Text -->
                    <div class="mt-12 text-center space-y-4">
                        <h2 class="text-5xl md:text-7xl font-black tracking-tighter leading-none drop-shadow-2xl">
                            <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-purple-600 bg-clip-text text-transparent drop-shadow-[0_0_30px_rgba(168,85,247,0.5)]" style="text-shadow: 0 0 40px rgba(168,85,247,0.3);">SISCONINT</span>
                        </h2>
                        <div class="flex items-center gap-4 justify-center">
                            <div class="h-0.5 w-16 bg-gradient-to-r from-transparent via-purple-600 to-transparent shadow-lg"></div>
                            <p class="text-base font-black text-gray-800 tracking-[0.5em] uppercase drop-shadow-[0_2px_10px_rgba(255,255,255,0.5)]" style="text-shadow: 0 2px 20px rgba(255,255,255,0.3), 0 0 10px rgba(255,255,255,0.5);">PORCINO</p>
                            <div class="h-0.5 w-16 bg-gradient-to-r from-transparent via-purple-600 to-transparent shadow-lg"></div>
                        </div>
                        <p class="text-sm text-gray-700 font-bold tracking-wider mt-4 drop-shadow-lg" style="text-shadow: 0 2px 15px rgba(255,255,255,0.4);">Sistema de Gestión Integral</p>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE: CONTENT & ACTIONS -->
            <div class="w-full lg:w-1/2 h-auto min-h-[50vh] lg:h-full relative flex items-center justify-center p-8 lg:p-16">
                
                <div class="relative z-10 max-w-2xl w-full space-y-12 animate-slide-in-right">
                    
                    <!-- Hero Content -->
                    <div class="space-y-8">
                        <!-- Status Badge -->
                        <div class="inline-flex items-center gap-3 px-6 py-3 glass-card rounded-full group hover:scale-105 transition-transform cursor-default shadow-xl">
                            <span class="relative flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                            </span>
                            <span class="text-xs font-black uppercase tracking-[0.25em] text-gray-800 drop-shadow-sm">Sistema Activo</span>
                        </div>
                        
                        <!-- Main Heading -->
                        <div class="space-y-6">
                            <h1 class="text-6xl md:text-7xl lg:text-8xl font-black leading-[0.9] tracking-tighter">
                                <span class="block text-gray-900 drop-shadow-[0_4px_20px_rgba(255,255,255,0.5)]" style="text-shadow: 0 4px 30px rgba(255,255,255,0.4), 0 0 20px rgba(255,255,255,0.3);">Gestión</span>
                                <span class="block bg-gradient-to-r from-red-500 via-red-400 to-red-500 bg-clip-text text-transparent drop-shadow-[0_4px_20px_rgba(239,68,68,0.3)]" style="text-shadow: 0 0 40px rgba(239,68,68,0.3);">Inteligente</span>
                                <span class="block text-gray-900 drop-shadow-[0_4px_20px_rgba(255,255,255,0.5)]" style="text-shadow: 0 4px 30px rgba(255,255,255,0.4), 0 0 20px rgba(255,255,255,0.3);">Porcina</span>
                            </h1>
                            
                            <p class="text-xl md:text-2xl text-gray-800 font-bold leading-relaxed max-w-xl drop-shadow-[0_2px_15px_rgba(255,255,255,0.5)]" style="text-shadow: 0 2px 20px rgba(255,255,255,0.4), 0 0 15px rgba(255,255,255,0.2);">
                                Tecnología de vanguardia para optimizar cada aspecto de tu producción porcina.
                            </p>
                        </div>
                    </div>

                    <!-- Feature Cards -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="glass-card p-6 rounded-2xl hover:scale-105 transition-transform group shadow-2xl">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:rotate-12 transition-transform shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="font-black text-gray-800 text-sm mb-1 drop-shadow-sm">Análisis en Tiempo Real</h3>
                            <p class="text-xs text-gray-700 font-semibold">Monitoreo continuo</p>
                        </div>
                        
                        <div class="glass-card p-6 rounded-2xl hover:scale-105 transition-transform group shadow-2xl">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:rotate-12 transition-transform shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="font-black text-gray-800 text-sm mb-1 drop-shadow-sm">Automatización</h3>
                            <p class="text-xs text-gray-700 font-semibold">Procesos eficientes</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-5 pt-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="group relative flex-1 px-10 py-6 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-black rounded-2xl shadow-2xl hover:shadow-purple-500/50 transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                                    <span class="relative z-10 flex items-center justify-center gap-3 uppercase tracking-[0.2em] text-sm">
                                        Panel de Control
                                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                    </span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="group relative flex-1 px-10 py-6 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-black rounded-2xl shadow-2xl hover:shadow-purple-500/50 transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                                    <span class="relative z-10 flex items-center justify-center gap-3 uppercase tracking-[0.2em] text-sm">
                                        Iniciar Sesión
                                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                        </svg>
                                    </span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="group flex-1 px-10 py-6 glass-card text-gray-800 font-black rounded-2xl hover:scale-105 active:scale-95 transition-all duration-300 text-center uppercase tracking-[0.2em] text-sm border-2 border-white/50 hover:border-white shadow-xl">
                                        Crear Cuenta
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>

        </main>

        <!-- Footer -->
        <div class="absolute bottom-8 left-0 right-0 z-50 pointer-events-none">
            <div class="max-w-7xl mx-auto px-8 flex justify-between items-center">
                <p class="text-xs font-bold text-gray-700/80 uppercase tracking-[0.3em] drop-shadow-lg" style="text-shadow: 0 2px 10px rgba(255,255,255,0.5);">© {{ date('Y') }} SISCONINT</p>
                <div class="hidden md:flex gap-8">
                    <span class="text-[10px] font-black text-white/60 uppercase tracking-[0.4em] drop-shadow-md" style="text-shadow: 0 2px 8px rgba(0,0,0,0.4);">Innovación</span>
                    <span class="text-[10px] font-black text-white/60 uppercase tracking-[0.4em] drop-shadow-md" style="text-shadow: 0 2px 8px rgba(0,0,0,0.4);">Tecnología</span>
                    <span class="text-[10px] font-black text-white/60 uppercase tracking-[0.4em] drop-shadow-md" style="text-shadow: 0 2px 8px rgba(0,0,0,0.4);">Eficiencia</span>
                </div>
            </div>
        </div>

    </body>
</html>
