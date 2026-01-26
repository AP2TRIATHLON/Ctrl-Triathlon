<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'dossard',
        'date_i',
        'forfait',
        'classement_c',
        'triathlete_id'
    ];

    protected $casts = [
        'date_i' => 'date',
        'forfait' => 'boolean',
    ];

    public function triathlete()
    {
        return $this->belongsTo(Triathlete::class);
    }

    public function prelevements()
    {
        return $this->hasMany(Prelevement::class);
    }
}
