<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{

    use HasFactory;

    protected $table = 'subcategorias'; // Estava errado como array
    protected $fillable = ['nome', 'categoria_id'];

    public function materiais()
    {
        return $this->hasMany(Material::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
