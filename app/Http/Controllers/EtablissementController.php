<?php

namespace App\Http\Controllers;

use App\Enums\Universite;
use App\Models\Etablissement;

use App\Http\Requests\UpdateEtablissementRequest;
use App\Models\Region;
use Illuminate\Http\Request;

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

        $universites = Universite::cases();
        //        dd($universites);
        //        dd($regions->toArray());
        return view('Backoffice.Etablissement.Ajoute', compact('regions', 'universites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nometablissement' => 'required|string|max:255',
//            'domaine' => 'nullable|string',
            'villeEtablissement' => 'nullable|string',
            'region_id' => 'nullable|exists:regions,id',
            'adresseEtablissement' => 'nullable|string',
            'telephone' => 'nullable|string',
            'fax' => 'nullable|string',
            'siteWeb' => 'nullable|url',
            'siteInscription' => 'nullable|url',
            'Unversite' => 'nullable|string',
            'resau' => 'nullable|string',
            'email' => 'nullable|email',
            'nombreEtudiant' => 'nullable|integer',
            'TypeEcole' => 'nullable|string',
            'descirptionetablissement' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logoName =null;
        $imageName = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');

            $logoName = $logo->getClientOriginalName();

            $logo->move(public_path('Images/LogoEcoles'), $logoName);
        }
        if ($request->hasFile('image')) {

                $image = $request->file('image');

                 $imageName = $image->getClientOriginalName();

                 $image->move(public_path('/Images/PhotoEcoles'), $imageName);
        }

      $etablissement =  Etablissement::create([
            'nometablissement' => $request->nometablissement,
//            'domaine' => $request->domaine,
            'villeetablissement' => $request->villeEtablissement,
            'region_id' => $request->region_id,
            'adresseetablissement' => $request->adresseEtablissement,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
            'siteweb' => $request->siteWeb,
            'siteinscription' => $request->siteInscription,
            'universite' => $request->Unversite,
            'resau' => $request->resau,
            'email' => $request->email,
            'nombreetudiant' => $request->nombreEtudiant,
            'Typeecole' => $request->TypeEcole,
            'descirptionetablissement' => $request->DescirptionEtablissement,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'photo' => $imageName,
            'logo' => $logoName,
        ]);
               return to_route('etablissements.infos', $etablissement);
    }



    /**
     * Display the specified resource.
     */

    //    public function FindEcole(request $request){
    //        $etablissement = Etablissement::with('region')->find($request->id);
    //        if($etablissement){
    //            dd($etablissement);
    //         $this->show($etablissement);
    //        }
    //        else{
    //            return to_route('404');
    //        }
    //
    //    }
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
