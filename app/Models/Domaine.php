<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{

    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }
}
