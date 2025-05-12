<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etablissement;
use App\Models\Universite; // Nécessaire pour récupérer les ID
use App\Models\Region;     // Nécessaire pour récupérer les ID
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR');

        $universiteIds = Universite::pluck('id')->toArray();
        $regionIds = Region::pluck('id')->toArray();

        if (empty($universiteIds) || empty($regionIds)) {
            $this->command->error("Les tables 'universites' ou 'regions' sont vides. Veuillez les remplir avant d'exécuter EtablissementSeeder.");
            return;
        }

        DB::statement("SET session_replication_role = 'replica';");
        Etablissement::truncate();
        DB::statement("SET session_replication_role = 'origin';");

        // Tableaux de données pour la génération
        $villesMarocaines = [
            'Casablanca' => ['region' => 'Casablanca-Settat', 'code_postal' => '20000'],
            'Rabat' => ['region' => 'Rabat-Salé-Kénitra', 'code_postal' => '10000'],
            'Marrakech' => ['region' => 'Marrakech-Safi', 'code_postal' => '40000'],
            'Fès' => ['region' => 'Fès-Meknès', 'code_postal' => '30000'],
            'Tanger' => ['region' => 'Tanger-Tétouan-Al Hoceïma', 'code_postal' => '90000'],
            'Agadir' => ['region' => 'Souss-Massa', 'code_postal' => '80000'],
            'Meknès' => ['region' => 'Fès-Meknès', 'code_postal' => '50000'],
            'Oujda' => ['region' => 'Oriental', 'code_postal' => '60000'],
            'Kénitra' => ['region' => 'Rabat-Salé-Kénitra', 'code_postal' => '14000'],
            'Tétouan' => ['region' => 'Tanger-Tétouan-Al Hoceïma', 'code_postal' => '93000'],
            'Laayoune' => ['region' => 'Laâyoune-Sakia El Hamra', 'code_postal' => '70000'],
            'Mohammédia' => ['region' => 'Casablanca-Settat', 'code_postal' => '20800'],
            'El Jadida' => ['region' => 'Casablanca-Settat', 'code_postal' => '24000'],
            'Béni Mellal' => ['region' => 'Béni Mellal-Khénifra', 'code_postal' => '23000']
        ];

        $typesEcoles = [
            'public' => [
                'frais_scolarite' => 0,
                'seuil_actif' => true,
                'seuil_min' => 12.0,
                'seuil_max' => 17.0
            ],
            'prive' => [
                'frais_scolarite_min' => 25000,
                'frais_scolarite_max' => 75000,
                'seuil_actif' => false,
                'seuil' => null
            ]
        ];

        $prefixesEcoles = [
            'public' => [
                'École Nationale Supérieure de',
                'Institut National de',
                'Faculté de',
                'École Nationale de',
                'Centre de Formation en'
            ],
            'prive' => [
                'École Supérieure Privée de',
                'Institut Supérieur Privé de',
                'École de Commerce et de Gestion',
                'École d\'Ingénieurs',
                'Institut des Hautes Études'
            ]
        ];

        $domainesEcoles = [
            'Technologie',
            'Commerce',
            'Gestion',
            'Informatique',
            'Agronomie',
            'Tourisme',
            'Arts Appliqués',
            'Santé',
            'Génie Civil',
            'Électronique'
        ];

        $etablissements = [];

        // Génération des établissements spécifiques
        $etablissementsSpecifiques = [
            [
                'nom' => 'École Mohammadia d\'Ingénieurs',
                'ville' => 'Rabat',
                'description' => 'Grande école d\'ingénieurs marocaine, formant des ingénieurs d\'État polyvalents.',
                'adresse' => 'Avenue Ibn Sina B.P. 765, Agdal, Rabat',
                'universite_id' => Universite::where('nom', 'Université Mohammed V de Rabat')->first()?->id,
                'resau' => 'Université Mohammed V',
                'nombre_etudiant' => $faker->numberBetween(1000, 2500),
                'region_id' => Region::where('nom', 'Rabat-Salé-Kénitra')->first()?->id,
                'TypeEcole' => 'public',
                'telephone' => '0537687150',
                'site_web' => 'https://emi.ac.ma',
                'abreviation' => 'EMI',
                'seuil_actif' => true,
                'seuil' => 16.5,
                'reputation' => $faker->randomFloat(1, 4.5, 5.0),
                'frais_scolarite' => 0,
                'diplome_type' => 'Diplôme d\'Ingénieur d\'État',
                'email' => 'contact@emi.ac.ma',
                'logo' => 'logos/emi.png',
                'image' => 'images/emi_campus.jpg'
            ],
            [
                'nom' => 'École Nationale Supérieure d\'Arts et Métiers de Rabat',
                'ville' => 'Rabat',
                'description' => 'Formation d\'ingénieurs Arts et Métiers dans divers domaines technologiques.',
                'adresse' => 'Avenue Hassan II, Madinat Al Irfane, Rabat',
                'universite_id' => Universite::where('nom', 'Université Mohammed V de Rabat')->first()?->id,
                'resau' => 'Réseau ENSAM',
                'nombre_etudiant' => $faker->numberBetween(800, 1500),
                'region_id' => Region::where('nom', 'Rabat-Salé-Kénitra')->first()?->id,
                'TypeEcole' => 'public',
                'telephone' => '0537716080',
                'site_web' => 'https://ensam.um5.ac.ma',
                'abreviation' => 'ENSAMR',
                'seuil_actif' => true,
                'seuil' => 15.0,
                'reputation' => $faker->randomFloat(1, 4.0, 4.8),
                'frais_scolarite' => 0,
                'diplome_type' => 'Diplôme d\'Ingénieur d\'État',
                'email' => 'contact.ensam@um5.ac.ma',
                'logo' => 'logos/ensam_rabat.png',
                'image' => 'images/ensam_campus.jpg'
            ]
        ];

        foreach ($etablissementsSpecifiques as $etablissement) {
            $etablissement['created_at'] = now();
            $etablissement['updated_at'] = now();
            $etablissements[] = $etablissement;
        }

        // Génération des établissements aléatoires
        $nombreEtablissementsManuels = count($etablissements);
        $nombreEtablissementsAGenerer = 100 - $nombreEtablissementsManuels;

        for ($i = 0; $i < $nombreEtablissementsAGenerer; $i++) {
            $typeEcole = $faker->randomElement(['public', 'prive']);
            $ville = $faker->randomElement(array_keys($villesMarocaines));
            $villeInfo = $villesMarocaines[$ville];
            $prefixe = $faker->randomElement($prefixesEcoles[$typeEcole]);
            $domaine = $faker->randomElement($domainesEcoles);
            $nomEcole = "$prefixe $domaine de $ville";

            $etablissement = [
                'nom' => $nomEcole,
                'ville' => $ville,
                'description' => $faker->sentence(10) . ' Offrant des formations de pointe pour les bacheliers.',
                'adresse' => $faker->streetAddress . ', ' . $ville,
                'universite_id' => $faker->randomElement($universiteIds),
                'resau' => $faker->company . ' Network',
                'nombre_etudiant' => $faker->numberBetween(200, 3500),
                'region_id' => Region::where('nom', $villeInfo['region'])->first()?->id ?? $faker->randomElement($regionIds),
                'TypeEcole' => $typeEcole,
                'telephone' => $faker->numerify('05########'),
                'site_web' => 'https://www.' . Str::slug(Str::words($nomEcole, 3, '')) . '.ac.ma',
                'abreviation' => strtoupper(Str::substr(Str::slug(Str::words($nomEcole, 4, ''), ''), 0, 5) . $faker->lexify('??')),
                'seuil_actif' => $typesEcoles[$typeEcole]['seuil_actif'],
                'seuil' => $typesEcoles[$typeEcole]['seuil_actif'] ? $faker->randomFloat(2, $typesEcoles[$typeEcole]['seuil_min'], $typesEcoles[$typeEcole]['seuil_max']) : null,
                'reputation' => $faker->randomFloat(1, 3.5, 5.0),
                'frais_scolarite' => $typeEcole === 'prive' ? $faker->numberBetween($typesEcoles[$typeEcole]['frais_scolarite_min'], $typesEcoles[$typeEcole]['frais_scolarite_max']) : 0,
                'diplome_type' => $faker->randomElement(['Licence', 'Master', 'Diplôme d\'Ingénieur', 'BTS', 'DUT']),
                'email' => 'contact@' . Str::slug(Str::words($nomEcole, 3, '')) . '.ac.ma',
                'logo' => 'logos/default_logo.png',
                'image' => 'images/default_campus.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ];

            $etablissements[] = $etablissement;
        }

        // Insertion par lots
        foreach (array_chunk($etablissements, 50) as $chunk) {
            try {
                DB::table('etablissements')->insert($chunk);
            } catch (\Illuminate\Database\QueryException $e) {
                $this->command->error("Erreur d'insertion pour un chunk d'établissements: " . $e->getMessage());
                break;
            }
        }

        $this->command->info(Etablissement::count() . ' établissements ont été ajoutés avec succès.');
    }
}
