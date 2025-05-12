<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //        User::factory()->create([
        //            'name' => 'Test User',
        //            'email' => 'test@example.com',
        //        ]);

        // 1. D'abord les tables de base sans dépendances
        $this->call(RegionTable::class);
        $this->call(UniversiteSeeder::class);
        $this->call(DomaineSeeder::class);

        // 2. Ensuite les tables qui dépendent des tables de base
        $this->call(EtablissementSeeder::class);
        $this->call(FiliereSeeder::class);

        // 3. Enfin les tables pivot qui dépendent des autres tables
        $this->call(EtablissementFilierePivotSeeder::class);
    }
}
