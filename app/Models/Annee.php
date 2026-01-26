<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    protected $fillable = [
        'num',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
