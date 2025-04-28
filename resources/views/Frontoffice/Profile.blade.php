@extends('Layouts.App')

@section('content')

    <div class="container mx-auto px-4 py-10 sm:py-16">

        {{-- Conteneur Principal du Profil --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-5xl mx-auto border border-gray-100">

            {{-- En-tête du Profil avec Avatar --}}
            <div class="bg-gradient-to-r from-indigo-50 via-white to-blue-50 p-6 sm:p-8 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                    {{-- Avatar et Bouton de Changement --}}
                    <div class="flex-shrink-0 text-center">
                        <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'U') . '&background=e0e7ff&color=4f46e5&size=128' }}" alt="Avatar de {{ auth()->user()->name ?? 'Utilisateur' }}" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full border-4 border-white shadow-md object-cover mx-auto">
                        <button type="button" class="mt-3 text-xs text-indigo-600 hover:text-indigo-800 font-medium transition duration-150 ease-in-out">Changer l'avatar</button> {{-- Lié à un input file caché ou un modal --}}
                    </div>
                    {{-- Informations de Base & Titre --}}
                    <div class="flex-grow text-center sm:text-left pt-2">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">{{ auth()->user()->name ?? 'Utilisateur Anonyme' }}</h2>
                        <p class="text-sm text-gray-500 mt-1">{{ auth()->user()->email ?? 'Aucun email fourni' }}</p>
                        <p class="text-sm text-gray-500 mt-1">Membre depuis : {{ auth()->user()->created_at ? auth()->user()->created_at->isoFormat('LL') : 'Date inconnue' }}</p> {{-- Formatage de date --}}
                        <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full mt-3">Profil Actif</span>
                    </div>
                </div>
            </div>

            {{-- Formulaire de Mise à Jour --}}
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-6 sm:p-8">
                {{-- Action pointant vers la route de mise à jour du profil --}}
                @csrf
                @method('PATCH') {{-- Ou PUT selon votre route --}}

                {{-- Section: Informations Personnelles --}}
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Informations Personnelles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                        {{-- Nom --}}
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-600 mb-1">Nom Complet <span class="text-red-500">*</span></label>
                            <input id="nom" name="name" type="text" class="input-style" placeholder="Votre Nom" value="{{ old('name', auth()->user()->name ?? '') }}" required>
                            @error('name') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-600 mb-1">Adresse Email <span class="text-red-500">*</span></label>
                            <input id="email" name="email" type="email" class="input-style" placeholder="Votre Email" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                            @error('email') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                {{-- Section: Parcours Scolaire --}}
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Parcours Scolaire</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                        {{-- Région --}}
                        <div>
                            <label for="region" class="block text-sm font-medium text-gray-600 mb-1">Région</label>
                            {{-- Idéalement un <select> rempli dynamiquement --}}
                            <select id="region" name="region" class="input-style">
                                <option value="">Sélectionnez votre région...</option>
                                {{-- @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region', $user->profile->region_id ?? '') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                                @endforeach --}}
                                {{-- Exemple statique --}}
                                <option value="rabat-sale-kenitra" {{ old('region', optional(auth()->user()->profile)->region) == 'rabat-sale-kenitra' ? 'selected' : '' }}>Rabat-Salé-Kénitra</option>
                                <option value="casablanca-settat" {{ old('region', optional(auth()->user()->profile)->region) == 'casablanca-settat' ? 'selected' : '' }}>Casablanca-Settat</option>
                                {{-- Ajouter d'autres régions --}}
                            </select>
                            @error('region') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                        {{-- Filière de Bac --}}
                        <div id ='PositionFilieres'>
                            <label for="filiere_bac" class="block text-sm font-medium text-gray-600 mb-1">Filière du Baccalauréat</label>
                            {{-- Idéalement un <select> --}}

                        </div>
                    </div>
                </div>

                {{-- Section: Notes Détaillées --}}
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200 flex justify-between items-center">
                        <span>Notes Détaillées</span>
                        <span class="text-xs font-normal text-gray-500">Entrez vos notes pour affiner les simulations</span>
                    </h3>
                    <div id="grades-container" class="border border-gray-200 rounded-lg overflow-hidden"> {{-- Container pour le tableau --}}
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">Type de Note (Ex: Régional, National...)</th>
                                <th scope="col" class="px-4 py-3 w-1/4">Note (/20)</th>
                                <th scope="col" class="px-4 py-3 text-center w-16">Action</th>
                            </tr>
                            </thead>
                            <tbody id="grades-tbody">
                            {{-- Lignes de notes chargées dynamiquement ou depuis old() --}}
                            @php
                                // S'assurer que $grades est un tableau même si null ou non défini
                                $grades = old('grades', optional(auth()->user())->grades ? json_decode(auth()->user()->grades, true) : []);
                                if (!is_array($grades)) $grades = [];
                            @endphp
                            @forelse ($grades as $index => $grade)
                                <tr class="bg-white border-b border-gray-100 grade-row">
                                    <td class="px-4 py-2">
                                        <input type="text" name="grades[{{ $index }}][type]"
                                               class="input-style !py-2 !text-sm" {{-- Style plus petit pour tableau --}}
                                               placeholder="Ex: Note National" value="{{ $grade['type'] ?? '' }}" required>
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="text" name="grades[{{ $index }}][score]"
                                               class="input-style !py-2 !text-sm"
                                               placeholder="Ex: 17.5" value="{{ $grade['score'] ?? '' }}" required
                                               pattern="^([0-1]?[0-9]([.,][0-9]{1,2})?|20([.,]0{1,2})?)$" {{-- Pattern plus strict pour 0-20 --}}
                                               title="Note entre 0 et 20 (ex: 15 ou 16.75)">
                                    </td>
                                    <td class="px-4 py-2 text-center align-middle">
                                        <button type="button" class="text-red-500 hover:text-red-700 remove-grade-btn p-1" title="Supprimer cette note">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                {{-- Ligne modèle vide (sera clonée par JS) --}}
                                <tr class="bg-white border-b border-gray-100 grade-row hidden" id="grade-template">
                                    <td class="px-4 py-2">
                                        <input type="text" name="grades[__INDEX__][type]" class="input-style !py-2 !text-sm" placeholder="Ex: Note National" value="" disabled>
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="text" name="grades[__INDEX__][score]" class="input-style !py-2 !text-sm" placeholder="Ex: 17.5" value="" pattern="^([0-1]?[0-9]([.,][0-9]{1,2})?|20([.,]0{1,2})?)$" title="Note entre 0 et 20" disabled>
                                    </td>
                                    <td class="px-4 py-2 text-center align-middle">
                                        <button type="button" class="text-red-500 hover:text-red-700 remove-grade-btn p-1" title="Supprimer cette note">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </td>
                                </tr>
                                @if(empty($grades)) {{-- Si vraiment aucune note, afficher un message --}}
                                <tr id="no-grades-message">
                                    <td colspan="3" class="text-center text-gray-500 py-4 px-4 italic">Aucune note ajoutée. Cliquez sur "Ajouter une note" pour commencer.</td>
                                </tr>
                                @endif
                            @endforelse
                            </tbody>
                        </table>
                        {{-- Bouton Ajouter en dehors du tableau --}}
                        <div class="p-4 bg-gray-50 text-right border-t border-gray-200">
                            <button type="button" id="add-grade-btn" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                Ajouter une Note
                            </button>
                        </div>
                    </div>
                    @error('grades') <span class="error-message mt-2">{{ $message }}</span> @enderror
                    {{-- Pour les erreurs spécifiques à une ligne (affichées sous le tableau) --}}
                    @foreach ($errors->get('grades.*') as $message)
                        <span class="error-message block mt-1">{{ $message[0] }}</span> {{-- Affiche la première erreur trouvée pour n'importe quel champ de grades --}}
                    @endforeach
                </div>

                {{-- Bouton Sauvegarder --}}
                <div class="mt-10 pt-6 border-t border-gray-200 text-right">
                    <button type="submit" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-md text-white bg-custom-primary hover:bg-custom-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Sauvegarder les Modifications
                    </button>
                </div>
            </form>
        </div> {{-- Fin du conteneur principal du profil --}}


        {{-- Sections Additionnelles (Historique, Favoris, Sécurité, etc.) --}}
        <div class="mt-12">
            <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center sm:text-left">Tableau de Bord Personnel</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">

                {{-- Carte Historique --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <h4 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Historique Récent
                    </h4>
                    <ul class="space-y-3 text-sm text-gray-600">
                        {{-- Exemple --}}
                        <li class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            <span>Simulation: Ingénierie (Score: 85%) - Il y a 2 j.</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span>Consultation: Fiche ENSIAS - Il y a 3 j.</span>
                        </li>
                        <li class="text-center text-xs text-gray-400 pt-2">...</li>
                    </ul>
                    <div class="mt-4 text-right">
                        <a href="{{ route('history.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition duration-150">Voir tout</a>
                    </div>
                </div>

                {{-- Carte Favoris --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <h4 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        Mes Favoris
                    </h4>
                    <ul class="space-y-3 text-sm text-gray-600">
                        {{-- Exemple --}}
                        <li class="flex items-center space-x-2">
                            <img src="https://via.placeholder.com/20/A78BFA/FFFFFF?text=E" alt="logo ecole" class="w-5 h-5 rounded-sm flex-shrink-0"> {{-- Remplacer par vrai logo --}}
                            <span>École Hassania des Travaux Publics (EHTP)</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <img src="https://via.placeholder.com/20/FBBF24/FFFFFF?text=F" alt="logo faculte" class="w-5 h-5 rounded-sm flex-shrink-0"> {{-- Remplacer par vrai logo --}}
                            <span>Faculté des Sciences Semlalia Marrakech (FSSM)</span>
                        </li>
                        <li class="text-center text-xs text-gray-400 pt-2">...</li>
                    </ul>
                    <div class="mt-4 text-right">
                        <a href="{{ route('favorites.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition duration-150">Gérer</a>
                    </div>
                </div>

                {{-- Carte Sécurité --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <h4 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Sécurité
                    </h4>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li>
                            <a href="{{ route('password.change') }}" class="flex items-center space-x-2 hover:text-indigo-700 group">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H5v-2H3v-2H1v-2h2V7a6 6 0 016-6h1a1 1 0 011 1v1a1 1 0 01-1 1h-1a4 4 0 00-4 4v1h8a2 2 0 012 2z"></path></svg>
                                <span>Changer mon mot de passe</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('account.settings') }}" class="flex items-center space-x-2 hover:text-indigo-700 group">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>Gérer les paramètres du compte</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center space-x-2 text-red-600 hover:text-red-800 group">
                                <svg class="w-4 h-4 text-red-500 group-hover:text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                <span>Se déconnecter</span>
                            </a>
                            <form id="logout-form" action="{{ route('Deconnexion') }}" method="POST" style="display: none;"> @csrf </form>
                        </li>
                    </ul>
                    {{-- Pas besoin de lien "Voir tout" ici généralement --}}
                </div>

            </div>
        </div>

    </div>

    <script>

        const FilieresBac = {!! $filieresBac  !!};


  const filiereposition = document.createElement('select') ;
 filiereposition.classList.add("input-style");
 filiereposition.innerHTML =` <option value="">Sélectionnez votre région...</option>`;

   FilieresBac.forEach(function(filierebac){
            filiereposition.innerHTML += `
            <option value = ${filierebac.id}>${filierebac.nom}</option>
            `
        });

  document.getElementById('PositionFilieres').appendChild(filiereposition);





    </script>
@endsection

@push('styles')
    {{-- Styles spécifiques pour les inputs et erreurs (si non définis globalement) --}}
    <style>
        .input-style {
            @apply block w-full border border-gray-300 rounded-lg shadow-sm py-2.5 px-4 text-sm text-gray-700
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out
            placeholder-gray-400;
        }
        .error-message {
            @apply text-red-600 text-xs mt-1;
        }
        /* Couleurs personnalisées si nécessaire */
        .bg-custom-primary { background-color: #4F46E5; /* Example: Indigo 600 */ }
        .bg-custom-dark:hover { background-color: #4338CA; /* Example: Indigo 700 */ }
    </style>

@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const gradesTbody = document.getElementById('grades-tbody');
            const addGradeBtn = document.getElementById('add-grade-btn');
            const gradeTemplate = document.getElementById('grade-template');
            const noGradesMessage = document.getElementById('no-grades-message');

            let gradeIndex = {{ count($grades) }}; // Commence l'index après les notes existantes

            // Fonction pour ajouter une nouvelle ligne de note
            function addGradeRow() {
                if (noGradesMessage) {
                    noGradesMessage.remove(); // Enlève le message "Aucune note" s'il existe
                }

                const newRow = gradeTemplate.cloneNode(true);
                newRow.classList.remove('hidden');
                newRow.removeAttribute('id');

                // Met à jour les attributs name et active les inputs
                newRow.querySelectorAll('input').forEach(input => {
                    input.name = input.name.replace('__INDEX__', gradeIndex);
                    input.disabled = false;
                    input.required = true; // Rend les champs requis par défaut pour les nouvelles lignes
                });

                // Attache l'événement de suppression au nouveau bouton
                const removeBtn = newRow.querySelector('.remove-grade-btn');
                if (removeBtn) {
                    removeBtn.addEventListener('click', removeGradeRow);
                }

                gradesTbody.appendChild(newRow);
                gradeIndex++; // Incrémente l'index pour la prochaine ligne
            }

            // Fonction pour supprimer une ligne de note
            function removeGradeRow(event) {
                const row = event.target.closest('.grade-row');
                if (row) {
                    row.remove();
                    // Si c'est la dernière ligne, réafficher le message ? (Optionnel)
                    if (gradesTbody.querySelectorAll('.grade-row:not(#grade-template)').length === 0 && noGradesMessage) {
                        // Pour éviter les problèmes de clonage, il est peut-être plus simple de ne pas le remettre
                        // Ou de créer un nouvel élément message.
                        // Le plus simple est de laisser vide si tout est supprimé.
                    }
                }
            }

            // Attache l'événement au bouton "Ajouter une Note"
            if (addGradeBtn) {
                addGradeBtn.addEventListener('click', addGradeRow);
            }

            // Attache l'événement aux boutons "Supprimer" des lignes existantes
            gradesTbody.querySelectorAll('.remove-grade-btn').forEach(button => {
                // Vérifie si le bouton n'est pas celui du template caché
                if (!button.closest('#grade-template')) {
                    button.addEventListener('click', removeGradeRow);
                }
            });

            // Si aucune note n'est présente au chargement et que le message "aucune note" n'existe pas (cas où old() est vide mais $user->grades aussi),
            // on pourrait potentiellement ajouter une première ligne vide automatiquement ou afficher le message.
            {{--// Ici, on assume que le @forelse gère bien l'affichage initial.--}}

        });


    </script>
@endpush
