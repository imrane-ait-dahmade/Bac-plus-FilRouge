@extends('Layouts.App')

@section('content')

    <div class="container mx-auto px-4 py-8 sm:py-12">

        {{-- Le conteneur principal du formulaire avec une ombre plus douce et des coins arrondis plus prononcés --}}
        <form id="FormEdit" action="{{ route('etablissement.update', $etablissement->id) }}" method="post" enctype="multipart/form-data" class="my-8 bg-white p-6 sm:p-8 md:p-10 rounded-2xl shadow-lg w-full max-w-5xl mx-auto border border-gray-100">
            @csrf
            @method('PUT')

            {{-- En-tête du formulaire --}}
            <div class="flex flex-col sm:flex-row items-center mb-8 pb-4 border-b border-gray-200">
                <img src="{{ $etablissement->logo ?? 'https://ui-avatars.com/api/?name=' . urlencode($etablissement->nometablissement ?? 'E') . '&background=e0e7ff&color=4f46e5&size=64' }}" alt="Logo Actuel" class="mr-0 sm:mr-5 mb-4 sm:mb-0 w-16 h-16 object-cover rounded-full border border-indigo-100 flex-shrink-0">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center sm:text-left">Modifier l'Établissement</h2>
                    <p class="text-sm text-gray-500 mt-1 text-center sm:text-left">Mettez à jour les informations de <span class="font-medium text-indigo-600">{{ $etablissement->nometablissement ?? 'l\'établissement' }}</span>.</p>
                </div>
            </div>

            {{-- Section: Informations Générales --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Informations Générales</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    {{-- Nom Etablissement (Span 2 cols if needed on md) --}}
                    <div class="md:col-span-2">
                        <label for="nometablissement" class="block text-sm font-medium text-gray-600 mb-1">Nom de l'Établissement <span class="text-red-500">*</span></label>
                        <input id="nometablissement" name="nometablissement" class="input-style" value="{{ old('nometablissement', $etablissement->nometablissement) }}" required>
                        @error('nometablissement') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Abréviation --}}
                    <div>
                        <label for="abreviation" class="block text-sm font-medium text-gray-600 mb-1">Abréviation</label>
                        <input id="abreviation" name="abreviation" class="input-style" value="{{ old('abreviation', $etablissement->abreviation ?? '') }}">
                        @error('abreviation') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Année Fondation --}}
                    <div>
                        <label for="annee_fondation" class="block text-sm font-medium text-gray-600 mb-1">Année de Fondation</label>
                        <input id="annee_fondation" type="number" name="annee_fondation" class="input-style" value="{{ old('annee_fondation', $etablissement->annee_fondation ?? '') }}" placeholder="Ex: 1995">
                        @error('annee_fondation') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Description (Span 2 cols) --}}
                    <div class="md:col-span-2">
                        <label for="descirptionetablissement" class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                        <textarea id="descirptionetablissement" name="descirptionetablissement" rows="4" class="input-style">{{ old('descirptionetablissement', $etablissement->descirptionetablissement) }}</textarea>
                        @error('descirptionetablissement') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Type École --}}
                    <div>
                        <label for="typeecole_id" class="block text-sm font-medium text-gray-600 mb-1">Type d'École</label>
                        <select id="typeecole_id" name="typeecole_id" class="input-style">
                            <option value="">Sélectionner un type...</option>
                            {{-- Boucle décommentée et exemple d'utilisation --}}
                            {{-- @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ old('typeecole_id', $etablissement->typeecole_id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->nom_type ?? $type->name }}
                                </option>
                            @endforeach --}}
                            {{-- Exemple statique si $types n'est pas disponible --}}
                            <option value="1" {{ old('typeecole_id', $etablissement->typeecole_id) == 1 ? 'selected' : '' }}>Public</option>
                            <option value="2" {{ old('typeecole_id', $etablissement->typeecole_id) == 2 ? 'selected' : '' }}>Privé</option>
                        </select>
                        @error('typeecole_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Nombre Étudiants --}}
                    <div>
                        <label for="nombreetudiant" class="block text-sm font-medium text-gray-600 mb-1">Nombre d'Étudiants (approx.)</label>
                        <input id="nombreetudiant" type="number" name="nombreetudiant" class="input-style" value="{{ old('nombreetudiant', $etablissement->nombreetudiant ?? '') }}" placeholder="Ex: 5000">
                        @error('nombreetudiant') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Université (si applicable) --}}
                    <div>
                        <label for="universite_id" class="block text-sm font-medium text-gray-600 mb-1">Université de Rattachement</label>
                        <select id="universite_id" name="universite_id" class="input-style">
                            <option value="">Sélectionner une université...</option>
                            {{-- Boucle décommentée et exemple --}}
                            {{-- @foreach($universites as $universite)
                                <option value="{{ $universite->id }}" {{ old('universite_id', $etablissement->universite_id) == $universite->id ? 'selected' : '' }}>
                                    {{ $universite->nom_universite ?? $universite->name }}
                                </option>
                            @endforeach --}}
                            {{-- Exemple statique --}}
                            <option value="1" {{ old('universite_id', $etablissement->universite_id) == 1 ? 'selected' : '' }}>Université Exemple A</option>
                            <option value="2" {{ old('universite_id', $etablissement->universite_id) == 2 ? 'selected' : '' }}>Université Exemple B</option>
                        </select>
                        @error('universite_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Réseau --}}
                    <div>
                        <label for="resau" class="block text-sm font-medium text-gray-600 mb-1">Réseau</label>
                        <input id="resau" name="resau" class="input-style" value="{{ old('resau', $etablissement->resau) }}">
                        @error('resau') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>

            {{-- Section: Localisation --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Localisation</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    {{-- Région --}}
                    <div>
                        <label for="region_id" class="block text-sm font-medium text-gray-600 mb-1">Région <span class="text-red-500">*</span></label>
                        <select id="region_id" name="region_id" class="input-style" required>
                            <option value="">Sélectionner une région...</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}" {{ old('region_id', $etablissement->region_id) == $region->id ? 'selected' : '' }}>
                                    {{ $region->nom_region ?? $region->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('region_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Ville --}}
                    <div>
                        <label for="villeetablissement" class="block text-sm font-medium text-gray-600 mb-1">Ville <span class="text-red-500">*</span></label>
                        <input id="villeetablissement" name="villeetablissement" class="input-style" value="{{ old('villeetablissement', $etablissement->villeetablissement) }}" required>
                        @error('villeetablissement') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Adresse (Span 2 cols) --}}
                    <div class="md:col-span-2">
                        <label for="adresseetablissement" class="block text-sm font-medium text-gray-600 mb-1">Adresse Postale</label>
                        <input id="adresseetablissement" name="adresseetablissement" class="input-style" value="{{ old('adresseetablissement', $etablissement->adresseetablissement) }}">
                        @error('adresseetablissement') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Section: Coordonnées & Contact --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Coordonnées & Contact</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    {{-- Email Contact --}}
                    <div>
                        <label for="email_contact" class="block text-sm font-medium text-gray-600 mb-1">Email de Contact</label>
                        <input id="email_contact" type="email" name="email_contact" class="input-style" value="{{ old('email_contact', $etablissement->email_contact ?? '') }}" placeholder="contact@exemple.com">
                        @error('email_contact') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Téléphone --}}
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-600 mb-1">Téléphone</label>
                        <input id="telephone" name="telephone" class="input-style" value="{{ old('telephone', $etablissement->telephone ?? '') }}" placeholder="+212 5 xx xx xx xx">
                        @error('telephone') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Fax --}}
                    <div>
                        <label for="fax" class="block text-sm font-medium text-gray-600 mb-1">Fax</label>
                        <input id="fax" name="fax" class="input-style" value="{{ old('fax', $etablissement->fax ?? '') }}" placeholder="+212 5 xx xx xx xx">
                        @error('fax') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Directeur --}}
                    <div>
                        <label for="directeur" class="block text-sm font-medium text-gray-600 mb-1">Nom du Directeur/Responsable</label>
                        <input id="directeur" name="directeur" class="input-style" value="{{ old('directeur', $etablissement->directeur ?? '') }}">
                        @error('directeur') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Section: Présence en Ligne --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Présence en Ligne</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    {{-- Site Web --}}
                    <div>
                        <label for="site_web" class="block text-sm font-medium text-gray-600 mb-1">Site Web Officiel</label>
                        <input id="site_web" type="url" name="site_web" class="input-style" value="{{ old('site_web', $etablissement->site_web ?? '') }}" placeholder="https://www.exemple.com">
                        @error('site_web') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Site Inscription --}}
                    <div>
                        <label for="site_inscription" class="block text-sm font-medium text-gray-600 mb-1">Lien d'Inscription/Admission</label>
                        <input id="site_inscription" type="url" name="site_inscription" class="input-style" value="{{ old('site_inscription', $etablissement->site_inscription ?? '') }}" placeholder="https://inscription.exemple.com">
                        @error('site_inscription') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Facebook --}}
                    <div>
                        <label for="facebook" class="block text-sm font-medium text-gray-600 mb-1">Page Facebook</label>
                        <input id="facebook" type="url" name="facebook" class="input-style" value="{{ old('facebook', $etablissement->facebook ?? '') }}" placeholder="https://facebook.com/exemple">
                        @error('facebook') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Instagram --}}
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-600 mb-1">Profil Instagram</label>
                        <input id="instagram" type="url" name="instagram" class="input-style" value="{{ old('instagram', $etablissement->instagram ?? '') }}" placeholder="https://instagram.com/exemple">
                        @error('instagram') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- LinkedIn --}}
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-600 mb-1">Page LinkedIn</label>
                        <input id="linkedin" type="url" name="linkedin" class="input-style" value="{{ old('linkedin', $etablissement->linkedin ?? '') }}" placeholder="https://linkedin.com/company/exemple">
                        @error('linkedin') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Section: Fichiers --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Logo & Image</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">
                    {{-- Logo Upload --}}
                    <div class="space-y-2">
                        <label for="logo" class="block text-sm font-medium text-gray-600">Logo</label>
                        <div class="flex items-center space-x-4">
                            <img src="{{ $etablissement->logo ?? 'https://ui-avatars.com/api/?name=' . urlencode($etablissement->nometablissement ?? 'L') . '&background=e0e7ff&color=4f46e5&size=64' }}" alt="Logo Actuel" class="w-16 h-16 object-contain border border-gray-200 rounded-md p-1 flex-shrink-0">
                            <input id="logo" type="file" accept="image/*" name="logo" class="file-input-style">
                        </div>
                        <p class="text-xs text-gray-500">Taille recommandée : Carré (ex: 200x200px). Max 2Mo.</p>
                        @error('logo') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    {{-- Image Upload --}}
                    <div class="space-y-2">
                        <label for="image" class="block text-sm font-medium text-gray-600">Image de Présentation</label>
                        <div class="flex items-center space-x-4">
                            <img src="{{ $etablissement->image ?? 'https://via.placeholder.com/150x100/e0e7ff/4f46e5?text=Image' }}" alt="Image Actuelle" class="w-24 h-16 object-cover border border-gray-200 rounded-md p-1 flex-shrink-0">
                            <input id="image" type="file" accept="image/*" name="image" class="file-input-style">
                        </div>
                        <p class="text-xs text-gray-500">Taille recommandée : Paysage (ex: 800x500px). Max 5Mo.</p>
                        @error('image') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Pied de page du formulaire - Boutons --}}
            <div class="mt-10 pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-end items-center space-y-3 sm:space-y-0 sm:space-x-4">
                {{-- Lien Annuler (redirige vers la page précédente ou une page spécifique) --}}
                <a href="{{ url()->previous() }}" class="w-full sm:w-auto px-6 py-2.5 text-center bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-150 ease-in-out text-sm font-medium">
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
                @apply block w-full border border-gray-300 rounded-lg shadow-sm py-2.5 px-4 text-sm text-gray-700
                focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out
                placeholder-gray-400;
            }
            .input-style[type="file"] { @apply p-0; } /* Reset padding for file */

            .file-input-style {
                @apply block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none
                file:mr-4 file:py-2.5 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold
                file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition duration-150 ease-in-out;
            }

            .error-message {
                @apply text-red-600 text-xs mt-1;
            }
        </style>
    @endpush

@endsection
