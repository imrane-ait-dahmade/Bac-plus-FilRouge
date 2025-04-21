@extends('Layouts.App')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Liste des Filières</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($filieres as $filiere)
            <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition">
                <h2 class="text-xl font-semibold text-gray-800">{{ $filiere->name }}</h2>
                <p class="text-gray-600 mt-2">{{ $filiere->description }}</p>
                <a href="{{ route('filiere.details', $filiere->id) }}" class="block text-blue-600 mt-4 hover:text-blue-800">Voir Détails</a>
            </div>
        @endforeach

    </div>

@endsection
