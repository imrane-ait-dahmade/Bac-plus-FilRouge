@extends('Layouts.App')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Recommandations Personnalisées</h1>
        <p class="mt-2 text-gray-600">Découvrez des établissements et filières qui pourraient vous intéresser, basés sur votre historique de consultation.</p>
    </div>

    {{-- Établissements Recommandés --}}
    <div class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Établissements Recommandés</h2>
        @if($recommendedEtablissements->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($recommendedEtablissements as $etablissement)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        @if($etablissement->image)
                            <img src="{{ asset('storage/' . $etablissement->image) }}" 
                                 alt="{{ $etablissement->nom }}" 
                                 class="w-full h-48 object-cover">
                        @endif
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $etablissement->nom }}</h3>
                            <p class="text-gray-600 mb-2">{{ $etablissement->ville }}</p>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="mr-4">{{ $etablissement->universite->nom ?? 'N/A' }}</span>
                                <span>{{ $etablissement->region->nom ?? 'N/A' }}</span>
                            </div>
                            <a href="{{ route('etablisement_infos', $etablissement->id) }}" 
                               class="inline-flex items-center text-custom-primary hover:text-custom-dark">
                                Voir les détails
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-gray-50 rounded-lg p-6 text-center">
                <p class="text-gray-600">Aucune recommandation d'établissement disponible pour le moment.</p>
            </div>
        @endif
    </div>

    {{-- Filières Recommandées --}}
    <div class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Filières Recommandées</h2>
        @if($recommendedFilieres->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($recommendedFilieres as $filiere)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $filiere->nom }}</h3>
                            <p class="text-gray-600 mb-2">{{ $filiere->domaine->nomDomaine ?? 'N/A' }}</p>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="mr-4">Niveau: {{ $filiere->Niveau }}</span>
                                @if($filiere->duree)
                                    <span>Durée: {{ $filiere->duree }} ans</span>
                                @endif
                            </div>
                            <a href="{{ route('student.filiere.show', $filiere->id) }}" 
                               class="inline-flex items-center text-custom-primary hover:text-custom-dark">
                                Voir les établissements
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-gray-50 rounded-lg p-6 text-center">
                <p class="text-gray-600">Aucune recommandation de filière disponible pour le moment.</p>
            </div>
        @endif
    </div>
</div>
@endsection 