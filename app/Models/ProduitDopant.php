<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduitDopant extends Model
{
    protected $fillable = [
        'code',
        'libelle'
    ];

    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $table = "produitdopant";

    public function prelevements()
    {
        return $this->belongsToMany(
            Prelevement::class,
            'prelevement_produit_dopant'
        )->withPivot('taux');
    }
}
