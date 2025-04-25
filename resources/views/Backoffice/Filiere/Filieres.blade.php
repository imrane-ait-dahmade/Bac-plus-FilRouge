@extends('Layouts.App')

@section('content')
    <div class="container mx-auto px-4 py-8">

        {{-- Header Row: Title + Add Button --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Nos Filières</h1>
            <a href="{{ route('filiere.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md">
                {{-- Icon for Add --}}
                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Ajouter Filière
            </a>
        </div>

        {{-- Grid for Filiere Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($filieres as $filiere)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl duration-300 ease-in-out flex flex-col">
                    {{-- Optional Header Image or Color Band --}}
                    {{-- <div class="h-2 bg-indigo-500"></div> --}}

                    <div class="p-6 flex flex-col flex-grow">
                        {{-- Title and Level --}}
                        <div class="mb-4">
                            <h2 class="text-2xl font-bold text-gray-900 mb-1">{{ $filiere->nomfiliere }}</h2>
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                             {{-- Icon for Level --}}
                             <svg class="w-4 h-4 mr-1.5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                               <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                               <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                               <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                             </svg>
                             Niveau: {{ $filiere->Niveau ?? 'Non spécifié' }}
                         </span>
                        </div>

                        {{-- Description --}}
                        <p class="text-gray-600 text-sm mb-5 flex-grow">{{ Str::limit($filiere->description, 120, '...') }}</p> {{-- Limite la description pour la cohérence --}}

                        {{-- Additional Info Section --}}
                        <div class="border-t border-gray-200 pt-4 space-y-2 text-sm text-gray-500 mb-5">
                            {{-- Example: Department (if relationship exists) --}}
                            @if(isset($filiere->departement))
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    Département: <span class="font-medium text-gray-700 ml-1">{{ $filiere->departement->nom ?? 'N/A' }}</span>
                                </div>
                            @endif

                            {{-- Example: Number of Modules (if attribute exists) --}}
                            @if(isset($filiere->modules_count))
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-purple-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    Modules: <span class="font-medium text-gray-700 ml-1">{{ $filiere->modules_count ?? 'N/A' }}</span> {{-- Assurez-vous d'avoir cet attribut --}}
                                </div>
                            @endif

                        </div>

                        {{-- Action Button --}}
                        <div class="mt-auto pt-4 border-t border-gray-100"> {{-- mt-auto pousse ce bloc vers le bas --}}
                            <a href="{{ route('filiere.show', $filiere->id) }}"
                               class="w-full inline-flex justify-center items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-25 transition ease-in-out duration-150">
                                {{-- Icon for Details --}}
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Voir Détails
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Message when no filieres are found --}}
                <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded-md shadow" role="alert">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div>
                            <p class="font-bold text-lg">Aucune filière trouvée</p>
                            <p>Il semble qu'aucune filière n'ait été ajoutée pour le moment. Cliquez sur "Ajouter Filière" pour commencer.</p>
                        </div>
                    </div>
                </div>
            @endforelse

        </div> {{-- End Grid --}}

    </div> {{-- End Container --}}
@endsection

{{-- Utility needed in AppServiceProvider or similar for Str::limit --}}
{{-- use Illuminate\Support\Str; --}}
