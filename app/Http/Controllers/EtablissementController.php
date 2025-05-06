<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Etablissement;
use App\Enums\Ville;
use App\Models\Universite;
use App\Models\Region;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    public function index()
    {
        $etablissements = Etablissement::with('region')->get();
        $universities = Universite::all();
        $villes = Ville::cases();
        $Domaines = Domaine::all();

        return view('Frontoffice.Etablissements', compact('etablissements', 'villes', 'Domaines', 'universities'));
    }

    public function create()
    {
        $regions = Region::all();
        $universites = Universite::all();
        $villes = Ville::cases();

        return view('Backoffice.Etablissement.Ajoute', compact('regions', 'universites', 'villes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'nullable|string',
            'region_id' => 'nullable|exists:regions,id',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'fax' => 'nullable|string',
            'site_web' => 'nullable|url',
            'site_inscription' => 'nullable|url',
            'universite_id' => 'nullable|exists:universites,id',
            'resau' => 'nullable|string',
            'email' => 'nullable|email',
            'nombre_etudiant' => 'nullable|integer',
            'TypeEcole' => 'nullable|in:public,prive',
            'description' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'seuil_actif' => 'boolean',
            'seuil' => 'nullable|numeric',
            'date_ouverture_inscription' => 'nullable|date',
            'date_limite_inscription' => 'nullable|date',
            'diplome_type' => 'nullable|string',
            'reputation' => 'nullable|numeric',
            'frais_scolarite' => 'nullable|numeric',
            'abreviation' => 'nullable|string|max:20',
        ]);

        $logoName = null;
        $imageName = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('Images/LogoEcoles'), $logoName);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('Images/PhotoEcoles'), $imageName);
        }

        $etablissement = Etablissement::create([
            'nom' => $request->nom,
            'ville' => $request->ville,
            'region_id' => $request->region_id,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
            'site_web' => $request->site_web,
            'site_inscription' => $request->site_inscription,
            'universite_id' => $request->universite_id,
            'resau' => $request->resau,
            'email' => $request->email,
            'nombre_etudiant' => $request->nombre_etudiant,
            'TypeEcole' => $request->TypeEcole,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'image' => $imageName,
            'logo' => $logoName,
            'seuil_actif' => $request->seuil_actif,
            'seuil' => $request->seuil,
            'date_ouverture_inscription' => $request->date_ouverture_inscription,
            'date_limite_inscription' => $request->date_limite_inscription,
            'diplome_type' => $request->diplome_type,
            'reputation' => $request->reputation,
            'frais_scolarite' => $request->frais_scolarite,
            'abreviation' => $request->abreviation,
        ]);

        return to_route('etablisement_infos', $etablissement);
    }

    public function show($id)
    {
        $etablissement = Etablissement::with('filieres')->findOrFail($id);
        return view('Infos', compact('etablissement'));
    }

    public function edit($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $regions = Region::all();
        $universite = $etablissement->with('universite')->get();
        return view('Backoffice.Etablissement.Modifier', compact('etablissement', 'regions', 'universite'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'nullable|string',
            'region_id' => 'nullable|exists:regions,id',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'fax' => 'nullable|string',
            'site_web' => 'nullable|url',
            'site_inscription' => 'nullable|url',
            'universite_id' => 'nullable|exists:universites,id',
            'resau' => 'nullable|string',
            'email' => 'nullable|email',
            'nombre_etudiant' => 'nullable|integer',
            'TypeEcole' => 'nullable|in:public,prive',
            'description' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'seuil_actif' => 'boolean',
            'seuil' => 'nullable|numeric',
            'date_ouverture_inscription' => 'nullable|date',
            'date_limite_inscription' => 'nullable|date',
            'diplome_type' => 'nullable|string',
            'reputation' => 'nullable|numeric',
            'frais_scolarite' => 'nullable|numeric',
            'abreviation' => 'nullable|string|max:20',
        ]);

        $etablissement = Etablissement::findOrFail($id);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('Images/LogoEcoles'), $logoName);
            $validatedData['logo'] = $logoName;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('Images/PhotoEcoles'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $etablissement->update($validatedData);

        return to_route('etablisement_infos', $etablissement);
    }

    public function destroy($id)
    {
        Etablissement::destroy($id);
        return redirect()->route('etablissementsAccesAdmin');
    }
}
