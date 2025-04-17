@extends('layouts.app')

@section('content')
    <div class="dashboard">
        <!-- En-tête du tableau de bord -->
        <div class="bg-gray-800 rounded-lg p-6 mb-6 border-l-4 border-custom-primary shadow-lg">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Bienvenue, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-300">Tableau de bord administrateur - Vue d'ensemble du système</p>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-3">
                    <button class="bg-custom-primary hover:bg-custom-dark text-white px-4 py-2 rounded-md transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Nouvel établissement
                    </button>
                    <button class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-300 flex items-center">
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
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-b-4 border-custom-primary">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Total Étudiants</p>
                        <h3 class="text-3xl font-bold text-white">1,248</h3>
                        <p class="text-custom-light text-sm mt-2">+12% ce mois</p>
                    </div>
                    <div class="p-3 bg-gray-700 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-b-4 border-blue-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Établissements</p>
                        <h3 class="text-3xl font-bold text-white">143</h3>
                        <p class="text-blue-300 text-sm mt-2">+3 cette semaine</p>
                    </div>
                    <div class="p-3 bg-gray-700 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-b-4 border-purple-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Formations</p>
                        <h3 class="text-3xl font-bold text-white">526</h3>
                        <p class="text-purple-300 text-sm mt-2">+8 ce mois</p>
                    </div>
                    <div class="p-3 bg-gray-700 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-b-4 border-yellow-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Candidatures</p>
                        <h3 class="text-3xl font-bold text-white">872</h3>
                        <p class="text-yellow-300 text-sm mt-2">+24% ce mois</p>
                    </div>
                    <div class="p-3 bg-gray-700 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grille principale du tableau de bord -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Colonne de gauche -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Graphique des inscriptions -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Inscriptions mensuelles</h2>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 bg-gray-700 text-gray-300 rounded-md text-sm hover:bg-gray-600 transition">Année</button>
                            <button class="px-3 py-1 bg-custom-primary text-white rounded-md text-sm">Mois</button>
                            <button class="px-3 py-1 bg-gray-700 text-gray-300 rounded-md text-sm hover:bg-gray-600 transition">Semaine</button>
                        </div>
                    </div>
                    <div class="p-6">
                        <canvas id="inscriptionsChart" height="300"></canvas>
                    </div>
                </div>

                <!-- Établissements récemment ajoutés -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Établissements récemment ajoutés</h2>
                        <a href="#" class="text-custom-primary hover:text-custom-light transition">Voir tous</a>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Ville</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date d'ajout</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-custom-primary font-bold">UM5</div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">Université Mohammed V</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Université Publique</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Rabat</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">15 Oct 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-custom-primary hover:text-custom-light mr-3">Éditer</a>
                                        <a href="#" class="text-red-500 hover:text-red-400">Supprimer</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-custom-primary font-bold">ENSA</div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">ENSA Marrakech</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">École d'Ingénieurs</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Marrakech</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">12 Oct 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-custom-primary hover:text-custom-light mr-3">Éditer</a>
                                        <a href="#" class="text-red-500 hover:text-red-400">Supprimer</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-custom-primary font-bold">ENCG</div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">ENCG Casablanca</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">École de Commerce</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Casablanca</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">10 Oct 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-custom-primary hover:text-custom-light mr-3">Éditer</a>
                                        <a href="#" class="text-red-500 hover:text-red-400">Supprimer</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite -->
            <div class="space-y-6">
                <!-- Activité récente -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700">
                        <h2 class="font-semibold text-lg text-white">Activité récente</h2>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-4">
                            <li class="flex items-start space-x-3">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-300"><span class="font-medium text-white">Ahmed Mehdi</span> s'est inscrit sur la plateforme</p>
                                    <p class="text-xs text-gray-500 mt-1">Il y a 35 minutes</p>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-300"><span class="font-medium text-white">FST Mohammedia</span> a été mis à jour</p>
                                    <p class="text-xs text-gray-500 mt-1">Il y a 2 heures</p>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-300"><span class="font-medium text-white">Fatima Zahra</span> a soumis une candidature à <span class="font-medium text-white">ENCG Casablanca</span></p>
                                    <p class="text-xs text-gray-500 mt-1">Il y a 3 heures</p>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-300"><span class="font-medium text-white">Karim Alaoui</span> a supprimé une formation</p>
                                    <p class="text-xs text-gray-500 mt-1">Il y a 5 heures</p>
                                </div>
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="#" class="text-sm text-custom-primary hover:text-custom-light">Voir toutes les activités</a>
                        </div>
                    </div>
                </div>

                <!-- Répartition des utilisateurs -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700">
                        <h2 class="font-semibold text-lg text-white">Répartition des utilisateurs</h2>
                    </div>
                    <div class="p-6">
                        <canvas id="userDistributionChart" height="220"></canvas>
                    </div>
                </div>

                <!-- Tâches à faire -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700">
                        <h2 class="font-semibold text-lg text-white">Tâches à faire</h2>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 text-custom-primary rounded border-gray-600 focus:ring-custom-primary bg-gray-700">
                                <span class="ml-3 text-gray-300">Valider les nouvelles inscriptions (5)</span>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 text-custom-primary rounded border-gray-600 focus:ring-custom-primary bg-gray-700">
                                <span class="ml-3 text-gray-300">Mettre à jour les dates d'admission</span>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 text-custom-primary rounded border-gray-600 focus:ring-custom-primary bg-gray-700">
                                <span class="ml-3 text-gray-300">Répondre aux messages des utilisateurs (3)</span>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 text-custom-primary rounded border-gray-600 focus:ring-custom-primary bg-gray-700" checked>
                                <span class="ml-3 text-gray-500 line-through">Publier l'article sur les nouvelles formations</span>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 text-custom-primary rounded border-gray-600 focus:ring-custom-primary bg-gray-700">
                                <span class="ml-3 text-gray-300">Préparer le rapport mensuel</span>
                            </li>
                        </ul>
                        <div class="mt-4">
                            <button class="w-full bg-gray-700 hover:bg-gray-600 text-white py-2 rounded-md transition duration-300 flex items-center justify-center">
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
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Graphique des inscriptions
            const inscriptionsCtx = document.getElementById('inscriptionsChart').getContext('2d');
            const inscriptionsChart = new Chart(inscriptionsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                    datasets: [{
                        label: 'Inscriptions',
                        data: [65, 78, 90, 105, 112, 120, 110, 85, 95, 130, 142, 155],
                        backgroundColor: 'rgba(147, 216, 114, 0.2)',
                        borderColor: '#93D872',
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: '#93D872'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            }
                        }
                    }
                }
            });

            // Graphique de répartition des utilisateurs
            const userDistributionCtx = document.getElementById('userDistributionChart').getContext('2d');
            const userDistributionChart = new Chart(userDistributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Étudiants', 'Administrateurs', 'Contributeurs', 'Conseillers'],
                    datasets: [{
                        data: [75, 5, 10, 10],
                        backgroundColor: [
                            '#93D872',
                            '#72AE55',
                            '#B3DCA0',
                            '#5D8B45'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: 'rgba(255, 255, 255, 0.7)',
                                padding: 15,
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
@endsection
