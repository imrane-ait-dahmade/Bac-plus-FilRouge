<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Filiere;
use App\Services\RecommendationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    protected $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function index()
    {
        $user = Auth::user();

        $recommendedEtablissements = $this->recommendationService->getRecommendedEtablissements($user);
        $recommendedFilieres = $this->recommendationService->getRecommendedFilieres($user);

        return view('Frontoffice.recommendations', compact('recommendedEtablissements', 'recommendedFilieres'));
    }
}
