<?php

namespace App\Models;

use App\Enums\TipoDeMaterial;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $casts = [
        'tipo' => TipoMaterial::class,
    ];

    protected $status = ['status' => Status::class,];
}
