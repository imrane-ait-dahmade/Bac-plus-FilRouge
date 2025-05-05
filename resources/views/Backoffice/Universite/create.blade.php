
@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-6">Créer une Nouvelle Université</h2>

                {{-- Assurez-vous que cette route existe dans votre fichier web.php --}}
                {{-- Route::post('/universites', [UniversiteController::class, 'store'])->name('universites.store'); --}}
                <form action="{{ route('universites.store') }}" method="POST">
                    @csrf

                    <div class="space-y-6">
                        {{-- Champ Nom de l'Université --}}
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom de l'Université</label>
                            <input type="text" name="nom" id="nom"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                   placeholder="Entrez le nom de l'université" value="{{ old('nom') }}" required>
                            @error('nom')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Champ Nom du Directeur --}}
                        <div>
                            <label for="directeur" class="block text-sm font-medium text-gray-700">Nom du Directeur</label>
                            <input type="text" name="directeur" id="directeur"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                   placeholder="Entrez le nom du directeur" value="{{ old('directeur') }}">
                            {{-- Note: Le champ directeur n'est pas marqué comme 'required' ici, ajustez si nécessaire --}}
                            @error('directeur')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Champ Région --}}
                        <div>
                            <label for="region_id" class="block text-sm font-medium text-gray-700">Région</label>
                            <select name="region_id" id="region_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50" required>
                                <option value="">Sélectionnez une région</option>
                                {{-- Assurez-vous de passer la variable $regions depuis votre contrôleur --}}
                                {{-- Exemple dans le contrôleur: $regions = Region::all(); return view('...', compact('regions')); --}}
                                @if(isset($regions)) {{-- Vérification pour éviter une erreur si $regions n'est pas défini --}}
                                @foreach($regions as $region)
                                    {{-- Assurez-vous que votre modèle Region a un attribut 'nom_region' ou adaptez le nom --}}
                                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom_region ?? $region->id }} {{-- Affiche nom_region si disponible, sinon l'ID --}}
                                    </option>
                                @endforeach
                                @else
                                    <option value="" disabled>Aucune région disponible</option>
                                @endif
                            </select>
                            @error('region_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Champ Type d'Université (Public/Privé) --}}
                        <div>
                            <span class="block text-sm font-medium text-gray-700 mb-2">Type d'Université</span>
                            <div class="flex gap-6">
                                <div class="flex items-center space-x-2">
                                    <input type="radio" name="type" id="type_public" value="public"
                                           class="h-4 w-4 border-gray-300 text-custom-primary focus:ring-custom-primary"
                                        {{-- Utilise 'public' comme défaut si old('type') est vide, correspondant au default de la migration --}}
                                        {{ old('type', 'public') == 'public' ? 'checked' : '' }}>
                                    <label for="type_public" class="text-sm font-medium text-gray-700">Public</label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input type="radio" name="type" id="type_prive" value="prive"
                                           class="h-4 w-4 border-gray-300 text-custom-primary focus:ring-custom-primary"
                                        {{ old('type') == 'prive' ? 'checked' : '' }}>
                                    <label for="type_prive" class="text-sm font-medium text-gray-700">Privé</label>
                                </div>
                            </div>
                            @error('type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Bouton de soumission --}}
                    <div class="mt-8 flex justify-center">
                        <button type="submit" class="px-8 py-2 bg-custom-primary hover:bg-custom-dark text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                            Créer l'Université
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
