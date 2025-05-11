<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'directeur',
        'region_id',
        'logo',
        'type'
    ];

    protected $table = 'universites';

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function etablissements()
    {
        return $this->hasMany(Etablissement::class);
    }
}
