<x-guest-layout>
    <div class="glass-card rounded-[2rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">
        <!-- Shine Effect -->
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white/40 to-transparent pointer-events-none"></div>

        <div class="relative z-10">
            <!-- Logo Section -->
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('images/LogoSisconint.png') }}" alt="Logo" class="h-20 w-auto drop-shadow-lg transform hover:scale-105 transition-transform duration-300">
                <h2 class="mt-4 text-2xl font-black text-center text-gray-800 tracking-tight">
                    Crear Cuenta
                </h2>
                <p class="text-sm text-gray-600 font-medium">Únete a SISCONINT Porcino</p>
            </div>

            <x-validation-errors class="mb-6 bg-red-100/80 border border-red-200 text-red-700 p-4 rounded-xl text-sm" />

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2 pl-1">{{ __('Nombre Completo') }}</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input id="name" class="block w-full pl-10 pr-3 py-3 border-none bg-white/50 backdrop-blur-sm rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white/80 transition-all font-medium placeholder-gray-400 shadow-inner" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tu Nombre" />
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 pl-1">{{ __('Correo Electrónico') }}</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email" class="block w-full pl-10 pr-3 py-3 border-none bg-white/50 backdrop-blur-sm rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white/80 transition-all font-medium placeholder-gray-400 shadow-inner" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="tu@correo.com" />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-2 pl-1">{{ __('Teléfono') }}</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <input id="phone" class="block w-full pl-10 pr-3 py-3 border-none bg-white/50 backdrop-blur-sm rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white/80 transition-all font-medium placeholder-gray-400 shadow-inner" type="text" name="phone" :value="old('phone')" autocomplete="tel" placeholder="Opcional" />
                        </div>
                    </div>
                    <div>
                        <label for="job_title" class="block text-sm font-bold text-gray-700 mb-2 pl-1">{{ __('Cargo') }}</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="job_title" class="block w-full pl-10 pr-3 py-3 border-none bg-white/50 backdrop-blur-sm rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white/80 transition-all font-medium placeholder-gray-400 shadow-inner" type="text" name="job_title" :value="old('job_title')" autocomplete="organization-title" placeholder="Opcional" />
                        </div>
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
                        <input id="password" class="block w-full pl-10 pr-3 py-3 border-none bg-white/50 backdrop-blur-sm rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white/80 transition-all font-medium placeholder-gray-400 shadow-inner" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2 pl-1">{{ __('Confirmar Contraseña') }}</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input id="password_confirmation" class="block w-full pl-10 pr-3 py-3 border-none bg-white/50 backdrop-blur-sm rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white/80 transition-all font-medium placeholder-gray-400 shadow-inner" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <label for="terms" class="flex items-start cursor-pointer group">
                             <div class="relative flex items-center h-5 mt-0.5">
                                <input type="checkbox" name="terms" id="terms" required class="sr-only peer">
                                <div class="w-5 h-5 border-2 border-gray-300 rounded peer-checked:bg-purple-600 peer-checked:border-purple-600 transition-all"></div>
                                <svg class="w-3 h-3 text-white absolute top-1 left-1 opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div class="ms-3">
                                {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm font-bold text-purple-600 hover:text-purple-800 transition-colors">'.__('Términos de Servicio').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm font-bold text-purple-600 hover:text-purple-800 transition-colors">'.__('Política de Privacidad').'</a>',
                                ]) !!}
                            </div>
                        </label>
                    </div>
                @endif

                <button class="w-full py-3.5 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-black rounded-xl shadow-lg hover:shadow-purple-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 uppercase tracking-wider text-sm flex items-center justify-center gap-2 group mt-6">
                    {{ __('Registrarse') }}
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>

                <div class="mt-6 text-center">
                   <p class="text-sm text-gray-600">
                       ¿Ya tienes una cuenta? 
                       <a href="{{ route('login') }}" class="font-bold text-purple-600 hover:text-purple-800 transition-colors hover:underline">Inicia Sesión</a>
                   </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
