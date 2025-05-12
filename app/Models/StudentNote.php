<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentNote extends Model
{
    protected $fillable = [
        'user_id',
        'matiere_id',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
