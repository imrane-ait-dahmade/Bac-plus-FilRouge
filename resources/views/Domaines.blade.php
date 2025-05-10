@extends('Layouts.App') {{-- Ou le nom de ton layout principal --}}

@section('content')
    <div class="container mx-auto px-4 py-8">

        {{-- Header Row: Title + Add Button --}}


        {{-- Affichage des messages de succès/erreur --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-custom-dark text-green-700 rounded-md shadow-sm">
                <div class="flex">
                    <div class="py-1"><svg class="w-6 h-6 text-custom-dark mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                    <div>{{ session('success') }}</div>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-md shadow-sm">
                <div class="flex">
                    <div class="py-1"><svg class="w-6 h-6 text-red-500 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg></div>
                    <div>{{ session('error') }}</div>
                </div>
            </div>
        @endif

        {{-- Grid for Domaine Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10">

            @forelse ($domaines as $domaine)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 ease-in-out hover:shadow-2xl flex flex-col border-t-4 border-custom-dark">
                    <div class="p-6 flex flex-col flex-grow">
                        {{-- Type Badge --}}
                        <div class="mb-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                     {{ $domaine->type === 'Scientifique' ? 'bg-blue-100 text-blue-800' :
                                        ($domaine->type === 'Economiques' ? 'bg-yellow-100 text-yellow-800' :
                                        ($domaine->type === 'Juridique' ? 'bg-purple-100 text-purple-800' :
                                        ($domaine->type === 'Artistique' ? 'bg-pink-100 text-pink-800' :
                                        ($domaine->type === 'Literature' ? 'bg-indigo-100 text-indigo-800' :
                                        ($domaine->type === 'Militaire' ? 'bg-gray-200 text-gray-800' :
                                        ($domaine->type === 'Professionnel' ? 'bg-teal-100 text-teal-800' :
                                        'bg-gray-100 text-gray-800')))))) }}">
                            <svg class="w-3 h-3 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.39m0 0A15.995 15.995 0 012.645 6.33M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 01-2.248-2.131A3.001 3.001 0 0018 15z" />
                            </svg>
                            {{ $domaine->type }}
                        </span>
                        </div>

                        {{-- Title --}}
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2 leading-tight">{{ $domaine->domaine }}</h2>



                        {{-- Additional Info Section --}}
                        <div class="border-t border-gray-200 pt-4 mb-5">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-5 h-5 mr-2 text-custom-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <span class="font-medium text-gray-700 mr-1">{{ $domaine->filieres_count ?? 0 }}</span> Filière(s) associée(s)
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="mt-auto pt-4">
                            <div class="flex space-x-3">
                                <a href="{{route('filieres.domaine',['domaine'=>$domaine->id])}}"
                                   class="flex-1 inline-flex justify-center items-center px-4 py-2.5 bg-custom-dark border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-wider hover:bg-custom-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 transition ease-in-out duration-150 shadow-sm hover:shadow-md">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Voir Filières
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Message when no domaines are found --}}
                <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-green-50 border-l-4 border-green-400 text-green-700 p-6 rounded-md shadow-sm" role="alert">
                    <div class="flex">
                        <div class="py-1">
                            <svg class="w-6 h-6 text-custom-primary mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-lg">Aucun domaine d'études trouvé</p>
                            <p>Il semble qu'aucun domaine n'ait été ajouté pour le moment. Cliquez sur "Ajouter un Domaine" pour commencer à construire votre catalogue.</p>
                        </div>
                    </div>
                </div>
            @endforelse

        </div> {{-- End Grid --}}

    </div> {{-- End Container --}}
@endsection
