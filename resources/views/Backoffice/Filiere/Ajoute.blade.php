@extends('Layouts.App')

@section('content')
    <div class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 min-h-screen py-8 px-4">
        <div class="max-w-2xl mx-auto">

            {{-- Lien de retour --}}
            <div class="mb-6">
                <a href="{{ url()->previous() }}" {{-- Simple retour à la page précédente --}}
                class="inline-flex items-center text-sm font-medium text-custom-dark hover:text-green-700 transition group">
                    <svg class="w-5 h-5 mr-2 text-custom-dark group-hover:text-green-600 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour
                </a>
            </div>


            <form action="{{ route('filiere.store' ,['domaine'=>$domaine])}}" method="POST" class="bg-white rounded-xl shadow-2xl p-6 sm:p-8 space-y-6">
                @csrf
                {{-- Pas besoin de @method('POST') car c'est la méthode par défaut pour les formulaires --}}
                {{-- Mais si vous l'utilisez par convention, c'est OK. method="POST" dans <form> suffit. --}}

                {{-- Si domaine_id est passé dans l'URL, et que le contrôleur le récupère, --}}
                {{-- Ou si vous devez le passer explicitement via le formulaire (par exemple, à partir d'une variable $domaine_id) : --}}
                @if(request()->has('domaine_id') || isset($domaine_id_from_controller))
                    <input type="hidden" name="domaine_id" value="{{ request()->get('domaine_id', $domaine_id_from_controller ?? '') }}">
                @endif

                <div class="flex items-center space-x-3 mb-8 border-b border-gray-200 pb-6">
                    <div class="bg-custom-primary p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.25c-5.53 0-10 2.014-10 4.5s4.47 4.5 10 4.5c5.521 0 9.992-2.019 10-4.509.005-2.482-4.478-4.491-9.998-4.491zm0 7c-4.418 0-8-1.567-8-3.5S7.582 2.25 12 2.25s8 1.567 8 3.5-3.582 3.5-8 3.5z"/>
                            <path d="M12 12.248c-5.521 0-9.992-2.019-10-4.509V10.5c0 2.486 4.47 4.5 10 4.5s10-2.014 10-4.5V7.739c-.008 2.49-4.479 4.509-10 4.509z"/>
                            <path d="M12 15.752c-5.521 0-9.992-2.019-10-4.509V13.5c0 2.486 4.47 4.5 10 4.5s10-2.014 10-4.5v-2.257c-.008 2.49-4.479 4.509-10 4.509z"/>
                            <path d="M4.75 12H19.25C19.25 14.076 16.014 15.75 12 15.75S4.75 14.076 4.75 12zm0 0c0-1.632.977-3.066 2.461-3.839A14.897 14.897 0 0112 7.5c1.764 0 3.457.305 5.027.861A4.453 4.453 0 0119.25 12M3.313 10.594A16.015 16.015 0 0012 12c2.742 0 5.299-.695 7.407-1.813.493-.258.645-.878.316-1.346l-.697-.988C18.757 7.381 18.02 7.002 17.173 7H6.827c-.847.002-1.584.381-1.852.853l-.697.988c-.329.468-.177 1.088.316 1.346A16.012 16.012 0 003 10.5H3.313z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800">Nouvelle Filière</h2>
                </div>


                {{-- Champ Nom --}}
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom de la filière <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        value="{{ old('nom') }}"
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
                            <option value="" disabled {{ old('Niveau') ? '' : 'selected' }}>Sélectionner un niveau</option>
                            <option value="Prépa" {{ old('Niveau') == 'Prépa' ? 'selected' : '' }}>Prépa</option>
                            <option value="Mise à niveau" {{ old('Niveau') == 'Mise à niveau' ? 'selected' : '' }}>Mise à niveau</option>
                            <option value="BTS" {{ old('Niveau') == 'BTS' ? 'selected' : '' }}>BTS</option>
                            <option value="DUT" {{ old('Niveau') == 'DUT' ? 'selected' : '' }}>DUT</option>
                            <option value="DEUST" {{ old('Niveau') == 'DEUST' ? 'selected' : '' }}>DEUST</option>
                            <option value="Licence" {{ old('Niveau') == 'Licence' ? 'selected' : '' }}>Licence</option>
                            <option value="Licence Pro" {{ old('Niveau') == 'Licence Pro' ? 'selected' : '' }}>Licence Pro</option>
                            <option value="Master" {{ old('Niveau') == 'Master' ? 'selected' : '' }}>Master</option>
                            <option value="Mastere Specialise" {{ old('Niveau') == 'Mastere Specialise' ? 'selected' : '' }}>Mastere Specialise</option>
                            <option value="Doctorat" {{ old('Niveau') == 'Doctorat' ? 'selected' : '' }}>Doctorat</option>
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
                            value="{{ old('duree') }}"
                            placeholder="Ex: 3"
                            min="1"
                            max="7"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('duree') border-red-500 @enderror"
                        >
                        @error('duree') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>



                {{-- Champ ConditionsAdmission --}}
                <div class="sm:col-span-2">
                    <label for="ConditionsAdmission" class="block text-sm font-medium text-gray-700 mb-1">Conditions d'admission <span class="text-red-500">*</span></label>
                    <textarea
                        id="ConditionsAdmission"
                        name="ConditionsAdmission"
                        rows="4"
                        placeholder="Ex: Bac S mention Bien, concours d'entrée, dossier..."
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('ConditionsAdmission') border-red-500 @enderror"
                        required
                    >{{ old('ConditionsAdmission') }}</textarea>
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
                    >{{ old('debouches_metiers') }}</textarea>
                    @error('debouches_metiers') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Champ Description (optionnel, à voir si besoin car tu avais 'description' dans l'ancien formulaire) --}}
                {{--
                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description (optionnel)</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        placeholder="Décrivez plus en détail la filière, ses objectifs, etc."
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-3 focus:border-custom-dark focus:ring focus:ring-custom-light focus:ring-opacity-50 @error('description') border-red-500 @enderror"
                    >{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                --}}


                <div class="pt-6">
                    <button type="submit" class="w-full bg-custom-primary text-white py-3 px-6 rounded-lg font-semibold text-lg hover:bg-custom-dark transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-dark shadow-md hover:shadow-lg">
                        Créer la Filière
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
