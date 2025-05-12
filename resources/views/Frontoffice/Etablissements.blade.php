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
                <form id="filter-form" method="GET" action="{{ route(Route::currentRouteName()) }}"> {{-- Form to submit filters --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 items-end">
                        <!-- Recherche par Nom -->
                        <div class="md:col-span-2 lg:col-span-1">
                            <label for="search_etablissement" class="block text-sm font-medium text-gray-700 mb-1">Rechercher</label>
                            <div class="relative">
                                <input type="text" id="search_etablissement" name="search" value="{{ request('search') }}" placeholder="Nom, description ou abréviation..." class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Filtre Ville -->
                        <div>
                            <label for="filter_ville" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                            <select id="filter_ville" name="ville" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                <option value="">Toutes</option>
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->name }}" {{ request('ville') == $ville->name ? 'selected' : '' }}>{{ $ville->value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filtre Université -->
                        <div>
                            <label for="filter_universite" class="block text-sm font-medium text-gray-700 mb-1">Université</label>
                            <select id="filter_universite" name="universite_id" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                <option value="">Toutes</option>
                                @foreach($universities as $university)
                                    <option value="{{ $university->id }}" {{ request('universite_id') == $university->id ? 'selected' : '' }}>{{ $university->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filtre Région -->
                        <div>
                            <label for="filter_region" class="block text-sm font-medium text-gray-700 mb-1">Région</label>
                            <select id="filter_region" name="region_id" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                <option value="">Toutes</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ request('region_id') == $region->id ? 'selected' : '' }}>{{ $region->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filtre Domaine -->
                        <div>
                            <label for="filter_domaine" class="block text-sm font-medium text-gray-700 mb-1">Domaine d'études</label>
                            <select id="filter_domaine" name="domaine_id" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                <option value="">Tout</option>
                                @foreach($Domaines as $domaine)
                                    <option value="{{ $domaine->id }}" {{ request('domaine_id') == $domaine->id ? 'selected' : '' }}>{{ $domaine->domaine }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tri -->
                        <div>
                            <label for="sort_by" class="block text-sm font-medium text-gray-700 mb-1">Trier par</label>
                            <select id="sort_by" name="sort_by" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                <option value="nom_asc" {{ request('sort_by') == 'nom_asc' ? 'selected' : '' }}>Nom (A-Z)</option>
                                <option value="nom_desc" {{ request('sort_by') == 'nom_desc' ? 'selected' : '' }}>Nom (Z-A)</option>
                                <option value="reputation_desc" {{ request('sort_by') == 'reputation_desc' ? 'selected' : '' }}>Réputation (↓)</option>
                                <option value="reputation_asc" {{ request('sort_by') == 'reputation_asc' ? 'selected' : '' }}>Réputation (↑)</option>
                                <option value="frais_scolarite_asc" {{ request('sort_by') == 'frais_scolarite_asc' ? 'selected' : '' }}>Frais (↓)</option>
                                <option value="frais_scolarite_desc" {{ request('sort_by') == 'frais_scolarite_desc' ? 'selected' : '' }}>Frais (↑)</option>
                            </select>
                        </div>

                        <!-- Bouton Filtres Avancés -->
                        <div class="lg:col-start-4">
                            <button type="button" id="advanced-filter-toggle" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-400 shadow-sm transition duration-150 flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 16v-2m0-10v2m0 6v2M6 12H4m16 0h-2M6 18H4m16 0h-2m-8-8H4m16 0h-2m-8 8a4 4 0 100-8 4 4 0 000 8zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                <span>Filtres Avancés</span>
                            </button>
                        </div>
                    </div>

                    <!-- Section Filtres Avancés -->
                    <div id="advanced-filters" class="mt-6 pt-4 border-t border-gray-200 hidden">
                        <p class="text-lg font-semibold text-gray-800 mb-4">Affiner votre recherche</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Type d'établissement -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                <div class="flex space-x-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="type_ecole[]" value="public" class="rounded border-gray-300 text-custom-primary shadow-sm focus:border-custom-primary focus:ring focus:ring-custom-primary focus:ring-opacity-50" {{ in_array('public', request('type_ecole', [])) ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-600">Public</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="type_ecole[]" value="prive" class="rounded border-gray-300 text-custom-primary shadow-sm focus:border-custom-primary focus:ring focus:ring-custom-primary focus:ring-opacity-50" {{ in_array('prive', request('type_ecole', [])) ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-600">Privé</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Frais de scolarité -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Frais de scolarité</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <input type="number" name="frais_min" value="{{ request('frais_min') }}" placeholder="Min" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                    </div>
                                    <div>
                                        <input type="number" name="frais_max" value="{{ request('frais_max') }}" placeholder="Max" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Accréditation -->
                            <div>
                                <label for="filter_accreditation" class="block text-sm font-medium text-gray-700 mb-1">Accréditation</label>
                                <select id="filter_accreditation" name="accreditation" class="w-full bg-white border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent shadow-sm">
                                    <option value="">Indifférent</option>
                                    <option value="oui" {{ request('accreditation') == 'oui' ? 'selected' : '' }}>Accrédité par l'état</option>
                                    <option value="non" {{ request('accreditation') == 'non' ? 'selected' : '' }}>Non accrédité / En cours</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end gap-3">
                            <button type="button" id="reset-advanced-filters" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Réinitialiser Avancés
                            </button>
                            <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-custom-primary hover:bg-custom-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary">
                                Appliquer les filtres
                            </button>
                        </div>
                    </div>
                </form> {{-- End of filter form --}}
            </div>

            <!-- Section Tri et Affichage -->
            <!-- Section Tri et Affichage -->
            <div class="flex justify-between items-center mb-4">
                <p class="text-sm text-gray-600">
        <span id="results-count">
            @if ($etablissements instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $etablissements->total() }}
            @else
                {{ $etablissements->count() }}
            @endif
        </span> établissement(s) trouvé(s).
                </p>
                {{-- ... rest of the sort section ... --}}
            </div>

            <!-- Liste des établissements -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($etablissements as $etablissement)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200 flex flex-col">
                        <div class="relative">
                            @if($etablissement->image)
                                <img src="{{ asset('storage/' . $etablissement->image) }}" alt="{{ $etablissement->nom }}" class="w-full h-48 object-cover" />
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-center px-4">
                                    Image non disponible<br>
                                    @if($etablissement->abreviation)
                                        {{ $etablissement->abreviation }}
                                    @else
                                        {{ $etablissement->nom }}
                                    @endif
                                </div>
                            @endif

                            <button title="Ajouter aux favoris" class="absolute top-3 right-3 p-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-red-500 hover:bg-white transition-all duration-200 shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $etablissement->nom }}</h3>
                            <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $etablissement->description ?: 'Aucune description disponible.' }}</p>

                            <div class="flex flex-wrap gap-2 mb-4">
                                @if($etablissement->universite)
                                    <span class="flex items-center px-2.5 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                    {{ $etablissement->universite->nom ?? 'N/A' }}
                                </span>
                                @endif
                                @if($etablissement->region)
                                    <span class="flex items-center px-2.5 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    {{ $etablissement->region->nom ?? 'Non défini' }}
                                </span>
                                @endif
                                @if($etablissement->ville)
                                    <span class="flex items-center px-2.5 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /> </svg>
                                    {{ $etablissement->ville }}
                                </span>
                                @endif
                            </div>

                            <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-custom-primary">{{ ucfirst($etablissement->TypeEcole) ?: 'Type non spécifié' }}</span>
                                    @if($etablissement->frais_scolarite)
                                        <span class="text-xs text-gray-500">{{ number_format($etablissement->frais_scolarite, 0, ',', ' ') }} DH/an</span>
                                    @endif
                                </div>
                                <a href="{{ route('etablisement_infos', ['etablissement' => $etablissement->id]) }}" class="inline-flex items-center text-sm font-medium text-white bg-custom-primary hover:bg-custom-dark px-4 py-2 rounded-lg transition duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary">
                                    Voir détails
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
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

            {{-- Pagination --}}
            @if ($etablissements->hasPages())
                <div class="mt-8">
                    {{ $etablissements->links() }}
                </div>
            @endif

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const advancedFilterToggle = document.getElementById('advanced-filter-toggle');
            const advancedFiltersDiv = document.getElementById('advanced-filters');
            const resetAdvancedFiltersButton = document.getElementById('reset-advanced-filters');
            const clearAllFiltersButton = document.getElementById('clear-all-filters');
            const filterForm = document.getElementById('filter-form');

            if (advancedFilterToggle && advancedFiltersDiv) {
                advancedFilterToggle.addEventListener('click', () => {
                    advancedFiltersDiv.classList.toggle('hidden');
                });
            }

            if(resetAdvancedFiltersButton && advancedFiltersDiv){
                resetAdvancedFiltersButton.addEventListener('click', () => {
                    const advancedFormElements = advancedFiltersDiv.querySelectorAll('input[type="checkbox"], select, input[type="number"]');
                    advancedFormElements.forEach(el => {
                        if (el.type === 'checkbox') {
                            el.checked = false;
                        } else {
                            el.value = '';
                        }
                    });
                });
            }

            if(clearAllFiltersButton){
                clearAllFiltersButton.addEventListener('click', () => {
                    filterForm.querySelectorAll('input[type="text"], select, input[type="number"]').forEach(el => {
                        if(el.id !== 'sort_by') {
                            el.value = '';
                        }
                    });
                    if (advancedFiltersDiv) {
                        advancedFiltersDiv.querySelectorAll('input[type="checkbox"], select, input[type="number"]').forEach(el => {
                            if (el.type === 'checkbox') {
                                el.checked = false;
                            } else {
                                el.value = '';
                            }
                        });
                    }
                    filterForm.submit();
                });
            }

            // Handle sort_by change to submit the form
            const sortBySelect = document.getElementById('sort_by');
            if (sortBySelect && filterForm) {
                sortBySelect.addEventListener('change', function() {
                    filterForm.submit();
                });
            }
        });
    </script>
@endsection
