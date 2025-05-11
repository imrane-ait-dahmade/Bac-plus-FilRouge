@extends('Layouts.App')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-6">Historique des Consultations</h2>

                @if($history->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">Vous n'avez pas encore consulté d'établissements.</p>
                        <a href="{{ route('Etablissements') }}"
                            class="mt-4 inline-block px-4 py-2 bg-custom-primary text-white rounded-md hover:bg-custom-dark transition duration-150">
                            Découvrir les établissements
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Établissement
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Université
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Région
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date de consultation
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($history as $record)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if($record->etablissement->logo)
                                                    <img src="{{ asset('storage/' . $record->etablissement->logo) }}"
                                                        alt="Logo {{ $record->etablissement->nom }}"
                                                        class="h-10 w-10 object-contain rounded-full">
                                                @else
                                                    <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                                        <span class="text-gray-500 text-xs">No logo</span>
                                                    </div>
                                                @endif
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $record->etablissement->nom }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $record->etablissement->universite->nom }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $record->etablissement->region->nom }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $record->viewed_at->format('d/m/Y H:i') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('etablisement_infos', $record->etablissement->id) }}"
                                                class="text-custom-primary hover:text-custom-dark">
                                                Voir les détails
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $history->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection