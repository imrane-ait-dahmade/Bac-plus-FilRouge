<?php

namespace App\Http\Controllers;

use App\Enums\Ville;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;
use App\Models\Domaine;
use App\Models\Etablissement;
use App\Models\Region;
use App\Models\Universite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EtablissementController extends Controller
{
    public function index(Request $request)
    {
        $query = Etablissement::query()->with(['region', 'universite']);

        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->input('search') . '%');
        }
        if ($request->filled('ville')) {
            $query->where('ville', $request->input('ville'));
        }
        if ($request->filled('domaine_id')) {
            $query->whereHas('filieres', function ($q) use ($request) {
                $q->where('domaine_id', $request->input('domaine_id'));
            });
        }
        if ($request->filled('type_ecole') && is_array($request->input('type_ecole'))) {
            $query->whereIn('type_ecole', $request->input('type_ecole'));
        }

        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = Str::endsWith($sortBy, '_desc') ? 'desc' : 'asc';
        $sortColumn = Str::remove('_asc', Str::remove('_desc', $sortBy));

        if (in_array($sortColumn, ['nom', 'id'])) { // Add other sortable columns
            $query->orderBy($sortColumn, $sortDirection);
        } else {
            $query->orderBy('id', 'desc');
        }

        $etablissements = $query->paginate(15)->withQueryString();

        $regions = Region::orderBy('nom')->get();
        $universities = Universite::orderBy('nom')->get();
        $villes = Ville::cases();
        $Domaines = Domaine::orderBy('domaine')->get();

        return view('Frontoffice.Etablissements', compact('etablissements', 'villes', 'Domaines', 'universities', 'regions'));
    }

    public function create()
    {
        $regions = Region::orderBy('nom')->get();
        $universites = Universite::orderBy('nom')->get();
        $villes = Ville::cases();
        return view('Backoffice.Etablissement.Ajoute', compact('regions', 'universites', 'villes'));
    }

    public function store(UpdateEtablissementRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['logo'] = $this->handleFileUpload($request, 'logo', 'etablissement_logos');
        $validatedData['image'] = $this->handleFileUpload($request, 'image', 'etablissement_images');
        $validatedData['seuil_actif'] = $request->boolean('seuil_actif');


        $etablissement = Etablissement::create($validatedData);

        return redirect()->route('etablisement_infos', $etablissement->id)
            ->with('success', 'Établissement créé avec succès.');
    }

    public function show(Etablissement $etablissement)
    {

        $etablissement->loadMissing('filieres.domaine', 'region', 'universite');
        return view('Infos', compact('etablissement'));
    }

    public function edit(Etablissement $etablissement)
    {

        $regions = Region::orderBy('nom')->get();
        $universites = Universite::orderBy('nom')->get();
        $villes = Ville::cases();
        return view('Backoffice.Etablissement.Modifier', compact('etablissement', 'regions', 'universites', 'villes'));
    }

    public function update(UpdateEtablissementRequest $request, Etablissement $etablissement)
    {
//        dd();
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $this->handleFileUpload($request, 'logo', 'etablissement_logos', $etablissement->logo);
        }
        if ($request->hasFile('image')) {

            $validatedData['image'] = $this->handleFileUpload($request, 'image', 'etablissement_images', $etablissement->image);
        }
        $request['seuil_actif'] = $request->boolean('seuil_actif');


        $etablissement->update($request->toArray());

        return redirect()->route('etablisement_infos', $etablissement->id)->with('success', 'Établissement mis à jour avec succès.');
    }

    public function destroy(Etablissement $etablissement)
    {
        if ($etablissement->logo) {
            Storage::disk('public')->delete($etablissement->logo);
        }
        if ($etablissement->image) {
            Storage::disk('public')->delete($etablissement->image);
        }
        $etablissement->delete();

        return redirect()->route('Etablissements') // Assuming an admin index route
        ->with('success', 'Établissement supprimé avec succès.');
    }

    private function handleFileUpload(Request $request, string $fileKey, string $directory, ?string $existingFilePath = null): ?string
    {
        if ($request->hasFile($fileKey)) {
            if ($existingFilePath) {
                Storage::disk('public')->delete($existingFilePath);
            }
            $file = $request->file($fileKey);
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            return $file->storeAs($directory, $fileName, 'public');
        }
        return $existingFilePath;
    }
}
