<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Favorite;
use App\Models\Filiere;
use App\Models\ViewHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:etudiant']);
    }

    public function dashboard()
    {
        return view('Frontoffice.dashboard');
    }

    // Gestion des favoris
    public function toggleFavorite(Etablissement $etablissement)
    {
        $user = Auth::user();
        $favorite = $user->favorites()->where('etablissement_id', $etablissement->id)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed']);
        }

        $user->favorites()->create(['etablissement_id' => $etablissement->id]);
        return response()->json(['status' => 'added']);
    }

    public function favorites()
    {
        $favorites = Auth::user()->favorites()->with(['etablissement.universite', 'etablissement.region'])->paginate(12);
        return view('Frontoffice.favorites', compact('favorites'));
    }

    // Gestion de l'historique
    public function viewHistory()
    {
        $history = Auth::user()->viewHistory()->with(['etablissement.universite', 'etablissement.region'])->paginate(12);
        return view('Frontoffice.history', compact('history'));
    }

    // Navigation entre filières et écoles
    public function showFiliere(Filiere $filiere)
    {
        $etablissements = $filiere->etablissements()
            ->with(['universite', 'region'])
            ->paginate(12);
        return view('Frontoffice.filiere-details', compact('filiere', 'etablissements'));
    }

    public function showEtablissementFilieres(Etablissement $etablissement)
    {
        $filieres = $etablissement->filieres()
            ->with(['domaine'])
            ->paginate(12);
        return view('Frontoffice.etablissement-filieres', compact('etablissement', 'filieres'));
    }
}
