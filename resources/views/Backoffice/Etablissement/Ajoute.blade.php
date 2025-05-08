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
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom de l'Établissement</label>
                                        <input type="text" name="nom" id="nom"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Entrez le nom de l'établissement" value="{{ old('nom') }}">
                                        @error('nom')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="abreviation" class="block text-sm font-medium text-gray-700">Abréviation</label>
                                        <input type="text" name="abreviation" id="abreviation"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Ex: EST, FST" value="{{ old('abreviation') }}" maxlength="20">
                                        @error('abreviation')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                                        <select name="ville" id="ville"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50">
                                            <option value="">Sélectionnez Ville</option>
                                            @foreach($villes as $ville)
                                                <option value="{{$ville->name}}" {{ old('ville') == $ville->name ? 'selected' : '' }}>{{$ville->value}}</option>
                                            @endforeach
                                        </select>
                                        @error('ville')
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
                                                    {{ $region->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('region_id')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                                    <input type="text" name="adresse" id="adresse"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="Entrez l'adresse complète" value="{{ old('adresse') }}">
                                    @error('adresse')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

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

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="site_web" class="block text-sm font-medium text-gray-700">Site Web</label>
                                        <input type="url" name="site_web" id="site_web"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="https://www.exemple.com" value="{{ old('site_web') }}">
                                        @error('site_web')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="site_inscription" class="block text-sm font-medium text-gray-700">Site d'Inscription</label>
                                        <input type="url" name="site_inscription" id="site_inscription"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="https://inscription.exemple.com" value="{{ old('site_inscription') }}">
                                        @error('site_inscription')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="universite_id" class="block text-sm font-medium text-gray-700">Université</label>
                                        <select name="universite_id" id="universite_id"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50">
                                            <option value="">Sélectionnez Université</option>
                                            @foreach($universites as $universite)
                                                <option value="{{$universite->id}}" {{ old('universite_id') == $universite->id ? 'selected' : '' }}>{{$universite->nom}}</option>
                                            @endforeach
                                        </select>
                                        @error('universite_id')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
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
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="contact@etablissement.com" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="nombre_etudiant" class="block text-sm font-medium text-gray-700">Nombre d'Étudiants</label>
                                        <input type="number" name="nombre_etudiant" id="nombre_etudiant" min="0"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Entrez le nombre d'étudiants" value="{{ old('nombre_etudiant') }}">
                                        @error('nombre_etudiant')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="frais_scolarite" class="block text-sm font-medium text-gray-700">Frais de Scolarité (MAD)</label>
                                        <input type="number" name="frais_scolarite" id="frais_scolarite" min="0" step="0.01"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Ex: 50000" value="{{ old('frais_scolarite') }}">
                                        @error('frais_scolarite')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <span class="block text-sm font-medium text-gray-700 mb-2">Type d'École</span>
                                        <div class="flex gap-6">
                                            <div class="flex items-center space-x-2">
                                                <input type="radio" name="TypeEcole" id="public" value="public"
                                                       class="h-4 w-4 border-gray-300 text-custom-primary focus:ring-custom-primary"
                                                    {{ old('TypeEcole', 'public') == 'public' ? 'checked' : '' }}>
                                                <label for="public" class="text-sm font-medium text-gray-700">Public</label>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <input type="radio" name="TypeEcole" id="prive" value="prive"
                                                       class="h-4 w-4 border-gray-300 text-custom-primary focus:ring-custom-primary"
                                                    {{ old('TypeEcole') == 'prive' ? 'checked' : '' }}>
                                                <label for="prive" class="text-sm font-medium text-gray-700">Privé</label>
                                            </div>
                                        </div>
                                        @error('TypeEcole')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="diplome_type" class="block text-sm font-medium text-gray-700">Type de Diplôme Principal</label>
                                        <input type="text" name="diplome_type" id="diplome_type"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Ex: Ingénieur d'état, Master" value="{{ old('diplome_type') }}">
                                        @error('diplome_type')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="reputation" class="block text-sm font-medium text-gray-700">Réputation (Score)</label>
                                        <input type="number" name="reputation" id="reputation" min="0" max="10" step="0.1"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               placeholder="Score de 0 à 10" value="{{ old('reputation') }}">
                                        @error('reputation')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="pt-7">
                                        <label for="seuil_actif" class="flex items-center text-sm font-medium text-gray-700">
                                            <input type="checkbox" name="seuil_actif" id="seuil_actif" value="1"
                                                   class="h-4 w-4 rounded border-gray-300 text-custom-primary focus:ring-custom-primary"
                                                   {{ old('seuil_actif') ? 'checked' : '' }} onchange="toggleSeuilField()">
                                            <span class="ml-2">Activer le seuil d'admission</span>
                                        </label>
                                        @error('seuil_actif')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div id="seuil_field_container" class="{{ old('seuil_actif') ? '' : 'hidden' }}">
                                    <label for="seuil" class="block text-sm font-medium text-gray-700">Seuil d'Admission (Note /20)</label>
                                    <input type="number" name="seuil" id="seuil" min="0" max="20" step="0.01"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                           placeholder="Ex: 14.5" value="{{ old('seuil') }}">
                                    @error('seuil')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="date_ouverture_inscription" class="block text-sm font-medium text-gray-700">Date d'Ouverture des Inscriptions</label>
                                        <input type="date" name="date_ouverture_inscription" id="date_ouverture_inscription"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               value="{{ old('date_ouverture_inscription') }}">
                                        @error('date_ouverture_inscription')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="date_limite_inscription" class="block text-sm font-medium text-gray-700">Date Limite des Inscriptions</label>
                                        <input type="date" name="date_limite_inscription" id="date_limite_inscription"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                               value="{{ old('date_limite_inscription') }}">
                                        @error('date_limite_inscription')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="flex flex-col items-center space-y-6">
                            <!-- Photo de l'établissement -->
                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-2 text-center">Photo de l'établissement</span>
                                <div class="w-32 h-32 rounded-full bg-custom-primary flex items-center justify-center mb-2 relative overflow-hidden">
                                    <img id="preview-image" src="{{ old('image_preview_path', asset('images/placeholder.jpg')) }}" alt="Photo de l'établissement"
                                         class="w-full h-full object-cover {{ old('image_preview_path') ? '' : 'hidden' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white {{ old('image_preview_path') ? 'hidden' : '' }}" id="camera-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <label for="image" class="cursor-pointer text-center text-sm text-custom-primary block">
                                    Ajouter Photo
                                    <input id="image" name="image" type="file" accept="image/*" class="hidden">
                                </label>
                                @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nouveau: Logo de l'établissement -->
                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-2 text-center">Logo de l'établissement</span>
                                <div class="w-32 h-32 rounded-lg bg-gray-100 flex items-center justify-center mb-2 relative overflow-hidden border-2 border-dashed border-gray-300">
                                    <img id="preview-logo" src="{{ old('logo_preview_path', asset('images/placeholder-logo.jpg')) }}" alt="Logo de l'établissement"
                                         class="w-full h-full object-contain {{ old('logo_preview_path') ? '' : 'hidden' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 {{ old('logo_preview_path') ? 'hidden' : '' }}" id="logo-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Réseaux sociaux</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
                                <input type="url" name="facebook" id="facebook"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                       placeholder="https://facebook.com/..." value="{{ old('facebook') }}">
                                @error('facebook')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
                                <input type="url" name="instagram" id="instagram"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                       placeholder="https://instagram.com/..." value="{{ old('instagram') }}">
                                @error('instagram')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn</label>
                                <input type="url" name="linkedin" id="linkedin"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                       placeholder="https://linkedin.com/..." value="{{ old('linkedin') }}">
                                @error('linkedin')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description de l'Établissement</label>
                        <textarea name="description" id="description" rows="4"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary bg-gray-50"
                                  placeholder="Décrivez l'établissement...">{{ old('description') }}</textarea>
                        @error('description')
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
        document.getElementById('image').addEventListener('change', function(e) { // Changed 'photo' to 'image'
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

        // Script to toggle seuil field
        function toggleSeuilField() {
            const seuilActifCheckbox = document.getElementById('seuil_actif');
            const seuilFieldContainer = document.getElementById('seuil_field_container');
            const seuilInput = document.getElementById('seuil');

            if (seuilActifCheckbox.checked) {
                seuilFieldContainer.classList.remove('hidden');
            } else {
                seuilFieldContainer.classList.add('hidden');
                seuilInput.value = ''; // Clear the value if unchecked
            }
        }
        // Call it on page load in case of old input
        document.addEventListener('DOMContentLoaded', toggleSeuilField);
    </script>
@endsection
