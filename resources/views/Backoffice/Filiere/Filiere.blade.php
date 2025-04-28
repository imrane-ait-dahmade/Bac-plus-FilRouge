@extends('Layouts.App')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <div class="max-w-4xl mx-auto"> {{-- Limite la largeur pour une meilleure lisibilité --}}

            {{-- Bouton Retour --}}
            <div class="mb-6">
                <a href="{{ route('filieres') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition group">
                    <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour à la liste des filières
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-lg overflow-hidden">

                {{-- Card Header: Title & Action Buttons --}}
                <div class="bg-gradient-to-r from-blue-50 to-indigo-100 px-6 py-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                            {{-- Icon for Filiere/Academic --}}
                            <svg class="w-6 h-6 mr-3 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222 4 2.222V20M8 12.5l4 2.222 4-2.222" />
                            </svg>
                            {{ $filiere->nomfiliere }}
                        </h1>
                        <p class="mt-1 text-sm text-gray-600">Détails de la filière</p>
                    </div>
                    <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5 flex space-x-3">
                        {{-- Bouton Modifier --}}
                        <a href="{{ route('filiere.edit', $filiere->id) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition ease-in-out duration-150">
                            <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Modifier
                        </a>

                        {{-- Bouton Supprimer (avec confirmation) --}}
                        <form action="{{ route('filiere.delete', $filiere->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ? Cette action est irréversible.');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Card Body: Details --}}
                <div class="px-6 py-8">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                        {{-- Nom Filiere --}}
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2l-7 7-7-7m14-4l-3 3m0 0l-3-3m3 3v6" />
                                </svg>
                                Nom de la Filière
                            </dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $filiere->nomfiliere }}</dd>
                        </div>

                        {{-- Niveau --}}
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                                Niveau
                            </dt>
                            <dd class="mt-1 text-lg text-gray-800">
                           <span class="inline-flex items-center px-3 py-0.5 rounded-full text-base font-medium bg-indigo-100 text-indigo-800">
                               {{ $filiere->Niveau }}
                           </span>
                            </dd>
                        </div>

                        {{-- Description --}}
                        <div class="sm:col-span-2 pt-6 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Description
                            </dt>
                            {{-- Utilisation de `prose` pour un meilleur rendu du texte potentiellement long --}}
                            <dd class="mt-2 text-base text-gray-600 prose max-w-none">
                                {!! nl2br(e($filiere->description)) !!} {{-- nl2br pour respecter les sauts de ligne, e() pour échapper --}}
                            </dd>
                        </div>

                        {{-- Ajoutez ici d'autres détails si nécessaire, par exemple : --}}
                        {{--
                        <div class="sm:col-span-1 pt-6 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500">Département</dt>
                            <dd class="mt-1 text-lg text-gray-900">{{ $filiere->departement->nom ?? 'Non spécifié' }}</dd>
                        </div>
                         <div class="sm:col-span-1 pt-6 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500">Conditions d'Admission</dt>
                            <dd class="mt-1 text-lg text-gray-900">{{ $filiere->ConditionsAdmission ?? 'Non spécifiées' }}</dd>
                        </div>
                        --}}

                    </dl>
                </div>

            </div> {{-- Fin Card --}}
        </div> {{-- Fin Max Width Container --}}
    </div> {{-- Fin Container global --}}

    {{-- Si vous utilisez le plugin Tailwind Typography (@tailwindcss/typography) pour la classe `prose` --}}
    {{-- Assurez-vous qu'il est installé et configuré dans votre `tailwind.config.js` --}}

    {{-- Les scripts commentés pour le formulaire popup ne sont pas inclus ici,
       car la demande se concentrait sur l'amélioration du design de la page de détails existante.
       Si vous souhaitez réintégrer une fonctionnalité de popup pour l'édition,
       cela nécessitera une approche différente (probablement Alpine.js ou un framework JS). --}}
@endsection
