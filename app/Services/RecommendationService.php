<?php

namespace App\Services;

use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\User;
use Illuminate\Support\Collection;

class RecommendationService
{
    public function getRecommendedEtablissements(User $user): Collection
    {
        // Récupérer les établissements basés sur l'historique de consultation
        $viewedEtablissements = $user->viewHistory()
            ->with('etablissement')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->pluck('etablissement');

        // Récupérer les établissements similaires
        return Etablissement::whereIn('id', $viewedEtablissements->pluck('id'))
            ->with(['filieres', 'universite', 'region'])
            ->take(6)
            ->get();
    }

    public function getRecommendedFilieres(User $user): Collection
    {
        // Récupérer les filières basées sur les favoris
        $favoriteEtablissements = $user->favorites()
            ->with('etablissement.filieres')
            ->get()
            ->pluck('etablissement.filieres')
            ->flatten();

        // Récupérer les filières similaires
        return Filiere::whereIn('id', $favoriteEtablissements->pluck('id'))
            ->with(['domaine', 'etablissements'])
            ->take(6)
            ->get();
    }
}
