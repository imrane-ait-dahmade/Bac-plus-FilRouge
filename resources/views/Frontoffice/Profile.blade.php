@extends('Layouts.App')

@section('content')
    {{-- Container principal pour la page --}}
    <div class="container mx-auto px-4 py-8">

        {{-- Carte des Paramètres du Profil --}}
        <div class="flex justify-center mb-8">
            {{-- Ajustement de la largeur pour différents écrans --}}
            <div class="w-full sm:w-4/5 md:w-3/4 lg:w-1/2 bg-white rounded-lg shadow-lg p-8">
                {{-- En-tête de la carte --}}
                <div class="text-center mb-6">
                    <h4 class="text-2xl font-semibold text-custom-dark">Paramètres du Profil</h4>
                </div>

                {{-- Formulaire de Profil --}}
                <form method="POST" action="{{-- {{ route('profile.update') }} --}}"> {{-- Ajoutez votre route de mise à jour --}}
                    @csrf
                    @method('PATCH') {{-- Ou PUT selon votre route --}}

                    {{-- Grille pour les champs Nom et Email --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        {{-- Nom --}}
                        <div>
                            <label for="nom" class="block text-sm font-semibold text-custom-dark mb-1">Nom</label>
                            <input id="nom" name="name" type="text" class="form-input w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-primary focus:outline-none" placeholder="Votre Nom" value="{{ old('name', auth()->user()->name ?? '') }}">
                            {{-- Affiche les erreurs de validation si elles existent --}}
                            {{-- @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                        </div>
                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-custom-dark mb-1">Email</label>
                            <input id="email" name="email" type="email" class="form-input w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-primary focus:outline-none" placeholder="Votre Email" value="{{ old('email', auth()->user()->email ?? '') }}">
                            {{-- @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                        </div>
                    </div>

                    {{-- Grille pour les champs Région et Filière --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        {{-- Région --}}
                        <div>
                            <label for="region" class="block text-sm font-semibold text-custom-dark mb-1">Région</label>
                            {{-- Remplacez l'input par un select si vous avez une liste prédéfinie --}}
                            <input id="region" name="region" type="text" class="form-input w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-primary focus:outline-none" placeholder="Votre Région" value="{{-- {{ old('region', $user->profile->region ?? '') }} --}}">
                            {{-- @error('region') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                        </div>
                        {{-- Filière de Bac --}}
                        <div>
                            <label for="filiere_bac" class="block text-sm font-semibold text-custom-dark mb-1">Filière de Bac</label>
                            {{-- Remplacez l'input par un select si vous avez une liste prédéfinie --}}
                            <input id="filiere_bac" name="filiere_bac" type="text" class="form-input w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-primary focus:outline-none" placeholder="Ex: Sciences Maths A" value="{{-- {{ old('filiere_bac', $user->profile->filiere_bac ?? '') }} --}}">
                            {{-- @error('filiere_bac') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                        </div>
                    </div>

                    {{-- Section pour les Notes sous forme de tableau --}}
                    <div class="col-md-12 mb-4"> {{-- Conserve la classe col-md-12 pour la largeur --}}
                        <label class="block text-sm font-semibold text-custom-dark mb-2">Notes Détaillées</label>
                        <div id="grades-table-container" class="border border-gray-300 rounded-lg p-4">
                            <table class="w-full text-sm text-left text-gray-700">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-4 py-2">Type de Note (Ex: Régional, National, Maths...)</th>
                                    <th scope="col" class="px-4 py-2">Note (/20)</th>
                                    <th scope="col" class="px-4 py-2 text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="grades-tbody">
                                {{-- Les lignes de notes existantes seront chargées ici via Blade (si applicable) --}}
                                {{-- Exemple si vous passez des notes existantes depuis le contrôleur --}}
                                @php $grades = old('grades', $user->grades ?? []); @endphp {{-- Récupère les anciennes valeurs ou les notes existantes --}}
                                @forelse ($grades as $index => $grade)
                                    <tr class="bg-white border-b grade-row">
                                        <td class="px-4 py-2">
                                            <input type="text" name="grades[{{ $index }}][type]"
                                                   class="form-input w-full p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-custom-primary focus:outline-none"
                                                   placeholder="Ex: National" value="{{ $grade['type'] ?? '' }}" required>
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" name="grades[{{ $index }}][score]" {{-- Utiliser text pour permettre les décimaux avec virgule/point --}}
                                            class="form-input w-full p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-custom-primary focus:outline-none"
                                                   placeholder="Ex: 17.5" value="{{ $grade['score'] ?? '' }}" required
                                                   pattern="[0-9]+([.,][0-9]+)?" {{-- Accepte les nombres entiers ou décimaux --}}
                                                   title="Entrez un nombre (ex: 15 ou 16.75)">
                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            <button type="button" class="text-red-500 hover:text-red-700 remove-grade-btn" title="Supprimer cette note">
                                                {{-- Icône Poubelle (Tailwind Heroicons) --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- Optionnel: Afficher une ligne vide par défaut si aucune note n'existe --}}
                                    <tr class="bg-white border-b grade-row">
                                        <td class="px-4 py-2">
                                            <input type="text" name="grades[0][type]"
                                                   class="form-input w-full p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-custom-primary focus:outline-none"
                                                   placeholder="Ex: National" value="" >
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" name="grades[0][score]"
                                                   class="form-input w-full p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-custom-primary focus:outline-none"
                                                   placeholder="Ex: 17.5" value=""
                                                   pattern="[0-9]+([.,][0-9]+)?"
                                                   title="Entrez un nombre (ex: 15 ou 16.75)">
                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            <button type="button" class="text-red-500 hover:text-red-700 remove-grade-btn" title="Supprimer cette note">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4 text-right">
                                <button type="button" id="add-grade-btn" class="btn bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 transition duration-150 text-sm">
                                    + Ajouter une note
                                </button>
                            </div>
                        </div>
                        {{-- Afficher les erreurs de validation globales pour le tableau des notes --}}
                        {{-- @error('grades') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror --}}
                        {{-- Afficher les erreurs spécifiques à une ligne si nécessaire (plus complexe) --}}
                        {{-- @foreach ($errors->get('grades.*.type') as $message) ... @endforeach --}}
                    </div>

                    {{-- Bouton Sauvegarder --}}
                    <div class="mt-8 text-center">
                        <button type="submit" class="btn bg-custom-primary text-white px-8 py-3 rounded-full shadow-md hover:bg-custom-dark transition duration-300">
                            Sauvegarder le profil
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Container pour les Sections Statiques --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Carte Historique --}}
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h5 class="text-xl font-semibold text-custom-dark mb-4">Historique Récent</h5>
                {{-- Remplacez par les vraies données dynamiques --}}
                <ul class="space-y-3 text-sm text-gray-700">
                    <li class="flex items-center space-x-2">
                        {{-- Icône exemple (Calendrier) --}}
                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Simulation effectuée : Ingénierie - Il y a 2 jours</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        {{-- Icône exemple (Horloge) --}}
                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Connexion réussie - Hier</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        {{-- Icône exemple (Document) --}}
                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Fiche école consultée : ENSIAS - Il y a 3 jours</span>
                    </li>
                    <li class="flex items-center space-x-2 text-gray-500 italic">
                        <span>(Aucune autre activité récente)</span>
                    </li>
                </ul>
                <div class="mt-4 text-right">
                    <a href="{{-- {{ route('history.index') }} --}}" class="text-sm text-custom-primary hover:underline">Voir tout l'historique</a>
                </div>
            </div>

            {{-- Carte Favoris --}}
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h5 class="text-xl font-semibold text-custom-dark mb-4">Mes Favoris</h5>
                {{-- Remplacez par les vraies données dynamiques --}}
                <ul class="space-y-3 text-sm text-gray-700">
                    <li class="flex items-center space-x-2">
                        {{-- Icône exemple (Étoile) --}}
                        <svg class="w-4 h-4 text-yellow-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <span>École Nationale Supérieure d'Informatique (ESI)</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        {{-- Icône exemple (Étoile) --}}
                        <svg class="w-4 h-4 text-yellow-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <span>Programme : Génie Logiciel à FST Settat</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        {{-- Icône exemple (Coeur vide - Placeholder) --}}
                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        <span class="italic text-gray-500">(Vous n'avez pas d'autres favoris)</span>
                    </li>
                </ul>
                <div class="mt-4 text-right">
                    <a href="{{-- {{ route('favorites.index') }} --}}" class="text-sm text-custom-primary hover:underline">Gérer les favoris</a>
                </div>
            </div>

            {{-- Carte Notifications (Autre idée) --}}
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h5 class="text-xl font-semibold text-custom-dark mb-4">Notifications</h5>
                {{-- Remplacez par les vraies données dynamiques --}}
                <ul class="space-y-3 text-sm text-gray-700">
                    <li class="flex items-start space-x-2">
                        {{-- Icône exemple (Cloche) --}}
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span>Nouvelle mise à jour des dates de concours disponible pour l'ENSA.</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        {{-- Icône exemple (Check Circle) --}}
                        <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Votre profil a été mis à jour avec succès.</span>
                    </li>
                    <li class="flex items-center space-x-2 text-gray-500 italic">
                        <span>(Pas de nouvelles notifications)</span>
                    </li>
                </ul>
                <div class="mt-4 text-right">
                    <a href="{{-- {{ route('notifications.index') }} --}}" class="text-sm text-custom-primary hover:underline">Toutes les notifications</a>
                </div>
            </div>

            {{-- Vous pouvez ajouter d'autres cartes ici pour : --}}
            {{-- - Simulations Sauvegardées --}}
            {{-- - Liens rapides Sécurité (Changer mot de passe) --}}
            {{-- - Liens Aide/Support --}}

        </div>

    </div>
@endsection

@push('styles')
    {{-- Ajoutez ceci si vos couleurs personnalisées ne sont pas définies globalement --}}
    <style>
        .text-custom-dark { color: #1F2937; /* Example: Gray 800 */ }
        .bg-custom-primary { background-color: #4F46E5; /* Example: Indigo 600 */ }
        .bg-custom-primary:hover { background-color: #4338CA; /* Example: Indigo 700 */ }
        .text-custom-primary { color: #4F46E5; /* Example: Indigo 600 */ }
        .hover\:text-custom-primary:hover { color: #4F46E5; }
        .focus\:ring-custom-primary:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgba(79, 70, 229, var(--tw-ring-opacity)); /* Example: Indigo 600 */
            box-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        }
        .border-custom-primary { border-color: #4F46E5; /* Example: Indigo 600 */ }
        /* Assurez-vous que les classes form-input, form-textarea sont stylées (souvent via @tailwindcss/forms) ou définissez-les */
        .form-input, .form-textarea { /* Style de base si non fourni par un plugin */
            border-width: 2px;
            border-color: #D1D5DB; /* Gray 300 */
            border-radius: 0.5rem; /* rounded-lg */
            padding: 0.75rem; /* p-3 */
            width: 100%;
        }
        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: transparent; /* Hide default border on focus if ring is used */
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }
    </style>
@endpush

@push('scripts')
    {{-- Si vous avez besoin de JS spécifique à cette page --}}
    <script>
        // Exemple: alert('Page de profil chargée!');
    </script>
@endpush
