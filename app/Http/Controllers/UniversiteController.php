<?php

namespace App\Http\Controllers;

use App\Http\Requests\UniversiteRequest;
use App\Models\Region;
use App\Models\Universite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UniversiteController extends Controller
{
    public function index()
    {
        $universites = Universite::with('region')->orderBy('nom')->paginate(10);
        return view('Backoffice.Universite.universites', compact('universites'));
    }

    public function create()
    {
        $regions = Region::orderBy('nom')->get();
        return view('Backoffice.Universite.create', compact('regions'));
    }

    public function store(UniversiteRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            if ($request->hasFile('logo')) {
                $validatedData['logo'] = $this->handleFileUpload($request, 'logo', 'universite_logos');
            }

            $universite = Universite::create($validatedData);

            DB::commit();
            return redirect()->route('universites.index')
                ->with('success', 'Université créée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la création de l\'université.');
        }
    }

    public function show(Universite $universite)
    {
        $universite->load(['region', 'etablissements']);
        return view('Backoffice.Universite.show', compact('universite'));
    }

    public function edit(Universite $universite)
    {
        $regions = Region::orderBy('nom')->get();
        return view('Backoffice.Universite.edit', compact('universite', 'regions'));
    }

    public function update(UniversiteRequest $request, Universite $universite)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            if ($request->hasFile('logo')) {
                $validatedData['logo'] = $this->handleFileUpload($request, 'logo', 'universite_logos', $universite->logo);
            }

            $universite->update($validatedData);

            DB::commit();
            return redirect()->route('universites.index')
                ->with('success', 'Université mise à jour avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la mise à jour de l\'université.');
        }
    }

    public function destroy(Universite $universite)
    {
        try {
            DB::beginTransaction();

            // Vérifier si l'université a des établissements
            if ($universite->etablissements()->exists()) {
                return redirect()->route('universites.index')
                    ->with('error', 'Impossible de supprimer cette université car elle possède des établissements associés.');
            }

            // Supprimer le logo si existe
            if ($universite->logo) {
                Storage::disk('public')->delete($universite->logo);
            }

            $universite->delete();

            DB::commit();
            return redirect()->route('universites.index')
                ->with('success', 'Université supprimée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('universites.index')
                ->with('error', 'Une erreur est survenue lors de la suppression de l\'université.');
        }
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
