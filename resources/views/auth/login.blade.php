<x-guest-layout>
    <div class="glass-card rounded-[2rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">
        <!-- Shine Effect -->
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white/40 to-transparent pointer-events-none"></div>

        <div class="relative z-10">
            <!-- Logo Section -->
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('images/LogoSisconint.png') }}" alt="Logo" class="h-24 w-auto drop-shadow-lg transform hover:scale-105 transition-transform duration-300">
                <h2 class="mt-4 text-2xl font-black text-center text-gray-800 tracking-tight">
                    Bienvenido a <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">SISCONINT</span>
                </h2>
                <p class="text-sm text-gray-600 font-medium">Gestión Porcina Inteligente</p>
            </div>

            <x-validation-errors class="mb-6 bg-red-100/80 border border-red-200 text-red-700 p-4 rounded-xl text-sm" />

            @session('status')
                <div class="mb-6 font-medium text-sm text-emerald-600 bg-emerald-100/80 border border-emerald-200 p-4 rounded-xl">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 pl-1">{{ __('Correo Electrónico') }}</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email" class="block w-full pl-10 pr-3 py-3 border-none bg-white/50 backdrop-blur-sm rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white/80 transition-all font-medium placeholder-gray-400 shadow-inner" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="tu@correo.com" />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2 pl-1">{{ __('Contraseña') }}</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" class="block w-full pl-10 pr-3 py-3 border-none bg-white/50 backdrop-blur-sm rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white/80 transition-all font-medium placeholder-gray-400 shadow-inner" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center cursor-pointer group">
                        <div class="relative">
                            <input type="checkbox" id="remember_me" name="remember" class="sr-only peer">
                            <div class="w-5 h-5 border-2 border-gray-300 rounded peer-checked:bg-purple-600 peer-checked:border-purple-600 transition-all"></div>
                            <svg class="w-3 h-3 text-white absolute top-1 left-1 opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="ms-2 text-sm text-gray-600 font-medium group-hover:text-gray-800 transition-colors">{{ __('Recordarme') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-bold text-purple-600 hover:text-purple-800 transition-colors" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>

                <button class="w-full py-3.5 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-black rounded-xl shadow-lg hover:shadow-purple-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 uppercase tracking-wider text-sm flex items-center justify-center gap-2 group">
                    {{ __('Iniciar Sesión') }}
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
                
                <div class="mt-6 text-center">
                   <p class="text-sm text-gray-600">
                       ¿No tienes una cuenta? 
                       <a href="{{ route('register') }}" class="font-bold text-purple-600 hover:text-purple-800 transition-colors hover:underline">Regístrate aquí</a>
                   </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
