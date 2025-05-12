<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AncienneEtudiante extends Model
{
    use HasFactory;

    protected $table = 'anciennes_etudiantes';

    protected $fillable = [
        'bac_filiere',
        'note_math',
        'note_pc',
        'note_svt',
        'note_anglais',
        'note_philosophie',
        'note_arabe',
        'note_francais',
        'note_islamic',
        'note_histoire',
        'note_economie',
        'note_organisation',
        'note_nationale',
        'note_regionale',
        'filiere_postbac',
        'ecole',
        'reussie'
    ];

    protected $casts = [
        'note_math' => 'float',
        'note_pc' => 'float',
        'note_svt' => 'float',
        'note_anglais' => 'float',
        'note_philosophie' => 'float',
        'note_arabe' => 'float',
        'note_francais' => 'float',
        'note_islamic' => 'float',
        'note_histoire' => 'float',
        'note_economie' => 'float',
        'note_organisation' => 'float',
        'note_nationale' => 'float',
        'note_regionale' => 'float',
        'reussie' => 'boolean'
    ];

    public static function rules()
    {
        return [
            'bac_filiere' => 'required|string|max:255',
            'note_math' => 'nullable|numeric|min:0|max:20',
            'note_pc' => 'nullable|numeric|min:0|max:20',
            'note_svt' => 'nullable|numeric|min:0|max:20',
            'note_anglais' => 'nullable|numeric|min:0|max:20',
            'note_philosophie' => 'nullable|numeric|min:0|max:20',
            'note_arabe' => 'nullable|numeric|min:0|max:20',
            'note_francais' => 'nullable|numeric|min:0|max:20',
            'note_islamic' => 'nullable|numeric|min:0|max:20',
            'note_histoire' => 'nullable|numeric|min:0|max:20',
            'note_economie' => 'nullable|numeric|min:0|max:20',
            'note_organisation' => 'nullable|numeric|min:0|max:20',
            'note_nationale' => 'nullable|numeric|min:0|max:20',
            'note_regionale' => 'nullable|numeric|min:0|max:20',
            'filiere_postbac' => 'required|string|max:255',
            'ecole' => 'required|string|max:255',
            'reussie' => 'required|boolean'
        ];
    }

    public static function messages()
    {
        return [
            'bac_filiere.required' => 'La filière du baccalauréat est requise.',
            'note_math.numeric' => 'La note en mathématiques doit être un nombre.',
            'note_math.min' => 'La note en mathématiques ne peut pas être négative.',
            'note_math.max' => 'La note en mathématiques ne peut pas dépasser 20.',
            'note_pc.numeric' => 'La note en physique-chimie doit être un nombre.',
            'note_pc.min' => 'La note en physique-chimie ne peut pas être négative.',
            'note_pc.max' => 'La note en physique-chimie ne peut pas dépasser 20.',
            'note_svt.numeric' => 'La note en SVT doit être un nombre.',
            'note_svt.min' => 'La note en SVT ne peut pas être négative.',
            'note_svt.max' => 'La note en SVT ne peut pas dépasser 20.',
            'note_anglais.numeric' => 'La note en anglais doit être un nombre.',
            'note_anglais.min' => 'La note en anglais ne peut pas être négative.',
            'note_anglais.max' => 'La note en anglais ne peut pas dépasser 20.',
            'note_philosophie.numeric' => 'La note en philosophie doit être un nombre.',
            'note_philosophie.min' => 'La note en philosophie ne peut pas être négative.',
            'note_philosophie.max' => 'La note en philosophie ne peut pas dépasser 20.',
            'note_arabe.numeric' => 'La note en arabe doit être un nombre.',
            'note_arabe.min' => 'La note en arabe ne peut pas être négative.',
            'note_arabe.max' => 'La note en arabe ne peut pas dépasser 20.',
            'note_francais.numeric' => 'La note en français doit être un nombre.',
            'note_francais.min' => 'La note en français ne peut pas être négative.',
            'note_francais.max' => 'La note en français ne peut pas dépasser 20.',
            'note_islamic.numeric' => 'La note en éducation islamique doit être un nombre.',
            'note_islamic.min' => 'La note en éducation islamique ne peut pas être négative.',
            'note_islamic.max' => 'La note en éducation islamique ne peut pas dépasser 20.',
            'note_histoire.numeric' => 'La note en histoire-géographie doit être un nombre.',
            'note_histoire.min' => 'La note en histoire-géographie ne peut pas être négative.',
            'note_histoire.max' => 'La note en histoire-géographie ne peut pas dépasser 20.',
            'note_economie.numeric' => 'La note en économie doit être un nombre.',
            'note_economie.min' => 'La note en économie ne peut pas être négative.',
            'note_economie.max' => 'La note en économie ne peut pas dépasser 20.',
            'note_organisation.numeric' => 'La note en organisation doit être un nombre.',
            'note_organisation.min' => 'La note en organisation ne peut pas être négative.',
            'note_organisation.max' => 'La note en organisation ne peut pas dépasser 20.',
            'note_nationale.numeric' => 'La note nationale doit être un nombre.',
            'note_nationale.min' => 'La note nationale ne peut pas être négative.',
            'note_nationale.max' => 'La note nationale ne peut pas dépasser 20.',
            'note_regionale.numeric' => 'La note régionale doit être un nombre.',
            'note_regionale.min' => 'La note régionale ne peut pas être négative.',
            'note_regionale.max' => 'La note régionale ne peut pas dépasser 20.',
            'filiere_postbac.required' => 'La filière post-bac est requise.',
            'ecole.required' => 'L\'école est requise.',
            'reussie.required' => 'Le statut de réussite est requis.'
        ];
    }
}
