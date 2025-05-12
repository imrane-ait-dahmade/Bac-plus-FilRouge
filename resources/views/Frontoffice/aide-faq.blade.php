@extends('Layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Centre d'Aide et FAQ</h1>
            <p class="text-lg text-gray-600">Trouvez rapidement des réponses à vos questions</p>
        </div>

        {{-- Section FAQ --}}
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Questions Fréquentes</h2>

            <div class="space-y-6">
                {{-- Question 1 --}}
                <div class="border-b border-gray-200 pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Comment puis-je trouver un établissement qui
                        correspond à mes critères ?</h3>
                    <p class="text-gray-600">Utilisez notre système de recherche avancée dans la section "Établissements".
                        Vous pouvez filtrer par domaine d'études, localisation, et autres critères importants pour vous.</p>
                </div>

                {{-- Question 2 --}}
                <div class="border-b border-gray-200 pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Comment fonctionne le système de recommandations ?
                    </h3>
                    <p class="text-gray-600">Notre système analyse vos favoris et votre historique de consultation pour vous
                        proposer des établissements et des filières qui correspondent à vos intérêts. Plus vous utilisez la
                        plateforme, plus les recommandations sont pertinentes.</p>
                </div>

                {{-- Question 3 --}}
                <div class="border-b border-gray-200 pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Comment puis-je sauvegarder mes établissements
                        favoris ?</h3>
                    <p class="text-gray-600">Connectez-vous à votre compte étudiant et cliquez sur l'icône cœur à côté de
                        chaque établissement que vous souhaitez sauvegarder. Vous pourrez retrouver tous vos favoris dans la
                        section "Favoris" de votre profil.</p>
                </div>

                {{-- Question 4 --}}
                <div class="border-b border-gray-200 pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Comment mettre à jour mes informations personnelles ?
                    </h3>
                    <p class="text-gray-600">Accédez à votre profil en cliquant sur votre avatar dans la barre de
                        navigation, puis sélectionnez "Mon profil". Vous pourrez y modifier toutes vos informations
                        personnelles.</p>
                </div>
            </div>
        </div>

        {{-- Section Contact --}}
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Besoin d'aide supplémentaire ?</h2>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Formulaire de contact --}}
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Contactez-nous</h3>
                    <form class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="name" name="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Sujet</label>
                            <input type="text" id="subject" name="subject"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-primary focus:ring-custom-primary"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-custom-primary text-white py-2 px-4 rounded-md hover:bg-custom-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-primary">
                            Envoyer
                        </button>
                    </form>
                </div>

                {{-- Informations de contact --}}
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Autres moyens de nous contacter</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-custom-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Email</p>
                                <p class="text-sm text-gray-600">support@bacplus.ma</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-custom-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Téléphone</p>
                                <p class="text-sm text-gray-600">+212 5XX-XXXXXX</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-custom-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Adresse</p>
                                <p class="text-sm text-gray-600">123 Rue de l'Education<br>Rabat, Maroc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection