@extends('Layouts.App')

@section('content')
    <div class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 min-h-screen py-8 px-4">
        <div class="max-w-2xl mx-auto">

            {{-- Lien de retour --}}
            <div class="mb-6">

                <a href="{{ route('filiere.show', ['filiere'=>$filiere , 'domaine' =>$domaine]) }}" {{-- Retour vers la page de détails de la filière --}}
                class="inline-flex items-center text-sm font-medium text-custom-dark hover:text-green-700 transition group">
                    <svg class="w-5 h-5 mr-2 text-custom-dark group-hover:text-green-600 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour aux détails
                </a>
            </div>

            <form action="{{ route('filiere.update', $filiere) }}" method="POST" class="bg-white rounded-xl shadow-2xl p-6 sm:p-8 space-y-6">
                @csrf
                @method('PUT') {{-- Méthode pour la mise à jour --}}

                <div class="flex items-center space-x-3 mb-8 border-b border-gray-200 pb-6">
                    <div class="bg-custom-primary p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800">Modifier la Filière</h2>
                </div>

                {{-- Champ Nom --}}
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom de la filière <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        value="{{ old('nom', $filiere->nom) }}" {{-- Utilise old() puis la valeur actuelle --}}
                        placeholder="Ex: Génie Logiciel et Systèmes d'Information"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('nom') border-red-500 @enderror"
                        required
                    >
                    @error('nom') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    {{-- Champ Niveau --}}
                    <div>
                        <label for="Niveau" class="block text-sm font-medium text-gray-700 mb-1">Niveau <span class="text-red-500">*</span></label>
                        <select
                            id="Niveau"
                            name="Niveau"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('Niveau') border-red-500 @enderror"
                            required
                        >
                            <option value="" disabled>Sélectionner un niveau</option>
                            @php
                                $niveaux = ['Prépa', 'Mise à niveau', 'BTS', 'DUT', 'DEUST', 'Licence', 'Licence Pro', 'Master', 'Mastere Specialise', 'Doctorat'];
                            @endphp
                            @foreach ($niveaux as $niveauOption)
                                <option value="{{ $niveauOption }}" {{ old('Niveau', $filiere->Niveau) == $niveauOption ? 'selected' : '' }}>
                                    {{ $niveauOption }}
                                </option>
                            @endforeach
                        </select>
                        @error('Niveau') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Champ Durée --}}
                    <div>
                        <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Durée (en années)</label>
                        <input
                            type="number"
                            id="duree"
                            name="duree"
                            value="{{ old('duree', $filiere->duree) }}"
                            placeholder="Ex: 3"
                            min="1"
                            max="7"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('duree') border-red-500 @enderror"
                        >
                        @error('duree') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Champ Domaine --}}
                <div>
                    <label for="domaine_id" class="block text-sm font-medium text-gray-700 mb-1">Domaine <span class="text-red-500">*</span></label>
                    <select
                        id="domaine_id"
                        name="domaine_id"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('domaine_id') border-red-500 @enderror"
                        required
                    >
                        <option value="" disabled>Sélectionner un domaine</option>
                        @foreach ($domaines as $domaine) {{-- Assurez-vous de passer $domaines à la vue --}}
                        <option value="{{ $domaine->id }}" {{ old('domaine_id', $filiere->domaine_id) == $domaine->id ? 'selected' : '' }}>
                            {{ $domaine->domaine }} {{-- ou $domaine->nomDomaine selon votre table domaines --}}
                        </option>
                        @endforeach
                    </select>
                    @error('domaine_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>


                <div class="sm:col-span-2">
                    <label for="ConditionsAdmission" class="block text-sm font-medium text-gray-700 mb-1">Conditions d'admission <span class="text-red-500">*</span></label>
                    <textarea
                        id="ConditionsAdmission"
                        name="ConditionsAdmission"
                        rows="4"
                        placeholder="Ex: Bac S mention Bien, concours d'entrée, dossier..."
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('ConditionsAdmission') border-red-500 @enderror"
                        required
                    >{{ old('ConditionsAdmission', $filiere->ConditionsAdmission) }}</textarea>
                    @error('ConditionsAdmission') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Champ Debouches et Metiers --}}
                <div class="sm:col-span-2">
                    <label for="debouches_metiers" class="block text-sm font-medium text-gray-700 mb-1">Débouchés et Métiers</label>
                    <textarea
                        id="debouches_metiers"
                        name="debouches_metiers"
                        rows="4"
                        placeholder="Ex: Ingénieur R&D, Chef de projet, Consultant IT, Data Scientist..."
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('debouches_metiers') border-red-500 @enderror"
                    >{{ old('debouches_metiers', $filiere->debouches_metiers) }}</textarea>
                    @error('debouches_metiers') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Champ Description (Optionnel, si votre table 'filieres' l'a toujours) --}}
                @if (Schema::hasColumn('filieres', 'description')) {{-- Vérifie si la colonne existe --}}
                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description (optionnel)</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        placeholder="Décrivez plus en détail la filière, ses objectifs, etc."
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('description') border-red-500 @enderror"
                    >{{ old('description', $filiere->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                @endif

                <div class="pt-6 flex justify-end">
                    <a href="{{ route('filiere.show', ['filiere' => $filiere->id , 'domaine' => $filiere->domaine_id]) }}" class="bg-gray-200 text-gray-700 py-3 px-6 rounded-lg font-semibold text-lg hover:bg-gray-300 transition duration-200 ease-in-out mr-3">
                        Annuler
                    </a>
                    <button type="submit" class="bg-custom-primary text-white py-3 px-6 rounded-lg font-semibold text-lg hover:bg-custom-dark transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-dark shadow-md hover:shadow-lg">
                        Enregistrer les Modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- N'oubliez pas d'importer Schema en haut de votre fichier blade si vous utilisez Schema::hasColumn directement: --}}
{{-- @php use Illuminate\Support\Facades\Schema; @endphp --}}
{{-- Cependant, il est préférable de gérer la présence de ce champ via le contrôleur si possible, ou d'être sûr de son existence --}}
