<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{

    use HasFactory;
    protected $fillable = ['nome' ];

    public function materiais()
    {
        return $this->hasMany(Material::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
