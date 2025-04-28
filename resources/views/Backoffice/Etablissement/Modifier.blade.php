@extends('Layouts.App')

@section('content')

    <div class="container mx-auto px-4 py-8 sm:py-12">

        {{-- Le conteneur principal du formulaire avec une ombre plus douce et des coins arrondis plus prononcés --}}
        <form id="FormEdit" action="{{ route('etablissement.update', $etablissement->id) }}" method="post" enctype="multipart/form-data" class="my-8 bg-white p-6 sm:p-8 md:p-10 rounded-2xl shadow-lg w-full max-w-5xl mx-auto border border-gray-100">
            @csrf
            @method('PUT') {{-- Important pour la route update --}}

            {{-- En-tête du formulaire --}}
            <div class="flex flex-col sm:flex-row items-center mb-8 pb-4 border-b border-gray-200">
                {{-- Display current logo or fallback --}}
                <img src="{{ $etablissement->logo ? asset('storage/' . $etablissement->logo) : 'https://ui-avatars.com/api/?name=' . urlencode($etablissement->nometablissement ?? 'E') . '&background=e0e7ff&color=4f46e5&size=64' }}" alt="Logo Actuel" class="mr-0 sm:mr-5 mb-4 sm:mb-0 w-16 h-16 object-contain rounded-md border border-indigo-100 flex-shrink-0">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center sm:text-left">Modifier l'Établissement</h2>
                    <p class="text-sm text-gray-500 mt-1 text-center sm:text-left">Mettez à jour les informations de <span class="font-medium text-indigo-600">{{ $etablissement->nometablissement ?? 'l\'établissement' }}</span>.</p>
                </div>
            </div>

            {{-- Section: Informations Générales --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Informations Générales</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                    {{-- Nom Etablissement (Required) --}}
                    <div class="md:col-span-2">
                        <label for="nometablissement" class="block text-sm font-medium text-gray-600 mb-1">Nom de l'Établissement <span class="text-red-500">*</span></label>
                        <input type="text" id="nometablissement" name="nometablissement" class="input-style" value="{{ old('nometablissement', $etablissement->nometablissement) }}" required>
                        @error('nometablissement') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- TypeEcole (Nullable String) --}}
                    <div>
                        <label for="TypeEcole" class="block text-sm font-medium text-gray-600 mb-1">Type d'École</label>
                        <input type="text" id="TypeEcole" name="TypeEcole" class="input-style" value="{{ old('TypeEcole', $etablissement->TypeEcole ?? '') }}" placeholder="Ex: Public, Privé, Grande École...">
                        @error('TypeEcole') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Nombre Etudiant (Nullable Integer) --}}
                    <div>
                        <label for="nombreEtudiant" class="block text-sm font-medium text-gray-600 mb-1">Nombre d'Étudiants (approx.)</label>
                        <input type="number" id="nombreEtudiant" name="nombreEtudiant" class="input-style" value="{{ old('nombreEtudiant', $etablissement->nombreEtudiant ?? '') }}" placeholder="Ex: 5000">
                        @error('nombreEtudiant') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Université (Nullable String) --}}
                    <div>
                        <label for="universite" class="block text-sm font-medium text-gray-600 mb-1">Université de Rattachement (si applicable)</label>
                        <input type="text" id="universite" name="universite" class="input-style" value="{{ old('universite', $etablissement->universite ?? '') }}" placeholder="Nom de l'université">
                        @error('universite') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Réseau (Nullable String) --}}
                    <div>
                        <label for="resau" class="block text-sm font-medium text-gray-600 mb-1">Réseau</label>
                        <input type="text" id="resau" name="resau" class="input-style" value="{{ old('resau', $etablissement->resau ?? '') }}" placeholder="Ex: Groupe XYZ, Réseau ABC...">
                        @error('resau') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Description Etablissement (Nullable String) --}}
                    <div class="md:col-span-2">
                        <label for="descirptionetablissement" class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                        <textarea id="descirptionetablissement" name="descirptionetablissement" rows="4" class="input-style">{{ old('descirptionetablissement', $etablissement->descirptionetablissement ?? '') }}</textarea>
                        @error('descirptionetablissement') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>

            {{-- Section: Localisation --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Localisation</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                    {{-- Région (Nullable Exists) --}}
                    <div>
                        <label for="region_id" class="block text-sm font-medium text-gray-600 mb-1">Région</label>
                        <select id="region_id" name="region_id" class="input-style">
                            <option value="">-- Sélectionner une région --</option>
                            {{-- Assurez-vous que $regions est passé à la vue depuis le contrôleur --}}
                            @isset($regions)
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id', $etablissement->region_id) == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom_region ?? $region->name }} {{-- Adaptez 'nom_region' ou 'name' selon votre modèle Region --}}
                                    </option>
                                @endforeach
                            @else
                                <option value="" disabled>Liste des régions non disponible</option>
                            @endisset
                        </select>
                        @error('region_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Ville Etablissement (Nullable String) --}}
                    <div>
                        <label for="villeEtablissement" class="block text-sm font-medium text-gray-600 mb-1">Ville</label>
                        <input type="text" id="villeEtablissement" name="villeEtablissement" class="input-style" value="{{ old('villeEtablissement', $etablissement->villeEtablissement ?? '') }}">
                        @error('villeEtablissement') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Adresse Etablissement (Nullable String) --}}
                    <div class="md:col-span-2">
                        <label for="adresseEtablissement" class="block text-sm font-medium text-gray-600 mb-1">Adresse Postale</label>
                        <input type="text" id="adresseEtablissement" name="adresseEtablissement" class="input-style" value="{{ old('adresseEtablissement', $etablissement->adresseEtablissement ?? '') }}">
                        {{-- Ou utiliser une textarea si l'adresse peut être longue :
                        <textarea id="adresseEtablissement" name="adresseEtablissement" rows="3" class="input-style">{{ old('adresseEtablissement', $etablissement->adresseEtablissement ?? '') }}</textarea>
                        --}}
                        @error('adresseEtablissement') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Section: Coordonnées & Contact --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Coordonnées & Contact</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                    {{-- Email (Nullable Email) --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-600 mb-1">Email de Contact Principal</label>
                        <input type="email" id="email" name="email" class="input-style" value="{{ old('email', $etablissement->email ?? '') }}" placeholder="contact@exemple.com">
                        @error('email') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Téléphone (Nullable String) --}}
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-600 mb-1">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" class="input-style" value="{{ old('telephone', $etablissement->telephone ?? '') }}" placeholder="+212 5 xx xx xx xx">
                        @error('telephone') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Fax (Nullable String) --}}
                    <div>
                        <label for="fax" class="block text-sm font-medium text-gray-600 mb-1">Fax</label>
                        <input type="tel" id="fax" name="fax" class="input-style" value="{{ old('fax', $etablissement->fax ?? '') }}" placeholder="+212 5 xx xx xx xx">
                        @error('fax') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>

            {{-- Section: Présence en Ligne --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Présence en Ligne</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                    {{-- Site Web (Nullable URL) --}}
                    <div>
                        <label for="siteWeb" class="block text-sm font-medium text-gray-600 mb-1">Site Web Officiel</label>
                        <input type="url" id="siteWeb" name="siteWeb" class="input-style" value="{{ old('siteWeb', $etablissement->siteWeb ?? '') }}" placeholder="https://www.exemple.com">
                        @error('siteWeb') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Site Inscription (Nullable URL) --}}
                    <div>
                        <label for="siteInscription" class="block text-sm font-medium text-gray-600 mb-1">Lien d'Inscription/Admission</label>
                        <input type="url" id="siteInscription" name="siteInscription" class="input-style" value="{{ old('siteInscription', $etablissement->siteInscription ?? '') }}" placeholder="https://inscription.exemple.com">
                        @error('siteInscription') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Facebook (Nullable URL) --}}
                    <div>
                        <label for="facebook" class="block text-sm font-medium text-gray-600 mb-1">Page Facebook</label>
                        <input type="url" id="facebook" name="facebook" class="input-style" value="{{ old('facebook', $etablissement->facebook ?? '') }}" placeholder="https://facebook.com/exemple">
                        @error('facebook') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Instagram (Nullable URL) --}}
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-600 mb-1">Profil Instagram</label>
                        <input type="url" id="instagram" name="instagram" class="input-style" value="{{ old('instagram', $etablissement->instagram ?? '') }}" placeholder="https://instagram.com/exemple">
                        @error('instagram') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- LinkedIn (Nullable URL) --}}
                    <div class="md:col-span-2"> {{-- LinkedIn on full width if needed --}}
                        <label for="linkedin" class="block text-sm font-medium text-gray-600 mb-1">Page LinkedIn</label>
                        <input type="url" id="linkedin" name="linkedin" class="input-style" value="{{ old('linkedin', $etablissement->linkedin ?? '') }}" placeholder="https://linkedin.com/company/exemple">
                        @error('linkedin') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Section: Fichiers --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Logo & Image</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">

                    {{-- Logo Upload (Nullable Image) --}}
                    <div class="space-y-2">
                        <label for="logo" class="block text-sm font-medium text-gray-600">Logo</label>
                        <div class="flex items-center space-x-4">
                            {{-- Display current logo or fallback --}}
                            <img src="{{ $etablissement->logo ? asset('storage/' . $etablissement->logo) : 'https://ui-avatars.com/api/?name=' . urlencode($etablissement->nometablissement ?? 'L') . '&background=e0e7ff&color=4f46e5&size=64' }}" alt="Logo Actuel" class="w-16 h-16 object-contain border border-gray-200 rounded-md p-1 flex-shrink-0">
                            <div>
                                <input id="logo" type="file" accept="image/jpeg,image/png,image/jpg" name="logo" class="file-input-style">
                                <p class="text-xs text-gray-500 mt-1">JPG, PNG, JPEG. Max 2Mo.</p>
                            </div>
                        </div>
                        @error('logo') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Image Upload (Nullable Image) --}}
                    <div class="space-y-2">
                        <label for="image" class="block text-sm font-medium text-gray-600">Image de Présentation</label>
                        <div class="flex items-center space-x-4">
                            {{-- Display current image or fallback --}}
                            <img src="{{ $etablissement->image ? asset('storage/' . $etablissement->image) : 'https://via.placeholder.com/150x100/e0e7ff/4f46e5?text=Image' }}" alt="Image Actuelle" class="w-24 h-16 object-cover border border-gray-200 rounded-md p-1 flex-shrink-0">
                            <div>
                                <input id="image" type="file" accept="image/jpeg,image/png,image/jpg" name="image" class="file-input-style">
                                <p class="text-xs text-gray-500 mt-1">JPG, PNG, JPEG. Max 2Mo.</p> {{-- Adjusted max size to match rules --}}
                            </div>
                        </div>
                        @error('image') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Pied de page du formulaire - Boutons --}}
            <div class="mt-10 pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-end items-center space-y-3 sm:space-y-0 sm:space-x-4">
                {{-- Lien Annuler --}}
                <a href="{{ route('etablissementsAccesAdmin') }}" {{-- Or use url()->previous() if preferred --}} class="w-full sm:w-auto px-6 py-2.5 text-center bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-150 ease-in-out text-sm font-medium">
                    Annuler
                </a>
                {{-- Bouton Soumettre --}}
                <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out text-sm font-medium flex items-center justify-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span>Enregistrer les Modifications</span>
                </button>
            </div>

        </form>
    </div>

    {{-- Styles spécifiques pour les inputs (peut être mis dans un fichier CSS si préféré) --}}
    @push('styles')
        <style>
            .input-style {
                @apply block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 /* Adjusted padding */ text-sm text-gray-700
                focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out
                placeholder-gray-400;
            }
            /* Style for number input arrows */
            .input-style[type="number"]::-webkit-inner-spin-button,
            .input-style[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            .input-style[type="number"] {
                -moz-appearance: textfield; /* Firefox */
            }

            /* Style for select */
            select.input-style {
                @apply pr-8; /* Add space for the dropdown arrow */
                background-image: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="%236b7280" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6 8 4 4 4-4"/></svg>');
                background-position: right 0.5rem center;
                background-repeat: no-repeat;
                background-size: 1.25em 1.25em;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }


            .input-style[type="file"] { @apply p-0; } /* Reset padding for file */

            .file-input-style {
                @apply block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none
                file:mr-3 file:py-2 file:px-3 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold
                file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition duration-150 ease-in-out;
            }

            textarea.input-style {
                @apply min-h-[80px]; /* Give textarea a bit more default height */
            }

            .error-message {
                @apply text-red-600 text-xs mt-1;
            }
        </style>
    @endpush

@endsection
