<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-white font-bold text-xl">Bac+</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @if(Auth::check() && Auth::user()->role === 'etudiant')
                            <a href="{{ route('student.recommendations') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Recommandations</a>
                            <a href="{{ route('student.favorites') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Favoris</a>
                        @endif
                        <a href="{{ route('Domaines') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Domaines</a>
                        <a href="{{ route('Etablissements') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Établissements</a>
                        <a href="{{ route('home') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @guest
                        <a href="{{ route('login') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Connexion</a>
                        <a href="{{ route('register') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Inscription</a>
                    @else
                        <div class="ml-3 relative">
                            <div class="flex items-center">
                                <span class="text-gray-300 mr-4">{{ Auth::user()->name }}</span>
                                <form method="POST" action="{{ route('Deconnexion') }}">
                                    @csrf
                                    <button type="submit"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <button type="button"
                    class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @if(Auth::check() && Auth::user()->role === 'etudiant')
                <a href="{{ route('student.recommendations') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Recommandations</a>
                <a href="{{ route('student.favorites') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Favoris</a>
            @endif
            <a href="{{ route('Domaines') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Domaines</a>
            <a href="{{ route('Etablissements') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Établissements</a>
            <a href="{{ route('home') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Accueil</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            @guest
                <div class="px-2 space-y-1">
                    <a href="{{ route('login') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Connexion</a>
                    <a href="{{ route('register') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Inscription</a>
                </div>
            @else
                <div class="px-2 space-y-1">
                    <div class="text-gray-300 px-3 py-2 text-base font-medium">{{ Auth::user()->name }}</div>
                    <form method="POST" action="{{ route('Deconnexion') }}">
                        @csrf
                        <button type="submit"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white block w-full text-left px-3 py-2 rounded-md text-base font-medium">
                            Déconnexion
                        </button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        // Toggle mobile menu
        document.querySelector('button[aria-controls="mobile-menu"]').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
        });
    </script>
@endpush