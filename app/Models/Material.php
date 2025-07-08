<?php

namespace App\Models;

use App\Enums\TipoDeMaterial;
use App\Enums\Status;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $casts = [
        'tipo' => TipoDeMaterial::class,
    ];

    protected $status = ['status' => Status::class,];

    protected $table = 'materiais';

    protected $fillable = [
        'titulo',
        'tipo',
        'subcategoria',
        'categoria',
        'autor',
        'editora',
        'ano_de_publicacao',
        'paginas',
        'caminho_da_imagem',
        'caminho_do_arquivo',
        'subcategoria_id',
    ];

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
}
