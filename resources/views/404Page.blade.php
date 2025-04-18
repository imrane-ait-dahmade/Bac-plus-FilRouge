@extends('layouts.app')

@section('content')
    <div class="min-h-[80vh] flex items-center justify-center p-6">
        <div class="max-w-md w-full text-center">
            <div class="mb-8">
                <div class="relative mx-auto w-64 h-64">
                    <!-- Cercle de fond -->
                    <div class="absolute inset-0 bg-custom-light rounded-full opacity-50"></div>

                    <!-- Illustration stylisée d'un bâtiment scolaire -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>

                    <!-- Badge 404 -->
                    <div class="absolute -top-4 -right-4 bg-white border-4 border-custom-primary text-custom-dark font-bold text-xl rounded-full h-16 w-16 flex items-center justify-center shadow-lg">
                        404
                    </div>
                </div>
            </div>

            <h1 class="text-4xl font-bold text-gray-800 mb-4">Page introuvable</h1>

            <p class="text-gray-600 mb-8">
                Oups ! Il semble que l'établissement que vous recherchez n'existe pas ou a été déplacé.
            </p>

            <div class="space-y-4">
                <a href="{{ route('etablissements.index') }}" class="block w-full py-3 px-4 bg-custom-primary hover:bg-custom-dark text-white rounded-md transition duration-150 ease-in-out">
                    Retour à la liste des établissements
                </a>

                <div class="flex items-center justify-center space-x-4">
                    <a href="javascript:history.back()" class="text-custom-primary hover:text-custom-dark transition duration-150 ease-in-out">
                        Retour à la page précédente
                    </a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ url('/') }}" class="text-custom-primary hover:text-custom-dark transition duration-150 ease-in-out">
                        Page d'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
