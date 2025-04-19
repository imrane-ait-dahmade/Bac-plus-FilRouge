@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-6">Détails de l'Établissement</h2>

                <form action="{{ route('etablissements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <div class="space-y-6">
                                <div>
                                    <label for="nomEtablissement" class="block text-sm font-medium text-gray-700">Nom de l'Établissement</label>
                                    <input type="text" name="nomEtablissement" id="nomEtablissement"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="Entrez le nom de l'établissement" value="{{ old('nomEtablissement') }}">
                                    @error('nomEtablissement')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="domaine" class="block text-sm font-medium text-gray-700">Domaine</label>
                                    <input type="text" name="domaine" id="domaine"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="Ex: Sciences, Ingénierie, Commerce, etc." value="{{ old('domaine') }}">
                                    @error('domaine')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="villeEtablissement" class="block text-sm font-medium text-gray-700">Ville</label>
                                        <input type="text" name="villeEtablissement" id="villeEtablissement"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Entrez la ville" value="{{ old('villeEtablissement') }}">
                                        @error('villeEtablissement')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="region_id" class="block text-sm font-medium text-gray-700">Région</label>
                                        <select name="region_id" id="region_id"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50">
                                            <option value="">Sélectionnez une région</option>
                                            @foreach($regions as $region)
                                                <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                                    {{ $region->nom_region }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('region_id')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="adresseEtablissement" class="block text-sm font-medium text-gray-700">Adresse</label>
                                    <input type="text" name="adresseEtablissement" id="adresseEtablissement"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="Entrez l'adresse complète" value="{{ old('adresseEtablissement') }}">
                                    @error('adresseEtablissement')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
{{--                                    <div>--}}
{{--                                        <label for="Universite" class="block text-sm font-medium text-gray-700">Université</label>--}}
{{--                                        <input type="text" name="Universite" id="Universite"--}}
{{--                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"--}}
{{--                                               placeholder="Entrez l'université" value="{{ old('Universite') }}">--}}
{{--                                        @error('Universite')--}}
{{--                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
                                    <div>
                                        <label for="Universite" class="block text-sm font-medium text-gray-700">Université</label>
                                 <select name="Univrsite" id="Universite_id"  >

                                 </select>
                                    </div>

                                    <div>
                                        <label for="resau" class="block text-sm font-medium text-gray-700">Réseau</label>
                                        <input type="text" name="resau" id="resau"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Entrez le réseau" value="{{ old('resau') }}">
                                        @error('resau')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="nombreEtudiant" class="block text-sm font-medium text-gray-700">Nombre d'Étudiants</label>
                                    <input type="number" name="nombreEtudiant" id="nombreEtudiant"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="Entrez le nombre d'étudiants" value="{{ old('nombreEtudiant') }}">
                                    @error('nombreEtudiant')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <span class="block text-sm font-medium text-gray-700 mb-2">Type d'École</span>
                                    <div class="flex gap-6">
                                        <div class="flex items-center space-x-2">
                                            <input type="radio" name="TypeEcole" id="public" value="Public"
                                                   class="h-4 w-4 border-gray-300 text-custom-primary focus:ring-custom-primary"
                                                {{ old('TypeEcole', 'Public') == 'Public' ? 'checked' : '' }}>
                                            <label for="public" class="text-sm font-medium text-gray-700">Public</label>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <input type="radio" name="TypeEcole" id="private" value="Private"
                                                   class="h-4 w-4 border-gray-300 text-custom-primary focus:ring-custom-primary"
                                                {{ old('TypeEcole') == 'Private' ? 'checked' : '' }}>
                                            <label for="private" class="text-sm font-medium text-gray-700">Privé</label>
                                        </div>
                                    </div>
                                    @error('TypeEcole')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 rounded-full bg-custom-primary flex items-center justify-center mb-2 relative overflow-hidden">
                                <img id="preview-image" src="{{ asset('images/placeholder.jpg') }}" alt="Photo de l'établissement"
                                     class="w-full h-full object-cover hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" id="camera-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <label for="photo" class="cursor-pointer text-center text-sm text-custom-primary">
                                Ajouter Photo
                                <input id="photo" name="photo" type="file" accept="image/*" class="hidden">
                            </label>
                            @error('photo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="DescirptionEtablissement" class="block text-sm font-medium text-gray-700">Description de l'Établissement</label>
                        <textarea name="DescirptionEtablissement" id="DescirptionEtablissement" rows="4"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                  placeholder="Décrivez l'établissement...">{{ old('DescirptionEtablissement') }}</textarea>
                        @error('DescirptionEtablissement')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-8 flex justify-center">
                        <button type="submit" class="px-8 py-2 bg-custom-primary hover:bg-custom-dark text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                            Enregistrer & Continuer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Script pour prévisualiser l'image
        document.getElementById('photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('preview-image');
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    document.getElementById('camera-icon').classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
