{{-- Navbar principale --}}
<nav class="bg-white shadow-md border-b border-gray-200">
    {{-- Container pour centrer et limiter la largeur --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- Section Gauche: Logo/Nom du Site --}}
            <div class="flex-shrink-0 flex items-center">
                {{-- *** AJOUT: Logo ou Placeholder *** --}}
                <a href="{{ asset('/')}}" class="flex items-center space-x-2">
                    {{-- Option 1: Image Logo (Remplacez par votre chemin de logo) --}}
                    <img class="block h-10 w-auto" src="{{ asset('Images/LogoBacPlus.svg') }}" alt="BacPlus Orientation Logo">
                    {{-- Option 2: Placeholder SVG si pas d'image --}}
                    {{-- <svg class="h-8 w-8 text-custom-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg> --}}

                    {{-- Nom du Site --}}

                </a>
            </div>

            {{-- Section Centrale: Liens de Navigation (Dynamique) --}}
            {{-- *** AJUSTEMENT: Réduction de l'espacement (sm:space-x-6) et ajout de whitespace-nowrap si besoin *** --}}
            <div class="hidden sm:ml-6 sm:flex sm:space-x-4 md:space-x-6"> {{-- Espacement ajusté --}}
                {{-- Liens visibles par TOUS les utilisateurs authentifiés --}}
                @auth
                    {{-- Exemple de lien commun --}}
                    {{-- <a href="{{ route('accueil') }}" class="...">Accueil</a> --}}
                @endauth

                {{-- Liens spécifiques aux ÉTUDIANTS --}}
                @auth
                    @if(Auth::user()->role === 'etudiant') {{-- Adaptez cette condition à votre système de rôles --}}
                    <a href="{{ route('Etablissements') }}" class="{{ request()->routeIs('Etablissements') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Établissements
                    </a>
                    <a href="{{ route('Etablissements') }}" class="{{ request()->routeIs('Etablissements') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Actualités
                    </a>
                    <a href="{{ route('Etablissements') }}" class="{{ request()->routeIs('Etablissements') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Sur BacPlus
                    </a>
                    <a href="{{ route('Etablissements') }}" class="{{ request()->routeIs('Etablissements') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Aide & FAQ
                    </a>
                    @endif
                @endauth

                {{-- Liens spécifiques aux ADMINISTRATEURS --}}
                @auth
                    @if(Auth::user()->role === 'admin') {{-- Adaptez cette condition à votre système de rôles --}}
                    <a href="{{ route('admin_dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Dashboard
                    </a>
                    <a href="{{ route('Etablissements') }}" class="{{ request()->routeIs('admin.etablissements.*') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Établissements
                    </a>
                    <a href="{{ url('universites') }}" class="{{ request()->routeIs('admin.actualites.*') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Universites
                    </a>
                    <a href="{{ route('Etablissements') }}" class="{{ request()->routeIs('admin.users.*') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Utilisateurs
                    </a>
                    <a href="{{ route('Etablissements') }}" class="{{ request()->routeIs('admin.domaines.*') ? 'border-custom-primary text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition whitespace-nowrap">
                        Domaines/Filières
                    </a>
                    @endif
                @endauth

                {{-- Liens visibles par les INVITÉS (non connectés) --}}
                {{-- @guest ... @endguest (Code commenté laissé tel quel) --}}

            </div>

            {{-- Section Droite: Actions Utilisateur (Login/Register ou Menu/Logout) --}}
            <div class="hidden sm:ml-6 sm:flex sm:items-center">

                @guest
                    {{-- Liens Connexion/Inscription pour les invités --}}
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700 transition mr-4">Connexion</a>
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-primary hover:bg-custom-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary transition">
                        Inscription
                    </a>
                @else
                    {{-- Menu déroulant pour l'utilisateur connecté --}}
                    <div class="relative ml-3" x-data="{ open: false }" @click.outside="open = false"> {{-- Alpine.js pour gérer l'état --}}
                        <div>
                            {{-- Bouton pour ouvrir le menu déroulant --}}
                            <button @click="open = !open" type="button" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Ouvrir le menu utilisateur</span>
                                {{-- Afficher le nom de l'utilisateur --}}
                                <span class="mr-2 text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                                {{-- Icône utilisateur ou avatar --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                {{-- <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt=""> --}}
                            </button>
                        </div>

                        {{-- Menu déroulant --}}
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" {{-- Ajout de z-50 --}}
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            style="display: none;" {{-- Alpine gère l'affichage avec x-show --}}
                        >
                            {{-- Lien vers le Dashboard étudiant si c'est un étudiant --}}
                            @if(Auth::user()->role === 'etudiant')
                                <a href="{{ route('etudiant_dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Mon Tableau de Bord</a>
                            @endif
                            {{-- Lien vers le Dashboard admin si c'est un admin --}}
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin_dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard Admin</a>
                            @endif

                            {{-- Lien vers le profil --}}
                            <a href="{{ route('profile') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Mon Profil</a>

                            {{-- Bouton/Formulaire de Déconnexion --}}
                            <form method="POST" action="{{ route('Deconnexion') }}" role="none">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-3">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            {{-- Menu Mobile (Hamburger) - Reste non implémenté fonctionnellement --}}
            {{-- <div class="-mr-2 flex items-center sm:hidden"> ... </div> --}}

        </div>
    </div>

    {{-- Section pour le menu mobile (si implémenté) --}}
    {{-- <div class="sm:hidden hidden" id="mobile-menu"> ... </div> --}}
</nav>

{{-- Styles (Inchangés - Supposent que les couleurs custom sont définies) --}}
@push('styles')
    <style>
        :root {
            --custom-primary-color: #4CAF50; /* Example: Green 500 */
            --custom-dark-color: #388E3C;  /* Example: Green 700 */
        }
        .text-custom-primary { color: var(--custom-primary-color); }
        .border-custom-primary { border-color: var(--custom-primary-color); }
        .bg-custom-primary { background-color: var(--custom-primary-color); }
        .hover\:bg-custom-dark:hover { background-color: var(--custom-dark-color); }
        .hover\:text-custom-dark:hover { color: var(--custom-dark-color); }
        .focus\:ring-custom-primary:focus {
            --tw-ring-color: var(--custom-primary-color);
        }
        .border-custom-primary {
            border-bottom-width: 2px;
        }
    </style>
@endpush

{{-- Scripts : Ajout de la dépendance Alpine.js si vous l'utilisez pour le dropdown --}}
{{-- Si vous n'utilisez pas Alpine, décommentez le script JS simple de la version précédente --}}
@push('scripts')
    {{-- Si vous utilisez Alpine.js, assurez-vous de l'inclure dans votre layout principal --}}
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
@endpush
