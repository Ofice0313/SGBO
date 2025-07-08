<?php

namespace App\Models;

use app\Enums\Categoria;
use App\Enums\TipoDeMaterial;
use App\Enums\Status;
use app\Enums\Subcategoria;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $casts = [
        'tipo' => TipoDeMaterial::class,
    ];

    protected $status = ['status' => Status::class,];
    protected $categoria = ['categoria' => Categoria::class,];
    protected $subcategoria = ['subcategoria' => Subcategoria::class,];

    protected $table = 'materiais';

    protected $fillable = [
        'titulo',
        'tipo',
        'subcategoria',
        'categoria',
        'status',
        'autor',
        'editora',
        'ano_de_publicacao',
        'paginas',
        'caminho_da_imagem',
        'caminho_do_arquivo',
    ];

}
