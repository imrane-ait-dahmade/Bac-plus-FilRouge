@extends('layouts.app')

@section('content')
    <div class="student-dashboard container mx-auto px-4 py-8">
        <!-- En-tête -->
        <div class="bg-gray-800 rounded-lg p-6 mb-6 shadow-lg border-l-4 border-custom-primary">
            <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Explorer les Établissements</h1>
            <p class="text-gray-300">Trouvez l'école qui correspond à votre projet d'études.</p>
        </div>

        <!-- Barre de recherche et filtres -->
        <div class="bg-gray-800 rounded-lg p-6 mb-6 shadow-lg">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Recherche -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher un établissement..." class="w-full bg-gray-700 text-white rounded-lg py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-custom-primary">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <!-- Filtres -->
                <div class="flex gap-4">
                    <select class="bg-gray-700 text-white rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary">
                        <option value="">Ville</option>
                        <option value="rabat"> Rabat</option>
                        <option value="casablanca"> Casablanca</option>
                        <option value="marrakech"> Marrakech</option>
                    </select>
                    <select class="bg-gray-700 text-white rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-custom-primary">
                        <option value="">Domaine</option>
                        <option value="ingenierie"> Ingénierie</option>
                        <option value="commerce"> Commerce</option>
                        <option value="sciences"> Sciences</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Liste des établissements -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($etablissements as $etablissement)
                <div class="bg-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                    <div class="relative">
{{--                        @if($etablissement->image && file_exists(public_path($etablissement->image))--}}

{{--                        @else--}}
{{--    <img src="{{ asset('images/default.jpg') }}" alt="Image non disponible" />--}}
{{--@endif      --}}
                    @if($etablissement['image'] )
                        <img src="/Images/{{$etablissement['image']}}" alt="{{ $etablissement['nometablissement'] }}" class="w-full h-40 object-cover" />
                        @else
                            <img src="https://placehold.co/600x300/e2e8f0/475569?text={{$etablissement['resau']}}" alt="{{ $etablissement['resau'] }}" class="w-full h-40 object-cover">
                        @endif

                        <button class="absolute top-2 right-2 p-2 bg-gray-800/70 rounded-full text-gray-300 hover:text-custom-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>

                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-white mb-1">{{$etablissement['nometablissement']}}</h3>
                        <p class="text-sm text-gray-300 mb-3">{{$etablissement['descirptionetablissement']}}</p>

                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="px-2 py-1 bg-gray-600 text-xs text-gray-300 rounded">{{ $etablissement['Universite'] }}</span>
                            <span class="px-2 py-1 bg-gray-600 text-xs text-gray-300 rounded">{{$etablissement['adresseetablissement']}}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-custom-primary">{{ $etablissement['typeecole'] }}</span>
                            <a href="#" class="text-sm text-white bg-custom-primary hover:bg-custom-dark px-3 py-1 rounded transition duration-300">Voir détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
