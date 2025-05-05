{{-- Footer Amélioré --}}
<footer class="bg-white border-t border-gray-200 mt-16"> {{-- Ajout d'une marge supérieure et d'une bordure --}}
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        {{-- Grille principale du footer --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- Colonne 1: Logo et Social --}}
            <div class="space-y-5"> {{-- Espace vertical entre logo et icônes --}}
                <a href="{{ url('/') }}" class="inline-block">
                    <img class="h-10 w-auto" src="{{ asset('Images/LogoBacPlus.svg') }}" alt="BacPlus Orientation Logo">
                </a>
                <p class="text-gray-500 text-sm max-w-xs">
                    Votre plateforme d'orientation pour réussir votre parcours post-bac au Maroc.
                </p>
                {{-- Icônes Sociales (maintenant des liens) --}}
                <div class="flex space-x-5">
                    {{-- Remplacez '#' par vos liens réels --}}
                    <a href="#" target="_blank" rel="noopener noreferrer" class="text-footer-accent hover:text-footer-accent-dark transition duration-150 ease-in-out" title="Facebook">
                        <span class="sr-only">Facebook</span>
                        <i class="fa-brands fa-facebook fa-lg"></i> {{-- Taille lg (large) est souvent suffisante --}}
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="text-footer-accent hover:text-footer-accent-dark transition duration-150 ease-in-out" title="Instagram">
                        <span class="sr-only">Instagram</span>
                        <i class="fa-brands fa-instagram fa-lg"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="text-footer-accent hover:text-footer-accent-dark transition duration-150 ease-in-out" title="TikTok">
                        <span class="sr-only">TikTok</span>
                        <i class="fa-brands fa-tiktok fa-lg"></i>
                    </a>
                    {{-- Discord est moins courant, mais gardé si pertinent --}}
                    <a href="#" target="_blank" rel="noopener noreferrer" class="text-footer-accent hover:text-footer-accent-dark transition duration-150 ease-in-out" title="Discord">
                        <span class="sr-only">Discord</span>
                        <i class="fa-brands fa-discord fa-lg"></i>
                    </a>
                    {{-- Idée: Ajouter LinkedIn ? --}}
                    {{-- <a href="#" target="_blank" rel="noopener noreferrer" class="text-footer-accent hover:text-footer-accent-dark transition duration-150 ease-in-out" title="LinkedIn">
                         <span class="sr-only">LinkedIn</span>
                        <i class="fa-brands fa-linkedin fa-lg"></i>
                    </a> --}}
                </div>
            </div>

            {{-- Colonne 2: Navigation Rapide --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Navigation</h3>
                <ul class="mt-4 space-y-3">
                    <li><a href="{{ url('/') }}" class="footer-link">Accueil</a></li>
                    {{-- Adaptez les routes si nécessaire --}}
                    <li><a href="{{ route('Etablissements') }}" class="footer-link">Établissements</a></li>
                    <li><a href="{{ route('Etablissements') }}" class="footer-link">Actualités</a></li>
                    <li><a href="{{ route('Etablissements') }}" class="footer-link">Sur BacPlus</a></li>
                    @auth
                        @if(Auth::user()->role === 'etudiant')
                            <li><a href="{{ route('etudiant_dashboard') }}" class="footer-link">Mon Tableau de Bord</a></li>
                        @endif
                        @if(Auth::user()->role === 'admin')
                            <li><a href="{{ route('admin_dashboard') }}" class="footer-link">Dashboard Admin</a></li>
                        @endif
                    @endauth
                </ul>
            </div>

            {{-- Colonne 3: Ressources --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Ressources</h3>
                <ul class="mt-4 space-y-3">
                    {{-- Adaptez les routes --}}
                    <li><a href="#" class="footer-link">Comment choisir sa filière ?</a></li>
                    <li><a href="#" class="footer-link">Préparer les concours</a></li>
                    <li><a href="#" class="footer-link">Calendrier des échéances</a></li>
                    <li><a href="{{ route('Etablissements') }}" class="footer-link">Aide & FAQ</a></li> {{-- Lien depuis navbar --}}
                </ul>
            </div>

            {{-- Colonne 4: Légal & Contact --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Légal</h3>
                <ul class="mt-4 space-y-3">
                    {{-- Adaptez les routes --}}
                    <li><a href="#" class="footer-link">Mentions Légales</a></li>
                    <li><a href="#" class="footer-link">Politique de Confidentialité</a></li>
                    <li><a href="#" class="footer-link">Conditions d'Utilisation</a></li>
                    <li><a href="#" class="footer-link">Contactez-nous</a></li>
                </ul>
            </div>

        </div>

        {{-- Section Copyright --}}
        <div class="mt-10 pt-8 border-t border-gray-200 text-center">
            <p class="text-xs text-gray-500">
                © {{ date('Y') }} BacPlus Orientation. Tous droits réservés.
            </p>
        </div>
    </div>
</footer>

@push('styles')
    <style>
        /* Définition des couleurs inspirées */
        :root {
            --footer-accent-color: #B3DCA0; /* Vert clair original */
            --footer-accent-dark-color: #9BCF81; /* Teinte plus foncée pour hover */
        }
        .text-footer-accent { color: var(--footer-accent-color); }
        .hover\:text-footer-accent-dark:hover { color: var(--footer-accent-dark-color); }

        /* Style commun pour les liens du footer */
        .footer-link {
            @apply text-sm text-gray-600 hover:text-gray-900 hover:underline transition duration-150 ease-in-out;
        }
    </style>
    {{-- Assurez-vous que Font Awesome est chargé dans votre layout principal (par exemple via CDN) --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" ...> --}}
@endpush
