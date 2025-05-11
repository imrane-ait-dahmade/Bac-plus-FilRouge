@extends('Layouts.App')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-6">Mes Établissements Favoris</h2>

                @if($favorites->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">Vous n'avez pas encore d'établissements favoris.</p>
                        <a href="{{ route('Etablissements') }}"
                            class="mt-4 inline-block px-4 py-2 bg-custom-primary text-white rounded-md hover:bg-custom-dark transition duration-150">
                            Découvrir les établissements
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($favorites as $favorite)
                            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                                @if($favorite->etablissement->logo)
                                    <img src="{{ asset('storage/' . $favorite->etablissement->logo) }}"
                                        alt="Logo {{ $favorite->etablissement->nom }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">Pas de logo</span>
                                    </div>
                                @endif

                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $favorite->etablissement->nom }}</h3>

                                    <div class="text-sm text-gray-600 mb-2">
                                        <p>{{ $favorite->etablissement->universite->nom }}</p>
                                        <p>{{ $favorite->etablissement->region->nom }}</p>
                                    </div>

                                    <div class="flex justify-between items-center mt-4">
                                        <a href="{{ route('etablisement_infos', $favorite->etablissement->id) }}"
                                            class="text-custom-primary hover:text-custom-dark">
                                            Voir les détails
                                        </a>
                                        <button onclick="toggleFavorite({{ $favorite->etablissement->id }})"
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
                        {{ $favorites->links() }}
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