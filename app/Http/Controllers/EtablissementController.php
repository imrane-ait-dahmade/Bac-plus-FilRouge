<?php

namespace App\Http\Controllers;

use App\Enums\Ville;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;
use App\Models\Domaine;
use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\Region;
use App\Models\Universite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EtablissementController extends Controller
{
    public function index(Request $request)
    {
        $query = Etablissement::query()->with(['region', 'universite']);

        // Recherche améliorée
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nom', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('abreviation', 'like', '%' . $searchTerm . '%');
            });
        }

        // Filtres de base
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

        // Nouveaux filtres
        if ($request->filled('universite_id')) {
            $query->where('universite_id', $request->input('universite_id'));
        }
        if ($request->filled('region_id')) {
            $query->where('region_id', $request->input('region_id'));
        }
        if ($request->filled('frais_min')) {
            $query->where('frais_scolarite', '>=', $request->input('frais_min'));
        }
        if ($request->filled('frais_max')) {
            $query->where('frais_scolarite', '<=', $request->input('frais_max'));
        }

        // Tri amélioré
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = Str::endsWith($sortBy, '_desc') ? 'desc' : 'asc';
        $sortColumn = Str::remove('_asc', Str::remove('_desc', $sortBy));

        if (in_array($sortColumn, ['nom', 'id', 'reputation', 'frais_scolarite'])) {
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
        $filiereEtablissement = $etablissement->filieres();
        $filieres = Filiere::orderBy('nom')->get();

        // ICI EST LA DÉFINITION IMPORTANTE
        $associatedFiliereIds = $etablissement->filieres->pluck('id')->toArray();
        return view('Infos', compact('etablissement', 'filiereEtablissement', 'filieres', 'associatedFiliereIds'));
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
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $this->handleFileUpload($request, 'logo', 'etablissement_logos', $etablissement->logo);
        }
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->handleFileUpload($request, 'image', 'etablissement_images', $etablissement->image);
        }
        $validatedData['seuil_actif'] = $request->boolean('seuil_actif');

        $etablissement->update($validatedData);

        return redirect()->route('etablisement_infos', $etablissement->id)
            ->with('success', 'Établissement mis à jour avec succès.');
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

    public function attachFilieres(Request $request, Etablissement $etablissement)
    {
        $request->validate([
            'filiere_ids' => 'required|array',
            'filiere_ids.*' => 'exists:filieres,id'
        ]);

        $etablissement->filieres()->sync($request->filiere_ids);

        return redirect()->back()->with('success', 'Les filières ont été mises à jour avec succès.');
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
