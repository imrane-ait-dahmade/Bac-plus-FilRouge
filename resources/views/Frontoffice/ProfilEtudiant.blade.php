@extends('layouts.app')

@section('content')
    <div class="profile-section">
        <!-- En-tête du profil -->
        <div class="bg-gray-800 rounded-lg p-6 mb-6 shadow-lg">
            <div class="flex flex-col md:flex-row">
                <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                    <div class="relative">
                        <img src="https://placehold.co/200x200/e2e8f0/475569?text=SM" alt="Photo de profil" class="h-32 w-32 rounded-full object-cover border-4 border-custom-primary">
                        <button class="absolute bottom-0 right-0 bg-custom-primary hover:bg-custom-dark text-white p-2 rounded-full shadow-lg transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-white mb-1">Samir Mehdi</h1>
                            <p class="text-custom-light mb-3">Étudiant en Terminale - Sciences Mathématiques</p>
                            <div class="flex flex-col sm:flex-row sm:items-center text-gray-300 mb-4">
                            <span class="flex items-center mb-2 sm:mb-0 sm:mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                samir.mehdi@email.com
                            </span>
                                <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Casablanca, Maroc
                            </span>
                            </div>
                        </div>
                        <div class="flex space-x-3 mt-2 md:mt-0">
                            <button class="bg-custom-primary hover:bg-custom-dark text-white px-4 py-2 rounded-md transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Modifier le profil
                            </button>
                            <button class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                Partager
                            </button>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Bac 2024</span>
                        <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Sciences Mathématiques</span>
                        <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Ingénierie</span>
                        <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Informatique</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grille principale du profil -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Colonne de gauche -->
            <div class="space-y-6">
                <!-- Informations personnelles -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Informations personnelles</h2>
                        <button class="text-custom-primary hover:text-custom-light transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm text-gray-400 mb-1">Nom complet</p>
                                <p class="text-white">Samir Mehdi</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400 mb-1">Date de naissance</p>
                                <p class="text-white">15 mars 2006</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400 mb-1">Téléphone</p>
                                <p class="text-white">+212 6XX XX XX XX</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400 mb-1">Email</p>
                                <p class="text-white">samir.mehdi@email.com</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400 mb-1">Adresse</p>
                                <p class="text-white">123 Rue des Écoles, Casablanca, Maroc</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Compétences -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Compétences</h2>
                        <button class="text-custom-primary hover:text-custom-light transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-white">Mathématiques</span>
                                    <span class="text-custom-light">Excellent</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-custom-primary h-2 rounded-full" style="width: 90%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-white">Physique</span>
                                    <span class="text-custom-light">Très bon</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-custom-primary h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-white">Programmation</span>
                                    <span class="text-custom-light">Bon</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-custom-primary h-2 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-white">Anglais</span>
                                    <span class="text-custom-light">Intermédiaire</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-custom-primary h-2 rounded-full" style="width: 65%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-white">Français</span>
                                    <span class="text-custom-light">Excellent</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-custom-primary h-2 rounded-full" style="width: 95%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Centres d'intérêt -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Centres d'intérêt</h2>
                        <button class="text-custom-primary hover:text-custom-light transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Intelligence Artificielle</span>
                            <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Robotique</span>
                            <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Développement Web</span>
                            <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Échecs</span>
                            <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Football</span>
                            <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Lecture</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne centrale et droite -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Parcours scolaire -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Parcours scolaire</h2>
                        <button class="text-custom-primary hover:text-custom-light transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <div class="flex">
                                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-700 flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-medium text-white">Lycée Al Khawarizmi</h3>
                                    <p class="text-custom-light">Baccalauréat Sciences Mathématiques</p>
                                    <p class="text-gray-400 text-sm">2021 - 2024 (en cours)</p>
                                    <p class="text-gray-300 mt-2">Moyenne générale: 17/20</p>
                                    <div class="mt-2">
                                        <span class="px-2 py-1 bg-gray-700 text-gray-300 rounded text-xs">Mathématiques: 18/20</span>
                                        <span class="px-2 py-1 bg-gray-700 text-gray-300 rounded text-xs ml-2">Physique: 17/20</span>
                                        <span class="px-2 py-1 bg-gray-700 text-gray-300 rounded text-xs ml-2">SVT: 16/20</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-700 flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-medium text-white">Collège Ibn Sina</h3>
                                    <p class="text-custom-light">Brevet d'Enseignement Collégial</p>
                                    <p class="text-gray-400 text-sm">2018 - 2021</p>
                                    <p class="text-gray-300 mt-2">Mention: Très Bien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Candidatures -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Mes candidatures</h2>
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
                        <div class="mt-4">
                            <button class="w-full bg-custom-primary hover:bg-custom-dark text-white py-2 rounded-md transition duration-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Nouvelle candidature
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Établissements favoris -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h2 class="font-semibold text-lg text-white">Établissements favoris</h2>
                        <a href="#" class="text-custom-primary hover:text-custom-light transition">Voir tous</a>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-700 rounded-lg p-4 flex items-center">
                                <img src="https://placehold.co/100x100/e2e8f0/475569?text=ENSA" alt="ENSA" class="h-16 w-16 rounded-md mr-4">
                                <div>
                                    <h3 class="font-medium text-white">ENSA Marrakech</h3>
                                    <p class="text-sm text-gray-300">École Nationale des Sciences Appliquées</p>
                                    <div class="flex items-center mt-1">
                                        <div class="flex">
                                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1
