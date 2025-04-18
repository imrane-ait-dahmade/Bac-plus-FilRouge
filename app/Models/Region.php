<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{


    protected $table = 'regions';
    public function etablissements()
    {
        return $this->hasMany(Etablissement::class ,'region_id');
    }
}
