<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Important: importer la façade DB

class MatieresFilieresBacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vider la table avant de la remplir (optionnel mais recommandé)
        DB::table('matieres_filieres_bac')->delete();

        // Définir les relations matière-filière avec les coefficients
        // ATTENTION : LES COEFFICIENTS CI-DESSOUS SONT DES EXEMPLES/SUPPOSITIONS
        // TU DOIS LES REMPLACER PAR LES VRAIES VALEURS !
        $data = [

            // --- Filière: 1: Sciences Mathématiques A ---
            ['matiere_id' => 5,  'filiere_id' => 1, 'Coefiecient' => 9], // Mathématiques
            ['matiere_id' => 6,  'filiere_id' => 1, 'Coefiecient' => 7], // Physique-Chimie
            ['matiere_id' => 7,  'filiere_id' => 1, 'Coefiecient' => 3], // SVT (souvent présent mais coef plus bas)
            ['matiere_id' => 15, 'filiere_id' => 1, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 1, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 1, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 1, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 1, 'Coefiecient' => 2], // Éducation Islamique
            // ['matiere_id' => ?,  'filiere_id' => 1, 'Coefiecient' => ?], // Autres matières ? Traduction ? Histoire-Géo ?

            // --- Filière: 2: Sciences Mathématiques B ---
            // Souvent très similaire à SMA, parfois léger changement (plus de Physique/SI ?)
            ['matiere_id' => 5,  'filiere_id' => 2, 'Coefiecient' => 9], // Mathématiques
            ['matiere_id' => 6,  'filiere_id' => 2, 'Coefiecient' => 7], // Physique-Chimie
            ['matiere_id' => 8,  'filiere_id' => 2, 'Coefiecient' => 4], // Sciences de l'Ingénieur (parfois plus important en SMB)
            ['matiere_id' => 15, 'filiere_id' => 2, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 2, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 2, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 2, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 2, 'Coefiecient' => 2], // Éducation Islamique
            // ['matiere_id' => 7,  'filiere_id' => 2, 'Coefiecient' => ?], // SVT ?

            // --- Filière: 3: Sciences Physiques ---
            ['matiere_id' => 6,  'filiere_id' => 3, 'Coefiecient' => 7], // Physique-Chimie
            ['matiere_id' => 5,  'filiere_id' => 3, 'Coefiecient' => 7], // Mathématiques
            ['matiere_id' => 7,  'filiere_id' => 3, 'Coefiecient' => 5], // SVT
            ['matiere_id' => 15, 'filiere_id' => 3, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 3, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 3, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 3, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 3, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 4: Sciences de la Vie et de la Terre ---
            ['matiere_id' => 7,  'filiere_id' => 4, 'Coefiecient' => 7], // SVT
            ['matiere_id' => 6,  'filiere_id' => 4, 'Coefiecient' => 5], // Physique-Chimie
            ['matiere_id' => 5,  'filiere_id' => 4, 'Coefiecient' => 5], // Mathématiques
            ['matiere_id' => 15, 'filiere_id' => 4, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 4, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 4, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 4, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 4, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 5: Sciences Agronomiques ---
            ['matiere_id' => 9,  'filiere_id' => 5, 'Coefiecient' => 6], // Sciences Agronomiques
            ['matiere_id' => 7,  'filiere_id' => 5, 'Coefiecient' => 6], // SVT
            ['matiere_id' => 6,  'filiere_id' => 5, 'Coefiecient' => 4], // Physique-Chimie
            ['matiere_id' => 5,  'filiere_id' => 5, 'Coefiecient' => 4], // Mathématiques
            ['matiere_id' => 15, 'filiere_id' => 5, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 5, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 5, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 5, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 5, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filières BIOF (6, 7, 8, 9) ---
            // Hypothèse : Mêmes matières et coefficients que leurs équivalents non-BIOF
            // Mais langue d'enseignement différente pour les matières scientifiques.
            // Copier les sections 1, 2, 3, 4 et changer juste le filiere_id

            // --- Filière: 6: Sciences Mathématiques A - Option Français (BIOF) ---
            ['matiere_id' => 5,  'filiere_id' => 6, 'Coefiecient' => 9], // Mathématiques
            ['matiere_id' => 6,  'filiere_id' => 6, 'Coefiecient' => 7], // Physique-Chimie
            ['matiere_id' => 7,  'filiere_id' => 6, 'Coefiecient' => 3], // SVT
            ['matiere_id' => 15, 'filiere_id' => 6, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 6, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 6, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 6, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 6, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 7: Sciences Mathématiques B - Option Français (BIOF) ---
            ['matiere_id' => 5,  'filiere_id' => 7, 'Coefiecient' => 9], // Mathématiques
            ['matiere_id' => 6,  'filiere_id' => 7, 'Coefiecient' => 7], // Physique-Chimie
            ['matiere_id' => 8,  'filiere_id' => 7, 'Coefiecient' => 4], // Sciences de l'Ingénieur
            ['matiere_id' => 15, 'filiere_id' => 7, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 7, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 7, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 7, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 7, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 8: Sciences Physiques - Option Français (BIOF) ---
            ['matiere_id' => 6,  'filiere_id' => 8, 'Coefiecient' => 7], // Physique-Chimie
            ['matiere_id' => 5,  'filiere_id' => 8, 'Coefiecient' => 7], // Mathématiques
            ['matiere_id' => 7,  'filiere_id' => 8, 'Coefiecient' => 5], // SVT
            ['matiere_id' => 15, 'filiere_id' => 8, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 8, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 8, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 8, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 8, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 9: Sciences de la Vie et de la Terre - Option Français (BIOF) ---
            ['matiere_id' => 7,  'filiere_id' => 9, 'Coefiecient' => 7], // SVT
            ['matiere_id' => 6,  'filiere_id' => 9, 'Coefiecient' => 5], // Physique-Chimie
            ['matiere_id' => 5,  'filiere_id' => 9, 'Coefiecient' => 5], // Mathématiques
            ['matiere_id' => 15, 'filiere_id' => 9, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 9, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 9, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 9, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 9, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 10: Sciences et Technologies Électriques ---
            ['matiere_id' => 8,  'filiere_id' => 10, 'Coefiecient' => 8], // Sciences de l'Ingénieur (STE dominantes)
            ['matiere_id' => 5,  'filiere_id' => 10, 'Coefiecient' => 6], // Mathématiques
            ['matiere_id' => 6,  'filiere_id' => 10, 'Coefiecient' => 6], // Physique-Chimie (souvent appliquée)
            ['matiere_id' => 15, 'filiere_id' => 10, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 10, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 10, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 10, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 10, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 11: Sciences et Technologies Mécaniques ---
            ['matiere_id' => 8,  'filiere_id' => 11, 'Coefiecient' => 8], // Sciences de l'Ingénieur (STM dominantes)
            ['matiere_id' => 5,  'filiere_id' => 11, 'Coefiecient' => 6], // Mathématiques
            ['matiere_id' => 6,  'filiere_id' => 11, 'Coefiecient' => 6], // Physique-Chimie (souvent appliquée)
            ['matiere_id' => 15, 'filiere_id' => 11, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 11, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 11, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 11, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 11, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 12: Sciences Économiques ---
            ['matiere_id' => 11, 'filiere_id' => 12, 'Coefiecient' => 6], // Économie Générale et Statistiques
            ['matiere_id' => 12, 'filiere_id' => 12, 'Coefiecient' => 6], // Économie et Organisation Admin. des Entreprises
            ['matiere_id' => 10, 'filiere_id' => 12, 'Coefiecient' => 4], // Comptabilité et Math Fin.
            ['matiere_id' => 5,  'filiere_id' => 12, 'Coefiecient' => 4], // Mathématiques
            ['matiere_id' => 3,  'filiere_id' => 12, 'Coefiecient' => 2], // Histoire-Géographie
            ['matiere_id' => 15, 'filiere_id' => 12, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 12, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 12, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 12, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 12, 'Coefiecient' => 2], // Éducation Islamique
            // ['matiere_id' => 13, 'filiere_id' => 12, 'Coefiecient' => ?], // Droit ? (parfois inclus)

            // --- Filière: 13: Sciences de Gestion Comptable ---
            ['matiere_id' => 10, 'filiere_id' => 13, 'Coefiecient' => 8], // Comptabilité et Math Fin.
            ['matiere_id' => 12, 'filiere_id' => 13, 'Coefiecient' => 6], // Économie et Organisation Admin. des Entreprises
            ['matiere_id' => 11, 'filiere_id' => 13, 'Coefiecient' => 3], // Économie Générale et Statistiques
            ['matiere_id' => 13, 'filiere_id' => 13, 'Coefiecient' => 3], // Droit (souvent plus important ici)
            ['matiere_id' => 5,  'filiere_id' => 13, 'Coefiecient' => 2], // Mathématiques (parfois moins qu'en Eco)
            ['matiere_id' => 3,  'filiere_id' => 13, 'Coefiecient' => 2], // Histoire-Géographie
            ['matiere_id' => 15, 'filiere_id' => 13, 'Coefiecient' => 2], // Philosophie
            ['matiere_id' => 16, 'filiere_id' => 13, 'Coefiecient' => 2], // Langue Anglaise
            ['matiere_id' => 1,  'filiere_id' => 13, 'Coefiecient' => 2], // Langue Française
            ['matiere_id' => 4,  'filiere_id' => 13, 'Coefiecient' => 2], // Langue Arabe
            ['matiere_id' => 2,  'filiere_id' => 13, 'Coefiecient' => 2], // Éducation Islamique

            // --- Filière: 14: Lettres ---
            ['matiere_id' => 14, 'filiere_id' => 14, 'Coefiecient' => 6], // Littérature Arabe
            ['matiere_id' => 4,  'filiere_id' => 14, 'Coefiecient' => 4], // Langue Arabe (souvent coef élevé aussi)
            ['matiere_id' => 1,  'filiere_id' => 14, 'Coefiecient' => 4], // Langue Française
            ['matiere_id' => 15, 'filiere_id' => 14, 'Coefiecient' => 4], // Philosophie
            ['matiere_id' => 3,  'filiere_id' => 14, 'Coefiecient' => 3], // Histoire-Géographie
            ['matiere_id' => 16, 'filiere_id' => 14, 'Coefiecient' => 3], // Langue Anglaise
            ['matiere_id' => 2,  'filiere_id' => 14, 'Coefiecient' => 2], // Éducation Islamique
            // ['matiere_id' => 18, 'filiere_id' => 14, 'Coefiecient' => ?], // Traduction ? (peut être une option ou matière)
            // Arts Appliqués ? (Matière 17) - Normalement filière distincte non listée ici.


            // ... AJOUTER TOUTES LES AUTRES COMBINAISONS MATIERE/FILIERE AVEC LEURS COEFFICIENTS CORRECTS ...

        ];

        // Insérer les données dans la table
        // Utiliser insert() pour insérer plusieurs lignes d'un coup
        DB::table('matieres_filieres_bac')->insert($data);
    }
}
