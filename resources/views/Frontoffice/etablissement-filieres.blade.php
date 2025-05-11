@extends('Layouts.App')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-semibold">Filières de {{ $etablissement->nom }}</h2>
                    <a href="{{ route('etablisement_infos', $etablissement->id) }}"
                        class="text-custom-primary hover:text-custom-dark">
                        Retour à l'établissement
                    </a>
                </div>

                @if($filieres->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">Cet établissement n'a pas encore de filières.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($filieres as $filiere)
                            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                                <h3 class="text-lg font-semibold mb-2">{{ $filiere->nom }}</h3>
                                <div class="text-sm text-gray-600 mb-2">
                                    <p>Domaine : {{ $filiere->domaine->domaine }}</p>
                                    <p>Niveau : {{ $filiere->Niveau }}</p>
                                    @if($filiere->duree)
                                        <p>Durée : {{ $filiere->duree }} ans</p>
                                    @endif
                                </div>
                                <a href="{{ route('student.filiere.show', $filiere->id) }}"
                                    class="text-custom-primary hover:text-custom-dark">
                                    Voir les établissements proposant cette filière
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $filieres->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection