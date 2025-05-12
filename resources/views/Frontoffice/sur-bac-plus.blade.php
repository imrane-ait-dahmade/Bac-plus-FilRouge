@extends('Layouts.App')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-8">Sur Bac+</h1>
                <p class="text-xl text-gray-600 mb-12">Votre plateforme de référence pour l'orientation post-bac</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Notre Mission</h2>
                    <p class="text-gray-600 mb-4">
                        Bac+ est une plateforme dédiée à l'orientation des étudiants marocains après l'obtention de leur
                        baccalauréat.
                        Notre mission est de simplifier le processus d'orientation en fournissant des informations complètes
                        et
                        pertinentes sur les établissements d'enseignement supérieur et les filières disponibles.
                    </p>
                    <p class="text-gray-600">
                        Nous nous engageons à aider chaque étudiant à faire le meilleur choix pour son avenir académique et
                        professionnel.
                    </p>
                </div>

                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Nos Services</h2>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>Recherche avancée d'établissements et de filières</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>Recommandations personnalisées basées sur vos préférences</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>Gestion des favoris pour suivre vos choix</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>Informations détaillées sur les établissements et les filières</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg shadow-sm mb-16">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Pourquoi Choisir Bac+ ?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-blue-100 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Rapidité</h3>
                        <p class="text-gray-600">Trouvez rapidement les informations dont vous avez besoin</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-100 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Fiabilité</h3>
                        <p class="text-gray-600">Des informations vérifiées et à jour</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-purple-100 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Personnalisation</h3>
                        <p class="text-gray-600">Des recommandations adaptées à vos besoins</p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Contactez-nous</h2>
                <p class="text-gray-600 mb-8">
                    Vous avez des questions ou des suggestions ? N'hésitez pas à nous contacter.
                </p>
                <a href="mailto:contact@bacplus.ma"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
@endsection