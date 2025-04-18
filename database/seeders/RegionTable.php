<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionTable extends Seeder
{
    public function run()
    {
        $regions = [
            'Tanger-Tétouan-Al Hoceïma',
            'L\'Oriental',
            'Fès-Meknès',
            'Rabat-Salé-Kénitra',
            'Béni Mellal-Khénifra',
            'Casablanca-Settat',
            'Marrakech-Safi',
            'Drâa-Tafilalet',
            'Souss-Massa',
            'Guelmim-Oued Noun',
            'Laâyoune-Sakia El Hamra',
            'Dakhla-Oued Ed Dahab',
        ];

        foreach ($regions as $region) {
            DB::table('regions')->insert([
                'nom_region' => $region,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
