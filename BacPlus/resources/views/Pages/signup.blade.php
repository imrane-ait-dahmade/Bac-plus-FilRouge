@extends('Layouts.App')
@section('content')
    <section class="w-full min-h-screen flex flex-col md:flex-row items-center bg-gradient-to-br from-white to-[#F5F8F3]">
        <!-- Left Side - Branding -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-8 md:p-12 gap-8">
            <div class="flex flex-col items-center gap-4 max-w-md">
                <h1 class="text-4xl font-bold text-[#72AE55]" style="font-family: 'Overpass Mono', Serif;">S'inscrire</h1>
                <p class="text-lg font-medium text-gray-600 text-center" style="font-family: 'Overpass Mono', Serif;">
                    Déjà un compte?
                    <a class="text-[#72AE55] hover:text-[#5c9244] transition-colors underline" href="">
                        Se connecter
                    </a>
                </p>
            </div>
            <div class="w-full max-w-md">
                <img src="{{ asset('Images/frontSignup.svg') }}" alt="Illustration d'inscription" class="w-full h-auto drop-shadow-md">
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full md:w-1/2 flex justify-center items-center p-6 md:p-12">
            <div class="w-full max-w-md">
                <form class="bg-white rounded-2xl shadow-lg p-8 md:p-10 w-full">
                    <!-- Full Name Input -->
                    <div class="mb-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="bg-[#F5F8F3] w-full pl-10 pr-4 py-3 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#72AE55] focus:bg-white transition-all"
                                placeholder="Entrez votre nom complet"
                                required
                            >
                        </div>
                    </div>

                    <!-- Email Input -->
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="bg-[#F5F8F3] w-full pl-10 pr-4 py-3 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#72AE55] focus:bg-white transition-all"
                                placeholder="Entrez votre email"
                                required
                            >
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="bg-[#F5F8F3] w-full pl-10 pr-10 py-3 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#72AE55] focus:bg-white transition-all"
                                placeholder="Créez votre mot de passe"
                                required
                            >
                            <button
                                type="button"
                                onclick="togglePasswordVisibility('password', 'eye-icon', 'eye-off-icon')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 transition-colors"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" id="eye-icon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" id="eye-off-icon" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="bg-[#F5F8F3] w-full pl-10 pr-10 py-3 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#72AE55] focus:bg-white transition-all"
                                placeholder="Confirmez votre mot de passe"
                                required
                            >
                            <button
                                type="button"
                                onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-confirm', 'eye-off-icon-confirm')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 transition-colors"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" id="eye-icon-confirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" id="eye-off-icon-confirm" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Terms and Conditions Checkbox -->
                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded text-[#72AE55] focus:ring-[#72AE55] mr-2" required>
                            <span class="text-sm text-gray-600">
                                J'accepte les <a href="" class="text-[#72AE55] hover:text-[#5c9244] underline">conditions d'utilisation</a> et la <a href="" class="text-[#72AE55] hover:text-[#5c9244] underline">politique de confidentialité</a>
                            </span>
                        </label>
                    </div>

                    <!-- Sign Up Button -->
                    <div class="mb-8 flex justify-center">
                        <button
                            type="submit"
                            class="w-1/2 py-2.5 bg-[#72AE55] hover:bg-[#5c9244] text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 text-base"
                        >
                            S'inscrire
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="relative flex items-center justify-center mb-6">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="mx-4 text-sm text-gray-500">ou s'inscrire avec</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>

                    <!-- Social Login Buttons -->
                    <div class="flex justify-center space-x-4">
                        <a href="" class="flex items-center justify-center w-12 h-12 rounded-full bg-[#1877F2] text-white shadow-md hover:shadow-lg transition-all duration-300">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="" class="flex items-center justify-center w-12 h-12 rounded-full bg-white text-[#EA4335] shadow-md hover:shadow-lg border border-gray-200 transition-all duration-300">
                            <i class="fab fa-google text-lg"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function togglePasswordVisibility(inputId, eyeIconId, eyeOffIconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(eyeIconId);
            const eyeOffIcon = document.getElementById(eyeOffIconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }
    </script>
@endsection
