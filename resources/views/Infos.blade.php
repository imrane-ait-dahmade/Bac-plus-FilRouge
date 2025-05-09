@extends('Layouts.App') {{-- Changed as requested --}}

@section('content')
    <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">

        {{-- Header Section: Title and Actions --}}
        <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <h1 class="text-3xl font-bold text-gray-800">Détails de l'Établissement</h1>
            <div class="flex flex-wrap gap-2">
                {{-- Back Button --}}
                <a href="{{ route('Etablissements') }}" {{-- Standardized route name --}}
                class="px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md text-sm font-medium transition duration-150 ease-in-out flex items-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Retour
                </a>
                @if(Auth::check() && Auth::user()->role === 'admin') {{-- Added Auth::check() for safety --}}
                {{-- Edit Button --}}
                <a href="{{ route('etablissement.FormEdit', ['etablissement' => $etablissement->id]) }}"
                   class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-sm font-medium transition duration-150 ease-in-out flex items-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Modifier
                </a>

                {{-- ---- BOUTON AJOUTER/GÉRER FILIÈRES ---- --}}
                <button type="button" id="openFiliereModalBtn"
                        class="px-3 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md text-sm font-medium transition duration-150 ease-in-out flex items-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Ajouter/Gérer Filières
                </button>
                {{-- ---- FIN BOUTON AJOUTER/GÉRER FILIÈRES ---- --}}

                {{-- Delete Button --}}
                <form action="{{ route('etablissement.destroy', ['etablissement' => $etablissement->id]) }}" method="POST"
                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet établissement ? Cette action est irréversible.');"
                      class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm font-medium transition duration-150 ease-in-out flex items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Supprimer
                    </button>
                </form>
                @endif
            </div>
        </div>

        {{-- Main Content Card --}}
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3">

                {{-- Left Column (Main Info) --}}
                <div class="md:col-span-2 p-6 space-y-6 border-r border-gray-200">

                    {{-- Establishment Header --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        {{-- Logo --}}
                        @if($etablissement->logo)
                            <img src="{{ asset('storage/' . $etablissement->logo) }}"
                                 alt="Logo {{ $etablissement->nom }}"
                                 class="w-16 h-16 object-contain flex-shrink-0 rounded-md border border-gray-200 p-1">
                        @else
                            <div
                                class="w-16 h-16 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0 border border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                                </svg>
                            </div>
                        @endif
                        {{-- Name and Type --}}
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ $etablissement->nom }}</h2>
                            @if($etablissement->abreviation)
                                <p class="text-lg text-custom-primary font-semibold">{{ $etablissement->abreviation }}</p>
                            @endif
                            <span
                                class="mt-1 inline-block px-2 py-0.5 text-xs font-medium rounded-full {{ $etablissement->type_ecole == 'public' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                {{ ucfirst($etablissement->type_ecole ?? 'N/A') }}
                            </span>
                        </div>
                    </div>

                    {{-- Location Info --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2 border-b pb-1">Localisation</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4 mr-2 text-gray-400 flex-shrink-0 mt-0.5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ $etablissement->adresse ?? 'Adresse non spécifiée' }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 flex-shrink-0"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2h8a2 2 0 002-2v-1a2 2 0 012-2h1.945M7.757 15.757a1 1 0 011.414 0L12 18.586l2.828-2.829a1 1 0 111.415 1.415L13.414 20l2.829 2.828a1 1 0 11-1.415 1.415L12 21.414l-2.828 2.829a1 1 0 01-1.415-1.415L10.586 20 7.757 17.172a1 1 0 010-1.415zM12 6a3 3 0 110-6 3 3 0 010 6z"/>
                                </svg>
                                <span>{{ $etablissement->ville ?? 'Ville non spécifiée' }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 flex-shrink-0"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                </svg>
                                <span>Région: {{ $etablissement->region->nom ?? ($etablissement->region_id ? 'ID: '.$etablissement->region_id : 'N/A') }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2 border-b pb-1">Description</h3>
                        <div class="text-sm text-gray-600 leading-relaxed prose max-w-none">
                            {!! nl2br(e($etablissement->description ?? 'Aucune description fournie.')) !!}
                        </div>
                    </div>

                    {{-- Academic Info --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Informations Académiques</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                <div class="text-gray-500 mb-1 font-medium">Université / Tutelle</div>
                                <div class="text-gray-800">{{ $etablissement->universite->nom ?? ($etablissement->universite_id ? 'ID: '.$etablissement->universite_id : 'N/A') }}</div>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                <div class="text-gray-500 mb-1 font-medium">Réseau</div>
                                <div class="text-gray-800">{{ $etablissement->resau ?? 'N/A' }}</div>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-200 sm:col-span-2">
                                <div class="text-gray-500 mb-1 font-medium">Nombre d'Étudiants (Approximatif)</div>
                                <div class="text-gray-800">{{ $etablissement->nombre_etudiant ? number_format($etablissement->nombre_etudiant, 0, ',', ' ') : 'N/A' }}</div>
                            </div>
                            @if($etablissement->diplome_type)
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <div class="text-gray-500 mb-1 font-medium">Type de Diplôme Principal</div>
                                    <div class="text-gray-800">{{ $etablissement->diplome_type }}</div>
                                </div>
                            @endif
                            @if(!is_null($etablissement->reputation))
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <div class="text-gray-500 mb-1 font-medium">Réputation (Score)</div>
                                    <div class="text-gray-800">{{ $etablissement->reputation }}/10</div>
                                </div>
                            @endif
                            @if(!is_null($etablissement->frais_scolarite))
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <div class="text-gray-500 mb-1 font-medium">Frais de Scolarité</div>
                                    <div class="text-gray-800">{{ number_format($etablissement->frais_scolarite, 2, ',', ' ') }} MAD</div>
                                </div>
                            @endif
                            @if($etablissement->seuil_actif && !is_null($etablissement->seuil))
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <div class="text-gray-500 mb-1 font-medium">Seuil d'Admission</div>
                                    <div class="text-gray-800">{{ $etablissement->seuil }}/20</div>
                                </div>
                            @endif
                            @if($etablissement->date_ouverture_inscription)
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <div class="text-gray-500 mb-1 font-medium">Ouverture Inscriptions</div>
                                    <div class="text-gray-800">{{ \Carbon\Carbon::parse($etablissement->date_ouverture_inscription)->format('d/m/Y') }}</div>
                                </div>
                            @endif
                            @if($etablissement->date_limite_inscription)
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <div class="text-gray-500 mb-1 font-medium">Limite Inscriptions</div>
                                    <div class="text-gray-800">{{ \Carbon\Carbon::parse($etablissement->date_limite_inscription)->format('d/m/Y') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Filières Proposées Section --}}
                    <div class="mt-10 pt-8 border-t border-gray-200">
                        {{-- Section Title --}}
                        <div class="flex items-center mb-6">
                            <div class="p-2 bg-custom-light bg-opacity-20 rounded-full mr-3">
                                <svg class="w-7 h-7 text-custom-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-800">Filières Proposées par cet Établissement</h3>
                        </div>

                        @if($etablissement->relationLoaded('filieres') && $etablissement->filieres->isNotEmpty())
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($etablissement->filieres as $filiere)
                                    <a href="{{ route('filiere.show',  ['filiere' => $filiere->id , 'domaine' => $filiere->domaine_id]) }}"
                                       class="group block bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out overflow-hidden border-l-4 border-custom-primary hover:border-custom-dark transform hover:-translate-y-1">
                                        <div class="p-5 flex flex-col h-full">
                                            <h4 class="text-lg font-semibold text-gray-800 group-hover:text-custom-dark transition-colors duration-200 line-clamp-2 leading-tight mb-1">
                                                {{ $filiere->nom ?? 'Nom de filière non disponible' }}
                                            </h4>

                                            <div class="flex flex-wrap items-center gap-x-2 gap-y-1 text-xs mb-3">
                                                @if($filiere->Niveau)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-medium bg-custom-light bg-opacity-30 text-custom-dark border border-custom-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 opacity-80" viewBox="0 0 20 20" fill="currentColor">
                                                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                        Niveau: {{ $filiere->Niveau }}
                                                    </span>
                                                @endif
                                                @if($filiere->relationLoaded('domaine') && $filiere->domaine?->nomDomaine)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-medium bg-sky-100 text-sky-700 border border-sky-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 opacity-80" viewBox="0 0 20 20" fill="currentColor">
                                                          <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v1H5V4zM5 7h10v9a2 2 0 01-2 2H7a2 2 0 01-2-2V7z" />
                                                        </svg>
                                                        {{ $filiere->domaine->nomDomaine }}
                                                    </span>
                                                @endif
                                            </div>

                                            @php
                                                $extrait = $filiere->debouches_metiers ?: ($filiere->description ?? '');
                                            @endphp
                                            @if($extrait)
                                                <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 flex-grow mb-3">
                                                    {{ Str::limit(strip_tags($extrait), 120) }}
                                                </p>
                                            @else
                                                <div class="flex-grow mb-3"></div>
                                            @endif

                                            <div class="mt-auto flex justify-between items-center pt-3 border-t border-gray-100">
                                                @if($filiere->duree)
                                                    <span class="text-xs text-gray-500 flex items-center">
                                                        <svg class="w-3.5 h-3.5 mr-1 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        {{ $filiere->duree }} an(s)
                                                    </span>
                                                @else
                                                    <span></span>
                                                @endif
                                                <span class="inline-flex items-center text-xs font-semibold text-custom-primary group-hover:text-custom-dark group-hover:underline">
                                                    Voir Détails
                                                    <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-0.5 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            {{-- J'ai supprimé le bouton "+ Aj" qui était ici, car il est déjà en haut avec les autres actions admin --}}
                        @else
                            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6 text-center shadow-sm">
                                <svg class="w-12 h-12 mx-auto mb-3 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                <p class="text-md font-medium text-yellow-700">
                                    Aucune filière spécifique n'est actuellement listée pour cet établissement.
                                </p>
                                <p class="text-sm text-yellow-600 mt-1">
                                    Revenez bientôt ou contactez l'établissement pour plus d'informations.
                                </p>
                            </div>
                        @endif
                    </div>


                    {{-- Metadata --}}
                    <div class="pt-4 border-t border-gray-200 text-xs text-gray-400 mt-auto">
                        <p>Créé le: {{ optional($etablissement->created_at)->format('d/m/Y H:i') ?? 'N/A' }}</p>
                        <p>Dernière mise à jour: {{ optional($etablissement->updated_at)->format('d/m/Y H:i') ?? 'N/A' }}</p>
                    </div>
                </div>

                {{-- Right Column (Image, Contact, Social) --}}
                <div class="p-6 bg-gray-50 space-y-6">
                    {{-- ... (votre colonne de droite reste identique) ... --}}
                    {{-- Image --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Image Principale</h3>
                        @if($etablissement->image)
                            <img src="{{ asset('storage/' . $etablissement->image) }}"
                                 alt="Photo {{ $etablissement->nom }}"
                                 class="w-full h-auto rounded-lg shadow-md border border-gray-200 object-cover max-h-64">
                        @else
                            <div
                                class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="ml-2">Aucune image</span>
                            </div>
                        @endif
                    </div>

                    {{-- Contact Info --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Contact</h3>
                        <div class="space-y-2 text-sm">
                            @if($etablissement->email)
                                <div class="flex items-start text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 flex-shrink-0 text-gray-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <a href="mailto:{{ $etablissement->email }}" class="break-all hover:text-custom-primary hover:underline">{{ $etablissement->email }}</a>
                                </div>
                            @endif
                            @if($etablissement->telephone)
                                <div class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4 mr-2 flex-shrink-0 text-gray-400" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <a href="tel:{{ $etablissement->telephone }}"
                                       class="break-all hover:text-custom-primary hover:underline">{{ $etablissement->telephone }}</a>
                                </div>
                            @endif
                            @if($etablissement->fax)
                                <div class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4 mr-2 flex-shrink-0 text-gray-400" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                    <span>Fax: {{ $etablissement->fax }}</span>
                                </div>
                            @endif
                            @if($etablissement->site_web)
                                <div class="flex items-start text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4 mr-2 flex-shrink-0 text-gray-400 mt-0.5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                    </svg>
                                    <a href="{{ Str::startsWith($etablissement->site_web, ['http://', 'https://']) ? $etablissement->site_web : 'http://' . $etablissement->site_web }}"
                                       target="_blank" rel="noopener noreferrer"
                                       class="break-all hover:text-custom-primary hover:underline">Site Web</a>
                                </div>
                            @endif
                            @if($etablissement->site_inscription)
                                <div class="flex items-start text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4 mr-2 flex-shrink-0 text-gray-400 mt-0.5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                    <a href="{{ Str::startsWith($etablissement->site_inscription, ['http://', 'https://']) ? $etablissement->site_inscription : 'http://' . $etablissement->site_inscription }}"
                                       target="_blank" rel="noopener noreferrer"
                                       class="break-all hover:text-custom-primary hover:underline">Lien
                                        d'Inscription</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Social Media --}}
                    @if($etablissement->facebook || $etablissement->instagram || $etablissement->linkedin)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Réseaux Sociaux</h3>
                            <div class="flex flex-wrap gap-3">
                                @if($etablissement->facebook)
                                    <a href="{{ Str::startsWith($etablissement->facebook, ['http://', 'https://']) ? $etablissement->facebook : 'https://facebook.com/' . $etablissement->facebook }}"
                                       target="_blank" rel="noopener noreferrer"
                                       class="text-gray-500 hover:text-blue-600 transition duration-150"
                                       title="Facebook">
                                        <span class="sr-only">Facebook</span>
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                @endif
                                @if($etablissement->instagram)
                                    <a href="{{ Str::startsWith($etablissement->instagram, ['http://', 'https://']) ? $etablissement->instagram : 'https://instagram.com/' . $etablissement->instagram }}"
                                       target="_blank" rel="noopener noreferrer"
                                       class="text-gray-500 hover:text-pink-600 transition duration-150"
                                       title="Instagram">
                                        <span class="sr-only">Instagram</span>
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.48 2.525c.636-.247 1.363-.416 2.427-.465C8.93 2.013 9.284 2 11.715 2h.6zm-.004 2.176h-.63c-2.403 0-2.729.01-3.662.056a3.522 3.522 0 00-1.29.273 3.512 3.512 0 00-1.243.884 3.512 3.512 0 00-.884 1.243 3.522 3.522 0 00-.273 1.29c-.046.933-.056 1.259-.056 3.662s.01 2.729.056 3.662c.017.443.095.87.273 1.29a3.512 3.512 0 00.884 1.243 3.512 3.512 0 001.243.884 3.522 3.522 0 001.29.273c.933.046 1.259.056 3.662.056h.63c2.403 0 2.729-.01 3.662-.056a3.522 3.522 0 001.29-.273 3.512 3.512 0 001.243-.884 3.512 3.512 0 00.884-1.243 3.522 3.522 0 00.273-1.29c.046-.933.056-1.259.056-3.662s-.01-2.729-.056-3.662a3.522 3.522 0 00-.273-1.29 3.512 3.512 0 00-.884-1.243 3.512 3.512 0 00-1.243-.884 3.522 3.522 0 00-1.29-.273c-.933-.046-1.259-.056-3.662-.056zM12 6.845a5.155 5.155 0 100 10.31 5.155 5.155 0 000-10.31zm0 8.176a3.02 3.02 0 110-6.04 3.02 3.02 0 010 6.04zm3.896-7.618a1.2 1.2 0 100-2.4 1.2 1.2 0 000 2.4z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                @endif
                                @if($etablissement->linkedin)
                                    <a href="{{ Str::startsWith($etablissement->linkedin, ['http://', 'https://']) ? $etablissement->linkedin : 'https://linkedin.com/company/' . $etablissement->linkedin }}"
                                       target="_blank" rel="noopener noreferrer"
                                       class="text-gray-500 hover:text-blue-700 transition duration-150"
                                       title="LinkedIn">
                                        <span class="sr-only">LinkedIn</span>
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div> {{-- Fin Right Column --}}
            </div> {{-- Fin Grid md:grid-cols-3 --}}
        </div> {{-- Fin Main Content Card --}}

        {{-- ---- MODALE POUR AJOUTER/GÉRER LES FILIÈRES (initialement cachée) ---- --}}
        @if(Auth::check() && Auth::user()->role === 'admin')
            <div id="filiereModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div id="filiereModalOverlay" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                    <div class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:align-middle sm:max-w-2xl">
                        <div class="flex items-center justify-between pb-3 mb-4 border-b">
                            <h3 class="text-xl font-semibold text-gray-900" id="modal-title">
                                Associer des Filières à {{ $etablissement->nom }}
                            </h3>
                            <button type="button" id="closeFiliereModalBtn" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>

                        {{-- Les variables $filieres et $associatedFiliereIds sont passées par le contrôleur --}}
                        <form action="{{ route('etablissement.filieres.attach', $etablissement->id) }}" method="POST">
                            @csrf
                            <div class="space-y-4 max-h-96 overflow-y-auto pr-2">
                                @if(isset($filieres) && $filieres->isNotEmpty()) {{-- Utiliser la variable $filieres (pour la modale) --}}
                                @foreach($filieres as $filiere)
                                    <label for="filiere_modal_{{ $filiere->id }}" class="flex items-center p-3 space-x-3 bg-gray-50 hover:bg-gray-100 rounded-md cursor-pointer transition-colors">
                                        <input type="checkbox" name="filiere_ids[]" id="filiere_modal_{{ $filiere->id }}" value="{{ $filiere->id }}"
                                               class="w-5 h-5 text-custom-primary bg-gray-100 border-gray-300 rounded focus:ring-custom-primary focus:ring-2"
                                               @if(isset($associatedFiliereIds) && in_array($filiere->id, $associatedFiliereIds)) checked @endif>
                                        <span class="text-sm font-medium text-gray-700">{{ $filiere->nom }}
                                            @if($filiere->Niveau) <span class="text-xs text-gray-500"> ({{ $filiere->Niveau }})</span> @endif
                                            </span>
                                    </label>
                                @endforeach
                                @else
                                    <p class="text-gray-600">Aucune filière n'est disponible dans la base de données pour le moment.</p>
                                @endif
                            </div>

                            <div class="pt-6 mt-6 border-t sm:flex sm:flex-row-reverse">
                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-primary text-base font-medium text-white hover:bg-custom-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary sm:ml-3 sm:w-auto sm:text-sm">
                                    Enregistrer les modifications
                                </button>
                                <button type="button" id="cancelFiliereModalBtn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                    Annuler
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        {{-- ---- FIN MODALE ---- --}}

    </div> {{-- Fin max-w-6xl --}}
@endsection

@push('styles')
    <style>
        :root {
            --custom-primary-color: #4CAF50; /* Example: Green 500 */
            --custom-dark-color: #388E3C;    /* Example: Green 700 */
            --custom-light-color: #E8F5E9;   /* Example: Green 50 */
            /* Pour que Tailwind JIT puisse utiliser les couleurs avec opacité /xx */
            --custom-light-color-rgb: 232, 245, 233; /* RGB de #E8F5E9 */
        }

        .text-custom-primary { color: var(--custom-primary-color); }
        .text-custom-dark { color: var(--custom-dark-color); }

        .bg-custom-primary { background-color: var(--custom-primary-color); }
        .bg-custom-dark { background-color: var(--custom-dark-color); }
        .bg-custom-light { background-color: var(--custom-light-color); }

        .border-custom-primary { border-color: var(--custom-primary-color); }
        .border-custom-dark { border-color: var(--custom-dark-color); }
        .border-custom-light { border-color: var(--custom-light-color); }

        .hover\:text-custom-primary:hover { color: var(--custom-primary-color); }
        .hover\:text-custom-dark:hover { color: var(--custom-dark-color); }
        .hover\:border-custom-dark:hover { border-color: var(--custom-dark-color) !important; }

        .hover\:bg-custom-primary:hover { background-color: var(--custom-primary-color); }
        .hover\:bg-custom-dark:hover { background-color: var(--custom-dark-color); }

        .focus\:ring-custom-primary:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: var(--custom-primary-color); /* Utilise la variable CSS pour la couleur de l'anneau */
            box-shadow: 0 0 0 2px var(--tw-ring-color); /* Adaptez pour correspondre à l'anneau Tailwind */
        }
        /* Opacité pour bg-custom-light */
        .bg-custom-light.bg-opacity-20 { background-color: rgba(var(--custom-light-color-rgb), 0.2); }
        .bg-custom-light.bg-opacity-30 { background-color: rgba(var(--custom-light-color-rgb), 0.3); }


        .prose { color: theme('colors.gray.600'); }
        .prose p { margin-top: 0.5em; margin-bottom: 0.5em; }
        .prose h1, .prose h2, .prose h3, .prose h4 { color: theme('colors.gray.800'); margin-bottom: 0.5em; }
        .prose ul, .prose ol { margin-top: 0.5em; margin-bottom: 0.5em; }

        @layer utilities {
            .line-clamp-2 { overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; }
            .line-clamp-3 { overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; }
        }

        /* Styles pour le scrollbar dans la modale si besoin */
        .max-h-96::-webkit-scrollbar { width: 8px; }
        .max-h-96::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        .max-h-96::-webkit-scrollbar-thumb { background: #c5c5c5; border-radius: 10px; }
        .max-h-96::-webkit-scrollbar-thumb:hover { background: #a8a8a8; }

    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openModalBtn = document.getElementById('openFiliereModalBtn');
            const closeModalBtn = document.getElementById('closeFiliereModalBtn');
            const cancelModalBtn = document.getElementById('cancelFiliereModalBtn');
            const modal = document.getElementById('filiereModal');
            const modalOverlay = document.getElementById('filiereModalOverlay');

            function showFiliereModal() {
                if (modal) modal.classList.remove('hidden');
            }

            function hideFiliereModal() {
                if (modal) modal.classList.add('hidden');
            }

            if (openModalBtn) {
                openModalBtn.addEventListener('click', showFiliereModal);
            }
            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', hideFiliereModal);
            }
            if (cancelModalBtn) {
                cancelModalBtn.addEventListener('click', hideFiliereModal);
            }
            if (modalOverlay) {
                modalOverlay.addEventListener('click', hideFiliereModal);
            }

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                    hideFiliereModal();
                }
            });
        });
    </script>
@endpush
