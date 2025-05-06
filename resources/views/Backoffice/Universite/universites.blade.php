@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">

        {{-- Affichage des messages de succès (optionnel) --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-700">Liste des Universités</h1>
            {{-- Lien pour créer une nouvelle université --}}
            <a href="{{ route('universites.create') }}" class="px-4 py-2 bg-custom-primary hover:bg-custom-dark text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                Ajouter une Université
            </a>
        </div>

        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            {{-- Utilisation d'une liste ou d'une table. Ici, une liste simple. --}}
            <div class="divide-y divide-gray-200">
                @forelse($universites as $universite)
                    <div class="p-4 flex items-center space-x-4 hover:bg-gray-50 transition duration-150 ease-in-out">
                        {{-- Affichage du Logo --}}
                        <div class="flex-shrink-0 h-16 w-16">
                            @if($universite->logo)
                                {{-- Assurez-vous que $universite->logo contient le chemin relatif depuis 'storage/app/public' --}}
                                {{-- Exemple: 'logos/mon_logo.png' --}}
                                <img src="{{ asset('storage/' . $universite->logo) }}" alt="Logo de {{ $universite->nom }}" class="h-16 w-16 rounded-md object-contain border border-gray-200">
                            @else
                                {{-- Placeholder si pas de logo --}}
                                <div class="h-16 w-16 rounded-md bg-gray-200 flex items-center justify-center text-gray-400 border border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        {{-- Informations de l'université --}}
                        <div class="flex-grow">
                            <h2 class="text-lg font-semibold text-gray-800 hover:text-custom-primary">
                                {{-- Lien vers la page détail (si elle existe) --}}
                                <a href="{{ route('universites.show', $universite->id) }}">
                                    {{ $universite->nom }}
                                </a>
                            </h2>
                            {{-- Afficher d'autres infos si nécessaire --}}
                            {{-- <p class="text-sm text-gray-600">{{ $universite->region->nom_region ?? 'Région non définie' }} - {{ ucfirst($universite->type) }}</p> --}}
                            {{-- <p class="text-sm text-gray-500">{{ $universite->directeur }}</p> --}}
                        </div>

                        {{-- Actions (Modifier, Supprimer) --}}
                        <div class="flex-shrink-0 flex space-x-2">
                            <a href="{{ route('universites.edit', $universite->id) }}" class="text-indigo-600 hover:text-indigo-900" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <form action="{{ route('universites.destroy', $universite->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette université ?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    {{-- Message si aucune université n'est trouvée --}}
                    <div class="p-6 text-center text-gray-500">
                        Aucune université n'a été trouvée.
                        <a href="{{ route('universites.create') }}" class="text-custom-primary hover:underline ml-1">Ajoutez-en une !</a>
                    </div>
                @endforelse
            </div>

            {{-- Liens de pagination --}}
            @if ($universites->hasPages())
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    {{ $universites->links() }} {{-- Assurez-vous que les vues de pagination Tailwind sont publiées --}}
                </div>
            @endif

        </div>
    </div>
@endsection
