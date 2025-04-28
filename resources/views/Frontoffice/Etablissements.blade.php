@extends('layouts.app')

@section('content')
    {{-- Ajout d'un fond général léger pour la page --}}
    <div class="bg-gray-100 min-h-screen">
        <div class="student-dashboard container mx-auto px-4 py-8">
            <!-- En-tête Amélioré -->
            <div class="bg-white rounded-lg p-6 mb-8 shadow-sm border-l-4 border-custom-primary">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Explorer les Établissements</h1>
                <p class="text-gray-600">Trouvez l'établissement idéal pour votre avenir académique.</p>
            </div>

            <!-- Section Filtres et Recherche -->
            <div class="bg-white rounded-lg p-6 mb-8 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 items-end">
                    <!-- Recherche par Nom -->
                    <div class="md:col-span-2 lg:col-span-1">
                        <label for="search_etablissement" class="block text-sm font-medium text-gray-700 mb-1">Rechercher</label>
                        <div class="relative">
                            <input type="text" id="search_etablissement" placeholder="Nom de l'établissement..." class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Filtre Ville -->
                    <div>
                        <label for="filter_ville" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                        <select id="filter_ville" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                            <option value="">Toutes</option>
                            {{-- Idéalement, charger dynamiquement les villes disponibles --}}
                         @foreach($villes as $ville)
                                <option value="{{$ville->name}}">{{$ville->value}}</option>

@endforeach
                        </select>
                    </div>

                    <!-- Filtre Domaine -->
                    <div>
                        <label for="filter_domaine" class="block text-sm font-medium text-gray-700 mb-1">Domaine d'études</label>
                        <select id="filter_domaine" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                            <option value="">Tout</option>
                    @foreach($Domaines as $domaine)
                            <option value="{{$domaine->id}}">{{$domaine->domaine}}</option>
                    @endforeach
           </select>
                    </div>

                    <!-- Bouton Filtres Avancés -->
                    <div class="lg:col-start-4">
                        {{-- Ce bouton pourrait ouvrir un modal ou une section repliée --}}
                        <button id="advanced-filter-toggle" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-400 shadow-sm transition duration-150 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 16v-2m0-10v2m0 6v2M6 12H4m16 0h-2M6 18H4m16 0h-2m-8-8H4m16 0h-2m-8 8a4 4 0 100-8 4 4 0 000 8zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <span>Filtres Avancés</span>
                        </button>
                    </div>
                </div>

                <!-- Section Filtres Avancés (Initialement cachée ou dans un modal) -->
                <div id="advanced-filters" class="mt-6 pt-4 border-t border-gray-200 hidden">
                    <p class="text-lg font-semibold text-gray-800 mb-4">Affiner votre recherche</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Type d'établissement -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="checkbox" name="filter_type[]" value="public" class="rounded border-gray-300 text-custom-primary shadow-sm focus:border-custom-primary focus:ring focus:ring-custom-primary focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-600">Public</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="filter_type[]" value="prive" class="rounded border-gray-300 text-custom-primary shadow-sm focus:border-custom-primary focus:ring focus:ring-custom-primary focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-600">Privé</span>
                                </label>
                            </div>
                        </div>
                        <!-- Accréditation (Exemple) -->
                        <div>
                            <label for="filter_accreditation" class="block text-sm font-medium text-gray-700 mb-1">Accréditation</label>
                            <select id="filter_accreditation" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                <option value="">Indifférent</option>
                                <option value="oui">Accrédité par l'état</option>
                                <option value="non">Non accrédité / En cours</option>
                            </select>
                        </div>
                        <!-- Autres Filtres Possibles -->
                        <div>
                            <label for="filter_langue" class="block text-sm font-medium text-gray-700 mb-1">Langue d'enseignement</label>
                            <select id="filter_langue" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                <option value="">Toutes</option>
                                <option value="fr">Français</option>
                                <option value="en">Anglais</option>
                                <option value="ar">Arabe</option>
                            </select>
                        </div>
                        {{-- Ajouter d'autres filtres : Frais de scolarité (slider?), Diplôme visé, etc. --}}
                    </div>
                    <div class="mt-6 flex justify-end gap-3">
                        <button id="reset-filters" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Réinitialiser
                        </button>
                        <button id="apply-filters" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-custom-primary hover:bg-custom-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary">
                            Appliquer les filtres
                        </button>
                    </div>
                </div>
            </div>

            <!-- Section Tri et Affichage -->
            <div class="flex justify-between items-center mb-4">
                <p class="text-sm text-gray-600"><span id="results-count">{{ $etablissements->count() }}</span> établissement(s) trouvé(s).</p>
                <div>
                    <label for="sort_by" class="text-sm font-medium text-gray-700 mr-2">Trier par:</label>
                    <select id="sort_by" class="bg-white border border-gray-300 text-gray-700 rounded-lg py-1 px-2 text-sm focus:outline-none focus:ring-1 focus:ring-custom-primary focus:border-transparent shadow-sm">
                        <option value="pertinence">Pertinence</option>
                        <option value="nom_asc">Nom (A-Z)</option>
                        <option value="nom_desc">Nom (Z-A)</option>
                        {{-- Ajouter d'autres tris si pertinent (ex: par ville) --}}
                    </select>
                </div>
            </div>

            <!-- Liste des établissements (Light Mode) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($etablissements as $etablissement)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200 flex flex-col">
                        <div class="relative">
                            {{-- Image --}}
                            @if($etablissement['image'] )
                                <img src="/Images/PhotoEcoles/{{$etablissement['image']}}" alt="{{ $etablissement['nometablissement'] }}" class="w-full h-48 object-cover" />
                            @else
                                {{-- Placeholder amélioré --}}
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500 text-center px-4">Image non disponible<br>{{ $etablissement['resau'] }}</span>
                                </div>
                            @endif

                            {{-- Bouton Favoris (Style Light) --}}
                            <button title="Ajouter aux favoris" class="absolute top-3 right-3 p-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-red-500 hover:bg-white transition-all duration-200 shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    {{-- L'icône pourrait changer si l'élément est en favoris (fill="currentColor") --}}
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-5 flex flex-col flex-grow"> {{-- flex-grow pour pousser le bouton vers le bas --}}
                            {{-- Titre et Description --}}
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{$etablissement['nometablissement']}}</h3>
                            <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{$etablissement['descirptionetablissement'] ?: 'Aucune description disponible.'}}</p> {{-- line-clamp pour limiter la description --}}

                            {{-- Tags (Style Light) --}}
                            <div class="flex flex-wrap gap-2 mb-4">
                                {{-- Utiliser des couleurs distinctes ou icônes pour les tags --}}
                                <span class="flex items-center px-2.5 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                    {{ $etablissement['Universite'] ?: 'N/A' }}
                                </span>
                                <span class="flex items-center px-2.5 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    {{ $etablissement->region->nom_region ?? 'Non défini' }}
                                </span>
                                <span class="flex items-center px-2.5 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg> {{-- Placeholder icon for address --}}
                                    {{$etablissement['adresseetablissement'] ?: 'Adresse non spécifiée'}}
                                </span>
                            </div>

                            {{-- Type et Bouton (poussé vers le bas) --}}
                            <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100">
                                <span class="text-sm font-medium text-custom-primary">{{ $etablissement['typeecole'] ?: 'Type non spécifié' }}</span>
                                <a href="{{ route('etablissement.show',$etablissement) }}" class="inline-flex items-center text-sm font-medium text-white bg-custom-primary hover:bg-custom-dark px-4 py-2 rounded-lg transition duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary">
                                    Voir détails
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Message si aucun résultat --}}
                    <div class="md:col-span-2 lg:col-span-3 bg-white rounded-lg p-8 text-center shadow">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun établissement trouvé</h3>
                        <p class="mt-1 text-sm text-gray-500">Essayez d'ajuster vos filtres de recherche.</p>
                        <div class="mt-6">
                            <button type="button" id="clear-all-filters" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-custom-primary hover:bg-custom-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary">
                                Réinitialiser tous les filtres
                            </button>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- Pagination (si nécessaire) --}}
            {{-- <div class="mt-8">
                {{ $etablissements->links() }} // Assurez-vous que la pagination est activée dans le contrôleur
            </div> --}}

        </div>
    </div>

    {{-- Script pour gérer l'affichage des filtres avancés --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const advancedFilterToggle = document.getElementById('advanced-filter-toggle');
            const advancedFilters = document.getElementById('advanced-filters');
            const resetFiltersButton = document.getElementById('reset-filters');
            const applyFiltersButton = document.getElementById('apply-filters');
            const clearAllFiltersButton = document.getElementById('clear-all-filters'); // Bouton dans le message "aucun résultat"

            if (advancedFilterToggle && advancedFilters) {
                advancedFilterToggle.addEventListener('click', () => {
                    advancedFilters.classList.toggle('hidden');
                    // Optionnel: changer l'icône ou le texte du bouton
                });
            }

            // Logique pour appliquer/réinitialiser les filtres (nécessite JS ou rechargement de page)
            // Exemple simple:
            if(applyFiltersButton){
                applyFiltersButton.addEventListener('click', () => {
                    // Ici, vous collecteriez les valeurs des filtres et soumettriez un formulaire
                    // ou feriez une requête AJAX pour mettre à jour la liste.
                    alert("Logique d'application des filtres à implémenter.");
                    // Exemple: window.location.href = buildFilterUrl();
                });
            }

            if(resetFiltersButton){
                resetFiltersButton.addEventListener('click', () => {
                    // Ici, vous réinitialiseriez les champs dans la section avancée
                    const advancedFormElements = advancedFilters.querySelectorAll('input, select');
                    advancedFormElements.forEach(el => {
                        if (el.type === 'checkbox' || el.type === 'radio') {
                            el.checked = false;
                        } else {
                            el.value = '';
                        }
                    });
                    alert("Filtres avancés réinitialisés. Cliquez sur 'Appliquer' pour voir les changements.");
                });
            }

            if(clearAllFiltersButton){
                clearAllFiltersButton.addEventListener('click', () => {
                    // Réinitialise tous les filtres (basiques et avancés) et recharge
                    document.getElementById('search_etablissement').value = '';
                    document.getElementById('filter_ville').value = '';
                    document.getElementById('filter_domaine').value = '';
                    // Potentiellement réinitialiser aussi les filtres avancés s'ils sont dans le même formulaire
                    // Puis recharger la page sans paramètres ou avec paramètres par défaut
                    window.location.href = window.location.pathname; // Recharge la page sans query params
                });
            }
        });
    </script>
@endsection
