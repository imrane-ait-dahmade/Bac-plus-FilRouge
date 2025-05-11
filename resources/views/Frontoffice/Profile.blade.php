{{-- ... Début de votre formulaire ... --}}

{{-- Section: Parcours Scolaire --}}
<div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">Parcours Scolaire</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
        {{-- Région --}}
        <div>
            <label for="region_id" class="block text-sm font-medium text-gray-600 mb-1">Région <span class="text-red-500">*</span></label>
            <select id="region_id" name="region_id" class="input-style" required>
                <option value="">Sélectionnez votre région...</option>
                @foreach($regions as $region_item) {{-- Variable $regions du contrôleur --}}
                <option value="{{ $region_item->id }}" {{ old('region_id', optional($profile)->region_id) == $region_item->id ? 'selected' : '' }}>
                    {{ $region_item->nom }}
                </option>
                @endforeach
            </select>
            @error('region_id') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        {{-- Filière de Bac --}}
        <div> {{-- Gardez l'ID 'PositionFilieres' si votre JS en dépendait pour autre chose, sinon il n'est plus utile ici --}}
            <label for="bac_id" class="block text-sm font-medium text-gray-600 mb-1">Filière du Baccalauréat <span class="text-red-500">*</span></label>
            <select id="bac_id" name="bac_id" class="input-style" required>
                <option value="">Sélectionnez votre filière de bac...</option>
                @foreach($bacs as $bac_item) {{-- Variable $bacs du contrôleur --}}
                <option value="{{ $bac_item->id }}" {{ old('bac_id', optional($profile)->bac_id) == $bac_item->id ? 'selected' : '' }}>
                    {{ $bac_item->nom }}
                </option>
                @endforeach
            </select>
            @error('bac_id') <span class="error-message">{{ $message }}</span> @enderror
        </div>
    </div>
</div>

{{-- Section: Notes du Baccalauréat --}}
<div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-700 mb-5 pb-2 border-b border-gray-200">
        Notes du Baccalauréat
    </h3>

    {{-- Notes Globales Régional et National --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5 mb-6">
        <div>
            <label for="note_globale_regionale" class="block text-sm font-medium text-gray-600 mb-1">Note Globale Régional</label>
            <input id="note_globale_regionale" name="note_globale_regionale" type="text"
                   class="input-style" placeholder="Ex: 14.50"
                   value="{{ old('note_globale_regionale', optional($profile)->note_regionale) }}"
                   pattern="^([0-1]?[0-9]([.,][0-9]{1,2})?|20([.,]0{1,2})?)$" title="Note entre 0 et 20">
            @error('note_globale_regionale') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="note_globale_nationale" class="block text-sm font-medium text-gray-600 mb-1">Note Globale National</label>
            <input id="note_globale_nationale" name="note_globale_nationale" type="text"
                   class="input-style" placeholder="Ex: 16.75"
                   value="{{ old('note_globale_nationale', optional($profile)->note_nationale) }}"
                   pattern="^([0-1]?[0-9]([.,][0-9]{1,2})?|20([.,]0{1,2})?)$" title="Note entre 0 et 20">
            @error('note_globale_nationale') <span class="error-message">{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- Tableau pour les notes par matière --}}
    @if($matieresRegionales->isNotEmpty() || $matieresNationales->isNotEmpty())
        <div class="border border-gray-200 rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-4 py-3">Matière</th>
                    <th scope="col" class="px-4 py-3">Examen</th>
                    <th scope="col" class="px-4 py-3 w-1/3 sm:w-1/4">Note (/20)</th>
                </tr>
                </thead>
                <tbody>
                {{-- Matières Régionales --}}
                @if($matieresRegionales->isNotEmpty())
                    <tr class="bg-indigo-50">
                        <td colspan="3" class="px-4 py-2 font-semibold text-indigo-700 text-xs uppercase">Examen Régional</td>
                    </tr>
                    @foreach($matieresRegionales as $index => $matiere)
                        <tr class="bg-white border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-2 font-medium text-gray-800">
                                {{ $matiere->nom }}
                                <input type="hidden" name="notes_matieres[{{ $matiere->id }}][matiere_id]" value="{{ $matiere->id }}">
                            </td>
                            <td class="px-4 py-2 text-gray-500">Régional</td>
                            <td class="px-4 py-2">
                                <input type="text" name="notes_matieres[{{ $matiere->id }}][note]"
                                       class="input-style !py-1.5 !px-2 !text-sm" {{-- Style plus petit pour tableau --}}
                                       placeholder="Note"
                                       value="{{ old('notes_matieres.'.$matiere->id.'.note', $userNotes[$matiere->id] ?? '') }}"
                                       pattern="^([0-1]?[0-9]([.,][0-9]{1,2})?|20([.,]0{1,2})?)$"
                                       title="Note entre 0 et 20 (ex: 15 ou 16.75)">
                                @error('notes_matieres.'.$matiere->id.'.note') <span class="error-message block">{{ $message }}</span> @enderror
                            </td>
                        </tr>
                    @endforeach
                @endif

                {{-- Matières Nationales --}}
                @if($matieresNationales->isNotEmpty())
                    <tr class="bg-sky-50">
                        <td colspan="3" class="px-4 py-2 font-semibold text-sky-700 text-xs uppercase">Examen National</td>
                    </tr>
                    @foreach($matieresNationales as $index => $matiere)
                        <tr class="bg-white border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-2 font-medium text-gray-800">
                                {{ $matiere->nom }}
                                <input type="hidden" name="notes_matieres[{{ $matiere->id }}][matiere_id]" value="{{ $matiere->id }}">
                            </td>
                            <td class="px-4 py-2 text-gray-500">National</td>
                            <td class="px-4 py-2">
                                <input type="text" name="notes_matieres[{{ $matiere->id }}][note]"
                                       class="input-style !py-1.5 !px-2 !text-sm"
                                       placeholder="Note"
                                       value="{{ old('notes_matieres.'.$matiere->id.'.note', $userNotes[$matiere->id] ?? '') }}"
                                       pattern="^([0-1]?[0-9]([.,][0-9]{1,2})?|20([.,]0{1,2})?)$"
                                       title="Note entre 0 et 20">
                                @error('notes_matieres.'.$matiere->id.'.note') <span class="error-message block">{{ $message }}</span> @enderror
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @else
        @if(optional($profile)->bac_id)
            <p class="text-center text-gray-500 py-4 px-4 italic">Aucune matière trouvée pour votre filière de bac. Veuillez vérifier votre sélection de filière ou contacter l'administrateur.</p>
        @else
            <p class="text-center text-gray-500 py-4 px-4 italic">Veuillez sélectionner votre filière de baccalauréat pour afficher les matières et entrer vos notes.</p>
        @endif
    @endif
    @error('notes_matieres') <span class="error-message mt-2">{{ $message }}</span> @enderror {{-- Erreur générale pour le tableau des notes --}}
</div>


{{-- Bouton Sauvegarder --}}
{{-- ... (votre bouton sauvegarder reste le même) ... --}}

</form>

{{-- ... Reste de votre page (Sections Additionnelles, etc.) ... --}}

{{-- Le script que vous aviez pour $filieresBac peut rester si vous l'utilisez --}}
{{-- pour afficher dynamiquement les matières du bac. Sinon, la logique est --}}
{{-- maintenant gérée côté serveur après sélection du bac_id. --}}
{{-- <script>
    const FilieresBac = {!! json_encode($bacs) !!}; // Transmettez la variable $bacs du contrôleur ici
                                                    // ou une liste spécifique de filières si vous voulez
                                                    // la filtrer en JS

    // ... Votre logique JS pour le select bac ...
</script> --}}

@endsection {{-- Fin @section('content') --}}

@push('styles')
    {{-- ... vos styles .input-style, .error-message, .bg-custom-primary etc. ... --}}
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bacSelect = document.getElementById('bac_id');

            if (bacSelect) {
                bacSelect.addEventListener('change', function() {
                    // Optionnel : Si vous voulez recharger la page ou une partie de la page
                    // pour afficher les matières correctes pour la filière sélectionnée.
                    // Le plus simple est de soumettre le formulaire et laisser le serveur
                    // re-rendre la page avec les bonnes matières.
                    // Ou faire une requête AJAX pour récupérer les matières.
                    // Pour l'instant, on part du principe que l'utilisateur doit sauvegarder
                    // son choix de bac pour voir la bonne liste de matières si elle change.

                    // Une alerte simple pour indiquer de sauvegarder pour voir les matières à jour.
                    // Ou, si vous rechargez via PHP après chaque changement de bac_id:
                    if(this.value) {
                        // Option 1: forcer un rechargement de la page (perd les données non sauvegardées)
                        // window.location.href = window.location.pathname + '?bac_id_temp=' + this.value;
                        // Vous devriez gérer ce bac_id_temp dans le contrôleur pour la session.

                        // Option 2: Message à l'utilisateur
                        // alert("Veuillez sauvegarder votre profil pour mettre à jour la liste des matières en fonction de la nouvelle filière de baccalauréat sélectionnée.");

                        // Option 3: Déclencher la soumission du formulaire
                        this.form.submit(); // Ceci va sauvegarder tout le profil.
                    }
                });
            }

            // Le JS que vous aviez pour `grades-container` (add-grade-btn, etc.) n'est plus nécessaire
            // car nous ne gérons plus un nombre dynamique de lignes de "type" de note.
            // Les lignes de matières sont générées statiquement par le serveur.
        });
    </script>
@endpush
