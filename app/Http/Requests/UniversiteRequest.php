<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversiteRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();
        return $user->getRole() === 'admin';
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'directeur' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'type' => 'required|in:public,prive',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom de l\'université est requis.',
            'nom.max' => 'Le nom de l\'université ne peut pas dépasser 255 caractères.',
            'directeur.required' => 'Le nom du directeur est requis.',
            'directeur.max' => 'Le nom du directeur ne peut pas dépasser 255 caractères.',
            'region_id.required' => 'La région est requise.',
            'region_id.exists' => 'La région sélectionnée n\'existe pas.',
            'type.required' => 'Le type d\'université est requis.',
            'type.in' => 'Le type d\'université doit être public ou privé.',
            'logo.image' => 'Le fichier doit être une image.',
            'logo.mimes' => 'L\'image doit être au format jpeg, png, jpg, gif ou svg.',
            'logo.max' => 'L\'image ne peut pas dépasser 2 Mo.',
        ];
    }
}
