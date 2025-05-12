<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatieresSeeder extends Seeder
{
    public function run(): void
    {
        $matieres = [
            ['code' => 'math', 'nom' => 'Mathématiques'],
            ['code' => 'pc', 'nom' => 'Physique-Chimie'],
            ['code' => 'svt', 'nom' => 'SVT'],
            ['code' => 'anglais', 'nom' => 'Anglais'],
            ['code' => 'philosophie', 'nom' => 'Philosophie'],
            ['code' => 'arabe', 'nom' => 'Arabe'],
            ['code' => 'francais', 'nom' => 'Français'],
            ['code' => 'islamic', 'nom' => 'Éducation Islamique'],
            ['code' => 'histoire', 'nom' => 'Histoire'],
            ['code' => 'economie', 'nom' => 'Économie'],
            ['code' => 'organisation', 'nom' => 'Organisation'],
            ['code' => 'nationale', 'nom' => 'Note Nationale'],
            ['code' => 'regionale', 'nom' => 'Note Régionale']
        ];

        foreach ($matieres as $matiere) {
            DB::table('matieres')->insert([
                'code' => $matiere['code'],
                'nom' => $matiere['nom'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
