<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FilierController extends Controller
{
   public function index(){
     $filieres =  Filiere::all();
            return view('Backoffice.Filiere.Filieres',compact('filieres'));
   }

   public function create(){
       return view('Backoffice.Filiere.Ajoute');
   }
   public function store(Request $request){
       $request->validate([
           'nomfiliere'=>'required',
           'Niveau'=>'required',
           'ConditionsAdmission'=>'required',
           'description'=>'required',
       ]);
       $filiere = Filiere::create([
           'nomfiliere' =>$request->input('nomfiliere'),
           'Niveau' => $request->input('Niveau'),
           'ConditionsAdmission' => $request->input('ConditionsAdmission'),
           'description' => $request->input('description'),
       ]);
       return to_route('filiere.show',$filiere->id);
   }

   public function show($id){
       $filiere = Filiere::find($id);
       return view('Backoffice.Filiere.Filiere',compact('filiere'));
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
       $filiere->delete();
       return to_route('filieres');
   }
}
