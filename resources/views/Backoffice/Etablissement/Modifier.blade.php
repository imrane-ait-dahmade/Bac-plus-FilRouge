@extends('Layouts.App')

@section('content')

    <div class="container mx-auto px-4 py-8 sm:py-12">

        <form id="FormEdit" action="{{ route('etablissement.update', ['etablissement' => $etablissement->id]) }}" method="post" enctype="multipart/form-data" class="my-8 bg-white p-6 sm:p-8 md:p-10 rounded-xl shadow-lg w-full max-w-5xl mx-auto border border-gray-200">
            @csrf
            @method('PUT')

            {{-- En-tête du formulaire --}}
            <div class="flex flex-col sm:flex-row items-center mb-10 pb-6 border-b border-gray-200">
                <img src="{{ $etablissement->logo ? asset('storage/' . $etablissement->logo) : 'https://ui-avatars.com/api/?name=' . urlencode($etablissement->nom ?? 'E') . '&background=e8f5e9&color=388e3c&size=64&font-size=0.5&bold=true' }}" alt="Logo Actuel" class="mr-0 sm:mr-6 mb-4 sm:mb-0 w-20 h-20 object-contain rounded-md border border-gray-200 p-1 flex-shrink-0">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 text-center sm:text-left">Modifier l'Établissement</h2>
                    <p class="text-sm text-gray-500 mt-1 text-center sm:text-left">Mettez à jour les informations de <span class="font-medium text-custom-green-primary">{{ $etablissement->nom ?? "l'établissement" }}</span>.</p>
                </div>
            </div>

            {{-- Section: Informations Générales --}}
            <section class="mb-10">
                <h3 class="text-lg font-semibold text-gray-700 mb-6 pb-2 border-b border-gray-200 flex items-center">
                    <span class="w-2 h-2 bg-custom-green-primary rounded-full mr-3"></span>
                    Informations Générales
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                    <div class="md:col-span-2">
                        <label for="nom" class="form-label">Nom de l'Établissement <span class="text-red-500">*</span></label>
                        <input type="text" id="nom" name="nom" class="input-style" value="{{ old('nom', $etablissement->nom) }}" required>
                        @error('nom') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="abreviation" class="form-label">Abréviation</label>
                        <input type="text" id="abreviation" name="abreviation" class="input-style" value="{{ old('abreviation', $etablissement->abreviation) }}" placeholder="Ex: EST, FST">
                        @error('abreviation') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="TypeEcole" class="form-label">Type d'École</label>
                        <select id="TypeEcole" name="TypeEcole" class="input-style">
                            <option value="">-- Sélectionner le type --</option>
                            <option value="public" {{ old('TypeEcole', $etablissement->TypeEcole) == 'public' ? 'selected' : '' }}>Public</option>
                            <option value="prive" {{ old('TypeEcole', $etablissement->TypeEcole) == 'prive' ? 'selected' : '' }}>Privé</option>
                        </select>
                        @error('TypeEcole') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="nombre_etudiant" class="form-label">Nombre d'Étudiants (approx.)</label>
                        <input type="number" id="nombre_etudiant" name="nombre_etudiant" class="input-style" value="{{ old('nombre_etudiant', $etablissement->nombre_etudiant) }}" placeholder="Ex: 5000" min="0">
                        @error('nombre_etudiant') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="universite_id" class="form-label">Université de Rattachement</label>
                        <select id="universite_id" name="universite_id" class="input-style">
                            <option value="">-- Sélectionner une université --</option>
                            @isset($universites)
                                @foreach($universites as $univ)
                                    <option value="{{ $univ->id }}" {{ old('universite_id', $etablissement->universite_id) == $univ->id ? 'selected' : '' }}>
                                        {{ $univ->nom }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('universite_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="resau" class="form-label">Réseau</label>
                        <input type="text" id="resau" name="resau" class="input-style" value="{{ old('resau', $etablissement->resau) }}" placeholder="Ex: Groupe XYZ, Réseau ABC...">
                        @error('resau') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="4" class="input-style">{{ old('description', $etablissement->description) }}</textarea>
                        @error('description') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </section>

            {{-- Section: Localisation --}}
            <section class="mb-10">
                <h3 class="text-lg font-semibold text-gray-700 mb-6 pb-2 border-b border-gray-200 flex items-center">
                    <span class="w-2 h-2 bg-custom-green-primary rounded-full mr-3"></span>
                    Localisation
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    <div>
                        <label for="region_id" class="form-label">Région</label>
                        <select id="region_id" name="region_id" class="input-style">
                            <option value="">-- Sélectionner une région --</option>
                            @isset($regions)
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id', $etablissement->region_id) == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('region_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="ville" class="form-label">Ville</label>
                        <select id="ville" name="ville" class="input-style">
                            <option value="">-- Sélectionner une ville --</option>
                            @isset($villes)
                                @foreach($villes as $ville_enum_case)
                                    <option value="{{ $ville_enum_case->name }}" {{ old('ville', $etablissement->ville) == $ville_enum_case->name ? 'selected' : '' }}>
                                        {{ $ville_enum_case->value }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('ville') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="adresse" class="form-label">Adresse Postale</label>
                        <textarea id="adresse" name="adresse" rows="2" class="input-style" placeholder="Numéro, Rue, Quartier...">{{ old('adresse', $etablissement->adresse) }}</textarea>
                        @error('adresse') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </section>

            {{-- Section: Coordonnées & Contact --}}
            <section class="mb-10">
                <h3 class="text-lg font-semibold text-gray-700 mb-6 pb-2 border-b border-gray-200 flex items-center">
                    <span class="w-2 h-2 bg-custom-green-primary rounded-full mr-3"></span>
                    Coordonnées & Contact
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    <div>
                        <label for="email" class="form-label">Email de Contact Principal</label>
                        <input type="email" id="email" name="email" class="input-style" value="{{ old('email', $etablissement->email) }}" placeholder="contact@exemple.com">
                        @error('email') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" class="input-style" value="{{ old('telephone', $etablissement->telephone) }}" placeholder="+212 5 xx xx xx xx">
                        @error('telephone') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="fax" class="form-label">Fax</label>
                        <input type="tel" id="fax" name="fax" class="input-style" value="{{ old('fax', $etablissement->fax) }}" placeholder="+212 5 xx xx xx xx">
                        @error('fax') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </section>

            {{-- Section: Présence en Ligne --}}
            <section class="mb-10">
                <h3 class="text-lg font-semibold text-gray-700 mb-6 pb-2 border-b border-gray-200 flex items-center">
                    <span class="w-2 h-2 bg-custom-green-primary rounded-full mr-3"></span>
                    Présence en Ligne
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    <div>
                        <label for="site_web" class="form-label">Site Web Officiel</label>
                        <input type="url" id="site_web" name="site_web" class="input-style" value="{{ old('site_web', $etablissement->site_web) }}" placeholder="https://www.exemple.com">
                        @error('site_web') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="site_inscription" class="form-label">Lien d'Inscription/Admission</label>
                        <input type="url" id="site_inscription" name="site_inscription" class="input-style" value="{{ old('site_inscription', $etablissement->site_inscription) }}" placeholder="https://inscription.exemple.com">
                        @error('site_inscription') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="facebook" class="form-label">Page Facebook</label>
                        <input type="url" id="facebook" name="facebook" class="input-style" value="{{ old('facebook', $etablissement->facebook) }}" placeholder="https://facebook.com/exemple">
                        @error('facebook') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="instagram" class="form-label">Profil Instagram</label>
                        <input type="url" id="instagram" name="instagram" class="input-style" value="{{ old('instagram', $etablissement->instagram) }}" placeholder="https://instagram.com/exemple">
                        @error('instagram') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label for="linkedin" class="form-label">Page LinkedIn</label>
                        <input type="url" id="linkedin" name="linkedin" class="input-style" value="{{ old('linkedin', $etablissement->linkedin) }}" placeholder="https://linkedin.com/company/exemple">
                        @error('linkedin') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </section>

            {{-- Section: Informations Complémentaires --}}
            <section class="mb-10">
                <h3 class="text-lg font-semibold text-gray-700 mb-6 pb-2 border-b border-gray-200 flex items-center">
                    <span class="w-2 h-2 bg-custom-green-primary rounded-full mr-3"></span>
                    Informations Complémentaires
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    <div>
                        <label for="diplome_type" class="form-label">Type de Diplôme Principal</label>
                        <input type="text" id="diplome_type" name="diplome_type" class="input-style" value="{{ old('diplome_type', $etablissement->diplome_type) }}" placeholder="Ex: Ingénieur d'état, Master">
                        @error('diplome_type') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="reputation" class="form-label">Réputation (Score /10)</label>
                        <input type="number" id="reputation" name="reputation" class="input-style" value="{{ old('reputation', $etablissement->reputation) }}" placeholder="Ex: 8.5" step="0.1" min="0" max="10">
                        @error('reputation') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="frais_scolarite" class="form-label">Frais de Scolarité (MAD)</label>
                        <input type="number" id="frais_scolarite" name="frais_scolarite" class="input-style" value="{{ old('frais_scolarite', $etablissement->frais_scolarite) }}" placeholder="Ex: 50000" min="0" step="0.01">
                        @error('frais_scolarite') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-x-6 gap-y-5 items-center">
                        <div class="sm:col-span-1 flex items-center">
                            <input type="checkbox" id="seuil_actif" name="seuil_actif" value="1" class="h-4 w-4 rounded border-gray-300 text-custom-green-primary focus:ring-custom-green-primary shadow-sm" {{ old('seuil_actif', $etablissement->seuil_actif) ? 'checked' : '' }}>
                            <label for="seuil_actif" class="ml-2 text-sm font-medium text-gray-700 cursor-pointer">Seuil d'admission actif</label>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="seuil" class="form-label sr-only">Seuil (Note /20)</label>
                            <input type="number" id="seuil" name="seuil" class="input-style" value="{{ old('seuil', $etablissement->seuil) }}" placeholder="Seuil (Ex: 14.50)" step="0.01" min="0" max="20" {{ !(old('seuil_actif', $etablissement->seuil_actif)) ? 'disabled' : '' }}>
                            @error('seuil') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                        @error('seuil_actif') <span class="error-message md:col-span-3">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="date_ouverture_inscription" class="form-label">Date Ouverture Inscriptions</label>
                        <input type="date" id="date_ouverture_inscription" name="date_ouverture_inscription" class="input-style" value="{{ old('date_ouverture_inscription', $etablissement->date_ouverture_inscription ? \Carbon\Carbon::parse($etablissement->date_ouverture_inscription)->format('Y-m-d') : '') }}">
                        @error('date_ouverture_inscription') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="date_limite_inscription" class="form-label">Date Limite Inscriptions</label>
                        <input type="date" id="date_limite_inscription" name="date_limite_inscription" class="input-style" value="{{ old('date_limite_inscription', $etablissement->date_limite_inscription ? \Carbon\Carbon::parse($etablissement->date_limite_inscription)->format('Y-m-d') : '') }}">
                        @error('date_limite_inscription') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </section>

            {{-- Section: Fichiers --}}
            <section class="mb-10">
                <h3 class="text-lg font-semibold text-gray-700 mb-6 pb-2 border-b border-gray-200 flex items-center">
                    <span class="w-2 h-2 bg-custom-green-primary rounded-full mr-3"></span>
                    Logo & Image de Présentation
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <div class="space-y-2">
                        <label for="logo" class="form-label">Logo de l'établissement</label>
                        <div class="flex items-center space-x-3">
                            <img id="logo_preview" src="{{ $etablissement->logo ? asset('storage/' . $etablissement->logo) : 'https://ui-avatars.com/api/?name=' . urlencode($etablissement->nom ?? 'L') . '&background=e8f5e9&color=388e3c&size=64&font-size=0.5&bold=true' }}" alt="Aperçu du logo" class="w-16 h-16 object-contain border border-gray-200 rounded-md p-0.5 flex-shrink-0">
                            <div class="flex-grow">
                                <input id="logo" type="file" accept="image/jpeg,image/png,image/jpg" name="logo" class="file-input-style" onchange="previewFile(this, 'logo_preview', '{{ 'https://ui-avatars.com/api/?name=' . urlencode($etablissement->nom ?? 'L') . '&background=e8f5e9&color=388e3c&size=64&font-size=0.5&bold=true' }}')">
                                <p class="text-xs text-gray-500 mt-1">JPG, PNG. Max 2Mo. Laisser vide pour ne pas changer.</p>
                            </div>
                        </div>
                        @error('logo') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="image" class="form-label">Image principale</label>
                        <div class="flex items-center space-x-3">
                            <img id="image_preview" src="{{ $etablissement->image ? asset('storage/' . $etablissement->image) : 'https://via.placeholder.com/150x100/e8f5e9/388e3c?text=Image' }}" alt="Aperçu de l'image" class="w-24 h-[72px] object-cover border border-gray-200 rounded-md p-0.5 flex-shrink-0"> {{-- Adjusted height for aspect ratio --}}
                            <div class="flex-grow">
                                <input id="image" type="file" accept="image/jpeg,image/png,image/jpg" name="image" class="file-input-style" onchange="previewFile(this, 'image_preview', '{{ 'https://via.placeholder.com/150x100/e8f5e9/388e3c?text=Image' }}')">
                                <p class="text-xs text-gray-500 mt-1">JPG, PNG. Max 2Mo. Laisser vide pour ne pas changer.</p>
                            </div>
                        </div>
                        @error('image') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </section>

            {{-- Pied de page du formulaire - Boutons --}}
            <div class="mt-10 pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-end items-center space-y-3 sm:space-y-0 sm:space-x-3">
                <a href="{{ route('etablisement_infos', $etablissement->id) }}" {{-- Changed route as requested --}}
                class="w-full sm:w-auto px-6 py-2.5 text-center bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 transition duration-150 ease-in-out text-sm font-medium border border-gray-300">
                    Annuler
                </a>
                <button type="submit"
                        class="px-8 py-2 bg-custom-primary hover:bg-custom-dark text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span>Enregistrer les Modifications</span>
                </button>
            </div>
        </form>
    </div>

    @push('styles')
        <style>
            /* Définissez vos couleurs vertes ici si elles ne sont pas dans tailwind.config.js */
            :root {
                --custom-green-primary-color: #4CAF50; /* Votre vert principal */
                --custom-green-dark-color: #388E3C;   /* Votre vert foncé pour hover */
            }
            .bg-custom-green-primary { background-color: var(--custom-green-primary-color); }
            .hover\:bg-custom-green-dark:hover { background-color: var(--custom-green-dark-color); }
            .text-custom-green-primary { color: var(--custom-green-primary-color); }
            .focus\:ring-custom-green-primary:focus {
                --tw-ring-color: var(--custom-green-primary-color);
            }
            .text-custom-green-primary { /* Pour les checkboxes */
                color: var(--custom-green-primary-color);
            }


            .form-label {
                @apply block text-sm font-medium text-gray-600 mb-1; /* Réduction de la marge en bas */
            }
            .input-style {
                @apply block w-full border-gray-300 rounded-md shadow-sm py-2 px-3
                text-sm text-gray-700 bg-white
                focus:outline-none focus:ring-1 focus:ring-custom-green-primary focus:border-custom-green-primary transition duration-150 ease-in-out
                placeholder-gray-400;
            }
            .input-style[disabled] {
                @apply bg-gray-50 cursor-not-allowed opacity-70;
            }
            .input-style[type="number"]::-webkit-inner-spin-button,
            .input-style[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            .input-style[type="number"] {
                -moz-appearance: textfield;
            }
            select.input-style {
                @apply pr-8 bg-no-repeat;
                background-image: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="%239ca3af" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6 8 4 4 4-4"/></svg>'); /* Flèche plus discrète */
                background-position: right 0.5rem center;
                background-size: 1.25em 1.25em;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }
            .input-style[type="file"] { @apply p-0; } /* Important pour le style du file: pseudo-élément */

            .file-input-style {
                @apply block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none
                file:mr-3 file:py-2 file:px-3 file:rounded-l-md file:border-0 file:text-sm file:font-medium
                file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition duration-150 ease-in-out;
            }
            textarea.input-style {
                @apply min-h-[80px] leading-snug;
            }
            .error-message {
                @apply text-red-600 text-xs mt-1;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const seuilActifCheckbox = document.getElementById('seuil_actif');
                const seuilInput = document.getElementById('seuil');

                function toggleSeuilInput() {
                    if (seuilInput && seuilActifCheckbox) {
                        seuilInput.disabled = !seuilActifCheckbox.checked;
                        if (!seuilActifCheckbox.checked) {
                            // seuilInput.value = '';
                        }
                    }
                }

                if (seuilActifCheckbox) {
                    seuilActifCheckbox.addEventListener('change', toggleSeuilInput);
                    toggleSeuilInput();
                }
            });

            function previewFile(input, previewId, defaultSrc) {
                const file = input.files[0];
                const preview = document.getElementById(previewId);

                if (file && preview) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                } else if (preview && defaultSrc) {
                    // Si on veut remettre le placeholder si l'utilisateur vide sa sélection (difficile à détecter nativement)
                    // ou si input.value est vide (ce qui arrive après une soumission échouée sans re-sélection)
                    // preview.src = defaultSrc; // Utilisez avec prudence pour ne pas écraser une image existante inutilement
                }
            }
        </script>
    @endpush

@endsection
