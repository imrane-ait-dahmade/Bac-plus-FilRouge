@extends('layouts.app')

@section('content')
    <div class="student-dashboard">
        <!-- Bannière de bienvenue personnalisée -->
        <div class="bg-gray-800 rounded-lg p-6 mb-6 shadow-lg border-l-4 border-custom-primary">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Bienvenue, Samir!</h1>
                    <p class="text-gray-300">Votre parcours vers l'excellence commence ici.</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                    <span class="inline-flex items-center px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Profil complété à 85%
                    </span>
                        <span class="inline-flex items-center px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        3 candidatures en cours
                    </span>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-3">
                    <button class="bg-custom-primary hover:bg-custom-dark text-white px-4 py-2 rounded-md transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Nouvelle candidature
                    </button>
                    <button class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Calendrier
                    </button>
                </div>
            </div>
        </div>

        <!-- Statistiques rapides -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-b-4 border-custom-primary">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Candidatures</p>
                        <h3 class="text-3xl font-bold text-white">3</h3>
                        <p class="text-custom-light text-sm mt-2">+1 cette semaine</p>
                    </div>
                    <div class="p-3 bg-gray-700 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-b-4 border-blue-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Établissements favoris</p>
                        <h3 class="text-3xl font-bold text-white">7</h3>
                        <p class="text-blue-300 text-sm mt-2">+2 ce mois</p>
                    </div>
                    <div class="p-3 bg-gray-700 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-b-4 border-purple-500">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Formations consultées</p>
                        <h3 class="text-3xl font-bold text-white">12</h3>
                        <p class="text-purple-300 text-sm mt-2">+5 ce mois</p>
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
                        <p class="text-gray-400 text-sm mb-1">Jours avant le Bac</p>
                        <h3 class="text-3xl font-bold text-white">45</h3>
                        <p class="text-yellow-300 text-sm mt-2">Préparez-vous!</p>
                    </div>
                    <div class="p-3 bg-gray-700 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grille principale du tableau de bord -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Colonne de gauche et centrale -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Candidatures en cours -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Candidatures en cours</h2>
                        <a href="#" class="text-custom-primary hover:text-custom-light transition">Voir toutes</a>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="bg-gray-700 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-600 flex items-center justify-center mr-4 text-custom-primary font-bold">
                                            ENSA
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-white">ENSA Marrakech</h3>
                                            <p class="text-gray-300">Génie Informatique</p>
                                            <p class="text-sm text-gray-400 mt-1">Soumise le 15 juin 2023</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">En attente</span>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full bg-gray-600 rounded-full h-2">
                                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 50%"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-gray-400">
                                        <span>Soumission</span>
                                        <span>Présélection</span>
                                        <span>Concours</span>
                                        <span>Résultat</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-700 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-600 flex items-center justify-center mr-4 text-custom-primary font-bold">
                                            ENCG
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-white">ENCG Casablanca</h3>
                                            <p class="text-gray-300">Commerce International</p>
                                            <p class="text-sm text-gray-400 mt-1">Soumise le 10 juin 2023</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Présélectionné</span>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full bg-gray-600 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full" style="width: 75%"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-gray-400">
                                        <span>Soumission</span>
                                        <span>Présélection</span>
                                        <span>Concours</span>
                                        <span>Résultat</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-700 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-600 flex items-center justify-center mr-4 text-custom-primary font-bold">
                                            FST
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-white">FST Mohammedia</h3>
                                            <p class="text-gray-300">Génie Électrique</p>
                                            <p class="text-sm text-gray-400 mt-1">Soumise le 5 juin 2023</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">Refusée</span>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full bg-gray-600 rounded-full h-2">
                                        <div class="bg-red-500 h-2 rounded-full" style="width: 25%"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-gray-400">
                                        <span>Soumission</span>
                                        <span>Présélection</span>
                                        <span>Concours</span>
                                        <span>Résultat</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Établissements recommandés -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Recommandés pour vous</h2>
                        <a href="#" class="text-custom-primary hover:text-custom-light transition">Explorer plus</a>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 group">
                                <div class="relative">
                                    <img src="https://placehold.co/600x300/e2e8f0/475569?text=INPT" alt="INPT" class="w-full h-40 object-cover">
                                    <div class="absolute top-2 right-2">
                                        <button class="p-2 bg-gray-800/70 rounded-full text-gray-300 hover:text-custom-primary transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-white mb-1">INPT Rabat</h3>
                                    <p class="text-sm text-gray-300 mb-3">Institut National des Postes et Télécommunications</p>
                                    <div class="flex items-center mb-3">
                                        <div class="flex">
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-gray-400 ml-2">4.9 (120 avis)</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <span class="px-2 py-1 bg-gray-600 text-xs text-gray-300 rounded">Ingénierie</span>
                                        <span class="px-2 py-1 bg-gray-600 text-xs text-gray-300 rounded">Télécommunications</span>
                                        <span class="px-2 py-1 bg-gray-600 text-xs text-gray-300 rounded">Rabat</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-custom-primary">Correspondance: 95%</span>
                                        <a href="#" class="text-sm text-white bg-custom-primary hover:bg-custom-dark px-3 py-1 rounded transition duration-300">Voir détails</a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 group">
                                <div class="relative">
                                    <img src="https://placehold.co/600x300/e2e8f0/475569?text=EMI" alt="EMI" class="w-full h-40 object-cover">
                                    <div class="absolute top-2 right-2">
                                        <button class="p-2 bg-gray-800/70 rounded-full text-gray-300 hover:text-custom-primary transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-white mb-1">EMI Rabat</h3>
                                    <p class="text-sm text-gray-300 mb-3">École Mohammadia d'Ingénieurs</p>
                                    <div class="flex items-center mb-3">
                                        <div class="flex">
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.
