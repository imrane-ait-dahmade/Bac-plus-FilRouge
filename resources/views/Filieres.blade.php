@extends('Layouts.App') {{-- Ou le nom de ton layout principal --}}

@section('content')
    <div class="container mx-auto px-4 py-8">

        {{-- Header Row: Titre dynamique du Domaine + Lien retour + Bouton Ajout (optionnel ici) --}}
        <div class="mb-10">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-3">
                <div>
                    <a href="{{ route('Domaines') }}" class="text-sm text-blue-600 hover:text-custom-dark hover:underline flex items-center mb-2">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        Retour aux Domaines
                    </a>
                    <h1 class="text-4xl font-bold text-gray-800">
                        Filières du Domaine : <span class="text-custom-dark">{{ $domaine->domaine }}</span>
                    </h1>
                </div>
                {{-- Bouton "Ajouter Filière" spécifique à ce domaine ? --}}
                {{-- Si la route 'filiere.create' peut prendre un 'domaine_id' en paramètre --}}
                {{-- Sinon, le bouton général suffit sur la page de toutes les filières --}}
                {{-- <a href="{{ route('filiere.create', ['domaine_id' => $domaine->id]) }}" --}}

                <a href="{{ route('filiere.create' ,['domaine' => $domaine->id]) }}"
                   class="mt-4 sm:mt-0 inline-flex items-center px-6 py-3 bg-custom-primary border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-custom-light active:bg-custom-dark focus:outline-none focus:border-custom-dark focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Ajouter une Filière
                </a>
            </div>
            @if($domaine->description)
                <p class="text-gray-600 mt-1 text-md">{{ $domaine->description }}</p>
            @endif
        </div>

        {{-- Affichage des messages de succès/erreur (si besoin ici) --}}
        {{-- ... (comme dans les autres vues) ... --}}


        {{-- Grid for Filiere Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10">

            @forelse ($filieres as $filiere)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 ease-in-out hover:shadow-2xl flex flex-col border-t-4 border-custom-dark"> {{-- Couleur d'accent bleue pour les filières --}}
                    <div class="p-6 flex flex-col flex-grow">

                        {{-- Titre et Niveau --}}
                        <div class="mb-3">
                            <h2 class="text-xl font-semibold text-gray-800 mb-1 leading-tight">{{ $filiere->nom }}</h2>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-custom-dark">
                         <svg class="w-3 h-3 mr-1.5 text-custom-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3.5a1 1 0 000 1.84L5.25 8.505V12a1 1 0 001 1h1.25a1 1 0 001-1v-3.495l1.75-.875V12a1 1 0 001 1h1.25a1 1 0 001-1v-3.495l3.071-1.536a1 1 0 000-1.84l-7-3.5zM6.25 9.53L3 7.995l3.25-1.626V9.53zM12 13.5h-1v-3.07l-1-1.01.01-.01V12a1 1 0 001 1h1V12a1 1 0 00-1-1V9.429l1-.501V13.5z"/>
                            <path d="M3 15.25V15a1 1 0 00-1 1v.5a1 1 0 001 1h14a1 1 0 001-1v-.5a1 1 0 00-1-1H3z"/>
                         </svg>
                         Niveau: {{ $filiere->Niveau ?? 'Non spécifié' }}
                     </span>
                        </div>

                        {{-- Établissement --}}
                        @if($filiere->etablissement)
                            <div class="mb-3 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3v-4a1 1 0 00-1-1H9a1 1 0 00-1 1v4H5a1 1 0 110-2V4zm3 1a1 1 0 011-1h2a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="font-medium text-gray-700">{{ $filiere->etablissement->nom }}</span>
                                    <span class="mx-1 text-gray-300">|</span>
                                    <span>{{ $filiere->etablissement->ville }}</span>
                                </div>
                            </div>
                        @endif


                        {{-- Conditions d'admission --}}
                        <div class="mb-4">
                            <h3 class="text-xs uppercase font-semibold text-gray-500 mb-1">Conditions d'admission</h3>
                            <p class="text-gray-600 text-sm flex-grow">
                                {{ Str::limit($filiere->ConditionsAdmission ?: 'Non spécifiées.', 100, '...') }}
                            </p>
                        </div>

                        {{-- Débouchés et Durée --}}
                        <div class="mb-5 border-t border-gray-200 pt-4">
                            <h3 class="text-xs uppercase font-semibold text-gray-500 mb-1">Débouchés & Durée</h3>
                            <p class="text-gray-600 text-sm mb-2 flex-grow">
                                {{ Str::limit($filiere->debouches_metiers ?: 'Non spécifiés.', 120, '...') }}
                            </p>
                            @if($filiere->duree)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            <svg class="w-3 h-3 mr-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Durée: {{ $filiere->duree }} an(s)
                        </span>
                            @endif
                        </div>


                        {{-- Action Button --}}
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <a href="{{ route('filiere.show', ['filiere' => $filiere->id , 'domaine' => $filiere->domaine_id]) }}"
                               class="w-full inline-flex justify-center items-center px-4 py-2.5 bg-custom-dark border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-wider hover:bg-custom-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 transition ease-in-out duration-150 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Voir Détails Filière
                            </a>
                            {{-- Ici, on pourrait aussi ajouter des boutons Modifier/Supprimer la filière si l'utilisateur a les droits --}}
                            {{--
                            <div class="flex space-x-2 mt-3 justify-end">
                                 <a href="{{ route('filiere.edit', $filiere->id) }}" title="Modifier"
                                   class="p-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md transition ease-in-out duration-150 shadow-sm hover:shadow-md">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                </a>
                                <form action="{{ route('filiere.destroy', $filiere->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Supprimer"
                                           class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition ease-in-out duration-150 shadow-sm hover:shadow-md">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </form>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-6 rounded-md shadow-sm" role="alert">
                        <div class="flex">
                            <div class="py-1">
                                <svg class="w-6 h-6 text-yellow-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-lg">Aucune filière trouvée pour ce domaine</p>
                                <p>Il semble qu'aucune filière spécifique n'ait été ajoutée pour le domaine <span class="font-semibold">"{{ $domaine->domaine }}"</span> pour le moment.</p>
                                <p class="mt-2">Vous pouvez <a href="{{ route('filiere.create', ['domaine_id' => $domaine->id]) }}" class="font-medium text-yellow-800 hover:underline">ajouter une nouvelle filière</a> pour ce domaine, ou <a href="{{ route('Domaines') }}" class="font-medium text-yellow-800 hover:underline">explorer d'autres domaines</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse

        </div> {{-- End Grid --}}

    </div> {{-- End Container --}}
@endsection

{{-- Assurez-vous que Str::limit est disponible, soit via un alias global, soit par import dans votre AppServiceProvider --}}
{{-- `use Illuminate\Support\Str;` dans le contexte où vous en avez besoin --}}
