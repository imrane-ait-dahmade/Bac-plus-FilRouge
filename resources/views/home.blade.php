@extends('Layouts.App')

@section('content')

    {{-- Conteneur principal pour centrer le contenu et ajouter du padding responsive --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Section Héros - Fond Clair, Texte Foncé --}}
        <section class="py-20 px-8 text-center rounded-lg mb-12 bg-gradient-to-br from-gray-50 via-white to-gray-100 shadow-md border border-gray-200">
            {{-- Titre principal --}}
            <h1 class="text-4xl md:text-5xl font-extrabold mb-5 text-gray-800">
                Trouvez l'École Parfaite Pour Vous
            </h1>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Explorez nos recommandations personnalisées et prenez une décision éclairée pour votre avenir éducatif.</p>
            <a href="{{url('auth/login')}}">
                <button class="bg-custom-primary hover:bg-custom-dark text-black font-bold py-3 px-8 rounded-full transition duration-300 shadow-lg transform hover:scale-105 text-lg">
                    Commencer <i class="fas fa-arrow-right ml-2"></i> {{-- Optionnel : Nécessite Font Awesome --}}
                </button>
            </a>
        </section>

        {{-- Section Écoles en Vedette - Cartes Blanches --}}
        <section class="mt-16 mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Écoles en Vedette</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Exemple de Carte École --}}
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-200 hover:border-custom-primary/70">
                    {{-- Remplacer par de vraies images --}}
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Campus Universitaire Moderne" class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Lycée Al Khawarizmi</h3>
                        <p class="text-gray-600 mb-4 text-sm">Une institution leader en sciences et technologies avec des laboratoires de pointe.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-500 uppercase font-medium">Casablanca, Maroc</span>
                            <a href="#" class="text-custom-primary hover:text-custom-dark font-medium transition duration-300 text-sm">
                                En savoir plus <i class="fas fa-chevron-right ml-1 text-xs"></i> {{-- Optionnel --}}
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Répéter la structure pour d'autres écoles --}}
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-200 hover:border-custom-primary/70">
                    <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Bibliothèque Scolaire" class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Académie Ibn Rochd</h3>
                        <p class="text-gray-600 mb-4 text-sm">Favoriser la créativité et la pensée critique dans un environnement stimulant.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-500 uppercase font-medium">Rabat, Maroc</span>
                            <a href="#" class="text-custom-primary hover:text-custom-dark font-medium transition duration-300 text-sm">
                                En savoir plus <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-200 hover:border-custom-primary/70">
                    <img src="https://images.unsplash.com/photo-1591123120675-6f7f1aae0e5b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Élèves Collaborant" class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Groupe Scolaire Atlas</h3>
                        <p class="text-gray-600 mb-4 text-sm">Programmes variés et activités parascolaires pour un développement holistique.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-500 uppercase font-medium">Marrakech, Maroc</span>
                            <a href="#" class="text-custom-primary hover:text-custom-dark font-medium transition duration-300 text-sm">
                                En savoir plus <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Nouvelle Section: Logos des Universités Partenaires --}}
        <section class="mt-16 mb-12 py-12 bg-gray-100 rounded-lg">
            <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Nos Universités Partenaires</h2>
            <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16 px-4">
                {{-- Remplacer src par les vrais logos et alt par le nom de l'université --}}
                <img src="https://via.placeholder.com/150x60/CCCCCC/999999?text=Logo+Univ+1" alt="Logo Université Mohammed V" class="h-12 lg:h-16 object-contain filter grayscale hover:grayscale-0 transition duration-300 ease-in-out">
                <img src="https://via.placeholder.com/150x60/CCCCCC/999999?text=Logo+Univ+2" alt="Logo Université Hassan II" class="h-12 lg:h-16 object-contain filter grayscale hover:grayscale-0 transition duration-300 ease-in-out">
                <img src="https://via.placeholder.com/150x60/CCCCCC/999999?text=Logo+Univ+3" alt="Logo Université Cadi Ayyad" class="h-12 lg:h-16 object-contain filter grayscale hover:grayscale-0 transition duration-300 ease-in-out">
                <img src="https://via.placeholder.com/150x60/CCCCCC/999999?text=Logo+Univ+4" alt="Logo Université Al Akhawayn" class="h-12 lg:h-16 object-contain filter grayscale hover:grayscale-0 transition duration-300 ease-in-out">
                <img src="https://via.placeholder.com/150x60/CCCCCC/999999?text=Logo+Univ+5" alt="Logo Université Sidi Mohamed Ben Abdellah" class="h-12 lg:h-16 object-contain filter grayscale hover:grayscale-0 transition duration-300 ease-in-out">
                {{-- Ajouter plus de logos si nécessaire --}}
            </div>
        </section>


        {{-- Section Témoignages - Fond Très Clair --}}
        <section class="mt-16 mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Ce que disent nos utilisateurs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Exemple de Carte Témoignage --}}
                <div class="bg-gray-50 p-6 rounded-xl shadow-md border-l-4 border-custom-primary relative">
                    {{-- Icône de citation optionnelle --}}
                    <svg class="absolute top-4 left-4 w-8 h-8 text-custom-primary/20" fill="currentColor" viewBox="0 0 24 24"><path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"/></svg>
                    <p class="text-gray-700 mb-6 pt-8 text-lg italic">"Cette plateforme m'a aidé à trouver l'école parfaite ! Je suis tellement reconnaissante."</p>
                    <div class="flex items-center mt-4">
                        {{-- Avatar Placeholder --}}
                        <img src="https://via.placeholder.com/40/CBD5E0/4A5568?text=FN" alt="Avatar Fatima N." class="w-10 h-10 rounded-full mr-4 border-2 border-gray-300">
                        <div>
                            <p class="font-semibold text-gray-800">Fatima N.</p>
                            <p class="text-sm text-gray-500">Élève de Terminale</p>
                        </div>
                    </div>
                </div>
                {{-- Répéter pour d'autres témoignages --}}
                <div class="bg-gray-50 p-6 rounded-xl shadow-md border-l-4 border-custom-primary relative">
                    <svg class="absolute top-4 left-4 w-8 h-8 text-custom-primary/20" fill="currentColor" viewBox="0 0 24 24"><path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"/></svg>
                    <p class="text-gray-700 mb-6 pt-8 text-lg italic">"J'avais du mal à choisir une école, mais ce site a rendu le processus beaucoup plus simple."</p>
                    <div class="flex items-center mt-4">
                        <img src="https://via.placeholder.com/40/CBD5E0/4A5568?text=YA" alt="Avatar Youssef A." class="w-10 h-10 rounded-full mr-4 border-2 border-gray-300">
                        <div>
                            <p class="font-semibold text-gray-800">Youssef A.</p>
                            <p class="text-sm text-gray-500">Élève de Seconde</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl shadow-md border-l-4 border-custom-primary relative">
                    <svg class="absolute top-4 left-4 w-8 h-8 text-custom-primary/20" fill="currentColor" viewBox="0 0 24 24"><path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"/></svg>
                    <p class="text-gray-700 mb-6 pt-8 text-lg italic">"Excellentes recommandations et facile à utiliser. Je recommande vivement !"</p>
                    <div class="flex items-center mt-4">
                        <img src="https://via.placeholder.com/40/CBD5E0/4A5568?text=AK" alt="Avatar Amina K." class="w-10 h-10 rounded-full mr-4 border-2 border-gray-300">
                        <div>
                            <p class="font-semibold text-gray-800">Amina K.</p>
                            <p class="text-sm text-gray-500">Élève de Première</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div> {{-- Fin du conteneur principal --}}

    {{-- Modal de Connexion - Style Clair --}}
    <div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-auto flex items-center justify-center p-4">
        <div class="bg-white border border-gray-300 rounded-lg max-w-md w-full mx-auto my-auto p-8 shadow-xl relative">
            <button class="absolute top-3 right-4 text-gray-400 hover:text-gray-600 text-3xl font-bold cursor-pointer" onclick="document.getElementById('loginModal').classList.add('hidden')">×</button>
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 text-center">Connexion</h2>
            </div>
            <form id="loginForm">
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-medium text-gray-700">Nom d'utilisateur ou Email :</label>
                    <input type="text" id="username" name="username" required
                           class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition duration-300" placeholder="Votre identifiant ou email">
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 font-medium text-gray-700">Mot de passe :</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition duration-300" placeholder="••••••••">
                </div>
                <button type="submit"
                        class="w-full bg-custom-primary hover:bg-custom-dark text-black font-bold py-3 px-6 rounded-md transition duration-300 shadow-lg transform hover:scale-[1.02]">
                    Se connecter
                </button>
                <p class="text-center text-gray-600 text-sm mt-4">
                    Pas encore de compte ? <a href="#" class="text-custom-primary hover:underline font-medium">Inscrivez-vous</a>
                </p>
            </form>
        </div>
    </div>

@endsection

@push('styles')
    {{-- Optionnel: Ajouter Font Awesome si vous utilisez les icônes --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" /> --}}
@endpush

@push('scripts')
    <script>
        // Scripts existants pour gérer le modal, etc.
        // Assurez-vous que la logique pour ouvrir/fermer le modal fonctionne toujours.
        // Exemple (si non géré ailleurs) :
        // const loginButtons = document.querySelectorAll('a[href="{{url('auth/login')}}"] button, /* autres sélecteurs si nécessaire */');
        // const loginModal = document.getElementById('loginModal');
        // const closeModalButtons = loginModal.querySelectorAll('button[onclick*="loginModal"]'); // Sélectionne le bouton '×'

        // if (loginModal) {
        //     loginButtons.forEach(button => {
        //         button.addEventListener('click', (event) => {
        //             event.preventDefault(); // Empêche la navigation si c'est un lien
        //             loginModal.classList.remove('hidden');
        //         });
        //     });

        //     closeModalButtons.forEach(button => {
        //         button.addEventListener('click', () => {
        //             loginModal.classList.add('hidden');
        //         });
        //     });

        //     // Fermer en cliquant en dehors du modal
        //     loginModal.addEventListener('click', (event) => {
        //         if (event.target === loginModal) {
        //             loginModal.classList.add('hidden');
        //         }
        //     });
        // }

        // // Logique pour la soumission des formulaires (si nécessaire)
        // document.getElementById('loginForm')?.addEventListener('submit', function(event) {
        //      event.preventDefault();
        //      console.log('Formulaire de connexion soumis');
        //      // Ajouter la logique AJAX ici
        // });
    </script>
@endpush
