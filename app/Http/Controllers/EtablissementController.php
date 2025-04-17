<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return Etablissement::paginate(10);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $cardinale = $request->validate([
            "nom" => "required",
            "adresseEtablissement" => "required",
            "DescriptionEtablissement" => "required",
            "Universite" => "required",
            "reseau" => "required",
            "image" => "required",
            "nombreEtudiant" => "required",
            "Region_id" => "required",
            "TypeEcole" => "required",
            "Tags" => "required",
            "Categorie_id" => "required",

        ]);

        $etablissement = new Etablissement();
        return to_route('etablissements.infos',$etablissement);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtablissementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Etablissement $etablissement)
    {
        return to_route('etablissements.infos',$etablissement);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etablissement $etablissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtablissementRequest $request, Etablissement $etablissement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etablissement $etablissement)
    {
        //
    }
}
