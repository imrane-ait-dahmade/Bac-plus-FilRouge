@extends('Layouts.App')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-6">Créer une Nouvelle Université</h2>

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                {{-- Assurez-vous que cette route existe dans votre fichier web.php --}}
                {{-- Route::post('/universites', [UniversiteController::class, 'store'])->name('universites.store'); --}}
                <form action="{{ route('universites.store') }}" method="POST" enctype="multipart/form-data">
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
                                   placeholder="Entrez le nom du directeur" value="{{ old('directeur') }}" required>
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
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('region_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Champ Type d'Université --}}
                        <div>
                            <span class="block text-sm font-medium text-gray-700 mb-2">Type d'Université</span>
                            <div class="flex gap-6">
                                <div class="flex items-center space-x-2">
                                    <input type="radio" name="type" id="type_public" value="public"
                                           class="h-4 w-4 border-gray-300 text-custom-primary focus:ring-custom-primary"
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

                        {{-- Champ Logo --}}
                        <div>
                            <label for="logo" class="block text-sm font-medium text-gray-700">Logo de l'Université</label>
                            <input type="file" name="logo" id="logo"
                                   class="mt-1 block w-full text-sm text-gray-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-md file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-custom-primary file:text-white
                                          hover:file:bg-custom-dark">
                            @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Boutons --}}
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('universites.index') }}" 
                           class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary">
                            Annuler
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-custom-primary hover:bg-custom-dark text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                            Créer l'Université
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
