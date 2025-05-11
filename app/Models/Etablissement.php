<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    /** @use HasFactory<\Database\Factories\EtablissementFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'ville',
        'region_id',
        'adresse',
        'telephone',
        'fax',
        'site_web',
        'site_inscription',
        'universite_id',
        'resau',
        'email',
        'nombre_etudiant',
        'type_ecole',
        'description',
        'facebook',
        'instagram',
        'linkedin',
        'image',
        'logo',
        'abreviation',
        'seuil_actif',
        'seuil',
        'date_ouverture_inscription',
        'date_limite_inscription',
        'diplome_type',
        'reputation',
        'frais_scolarite',
    ];




    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function filieres()
    {
        return $this->belongsToMany(Filiere::class, 'etablissements_filieres');
    }
    public function universite()
    {
        return $this->belongsTo(Universite::class, 'universite_id');
    }
}
