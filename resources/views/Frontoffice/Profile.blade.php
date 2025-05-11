@extends('Layouts.App')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="bg-white shadow-sm rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Mon Profil</h2>
                <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-custom-primary text-white rounded-md hover:bg-custom-dark transition duration-150">
                    Modifier le profil
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informations personnelles -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Informations personnelles</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nom complet</label>
                            <p class="mt-1 text-gray-900">{{ auth()->user()->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="mt-1 text-gray-900">{{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Statut</label>
                            <p class="mt-1 text-gray-900">{{ auth()->user()->statut }}</p>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Statistiques</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Établissements consultés</label>
                            <p class="mt-1 text-gray-900">{{ auth()->user()->viewHistory()->count() }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Établissements favoris</label>
                            <p class="mt-1 text-gray-900">{{ auth()->user()->favorites()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold mb-4">Actions rapides</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('student.favorites') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150">
                        <i class="fas fa-heart text-custom-primary mr-3"></i>
                        <span>Voir mes favoris</span>
                    </a>
                    <a href="{{ route('student.history') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150">
                        <i class="fas fa-history text-custom-primary mr-3"></i>
                        <span>Historique des consultations</span>
                    </a>
                    <a href="{{ route('Etablissements') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150">
                        <i class="fas fa-search text-custom-primary mr-3"></i>
                        <span>Rechercher des établissements</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
