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
}
