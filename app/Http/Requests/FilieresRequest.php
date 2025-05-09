<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilieresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        $user = $this->user();
        if($user->getRole() === 'admin'){
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
            'Niveau' => [
                'required',
                'string',
                // Directement la liste des valeurs valides ici si vous n'utilisez pas Rule::in avec une variable
                'in:Prépa,Mise à niveau,BTS,DUT,DEUST,Licence,Licence Pro,Master,Mastere Specialise,Doctorat'
            ],
            'ConditionsAdmission' => 'required|string|max:1000',
            'debouches_metiers' => 'nullable|string|max:2000',
            'duree' => 'nullable|integer|min:1|max:7',
            'domaine_id' => 'nullable|integer|exists:domaines,id'
        ];

    }
}
