<?php

namespace App\Http\Controllers;

use App\Enums\Universite;
use App\Models\Etablissement;

use App\Http\Requests\UpdateEtablissementRequest;
use App\Models\Region;
use App\Models\User;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
            'descirptionetablissement' => $request->descirptionetablissement,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'photo' => $imageName,
            'logo' => $logoName,
        ]);

               return to_route('etablisement_infos', $etablissement);
    }



    /**
     * Display the specified resource.
     */


    public function show($id)
    {
        // Récupérer l'établissement avec l'ID
        $etablissement = Etablissement::find($id);

        // Vérifier si l'établissement existe
        if (!$etablissement) {
            // Gérer le cas où l'établissement n'est pas trouvé (par exemple, afficher une erreur)
           to_route('404') ;
        }

        // Si l'établissement existe, afficher les infos
        return view('Backoffice.Etablissement.Infos', compact('etablissement'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etablissement $etablissement)
    {
  return view('Frontoffice.Etablissement.Modifier', compact('etablissement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtablissementRequest $request, Etablissement $etablissement)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etablissement $etablissement)
    {
        //
    }
}
