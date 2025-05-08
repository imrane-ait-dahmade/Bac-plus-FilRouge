<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Domaine; // Assurez-vous que le chemin vers votre modèle est correct
use Illuminate\Support\Facades\DB;
// Optionnel : pour rendre le code plus portable entre MySQL et PostgreSQL
// use Illuminate\Support\Facades\Schema;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Déterminer le type de connexion pour adapter la syntaxe (optionnel mais bonne pratique)
        // $connectionType = Schema::getConnection()->getDriverName();

        // Puisque nous savons que vous utilisez pgsql, nous allons utiliser la syntaxe pgsql directement.
        // Si vous vouliez un code portable :
        // if ($connectionType === 'mysql') {
        //     DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // } elseif ($connectionType === 'pgsql') {
        //     DB::statement("SET session_replication_role = 'replica';");
        // }

        // Pour PostgreSQL: Désactiver temporairement les triggers (y compris ceux des clés étrangères)
        DB::statement("SET session_replication_role = 'replica';");

        // Vider la table. truncate() devrait fonctionner maintenant.
        Domaine::truncate();
        // Alternative si truncate pose toujours problème (rare après désactivation des FK triggers)
        // DB::table('domaines')->delete();

        // Pour PostgreSQL: Réactiver les triggers
        // 'origin' est souvent utilisé, 'DEFAULT' remet à la configuration par défaut de la session.
        DB::statement("SET session_replication_role = 'origin';");
        // ou DB::statement("SET session_replication_role = DEFAULT;");


        // if ($connectionType === 'mysql') {
        //     DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // } elseif ($connectionType === 'pgsql') {
        //     DB::statement("SET session_replication_role = 'origin';"); // ou DEFAULT
        // }


        $domaines = [
            // Type: Scientifique
            [
                'domaine' => 'Sciences et Techniques',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Sciences Mathématiques et Informatiques (SMI)',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Sciences de la Matière Physique (SMP)',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Sciences de la Vie (SVI)',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Sciences de la Terre et de l\'Univers (STU)',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Génie Civil',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Génie Électrique',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Génie Mécanique',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Génie Informatique',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Génie Industriel',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Agronomie et Sciences Vétérinaires',
                'type' => 'Scientifique'
            ],
            [
                'domaine' => 'Architecture et Urbanisme',
                'type' => 'Scientifique' // Peut aussi être artistique, mais souvent très technique
            ],
            [
                'domaine' => 'Sciences de la Santé (Médecine, Pharmacie, Dentaire)',
                'type' => 'Scientifique'
            ],

            // Type: Economiques
            [
                'domaine' => 'Sciences Économiques et Gestion',
                'type' => 'Economiques'
            ],
            [
                'domaine' => 'Gestion et Commerce (ENCG, ISCAE)',
                'type' => 'Economiques'
            ],
            [
                'domaine' => 'Finance et Comptabilité',
                'type' => 'Economiques'
            ],
            [
                'domaine' => 'Marketing et Action Commerciale',
                'type' => 'Economiques'
            ],

            // Type: Juridique
            [
                'domaine' => 'Droit et Sciences Politiques',
                'type' => 'Juridique'
            ],
            [
                'domaine' => 'Droit Privé',
                'type' => 'Juridique'
            ],
            [
                'domaine' => 'Droit Public',
                'type' => 'Juridique'
            ],

            // Type: Artistique
            [
                'domaine' => 'Arts Appliqués et Design',
                'type' => 'Artistique'
            ],
            [
                'domaine' => 'Arts Plastiques',
                'type' => 'Artistique'
            ],
            [
                'domaine' => 'Cinéma et Audiovisuel',
                'type' => 'Artistique'
            ],

            // Type: Literature
            [
                'domaine' => 'Lettres et Sciences Humaines',
                'type' => 'Literature'
            ],
            [
                'domaine' => 'Langue et Littérature Françaises',
                'type' => 'Literature'
            ],
            [
                'domaine' => 'Langue et Littérature Arabes',
                'type' => 'Literature'
            ],
            [
                'domaine' => 'Études Anglaises',
                'type' => 'Literature'
            ],
            [
                'domaine' => 'Histoire et Civilisation',
                'type' => 'Literature'
            ],
            [
                'domaine' => 'Philosophie et Sociologie',
                'type' => 'Literature'
            ],

            // Type: Militaire
            [
                'domaine' => 'Académie Royale Militaire (ARM)',
                'type' => 'Militaire'
            ],
            [
                'domaine' => 'École Royale de l\'Air (ERA)',
                'type' => 'Militaire'
            ],
            [
                'domaine' => 'École Royale Navale (ERN)',
                'type' => 'Militaire'
            ],

            // Type: Professionnel
            [
                'domaine' => 'Tourisme et Hôtellerie (ISITT)',
                'type' => 'Professionnel'
            ],
            [
                'domaine' => 'Technicien Spécialisé (ISTA - OFPPT)',
                'type' => 'Professionnel'
            ],
            [
                'domaine' => 'Journalisme et Communication (ISIC)',
                'type' => 'Professionnel'
            ],
            [
                'domaine' => 'Professions Infirmières et Techniques de Santé (ISPITS)',
                'type' => 'Professionnel' // Ou Scientifique, mais l'aspect professionnalisant est fort
            ],
            [
                'domaine' => 'Sport et Éducation Physique (ENSEP, IRFC)',
                'type' => 'Professionnel'
            ],
        ];

        foreach ($domaines as $domaineData) {
            Domaine::create($domaineData);
        }
    }
}
