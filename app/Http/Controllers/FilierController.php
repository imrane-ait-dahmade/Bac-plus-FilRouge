<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilieresRequest;
use App\Models\Domaine;
use App\Models\Filiere;
use http\Url;
use Illuminate\Http\Request;

class FilierController extends Controller
{
   public function index( $domaine){
     $filieres =  Filiere::where('domaine_id' , $domaine)->get();
        $domaine = Domaine::find($domaine);
            return view('Filieres',compact('filieres','domaine'));
   }

   public function create($domaine){

       return view('Backoffice.Filiere.Ajoute',compact('domaine'));
   }
    public function store(FilieresRequest $request, $domaine)
    {
        $validated = $request->validated();

        $validated['domaine_id'] = $domaine;

        $filiere = Filiere::create($validated);

        return to_route('filiere.show', compact('filiere' ,'domaine'));
    }


    public function show($domaine,$filiere){

       $filiere = Filiere::find($filiere);

       return view('Filiere',compact('filiere','domaine'));
   }

   public function edit($id){
       $filiere = Filiere::find($id);
       return view('Backoffice.Filiere.Modifier',compact('filiere'));
   }
   public function update(Request $request, $id){
     $request->validate([
           'nomfiliere'=> 'max:40',
           'description'=> 'max:255',
           'Niveau'=>'max:40',
           'ConditionsAdmission'=> 'max:100',
       ]);

     $filiere = Filiere::find($id);
//        dd($filiere);
//       dd($request->all());
     $filiere->update($request->all());
     return to_route('filieres');

   }
   public function destroy($id){
       $filiere = Filiere::find($id);
       $domaine = $filiere->domaine;

       $filiere->delete();
       return to_route('filieres.domaine',['domaine'=>$domaine->id]);
   }
}
