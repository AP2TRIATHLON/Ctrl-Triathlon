<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Triathlete extends Model
{
    protected $fillable = [
        'n_licence',
        'nom',
        'prenom',
        'sexe',
        'adresse',
        'date_naiss',
        'categorie_id'
    ];

    protected $casts = [
        'date_naiss' => 'date',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
