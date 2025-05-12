<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentNotesSeeder extends Seeder
{
    public function run(): void
    {
        $matieres = [
            'Mathématiques',
            'Physique-Chimie',
            'SVT',
            'Anglais',
            'Philosophie',
            'Arabe',
            'Français',
            'Éducation Islamique',
            'Histoire',
            'Économie',
            'Organisation',
            'Note Nationale',
            'Note Régionale'
        ];

        // Insérer les matières pour un utilisateur de test (si nécessaire)
        $userId = 1; // Assurez-vous que cet utilisateur existe
        foreach ($matieres as $matiere) {
            DB::table('student_notes')->insert([
                'user_id' => $userId,
                'matiere' => $matiere,
                'note' => 0.00,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
