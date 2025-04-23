@extends('layouts.app')

@section('content')
    {{-- Main container with light background --}}
    <div class="dashboard p-4 md:p-6 lg:p-8 bg-gray-100 min-h-screen">
        <!-- En-tête du tableau de bord -->
        {{-- Header card with white background --}}
        <div class="bg-white rounded-lg p-6 mb-6 border-l-4 border-custom-primary shadow-md">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div>
                    {{-- Dark text for headings and paragraphs --}}
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Bienvenue, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-600">Tableau de bord administrateur - Vue d'ensemble du système</p>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-3">
                    {{-- Primary button - text-white might still be okay depending on primary color darkness --}}
                    <a href="{{ route('Etablissements.create') }}" class="bg-custom-primary hover:bg-custom-dark text-white px-4 py-2 rounded-md transition duration-300 flex items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Nouvel établissement
                    </a>
                    {{-- Secondary button - light style --}}
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md transition duration-300 flex items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Exporter les données
                    </button>
                </div>
            </div>
        </div>

        <!-- Statistiques rapides -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            {{-- Stat Cards with white background and dark text --}}
            <div class="bg-white rounded-lg p-6 shadow-md border-b-4 border-custom-primary">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Total Étudiants</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalStudents ?? '1,248' }}</h3>
                        {{-- Use primary text color for positive indicator --}}
                        <p class="text-custom-primary text-sm mt-2">{{-- +12% ce mois --}}</p>
                    </div>
                    {{-- Icon background light gray --}}
                    <div class="p-3 bg-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-md border-b-4 border-blue-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Établissements</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalEstablishments ?? '143' }}</h3>
                        <p class="text-blue-500 text-sm mt-2">{{-- +3 cette semaine --}}</p> {{-- Keep color --}}
                    </div>
                    <div class="p-3 bg-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-md border-b-4 border-purple-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Formations</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalFormations ?? '526' }}</h3>
                        <p class="text-purple-500 text-sm mt-2">{{-- +8 ce mois --}}</p> {{-- Keep color --}}
                    </div>
                    <div class="p-3 bg-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 14l9-5-9-5-9 5 9 5z" /><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" /></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-md border-b-4 border-yellow-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Candidatures</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalApplications ?? '872' }}</h3>
                        <p class="text-yellow-500 text-sm mt-2">{{-- +24% ce mois --}}</p> {{-- Keep color --}}
                    </div>
                    <div class="p-3 bg-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grille principale du tableau de bord -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Colonne de gauche -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Graphique des inscriptions -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    {{-- Light border, dark text --}}
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-gray-800">Inscriptions mensuelles</h2>
                        <div class="flex space-x-2">
                            {{-- Buttons adjusted for light mode --}}
                            <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md text-sm hover:bg-gray-300 transition">Année</button>
                            <button class="px-3 py-1 bg-custom-primary text-white rounded-md text-sm">Mois</button>
                            <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md text-sm hover:bg-gray-300 transition">Semaine</button>
                        </div>
                    </div>
                    <div class="p-6 h-80">
                        <canvas id="inscriptionsChart"></canvas>
                    </div>
                </div>

                <!-- Établissements récemment ajoutés -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-gray-800">Établissements récemment ajoutés</h2>
                        <a href="#" class="text-sm text-custom-primary hover:text-custom-dark transition">Voir tous</a>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            {{-- Table styles for light mode --}}
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'ajout</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                {{-- Example Row - Adjust text colors --}}
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{-- Lighter background for avatar placeholder --}}
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-custom-primary font-bold">UM5</div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Université Mohammed V</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- Badges are usually light-mode friendly --}}
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Université Publique</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rabat</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 Oct 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-custom-primary hover:text-custom-dark mr-3">Éditer</a>
                                        <a href="#" class="text-red-500 hover:text-red-700">Supprimer</a>
                                    </td>
                                </tr>
                                {{-- Add more example rows similarly --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite -->
            <div class="space-y-6">
                <!-- Activité récente -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="font-semibold text-lg text-gray-800">Activité récente</h2>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-4">
                            {{-- Activity Item Example --}}
                            <li class="flex items-start space-x-3">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center"> {{-- Keep badge style --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div>
                                    {{-- Adjust text colors --}}
                                    <p class="text-sm text-gray-600"><span class="font-medium text-gray-900">Ahmed Mehdi</span> s'est inscrit sur la plateforme</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 35 minutes</p>
                                </div>
                            </li>
                            {{-- Add more activity items similarly --}}
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="#" class="text-sm text-custom-primary hover:text-custom-dark">Voir toutes les activités</a>
                        </div>
                    </div>
                </div>

                <!-- Répartition des utilisateurs -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="font-semibold text-lg text-gray-800">Répartition des utilisateurs</h2>
                    </div>
                    <div class="p-6 h-72">
                        <canvas id="userDistributionChart"></canvas>
                    </div>
                </div>

                <!-- Tâches à faire -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="font-semibold text-lg text-gray-800">Tâches à faire</h2>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3">
                            {{-- Todo Item Example --}}
                            <li class="flex items-center">
                                {{-- Checkbox for light mode --}}
                                <input type="checkbox" class="h-4 w-4 text-custom-primary rounded border-gray-300 focus:ring-custom-primary focus:ring-offset-0">
                                <span class="ml-3 text-sm text-gray-700">Valider les nouvelles inscriptions (5)</span>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 text-custom-primary rounded border-gray-300 focus:ring-custom-primary focus:ring-offset-0">
                                <span class="ml-3 text-sm text-gray-700">Mettre à jour les dates d'admission</span>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 text-custom-primary rounded border-gray-300 focus:ring-custom-primary focus:ring-offset-0" checked>
                                {{-- Checked item text --}}
                                <span class="ml-3 text-sm text-gray-400 line-through">Publier l'article sur les nouvelles formations</span>
                            </li>
                            {{-- Add more todo items similarly --}}
                        </ul>
                        <div class="mt-4">
                            {{-- Light "Add Task" button --}}
                            <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 rounded-md transition duration-300 flex items-center justify-center border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Ajouter une tâche
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================================= --}}
        {{-- ============ SECTION STATS DÉTAILLÉES ======== --}}
        {{-- ============================================= --}}
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Statistiques Détaillées</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Établissements les plus consultés -->
            <div class="bg-white rounded-lg shadow-md p-6 lg:col-span-1 md:col-span-1">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">Top Établissements Consultés</h3>
                <ul class="space-y-3 text-sm">
                    {{-- Adjust text colors for list items --}}
                    <li class="flex justify-between items-center text-gray-600">
                        <span>1. ENSIAS Rabat</span>
                        <span class="font-medium text-gray-800">1,540 vues</span>
                    </li>
                    <li class="flex justify-between items-center text-gray-600">
                        <span>2. FST Settat</span>
                        <span class="font-medium text-gray-800">1,210 vues</span>
                    </li>
                    {{-- Add more items similarly --}}
                </ul>
                <div class="mt-4 text-right">
                    <a href="#" class="text-xs text-custom-primary hover:text-custom-dark">Voir le rapport complet</a>
                </div>
            </div>

            <!-- Répartition géographique des étudiants -->
            <div class="bg-white rounded-lg shadow-md p-6 lg:col-span-3 md:col-span-1">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">Répartition Géographique (Étudiants)</h3>
                <div class="h-72">
                    <canvas id="regionChart"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Utilisation des Fonctionnalités -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">Utilisation des Fonctionnalités (Ex: Simulations)</h3>
                <div class="h-72">
                    <canvas id="featureUsageChart"></canvas>
                </div>
            </div>

            <!-- Taux d'Activité / Rétention -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">Utilisateurs Actifs (Derniers 30 jours)</h3>
                <div class="h-72">
                    <canvas id="activeUsersChart"></canvas>
                </div>
            </div>
        </div>
        {{-- ============================================= --}}
        {{-- ========== FIN SECTION STATS DÉTAILLÉES ====== --}}
        {{-- ============================================= --}}
    </div>
@endsection

@push('styles')
    {{-- Define custom colors suitable for light mode --}}
    <style>
        /* Example: Using a moderately dark green for primary */
        .text-custom-primary { color: #4CAF50; /* Green 500 */ }
        .border-custom-primary { border-color: #4CAF50; }
        .bg-custom-primary { background-color: #4CAF50; }
        /* Define a darker shade for hover */
        .hover\:bg-custom-dark:hover { background-color: #388E3C; /* Green 700 */ }
        .hover\:text-custom-dark:hover { color: #388E3C; }
        /* Optional: Define a very light shade if needed for backgrounds */
        .bg-custom-light { background-color: #E8F5E9; /* Green 50 */ }
        /* Keep link color consistent */
        .text-custom-primary { color: #4CAF50; }
        .hover\:text-custom-dark:hover { color: #388E3C; }

        /* Styles for Chart.js tooltips in light mode */
        .chartjs-tooltip {
            background: rgba(255, 255, 255, 0.95) !important; /* White background */
            color: #4B5563 !important; /* text-gray-600 */
            border-radius: 0.375rem !important; /* rounded-md */
            padding: 0.5rem 0.75rem !important; /* py-2 px-3 */
            font-family: inherit !important;
            font-size: 0.875rem !important; /* text-sm */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06) !important;
            border: 1px solid #E5E7EB !important; /* border-gray-200 */
        }
        .chartjs-tooltip-key {
            display: inline-block !important;
            width: 10px !important;
            height: 10px !important;
            margin-right: 5px !important;
            border-radius: 50% !important;
        }
        /* Legend styles - colors will be picked from Chart.js config */
        .chartjs-legend ul { list-style: none; padding: 0; margin: 0; }
        .chartjs-legend li { display: inline-flex; align-items: center; margin-right: 10px; cursor: pointer; color: #4B5563; /* Default legend text color */ }
        .chartjs-legend li span {
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-right: 8px;
            border-radius: 2px;
        }
    </style>
@endpush

@section('scripts')
    {{-- Include Chart.js --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Couleurs & Options Communes pour les graphiques LIGHT MODE ---
            const chartTextColor = '#4B5563'; // text-gray-600
            const chartGridColor = 'rgba(229, 231, 235, 0.8)'; // gray-200 with opacity
            // Use colors defined in CSS or define them here again
            const primaryColor = '#4CAF50'; // Green 500 (match CSS)
            const secondaryColor = '#388E3C'; // Green 700 (match CSS)
            const blueColor = '#3B82F6'; // blue-500
            const purpleColor = '#8B5CF6'; // purple-500
            const yellowColor = '#F59E0B'; // yellow-500
            const emeraldColor = '#10B981'; // emerald-500

            const commonChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: chartTextColor, // Dark text for legend
                            padding: 15,
                            usePointStyle: true,
                            pointStyle: 'rectRounded'
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'rgba(255, 255, 255, 0.95)', // White background
                        titleColor: '#111827',    // text-gray-900
                        bodyColor: chartTextColor, // text-gray-600
                        borderColor: '#E5E7EB',   // border-gray-200
                        borderWidth: 1,
                        padding: 10,
                        cornerRadius: 4,
                        usePointStyle: true,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: chartGridColor, drawBorder: false }, // Light grid lines
                        ticks: { color: chartTextColor, padding: 10 }    // Dark tick text
                    },
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: { color: chartTextColor, padding: 10 }    // Dark tick text
                    }
                }
            };

            // Function to merge options (remains the same)
            function mergeOptions(specificOptions = {}) {
                const merged = JSON.parse(JSON.stringify(commonChartOptions));
                for (const key in specificOptions) {
                    if (key === 'plugins' || key === 'scales') { // Merge nested objects
                        merged[key] = { ...merged[key], ...specificOptions[key] };
                        if(key === 'scales'){ // Merge deeper for axes
                            for(const axisKey in specificOptions[key]){
                                merged[key][axisKey] = {...merged[key][axisKey], ...specificOptions[key][axisKey]}
                            }
                        }
                        if(key === 'plugins'){ // Merge deeper for tooltip/legend
                            for(const pluginKey in specificOptions[key]){
                                merged[key][pluginKey] = {...merged[key][pluginKey], ...specificOptions[key][pluginKey]}
                            }
                        }
                    } else if (typeof specificOptions[key] === 'object' && specificOptions[key] !== null && !Array.isArray(specificOptions[key])) {
                        merged[key] = { ...merged[key], ...specificOptions[key] }; // Basic merge for other objects if needed
                    }
                    else {
                        merged[key] = specificOptions[key];
                    }
                }
                if (specificOptions.type === 'doughnut' || specificOptions.type === 'pie') {
                    delete merged.scales;
                }
                return merged;
            }


            // --- Graphique des inscriptions (Adjusted for Light Mode) ---
            const inscriptionsCtx = document.getElementById('inscriptionsChart')?.getContext('2d');
            if (inscriptionsCtx) {
                new Chart(inscriptionsCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                        datasets: [{
                            label: 'Inscriptions',
                            data: [65, 78, 90, 105, 112, 120, 110, 85, 95, 130, 142, 155],
                            // Slightly more opaque background for light mode
                            backgroundColor: 'rgba(76, 175, 80, 0.2)', // Primary color with more opacity
                            borderColor: primaryColor,
                            borderWidth: 2,
                            tension: 0.3,
                            pointBackgroundColor: primaryColor,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }]
                    },
                    options: mergeOptions({ plugins: { legend: { display: false } } })
                });
            }

            // --- Graphique de répartition des utilisateurs (Adjusted for Light Mode) ---
            const userDistributionCtx = document.getElementById('userDistributionChart')?.getContext('2d');
            if (userDistributionCtx) {
                new Chart(userDistributionCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Étudiants', 'Administrateurs', 'Contributeurs', 'Conseillers'],
                        datasets: [{
                            data: [75, 5, 10, 10],
                            backgroundColor: [
                                primaryColor,
                                secondaryColor, // Darker shade
                                '#A5D6A7', // Lighter green shade
                                purpleColor
                            ],
                            borderColor: '#ffffff', // White border for separation on white bg
                            borderWidth: 3, // Make border slightly thicker
                            hoverOffset: 8
                        }]
                    },
                    options: mergeOptions({
                        type: 'doughnut',
                        cutout: '70%',
                        plugins: { legend: { position: 'bottom' } }
                    })
                });
            }

            // --- Graphique Répartition Géographique (Adjusted for Light Mode) ---
            const regionCtx = document.getElementById('regionChart')?.getContext('2d');
            if (regionCtx) {
                new Chart(regionCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Rabat-Salé', 'Casa-Settat', 'Marrakech-Safi', 'Fès-Meknès', 'Tanger-Tétouan', 'Souss-Massa', 'Oriental'],
                        datasets: [{
                            label: 'Nombre d\'étudiants',
                            data: [250, 310, 180, 150, 120, 90, 75],
                            backgroundColor: primaryColor,
                            borderColor: secondaryColor,
                            borderWidth: 1,
                            borderRadius: 4,
                            barPercentage: 0.6,
                            categoryPercentage: 0.7
                        }]
                    },
                    options: mergeOptions({
                        indexAxis: 'y',
                        scales: {
                            x: { // Inverted axis
                                beginAtZero: true,
                                grid: { color: chartGridColor, drawBorder: false },
                                ticks: { color: chartTextColor, padding: 10 }
                            },
                            y: { // Inverted axis
                                grid: { display: false },
                                ticks: { color: chartTextColor, padding: 10 }
                            }
                        },
                        plugins: { legend: { display: false } }
                    })
                });
            }

            // --- Graphique Utilisation des Fonctionnalités (Adjusted for Light Mode) ---
            const featureUsageCtx = document.getElementById('featureUsageChart')?.getContext('2d');
            if (featureUsageCtx) {
                new Chart(featureUsageCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Simulations Ing.', 'Simulations Méd.', 'Simulations Com.', 'Consult. Écoles', 'Gestion Profil', 'Favoris'],
                        datasets: [{
                            label: 'Nombre d\'utilisations (30j)',
                            data: [550, 320, 410, 1800, 950, 600],
                            backgroundColor: [ // Use distinct colors
                                primaryColor,
                                blueColor,
                                purpleColor,
                                secondaryColor,
                                yellowColor,
                                emeraldColor
                            ],
                            borderWidth: 0,
                            borderRadius: 4,
                            barPercentage: 0.7,
                            categoryPercentage: 0.8
                        }]
                    },
                    options: mergeOptions({
                        plugins: { legend: { display: false } },
                        scales: { y: { title: { display: true, text: 'Interactions', color: chartTextColor } } }
                    })
                });
            }

            // --- Graphique Utilisateurs Actifs (Adjusted for Light Mode) ---
            const activeUsersCtx = document.getElementById('activeUsersChart')?.getContext('2d');
            if (activeUsersCtx) {
                const last30DaysLabels = Array.from({ length: 30 }, (_, i) => {
                    const date = new Date();
                    date.setDate(date.getDate() - (29 - i));
                    return `${date.getDate()}/${date.getMonth() + 1}`;
                });

                new Chart(activeUsersCtx, {
                    type: 'line',
                    data: {
                        labels: last30DaysLabels,
                        datasets: [{
                            label: 'Utilisateurs Actifs Journaliers',
                            data: [80, 85, 90, 88, 95, 100, 110, 105, 115, 120, 118, 125, 130, 128, 135, 140, 138, 145, 150, 148, 155, 160, 158, 165, 170, 168, 175, 180, 178, 185],
                            borderColor: blueColor,
                            // Background color adjusted for light mode visibility
                            backgroundColor: 'rgba(59, 130, 246, 0.15)',
                            borderWidth: 2,
                            tension: 0.2,
                            fill: true,
                            pointRadius: 0,
                            pointHoverRadius: 5
                        }]
                    },
                    options: mergeOptions({
                        plugins: { legend: { display: false } },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { color: chartTextColor, maxTicksLimit: 10 }
                            },
                            y: { title: { display: true, text: 'Nombre d\'utilisateurs', color: chartTextColor } }
                        }
                    })
                });
            }

        });
    </script>
@endsection
