<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'libelle',
        'long_nage',
        'long_velo',
        'long_pied'
    ];

    public function annees()
    {
        return $this->hasMany(Annee::class);
    }
}
