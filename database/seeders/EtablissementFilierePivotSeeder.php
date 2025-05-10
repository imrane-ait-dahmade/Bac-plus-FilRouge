<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etablissement;
use App\Models\Filiere;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker; // Optionnel pour ce seeder mais peut être utile

class EtablissementFilierePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Si vous avez besoin de Faker pour une logique plus complexe

        // Récupérer tous les IDs des établissements et des filières
        $etablissementIds = Etablissement::pluck('id')->toArray();
        $filiereIds = Filiere::pluck('id')->toArray();

        if (empty($etablissementIds) || empty($filiereIds)) {
            $this->command->error("Les tables 'etablissements' ou 'filieres' sont vides. Veuillez les remplir avant d'exécuter ce seeder.");
            return;
        }

        // Vider la table pivot avant de la remplir (si vous exécutez le seeder plusieurs fois)
        // Attention avec les clés étrangères si elles ne sont pas en cascade
        DB::table('etablissments_filieres')->truncate(); // Simple truncate si pas de soucis de FK, sinon gestion PostgreSQL

        $pivotData = [];
        $combinations = []; // Pour éviter les doublons (etablissement_id, filiere_id)

        // Combien d'associations voulez-vous créer ?
        $numberOfAssociations = min(count($etablissementIds) * 2, count($filiereIds) * 3, 300); // Ex: au max 300 ou limité par le nombre d'items

        for ($i = 0; $i < $numberOfAssociations; $i++) {
            $etablissementId = $faker->randomElement($etablissementIds);
            $filiereId = $faker->randomElement($filiereIds);

            $combinationKey = $etablissementId . '-' . $filiereId;

            // S'assurer que la combinaison n'existe pas déjà et éviter les erreurs de clé unique (si vous en aviez une)
            if (!in_array($combinationKey, $combinations)) {
                $pivotData[] = [
                    'etablissement_id' => $etablissementId,
                    'filiere_id' => $filiereId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $combinations[] = $combinationKey;
            }
        }

        // Vous pouvez aussi avoir une logique plus ciblée :
        // Par exemple, associer des filières spécifiques à des types d'établissements spécifiques si vous avez cette info
        // Exemple:
        // $emi = Etablissement::where('abreviation', 'EMI')->first();
        // $filieresIngenieur = Filiere::where('Niveau', 'LIKE', '%Ingénieur%')->orWhere('Niveau', 'Master')->limit(5)->pluck('id');
        // if ($emi && $filieresIngenieur->isNotEmpty()) {
        //     foreach($filieresIngenieur as $filiereId) {
        //         $combinationKey = $emi->id . '-' . $filiereId;
        //         if (!in_array($combinationKey, $combinations)) {
        //             $pivotData[] = [
        //                 'etablissement_id' => $emi->id,
        //                 'filiere_id' => $filiereId,
        //                 'created_at' => now(),
        //                 'updated_at' => now(),
        //             ];
        //             $combinations[] = $combinationKey;
        //         }
        //     }
        // }

        // Insérer les données par lots
        foreach (array_chunk($pivotData, 100) as $chunk) { // Par lots de 100
            DB::table('etablissments_filieres')->insert($chunk);
        }

        $this->command->info(count($pivotData) . ' associations établissement-filière ont été créées.');
    }
}
