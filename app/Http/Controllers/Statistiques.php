<?php


namespace App\Http\Controllers;


use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\User;
use Illuminate\Http\Request;

class Statistiques extends Controller{

    public function StatistiquesAdmin()
    {
        $CountEtudiants = User::where('role', 'etudiant')->count();
        $CountEtablissements = Etablissement::count();
        $CountFilieres = Filiere::count();

        $data = [

            'CountEtudiants' => $CountEtudiants,
            'CountEtablissements' => $CountEtablissements,
            'CountFilieres' => $CountFilieres,
        ];


        return view('Backoffice.Dashboard', $data);
    }






}
