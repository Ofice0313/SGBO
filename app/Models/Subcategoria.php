<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    //

    public function materiais()
    {
        return $this->hasMany(Material::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
