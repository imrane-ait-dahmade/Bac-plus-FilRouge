<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    //
    protected $table = 'universites';

    public function etablissement()
    {
        return $this->hasOne(Etablissement::class , 'universite_id');
    }
}
