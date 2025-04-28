<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Etablissement;
use App\Enums\Universite;
use App\Enums\Ville;

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
        $villes = Ville::cases();
        $Domaines = Domaine::all();



        return view('Frontoffice.Etablissements', compact('etablissements', 'villes', 'Domaines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();

        $universites = Universite::cases();
        $villes = Ville::cases();
        //        dd($universites);
        //        dd($regions->toArray());
        return view('Backoffice.Etablissement.Ajoute', compact('regions', 'universites','villes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nometablissement' => 'required|string|max:255',
            'villeEtablissement' => 'nullable|string',
            'region_id' => 'nullable|exists:regions,id',
            'adresseEtablissement' => 'nullable|string',
            'telephone' => 'nullable|string',
            'fax' => 'nullable|string',
            'siteWeb' => 'nullable|url',
            'siteInscription' => 'nullable|url',
            'universite' => 'nullable|string',
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
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('Images/LogoEcoles'), $logoName);
        }
        if ($request->hasFile('image')) {

                $image = $request->file('image');

//                 $imageName = $image->getClientOriginalName();

            $imageName = time() . '_' . $image->getClientOriginalName();
//            dd($imageName);
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
            'image' => $imageName,
            'logo' => $logoName,
        ]);


               return to_route('etablisement_infos', $etablissement);
    }



    /**
     * Display the specified resource.
     */


    public function show($id)
    {

        $etablissement = Etablissement::with('filieres')->find($id);;



        if (!$etablissement) {

           to_route('404') ;
        }

        return view('Infos', compact('etablissement'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $etablissement = Etablissement::find($id);
       $region = $etablissement->region;
       $regions = Region::all();
       $universites = Universite::cases();
  return view('Backoffice.Etablissement.Modifier', compact('etablissement', 'regions','region', 'universites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id ,request $request)
    {

     $valideData =  $request->validate([
            'nometablissement' => 'required|string|max:255',
            'villeetablissement' => 'nullable|string',
            'region_id' => 'nullable|exists:regions,id',
            'adresseetablissement' => 'nullable|string',
            'telephone' => 'nullable|string',
            'fax' => 'nullable|string',
            'site_web' => 'nullable|url',
            'site_inscription' => 'nullable|url',
            'universite' => 'nullable|string',
            'resau' => 'nullable|string',
            'email' => 'nullable|email',
            'nombreetudiant' => 'nullable|integer',
            'eypeecole' => 'nullable|string',
            'descirptionetablissement' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

$etablissement = Etablissement::find($id);

 $etablissement->Update([$valideData]);

 return to_route('etablisement_infos', $etablissement);


//        $modifs = $etablissement->getChanges();
//        dd($modifs);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $etablissement = Etablissement::find($id);
        $etablissement->delete();

        return redirect('/etablissementsAccesAdmin');
    }
}
