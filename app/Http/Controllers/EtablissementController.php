<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;
use App\Models\Region;
use Termwind\Components\Dd;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $etablissements = Etablissement::with('region')->get();
        return view('Frontoffice.Etablissements', compact('etablissements'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
//        dd($regions->toArray());
        return view('Backoffice.Etablissement.Ajoute', compact('regions'));
    }

    public function store(StoreEtablissementRequest $request)
    {
        $data = $request->validate([
    'nomEtablissement' => 'required',
            'region_id' => 'required',
            'villeEtablissement' => 'required',
            'adresseEtablissement' => 'required',
            'TypeEcole' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        $etablissement = Etablissement::create($data);
        return to_route('etablissements.infos', $etablissement);
    }



    /**
     * Display the specified resource.
     */

    public function FindEcole(request $request){
        $etablissement = Etablissement::with('region')->find($request->id);
        if($etablissement){
         $this->show($etablissement);
        }
        else{
            return to_route('404');
        }

    }
    public function show(Etablissement $etablissement)
    {

        return view('Frontoffice.EtablissementInfos', compact('etablissement'));
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
