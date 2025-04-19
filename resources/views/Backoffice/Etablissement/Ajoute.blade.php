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
                                    <input type="text" name="nometablissement" id="nomEtablissement"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="Entrez le nom de l'établissement" value="{{ old('nometablissement') }}">
                                    @error('nometablissement')
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

                                <!-- Nouveaux champs: Téléphone et Fax -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                        <input type="tel" name="telephone" id="telephone"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Ex: +212 5XX XX XX XX" value="{{ old('telephone') }}">
                                        @error('telephone')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="fax" class="block text-sm font-medium text-gray-700">Fax</label>
                                        <input type="tel" name="fax" id="fax"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Ex: +212 5XX XX XX XX" value="{{ old('fax') }}">
                                        @error('fax')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nouveaux champs: Site Web et Site d'Inscription -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="siteWeb" class="block text-sm font-medium text-gray-700">Site Web</label>
                                        <input type="url" name="siteWeb" id="siteWeb"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="https://www.exemple.com" value="{{ old('siteWeb') }}">
                                        @error('siteWeb')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="siteInscription" class="block text-sm font-medium text-gray-700">Site d'Inscription</label>
                                        <input type="url" name="siteInscription" id="siteInscription"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="https://inscription.exemple.com" value="{{ old('siteInscription') }}">
                                        @error('siteInscription')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="Universite" class="block text-sm font-medium text-gray-700">Université</label>
                                        <select name="Unversite" id="Universite"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50">
                                            <option value="">Sélectionnez Universite</option>
                                            @foreach($universites as $universite)
                                                <option value="{{$universite->name}}">{{$universite->value}}</option>
                                            @endforeach
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

                                <!-- Nouveau champ: Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="contact@etablissement.com" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
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

                        <div class="flex flex-col items-center space-y-6">
                            <!-- Photo de l'établissement -->
                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-2 text-center">Photo de l'établissement</span>
                                <div class="w-32 h-32 rounded-full bg-custom-primary flex items-center justify-center mb-2 relative overflow-hidden">
                                    <img id="preview-image" src="{{ asset('images/placeholder.jpg') }}" alt="Photo de l'établissement"
                                         class="w-full h-full object-cover hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" id="camera-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <label for="photo" class="cursor-pointer text-center text-sm text-custom-primary block">
                                    Ajouter Photo
                                    <input id="photo" name="photo" type="file" accept="image/*" class="hidden">
                                </label>
                                @error('photo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nouveau: Logo de l'établissement -->
                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-2 text-center">Logo de l'établissement</span>
                                <div class="w-32 h-32 rounded-lg bg-gray-100 flex items-center justify-center mb-2 relative overflow-hidden border-2 border-dashed border-gray-300">
                                    <img id="preview-logo" src="{{ asset('images/placeholder-logo.jpg') }}" alt="Logo de l'établissement"
                                         class="w-full h-full object-contain hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" id="logo-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <label for="logo" class="cursor-pointer text-center text-sm text-custom-primary block">
                                    Ajouter Logo
                                    <input id="logo" name="logo" type="file" accept="image/*" class="hidden">
                                </label>
                                @error('logo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Nouveaux champs: Réseaux sociaux -->
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Réseaux sociaux</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
                                <input type="url" name="facebook" id="facebook"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                       placeholder="https://facebook.com/..." value="{{ old('facebook') }}">
                            </div>
                            <div>
                                <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
                                <input type="url" name="instagram" id="instagram"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                       placeholder="https://instagram.com/..." value="{{ old('instagram') }}">
                            </div>
                            <div>
                                <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn</label>
                                <input type="url" name="linkedin" id="linkedin"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                       placeholder="https://linkedin.com/..." value="{{ old('linkedin') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="DescirptionEtablissement" class="block text-sm font-medium text-gray-700">Description de l'Établissement</label>
                        <textarea name="descirptionetablissement" id="descirptionetablissement" rows="4"
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

        // Script pour prévisualiser le logo
        document.getElementById('logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewLogo = document.getElementById('preview-logo');
                    previewLogo.src = e.target.result;
                    previewLogo.classList.remove('hidden');
                    document.getElementById('logo-icon').classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
