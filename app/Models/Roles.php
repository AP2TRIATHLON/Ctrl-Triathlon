<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Roles extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nameRole',
    ];

    protected function casts(): array
    {
        return [
            'nameRole' => 'string',
        ];
    }
}
