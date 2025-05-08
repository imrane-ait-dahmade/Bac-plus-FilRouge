<?php

namespace App\Http\Controllers;

use App\Models\Universite;
use Illuminate\Http\Request;

class UniversiteController extends Controller
{

    public function index()
    {
        $universites = Universite::paginate(3);

        return view('Backoffice.Universite.universites', compact('universites'));
    }

    public function create()
    {
        return view('universites.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
        ]);

        Universite::create($request->all());

        return redirect()->route('universites.index')
            ->with('success', 'Université ajoutée avec succès.');
    }


    public function show($id)
    {
        $universite = Universite::findOrFail($id);
        return view('universites.show', compact('universite'));
    }


    public function edit($id)
    {
        $universite = Universite::findOrFail($id);
        return view('universites.edit', compact('universite'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
        ]);

        $universite = Universite::findOrFail($id);
        $universite->update($request->all());

        return redirect()->route('universites.index')
            ->with('success', 'Université mise à jour.');
    }

    public function destroy($id)
    {
        $universite = Universite::findOrFail($id);
        $universite->delete();

        return redirect()->route('universites.index')
            ->with('success', 'Université supprimée.');
    }
}
