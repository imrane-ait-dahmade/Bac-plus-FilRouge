@extends('Layouts.App')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold mb-2">{{ $filiere->nom }}</h2>
                    <div class="text-gray-600">
                        <p>Domaine : {{ $filiere->domaine->domaine }}</p>
                        <p>Niveau : {{ $filiere->Niveau }}</p>
                        @if($filiere->duree)
                            <p>Durée : {{ $filiere->duree }} ans</p>
                        @endif
                        @if($filiere->debouches_metiers)
                            <p class="mt-2">Débouchés : {{ $filiere->debouches_metiers }}</p>
                        @endif
                    </div>
                </div>

                <h3 class="text-xl font-semibold mb-4">Établissements proposant cette filière</h3>

                @if($etablissements->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">Aucun établissement ne propose cette filière pour le moment.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($etablissements as $etablissement)
                            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                                @if($etablissement->logo)
                                    <img src="{{ asset('storage/' . $etablissement->logo) }}" alt="Logo {{ $etablissement->nom }}"
                                        class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">Pas de logo</span>
                                    </div>
                                @endif

                                <div class="p-4">
                                    <h4 class="text-lg font-semibold mb-2">{{ $etablissement->nom }}</h4>
                                    <div class="text-sm text-gray-600 mb-2">
                                        <p>{{ $etablissement->universite->nom }}</p>
                                        <p>{{ $etablissement->region->nom }}</p>
                                    </div>

                                    <div class="flex justify-between items-center mt-4">
                                        <a href="{{ route('etablisement_infos', $etablissement->id) }}"
                                            class="text-custom-primary hover:text-custom-dark">
                                            Voir les détails
                                        </a>
                                        <button onclick="toggleFavorite({{ $etablissement->id }})"
                                            class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $etablissements->links() }}
                    </div>
                @endif
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
                        // Recharger la page pour mettre à jour la liste
                        window.location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        </script>
    @endpush
@endsection