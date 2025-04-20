@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Détails de l'Établissement</h1>
            <div class="flex space-x-2">
                <a href="" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md transition duration-150 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour
                </a>
                <a href="" class="px-4 py-2 bg-custom-light hover:bg-custom-primary text-gray-700 rounded-md transition duration-150 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Modifier
                </a>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2 space-y-6">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $etablissement->nometablissement }}</h2>
                            <div class="flex items-center text-gray-600 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $etablissement->adresseetablissement }}, {{ $etablissement->villeetablissement }}
                            </div>
                            <div class="flex items-center text-gray-600 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Région:
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Type: <span class="ml-1 px-2 py-1 text-xs rounded-full {{ $etablissement->TypeEcole == 'Public' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                {{ $etablissement->TypeEcole == 'Public' ? 'Public' : 'Privé' }}
                            </span>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Description</h3>
                            <p class="text-gray-600">{{ $etablissement->DescirptionEtablissement }}</p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-medium text-gray-800 mb-3">Informations Académiques</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="text-sm text-gray-500">Université</div>
                                    <div class="font-medium">{{ $etablissement->Universite }}</div>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="text-sm text-gray-500">Réseau</div>
                                    <div class="font-medium">{{ $etablissement->resau }}</div>
                                </div>
                            </div>

                            <div class="mt-4 bg-gray-50 p-4 rounded-lg">
                                <div class="text-sm text-gray-500">Nombre d'Étudiants</div>
                                <div class="font-medium">{{ number_format($etablissement->nombreEtudiant, 0, ',', ' ') }}</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            @if($etablissement->image)
                                <img src="{{ asset('/Images/PhotoEcoles/'.$etablissement->image) }}" alt="{{ $etablissement->nomEtablissement }}" class="w-full h-auto rounded-lg shadow-sm">
                            @else
                                <div class="w-full h-48 bg-custom-light rounded-lg flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="mt-4">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Contact</h3>
                            <a href="#" class="block py-2 px-4 bg-custom-primary hover:bg-custom-dark text-white rounded-md text-center transition duration-150 ease-in-out">
                                Contacter l'établissement
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
