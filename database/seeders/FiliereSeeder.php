<?php

namespace Database\Seeders;

use Database\Factories\FiliereFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filiere;
class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Filiere::factory()->count(10)->create();
    }
}
