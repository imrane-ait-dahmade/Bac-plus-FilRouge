<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('universites')->insert([
            [
                'nom' => 'Université Mohammed V de Rabat',
                'directeur' => 'Pr. Saaïd Amzazi',
                'region_id' => 1,
                'type' => 'public',
            ],
            [
                'nom' => 'Université Cadi Ayyad de Marrakech',
                'directeur' => 'Pr. Moulay Lahcen Ouazzani',
                'region_id' => 2,
                'type' => 'public',
            ],
            [
                'nom' => 'Université Al Akhawayn d’Ifrane',
                'directeur' => 'Pr. Amine Bensaïd',
                'region_id' => 3,
                'type' => 'prive',
            ],
            [
                'nom' => 'Université Hassan II de Casablanca',
                'directeur' => 'Pr. Abdelmajid El Harti',
                'region_id' => 4,
                'type' => 'public',
            ],
            [
                'nom' => 'Université Euro-Méditerranéenne de Fès',
                'directeur' => 'Dr. Mostapha Bousmina',
                'region_id' => 5,
                'type' => 'prive',
            ],
        ]);
    }
}
