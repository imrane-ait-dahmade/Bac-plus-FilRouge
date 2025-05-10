<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Filiere extends Model
{

    use HasFactory;
    protected $fillable = [
        'nom',
        'Niveau',
        'ConditionsAdmission',
        'duree',
        'domaine_id',
        'debouches_metiers',
    ];

    public function Domaine(){
       return $this->belongsTo(Domaine::class);
    }

    public function etablissements()
    {
        return $this->belongsToMany(Etablissement::class, 'etablissments_filieres');
    }


}
