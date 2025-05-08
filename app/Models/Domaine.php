<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Domaine extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $fillable = [
        'domaine',
        'type',
    ];
    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }
}
