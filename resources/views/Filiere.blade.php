@extends('Layouts.App')

@section('content')
    <div class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 min-h-screen py-8">
        <div class="container mx-auto px-4">

            <div class="max-w-3xl mx-auto"> {{-- Limite la largeur pour la page de détail --}}

                {{-- Bouton Retour --}}
                <div class="mb-8">
                    {{-- Adaptez cette route : vers la liste de toutes les filières, ou les filières du domaine --}}
                    {{-- Exemple si on vient d'une page de domaine: --}}
                    {{-- <a href="{{ route('domaines.filieres.index', $filiere->domaine_id) }}" --}}
                    <a href="{{ url()->previous() }}" {{-- Simple retour à la page précédente --}}
                    class="inline-flex items-center text-sm font-medium text-custom-primary hover:text-green-900 transition group">
                        <svg class="w-5 h-5 mr-2 text-green-500 group-hover:text-custom-primary transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Retour
                    </a>
                </div>

                <div class="bg-white shadow-2xl rounded-xl overflow-hidden">

                    {{-- Card Header: Titre de la Filière & Domaine --}}
                    <div class="bg-custom-primary px-6 py-5 sm:px-8 sm:py-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-white flex items-start">
                                    {{-- Icone Grad Cap Vert pour Filiere --}}
                                    <svg class="w-8 h-8 mr-3 mt-1 text-white flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2.25c-5.53 0-10 2.014-10 4.5s4.47 4.5 10 4.5c5.521 0 9.992-2.019 10-4.509.005-2.482-4.478-4.491-9.998-4.491zm0 7c-4.418 0-8-1.567-8-3.5S7.582 2.25 12 2.25s8 1.567 8 3.5-3.582 3.5-8 3.5z"/>
                                        <path d="M12 12.248c-5.521 0-9.992-2.019-10-4.509V10.5c0 2.486 4.47 4.5 10 4.5s10-2.014 10-4.5V7.739c-.008 2.49-4.479 4.509-10 4.509z"/>
                                        <path d="M12 15.752c-5.521 0-9.992-2.019-10-4.509V13.5c0 2.486 4.47 4.5 10 4.5s10-2.014 10-4.5v-2.257c-.008 2.49-4.479 4.509-10 4.509z"/>
                                        <path d="M4.75 12H19.25C19.25 14.076 16.014 15.75 12 15.75S4.75 14.076 4.75 12zm0 0c0-1.632.977-3.066 2.461-3.839A14.897 14.897 0 0112 7.5c1.764 0 3.457.305 5.027.861A4.453 4.453 0 0119.25 12M3.313 10.594A16.015 16.015 0 0012 12c2.742 0 5.299-.695 7.407-1.813.493-.258.645-.878.316-1.346l-.697-.988C18.757 7.381 18.02 7.002 17.173 7H6.827c-.847.002-1.584.381-1.852.853l-.697.988c-.329.468-.177 1.088.316 1.346A16.012 16.012 0 003 10.5H3.313z" />
                                    </svg>
                                    <span>{{ $filiere->nom }}</span> {{-- Supposant que c'est 'nom' et non 'nomfiliere' --}}
                                </h1>
                                @if($filiere->domaine)
                                    <p class="mt-1 text-sm text-white">
                                        Domaine : <a href="{{ route('filieres.domaine', $filiere->domaine_id) }}" class="font-semibold hover:underline">{{ $filiere->domaine->domaine }}</a> {{-- Supposant 'domaine' dans la table 'domaines' --}}
                                    </p>
                                @endif
                            </div>
                            {{-- Boutons d'action (optionnel ici si la carte des filières les a déjà) --}}
                            <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5 flex space-x-3">
                                <a href="{{ route('filiere.edit', $filiere->id) }}" class="inline-flex items-center px-4 py-2 border border-green-300 text-sm font-medium rounded-md shadow-sm text-green-100 bg-custom-primary hover:bg-opacity-90 hover:border-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-custorm-primary focus:ring-white transition">
                                    <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                                    Modifier
                                </a>
                                <form action="{{ route('filiere.destroy', $filiere->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-red-300 text-sm font-medium rounded-md shadow-sm text-red-100 bg-red-600 hover:bg-red-700 hover:border-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-500 focus:ring-white transition">
                                        <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12.56 0c1.153 0 2.243.096 3.242.26m-5.384.748L5.79 5.79m10.766 0A48.354 48.354 0 0112 5.39c-2.18 0-4.24.295-6.126.841m12.252 0c.676.188 1.32.415 1.908.67L13.5 17.25S11.015 15 9 15c0 0-2.577 2.25-4.5 2.25"/></svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Card Body: Détails de la filière --}}
                    <div class="divide-y divide-gray-200">
                        <div class="px-6 py-7 sm:px-8">
                            <dl class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                {{-- Niveau --}}
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Niveau d'études</dt>
                                    <dd class="mt-1">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-base font-semibold bg-green-100 text-green-800">
                                        {{ $filiere->Niveau ?? 'Non spécifié' }}
                                    </span>
                                    </dd>
                                </div>

                                {{-- Durée --}}
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Durée</dt>
                                    <dd class="mt-1 text-lg font-semibold text-gray-700">{{ $filiere->duree ?? 'N/A' }} an(s)</dd>
                                </div>

                                {{-- Etablissement --}}
                                @if($filiere->etablissement)
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Établissement</dt>
                                        <dd class="mt-1 text-lg font-semibold text-gray-700 hover:text-custom-primary">
                                            {{-- Lien vers la page de l'établissement si elle existe --}}
                                            {{-- <a href="{{ route('etablissements.show', $filiere->etablissement_id) }}"> --}}
                                            {{ $filiere->etablissement->nom }}
                                            {{-- </a> --}}
                                        </dd>
                                        <dd class="text-sm text-gray-500">{{ $filiere->etablissement->ville }}</dd>
                                    </div>
                                @endif

                                {{-- Conditions d'admission --}}
                                <div class="sm:col-span-6 pt-6">
                                    <dt class="text-sm font-medium text-gray-500 mb-1">Conditions d'admission</dt>
                                    <dd class="text-base text-gray-700 leading-relaxed prose max-w-none">
                                        {!! nl2br(e($filiere->ConditionsAdmission ?: 'Informations non disponibles.')) !!}
                                    </dd>
                                </div>

                                {{-- Débouchés --}}
                                <div class="sm:col-span-6 pt-6">
                                    <dt class="text-sm font-medium text-gray-500 mb-1">Débouchés et Métiers</dt>
                                    <dd class="text-base text-gray-700 leading-relaxed prose max-w-none">
                                        {!! nl2br(e($filiere->debouches_metiers ?: 'Informations non disponibles.')) !!}
                                    </dd>
                                </div>

                                {{-- Description détaillée de la filière (si elle existe) --}}
                                @if($filiere->description) {{-- Vérifier si un champ description existe bien pour la filière --}}
                                <div class="sm:col-span-6 pt-6">
                                    <dt class="text-sm font-medium text-gray-500 mb-1">Description Complémentaire</dt>
                                    <dd class="text-base text-gray-700 leading-relaxed prose max-w-none">
                                        {!! nl2br(e($filiere->description)) !!}
                                    </dd>
                                </div>
                                @endif

                            </dl>
                        </div>
                    </div>

                </div> {{-- Fin Card --}}
            </div> {{-- Fin Max Width Container --}}
        </div> {{-- Fin Container global --}}
    </div> {{-- Fin Bg Gradient --}}

@endsection

{{--
    Tailwind Plugins recommandés:
    - @tailwindcss/typography (pour la classe `prose` qui améliore le rendu des blocs de texte)
    Pour l'installer : `npm install -D @tailwindcss/typography` ou `yarn add -D @tailwindcss/typography`
    Puis ajoutez-le à votre `tailwind.config.js` :
    ```javascript
    module.exports = {
      // ...
      plugins: [
        require('@tailwindcss/typography'),
        // ... autres plugins
      ],
    }
    ```
--}}
