<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    /** @use HasFactory<\Database\Factories\EtablissementFactory> */
    use HasFactory;

    protected $fillable = [
        'nometablissement',
        'villeetablissement',
        'region_id',
        'adresseetablissement',
        'telephone',
        'fax',
        'site_web',
        'site_inscription',
        'universite',
        'resau',
        'nombreetudiant',
        'typeecole',
        'facebook',
        'instagram',
        'linkedin',
        'descirptionetablissement',
        'image',
        'logo',

    ];




    public function region(){
        return $this->belongsTo(Region::class , 'region_id');
    }

    public function filieres()
    {
        return $this->belongsToMany(Filiere::class, 'etablissments_filieres');
    }
}
