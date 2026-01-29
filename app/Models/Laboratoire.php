<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = "Laboratoire";
    protected $fillable = [
        'nomlabo',
        'adresseRue',
        'adresseCP'
    ];

    protected function casts(): array
    {
        return [
            'nom' => 'string',
            'adresse' => 'string',
        ];
    }


    public function prelevements()
    {
        return $this->hasMany(Prelevement::class);
    }
}
