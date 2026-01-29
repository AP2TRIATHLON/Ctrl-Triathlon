<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Triathlon extends Model
{
    protected $table = 'Triathlon'; //
    protected $primaryKey = 'idT'; //
    public $timestamps = false;

    protected $fillable = ['lieuT', 'dateT', 'nomT', 'codeType']; //

    public function inscriptions() {
        return $this->hasMany(Inscription::class, 'idT', 'idT'); //
    }
}
