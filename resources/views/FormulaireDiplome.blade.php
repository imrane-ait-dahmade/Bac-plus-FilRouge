@extends('Layouts.App')

@section('head_scripts') {{-- Pour ajouter des styles spécifiques à la page --}}
<style>
    .input-style {
        margin-top: 0.25rem;
        display: block;
        width: 100%;
        border-color: #d1d5db; /* gray-300 */
        border-width: 1px;
        border-radius: 0.5rem; /* rounded-lg */
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); /* shadow-sm */
        padding: 0.75rem; /* p-3 */
    }
    .input-style:focus {
        border-color: #72AE55; /* custom-dark */
        --tw-ring-color: rgba(179, 220, 160, 0.5); /* custom-light avec opacité */
        box-shadow: 0 0 0 3px var(--tw-ring-color);
        outline: 2px solid transparent;
        outline-offset: 2px;
    }
    .input-error {
        border-color: #ef4444; /* red-500 */
    }
    .input-error:focus {
        border-color: #ef4444;
        --tw-ring-color: rgba(248, 113, 113, 0.5); /* red-400 avec opacité */
         box-shadow: 0 0 0 3px var(--tw-ring-color);
    }
    .error-message {
        color: #ef4444; /* red-500 */
        font-size: 0.75rem; /* text-xs */
        margin-top: 0.25rem; /* mt-1 */
    }
    .input-table {
        margin-top: 0.1rem;
        width: 100%;
        border-color: #d1d5db;
        border-width: 1px;
        padding: 0.4rem 0.6rem;
        border-radius: 0.375rem; /* rounded-md */
    }
    .input-table:focus {
        border-color: #72AE55;
        --tw-ring-color: rgba(179, 220, 160, 0.5);
        box-shadow: 0 0 0 2px var(--tw-ring-color);
    }
</style>
@endsection

@section('content')
<div class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 min-h-screen py-10 px-4">
    <div class="max-w-4xl mx-auto"> {{-- Augmenté la largeur max pour le tableau de notes --}}

        <div class="text-center mb-10">
            <svg class="w-16 h-16 mx-auto mb-4 text-custom-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            <h1 class="text-4xl font-bold text-gray-800">Profil Étudiant Détaillé</h1>
            <p class="mt-2 text-lg text-gray-600">
                Partagez vos informations pour nous aider à construire un meilleur système de recommandation.
            </p>
        </div>

        <form action="" {{-- Définir cette route --}} method="POST" class="bg-white rounded-xl shadow-2xl p-6 sm:p-10 space-y-8">
            @csrf

            {{-- Section: Identité et Baccalauréat --}}
            <fieldset class="space-y-6 border-b border-gray-200 pb-8">
                <legend class="text-xl font-semibold text-gray-700 mb-3">Informations Baccalauréat</legend>
                <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2">
                    <div>
                        <label for="code_massar" class="block text-sm font-medium text-gray-700 mb-1">Code Massar (G13 ou CNE) <span class="text-red-500">*</span></label>
                        <input type="text" name="code_massar" id="code_massar" placeholder="Ex: G123456789 ou X12345678"
                               class="input-style @error('code_massar') input-error @enderror" required value="{{ old('code_massar') }}">
                        @error('code_massar') <p class="error-message">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="annee_bac" class="block text-sm font-medium text-gray-700 mb-1">Année d'obtention du Bac <span class="text-red-500">*</span></label>
                        <input type="number" name="annee_bac" id="annee_bac" placeholder="Ex: 2022" min="2000" max="{{ date('Y') }}"
                               class="input-style @error('annee_bac') input-error @enderror" required value="{{ old('annee_bac') }}">
                        @error('annee_bac') <p class="error-message">{{ $message }}</p> @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="type_bac" class="block text-sm font-medium text-gray-700 mb-1">Filière/Type de Baccalauréat <span class="text-red-500">*</span></label>
                        <input type="text" name="type_bac" id="type_bac" placeholder="Ex: Sciences Maths A, SVT-PC, Sc Économiques, Lettres..."
                               class="input-style @error('type_bac') input-error @enderror" required value="{{ old('type_bac') }}">
                        @error('type_bac') <p class="error-message">{{ $message }}</p> @enderror
                    </div>
                     <div>
                        <label for="mention_bac" class="block text-sm font-medium text-gray-700 mb-1">Mention au Bac</label>
                        <select name="mention_bac" id="mention_bac" class="input-style">
                            <option value="">Sélectionner une mention</option>
                            <option value="Passable" {{ old('mention_bac') == 'Passable' ? 'selected' : '' }}>Passable</option>
                            <option value="Assez Bien" {{ old('mention_bac') == 'Assez Bien' ? 'selected' : '' }}>Assez Bien</option>
                            <option value="Bien" {{ old('mention_bac') == 'Bien' ? 'selected' : '' }}>Bien</option>
                            <option value="Très Bien" {{ old('mention_bac') == 'Très Bien' ? 'selected' : '' }}>Très Bien</option>
                             <option value="Excellent" {{ old('mention_bac') == 'Excellent' ? 'selected' : '' }}>Excellent (si applicable)</option>
                        </select>
                    </div>
                    <div>
                        <label for="moyenne_generale_bac" class="block text-sm font-medium text-gray-700 mb-1">Moyenne Générale du Bac</label>
                        <input type="number" step="0.01" name="moyenne_generale_bac" id="moyenne_generale_bac" placeholder="Ex: 15.75" min="0" max="20"
                               class="input-style @error('moyenne_generale_bac') input-error @enderror" value="{{ old('moyenne_generale_bac') }}">
                        @error('moyenne_generale_bac') <p class="error-message">{{ $message }}</p @enderror
                    </div>
                </div>
            </fieldset>

            {{-- Section: Notes du Baccalauréat --}}
            <fieldset class="space-y-6 border-b border-gray-200 pb-8">
                <legend class="text-xl font-semibold text-gray-700 mb-3">Notes du Baccalauréat</legend>
                <p class="text-sm text-gray-600 mb-4">Veuillez indiquer vos notes pour les matières principales de votre filière.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Notes Examen Régional --}}
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-800">Examen Régional</h3>
                        @php
                            $matieres_regionales = ['Français', 'Arabe', 'Education Islamique', 'Histoire-Géographie'];
                            // Ajoutez d'autres matières régionales communes ou laissez des champs libres
                        @endphp
                        @foreach($matieres_regionales as $index => $matiere)
                        <div class="grid grid-cols-3 gap-2 items-center">
                            <label for="note_regional_{{ $index }}" class="col-span-2 block text-sm font-medium text-gray-700">{{ $matiere }}</label>
                            <input type="number" step="0.01" name="notes_regional[{{ Str::slug($matiere, '_') }}]" id="note_regional_{{ $index }}" placeholder=" /20" min="0" max="20"
                                   class="input-table @error('notes_regional.'.Str::slug($matiere, '_')) input-error @enderror" value="{{ old('notes_regional.'.Str::slug($matiere, '_')) }}">
                            @error('notes_regional.'.Str::slug($matiere, '_')) <p class="error-message col-span-3 text-right">{{ $message }}</p @enderror
                        </div>
                        @endforeach
                         {{-- Champ pour une matière régionale libre --}}
                        <div class="grid grid-cols-3 gap-2 items-center">
                            <input type="text" name="autre_matiere_regional_nom" placeholder="Autre matière (Ex: Traduction)" class="col-span-2 input-table" value="{{ old('autre_matiere_regional_nom') }}">
                            <input type="number" step="0.01" name="notes_regional[autre]" placeholder=" /20" min="0" max="20"
                                   class="input-table @error('notes_regional.autre') input-error @enderror" value="{{ old('notes_regional.autre') }}">
                            @error('notes_regional.autre') <p class="error-message col-span-3 text-right">{{ $message }}</p @enderror
                        </div>
                        <div class="grid grid-cols-3 gap-2 items-center pt-2">
                            <label for="moyenne_regional" class="col-span-2 block text-sm font-semibold text-gray-700">Moyenne Régional</label>
                            <input type="number" step="0.01" name="moyenne_regional" id="moyenne_regional" placeholder=" /20" min="0" max="20"
                                   class="input-table font-semibold @error('moyenne_regional') input-error @enderror" value="{{ old('moyenne_regional') }}">
                            @error('moyenne_regional') <p class="error-message col-span-3 text-right">{{ $message }}</p @enderror
                        </div>
                    </div>

                    {{-- Notes Examen National --}}
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-800">Examen National</h3>
                         @php
                            $matieres_nationales = ['Mathématiques', 'Physique-Chimie', 'SVT', 'Philosophie', 'Anglais'];
                        @endphp
                        @foreach($matieres_nationales as $index => $matiere)
                        <div class="grid grid-cols-3 gap-2 items-center">
                            <label for="note_national_{{ $index }}" class="col-span-2 block text-sm font-medium text-gray-700">{{ $matiere }} <span class="text-xs text-gray-400">(si applicable)</span></label>
                            <input type="number" step="0.01" name="notes_national[{{ Str::slug($matiere, '_') }}]" id="note_national_{{ $index }}" placeholder=" /20" min="0" max="20"
                                   class="input-table @error('notes_national.'.Str::slug($matiere, '_')) input-error @enderror" value="{{ old('notes_national.'.Str::slug($matiere, '_')) }}">
                             @error('notes_national.'.Str::slug($matiere, '_')) <p class="error-message col-span-3 text-right">{{ $message }}</p @enderror
                        </div>
                        @endforeach
                        {{-- Champ pour une matière nationale libre --}}
                        <div class="grid grid-cols-3 gap-2 items-center">
                             <input type="text" name="autre_matiere_national_nom" placeholder="Autre matière (Ex: SI)" class="col-span-2 input-table" value="{{ old('autre_matiere_national_nom') }}">
                            <input type="number" step="0.01" name="notes_national[autre]" placeholder=" /20" min="0" max="20"
                                   class="input-table @error('notes_national.autre') input-error @enderror" value="{{ old('notes_national.autre') }}">
                            @error('notes_national.autre') <p class="error-message col-span-3 text-right">{{ $message }}</p @enderror
                        </div>
                        <div class="grid grid-cols-3 gap-2 items-center pt-2">
                            <label for="moyenne_national" class="col-span-2 block text-sm font-semibold text-gray-700">Moyenne National</label>
                            <input type="number" step="0.01" name="moyenne_national" id="moyenne_national" placeholder=" /20" min="0" max="20"
                                   class="input-table font-semibold @error('moyenne_national') input-error @enderror" value="{{ old('moyenne_national') }}">
                             @error('moyenne_national') <p class="error-message col-span-3 text-right">{{ $message }}</p @enderror
                        </div>
                    </div>
                </div>
            </fieldset>

            {{-- Section: Parcours Post-Bac --}}
            <fieldset class="space-y-6 border-b border-gray-200 pb-8" id="parcours-postbac-container">
                <legend class="text-xl font-semibold text-gray-700 mb-3">Parcours Post-Bac</legend>
                {{-- Ce bloc sera clonable via JS pour ajouter plusieurs parcours --}}
                <div class="parcours-item space-y-4 border border-gray-200 p-4 rounded-lg relative">
                    <button type="button" class="remove-parcours-item absolute top-2 right-2 text-red-500 hover:text-red-700 p-1 bg-red-100 rounded-full hidden" title="Supprimer ce parcours">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                    </button>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="parcours_postbac[0][etablissement]" class="block text-sm font-medium text-gray-700 mb-1">Établissement <span class="text-red-500">*</span></label>
                            <input type="text" name="parcours_postbac[0][etablissement]" placeholder="Ex: FST Mohammedia, ENCG Agadir"
                                   class="input-style" required value="{{ old('parcours_postbac.0.etablissement') }}">
                        </div>
                         <div>
                            <label for="parcours_postbac[0][filiere]" class="block text-sm font-medium text-gray-700 mb-1">Filière Suivie <span class="text-red-500">*</span></label>
                            <input type="text" name="parcours_postbac[0][filiere]" placeholder="Ex: MIP, DUT Génie Informatique"
                                   class="input-style" required value="{{ old('parcours_postbac.0.filiere') }}">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="parcours_postbac[0][annee_debut]" class="block text-sm font-medium text-gray-700 mb-1">Année de début <span class="text-red-500">*</span></label>
                            <input type="number" name="parcours_postbac[0][annee_debut]" placeholder="Ex: 2022" min="2000" max="{{ date('Y') + 1 }}"
                                   class="input-style" required value="{{ old('parcours_postbac.0.annee_debut') }}">
                        </div>
                        <div>
                            <label for="parcours_postbac[0][statut_reussite]" class="block text-sm font-medium text-gray-700 mb-1">Statut <span class="text-red-500">*</span></label>
                            <select name="parcours_postbac[0][statut_reussite]" class="input-style" required>
                                <option value="" disabled selected>Choisir...</option>
                                <option value="reussi" {{ old('parcours_postbac.0.statut_reussite') == 'reussi' ? 'selected' : '' }}>Réussi / Diplômé(e)</option>
                                <option value="en_cours" {{ old('parcours_postbac.0.statut_reussite') == 'en_cours' ? 'selected' : '' }}>En cours</option>
                                <option value="echec" {{ old('parcours_postbac.0.statut_reussite') == 'echec' ? 'selected' : '' }}>Échec / Abandon</option>
                                <option value="reorientation" {{ old('parcours_postbac.0.statut_reussite') == 'reorientation' ? 'selected' : '' }}>Réorientation après cette étape</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="parcours_postbac[0][details_parcours]" class="block text-sm font-medium text-gray-700 mb-1">Détails (optionnel : difficultés, points forts, pourquoi cet échec/réorientation)</label>
                        <textarea name="parcours_postbac[0][details_parcours]" rows="2" placeholder="Ex: Très bonne formation mais j'ai préféré me réorienter vers..."
                                  class="input-style">{{ old('parcours_postbac.0.details_parcours') }}</textarea>
                    </div>
                </div>
                {{-- Afficher les erreurs de validation pour les parcours dynamiques --}}
                @if ($errors->has('parcours_postbac.*'))
                    <div class="mt-2 space-y-1">
                    @foreach ($errors->get('parcours_postbac.*') as $key => $messages)
                        @foreach ($messages as $message)
                            <p class="error-message">Parcours {{ (int)explode('.', $key)[1] + 1 }} : {{ $message }}</p>
                        @endforeach
                    @endforeach
                    </div>
                @endif
                <button type="button" id="add-parcours-item" class="mt-4 inline-flex items-center px-4 py-2 border border-dashed border-custom-dark text-custom-dark text-sm font-medium rounded-md hover:bg-custom-light hover:text-custom-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    Ajouter une autre étape de parcours
                </button>
            </fieldset>

            {{-- Section: Objectif Personnel --}}
            <fieldset class="space-y-6">
                <legend class="text-xl font-semibold text-gray-700 mb-3">Votre Objectif Personnel</legend>
                <div>
                    <label for="objectif_personnel" class="block text-sm font-medium text-gray-700 mb-1">Décrivez votre objectif professionnel ou académique principal <span class="text-red-500">*</span></label>
                    <textarea name="objectif_personnel" id="objectif_personnel" rows="4"
                              placeholder="Ex: Devenir un expert en cybersécurité, Intégrer une grande école d'ingénieurs en France, Lancer ma propre startup dans l'IA..."
                              class="input-style @error('objectif_personnel') input-error @enderror" required>{{ old('objectif_personnel') }}</textarea>
                    @error('objectif_personnel') <p class="error-message">{{ $message }}</p @enderror
                </div>
            </fieldset>

            <div class="pt-8">
                <button type="submit" class="w-full bg-custom-primary text-white py-3.5 px-6 rounded-lg font-semibold text-lg hover:bg-custom-dark transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-dark shadow-lg hover:shadow-xl transform hover:scale-105">
                    Soumettre mes informations
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('parcours-postbac-container');
    const addButton = document.getElementById('add-parcours-item');
    let parcoursIndex = {{ count(old('parcours_postbac', [])) > 0 ? count(old('parcours_postbac', [])) : 1 }}; // Start index from old data or 1

    // Function to update remove button visibility
    function updateRemoveButtons() {
        const items = container.querySelectorAll('.parcours-item');
        items.forEach((item, index) => {
            const removeButton = item.querySelector('.remove-parcours-item');
            if (removeButton) {
                removeButton.classList.toggle('hidden', items.length === 1 && index === 0);
            }
        });
    }

    if (addButton) {
        addButton.addEventListener('click', function () {
            const firstItem = container.querySelector('.parcours-item');
            if (!firstItem) return; // Should not happen if structure is correct

            const newItem = firstItem.cloneNode(true);

            // Clear values and update names/ids
            newItem.querySelectorAll('input, select, textarea').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/parcours_postbac\[\d+\]/, `parcours_postbac[${parcoursIndex}]`));
                }
                const id = input.getAttribute('id');
                if (id) {
                    // Ensure unique IDs for labels and inputs if necessary, though not strictly needed if labels target by name structure
                     input.setAttribute('id', id.replace(/parcours_postbac\[\d+\]\[\w+\]/, `parcours_postbac_${parcoursIndex}_${name.match(/\[(\w+)\]$/)[1]}`));
                }
                if (input.tagName.toLowerCase() === 'select') {
                    input.selectedIndex = 0; // Reset select to the first (usually placeholder) option
                } else {
                    input.value = ''; // Clear input/textarea
                }
                // Remove error classes/messages if any were cloned
                input.classList.remove('input-error');
                const nextSibling = input.nextElementSibling;
                if (nextSibling && nextSibling.classList.contains('error-message')) {
                    nextSibling.remove();
                }

            });

            // Attach event listener to the new remove button
            const removeButton = newItem.querySelector('.remove-parcours-item');
            if (removeButton) {
                removeButton.addEventListener('click', function () {
                    newItem.remove();
                    updateRemoveButtons();
                });
            }

            // Insert before the add button or at the end of current items
            // Find the last parcours-item and insert after it, or before the add button
            const items = container.querySelectorAll('.parcours-item');
            if (items.length > 0) {
                items[items.length - 1].parentNode.insertBefore(newItem, addButton);
            } else { // Should not be the case as we clone the first one
                container.insertBefore(newItem, addButton);
            }


            parcoursIndex++;
            updateRemoveButtons();
        });
    }

    // Initial setup for remove buttons already present (e.g., from old input)
    container.querySelectorAll('.parcours-item').forEach((item, index) => {
        const removeButton = item.querySelector('.remove-parcours-item');
        if (removeButton) {
            if(index === 0 && container.querySelectorAll('.parcours-item').length === 1){
                 removeButton.classList.add('hidden');
            } else {
                 removeButton.classList.remove('hidden');
            }
            removeButton.addEventListener('click', function () {
                item.remove();
                updateRemoveButtons();
            });
        }
    });

    // Initial check (e.g. if only one item from old input)
    updateRemoveButtons();


    // Conditional fields for situation actuelle (si tu as une section situation_actuelle)
    const situationSelect = document.getElementById('situation_actuelle'); // Make sure you have this element if using
    if (situationSelect) {
        const detailsEmploi = document.getElementById('details_emploi');
        const detailsEtudes = document.getElementById('details_etudes');

        function toggleConditionalFields() {
            const val = situationSelect.value;
            if(detailsEmploi) detailsEmploi.classList.toggle('hidden', val !== 'emploi');
            if(detailsEtudes) detailsEtudes.classList.toggle('hidden', val !== 'etudes');
        }
        situationSelect.addEventListener('change', toggleConditionalFields);
        toggleConditionalFields(); // Initial call
    }

});
</script>

@endsection
