@extends('layouts.app')

@section('content')
    {{-- Main container with light background --}}
    <div class="student-dashboard p-4 sm:p-6 lg:p-8 bg-gray-100 min-h-screen">

        <!-- Welcome Banner -->
        <div class="bg-white rounded-lg p-6 mb-6 shadow-md border-l-4 border-custom-primary">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    {{-- Use Auth::user()->name for dynamic name --}}
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">Bienvenue, {{ Auth::user()->name ?? 'Samir' }}!</h1>
                    <p class="text-gray-600 mb-3">Votre parcours vers l'excellence commence ici.</p>
                    {{-- Simplified status indicators --}}
                    <div class="flex flex-wrap gap-3 text-sm">
                        <span class="inline-flex items-center text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profil complété à <strong class="ml-1">85%</strong> {{-- Example value --}}
                        </span>
                        <span class="inline-flex items-center text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <strong class="mx-1">3</strong> Candidatures en cours {{-- Example value --}}
                        </span>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 flex-shrink-0 flex space-x-3">
                    {{-- Primary action button --}}
                    <a href="" {{-- Example route --}}
                    class="px-4 py-2 bg-custom-primary hover:bg-custom-dark text-white rounded-md transition duration-300 flex items-center shadow-sm text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Nouvelle candidature
                    </a>
                    {{-- Secondary action button --}}
                    <a href="" {{-- Example route --}}
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md transition duration-300 flex items-center shadow-sm text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Calendrier
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            {{-- Stat Card 1 --}}
            <div class="bg-white rounded-lg p-5 shadow-md border-b-4 border-custom-primary">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Candidatures</p>
                        <h3 class="text-3xl font-bold text-gray-800">3</h3> {{-- Example value --}}
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">+1 cette semaine</p> {{-- Example value --}}
            </div>

            {{-- Stat Card 2 --}}
            <div class="bg-white rounded-lg p-5 shadow-md border-b-4 border-blue-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Établissements favoris</p>
                        <h3 class="text-3xl font-bold text-gray-800">7</h3> {{-- Example value --}}
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">+2 ce mois</p> {{-- Example value --}}
            </div>

            {{-- Stat Card 3 --}}
            <div class="bg-white rounded-lg p-5 shadow-md border-b-4 border-purple-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Formations consultées</p>
                        <h3 class="text-3xl font-bold text-gray-800">12</h3> {{-- Example value --}}
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">+5 ce mois</p> {{-- Example value --}}
            </div>

            {{-- Stat Card 4 --}}
            <div class="bg-white rounded-lg p-5 shadow-md border-b-4 border-yellow-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Jours avant le Bac</p>
                        <h3 class="text-3xl font-bold text-gray-800">45</h3> {{-- Example value --}}
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

        <!-- Main Dashboard Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left & Center Column -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Applications in Progress -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-gray-800">Candidatures en cours</h2>
                        <a href="{{ route('Etablissements') }}" {{-- Example route --}}
                        class="text-sm text-custom-primary hover:text-custom-dark transition">Voir toutes</a>
                    </div>
                    <div class="p-4 sm:p-6 space-y-4">
                        {{-- Application Item 1 --}}
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-3 gap-2">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center mr-3 text-custom-primary font-bold text-sm">
                                        ENSA
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">ENSA Marrakech</h3>
                                        <p class="text-sm text-gray-500">Génie Informatique</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium self-start sm:self-center">En attente</span>
                            </div>
                            <p class="text-xs text-gray-400 mb-2">Soumise le 15 juin 2023</p>
                            {{-- Progress Bar --}}
                            <div>
                                <div class="w-full bg-gray-200 rounded-full h-1.5 mb-1">
                                    <div class="bg-yellow-500 h-1.5 rounded-full" style="width: 50%"></div>
                                </div>
                                <div class="flex justify-between text-[10px] text-gray-400">
                                    <span>Soumission</span>
                                    <span>Présélection</span>
                                    <span>Concours</span>
                                    <span>Résultat</span>
                                </div>
                            </div>
                        </div>
                        {{-- Application Item 2 --}}
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-3 gap-2">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center mr-3 text-custom-primary font-bold text-sm">
                                        ENCG
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">ENCG Casablanca</h3>
                                        <p class="text-sm text-gray-500">Commerce International</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium self-start sm:self-center">Présélectionné</span>
                            </div>
                            <p class="text-xs text-gray-400 mb-2">Soumise le 10 juin 2023</p>
                            <div>
                                <div class="w-full bg-gray-200 rounded-full h-1.5 mb-1">
                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 75%"></div>
                                </div>
                                <div class="flex justify-between text-[10px] text-gray-400">
                                    <span>Soumission</span>
                                    <span>Présélection</span>
                                    <span>Concours</span>
                                    <span>Résultat</span>
                                </div>
                            </div>
                        </div>
                        {{-- Application Item 3 --}}
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 opacity-70"> {{-- Reduced opacity for rejected --}}
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-3 gap-2">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center mr-3 text-gray-500 font-bold text-sm">
                                        FST
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-700">FST Mohammedia</h3>
                                        <p class="text-sm text-gray-500">Génie Électrique</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium self-start sm:self-center">Refusée</span>
                            </div>
                            <p class="text-xs text-gray-400 mb-2">Soumise le 5 juin 2023</p>
                            <div>
                                <div class="w-full bg-gray-200 rounded-full h-1.5 mb-1">
                                    <div class="bg-red-500 h-1.5 rounded-full" style="width: 25%"></div>
                                </div>
                                <div class="flex justify-between text-[10px] text-gray-400">
                                    <span>Soumission</span>
                                    <span>Présélection</span>
                                    <span>Concours</span>
                                    <span>Résultat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended Establishments -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-gray-800">Recommandés pour vous</h2>
                        <a href="{{ route('Etablissements') }}" {{-- Example route --}}
                        class="text-sm text-custom-primary hover:text-custom-dark transition">Explorer plus</a>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            {{-- Recommendation Card 1 --}}
                            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group bg-white">
                                <div class="relative">
                                    {{-- Use a more descriptive placeholder or real image --}}
                                    <img src="https://via.placeholder.com/600x300/EBF4FF/76A9FA?text=INPT+Rabat" alt="INPT" class="w-full h-36 object-cover">
                                    <div class="absolute top-2 right-2">
                                        {{-- Favorite Button --}}
                                        <button class="p-1.5 bg-white/80 hover:bg-white rounded-full text-gray-500 hover:text-red-500 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-800 mb-1 truncate" title="INPT Rabat">INPT Rabat</h3>
                                    <p class="text-xs text-gray-500 mb-2 truncate">Institut National des Postes et Télécommunications</p>
                                    {{-- Rating --}}
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400">
                                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            {{-- Repeat for rating --}}
                                        </div>
                                        <span class="text-xs text-gray-400 ml-1.5">4.9 (120 avis)</span>
                                    </div>
                                    {{-- Tags --}}
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        <span class="px-2 py-0.5 bg-gray-100 text-[10px] text-gray-600 rounded font-medium">Ingénierie</span>
                                        <span class="px-2 py-0.5 bg-gray-100 text-[10px] text-gray-600 rounded font-medium">Télécoms</span>
                                        <span class="px-2 py-0.5 bg-gray-100 text-[10px] text-gray-600 rounded font-medium">Rabat</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs font-medium text-green-600">Correspondance: 95%</span>
                                        <a href="#" class="text-xs text-white bg-custom-primary hover:bg-custom-dark px-3 py-1 rounded-full transition duration-300 shadow-sm">Détails</a>
                                    </div>
                                </div>
                            </div>
                            {{-- Recommendation Card 2 --}}
                            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group bg-white">
                                <div class="relative">
                                    <img src="https://via.placeholder.com/600x300/FEF3C7/D97706?text=EMI+Rabat" alt="EMI" class="w-full h-36 object-cover">
                                    <div class="absolute top-2 right-2">
                                        <button class="p-1.5 bg-white/80 hover:bg-white rounded-full text-gray-500 hover:text-red-500 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-800 mb-1 truncate" title="EMI Rabat">EMI Rabat</h3>
                                    <p class="text-xs text-gray-500 mb-2 truncate">École Mohammadia d'Ingénieurs</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400">
                                            {{-- Add star icons --}}
                                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        </div>
                                        <span class="text-xs text-gray-400 ml-1.5">4.8 (210 avis)</span>
                                    </div>
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        <span class="px-2 py-0.5 bg-gray-100 text-[10px] text-gray-600 rounded font-medium">Génie Civil</span>
                                        <span class="px-2 py-0.5 bg-gray-100 text-[10px] text-gray-600 rounded font-medium">Électrique</span>
                                        <span class="px-2 py-0.5 bg-gray-100 text-[10px] text-gray-600 rounded font-medium">Rabat</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs font-medium text-green-600">Correspondance: 92%</span>
                                        <a href="#" class="text-xs text-white bg-custom-primary hover:bg-custom-dark px-3 py-1 rounded-full transition duration-300 shadow-sm">Détails</a>
                                    </div>
                                </div>
                            </div>
                            {{-- Add more recommendation cards if needed --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Profile Completion -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="font-semibold text-lg text-gray-800 mb-3">Compléter votre profil</h3>
                    <p class="text-sm text-gray-500 mb-3">Un profil complet améliore vos chances et recommandations.</p>
                    {{-- Progress Bar for Profile --}}
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
                        <div class="bg-custom-primary h-2.5 rounded-full" style="width: 85%"></div> {{-- Example value --}}
                    </div>
                    <div class="text-right text-sm font-medium text-custom-primary mb-4">85%</div>
                    <a href="" {{-- Example route --}}
                    class="block w-full text-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md transition duration-300 text-sm font-medium">
                        Modifier le profil
                    </a>
                </div>

                <!-- Upcoming Deadlines -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Échéances importantes</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-xs font-bold">
                                J-5
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Clôture Concours ENSA</p>
                                <p class="text-xs text-gray-500">Date limite: 30 Juin 2023</p>
                            </div>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-100 text-yellow-700 flex items-center justify-center text-xs font-bold">
                                J-12
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Résultats Présélection ENCG</p>
                                <p class="text-xs text-gray-500">Date prévue: 07 Juillet 2023</p>
                            </div>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">
                                J-20
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Début Concours FST</p>
                                <p class="text-xs text-gray-500">Date: 15 Juillet 2023</p>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-4 text-center">
                        <a href="" {{-- Example route --}}
                        class="text-sm text-custom-primary hover:text-custom-dark">Voir le calendrier complet</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Liens Rapides</h3>
                    <div class="space-y-2">
                        <a href="{{ route('Etablissements') }}" class="flex items-center p-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-custom-primary transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            <span class="text-sm">Chercher Établissements</span>
                        </a>
                        <a href="" class="flex items-center p-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-custom-primary transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            <span class="text-sm">Mes Candidatures</span>
                        </a>
                        <a href="" {{-- Example route --}} class="flex items-center p-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-custom-primary transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                            <span class="text-sm">Mes Favoris</span>
                        </a>
                        <a href="" {{-- Example route --}} class="flex items-center p-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-custom-primary transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.79 4 4s-1.79 4-4 4c-1.742 0-3.223-.835-3.772-2M12 18.75a.75.75 0 100-1.5.75.75 0 000 1.5z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z" /></svg>
                            <span class="text-sm">Aide & Support</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('styles')
    {{-- Ensure your custom colors are defined for light mode --}}
    <style>
        .text-custom-primary { color: #4CAF50; /* Example: Green 500 */ }
        .border-custom-primary { border-color: #4CAF50; }
        .bg-custom-primary { background-color: #4CAF50; }
        .hover\:bg-custom-dark:hover { background-color: #388E3C; /* Example: Green 700 */ }
        .hover\:text-custom-dark:hover { color: #388E3C; }
        .bg-custom-light { background-color: #E8F5E9; /* Example: Green 50 */ }
        .focus\:ring-custom-primary:focus { /* If using focus rings */
            --tw-ring-color: #4CAF50;
        }
    </style>
@endpush

@push('scripts')
    {{-- Add any specific JS for this dashboard if needed --}}
    <script>
        // Example: Add interactivity to favorite buttons
        document.querySelectorAll('.favorite-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default link behavior if it's an <a> tag
                // Add logic to toggle favorite status (e.g., send AJAX request)
                this.classList.toggle('text-red-500'); // Toggle favorite icon color
                this.classList.toggle('text-gray-500');
                // You might want to change the fill as well
            });
        });
    </script>
@endpush
