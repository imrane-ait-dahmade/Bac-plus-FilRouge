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
        $faker = Faker::create('fr_FR'); // Utiliser le français pour des noms/adresses plus pertinents

        // S'assurer que les tables dépendantes sont remplies
        $universiteIds = Universite::pluck('id')->toArray();
        $regionIds = Region::pluck('id')->toArray();

        if (empty($universiteIds) || empty($regionIds)) {
            $this->command->error("Les tables 'universites' ou 'regions' sont vides. Veuillez les remplir avant d'exécuter EtablissementSeeder.");
            return;
        }

        // Désactiver les contraintes de clés étrangères (spécifique à PostgreSQL)
        DB::statement("SET session_replication_role = 'replica';");
        Etablissement::truncate();
        // Réactiver les contraintes
        DB::statement("SET session_replication_role = 'origin';");


        $etablissements = [];

        // --- Quelques exemples réels (à compléter/ajuster) ---
        // Tu devras trouver des universite_id et region_id valides de tes tables
        $universiteRabatId = Universite::where('nom', 'Université Mohammed V de Rabat')->first()?->id ?? $faker->randomElement($universiteIds);
        $universiteCasaId = Universite::where('nom', 'Université Hassan II de Casablanca')->first()?->id ?? $faker->randomElement($universiteIds);
        $regionRabatId = Region::where('nom', 'Rabat-Salé-Kénitra')->first()?->id ?? $faker->randomElement($regionIds);
        $regionCasaId = Region::where('nom', 'Casablanca-Settat')->first()?->id ?? $faker->randomElement($regionIds);

        $etablissements[] = [
            'nom' => 'École Mohammadia d\'Ingénieurs',
            'ville' => 'Rabat',
            'description' => 'Grande école d\'ingénieurs marocaine, formant des ingénieurs d\'État polyvalents.',
            'adresse' => 'Avenue Ibn Sina B.P. 765, Agdal, Rabat',
            'universite_id' => $universiteRabatId,
            'resau' => 'Université Mohammed V',
            'nombre_etudiant' => $faker->numberBetween(1000, 2500),
            'region_id' => $regionRabatId,
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
            'image' => 'images/emi_campus.jpg',
            // AJOUTER LES TIMESTAMPS
            'created_at' => now(),
            'updated_at' => now(),
            // S'assurer que tous les champs optionnels sont au moins présents avec null si non applicable
            'fax' => null,
            'site_inscription' => null,
            'facebook' => null,
            'instagram' => null,
            'linkedin' => null,
            'date_ouverture_inscription' => null,
            'date_limite_inscription' => null,
        ];

        $etablissements[] = [
            'nom' => 'École Nationale Supérieure d\'Arts et Métiers de Rabat',
            'ville' => 'Rabat',
            'description' => 'Formation d\'ingénieurs Arts et Métiers dans divers domaines technologiques.',
            'adresse' => 'Avenue Hassan II, Madinat Al Irfane, Rabat',
            'universite_id' => $universiteRabatId,
            'resau' => 'Réseau ENSAM',
            'nombre_etudiant' => $faker->numberBetween(800, 1500),
            'region_id' => $regionRabatId,
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
            // AJOUTER LES TIMESTAMPS
            'created_at' => now(),
            'updated_at' => now(),
            'fax' => null,
            'site_inscription' => null,
            'image' => null, // Si pas d'image spécifique
            'facebook' => null,
            'instagram' => null,
            'linkedin' => null,
            'date_ouverture_inscription' => null,
            'date_limite_inscription' => null,
        ];

        $etablissements[] = [
            'nom' => 'École Nationale de Commerce et de Gestion de Settat',
            'ville' => 'Settat',
            'description' => 'Formation supérieure en commerce et gestion.',
            'adresse' => 'Km 3, Route de Casablanca BP 658, Settat',
            'universite_id' => Universite::where('nom', 'Université Hassan Premier de Settat')->first()?->id ?? $faker->randomElement($universiteIds),
            'resau' => 'Réseau ENCG',
            'nombre_etudiant' => $faker->numberBetween(1500, 3000),
            'region_id' => Region::where('nom', 'Casablanca-Settat')->first()?->id ?? $faker->randomElement($regionIds),
            'TypeEcole' => 'public',
            'telephone' => '0523401059',
            'site_web' => 'http://www.encg-settat.ac.ma',
            'abreviation' => 'ENCGS',
            'seuil_actif' => true,
            'seuil' => 14.0,
            'reputation' => $faker->randomFloat(1, 4.2, 4.9),
            'frais_scolarite' => 0,
            'diplome_type' => 'Diplôme ENCG (Bac+5)',
            'email' => 'contact@encgs.uh1.ac.ma',
            'logo' => 'logos/encg_settat.png',
            // AJOUTER LES TIMESTAMPS
            'created_at' => now(),
            'updated_at' => now(),
            'fax' => null,
            'site_inscription' => null,
            'image' => null,
            'facebook' => null,
            'instagram' => null,
            'linkedin' => null,
            'date_ouverture_inscription' => null,
            'date_limite_inscription' => null,
        ];

        $etablissements[] = [
            'nom' => 'Faculté des Sciences et Techniques de Settat',
            'ville' => 'Settat',
            'description' => 'Formation scientifique et technique (DEUST, Licence, Master, Ingénieur).',
            'adresse' => 'Km 3, Route de Casablanca BP 577, Settat',
            'universite_id' => Universite::where('nom', 'Université Hassan Premier de Settat')->first()?->id ?? $faker->randomElement($universiteIds),
            'resau' => 'Réseau FST',
            'nombre_etudiant' => $faker->numberBetween(2000, 4000),
            'region_id' => Region::where('nom', 'Casablanca-Settat')->first()?->id ?? $faker->randomElement($regionIds),
            'TypeEcole' => 'public',
            'telephone' => '0523400736',
            'site_web' => 'http://www.fsts.ac.ma',
            'abreviation' => 'FSTS',
            'seuil_actif' => true,
            'seuil' => 12.5,
            'reputation' => $faker->randomFloat(1, 3.8, 4.5),
            'frais_scolarite' => 0,
            'diplome_type' => 'Licence, Master, Diplôme d\'Ingénieur',
            'email' => 'contact@fsts.uh1.ac.ma',
            'logo' => 'logos/fst_settat.png',
            // AJOUTER LES TIMESTAMPS
            'created_at' => now(),
            'updated_at' => now(),
            'fax' => null,
            'site_inscription' => null,
            'image' => null,
            'facebook' => null,
            'instagram' => null,
            'linkedin' => null,
            'date_ouverture_inscription' => null,
            'date_limite_inscription' => null,
        ];

        $etablissements[] = [
            'nom' => 'Université Internationale de Rabat',
            'ville' => 'Salé', // Technopolis
            'description' => 'Université privée reconnue par l\'État, offrant des formations diversifiées.',
            'adresse' => 'Technopolis Rabat-Shore, Rocade Rabat-Salé',
            'universite_id' => Universite::where('nom', 'Université Internationale de Rabat')->first()?->id ?? $faker->randomElement($universiteIds), // Ou null si c'est une "université" en soi
            'resau' => 'Partenariat Public-Privé',
            'nombre_etudiant' => $faker->numberBetween(3000, 7000),
            'region_id' => $regionRabatId,
            'TypeEcole' => 'prive',
            'telephone' => '0530103000',
            'site_web' => 'https://www.uir.ac.ma',
            'abreviation' => 'UIR',
            'seuil_actif' => false,
            'seuil' => null,
            'reputation' => $faker->randomFloat(1, 4.0, 4.7),
            'frais_scolarite' => $faker->numberBetween(50000, 90000),
            'diplome_type' => 'Licence, Master, Ingénieur, Doctorat',
            'email' => 'admission@uir.ac.ma',
            'logo' => 'logos/uir.png',
            'image' => 'images/uir_campus.jpg',
            // AJOUTER LES TIMESTAMPS
            'created_at' => now(),
            'updated_at' => now(),
            'fax' => null,
            'site_inscription' => null,
            'facebook' => null,
            'instagram' => null,
            'linkedin' => null,
            'date_ouverture_inscription' => null,
            'date_limite_inscription' => null,
        ];

        // --- Génération des autres écoles avec Faker (pour atteindre ~100) ---
        $nombreEcolesReelles = count($etablissements);
        $villesMarocaines = ['Casablanca', 'Rabat', 'Marrakech', 'Fès', 'Tanger', 'Agadir', 'Meknès', 'Oujda', 'Kénitra', 'Tétouan', 'Laayoune', 'Mohammédia', 'El Jadida', 'Béni Mellal'];
        $typesDiplomes = ['Diplôme d\'Ingénieur d\'État', 'Licence Professionnelle', 'Master Spécialisé', 'DUT', 'BTS', 'Diplôme Universitaire de Technologie', 'Licence en Sciences et Techniques', 'Master en Sciences et Techniques'];
        $prefixesEcoles = ['École Supérieure de', 'Institut National de', 'Faculté de', 'École Nationale de', 'Centre de Formation en'];
        $domainesEcoles = ['Technologie', 'Commerce', 'Gestion', 'Informatique', 'Agronomie', 'Tourisme', 'Arts Appliqués', 'Santé', 'Génie Civil', 'Électronique'];


        for ($i = 0; $i < (100 - $nombreEcolesReelles); $i++) {
            $typeEcole = $faker->randomElement(['public', 'prive']);
            $nomEcole = $faker->randomElement($prefixesEcoles) . ' ' . $faker->randomElement($domainesEcoles) . ' de ' . $faker->randomElement($villesMarocaines);
            $villeEcole = Str::contains($nomEcole, 'de ') ? Str::afterLast($nomEcole, 'de ') : $faker->randomElement($villesMarocaines);

            $seuilActif = ($typeEcole === 'public') ? $faker->boolean(70) : false; // 70% chance pour public, jamais pour privé (simplification)
            $seuil = $seuilActif ? $faker->randomFloat(2, 12, 17) : null;
            $frais = ($typeEcole === 'prive') ? $faker->numberBetween(25000, 75000) : 0;

            $etablissements[] = [
                'nom' => $nomEcole,
                'ville' => $villeEcole,
                'description' => $faker->sentence(10) . ' Offrant des formations de pointe pour les bacheliers.',
                'adresse' => $faker->streetAddress . ', ' . $villeEcole,
                'universite_id' => $faker->randomElement($universiteIds),
                'resau' => $faker->company . ' Network',
                'nombre_etudiant' => $faker->numberBetween(200, 3500),
                'region_id' => $faker->randomElement($regionIds),
                'TypeEcole' => $typeEcole,
                'telephone' => $faker->numerify('05########'),
                'fax' => $faker->numerify('05########'),
                'site_web' => 'https://www.' . Str::slug(Str::words($nomEcole, 3, '')) . '.ac.ma',
                'site_inscription' => 'https://inscription.' . Str::slug(Str::words($nomEcole, 3, '')) . '.ac.ma',
                'facebook' => 'https://facebook.com/' . Str::slug(Str::words($nomEcole, 2, '')),
                'instagram' => 'https://instagram.com/' . Str::slug(Str::words($nomEcole, 2, '')),
                'linkedin' => 'https://linkedin.com/company/' . Str::slug(Str::words($nomEcole, 2, '')),
                'logo' => 'logos/default_logo.png', // Placeholder
                'image' => 'images/default_campus.jpg', // Placeholder
                'abreviation' => strtoupper(Str::substr(Str::slug(Str::words($nomEcole, 4, ''),''),0,5) . $faker->lexify('??')),
                'seuil_actif' => $seuilActif,
                'seuil' => $seuil,
                'reputation' => $faker->randomFloat(1, 2.5, 4.8),
                'frais_scolarite' => $frais,
                'date_ouverture_inscription' => $faker->dateTimeBetween('-2 months', '-1 week')->format('Y-m-d'),
                'date_limite_inscription' => $faker->dateTimeBetween('+1 month', '+3 months')->format('Y-m-d'),
                'diplome_type' => $faker->randomElement($typesDiplomes),
                'email' => Str::slug(Str::words($nomEcole, 2, '')) . '@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertion en masse pour de meilleures performances
        foreach (array_chunk($etablissements, 20) as $chunk) { // Insérer par lots de 20
            DB::table('etablissements')->insert($chunk);
        }

        // Alternative si vous préférez utiliser le modèle (plus lent mais déclenche les events Eloquent)
        // foreach ($etablissements as $etablissementData) {
        //     Etablissement::create($etablissementData);
        // }

        $this->command->info(count($etablissements) . ' établissements ont été créés.');
    }
}
