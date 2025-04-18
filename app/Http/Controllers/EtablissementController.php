<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;
use Termwind\Components\Dd;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $etablissements = Etablissement::all();
        return view('etablissements.index', compact('etablissements'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etablissements.create');
    }

    public function store(StoreEtablissementRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        $etablissement = Etablissement::create($data);
        return to_route('etablissements.infos', $etablissement);
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
