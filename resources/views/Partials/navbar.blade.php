
<nav class="sticky top-0 z-50  backdrop-blur-sm border-b  shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="" class="flex items-center">
                    <img src="{{ asset('images/logbacPlus.svg') }}" alt="Logo Bac Plus" class="h-10 w-auto">

                </a>
            </div>


            <!-- Barre de recherche -->
            <div class="hidden md:block flex-1 max-w-xl mx-4">
                <form method="GET" action="" class="relative group">
                    <input
                        type="text"
                        name="query"
                        placeholder="Rechercher un établissement, une formation..."
                        class="w-full bg-gray-700 text-white border border-gray-600 rounded-full py-2 pl-4 pr-10 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-300"
                        value=""
                    >
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-custom-primary transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            @auth

            <!-- Actions utilisateur -->
            <div class="flex items-center space-x-3">
                <!-- Bouton de recherche mobile -->
                <button id="mobileSearchBtn" class="md:hidden p-2 rounded-full text-gray-400 hover:text-custom-primary hover:bg-gray-700 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Notifications -->
                <div class="relative">
                    <button id="notificationsBtn" class="p-2 rounded-full text-gray-400 hover:text-custom-primary hover:bg-gray-700 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- Dropdown notifications -->
                    <div id="notificationsDropdown" class="hidden absolute right-0 mt-2 w-80 bg-gray-800 border border-gray-700 rounded-lg shadow-lg z-50">
                        <div class="p-3 border-b border-gray-700 flex justify-between items-center">
                            <h3 class="text-white font-medium">Notifications</h3>
                            <a href="#" class="text-sm text-custom-primary hover:text-custom-light">Marquer tout comme lu</a>
                        </div>
                        <div class="max-h-96 overflow-y-auto">
                            <a href="#" class="block p-4 hover:bg-gray-700 border-b border-gray-700">
                                <div class="flex">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-white">Votre candidature à <span class="font-medium">ENCG Casablanca</span> a été présélectionnée</p>
                                        <p class="text-xs text-gray-400 mt-1">Il y a 2 heures</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block p-4 hover:bg-gray-700 border-b border-gray-700">
                                <div class="flex">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-white">Rappel: Le concours d'admission à <span class="font-medium">ENSA Marrakech</span> aura lieu demain</p>
                                        <p class="text-xs text-gray-400 mt-1">Il y a 5 heures</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block p-4 hover:bg-gray-700">
                                <div class="flex">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-white">Nouvelle formation disponible en <span class="font-medium">Intelligence Artificielle</span> à l'Université Mohammed VI</p>
                                        <p class="text-xs text-gray-400 mt-1">Il y a 1 jour</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-3 border-t border-gray-700 text-center">
                            <a href="#" class="text-sm text-custom-primary hover:text-custom-light">Voir toutes les notifications</a>
                        </div>
                    </div>
                </div>

                <!-- Menu utilisateur -->
                <div class="relative">
                    <button id="userMenuBtn" class="flex items-center space-x-2 focus:outline-none">
                  @if(auth()->user()?->role === 'etudiant')

                            <a href="{{route('profile')}}" class="relative">
                                <img src="https://placehold.co/100x100/e2e8f0/475569?text=m" alt="Photo de profil" class="h-8 w-8 rounded-full object-cover border-2 border-custom-primary">
                                <div class="absolute bottom-0 right-0 h-3 w-3 bg-green-500 rounded-full border-2 border-gray-800"></div>
                            </a>

                  @endif

                        <span class="hidden md:block text-white">Samir</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="hidden md:block h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-lg z-50">
                        <div class="p-3 border-b border-gray-700">
                            <p class="text-sm font-medium text-white">Samir Mehdi</p>
                            <p class="text-xs text-gray-400">samir.mehdi@email.com</p>
                        </div>
                        <div class="py-1">
                            <a href="" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Mon profil
                                </div>
                            </a>
                            <a href="" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Mes candidatures
                                </div>
                            </a>
                            <a href="" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    Favoris
                                </div>
                            </a>
                            <a href="" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Paramètres
                                </div>
                            </a>
                        </div>
                        <div class="py-1 border-t border-gray-700">
                            <a href="" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <a href="{{route('Deconnexion')}}"> Déconnexion</a>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endauth

                <!-- Menu hamburger pour mobile -->
                <button id="mobileMenuBtn" class="md:hidden p-2 rounded-full text-gray-400 hover:text-custom-primary hover:bg-gray-700 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Barre de recherche mobile (cachée par défaut) -->
    <div id="mobileSearch" class="hidden md:hidden px-4 py-3 bg-gray-800 border-t border-gray-700">
        <form method="GET" action="" class="relative">
            <input
                type="text"
                name="query"
                placeholder="Rechercher..."
                class="w-full bg-gray-700 text-white border border-gray-600 rounded-full py-2 pl-4 pr-10 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent"
                value="{{ request('query') }}"
            >
            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-custom-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Menu mobile (caché par défaut) -->
    <div id="mobileNavMenu" class="hidden md:hidden bg-gray-800 border-t border-gray-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-gray-700 text-custom-primary' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                Accueil
            </a>
            <a href="" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('schools') ? 'bg-gray-700 text-custom-primary' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                Établissements
            </a>
            <a href="{{route('filieres')}}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('programs') ? 'bg-gray-700 text-custom-primary' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                Filieres
            </a>
            <a href="" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('applications') ? 'bg-gray-700 text-custom-primary' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                Candidatures
            </a>
        </div>
    </div>
</nav>
{{--@if(auth()->user()?->role === 'admin')--}}
{{--    <div class="flex h-screen">--}}
{{--        <!-- Sidebar -->--}}
{{--        <nav class="w-1/4 max-w-xs bg-gray-800 border-r border-gray-700 p-4 space-y-2">--}}
{{--            <div class="mb-6">--}}
{{--                <a href="/home" class="text-white text-xl font-bold">--}}
{{--                    MonApp--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <a href="/home"--}}
{{--               class="block px-3 py-2 rounded-md text-sm font-medium {{ request()->is('home') ? 'bg-gray-700 text-custom-primary' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">--}}
{{--                Accueil--}}
{{--            </a>--}}

{{--            <a href="/schools"--}}
{{--               class="block px-3 py-2 rounded-md text-sm font-medium {{ request()->is('schools') ? 'bg-gray-700 text-custom-primary' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">--}}
{{--                Établissements--}}
{{--            </a>--}}

{{--            <a href="/programs"--}}
{{--               class="block px-3 py-2 rounded-md text-sm font-medium {{ request()->is('programs') ? 'bg-gray-700 text-custom-primary' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">--}}
{{--                Formations--}}
{{--            </a>--}}

{{--            <a href="/applications"--}}
{{--               class="block px-3 py-2 rounded-md text-sm font-medium {{ request()->is('applications') ? 'bg-gray-700 text-custom-primary' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">--}}
{{--                Candidatures--}}
{{--            </a>--}}
{{--        </nav>--}}

{{--        <!-- Main Content -->--}}
{{--        <main class="w-3/4 p-6 overflow-y-auto">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
{{--@endif--}}



<script>
    // Gestion des dropdowns et menus mobiles
    document.addEventListener('DOMContentLoaded', function() {
        // Menu utilisateur
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userDropdown = document.getElementById('userDropdown');

        userMenuBtn.addEventListener('click', function() {
            userDropdown.classList.toggle('hidden');
            notificationsDropdown.classList.add('hidden'); // Ferme les autres dropdowns
        });

        // Notifications
        const notificationsBtn = document.getElementById('notificationsBtn');
        const notificationsDropdown = document.getElementById('notificationsDropdown');

        notificationsBtn.addEventListener('click', function() {
            notificationsDropdown.classList.toggle('hidden');
            userDropdown.classList.add('hidden'); // Ferme les autres dropdowns
        });

        // Recherche mobile
        const mobileSearchBtn = document.getElementById('mobileSearchBtn');
        const mobileSearch = document.getElementById('mobileSearch');

        mobileSearchBtn.addEventListener('click', function() {
            mobileSearch.classList.toggle('hidden');
            mobileNavMenu.classList.add('hidden'); // Ferme le menu mobile
        });

        // Menu mobile
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileNavMenu = document.getElementById('mobileNavMenu');

        mobileMenuBtn.addEventListener('click', function() {
            mobileNavMenu.classList.toggle('hidden');
            mobileSearch.classList.add('hidden'); // Ferme la recherche mobile
        });

        // Ferme les dropdowns quand on clique ailleurs
        document.addEventListener('click', function(event) {
            if (!userMenuBtn.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.add('hidden');
            }

            if (!notificationsBtn.contains(event.target) && !notificationsDropdown.contains(event.target)) {
                notificationsDropdown.classList.add('hidden');
            }
        });

        // Animation de la barre de recherche au focus
        const searchInput = document.querySelector('input[name="query"]');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-custom-primary');
            });

            searchInput.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-custom-primary');
            });
        }
    });
</script>
