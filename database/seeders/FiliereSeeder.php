<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filiere;
use App\Models\Domaine;
use App\Models\Etablissement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // Assurez-vous que c'est bien importé
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR');

        $domaineIds = Domaine::pluck('id')->toArray();
        $etablissementIds = Etablissement::pluck('id')->toArray();

        if (empty($domaineIds) || empty($etablissementIds)) {
            $this->command->error("Les tables 'domaines' ou 'etablissements' sont vides. Veuillez les remplir avant d'exécuter FiliereSeeder.");
            return;
        }

        DB::statement("SET session_replication_role = 'replica';");
        Filiere::truncate();
        DB::statement("SET session_replication_role = 'origin';");

        $filieres = [];

        // Valeurs exactes de votre Enum pour 'Niveau'
        $enumNiveaux = [
            'Prépa', 'Mise à niveau', 'BTS', 'DUT', 'DEUST',
            'Licence', 'Licence Pro', 'Master', 'Mastere Specialise', 'Doctorat'
        ];

        // --- Exemples pour des établissements spécifiques ---
        $emi = Etablissement::where('abreviation', 'EMI')->first();
        $domaineGenieInfoId = Domaine::where('domaine', 'LIKE', '%Génie Informatique%')->first()?->id ?? $faker->randomElement($domaineIds);
        $domaineGenieCivilId = Domaine::where('domaine', 'LIKE', '%Génie Civil%')->first()?->id ?? $faker->randomElement($domaineIds);

        if ($emi) {
            if($domaineGenieInfoId) {
                $filieres[] = [
                    'nom' => 'Génie Informatique (Cycle Ingénieur)',
                    'etablissement_id' => $emi->id,
                    // Un cycle ingénieur après prépa est assimilé à un Master
                    'Niveau' => 'Master',
                    'ConditionsAdmission' => 'Concours National Commun (CNC) ou admission sur titre (Bac+2/3 scientifique)',
                    'debouches_metiers' => 'Ingénieur développement, Chef de projet SI, Ingénieur Réseaux, Consultant IT',
                    'duree' => 3, // 3 ans après prépa
                    'domaine_id' => $domaineGenieInfoId,
                ];
            }
            if($domaineGenieCivilId){
                $filieres[] = [
                    'nom' => 'Génie Civil (Cycle Ingénieur)',
                    'etablissement_id' => $emi->id,
                    'Niveau' => 'Master',
                    'ConditionsAdmission' => 'Concours National Commun (CNC) ou admission sur titre (Bac+2/3 scientifique)',
                    'debouches_metiers' => 'Ingénieur études BTP, Conducteur de travaux, Ingénieur structures, Chef de projet construction',
                    'duree' => 3,
                    'domaine_id' => $domaineGenieCivilId,
                ];
            }
        }

        $ensamR = Etablissement::where('abreviation', 'ENSAMR')->first();
        $domaineGenieMecaId = Domaine::where('domaine', 'LIKE', '%Génie Mécanique%')->first()?->id ?? $faker->randomElement($domaineIds);
        if ($ensamR && $domaineGenieMecaId) {
            // ENSAM a souvent un cycle préparatoire intégré
            $filieres[] = [
                'nom' => 'Classes Préparatoires Intégrées ENSAM',
                'etablissement_id' => $ensamR->id,
                'Niveau' => 'Prépa',
                'ConditionsAdmission' => 'Bac S (SM, PC, SVT) avec mention, sur concours ENSAM',
                'debouches_metiers' => 'Accès au cycle ingénieur ENSAM',
                'duree' => 2,
                'domaine_id' => $domaineGenieMecaId, // Domaine généraliste scientifique pour prépa
            ];
            $filieres[] = [
                'nom' => 'Génie Mécanique et Structures (Cycle Ingénieur ENSAM)',
                'etablissement_id' => $ensamR->id,
                'Niveau' => 'Master', // Le diplôme d'ingénieur ENSAM
                'ConditionsAdmission' => 'Réussite cycle préparatoire intégré ENSAM ou CNC/Admission sur titre',
                'debouches_metiers' => 'Ingénieur conception mécanique, Ingénieur calcul de structures, Chef de projet industriel',
                'duree' => 3, // Après les 2 ans de prépa intégrée ou externe
                'domaine_id' => $domaineGenieMecaId,
            ];
        }

        $encgS = Etablissement::where('abreviation', 'ENCGS')->first();
        $domaineGestionId = Domaine::where('domaine', 'LIKE', '%Gestion%')->first()?->id ?? $faker->randomElement($domaineIds);
        if ($encgS && $domaineGestionId) {
            $filieres[] = [
                'nom' => 'Marketing et Action Commerciale (ENCG)',
                'etablissement_id' => $encgS->id,
                'Niveau' => 'Master', // Diplôme ENCG est Bac+5
                'ConditionsAdmission' => 'Concours TAFEM (Bac) ou admissions parallèles (Bac+2/3)',
                'debouches_metiers' => 'Chef de produit, Responsable marketing, Chargé d\'affaires, Category manager',
                'duree' => 5, // Durée totale du cursus ENCG post-bac
                'domaine_id' => $domaineGestionId,
            ];
            $filieres[] = [
                'nom' => 'Audit et Contrôle de Gestion (ENCG)',
                'etablissement_id' => $encgS->id,
                'Niveau' => 'Master',
                'ConditionsAdmission' => 'Concours TAFEM (Bac) ou admissions parallèles (Bac+2/3)',
                'debouches_metiers' => 'Auditeur interne/externe, Contrôleur de gestion, Consultant en organisation',
                'duree' => 5,
                'domaine_id' => $domaineGestionId,
            ];
        }


        // --- Génération aléatoire pour atteindre 150 ---
        $nomsFilieresBase = ['Gestion des Entreprises', 'Informatique de Gestion', 'Réseaux et Télécommunications', 'Maintenance Industrielle', 'Commerce International', 'Logistique et Transport', 'Génie Logiciel', 'Systèmes Embarqués', 'Énergies Renouvelables', 'Droit des Affaires', 'Communication Digitale'];

        $nombreFilieresManuelles = count($filieres);

        for ($i = 0; $i < (150 - $nombreFilieresManuelles); $i++) {
            $selectedEtablissementId = $faker->randomElement($etablissementIds);
            $selectedDomaineId = $faker->randomElement($domaineIds);
            $selectedNiveau = $faker->randomElement($enumNiveaux);
            $nomBase = $faker->randomElement($nomsFilieresBase);

            $dureeFiliere = 2; // Default
            switch ($selectedNiveau) {
                case 'Prépa':
                case 'BTS':
                case 'DUT':
                case 'DEUST':
                case 'Mise à niveau': // Souvent 1 an, mais on va mettre 1-2
                    $dureeFiliere = $faker->numberBetween(1,2);
                    break;
                case 'Licence':
                case 'Licence Pro':
                    $dureeFiliere = 3;
                    break;
                case 'Master':
                case 'Mastere Specialise':
                    $dureeFiliere = 2; // Généralement après Bac+3
                    break;
                case 'Doctorat':
                    $dureeFiliere = $faker->numberBetween(3, 5);
                    break;
            }

            $filieres[] = [
                'nom' => $nomBase . ($faker->boolean(40) ? (' option ' . ucfirst($faker->word)) : '') . ' - ' . $selectedNiveau,
                'etablissement_id' => $selectedEtablissementId,
                'Niveau' => $selectedNiveau,
                'ConditionsAdmission' => 'Bac ' . $faker->randomElement(['Scientifique', 'Économique', 'Technique', 'Lettres']) . ' + étude de dossier' . ($faker->boolean(30) ? ' + entretien' : '') . ($faker->boolean(20) ? ' ou concours' : ''),
                'debouches_metiers' => 'Principalement dans les secteurs de ' . $faker->sentence(10) . '. Postes de ' . $faker->jobTitle . ' ou ' . $faker->jobTitle . '.',
                'duree' => $dureeFiliere,
                'domaine_id' => $selectedDomaineId,
                // Timestamps gérés par Laravel ou ajoutés avant insert
            ];
        }

        // S'assurer que tous les enregistrements ont les timestamps et autres colonnes nullable
        $colonnesTableFiliere = Schema::getColumnListing('filieres');
        $filieresNormalisees = [];

        foreach ($filieres as $filiereData) {
            $enregistrementNormalise = [];
            foreach ($colonnesTableFiliere as $colonne) {
                if (isset($filiereData[$colonne])) {
                    $enregistrementNormalise[$colonne] = $filiereData[$colonne];
                } elseif ($colonne === 'created_at' || $colonne === 'updated_at') {
                    $enregistrementNormalise[$colonne] = now();
                } elseif ($colonne !== 'id') { // Ne pas ajouter 'id' manuellement
                    $enregistrementNormalise[$colonne] = null; // Pour les champs nullable non définis
                }
            }
            $filieresNormalisees[] = $enregistrementNormalise;
        }


        // Insertion par lots
        foreach (array_chunk($filieresNormalisees, 50) as $chunk) {
            try {
                DB::table('filieres')->insert($chunk);
            } catch (\Illuminate\Database\QueryException $e) {
                $this->command->error("Erreur d'insertion pour un chunk de filières: " . $e->getMessage());
                // Afficher le chunk problématique peut aider à déboguer
                // $this->command->info("Chunk problématique: " . json_encode($chunk, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                // Si vous voulez le SQL brut et les bindings:
                // $this->command->error("SQL: " . $e->getSql());
                // $this->command->error("Bindings: " . implode(", ", $e->getBindings()));
                break; // Arrêter en cas d'erreur pour éviter une cascade
            }
        }

        $this->command->info(Filiere::count() . ' filières (ou tentatives) ont été ajoutées/traitées.');
    }
}
