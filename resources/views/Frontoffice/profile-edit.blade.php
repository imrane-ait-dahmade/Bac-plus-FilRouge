@extends('Layouts.App')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">Modifier mon profil</h2>
                    <a href="{{ route('profile') }}" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-arrow-left mr-2"></i> Retour au profil
                    </a>
                </div>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Informations personnelles -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold">Informations personnelles</h3>

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary"
                                    value="{{ old('name', auth()->user()->name) }}" required>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                            </div>

                            <div>
                                <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                                <select name="statut" id="statut"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary">
                                    <option value="bachelier" {{ old('statut', auth()->user()->statut) == 'bachelier' ? 'selected' : '' }}>Bachelier</option>
                                    <option value="etudiant" {{ old('statut', auth()->user()->statut) == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                                </select>
                            </div>
                        </div>

                        <!-- Changer le mot de passe -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold">Changer le mot de passe</h3>

                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700">Mot de passe
                                    actuel</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary">
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de
                                    passe</label>
                                <input type="password" name="password" id="password"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary">
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer
                                    le nouveau mot de passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('profile') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Annuler
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-custom-primary text-white rounded-md hover:bg-custom-dark transition duration-150">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection