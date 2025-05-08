<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEtablissementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        if($user &&$user->getRole() === 'admin'){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'universite_id' => 'required|exists:universites,id',
            'resau' => 'required|string|max:255',
            'nombre_etudiant' => 'required|integer|min:0',
            'region_id' => 'required|exists:regions,id',
            'TypeEcole' => 'required|in:public,prive',
            'telephone' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'site_web' => 'nullable|url|max:255',
            'site_inscription' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'logo' => 'nullable|string|max:255', // ou 'nullable|image' si c'est un fichier
            'image' => 'nullable|string|max:255', // idem
            'abreviation' => 'nullable|string|max:20',
            'seuil_actif' => 'boolean',
            'seuil' => 'nullable|numeric|min:0',
            'reputation' => 'required|numeric|min:0',
            'frais_scolarite' => 'nullable|numeric|min:0',
            'date_ouverture_inscription' => 'nullable|date',
            'date_limite_inscription' => 'nullable|date|after_or_equal:date_ouverture_inscription',
            'diplome_type' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ];
    }
}
