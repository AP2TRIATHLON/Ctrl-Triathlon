<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'libelle',
        'age_min',
        'age_max'
    ];

    public function triathletes()
    {
        return $this->hasMany(Triathlete::class);
    }
}
