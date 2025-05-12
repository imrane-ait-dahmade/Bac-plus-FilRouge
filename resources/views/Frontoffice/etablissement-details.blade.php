@extends('Layouts.App')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-semibold">{{ $etablissement->nom }}</h2>
                    <button onclick="toggleFavorite({{ $etablissement->id }})" class="text-red-500 hover:text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        @if($etablissement->logo)
                            <img src="{{ asset('storage/' . $etablissement->logo) }}" alt="Logo {{ $etablissement->nom }}"
                                class="w-full h-64 object-cover rounded-lg">
                        @else
                            <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-500">Pas de logo</span>
                            </div>
                        @endif
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Informations générales</h3>
                            <div class="text-gray-600">
                                <p>Université : {{ $etablissement->universite->nom }}</p>
                                <p>Région : {{ $etablissement->region->nom }}</p>
                                <p>Type : {{ $etablissement->TypeEcole }}</p>
                                <p>Ville : {{ $etablissement->ville }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-2">Contact</h3>
                            <div class="text-gray-600">
                                @if($etablissement->adresse)
                                    <p>Adresse : {{ $etablissement->adresse }}</p>
                                @endif
                                @if($etablissement->telephone)
                                    <p>Téléphone : {{ $etablissement->telephone }}</p>
                                @endif
                                @if($etablissement->email)
                                    <p>Email : {{ $etablissement->email }}</p>
                                @endif
                                @if($etablissement->site_web)
                                    <p>Site web : <a href="{{ $etablissement->site_web }}" target="_blank"
                                            class="text-custom-primary hover:text-custom-dark">{{ $etablissement->site_web }}</a>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-2">Réseaux sociaux</h3>
                            <div class="flex space-x-4">
                                @if($etablissement->facebook)
                                    <a href="{{ $etablissement->facebook }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                @endif
                                @if($etablissement->instagram)
                                    <a href="{{ $etablissement->instagram }}" target="_blank"
                                        class="text-pink-600 hover:text-pink-800">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                                @if($etablissement->linkedin)
                                    <a href="{{ $etablissement->linkedin }}" target="_blank"
                                        class="text-blue-700 hover:text-blue-900">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Description</h3>
                    <p class="text-gray-600">{{ $etablissement->description }}</p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Informations supplémentaires</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @if($etablissement->nombre_etudiant)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Nombre d'étudiants</p>
                                <p class="text-lg font-semibold">{{ $etablissement->nombre_etudiant }}</p>
                            </div>
                        @endif
                        @if($etablissement->frais_scolarite)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Frais de scolarité</p>
                                <p class="text-lg font-semibold">{{ number_format($etablissement->frais_scolarite, 2) }} DH</p>
                            </div>
                        @endif
                        @if($etablissement->seuil_actif && $etablissement->seuil)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Seuil d'admission</p>
                                <p class="text-lg font-semibold">{{ $etablissement->seuil }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('student.etablissement.filieres', $etablissement->id) }}"
                        class="inline-block px-6 py-3 bg-custom-primary text-white rounded-md hover:bg-custom-dark transition duration-150">
                        Voir les filières proposées
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function toggleFavorite(etablissementId) {
                fetch(`/favorites/${etablissementId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        // Recharger la page pour mettre à jour l'état du bouton
                        window.location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        </script>
    @endpush
@endsection