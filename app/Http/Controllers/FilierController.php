<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilieresRequest;
use App\Models\Domaine;
use App\Models\Filiere;
use http\Url;
use Illuminate\Http\Request;

class FilierController extends Controller
{
    public function index($domaine)
    {
        $filieres =  Filiere::where('domaine_id', $domaine)->get();
        $domaine = Domaine::find($domaine);
        return view('Filieres', compact('filieres', 'domaine'));
    }

    public function create($domaine)
    {
        return view('Backoffice.Filiere.Ajoute', compact('domaine'));
    }

    public function store(FilieresRequest $request, $domaine)
    {
        $validated = $request->validated();
        $validated['domaine_id'] = $domaine;
        $filiere = Filiere::create($validated);
        return to_route('filiere.show', ['filiere' => $filiere->id, 'domaine' => $domaine]);
    }

    public function show($domaine, $filiere)
    {
        $filiere = Filiere::with(['domaine', 'etablissements.universite', 'etablissements.region'])
            ->findOrFail($filiere);

        $etablissements = $filiere->etablissements()
            ->with(['universite', 'region'])
            ->paginate(12);

        return view('Filiere', compact('filiere', 'domaine', 'etablissements'));
    }

    public function edit($filiere)
    {
        $filiere = Filiere::find($filiere);
        $domaines = Domaine::all();
        $domaine = $filiere->domaine;
        return view('Backoffice.Filiere.Modifier', compact('filiere', 'domaine', 'domaines'));
    }

    public function update(FilieresRequest $request, $filiere)
    {
        $validated = $request->validated();
        $filiereModel = Filiere::findOrFail($filiere);
        $domaine = $filiereModel->domaine;
        $filiereModel->update($validated);
        return to_route('filiere.show', ['filiere' => $filiereModel->id, 'domaine' => $domaine->id]);
    }

    public function destroy($id)
    {
        $filiere = Filiere::find($id);
        $domaine = $filiere->domaine;
        $filiere->delete();
        return to_route('filieres.domaine', ['domaine' => $domaine->id]);
    }
}
