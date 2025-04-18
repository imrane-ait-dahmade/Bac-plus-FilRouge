<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etablissements = [
            [
                'nomEtablissement' => 'ENSA Tanger',
                'villeEtablissement' => 'Tanger',
                'DescirptionEtablissement' => 'École Nationale des Sciences Appliquées de Tanger',
                'adresseEtablissement' => 'Route Ziaten, Tanger',
                'Universite' => 'Université Abdelmalek Essaâdi',
                'resau' => 'ENSA',
                'nombreEtudiant' => 2500,
                'region_id' => 1, // Tanger-Tétouan-Al Hoceïma
                'TypeEcole' => 'Public',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomEtablissement' => 'UIR',
                'villeEtablissement' => 'Rabat',
                'DescirptionEtablissement' => 'Université Internationale de Rabat',
                'adresseEtablissement' => 'Technopolis, Rabat',
                'Universite' => 'Université Internationale de Rabat',
                'resau' => 'UIR',
                'nombreEtudiant' => 3500,
                'region_id' => 4, // Rabat-Salé-Kénitra
                'TypeEcole' => 'Private',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomEtablissement' => 'Université Cadi Ayyad',
                'villeEtablissement' => 'Marrakech',
                'DescirptionEtablissement' => 'Université publique pluridisciplinaire',
                'adresseEtablissement' => 'Av. Abdelkrim Khattabi, Marrakech',
                'Universite' => 'Université Cadi Ayyad',
                'resau' => 'UCAM',
                'nombreEtudiant' => 70000,
                'region_id' => 7, // Marrakech-Safi
                'TypeEcole' => 'Public',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('etablissements')->insert($etablissements);
    }

}
