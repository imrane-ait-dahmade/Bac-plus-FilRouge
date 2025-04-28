@extends('layouts.app')

@section('content')
    {{-- Main container with light background --}}
    <div class="student-dashboard p-4 sm:p-6 lg:p-8 bg-gray-100 min-h-screen">

        {{-- Page Title --}}
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Tableau de Bord Étudiant</h1>
            <p class="text-gray-600">Suivi de vos statistiques et planification.</p>
        </div>

        <!-- Quick Stats (Modified - No 'Candidatures') -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8"> {{-- Changed to lg:grid-cols-3 --}}

            {{-- Stat Card 1: Favoris --}}
            <div class="bg-white rounded-lg p-5 shadow-md border-b-4 border-blue-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Établissements favoris</p>
                        {{-- Replace with dynamic data --}}
                        <h3 class="text-3xl font-bold text-gray-800">7</h3>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
                {{-- Optional: Add context if needed --}}
                {{-- <p class="text-xs text-gray-500 mt-2">+2 ce mois</p> --}}
            </div>

            {{-- Stat Card 2: Consultées --}}
            <div class="bg-white rounded-lg p-5 shadow-md border-b-4 border-purple-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Formations consultées</p>
                        {{-- Replace with dynamic data --}}
                        <h3 class="text-3xl font-bold text-gray-800">12</h3>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                {{-- <p class="text-xs text-gray-500 mt-2">+5 ce mois</p> --}}
            </div>

            {{-- Stat Card 3: Countdown --}}
            <div class="bg-white rounded-lg p-5 shadow-md border-b-4 border-yellow-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Jours avant le Bac</p>
                        {{-- Replace with dynamic calculation --}}
                        <h3 class="text-3xl font-bold text-gray-800">45</h3>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Préparez-vous!</p>
            </div>
        </div>

        <!-- School Planning & Tracking Section (CRUD Idea) -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <div>
                    <h2 class="font-semibold text-lg text-gray-800">Planification & Suivi des Écoles</h2>
                    <p class="text-sm text-gray-500">Organisez vos prochaines étapes pour chaque établissement.</p>
                </div>
                {{-- CREATE Button -> Links to a form/modal --}}
                <a href="" {{-- Example route for creating a new plan --}}
                class="px-4 py-2 bg-custom-primary hover:bg-custom-dark text-white rounded-md transition duration-300 flex items-center shadow-sm text-sm font-medium whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Ajouter une planification
                </a>
            </div>

            {{-- Table for READ operation --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">Établissement</th>
                        <th scope="col" class="px-6 py-3">Action Planifiée</th>
                        <th scope="col" class="px-6 py-3">Échéance</th>
                        <th scope="col" class="px-6 py-3">Statut</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Example Row 1 --}}
                    {{-- Replace with @foreach($planifications as $plan) in real app --}}
                    <tr class="bg-white border-b hover:bg-gray-50 transition duration-150 ease-in-out">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            ENSA Marrakech
                        </th>
                        <td class="px-6 py-4">
                            Préparer le dossier de candidature
                        </td>
                        <td class="px-6 py-4">
                            10 Juillet 2024 {{-- Example Date --}}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-0.5 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">À faire</span>
                        </td>
                        <td class="px-6 py-4 flex items-center space-x-3">
                            {{-- UPDATE Button -> Links to an edit form/modal --}}
                            <a href="" {{-- Example route with plan ID --}}
                            class="text-blue-600 hover:text-blue-800" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            {{-- DELETE Button -> Triggers a form submission/confirmation --}}
                            <form action="" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette planification ?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    {{-- Example Row 2 --}}
                    <tr class="bg-white border-b hover:bg-gray-50 transition duration-150 ease-in-out">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            ENCG Casablanca
                        </th>
                        <td class="px-6 py-4">
                            Consulter site web pour dates concours
                        </td>
                        <td class="px-6 py-4">
                            25 Juin 2024 {{-- Example Date --}}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-0.5 bg-green-100 text-green-800 rounded-full text-xs font-medium">Terminé</span>
                        </td>
                        <td class="px-6 py-4 flex items-center space-x-3">
                            <a href="" class="text-blue-600 hover:text-blue-800" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            </a>
                            <form action="" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette planification ?');" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    {{-- Example Row 3 --}}
                    <tr class="bg-white border-b hover:bg-gray-50 transition duration-150 ease-in-out">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            FST Mohammedia
                        </th>
                        <td class="px-6 py-4">
                            Réviser Maths pour le concours
                        </td>
                        <td class="px-6 py-4">
                            14 Juillet 2024 {{-- Example Date --}}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-0.5 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">En cours</span>
                        </td>
                        <td class="px-6 py-4 flex items-center space-x-3">
                            <a href="" class="text-blue-600 hover:text-blue-800" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            </a>
                            <form action="" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette planification ?');" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    {{-- Message if no data --}}
                    {{-- @if($planifications->isEmpty())
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 italic">
                            Aucune planification ajoutée pour le moment.
                        </td>
                    </tr>
                    @endif --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    {{-- Ensure your custom colors are defined for light mode --}}
    <style>
        :root {
            --custom-primary-color: #4CAF50; /* Example: Green 500 */
            --custom-dark-color: #388E3C;  /* Example: Green 700 */
        }
        .text-custom-primary { color: var(--custom-primary-color); }
        .border-custom-primary { border-color: var(--custom-primary-color); }
        .bg-custom-primary { background-color: var(--custom-primary-color); }
        .hover\:bg-custom-dark:hover { background-color: var(--custom-dark-color); }
        .hover\:text-custom-dark:hover { color: var(--custom-dark-color); }
        .focus\:ring-custom-primary:focus { /* If using focus rings */
            --tw-ring-color: var(--custom-primary-color);
        }
    </style>
@endpush

@push('scripts')
    {{-- Add any specific JS if needed --}}
    <script>
        // Potential JS for confirmation dialogs or future enhancements
    </script>
@endpush
