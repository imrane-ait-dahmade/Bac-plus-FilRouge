@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-4 sm:p-6"> {{-- Adjusted padding --}}
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Détails de l'Établissement</h1>
            <div class="flex space-x-2">
                {{-- Make sure the route for 'Retour' is correct --}}
                <a href="{{ url()->previous() }}" {{-- Or a specific index route --}}
                class="px-3 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md text-sm transition duration-150 ease-in-out flex items-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour
                </a>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100"> {{-- Added subtle border --}}
            <div class="p-5 sm:p-6"> {{-- Adjusted padding --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- Left Column: Main Info --}}
                    <div class="md:col-span-2 space-y-6">
                        {{-- Basic Info --}}
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 mb-3">{{ $etablissement->nometablissement }}</h2>
                            <div class="space-y-1.5 text-sm text-gray-600"> {{-- Adjusted spacing and size --}}
                                <div class="flex items-start"> {{-- items-start for long addresses --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-custom-primary flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $etablissement->adresseetablissement ?? 'Adresse non fournie' }}, {{ $etablissement->villeetablissement ?? 'Ville non fournie' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-custom-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        {{-- Using a map icon for region --}}
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 16.382V5.618a1 1 0 00-1.447-.894L15 7m0 10V7m0 10h.01" />
                                    </svg>
                                    <span>Région: {{ $etablissement->region->nom_region ?? 'Non défini' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-custom-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span>Type:</span>
                                    {{-- Check the actual field name: typeecole or TypeEcole --}}
                                    <span class="ml-1.5 px-2 py-0.5 text-xs font-medium rounded-full {{ $etablissement->typeecole == 'Public' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                        {{ $etablissement->typeecole ?? 'Non défini' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Description --}}
                        @if($etablissement->descirptionetablissement)
                            <div class="border-t border-gray-200 pt-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
                                <p class="text-sm text-gray-600 leading-relaxed">{{ $etablissement->descirptionetablissement }}</p>
                            </div>
                        @endif

                        {{-- Academic Info --}}
                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Informations Académiques</h3>
                            <div class="space-y-3"> {{-- Changed grid to space-y for simplicity --}}
                                @if($etablissement->universite)
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                        <div class="text-xs text-gray-500 uppercase tracking-wider font-medium">Université / Tutelle</div>
                                        <div class="text-sm text-gray-800">{{ $etablissement->universite }}</div>
                                    </div>
                                @endif
                                @if($etablissement->resau)
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                        <div class="text-xs text-gray-500 uppercase tracking-wider font-medium">Réseau</div>
                                        <div class="text-sm text-gray-800">{{ $etablissement->resau }}</div>
                                    </div>
                                @endif
                                @if(isset($etablissement->nombreetudiant)) {{-- Check if exists to avoid printing 0 --}}
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <div class="text-xs text-gray-500 uppercase tracking-wider font-medium">Nombre d'Étudiants (Approx.)</div>
                                    <div class="text-sm text-gray-800">{{ number_format($etablissement->nombreetudiant, 0, ',', ' ') }}</div>
                                </div>
                                @endif
                            </div>
                        </div>

                        {{-- *** NEW SECTION: Filières *** --}}
                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Filières Proposées</h3>
                            <div class="space-y-3">
                                {{-- Check if the relationship exists and has items --}}
                                @if($etablissement->relationLoaded('filieres') && $etablissement->filieres->count() > 0)
                                    @foreach($etablissement->filieres as $filiere)
                                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-200 hover:border-gray-300 transition duration-150">
                                            {{-- Filiere Name --}}
                                            <h4 class="font-medium text-gray-700 text-sm">{{ $filiere->nom_filiere ?? 'Nom indisponible' }}</h4>
                                            {{-- Filiere Details (Level, Duration, etc.) --}}
                                            <div class="mt-1 text-xs text-gray-500 flex flex-wrap gap-x-3 gap-y-1">
                                                @if($filiere->niveau) {{-- Assuming 'niveau' field exists --}}
                                                <span class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 16c1.255 0 2.443-.29 3.5-.804V4.804zM14.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 0114.5 16c1.255 0 2.443-.29 3.5-.804v-10A7.968 7.968 0 0014.5 4z" /></svg>
                                                    Niveau: {{ $filiere->niveau }}
                                                </span>
                                                @endif
                                                @if($filiere->duree) {{-- Assuming 'duree' field exists --}}
                                                <span class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" /></svg>
                                                    Durée: {{ $filiere->duree }}
                                                </span>
                                                @endif
                                                {{-- You can add more details like domaine here if available --}}
                                            </div>
                                            {{-- Optional Filiere Description --}}
                                            @if($filiere->description_filiere)
                                                <p class="mt-1.5 text-xs text-gray-600 leading-normal line-clamp-2">{{ $filiere->description_filiere }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    {{-- Message if no filieres --}}
                                    <div class="bg-gray-50 p-3 rounded-md border border-gray-200 text-center">
                                        <p class="text-sm text-gray-500 italic">
                                            Aucune filière spécifique n'est listée pour cet établissement pour le moment.
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- *** END Filières Section *** --}}

                    </div>

                    {{-- Right Column: Logo & Contact Button --}}
                    <div class="space-y-4">
                        {{-- Logo --}}
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                            <h3 class="text-base font-semibold text-gray-700 mb-2">Logo</h3>
                            @if($etablissement->logo)
                                {{-- Ensure the path is correct. If 'public' disk, use asset() --}}
                                <img src="{{ asset('Images/LogoEcoles/' . $etablissement->logo) }}"
                                     alt="Logo {{ $etablissement->nometablissement }}"
                                     class="w-full h-auto max-h-48 object-contain rounded-md">
                            @else
                                <div class="w-full h-32 bg-gray-100 rounded-md flex items-center justify-center border border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        {{-- Contact Button --}}
                        <div>
                            <h3 class="text-base font-semibold text-gray-700 mb-2">Contact</h3>
                            {{-- This button likely needs to link somewhere specific or trigger an action --}}
                            {{-- Example: Link to website if available --}}
                            @if($etablissement->site_web)
                                <a href="{{ Str::startsWith($etablissement->site_web, ['http://', 'https://']) ? $etablissement->site_web : 'http://' . $etablissement->site_web }}"
                                   target="_blank" rel="noopener noreferrer"
                                   class="block py-2 px-4 bg-custom-primary hover:bg-custom-dark text-white font-medium rounded-md text-center text-sm transition duration-150 ease-in-out shadow-sm">
                                    Visiter le Site Web
                                </a>
                            @else
                                {{-- Fallback if no website --}}
                                <button disabled
                                        class="w-full block py-2 px-4 bg-gray-300 text-gray-500 font-medium rounded-md text-center text-sm cursor-not-allowed">
                                    Contact indisponible
                                </button>
                            @endif
                            {{-- Alternative: Mailto link --}}
                            {{-- @if($etablissement->email)
                                <a href="mailto:{{ $etablissement->email }}" class="block py-2 px-4 bg-custom-primary hover:bg-custom-dark text-white font-medium rounded-md text-center text-sm transition duration-150 ease-in-out shadow-sm">
                                    Envoyer un Email
                                </a>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    {{-- Ensure your custom colors are defined, e.g., using CSS variables --}}
    <style>
        :root {
            --custom-primary-color: #4CAF50; /* Example: Green 500 */
            --custom-dark-color: #388E3C;  /* Example: Green 700 */
            --custom-light-color: #E8F5E9; /* Example: Green 50 */
        }
        .text-custom-primary { color: var(--custom-primary-color); }
        .bg-custom-primary { background-color: var(--custom-primary-color); }
        .hover\:bg-custom-dark:hover { background-color: var(--custom-dark-color); }
        .bg-custom-light { background-color: var(--custom-light-color); }

        /* Tailwind utility for line clamping */
        @layer utilities {
            .line-clamp-2 {
                overflow: hidden;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2;
            }
            .line-clamp-3 {
                overflow: hidden;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
            }
        }
    </style>
@endpush
