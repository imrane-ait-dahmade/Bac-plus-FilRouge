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

        if (empty($domaineIds)) {
            $this->command->error("La table 'domaines' est vide. Veuillez la remplir avant d'exécuter FiliereSeeder.");
            return;
        }

        DB::statement("SET session_replication_role = 'replica';");
        Filiere::truncate();
        DB::statement("SET session_replication_role = 'origin';");

        // Tableaux de données pour la génération
        $niveaux = [
            'Prépa' => ['duree' => 2, 'conditions' => 'Bac S avec mention'],
            'Mise à niveau' => ['duree' => 1, 'conditions' => 'Bac toutes séries'],
            'BTS' => ['duree' => 2, 'conditions' => 'Bac toutes séries'],
            'DUT' => ['duree' => 2, 'conditions' => 'Bac toutes séries'],
            'DEUST' => ['duree' => 2, 'conditions' => 'Bac toutes séries'],
            'Licence' => ['duree' => 3, 'conditions' => 'Bac+2'],
            'Licence Pro' => ['duree' => 3, 'conditions' => 'Bac+2'],
            'Master' => ['duree' => 2, 'conditions' => 'Bac+3'],
            'Mastere Specialise' => ['duree' => 2, 'conditions' => 'Bac+4'],
            'Doctorat' => ['duree' => 3, 'conditions' => 'Bac+5']
        ];

        $domainesSpecifiques = [
            'Génie Informatique' => [
                'debouches' => 'Ingénieur développement, Chef de projet SI, Ingénieur Réseaux, Consultant IT',
                'niveaux' => ['Master', 'Licence', 'BTS']
            ],
            'Génie Civil' => [
                'debouches' => 'Ingénieur études BTP, Conducteur de travaux, Ingénieur structures, Chef de projet construction',
                'niveaux' => ['Master', 'Licence', 'BTS']
            ],
            'Génie Mécanique' => [
                'debouches' => 'Ingénieur conception mécanique, Ingénieur calcul de structures, Chef de projet industriel',
                'niveaux' => ['Master', 'Licence', 'BTS']
            ],
            'Gestion' => [
                'debouches' => 'Chef de produit, Responsable marketing, Chargé d\'affaires, Category manager',
                'niveaux' => ['Master', 'Licence', 'BTS']
            ]
        ];

        $filieres = [];

        // Génération des filières spécifiques
        foreach ($domainesSpecifiques as $domaine => $details) {
            $domaineId = Domaine::where('domaine', 'LIKE', "%$domaine%")->first()?->id ?? $faker->randomElement($domaineIds);

            foreach ($details['niveaux'] as $niveau) {
                $filieres[] = [
                    'nom' => "$domaine ($niveau)",
                    'Niveau' => $niveau,
                    'ConditionsAdmission' => $niveaux[$niveau]['conditions'],
                    'debouches_metiers' => $details['debouches'],
                    'duree' => $niveaux[$niveau]['duree'],
                    'domaine_id' => $domaineId,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        // Génération des filières aléatoires
        $nomsFilieresBase = [
            'Gestion des Entreprises',
            'Informatique de Gestion',
            'Réseaux et Télécommunications',
            'Maintenance Industrielle',
            'Commerce International',
            'Logistique et Transport',
            'Génie Logiciel',
            'Systèmes Embarqués',
            'Énergies Renouvelables',
            'Droit des Affaires',
            'Communication Digitale'
        ];

        $nombreFilieresManuelles = count($filieres);
        $nombreFilieresAGenerer = 150 - $nombreFilieresManuelles;

        for ($i = 0; $i < $nombreFilieresAGenerer; $i++) {
            $niveau = $faker->randomElement(array_keys($niveaux));
            $nomBase = $faker->randomElement($nomsFilieresBase);

            $filieres[] = [
                'nom' => $nomBase . ' - ' . $niveau,
                'Niveau' => $niveau,
                'ConditionsAdmission' => $niveaux[$niveau]['conditions'],
                'debouches_metiers' => 'Postes de ' . $faker->jobTitle . ' ou ' . $faker->jobTitle,
                'duree' => $niveaux[$niveau]['duree'],
                'domaine_id' => $faker->randomElement($domaineIds),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // Insertion par lots
        foreach (array_chunk($filieres, 50) as $chunk) {
            try {
                DB::table('filieres')->insert($chunk);
            } catch (\Illuminate\Database\QueryException $e) {
                $this->command->error("Erreur d'insertion pour un chunk de filières: " . $e->getMessage());
                break;
            }
        }

        $this->command->info(Filiere::count() . ' filières ont été ajoutées avec succès.');
    }
}
