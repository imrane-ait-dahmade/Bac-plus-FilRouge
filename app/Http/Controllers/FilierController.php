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
}
