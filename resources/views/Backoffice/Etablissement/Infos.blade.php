@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8"> {{-- Wider container --}}

        {{-- Header Section: Title and Actions --}}
        <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <h1 class="text-3xl font-bold text-gray-800">Détails de l'Établissement</h1>
            <div class="flex flex-wrap space-x-2">
                {{-- Back Button --}}
                <a href="{{ route('etablissementsAccesAdmin') }}" {{-- Assuming you have an index route --}}
                class="px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md text-sm transition duration-150 ease-in-out flex items-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Retour
                </a>
                {{-- Edit Button --}}
                <a href="{{ route('etablissement.FormEdit', $etablissement->id) }}" {{-- Use standard edit route --}}
                class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-sm transition duration-150 ease-in-out flex items-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Modifier
                </a>
                {{-- Delete Button --}}
                <form action="{{ route('etablissement.destroy', $etablissement->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet établissement ? Cette action est irréversible.');" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm transition duration-150 ease-in-out flex items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

        {{-- Main Content Card --}}
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3">

                {{-- Left Column (Main Info) --}}
                <div class="md:col-span-2 p-6 space-y-6 border-r border-gray-200">

                    {{-- Establishment Header --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        @if($etablissement->logo)
                            <img src="{{ asset('Images/LogoEcoles/' . $etablissement->logo) }}" alt="Logo {{ $etablissement->nometablissement }}" class="w-16 h-16 object-contain flex-shrink-0 rounded-md border border-gray-200 p-1">
                        @else
                            <div class="w-16 h-16 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" /></svg>
                            </div>
                        @endif
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ $etablissement->nometablissement }}</h2>
                            @if($etablissement->abreviation)
                                <p class="text-lg text-custom-primary font-semibold">{{ $etablissement->abreviation }}</p>
                            @endif
                            <span class="mt-1 inline-block px-2 py-0.5 text-xs rounded-full {{ $etablissement->typeecole == 'Public' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                {{ $etablissement->typeecole ?? 'N/A' }}
                            </span>
                        </div>
                    </div>

                    {{-- Location Info --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2 border-b pb-1">Localisation</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $etablissement->adresseetablissement ?? 'Adresse non spécifiée' }}
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2h8a2 2 0 002-2v-1a2 2 0 012-2h1.945M7.757 15.757a1 1 0 011.414 0L12 18.586l2.828-2.829a1 1 0 111.415 1.415L13.414 20l2.829 2.828a1 1 0 11-1.415 1.415L12 21.414l-2.828 2.829a1 1 0 01-1.415-1.415L10.586 20 7.757 17.172a1 1 0 010-1.415zM12 6a3 3 0 110-6 3 3 0 010 6z" />
                                </svg>
                                {{ $etablissement->villeetablissement ?? 'Ville non spécifiée' }}
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2h8a2 2 0 002-2v-1a2 2 0 012-2h1.945M12 6a3 3 0 110-6 3 3 0 010 6z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 11a1 1 0 00-1-1h-1a1 1 0 00-1 1v1a1 1 0 001 1h1a1 1 0 001-1v-1zM7 11a1 1 0 00-1-1H5a1 1 0 00-1 1v1a1 1 0 001 1h1a1 1 0 001-1v-1z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14a1 1 0 00-1-1h-1a1 1 0 00-1 1v1a1 1 0 001 1h1a1 1 0 001-1v-1z" />
                                </svg>
                                Région: {{ $etablissement->region->nom_region ?? $etablissement->region_id ?? 'N/A' }} {{-- Adjust if region relationship is different --}}
                            </div>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2 border-b pb-1">Description</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{ $etablissement->descirptionetablissement ?? 'Aucune description fournie.' }}
                        </p>
                    </div>

                    {{-- Academic Info --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Informations Académiques</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                <div class="text-gray-500 mb-1">Université / Tutelle</div>
                                <div class="font-medium text-gray-800">{{ $etablissement->universite ?? 'N/A' }}</div>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                <div class="text-gray-500 mb-1">Réseau</div>
                                <div class="font-medium text-gray-800">{{ $etablissement->resau ?? 'N/A' }}</div>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-200 sm:col-span-2">
                                <div class="text-gray-500 mb-1">Nombre d'Étudiants (Approximatif)</div>
                                <div class="font-medium text-gray-800">{{ number_format($etablissement->nombreetudiant ?? 0, 0, ',', ' ') }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- Metadata --}}
                    <div class="pt-4 border-t border-gray-200 text-xs text-gray-400">
                        <p>Créé le: {{ $etablissement->created_at ? $etablissement->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                        <p>Dernière mise à jour: {{ $etablissement->updated_at ? $etablissement->updated_at->format('d/m/Y H:i') : 'N/A' }}</p>
                    </div>

                </div>

                {{-- Right Column (Image, Contact, Social) --}}
                <div class="p-6 bg-gray-50 space-y-6">

                    {{-- Image --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Image</h3>
                        @if($etablissement->image)
                            <img src="{{ asset('Images/PhotoEcoles/' . $etablissement->image) }}"
                                 alt="Photo {{ $etablissement->nometablissement }}"
                                 class="w-full h-auto rounded-lg shadow-md border border-gray-200">
                        @else
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Aucune image</span>
                            </div>
                        @endif
                    </div>

                    {{-- Contact Info --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Contact</h3>
                        <div class="space-y-2 text-sm">
                            @if($etablissement->telephone)
                                <div class="flex items-center text-gray-600 hover:text-custom-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                    <a href="tel:{{ $etablissement->telephone }}" class="break-all">{{ $etablissement->telephone }}</a>
                                </div>
                            @endif
                            @if($etablissement->fax)
                                <div class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                                    Fax: {{ $etablissement->fax }}
                                </div>
                            @endif
                            @if($etablissement->site_web)
                                <div class="flex items-center text-gray-600 hover:text-custom-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                                    <a href="{{ Str::startsWith($etablissement->site_web, ['http://', 'https://']) ? $etablissement->site_web : 'http://' . $etablissement->site_web }}" target="_blank" rel="noopener noreferrer" class="break-all">Site Web</a>
                                </div>
                            @endif
                            @if($etablissement->site_inscription)
                                <div class="flex items-center text-gray-600 hover:text-custom-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                                    <a href="{{ Str::startsWith($etablissement->site_inscription, ['http://', 'https://']) ? $etablissement->site_inscription : 'http://' . $etablissement->site_inscription }}" target="_blank" rel="noopener noreferrer" class="break-all">Lien d'Inscription</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Social Media --}}
                    @if($etablissement->facebook || $etablissement->instagram || $etablissement->linkedin)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Réseaux Sociaux</h3>
                            <div class="flex space-x-3">
                                @if($etablissement->facebook)
                                    <a href="{{ Str::startsWith($etablissement->facebook, ['http://', 'https://']) ? $etablissement->facebook : 'https://' . $etablissement->facebook }}" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-blue-600" title="Facebook">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                                    </a>
                                @endif
                                @if($etablissement->instagram)
                                    <a href="{{ Str::startsWith($etablissement->instagram, ['http://', 'https://']) ? $etablissement->instagram : 'https://' . $etablissement->instagram }}" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-pink-600" title="Instagram">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.48 2.525c.636-.247 1.363-.416 2.427-.465C8.93 2.013 9.284 2 11.715 2h.6zm-.004 2.176h-.63c-2.403 0-2.729.01-3.662.056a3.522 3.522 0 00-1.29.273 3.512 3.512 0 00-1.243.884 3.512 3.512 0 00-.884 1.243 3.522 3.522 0 00-.273 1.29c-.046.933-.056 1.259-.056 3.662s.01 2.729.056 3.662c.017.443.095.87.273 1.29a3.512 3.512 0 00.884 1.243 3.512 3.512 0 001.243.884 3.522 3.522 0 001.29.273c.933.046 1.259.056 3.662.056h.63c2.403 0 2.729-.01 3.662-.056a3.522 3.522 0 001.29-.273 3.512 3.512 0 001.243-.884 3.512 3.512 0 00.884-1.243 3.522 3.522 0 00.273-1.29c.046-.933.056-1.259.056-3.662s-.01-2.729-.056-3.662a3.522 3.522 0 00-.273-1.29 3.512 3.512 0 00-.884-1.243 3.512 3.512 0 00-1.243-.884 3.522 3.522 0 00-1.29-.273c-.933-.046-1.259-.056-3.662-.056zM12 6.845a5.155 5.155 0 100 10.31 5.155 5.155 0 000-10.31zm0 8.176a3.02 3.02 0 110-6.04 3.02 3.02 0 010 6.04zm3.896-7.618a1.2 1.2 0 100-2.4 1.2 1.2 0 000 2.4z" clip-rule="evenodd" /></svg>
                                    </a>
                                @endif
                                @if($etablissement->linkedin)
                                    <a href="{{ Str::startsWith($etablissement->linkedin, ['http://', 'https://']) ? $etablissement->linkedin : 'https://' . $etablissement->linkedin }}" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-blue-700" title="LinkedIn">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- Removed the hidden form and associated JS as the "Edit" button links to a separate page --}}

@endsection

@push('styles')
    {{-- Ensure your custom colors are defined for light mode, e.g.: --}}
    <style>
        .text-custom-primary { color: #4CAF50; /* Example: Green 500 */ }
        .hover\:text-custom-primary:hover { color: #4CAF50; }
        .bg-custom-primary { background-color: #4CAF50; }
        .hover\:bg-custom-dark:hover { background-color: #388E3C; /* Example: Green 700 */ }
        .hover\:text-custom-dark:hover { color: #388E3C; }
        .bg-custom-light { background-color: #E8F5E9; /* Example: Green 50 */ }
    </style>
@endpush
