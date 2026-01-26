<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prelevement extends Model
{
    protected $fillable = [
        'date',
        'inscription_id',
        'laboratoire_id'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }

    public function laboratoire()
    {
        return $this->belongsTo(Laboratoire::class);
    }

    public function produitsDopants()
    {
        return $this->belongsToMany(
            ProduitDopant::class,
            'prelevement_produit_dopant'
        )->withPivot('taux');
    }
}
